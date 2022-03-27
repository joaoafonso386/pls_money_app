<?php 






?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Money Form</title>
  <style>
    body {
      overflow-y: hidden;
    }
    .container {
      height: 100vh;
      display: grid;
      place-content: center;
    }
    .form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-bottom: 50px;
    }

  </style>
</head>
<body>
  <main class="container">
    <h1>Fill the form to ask for money</h1>
    <div>
      <form class="form" method="POST">
        <label>
          Your e-mail
          <input type="text">
        </label>
        <label>
          Receivers e-mail
          <input type="text">
        </label>
        <label>
          Amount to ask
          <input type="number">
        </label>
        <div>
          <button type="submit">Send</button>
          <button type="button">Preview</button>
        </div>
      </form>
    </div>
    <div class="preview">
      <h2>E-mail preview</h2>
      <p>From:</p>
      <p>To:</p>
      <p>Subject: Send me money please! Urgent!</p>
      <p>Email body: Hey, I really need you to send me {X} amount of money ASAP! It really is for a good cause</p>
    </div>
  </main>
</body>
</html>