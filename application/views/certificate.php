<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Certificate</title>
  <style>
    /* Basic resets */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }

    /* Certificate container with background image */
    .certificate-container {
      position: relative;
      width: 1000px; /* Adjust to match your image's aspect ratio */
      height: 700px; /* Adjust to match your image's aspect ratio */
      margin: 40px auto;
      background: url('<?=base_url()?>/assets/unicat/images/certificate.png') no-repeat center center;
      background-size: cover;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    /* Example of absolutely positioned elements */
    .certificate-title {
      position: absolute;
      top: 40px;
      left: 50px;
      font-size: 36px;
      font-family: "Segoe Script", cursive; /* or any fancy font you prefer */
      color: #fff;
    }

    .presented-to {
      position: absolute;
      top: 100px;
      left: 50px;
      font-size: 24px;
      color: #fff;
    }

    .recipient-name {
      position: absolute;
      top: 150px;
      left: 50px;
      font-size: 50px;
      font-weight: bold;
      color: #fff;
    }

    .course-title {
      position: absolute;
      top: 220px;
      left: 50px;
      font-size: 28px;
      color: #fff;
    }

    .description {
      position: absolute;
      top: 270px;
      left: 50px;
      font-size: 18px;
      width: 800px; /* so it doesn't run too wide */
      line-height: 1.4;
      color: #fff;
    }

    .date-completed {
      position: absolute;
      bottom: 80px;
      left: 50px;
      font-size: 18px;
      color: #fff;
    }

    .footer-text {
      position: absolute;
      bottom: 40px;
      left: 50px;
      font-size: 16px;
      color: #fff;
    }

    /* Print-specific styles */
    @media print {
      body {
        margin: 0;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
      }
      .certificate-container {
        width: 100%;
        height: 100%;
        margin: 0;
        box-shadow: none;
        page-break-before: always;
        background-image: url('<?=base_url()?>/assets/unicat/images/certificate.png');
        background-size: cover;
      }
      @page {
        size: landscape;
        margin: 0;
      }
    }
  </style>
</head>
<body>
  <div class="certificate-container">
    <!-- 1. Title -->
    <div class="certificate-title">Certificate of Training</div>

    <!-- 2. "Presented to" label -->
    <div class="presented-to">Presented to</div>

    <!-- 3. Recipient Name -->
    <div class="recipient-name">
      <?php echo $name; ?>
    </div>

    <!-- 4. Course Title -->
    <div class="course-title">
      <?php echo $course; ?>
    </div>

    <!-- 5. Description line(s) -->
    <div class="description">
      for successfully completing the course on <strong>InfoAcademy</strong>.
    </div>

    <!-- 6. Date completed -->
    <div class="date-completed">
      <?php echo $date_completed; ?>
    </div>

    <!-- 7. Footer text or signature line -->
    <div class="footer-text">
      Completed via InfoAcademy E-Learning System
    </div>
  </div>

  <script>
    // Uncomment if you want auto-print on page load
    // window.print();
  </script>
</body>
</html>
