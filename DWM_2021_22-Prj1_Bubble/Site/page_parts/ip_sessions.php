<?php
$userid = $_SESSION['user']['id_user'];

$ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
} else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
} else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
} else if (isset($_SERVER['HTTP_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
} else if (isset($_SERVER['REMOTE_ADDR'])) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
} else {
    $ipaddress = 'UNKNOWN';
}

if ($ipaddress === "::1") {
    $localizacao = "Local Host";
} else {
    $xml = simplexml_load_file("https://api.ip2location.io/?key=d35b075cb5df428ddb528871b1318c7d&ip=$ipaddress&format=xml");
    $localizacao = $xml->country_name;
}

$insertIP = $conn->prepare("INSERT INTO ip_sessions (id_user,ip_sessions,localizacao) VALUES (?,?,?)");
$insertIP->bind_param("iss", $userid, $ipaddress, $localizacao);
$insertIP->execute();
$insertIP->close();
