<?php
  setlocale(LC_TIME, "hu_HU");
  date_default_timezone_set('Europe/Budapest');

  if (isset($_GET['m']) && $_GET['m'] != '') {
    $lampam = $_GET['m'];
  } else {
    $lampam = date('Y-m');
  }
  $lampaf = file_get_contents('./lampa/' . $lampam .'.txt', NULL, NULL, 0, 31);  // teljes honap 0/1
  $strlen = strlen($lampaf);

?>
<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu-HU" lang="hu-HU">

  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Március - naptár</title>
    <meta name="Description" content="Calendar." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />

    <link href="https://ebertek.com/" rel="home" />
    <link href="humans.txt" rel="author" type="text/plain" />
    <link href="css/marcius.css" rel="stylesheet"  type="text/css" />
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
  </head>

  <body>

    <div id="main">
      <div id="lampak">
        <?php
          for ($i = 0; $i < $strlen; $i++) {
            $c = substr($lampaf, $i, 1);
            if ($c == "1") {
              echo '<div class="cal lampa zold"></div>';
            } else {
              echo '<div class="cal lampa piros"></div>';
            }
          }
        ?>
      </div>
    </div>

  </body>

</html>
