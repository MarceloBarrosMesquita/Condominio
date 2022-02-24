<?

class colaborador{

    private $pk;
    private $dt_cadastro;
    private $usuario_cadastro_pk;
    private $dt_ult_atualizacao;
    private $usuario_ult_atualizacao_pk;
    
    private $ds_colaborador;
    private $ds_cel;
    private $ic_whatsapp;
    private $ds_cel2;
    private $ic_whatsapp2;
    private $ds_cel3;
    private $ic_whatsapp3;
    private $ds_email;
    private $ds_rg;
    private $ds_cpf;
    private $dt_nascimento;
    private $ds_endereco;
    private $ds_numero;
    private $ds_complemento;
    private $ds_bairro;
    private $ds_cep;
    private $ds_cidade;
    private $ds_uf;
    private $ic_status;
    private $ic_origem;
    private $ic_funcionario;
    private $generos_pk;
    private $ds_pin;
    private $ds_re;
    private $ds_nacionalidade;
    private $ds_matricula;
    private $grau_escolaridade_pk;
    
    private $ds_raca;
    private $ds_deficiencia_fisica;
    private $estado_civil;
    private $ds_nome_pai;
    private $ds_nome_mae;
    private $ds_nome_conjuge;
    private $dt_nascimento_conjuge;
    private $ds_cpf_conjuge;
    private $ds_tel_conjuge;
    private $regime_casamento;
    private $ds_ctps;
    private $ds_serie;
    private $dt_expedicao;
    private $ds_uf_rg;
    private $ds_org_exp;
    private $ds_pis;
    private $ds_titulo_eleitoral;
    private $ds_zona_eleitoral;
    private $ds_secao;
    private $ds_certificado_reservista;
    private $ic_filho_menor_14;
    private $ic_reserva;
    private $dt_demissao;
    private $dt_admissao;
    private $qtde_filho;
    
    private $empresas_pk;
    private $regime_contratacao_pk;
    private $ds_carga_horaria_semanal;
    
    private $ds_entrada_dom;
    private $ds_ida_intervalo_dom;
    private $ds_volta_intervalo_dom;
    private $ds_saida_dom;
    
    private $ds_entrada_seg;
    private $ds_ida_intervalo_seg;
    private $ds_volta_intervalo_seg;
    private $ds_saida_seg;
    
    private $ds_entrada_ter;
    private $ds_ida_intervalo_ter;
    private $ds_volta_intervalo_ter;
    private $ds_saida_ter;
    
    private $ds_entrada_qua;
    private $ds_ida_intervalo_qua;
    private $ds_volta_intervalo_qua;
    private $ds_saida_qua;
    
    private $ds_entrada_qui;
    private $ds_ida_intervalo_qui;
    private $ds_volta_intervalo_qui;
    private $ds_saida_qui;
    
    private $ds_entrada_sex;
    private $ds_ida_intervalo_sex;
    private $ds_volta_intervalo_sex;
    private $ds_saida_sex;
    
    private $ds_entrada_sab;
    private $ds_ida_intervalo_sab;
    private $ds_volta_intervalo_sab;
    private $ds_saida_sab;
    private $tipo_conta_bancaria;
    private $ds_agencia;
    private $ds_conta;
    private $ds_digito;
    private $bancos_pk;
    private $vl_salario;
        
