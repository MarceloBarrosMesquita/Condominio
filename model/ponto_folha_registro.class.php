<?

class ponto_folha_registro{

    private $pk;
    private $dt_cadastro;
    private $usuario_cadastro_pk;
    private $dt_ult_atualizacao;
    private $usuario_ult_atualizacao_pk;
    
    private $ponto_pk;
    private $tipo_ponto_pk;
    private $dt_hora_ponto;
    private $tipo_registr_folha;
    private $ponto_folha_pk;

    
    
    function __construct(){
        $this->pk = null;
        $this->dt_cadastro = null;
        $this->usuario_cadastro_pk = null;
        $this->dt_ult_atualizacao = null;
        $this->usuario_ult_atualizacao_pk = null;
        
        $this->ponto_pk = null;
        $this->tipo_ponto_pk = null;
        $this->dt_hora_ponto = null;
        $this->tipo_registr_folha = null;
        $this->ponto_folha_pk = null;

    }    
    
    public function getpk(){return $this->pk;}
    public function getdt_cadastro(){return $this->dt_cadastro;}
    public function getusuario_cadastro_pk(){return $this->usuario_cadastro_pk;}
    public function getdt_ult_atualizacao(){return $this->dt_ult_atualizacao;}
    
    function getponto_pk(){return $this->ponto_pk;}
    function gettipo_ponto_pk(){return $this->tipo_ponto_pk;}
    function getdt_hora_ponto(){return $this->dt_hora_ponto;}
    function gettipo_registr_folha(){return $this->tipo_registr_folha;}
    function getponto_folha_pk(){return $this->ponto_folha_pk;}

    
    public function setpk($v_pk){$this->pk = $v_pk;}
    public function setdt_cadastro($v_dt_cadastro){$this->dt_cadastro = $v_dt_cadastro;}
    public function setusuario_cadastro_pk($v_usuario_cadastro_pk){$this->usuario_cadastro_pk = $v_usuario_cadastro_pk;}
    public function setdt_ult_atualizacao($v_dt_ult_atualizacao){$this->dt_ult_atualizacao = $v_dt_ult_atualizacao;}
    public function setusuario_ult_atualizacao_pk($v_usuario_ult_atualizacao_pk){$this->usuario_ult_atualizacao_pk = $v_usuario_ult_atualizacao_pk;}
    
    function setponto_pk($ponto_pk){ $this->ponto_pk = $ponto_pk;}
    function settipo_ponto_pk($tipo_ponto_pk){ $this->tipo_ponto_pk = $tipo_ponto_pk;}
    function setdt_hora_ponto($dt_hora_ponto){ $this->dt_hora_ponto = $dt_hora_ponto;}
    function settipo_registr_folha($tipo_registr_folha){ $this->tipo_registr_folha = $tipo_registr_folha;}
    function setponto_folha_pk($ponto_folha_pk){ $this->ponto_folha_pk = $ponto_folha_pk;}

    
}

?>
