<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Recreation Park Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/landing-page.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <link rel="manifest" href="/manifest.json">

  <!-- Add to home screen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="white">
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
      <a class="btn btn-primary" style="color:white;" onclick="window.location.href='register_form.php'">Sign Up</a>
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
          <form action="login.php" method="post"  enctype="multipart/form-data"  class="form-horizontal">
            <div class="form-row">
              <input type="text" class="form-control form-control-lg mb-2" name="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  title="Characters followed by an @ sign, characters followed by an . sign, a characters" required><br>
              <input type="password" class="form-control form-control-lg mb-2" name="password" placeholder="Enter Password" pattern=".{6,}" title="Six or more characters" required><br>
              <input type="submit" class="btn btn-block btn-lg btn-primary mb-2" name="login" value="Sign In">
              <label onclick="window.location.href='recover_form.php'"><b>Forget Password?</b></label>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <h3>Opportunity</h3>
            <p class="lead mb-0">We provide a great recreation sports center where you can enjoy and experience water and extreme activities at low prices.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <h3>Memorable</h3>
            <p class="lead mb-0">Take a step to try our activities available. There are lots of quality time that can be shared with the whole family and friends.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Water Game</h2>
          <p class="lead mb-0">Do you love playing water games? Come join the fun at one of our water games facilities! There are facilities such as Paddle Boat, Electric Boat, and Kayak.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Extreme Game</h2>
          <p class="lead mb-0">Be ready for a “challenging” experience? Let's try to challenge your self at one of our extreme games facilities! There are facilities such as Wall Climbing, Flying Fox, Paintball Shooting, Archery Target, Trampoline Jump and Space Ball.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-5.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Family Day</h2>
          <p class="lead mb-0">A family day out which everyone really enjoys. To inject the fun for your family,  we have every activities that can keep every guest entertained.</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-4.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Team Building</h2>
          <p class="lead mb-0">If you need to get the team working better, we can help promote all skills in a positive and fun environment.</p>
        </div>
      </div>
    </div>
  </section>

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
