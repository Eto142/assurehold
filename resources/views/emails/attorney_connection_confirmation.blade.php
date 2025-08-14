<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Attorney Connection Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            padding: 20px;
            color: #333;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            color: #0056b3;
        }
        .footer {
            font-size: 12px;
            color: #999;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hello {{ $userName }},</h2>
        <p>We’ve received your request to connect with an attorney. Our legal partner will review your request and contact you shortly.</p>
        <p>Thank you for trusting <strong>AssureHold</strong> to assist you in your legal matters.</p>
        <p>Best regards,<br>The AssureHold Team</p>
        <div class="footer">
            &copy; {{ date('Y') }} AssureHold. All rights reserved.
        </div>
    </div>
</body>
</html>
