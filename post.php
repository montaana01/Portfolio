<?php


$captcha;
if (isset($_POST['recaptchaG'])) {
    $captcha = $_POST['recaptchaG'];
}

$secretKey = "6LdN6m4pAAAAADSp72wcbdP4rogNrISx4DZXVRbV";

$ip = $_SERVER['REMOTE_ADDR'];

// post request to server

$url =  'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey .  '&response=' . $_POST['recaptchaG'];

$response = file_get_contents($url);
$responseKeys = json_decode($response, true);
header('Content-type: application/json');

if ($responseKeys["success"] && $responseKeys["score"] >= 0.5) {
    echo json_encode(array('success' => 'true', 'om_score' => $responseKeys["score"], 'recaptchaG' => $_POST['recaptchaG']));
} else {
    echo json_encode(array('success' => 'false', 'om_score' => $responseKeys["score"], 'recaptchaG' => $_POST['recaptchaG']));
}
