<?php
  setlocale(LC_TIME, "hu_HU");
  header("Expires: Wed, 14 Mar 1990 05:00:00 GMT");
  header("Content-Type: text/xml; charset=utf-8");

  if (isset($_GET['lampad']) && $_GET['lampad'] != '') {

    $lampad = addslashes($_GET['lampad']);
    $lampad = substr($lampad, 0, 1);

    if (!($lampad == "0" || $lampad == "1")) {
      $lampad = "0";
    }

    $lampam = date('Y-m');
    if (file_exists('../lampa/' . $lampam .'.txt')) {
      $lampaf = file_get_contents('../lampa/' . $lampam .'.txt', NULL, NULL, 0, date('t'));  // teljes honap 0/1
    } else {
      $lampaf = "0000000000000000000000000000000";
    }
    $strlen = strlen($lampaf);
    for ($i = 0; $i < $strlen; $i++) {
      $c = substr($lampaf, $i, 1);
      if (!($c == "0" || $c == "1")) {
        $lampaf[$i] = "0";
      }
    }

    $lampaf[date('j')-1] = $lampad;  // mai nap 0/1

    if (file_put_contents('../lampa/' . $lampam .'.txt', $lampaf, LOCK_EX) === FALSE) {
      echo 0;
    } else {
      echo 1;
    }

  }
?>
