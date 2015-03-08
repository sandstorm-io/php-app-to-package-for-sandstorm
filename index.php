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
        <p>This demo app showcases some normal PHP functionality when running in Sandstorm. This app was packaged with <tt>vagrant-spk</tt>, which you can use for your app too.</p>
        <p><a class="btn btn-primary btn-lg" href="https://github.com/paulproteus/php-app-to-package-for-sandstorm" role="button">View this app's source &raquo;</a> <a class="btn btn-default btn-lg" href="https://github.com/sandstorm-io/sandstorm/wiki/Porting-an-app-with-vagrant-spk" role="button">View vagrant-spk docs &raquo;</a></p>
</p>
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
          <h2>Writable data in /var</h2>
          <p>When this app starts, it creates a file called <tt>/var/number.txt</tt>.</p>
          <!-- Make the file if necessary. -->
          <?php if ( ! file_exists("/var/number.txt") ) { $fp = open('/var/number.txt', 'w'); fwrite($fp, "0"); fclose($fp); } ?>
          <!-- Increment it! This is a page view! -->
          <?php $fp = open('/var/number.txt', 'r'); $s = fread($fp, 1000); $s = intval($s) + 1; fclose($fp);
                $fp = open('/var/number.txt', 'w'); fwrite($fp, $s); fclose($fp);
                ?>
          <!-- Now print it out, using the simplistic and convenient PHP readfile(). -->
          <p>Current contents of the file: <?php echo readfile("/var/number.txt"); ?></p>
          <p>Every time you reload this page within an instance of the app, the number goes up.</p>
        </div>
        <div class="col-md-4">
          <h2>Fresh instances</h2>
          <p>Feel free to make a new instance of this app from the Sandstorm shell!</p>
          <p>Each new instance will run with a fresh MySQL and <tt>/var</tt>.</p>
       </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <h2>External network access</h2>
          <p>By default, the app has no network access. That means the following will fail:</p>
          <p>FIXME php_curl() something.</p>
        </div>
        <div class="col-md-4">
          <h2>Outbound email</h2>
          <p>Mumble.</p>
        </div>
        <div class="col-md-4">
          <h2>MySQL</h2>
          <p><tt>vagrant-spk</tt> sets up one MySQL instance per app
          instance. This means you can hard-code a MySQL database name
          and password and it'll work on every instance.</p>
          <p>Here's the output of <tt>SELECT 1+1;</tt></p>
          <?php
             $db = mysqli_connect("localhost", "root", "", "") or die("Error " . mysqli_error($db));
             $result = mysqli_query($db , "SELECT 1+1;");
             ?>
          <p><tt><?php echo $result; ?></tt></p>
          <p>Every app instance can use MySQL with this information:</p>
          <ul>
            <li>Host: <tt>localhost</tt> (not 127.0.0.1)</li>
            <li>Username: <tt>root</tt></li>
            <li>Password: <tt>funtime</tt></li>
            <li>Database: Whatever you create. See the docs.</li>
          </ul>
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
