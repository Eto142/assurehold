<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Transaction Agreement Confirmation</title>
    <style>
        body {
            background-color: #f6f6f6;
            font-family: Arial, sans-serif;
            color: #333;
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
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
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
        .btn {
            display: inline-block;
            padding: 10px 18px;
            background-color: #0056b3;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
        .btn:hover {
            background-color: #004494;
        }
        .footer {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
          <h4>AssureHold</h4>
        </div>

        <h2>Hello {{ $userName }},</h2>
        <p>We have received your request for a transaction agreement. Our legal team will prepare the agreement and contact you shortly.</p>

        <a href="{{ url('/login') }}" class="btn">Log in to Your Account</a>

        <p>Thank you for trusting <strong>AssureHold</strong> with your transaction process.</p>

        <div class="footer">
            &copy; {{ $year }} AssureHold. All rights reserved.<br>
            This is an automated message — please do not reply.
        </div>
    </div>
</body>
</html>
