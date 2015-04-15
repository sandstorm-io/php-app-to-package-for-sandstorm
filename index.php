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
    <!-- <link href="jumbotron.css" rel="stylesheet"> -->

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
            <li>Current user display name (purely informational): <tt><?php echo $_SERVER['HTTP_X_SANDSTORM_USERNAME']; ?></tt></li>
            <li>Current user hex user ID (stable; store this in the database): <tt><?php echo $_SERVER['HTTP_X_SANDSTORM_USER_ID']; ?></tt></li>
            <li>Current user privilege level (see the docs): <tt><?php echo $_SERVER['HTTP_X_SANDSTORM_PERMISSIONS']; ?></tt></li>
          </ul>
          <p>You can read the
          full <a href="https://github.com/sandstorm-io/sandstorm/wiki/User-Authentication">user
          authentication documentation</a>.</p>
        </div>
        <div class="col-md-4">
          <h2>Writable data in /var</h2>
          <p>When this app starts, it creates a file called <tt>/var/number.txt</tt>.</p>
          <!-- Make the file if necessary. -->
          <?php if ( ! file_exists("/var/number.txt") ) { $fp = fopen('/var/number.txt', 'w'); fwrite($fp, "0"); fclose($fp); } ?>
          <!-- Increment it! This is a page view! -->
          <?php
          $fp = fopen('/var/number.txt', 'r'); $s = fread($fp, 1000); $new_s = intval($s) + 1; fclose($fp);
          $fp = fopen('/var/number.txt', 'w'); fwrite($fp, $new_s); fclose($fp);
          ?>
          <!-- Now print it out, using the simplistic and convenient PHP readfile(). -->
          <p>Current contents of the file: <?php readfile("/var/number.txt"); ?></p>
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
          <p>There are two ways to access the network from within
            Sandstorm. For now, they are both somewhat difficult, so
            we recommend not making outbound connections from a PHP
            app yet.
          </p>
          <ol>
            <li>If you are making an outbound HTTP request, use Jason Paryani's as-yet-unpublished
              <tt>sandstorm-curl</tt>.</li>
            <li>If you need more than that, use
              <a href="https://github.com/sandstorm-io/sandstorm/blob/master/src/sandstorm/ip.capnp">
                Sandstorm's IP networking cap'n definition
              </a>.
            </li>
          </ol>
        </div>
        <div class="col-md-4">
          <h2>Outbound email</h2>
          <p>It would be nice if there were an easy way to send outbound email
            from PHP apps within Sandstorm. For now, it requires using Cap'n
            Proto.</p>
          <p>See the <a href="https://github.com/sandstorm-io/sandstorm/wiki/Using-Email-From-Your-Sandstorm-App">
              Sandstorm email documentation</a> for more.</p>
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
          <p><tt><?php echo $result->fetch_row()[0]; ?></tt></p>
          <p>Every app instance can use MySQL with this information:</p>
          <ul>
            <li>Host: <tt>localhost</tt> (not 127.0.0.1)</li>
            <li>Username: <tt>root</tt></li>
            <li>No password</li>
            <li>Database: Whatever you create! More info in <tt>vagrant-spk</tt> docs.</li>
          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <h2>Instance lifetime: short</h2>
          <p>In Sandstorm, apps are auto-killed at some point.</p>
        </div>

        <div class="col-md-4">
          <h2>Background processes</h2>
          <p>If you need a background process, write your own
            script.</p>
        </div>

        <div class="col-md-4">
          <h2>Cron jobs</h2>
          <p>If you need time-based background processing, that might
            be tough for now.
          </p>
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
