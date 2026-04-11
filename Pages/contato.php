<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    $instituicao = trim($_POST["instituicao"] ?? "");
    $assunto = trim($_POST["assunto"] ?? "");
    $mensagem = trim($_POST["mensagem"] ?? "");
    $newsletter = isset($_POST["newsletter"]) ? "Sim" : "Não";

    if (
        empty($nome) ||
        empty($email) ||
        empty($telefone) ||
        empty($instituicao) ||
        empty($assunto) ||
        empty($mensagem)
    ) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Informe um email válido.");
    }

    $conteudo = "------------------------------\n";
    $conteudo .= "Nome: $nome\n";
    $conteudo .= "Email: $email\n";
    $conteudo .= "Telefone: $telefone\n";
    $conteudo .= "Instituição: $instituicao\n";
    $conteudo .= "Assunto: $assunto\n";
    $conteudo .= "Mensagem: $mensagem\n";
    $conteudo .= "Receber novidades: $newsletter\n";
    $conteudo .= "Data: " . date("d/m/Y H:i:s") . "\n";
    $conteudo .= "------------------------------\n";

    $arquivo = "../mensagens-contato.txt";

    if (file_put_contents($arquivo, $conteudo, FILE_APPEND | LOCK_EX)) {
        echo "<!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
          <meta charset='UTF-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <title>Mensagem enviada</title>
          <style>
            body{font-family:Arial,sans-serif;background:#f6f3ee;display:flex;align-items:center;justify-content:center;min-height:100vh;margin:0;}
            .box{background:#fff;padding:40px;max-width:520px;box-shadow:0 10px 30px rgba(0,0,0,.08);text-align:center;}
            h1{color:#AD0000;font-weight:600;}
            a{display:inline-block;margin-top:20px;padding:14px 24px;background:#AD0000;color:#fff;text-decoration:none;}
          </style>
        </head>
        <body>
          <div class='box'>
            <h1>Mensagem enviada com sucesso!</h1>
            <p>Obrigado pelo contato. Sua mensagem foi registrada corretamente.</p>
            <a href='../Pages/contato.html'>Voltar</a>
          </div>
        </body>
        </html>";
    } else {
        die("Não foi possível salvar sua mensagem.");
    }
} else {
    die("Acesso inválido.");
}
?>