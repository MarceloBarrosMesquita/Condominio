<?

class produto_servico{

    private $pk;
    private $dt_cadastro;
    private $usuario_cadastro_pk;
    private $dt_ult_atualizacao;
    private $usuario_ult_atualizacao_pk;
    
    private $ds_produto_servico;
    private $ds_obs;
    private $ic_status;
    /*private $polos_pk;
    private $tipos_unidades_pk;
    private $fornecedor_pk;*/

    
    
    function __construct(){
        $this->pk = null;
        $this->dt_cadastro = null;
        $this->usuario_cadastro_pk = null;
        $this->dt_ult_atualizacao = null;
        $this->usuario_ult_atualizacao_pk = null;
        
        $this->ds_produto_servico = null;
        $this->ds_obs = null;
        $this->ic_status= null;
        /*$this->polos_pk= null;
        $this->tipos_unidades_pk= null;
        $this->fornecedor_pk= null;*/

    }    
    
    public function getpk(){return $this->pk;}
    public function getdt_cadastro(){return $this->dt_cadastro;}
    public function getusuario_cadastro_pk(){return $this->usuario_cadastro_pk;}
    public function getdt_ult_atualizacao(){return $this->dt_ult_atualizacao;}
    
    function getds_produto_servico(){return $this->ds_produto_servico;}
    function getds_obs(){return $this->ds_obs;}
    function getic_status(){return $this->ic_status;}
    /*function getpolos_pk(){return $this->polos_pk;}
    function gettipos_unidades_pk(){return $this->tipos_unidades_pk;}
    function getfornecedor_pk(){return $this->fornecedor_pk;}*/

    
    public function setpk($v_pk){$this->pk = $v_pk;}
    public function setdt_cadastro($v_dt_cadastro){$this->dt_cadastro = $v_dt_cadastro;}
    public function setusuario_cadastro_pk($v_usuario_cadastro_pk){$this->usuario_cadastro_pk = $v_usuario_cadastro_pk;}
    public function setdt_ult_atualizacao($v_dt_ult_atualizacao){$this->dt_ult_atualizacao = $v_dt_ult_atualizacao;}
    public function setusuario_ult_atualizacao_pk($v_usuario_ult_atualizacao_pk){$this->usuario_ult_atualizacao_pk = $v_usuario_ult_atualizacao_pk;}
    
    function setds_produto_servico($ds_produto_servico){ $this->ds_produto_servico = $ds_produto_servico;}
    function setic_status($ic_status){ $this->ic_status = $ic_status;}
    //function setpolos_pk($polos_pk){ $this->polos_pk = $polos_pk;}
    function setds_obs($ds_obs){ $this->ds_obs = $ds_obs;}
    /*function settipos_unidades_pk($tipos_unidades_pk){ $this->tipos_unidades_pk = $tipos_unidades_pk;}
    function setfornecedor_pk($fornecedor_pk){ $this->fornecedor_pk = $fornecedor_pk;}*/

    
}

?>
