<!-- resources/views/verification.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/images/casule_favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/images/casule_favicon.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('public/css/verification.css') }}"> <!-- Link to warranty.css -->
    <link rel="stylesheet" href="{{ asset('public/css/warranty.css') }}"> <!-- Link to warranty.css -->
</head>
<!-- Google tag (gtag.js) -->


<body>
    <div class="verification__container">
        <div class="verification__wrapper">
            <!---Verification FORM--->
            <div class="verification__form">
                <div class="verification__form-absoluteimage">
                    <img src="{{ asset('public/images/background.png') }}" alt="">
                </div>
                <div class="verification__content">
                    <!---top image--->
                    <div class="verification__form-image">
                        <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                    </div>
                    <!---form--->
                    <div class="verification__form-form">
                        <div class="verification__form-name">
                            <h2>Welcome to “Capsule”</h2>
                            <h3>Admin Panel System</h3>
                        </div>
                        <div class="verification__form-line">
                            <div class="verification__form-line-line"></div>
                            <div class="verification__form-text">
                                please log in
                            </div>
                            <div class="verification__form-line-line"></div>
                        </div>
                        <div class="verification__form-formblock">

                            <form method="POST" action="{{ route('admin.login.submit') }}" class="login__form"
                                id="loginForm">
                                @csrf <!-- Include CSRF token for security -->

                                <div class="input__wrapper">
                                    <input placeholder="Login" type="email" name="email" id="email" required>
                                    @if ($errors->has('email'))
                                        <div style="color: red; font-size: 14px;">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input__wrapper">
                                    <input placeholder="Password" type="password" name="password" id="password"
                                        required>
                                    @if ($errors->has('password'))
                                        <div style="color: red; font-size: 14px;">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="verification__form-submit">
                                    <button name="submit" type="submit">
                                        Log In
                                    </button>
                                </div>
                            </form>

                            <!-- Display generic errors, such as authentication or product code validation -->
                            @if ($errors->any())
                                <div style="color: red; font-size: 14px; margin-top: 10px;">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
            <!---Verification IMAGE---->
            <div class="verification__car">
                <div class="verification__car-image">
                    <img src="{{ asset('public/images/warranty_page.PNG') }}" alt="">
                </div>

                <div class="verification__car-alert">

                </div>

            </div>
        </div>
    </div>



</body>

</html>
