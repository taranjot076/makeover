<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function getServicesData(): array
    {
        return config('services');
    }

    public function index()
    {
        return view('index', [
            'services' => $this->getServicesData(),
            'testimonials' => config('site.testimonials'),
            'galleryPreview' => array_slice(config('site.gallery'), 0, 6),
        ]);
    }

    public function services()
    {
        return view('services', ['services' => $this->getServicesData()]);
    }

    public function pricing(Request $request)
    {
        return view('pricing', [
            'services' => $this->getServicesData(),
            'selectedService' => $request->get('service'),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function gallery()
    {
        return view('gallery', [
            'gallery' => config('site.gallery'),
        ]);
    }

    public function contact()
    {
        return view('contact', ['services' => $this->getServicesData()]);
    }

    public function booking()
    {
        return view('booking', ['services' => $this->getServicesData()]);
    }
}
