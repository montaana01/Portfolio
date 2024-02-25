<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }
    if (!$captcha) {
        echo 'Please check the reCAPTCHA box.';
        exit;
    }

    $secretKey = "6LdN6m4pAAAAADSp72wcbdP4rogNrISx4DZXVRbV";

    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha);
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo 'reCAPTCHA verification failed!';
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $language = $_POST['language'];

        $body = "";
        switch ($language) {
            case 'en':
                $body .= "Name: $name\n";
                $body .= "Email: $email\n";
                $body .= "Message:\n$message";
                break;
            case 'ru':
                $body .= "Имя: $name\n";
                $body .= "Email: $email\n";
                $body .= "Сообщение:\n$message";
                break;
            default:
                $body .= "Name: $name\n";
                $body .= "Email: $email\n";
                $body .= "Message:\n$message";
                break;
        }

        $to = "yakovlev@yakovlevdev.com";
        $subject = "Feedback Form Submission";
        $headers = "From: $sender_email \r\n";
        $headers .= "Content-type: text/plain; charset=utf-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<meta http-equiv='refresh' content='5; url=https://yakovlevdev.com/#conacts'>
<meta charset="UTF-8" />



<!-- <meta http-equiv='refresh' content='10; url=https://yakovlevdev.com/#conacts'>
<meta charset="UTF-8" />

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
 -->