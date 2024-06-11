<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Убедимся, что данные заполнены
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Заполните все поля и попробуйте еще раз.";
        exit;
    }

    // Получатель письма
    $recipient = "Mr.megels@gmail.com"; 

    // Тема письма
    $subject = "Новое сообщение от $name";

    // Содержимое письма
    $email_content = "Имя: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Сообщение:\n$message\n";

    // Заголовки
    $email_headers = "From: $name <$email>";

    // Отправка письма
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        echo "Спасибо! Ваше сообщение было отправлено.";
    } else {
        echo "Извините, возникла проблема при отправке вашего сообщения.";
    }
} else {
    echo "Произошла ошибка. Попробуйте отправить форму еще раз.";
}
