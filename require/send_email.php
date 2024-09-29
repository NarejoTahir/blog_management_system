<?php
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            require '../PHPMailer-master/src/PHPMailer.php';
            require '../PHPMailer-master/src/SMTP.php';
            require '../PHPMailer-master/src/Exception.php';

    class Email {

        public function send_mail($sent_to,$subject,$message){
             $mail = new PHPMailer();

             $mail->isSMTP();


            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->SMTPAuth = true;

            $mail->Username = 'muhammadtahirnarejo@gmail.com';
            $mail->Password = 'obtkqfqrpxqavrsv';

            $mail->setFrom('muhammadtahirnarejo@gmail.com', 'Muhammad Tahir');

            $mail->addAddress($sent_to);

            $mail->Subject = $subject;

            $mail->msgHTML("<b>".$message."</b>");

            if (!$mail->send()) {   
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } 
            else {
                 return true;
            }

        }
    }


?>