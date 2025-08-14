<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Account Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            color: #333;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            background: #ffffff;
            max-width: 500px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
        .code-box {
            background: #f4f4f4;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            letter-spacing: 2px;
            border-radius: 4px;
            margin: 15px 0;
        }
        .footer {
            font-size: 12px;
            color: #777;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <p>Hi {{ $first_name ?? 'there' }},</p>

    <p>Thank you for registering with <strong>{{ $app_name ?? 'AssureHold' }}</strong>.</p>

    <p>Please use the verification code below to activate your account:</p>

    <div class="code-box">{{ $code }}</div>

    <p>If you did not request this registration, please ignore this email.</p>

    <p>Best regards,<br>
    The {{ $app_name ?? 'AssureHold' }} Team</p>

    <div class="footer">
        This is an automated message. Please do not reply.<br>
        Contact us: <a href="mailto:{{ $contact_email ?? 'contact@assurehold.com' }}">{{ $contact_email ?? 'contact@assurehold.com' }}</a>
    </div>
</div>
</body>
</html>
