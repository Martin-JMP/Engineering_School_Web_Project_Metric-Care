<?php 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G07A");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($ch);
curl_close($ch);

$data_tab = str_split($data, 33);

$last_trame_index = count($data_tab) - 2; // Index of the last trame
$last_last_trame_index = count($data_tab) - 3; // Index of the last trame
$last_last_last_trame_index = count($data_tab) - 4; // Index of the last trame
$last_trame = $data_tab[$last_trame_index]; // Last trame
$last_last_trame = $data_tab[$last_last_trame_index]; // Last trame
$last_last_last_trame = $data_tab[$last_last_last_trame_index]; // Last trame



$trame = $last_trame;
$trame2 = $last_last_trame;
$trame3 = $last_last_last_trame;
// décodage avec des substring
$t = substr($trame, 0, 1);
$o = substr($trame, 1, 4);
// …
// décodage avec sscanf
list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) =
    sscanf(
        $trame,
        "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s"
    );

if($c==9){

$dec = hexdec($v);
echo"$dec";
} else{

// décodage avec des substring
$t2 = substr($trame2, 0, 1);
$o2 = substr($trame2, 1, 4);
// …
// décodage avec sscanf
list($t2, $o2, $r2, $c2, $n2, $v2, $a2, $x2, $year2, $month2, $day2, $hour2, $min2, $sec2) =
    sscanf(
        $trame2,
        "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s"
    );

if($c2==9){

$dec = hexdec($v2);
echo"$dec";
} else{

    // décodage avec des substring
    $t2 = substr($trame3, 0, 1);
    $o2 = substr($trame3, 1, 4);
    // …
    // décodage avec sscanf
    list($t3, $o3, $r3, $c3, $n3, $v3, $a3, $x3, $year3, $month3, $day3, $hour3, $min3, $sec3) =
        sscanf(
            $trame3,
            "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s"
        );
    
    if($c3==9){
    
    $dec = hexdec($v3);
    echo"$dec";
    }
else{echo"Erreur...";}}}
?>