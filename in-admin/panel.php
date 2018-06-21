<?php
  session_start();
  require_once 'init.php';
  require 'check.php';
?>
<!doctype html>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inova Vertical - Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <section class="section-content">

            <a class="log-out" href="logout.php" title="Sair">
              <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 354.965 354.965" style="enable-background:new 0 0 354.965 354.965;" xml:space="preserve"><g><g><g><path d="M177.483,176.365c-6.903,0-12.5-5.597-12.5-12.5V12.5c0-6.903,5.597-12.5,12.5-12.5c6.903,0,12.5,5.597,12.5,12.5 v151.365C189.983,170.768,184.387,176.365,177.483,176.365z" fill="#D80027"/></g><g><path d="M177.483,354.965c-87.831,0-159.286-71.456-159.286-159.285c0-35.124,11.209-68.431,32.417-96.32 c20.515-26.979,49.637-47.061,82-56.545c6.625-1.949,13.569,1.855,15.511,8.479c1.941,6.625-1.855,13.569-8.48,15.511 C82.857,83.449,43.196,136.443,43.196,195.68c0,74.045,60.24,134.285,134.286,134.285c74.045,0,134.286-60.24,134.286-134.285 c0-59.237-39.661-112.231-96.449-128.875c-6.625-1.941-10.421-8.886-8.479-15.511c1.94-6.625,8.885-10.426,15.511-8.479 c32.364,9.484,61.484,29.566,82,56.545c21.208,27.89,32.417,61.196,32.417,96.32C336.77,283.509,265.314,354.965,177.483,354.965 z" fill="#D80027"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a>
            
            <h1>INOVA VERTICAL</h1>
            <p>Bem-vindo ao seu painel, <?php echo $_SESSION['user_name']; ?></p>

          </section>

        </div>
      </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>

  </body>
</html>