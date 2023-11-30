<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function ctrlSendMail($request, $response, $container) {

    $email = $request->get(INPUT_POST, "email");

    $id = $container->get("users")->getIdByEmail($email);

    $token = bin2hex(random_bytes(16));

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "info.orlify@gmail.com";
        $mail->Password = "phwyywokoqematof";

        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;

        $mail->setFrom("info.orlify@gmail.com", "Orlify");
        $mail->addAddress($email);

        // Link with the token
        $resetLink = "http://localhost:8080/changePass?token=" . $token;

        $mail->isHTML(true);

        $mail->Subject = "Recuperacio contrasenya";
        $mail->Body = "
            Hola, 
            <br>
            <br>

            Has demanat recuperar la contrasenya.
            <br>
            <br>

            Per restablir-la, segueix aquest <a href='{$resetLink}'>enllaç</a>.
            <br>
            <br>
            Gràcies
            <br>
            <br>

            Equip d'Orlify
        ";

        $mail->send();

        $container->get("users")->token($token, $id);

        $response->setTemplate("complete.php");

        return $response;
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
