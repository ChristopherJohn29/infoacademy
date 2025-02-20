<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate of Training</title>
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
      font-family: Arial, sans-serif;
      color: #fff;
    }

    /* A4 landscape dimensions: 297mm x 210mm */
    .certificate-bg {
      width: 297mm;
      height: 210mm;
      position: relative;

      /* Option A: Use a file:// path if you prefer local filesystem references:
         background: url("file:///<?= FCPATH . 'assets/unicat/images/certificate.png' ?>") no-repeat center center; */

      /* Option B: Use base_url() if you have isRemoteEnabled = true in Dompdf: */
      background: url("<?= base_url('assets/unicat/images/certificate.png') ?>") no-repeat center center;

      background-size: cover;
    }


    /* Text styling */
    .recipient-name {
      font-size: 3.2rem;
      font-weight: bolder;
      position: absolute;
      top: 240px;
      left: 120px;
    }

    .course-title {
      font-size: 2rem;
      font-weight: bold;
      line-height: 1.4;
      max-width:55%;
      position: absolute;
      top: 435px;
      left: 150px;
    }

    .completion-info {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      line-height: 1.4;
      font-weight: bold;
      position: absolute;
    }
    
    .qr-code{
        position: absolute;
        top: 620px;
        left: 940px;
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
        $CI =& get_instance();
        // Assuming the participant ID is in the 3rd URI segment
        $participantId = $CI->uri->segment(3);
        $second = $CI->uri->segment(4);
        $third = $CI->uri->segment(5);
        // Create the verification URL (adjust the route as needed)
        $verification_url = base_url('control/view_certificate/' . $participantId.'/' .$second.'/' .$third);

        // Generate QR code URL using QR Server API
        $qr_code_url = 'https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=' . urlencode($verification_url);
      ?>
      <img src="<?= $qr_code_url ?>" alt="QR Code" class="qr-code">

    </div>
  </div>
</body>
</html>
