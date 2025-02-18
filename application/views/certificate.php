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
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 800px; /* Adjust the height as per the image */
        }
        .certificate-title {
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 50px;
        }
        .certificate-body {
            font-size: 20px;
            line-height: 1.6;
            margin-top: 180px;
            width: 100%;
            color: white;
        }
        .certificate-body strong {
            font-size: 24px;
        }

        .username strong{
            font-size:50px;
            margin-left: 30%;
        }

        .training strong{
            font-size:40px;
            margin-left: 35%;
            margin-top:50%;
        }

        .certificate-footer {
            font-size: 18px;
            margin-top: 60px;
        }

        /* Print specific styles */
        @media print {
            body {
                width: 100%;
                margin: 0;
                -webkit-print-color-adjust: exact; /* Force background color/image in print */
                print-color-adjust: exact; /* For newer browsers */
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
        <div class="certificate-body">
            <p class="username"><strong><?php echo $name; ?></strong></p>
            <p class="training"><strong><?php echo $course; ?></strong></p>
            <p  class="date"> <?php echo $date_completed; ?></p>
        </div>
    </div>
    <script>
        // Automatically trigger print dialog
        window.print();
    </script>
</body>
</html>
