<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attorney Connection Confirmation</title>
    <style>
        body {
            background-color: #f6f6f6;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header img {
            max-height: 50px;
        }
        h2 {
            color: #0056b3;
        }
        p {
            line-height: 1.6;
        }
        .footer {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin-top: 15px;
            background-color: #0056b3;
            color: #fff !important;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #004494;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="AssureHold Logo">
        </div>

        <h2>Hello {{ $userName }},</h2>
        <p>We’ve received your request to connect with one of our attorneys. Our legal partner will review your request and contact you shortly using the email address you provided.</p>
        
        <p>While you wait, you can log in to your AssureHold account for updates:</p>
        
        <a href="{{ url('/login') }}" class="btn">Log in to Your Account</a>

        <p>Thank you for trusting <strong>AssureHold</strong> to assist you in your legal matters.</p>

        <div class="footer">
            &copy; {{ $year }} AssureHold. All rights reserved.<br>
            This is an automated message — please do not reply.
        </div>
    </div>
</body>
</html>
