<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .certificate-container {
            width: 80%;
            margin: 50px auto;
            padding: 20px;
            background: url('<?=base_url()?>/assets/unicat/images/certificate.png') no-repeat center center;
            background-size: cover;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 800px; /* Adjust the height as per the image */
        }
        .certificate-title {
            font-size: 30px;
            font-weight: bold;
            margin-top: 50px;
            text-transform: uppercase;
            position: absolute;
            top: 150px;
            width: 100%;
        }
        .certificate-body {
            font-size: 20px;
            line-height: 1.6;
            position: absolute;
            top: 250px;
            width: 100%;
        }
        .certificate-body strong {
            font-size: 24px;
        }
        .certificate-footer {
            margin-top: 30px;
            font-size: 18px;
            position: absolute;
            bottom: 100px;
            width: 100%;
        }
        .signature {
            margin-top: 50px;
            font-size: 16px;
        }

        /* Print specific styles */
        @media print {
            body {
                width: 100%;
                margin: 0;
            }

            .certificate-container {
                width: 100%;
                margin: 0;
                padding: 20px;
                border: none;
                box-shadow: none;
                page-break-before: always;
                background-image: url('<?=base_url()?>/assets/unicat/images/certificate.png');
                background-size: cover;
                height: 800px; /* Adjust height for printing */
            }

            @page {
                size: landscape;
            }
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-title">
            Certificate of Training
        </div>
        <div class="certificate-body">
            <p>Presented to</p>
            <p><strong><?php echo $name; ?></strong></p>
            <p>For having successfully completed the</p>
            <p><strong><?php echo $course; ?></strong></p>
            <p>on <?php echo $date_completed; ?></p>
        </div>
        <div class="certificate-footer">
            <p><?php echo $signatory; ?></p>
            <p>Authorized Signatory</p>
        </div>
    </div>
    <script>
        // Automatically trigger print dialog
        window.print();
    </script>
</body>
</html>
