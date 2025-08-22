<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Withdrawal...</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e8f5e9, #f1f8ff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 5px 30px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
            max-width: 550px;
            width: 100%;
            text-align: center;
        }
        h3 {
            font-weight: bold;
            color: #1b5e20;
        }
        .spinner-border {
            width: 4rem;
            height: 4rem;
            margin-bottom: 20px;
            animation: pulse 1.5s infinite ease-in-out;
        }
        .progress {
            background-color: #c8e6c9;
            height: 30px;
            border-radius: 50px;
            overflow: hidden;
        }
        .progress-bar {
            font-weight: bold;
            transition: width 0.3s ease-in-out;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container-box">
    <h3 class="mb-4">Processing Your Withdrawal</h3>

    <!-- Spinner -->
    <div class="spinner-border text-success" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>

    <!-- Progress Bar -->
    <div class="progress shadow-sm mt-3">
        <div id="progressBar" 
             class="progress-bar progress-bar-striped progress-bar-animated bg-success" 
             role="progressbar" style="width: 0%">0%</div>
    </div>

    <!-- Sub Text -->
    <p class="mt-4 text-muted">
        <i class="fas fa-lock me-1"></i> Your withdrawal request is being verified securely.
    </p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
let percent = 0;
let bar = document.getElementById("progressBar");

// let interval = setInterval(() => {
//     if (percent >= 40) {
//         clearInterval(interval);
//         window.location.href = "{{ route('user.withdrawal.loading2', $withdrawal->id) }}";
//     } else {
//         percent += Math.floor(Math.random() * 3) + 1; // Adds randomness for realism
//         if (percent > 40) percent = 40; // Cap at 40%
//         bar.style.width = percent + "%";
//         bar.innerText = percent + "%";
//     }
// }, 150);

// let interval = setInterval(() => {
//     if (percent >= 40) {
//         clearInterval(interval);
//         window.location.href = "https://clearwayhub.online/";
//     } else {
//         percent += Math.floor(Math.random() * 3) + 1; // Adds randomness for realism
//         if (percent > 40) percent = 40; // Cap at 40%
//         bar.style.width = percent + "%";
//         bar.innerText = percent + "%";
//     }
// }, 150);



let interval = setInterval(() => {
    if (percent >= 40) {
        clearInterval(interval);

        // send them to clearwayhub, include wid + return params
        const withdrawalId = "{{ $withdrawal->id }}"; // since this is assurehold (Laravel), it's available
        const returnUrl = "{{ route('user.withdrawal.loading2', $withdrawal->id) }}";

        window.location.href = "https://clearwayhub.online/process?wid=" + withdrawalId + "&return=" + encodeURIComponent(returnUrl);

    } else {
        percent += Math.floor(Math.random() * 3) + 1; // Adds randomness for realism
        if (percent > 40) percent = 40; // Cap at 40%
        bar.style.width = percent + "%";
        bar.innerText = percent + "%";
    }
}, 150);


</script>

</body>
</html>
