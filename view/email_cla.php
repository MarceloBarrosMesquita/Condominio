<?
include_once "../../libs/datas.php";

class email{

	private $pk;
	private $dt_cadastro;
	private $usuario_cadastro_pk;
	private $dt_ult_atualizacao;
	private $usuario_ult_atualizacao_pk;
        private $mailing;
        private $email_modelo_pk;

	function getpk() {return $this->pk;}
	function getdt_cadastro(){return $this->dt_cadastro;}
	function getdt_ult_atualizacao(){return $this->dt_ult_atualizacao;}
	function getusuario_cadastro_pk(){return $this->usuario_cadastro_pk;}
        function getmailing(){return $this->mailing;}
        function getemail_modelo_pk(){return $this->email_modelo_pk;}
        
	function getusuario_cadastro_nome_pk(){
            $strRetorno = "";
            $sql = "select nome from usuariosinternos where codusuariointerno = ".$this->usuario_cadastro_pk;
            $result = mysql_query($sql);
            while($row = mysql_fetch_array($result)){
                    $strRetorno = $row["nome"];
            }
            mysql_free_result($result);
            return $strRetorno;
	}

	function getusuario_ult_atualizacao_pk(){return $this->usuario_ult_atualizacao_pk;}
        
	function getusuario_ult_atualizacao_nome_pk(){
            $strRetorno = "";
            $sql = "select nome from usuariosinternos where codusuariointerno = ".$this->usuario_ult_atualizacao_pk;
            $result = mysql_query($sql);
            while($row = mysql_fetch_array($result)){
                    $strRetorno = $row["nome"];
            }
            mysql_free_result($result);
            return $strRetorno;
	}

	function setpk($pk){$this->pk = $pk;}
	function setmailing($mailing){$this->mailing = $mailing;}
        function setemail_modelo_pk($email_modelo_pk){$this->email_modelo_pk = $email_modelo_pk;}

	function __construct($pk){
            $this->pk = null;
            $this->dt_cadastro = null;
            $this->usuario_cadastro_pk = null;
            $this->dt_ult_atualizacao = null;
            $this->usuario_ult_atualizacao = null;
            $this->mailing = null;
            $this->email_modelo_pk = null;

            if ($pk != 0){
                $sql ="select  pk ";
                $sql.="       ,date_format(dt_cadastro, '%d/%m/%Y %H:%i:%s') dt_cadastro ";
                $sql.="       ,date_format(dt_ult_atualizacao, '%d/%m/%Y %H:%i:%s') dt_ult_atualizacao ";
                $sql.="       ,usuario_cadastro_pk ";
                $sql.="       ,usuario_ult_atualizacao_pk ";
                $sql.="       ,mailing ";
                $sql.="       ,email_modelo_pk ";
                $sql.="  from email ";
                $sql.=" where pk = ".$pk;
                $result = mysql_query($sql);
                while($row = mysql_fetch_array($result)){
                    $this->pk = $row['pk'];
                    $this->dt_cadastro = $row['dt_cadastro'];
                    $this->dt_ult_atualizacao = $row['dt_ult_atualizacao'];
                    $this->usuario_cadastro_pk = $row['usuario_cadastro_pk'];
                    $this->usuario_ult_atualizacao_pk = $row['usuario_ult_atualizacao_pk'];
                    $this->mailing = $row['mailing'];
                }
                mysql_free_result($result);
            }
	}

