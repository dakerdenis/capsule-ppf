<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capsule Warranty Card</title>
    <link rel="stylesheet" href="{{ asset('public/css/verification.css') }}"> <!-- Link to warranty.css -->
    <link rel="stylesheet" href="{{ asset('public/css/warranty.css') }}"> <!-- Link to warranty.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
</head>

<body>
    <div class="container">
        <div class="warranty__name-main">Capsule Warranty Card</div>

        <div class="logos">
            <div class="logos_img ">
                <img src="{{ asset('public/images/warranty_logo.png') }}" alt="Capsule Logo">
            </div>
            <div class="logos_img">
                <img src="{{ asset('public/' . $warranty->service->logo) }}" alt="Service Logo">

            </div>
        </div>

        <h2 class="warranty__name-name">Client Information</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="client-name">Client Name:</label>
                <div class="warranty-input-container">
                    <input type="text" id="client-name" name="client_name" value="{{ $warranty->client_name }}"
                        readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="client-phone">Client Phone Number:</label>
                <div class="warranty-input-container">
                    <input type="text" id="client-phone" name="client_phone" value="{{ $warranty->client_number }}"
                        readonly>
                </div>
            </div>
        </div>

        <h2 class="warranty__name-name">Car Information</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="car-model">Brand:</label>
                <div class="warranty-input-container">
                    <input type="text" id="car-model" name="car_model" value="{{ $warranty->car_model }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="car-make">Model:</label>
                <div class="warranty-input-container">
                    <input type="text" id="car-make" name="car_make" value="{{ $warranty->car_make }}" readonly>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="car-color">Car Color:</label>
                <div class="warranty-input-container">
                    <input type="text" id="car-color" name="car_color" value="{{ $warranty->car_color }}" readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="car-year">Year of Manufacture:</label>
                <div class="warranty-input-container">
                    <input type="text" id="car-year" name="car_year" value="{{ $warranty->manufacture_year }}"
                        readonly>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="license-plate">License Plate Number:</label>
                <div class="warranty-input-container">
                    <input type="text" id="license-plate" name="license_plate"
                        value="{{ $warranty->license_plate_number }}" readonly>
                </div>
            </div>
        </div>

        <h2 class="warranty__name-name">Installer Information</h2>
        <div class="form-row">
            <div class="form-group non-editable">
                <label for="service-name">Service Name:</label>
                <div class="warranty-input-container">
                    <input type="text" id="service-name" name="service_name" value="{{ $warranty->service->name }}"
                        readonly>
                </div>
            </div>
            <div class="form-group">
                <label for="manager-name">Master Name:</label>
                <div class="warranty-input-container">
                    <input type="text" id="manager-name" name="manager_name" value="{{ $warranty->master_name }}"
                        readonly>
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group non-editable">
                <label for="service-name">Service's manager:</label>
                <div class="warranty-input-container">
                    <input type="text" id="service-name" name="service_name" value="{{ $warranty->service->description }}"
                        readonly>
                </div>
            </div>
        </div>


        <div class="form-row">
            <div class="form-group non-editable">
                <label for="service-phone">Service Phone Number:</label>
                <div class="warranty-input-container">
                    <input type="text" id="service-phone" name="service_phone"
                        value="{{ $warranty->service_phone_number }}" readonly>
                </div>
            </div>
            <div class="form-group non-editable">
                <label for="license-number">Product Code:</label>
                <div class="warranty-input-container">
                    <input type="text" id="license-number" name="license_number"
                        value="{{ $warranty->product_code }}" readonly>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group non-editable">
                <label for="service_country">Country of service:</label>
                <div class="warranty-input-container">
                    <input type="text" id="service_country" name="service_country"
                        value="{{ $warranty->service_country }}" readonly>
                </div>
            </div>
            <div class="form-group non-editable">
                <label for="service_city">City of service:</label>
                <div class="warranty-input-container">
                    <input type="text" id="service_city" name="service_city"
                        value="{{ $warranty->service_city }}" readonly>
                </div>
            </div>

        </div>


        <div class="form-group non-editable">
            <label for="installation-date">Installation Date:</label>
            <div class="warranty-input-container">
                <input type="text" id="installation-date" name="installation_date"
                    value="{{ $warranty->installation_date }}" readonly>
            </div>
        </div>

        <h2 class="warranty__name-name">Film and Warranty Information</h2>
        <div class="form-row">
            <div class="form-group non-editable">
                <label for="brand-name">Brand Name:</label>
                <div class="warranty-input-container">
                    <input type="text" id="brand-name" name="brand_name" value="{{ $warranty->brand_name }}"
                        readonly>
                </div>
            </div>
            <div class="form-group non-editable">
                <label for="film-model">Film Model:</label>
                <div class="warranty-input-container">
                    <input type="text" id="film-model" name="film_model" value="{{ $warranty->film_model }}"
                        readonly>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group non-editable">
                <label for="warranty-period">Warranty Period:</label>
                <div class="warranty-input-container">
                    <input type="text" id="warranty-period" name="warranty_period"
                        value="{{ $warranty->warranty_model }}" readonly>
                </div>
            </div>
            <div class="form-group non-editable">
                <label for="service-life">Lifespan:</label>
                <div class="warranty-input-container">
                    <input type="text" id="service-life" name="service_life"
                        value="{{ $warranty->service_life }}" readonly>
                </div>
            </div>
        </div>
        <div class="form-group non-editable">
            <label for="warranty-end-date">Warranty End Date:</label>
            <div class="warranty-input-container">
                <input type="text" id="warranty-end-date" name="warranty_end_date"
                    value="{{ $warranty->warranty_end_date }}" readonly>
            </div>
        </div>

        <h2 class="warranty__name-name">Client Code</h2>
        <div class="form-group non-editable">
            <label for="client-code">Client/Document Code:</label>
            <div class="warranty-input-container">
                <input type="text" id="client-code" name="client_code" value="{{ $warranty->client_code }}"
                    readonly>
            </div>
        </div>
        <br>
        <!-- Warranty Images Section -->
        <!-- Warranty Images Section -->
