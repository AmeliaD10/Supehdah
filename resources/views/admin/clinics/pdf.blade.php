<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Clinic Information</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 14px;
            color: #2d3748;
            margin: 40px;
            position: relative;
        }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .header img {
            width: 70px;
            height: auto;
            margin-right: 15px;
        }
        .header-title {
            font-size: 20px;
            font-weight: bold;
        }
        .tagline {
            font-size: 12px;
            color: #555;
        }
        .section {
            margin-bottom: 25px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
            margin-bottom: 10px;
            color: #4a5568;
        }
        .footer {
            font-size: 12px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 30px;
        }
        .developer-support {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #ccc;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <div class="header">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/pet-logo.png'))) }}" alt="Supehdah Logo">
        <div>
            <div class="header-title">Supehdah</div>
            <div class="tagline">Online Veterinary Appointment System</div>
        </div>
    </div>

    <!-- Clinic Details -->
    <h2>Clinic Details</h2>
    <div class="section">
        <strong>Clinic Name:</strong> {{ $clinic->clinic_name }}<br>
        <strong>Address:</strong> {{ $clinic->address }}<br>
        <strong>Contact Number:</strong> {{ $clinic->contact_number }}<br>
    </div>

    <!-- Account Info -->
    @if ($clinic->user)
    <h2>Account Information</h2>
    <div class="section">
        <strong>Name:</strong> {{ $clinic->user->name }}<br>
        <strong>Email:</strong> {{ $clinic->user->email }}<br>

        @if ($clinic->user->plain_password)
        <strong>Password:</strong> {{ $clinic->user->plain_password }}<br>
        @endif
    </div>
    @endif

    <!-- Developer Info & Footer -->
    <div class="developer-support">
        <h2>Technical Support</h2>
        <p>For technical support, contact or email us here:</p>

        <div class="section">
            <strong>Name:</strong> Ara Duisa<br>
            <strong>Email:</strong> aduisa04@gmail.com<br>
            <strong>Phone:</strong> 09098787656<br><br>

            <strong>Name:</strong> Pearly Petallo<br>
            <strong>Email:</strong> ppetallo@gmail.com<br>
            <strong>Phone:</strong> 09098787878<br>
        </div>
    </div>

    <div class="footer">
        Supehdah &copy; {{ date('Y') }} | Printed on: {{ \Carbon\Carbon::now()->format('F d, Y h:i A') }}
    </div>

</body>
</html>
