<?php
// Проверка наличия данных формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка наличия данных reCAPTCHA
    if (isset($_POST['g-recaptcha-response'])) {
        $captcha = $_POST['g-recaptcha-response'];
    }
    // Если нет данных reCAPTCHA, остановим выполнение скрипта
    if (!$captcha) {
        echo '<h2>Please check the reCAPTCHA box.</h2>';
        exit;
    }

    // Секретный ключ вашего сайта
    $secretKey = "6LdN6m4pAAAAADSp72wcbdP4rogNrISx4DZXVRbV";

    // Проверка reCAPTCHA
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha);
    $responseKeys = json_decode($response, true);

    // Если reCAPTCHA не прошла проверку, выведите ошибку
    if (intval($responseKeys["success"]) !== 1) {
        echo '<h2>reCAPTCHA verification failed!</h2>';
    } else {
        // Если reCAPTCHA прошла проверку, продолжаем обработку формы
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Формируем тело сообщения
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message:\n$message";

        // Отправляем письмо на вашу почту
        $to = "yakovlev@yakovlevdev.com";
        $subject = "Feedback Form Submission";
        $headers = "From: $email \r\n";
        $headers .= "Reply-To: $email \r\n";

        // Отправляем письмо
        if (mail($to, $subject, $body, $headers)) {
            echo '<h2>Thank you for your feedback!</h2>';
        } else {
            echo '<h2>Sorry, something went wrong. Please try again later.</h2>';
        }
    }
} else {
    // Если попытка доступа к скрипту напрямую, перенаправляем на главную страницу
    header("Location: index.php");
    exit;
}
?>


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