<!-- Warranty Images Section -->
<div class="warranty-images-row" style="display: flex; gap: 10px; margin-top: 20px; flex-wrap: wrap;">
    @if (!empty($warranty->images_array) && is_array($warranty->images_array))
        @foreach ($warranty->images_array as $image)
            <a href="{{ asset('public/'.$image) }}" data-fancybox="gallery" data-caption="Warranty Image">
                <div class="image-container"
                    style="width: 300px; height: 150px; overflow: hidden; border: 1px solid #ddd; border-radius: 5px;">
                    <img src="{{ asset('public/'.$image) }}" alt="Warranty Image"
                        style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </a>
        @endforeach
    @else
        <p>No images available for this warranty.</p>
    @endif
</div>


        <br>
        <div class="warranty__desc-text">
            <h2 style="    margin-top: 20px;
    font-weight: 600;
    font-size: 23px;">Warranty Conditions</h2>
            <br>
            Capsule PPF provides a warranty for protective films exclusively against the following defects:


            <p>Clouding (loss of transparency).</p>

            <p>Cracking (appearance of cracks on the surface).</p>

            <p>Delamination (separation of film layers).</p>

            <p>Bubble formation (if not caused by improper installation).</p>

            <p>Cases Where the Warranty Does Not Apply</p>

            <p>Capsule PPF is not responsible for and does not cover warranty claims in the following cases:</p>

            <p>Improper installation (violation of installation technology, installation by unauthorized technicians).
            </p>

            <p>Mechanical damage (scratches, cuts, impacts, accidents).</p>

            <p>Exposure to aggressive chemicals (solvents, abrasive cleaning agents, acidic and alkaline substances).
            </p>

            <p>Failure to follow operating conditions (excessive heating, frequent use of automatic car washes with hard
                brushes, improper cleaning methods).</p>

            <p>Attempts at self-removal or unqualified repairs.</p>

            <p>Changes in the vehicle's paintwork under the film (if the damage occurred due to pre-existing defects in
                the
                paintwork before film installation).</p>

            <br>
            <p>Warranty Claim Process</p>

            <p>To submit a warranty claim, you must visit the center where the film was installed and provide your
                unique
                customer code, which was issued by the Dual Digital Shield system during installation.</p>

            <p>If the installation center has closed, you can contact the official Capsule PPF representative in your
                region for further assistance.</p>
            <br>
            Local support in Azerbaijan: +994 997 79 79 60

        </div>

        <div class="button-container" style="margin-top: 20px;">
            <a href="{{ route('service.warranty.pdf', $warranty->id) }}" class="btn btn-primary">Save as PDF</a>
            <button id="print" class="button" onclick="window.print();">Print</button>
            <button id="share-whatsapp" class="button" onclick="shareViaWhatsApp()">Share to WhatsApp</button>
            <button id="share-telegram" class="button" onclick="shareViaTelegram()">Share to Telegram</button>
        </div>
    </div>

    <script>
        // Save as PDF
        document.getElementById('save-pdf').addEventListener('click', function() {
            const element = document.querySelector('.container'); // Select the container to export
            const opt = {
                margin: 1,
                filename: 'Capsule_Warranty_Card.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf().set(opt).from(element).save();
        });

        // Share to WhatsApp
        function shareViaWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const message = encodeURIComponent("Check out this warranty card: ");
            window.open(`https://wa.me/?text=${message}${url}`, '_blank');
        }

        // Share to Telegram
        function shareViaTelegram() {
            const url = encodeURIComponent(window.location.href);
            const message = encodeURIComponent("Check out this warranty card: ");
            window.open(`https://t.me/share/url?url=${url}&text=${message}`, '_blank');
        }
    </script>
    <!-- Include Fancybox JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

<!-- Initialize Fancybox -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Fancybox.bind("[data-fancybox='gallery']", {
            Thumbs: {
                autoStart: true
            },
            Toolbar: {
                display: ["zoom", "download", "close"]
            }
        });
    });
</script>
</body>

</html>
