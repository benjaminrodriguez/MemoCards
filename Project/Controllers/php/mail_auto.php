<?php
    function mail_auto_inscription ()
    {
        $to      = 'benjamin-rodriguez@outlook.fr';
        $subject = 'Inscription MemoCards';
        $message = 'Bienvenue'.$_POST['username'].' sur Memocards';
        $headers = 'From: benjamin-rodriguez@outlook.fr' . "\r\n" .
        'Reply-To: benjamin-rodriguez@outlook.fr' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
    }
?>