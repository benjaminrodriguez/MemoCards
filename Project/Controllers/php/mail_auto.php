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


    function send_mail ()
    {

        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Memocards.com"<support@primfx.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
            <body>
                <div align="center">
                    <img src="http://www.primfx.com/mailing/banniere.png"/>
                    <br />
                    Bienvenue sur Memocards test !
                    <br />
                    <img src="http://www.primfx.com/mailing/separation.png"/>
                </div>
            </body>
        </html>
        ';

        mail($_POST['email'], "Inscription sur Memocards", $message, $header);
    }
?>