<?php
if (isset($_POST['form'])) {
    if (!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response'])) {
        echo 'Вы не прошли проверку reCAPTHCA.';
    } else {
        $secret = '6LdN6m4pAAAAADSp72wcbdP4rogNrISx4DZXVRbV';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);

        if ($response->success) {
            // What happens when the CAPTCHA was entered incorrectly
            echo 'Successful login.';
        } else {
            // Your code here to handle a successful verification
            echo 'reCAPTHCA verification failed, please try again.';
        }
    }
}

?>

# $captcha;
# if (isset($_POST['recaptchaG'])) {
# $captcha = $_POST['recaptchaG'];
# }
#
# $secretKey = "6LdN6m4pAAAAADSp72wcbdP4rogNrISx4DZXVRbV";
#
# $ip = $_SERVER['REMOTE_ADDR'];
#
# // post request to server
#
# $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['recaptchaG'];
#
# $response = file_get_contents($url);
# $responseKeys = json_decode($response, true);
# header('Content-type: application/json');
#
# if ($responseKeys["success"] && $responseKeys["score"] >= 0.5) {
# echo json_encode(array('success' => 'true', 'om_score' => $responseKeys["score"], 'recaptchaG' => $_POST['recaptchaG']));
# } else {
# echo json_encode(array('success' => 'false', 'om_score' => $responseKeys["score"], 'recaptchaG' => $_POST['recaptchaG']));
# }
#

<meta http-equiv='refresh' content='10; url=https://yakovlevdev.com/#conacts'>
<meta charset="UTF-8" />

<?php
// Получаем значения переменных из пришедших данных
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
// Формируем сообщение для отправки, в нём мы соберём всё, что ввели в форме
$mes = "Имя: $name \nE-mail: $email \nТекст: $message";
// Пытаемся отправить письмо по заданному адресу
// Если нужно, чтобы письма всё время уходили на ваш адрес — замените первую переменную $email на свой адрес электронной почты
$send = mail('yakovlev@yakovlevdev.com', $header, $mes, "Content-type:text/plain; charset = UTF-8\r\nFrom:yakovlev@yakovlevdev.com");
// Если отправка прошла успешно — так и пишем
if ($send == 'true') {
    echo "Сообщение отправлено";
}
// Если письмо не ушло — выводим сообщение об ошибке
else {
    echo "Ой, что-то пошло не так";
}
?>