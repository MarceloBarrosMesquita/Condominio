<?
set_time_limit(10000000);
include_once '../inc/php/public.php';
include_once '../inc/classes/bestflow/DataBase.php';

class enviar_emaildao{

    private $db;
    private $arrToken;

    public function __construct(){
        
        $this->db = new DataBase();
        $this->db->conectar();
        
    }
    
    public function __destruct() {
        $this->db->desconectar();
    }
    
    
    public function setToken($v_token){
        $this->arrToken = tratarToken($v_token);
    }       
    
    function envia_email($html,$emailde,$emailpara,$assunto){       
       
        $from = $emailde;//de:
        $to = $emailpara;//para:
        $body = $html;
        //$cc = "douglas.lopes@gepros.com.br";
        $mailheaders = "From: $from\n";
        $mailheaders .= "Reply-To: $ReplyTo\n";
        $mailheaders .= "Cc: $emailde\n";
        $mailheaders .= "Bcc: $bcc\n";
        $mailheaders .= "X-Mailer: $assunto \n";

        $msg_body = stripslashes($body);

        $mailheaders .= "MIME-version: 1.0\n";
        $mailheaders .= "Content-type: multipart/mixed; ";
        //$mailheaders .= "Content-type: text/html; charset=utf-8\n";
        $mailheaders .= "boundary=\"Message-Boundary\"\n";
        $mailheaders .= "Content-transfer-encoding: 7BIT\n";
        //if(!empty($anexo)){
        //	$mailheaders .= "X-attachments: $attach_name";
        //}
        $body_top = "--Message-Boundary\n";
        $body_top .= "Content-type: text/html; charset=US-ASCII\n";
        $body_top .= "Content-transfer-encoding: 7BIT\n";
        $body_top .= "Content-description: Mail message body\n\n";

        $msg_body = $body_top . $msg_body;

        $msg_body .= "\n\n--Message-Boundary\n";
        $msg_body .= "Content-Transfer-Encoding: BASE64\n";
        //$msg_body .= "Content-disposition: attachment; filename=\"$attach_name\"\n\n";
        //$msg_body .= "$encoded_attach\n";
        $msg_body .= "--Message-Boundary--\n";

        mail($to, stripslashes($assunto), $msg_body, $mailheaders);           
        
    }
    
       /*function enviaEmailAutenticado($html,$emailde,$emailpara,$assunto){
            error_reporting(E_STRICT);
            date_default_timezone_set('America/Toronto');
                    
            $remetente = "sistema@gepros.com.br";

            $psw = "@Vectra_10";
            //$assunto = "Gepros";
            $msg = $html;

            $query = file_get_contents("http://emailsmtp.gepros.com.br/EmailSMTP.php?job=disparoEmailSmtp&remetente=".$remetente."&psw=".$psw."&assunto=".$assunto."&msg=".$html."&destinatario=".$emailpara);  
            
            
        }*/
    
    
    function enviaEmailAutenticado($html,$emailde,$emailpara,$assunto,$emailcopia){
            
            error_reporting(E_STRICT);
            date_default_timezone_set('America/Toronto');
                       
            $remetente = "sistema@gepros.com.br";
            $psw = "@Vectra_10";
                       
            require("../inc/PHPMailer-master/src/PHPMailer.php");
            
            require("../inc/PHPMailer-master/src/SMTP.php");
            
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "vps-4378124.gepros.com.br";
            //$mail->Host = "162.241.73.23";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = $remetente;
            $mail->Password = $psw;
            $mail->SetFrom($remetente);
            /*$mail->Subject = $assunto;
            $mail->Body = $html;*/
            $mail->Subject = utf8_decode($assunto);
            $mail->Body = utf8_decode($html);
            $mail->AddAddress($emailpara);
            if($emailcopia!=""){
                $mail->addCC($emailcopia);
            }
            

            $mail->Send();
            
            
            
            
            //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

            /*$mail  = new PHPMailer();

            $mail->SMTPDebug = 0;// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail->SMTPAuth = true;// Autentica��o ativada
            $mail->Debugoutput = 'html';
            $mail->isHTML(true);
            $mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
            $mail->Host = 'mail.gepros.com.br';	// SMTP utilizado
            $mail->Port = 587;  		// A porta 587 dever� estar aberta em seu servidor
            $mail->Username = 'sistema@gepros.com.br';
            $mail->Password = '@Vectra_10';
            $mail->SetFrom('sistema@gepros.com.br', 'sistema@gepros.com.br');
            $mail->Subject = utf8_decode($assunto);
            $mail->Body = utf8_decode($html);
            $mail->AddAddress($emailpara);
        
            $mail->Send();*/
   
        }

}

?>
