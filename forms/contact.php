<?php
include "phpmailer/class.smtp.php";
require_once('phpmailer/class.phpmailer.php');
require 'phpmailer/PHPMailerAutoload.php';


$userName = $_REQUEST['name']; //echo $userEmail;
$userEmail = $_REQUEST['email']; //customer emailid
$subject = $_REQUEST['subject']; //customer emailid
$userMsg = $_REQUEST['message'];

$mail = new PHPMailer();

   $mail->IsSMTP();                       // telling the class to use SMTP
   
   $mail->SMTPDebug = 2; // 0 = no output, 1 = errors and messages, 2 = messages only.
   $mail->SMTPAuth = true;                // enable SMTP authentication 
   $mail->SMTPSecure = "ssl";              // sets the prefix to the servier
   //$mail->SMTPSecure = "ssl/tls";              // sets the prefix to the servier
   $mail->Host = "mail.softlandindia.co.in";        // sets Gmail as the SMTP server //mail.softlandindia.co.in                    
   //$mail->Host = "mail.windrolinx.com";        // sets Gmail as the SMTP server //mail.softlandindia.co.in                    
   $mail->Port = 465;                     // set the SMTP port for the GMAIL 


   $mail->Username = "info@softlandindia.co.in";  // Gmail username //ebilling@technopark.org //info@softlandindia.co.in
   $mail->Password = ")*0s)tcFr(VZZ5Hwlw!23dHsJtj";      // Gmail password //Billing@910 //Wd2jg50@


    
   $mail->CharSet = 'windows-1250';
   $mail->SetFrom('info@softlandindia.co.in', 'Softland-contact');
   

   $mail->Subject = $subject;
   $mail->ContentType = 'text/html';
   $mail->IsHTML(false);

   //$mail->Body = 'User Name : '.$userName.'\r\n\r\n'.'User Email : '.$userEmail.'\r\n\r\n'.$userMsg;
   $mail->Body = 'User Name : '.$userName.'</br>'.'User Email : '.$userEmail.'</br>'.$userMsg;

   $mail->AddAddress('info@softlandindia.co.in', 'Customer');
   $mail->AddReplyTo($userEmail, 'Customer Email Address');

   $FailureCount = 0;
   $SuccessCount = 0;
   $error_message = '';
   $mail->Send();
  // return 'Successfully sent!'; 
   echo json_encode('Success');
//    try{
//         if (!$mail->Send()) {
//             $error_message = "Mailer Error: " . $mail->ErrorInfo;
//             //echo $error_message; 
//             $FailureCount = $FailureCount + 1;
//         } else {
//             //$error_message = "Successfully sent!";
//             //echo 'Successfully sent!'; 
//             $SuccessCount = $SuccessCount + 1;
            
//         }
//     } catch (Exception $e) {
//         echo 'Successfully sent!'; 
//     }


