<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>InfoAcademy Certificate of Training</title>
  <style>
    /* Tell Dompdf we want no margins and an A4 landscape page */
    @page {
      margin: 0;
      size: A4 landscape;
    }

    /* Reset basic styling */
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      font-family: 'Roboto', 'Arial', sans-serif;
      color: #fff;
    }

    /* Import Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap');

    /* A4 landscape dimensions: 297mm x 210mm */
    .certificate-bg {
      width: 297mm;
      height: 210mm;
      position: relative;

      /* Option A: Use a file:// path if you prefer local filesystem references:
         background: url("file:///<?= FCPATH . 'assets/unicat/images/newcert.jpg' ?>") no-repeat center center; */

      /* Option B: Use base_url() if you have isRemoteEnabled = true in Dompdf: */
      background: url("<?= base_url('assets/unicat/images/newcert.jpg') ?>") no-repeat center center;

      background-size: cover;
    }


    /* Text styling */
    .recipient-name {
      font-size: 2.5rem;
      font-weight: bold;
      position: absolute;
      top: 180px; /* Adjusted to match the image */
      left: 0;
      width: 100%;
      text-align: center;
      color: #f3cf83; /* Brighter gold color for the name */
      text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    }

    .course-title {
      font-size: 1.7rem;
      font-weight: bold;
      line-height: 1.4;
      max-width: 95%;
      position: absolute;
      top: 300px; /* Adjusted to match the image */
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      color: white;
    }

    .completion-info {
      font-size: 1.3rem;
      font-weight: bold;
      position: absolute;
      top: 467px; /* Adjusted to match the image */
      left: 50%;
      transform: translateX(-50%);
      text-align: center;
      color: white;
    }

    .qr-code {
      position: absolute;
      top: 650px;
      left: 62px;
      width: 160px;
      height: 160px;
    }

  </style>
</head>
<body>
  <div class="certificate-bg">
    <div class="certificate-container">
      <!-- Recipient Name -->
      <div class="recipient-name">
        <?= isset($name) ? strtoupper($name) : 'RECIPIENT NAME' ?>
      </div>

      <!-- Course Title -->
      <div class="course-title">
        <?= isset($course) ? $course : 'Your Course Title Here' ?>
      </div>

      <!-- Completion Info -->
      <div class="completion-info">
        <?= isset($date_completed)
             ? date('F d, Y', strtotime($date_completed))
             : '' ?>
      </div>

      <?php
        // Get the CodeIgniter instance to access URI segments
        $data = "Training Title: " . $course . "\nDate Accomplished: " . $date_completed . "\nNo. of Hours: " . $required_no_of_hours;

        // Generate QR code URL using QR Server API
        $qr_code_url = 'https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' . urlencode($data);
      ?>
      <img src="<?= $qr_code_url ?>" alt="QR Code" class="qr-code">

    </div>
  </div>
</body>
</html>
