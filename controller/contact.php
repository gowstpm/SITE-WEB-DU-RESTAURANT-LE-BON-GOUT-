<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $mail = new PHPMailer(true);
    
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'kilianjunkpro@gmail.com';
        $mail->Password = 'wrcv xqlx nhrz kkhk';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        
        // Recipients
        $mail->setFrom('kilianjunkpro@gmail.com', 'Le Bon Goût');
        $mail->addAddress('kilianjunkpro@gmail.com', 'Le Bon Goût Admin');
        
        // Email content
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body = "
            <strong>Nom:</strong> $name<br>
            <strong>Email:</strong> $email<br>
            <strong>Message:</strong><br>
            $message
        ";

        // Send the email
        $mail->send();
        echo "Merci $name, votre message a été envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur: {$mail->ErrorInfo}";
    }
} else {
    header("Location: ../contact.html");
    exit;
}
?>
