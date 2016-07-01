<?php
  setlocale(LC_TIME, "hu_HU");
  date_default_timezone_set('Europe/Budapest');
  $nap = '2015-03-31';
  $marcius = 31 + (date_create()->diff(date_create($nap))->days);

  $nap2 = '2016-02-29';
  $marcius2 = date_create()->diff(date_create($nap2))->days;

  $napok = array("vasárnap ☺", "hétfő", "kedd", "szerda", "csütörtök", "péntek", "szombat ☺");
  $napneve = $napok[date('w')];

  function negyzetszam($number) {
    if (pow(floor(sqrt($number)), 2) == $number) {
      return true;
    } else {
      return false;
    }
  }

  function is_prime($number) {
    // 1 is not prime
    if ( $number == 1 ) {
      return false;
    }
    // 2 is the only even prime number
    if ( $number == 2 ) {
      return true;
    }
    // square root algorithm speeds up testing of bigger prime numbers
    $x = sqrt($number);
    $x = floor($x);
    for ($i = 2; $i <= $x; ++$i) {
      if ( $number % $i == 0 ) {
        break;
      }
    }

    if ($x == $i-1) {
      return true;
    } else {
      return false;
    }
}

  function kobgyok2($number) {
    for ($i = 0; $i < $number; ++$i) {
      if ($i * $i * $i == $number) {
        return true;
    }
  }
  return false;
}

  /*
  if (!function_exists('apache_request_headers')) {
    function apache_request_headers() {
      $headers = array();
      foreach($_SERVER as $key => $value) {
        if (substr($key, 0, 5) == 'HTTP_') {
          $headers[str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))))] = $value;
        }
      }
      return $headers;
    }
  }

  function userIP()
  {
    // ha van HTTP_X_FORWARDED_FOR, akkor proxy mogul netezik
    $userIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    if ($userIP == "")
      {
      $userIP = $_SERVER['REMOTE_ADDR'];
    }
    return $userIP;
  }

  $ipcim = userIP();
  $refi = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'refi_hiba';
  $status = "$refi | $ipcim " . print_r(apache_request_headers(), true);
  */
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hu-HU" lang="hu-HU">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Március</title>
    <meta name="Description" content="Days passed since 3/31/2015." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="googlebot" content="noindex, nofollow" />

    <link href="https://ebertek.com/" rel="home" />
    <link href="humans.txt" rel="author" type="text/plain" />
    <link href="css/marcius.css" rel="stylesheet" type="text/css" />
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <script src="js/dse.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>

    <div id="main">
      <h1>2015. március <?php
        if (is_prime($marcius)) {
          echo '<span class="prime">' . $marcius . '</span>';
        } else if (negyzetszam($marcius)) {
          echo '<span class="quad">' . pow($marcius, 1/2) . '²</span>';
        } else if (kobgyok2($marcius)) {
          echo '<span class="quad">' . pow($marcius, 1/3) . '³</span>';
        } else {
          echo $marcius;
        }
        echo '., ' . $napneve; ?></h1>
      <p class="march">
        2016. március <?php
        if (is_prime($marcius2)) {
          echo '<span class="prime">' . $marcius2 . '</span>';
        } else if (negyzetszam($marcius2)) {
          echo '<span class="quad">' . pow($marcius2, 1/2) . '²</span>';
        } else if (kobgyok2($marcius2)) {
          echo '<span class="quad">' . pow($marcius2, 1/3) . '³</span>';
        } else {
          echo $marcius2;
        }
        echo '., ' . $napneve; ?>

        <?php
          /*
          $myFile = "pocok.txt";
          $fh = fopen($myFile, 'a');
          $stringData = date("n/j/Y g:i:s");
          fwrite($fh, $stringData . "\r\n");
          fwrite($fh, $status);
          fwrite($fh, "\r\n\r\n--------\r\n");
          fclose($fh);
          */
          $lampaf = file_get_contents('./lampa/' . date('Y-m') .'.txt', NULL, NULL, 0, 31);  // teljes honap 0/1
          $strlen = strlen($lampaf);
          for ($i = 0; $i < $strlen; ++$i) {
            $c = substr($lampaf, $i, 1);
            if (!($c == "0" || $c == "1")) {
              $lampaf[$i] = "0";
            }
          }
          $lampad = $lampaf[date('j')-1];  // mai nap 0/1
          if ($lampad == "1") {
            $lampac = "zold";  // lampa css class
          } else {
            $lampac = "piros";
          }
        ?>
      </p>
      <div id="lampa" class="lampa <?php echo $lampac; ?>"><input type="hidden" name="lampad" id="lampad" value="<?php echo $lampad; ?>" /></div>
      <p class="march"><a href="cal.php" title="Naptár">Naptár</a></p>
    </div>

  </body>

</html>
