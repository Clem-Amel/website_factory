<?php
function sendWithAttachments($to, $subject, $htmlMessage)
{
    // обработка и формирование письма
    $maxTotalAttachments = 2097152;
    $boundary_text = "anyRandomStringOfCharactersThatIsUnlikelyToAppearInEmail";
    $boundary = "--" . $boundary_text . "\r\n";
    $boundary_last = "--" . $boundary_text . "--\r\n";

    $emailAttachments = "";
    $totalAttachmentSize = 0;
    foreach ($_FILES as $file) {
        if ($file['error'] == 0 && $file['size'] > 0) {
            $fileContents = file_get_contents($file['tmp_name']);
            $totalAttachmentSize += $file['size']; //size in bytes
            $emailAttachments .= "Content-Type: "
                . $file['type'] . "; name=\"" . basename($file['name']) . "\"\r\n"
                . "Content-Transfer-Encoding: base64\r\n"
                . "Content-disposition: attachment; filename=\""
                . basename($file['name']) . "\"\r\n"
                . "\r\n"
                . chunk_split(base64_encode($fileContents))
                . $boundary;
        }
    }

     if ($totalAttachmentSize > $maxTotalAttachments) {
        echo "<h2>Сообщение не было отправлено.</h2> Общее количество вложений не может превышать " . $maxTotalAttachments . " байт.";
    } else {
        $headers = "From: yourserver@example.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n"
            . "Content-Type: multipart/mixed; boundary=\"$boundary_text\"" . "\r\n";
        $body = "If you can see this, your email client "
            . "doesn't accept MIME types!\r\n"
            . $boundary;

        $body .= $emailAttachments;

        $body .= "Content-Type: text/html; charset=\"utf-8\"\r\n"
            . "Content-Transfer-Encoding: 7bit\r\n\r\n"
            . $htmlMessage . "\r\n"
            . $boundary_last;
       // отправка письма и дальнейшие действия
        if (mail($to, $subject, $body, $headers)) {
            echo "<h2>Спасибо!</h2>Мы скоро свяжемся с Вами <br />";
        } else {
            echo '<h2>Ошибка - сообщение не отправлено.</h2>';
        }
    }
}
?>