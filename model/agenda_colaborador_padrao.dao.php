<?

require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/agenda_colaborador_padrao.class.php';


class agenda_colaborador_padraodao{

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
    
    public function salvar($agenda_colaborador_padrao){

        $fields = array();
        $fields['ds_agenda'] = $agenda_colaborador_padrao->getds_agenda();
        $fields['dt_inicio_agenda'] = $agenda_colaborador_padrao->getdt_inicio_agenda();
        $fields['dt_fim_agenda'] = $agenda_colaborador_padrao->getdt_fim_agenda();
        $fields['colaboradores_pk'] = $agenda_colaborador_padrao->getcolaboradores_pk();
        $fields['processos_etapas_pk'] = $agenda_colaborador_padrao->getprocessos_etapas_pk();
        $fields['contratos_itens_pk'] = $agenda_colaborador_padrao->getcontratos_itens_pk();
        $fields['ic_dom'] = $agenda_colaborador_padrao->getic_dom();
        $fields['ic_seg'] = $agenda_colaborador_padrao->getic_seg();
        $fields['ic_ter'] = $agenda_colaborador_padrao->getic_ter();
        $fields['ic_qua'] = $agenda_colaborador_padrao->getic_qua();
        $fields['ic_qui'] = $agenda_colaborador_padrao->getic_qui();
        $fields['ic_sex'] = $agenda_colaborador_padrao->getic_sex();
        $fields['ic_sab'] = $agenda_colaborador_padrao->getic_sab();
        
        $fields['ic_dom_folga'] = $agenda_colaborador_padrao->getic_dom_folga();
        $fields['ic_seg_folga'] = $agenda_colaborador_padrao->getic_seg_folga();
        $fields['ic_ter_folga'] = $agenda_colaborador_padrao->getic_ter_folga();
        $fields['ic_qua_folga'] = $agenda_colaborador_padrao->getic_qua_folga();
        $fields['ic_qui_folga'] = $agenda_colaborador_padrao->getic_qui_folga();
        $fields['ic_sex_folga'] = $agenda_colaborador_padrao->getic_sex_folga();
        $fields['ic_sab_folga'] = $agenda_colaborador_padrao->getic_sab_folga();
        
        
        if($agenda_colaborador_padrao->getic_folga_inverter()!=""){
            $fields['ic_folga_inverter'] = $agenda_colaborador_padrao->getic_folga_inverter();
        }
        else{
             $fields['ic_folga_inverter'] = "null";
        }
        
        
        if($agenda_colaborador_padrao->gethr_turno_dom()!=""){
            $fields['hr_turno_dom'] = $agenda_colaborador_padrao->gethr_turno_dom();
        }
        else{
             $fields['hr_turno_dom'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_seg()!=""){
            $fields['hr_turno_seg'] = $agenda_colaborador_padrao->gethr_turno_seg();
        }
        else{
             $fields['hr_turno_seg'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_ter()!=""){
            $fields['hr_turno_ter'] = $agenda_colaborador_padrao->gethr_turno_ter();
        }
        else{
             $fields['hr_turno_ter'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_qua()!=""){
            $fields['hr_turno_qua'] = $agenda_colaborador_padrao->gethr_turno_qua();
        }
        else{
             $fields['hr_turno_qua'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_qui()!=""){
            $fields['hr_turno_qui'] = $agenda_colaborador_padrao->gethr_turno_qui();
        }
        else{
             $fields['hr_turno_qui'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_sex()!=""){
            $fields['hr_turno_sex'] = $agenda_colaborador_padrao->gethr_turno_sex();
        }
        else{
             $fields['hr_turno_sex'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_sab()!=""){
            $fields['hr_turno_sab'] = $agenda_colaborador_padrao->gethr_turno_sab();
        }
        else{
             $fields['hr_turno_sab'] = "null";
        }
        
        
        if($agenda_colaborador_padrao->gethr_turno_dom_saida()!=""){
            $fields['hr_turno_dom_saida'] = $agenda_colaborador_padrao->gethr_turno_dom_saida();
        }
        else{
             $fields['hr_turno_dom_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_seg_saida()!=""){
            $fields['hr_turno_seg_saida'] = $agenda_colaborador_padrao->gethr_turno_seg_saida();
        }
        else{
             $fields['hr_turno_seg_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_ter_saida()!=""){
            $fields['hr_turno_ter_saida'] = $agenda_colaborador_padrao->gethr_turno_ter_saida();
        }
        else{
             $fields['hr_turno_ter_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_qua_saida()!=""){
            $fields['hr_turno_qua_saida'] = $agenda_colaborador_padrao->gethr_turno_qua_saida();
        }
        else{
             $fields['hr_turno_qua_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_qui_saida()!=""){
            $fields['hr_turno_qui_saida'] = $agenda_colaborador_padrao->gethr_turno_qui_saida();
        }
        else{
             $fields['hr_turno_qui_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_sex_saida()!=""){
            $fields['hr_turno_sex_saida'] = $agenda_colaborador_padrao->gethr_turno_sex_saida();
        }
        else{
             $fields['hr_turno_sex_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_turno_sab_saida()!=""){
            $fields['hr_turno_sab_saida'] = $agenda_colaborador_padrao->gethr_turno_sab_saida();
        }
        else{
             $fields['hr_turno_sab_saida'] = "null";
        }
        if($agenda_colaborador_padrao->gettipo_escala()!=""){
            $fields['tipo_escala'] = $agenda_colaborador_padrao->gettipo_escala();
        }
        else{
             $fields['tipo_escala'] = "null";
        }
        
        if($agenda_colaborador_padrao->gethr_intervalo_dom()!=""){
            $fields['hr_intervalo_dom'] = $agenda_colaborador_padrao->gethr_intervalo_dom();
        }
        else{
             $fields['hr_intervalo_dom'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_seg()!=""){
            $fields['hr_intervalo_seg'] = $agenda_colaborador_padrao->gethr_intervalo_seg();
        }
        else{
             $fields['hr_intervalo_seg'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_ter()!=""){
            $fields['hr_intervalo_ter'] = $agenda_colaborador_padrao->gethr_intervalo_ter();
        }
        else{
             $fields['hr_intervalo_ter'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_qua()!=""){
            $fields['hr_intervalo_qua'] = $agenda_colaborador_padrao->gethr_intervalo_qua();
        }
        else{
             $fields['hr_intervalo_qua'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_qui()!=""){
            $fields['hr_intervalo_qui'] = $agenda_colaborador_padrao->gethr_intervalo_qui();
        }
        else{
             $fields['hr_intervalo_qui'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_sex()!=""){
            $fields['hr_intervalo_sex'] = $agenda_colaborador_padrao->gethr_intervalo_sex();
        }
        else{
             $fields['hr_intervalo_sex'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_sab()!=""){
            $fields['hr_intervalo_sab'] = $agenda_colaborador_padrao->gethr_intervalo_sab();
        }
        else{
             $fields['hr_intervalo_sab'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_dom()!=""){
            $fields['hr_intervalo_saida_dom'] = $agenda_colaborador_padrao->gethr_intervalo_saida_dom();
        }
        else{
             $fields['hr_intervalo_saida_dom'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_seg()!=""){
            $fields['hr_intervalo_saida_seg'] = $agenda_colaborador_padrao->gethr_intervalo_saida_seg();
        }
        else{
             $fields['hr_intervalo_saida_seg'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_ter()!=""){
            $fields['hr_intervalo_saida_ter'] = $agenda_colaborador_padrao->gethr_intervalo_saida_ter();
        }
        else{
             $fields['hr_intervalo_saida_ter'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_qua()!=""){
            $fields['hr_intervalo_saida_qua'] = $agenda_colaborador_padrao->gethr_intervalo_saida_qua();
        }
        else{
             $fields['hr_intervalo_saida_qua'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_qui()!=""){
            $fields['hr_intervalo_saida_qui'] = $agenda_colaborador_padrao->gethr_intervalo_saida_qui();
        }
        else{
             $fields['hr_intervalo_saida_qui'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_sex()!=""){
            $fields['hr_intervalo_saida_sex'] = $agenda_colaborador_padrao->gethr_intervalo_saida_sex();
        }
        else{
             $fields['hr_intervalo_saida_sex'] = "null";
        }
        if($agenda_colaborador_padrao->gethr_intervalo_saida_sab()!=""){
            $fields['hr_intervalo_saida_sab'] = $agenda_colaborador_padrao->gethr_intervalo_saida_sab();
        }
        else{
             $fields['hr_intervalo_saida_sab'] = "null";
        }

        $fields['produtos_servicos_pk'] = $agenda_colaborador_padrao->getprodutos_servicos_pk();
        $fields['n_qtde_dias_semana'] = $agenda_colaborador_padrao->getn_qtde_dias_semana();
        $fields['turnos_pk'] = $agenda_colaborador_padrao->getturnos_pk();
        $fields['hr_inicio_expediente'] = $agenda_colaborador_padrao->gethr_inicio_expediente();
        $fields['hr_termino_expediente'] = $agenda_colaborador_padrao->gethr_termino_expediente();
        $fields['hr_saida_intervalo'] = $agenda_colaborador_padrao->gethr_saida_intervalo();
        $fields['hr_retorno_intervalo'] = $agenda_colaborador_padrao->gethr_retorno_intervalo();
        $fields['ic_preenchimento_automatico'] = $agenda_colaborador_padrao->getic_preenchimento_automatico();
        
        
        $fields['nao_repetir_proxima_semana_pk'] = $agenda_colaborador_padrao->getnao_repetir_proxima_semana_pk();
        
        $fields['ic_nao_repetir'] = $agenda_colaborador_padrao->getic_nao_repetir();
        $fields['ds_motivo_cancelamento'] = $agenda_colaborador_padrao->getds_motivo_cancelamento();
        
        if($agenda_colaborador_padrao->getdt_cancelamento()!=""){
            $fields['dt_cancelamento'] = DataYMD($agenda_colaborador_padrao->getdt_cancelamento());
        }
        
        //TURNOS DOM
        $fields["dt_ult_atualizacao"] = "sysdate()";
        $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];

        if($agenda_colaborador_padrao->getpk()  == ""){
            
            if($agenda_colaborador_padrao->getdom_turnos_pk()!=""){
                $fields['dom_turnos_pk'] = $agenda_colaborador_padrao->getdom_turnos_pk();
            }
            else{
                $fields['dom_turnos_pk'] = "null";
            }

            //TURNOS SEG
            if($agenda_colaborador_padrao->getseg_turnos_pk()!=""){
                $fields['seg_turnos_pk'] = $agenda_colaborador_padrao->getseg_turnos_pk();
            }
            else{
                $fields['seg_turnos_pk'] = "null";
            }

            //TURNOS TER
            if($agenda_colaborador_padrao->getter_turnos_pk()!=""){
                $fields['ter_turnos_pk'] = $agenda_colaborador_padrao->getter_turnos_pk();
            }
            else{
                $fields['ter_turnos_pk'] = "null";
            }

            //TURNOS QUA
            if($agenda_colaborador_padrao->getqua_turnos_pk()!=""){
                $fields['qua_turnos_pk'] = $agenda_colaborador_padrao->getqua_turnos_pk();
            }
            else{
                $fields['qua_turnos_pk'] = "null";
            }

            //TURNOS QUI
            if($agenda_colaborador_padrao->getqui_turnos_pk()!=""){
                $fields['qui_turnos_pk'] = $agenda_colaborador_padrao->getqui_turnos_pk();
            }
            else{
                $fields['qui_turnos_pk'] = "null";
            }

            //TURNOS SEX
            if($agenda_colaborador_padrao->getsex_turnos_pk()!=""){
                $fields['sex_turnos_pk'] = $agenda_colaborador_padrao->getsex_turnos_pk();
           }
            else{
                $fields['sex_turnos_pk'] = "null";
            }

            //TURNOS SAB
            if($agenda_colaborador_padrao->getsab_turnos_pk()!=""){
                $fields['sab_turnos_pk'] = $agenda_colaborador_padrao->getsab_turnos_pk();
            }
            else{
                $fields['sab_turnos_pk'] = "null";
            }

            $fields["dt_cadastro"] = "sysdate()";
            $fields["usuario_cadastro_pk"]   = $this->arrToken['usuarios_pk'];

            $pk = $this->db->execInsert("agenda_colaborador_padrao", $fields);
            return $pk;
        }
        else{

            if($agenda_colaborador_padrao->getdom_turnos_pk()!=""){
                $fields['dom_turnos_pk'] = $agenda_colaborador_padrao->getdom_turnos_pk();
            }
            else{
                $fields['dom_turnos_pk'] = "null";
            }

            //TURNOS SEG
            if($agenda_colaborador_padrao->getseg_turnos_pk()!=""){
                $fields['seg_turnos_pk'] = $agenda_colaborador_padrao->getseg_turnos_pk();
            }
            else{
                $fields['seg_turnos_pk'] = "null";
            }

            //TURNOS TER
            if($agenda_colaborador_padrao->getter_turnos_pk()!=""){
                $fields['ter_turnos_pk'] = $agenda_colaborador_padrao->getter_turnos_pk();
            }
            else{
                $fields['ter_turnos_pk'] = "null";
            }

            //TURNOS QUA
            if($agenda_colaborador_padrao->getqua_turnos_pk()!=""){
                $fields['qua_turnos_pk'] = $agenda_colaborador_padrao->getqua_turnos_pk();
            }
            else{
                $fields['qua_turnos_pk'] = "null";
            }

            //TURNOS QUI
            if($agenda_colaborador_padrao->getqui_turnos_pk()!=""){
                $fields['qui_turnos_pk'] = $agenda_colaborador_padrao->getqui_turnos_pk();
            }
            else{
                $fields['qui_turnos_pk'] = "null";
            }

            //TURNOS SEX
            if($agenda_colaborador_padrao->getsex_turnos_pk()!=""){
                $fields['sex_turnos_pk'] = $agenda_colaborador_padrao->getsex_turnos_pk();
           }
            else{
                $fields['sex_turnos_pk'] = "null";
            }

            //TURNOS SAB
            if($agenda_colaborador_padrao->getsab_turnos_pk()!=""){
                $fields['sab_turnos_pk'] = $agenda_colaborador_padrao->getsab_turnos_pk();
            }
            else{
                $fields['sab_turnos_pk'] = "null";
            }

            
            
            return $this->db->execUpdate("agenda_colaborador_padrao", $fields, " pk = ".$agenda_colaborador_padrao->getpk());
        }

    }

    public function excluir($agenda_colaborador_padrao){
        $this->db->execDelete("agenda_colaborador_padrao"," pk = ".$agenda_colaborador_padrao->getpk());
    }

    public function carregarPorPk($pk){

        $agenda_colaborador_padrao = new agenda_colaborador_padrao();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ds_agenda ";
        $sql.="       ,dt_inicio_agenda ";
        $sql.="       ,dt_fim_agenda ";
        $sql.="       ,colaboradores_pk ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_dom";
        $sql.="       ,ic_seg";
        $sql.="       ,ic_ter";
        $sql.="       ,ic_qua";
        $sql.="       ,ic_qui";
        $sql.="       ,ic_sex";
        $sql.="       ,ic_sab";
        $sql.="       ,dom_turnos_pk";
        $sql.="       ,seg_turnos_pk";
        $sql.="       ,ter_turnos_pk";
        $sql.="       ,qua_turnos_pk";
        $sql.="       ,qui_turnos_pk";
        $sql.="       ,sex_turnos_pk";
        $sql.="       ,sab_turnos_pk";
        $sql.="       ,hr_turno_dom";
        $sql.="       ,hr_turno_seg";
        $sql.="       ,hr_turno_ter";
        $sql.="       ,hr_turno_qua";
        $sql.="       ,hr_turno_qui";
        $sql.="       ,hr_turno_sex";
        $sql.="       ,hr_turno_sab";
        $sql.="       ,hr_turno_dom_saida";
        $sql.="       ,hr_turno_seg_saida";
        $sql.="       ,hr_turno_ter_saida";
        $sql.="       ,hr_turno_qua_saida";
        $sql.="       ,hr_turno_qui_saida";
        $sql.="       ,hr_turno_sex_saida";
        $sql.="       ,hr_turno_sab_saida";
        $sql.="       ,contratos_itens_pk";
        $sql.="       ,nao_repetir_proxima_semana_pk";
        $sql.="       ,ic_nao_repetir";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_motivo_cancelamento";
        $sql.="       ,tipo_escala";
        $sql.="       ,hr_intervalo_dom";
        $sql.="       ,hr_intervalo_seg";
        $sql.="       ,hr_intervalo_ter";
        $sql.="       ,hr_intervalo_qua";
        $sql.="       ,hr_intervalo_qui";
        $sql.="       ,hr_intervalo_sex";
        $sql.="       ,hr_intervalo_sab";
        $sql.="       ,hr_intervalo_saida_dom";
        $sql.="       ,hr_intervalo_saida_seg";
        $sql.="       ,hr_intervalo_saida_ter";
        $sql.="       ,hr_intervalo_saida_qua";
        $sql.="       ,hr_intervalo_saida_qui";
        $sql.="       ,hr_intervalo_saida_sex";
        $sql.="       ,hr_intervalo_saida_sab";
        $sql.="       ,produtos_servicos_pk";
        $sql.="       ,n_qtde_dias_semana";
        $sql.="       ,turnos_pk";
        $sql.="       ,hr_inicio_expediente";
        $sql.="       ,hr_termino_expediente";
        $sql.="       ,hr_saida_intervalo";
        $sql.="       ,hr_retorno_intervalo";
        $sql.="       ,ic_preenchimento_automatico";


        $sql.="  from agenda_colaborador_padrao ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $agenda_colaborador_padrao->setpk($query[$i]["pk"]);
                $agenda_colaborador_padrao->setdt_cadastro($query[$i]["dt_cadastro"]);
                $agenda_colaborador_padrao->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $agenda_colaborador_padrao->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $agenda_colaborador_padrao->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $agenda_colaborador_padrao->setds_agenda($query[$i]['ds_agenda']);
                $agenda_colaborador_padrao->setdt_inicio_agenda($query[$i]['dt_inicio_agenda']);
                $agenda_colaborador_padrao->setdt_fim_agenda($query[$i]['dt_fim_agenda']);
                $agenda_colaborador_padrao->setcolaboradores_pk($query[$i]['colaboradores_pk']);
                $agenda_colaborador_padrao->setprocessos_etapas_pk($query[$i]['processos_etapas_pk']);
                $agenda_colaborador_padrao->setic_dom($query[$i]['ic_dom']);
                $agenda_colaborador_padrao->setic_seg($query[$i]['ic_seg']);
                $agenda_colaborador_padrao->setic_ter($query[$i]['ic_ter']);
                $agenda_colaborador_padrao->setic_qua($query[$i]['ic_qua']);
                $agenda_colaborador_padrao->setic_qui($query[$i]['ic_qui']);
                $agenda_colaborador_padrao->setic_sex($query[$i]['ic_sex']);
                $agenda_colaborador_padrao->setic_sab($query[$i]['ic_sab']);
                $agenda_colaborador_padrao->setdom_turnos_pk($query[$i]['dom_turnos_pk']);
                $agenda_colaborador_padrao->setseg_turnos_pk($query[$i]['seg_turnos_pk']);
                $agenda_colaborador_padrao->setter_turnos_pk($query[$i]['ter_turnos_pk']);
                $agenda_colaborador_padrao->setqua_turnos_pk($query[$i]['qua_turnos_pk']);
                $agenda_colaborador_padrao->setqui_turnos_pk($query[$i]['qui_turnos_pk']);
                $agenda_colaborador_padrao->setsex_turnos_pk($query[$i]['sex_turnos_pk']);
                $agenda_colaborador_padrao->setsab_turnos_pk($query[$i]['sab_turnos_pk']);
                $agenda_colaborador_padrao->setcontratos_itens_pk($query[$i]['contratos_itens_pk']);
                $agenda_colaborador_padrao->setnao_repetir_proxima_semana_pk($query[$i]['nao_repetir_proxima_semana_pk']);
                $agenda_colaborador_padrao->setic_nao_repetir($query[$i]['ic_nao_repetir']);
                $agenda_colaborador_padrao->settipo_escala($query[$i]['tipo_escala']);
                $agenda_colaborador_padrao->sethr_intervalo_dom($query[$i]['hr_intervalo_dom']);
                $agenda_colaborador_padrao->sethr_intervalo_seg($query[$i]['hr_intervalo_seg']);
                $agenda_colaborador_padrao->sethr_intervalo_ter($query[$i]['hr_intervalo_ter']);
                $agenda_colaborador_padrao->sethr_intervalo_qua($query[$i]['hr_intervalo_qua']);
                $agenda_colaborador_padrao->sethr_intervalo_qui($query[$i]['hr_intervalo_qui']);
                $agenda_colaborador_padrao->sethr_intervalo_sex($query[$i]['hr_intervalo_sex']);
                $agenda_colaborador_padrao->sethr_intervalo_sab($query[$i]['hr_intervalo_sab']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_dom($query[$i]['hr_intervalo_saida_dom']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_seg($query[$i]['hr_intervalo_saida_seg']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_ter($query[$i]['hr_intervalo_saida_ter']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_qua($query[$i]['hr_intervalo_saida_qua']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_qui($query[$i]['hr_intervalo_saida_qui']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_sex($query[$i]['hr_intervalo_saida_sex']);
                $agenda_colaborador_padrao->sethr_intervalo_saida_sab($query[$i]['hr_intervalo_saida_sab']);

            }
        }
        return $agenda_colaborador_padrao;
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_agenda ";
        $sql.="       ,dt_inicio_agenda ";
        $sql.="       ,dt_fim_agenda ";
        $sql.="       ,colaboradores_pk ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_dom";
        $sql.="       ,ic_seg";
        $sql.="       ,ic_ter";
        $sql.="       ,ic_qua";
        $sql.="       ,ic_qui";
        $sql.="       ,ic_sex";
        $sql.="       ,ic_sab";
        $sql.="       ,dom_turnos_pk";
        $sql.="       ,seg_turnos_pk";
        $sql.="       ,ter_turnos_pk";
        $sql.="       ,qua_turnos_pk";
        $sql.="       ,qui_turnos_pk";
        $sql.="       ,sex_turnos_pk";
        $sql.="       ,sab_turnos_pk";
        $sql.="       ,hr_turno_dom";
        $sql.="       ,hr_turno_seg";
        $sql.="       ,hr_turno_ter";
        $sql.="       ,hr_turno_qua";
        $sql.="       ,hr_turno_qui";
        $sql.="       ,hr_turno_sex";
        $sql.="       ,hr_turno_sab";
        $sql.="       ,hr_turno_dom_saida";
        $sql.="       ,hr_turno_seg_saida";
        $sql.="       ,hr_turno_ter_saida";
        $sql.="       ,hr_turno_qua_saida";
        $sql.="       ,hr_turno_qui_saida";
        $sql.="       ,hr_turno_sex_saida";
        $sql.="       ,hr_turno_sab_saida";
        $sql.="       ,contratos_itens_pk";
        $sql.="       ,nao_repetir_proxima_semana_pk";
        $sql.="       ,ic_nao_repetir";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_motivo_cancelamento";
        $sql.="       ,tipo_escala";
        $sql.="       ,hr_intervalo_dom";
        $sql.="       ,hr_intervalo_seg";
        $sql.="       ,hr_intervalo_ter";
        $sql.="       ,hr_intervalo_qua";
        $sql.="       ,hr_intervalo_qui";
        $sql.="       ,hr_intervalo_sex";
        $sql.="       ,hr_intervalo_sab";
        $sql.="       ,hr_intervalo_saida_dom";
        $sql.="       ,hr_intervalo_saida_seg";
        $sql.="       ,hr_intervalo_saida_ter";
        $sql.="       ,hr_intervalo_saida_qua";
        $sql.="       ,hr_intervalo_saida_qui";
        $sql.="       ,hr_intervalo_saida_sex";
        $sql.="       ,hr_intervalo_saida_sab";
        
        $sql.="       ,produtos_servicos_pk";
        $sql.="       ,n_qtde_dias_semana";
        $sql.="       ,turnos_pk";
        $sql.="       ,hr_inicio_expediente";
        $sql.="       ,hr_termino_expediente";
        $sql.="       ,hr_saida_intervalo";
        $sql.="       ,hr_retorno_intervalo";
        $sql.="       ,ic_preenchimento_automatico";

        $sql.="  from agenda_colaborador_padrao ";
        $sql.=" where pk = $pk ";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listarAgendaPorContratosPk($contratos_pk){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk  ";
        $sql.="       ,a.ds_agenda ";
        $sql.="       ,a.dt_inicio_agenda ";
        $sql.="       ,a.dt_fim_agenda ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,a.tipo_escala";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";

        $sql.="  from agenda_colaborador_padrao a";
        $sql.="       left join contratos_itens ci on ci.pk = a.contratos_itens_pk";
        $sql.="       left join contratos c on c.pk = ci.contratos_pk";
        
        $sql.=" where c.pk = $contratos_pk ";
     
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listar_por_ds_agenda($ds_agenda){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_agenda ";
        $sql.="       ,dt_inicio_agenda ";
        $sql.="       ,dt_fim_agenda ";
        $sql.="       ,colaboradores_pk ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_dom";
        $sql.="       ,ic_seg";
        $sql.="       ,ic_ter";
        $sql.="       ,ic_qua";
        $sql.="       ,ic_qui";
        $sql.="       ,ic_sex";
        $sql.="       ,ic_sab";
        $sql.="       ,dom_turnos_pk";
        $sql.="       ,seg_turnos_pk";
        $sql.="       ,ter_turnos_pk";
        $sql.="       ,qua_turnos_pk";
        $sql.="       ,qui_turnos_pk";
        $sql.="       ,sex_turnos_pk";
        $sql.="       ,sab_turnos_pk";
        $sql.="       ,contratos_itens_pk";
        $sql.="       ,hr_turno_dom";
        $sql.="       ,hr_turno_seg";
        $sql.="       ,hr_turno_ter";
        $sql.="       ,hr_turno_qua";
        $sql.="       ,hr_turno_qui";
        $sql.="       ,hr_turno_sex";
        $sql.="       ,hr_turno_sab";
        $sql.="       ,hr_turno_dom_saida";
        $sql.="       ,hr_turno_seg_saida";
        $sql.="       ,hr_turno_ter_saida";
        $sql.="       ,hr_turno_qua_saida";
        $sql.="       ,hr_turno_qui_saida";
        $sql.="       ,hr_turno_sex_saida";
        $sql.="       ,hr_turno_sab_saida";
        $sql.="       ,nao_repetir_proxima_semana_pk";
        $sql.="       ,ic_nao_repetir";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_motivo_cancelamento";
        $sql.="       ,tipo_escala";
        $sql.="       ,hr_intervalo_dom";
        $sql.="       ,hr_intervalo_seg";
        $sql.="       ,hr_intervalo_ter";
        $sql.="       ,hr_intervalo_qua";
        $sql.="       ,hr_intervalo_qui";
        $sql.="       ,hr_intervalo_sex";
        $sql.="       ,hr_intervalo_sab";
        $sql.="       ,hr_intervalo_saida_dom";
        $sql.="       ,hr_intervalo_saida_seg";
        $sql.="       ,hr_intervalo_saida_ter";
        $sql.="       ,hr_intervalo_saida_qua";
        $sql.="       ,hr_intervalo_saida_qui";
        $sql.="       ,hr_intervalo_saida_sex";
        $sql.="       ,hr_intervalo_saida_sab";
        
        $sql.="       ,produtos_servicos_pk";
        $sql.="       ,n_qtde_dias_semana";
        $sql.="       ,turnos_pk";
        $sql.="       ,hr_inicio_expediente";
        $sql.="       ,hr_termino_expediente";
        $sql.="       ,hr_saida_intervalo";
        $sql.="       ,hr_retorno_intervalo";
        $sql.="       ,ic_preenchimento_automatico";
        
        $sql.="  from agenda_colaborador_padrao ";
        $sql.=" where 1=1 ";
        if($ds_agenda != ""){
            $sql.=" and ds_agenda_colaborador_padrao like '%".$ds_agenda."%' ";
        }
        $sql.=" order by ds_agenda asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_agenda ";
        $sql.="       ,dt_inicio_agenda ";
        $sql.="       ,dt_fim_agenda ";
        $sql.="       ,colaboradores_pk ";
        $sql.="       ,processos_etapas_pk ";
        $sql.="       ,ic_dom";
        $sql.="       ,ic_seg";
        $sql.="       ,ic_ter";
        $sql.="       ,ic_qua";
        $sql.="       ,ic_qui";
        $sql.="       ,ic_sex";
        $sql.="       ,ic_sab";
        $sql.="       ,dom_turnos_pk";
        $sql.="       ,seg_turnos_pk";
        $sql.="       ,ter_turnos_pk";
        $sql.="       ,qua_turnos_pk";
        $sql.="       ,qui_turnos_pk";
        $sql.="       ,sex_turnos_pk";
        $sql.="       ,sab_turnos_pk";
        $sql.="       ,hr_turno_dom";
        $sql.="       ,hr_turno_seg";
        $sql.="       ,hr_turno_ter";
        $sql.="       ,hr_turno_qua";
        $sql.="       ,hr_turno_qui";
        $sql.="       ,hr_turno_sex";
        $sql.="       ,hr_turno_sab";
        $sql.="       ,hr_turno_dom_saida";
        $sql.="       ,hr_turno_seg_saida";
        $sql.="       ,hr_turno_ter_saida";
        $sql.="       ,hr_turno_qua_saida";
        $sql.="       ,hr_turno_qui_saida";
        $sql.="       ,hr_turno_sex_saida";
        $sql.="       ,hr_turno_sab_saida";
        $sql.="       ,contratos_itens_pk";
        $sql.="       ,nao_repetir_proxima_semana_pk";
        $sql.="       ,ic_nao_repetir";
        $sql.="       ,dt_cancelamento";
        $sql.="       ,ds_motivo_cancelamento";
        $sql.="       ,tipo_escala";
        $sql.="       ,hr_intervalo_dom";
        $sql.="       ,hr_intervalo_seg";
        $sql.="       ,hr_intervalo_ter";
        $sql.="       ,hr_intervalo_qua";
        $sql.="       ,hr_intervalo_qui";
        $sql.="       ,hr_intervalo_sex";
        $sql.="       ,hr_intervalo_sab";
        $sql.="       ,hr_intervalo_saida_dom";
        $sql.="       ,hr_intervalo_saida_seg";
        $sql.="       ,hr_intervalo_saida_ter";
        $sql.="       ,hr_intervalo_saida_qua";
        $sql.="       ,hr_intervalo_saida_qui";
        $sql.="       ,hr_intervalo_saida_sex";
        $sql.="       ,hr_intervalo_saida_sab";

        $sql.="  from agenda_colaborador_padrao ";
        $sql.=" where 1=1 ";
        $sql.=" order by ds_agenda asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listar_agenda_colaborador_lead_processo($leads_pk,$processos_pk,$colaborador_pk,$leads_pk_pesq,$colaborador_pk_pesq_agenda,$dt_periodo_ini_agenda_pesq,$dt_periodo_fim_agenda_pesq,$escala_pesq_agenda,$tipo_escala_pesq_agenda,$produtos_pesq_agenda,$ic_status_pesq_agenda){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.ds_re";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.ic_folga_inverter";
        
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";        
        
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,ps.pk produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,case a.tipo_escala when 1 then 'Impar' when 2 then 'Par' end ds_tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";
        $sql.="       ,date_format(a.dt_cancelamento,'%d/%m/%Y')dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,p.leads_pk";
        $sql.="       ,p.pk processos_pk";
        //$sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        $sql.="       ,l.ds_lead";
        $sql.="       ,ci.n_qtde_dias_semana";
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join leads l on l.pk = p.leads_pk";
        $sql.="       inner join contratos_itens ci on a.contratos_itens_pk = ci.pk";
        $sql.="       inner join contratos ct on ci.contratos_pk = ct.pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($leads_pk_pesq!=""){
            $sql.=" and p.leads_pk=".$leads_pk_pesq;
        }
        if($colaborador_pk_pesq_agenda!=""){
            $sql.=" and a.colaboradores_pk=".$colaborador_pk_pesq_agenda;
        }
        if($escala_pesq_agenda!=""){
            $sql.=" and ci.n_qtde_dias_semana='".$escala_pesq_agenda."'";
        }
        if($tipo_escala_pesq_agenda!=""){
            $sql.=" and a.tipo_escala=".$tipo_escala_pesq_agenda;
        }
        if($produtos_pesq_agenda!=""){
            $sql.=" and ps.pk =".$produtos_pesq_agenda;
        }
        if($ic_status_pesq_agenda!=""){
            if($ic_status_pesq_agenda==1){
                $sql.=" and a.dt_cancelamento is null"; 
            }
            if($ic_status_pesq_agenda==2){
                $sql.=" and a.dt_cancelamento is not null"; 
            }
            
        }
        
        
        if($dt_periodo_ini_agenda_pesq!=""){
            $sql.=" AND a.dt_inicio_agenda <= '".DataYMD($dt_periodo_ini_agenda_pesq)."'";
            $sql.=" AND a.dt_fim_agenda >= '".DataYMD($dt_periodo_fim_agenda_pesq)."'";
        }
        
        
        
        
        
        
        if($processos_pk!=""){
            $sql.=" and p.pk=".$processos_pk;
        }
        if($colaborador_pk_pesq_agenda!=""){
            $sql.=" and a.colaboradores_pk=".$colaborador_pk_pesq_agenda;
        }
        if($colaborador_pk!=""){
            $sql.=" and a.colaboradores_pk=".$colaborador_pk;
        }
        $sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa = a.dt_inicio_agenda and acp.dt_fim_pausa = a.dt_fim_agenda and acp.colaboradores_pk = c.pk)";
        $sql.=" order by a.dt_inicio_agenda asc ";
      
        $query = $this->db->execQuery($sql);
        
        return $query;

    }
    
    public function listar_agenda_colaborador($leads_pk,$processos_pk,$qtde_dias_contrato,$contratos_pk){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($processos_pk!=""){
            $sql.=" and p.pk=".$processos_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and a.contratos_itens_pk=".$contratos_pk;
        }
        $sql.=" group by a.pk";
        /*if($qtde_dias_contrato!=""){
            $sql.="  having SUM(case a.ic_dom when 1 then 1 ELSE 0 END + case a.ic_seg when 1 then 1 ELSE 0 END + case a.ic_ter when 1 then 1 ELSE 0 end + case a.ic_qua when 1 then 1 ELSE 0 end + case a.ic_qui when 1 then 1 ELSE 0 end + case a.ic_sex when 1 then 1 ELSE 0 end + case a.ic_sab when 1 then 1 ELSE 0 end) = ".$qtde_dias_contrato;
        }*/
        $sql.=" order by c.ds_colaborador, a.dt_inicio_agenda asc ";
     
     
        $query = $this->db->execQuery($sql);
        
        return $query;

    }
    public function verificarQtdeContratoPorProduto($produtos_servicos_pk,$contratos_pk){

        $sql ="";
        $sql.="select ci.n_qtde";
        $sql.="  from contratos_itens ci";
        $sql.=" where 1=1 ";
        if($produtos_servicos_pk!=""){
            $sql.=" and ci.produtos_servicos_pk=".$produtos_servicos_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and ci.contratos_pk =".$contratos_pk;
        }
     
     
        $query = $this->db->execQuery($sql);
        
        return $query;

    }
    public function verificarQtdeEscalaPorProduto($produtos_servicos_pk,$contratos_pk){

        $sql ="";
        $sql.="select count(0)qtde_escala";
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="  inner join contratos_itens ci on a.contratos_itens_pk = ci.pk";
        $sql.=" where 1=1 ";
        if($produtos_servicos_pk!=""){
            $sql.=" and ci.produtos_servicos_pk=".$produtos_servicos_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and ci.contratos_pk =".$contratos_pk;
        }
       
     
        $query = $this->db->execQuery($sql);
        
        return $query;

    }
    public function rel_listar_agenda_colaborador_data($leads_pk,$dt_base,$produtos_servicos_pk,$qtde_dias_contrato,$dia_semana){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,ps.ds_produto_servico ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps ON c.pk = cps.colaboradores_pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join contratos_itens ci on a.contratos_itens_pk = ci.pk";
        $sql.="       inner join contratos ct on ci.contratos_pk = ct.pk";
        $sql.="       inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.=" where 1=1 ";
        $sql.=" AND a.dt_inicio_agenda <= '".DataYMD($dt_base)."'";
        $sql.=" AND a.dt_fim_agenda >= '".DataYMD($dt_base)."'";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        $sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa ='".DataYMD($dt_base)."')";
        if($produtos_servicos_pk!=""){
            $sql.=" and ps.pk = ".$produtos_servicos_pk;
        }
        if($qtde_dias_contrato == 7){
            $sql.="  group by a.pk";
            $sql.="  having SUM(case a.ic_dom when 1 then 1 ELSE 0 END + case a.ic_seg when 1 then 1 ELSE 0 END + case a.ic_ter when 1 then 1 ELSE 0 end + case a.ic_qua when 1 then 1 ELSE 0 end + case a.ic_qui when 1 then 1 ELSE 0 end + case a.ic_sex when 1 then 1 ELSE 0 end + case a.ic_sab when 1 then 1 ELSE 0 end) >= ".$qtde_dias_contrato;
        }
        
        if($dia_semana==0){
            $sql.=" and a.ic_dom =1";
        }
        else if($dia_semana==1){
            $sql.=" and a.ic_seg =1";
        }
        else if($dia_semana==2){
            $sql.=" and a.ic_ter =1";
        }
        else if($dia_semana==3){
            
            $sql.=" and a.ic_qua =1";
        }
        else if($dia_semana==4){
            $sql.=" and a.ic_qui =1";
        }
        else if($dia_semana==5){
            $sql.=" and a.ic_sex =1";
        }
        else if($dia_semana==6){
            $sql.=" and a.ic_sab =1";
        }
        $sql.=" order by c.ds_colaborador, a.dt_inicio_agenda asc ";
       
   
        $query = $this->db->execQuery($sql);
        
        return $query;

    }
    public function listar_qtde_itens_profissionais_contratados($leads_pk,$contratos_pk){
        
        $sql ="";
        $sql.="select   ps.ds_produto_servico,";
        $sql.="         ci.pk contratos_itens_pk,";
        $sql.="         c.pk contratos_pk,";
        $sql.="         ci.n_qtde_dias_semana,";
        $sql.="         ps.pk produtos_itens_pk,";
        $sql.="         (select sum(ci.n_qtde) from contratos_itens ci  inner join contratos ct on ct.pk = ci.contratos_pk INNER JOIN processos_etapas pes ON pes.pk = ct.processos_etapas_pk  inner join processos pse on pes.processos_pk = pse.pk where ps.pk = ci.produtos_servicos_pk  and c.pk = ci.contratos_pk and  pse.leads_pk=$leads_pk) qtde_contratado";
        $sql.="    from leads l";
        $sql.="         inner join processos p on p.leads_pk = l.pk";
        $sql.="         inner join processos_etapas pe on pe.processos_pk = p.pk";
        $sql.="         inner join contratos c on c.processos_etapas_pk = pe.pk";
        $sql.="         inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="         inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";                     
        $sql.="   where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and l.pk=".$leads_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and c.pk=".$contratos_pk;
        }
        $sql.=" order by ps.ds_produto_servico "; 
        
      
       
        

        $query = $this->db->execQuery($sql);
        return $query;

    }  
    public function listar_qtde_itens_profissionais_contratados_servicos($leads_pk,$contratos_pk,$produtos_servicos_pk){
        
        $sql ="";
        $sql.="select   ps.ds_produto_servico,";
        $sql.="         ci.pk contratos_itens_pk,";
        $sql.="         c.pk contratos_pk,";
        $sql.="         ci.n_qtde_dias_semana,";
        $sql.="         ps.pk produtos_itens_pk,";
        $sql.="         (select sum(ci.n_qtde) from contratos_itens ci  inner join contratos ct on ct.pk = ci.contratos_pk INNER JOIN processos_etapas pes ON pes.pk = ct.processos_etapas_pk  inner join processos pse on pes.processos_pk = pse.pk where ps.pk = ci.produtos_servicos_pk  and c.pk = ci.contratos_pk and  pse.leads_pk=$leads_pk) qtde_contratado";
        $sql.="    from leads l";
        $sql.="         inner join processos p on p.leads_pk = l.pk";
        $sql.="         inner join processos_etapas pe on pe.processos_pk = p.pk";
        $sql.="         inner join contratos c on c.processos_etapas_pk = pe.pk";
        $sql.="         inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="         inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";                     
        $sql.="   where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and l.pk=".$leads_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and c.pk=".$contratos_pk;
        }
        if($produtos_servicos_pk!=""){
            $sql.=" and ps.pk=".$produtos_servicos_pk;
        }
        $sql.=" order by ps.ds_produto_servico "; 
 
        $query = $this->db->execQuery($sql);
        return $query;

    }  
    
    public function listar_profissionais_qtde_dia($leads_pk,$contratos_itens_pk,$qtde_dia_semana,$contratos_itens_pk){
        
        $sql ="";
        $sql.=" SELECT COUNT(DISTINCT c.pk)qtde_profissionais";
        $sql.="   FROM agenda_colaborador_padrao acp";
        $sql.="        INNER JOIN colaboradores c ON acp.colaboradores_pk = c.pk";
        $sql.="        INNER JOIN contratos_itens ci on acp.contratos_itens_pk = ci.pk";
        $sql.="        INNER JOIN colaboradores_produtos_servicos cps ON c.pk = cps.colaboradores_pk";
        $sql.="        INNER JOIN processos_etapas pes ON pes.pk = acp.processos_etapas_pk";
        $sql.="        INNER JOIN processos pse ON pes.processos_pk = pse.pk";
        $sql.="  WHERE pse.leads_pk =".$leads_pk;
        if($contratos_itens_pk!=""){
            $sql.=" and acp.contratos_itens_pk = ".$contratos_itens_pk;
        }
	$sql.="        group by acp.pk";
        if($qtde_dia_semana!=""){
            $sql.="        having SUM(CASE acp.ic_dom";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_seg";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_ter";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_qua";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_qui";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_sex";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_sab";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END)=".$qtde_dia_semana;
        }
        $sql.="      order by c.pk";      

        $query = $this->db->execQuery($sql);
        return $query;

    }    
    public function listar_profissionais_qtde_dia_servico($leads_pk,$contratos_itens_pk,$qtde_dia_semana,$produtos_servicos_pk){
        
        $sql ="";
        $sql.=" SELECT COUNT(DISTINCT c.pk)qtde_profissionais";
        $sql.="   FROM agenda_colaborador_padrao acp";
        $sql.="        INNER JOIN colaboradores c ON acp.colaboradores_pk = c.pk";
        $sql.="        INNER JOIN contratos_itens ci on acp.contratos_itens_pk = ci.pk";
        $sql.="         inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk"; 
        $sql.="        INNER JOIN colaboradores_produtos_servicos cps ON c.pk = cps.colaboradores_pk";
        $sql.="        INNER JOIN processos_etapas pes ON pes.pk = acp.processos_etapas_pk";
        $sql.="        INNER JOIN processos pse ON pes.processos_pk = pse.pk";
        $sql.="  WHERE pse.leads_pk =".$leads_pk;
        if($produtos_servicos_pk!=""){
            $sql.=" and ps.pk = ".$produtos_servicos_pk;
        }
	$sql.="        group by acp.pk";
        /*if($qtde_dia_semana!=""){
            $sql.="        having SUM(CASE acp.ic_dom";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_seg";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_ter";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_qua";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_qui";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_sex";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_sab";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END)=".$qtde_dia_semana;
        }*/
        $sql.="      order by c.pk";      

        $query = $this->db->execQuery($sql);
        return $query;

    }    
    public function listar_qtde_itens_profissionais_contratados_data($leads_pk,$dt_agenda_inicio,$dt_agenda_fim,$contratos_pk){
        
        $sql ="";
        $sql.="select   ps.ds_produto_servico,";
        $sql.="         (select sum(ci.n_qtde) from contratos_itens ci  inner join contratos ct on ct.pk = ci.contratos_pk INNER JOIN processos_etapas pes ON pes.pk = ct.processos_etapas_pk  inner join processos pse on pes.processos_pk = pse.pk where ci.produtos_servicos_pk = ps.pk and  pse.leads_pk=$leads_pk";
        if($contratos_pk!=""){
             $sql.=" and ct.pk=".$contratos_pk;
        }
        $sql.=" ) qtde_contratado,";
        
        
        
        $sql.="         (SELECT  count( DISTINCT c.pk) FROM agenda_colaborador_padrao acp  inner join colaboradores c on acp.colaboradores_pk = c.pk  inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk inner join processos_etapas pes ON pes.pk = acp.processos_etapas_pk INNER JOIN contratos ct1 ON ct1.processos_etapas_pk = pes.pk inner join processos pse on pes.processos_pk = pse.pk WHERE cps.produtos_servicos_pk= ps.pk and  pse.leads_pk=$leads_pk";
        if($contratos_pk!=""){
             $sql.=" and ct1.pk=".$contratos_pk;
        }
        $sql.=")qtde_profissional";
        
        
        
        //$sql.="        ((select sum(ci.n_qtde) from contratos_itens ci  inner join contratos ct on ct.pk = ci.contratos_pk INNER JOIN processos_etapas pes ON pes.pk = ct.processos_etapas_pk  inner join processos pse on pes.processos_pk = pse.pk where ci.produtos_servicos_pk = ps.pk and  pse.leads_pk=$leads_pk) - (SELECT  count( DISTINCT c.pk) FROM agenda_colaborador_padrao acp  inner join colaboradores c on acp.colaboradores_pk = c.pk  inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk inner join processos_etapas pes ON pes.pk = acp.processos_etapas_pk inner join processos pse on pes.processos_pk = pse.pk WHERE cps.produtos_servicos_pk= ps.pk and  pse.leads_pk=$leads_pk))diferenca";
        $sql.="    from leads l";
        $sql.="         inner join processos p on p.leads_pk = l.pk";
        $sql.="         inner join processos_etapas pe on pe.processos_pk = p.pk";
        $sql.="         inner join contratos c on c.processos_etapas_pk = pe.pk";
        $sql.="         inner join contratos_itens ci on ci.contratos_pk = c.pk";
        $sql.="         inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";                     
        $sql.="   where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and l.pk=".$leads_pk;
        }
        if($contratos_pk!=""){
            $sql.=" and c.pk=".$contratos_pk;
        }
        if($dt_agenda_inicio!=""){
            $sql.=" and '".DataYMD($dt_agenda_inicio)."' and '".DataYMD($dt_agenda_fim)."' between c.dt_inicio_contrato and c.dt_fim_contrato";
            
        }
        
        $sql.=" group by ps.ds_produto_servico";
        
     
        
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    public function listar_agenda_colaborador_lead_data($leads_pk,$dt_agenda,$dt_agenda_fim){

              

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";

        
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,')')ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        //$sql.="       ,date_format(acp1.dt_inicio_pausa,'%d/%m/%Y') dt_inicio_pausa";
        //$sql.="       ,date_format(acp1.dt_fim_pausa,'%d/%m/%Y') dt_fim_pausa";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        $sql.="  from agenda_colaborador_padrao a ";
        //$sql.="       left join agenda_colaborador_pausa acp1 on a.colaboradores_pk = acp1.colaboradores_pk";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($dt_agenda!=""){
            $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda ";
        }
        /*$sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa >= '".DataYMD($dt_agenda)."'";
        $sql.=" and acp.dt_fim_pausa <= '".DataYMD($dt_agenda_fim)."'";
        $sql.=" and (acp.turnos_pk = t_dom.pk ";
        $sql.=" or acp.turnos_pk = t_seg.pk";
        $sql.=" or acp.turnos_pk = t_ter.pk";
            
        $sql.=" or acp.turnos_pk = t_qua.pk";
        $sql.=" or acp.turnos_pk = t_qui.pk";
        $sql.=" or acp.turnos_pk = t_sex.pk";
        $sql.=" or acp.turnos_pk = t_sab.pk)";
        
        $sql.=")";*/
        $sql.=" order by a.dt_inicio_agenda,c.ds_colaborador asc "; 

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarAgendaLeadDataGrid($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";
        $sql.="       ,a.ic_folga_inverter";
        
        
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";        
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,ci.n_qtde_dias_semana";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";
        
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,')')ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        //$sql.="       ,date_format(acp1.dt_inicio_pausa,'%d/%m/%Y') dt_inicio_pausa";
        //$sql.="       ,date_format(acp1.dt_fim_pausa,'%d/%m/%Y') dt_fim_pausa";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        $sql.="  from agenda_colaborador_padrao a ";
        //$sql.="       left join agenda_colaborador_pausa acp1 on a.colaboradores_pk = acp1.colaboradores_pk";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($dt_agenda!=""){
            $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        /*if($dt_agenda!=""){
            $sql.=" and a.dt_inicio_agenda >='".DataYMD($dt_agenda)."' ";
            $sql.=" and a.dt_fim_agenda  >='".DataYMD($dt_agenda_fim)."' or a.dt_fim_agenda  <='".DataYMD($dt_agenda_fim)."'";
        }*/

        $sql.=" group by c.pk"; 
        $sql.=" order by l.ds_lead asc "; 
        //echo $sql."<br>";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function relatorioEscalaServicoDia($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk,$turnos_pk,$dia_semana){
        
        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";
        $sql.="       ,a.ic_folga_inverter";
        
        
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";        
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        $sql.="       ,l.pk leads_pk";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,c.ds_re";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        //$sql.="       ,date_format(acp1.dt_inicio_pausa,'%d/%m/%Y') dt_inicio_pausa";
        //$sql.="       ,date_format(acp1.dt_fim_pausa,'%d/%m/%Y') dt_fim_pausa";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        $sql.="  from agenda_colaborador_padrao a ";
        //$sql.="       left join agenda_colaborador_pausa acp1 on a.colaboradores_pk = acp1.colaboradores_pk";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($dia_semana==0){
            $sql.=" and a.ic_dom = 1";
            if($turnos_pk!=""){
                $sql.=" and a.dom_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==1){
            $sql.=" and a.ic_seg = 1";
            if($turnos_pk!=""){
                $sql.=" and a.seg_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==2){
            $sql.=" and a.ic_ter = 1";
            if($turnos_pk!=""){
                $sql.=" and a.ter_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==3){
            $sql.=" and a.ic_qua = 1";
            if($turnos_pk!=""){
                $sql.=" and a.qua_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==4){
            $sql.=" and a.ic_qui = 1";
            if($turnos_pk!=""){
                $sql.=" and a.qui_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==5){
            $sql.=" and a.ic_sex = 1";
            if($turnos_pk!=""){
                $sql.=" and a.sex_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==6){
            $sql.=" and a.ic_sab = 1";
            if($turnos_pk!=""){
                $sql.=" and a.sab_turnos_pk = ".$turnos_pk;
            }
        }
        if($dt_agenda!=""){
            $sql.=" and ('".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda)";
        }

        //$sql.=" group by c.pk"; 
        //$sql.=" order by l.ds_leadasc "; 
        $sql.=" order by c.ds_colaborador asc "; 
      
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function relatorioEscalaServicoDiaGrid($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk,$turnos_pk,$dia_semana){
        
        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";
        $sql.="       ,a.ic_folga_inverter";
        
        
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";        
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";
 
        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        $sql.="       ,l.pk leads_pk";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,c.ds_re";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        //$sql.="       ,date_format(acp1.dt_inicio_pausa,'%d/%m/%Y') dt_inicio_pausa";
        //$sql.="       ,date_format(acp1.dt_fim_pausa,'%d/%m/%Y') dt_fim_pausa";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        $sql.="  from agenda_colaborador_padrao a ";
        //$sql.="       left join agenda_colaborador_pausa acp1 on a.colaboradores_pk = acp1.colaboradores_pk";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($dia_semana==0){
            //$sql.=" and a.ic_dom = 1";
            if($turnos_pk!=""){
                $sql.=" and a.dom_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==1){
            //$sql.=" and a.ic_seg = 1";
            if($turnos_pk!=""){
                $sql.=" and a.seg_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==2){
            //$sql.=" and a.ic_ter = 1";
            if($turnos_pk!=""){
                $sql.=" and a.ter_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==3){
            //$sql.=" and a.ic_qua = 1";
            if($turnos_pk!=""){
                $sql.=" and a.qua_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==4){
            //$sql.=" and a.ic_qui = 1";
            if($turnos_pk!=""){
                $sql.=" and a.qui_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==5){
            //$sql.=" and a.ic_sex = 1";
            if($turnos_pk!=""){
                $sql.=" and a.sex_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==6){
            //$sql.=" and a.ic_sab = 1";
            if($turnos_pk!=""){
                $sql.=" and a.sab_turnos_pk = ".$turnos_pk;
            }
        }
        if($dt_agenda!=""){
            $sql.=" and ('".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda)";
        }

        //$sql.=" group by c.pk"; 
        //$sql.=" order by l.ds_lead ,c.ds_colaborador asc "; 
        $sql.=" and a.dt_cancelamento is null"; 
        $sql.=" and c.ic_status= 1 "; 
        $sql.=" order by c.ds_colaborador asc "; 
      
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function relatorioFalta($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk,$turnos_pk,$dia_semana){
        
        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";
        $sql.="       ,a.ic_folga_inverter";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";        
        $sql.="       ,a.tipo_escala";   
        
        $sql.="       ,c.ds_colaborador ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        $sql.="       ,l.pk leads_pk";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,c.ds_re";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($dt_agenda!=""){
            $sql.=" and ('".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda)";
        }
        
        $sql.=" and a.dt_cancelamento is null"; 
        $sql.=" and c.ic_status= 1 "; 
        $sql.=" order by c.ds_colaborador asc "; 
       
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function EscalaServicoDiaGridParaRelatorioFalta($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk,$turnos_pk,$dia_semana){
        
        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";
        $sql.="       ,a.ic_folga_inverter";
        $sql.="       ,a.tipo_escala";
        
        
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";        
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        $sql.="       ,l.pk leads_pk";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,c.ds_re";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        //$sql.="       ,date_format(acp1.dt_inicio_pausa,'%d/%m/%Y') dt_inicio_pausa";
        //$sql.="       ,date_format(acp1.dt_fim_pausa,'%d/%m/%Y') dt_fim_pausa";
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        $sql.="  from agenda_colaborador_padrao a ";
        //$sql.="       left join agenda_colaborador_pausa acp1 on a.colaboradores_pk = acp1.colaboradores_pk";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk=".$colaboradores_pk;
        }
        if($dia_semana==0){
            //$sql.=" and a.ic_dom = 1";
            if($turnos_pk!=""){
                $sql.=" and a.dom_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==1){
            //$sql.=" and a.ic_seg = 1";
            if($turnos_pk!=""){
                $sql.=" and a.seg_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==2){
            //$sql.=" and a.ic_ter = 1";
            if($turnos_pk!=""){
                $sql.=" and a.ter_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==3){
            //$sql.=" and a.ic_qua = 1";
            if($turnos_pk!=""){
                $sql.=" and a.qua_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==4){
            //$sql.=" and a.ic_qui = 1";
            if($turnos_pk!=""){
                $sql.=" and a.qui_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==5){
            //$sql.=" and a.ic_sex = 1";
            if($turnos_pk!=""){
                $sql.=" and a.sex_turnos_pk = ".$turnos_pk;
            }
        }
        if($dia_semana==6){
            //$sql.=" and a.ic_sab = 1";
            if($turnos_pk!=""){
                $sql.=" and a.sab_turnos_pk = ".$turnos_pk;
            }
        }
        if($dt_agenda!=""){
            $sql.=" and ('".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda)";
        }
        $sql.=" and c.ic_status= 1 "; 
        $sql.=" and a.dt_cancelamento is null"; 
        $sql.=" group by l.pk"; 
        $sql.=" order by l.ds_lead ,c.ds_colaborador asc "; 
        
        
      
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function relatorioEscalaServicoDiaGridParaTarefa($leads_pk,$dt_agenda,$dt_agenda_fim,$colaboradores_pk,$turnos_pk,$dia_semana){
        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        
        $sql.="       ,a.ic_dom_folga";
        $sql.="       ,a.ic_seg_folga";
        $sql.="       ,a.ic_ter_folga";
        $sql.="       ,a.ic_qua_folga";
        $sql.="       ,a.ic_qui_folga";
        $sql.="       ,a.ic_sex_folga";
        $sql.="       ,a.ic_sab_folga";
        $sql.="       ,a.ic_folga_inverter";
        
        
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";        
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        $sql.="       ,concat(l.ds_endereco,', ',l.ds_numero,' | ',l.ds_cep)ds_endereco";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,cps.produtos_servicos_pk";
        $sql.="       ,ct.pk contratos_pk";
        $sql.="       ,a.contratos_itens_pk";
        $sql.="       ,c.ds_re";
        $sql.="       ,p.leads_pk";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        //$sql.="       ,date_format(acp1.dt_inicio_pausa,'%d/%m/%Y') dt_inicio_pausa";
        //$sql.="       ,date_format(acp1.dt_fim_pausa,'%d/%m/%Y') dt_fim_pausa";
        $sql.="  from agenda_colaborador_padrao a ";
        //$sql.="       left join agenda_colaborador_pausa acp1 on a.colaboradores_pk = acp1.colaboradores_pk";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
       
        if($dt_agenda!=""){
            $sql.=" and ('".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda)";
        }
        $sql.=" and a.colaboradores_pk  = ".$this->arrToken['colaboradores_pk'];
        $sql.=" group by c.pk"; 
        $sql.=" order by l.ds_lead ,c.ds_colaborador asc "; 
        
      
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorAgendaData($leads_pk,$dt_agenda,$dt_agenda_fim){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.ds_re";
        $sql.="       ,c.pk colaborador_pk";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,ci.n_qtde_dias_semana";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y')dt_inicio_agenda";        
        $sql.="  from agenda_colaborador_padrao a ";        
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        //$sql.="       left join agenda_colaborador_pausa acp on c.pk = acp.colaboradores_pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       INNER JOIN contratos_itens ci ON a.contratos_itens_pk = ci.pk";
        $sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($dt_agenda!=""){
            $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        /*$sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa >= '".DataYMD($dt_agenda)."'";
        $sql.=" and acp.dt_fim_pausa <= '".DataYMD($dt_agenda_fim)."'";
        $sql.=" and (acp.turnos_pk = t_dom.pk ";
        $sql.=" or acp.turnos_pk = t_seg.pk";
        $sql.=" or acp.turnos_pk = t_ter.pk";
            
        $sql.=" or acp.turnos_pk = t_qua.pk";
        $sql.=" or acp.turnos_pk = t_qui.pk";
        $sql.=" or acp.turnos_pk = t_sex.pk";
        $sql.=" or acp.turnos_pk = t_sab.pk)";
        
        $sql.=")";*/
        $sql.=" group by c.pk"; 
        $sql.=" order by a.dt_inicio_agenda,c.ds_colaborador asc "; 
     
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarQRCode($leads_pk){

        $sql ="";
        $sql.="SELECT ";
        $sql.="        c.ds_pin, psl.ic_status, psl.ds_imagem,date_format(psl.dt_liberacao,'%d/%m/%Y')dt_liberacao";
        $sql.="        ,case psl.ic_status when '1' then 'Liberado' when 2 then 'Liberação Pendente' end ds_status";
        $sql.="        ,l.ds_lead";
        $sql.="        ,l.ds_tel";
        $sql.="        ,c.ds_colaborador";
        $sql.="        ,concat(l.ds_endereco,', ',l.ds_numero,' - ', l.ds_bairro,' - ', l.ds_cidade,' / ',l.ds_uf)ds_endereco";
        $sql.="     FROM";
        $sql.="        agenda_colaborador_padrao acp";
        $sql.="            INNER JOIN";
        $sql.="        processos_etapas pe ON acp.processos_etapas_pk = pe.pk";
        $sql.="            INNER JOIN";
        $sql.="        processos p ON pe.processos_pk = p.pk";
        $sql.="        inner join leads l on p.leads_pk = l.pk";
        $sql.="        inner join colaboradores c on acp.colaboradores_pk = c.pk ";
        $sql.="        left join ponto_solicitacao_liberacao_app psl on psl.colaborador_pk = c.pk";

        $sql.="        where 1=1 ";
        if($leads_pk!=""){
            $sql.="        and l.pk = ".$leads_pk;
        }
        
        $sql.="        and c.ic_status = 1";
        $sql.="        and acp.dt_cancelamento is null";
        
     
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorAgendaDataGeral($dt_agenda,$dt_agenda_fim,$leads_pk,$ic_staus){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.ds_re";
        $sql.="       ,p.leads_pk";
        $sql.="       ,p.pk processos_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,c.pk colaborador_pk";
        $sql.="       ,c.ic_status";
        $sql.="       ,c.dt_demissao";
        $sql.="       ,c.ic_funcionario ";
        $sql.="       ,date_format(a.dt_cancelamento,'%d/%m/%Y')dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,ci.n_qtde_dias_semana";
        $sql.="       ,a.processos_etapas_pk";
        $sql.="       ,a.tipo_escala";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y')dt_inicio_agenda";        
        $sql.="  from agenda_colaborador_padrao a ";        
        
        
        $sql.=" inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.=" inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.=" inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.=" INNER JOIN contratos_itens ci ON ps.pk = ci.produtos_servicos_pk";
        
        $sql.=" inner join contratos ct on ci.contratos_pk = ct.pk";
        $sql.=" INNER JOIN processos_etapas pe1 ON ct.processos_etapas_pk = pe1.pk";
        $sql.=" INNER JOIN processos p1 ON pe1.processos_pk = p1.pk";
        $sql.=" INNER JOIN leads l1 ON p1.leads_pk = l1.pk";
        
        
        $sql.=" inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.=" inner join processos p on pe.processos_pk = p.pk";
        $sql.=" inner join leads l on p.leads_pk= l.pk";


        
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and l.pk = ".$leads_pk;
            $sql.=" and l1.pk = ".$leads_pk;
        }
        if($ic_staus!=""){
            $sql.=" and c.ic_status = ".$ic_staus;
        }
        if($dt_agenda!=""){
            $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        if($leads_pk!=""){
            $sql.=" and l.pk = ".$leads_pk;
            $sql.=" and l1.pk = ".$leads_pk;
        }
        if($ic_staus!=""){
            $sql.=" and c.ic_status = ".$ic_staus;
        }
        
        $sql.=" group by a.pk"; 
        $sql.=" order by a.dt_inicio_agenda,c.ds_colaborador asc "; 
        //$sql.=" limit 1 ";
      
       
        

        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function verificarColaboradorAtivo($dt_agenda,$colaborador_pk){

        $sql ="";
        $sql.="select count(0)total";        
        $sql.="  from agenda_colaborador_padrao a ";        
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        //$sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.=" where 1=1 ";
        if($colaborador_pk!=""){
            $sql.=" and c.pk = ".$colaborador_pk;
        }
        if($dt_agenda!=""){
            $sql.=" and c.dt_demissao <='".DataYMD($dt_agenda)."'";
        }
        
        $sql.=" group by c.pk"; 
        $sql.=" order by a.dt_inicio_agenda,c.ds_colaborador asc "; 
        //$sql.=" limit 1 "; 

        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function verificarAgendaAtivo($dt_agenda,$pk){

        $sql ="";
        $sql.="select count(0)total";        
        $sql.="  from agenda_colaborador_padrao a ";        
        $sql.=" where 1=1 ";
        if($pk!=""){
            $sql.=" and a.pk = ".$pk;
        }
        if($dt_agenda!=""){
            $sql.=" and a.dt_cancelamento <='".DataYMD($dt_agenda)."'";
        }
        
        $sql.=" group by a.pk"; 
        $sql.=" order by a.dt_inicio_agenda asc "; 
        //$sql.=" limit 1 "; 
        
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorAgendaDataGeralColaborador($dt_agenda,$dt_agenda_fim,$colaboradores_pk,$ic_status,$leads_pk){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.ds_re";
        $sql.="       ,p.leads_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,c.pk colaborador_pk";
        $sql.="       ,ps.ds_produto_servico";
        $sql.="       ,ci.n_qtde_dias_semana";
        $sql.="       ,c.ic_status";
        $sql.="       ,c.ic_funcionario ";
        $sql.="       ,date_format(a.dt_cancelamento,'%d/%m/%Y')dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y')dt_inicio_agenda"; 
        $sql.="       ,a.processos_etapas_pk";
        $sql.="       ,p.pk processos_pk";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        $sql.="  from agenda_colaborador_padrao a ";               
        
        
        
        $sql.=" inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.=" inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.=" inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.=" INNER JOIN contratos_itens ci ON ps.pk = ci.produtos_servicos_pk";
        
        $sql.=" inner join contratos ct on ci.contratos_pk = ct.pk";
        $sql.=" INNER JOIN processos_etapas pe1 ON ct.processos_etapas_pk = pe1.pk";
        $sql.=" INNER JOIN processos p1 ON pe1.processos_pk = p1.pk";
        $sql.=" INNER JOIN leads l1 ON p1.leads_pk = l1.pk";
        
        $sql.=" inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.=" inner join processos p on pe.processos_pk = p.pk";
        $sql.=" inner join leads l on p.leads_pk= l.pk";
        
        
        
        //$sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and l.pk = ".$leads_pk;
            $sql.=" and l1.pk = ".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk = ".$colaboradores_pk;
        }
        if($ic_status!=""){
            $sql.=" and c.ic_status = ".$ic_status;
        }
        if($dt_agenda!=""){
            $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk = ".$colaboradores_pk;
        }
        if($ic_status!=""){
            $sql.=" and c.ic_status = ".$ic_status;
        }
        if($leads_pk!=""){
            $sql.=" and l.pk = ".$leads_pk;
            $sql.=" and l1.pk = ".$leads_pk;
        }
        $sql.=" group by a.pk"; 
        $sql.=" order by a.dt_inicio_agenda,c.ds_colaborador asc "; 
       
     
        
       
       
       
        
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarLeadsPorColaboradorAgenda($dt_agenda,$dt_agenda_fim,$colaboradores_pk,$ic_status){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,p.leads_pk";
        $sql.="  from agenda_colaborador_padrao a ";               
        
        
        
        $sql.=" inner join colaboradores c on a.colaboradores_pk = c.pk";
        
        $sql.=" inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.=" inner join processos p on pe.processos_pk = p.pk";
        $sql.=" inner join leads l on p.leads_pk= l.pk";
        
        
        
        //$sql.="       INNER JOIN contratos ct ON ct.pk = ci.contratos_pk";
        $sql.=" where 1=1 ";
        if($colaboradores_pk!=""){
            $sql.=" and c.pk = ".$colaboradores_pk;
        }
        if($ic_status!=""){
            $sql.=" and c.ic_status = ".$ic_status;
        }
        if($dt_agenda!=""){
            $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda or '".DataYMD($dt_agenda_fim)."' between  a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        if($colaboradores_pk!=""){
            $sql.=" and c.pk = ".$colaboradores_pk;
        }
        if($ic_status!=""){
            $sql.=" and c.ic_status = ".$ic_status;
        }
        $sql.=" group by l.pk"; 
        $sql.=" order by a.dt_inicio_agenda,c.ds_colaborador asc "; 
       
     
        
       
       
       
        
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function RelatorioPostoTrabalhoXColaborador($colaboradores_pk,$leads_pk){

        $sql ="";
        $sql.="select l.ds_lead";
        $sql.="    ,case l.ic_cliente when 1 then 'Ativo' when 2 then 'Inativo' end ds_status";
        $sql.="    , c.ds_re";
        $sql.="    , c.ds_colaborador";
        $sql.="    ,case c.ic_status when 1 then 'Ativo' when 2 then 'Inativo' end ds_status_colaborador";
        $sql.="    ,ps.ds_produto_servico";
        $sql.="    ,ci.periodo";
        $sql.="    ,ci.n_qtde_dias_semana";
        $sql.="    from agenda_colaborador_padrao a ";
        $sql.="    inner join contratos_itens ci on a.contratos_itens_pk = ci.pk";
        $sql.="    inner join produtos_servicos ps on ci.produtos_servicos_pk = ps.pk";
        $sql.="    inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="    inner join processos p on pe.processos_pk = p.pk";
        $sql.="    inner join leads l on p.leads_pk = l.pk";
        $sql.="    inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="    where 1=1";
        if($leads_pk!=""){
            $sql.="    and l.pk = ".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.="    and c.pk = ".$colaboradores_pk;
        }
        $sql.=" and a.dt_cancelamento is null";
        $sql.="    order by l.ds_lead desc";
     
        
       
       
       
        
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPostoTrabalhoColaboradorEscala($colaboradores_pk,$leads_pk){

        $sql ="";
        $sql.="select l.ds_lead";
        $sql.="    ,ps.ds_produto_servico";
        $sql.="    ,ci.n_qtde_dias_semana";
        $sql.="    ,l.pk leads_pk";
        $sql.="    from agenda_colaborador_padrao a ";        
        
        $sql.=" inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.=" inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.=" inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.=" INNER JOIN contratos_itens ci ON ps.pk = ci.produtos_servicos_pk";
        
        $sql.=" inner join contratos ct on ci.contratos_pk = ct.pk";
        $sql.=" INNER JOIN processos_etapas pe1 ON ct.processos_etapas_pk = pe1.pk";
        $sql.=" INNER JOIN processos p1 ON pe1.processos_pk = p1.pk";
        $sql.=" INNER JOIN leads l1 ON p1.leads_pk = l1.pk";
        
        $sql.=" inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.=" inner join processos p on pe.processos_pk = p.pk";
        $sql.=" inner join leads l on p.leads_pk= l.pk";
        
        
        
        
        
        
        $sql.="    where 1=1";
        if($leads_pk!=""){
            $sql.="    and l.pk = ".$leads_pk;
            $sql.="    and l1.pk = ".$leads_pk;
        }
        if($colaboradores_pk!=""){
            $sql.="    and c.pk = ".$colaboradores_pk;
        }
        if($leads_pk!=""){
            $sql.="    and l.pk = ".$leads_pk;
            $sql.="    and l1.pk = ".$leads_pk;
        }
        $sql.=" and a.dt_cancelamento is null";
        $sql.="    group by l.pk";
        $sql.="    order by l.ds_lead desc";
     
        
       
       
       
        
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listarAgendaLeadDataColaborador($leads_pk,$dt_agenda,$dt_agenda_fim,$dia_semana){

              

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,c.ds_colaborador ds_colaborador_dom";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_dom";
  
        
        $sql.="       ,c.ds_colaborador ds_colaborador_seg";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_seg";
    
        
        $sql.="       ,c.ds_colaborador ds_colaborador_ter";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_ter";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
      
        
        $sql.="       ,c.ds_colaborador ds_colaborador_qua";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qua";
  
        
        $sql.="       ,c.ds_colaborador ds_colaborador_qui";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_qui";
      
        
        $sql.="       ,c.ds_colaborador ds_colaborador_sex";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sex";

        
        $sql.="       ,c.ds_colaborador ds_colaborador_sab";
        $sql.="       ,ps.ds_produto_servico ds_produto_servico_sab";

        
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,')')ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($leads_pk!=""){
            $sql.=" and p.leads_pk=".$leads_pk;
        }
        if($dt_agenda!=""){
           $sql.=" and '".DataYMD($dt_agenda)."' between  a.dt_inicio_agenda and a.dt_fim_agenda";
        }
        if($dia_semana==0){
            $sql.=" and a.ic_dom =1";
        }
        else if($dia_semana==1){
            $sql.=" and a.ic_seg =1";
        }
        else if($dia_semana==2){
            $sql.=" and a.ic_ter =1";
        }
        else if($dia_semana==3){
            
            $sql.=" and a.ic_qua =1";
        }
        else if($dia_semana==4){
            $sql.=" and a.ic_qui =1";
        }
        else if($dia_semana==5){
            $sql.=" and a.ic_sex =1";
        }
        else if($dia_semana==6){
            $sql.=" and a.ic_sab =1";
        }
        $sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa between '".DataYMD($dt_agenda)."' and '".DataYMD($dt_agenda_fim)."'";
        //if($dia_semana==0){
            $sql.=" and (acp.turnos_pk = t_dom.pk ";
        //}
        //else if($dia_semana==1){
            $sql.=" or acp.turnos_pk = t_seg.pk";
        //}
        //else if($dia_semana==2){
            $sql.=" or acp.turnos_pk = t_ter.pk";
        //}
        //else if($dia_semana==3){
            
           $sql.=" or acp.turnos_pk = t_qua.pk";
        //}
        //else if($dia_semana==4){
           $sql.=" or acp.turnos_pk = t_qui.pk";
       // }
        //else if($dia_semana==5){
            $sql.=" or acp.turnos_pk = t_sex.pk";
        //}
       // else if($dia_semana==6){
            $sql.=" or acp.turnos_pk = t_sab.pk)";
        //}
        
        $sql.=")";
        $sql.=" order by a.dt_inicio_agenda asc ";
    
        
        
        
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listar_agenda_colaborador_colaborador_data($colaborador_pk,$dt_agenda,$dt_agenda_fim,$dia_semana){

        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
       $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";
        
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_dom.ds_turno,')')ds_colaborador_dom";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_seg.ds_turno,')')ds_colaborador_seg";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_ter.ds_turno,')')ds_colaborador_ter";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_qua.ds_turno,')')ds_colaborador_qua";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_qui.ds_turno,')')ds_colaborador_qui";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_sex.ds_turno,')')ds_colaborador_sex";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,' -> ',t_sab.ds_turno,')')ds_colaborador_sab";
        $sql.="       ,concat(c.ds_colaborador,' (',ps.ds_produto_servico,')')ds_colaborador_grid";
        $sql.="       ,l.ds_lead";
        //$sql.="       ,c.ds_colaborador";
        $sql.="       ,ps.ds_produto_servico";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaborador_pk!=""){
            $sql.=" and c.pk=".$colaborador_pk;
        }
        if($dt_agenda!=""){

            //$sql.=" and a.dt_inicio_agenda <= '".DataYMD($dt_agenda)."'";
            //$sql.=" and a.dt_fim_agenda >='".DataYMD($dt_agenda_fim)."'";
            $sql.=" and a.dt_inicio_agenda <= '".DataYMD($dt_agenda)."'";
            $sql.=" and a.dt_fim_agenda >='".DataYMD($dt_agenda_fim)."'";
        }
        if($dia_semana==0){
            $sql.=" and a.ic_dom =1";
        }
        else if($dia_semana==1){
            $sql.=" and a.ic_seg =1";
        }
        else if($dia_semana==2){
            $sql.=" and a.ic_ter =1";
        }
        else if($dia_semana==3){
            
            $sql.=" and a.ic_qua =1";
        }
        else if($dia_semana==4){
            $sql.=" and a.ic_qui =1";
        }
        else if($dia_semana==5){
            $sql.=" and a.ic_sex =1";
        }
        else if($dia_semana==6){
            $sql.=" and a.ic_sab =1";
        }
        $sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa between '".DataYMD($dt_agenda)."' and '".DataYMD($dt_agenda_fim)."'";
        if($dia_semana==0){
            $sql.=" and acp.turnos_pk = t_dom.pk ";
        }
        else if($dia_semana==1){
            $sql.=" and acp.turnos_pk = t_seg.pk";
        }
        else if($dia_semana==2){
           $sql.=" and acp.turnos_pk = t_ter.pk";
        }
        else if($dia_semana==3){
            
           $sql.=" and acp.turnos_pk = t_qua.pk";
        }
        else if($dia_semana==4){
          $sql.=" and acp.turnos_pk = t_qui.pk";
        }
        else if($dia_semana==5){
            $sql.=" and acp.turnos_pk = t_sex.pk";
        }
        else if($dia_semana==6){
            $sql.=" and acp.turnos_pk = t_sab.pk";
        }
        
        $sql.=")";
        $sql.=" order by a.dt_inicio_agenda asc "; 
        
       
       
      
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
   public function rel_agenda_lead($leads_pk,$dt_base){
        
        
        $sql ="";
        $sql.="SELECT  (ci.n_qtde) n_itens_contratados,";
        $sql.="         ps.ds_produto_servico,";
        $sql.="         ps.pk produtos_servicos_pk,";
        $sql.="         ci.n_qtde_dias_semana";
        $sql.="   FROM leads l";
        $sql.=" INNER JOIN processos p ON p.leads_pk = l.pk";
        $sql.=" INNER JOIN processos_etapas pe ON pe.processos_pk = p.pk";
        $sql.=" INNER JOIN contratos c ON c.processos_etapas_pk = pe.pk";
        $sql.=" INNER JOIN contratos_itens ci ON ci.contratos_pk = c.pk";
        $sql.=" INNER JOIN produtos_servicos ps ON ci.produtos_servicos_pk = ps.pk";
        $sql.="  where ps.pk = ci.produtos_servicos_pk  and c.pk = ci.contratos_pk ";
        $sql.=" AND l.pk =".$leads_pk;
        $sql.=" AND c.dt_inicio_contrato <= '".DataYMD($dt_base)."'";
        $sql.=" AND c.dt_fim_contrato >= '".DataYMD($dt_base)."'";
       
      
        
      
      
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function rel_agenda_lead_qtde_profissiomais($leads_pk,$dt_base,$produtos_servicos_pk,$qtde_dia_semana){
        
        $sql ="";
        $sql.=" SELECT COUNT(DISTINCT c.pk)qtde_profissionais";
        $sql.="   FROM agenda_colaborador_padrao acp";
        $sql.="        INNER JOIN colaboradores c ON acp.colaboradores_pk = c.pk";
        $sql.="        INNER JOIN colaboradores_produtos_servicos cps ON c.pk = cps.colaboradores_pk";
        $sql.="        INNER JOIN processos_etapas pes ON pes.pk = acp.processos_etapas_pk";
        $sql.="        INNER JOIN processos pse ON pes.processos_pk = pse.pk";
        $sql.="  WHERE pse.leads_pk =".$leads_pk;
        $sql.="        AND acp.dt_inicio_agenda <='".DataYMD($dt_base)."'";
        $sql.="        AND acp.dt_fim_agenda >= '".DataYMD($dt_base)."'"; 
        $sql.="       and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa ='".DataYMD($dt_base)."')";
        if($qtde_dia_semana==7){
            $sql.="        group by acp.pk";
        
            $sql.="        having SUM(CASE acp.ic_dom";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_seg";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_ter";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_qua";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_qui";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_sex";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END + CASE acp.ic_sab";
            $sql.="                   WHEN 1 THEN 1";
            $sql.="                   ELSE 0";
            $sql.="                   END)=".$qtde_dia_semana;
        }
        $sql.="      order by c.pk";
     
      
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
      
    
    public function rel_agenda_colaborador($colaboradores_pk,$dt_base,$dia_semana){
        
        
        $sql ="";
        $sql.="select l.ds_lead";
	$sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
        $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,a.tipo_escala";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
	$sql.="  from agenda_colaborador_padrao a";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
	$sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
	$sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
	$sql.="       inner join processos p on pe.processos_pk = p.pk";
	$sql.="	      inner join leads l on p.leads_pk = l.pk";
	$sql.="	where 1= 1";
	$sql.="	      and a.colaboradores_pk =".$colaboradores_pk;
	$sql.="	      AND a.dt_inicio_agenda <= '".DataYMD($dt_base)."'";
	$sql.="	      AND a.dt_fim_agenda >= '".DataYMD($dt_base)."'";
   

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listar_agenda_colaborador_data($colaborador_pk,$dt_base,$dt_base_fim,$dia_semana){
        
        
        $sql ="";
        $sql.="select a.pk, a.dt_cadastro, a.usuario_cadastro_pk, a.dt_ult_atualizacao, a.usuario_ult_atualizacao_pk ";
        $sql.="       ,date_format(a.dt_inicio_agenda,'%d/%m/%Y') dt_inicio_agenda";
        $sql.="       ,date_format(a.dt_fim_agenda,'%d/%m/%Y') dt_fim_agenda";
        $sql.="       ,a.ds_agenda";
        $sql.="       ,a.processos_etapas_pk ";
        $sql.="       ,a.colaboradores_pk ";
        $sql.="       ,a.ic_dom";
        $sql.="       ,a.ic_seg";
        $sql.="       ,a.ic_ter";
        $sql.="       ,a.ic_qua";
        $sql.="       ,a.ic_qui";
        $sql.="       ,a.ic_sex";
        $sql.="       ,a.ic_sab";
        $sql.="       ,a.dom_turnos_pk";
        $sql.="       ,a.seg_turnos_pk";
        $sql.="       ,a.ter_turnos_pk";
        $sql.="       ,a.qua_turnos_pk";
        $sql.="       ,a.qui_turnos_pk";
        $sql.="       ,a.sex_turnos_pk";
        $sql.="       ,a.sab_turnos_pk";
       $sql.="       ,date_format(a.hr_turno_dom,'%H:%i')hr_turno_dom";
        $sql.="       ,date_format(a.hr_turno_seg,'%H:%i')hr_turno_seg";
        $sql.="       ,date_format(a.hr_turno_ter,'%H:%i')hr_turno_ter";
        $sql.="       ,date_format(a.hr_turno_qua,'%H:%i')hr_turno_qua";
        $sql.="       ,date_format(a.hr_turno_qui,'%H:%i')hr_turno_qui";
        $sql.="       ,date_format(a.hr_turno_sex,'%H:%i')hr_turno_sex";
        $sql.="       ,date_format(a.hr_turno_sab,'%H:%i')hr_turno_sab";
        $sql.="       ,date_format(a.hr_turno_dom_saida,'%H:%i')hr_turno_dom_saida";
        $sql.="       ,date_format(a.hr_turno_seg_saida,'%H:%i')hr_turno_seg_saida";
        $sql.="       ,date_format(a.hr_turno_ter_saida,'%H:%i')hr_turno_ter_saida";
        $sql.="       ,date_format(a.hr_turno_qua_saida,'%H:%i')hr_turno_qua_saida";
        $sql.="       ,date_format(a.hr_turno_qui_saida,'%H:%i')hr_turno_qui_saida";
        $sql.="       ,date_format(a.hr_turno_sex_saida,'%H:%i')hr_turno_sex_saida";
        $sql.="       ,date_format(a.hr_turno_sab_saida,'%H:%i')hr_turno_sab_saida";
        $sql.="       ,date_format(a.hr_intervalo_dom,'%H:%i')hr_intervalo_dom";
        $sql.="       ,date_format(a.hr_intervalo_seg,'%H:%i')hr_intervalo_seg";
        $sql.="       ,date_format(a.hr_intervalo_ter,'%H:%i')hr_intervalo_ter";
        $sql.="       ,date_format(a.hr_intervalo_qua,'%H:%i')hr_intervalo_qua";
        $sql.="       ,date_format(a.hr_intervalo_qui,'%H:%i')hr_intervalo_qui";
        $sql.="       ,date_format(a.hr_intervalo_sex,'%H:%i')hr_intervalo_sex";
        $sql.="       ,date_format(a.hr_intervalo_sab,'%H:%i')hr_intervalo_sab";
        $sql.="       ,date_format(a.hr_intervalo_saida_dom,'%H:%i')hr_intervalo_saida_dom";
        $sql.="       ,date_format(a.hr_intervalo_saida_seg,'%H:%i')hr_intervalo_saida_seg";
        $sql.="       ,date_format(a.hr_intervalo_saida_ter,'%H:%i')hr_intervalo_saida_ter";
        $sql.="       ,date_format(a.hr_intervalo_saida_qua,'%H:%i')hr_intervalo_saida_qua";
        $sql.="       ,date_format(a.hr_intervalo_saida_qui,'%H:%i')hr_intervalo_saida_qui";
        $sql.="       ,date_format(a.hr_intervalo_saida_sex,'%H:%i')hr_intervalo_saida_sex";
        $sql.="       ,date_format(a.hr_intervalo_saida_sab,'%H:%i')hr_intervalo_saida_sab";
        $sql.="       ,a.nao_repetir_proxima_semana_pk";
        $sql.="       ,a.ic_nao_repetir";
        $sql.="       ,t_dom.ds_turno ds_turno_dom";
        $sql.="       ,t_seg.ds_turno ds_turno_seg";
        $sql.="       ,t_ter.ds_turno ds_turno_ter";
        $sql.="       ,t_qua.ds_turno ds_turno_qua";
        $sql.="       ,t_qui.ds_turno ds_turno_qui";
        $sql.="       ,t_sex.ds_turno ds_turno_sex";
        $sql.="       ,t_sab.ds_turno ds_turno_sab";
        //$sql.="       ,d.ds_dia_semana";
        //$sql.="       ,t.ds_turno";
        //$sql.="       ,concat(l.ds_lead,' -> ',t.ds_turno)ds_lead";
        $sql.="       ,l.ds_lead condominio";
        $sql.="       ,l.pk leads_pk ";
        $sql.="       ,a.dt_cancelamento";
        $sql.="       ,a.ds_motivo_cancelamento";
        $sql.="       ,ps.ds_produto_servico";
        
        $sql.="       ,a.produtos_servicos_pk";
        $sql.="       ,a.n_qtde_dias_semana";
        $sql.="       ,a.turnos_pk";
        $sql.="       ,date_format(a.hr_inicio_expediente,'%H:%i')hr_inicio_expediente";
        $sql.="       ,date_format(a.hr_termino_expediente,'%H:%i')hr_termino_expediente";
        $sql.="       ,date_format(a.hr_saida_intervalo,'%H:%i')hr_saida_intervalo";
        $sql.="       ,date_format(a.hr_retorno_intervalo,'%H:%i')hr_retorno_intervalo";
        $sql.="       ,a.ic_preenchimento_automatico";
        
        
        $sql.="  from agenda_colaborador_padrao a ";
        $sql.="       inner join colaboradores c on a.colaboradores_pk = c.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on c.pk = cps.colaboradores_pk";
        $sql.="       inner join produtos_servicos ps on cps.produtos_servicos_pk = ps.pk";
        $sql.="       left join turnos t_dom on a.dom_turnos_pk = t_dom.pk";
        $sql.="       left join turnos t_seg on a.seg_turnos_pk = t_seg.pk";
        $sql.="       left join turnos t_ter on a.ter_turnos_pk = t_ter.pk";
        $sql.="       left join turnos t_qua on a.qua_turnos_pk = t_qua.pk";
        $sql.="       left join turnos t_qui on a.qui_turnos_pk = t_qui.pk";
        $sql.="       left join turnos t_sex on a.sex_turnos_pk = t_sex.pk";
        $sql.="       left join turnos t_sab on a.sab_turnos_pk = t_sab.pk";
        $sql.="       inner join processos_etapas pe on a.processos_etapas_pk = pe.pk";
        $sql.="       inner join processos p on pe.processos_pk = p.pk";
        $sql.="       inner join leads l on p.leads_pk = l.pk";
        $sql.=" where 1=1 ";
        if($colaborador_pk!=""){
            $sql.=" and c.pk=".$colaborador_pk;
        }
        if($dia_semana==0){
            $sql.=" and a.ic_dom =1";
        }
        else if($dia_semana==1){
            $sql.=" and a.ic_seg =1";
        }
        else if($dia_semana==2){
            $sql.=" and a.ic_ter =1";
        }
        else if($dia_semana==3){
            
            $sql.=" and a.ic_qua =1";
        }
        else if($dia_semana==4){
            $sql.=" and a.ic_qui =1";
        }
        else if($dia_semana==5){
            $sql.=" and a.ic_sex =1";
        }
        else if($dia_semana==6){
            $sql.=" and a.ic_sab =1";
        }

        $sql.=" AND a.dt_inicio_agenda <= '".DataYMD($dt_base)."'";
        $sql.=" AND a.dt_fim_agenda >= '".DataYMD($dt_base)."'";
        //$sql.=" and a.dt_fim_agenda >='".DataYMD($dt_base_fim)." '";
        //$sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa between '".DataYMD($dt_base)."' and '".DataYMD($dt_base_fim)."'";
        $sql.=" and c.pk NOT IN (SELECT acp.colaboradores_pk FROM agenda_colaborador_pausa acp where acp.dt_inicio_pausa = '".DataYMD($dt_base)."' ";
        if($dia_semana==0){
            $sql.=" and acp.turnos_pk = t_dom.pk ";
        }
        else if($dia_semana==1){
            $sql.=" and acp.turnos_pk = t_seg.pk";
        }
        else if($dia_semana==2){
            $sql.=" and acp.turnos_pk = t_ter.pk";
        }
        else if($dia_semana==3){
            
           $sql.=" and acp.turnos_pk = t_qua.pk";
        }
        else if($dia_semana==4){
           $sql.=" and acp.turnos_pk = t_qui.pk";
        }
        else if($dia_semana==5){
            $sql.=" and acp.turnos_pk = t_sex.pk";
        }
        else if($dia_semana==6){
            $sql.=" and acp.turnos_pk = t_sab.pk";
        }
        
        $sql.=")";
        $sql.=" order by a.dt_inicio_agenda asc "; 
      
       
        
        

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function listar_data($dt_agenda){

        $sql ="";
        $sql.="select date_format('".  DataYMD($dt_agenda)."','%w')dia_semana";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    function verificarDataContratoAgenda($dt_inicio_agenda,$contratos_pk){
        $sql.=" select count(0)total from contratos";
        $sql.="         where dt_inicio_contrato between '".$dt_inicio_agenda."' and '".$dt_inicio_agenda."'";
        $sql.=" and pk =".$contratos_pk;
        $query = $this->db->execQuery($sql);
        return $query;
    }
    function carregarInformacaoPausa($dt_inicio_pausa,$dt_fim_pausa,$colaborador_pk){
        $sql.=" select pk from agenda_colaborador_pausa";
        $sql.="         where 1=1";
        $sql.="         and colaboradores_pk = ".$colaborador_pk;
        $sql.="         and dt_inicio_pausa = '".$dt_inicio_pausa."'";
        $sql.="         and dt_fim_pausa = '".$dt_fim_pausa."'";
   
        $query = $this->db->execQuery($sql);
        return $query;
    }
    function excluirPausa($pk){
        $this->db->execDelete("agenda_colaborador_pausa"," pk = ".$pk);
    }
    
    

}

?>
