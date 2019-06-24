<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Recreation Park Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/landing-page2.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="manifest" href="/manifest.json">

  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="RECsys">
  <link rel="apple-touch-icon" href="images/icons/icon-152x152.png">

  <!-- Windows -->
  <meta name="msapplication-TileImage" content="images/icons/icon-144x144.png">
  <meta name="msapplication-TileColor" content="#2F3BA2">
  <link rel="icon"="image/png" href="images/icons/icon-144x144.png">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href=""><b>RECsys</b></a>
      <a class="btn btn-primary" style="color:white;" onclick="window.location.href='index.php'">Sign In</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Water Recreation Center</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form action="recovery_email.php" method="post"  enctype="multipart/form-data"  class="form-horizontal">
            <div class="form-row">
              <input type="email" class="form-control form-control-lg mb-2" name="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Characters followed by an @ sign, characters followed by an . sign, a characters" required>
              <input type="submit" class="btn btn-block btn-lg btn-primary mb-2" name="recovery" value="Recovery Password!">
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
                <a style="color:#009688;" onclick="">About Us</a>
              <br /><label style="font-size:11px;">Pusat Rekreasi Air, Jalan Tasik, 75450 Ayer Keroh, Malacca</label>
              <br /><label style="font-size:11px;">+606-553 2499</label>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy;RECsys 2019. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>

</body>

</html>

<script type="text/javascript">
if ('serviceWorker' in navigator) {
  navigator.serviceWorker
  .register('./service-worker.js')
  .then(function() { console.log('Service Worker Registered'); });
}

function login() {
  window.location.assign("index.php");
}

function register() {
  window.location.assign("register_form.php");
}

</script>

</html>