    function __construct(){
        $this->pk = null;
        $this->dt_cadastro = null;
        $this->usuario_cadastro_pk = null;
        $this->dt_ult_atualizacao = null;
        $this->usuario_ult_atualizacao_pk = null;
        
        $this->ds_colaborador = null;
        $this->ds_cel = null;
        $this->ic_whatsapp = null;
        $this->ds_cel2 = null;
        $this->ic_whatsapp2 = null;
        $this->ds_cel3 = null;
        $this->ic_whatsapp3 = null;
        $this->ds_email = null;
        $this->ds_rg = null;
        $this->ds_cpf = null;
        $this->dt_nascimento = null;
        $this->ds_endereco = null;
        $this->ds_numero = null;
        $this->ds_complemento = null;
        $this->ds_bairro = null;
        $this->ds_cep = null;
        $this->ds_cidade = null;
        $this->ds_uf = null;
        $this->ic_status = null;
        $this->ic_origem = null;
        $this->ic_funcionario = null;
        $this->generos_pk = null;
        $this->ds_pin = null;
        $this->ds_re = null;
        $this->ds_nacionalidade = null;
        $this->ds_matricula = null;
        $this->grau_escolaridade_pk = null;
        
        $this->ds_raca= null;
        $this->ds_deficiencia_fisica= null;
        $this->estado_civil= null;
        $this->ds_nome_pai= null;
        $this->ds_nome_mae= null;
        $this->ds_nome_conjuge= null;
        $this->dt_nascimento_conjuge= null;
        $this->ds_cpf_conjuge= null;
        $this->ds_tel_conjuge= null;
        $this->regime_casamento= null;
        $this->ds_ctps= null;
        $this->ds_serie= null;
        $this->dt_expedicao= null;
        $this->ds_uf_rg= null;
        $this->ds_org_exp= null;
        $this->ds_pis= null;
        $this->ds_titulo_eleitoral= null;
        $this->ds_zona_eleitoral= null;
        $this->ds_secao= null;
        $this->ds_certificado_reservista= null;
        $this->ic_filho_menor_14= null;
        $this->ic_reserva= null;
        $this->dt_demissao= null;
        $this->dt_admissao= null;
        $this->qtde_filho= null;
        
        $this->empresas_pk= null;
        $this->regime_contratacao_pk= null;
        $this->ds_carga_horaria_semanal= null;

        $this->ds_entrada_dom= null;
        $this->ds_ida_intervalo_dom= null;
        $this->ds_volta_intervalo_dom= null;
        $this->ds_saida_dom= null;

        $this->ds_entrada_seg= null;
        $this->ds_ida_intervalo_seg= null;
        $this->ds_volta_intervalo_seg= null;
        $this->ds_saida_seg= null;

        $this->ds_entrada_ter= null;
        $this->ds_ida_intervalo_ter= null;
        $this->ds_volta_intervalo_ter= null;
        $this->ds_saida_ter= null;

        $this->ds_entrada_qua= null;
        $this->ds_ida_intervalo_qua= null;
        $this->ds_volta_intervalo_qua= null;
        $this->ds_saida_qua= null;

        $this->ds_entrada_qui= null;
        $this->ds_ida_intervalo_qui= null;
        $this->ds_volta_intervalo_qui= null;
        $this->ds_saida_qui= null;

        $this->ds_entrada_sex= null;
        $this->ds_ida_intervalo_sex= null;
        $this->ds_volta_intervalo_sex= null;
        $this->ds_saida_sex= null;

        $this->ds_entrada_sab= null;
        $this->ds_ida_intervalo_sab= null;
        $this->ds_volta_intervalo_sab= null;
        $this->ds_saida_sab= null;
        
        $this->tipo_conta_bancaria= null;
        $this->ds_agencia= null;
        $this->ds_conta= null;
        $this->ds_digito= null;
        $this->bancos_pk= null;
        $this->vl_salario= null;
    }    
    
    public function getpk(){return $this->pk;}
    public function getdt_cadastro(){return $this->dt_cadastro;}
    public function getusuario_cadastro_pk(){return $this->usuario_cadastro_pk;}
    public function getdt_ult_atualizacao(){return $this->dt_ult_atualizacao;}
    
