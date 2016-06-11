<?php
  setlocale(LC_TIME, "hu_HU");
  $nap = '2015-03-31';
  $marcius = 31+(date_create()->diff(date_create($nap))->days);
//  $marcius = 125;

  $nap2 = '2016-02-29';
  $marcius2 = date_create()->diff(date_create($nap2))->days;
  
  $napok = array("vasárnap ☺", "hétfő", "kedd", "szerda", "csütörtök", "péntek", "szombat ☺");
  $napneve = $napok[date('w')];
  
function negyzetszam($number) {
  if ( pow(floor(sqrt($number)), 2) == $number) {
    return true;
  } else {
    return false;
  }
}


function is_prime($number)
{
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
    for ( $i = 2 ; $i <= $x ; ++$i ) {
        if ( $number % $i == 0 ) {
            break;
        }
    }
    
    if( $x == $i-1 ) {
        return true;
    } else {
        return false;
    }
}

function cube( $c ) {
  $x = 3;

  do {
    $x = $x - (pow($x,3) - $c)/(3*pow($x,2));
    $count++;
  } while($count < 50);

  return $x;
}

function kobgyok($number) {
  if ( floor(cube($number)) == cube($number) ) {
    return true;
  } else {
    return false;
  }
}

function kobgyok2($number) 
{
  for ( $i = 0 ; $i < $number ; ++$i )  
  {
    if($i*$i*$i==$number)
    {
      return true;
    }
  }  
  
  return false;

}


  if(!function_exists('apache_request_headers')) {
    function apache_request_headers() {
      $headers = array();
      foreach($_SERVER as $key => $value) {
        if(substr($key, 0, 5) == 'HTTP_') {
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
    if($userIP == "")
      {
      $userIP = $_SERVER['REMOTE_ADDR'];
    }
    return $userIP;
  }

  $ipcim = userIP();
  $refi = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'refi_hiba';
  $status = "$refi | $ipcim " . print_r(apache_request_headers(), true);

?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta name="Author" content="David Ebert" />
  <meta name="Description" content="Days passed since 3/31/2015." />
  <meta name="viewport" content="width=device-width" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Március</title>
  <link rel="home" href="http://www.ebertek.com/" />
  <link rel="stylesheet" href="styles/marcius.css" type="text/css" />
  <link rel="icon" href="favicon.ico" type="image/x-icon" />
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
        //
/*        $abc1 = cube($marcius);
        $abc2 = floor(cube($marcius));
        echo $abc1;
        echo '<br />';
        echo $abc2; 
  $myFile = "pocok.txt";
  $fh = fopen($myFile, 'a');
  $stringData = date("n/j/Y g:i:s");
  fwrite($fh, $stringData . "\r\n");
  fwrite($fh, $status);
  fwrite($fh, "\r\n\r\n--------\r\n");
  fclose($fh); */
      ?>
    </p>
  </div>

</body>

</html>