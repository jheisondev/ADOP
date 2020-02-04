<?php
    // inclui as classes do PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    if((!isset ($_POST['nome']) == true) 
    and (!isset ($_POST['email']) == true) 
    and (!isset ($_POST['mensagem']) == true)){
        echo 0;   
    }else{
        $nome  = utf8_decode($_POST['nome']);
        $email = $_POST['email'];
        $msg   = utf8_decode($_POST['mensagem']);

        
        // inclui o autoloader do Composer
        require_once("../vendor/autoload.php");
        
        // inicia a classe PHPMailer habilitando o disparo de exceções
        $mail = new PHPMailer(true);
        try
        {
            // habilita o debug
            // 0 = em mensagens de debug
            // 1 = mensagens do cliente SMTP
            // 2 = mensagens do cliente e do servidor SMTP
            // 3 = igual o 2, incluindo detalhes da conexão
            // 4 = igual o 3, inlcuindo mensagens de debug baixo-nível
            //$mail->SMTPDebug = 2;
            
            // utilizar SMTP
            $mail->isSMTP();
        
            // habilita autenticação SMTP
            $mail->SMTPAuth = true;
        
            // servidor SMTP
            $mail->Host = 'smtp.live.com'; 
        
            // usuário, senha e porta do SMTP
            $mail->Username = 'adop.tech@hotmail.com';
            $mail->Password = 'klf368jh';
            $mail->Port = 587;
            
            // tipo de criptografia: "tls" ou "ssl"
            $mail->SMTPSecure = 'tls';
            
            // email e nome do remetente
            $mail->setFrom('adop.tech@hotmail.com', $nome);
            
            // Email e nome do(s) destinatário(s)
            // você pode chamar addAddress quantas vezes quiser, para
            // incluir diversos destinatários
            $mail->addAddress('adop.tech@hotmail.com', 'Jheison Maciel Ines');
            
            // endereço que receberá as respostas
            $mail->addReplyTo($email, $nome); 
            
            // define o formato como HTML
            $mail->isHTML(true);
            
            // codificação UTF-8
            $mail->Charset = 'UTF-8';
            
            // assunto do email
            $mail->Subject = 'ADOP - Contato';
            
            // corpo do email em HTML
            $mail->Body    = '<h3>Mensagem de contato</h3><p>'
            .$msg.'</p><br/>'.$nome.'<br/>'.$email;
            
            // corpo do email em texto
            //$mail->AltBody = $msg." Email de contato: ".$email." Nome: ".$nome;
            
            // envia o email
            $mail->send();
            
            echo 1;
        }
        catch (Exception $e)
        {
            echo 'Erro: ' . $mail->ErrorInfo . PHP_EOL;
        }
} 

