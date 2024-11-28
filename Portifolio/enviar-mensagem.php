<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    // Validação simples
    if (empty($nome) || empty($email) || empty($assunto) || empty($mensagem)) {
        echo "Por favor, preencha todos os campos.";
        exit;
    }

    // Definindo o e-mail para onde a mensagem será enviada
    $to = $email; // O email fornecido pelo usuário
    $subject = "Mensagem de Contato: " . $assunto; // Assunto do e-mail
    $message = "Nome: $nome\nE-mail: $email\n\nMensagem:\n$mensagem"; // Corpo da mensagem

    // Cabeçalhos para enviar o e-mail corretamente
    $headers = "From: no-reply@seusite.com\r\n"; // Substitua pelo seu domínio
    $headers .= "Reply-To: $email\r\n"; // Responde ao e-mail do remetente
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($to, $subject, $message, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Ocorreu um erro ao enviar a mensagem. Tente novamente mais tarde.";
    }
}
?>
