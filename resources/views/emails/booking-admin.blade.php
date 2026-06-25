<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: linear-gradient(135deg, #d4af37, #b8941f); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
        .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
        .info-row { margin-bottom: 15px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .label { font-weight: bold; color: #d4af37; }
        .footer { text-align: center; margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee; color: #666; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Appointment Booking Request</h2>
        </div>
        <div class="content">
            <div class="info-row">
                <span class="label">Name:</span> {{ $firstName }} {{ $lastName }}
            </div>
            <div class="info-row">
                <span class="label">Email:</span> {{ $email }}
            </div>
            <div class="info-row">
                <span class="label">Phone:</span> {{ $phone }}
            </div>
            <div class="info-row">
                <span class="label">Service{{ isset($services_count) && $services_count > 1 ? 's' : '' }}:</span>
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
            </div>
            <div class="info-row">
                <span class="label">Preferred Date:</span> {{ $date }}
            </div>
            <div class="info-row">
                <span class="label">Preferred Time:</span> {{ $time }}
            </div>
            @if(!empty($message))
            <div class="info-row">
                <span class="label">Additional Notes:</span><br>
                {!! nl2br(e($message)) !!}
            </div>
            @endif
        </div>
        <div class="footer">
            <p>This email was sent from the Glamour by Lovepreet booking form.</p>
            <p>Please respond to the client at: {{ $email }}</p>
        </div>
    </div>
</body>
</html>