    function getds_colaborador(){return $this->ds_colaborador;}
    function getds_cel(){return $this->ds_cel;}
    function getic_whatsapp(){return $this->ic_whatsapp;}
    function getds_cel2(){return $this->ds_cel2;}
    function getic_whatsapp2(){return $this->ic_whatsapp2;}
    function getds_cel3(){return $this->ds_cel3;}
    function getic_whatsapp3(){return $this->ic_whatsapp3;}
    function getds_email(){return $this->ds_email;}
    function getds_rg(){return $this->ds_rg;}
    function getds_cpf(){return $this->ds_cpf;}
    function getdt_nascimento(){return $this->dt_nascimento;}
    function getds_endereco(){return $this->ds_endereco;}
    function getds_numero(){return $this->ds_numero;}
    function getds_complemento(){return $this->ds_complemento;}
    function getds_bairro(){return $this->ds_bairro;}
    function getds_cep(){return $this->ds_cep;}
    function getds_cidade(){return $this->ds_cidade;}
    function getds_uf(){return $this->ds_uf;}
    function getic_status(){return $this->ic_status;}
    function getic_origem(){return $this->ic_origem;}
    function getic_funcionario(){return $this->ic_funcionario;}
    function getgeneros_pk(){return $this->generos_pk;}
    function getds_pin(){return $this->ds_pin;}
    function getds_re(){return $this->ds_re;}
    function getds_raca(){return $this->ds_raca;}
    function getds_deficiencia_fisica(){return $this->ds_deficiencia_fisica;}
    function getestado_civil(){return $this->estado_civil;}
    function getds_nome_pai(){return $this->ds_nome_pai;}
    function getds_nome_mae(){return $this->ds_nome_mae;}
    function getds_nome_conjuge(){return $this->ds_nome_conjuge;}
    function getdt_nascimento_conjuge(){return $this->dt_nascimento_conjuge;}
    function getds_cpf_conjuge(){return $this->ds_cpf_conjuge;}
    function getds_tel_conjuge(){return $this->ds_tel_conjuge;}
    function getregime_casamento(){return $this->regime_casamento;}
    function getds_ctps(){return $this->ds_ctps;}
    function getds_serie(){return $this->ds_serie;}
    function getdt_expedicao(){return $this->dt_expedicao;}
    function getds_uf_rg(){return $this->ds_uf_rg;}
    function getds_org_exp(){return $this->ds_org_exp;}
    function getds_pis(){return $this->ds_pis;}
    function getds_titulo_eleitoral(){return $this->ds_titulo_eleitoral;}
    function getds_zona_eleitoral(){return $this->ds_zona_eleitoral;}
    function getds_secao(){return $this->ds_secao;}
    function getds_certificado_reservista(){return $this->ds_certificado_reservista;}
    function getic_filho_menor_14(){return $this->ic_filho_menor_14;}
    function getds_nacionalidade(){return $this->ds_nacionalidade;}
    function getds_matricula(){return $this->ds_matricula;}
    function getgrau_escolaridade_pk(){return $this->grau_escolaridade_pk;}
    function getic_reserva(){return $this->ic_reserva;}
    function getdt_demissao(){return $this->dt_demissao;}
    function getdt_admissao(){return $this->dt_admissao;}
    function getqtde_filho(){return $this->qtde_filho;}
    
    function getempresas_pk(){return $this->empresas_pk;}
    function getregime_contratacao_pk(){return $this->regime_contratacao_pk;}
    function getds_carga_horaria_semanal(){return $this->ds_carga_horaria_semanal;}
    
    function getds_entrada_dom(){return $this->ds_entrada_dom;}
    function getds_ida_intervalo_dom(){return $this->ds_ida_intervalo_dom;}
    function getds_volta_intervalo_dom(){return $this->ds_volta_intervalo_dom;}
    function getds_saida_dom(){return $this->ds_saida_dom;}
    
    function getds_entrada_seg(){return $this->ds_entrada_seg;}
    function getds_ida_intervalo_seg(){return $this->ds_ida_intervalo_seg;}
    function getds_volta_intervalo_seg(){return $this->ds_volta_intervalo_seg;}
    function getds_saida_seg(){return $this->ds_saida_seg;}
    
    function getds_entrada_ter(){return $this->ds_entrada_ter;}
    function getds_ida_intervalo_ter(){return $this->ds_ida_intervalo_ter;}
    function getds_volta_intervalo_ter(){return $this->ds_volta_intervalo_ter;}
    function getds_saida_ter(){return $this->ds_saida_ter;}
    
    function getds_entrada_qua(){return $this->ds_entrada_qua;}
    function getds_ida_intervalo_qua(){return $this->ds_ida_intervalo_qua;}
    function getds_volta_intervalo_qua(){return $this->ds_volta_intervalo_qua;}
    function getds_saida_qua(){return $this->ds_saida_qua;}
    
