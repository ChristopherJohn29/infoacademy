<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate of Training</title>
  <style>
    /* Reset default browser margins/padding */
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      width: 100%;
      font-family: Arial, sans-serif;
    }

    /* Container with the background image */
    .certificate-bg {
      width: 100%;
      height: 100vh; /* or a fixed height if you prefer */
      background: url('<?= base_url() ?>/assets/unicat/images/certificate.jpg') no-repeat center center;
      background-size: cover;
      position: relative;
    }

    /* Content block for the certificate text */
    .certificate-content {
      position: absolute;
      top: 20%;        /* Move this up/down to fine-tune vertical alignment */
      left: 10%;       /* Move this left/right to fine-tune horizontal alignment */
      width: 50%;      /* How wide the text block should be */
      color: #fff;
    }

    /* Example styling for text elements */
    .certificate-content h1 {
      font-size: 3rem;
      margin-bottom: 0.8rem;
    }

    .certificate-content p {
      font-size: 1.2rem;
      margin-bottom: 0.8rem;
      line-height: 1.4;
    }

    .recipient-name {
      font-size: 2rem;
      font-weight: bold;
      margin: 1rem 0;
    }

    .course-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin: 1rem 0;
      line-height: 1.2;
    }

    .footer-text {
      margin-top: 2rem;
      font-size: 1rem;
      line-height: 1.4;
    }
  </style>
</head>
<body>
  <div class="certificate-bg">
    <div class="certificate-content">
      <!-- Main Title -->
      <h1>Certificate of Training</h1>

      <!-- Presented to -->
      <p>Presented to</p>

      <!-- Recipient Name -->
      <p class="recipient-name">
        <?= isset($name) ? strtoupper($name) : 'RECIPIENT NAME' ?>
      </p>

      <!-- Subtext -->
      <p>for successfully completing the course on</p>

      <!-- Course Title -->
      <p class="course-title">
        <?= isset($course) ? $course : 'Course Title Here' ?>
      </p>

      <!-- Completion Info -->
      <p>
        Completed this 
        <strong>
          <?= isset($date_completed) 
               ? date('F d, Y', strtotime($date_completed)) 
               : 'Date Here' ?>
        </strong><br>
        via INFOACADEMY E-LEARNING SYSTEM
      </p>

      <!-- Footer Text -->
      <p class="footer-text">
        This is a system generated document.<br>
        Signature is not required.
      </p>
    </div>
  </div>
</body>
</html>
