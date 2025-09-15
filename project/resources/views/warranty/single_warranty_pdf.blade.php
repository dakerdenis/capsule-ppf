<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warranty #{{ $warranty->id }}</title>
    <style>
        @font-face {
            font-family: 'notosans';
            src: url("{{ resource_path('fonts/NotoSans-Regular.ttf') }}") format("truetype");
        }

        body {
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
            font-family: "notosans", sans-serif;
        }

        .container {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }

        h2 {
            color: #333333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        .warranty__name-main {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #555555;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            color: #555555;
            display: block;
        }

        .form-group p {
            font-size: 14px;
            color: #333333;
            background: #f2f2f2;
            padding: 8px;
            border-radius: 4px;
            margin: 0;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
        }

        .form-row .form-group {
            flex: 0 0 48%;
        }

        .logos {
            display: flex;
            width: 100%;
            justify-content: space-between;
            flex-direction: row;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .logos_img {
            height: 80px;

        }

        img {
            height: 100%;
            object-fit: contain;
        }

        .logos_img-capsule {}
    </style>
</head>

<body>
    <div class="container">
        <div class="warranty__name-main">Capsule Warranty Card</div>

        <div class="logos" style="height: 120px; display: flex; justify-content: space-between;">
            <div class="logos_img ">
                <img src="{{ public_path('images/warranty_logo.png') }}" alt="Capsule Logo">
            </div>

        </div>

        <h2>Client Information</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Client Name:</label>
                <p>{{ $warranty->client_name }}</p>
            </div>
            <div class="form-group">
                <label>Client Phone Number:</label>
                <p>{{ $warranty->client_number }}</p>
            </div>
        </div>

        <h2>Car Information</h2>
        <div class="form-row">
            <div class="form-group">
                <label>Brand:</label>
                <p>{{ $warranty->car_model }}</p>
            </div>
            <div class="form-group">
                <label>Model:</label>
                <p>{{ $warranty->car_make }}</p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Car Color:</label>
                <p>{{ $warranty->car_color }}</p>
            </div>
            <div class="form-group">
                <label>Year of Manufacture:</label>
                <p>{{ $warranty->manufacture_year }}</p>
            </div>
        </div>
        <div class="form-group">
            <label>License Plate Number:</label>
            <p>{{ $warranty->license_plate_number }}</p>
        </div>
        <br> <br>
        <br>
        <br> <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h2>Car Images</h2>
        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
            @if (!empty($warranty->images_array) && is_array(json_decode($warranty->images_array, true)))
                @foreach (json_decode($warranty->images_array, true) as $image)
                    <div style="width: 300px; height: 150px;  overflow: hidden;">
                        <img src="{{ public_path($image) }}" alt="Warranty Image"
                            style=" height: 100%; object-fit: cover;">
                    </div>
                    <br>
                @endforeach
            @else
                <p>No images available for this warranty.</p>
            @endif
        </div>

        <br> <br> <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br> <br>
        <br>
        <br> <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h2>Installer Information</h2>
        <br>
        <div class="logos_img">
            <img src="{{ public_path($warranty->service->logo) }}" alt="Service Logo">
        </div>
        <br>
        <div class="form-row">
            <div class="form-group">
                <label>Service Name:</label>
                <p>{{ $warranty->service->name }}</p>
            </div>
            <div class="form-group">
                <label>Master Name:</label>
                <p>{{ $warranty->master_name }}</p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label>Service's manager:</label>
                <p>{{ $warranty->service->description }}</p>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Service Phone Number:</label>
                    <p>{{ $warranty->service_phone_number }}</p>
                </div>
                <div class="form-group">
                    <label>Product Code:</label>
                    <p>{{ $warranty->product_code }}</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Service's country location:</label>
                    <p>{{ $warranty->service->country ?? 'N/A' }}</p>
                </div>
                <div class="form-group">
                    <label>Service's city location:</label>
                    <p>{{ $warranty->service->city ?? 'N/A' }}</p>
                </div>
            </div>
            <div class="form-group">
                <label>Installation Date:</label>
                <p>{{ $warranty->installation_date }}</p>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br> <br>
            <br>
            <br>
            <br> <br><br>

            <h2>Film and Warranty Information</h2>
            <div class="form-row">
                <div class="form-group">
                    <label>Brand Name:</label>
                    <p>{{ $warranty->brand_name }}</p>
                </div>
                <div class="form-group">
                    <label>Film Model:</label>
                    <p>{{ $warranty->film_model }}</p>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Warranty Period:</label>
                    <p>{{ $warranty->warranty_model }}</p>
                </div>
                <div class="form-group">
                    <label>Lifespan:</label>
                    <p>{{ $warranty->service_life }}</p>
                </div>
            </div>
            <div class="form-group">
                <label>Warranty End Date:</label>
                <p>{{ $warranty->warranty_end_date }}</p>
            </div>

            <h2>Client Code</h2>
            <div class="form-group">
                <label>Client/Document Code:</label>
                <p>{{ $warranty->client_code }}</p>
            </div>

            <div style="  width: 100%;
  text-align: left;
  font-size: 14px;
  line-height: 17px;"
                class="warranty__desc-text">
                <h2 style="margin-top: 20px;
            font-weight: 600;
            font-size: 23px;">Warranty
                    Conditions</h2>
                <br>
                Capsule PPF provides a warranty for protective films exclusively against the following defects:

                <p>Clouding (loss of transparency).</p>

                <p>Cracking (appearance of cracks on the surface).</p>

                <p>Delamination (separation of film layers).</p>

                <p>Bubble formation (if not caused by improper installation).</p>

                <p>Cases Where the Warranty Does Not Apply</p>

                <p>Capsule PPF is not responsible for and does not cover warranty claims in the following cases:</p>

                <p>Improper installation (violation of installation technology, installation by unauthorized
                    technicians).
                </p>

                <p>Mechanical damage (scratches, cuts, impacts, accidents).</p>

                <p>Exposure to aggressive chemicals (solvents, abrasive cleaning agents, acidic and alkaline
                    substances).
                </p>

                <p>Failure to follow operating conditions (excessive heating, frequent use of automatic car washes with
                    hard
                    brushes, improper cleaning methods).</p>

                <p>Attempts at self-removal or unqualified repairs.</p>

                <p>Changes in the vehicle's paintwork under the film (if the damage occurred due to pre-existing defects
                    in
                    the
                    paintwork before film installation).</p>

                <br>
                <p>Warranty Claim Process</p>

                <p>To submit a warranty claim, you must visit the center where the film was installed and provide your
                    unique
                    customer code, which was issued by the Dual Digital Shield system during installation.</p>

                <p>If the installation center has closed, you can contact the official Capsule PPF representative in
                    your
                    region for further assistance.</p>
                <br>
                Local support in Azerbaijan: +994 997 79 79 60
            </div>
        </div>
</body>

</html>
