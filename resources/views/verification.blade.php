<!-- resources/views/verification.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2B54N2FD1H"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2B54N2FD1H');
    </script>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/images/casule_favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/images/casule_favicon.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <link rel="stylesheet" href="{{ asset('public/css/verification.css') }}"> <!-- Link to warranty.css -->
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
                        <a href="{{ url(app()->getLocale()) }}">
                            <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                        </a>
                    </div>
                    <!---form--->
                    <div class="verification__form-form">
                        <div class="verification__form-name">
                            <h2>Welcome to “Capsule”</h2>
                            <h3>product verification system</h3>
                        </div>
                        <div class="verification__form-line">
                            <div class="verification__form-line-line"></div>
                            <div class="verification__form-text">
                                enter your product code
                            </div>
                            <div class="verification__form-line-line"></div>
                        </div>
                        <div class="verification__form-formblock">
                            <form action="">
                                <div class="input__wrapper">
                                    <!-- Info Icon -->
                                    <div class="input__wrapper-info" id="infoIcon">
                                        i
                                        <!-- Tooltip with Image -->

                                    </div>

                                    <input placeholder="Enter product code" type="text" name="product_code"
                                        id="product_code" required>
                                </div>
                                <div class="tooltip" id="tooltip">
                                    <img src="{{ asset('public/images/DDS1.jpg') }}" alt="Help Image">
                                </div>
                                <div class="verification__form-submit">
                                    <button name="submit" type="submit" data-sitekey="reCAPTCHA_site_key"
                                        data-callback='onSubmit' data-action='submit'>
                                        Check Verification
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-----bottom form-->
                    <div class="verification__form-image_form">
                        <img src="{{ asset('public/images/verification_bottom.svg') }}" alt="">
                    </div>
                </div>
            </div>
            <!---Verification IMAGE---->
            <div class="verification__car">
                <div class="verification__car-image">
                    <img src="{{ asset('public/images/verification.PNG') }}" alt="">
                </div>

                <div class="verification__car-alert">

                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('.verification__form-formblock form');
            const input = document.querySelector('#product_code');
            const alertContainer = document.querySelector('.verification__car-alert');

            form.addEventListener('submit', async function(event) {
                event.preventDefault(); // Prevent form submission

                const productCode = input.value.trim();

                // Clear previous messages
                alertContainer.innerHTML = '';

                if (!productCode) {
                    alertContainer.innerHTML = `
                        <div class="verification__car-alert-content">
                            <div class="verification__car-message">
                                <img src="{{ asset('images/error.png') }}" alt="">
                                <p>Please enter a product code.</p>
                            </div>
                        </div>
                    `;
                    return;
                }

                try {
                    const response = await fetch("{{ url('/api/verify-product') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token for security
                        },
                        body: JSON.stringify({
                            product_code: productCode
                        }),
                    });

                    const data = await response.json();

                    if (data.success) {
                        alertContainer.innerHTML = `
                            <div class="verification__car-alert-block">
                                <img class="verification__car-image-svg" src="{{ asset('public/images/verification_svg.svg') }}" alt="">
                                <div class="verification__car-alert-blur"></div>
                                <div class="verification__car-alert-content">
                                    <div class="verification__car-message">
                                        <img style="width: 26px;height: 27px;background-color: #fff;border-radius: 30px;" src="{{ asset('public/images/successs.png') }}" alt="">
                                        <p>${data.message}</p>
                                    </div>
                                    <div class="verification__car-text">
                                        Model: ${data.product.model_name}<br>
                                        Congratulations! The verification code has been successfully checked, and your product is authentic.
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        alertContainer.innerHTML = `
                            <div class="verification__car-alert-block">
                                <img class="verification__car-image-svg" src="{{ asset('public/images/verification_svg.svg') }}" alt="">
                                <div class="verification__car-alert-blur"></div>
                                <div class="verification__car-alert-content">
                                    <div style="background-color: #710000;" class="verification__car-message">
                                        <img style="width:25px; height: 25px;" src="{{ asset('public/images/failure.png') }}" alt="">
                                        <p style="color: #fff;">${data.message}</p>
                                    </div>
                                    <div class="verification__car-text">
                                        Sorry, but this product is not in our database. Most likely, it is a counterfeit. </br>
                                        Please contact your local Capsule representative for further clarification.
                                    </div>
                                </div>
                            </div>
                        `;
                    }
                } catch (error) {
                    alertContainer.innerHTML = `
                        <div class="verification__car-alert-content">
                            <div class="verification__car-message">
                                <img src="{{ asset('public/images/error.png') }}" alt="">
                                <p>An error occurred. Please try again later.</p>
                            </div>
                        </div>
                    `;
                }
            });
        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const infoIcon = document.getElementById("infoIcon");
            const tooltip = document.getElementById("tooltip");

            if (!infoIcon || !tooltip) {
                console.error("Info icon or tooltip not found in the DOM!");
                return; // Stop execution if elements are missing
            }

            // For Desktop - Show on hover
            infoIcon.addEventListener("mouseenter", function() {
                if (!isMobile()) {
                    tooltip.style.display = "block";
                }
            });

            infoIcon.addEventListener("mouseleave", function() {
                if (!isMobile()) {
                    tooltip.style.display = "none";
                }
            });

            // For Mobile - Show on click
            infoIcon.addEventListener("click", function(event) {
                if (isMobile()) {
                    event.stopPropagation(); // Prevent click from closing instantly
                    tooltip.style.display = "block";
                }
            });

            // Hide tooltip when clicking anywhere else on mobile
            document.addEventListener("click", function(event) {
                if (isMobile() && !infoIcon.contains(event.target) && !tooltip.contains(event.target)) {
                    tooltip.style.display = "none";
                }
            });

            // Function to check if the device is mobile
            function isMobile() {
                return /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
            }
        });
    </script>

    <!--
===========================================
 Created & Developed by DAKER
 Website: https://daker.site/
 +994 50 750 69 01
 Year: 2025
===========================================
-->
</body>

</html>
