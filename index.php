<?php

require 'php/glob_functions.php';
require 'php/sql/connect.php';

$sql = "SELECT * FROM blog ORDER BY CREATE_TIME DESC LIMIT 5";
$result = $db -> query($sql);

session_start();

//SQL statements
$count_sql = "SELECT * FROM blog";
$count_results = $db -> query($count_sql);
//Number of rows returned
$count_rows = $count_results->num_rows;

?>




<!DOCTYPE html>


<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to GCC | Blog</title>


  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">

  <!-- Overidding CSS -->
  <link rel="stylesheet" href="stylesheets/app.css">

  <!-- Foundation Scripts -->
  <script src="javascripts/modernizr.foundation.js"></script>


</head>
<body>

  <!-- Nav Bar -->

  <div class="row">
    <h1>Blog <small>This is my blog. It's awesome.</small> </h1>
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


      <hr />
    </div>
  </div>

  <!-- End Nav -->



  <!-- Main Page Content and Sidebar -->

  <div class="row">

    <!-- Main Blog Content -->
    <div class="nine columns" role="content">

    <?php if ($count_rows > 0): ?>


       <?php while ($row = $result->fetch_assoc()): ?>
          <?php $times = strtotime($row['CREATE_TIME']); ?>
          <?php $id = $row['id']; ?>

      <article>

        <h3><a href="blogpost.php?id=<?php echo $id; ?>"><?php echo $row['title']; ?></a></h3>
        <h6>Written by <a href="#"><?php echo $row['user']; ?></a>, <?php echo date("F-d-Y h:i:s A", $times); ?> <!--<a href="#" class="delete_button">Delete</a> --> <a href="editpost.php?id=<?php echo $id; ?>&poster=<?php echo $row['user']; ?>" class="edit_button">Edit</a></h6>

        <div class="row">
          <div class="six columns">
                <?php

                   $text_trunk = $row['content'];
                   $text_trunk = (strlen($row['content']) > 200) ? substr( $row['content'], 0, 200)."... <a href='blogpost.php?id={$id}'>Read more &rarr;</a>" : $text_trunk;
                   echo "<p>" . $text_trunk . $data['rows'] . "</p>";

                   ///TEST DUMP
                   //echo var_dump($_SESSION);
                  // echo session_id();
                ?>
          </div>

          <div class="six columns">
             <?php $img = $row['images']; ?>
             <a href="<?php echo $img ?>"><img src="<?php echo $img ?>" class="resize"/></a>
          </div>
        </div>
      </article>

      <hr />

      <?php endwhile; ?>

    <?php else: ?>

      <h3>NO POSTS</h3>

    <?php endif; ?>


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
        <p>Nothing ATM</p>
          <a href="#">Not a link &rarr;</a>
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

  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>

  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

</body>
</html>