    function getds_entrada_qui(){return $this->ds_entrada_qui;}
    function getds_ida_intervalo_qui(){return $this->ds_ida_intervalo_qui;}
    function getds_volta_intervalo_qui(){return $this->ds_volta_intervalo_qui;}
    function getds_saida_qui(){return $this->ds_saida_qui;}
    
    function getds_entrada_sex(){return $this->ds_entrada_sex;}
    function getds_ida_intervalo_sex(){return $this->ds_ida_intervalo_sex;}
    function getds_volta_intervalo_sex(){return $this->ds_volta_intervalo_sex;}
    function getds_saida_sex(){return $this->ds_saida_sex;}
    
    function getds_entrada_sab(){return $this->ds_entrada_sab;}
    function getds_ida_intervalo_sab(){return $this->ds_ida_intervalo_sab;}
    function getds_volta_intervalo_sab(){return $this->ds_volta_intervalo_sab;}
    function getds_saida_sab(){return $this->ds_saida_sab;}
    function gettipo_conta_bancaria(){return $this->tipo_conta_bancaria;}
    function getds_agencia(){return $this->ds_agencia;}
    function getds_conta(){return $this->ds_conta;}
    function getds_digito(){return $this->ds_digito;}
    function getbancos_pk(){return $this->bancos_pk;}
    function getvl_salario(){return $this->vl_salario;}
    
    public function setpk($v_pk){$this->pk = $v_pk;}
    public function setdt_cadastro($v_dt_cadastro){$this->dt_cadastro = $v_dt_cadastro;}
    public function setusuario_cadastro_pk($v_usuario_cadastro_pk){$this->usuario_cadastro_pk = $v_usuario_cadastro_pk;}
    public function setdt_ult_atualizacao($v_dt_ult_atualizacao){$this->dt_ult_atualizacao = $v_dt_ult_atualizacao;}
    public function setusuario_ult_atualizacao_pk($v_usuario_ult_atualizacao_pk){$this->usuario_ult_atualizacao_pk = $v_usuario_ult_atualizacao_pk;}
    
