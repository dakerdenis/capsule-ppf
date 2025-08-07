@extends('layouts.app')

@section('title', 'Capsule - car proection')

@section('content')
    <!-- Подключение стиля -->
    <link rel="stylesheet" href="{{ asset('public/css/verification.css') }}">
    <style>
        .catalog {
            margin-top: 150px;
        }

        .header__nav__element-catalog {
            background-color: rgba(0, 0, 0, 0);
            color: #fff;

            font-size: 20px;
            font-weight: 600;
            line-height: 24.2px;
            text-align: left;
            text-underline-position: from-font;
            text-decoration-skip-ink: none;
            width: initial;
            height: initial;
        }
        .header_rectangle{
            display: none;
            visibility: hidden;
        }
    </style>
    <div class="main__container">
        <!---header-->
        <header class="header" id="header">
            <div class="header__wrapper">
                <a  class="header__wrapper__image-a" href="{{ url(app()->getLocale()) }}">
                    <img src="{{ asset('public/images/logo_main.png') }}" alt="">
                </a>

                <div class="header__navigation">
                    <div class="header__nav__burger">
                        <img src="{{ asset('public/images/circum_menu-burger.png') }}" alt="" srcset="">
                    </div>
                    <div class="header__nav__element">
                        <a class="header__nav__element-catalog"
                            href="{{ url(app()->getLocale() . '#home') }}">{{ __('main.header_home') }}</a>
                    </div>
                    <div class="header__nav__element">
                        <a class="header__nav__element-catalog"
                            href="{{ url(app()->getLocale() . '#about_us') }}">{{ __('main.header_about') }}</a>
                    </div>
                    <div class="header__nav__element">
                        <a class="header__nav__element-catalog"
                            href="{{ url(app()->getLocale() . '#warranty') }}">{{ __('main.header_warranty') }}</a>
                    </div>
                    <div class="header__nav__element">
                        <a class="header__nav__element-catalog"
                            href="{{ url(app()->getLocale() . '#gallery') }}">{{ __('main.header_gallery') }}</a>
                    </div>
                    <div class="header__nav__element">
                        <button data-target="contact">Contacts</button>
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
                                        <a class="header__nav__element-catalog"
                                        href="{{ url(app()->getLocale() . '#home') }}">{{ __('main.header_home') }}</a>
                                        <a class="header__nav__element-catalog"
                                        href="{{ url(app()->getLocale() . '#about_us') }}">{{ __('main.header_about') }}</a>
                                        <a class="header__nav__element-catalog"
                                        href="{{ url(app()->getLocale() . '#warranty') }}">{{ __('main.header_warranty') }}</a>
                                        <a class="header__nav__element-catalog"
                                        href="{{ url(app()->getLocale() . '#gallery') }}">{{ __('main.header_gallery') }}</a>
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

        <section class="car_number-check" id="car_number-check">
            <div class="car_number-name">
                <p>warranty by the car number</p>
            </div>
            <div class="car_number-wrapper">
                <!----FORM and responce--->
                <div class="car__number-form">
                    <form action="">
                        <div class="car__number-form-name">
                            Enter the Car Number
                        </div>
                        <div class="car__number-form-inputs">
                            <div class="car__number-form-input">
                                <input type="text" name="car_number" id="car_number" maxlength="7">
                            </div>
                            <div class="car__number-form-button">
                                <button><p>check now</p></button>
                            </div>
                        </div>
                    </form>
                    <div class="car__number-answer">
                        <!---answer block-->
                        <div class="car__answer-block">
                            <!--success---->
                            <div class="car__answer-responce">                                
                                <div class="car_responce__wrapper">
                                    <span></span>
                                <p>Warranty found ! </p>
                                </div>
                            </div>
                            <!--fail-->
                            <div class="car__answer-responce failed">       
                                <div class="car_responce__wrapper">
                                    <span></span>
                                    <p>Warranty not found ! </p>          
                                </div>                  
                            </div>
                            <div class="car__answer-text">
                                Warranty was found in our database: <br>
                                <!---Link for warranty--->
                                <a href="#">
                                    See warranty
                                </a>
                            </div>
                        </div>
                        <!---answer block-->
                    </div>
                </div>
                <!-----car and licence number-->
                <div class="car__number-car">
                    <div class="car__number-car-image">
                        <img src="{{ asset('public/images/car-number-car.png') }}" alt="">
                    </div>
                    <div class="car__number-car-number">
                        <span></span>
                    </div>
                </div>
            </div>
        </section>


        <!---COntact US----->
        <section class="contact" id="contact">
            <div class="contact_wrapper">
                <div class="contact_wrapper__animation">
                    <div class="contact__text__block">
                        <img src="{{ asset('public/images/contact_us.png') }}" alt="">
                    </div>
                    <div class="contact__car__block">
                        <img src="{{ asset('public/images/contact_car.png') }}" alt="">
                    </div>
                </div>

                <div class="contact__main__container">
                    <div class="contact__form__container">
                        <form id="contact-form">
                            @csrf
                            <div class="contact__form__name-message">
                                <div class="contact__form__block name">
                                    <div class="contact__form__block-name">
                                        Name
                                    </div>
                                    <div class="contact__form__block-input">
                                        <input type="text" name="name" id="name" placeholder="Your name">
                                    </div>
                                </div>

                                <div class="contact__form__block message">
                                    <div class="contact__form__block-name">
                                        How can we help you?
                                    </div>
                                    <div class="contact__form__block-input">
                                        <textarea placeholder="Leave your message" name="message" id="message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="contact__form__number-country">
                                <div class="contact__form__block number">
                                    <div class="contact__form__block-name">
                                        Number
                                    </div>
                                    <div class="contact__form__block-input">
                                        <input type="text" inputmode="numeric" pattern="[0-9]*" name="number"
                                            id="number" placeholder="Your mobile number" required>

                                    </div>
                                </div>

                                <div class="contact__form__block contact__form__block-country country">
                                    <div class="contact__form__block-name">
                                        Country
                                    </div>
                                    <div class="contact__form__block-input">
                                        <select class="contact__form__block-select" name="countries" id="countries">
                                            <option value="" disabled selected>Select Country</option>
                                            <option value="US">United States</option>
                                            <option value="CA">Canada</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="AU">Australia</option>
                                            <option value="DE">Germany</option>
                                            <option value="FR">France</option>
                                            <option value="IT">Italy</option>
                                            <option value="ES">Spain</option>
                                            <option value="RU">Russia</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="PL">Poland</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="BE">Belgium</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="NO">Norway</option>
                                            <option value="DK">Denmark</option>
                                            <option value="FI">Finland</option>
                                            <option value="IE">Ireland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="SK">Slovakia</option>
                                            <option value="HU">Hungary</option>
                                            <option value="RO">Romania</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="GR">Greece</option>
                                            <option value="TR">Turkey</option>
                                            <option value="IL">Israel</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="IN">India</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="CN">China</option>
                                            <option value="JP">Japan</option>
                                            <option value="KR">South Korea</option>
                                            <option value="VN">Vietnam</option>
                                            <option value="TH">Thailand</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="PH">Philippines</option>
                                            <option value="BR">Brazil</option>
                                            <option value="AR">Argentina</option>
                                            <option value="MX">Mexico</option>
                                            <option value="CL">Chile</option>
                                            <option value="CO">Colombia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="EG">Egypt</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="KE">Kenya</option>
                                            <option value="GE">Georgia</option>
                                            <option value="TT">Other</option>
                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="contact__form__email-contact">
                                <div class="contact__form__block email">
                                    <div class="contact__form__block-name">
                                        E-mail
                                    </div>
                                    <div class="contact__form__block-input">
                                        <input type="email" name="email" id="email"
                                            placeholder="Your mobile number">
                                    </div>
                                </div>

                                <div class="contact__form__block method">
                                    <div class="contact__form__block-name">
                                        How can we contact you?
                                    </div>
                                    <div class="contact__form__block-input">
                                        <div class="radio-group">
                                            <label class="radio">
                                                <input type="radio" name="contact-method" value="email" />
                                                <span class="radio-label">E-Mail</span>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="contact-method" value="phone" />
                                                <span class="radio-label">Phone</span>
                                            </label>
                                            <label class="radio">
                                                <input type="radio" name="contact-method" value="both" />
                                                <span class="radio-label">Both</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="contact__from-terms">
                                <div class="checkbox-wrapper">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="consent" />
                                        <span class="checkbox-label"></span>
                                    </label>
                                    <span class="checkbox-text">
                                        I give my consent to the processing of personal data in accordance with the <a
                                            href="#">Terms*</a>
                                    </span>
                                </div>

                            </div>



                            <div class="contact__form-submit">
                                <button type="submit">
                                    SEND REQUEST
                                </button>
                            </div>
                        </form>
                        <div class="contact__form__container-blur"></div>
                        <div class="contact__form__container-bg"></div>
                    </div>

                    <div class="contact__map__logo">
                        <div class="contact__map-logo">
                            <img src="{{ 'public/images/logo_main.png' }}" alt="" srcset="">
                        </div>

                        <div class="contact__map-map">


                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3104.5949588474564!2d-77.0222031!3d38.91037680000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sru!2saz!4v1735153252338!5m2!1sru!2saz"
                                width="100%" height="100%" style="border: none;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Google Maps - Capsule Location"></iframe>
                        </div>
                    </div>

                    <div class="contact__adress__block">
                        <div class="contact__adress__element">
                            <div class="contact__adress__name">
                                Address:
                            </div>
                            <div class="contact__adress__content">
                                635 E 28th Street Brooklyn NY 11210
                            </div>
                        </div>
                        <div class="contact__adress__element">
                            <div class="contact__adress__name">
                                Phone:
                            </div>
                            <div class="contact__adress__content">
                                +1 (302) 853-3979
                            </div>
                        </div>
                        <div class="contact__adress__element">
                            <div class="contact__adress__name">
                                Email:
                            </div>
                            <div class="contact__adress__content">
                                contact@capsule.com
                            </div>
                        </div>
                    </div>
                </div>



                <div class="footer__copyright">
                    <p>Copyright {{ date('Y') }} &copy;</p>
                </div>


            </div>
        </section>
    </div>
    <script src="{{ asset('../public/js/main.js') }}"></script>







    <script>
        function format(item, state) {
            if (!item.id) {
                return item.text;
            }
            var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
            var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
            var url = state ? stateUrl : countryUrl;
            var img = $("<img>", {
                class: "img-flag",
                width: 26,
                src: url + item.element.value.toLowerCase() + ".svg"
            });
            var span = $("<span>", {
                text: " " + item.text
            });
            span.prepend(img);
            return span;
        }

        $(document).ready(function() {
            $("#countries").select2({
                templateResult: function(item) {
                    return format(item, false);
                }
            });
            $("#us-states").select2({
                templateResult: function(item) {
                    return format(item, true);
                }
            });
        });
    </script>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.getElementById("car_number");
        const span = document.querySelector(".car__number-car-number span");

        input.addEventListener("input", function () {
            // Обрезаем до 7 символов
            input.value = input.value.toUpperCase().substring(0, 7);
            span.textContent = input.value;
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('.car__number-form form');
        const input = document.querySelector('#car_number');
        const successBlock = document.querySelector('.car__answer-responce:not(.failed)');
        const failBlock = document.querySelector('.car__answer-responce.failed');
        const answerTextBlock = document.querySelector('.car__answer-text');

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const licensePlate = input.value.trim().toUpperCase();

            // Скрываем оба блока перед запросом
            successBlock.style.display = 'none';
            failBlock.style.display = 'none';
            answerTextBlock.style.display = 'none';

            // Проверка на пустой ввод
            if (!licensePlate) {
                failBlock.style.display = 'block';
                answerTextBlock.style.display = 'block';
                answerTextBlock.innerHTML = `
                    Warranty was not found in our database. Please contact our official service in your country or try again.
                `;
                return;
            }

            try {
                const response = await fetch("{{ route('user.check') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        license_plate_number: licensePlate
                    })
                });

                const data = await response.json();

                // Показываем результат в зависимости от ответа
                if (data.exists) {
                    successBlock.style.display = 'block';
                    failBlock.style.display = 'none';
                    answerTextBlock.style.display = 'block';
                    answerTextBlock.innerHTML = `
                        Warranty was found in our database: <br>
                        <a href="${data.warranty_link}" class="warranty_car-link" target="_blank">See warranty</a>
                    `;
                } else {
                    successBlock.style.display = 'none';
                    failBlock.style.display = 'block';
                    answerTextBlock.style.display = 'block';
                    answerTextBlock.innerHTML = `
                        Warranty was not found in our database.
                    `;
                }
            } catch (error) {
                console.error('Error checking warranty:', error);
                successBlock.style.display = 'none';
                failBlock.style.display = 'block';
                answerTextBlock.style.display = 'block';
                answerTextBlock.innerHTML = `
                    Warranty was not found in our database.
                `;
            }
        });
    });
</script>


@endsection


