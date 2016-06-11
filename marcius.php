<?php
	$nap = '2015-03-31';
//	setlocale(LC_TIME, "hu_HU");
	$marcius = 31+(date_create()->diff(date_create($nap))->days);
	$marcius = 125;
	
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

function kobgyok($number) {
	if ( pow(floor(pow($number, 1/3)), 3) == $number) {
		return true;
	}
	elseif (pow(ceil(pow($number, 1/3)), 3) == $number) {
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
	<link rel="home" href="http://www.ebertek.com/">
	<link rel="stylesheet" href="styles/marcius.css" type="text/css">
</head>

<body style="background-color: #222;">

	<div id="main">
		<h1>2015. március <?php
			if (is_prime($marcius)) {
				echo '<span class="prime">' . $marcius . '</span>';
			} else if (negyzetszam($marcius)) {
				echo '<span class="quad">' . pow($marcius, 1/2) . '²</span>';
			} else if (kobgyok($marcius)) {
				echo '<span class="quad">' . pow($marcius, 1/3) . '³</span>';
			} else {
				echo $marcius;
			}
			echo '., ' . $napneve; ?></h1>
		<p>
			<a href="index.php" title="Vissza">Vissza</a>
		</p>
		<hr/>
		<p>
			<?php
				$szam=8;				echo "$szam<br/>";
				$gyok=pow($szam, 1/3);	echo "$szam^1/3 = $gyok<br/>";
				$osztas=$gyok % 1;		echo "elozo % 1 = $osztas<br/>";
				$osztas=fmod($gyok,1);	echo "elozo fmod 1 = $osztas<br/>";
				echo '2 fmod 1 = ' . fmod(2,1);
			?>
		</p>
		<hr/>
		<p>
			<?php
				$szam=125;				echo "$szam<br/>";
				$gyok=pow($szam, 1/3);	echo "$szam^1/3 = $gyok<br/>";
				$osztas=$gyok % 1;		echo "elozo % 1 = $osztas<br/>";
				$osztas=fmod($gyok,1);	echo "elozo fmod 1 = $osztas&nbsp;&nbsp;&nbsp;(0-nak kéne lennie, de valamiért 5 helyett 4,999… van)<br/>";
				echo '5 fmod 1 = ' . fmod(5,1) . '<br/>';
			?>
		</p>
		<hr/>
		<p>
			<?php
				$szam=126;				echo "$szam<br/>";
				$gyok=pow($szam, 1/3);	echo "$szam^1/3 = $gyok<br/>";
				$osztas=$gyok % 1;		echo "elozo % 1 = $osztas&nbsp;&nbsp;&nbsp;(0.0132979349646-nak kéne lennie)<br/>";
				$osztas=fmod($gyok,1);	echo "elozo fmod 1 = $osztas<br/>";
				echo '5.01329793496 fmod 1 = ' . fmod(5.01329793496,1);
			?>
		</p>
		<hr/>
		<p>
			<?php
				$szam=$marcius;			echo "$szam<br/>";
				$gyok=pow($szam, 1/3);	echo "$szam^1/3 = $gyok<br/>";
				$osztas=$gyok % 1;		echo "elozo % 1 = $osztas<br/>";
				$osztas=fmod($gyok,1);	echo "elozo fmod 1 = $osztas<br/>";
				$szam=intval($szam);
				echo "$szam fmod 1 = " . fmod($szam,1);
			?>
		</p>
	</div>

</body>

</html>
