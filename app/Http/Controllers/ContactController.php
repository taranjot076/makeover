<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'service' => 'required|array|min:1',
            'service.*' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|string|max:255',
            'terms' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => implode(', ', $validator->errors()->all())
            ], 422);
        }

        try {
            $data = $request->all();
            // Convert service array to string for email display
            $data['services_list'] = is_array($data['service']) ? implode(', ', $data['service']) : $data['service'];
            $data['services_count'] = is_array($data['service']) ? count($data['service']) : 1;
            $adminEmail = env('ADMIN_EMAIL', 'info@makeoverbylovepreet.com');
            
            // Create subject with service count
            $subject = $data['services_count'] > 1 
                ? 'New Appointment Booking Request - ' . $data['services_count'] . ' Services'
                : 'New Appointment Booking Request - ' . $data['services_list'];
            
            // Send email to admin
            Mail::send('emails.booking-admin', $data, function ($message) use ($data, $adminEmail, $subject) {
                $message->to($adminEmail)
                        ->subject($subject)
                        ->from(config('mail.from.address'), config('mail.from.name'))
                        ->replyTo($data['email'], $data['firstName'] . ' ' . $data['lastName']);
            });

            // Send confirmation email to client
            Mail::send('emails.booking-confirmation', $data, function ($message) use ($data) {
                $message->to($data['email'], $data['firstName'] . ' ' . $data['lastName'])
                        ->subject('Appointment Request Received - Lovepreet')
                        ->from(config('mail.from.address'), config('mail.from.name'));
            });

            return response()->json([
                'success' => true,
                'message' => 'Your appointment request has been sent successfully! We will contact you soon.'
            ]);

        } catch (\Exception $e) {
            \Log::error('Mailer Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Sorry, there was an error sending your request. Please try again or contact us directly at ' . env('ADMIN_EMAIL', 'info@makeoverbylovepreet.com')
            ], 500);
        }
    }
}