    function setds_colaborador($ds_colaborador){ $this->ds_colaborador = $ds_colaborador;}
    function setds_cel($ds_cel){ $this->ds_cel = $ds_cel;}
    function setic_whatsapp($ic_whatsapp){ $this->ic_whatsapp = $ic_whatsapp;}
    function setds_cel2($ds_cel2){ $this->ds_cel2 = $ds_cel2;}
    function setic_whatsapp2($ic_whatsapp2){ $this->ic_whatsapp2 = $ic_whatsapp2;}
    function setds_cel3($ds_cel3){ $this->ds_cel3 = $ds_cel3;}
    function setic_whatsapp3($ic_whatsapp3){ $this->ic_whatsapp3 = $ic_whatsapp3;}
    function setds_email($ds_email){ $this->ds_email = $ds_email;}
    function setds_rg($ds_rg){ $this->ds_rg = $ds_rg;}
    function setds_cpf($ds_cpf){ $this->ds_cpf = $ds_cpf;}
    function setdt_nascimento($dt_nascimento){ $this->dt_nascimento = $dt_nascimento;}
    function setds_endereco($ds_endereco){ $this->ds_endereco = $ds_endereco;}
    function setds_numero($ds_numero){ $this->ds_numero = $ds_numero;}
    function setds_complemento($ds_complemento){ $this->ds_complemento = $ds_complemento;}
    function setds_bairro($ds_bairro){ $this->ds_bairro = $ds_bairro;}
    function setds_cep($ds_cep){ $this->ds_cep = $ds_cep;}
    function setds_cidade($ds_cidade){ $this->ds_cidade = $ds_cidade;}
    function setds_uf($ds_uf){ $this->ds_uf = $ds_uf;}
    function setic_status($ic_status){ $this->ic_status = $ic_status;}
    function setic_origem($ic_origem){ $this->ic_origem = $ic_origem;}
    function setic_funcionario($ic_funcionario){ $this->ic_funcionario = $ic_funcionario;}
    function setgeneros_pk($generos_pk){ $this->generos_pk = $generos_pk;}
    function setds_pin($ds_pin){ $this->ds_pin = $ds_pin;}
    function setds_re($ds_re){ $this->ds_re = $ds_re;}
    function setds_raca($ds_raca){ $this->ds_raca = $ds_raca;}
    function setds_deficiencia_fisica($ds_deficiencia_fisica){ $this->ds_deficiencia_fisica = $ds_deficiencia_fisica;}
    function setestado_civil($estado_civil){ $this->estado_civil = $estado_civil;}
    function setds_nome_pai($ds_nome_pai){ $this->ds_nome_pai = $ds_nome_pai;}
    function setds_nome_mae($ds_nome_mae){ $this->ds_nome_mae = $ds_nome_mae;}
    function setds_nome_conjuge($ds_nome_conjuge){ $this->ds_nome_conjuge = $ds_nome_conjuge;}
    function setdt_nascimento_conjuge($dt_nascimento_conjuge){ $this->dt_nascimento_conjuge = $dt_nascimento_conjuge;}
    function setds_cpf_conjuge($ds_cpf_conjuge){ $this->ds_cpf_conjuge = $ds_cpf_conjuge;}
    function setds_tel_conjuge($ds_tel_conjuge){ $this->ds_tel_conjuge = $ds_tel_conjuge;}
    function setregime_casamento($regime_casamento){ $this->regime_casamento = $regime_casamento;}
    function setds_ctps($ds_ctps){ $this->ds_ctps = $ds_ctps;}
    function setds_serie($ds_serie){ $this->ds_serie = $ds_serie;}
    function setdt_expedicao($dt_expedicao){ $this->dt_expedicao = $dt_expedicao;}
    function setds_uf_rg($ds_uf_rg){ $this->ds_uf_rg = $ds_uf_rg;}
    function setds_org_exp($ds_org_exp){ $this->ds_org_exp = $ds_org_exp;}
    function setds_pis($ds_pis){ $this->ds_pis = $ds_pis;}
    function setds_titulo_eleitoral($ds_titulo_eleitoral){ $this->ds_titulo_eleitoral = $ds_titulo_eleitoral;}
    function setds_zona_eleitoral($ds_zona_eleitoral){ $this->ds_zona_eleitoral = $ds_zona_eleitoral;}
    function setds_secao($ds_secao){ $this->ds_secao = $ds_secao;}
    function setds_certificado_reservista($ds_certificado_reservista){ $this->ds_certificado_reservista = $ds_certificado_reservista;}
    function setic_filho_menor_14($ic_filho_menor_14){ $this->ic_filho_menor_14 = $ic_filho_menor_14;}
    function setds_nacionalidade($ds_nacionalidade){ $this->ds_nacionalidade = $ds_nacionalidade;}
    function setds_matricula($ds_matricula){ $this->ds_matricula = $ds_matricula;}
    function setgrau_escolaridade_pk($grau_escolaridade_pk){ $this->grau_escolaridade_pk = $grau_escolaridade_pk;}
    function setic_reserva($ic_reserva){ $this->ic_reserva = $ic_reserva;}
    function setdt_demissao($dt_demissao){ $this->dt_demissao = $dt_demissao;}
    function setdt_admissao($dt_admissao){ $this->dt_admissao = $dt_admissao;}
    function setqtde_filho($qtde_filho){ $this->qtde_filho = $qtde_filho;}
    function setempresas_pk($empresas_pk){ $this->empresas_pk= $empresas_pk;}
    function setregime_contratacao_pk($regime_contratacao_pk){ $this->regime_contratacao_pk= $regime_contratacao_pk;}
    function setds_carga_horaria_semanal($ds_carga_horaria_semanal){ $this->ds_carga_horaria_semanal= $ds_carga_horaria_semanal;}
    
    function setds_entrada_dom($ds_entrada_dom){ $this->ds_entrada_dom= $ds_entrada_dom;}
    function setds_ida_intervalo_dom($ds_ida_intervalo_dom){ $this->ds_ida_intervalo_dom= $ds_ida_intervalo_dom;}
    function setds_volta_intervalo_dom($ds_volta_intervalo_dom){ $this->ds_volta_intervalo_dom= $ds_volta_intervalo_dom;}
    function setds_saida_dom($ds_saida_dom){ $this->ds_saida_dom = $ds_saida_dom;}
    
