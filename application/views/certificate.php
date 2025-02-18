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

    .certificate-container {
      /* Flex to center the text block */
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      width: 100%;
      height: 100%;
      padding: 2rem;
    }

    /* Text styling */
    .recipient-name {
      font-size: 3.2rem;
      font-weight: bolder;
      margin-bottom: 1.5rem;
      margin-top: 4.5rem;
    }

    .course-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
      line-height: 1.4;
    }

    .completion-info {
      font-size: 1rem;
      margin-bottom: 2rem;
      line-height: 1.4;
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
             : 'Date Here' ?>
      </div>
    </div>
  </div>
</body>
</html>
