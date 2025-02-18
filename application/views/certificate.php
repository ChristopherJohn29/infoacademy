<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Certificate of Training</title>
  <style>
    /* Reset and basic styling */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      width: 100%;
      height: 100vh; /* Adjust if you want a fixed height or auto */
      font-family: Arial, sans-serif;
      color: #fff;
      background: url('<?= base_url() ?>/assets/unicat/images/certificate.jpg') no-repeat center center;
      background-size: cover;
      position: relative;
    }

    .certificate-container {
      /* Use flex to center contents nicely */
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      width: 100%;
      height: 100%;
      padding: 2rem;
    }

    /* Title: "Certificate of Training" */
    .certificate-title {
      font-size: 3rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }

    /* "Presented to" text */
    .presented-to {
      font-size: 1.2rem;
      margin-bottom: 1rem;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    /* Recipient name (large) */
    .recipient-name {
      font-size: 2.2rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
    }

    /* The line "for successfully completing..." */
    .subtext {
      font-size: 1rem;
      margin-bottom: 1rem;
    }

    /* Course title (large) */
    .course-title {
      font-size: 1.5rem;
      font-weight: bold;
      margin-bottom: 1.5rem;
      line-height: 1.4;
    }

    /* Date and completion info */
    .completion-info {
      font-size: 1rem;
      margin-bottom: 2rem;
      line-height: 1.4;
    }

    /* Footer text: "This is a system generated document..." */
    .footer-text {
      font-size: 0.9rem;
      margin-top: 2rem;
      opacity: 0.9;
    }

    /* Optional: QR code or logo placement */
    /* 
       Replace the URLs or use <img> tags if you prefer. 
       If you have separate images for QR or a logo, you can 
       absolutely position them as below.
    */
    .qr-code {
      position: absolute;
      left: 2rem;
      bottom: 2rem;
      width: 100px;
      height: 100px;
      background: url('<?= base_url() ?>/path/to/qr.png') no-repeat center center;
      background-size: contain;
    }

  </style>
</head>
<body>
  <div class="certificate-container">

    <!-- Title -->
    <div class="certificate-title">Certificate of Training</div>

    <!-- Presented to -->
    <di
