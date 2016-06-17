<?php

  $lampaf = file_get_contents('./lampa/' . date('Y-m') .'.txt', NULL, NULL, 0, 31); // teljes honap 0/1
  $strlen = strlen($lampaf);

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="Author" content="David Ebert" />
    <meta name="Description" content="Calendar." />
    <meta name="viewport" content="width=device-width" />
    <meta name="robots" content="noindex, nofollow" />
    <title>Március</title>
    <link rel="home" href="http://www.ebertek.com/" />
    <link rel="stylesheet" href="styles/marcius.css" type="text/css" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
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
