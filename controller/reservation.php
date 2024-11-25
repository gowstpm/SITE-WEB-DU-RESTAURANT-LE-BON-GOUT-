<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $date = htmlspecialchars($_POST['date']);
    $people = htmlspecialchars($_POST['people']);
    
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
        $mail->Subject = "Nouvelle réservation de $name";
        $mail->Body = "
            <strong>Nom:</strong> $name<br>
            <strong>Email:</strong> $email<br>
            <strong>Date:</strong> $date<br>
            <strong>Nombre de personnes:</strong> $people
        ";

        $mail->send();
        echo "Merci $name, votre réservation a été envoyée avec succès.";
    } catch (Exception $e) {
        echo "Erreur: {$mail->ErrorInfo}";
    }
} else {
    header("Location: ../index.html");
    exit;
}
?>
