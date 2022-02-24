<?

class conta_bancaria{

    private $pk;
    private $dt_cadastro;
    private $usuario_cadastro_pk;
    private $dt_ult_atualizacao;
    private $usuario_ult_atualizacao_pk;
    
    private $ds_conta_bancaria;
    private $ds_agencia;
    private $ds_conta;
    private $tipo_conta_pk;
    private $vl_saldo_inicial;
    private $ic_status;
    private $bancos_pk;
    private $empresas_pk;

    
    
    function __construct(){
        $this->pk = null;
        $this->dt_cadastro = null;
        $this->usuario_cadastro_pk = null;
        $this->dt_ult_atualizacao = null;
        $this->usuario_ult_atualizacao_pk = null;
        
        $this->ds_conta_bancaria = null;
        $this->ds_agencia = null;
        $this->ds_conta = null;
        $this->tipo_conta_pk = null;
        $this->vl_saldo_inicial = null;
        $this->ic_status = null;
        $this->bancos_pk = null;
        $this->empresas_pk = null;

    }    
    
    public function getpk(){return $this->pk;}
    public function getdt_cadastro(){return $this->dt_cadastro;}
    public function getusuario_cadastro_pk(){return $this->usuario_cadastro_pk;}
    public function getdt_ult_atualizacao(){return $this->dt_ult_atualizacao;}
    
    function getds_conta_bancaria(){return $this->ds_conta_bancaria;}
    function getds_agencia(){return $this->ds_agencia;}
    function getds_conta(){return $this->ds_conta;}
    function gettipo_conta_pk(){return $this->tipo_conta_pk;}
    function getvl_saldo_inicial(){return $this->vl_saldo_inicial;}
    function getic_status(){return $this->ic_status;}
    function getbancos_pk(){return $this->bancos_pk;}
    function getempresas_pk(){return $this->empresas_pk;}

    
    public function setpk($v_pk){$this->pk = $v_pk;}
    public function setdt_cadastro($v_dt_cadastro){$this->dt_cadastro = $v_dt_cadastro;}
    public function setusuario_cadastro_pk($v_usuario_cadastro_pk){$this->usuario_cadastro_pk = $v_usuario_cadastro_pk;}
    public function setdt_ult_atualizacao($v_dt_ult_atualizacao){$this->dt_ult_atualizacao = $v_dt_ult_atualizacao;}
    public function setusuario_ult_atualizacao_pk($v_usuario_ult_atualizacao_pk){$this->usuario_ult_atualizacao_pk = $v_usuario_ult_atualizacao_pk;}
    
    function setds_conta_bancaria($ds_conta_bancaria){ $this->ds_conta_bancaria = $ds_conta_bancaria;}
    function setds_agencia($ds_agencia){ $this->ds_agencia = $ds_agencia;}
    function setds_conta($ds_conta){ $this->ds_conta = $ds_conta;}
    function settipo_conta_pk($tipo_conta_pk){ $this->tipo_conta_pk = $tipo_conta_pk;}
    function setvl_saldo_inicial($vl_saldo_inicial){ $this->vl_saldo_inicial = $vl_saldo_inicial;}
    function setic_status($ic_status){ $this->ic_status = $ic_status;}
    function setbancos_pk($bancos_pk){ $this->bancos_pk = $bancos_pk;}
    function setempresas_pk($empresas_pk){ $this->empresas_pk = $empresas_pk;}

    
}

?>
