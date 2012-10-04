<?php

require 'php/glob_functions.php';
require 'php/sql/connect.php';

$sql = "SELECT * FROM blog";
$result = $db -> query($sql);

session_start();
//if the user has not logged in
?>




<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to GCC | Blog</title>

  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->

  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>

  <!-- Nav Bar -->

  <div class="row">
    <div class="twelve columns">
      <ul class="nav-bar">

        <li><a href="index.php">Home</a></li>
        <?php if(!isLoggedIn()): ?>
        <li><a href="register.php">Register</a></li>
         <?php endif ?>
          <li><a href="archived.php">Archives</a></li>
        <?php if(!isLoggedIn()): ?>
        <li><a href='login.php'>Login</a></li>
        <?php elseif(isLoggedIn()): ?>
         <li><a href="php/logout.php">Logout</a></li>
       <?php endif; ?>
      </ul>

      <h1>Blog <small>This is my blog. It's awesome.</small> </h1>
      <hr />
    </div>
  </div>

  <!-- End Nav -->


  <!-- Main Page Content and Sidebar -->

  <div class="row">

    <!-- Main Blog Content -->
    <div class="nine columns" role="content">


<form name="register" action="php\login.php" method="post">
    Username: <input type="text" name="username" maxlength="31" /><br />
    Password: <input type="password" name="pass" /><br />
    <input type="submit" value="Login" />
</form>

      <hr />



    </div>

    <!-- End Main Content -->


    <!-- Sidebar -->

    <aside class="three columns">


      <h5>Actions</h5>
      <ul class="side-nav">
        <li><a href="post.php" class="large button">Post</a></li>
      </ul>

      <div class="panel">
        <h5>Featured</h5>
        <p>Pork drumstick turkey fugiat. Tri-tip elit turducken pork chop in. Swine short ribs meatball irure bacon nulla pork belly cupidatat meatloaf cow.</p>
        <a href="#">Read More &rarr;</a>
      </div>

    </aside>

    <!-- End Sidebar -->
  </div>

  <!-- End Main Content and Sidebar -->


  <!-- Footer -->

  <footer class="row">
    <div class="twelve columns">
      <hr />
      <div class="row">
        <div class="six columns">
          <p>&copy; Copyright no one at all. Go to town.</p>
        </div>
        <div class="six columns">
          <ul class="link-list right">
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- End Footer -->

  <!-- Included JS Files (Uncompressed) -->
  <!--

  <script src="javascripts/jquery.js"></script>

  <script src="javascripts/jquery.foundation.mediaQueryToggle.js"></script>

  <script src="javascripts/jquery.foundation.forms.js"></script>

  <script src="javascripts/jquery.foundation.reveal.js"></script>

  <script src="javascripts/jquery.foundation.orbit.js"></script>

  <script src="javascripts/jquery.foundation.navigation.js"></script>

  <script src="javascripts/jquery.foundation.buttons.js"></script>

  <script src="javascripts/jquery.foundation.tabs.js"></script>

  <script src="javascripts/jquery.foundation.tooltips.js"></script>

  <script src="javascripts/jquery.foundation.accordion.js"></script>

  <script src="javascripts/jquery.placeholder.js"></script>

  <script src="javascripts/jquery.foundation.alerts.js"></script>

  <script src="javascripts/jquery.foundation.topbar.js"></script>

  -->

  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

</body>
</html>


