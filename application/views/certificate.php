<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }
    .certificate-container {
      width: 80%;
      margin: 50px auto;
      padding: 20px;
      background: url('<?= base_url() ?>/assets/unicat/images/certificate.png') no-repeat center center;
      background-size: cover;
      position: relative;
      height: 800px; /* Adjust as needed */
    }
    .certificate-body {
      font-size: 20px;
      color: white;
      padding: 50px;
    }
    .username strong {
      font-size: 55px;
    }
    .training strong {
      font-size: 35px;
    }
    .date strong {
      font-size: 20px;
    }
  </style>
</head>
<body>
  <div class="certificate-container">
    <div class="certificate-body">
      <p class="username"><strong><?= $name; ?></strong></p>
      <p class="training"><strong><?= $course; ?></strong></p>
      <p class="date"><strong><?= $date_completed; ?></strong></p>
    </div>
  </div>
</body>
</html>