	function salvar(){
            $fields['mailing'] = $this->mailing;
            $fields['email_modelo_pk'] = $this->email_modelo_pk;

            //salva a ocorrencia no banco de dados.
            if (empty($this->pk) || trim($this->pk) == ""){
                $fields['dt_cadastro'] = "sysdate()";
                $fields['dt_ult_atualizacao'] = "sysdate()";
                $fields['usuario_cadastro_pk'] = $_SESSION['codusuario'];
                $fields['usuario_ult_atualizacao_pk'] = $_SESSION['codusuario'];
                
                $sql = sqlinsert('emails', $fields);
     
                mysql_query($sql);
                $this->pk = mysql_insert_id();

            }else{
                $fields['dt_ult_atualizacao'] = "sysdate()";
                $fields['usuario_ult_atualizacao_pk'] = $_SESSION['codusuario'];
                $sql = sqlupdate('emails', $fields, ' pk = ' . mysqlnull($this->pk));
                mysql_query($sql);
            }

		return $this->pk;
	}
        //Bestflow
        function registra_envio_Email($email,$codlead,$html,$modelo_envio_pk){            
            $fields['ds_email'] = $email;
            $fields['codlead'] = $codlead;
            $fields['emails_pk'] = $this->pk;
            $fields['dt_envio'] = sysdate();
            $fields['modelo_envio_pk'] = $modelo_envio_pk;
            
      
            $sql ="";
            $sql.= sqlinsert('emails_enviados', $fields);
          
            mysql_query($sql); 
    
            //Registra OC
             $this->registraOc($codlead, $email);  
            
            //Envia E-mail
            $this->enviaEmail($email, $html);            
        }
	//Gepros
        function registra_envio_Email_Gepros($email,$codlead,$html,$modelo_envio_pk){  
            $fields = array();
            $fields['ds_email'] = $email;
            $fields['codlead'] = $codlead;
            $fields['emails_pk'] = $this->pk;
            $fields['dt_envio'] = "sysdate()";
            $fields['modelo_envio_pk'] = $modelo_envio_pk;

            $sql= sqlinsert('emails_enviados', $fields);

            mysql_query($sql); 
    
            //Registra OC
             //$this->registraOc($codlead, $email);  

        }

        function registraOc($codlead,$email){
            $fields['codlead'] = $codlead;
            $fields['descricao'] = "Envio de E-mail ".$email;
            $fields['codtipoocorrencialead'] =20;
            $fields['datacadastro'] = "sysdate()";
            $fields['datafechamento'] = "sysdate()";
            $fields['codusuariointerno'] = $_SESSION['codusuario'];           
            
            $sql ="";
            $sql.= sqlinsert('ocorrenciaslead', $fields);
 
            mysql_query($sql); 
        }
        
        function enviaEmailGepros($destinatario,$html){

            $remetente = "sistema@gepros.com.br";

            $psw = "@Vectra_10";
            $assunto = "Gepros";
            $msg = $html;

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP
            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "vps-4378124.gepros.com.br";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = $remetente;
            $mail->Password = $psw;
            $mail->SetFrom($remetente);
            $mail->Subject = $assunto;
            $mail->Body = $msg;
            $mail->AddAddress($destinatario);
            
            $mail->Send();
            echo "aqui";
            //$mail->Send();  

        }

        function enviaEmail($destinatario,$html){
            
            error_reporting(E_STRICT);
            date_default_timezone_set('America/Toronto');
             
            require_once('../../PHPMailer/class.phpmailer.php');
           
            //include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

            $mail  = new PHPMailer();
            
          $mail->SMTPDebug = 0;// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
            $mail->SMTPAuth = true;// Autentica��o ativada
            $mail->Debugoutput = 'html';
            $mail->isHTML(true);
            $mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
            $mail->Host = 'host208.hostmonster.com';	// SMTP utilizado
            $mail->Port = 993;  		// A porta 587 dever� estar aberta em seu servidor
            $mail->Username = 'marcelo.souza@bestflow.com.br';
            $mail->Password = 'mar.123.best';
            $mail->SetFrom('marcelo.souza@bestflow.com.br', 'marcelo.souza@bestflow.com.br');
            $mail->Subject = 'BESTFLOW';
            $mail->Body = $html;
            $mail->AddAddress($destinatario);
            $mail->Send();
        }

       

	function excluir($codcontato){
            $sql ="";
            $sql.= "delete from contatoslead where codcontatolead = ".$codcontato;
            mysql_query($sql);
            
            /*$sql ="";
            $sql.= "delete from leads where codlead = ".$codlead;
            mysql_query($sql);
            return true;*/
	}
        
       

}
?>