    function setds_entrada_seg($ds_entrada_seg){ $this->ds_entrada_seg= $ds_entrada_seg;}
    function setds_ida_intervalo_seg($ds_ida_intervalo_seg){ $this->ds_ida_intervalo_seg= $ds_ida_intervalo_seg;}
    function setds_volta_intervalo_seg($ds_volta_intervalo_seg){ $this->ds_volta_intervalo_seg= $ds_volta_intervalo_seg;}
    function setds_saida_seg($ds_saida_seg){ $this->ds_saida_seg = $ds_saida_seg;}
    
    function setds_entrada_ter($ds_entrada_ter){ $this->ds_entrada_ter= $ds_entrada_ter;}
    function setds_ida_intervalo_ter($ds_ida_intervalo_ter){ $this->ds_ida_intervalo_ter= $ds_ida_intervalo_ter;}
    function setds_volta_intervalo_ter($ds_volta_intervalo_ter){ $this->ds_volta_intervalo_ter= $ds_volta_intervalo_ter;}
    function setds_saida_ter($ds_saida_ter){ $this->ds_saida_ter = $ds_saida_ter;}
    
    function setds_entrada_qua($ds_entrada_qua){ $this->ds_entrada_qua= $ds_entrada_qua;}
    function setds_ida_intervalo_qua($ds_ida_intervalo_qua){ $this->ds_ida_intervalo_qua= $ds_ida_intervalo_qua;}
    function setds_volta_intervalo_qua($ds_volta_intervalo_qua){ $this->ds_volta_intervalo_qua= $ds_volta_intervalo_qua;}
    function setds_saida_qua($ds_saida_qua){ $this->ds_saida_qua = $ds_saida_qua;}
    
    function setds_entrada_qui($ds_entrada_qui){ $this->ds_entrada_qui= $ds_entrada_qui;}
    function setds_ida_intervalo_qui($ds_ida_intervalo_qui){ $this->ds_ida_intervalo_qui= $ds_ida_intervalo_qui;}
    function setds_volta_intervalo_qui($ds_volta_intervalo_qui){ $this->ds_volta_intervalo_qui= $ds_volta_intervalo_qui;}
    function setds_saida_qui($ds_saida_qui){ $this->ds_saida_qui = $ds_saida_qui;}
    
    function setds_entrada_sex($ds_entrada_sex){ $this->ds_entrada_sex= $ds_entrada_sex;}
    function setds_ida_intervalo_sex($ds_ida_intervalo_sex){ $this->ds_ida_intervalo_sex= $ds_ida_intervalo_sex;}
    function setds_volta_intervalo_sex($ds_volta_intervalo_sex){ $this->ds_volta_intervalo_sex= $ds_volta_intervalo_sex;}
    function setds_saida_sex($ds_saida_sex){ $this->ds_saida_sex = $ds_saida_sex;}
    
    function setds_entrada_sab($ds_entrada_sab){ $this->ds_entrada_sab= $ds_entrada_sab;}
    function setds_ida_intervalo_sab($ds_ida_intervalo_sab){ $this->ds_ida_intervalo_sab= $ds_ida_intervalo_sab;}
    function setds_volta_intervalo_sab($ds_volta_intervalo_sab){ $this->ds_volta_intervalo_sab= $ds_volta_intervalo_sab;}
    function setds_saida_sab($ds_saida_sab){ $this->ds_saida_sab = $ds_saida_sab;}
    function settipo_conta_bancaria($tipo_conta_bancaria){ $this->tipo_conta_bancaria = $tipo_conta_bancaria;}
    function setds_agencia($ds_agencia){ $this->ds_agencia = $ds_agencia;}
    function setds_conta($ds_conta){ $this->ds_conta = $ds_conta;}
    function setds_digito($ds_digito){ $this->ds_digito = $ds_digito;}
    function setbancos_pk($bancos_pk){ $this->bancos_pk = $bancos_pk;}
    function setvl_salario($vl_salario){ $this->vl_salario = $vl_salario;}    
}

?>
