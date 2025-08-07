<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warranty Status</title>
    <link rel="stylesheet" href="{{ asset('public/css/verification.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/warranty.css') }}">
</head>

<body>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="warranty__name-main">Warranty Registration Status</div>
        <div class="status-message {{ session('status') }}">
            <h2>{{ session('status') === 'success' ? 'Success!' : 'Error!' }}</h2>
            <p>{{ session('message') }}</p>
        </div>





        @if (session('status') === 'success')
            <p><strong>What to do next?</strong></p>
            <ul>
                <li>Download or print your warranty details.</li>
                <li>Keep this information for future reference.</li>
            </ul>
        @else
            <p><strong>Please try the following:</strong></p>
            <ul>
                <li>Ensure all required fields are filled out correctly.</li>
                <li>Try uploading your images again.</li>
                <li>Contact support if the issue persists.</li>
            </ul>
        @endif

        @if (session('status') === 'success' && isset($latestWarranty))
            <a href="{{ route('service.warranty', ['id' => $latestWarranty->id]) }}" class="back-btn">
                View Your Warranty
            </a>
        @else
            <a href="{{ route('warranty') }}" class="back-btn">Back to Dashboard</a>
        @endif

    </div>

    <style>
        .status-message {
            text-align: center;
            margin: 20px 0;
            padding: 20px;
            border-radius: 5px;
        }

        .status-message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .status-message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .back-btn {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-btn:hover {
            background-color: #45a049;
        }
    </style>
</body>

</html>
