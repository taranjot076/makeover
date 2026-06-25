<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #d4af37, #b8941f); color: white; padding: 30px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .info-box { background: white; padding: 20px; margin: 15px 0; border-radius: 5px; border-left: 4px solid #d4af37; }
        .footer { text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Thank You for Your Booking Request!</h2>
        </div>
        <div class="content">
            <p>Dear {{ $firstName }},</p>
            <p>Thank you for choosing Glamour by Lovepreet! We have received your appointment request and will contact you within 24 hours to confirm your booking.</p>
            
            <div class="info-box">
                <strong>Your Booking Details:</strong><br>
                <strong>Service{{ isset($services_count) && $services_count > 1 ? 's' : '' }}:</strong>
                @if(isset($service) && is_array($service))
                    <ul style="margin: 5px 0; padding-left: 20px;">
                        @foreach($service as $svc)
                            <li>{{ $svc }}</li>
                        @endforeach
                    </ul>
                @elseif(isset($services_list))
                    {{ $services_list }}
                @else
                    {{ $service ?? 'N/A' }}
                @endif
                <br>
                <strong>Preferred Date:</strong> {{ $date }}<br>
                <strong>Preferred Time:</strong> {{ $time }}
            </div>
            
            <p>If you have any questions or need to make changes to your appointment, please don't hesitate to contact us:</p>
            <p>
                <strong>Call Us:</strong> {{ site('phone') }}<br>
                <strong>WhatsApp:</strong> {{ site('whatsapp') }}<br>
                <strong>Email:</strong> info@makeoverbylovepreet.com
            </p>
            
            <p>We look forward to helping you look and feel your absolute best!</p>
            
            <p>Best regards,<br>
                <strong>The Glamour by Lovepreet Team</strong></p>
        </div>
        <div class="footer">
            <p>This is an automated confirmation email. Please do not reply to this email.</p>
        </div>
    </div>
</body>
</html>

