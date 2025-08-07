@extends('layouts.app')
@section('title', 'Capsule - car proection')
@section('content')

    <style>
        .error-message {
            color: red;
            line-height: 17px;
        }
    </style>
    <div class="main__container">
        <!---header-->
        <header class="header" id="header">
            <div class="header__wrapper">

                <a class="header__wrapper__image-a" href="{{ url(app()->getLocale()) }}">
                    <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                </a>


                <div class="header__navigation">
                    <div class="header__nav__burger">
                        <img src="{{ asset('public/images/circum_menu-burger.png') }}" alt="" srcset="">
                    </div>
                    <div class="header__nav__element">
                        <button data-target="home">{{ __('main.header_home') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="about_us">{{ __('main.header_about') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="warranty">{{ __('main.header_warranty') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="catalog">{{ __('main.header_catalogue') }}</button>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="gallery">{{ __('main.header_gallery') }}</button>
                    </div>

                    <div class="header__nav__element">
                        <button data-target="contact">{{ __('main.header_contacts') }}</button>
                    </div>
                    <img src="{{ asset('public/images/header_rectangle.png') }}" id="header_rectangle"
                        class="header_rectangle" alt="" />
                </div>


                <div class="header__languages">
                    <button id="languageButton">{{ strtoupper(app()->getLocale()) }}</button>
                    <div class="language-dropdown" id="languageDropdown">
                        <a href="{{ url('/en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                        <a href="{{ url('/de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">DE</a>
                    </div>
                </div>


                <div class="header__burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </div>


            <!-- Full-screen mobile menu -->
            <div class="mobile-menu" id="mobileMenu">
                <button class="mobile-menu__close" id="mobileMenuClose">X</button>
                <div class="mobile-menu__content">
                    <div class="mobile__menu__container">
                        <div class="mobile__burger-logo">
                            <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                        </div>
                        <div class="mobile__burger-language">
                            <a href="{{ url('/en') }}" class="{{ app()->getLocale() === 'en' ? 'active' : '' }}">EN</a>
                            <a href="{{ url('/de') }}" class="{{ app()->getLocale() === 'de' ? 'active' : '' }}">DE</a>
                        </div>
                        <div class="mobile__burger-navigation">
                            <a href="#home">{{ __('main.header_home') }}</a>
                            <a href="#about_us">{{ __('main.header_about') }}</a>
                            <a href="#warranty">{{ __('main.header_warranty') }}</a>
                            <a href="#catalog">{{ __('main.header_catalogue') }}</a>
                            <a href="#gallery">{{ __('main.header_gallery') }}</a>
                            <a href="#contact">{{ __('main.header_contacts') }}</a>
                        </div>
                        <div class="mobile__burger__created">

                        </div>
                    </div>

                    <div class="mobile__menu__placeholder">
                        <img src="{{ asset('public/images/about_placeholder1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </header>




    </div>


    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Main App JS -->
    <script src="{{ asset('public/js/main.js') }}"></script>



    <script>
        const langBtn = document.getElementById('languageButton');
        const langDropdown = document.getElementById('languageDropdown');

        langBtn?.addEventListener('click', e => {
            e.stopPropagation();
            langDropdown.style.display = langDropdown.style.display === 'block' ? 'none' : 'block';
        });

        document.addEventListener('click', e => {
            if (!e.target.closest('.header__languages')) {
                langDropdown.style.display = 'none';
            }
        });

        document.addEventListener('DOMContentLoaded', () => {

            /*************HEADER LNGUAGE**/

            /*** SELECT2 PLUGIN: Country Picker ***/
            if (typeof $ !== 'undefined' && $.fn.select2) {
                function format(item) {
                    if (!item.id) return item.text;
                    const url = 'https://hatscripts.github.io/circle-flags/flags/';
                    return $('<span>')
                        .append($('<img>', {
                            class: 'img-flag',
                            width: 26,
                            src: url + item.element.value.toLowerCase() + '.svg'
                        }))
                        .append(' ' + item.text);
                }

                $('#countries').select2({
                    placeholder: "Select Country",
                    templateResult: format,
                    templateSelection: format,
                    allowClear: true
                });
            }

            /*** GLIDE SLIDER INIT ***/
            if (typeof Glide !== 'undefined') {
                const glide = new Glide('.glide', {
                    type: 'carousel',
                    startAt: 0,
                    perView: 4,
                    focusAt: 'center',
                    gap: 40,
                    autoplay: 3000,
                    animationDuration: 800,
                    breakpoints: {
                        1024: {
                            perView: 2
                        },
                        600: {
                            perView: 1.5
                        }
                    }
                });

                glide.on('move', () => {
                    const slides = document.querySelectorAll('.glide__slide');
                    slides.forEach(slide => slide.classList.remove('is-next'));
                    const nextIndex = (glide.index + 1) % slides.length;
                    slides[nextIndex]?.classList.add('is-next');
                });

                glide.mount();
            }

            /*** MOBILE MENU TOGGLE ***/
            const burger = document.querySelector('.header__burger');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuClose = document.getElementById('mobileMenuClose');
            const mobileMenuLinks = document.querySelectorAll('.mobile-menu a');
            const body = document.body;

            burger?.addEventListener('click', () => {
                mobileMenu?.classList.add('active');
                body.style.overflow = 'hidden';
            });

            mobileMenuClose?.addEventListener('click', () => {
                mobileMenu?.classList.remove('active');
                body.style.overflow = '';
            });

            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu?.classList.remove('active');
                    body.style.overflow = '';
                });
            });

            /*** SMALL CAR ANIMATION (mobile) ***/
            setTimeout(() => {
                const car = document.querySelector('.mobile__main-car-small');
                if (car) car.style.animation = 'carAnimationSmall 3.2s ease-in-out forwards';
            }, 1000);

            /*** INTERSECTION OBSERVER FOR COUNTERS ***/
            const animateNumbers = (element, target, duration) => {
                let start = 0;
                const stepTime = Math.abs(Math.floor(duration / target));
                const timer = setInterval(() => {
                    start++;
                    element.textContent = start;
                    if (start >= target) clearInterval(timer);
                }, stepTime);
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseInt(el.getAttribute('data-target'));
                        animateNumbers(el, target, 1000);
                        observer.unobserve(el);
                    }
                });
            }, {
                threshold: 1.0
            });

            document.querySelectorAll('.map__container-desc p').forEach(p => {
                observer.observe(p);
            });

            /*** REMOVE DESKTOP WRAPPER ON MOBILE ***/
            const removeMainWrapperPC = () => {
                if (window.innerWidth < 768) {
                    const wrapper = document.querySelector('.main__wrapper.main__wrapper-pc');
                    wrapper?.remove();
                }
            };
            removeMainWrapperPC();
            window.addEventListener('resize', removeMainWrapperPC);

            /*** LANGUAGE DROPDOWN ***/
            const langBtn = document.getElementById('languageButton');
            const langDropdown = document.getElementById('languageDropdown');

            langBtn?.addEventListener('click', e => {
                e.stopPropagation();
                langDropdown.style.display = (langDropdown.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', e => {
                if (!e.target.closest('.header__languages')) {
                    langDropdown.style.display = 'none';
                }
            });
        });
    </script>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("#contact-form");
            const submitButtonContainer = document.querySelector(
                ".contact__form-submit"); // Get the button container
            const submitButton = submitButtonContainer.querySelector("button");
            const termsCheckbox = document.querySelector("input[name='consent']");
            const checkboxWrapper = document.querySelector(".custom-checkbox");

            // Function to show error message under input fields
            function showError(input, message) {
                let errorSpan = input.parentElement.querySelector(".error-message");
                if (!errorSpan) {
                    errorSpan = document.createElement("span");
                    errorSpan.classList.add("error-message");
                    errorSpan.style.color = "red";
                    errorSpan.style.fontSize = "12px";
                    input.parentElement.appendChild(errorSpan);
                }
                errorSpan.textContent = message;
                input.style.border = "2px solid red"; // Add red border
            }

            // Function to clear error message
            function clearError(input) {
                let errorSpan = input.parentElement.querySelector(".error-message");
                if (errorSpan) {
                    errorSpan.remove();
                }
                input.style.border = ""; // Remove red border
            }

            // Function to highlight checkbox error
            function highlightError(input) {
                input.style.border = "2px solid red";
            }

            // Function to clear checkbox error styling
            function clearHighlight(input) {
                input.style.border = "";
            }

            form.addEventListener("submit", function(event) {
                event.preventDefault();

                let isValid = true;

                // Get form fields
                const name = document.querySelector("#name");
                const email = document.querySelector("#email");
                const number = document.querySelector("#number");
                const country = document.querySelector("#countries");
                const message = document.querySelector("#message");

                // Validation checks
                function validateField(field, message) {
                    if (field.value.trim() === "") {
                        showError(field, message);
                        isValid = false;
                    } else {
                        clearError(field);
                    }
                }

                validateField(name, "Name is required.");
                validateField(email, "Email is required.");
                validateField(number, "Phone number is required.");
                validateField(country, "Please select a country.");
                validateField(message, "Message cannot be empty.");

                // Validate Terms Checkbox (No error message, only red border)
                if (!termsCheckbox.checked) {
                    highlightError(checkboxWrapper);
                    isValid = false;
                } else {
                    clearHighlight(checkboxWrapper);
                }

                if (!isValid) {
                    return;
                }

                // Form submission logic
                let formData = new FormData(form);
                submitButton.disabled = true;
                submitButton.textContent = "Sending...";

                fetch("{{ route('send.email') }}", {
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                .getAttribute("content"),
                            "Accept": "application/json"
                        },
                        body: formData
                    })
                    .then(response => {
                        // ✅ Handle non-strict JSON responses
                        return response.text().then(text => {
                            try {
                                return {
                                    status: response.status,
                                    body: JSON.parse(text)
                                };
                            } catch (error) {
                                console.error("JSON Parse Error:", error, "Raw response:",
                                    text);
                                return {
                                    status: response.status,
                                    body: {
                                        success: false,
                                        error: "Invalid JSON response"
                                    }
                                };
                            }
                        });
                    })
                    .then(result => {
                        console.log("Response Data:", result);

                        if (result.status === 200 && result.body.success) {
                            alert("Your message has been sent successfully!");
                            form.reset();

                            // ✅ Replace the submit button with a success message
                            submitButtonContainer.innerHTML =
                                `<p style="color: green; font-size: 16px; font-weight: bold;">✔ Email Sent Successfully!</p>`;
                        } else if (result.status === 422) {
                            console.error("Validation Error:", result.body.details);
                            alert("Validation Error: " + JSON.stringify(result.body.details));
                            submitButton.disabled = false;
                            submitButton.textContent = "SEND REQUEST";
                        } else {
                            alert("Error: " + (result.body.error || "Unknown error"));
                            submitButton.disabled = false;
                            submitButton.textContent = "SEND REQUEST";
                        }
                    })
                    .catch(error => {
                        console.error("Fetch Error:", error);
                        alert("An error occurred. Please try again.");
                        submitButton.disabled = false;
                        submitButton.textContent = "SEND REQUEST";
                    });
            });

            // Remove red border when checkbox is checked
            termsCheckbox.addEventListener("change", function() {
                if (termsCheckbox.checked) {
                    clearHighlight(checkboxWrapper);
                }
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof $ !== 'undefined' && $.fn.select2) {
                $('#countries').select2({
                    placeholder: 'Select Country',
                    width: '100%' // Match parent container
                });
            }
        });
    </script>




@endsection
