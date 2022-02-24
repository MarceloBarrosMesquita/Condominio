<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/colaborador.class.php';


class colaboradordao{

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
    
    public function salvar($colaborador){

        $fields = array();
        $fields['ds_colaborador'] = $colaborador->getds_colaborador();
        $fields['ds_cel'] = $colaborador->getds_cel();
        $fields['ic_whatsapp'] = $colaborador->getic_whatsapp();
        $fields['ds_cel2'] = $colaborador->getds_cel2();
        $fields['ic_whatsapp2'] = $colaborador->getic_whatsapp2();
        $fields['ds_cel3'] = $colaborador->getds_cel3();
        $fields['ic_whatsapp3'] = $colaborador->getic_whatsapp3();
        $fields['ds_email'] = $colaborador->getds_email();
        $fields['ds_rg'] = $colaborador->getds_rg();
        $fields['ds_cpf'] = $colaborador->getds_cpf();
        $fields['dt_nascimento'] = $colaborador->getdt_nascimento();
        $fields['ds_endereco'] = $colaborador->getds_endereco();
        $fields['ds_numero'] = $colaborador->getds_numero();
        $fields['ds_complemento'] = $colaborador->getds_complemento();
        $fields['ds_bairro'] = $colaborador->getds_bairro();
        $fields['ds_cep'] = $colaborador->getds_cep();
        $fields['ds_cidade'] = $colaborador->getds_cidade();
        $fields['ds_uf'] = $colaborador->getds_uf();
        $fields['ic_status'] = $colaborador->getic_status();
        
        $fields['ic_funcionario'] = $colaborador->getic_funcionario();
        $fields['generos_pk'] = $colaborador->getgeneros_pk();
        $fields['ds_re'] = $colaborador->getds_re();
        $fields['ds_raca'] = $colaborador->getds_raca();
        $fields['ds_deficiencia_fisica'] = $colaborador->getds_deficiencia_fisica();
        $fields['estado_civil'] = $colaborador->getestado_civil();
        $fields['ds_nome_pai'] = $colaborador->getds_nome_pai();
        $fields['ds_nome_mae'] = $colaborador->getds_nome_mae();
        $fields['ds_nome_conjuge'] = $colaborador->getds_nome_conjuge();
        $fields['ic_reserva'] = $colaborador->getic_reserva();
        $fields['qtde_filho'] = $colaborador->getqtde_filho();
        $fields['empresas_pk'] = $colaborador->getempresas_pk();
        $fields['regime_contratacao_pk'] = $colaborador->getregime_contratacao_pk();
        $fields['ds_carga_horaria_semanal'] = $colaborador->getds_carga_horaria_semanal();
        
        $fields['ds_entrada_dom'] = $colaborador->getds_entrada_dom();
        $fields['ds_ida_intervalo_dom'] = $colaborador->getds_ida_intervalo_dom();
        $fields['ds_volta_intervalo_dom'] = $colaborador->getds_volta_intervalo_dom();
        $fields['ds_saida_dom'] = $colaborador->getds_saida_dom();
        
        $fields['ds_entrada_seg'] = $colaborador->getds_entrada_seg();
        $fields['ds_ida_intervalo_seg'] = $colaborador->getds_ida_intervalo_seg();
        $fields['ds_volta_intervalo_seg'] = $colaborador->getds_volta_intervalo_seg();
        $fields['ds_saida_seg'] = $colaborador->getds_saida_seg();
        
        $fields['ds_entrada_ter'] = $colaborador->getds_entrada_ter();
        $fields['ds_ida_intervalo_ter'] = $colaborador->getds_ida_intervalo_ter();
        $fields['ds_volta_intervalo_ter'] = $colaborador->getds_volta_intervalo_ter();
        $fields['ds_saida_ter'] = $colaborador->getds_saida_ter();
        
        $fields['ds_entrada_qua'] = $colaborador->getds_entrada_qua();
        $fields['ds_ida_intervalo_qua'] = $colaborador->getds_ida_intervalo_qua();
        $fields['ds_volta_intervalo_qua'] = $colaborador->getds_volta_intervalo_qua();
        $fields['ds_saida_qua'] = $colaborador->getds_saida_qua();
        
        $fields['ds_entrada_qui'] = $colaborador->getds_entrada_qui();
        $fields['ds_ida_intervalo_qui'] = $colaborador->getds_ida_intervalo_qui();
        $fields['ds_volta_intervalo_qui'] = $colaborador->getds_volta_intervalo_qui();
        $fields['ds_saida_qui'] = $colaborador->getds_saida_qui();
        
        $fields['ds_entrada_sex'] = $colaborador->getds_entrada_sex();
        $fields['ds_ida_intervalo_sex'] = $colaborador->getds_ida_intervalo_sex();
        $fields['ds_volta_intervalo_sex'] = $colaborador->getds_volta_intervalo_sex();
        $fields['ds_saida_sex'] = $colaborador->getds_saida_sex();
        
        $fields['ds_entrada_sab'] = $colaborador->getds_entrada_sab();
        $fields['ds_ida_intervalo_sab'] = $colaborador->getds_ida_intervalo_sab();
        $fields['ds_volta_intervalo_sab'] = $colaborador->getds_volta_intervalo_sab();
        $fields['ds_saida_sab'] = $colaborador->getds_saida_sab();
        $fields['tipo_conta_bancaria'] = $colaborador->gettipo_conta_bancaria();
        $fields['ds_agencia'] = $colaborador->getds_agencia();
        $fields['ds_conta'] = $colaborador->getds_conta();
        $fields['ds_digito'] = $colaborador->getds_digito();
        $fields['bancos_pk'] = $colaborador->getbancos_pk();
        $fields['vl_salario'] = $colaborador->getvl_salario();
                
        

        if($colaborador->getdt_nascimento_conjuge()!=""){
            $fields['dt_nascimento_conjuge'] = DataYMD($colaborador->getdt_nascimento_conjuge());
        }
        if($colaborador->getdt_admissao()!=""){
            $fields['dt_admissao'] = DataYMD($colaborador->getdt_admissao());
        }
        if($colaborador->getdt_demissao()!=""){
            if($colaborador->getdt_demissao()!="00/00/0000"){
                $fields['dt_demissao'] = DataYMD($colaborador->getdt_demissao());
                $fields['ic_status'] =2;

                $fields['ic_funcionario'] = 2;
            }
            else if($colaborador->getdt_demissao()=="00/00/0000"){
                $fields['dt_demissao'] = "null";
                $fields['ic_status'] =1;

                $fields['ic_funcionario'] = 1;
            }
            else if($colaborador->getdt_demissao()==""){
                $fields['dt_demissao'] = "null";
                $fields['ic_status'] =1;

                $fields['ic_funcionario'] = 1;
            }
        }
        
        else{
            $fields['dt_demissao'] = "null";
            $fields['ic_status'] =1;

            $fields['ic_funcionario'] = 1;
        }
        
        
        $fields['ds_cpf_conjuge'] = $colaborador->getds_cpf_conjuge();
        $fields['ds_tel_conjuge'] = $colaborador->getds_tel_conjuge();
        $fields['regime_casamento'] = $colaborador->getregime_casamento();
        if($colaborador->getdt_expedicao()!=""){
            $fields['dt_expedicao'] = DataYMD($colaborador->getdt_expedicao());
        }
        
        $fields['ds_org_exp'] = $colaborador->getds_org_exp();
        $fields['ds_pis'] = $colaborador->getds_pis();
        $fields['ds_titulo_eleitoral'] = $colaborador->getds_titulo_eleitoral();
        $fields['ds_zona_eleitoral'] = $colaborador->getds_zona_eleitoral();
        $fields['ds_secao'] = $colaborador->getds_secao();
        $fields['ds_certificado_reservista'] = $colaborador->getds_certificado_reservista();
        $fields['ic_filho_menor_14'] = $colaborador->getic_filho_menor_14();
        $fields['ds_uf_rg'] = $colaborador->getds_uf_rg();
        $fields['ds_serie'] = $colaborador->getds_serie();
        $fields['ds_ctps'] = $colaborador->getds_ctps();
        $fields['ds_matricula'] = $colaborador->getds_matricula();
        $fields['ds_nacionalidade'] = $colaborador->getds_nacionalidade();        
        $fields['grau_escolaridade_pk'] = $colaborador->getgrau_escolaridade_pk();            
                
        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];
              
        
        if($colaborador->getpk()  == ""){
            
            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];
            //Origem
            if($colaborador->getic_origem()=='2'){

                $fields['ic_origem'] = $colaborador->getic_origem();
            }else{
                $fields['ic_origem'] = 1;
             }           

            $pk = $this->db->execInsert("colaboradores", $fields);
            
