<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capsule Warranty Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .logos {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .logos div {
            width: 48%;
            text-align: center;
            border: 1px dashed #ccc;
            padding: 10px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .form-group {
            width: 48%;
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .photo-upload {
            margin-bottom: 15px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .non-editable {
            background-color: #f5f5f5;
            pointer-events: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Capsule Warranty Card</h1>

        <div class="logos">
            <div>Capsule Logo</div>
            <div>Service Logo</div>
        </div>

        <h2>Client Information</h2>
        <div class="form-row">
            <div class="form-group">
                <label for="client-name">Client Name:</label>
                <input type="text" id="client-name" name="client-name" placeholder="Enter client name">
            </div>
            <div class="form-group">
                <label for="client-phone">Client Phone Number:</label>
                <input type="text" id="client-phone" name="client-phone" placeholder="Enter client phone number">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="car-model">Car Model:</label>
                <input type="text" id="car-model" name="car-model" placeholder="Enter car model">
            </div>
            <div class="form-group">
                <label for="car-make">Car Make:</label>
                <input type="text" id="car-make" name="car-make" placeholder="Enter car make">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="car-color">Car Color:</label>
                <input type="text" id="car-color" name="car-color" placeholder="Enter car color">
            </div>
            <div class="form-group">
                <label for="car-year">Year of Manufacture:</label>
                <input type="text" id="car-year" name="car-year" placeholder="Enter year of manufacture">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="license-plate">License Plate Number:</label>
                <input type="text" id="license-plate" name="license-plate" placeholder="Enter license plate number">
            </div>
        </div>

        <h2>Installer Information</h2>
        <div class="form-row">
            <div class="form-group non-editable">
                <label for="service-name">Service Name:</label>
                <input type="text" id="service-name" name="service-name" value="System Generated" readonly>
            </div>
            <div class="form-group">
                <label for="manager-name">Manager/Master Name:</label>
                <input type="text" id="manager-name" name="manager-name" placeholder="Enter manager or master name">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group non-editable">
                <label for="service-phone">Service Phone Number:</label>
                <input type="text" id="service-phone" name="service-phone" value="System Generated" readonly>
            </div>
            <div class="form-group non-editable">
                <label for="license-number">License Number:</label>
                <input type="text" id="license-number" name="license-number" value="System Generated" readonly>
            </div>
        </div>

        <div class="form-group non-editable">
            <label for="installation-date">Installation Date:</label>
            <input type="text" id="installation-date" name="installation-date" value="System Generated" readonly>
        </div>

        <h2>Film and Warranty Information</h2>
        <div class="form-row">
            <div class="form-group non-editable">
                <label for="brand-name">Brand Name:</label>
                <input type="text" id="brand-name" name="brand-name" value="Capsule" readonly>
            </div>
            <div class="form-group non-editable">
                <label for="film-model">Film Model:</label>
                <input type="text" id="film-model" name="film-model" value="Urban" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group non-editable">
                <label for="warranty-period">Warranty Period:</label>
                <input type="text" id="warranty-period" name="warranty-period" value="3 Years" readonly>
            </div>
            <div class="form-group non-editable">
                <label for="service-life">Service Life:</label>
                <input type="text" id="service-life" name="service-life" value="5 Years" readonly>
            </div>
        </div>

        <div class="form-group non-editable">
            <label for="warranty-end-date">Warranty End Date:</label>
            <input type="text" id="warranty-end-date" name="warranty-end-date" value="System Generated" readonly>
        </div>

        <div class="form-group non-editable">
            <label for="client-code">Client/Document Code:</label>
            <input type="text" id="client-code" name="client-code" value="System Generated" readonly>
        </div>

        <div class="form-group photo-upload">
            <label for="installation-photos">Installation Photos:</label>
            <input type="file" id="installation-photos" name="installation-photos" multiple accept="image/*">
        </div>

        <button class="submit-btn">Submit</button>
    </div>
</body>

</html>