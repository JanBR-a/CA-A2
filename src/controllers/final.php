<?php

print 'INFO<BR>';
$array_subjects = validate();
$_SESSION['array_subjects'] = $array_subjects;
$array_alumns = isset($_SESSION['alumns']) ? $_SESSION['alumns'] : [];
$array_professors = isset($_SESSION['professors']) ? $_SESSION['professors'] : [];
print $array_alumns;
escribirEnArchivo($array_professors, $array_alumns, $array_subjects);

// El archivo se guardara arriba de index.php DENTRO DEL PROJECTO.

$fileAttachment = 'Projectes/Activitat2/datos.txt';

function sendMail(
    string $fileAttachment,
    string $mailMessage = MAIL_CONF['Archive data act 2 txt'],
    string $subject = MAIL_CONF['Archive data act 2 txt'],
    string $toAddress = MAIL_CONF['janblanconuria@gmail.com'],
    string $fromMail = MAIL_CONF['janblanconuria@gmail.com']
): bool {
    $fileAttachment = trim($fileAttachment);
    $from = $fromMail;
    $pathInfo = pathinfo($fileAttachment);
    $attchmentName = 'attachment_' . date('YmdHms') . (
        (isset($pathInfo['extension'])) ? '.' . $pathInfo['extension'] : ''
    );
    $attachment = chunk_split(base64_encode(file_get_contents($fileAttachment)));
    $boundary = 'PHP-mixed-' . md5(time());
    $boundWithPre = "\n--" . $boundary;
    $headers = "From: $from";
    $headers .= "\nReply-To: $from";
    $headers .= "\nContent-Type: multipart/mixed; boundary=\"" . $boundary . '"';
    $message = $boundWithPre;
    $message .= "\n Content-Type: text/plain; charset=UTF-8\n";
    $message .= "\n $mailMessage";
    $message .= $boundWithPre;
    $message .= "\nContent-Type: application/octet-stream; name=\"" . $attchmentName . '"';
    $message .= "\nContent-Transfer-Encoding: base64\n";
    $message .= "\nContent-Disposition: attachment\n";
    $message .= $attachment;
    $message .= $boundWithPre . '--';
    return mail($toAddress, $subject, $message, $headers);
}