            return $pk;
        }
        else{
            return $this->db->execUpdate("colaboradores", $fields, " pk = ".$colaborador->getpk());
        }

    }
    public function salvarDSPin($ds_pin,$colaborador_pk){
        $fields = array();
        $fields['ds_pin'] = $ds_pin;
        
        $this->db->execUpdate("colaboradores", $fields, " pk = ".$colaborador_pk);
    }
    public function excluir($colaborador){
        $this->db->execDelete("colaboradores"," pk = ".$colaborador->getpk());
    }
    public function excluirAgenda($colaborador_pk){
        $this->db->execDelete("agenda_colaborador_padrao"," colaboradores_pk = ".$colaborador_pk);
    }
    public function excluirAgendaPausa($colaborador_pk){
        $this->db->execDelete("agenda_colaborador_pausa"," colaboradores_pk = ".$colaborador_pk);
    }

    public function carregarPorPk($pk){

        $colaborador = new colaborador();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ds_colaborador ";
        $sql.="       ,ds_cel ";
        $sql.="       ,ic_whatsapp ";
        $sql.="       ,ds_cel2 ";
        $sql.="       ,ic_whatsapp2 ";
        $sql.="       ,ds_cel3 ";
        $sql.="       ,ic_whatsapp3 ";
        $sql.="       ,ds_email ";
        $sql.="       ,ds_rg ";
        $sql.="       ,ds_cpf ";
        $sql.="       ,dt_nascimento ";
        $sql.="       ,ds_endereco ";
        $sql.="       ,ds_numero ";
        $sql.="       ,ds_complemento ";
        $sql.="       ,ds_bairro ";
        $sql.="       ,ds_cep ";
        $sql.="       ,ds_cidade ";
        $sql.="       ,ds_uf ";
        $sql.="       ,ic_status ";
        $sql.="       ,ic_funcionario ";
        $sql.="       ,generos_pk ";
        $sql.="       ,ds_pin";
        $sql.="       ,ds_re";
        $sql.=",ds_raca";
        $sql.=",ds_deficiencia_fisica";
        $sql.=",estado_civil";
        $sql.=",ds_nome_pai";
        $sql.=",ds_nome_mae";
        $sql.=",ds_nome_conjuge";
        $sql.=",dt_nascimento_conjuge";
        $sql.=",ds_cpf_conjuge";
        $sql.=",ds_tel_conjuge";
        $sql.=",regime_casamento";
        $sql.=",ds_ctps";
        $sql.=",ds_serie";
        $sql.=",dt_expedicao";
        $sql.=",ds_uf_rg";
        $sql.=",ds_org_exp";
        $sql.=",ds_pis";
        $sql.=",ds_titulo_eleitoral";
        $sql.=",ds_zona_eleitoral";
        $sql.=",ds_secao";
        $sql.=",ds_certificado_reservista";
        $sql.="	,ic_filho_menor_14";
        $sql.="	,ic_reserva";
        $sql.="	,dt_admissao";
        $sql.="	,qtde_filho";
        
        $sql.="	,empresas_pk";
        $sql.="	,regime_contratacao_pk";
        $sql.="	,ds_carga_horaria_semanal";
        
        $sql.="	,ds_entrada_dom";
        $sql.="	,ds_ida_intervalo_dom";
        $sql.="	,ds_volta_intervalo_dom";
        $sql.="	,ds_saida_dom";
        
        $sql.="	,ds_entrada_seg";
        $sql.="	,ds_ida_intervalo_seg";
        $sql.="	,ds_volta_intervalo_seg";
        $sql.="	,ds_saida_seg";
        
        $sql.="	,ds_entrada_ter";
        $sql.="	,ds_ida_intervalo_ter";
        $sql.="	,ds_volta_intervalo_ter";
        $sql.="	,ds_saida_ter";
        
        $sql.="	,ds_entrada_qua";
        $sql.="	,ds_ida_intervalo_qua";
        $sql.="	,ds_volta_intervalo_qua";
        $sql.="	,ds_saida_qua";
        
        $sql.="	,ds_entrada_qui";
        $sql.="	,ds_ida_intervalo_qui";
        $sql.="	,ds_volta_intervalo_qui";
        $sql.="	,ds_saida_qui";
        
        $sql.="	,ds_entrada_sex";
        $sql.="	,ds_ida_intervalo_sex";
        $sql.="	,ds_volta_intervalo_sex";
        $sql.="	,ds_saida_sex";
        
        $sql.="	,ds_entrada_sab";
        $sql.="	,ds_ida_intervalo_sab";
        $sql.="	,ds_volta_intervalo_sab";
        $sql.="	,ds_saida_sab";
        $sql.="	,tipo_conta_bancaria";
        $sql.="	,ds_agencia";
        $sql.="	,ds_conta";
        $sql.="	,ds_digito";
        $sql.="	,bancos_pk";


        $sql.="  from colaboradores ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $colaborador->setpk($query[$i]["pk"]);
                $colaborador->setdt_cadastro($query[$i]["dt_cadastro"]);
                $colaborador->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $colaborador->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $colaborador->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $colaborador->setds_colaborador($query[$i]['ds_colaborador']);
                $colaborador->setds_cel($query[$i]['ds_cel']);
                $colaborador->setic_whatsapp($query[$i]['ic_whatsapp']);
                $colaborador->setds_cel2($query[$i]['ds_cel2']);
                $colaborador->setic_whatsapp2($query[$i]['ic_whatsapp2']);
                $colaborador->setds_cel3($query[$i]['ds_cel3']);
                $colaborador->setic_whatsapp3($query[$i]['ic_whatsapp3']);
                $colaborador->setds_email($query[$i]['ds_email']);
                $colaborador->setds_rg($query[$i]['ds_rg']);
                $colaborador->setds_cpf($query[$i]['ds_cpf']);
                $colaborador->setdt_nascimento($query[$i]['dt_nascimento']);
                $colaborador->setds_endereco($query[$i]['ds_endereco']);
                $colaborador->setds_numero($query[$i]['ds_numero']);
                $colaborador->setds_complemento($query[$i]['ds_complemento']);
                $colaborador->setds_bairro($query[$i]['ds_bairro']);
                $colaborador->setds_cep($query[$i]['ds_cep']);
                $colaborador->setds_cidade($query[$i]['ds_cidade']);
                $colaborador->setds_uf($query[$i]['ds_uf']);
                $colaborador->setic_status($query[$i]['ic_status']);
                $colaborador->setic_funcionario($query[$i]['ic_funcionario']);
                $colaborador->setgeneros_pk($query[$i]['generos_pk']);
                $colaborador->setds_pin($query[$i]['ds_pin']);
                $colaborador->setds_re($query[$i]['ds_re']);
                $colaborador->setic_reserva($query[$i]['ic_reserva']);
                $colaborador->setqtde_filho($query[$i]['qtde_filho']);

            }
        }
        return $colaborador;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cel ";
        $sql.="       ,c.ic_whatsapp ";
        $sql.="       ,c.ds_cel2 ";
        $sql.="       ,c.ic_whatsapp2 ";
        $sql.="       ,c.ds_cel3 ";
        $sql.="       ,c.ic_whatsapp3 ";
        $sql.="       ,c.ds_email ";
        $sql.="       ,c.ds_rg ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento ";
        $sql.="       ,c.ds_endereco ";
        $sql.="       ,c.ds_numero ";
        $sql.="       ,c.ds_complemento ";
        $sql.="       ,c.ds_bairro ";
        $sql.="       ,c.ds_cep ";
        $sql.="       ,c.ds_cidade ";
        $sql.="       ,c.ds_uf ";
        $sql.="       ,c.ic_status ";
        $sql.="       ,c.ic_funcionario ";
        $sql.="       ,c.generos_pk ";
        $sql.="       ,c.ds_pin";
        $sql.="       ,c.ds_raca";
        $sql.="         ,c.ds_deficiencia_fisica";
        $sql.="         ,c.estado_civil";
        $sql.="         ,case c.estado_civil when 1 then 'Solteiro' when 2 then 'Casado' when 3 then 'Separado' when 4 then 'Divorciado' when 5 then 'Viuvo' end ds_estado_civil";
        $sql.="         ,c.ds_nome_pai";
        $sql.="         ,c.ds_nome_mae";
        $sql.="         ,c.ds_nome_conjuge";
        $sql.="       ,date_format(c.dt_nascimento_conjuge,'%d/%m/%Y')dt_nascimento_conjuge ";
        $sql.="         ,c.ds_cpf_conjuge";
        $sql.="         ,c.ds_tel_conjuge";
        $sql.="         ,c.regime_casamento";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="       ,date_format(c.dt_expedicao,'%d/%m/%Y')dt_expedicao ";
        $sql.="         ,c.ds_uf_rg";
        $sql.="         ,c.ds_org_exp";
        $sql.="         ,c.ds_pis";
        $sql.="         ,c.ds_titulo_eleitoral";
        $sql.="         ,c.ds_zona_eleitoral";
        $sql.="         ,c.ds_secao";
        $sql.="         ,c.ds_certificado_reservista";
        $sql.="         ,c.ic_filho_menor_14";
        $sql.="         ,c.ic_reserva";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="       ,cps.produtos_servicos_pk ";
        $sql.="       ,up.pk colaborador_ponto_pk";
        $sql.="       ,up.hr_entrada_dom";
        $sql.="       ,up.hr_saida_dom";
        $sql.="       ,up.hr_entrada_seg";
        $sql.="       ,up.hr_saida_seg";
        $sql.="       ,up.hr_entrada_ter";
        $sql.="       ,up.hr_saida_ter";
        $sql.="       ,up.hr_entrada_qua";
        $sql.="       ,up.hr_saida_qua";
        $sql.="       ,up.hr_entrada_qui";
        $sql.="       ,up.hr_saida_qui";
        $sql.="       ,up.hr_entrada_sex";
        $sql.="       ,up.hr_saida_sex";
        $sql.="       ,up.hr_entrada_sab";
        $sql.="       ,up.hr_saida_sab";
        $sql.="       ,up.ic_dom";
        $sql.="       ,up.ic_seg";
        $sql.="       ,up.ic_ter";
        $sql.="       ,up.ic_qua";
        $sql.="       ,up.ic_qui";
        $sql.="       ,up.ic_sex";
        $sql.="       ,up.ic_sab";
        $sql.="       ,up.turnos_pk_dom";
        $sql.="       ,up.turnos_pk_seg";
        $sql.="       ,up.turnos_pk_ter";
        $sql.="       ,up.turnos_pk_qua";
        $sql.="       ,up.turnos_pk_qui";
        $sql.="       ,up.turnos_pk_sex";
        $sql.="       ,up.turnos_pk_sab";
        $sql.="       ,up.ic_registrar_ponto";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.ds_matricula";
        $sql.="       ,c.ds_nacionalidade";
        $sql.="       ,case c.grau_escolaridade_pk when 1 then 'Educação infantil' when 2 then 'Ensino Fundamental' when 3 then 'Ensino Médio' when 4 then 'Superior (Graduação)' when 5 then 'Pós-graduação' when 6 then 'Mestrado' when 7 then 'Doutorado' end ds_escolaridade";
        $sql.="       ,c.grau_escolaridade_pk";
        $sql.="       ,c.qtde_filho";
        $sql.="       ,psl.ds_imagem";
        $sql.="       ,date_format(psl.dt_liberacao,'%d/%m/%Y') dt_liberacao";
        $sql.="       ,case when psl.ic_status = 1 then 'Liberado' when psl.ic_status = 2 then 'Pendente' end ds_status_app  ";
        
        $sql.="       ,c.empresas_pk";
        $sql.="       ,c.regime_contratacao_pk";
        $sql.="       ,c.ds_carga_horaria_semanal";
        
        $sql.="       ,c.ds_entrada_dom";
        $sql.="       ,c.ds_ida_intervalo_dom";
        $sql.="       ,c.ds_volta_intervalo_dom";
        $sql.="       ,c.ds_saida_dom";
        
        $sql.="       ,c.ds_entrada_seg";
        $sql.="       ,c.ds_ida_intervalo_seg";
        $sql.="       ,c.ds_volta_intervalo_seg";
        $sql.="       ,c.ds_saida_seg";
        
        $sql.="       ,c.ds_entrada_ter";
        $sql.="       ,c.ds_ida_intervalo_ter";
        $sql.="       ,c.ds_volta_intervalo_ter";
        $sql.="       ,c.ds_saida_ter";
        
        $sql.="       ,c.ds_entrada_qua";
        $sql.="       ,c.ds_ida_intervalo_qua";
        $sql.="       ,c.ds_volta_intervalo_qua";
        $sql.="       ,c.ds_saida_qua";
        
        $sql.="       ,c.ds_entrada_qui";
        $sql.="       ,c.ds_ida_intervalo_qui";
        $sql.="       ,c.ds_volta_intervalo_qui";
        $sql.="       ,c.ds_saida_qui";
        
        $sql.="       ,c.ds_entrada_sex";
        $sql.="       ,c.ds_ida_intervalo_sex";
        $sql.="       ,c.ds_volta_intervalo_sex";
        $sql.="       ,c.ds_saida_sex";
        
        $sql.="        ,c.ds_entrada_sab";
        $sql.="        ,c.ds_ida_intervalo_sab";
        $sql.="        ,c.ds_volta_intervalo_sab";
        $sql.="        ,c.ds_saida_sab";
        $sql.="        ,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.bancos_pk";
        $sql.="	,c.vl_salario";
        $sql.="	,g.ds_genero";
        $sql.="	,b.ds_banco";
        $sql.="	,ps.ds_produto_servico";
        $sql .= "       ,co.ds_razao_social ds_razao_social_empresa";
        $sql .= "       ,co.ds_cpf_cnpj ds_cpf_cnpj_empresa";
        $sql .= "       ,co.ds_tel ds_tel_empresa";
        $sql .= "       ,co.ds_email ds_email_empresa";
        $sql .= "       ,co.ds_cel ds_cel_empresa";
        $sql .= "       ,co.ds_cep ds_cep_empresa";
        $sql .= "       ,co.ds_endereco ds_endereco_empresa";
        $sql .= "       ,co.ds_numero ds_numero_empresa";
        $sql .= "       ,co.ds_complemento ds_complemento_empresa";
        $sql .= "       ,co.ds_bairro ds_bairro_empresa";
        $sql .= "       ,co.ds_cidade ds_cidade_empresa";
        $sql .= "       ,co.ds_uf ds_uf_empresa";
        $sql.="  from colaboradores c ";
        $sql.="     left join generos g  on g.pk = c.generos_pk";
        $sql.="     left join bancos b  on b.pk = c.bancos_pk";
        $sql.="     left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="     left join produtos_servicos ps  on cps.produtos_servicos_pk = ps.pk";
        $sql.="     left join usuario_ponto up on c.pk = up.colaborador_pk";
        $sql.="     left join ponto_solicitacao_liberacao_app psl on c.pk = psl.colaborador_pk";
        $sql.="     left join contas co on co.pk = c.empresas_pk";
        $sql.=" where c.pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkProdutoServico($pk){

        $sql ="";
        $sql.="select produtos_servicos_pk";
        $sql.="  from colaboradores_produtos_servicos  ";
        $sql.=" where colaboradores_pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkDocumentos($pk){

        $sql ="";
        $sql.="select pk";
        $sql.="  from documentos";
        $sql.=" where colaboradores_pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkMovimentacaoEstoque($pk){

        $sql ="";
        $sql.="select pk";
        $sql.="  from movimentacao_estoque";
        $sql.=" where colaborador_pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkColaboradorBeneficio($pk){

        $sql ="";
        $sql.="select pk";
        $sql.="  from colaboradores_beneficios";
        $sql.=" where colaborador_pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkAgendaColaboradorPadrao($pk){

        $sql ="";
        $sql.="select pk";
        $sql.="  from agenda_colaborador_padrao";
        $sql.=" where colaboradores_pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkAgendaColaboradorPausa($pk){

        $sql ="";
        $sql.="select pk";
        $sql.="  from agenda_colaborador_pausa";
        $sql.=" where colaboradores_pk = $pk ";
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarFormulario(){

        $sql ="";
        $sql.="select f.pk, f.dt_cadastro, f.usuario_cadastro_pk, f.dt_ult_atualizacao, f.usuario_ult_atualizacao_pk,f.ds_formulario,f.ds_link  ";
        $sql.="  from formulario f ";
        $sql.=" where f.ic_status = 1";
        
      
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPorPkEFuncao($pk){

        $sql ="";
        $sql.="select c.pk  ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.ic_reserva";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="       ,cps.produtos_servicos_pk ";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="  from colaboradores c ";
        $sql.="     left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="     left join produtos_servicos ps  on cps.produtos_servicos_pk = ps.pk";
        $sql.="     left join usuario_ponto up on c.pk = up.colaborador_pk";
        $sql.="     left join ponto_solicitacao_liberacao_app psl on c.pk = psl.colaborador_pk";
        $sql.=" where c.pk = $pk ";
              
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorPorDsFuncao($ds_funcao){

        $sql ="";
        $sql.="select c.pk  ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.ic_reserva";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        
        $sql.="       ,cps.produtos_servicos_pk ";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="  from colaboradores c ";
        $sql.="     inner join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="     inner join produtos_servicos ps  on cps.produtos_servicos_pk = ps.pk";
        
        $sql.=" where 1=1";
        if($ds_funcao!=""){
            $sql.=" and ps.ds_produto_servico = '".$ds_funcao."'";
        }
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listarDadosColaborador($colaborador_pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cel ";
        $sql.="       ,c.ic_whatsapp ";
        $sql.="       ,c.ds_cel2 ";
        $sql.="       ,c.ic_whatsapp2 ";
        $sql.="       ,c.ds_cel3 ";
        $sql.="       ,c.ic_whatsapp3 ";
        $sql.="       ,c.ds_email ";
        $sql.="       ,c.ds_rg ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento ";
        $sql.="       ,c.ds_endereco ";
        $sql.="       ,c.ds_numero ";
        $sql.="       ,c.ds_complemento ";
        $sql.="       ,c.ds_bairro ";
        $sql.="       ,c.ds_cep ";
        $sql.="       ,c.ds_cidade ";
        $sql.="       ,c.ds_uf ";
        $sql.="       ,c.ic_status ";
        $sql.="       ,c.ic_funcionario ";
        $sql.="       ,c.generos_pk ";
        $sql.="       ,c.ds_pin";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.ds_raca";
        $sql.="       ,c.ic_reserva";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="         ,c.ds_deficiencia_fisica";
        $sql.="         ,c.estado_civil";
        $sql.="         ,c.ds_nome_pai";
        $sql.="         ,c.ds_nome_mae";
        $sql.="         ,c.ds_nome_conjuge";
        $sql.="         ,c.dt_nascimento_conjuge";
        $sql.="         ,c.ds_cpf_conjuge";
        $sql.="         ,c.ds_tel_conjuge";
        $sql.="         ,c.regime_casamento";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.dt_expedicao";
        $sql.="         ,c.ds_uf_rg";
        $sql.="         ,c.ds_org_exp";
        $sql.="         ,c.ds_pis";
        $sql.="         ,c.ds_titulo_eleitoral";
        $sql.="         ,c.ds_zona_eleitoral";
        $sql.="         ,c.ds_secao";
        $sql.="         ,c.ds_certificado_reservista";
        $sql.="         ,c.ic_filho_menor_14";
        $sql.="         ,c.qtde_filho";
        $sql.="	,c.empresas_pk";
        $sql.="	,c.regime_contratacao_pk";
        $sql.="	,c.ds_carga_horaria_semanal";
        
        $sql.="	,c.ds_entrada_dom";
        $sql.="	,c.ds_ida_intervalo_dom";
        $sql.="	,c.ds_volta_intervalo_dom";
        $sql.="	,c.ds_saida_dom";
        
        $sql.="	,c.ds_entrada_seg";
        $sql.="	,c.ds_ida_intervalo_seg";
        $sql.="	,c.ds_volta_intervalo_seg";
        $sql.="	,c.ds_saida_seg";
        
        $sql.="	,c.ds_entrada_ter";
        $sql.="	,c.ds_ida_intervalo_ter";
        $sql.="	,c.ds_volta_intervalo_ter";
        $sql.="	,c.ds_saida_ter";
        
        $sql.="	,c.ds_entrada_qua";
        $sql.="	,c.ds_ida_intervalo_qua";
        $sql.="	,c.ds_volta_intervalo_qua";
        $sql.="	,c.ds_saida_qua";
        
        $sql.="	,c.ds_entrada_qui";
        $sql.="	,c.ds_ida_intervalo_qui";
        $sql.="	,c.ds_volta_intervalo_qui";
        $sql.="	,c.ds_saida_qui";
        
        $sql.="	,c.ds_entrada_sex";
        $sql.="	,c.ds_ida_intervalo_sex";
        $sql.="	,c.ds_volta_intervalo_sex";
        $sql.="	,c.ds_saida_sex";
        
        $sql.="	,c.ds_entrada_sab";
        $sql.="	,c.ds_ida_intervalo_sab";
        $sql.="	,c.ds_volta_intervalo_sab";
        $sql.="	,c.ds_saida_sab";
        $sql.="	,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.bancos_pk";
        $sql.="  from colaboradores c ";        
        $sql.=" where pk=".$colaborador_pk;

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    
    
    
    public function listarTodosColaboradoresEServicos(){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cel ";
        $sql.="       ,c.ic_whatsapp ";
        $sql.="       ,c.ds_cel2 ";
        $sql.="       ,c.ic_whatsapp2 ";
        $sql.="       ,c.ds_cel3 ";
        $sql.="       ,c.ic_whatsapp3 ";
        $sql.="       ,c.ds_email ";
        $sql.="       ,c.ds_rg ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento ";
        $sql.="       ,c.ds_endereco ";
        $sql.="       ,c.ds_numero ";
        $sql.="       ,c.ds_complemento ";
        $sql.="       ,c.ds_bairro ";
        $sql.="       ,c.ds_cep ";
        $sql.="       ,c.ds_cidade ";
        $sql.="       ,c.ds_uf ";
        $sql.="       ,c.ic_status ";
        $sql.="       ,c.ic_funcionario ";
        $sql.="       ,c.generos_pk ";
        $sql.="       ,c.ds_pin";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.ds_raca";
        $sql.="       ,c.ic_reserva";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="         ,c.ds_deficiencia_fisica";
        $sql.="         ,c.estado_civil";
        $sql.="         ,c.ds_nome_pai";
        $sql.="         ,c.ds_nome_mae";
        $sql.="         ,c.ds_nome_conjuge";
        $sql.="         ,c.dt_nascimento_conjuge";
        $sql.="         ,c.ds_cpf_conjuge";
        $sql.="         ,c.ds_tel_conjuge";
        $sql.="         ,c.regime_casamento";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.dt_expedicao";
        $sql.="         ,c.ds_uf_rg";
        $sql.="         ,c.ds_org_exp";
        $sql.="         ,c.ds_pis";
        $sql.="         ,c.ds_titulo_eleitoral";
        $sql.="         ,c.ds_zona_eleitoral";
        $sql.="         ,c.ds_secao";
        $sql.="         ,c.ds_certificado_reservista";
        $sql.="         ,c.ic_filho_menor_14";
        $sql.="         ,c.qtde_filho";
        $sql.="	,c.empresas_pk";
        $sql.="	,c.regime_contratacao_pk";
        $sql.="	,c.ds_carga_horaria_semanal";
        
        $sql.="	,c.ds_entrada_dom";
        $sql.="	,c.ds_ida_intervalo_dom";
        $sql.="	,c.ds_volta_intervalo_dom";
        $sql.="	,c.ds_saida_dom";
        
        $sql.="	,c.ds_entrada_seg";
        $sql.="	,c.ds_ida_intervalo_seg";
        $sql.="	,c.ds_volta_intervalo_seg";
        $sql.="	,c.ds_saida_seg";
        
        $sql.="	,c.ds_entrada_ter";
        $sql.="	,c.ds_ida_intervalo_ter";
        $sql.="	,c.ds_volta_intervalo_ter";
        $sql.="	,c.ds_saida_ter";
        
        $sql.="	,c.ds_entrada_qua";
        $sql.="	,c.ds_ida_intervalo_qua";
        $sql.="	,c.ds_volta_intervalo_qua";
        $sql.="	,c.ds_saida_qua";
        
        $sql.="	,c.ds_entrada_qui";
        $sql.="	,c.ds_ida_intervalo_qui";
        $sql.="	,c.ds_volta_intervalo_qui";
        $sql.="	,c.ds_saida_qui";
        
        $sql.="	,c.ds_entrada_sex";
        $sql.="	,c.ds_ida_intervalo_sex";
        $sql.="	,c.ds_volta_intervalo_sex";
        $sql.="	,c.ds_saida_sex";
        
        $sql.="	,c.ds_entrada_sab";
        $sql.="	,c.ds_ida_intervalo_sab";
        $sql.="	,c.ds_volta_intervalo_sab";
        $sql.="	,c.ds_saida_sab";
        $sql.="	,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.bancos_pk";
        $sql.="       ,cps.produtos_servicos_pk ";
        $sql.="       ,ps.ds_produto_servico ";
        $sql.="  from colaboradores c ";
        $sql.=" left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.=" inner join produtos_servicos ps  on ps.pk = cps.produtos_servicos_pk";
        $sql.=" and c.ic_status = 1";
        $sql.=" order by c.ds_colaborador";
        
      
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function verificarCPF($ds_cpf){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk  ";
        $sql.="  from colaboradores c ";
        $sql.=" where 1=1";
        if($ds_cpf!=""){
            $sql.=" and c.ds_cpf = '".$ds_cpf."'";
        }
        
      
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function RelatorioPinColaborador($colaborador_pk,$ic_status){

        $sql ="";
        $sql.="SELECT ";
        $sql.="    c.ds_colaborador, c.ds_pin, ps.ic_status status_ponto,";
        $sql.="    case ps.ic_status when 2 then 'Liberação Pendente' when 1 then 'Liberado' end ds_status";
        $sql.=" FROM";
        $sql.="    colaboradores c";
        $sql.="        LEFT JOIN";
        $sql.="    ponto_solicitacao_liberacao_app ps ON ps.colaborador_pk = c.pk";
        $sql.="    where 1=1 ";
        if($colaborador_pk!=""){
            $sql.=" and c.pk =".$colaborador_pk;
        }
        if($ic_status!=""){
            if($ic_status==3){
                $sql.=" and ps.ic_status is null";
            }
            else{
                $sql.=" and ps.ic_status =".$ic_status;
            }
            
        }
        $sql.=" and c.ic_status = 1";
        $sql.=" order by c.ds_colaborador asc";

      
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_ds_colaborador($ds_colaborador,$ic_status,$produtos_servicos_pk,$ds_pin,$generos_pk,$ds_re,$ic_status_app,$ic_reserva,$ic_origem,$leads_pk,$pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cel ";
        $sql.="       ,case c.ic_whatsapp when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp ";
        $sql.="       ,c.ds_cel2 ";
        $sql.="       ,case c.ic_whatsapp2 when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp2 ";
        $sql.="       ,c.ds_cel3 ";
        $sql.="       ,case c.ic_whatsapp3 when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp3 ";
        $sql.="       ,c.ds_email ";
        $sql.="       ,c.ds_rg ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento ";
        $sql.="       ,c.ds_endereco ";
        $sql.="       ,c.ds_numero ";
        $sql.="       ,c.ds_complemento ";
        $sql.="       ,c.ds_bairro ";
        $sql.="       ,c.ds_cep ";
        $sql.="       ,c.ds_cidade ";
        $sql.="       ,c.ds_uf ";
        $sql.="       ,c.ic_reserva";
        $sql.="       ,case c.ic_status when 1 then 'Ativo' when 2 then 'Inativo' end ic_status ";
        $sql.="       ,case c.ic_origem when 1 then 'Sistema' when 2 then 'Site' end ic_origem ";
        $sql.="       ,c.ic_funcionario";
        $sql.="       ,c.ds_pin";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.ds_raca";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="         ,c.ds_deficiencia_fisica";
        $sql.="         ,c.estado_civil";
        $sql.="         ,c.ds_nome_pai";
        $sql.="         ,c.ds_nome_mae";
        $sql.="         ,c.ds_nome_conjuge";
        $sql.="         ,c.dt_nascimento_conjuge";
        $sql.="         ,c.ds_cpf_conjuge";
        $sql.="         ,c.ds_tel_conjuge";
        $sql.="         ,c.regime_casamento";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.dt_expedicao";
        $sql.="         ,c.ds_uf_rg";
        $sql.="         ,c.ds_org_exp";
        $sql.="         ,c.ds_pis";
        $sql.="         ,c.ds_titulo_eleitoral";
        $sql.="         ,c.ds_zona_eleitoral";
        $sql.="         ,c.ds_secao";
        $sql.="         ,c.ds_certificado_reservista";
        $sql.="         ,c.ic_filho_menor_14";
        $sql.="         ,c.qtde_filho";
        //$sql.="       ,c.generos_pk ";
        $sql.="       ,g.ds_genero generos_pk ";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="	,c.empresas_pk";
        $sql.="	,c.regime_contratacao_pk";
        $sql.="	,c.ds_carga_horaria_semanal";
        
        $sql.="	,c.ds_entrada_dom";
        $sql.="	,c.ds_ida_intervalo_dom";
        $sql.="	,c.ds_volta_intervalo_dom";
        $sql.="	,c.ds_saida_dom";
        
        $sql.="	,c.ds_entrada_seg";
        $sql.="	,c.ds_ida_intervalo_seg";
        $sql.="	,c.ds_volta_intervalo_seg";
        $sql.="	,c.ds_saida_seg";
        
        $sql.="	,c.ds_entrada_ter";
        $sql.="	,c.ds_ida_intervalo_ter";
        $sql.="	,c.ds_volta_intervalo_ter";
        $sql.="	,c.ds_saida_ter";
        
        $sql.="	,c.ds_entrada_qua";
        $sql.="	,c.ds_ida_intervalo_qua";
        $sql.="	,c.ds_volta_intervalo_qua";
        $sql.="	,c.ds_saida_qua";
        
        $sql.="	,c.ds_entrada_qui";
        $sql.="	,c.ds_ida_intervalo_qui";
        $sql.="	,c.ds_volta_intervalo_qui";
        $sql.="	,c.ds_saida_qui";
        
        $sql.="	,c.ds_entrada_sex";
        $sql.="	,c.ds_ida_intervalo_sex";
        $sql.="	,c.ds_volta_intervalo_sex";
        $sql.="	,c.ds_saida_sex";
        
        $sql.="	,c.ds_entrada_sab";
        $sql.="	,c.ds_ida_intervalo_sab";
        $sql.="	,c.ds_volta_intervalo_sab";
        $sql.="	,c.ds_saida_sab";
        $sql.="	,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.bancos_pk";
        $sql.="       ,case when psl.ic_status = 1 then 'Liberado' when psl.ic_status = 2 then 'Pendente' end ds_status_app  ";
        $sql.="  from colaboradores c";
        $sql.="     inner join generos g on c.generos_pk = g.pk";
        $sql.="     left join agenda_colaborador_padrao a  on c.pk = a.colaboradores_pk";
        $sql.="     left join processos_etapas pe  on a.processos_etapas_pk = pe.pk";
        $sql.="     left join processos p  on pe.processos_pk = p.pk";
        $sql.="     left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="     left join produtos_servicos ps  on ps.pk = cps.produtos_servicos_pk";
        $sql.="     LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
        $sql.=" where 1=1 ";
        if($ds_colaborador != ""){
            $sql.=" and c.ds_colaborador like '%".$ds_colaborador."%' ";
        }
        if($ds_pin != ""){
            $sql.=" and c.ds_pin like '%".$ds_pin."%' ";
        }
        if($pk != ""){
            $sql.=" and c.pk =".$pk;
        }
        if($ic_status != ""){
            $sql.=" and c.ic_status =".$ic_status;
        }
        if($produtos_servicos_pk != ""){
            $sql.=" and cps.produtos_servicos_pk=".$produtos_servicos_pk;
        }
        if($generos_pk != ""){
            $sql.=" and c.generos_pk=".$generos_pk;
        }
        if($ds_re != ""){
            $sql.=" and c.ds_re=".$ds_re;
        }
        
        if($ic_status_app != ""){
            $sql.=" and psl.ic_status=".$ic_status_app;
        }
        if($ic_reserva != ""){
            $sql.=" and c.ic_reserva=".$ic_reserva;
        }

        if($ic_origem != ""){
            $sql.=" and c.ic_origem=".$ic_origem;
        }
        if($leads_pk != ""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }

        
       // $sql.=" and c.ic_status = 1";
        $sql.=" group by c.pk";
        $sql.=" order by c.ds_colaborador asc ";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorAgenda(){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cel ";
        $sql.="       ,case c.ic_whatsapp when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp ";
        $sql.="       ,c.ds_cel2 ";
        $sql.="       ,case c.ic_whatsapp2 when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp2 ";
        $sql.="       ,c.ds_cel3 ";
        $sql.="       ,case c.ic_whatsapp3 when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp3 ";
        $sql.="       ,c.ds_email ";
        $sql.="       ,c.ds_rg ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento ";
        $sql.="       ,c.ds_endereco ";
        $sql.="       ,c.ds_numero ";
        $sql.="       ,c.ds_complemento ";
        $sql.="       ,c.ds_bairro ";
        $sql.="       ,c.ds_cep ";
        $sql.="       ,c.ds_cidade ";
        $sql.="       ,c.ds_uf ";
        $sql.="       ,c.ic_reserva";
        $sql.="       ,case c.ic_status when 1 then 'Ativo' when 2 then 'Inativo' end ic_status ";
        $sql.="       ,case c.ic_origem when 1 then 'Sistema' when 2 then 'Site' end ic_origem ";
        $sql.="       ,c.ic_funcionario";
        $sql.="       ,c.ds_pin";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.ds_raca";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="         ,c.ds_deficiencia_fisica";
        $sql.="         ,c.estado_civil";
        $sql.="         ,c.ds_nome_pai";
        $sql.="         ,c.ds_nome_mae";
        $sql.="         ,c.ds_nome_conjuge";
        $sql.="         ,c.dt_nascimento_conjuge";
        $sql.="         ,c.ds_cpf_conjuge";
        $sql.="         ,c.ds_tel_conjuge";
        $sql.="         ,c.regime_casamento";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.dt_expedicao";
        $sql.="         ,c.ds_uf_rg";
        $sql.="         ,c.ds_org_exp";
        $sql.="         ,c.ds_pis";
        $sql.="         ,c.ds_titulo_eleitoral";
        $sql.="         ,c.ds_zona_eleitoral";
        $sql.="         ,c.ds_secao";
        $sql.="         ,c.ds_certificado_reservista";
        $sql.="         ,c.ic_filho_menor_14";
        $sql.="         ,c.qtde_filho";
        $sql.="	,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        //$sql.="       ,c.generos_pk ";
        $sql.="       ,g.ds_genero generos_pk ";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="	,c.empresas_pk";
        $sql.="	,c.regime_contratacao_pk";
        $sql.="	,c.ds_carga_horaria_semanal";
        
        $sql.="	,c.ds_entrada_dom";
        $sql.="	,c.ds_ida_intervalo_dom";
        $sql.="	,c.ds_volta_intervalo_dom";
        $sql.="	,c.ds_saida_dom";
        
        $sql.="	,c.ds_entrada_seg";
        $sql.="	,c.ds_ida_intervalo_seg";
        $sql.="	,c.ds_volta_intervalo_seg";
        $sql.="	,c.ds_saida_seg";
        
        $sql.="	,c.ds_entrada_ter";
        $sql.="	,c.ds_ida_intervalo_ter";
        $sql.="	,c.ds_volta_intervalo_ter";
        $sql.="	,c.ds_saida_ter";
        
        $sql.="	,c.ds_entrada_qua";
        $sql.="	,c.ds_ida_intervalo_qua";
        $sql.="	,c.ds_volta_intervalo_qua";
        $sql.="	,c.ds_saida_qua";
        
        $sql.="	,c.ds_entrada_qui";
        $sql.="	,c.ds_ida_intervalo_qui";
        $sql.="	,c.ds_volta_intervalo_qui";
        $sql.="	,c.ds_saida_qui";
        
        $sql.="	,c.ds_entrada_sex";
        $sql.="	,c.ds_ida_intervalo_sex";
        $sql.="	,c.ds_volta_intervalo_sex";
        $sql.="	,c.ds_saida_sex";
        
        $sql.="	,c.ds_entrada_sab";
        $sql.="	,c.ds_ida_intervalo_sab";
        $sql.="	,c.ds_volta_intervalo_sab";
        $sql.="	,c.ds_saida_sab";
        $sql.="	,c.bancos_pk";
        $sql.="       ,case when psl.ic_status = 1 then 'Liberado' when psl.ic_status = 2 then 'Pendente' end ds_status_app  ";
        $sql.="  from colaboradores c";
        $sql.="     inner join generos g on c.generos_pk = g.pk";
        $sql.="     inner join agenda_colaborador_padrao a on a.colaboradores_pk = c.pk";
        $sql.="     left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="     left join produtos_servicos ps  on ps.pk = cps.produtos_servicos_pk";
        $sql.="     LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
        $sql.=" where 1=1 ";
        
        $sql.=" and c.ic_status = 1";
        $sql.=" and a.dt_cancelamento is null";
        $sql.=" group by c.pk,a.colaboradores_pk";
        $sql.=" order by c.ds_colaborador asc ";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorLead($leads_pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="  from colaboradores c";
        $sql.="     left join agenda_colaborador_padrao a on a.colaboradores_pk = c.pk";
        $sql.="     left join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="     left join processos p on pe.processos_pk = p.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk = ".$leads_pk;
        }
        $sql.=" and a.dt_cancelamento is null";
        $sql.=" group by c.pk,a.colaboradores_pk";
        $sql.=" order by c.ds_colaborador asc ";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listar_por_ds_colaborador_ponto($ds_colaborador,$ic_status,$produtos_servicos_pk,$ds_pin,$generos_pk,$ds_re,$ic_status_app){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador ";
        $sql.="       ,c.ds_cel ";
        $sql.="       ,case c.ic_whatsapp when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp ";
        $sql.="       ,c.ds_cel2 ";
        $sql.="       ,case c.ic_whatsapp2 when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp2 ";
        $sql.="       ,c.ds_cel3 ";
        $sql.="       ,case c.ic_whatsapp3 when 1 then 'Sim' when 2 then 'Não' end ic_whatsapp3 ";
        $sql.="       ,c.ds_email ";
        $sql.="       ,c.ds_rg ";
        $sql.="       ,c.ds_cpf ";
        $sql.="       ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento ";
        $sql.="       ,c.ds_endereco ";
        $sql.="       ,c.ds_numero ";
        $sql.="       ,c.ds_complemento ";
        $sql.="       ,c.ds_bairro ";
        $sql.="       ,c.ds_cep ";
        $sql.="       ,c.ic_reserva ";
        $sql.="       ,c.ds_cidade ";
        $sql.="       ,c.ds_uf ";
        $sql.="       ,case c.ic_status when 1 then 'Ativo' when 2 then 'Inativo' end ic_status ";
        $sql.="       ,c.ic_funcionario";
        $sql.="       ,c.ds_pin";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.ds_raca";
        $sql.="         ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(c.dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.="         ,c.ds_deficiencia_fisica";
        $sql.="         ,c.estado_civil";
        $sql.="         ,c.ds_nome_pai";
        $sql.="         ,c.ds_nome_mae";
        $sql.="         ,c.ds_nome_conjuge";
        $sql.="         ,c.dt_nascimento_conjuge";
        $sql.="         ,c.ds_cpf_conjuge";
        $sql.="         ,c.ds_tel_conjuge";
        $sql.="         ,c.regime_casamento";
        $sql.="         ,c.ds_ctps";
        $sql.="         ,c.ds_serie";
        $sql.="         ,c.dt_expedicao";
        $sql.="         ,c.ds_uf_rg";
        $sql.="         ,c.ds_org_exp";
        $sql.="         ,c.ds_pis";
        $sql.="         ,c.ds_titulo_eleitoral";
        $sql.="         ,c.ds_zona_eleitoral";
        $sql.="         ,c.ds_secao";
        $sql.="         ,c.ds_certificado_reservista";
        $sql.="         ,c.ic_filho_menor_14";
        $sql.="         ,c.qtde_filho";
        $sql.="	,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.empresas_pk";
        $sql.="	,c.regime_contratacao_pk";
        $sql.="	,c.ds_carga_horaria_semanal";
        
        $sql.="	,c.ds_entrada_dom";
        $sql.="	,c.ds_ida_intervalo_dom";
        $sql.="	,c.ds_volta_intervalo_dom";
        $sql.="	,c.ds_saida_dom";
        
        $sql.="	,c.ds_entrada_seg";
        $sql.="	,c.ds_ida_intervalo_seg";
        $sql.="	,c.ds_volta_intervalo_seg";
        $sql.="	,c.ds_saida_seg";
        
        $sql.="	,c.ds_entrada_ter";
        $sql.="	,c.ds_ida_intervalo_ter";
        $sql.="	,c.ds_volta_intervalo_ter";
        $sql.="	,c.ds_saida_ter";
        
        $sql.="	,c.ds_entrada_qua";
        $sql.="	,c.ds_ida_intervalo_qua";
        $sql.="	,c.ds_volta_intervalo_qua";
        $sql.="	,c.ds_saida_qua";
        
        $sql.="	,c.ds_entrada_qui";
        $sql.="	,c.ds_ida_intervalo_qui";
        $sql.="	,c.ds_volta_intervalo_qui";
        $sql.="	,c.ds_saida_qui";
        
        $sql.="	,c.ds_entrada_sex";
        $sql.="	,c.ds_ida_intervalo_sex";
        $sql.="	,c.ds_volta_intervalo_sex";
        $sql.="	,c.ds_saida_sex";
        
        $sql.="	,c.ds_entrada_sab";
        $sql.="	,c.ds_ida_intervalo_sab";
        $sql.="	,c.ds_volta_intervalo_sab";
        $sql.="	,c.ds_saida_sab";
        $sql.="	,c.bancos_pk";
        //$sql.="       ,c.generos_pk ";
        $sql.="       ,g.ds_genero generos_pk ";
        $sql.="       ,case when psl.ic_status = 1 then 'Liberado' when psl.ic_status = 2 then 'Pendente' end ds_status_app  ";
        $sql.="  from colaboradores c";
        $sql.="     inner join ponot p on p.colaborador_pk= c.pk";
        $sql.="     inner join generos g on c.generos_pk = g.pk";
        $sql.="     left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.="     LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
        $sql.=" where 1=1 ";
        if($ds_colaborador != ""){
            $sql.=" and c.ds_colaborador like '%".$ds_colaborador."%' ";
        }
        if($ds_pin != ""){
            $sql.=" and c.ds_pin like '%".$ds_pin."%' ";
        }
        if($ic_status != ""){
            $sql.=" and c.ic_status =".$ic_status;
        }
        if($produtos_servicos_pk != ""){
            $sql.=" and cps.produtos_servicos_pk=".$produtos_servicos_pk;
        }
        if($generos_pk != ""){
            $sql.=" and c.generos_pk=".$generos_pk;
        }
        if($ds_re != ""){
            $sql.=" and c.ds_re=".$ds_re;
        }
        
        if($ic_status_app != ""){
            $sql.=" and psl.ic_status=".$ic_status_app;
        }
        
       // $sql.=" and c.ic_status = 1";
        $sql.=" order by c.ds_colaborador asc ";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    
    
    
    
    public function listar_por_ds_colaborador_e_servico($ic_dom,$ic_seg,$ic_ter,$ic_qua,$ic_qui,$ic_sex,$ic_sab,$dom_turnos_pk,$seg_turnos_pk,$ter_turnos_pk,$qua_turnos_pk,$qui_turnos_pk,$sex_turnos_pk,$sab_turnos_pk,$dt_inicio_agenda,$dt_fim_agenda,$produtos_servicos_pk,$agenda_colaborador_padrao_pk){

        
        $sql.=" select c.pk,c.ds_colaborador,c.ds_re ";
        $sql.="   from colaboradores c ";
        $sql.="        inner join colaboradores_produtos_servicos cps on cps.colaboradores_pk = c.pk";
        $sql.="        left join contratos_itens ci on cps.produtos_servicos_pk = ci.produtos_servicos_pk";
        $sql.="        left join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
        $sql.="  where 1=1 ";
        if($produtos_servicos_pk!=""){
            $sql.=" and ps.pk = ".$produtos_servicos_pk;
        }
        $sql.=" and c.ic_status = 1";
        $sql.=" group by c.pk";
        $sql.=" order by c.ds_colaborador";
       
        
        
        /*$sql.=" union ";

        $sql.=" select c.pk,c.ds_colaborador "; 
        $sql.="   from colaboradores c ";
        $sql.="        inner join agenda_colaborador_padrao a on a.colaboradores_pk = c.pk ";
        $sql.="        inner join colaboradores_produtos_servicos cps on cps.colaboradores_pk = c.pk";
        $sql.="        inner join contratos_itens ci on cps.produtos_servicos_pk = ci.produtos_servicos_pk";
        $sql.="        inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
        
        if($produtos_servicos_pk!=""){
            $sql.=" and ps.pk = ".$produtos_servicos_pk;
        }
        $sql.=" and c.ic_status = 1";
        $sql.=" group by c.pk, c.ds_colaborador ";
        $sql.=" having max(a.dt_fim_agenda) <'".  DataYMD($dt_inicio_agenda)."'";
        

        $sql.=" union"; 

        $sql.=" select c.pk, c.ds_colaborador ";
        $sql.="   from colaboradores c ";
        $sql.="        inner join agenda_colaborador_padrao a on a.colaboradores_pk = c.pk";
        $sql.="        inner join colaboradores_produtos_servicos cps on cps.colaboradores_pk = c.pk";
        $sql.="        inner join contratos_itens ci on cps.produtos_servicos_pk = ci.produtos_servicos_pk";
        $sql.="        inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
        $sql.="  where a.dt_inicio_agenda < '".  DataYMD($dt_fim_agenda)."'";
        
       if($produtos_servicos_pk!=""){
            $sql.=" and ps.pk = ".$produtos_servicos_pk;
        }
        
        if($ic_dom==1){
            $sql.=" and (a.ic_dom = 2 )";
        }
        if($dom_turnos_pk!=""){
            $sql.=" AND(  a.dom_turnos_pk <> $dom_turnos_pk or a.dom_turnos_pk is null)";
        }
        if($ic_seg==1){
            $sql.="	AND (a.ic_seg = 2 )";
        }
        if($seg_turnos_pk!=""){
            $sql.=" AND(  a.seg_turnos_pk <> $seg_turnos_pk or a.seg_turnos_pk is null)";
        }
        if($ic_ter==1){
            $sql.=" and (a.ic_ter = 2 )";
        }
        if($ter_turnos_pk!=""){
            $sql.=" AND(  a.ter_turnos_pk <> $ter_turnos_pk or a.ter_turnos_pk is null)";
        }

        if($ic_qua==1){
            $sql.=" and (a.ic_qua = 2 )";
        }
        if($qua_turnos_pk!=""){
			$sql.=" AND(  a.qua_turnos_pk <> $qua_turnos_pk or a.qua_turnos_pk is null)";
        }
        if($ic_qui==1){
            $sql.=" and (a.ic_qui = 2 )";
        }
        if($qui_turnos_pk!=""){
            $sql.=" AND( a.qui_turnos_pk <> $qui_turnos_pk or a.qui_turnos_pk is null)";
        }
        if($ic_sex==1){
            $sql.=" and (a.ic_sex = 2 )";
        }
        if($sex_turnos_pk!=""){
            $sql.=" AND( a.sex_turnos_pk <> $sex_turnos_pk or a.sex_turnos_pk is null)";
        }
        if($ic_sab==1){
            $sql.=" and (a.ic_sab = 2 )";
        }
        if($sab_turnos_pk!=""){
		$sql.=" AND( a.sab_turnos_pk <> $sab_turnos_pk or a.sab_turnos_pk is null)";
        }
        if($agenda_colaborador_padrao_pk!=""){
            $sql.=" union";
            $sql.="       select c.pk, c.ds_colaborador";
            $sql.="              from colaboradores c";
            $sql.="                   inner join agenda_colaborador_padrao acp on acp.colaboradores_pk = c.pk";
            $sql.="                   inner join colaboradores_produtos_servicos cps on cps.colaboradores_pk = c.pk";
            $sql.="                   inner join contratos_itens ci on cps.produtos_servicos_pk = ci.produtos_servicos_pk";
            $sql.="                   inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
            $sql.="        where acp.pk =".$agenda_colaborador_padrao_pk;
            if($produtos_servicos_pk!=""){
                $sql.=" and ps.pk = ".$produtos_servicos_pk;
            }
        }
        $sql.=" and c.ic_status = 1";
        $sql.=" order by 2";*/
  
 
       $query = $this->db->execQuery($sql);
        return $query;

    }
    public function verificarEscala($pk,$dt_base){

        
        $sql.=" select count(0)qtde_escala ";
        $sql.="   from agenda_colaborador_padrao a ";
        $sql.="  where 1=1 ";
        if($pk!=""){
            $sql.=" and a.colaboradores_pk = ".$pk;
        }
        if($dt_base!=""){
            $sql.=" and '".DataYMD($dt_base)."' between a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        $sql.=" and a.dt_cancelamento is null";
       
        
        
  
 
       $query = $this->db->execQuery($sql);
        return $query;

    }
    

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_colaborador ";
        $sql.="       ,ds_cel ";
        $sql.="       ,ic_whatsapp ";
        $sql.="       ,ds_cel2 ";
        $sql.="       ,ic_whatsapp2 ";
        $sql.="       ,ds_cel3 ";
        $sql.="       ,ic_whatsapp3 ";
        $sql.="       ,ds_email ";
        $sql.="       ,ds_rg ";
        $sql.="       ,ds_cpf ";
        $sql.="       ,dt_nascimento ";
        $sql.="       ,ds_endereco ";
        $sql.="       ,ds_numero ";
        $sql.="       ,ds_complemento ";
        $sql.="       ,ds_bairro ";
        $sql.="       ,ds_cep ";
        $sql.="       ,ds_cidade ";
        $sql.="       ,ds_uf ";
        $sql.="       ,ic_status ";
        $sql.="       ,ic_funcionario ";
        $sql.="       ,generos_pk ";
        $sql.="       ,ds_pin";
        $sql.="       ,ds_re";
        $sql.="       ,ic_reserva";
        $sql.="         ,date_format(dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.=",ds_raca";
        $sql.=",ds_deficiencia_fisica";
        $sql.=",estado_civil";
        $sql.=",ds_nome_pai";
        $sql.=",ds_nome_mae";
        $sql.=",ds_nome_conjuge";
        $sql.=",dt_nascimento_conjuge";
        $sql.=",ds_cpf_conjuge";
        $sql.=",ds_tel_conjuge";
        $sql.=",regime_casamento";
        $sql.=",ds_ctps";
        $sql.=",ds_serie";
        $sql.=",dt_expedicao";
        $sql.=",ds_uf_rg";
        $sql.=",ds_org_exp";
        $sql.=",ds_pis";
        $sql.=",ds_titulo_eleitoral";
        $sql.=",ds_zona_eleitoral";
        $sql.=",ds_secao";
        $sql.=",ds_certificado_reservista";
        $sql.="	,ic_filho_menor_14";
        $sql.="	,qtde_filho";
        $sql.="	,empresas_pk";
        $sql.="	,regime_contratacao_pk";
        $sql.="	,ds_carga_horaria_semanal";
        
        $sql.="	,ds_entrada_dom";
        $sql.="	,ds_ida_intervalo_dom";
        $sql.="	,ds_volta_intervalo_dom";
        $sql.="	,ds_saida_dom";
        
        $sql.="	,ds_entrada_seg";
        $sql.="	,ds_ida_intervalo_seg";
        $sql.="	,ds_volta_intervalo_seg";
        $sql.="	,ds_saida_seg";
        
        $sql.="	,ds_entrada_ter";
        $sql.="	,ds_ida_intervalo_ter";
        $sql.="	,ds_volta_intervalo_ter";
        $sql.="	,ds_saida_ter";
        
        $sql.="	,ds_entrada_qua";
        $sql.="	,ds_ida_intervalo_qua";
        $sql.="	,ds_volta_intervalo_qua";
        $sql.="	,ds_saida_qua";
        
        $sql.="	,ds_entrada_qui";
        $sql.="	,ds_ida_intervalo_qui";
        $sql.="	,ds_volta_intervalo_qui";
        $sql.="	,ds_saida_qui";
        
        $sql.="	,ds_entrada_sex";
        $sql.="	,ds_ida_intervalo_sex";
        $sql.="	,ds_volta_intervalo_sex";
        $sql.="	,ds_saida_sex";
        
        $sql.="	,ds_entrada_sab";
        $sql.="	,ds_ida_intervalo_sab";
        $sql.="	,ds_volta_intervalo_sab";
        $sql.="	,ds_saida_sab";
        $sql.="	,tipo_conta_bancaria";
        $sql.="	,ds_agencia";
        $sql.="	,ds_conta";
        $sql.="	,ds_digito";
        $sql.="	,bancos_pk";

        $sql.="  from colaboradores ";
        $sql.=" where 1=1 ";
        $sql.=" order by ds_colaborador asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarTodosReservas(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_colaborador ";
        $sql.="       ,ds_cel ";
        $sql.="       ,ic_whatsapp ";
        $sql.="       ,ds_cel2 ";
        $sql.="       ,ic_whatsapp2 ";
        $sql.="       ,ds_cel3 ";
        $sql.="       ,ic_whatsapp3 ";
        $sql.="       ,ds_email ";
        $sql.="       ,ds_rg ";
        $sql.="       ,ds_cpf ";
        $sql.="       ,dt_nascimento ";
        $sql.="       ,ds_endereco ";
        $sql.="       ,ds_numero ";
        $sql.="       ,ds_complemento ";
        $sql.="       ,ds_bairro ";
        $sql.="       ,ds_cep ";
        $sql.="       ,ds_cidade ";
        $sql.="       ,ds_uf ";
        $sql.="       ,ic_status ";
        $sql.="       ,ic_funcionario ";
        $sql.="       ,generos_pk ";
        $sql.="       ,ds_pin";
        $sql.="       ,ds_re";
        $sql.="       ,ic_reserva";
        $sql.="         ,date_format(dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.=",ds_raca";
        $sql.=",ds_deficiencia_fisica";
        $sql.=",estado_civil";
        $sql.=",ds_nome_pai";
        $sql.=",ds_nome_mae";
        $sql.=",ds_nome_conjuge";
        $sql.=",dt_nascimento_conjuge";
        $sql.=",ds_cpf_conjuge";
        $sql.=",ds_tel_conjuge";
        $sql.=",regime_casamento";
        $sql.=",ds_ctps";
        $sql.=",ds_serie";
        $sql.=",dt_expedicao";
        $sql.=",ds_uf_rg";
        $sql.=",ds_org_exp";
        $sql.=",ds_pis";
        $sql.=",ds_titulo_eleitoral";
        $sql.=",ds_zona_eleitoral";
        $sql.=",ds_secao";
        $sql.=",ds_certificado_reservista";
        $sql.="	,ic_filho_menor_14";
        $sql.="	,qtde_filho";
        $sql.="	,empresas_pk";
        $sql.="	,regime_contratacao_pk";
        $sql.="	,ds_carga_horaria_semanal";
        
        $sql.="	,ds_entrada_dom";
        $sql.="	,ds_ida_intervalo_dom";
        $sql.="	,ds_volta_intervalo_dom";
        $sql.="	,ds_saida_dom";
        
        $sql.="	,ds_entrada_seg";
        $sql.="	,ds_ida_intervalo_seg";
        $sql.="	,ds_volta_intervalo_seg";
        $sql.="	,ds_saida_seg";
        
        $sql.="	,ds_entrada_ter";
        $sql.="	,ds_ida_intervalo_ter";
        $sql.="	,ds_volta_intervalo_ter";
        $sql.="	,ds_saida_ter";
        
        $sql.="	,ds_entrada_qua";
        $sql.="	,ds_ida_intervalo_qua";
        $sql.="	,ds_volta_intervalo_qua";
        $sql.="	,ds_saida_qua";
        
        $sql.="	,ds_entrada_qui";
        $sql.="	,ds_ida_intervalo_qui";
        $sql.="	,ds_volta_intervalo_qui";
        $sql.="	,ds_saida_qui";
        
        $sql.="	,ds_entrada_sex";
        $sql.="	,ds_ida_intervalo_sex";
        $sql.="	,ds_volta_intervalo_sex";
        $sql.="	,ds_saida_sex";
        
        $sql.="	,ds_entrada_sab";
        $sql.="	,ds_ida_intervalo_sab";
        $sql.="	,ds_volta_intervalo_sab";
        $sql.="	,ds_saida_sab";
        $sql.="	,tipo_conta_bancaria";
        $sql.="	,ds_agencia";
        $sql.="	,ds_conta";
        $sql.="	,ds_digito";
        $sql.="	,bancos_pk";

        $sql.="  from colaboradores ";
        $sql.=" where 1=1 ";
        $sql.=" and ic_reserva = 1";
        $sql.=" order by ds_colaborador asc ";
       

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarDadosBancarios($pk){

        $sql ="";
        $sql.="select c.pk, c.dt_cadastro, c.usuario_cadastro_pk, c.dt_ult_atualizacao, c.usuario_ult_atualizacao_pk ";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.bancos_pk";
        $sql.="	,b.ds_banco";

        $sql.="  from colaboradores c";
        $sql.="  left join bancos b on c.bancos_pk = b.pk";
        $sql.=" where 1=1 ";
        $sql.=" and c.pk  = ".$pk;
        $sql.=" group by c.pk ";
        $sql.=" order by c.ds_colaborador asc ";
       

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function RelatorioColaboradorSemEscala($pk){

        $sql ="";
        $sql.="select a.pk";
        $sql.="        ,c.ds_re";
        $sql.="        ,date_format(c.dt_cadastro,'%d/%m/%Y')dt_cadastro";
        $sql.="        ,c.ds_colaborador ";
        $sql.="        ,ps.ds_produto_servico";
        $sql.="        ,case c.ic_status when 1 then 'Ativo' when 2 then 'Desativado' end ds_status";
        $sql.="        ,case c.ic_funcionario when 1 then 'Funcionário' when 2 then 'Não Funcionário' end ds_funcionario";
        $sql.="        ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="        ,c.ds_matricula";
        $sql.="        ,c.ds_cel";
        $sql.="        ,c.ds_email";
        $sql.="        ,c.ds_rg";
        $sql.="        ,c.ds_cpf";
        $sql.="        ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento";
        $sql.="        ,c.ds_endereco";
        $sql.="        ,c.ds_numero";
        $sql.="        ,c.ds_complemento";
        $sql.="        ,c.ds_bairro";
        $sql.="        ,c.ds_cep";
        $sql.="        ,c.ds_cidade";
        $sql.="        ,c.ds_uf";
        $sql.="        ,c.ds_cel1";
        $sql.="        ,c.ds_cel2";
        $sql.="        ,c.ds_pin";
        $sql.="        ,c.ds_raca";
        $sql.="        ,c.ds_deficiencia_fisica";
        $sql.="        ,case c.estado_civil when 1 then 'Solteiro' when 2 then 'Casado' when 3 then 'Separado' when 4 then 'Divorciado' when 5 then 'Viuvo' end ds_estado_civil";
        $sql.="        ,c.ds_nome_pai";
        $sql.="        ,c.ds_nome_mae";
        $sql.="        ,c.ds_nome_conjuge";
        $sql.="        ,date_format(c.dt_nascimento_conjuge,'%d/%m/%Y')dt_nascimento_conjuge";
        $sql.="        ,c.ds_cpf_conjuge";
        $sql.="        ,c.ds_tel_conjuge";
        $sql.="        ,c.regime_casamento";
        $sql.="        ,c.ds_ctps";
        $sql.="        ,c.ds_serie";
        $sql.="        ,date_format(c.dt_expedicao,'%d/%m/%Y')dt_expedicao";
        $sql.="        ,c.ds_uf_rg";
        $sql.="        ,c.ds_org_exp";
        $sql.="        ,c.ds_pis";
        $sql.="        ,c.ds_titulo_eleitoral";
        $sql.="        ,c.ds_zona_eleitoral";
        $sql.="        ,c.ds_secao";
        $sql.="        ,c.ds_certificado_reservista";
        $sql.="        ,c.ds_nacionalidade";
        $sql.="        ,c.qtde_filho";
        $sql.="	,c.empresas_pk";
        $sql.="	,c.regime_contratacao_pk";
        $sql.="	,c.ds_carga_horaria_semanal";
        
        $sql.="	,c.ds_entrada_dom";
        $sql.="	,c.ds_ida_intervalo_dom";
        $sql.="	,c.ds_volta_intervalo_dom";
        $sql.="	,c.ds_saida_dom";
        
        $sql.="	,c.ds_entrada_seg";
        $sql.="	,c.ds_ida_intervalo_seg";
        $sql.="	,c.ds_volta_intervalo_seg";
        $sql.="	,c.ds_saida_seg";
        
        $sql.="	,c.ds_entrada_ter";
        $sql.="	,c.ds_ida_intervalo_ter";
        $sql.="	,c.ds_volta_intervalo_ter";
        $sql.="	,c.ds_saida_ter";
        
        $sql.="	,c.ds_entrada_qua";
        $sql.="	,c.ds_ida_intervalo_qua";
        $sql.="	,c.ds_volta_intervalo_qua";
        $sql.="	,c.ds_saida_qua";
        
        $sql.="	,c.ds_entrada_qui";
        $sql.="	,c.ds_ida_intervalo_qui";
        $sql.="	,c.ds_volta_intervalo_qui";
        $sql.="	,c.ds_saida_qui";
        
        $sql.="	,c.ds_entrada_sex";
        $sql.="	,c.ds_ida_intervalo_sex";
        $sql.="	,c.ds_volta_intervalo_sex";
        $sql.="	,c.ds_saida_sex";
        
        $sql.="	,c.ds_entrada_sab";
        $sql.="	,c.ds_ida_intervalo_sab";
        $sql.="	,c.ds_volta_intervalo_sab";
        $sql.="	,c.ds_saida_sab";
        $sql.="	,c.tipo_conta_bancaria";
        $sql.="	,c.ds_agencia";
        $sql.="	,c.ds_conta";
        $sql.="	,c.ds_digito";
        $sql.="	,c.bancos_pk";
        $sql.="  from colaboradores c ";
        $sql.="  left join colaboradores_produtos_servicos cps on cps.colaboradores_pk = c.pk";
        $sql.="  inner join produtos_servicos ps on cps.produtos_servicos_pk = cps.produtos_servicos_pk";
        $sql.="  left join agenda_colaborador_padrao a on a.colaboradores_pk = c.pk";
        $sql.=" where 1=1 ";
        $sql.="        and a.pk is null";
        if($pk!=""){
            $sql.=" and c.pk =".$pk;
        }
        $sql.=" group by c.pk";
        $sql.=" order by c.ds_colaborador";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function RelatorioDadosColaborador($pk){

        $sql ="";
        $sql.="select ";
        $sql.="        c.pk";
        $sql.="        ,c.ds_colaborador ";
        $sql.="        ,date_format(c.dt_nascimento,'%d/%m/%Y')dt_nascimento";
        $sql.="        ,case c.grau_escolaridade_pk when 1 then 'Educação infantil' when 2 then 'Ensino Fundamental' when 3 then 'Ensino Médio' when 4 then 'Superior (Graduação)' when 5 then 'Pós-graduação' when 6 then 'Mestrado' when 7 then 'Doutorado' end ds_escolaridade";
        $sql.="        ,c.ds_rg";
        $sql.="        ,c.ds_cpf";
        $sql.="        ,ct.ds_razao_social";
        $sql.="        ,c.empresas_pk";
        $sql.="        ,case c.regime_contratacao_pk when 1 then 'Mensalista' when 2 then 'Horista' end ds_regime_contratacao";
        $sql.="        ,date_format(c.dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="        ,c.ds_carga_horaria_semanal";
        $sql.="        ,c.vl_salario";
        $sql.="        ,c.ds_cel";
        $sql.="        ,c.ds_endereco";
        $sql.="        ,c.ds_numero";
        $sql.="        ,c.ds_complemento";
        $sql.="        ,c.ds_bairro";
        $sql.="        ,c.ds_cep";
        $sql.="        ,c.ds_cidade";
        $sql.="        ,c.ds_uf";
        
        $sql.="  from colaboradores c ";
        $sql.="  left join contas ct on ct.pk = c.empresas_pk ";
        $sql.=" where 1=1 ";
        if($pk!=""){
            $sql.=" and c.pk =".$pk;
        }
        $sql.=" group by c.pk";
        $sql.=" order by c.ds_colaborador";
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listarQualificacaoColaborador($pk){
        $sql.="select ";
        $sql.="   ps.ds_produto_servico ";
        
        
        $sql.="  from colaboradores_produtos_servicos c ";
        $sql.="  inner join produtos_servicos ps on ps.pk = c.produtos_servicos_pk";
        $sql.=" where 1=1 ";
        if($pk!=""){
            $sql.=" and c.colaboradores_pk = ".$pk;
        }
        $sql.=" group by c.colaboradores_pk";
        
        
        

        $query = $this->db->execQuery($sql);
        return $query;
    }
    public function listarTodosComboRelSemEscala(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_colaborador ";
        $sql.="       ,ds_cel ";
        $sql.="       ,ic_whatsapp ";
        $sql.="       ,ds_cel2 ";
        $sql.="       ,ic_whatsapp2 ";
        $sql.="       ,ds_cel3 ";
        $sql.="       ,ic_whatsapp3 ";
        $sql.="       ,ds_email ";
        $sql.="       ,ds_rg ";
        $sql.="       ,ds_cpf ";
        $sql.="       ,dt_nascimento ";
        $sql.="       ,ds_endereco ";
        $sql.="       ,ds_numero ";
        $sql.="       ,ds_complemento ";
        $sql.="       ,ds_bairro ";
        $sql.="       ,ds_cep ";
        $sql.="       ,ds_cidade ";
        $sql.="       ,ds_uf ";
        $sql.="       ,ic_status ";
        $sql.="       ,ic_funcionario ";
        $sql.="       ,generos_pk ";
        $sql.="       ,ds_pin";
        $sql.="       ,ds_re";
        $sql.="       ,ic_reserva";
        $sql.="         ,date_format(dt_admissao,'%d/%m/%Y')dt_admissao";
        $sql.="         ,date_format(dt_demissao,'%d/%m/%Y')dt_demissao";
        $sql.=",ds_raca";
        $sql.=",ds_deficiencia_fisica";
        $sql.=",estado_civil";
        $sql.=",ds_nome_pai";
        $sql.=",ds_nome_mae";
        $sql.=",ds_nome_conjuge";
        $sql.=",dt_nascimento_conjuge";
        $sql.=",ds_cpf_conjuge";
        $sql.=",ds_tel_conjuge";
        $sql.=",regime_casamento";
        $sql.=",ds_ctps";
        $sql.=",ds_serie";
        $sql.=",dt_expedicao";
        $sql.=",ds_uf_rg";
        $sql.=",ds_org_exp";
        $sql.=",ds_pis";
        $sql.=",ds_titulo_eleitoral";
        $sql.=",ds_zona_eleitoral";
        $sql.=",ds_secao";
        $sql.=",ds_certificado_reservista";
        $sql.="	,ic_filho_menor_14";
        $sql.="	,qtde_filho";
        $sql.="	,empresas_pk";
        $sql.="	,regime_contratacao_pk";
        $sql.="	,ds_carga_horaria_semanal";
        
        $sql.="	,ds_entrada_dom";
        $sql.="	,ds_ida_intervalo_dom";
        $sql.="	,ds_volta_intervalo_dom";
        $sql.="	,ds_saida_dom";
        
        $sql.="	,ds_entrada_seg";
        $sql.="	,ds_ida_intervalo_seg";
        $sql.="	,ds_volta_intervalo_seg";
        $sql.="	,ds_saida_seg";
        
        $sql.="	,ds_entrada_ter";
        $sql.="	,ds_ida_intervalo_ter";
        $sql.="	,ds_volta_intervalo_ter";
        $sql.="	,ds_saida_ter";
        
        $sql.="	,ds_entrada_qua";
        $sql.="	,ds_ida_intervalo_qua";
        $sql.="	,ds_volta_intervalo_qua";
        $sql.="	,ds_saida_qua";
        
        $sql.="	,ds_entrada_qui";
        $sql.="	,ds_ida_intervalo_qui";
        $sql.="	,ds_volta_intervalo_qui";
        $sql.="	,ds_saida_qui";
        
        $sql.="	,ds_entrada_sex";
        $sql.="	,ds_ida_intervalo_sex";
        $sql.="	,ds_volta_intervalo_sex";
        $sql.="	,ds_saida_sex";
        
        $sql.="	,ds_entrada_sab";
        $sql.="	,ds_ida_intervalo_sab";
        $sql.="	,ds_volta_intervalo_sab";
        $sql.="	,ds_saida_sab";
        $sql.="	,tipo_conta_bancaria";
        $sql.="	,ds_agencia";
        $sql.="	,ds_conta";
        $sql.="	,ds_digito";
        $sql.="	,bancos_pk";
        $sql.="  from colaboradores ";
        $sql.=" where 1=1 ";
        $sql.=" and dt_demissao is null ";
        $sql.=" and ic_status = 1 ";
        $sql.=" and ic_funcionario = 1 ";
        
        $sql.=" order by ds_colaborador asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    

}

?>
