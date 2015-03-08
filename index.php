<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sample Sandstorm PHP app</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Sample Sandstorm PHP app</a>
        </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Hi! I'm PHP!</h1>
        <p>If you look below, you'll see how different bits of the Sandstorm platform can be used from PHP. You can view the PHP source online of this app, too.</p>
        <p><a class="btn btn-primary btn-lg" href="https://github.com/paulproteus/php-app-to-package-for-sandstorm" role="button">View the source &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Sandstorm user</h2>
          <p>Here's some quick info about the Sandstorm user viewing this page.</p>
          <ul>
            <li>Current user display name (purely informational): <tt><?php echo $_SERVER['X-Sandstorm-Username']; ?></tt></li>
            <li>Current user hex user ID (stable; store this in the database): <tt><?php echo $_SERVER['X-Sandstorm-User-Id']; ?></tt></li>
            <li>Current user privilege level (see the docs): <tt><?php echo $_SERVER['X-Sandstorm-Permissions]; ?></tt></li>
          </ul>
          <p><a class="btn btn-default" href="https://github.com/sandstorm-io/sandstorm/wiki/User-Authentication" role="button">View user authentication docs &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Current URL information</h2>
          <p>FIXME Sandstorm Platform Something.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Writable data in /var</h2>
          <p>When this app starts, it creates a file called <tt>/var/number.txt</tt>.</p>
          <?php if ( ! file_exists("/var/number.txt") ) { $fp = open('/var/number.txt', 'w'); fwrite($fp, "0"); fclose($fp); } ?>
          <p>Current contents of the file: <?php echo readfile("/var/number.txt"); ?></p>
          <p>FIXME make a button to click to increment it by 1.</p>
        </div>
      </div>

      <hr>

      <footer>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.2-dist/js/bootstrap.min.js"></script>
  </body>
</html>
