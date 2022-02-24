<?
ini_set('max_execution_time', '300'); //300 seconds = 5 minutes
require_once '../inc/php/public.php';
require_once '../inc/classes/bestflow/DataBase.php';
require_once '../model/ponto.class.php';


class pontodao{

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
    
    public function salvar($ponto){

        $fields = array();
        $fields['ds_pin'] = $ponto->getds_pin();
        $fields['colaborador_pk'] = $ponto->getcolaborador_pk();
        $fields['tipo_ponto_pk'] = $ponto->gettipo_ponto_pk();
        $fields['dt_hora_ponto'] = $ponto->getdt_hora_ponto();
        $fields['ds_localizacao'] = $ponto->getds_localizacao();
        $fields['ds_imagem'] = $ponto->getds_imagem();
        $fields['ponto_origem_pk'] = $ponto->getponto_origem_pk();
        $fields['ic_dispositivo'] = $ponto->getic_dispositivo();
        $fields['ic_status_conferencia'] = $ponto->getic_status_conferencia();
        $fields['ds_total_horas_trabalhadas'] = $ponto->getds_total_horas_trabalhadas();   
        
        $fields["dt_ult_atualizacao"] = "sysdate()";
        if($this->arrToken['usuarios_pk']!=""){
            $fields["usuario_ult_atualizacao_pk"] = $this->arrToken['usuarios_pk'];
        }else{
            $fields["usuario_ult_atualizacao_pk"] = 1;
        }
        
        if($ponto->getpk()  == ""){
            $fields["dt_cadastro"] = "sysdate()";
            if($this->arrToken['usuarios_pk']!=""){
                $fields["usuario_cadastro_pk"] = $this->arrToken['usuarios_pk'];
            }else{
                $fields["usuario_cadastro_pk"] = 1;
            }
       
            $pk = $this->db->execInsert("ponto", $fields);
            return $pk;
        }
        else{
            return $this->db->execUpdate("ponto", $fields, " pk = ".$ponto->getpk());
        }
    }

    public function excluir($ponto){
        $this->db->execDelete("ponto"," pk = ".$ponto->getpk());
    }

    public function carregarPorPk($pk){

        $ponto = new ponto();
        if($pk != ""){
            
        $sql ="select pk ";
        $sql.="      , date_format(dt_cadastro,'%d/%m/%Y') dt_cadastro ";
        $sql.="      , usuario_cadastro_pk ";
        $sql.="      , date_format(dt_ult_atualizacao,'%d/%m/%Y') dt_ult_atualizacao ";
        $sql.="      , usuario_ult_atualizacao_pk ";

        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk ";


        $sql.="  from ponto ";
        $sql.=" where pk = $pk ";
            $query = $this->db->execQuery($sql);
            for($i = 0; $i < count($query); $i++){
                $ponto->setpk($query[$i]["pk"]);
                $ponto->setdt_cadastro($query[$i]["dt_cadastro"]);
                $ponto->setusuario_cadastro_pk($query[$i]["usuario_cadastro_pk"]);
                $ponto->setdt_ult_atualizacao($query[$i]["dt_ult_atualizacao"]);
                $ponto->setusuario_ult_atualizacao_pk($query[$i]["usuario_ult_atualizacao_pk"]);

                $ponto->setds_pin($query[$i]['ds_pin']);
                $ponto->setcolaborador_pk($query[$i]['colaborador_pk']);
                $ponto->settipo_ponto_pk($query[$i]['tipo_ponto_pk']);
                $ponto->setdt_hora_ponto($query[$i]['dt_hora_ponto']);
                $ponto->setds_localizacao($query[$i]['ds_localizacao']);
                $ponto->setds_imagem($query[$i]['ds_imagem']);
                $ponto->setponto_origem_pk($query[$i]['ponto_origem_pk']);

            }
        }
        return $ponto;
    }
    public function carregarExcluir($dt_hora_ponto,$colaborador_pk,$pk){

        $ponto = new ponto();
            
        $sql ="select pk ";
        $sql.="  from ponto ";
        $sql.=" where dt_hora_ponto between '".dataYMD($dt_hora_ponto)." 00:00:00' and'".dataYMD($dt_hora_ponto)." 23:59:59' and colaborador_pk = ".$colaborador_pk;
        if($pk!=""){
            $sql.=" and pk = ".$pk;
        }
        
       
        $query = $this->db->execQuery($sql);
        for($i = 0; $i < count($query); $i++){
            $ponto->setpk($query[$i]["pk"]);

        }
        return $ponto;
    }
    public function carregarExcluirApontamentoFolha($dt_hora_ponto,$colaborador_pk,$pk){

            
        $sql ="select pk ";
        $sql.="  from ponto ";
        $sql.=" where dt_hora_ponto between '".dataYMD($dt_hora_ponto)." 00:00:00' and'".dataYMD($dt_hora_ponto)." 23:59:59' and colaborador_pk = ".$colaborador_pk;
        if($pk!=""){
            $sql.=" and pk = ".$pk;
        }
        
       
        $query = $this->db->execQuery($sql);
        for($i = 0; $i < count($query); $i++){
            $this->db->execDelete("ponto"," pk = ".($query[$i]["pk"]));

        }
    }

    public function listarPorPk($pk){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk ";

        $sql.="  from ponto ";
        $sql.=" where pk = $pk ";
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPkApontamento($dt_hora_ponto,$colaborador_pk,$pk){

        $sql ="select pk ";
        $sql.="  from ponto ";
        $sql.=" where dt_hora_ponto between '".dataYMD($dt_hora_ponto)." 00:00:00' and'".dataYMD($dt_hora_ponto)." 23:59:59' and colaborador_pk = ".$colaborador_pk;
        if($pk!=""){
            $sql.=" and pk = ".$pk;
        }
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPontoColaborador($colaborador_pk,$dt_base){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,date_format(dt_hora_ponto,'%H:%i:%s')hr_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk ";
        $sql.="  from ponto ";
        $sql.=" where 1=1";
        $sql.=" and colaborador_pk = ".$colaborador_pk;
        $sql.=" and dt_hora_ponto between '".DataYMD($dt_base)." 00:00:00' and '".DataYMD($dt_base)." 23:59:59'";
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarPontoColaboradorPeriodo($colaborador_pk,$dt_base_ini,$dt_base_fim){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,date_format(dt_hora_ponto,'%d/%m/%Y')dt_hora_ponto ";
        $sql.="       ,date_format(dt_hora_ponto,'%H:%i:%s')hr_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk ";
        $sql.="  from ponto ";
        $sql.=" where 1=1";
        $sql.=" and colaborador_pk = ".$colaborador_pk;
        $sql.=" and dt_hora_ponto between '".DataYMD($dt_base_ini)." 00:00:00' and '".DataYMD($dt_base_fim)." 23:59:59'";
       
        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    
    public function pesquisaLogTrabalho($id_cliente,$ds_pin,$colaborador_pk,$ic_dispositivo,$dt_ini,$dt_fim){
        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk  ";
        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk "; 
        $sql.="       ,ds_total_horas_trabalhadas ";        
        $sql.="       ,case when ic_status_conferencia = 1 then  'Conferencia Pendente' ";   
        $sql.="       when ic_status_conferencia = 2 then  'Conferido' ";  
        $sql.="       when ic_status_conferencia = 3 then  'Conferido recusado' ";
        $sql.="       end Status ";  
        $sql.="  from ponto ";
        $sql.=" where ds_pin='".$ds_pin."'";        
        $sql.=" and colaborador_pk = ".$colaborador_pk;
        $sql.=" and dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";

        $query = $this->db->execQuery($sql);
        return $query;
    }
    
    public function pesquisaLogAtual($id_cliente,$ds_pin,$colaborador_pk,$ic_dispositivo,$dt_ini,$dt_fim){

        $sql ="";
        $sql.="select p.pk, p.dt_cadastro, p.usuario_cadastro_pk, p.dt_ult_atualizacao, p.usuario_ult_atualizacao_pk  ";
        $sql.="       ,p.ds_pin ";
        $sql.="       ,p.colaborador_pk ";
        $sql.="       ,p.tipo_ponto_pk ";
        $sql.="       ,p.dt_hora_ponto dt_hora_abertura ";
        $sql.="       ,p.ds_localizacao ";
        $sql.="       ,p.ds_imagem ";
        $sql.="       ,p.ponto_origem_pk ";
        $sql.="       ,p.ds_total_horas_trabalhadas ";        
        $sql.="       ,case when p.ic_status_conferencia = 1 then  'Conferencia Pendente' ";   
        $sql.="       when p.ic_status_conferencia = 2 then  'Conferido' ";  
        $sql.="       when p.ic_status_conferencia = 3 then  'Conferido recusado' ";
        $sql.="       end Status ";  
        $sql.="       ,p1.pk pk_fechamento "; 
        $sql.="       ,p1.dt_hora_ponto dt_hora_fechamento ";
        $sql.="  from ponto p ";
        $sql.="  left join ponto p1 on p.pk = p1.ponto_origem_pk";
        $sql.=" where p.ds_pin='".$ds_pin."'";        
        $sql.=" and p.colaborador_pk = ".$colaborador_pk;
        $sql.=" and p.tipo_ponto_pk = 1 ";
        $sql.=" and p.dt_hora_ponto >= DATE_SUB(CURDATE(),INTERVAL 8 HOUR)";
        //$sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function pesquisaLogSaisaRegistro($pk){

        $sql ="";
        $sql.="select p.pk";
        $sql.="  from ponto p ";
        $sql.="  left join ponto p1 on p.pk = p1.ponto_origem_pk";
        $sql.=" where p.ponto_origem_pk=".$pk;        

        $query = $this->db->execQuery($sql);
        return $query;

    }
   

    public function relatorioPonto($leads_pk,$colaborador_pk,$dt_ini,$dt_fim,$diasemana_numero,$ic_inverter_folga,$qtde_lead_colaborador){
        if($qtde_lead_colaborador > 1){
            $sql ="";
            $sql.="SELECT ";
            if($diasemana_numero==0){
                $sql.="       agp.hr_turno_dom hr_entrada,";  
                $sql.="       agp.hr_turno_dom_saida hr_saida"; 
            }
            if($diasemana_numero==1){
                $sql.="       agp.hr_turno_seg hr_entrada,";  
                $sql.="       agp.hr_turno_seg_saida hr_saida"; 
            }
            if($diasemana_numero==2){
                $sql.="       agp.hr_turno_ter hr_entrada,";  
                $sql.="       agp.hr_turno_ter_saida hr_saida"; 
            }
            if($diasemana_numero==3){
                $sql.="       agp.hr_turno_qua hr_entrada,";  
                $sql.="       agp.hr_turno_qua_saida hr_saida"; 
            }
            if($diasemana_numero==4){
                $sql.="       agp.hr_turno_qui hr_entrada,";  
                $sql.="       agp.hr_turno_qui_saida hr_saida"; 
            }
            if($diasemana_numero==5){
                $sql.="       agp.hr_turno_sex hr_entrada,";  
                $sql.="       agp.hr_turno_sex_saida hr_saida"; 
            }
            if($diasemana_numero==6){
                $sql.="       agp.hr_turno_sab hr_entrada,";  
                $sql.="       agp.hr_turno_sab_saida hr_saida"; 
            }

            $sql.="  FROM leads l";
            $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
            $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
            $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
            $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
            $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
            $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";    
            $sql.="       INNER JOIN ponto pt ON col.pk = pt.colaborador_pk";
            $sql.=" where 1=1 ";

            $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";

            if($leads_pk != ""){
                $sql.=" and l.pk = ".$leads_pk;
            }

            if($colaborador_pk != ""){
                $sql.=" and col.pk  = ".$colaborador_pk;
            }
            if($leads_pk != ""){
                $sql.=" and p.leads_pk = ".$leads_pk;
            }
            /*if($ic_inverter_folga==""){
                if($diasemana_numero==0){
                    $sql.=" and agp.ic_dom =1";
                }
                if($diasemana_numero==1){
                    $sql.=" and agp.ic_seg =1";
                }
                if($diasemana_numero==2){
                    $sql.=" and agp.ic_ter =1";
                }
                if($diasemana_numero==3){
                    $sql.=" and agp.ic_qua =1";
                }
                if($diasemana_numero==4){
                    $sql.=" and agp.ic_qui =1";
                }
                if($diasemana_numero==5){
                    $sql.=" and agp.ic_sex =1";
                }
                if($diasemana_numero==6){
                    $sql.=" and agp.ic_sab =1";
                }
            }*/
            $sql.=" and agp.dt_cancelamento is null";


            $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
            $sql.=" order by col.ds_colaborador, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
            

            $query1 = $this->db->execQuery($sql);
            
            if($query1[0]['hr_entrada']!=""){
                $arrEntrada = explode(":",$query1[0]['hr_entrada']);
                $arrSaida = explode(":",$query1[0]['hr_saida']);
                if($arrEntrada[0] > $arrSaida[0]){
                    $hr_entrada = ("00:00:00");
                    $hr_saida = ("23:59:59");
                }
                else{
                    
                    if($arrEntrada[1] < 30){
                        $hr_entrada = ($arrEntrada[0]-1).":".($arrSaida[1]+29).":00";
                    }
                  
                    else if($arrEntrada[0] > 11){
                        
                        //$hr_entrada = ($arrEntrada[0]-1).":25:00";
                        $hr_entrada = ($arrEntrada[0]-1).":30:00";
                    }
                    else{
                       
                        $hr_entrada = ($arrEntrada[0]).":05:00";
                    }
                    if($arrSaida[1] <= 30){
                        $hr_saida = ($arrSaida[0]).":".($arrSaida[1]+19).":59";
                    }
                    else{
                       $hr_saida = ($arrSaida[0]).":".($arrSaida[1]+45).":59";
                    }
                }

            }
            else{

                $hr_entrada = ("00:00:00");
                $hr_saida = ("00:00:00");
            }
        }
        else{

            $hr_entrada = ("00:00:00");
            $hr_saida = ("23:59:59");
        }
        
        
        
        $sql ="";
        $sql.="SELECT l.pk,";
        $sql.="       l.ds_lead,";
        $sql.="       col.pk colaboradores_pk,";
        $sql.="       concat(l.ds_endereco,', ',l.ds_cidade,' - ',l.ds_uf)ds_local_trabalho,";
        $sql.="       col.ds_re,";
        $sql.="       col.ds_pin,";
        $sql.="       col.ds_colaborador,";
        $sql.="       ps.ds_produto_servico,";
        $sql.="       pt.tipo_ponto_pk,";
        $sql.="       ci.periodo,";
        $sql.="       ci.n_qtde_dias_semana, ";      
        $sql.="       date_format(pt.dt_hora_ponto,'%Y-%m-%d') dt_hora_ponto,";
        $sql.="       date_format(pt.dt_hora_ponto,'%d/%m/%Y') dt_rh_entratada,";
        $sql.="       date_format(pt.dt_hora_ponto,'%H:%i:%s') hr_entrada,";
        $sql.="       pt.ds_total_horas_trabalhadas,";         
        $sql.="       pt.ds_localizacao,";
        $sql.="       pt.ds_imagem ds_imagem_entrada,";
        $sql.="       agp.hr_turno_dom,";        
        $sql.="       agp.hr_turno_seg,";        
        $sql.="       agp.hr_turno_ter,";        
        $sql.="       agp.hr_turno_qua,";        
        $sql.="       agp.hr_turno_qui,";        
        $sql.="       agp.hr_turno_sex,";        
        $sql.="       agp.hr_turno_sab,";        
        $sql.="       agp.hr_turno_dom_saida,";        
        $sql.="       agp.hr_turno_seg_saida,";        
        $sql.="       agp.hr_turno_ter_saida,";        
        $sql.="       agp.hr_turno_qua_saida,";        
        $sql.="       agp.hr_turno_qui_saida,";        
        $sql.="       agp.hr_turno_sex_saida,";        
        $sql.="       agp.hr_turno_sab_saida,";        
        $sql.="       agp.hr_intervalo_seg,";              
        $sql.="       agp.hr_intervalo_ter,";              
        $sql.="       agp.hr_intervalo_qua,";              
        $sql.="       agp.hr_intervalo_qui,";              
        $sql.="       agp.hr_intervalo_sex,";              
        $sql.="       agp.hr_intervalo_sab,";              
        $sql.="       agp.hr_intervalo_saida_seg,";              
        $sql.="       agp.hr_intervalo_saida_ter,";              
        $sql.="       agp.hr_intervalo_saida_qua,";              
        $sql.="       agp.hr_intervalo_saida_qui,";              
        $sql.="       agp.hr_intervalo_saida_sex,";              
        $sql.="       agp.hr_intervalo_saida_sab,";              
        $sql.="       agp.ic_dom,";        
        $sql.="       agp.ic_seg,";        
        $sql.="       agp.ic_ter,";        
        $sql.="       agp.ic_qua,";        
        $sql.="       agp.ic_qui,";        
        $sql.="       agp.ic_sex,";        
        $sql.="       agp.ic_sab,";          
        $sql.="       pt.ds_imagem ds_imagem_saida,";   
        $sql.="       psl.ds_imagem ds_imagem_sistema";
        $sql.="  FROM ponto pt";
        $sql.="       INNER JOIN colaboradores col ON pt.colaborador_pk = col.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on col.pk = cps.colaboradores_pk";
        $sql.="       INNER JOIN produtos_servicos ps ON cps.produtos_servicos_pk = ps.pk"; 
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON pt.colaborador_pk = agp.colaboradores_pk";
        $sql.="       INNER JOIN processos_etapas pe ON pe.pk = agp.processos_etapas_pk";
        $sql.="       INNER JOIN processos p ON pe.processos_pk = p.pk";
        $sql.="       INNER JOIN leads l ON p.leads_pk = l.pk";
        
        $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
        $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
        
        
        
          
       
        $sql.="       left join ponto_solicitacao_liberacao_app psl on col.pk = psl.colaborador_pk";
        $sql.=" where 1=1 ";
 
        $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." ".$hr_entrada."' and '".DataYMD($dt_fim)." ".$hr_saida."'";
        
        if($leads_pk != ""){
            $sql.=" and l.pk = ".$leads_pk;
        }
        
        if($colaborador_pk != ""){
            $sql.=" and col.pk  = ".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and p.leads_pk = ".$leads_pk;
        }
        /*if($ic_inverter_folga==""){
            if($diasemana_numero==0){
                $sql.=" and agp.ic_dom =1";
            }
            if($diasemana_numero==1){
                $sql.=" and agp.ic_seg =1";
            }
            if($diasemana_numero==2){
                $sql.=" and agp.ic_ter =1";
            }
            if($diasemana_numero==3){
                $sql.=" and agp.ic_qua =1";
            }
            if($diasemana_numero==4){
                $sql.=" and agp.ic_qui =1";
            }
            if($diasemana_numero==5){
                $sql.=" and agp.ic_sex =1";
            }
            if($diasemana_numero==6){
                $sql.=" and agp.ic_sab =1";
            }
        }*/
        $sql.=" and agp.dt_cancelamento is null";
        
                
        $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
        $sql.=" order by col.ds_colaborador, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
       
        
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    public function relatorioPontoSintetica($leads_pk,$colaborador_pk,$dt_ini,$dt_fim,$diasemana_numero,$ic_inverter_folga,$qtde_lead_colaborador){
        if($qtde_lead_colaborador > 1){
            $sql ="";
            $sql.="SELECT ";
            if($diasemana_numero==0){
                $sql.="       agp.hr_turno_dom hr_entrada,";  
                $sql.="       agp.hr_turno_dom_saida hr_saida"; 
            }
            if($diasemana_numero==1){
                $sql.="       agp.hr_turno_seg hr_entrada,";  
                $sql.="       agp.hr_turno_seg_saida hr_saida"; 
            }
            if($diasemana_numero==2){
                $sql.="       agp.hr_turno_ter hr_entrada,";  
                $sql.="       agp.hr_turno_ter_saida hr_saida"; 
            }
            if($diasemana_numero==3){
                $sql.="       agp.hr_turno_qua hr_entrada,";  
                $sql.="       agp.hr_turno_qua_saida hr_saida"; 
            }
            if($diasemana_numero==4){
                $sql.="       agp.hr_turno_qui hr_entrada,";  
                $sql.="       agp.hr_turno_qui_saida hr_saida"; 
            }
            if($diasemana_numero==5){
                $sql.="       agp.hr_turno_sex hr_entrada,";  
                $sql.="       agp.hr_turno_sex_saida hr_saida"; 
            }
            if($diasemana_numero==6){
                $sql.="       agp.hr_turno_sab hr_entrada,";  
                $sql.="       agp.hr_turno_sab_saida hr_saida"; 
            }

            $sql.="  FROM leads l";
            $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
            $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
            $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
            $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
            $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
            $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";    
            $sql.="       INNER JOIN ponto pt ON col.pk = pt.colaborador_pk";
            $sql.=" where 1=1 ";

            $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";

            if($leads_pk != ""){
                $sql.=" and l.pk = ".$leads_pk;
            }

            if($colaborador_pk != ""){
                $sql.=" and col.pk  = ".$colaborador_pk;
            }
            if($leads_pk != ""){
                $sql.=" and p.leads_pk = ".$leads_pk;
            }
            /*if($ic_inverter_folga==""){
                if($diasemana_numero==0){
                    $sql.=" and agp.ic_dom =1";
                }
                if($diasemana_numero==1){
                    $sql.=" and agp.ic_seg =1";
                }
                if($diasemana_numero==2){
                    $sql.=" and agp.ic_ter =1";
                }
                if($diasemana_numero==3){
                    $sql.=" and agp.ic_qua =1";
                }
                if($diasemana_numero==4){
                    $sql.=" and agp.ic_qui =1";
                }
                if($diasemana_numero==5){
                    $sql.=" and agp.ic_sex =1";
                }
                if($diasemana_numero==6){
                    $sql.=" and agp.ic_sab =1";
                }
            }*/
            $sql.=" and agp.dt_cancelamento is null";


            $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
            $sql.=" order by col.ds_colaborador, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
            

            $query1 = $this->db->execQuery($sql);
            
            if($query1[0]['hr_entrada']!=""){
                $arrEntrada = explode(":",$query1[0]['hr_entrada']);
                $arrSaida = explode(":",$query1[0]['hr_saida']);
                if($arrEntrada[0] > $arrSaida[0]){
                    $hr_entrada = ("00:00:00");
                    $hr_saida = ("23:59:59");
                }
                else{
                    
                    if($arrEntrada[1] < 30){
                        $hr_entrada = ($arrEntrada[0]-1).":".($arrSaida[1]+29).":00";
                    }
                  
                    else if($arrEntrada[0] > 11){
                        
                        //$hr_entrada = ($arrEntrada[0]-1).":25:00";
                        $hr_entrada = ($arrEntrada[0]-1).":30:00";
                    }
                    else{
                       
                        $hr_entrada = ($arrEntrada[0]).":05:00";
                    }
                    if($arrSaida[1] <= 30){
                        $hr_saida = ($arrSaida[0]).":".($arrSaida[1]+19).":59";
                    }
                    else{
                       $hr_saida = ($arrSaida[0]).":".($arrSaida[1]+45).":59";
                    }
                }

            }
            else{

                $hr_entrada = ("00:00:00");
                $hr_saida = ("00:00:00");
            }
        }
        else{

            $hr_entrada = ("00:00:00");
            $hr_saida = ("23:59:59");
        }
        
        
        
        $sql ="";
        $sql.="SELECT l.pk,";
        $sql.="       l.ds_lead,";
        $sql.="       col.pk colaboradores_pk,";
        $sql.="       concat(l.ds_endereco,', ',l.ds_cidade,' - ',l.ds_uf)ds_local_trabalho,";
        $sql.="       col.ds_re,";
        $sql.="       col.ds_pin,";
        $sql.="       col.ds_colaborador,";
        $sql.="       ps.ds_produto_servico,";
        $sql.="       pt.tipo_ponto_pk,";
        $sql.="       ci.periodo,";
        $sql.="       ci.n_qtde_dias_semana, ";      
        $sql.="       date_format(pt.dt_hora_ponto,'%Y-%m-%d') dt_hora_ponto,";
        $sql.="       date_format(pt.dt_hora_ponto,'%d/%m/%Y') dt_rh_entratada,";
        $sql.="       date_format(pt.dt_hora_ponto,'%H:%i:%s') hr_entrada,";
        $sql.="       pt.ds_total_horas_trabalhadas,";         
        $sql.="       pt.ds_localizacao,";
        $sql.="       pt.ds_imagem ds_imagem_entrada,";
        $sql.="       agp.hr_turno_dom,";        
        $sql.="       agp.hr_turno_seg,";        
        $sql.="       agp.hr_turno_ter,";        
        $sql.="       agp.hr_turno_qua,";        
        $sql.="       agp.hr_turno_qui,";        
        $sql.="       agp.hr_turno_sex,";        
        $sql.="       agp.hr_turno_sab,";        
        $sql.="       agp.hr_turno_dom_saida,";        
        $sql.="       agp.hr_turno_seg_saida,";        
        $sql.="       agp.hr_turno_ter_saida,";        
        $sql.="       agp.hr_turno_qua_saida,";        
        $sql.="       agp.hr_turno_qui_saida,";        
        $sql.="       agp.hr_turno_sex_saida,";        
        $sql.="       agp.hr_turno_sab_saida,";        
        $sql.="       agp.hr_intervalo_seg,";              
        $sql.="       agp.hr_intervalo_ter,";              
        $sql.="       agp.hr_intervalo_qua,";              
        $sql.="       agp.hr_intervalo_qui,";              
        $sql.="       agp.hr_intervalo_sex,";              
        $sql.="       agp.hr_intervalo_sab,";              
        $sql.="       agp.hr_intervalo_saida_seg,";              
        $sql.="       agp.hr_intervalo_saida_ter,";              
        $sql.="       agp.hr_intervalo_saida_qua,";              
        $sql.="       agp.hr_intervalo_saida_qui,";              
        $sql.="       agp.hr_intervalo_saida_sex,";              
        $sql.="       agp.hr_intervalo_saida_sab,";              
        $sql.="       agp.ic_dom,";        
        $sql.="       agp.ic_seg,";        
        $sql.="       agp.ic_ter,";        
        $sql.="       agp.ic_qua,";        
        $sql.="       agp.ic_qui,";        
        $sql.="       agp.ic_sex,";        
        $sql.="       agp.ic_sab,";          
        $sql.="  FROM ponto pt";
        $sql.="       INNER JOIN colaboradores col ON pt.colaborador_pk = col.pk";
        $sql.="       inner join colaboradores_produtos_servicos cps on col.pk = cps.colaboradores_pk";
        $sql.="       INNER JOIN produtos_servicos ps ON cps.produtos_servicos_pk = ps.pk"; 
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON pt.colaborador_pk = agp.colaboradores_pk";
        $sql.="       INNER JOIN processos_etapas pe ON pe.pk = agp.processos_etapas_pk";
        $sql.="       INNER JOIN processos p ON pe.processos_pk = p.pk";
        $sql.="       INNER JOIN leads l ON p.leads_pk = l.pk";
        
        $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
        $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
        
        $sql.=" where 1=1 ";
 
        $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." ".$hr_entrada."' and '".DataYMD($dt_fim)." ".$hr_saida."'";
        
        if($leads_pk != ""){
            $sql.=" and l.pk = ".$leads_pk;
        }
        
        if($colaborador_pk != ""){
            $sql.=" and col.pk  = ".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and p.leads_pk = ".$leads_pk;
        }
        /*if($ic_inverter_folga==""){
            if($diasemana_numero==0){
                $sql.=" and agp.ic_dom =1";
            }
            if($diasemana_numero==1){
                $sql.=" and agp.ic_seg =1";
            }
            if($diasemana_numero==2){
                $sql.=" and agp.ic_ter =1";
            }
            if($diasemana_numero==3){
                $sql.=" and agp.ic_qua =1";
            }
            if($diasemana_numero==4){
                $sql.=" and agp.ic_qui =1";
            }
            if($diasemana_numero==5){
                $sql.=" and agp.ic_sex =1";
            }
            if($diasemana_numero==6){
                $sql.=" and agp.ic_sab =1";
            }
        }*/
        $sql.=" and agp.dt_cancelamento is null";
        
                
        $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
        $sql.=" order by col.ds_colaborador, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
       
        
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    public function relatorioPontoSistema($leads_pk,$colaborador_pk,$dt_ini,$dt_fim,$diasemana_numero,$ic_inverter_folga,$qtde_lead_colaborador){
        if($qtde_lead_colaborador > 1){
            $sql ="";
            $sql.="SELECT ";
            if($diasemana_numero==0){
                $sql.="       agp.hr_turno_dom hr_entrada,";  
                $sql.="       agp.hr_turno_dom_saida hr_saida"; 
            }
            if($diasemana_numero==1){
                $sql.="       agp.hr_turno_seg hr_entrada,";  
                $sql.="       agp.hr_turno_seg_saida hr_saida"; 
            }
            if($diasemana_numero==2){
                $sql.="       agp.hr_turno_ter hr_entrada,";  
                $sql.="       agp.hr_turno_ter_saida hr_saida"; 
            }
            if($diasemana_numero==3){
                $sql.="       agp.hr_turno_qua hr_entrada,";  
                $sql.="       agp.hr_turno_qua_saida hr_saida"; 
            }
            if($diasemana_numero==4){
                $sql.="       agp.hr_turno_qui hr_entrada,";  
                $sql.="       agp.hr_turno_qui_saida hr_saida"; 
            }
            if($diasemana_numero==5){
                $sql.="       agp.hr_turno_sex hr_entrada,";  
                $sql.="       agp.hr_turno_sex_saida hr_saida"; 
            }
            if($diasemana_numero==6){
                $sql.="       agp.hr_turno_sab hr_entrada,";  
                $sql.="       agp.hr_turno_sab_saida hr_saida"; 
            }

            $sql.="  FROM leads l";
            $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
            $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
            $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
            $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
            $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
            $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";    
            $sql.="       INNER JOIN ponto pt ON col.pk = pt.colaborador_pk";
            $sql.=" where 1=1 ";

            $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";

            if($leads_pk != ""){
                $sql.=" and l.pk = ".$leads_pk;
            }

            if($colaborador_pk != ""){
                $sql.=" and col.pk  = ".$colaborador_pk;
            }
            if($leads_pk != ""){
                $sql.=" and p.leads_pk = ".$leads_pk;
            }
            /*if($ic_inverter_folga==""){
                if($diasemana_numero==0){
                    $sql.=" and agp.ic_dom =1";
                }
                if($diasemana_numero==1){
                    $sql.=" and agp.ic_seg =1";
                }
                if($diasemana_numero==2){
                    $sql.=" and agp.ic_ter =1";
                }
                if($diasemana_numero==3){
                    $sql.=" and agp.ic_qua =1";
                }
                if($diasemana_numero==4){
                    $sql.=" and agp.ic_qui =1";
                }
                if($diasemana_numero==5){
                    $sql.=" and agp.ic_sex =1";
                }
                if($diasemana_numero==6){
                    $sql.=" and agp.ic_sab =1";
                }
            }*/
            $sql.=" and agp.dt_cancelamento is null";


            $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
            $sql.=" order by col.ds_colaborador, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
            

            $query1 = $this->db->execQuery($sql);

            if($query1[0]['hr_entrada']!=""){
                $arrEntrada = explode(":",$query1[0]['hr_entrada']);
                $arrSaida = explode(":",$query1[0]['hr_saida']);
                if($arrEntrada[0] > $arrSaida[0]){
                    $hr_entrada = ("00:00:00");
                    $hr_saida = ("23:59:59");
                }
                else{
                    if($arrEntrada[1] < 30){
                        $hr_entrada = ($arrEntrada[0]-1).":".($arrSaida[1]+29).":00";
                    }
                    else{
                        $hr_entrada = ($arrEntrada[0]).":05:00";
                    }
                    if($arrSaida[1] <= 30){
                        $hr_saida = ($arrSaida[0]).":".($arrSaida[1]+19).":59";
                    }
                    else{
                       $hr_saida = ($arrSaida[0]).":".($arrSaida[1]+45).":59";
                    }
                }

            }
            else{

                $hr_entrada = ("00:00:00");
                $hr_saida = ("23:59:59");
            }
        }
        else{

            $hr_entrada = ("00:00:00");
            $hr_saida = ("23:59:59");
        }
        
        
        
        $sql ="";
        $sql.="SELECT l.pk,";
        $sql.="       l.ds_lead,";
        $sql.="       col.pk colaboradores_pk,";
        $sql.="       concat(l.ds_endereco,', ',l.ds_cidade,' - ',l.ds_uf)ds_local_trabalho,";
        $sql.="       col.ds_re,";
        $sql.="       col.ds_pin,";
        $sql.="       col.ds_colaborador,";
        $sql.="       ps.ds_produto_servico,";
        $sql.="       pt.tipo_ponto_pk,";
        $sql.="       ci.periodo,";
        $sql.="       ci.n_qtde_dias_semana, ";      
        $sql.="       date_format(pt.dt_hora_ponto,'%Y-%m-%d') dt_hora_ponto,";
        $sql.="       date_format(pt.dt_hora_ponto,'%d/%m/%Y') dt_rh_entratada,";
        $sql.="       date_format(pt.dt_hora_ponto,'%H:%i:%s') hr_entrada,";
        $sql.="       pt.ds_total_horas_trabalhadas,";         
        $sql.="       pt.ds_localizacao,";
        $sql.="       pt.ds_imagem ds_imagem_entrada,";
        $sql.="       agp.hr_turno_dom,";        
        $sql.="       agp.hr_turno_seg,";        
        $sql.="       agp.hr_turno_ter,";        
        $sql.="       agp.hr_turno_qua,";        
        $sql.="       agp.hr_turno_qui,";        
        $sql.="       agp.hr_turno_sex,";        
        $sql.="       agp.hr_turno_sab,";        
        $sql.="       agp.hr_turno_dom_saida,";        
        $sql.="       agp.hr_turno_seg_saida,";        
        $sql.="       agp.hr_turno_ter_saida,";        
        $sql.="       agp.hr_turno_qua_saida,";        
        $sql.="       agp.hr_turno_qui_saida,";        
        $sql.="       agp.hr_turno_sex_saida,";        
        $sql.="       agp.hr_turno_sab_saida,";        
        $sql.="       agp.hr_intervalo_seg,";              
        $sql.="       agp.hr_intervalo_ter,";              
        $sql.="       agp.hr_intervalo_qua,";              
        $sql.="       agp.hr_intervalo_qui,";              
        $sql.="       agp.hr_intervalo_sex,";              
        $sql.="       agp.hr_intervalo_sab,";              
        $sql.="       agp.hr_intervalo_saida_seg,";              
        $sql.="       agp.hr_intervalo_saida_ter,";              
        $sql.="       agp.hr_intervalo_saida_qua,";              
        $sql.="       agp.hr_intervalo_saida_qui,";              
        $sql.="       agp.hr_intervalo_saida_sex,";              
        $sql.="       agp.hr_intervalo_saida_sab,";              
        $sql.="       agp.ic_dom,";        
        $sql.="       agp.ic_seg,";        
        $sql.="       agp.ic_ter,";        
        $sql.="       agp.ic_qua,";        
        $sql.="       agp.ic_qui,";        
        $sql.="       agp.ic_sex,";        
        $sql.="       agp.ic_sab,";          
        $sql.="       pt.ds_imagem ds_imagem_saida,";   
        $sql.="       psl.ds_imagem ds_imagem_sistema";
        $sql.="  FROM leads l";
        $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
        $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
        $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
        $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
        $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";
        $sql.="       INNER JOIN produtos_servicos ps ON ci.produtos_servicos_pk = ps.pk";        
        $sql.="       INNER JOIN ponto pt ON col.pk = pt.colaborador_pk";
        $sql.="       left join ponto_solicitacao_liberacao_app psl on col.pk = psl.colaborador_pk";
        $sql.=" where 1=1 ";
 
        $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." ".$hr_entrada."' and '".DataYMD($dt_fim)." ".$hr_saida."'";
        
        if($leads_pk != ""){
            $sql.=" and l.pk = ".$leads_pk;
        }
        
        if($colaborador_pk != ""){
            $sql.=" and col.pk  = ".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and p.leads_pk = ".$leads_pk;
        }
        /*if($ic_inverter_folga==""){
            if($diasemana_numero==0){
                $sql.=" and agp.ic_dom =1";
            }
            if($diasemana_numero==1){
                $sql.=" and agp.ic_seg =1";
            }
            if($diasemana_numero==2){
                $sql.=" and agp.ic_ter =1";
            }
            if($diasemana_numero==3){
                $sql.=" and agp.ic_qua =1";
            }
            if($diasemana_numero==4){
                $sql.=" and agp.ic_qui =1";
            }
            if($diasemana_numero==5){
                $sql.=" and agp.ic_sex =1";
            }
            if($diasemana_numero==6){
                $sql.=" and agp.ic_sab =1";
            }
        }*/
        $sql.=" and agp.dt_cancelamento is null";
        $sql.=" and pt.ic_dispositivo is null";
        
                
        $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
        $sql.=" order by col.ds_colaborador, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
        
        
        
       
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    public function PopUpAtraso($dt_ini,$dt_fim,$diasemana_numero,$ic_inverter_folga){
        
        $sql="";
        $sql.="select colaborador_pk from ponto where dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59' group by colaborador_pk";
        
        $query1 = $this->db->execQuery($sql);
        $strColaborador = "(";
        if(count($query1)>0){
            for($i=0;$i<count($query1);$i++){
            $strColaborador .= $query1[$i]['colaborador_pk'].",";
            }
        }
        $strColaborador .= "0)";
        
        
        
        $sql ="";
        $sql.="SELECT l.pk,";
        $sql.="       l.ds_lead,";
        $sql.="       l.ds_tel,";
        $sql.="       col.pk colaboradores_pk,";
        $sql.="       concat(l.ds_endereco,', ',l.ds_cidade,' - ',l.ds_uf)ds_local_trabalho,";
        $sql.="       col.ds_re,";
        $sql.="       col.ds_pin,";
        $sql.="       col.ds_colaborador,";
        $sql.="       col.ds_cel,";
        $sql.="       pt.tipo_ponto_pk,";
        $sql.="       ci.periodo,";
        $sql.="       ci.n_qtde_dias_semana, ";      
        $sql.="       date_format(pt.dt_hora_ponto,'%Y-%m-%d') dt_hora_ponto,";
        $sql.="       date_format(pt.dt_hora_ponto,'%d/%m/%Y') dt_rh_entratada,";
        $sql.="       CURTIME() hr_entrada,";
        $sql.="       agp.hr_turno_dom,";        
        $sql.="       agp.hr_turno_seg,";        
        $sql.="       agp.hr_turno_ter,";        
        $sql.="       agp.hr_turno_qua,";        
        $sql.="       agp.hr_turno_qui,";        
        $sql.="       agp.hr_turno_sex,";        
        $sql.="       agp.hr_turno_sab,";        
        $sql.="       agp.hr_turno_dom_saida,";        
        $sql.="       agp.hr_turno_seg_saida,";        
        $sql.="       agp.hr_turno_ter_saida,";        
        $sql.="       agp.hr_turno_qua_saida,";        
        $sql.="       agp.hr_turno_qui_saida,";        
        $sql.="       agp.hr_turno_sex_saida,";        
        $sql.="       agp.hr_turno_sab_saida,";        
        $sql.="       agp.hr_intervalo_seg,";              
        $sql.="       agp.hr_intervalo_ter,";              
        $sql.="       agp.hr_intervalo_qua,";              
        $sql.="       agp.hr_intervalo_qui,";              
        $sql.="       agp.hr_intervalo_sex,";              
        $sql.="       agp.hr_intervalo_sab,";              
        $sql.="       agp.hr_intervalo_saida_seg,";              
        $sql.="       agp.hr_intervalo_saida_ter,";              
        $sql.="       agp.hr_intervalo_saida_qua,";              
        $sql.="       agp.hr_intervalo_saida_qui,";              
        $sql.="       agp.hr_intervalo_saida_sex,";              
        $sql.="       agp.hr_intervalo_saida_sab,";              
        $sql.="       agp.ic_dom,";        
        $sql.="       agp.ic_seg,";        
        $sql.="       agp.ic_ter,";        
        $sql.="       agp.ic_qua,";        
        $sql.="       agp.ic_qui,";        
        $sql.="       agp.ic_sex,";        
        $sql.="       agp.ic_sab";          
        $sql.="  FROM leads l";
        $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
        $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
        $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
        $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
        $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";    
        $sql.="       left JOIN ponto pt ON col.pk = pt.colaborador_pk";
        $sql.="       inner join ponto_solicitacao_liberacao_app psl on col.pk = psl.colaborador_pk";
        $sql.=" where 1=1 ";
 
        $sql.=" AND agp.dt_inicio_agenda <= '".DataYMD($dt_ini)."'";
        $sql.=" AND agp.dt_fim_agenda >= '".DataYMD($dt_fim)."'";
        $sql.=" and col.pk not in ".$strColaborador;
        if($ic_inverter_folga==""){
            if($diasemana_numero==0){
                $sql.=" and agp.ic_dom =1";
            }
            if($diasemana_numero==1){
                $sql.=" and agp.ic_seg =1";
            }
            if($diasemana_numero==2){
                $sql.=" and agp.ic_ter =1";
            }
            if($diasemana_numero==3){
                $sql.=" and agp.ic_qua =1";
            }
            if($diasemana_numero==4){
                $sql.=" and agp.ic_qui =1";
            }
            if($diasemana_numero==5){
                $sql.=" and agp.ic_sex =1";
            }
            if($diasemana_numero==6){
                $sql.=" and agp.ic_sab =1";
            }
        }
        $sql.=" and agp.dt_cancelamento is null";
        $sql.=" group by l.pk,col.pk";
      
       
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    
    public function folhaPonto($leads_pk,$colaborador_pk,$dt_ini,$dt_fim,$diasemana_numero,$ic_inverter_folga){

        $sql ="";
        $sql.="SELECT l.pk,";
        $sql.="       l.ds_lead,";
        $sql.="       col.pk colaboradores_pk,";
        $sql.="       concat(l.ds_endereco,', ',l.ds_cidade,' - ',l.ds_uf)ds_local_trabalho,";
        $sql.="       col.ds_re,";
        $sql.="       col.ds_pin,";
        $sql.="       col.ds_colaborador,";
        $sql.="       ps.ds_produto_servico,";
        $sql.="       pt.pk ponto_pk,";
        $sql.="       pt.tipo_ponto_pk,";
        $sql.="       ci.periodo,";
        $sql.="       ci.n_qtde_dias_semana, ";      
        $sql.="       date_format(pt.dt_hora_ponto,'%d/%m/%Y') dt_hora_ponto,";
        $sql.="       date_format(pt.dt_hora_ponto,'%d/%m/%Y %H:%i:%s') dt_rh_entratada,";
        $sql.="       date_format(pt.dt_hora_ponto,'%Y-%m-%d %H:%i:%s') dt_hora_ponto_registro_folha,";
        $sql.="       date_format(pt.dt_hora_ponto,'%H:%i:%s') hr_entrada,";
        $sql.="       pt.ds_total_horas_trabalhadas,";         
        $sql.="       pt.ds_localizacao,";
        $sql.="       pt.ds_imagem ds_imagem_entrada,";
        $sql.="       agp.hr_turno_dom,";        
        $sql.="       agp.hr_turno_seg,";        
        $sql.="       agp.hr_turno_ter,";        
        $sql.="       agp.hr_turno_qua,";        
        $sql.="       agp.hr_turno_qui,";        
        $sql.="       agp.hr_turno_sex,";        
        $sql.="       agp.hr_turno_sab,";        
        $sql.="       agp.hr_turno_dom_saida,";        
        $sql.="       agp.hr_turno_seg_saida,";        
        $sql.="       agp.hr_turno_ter_saida,";        
        $sql.="       agp.hr_turno_qua_saida,";        
        $sql.="       agp.hr_turno_qui_saida,";        
        $sql.="       agp.hr_turno_sex_saida,";        
        $sql.="       agp.hr_turno_sab_saida,";        
        $sql.="       agp.ic_dom,";        
        $sql.="       agp.ic_seg,";        
        $sql.="       agp.ic_ter,";        
        $sql.="       agp.ic_qua,";        
        $sql.="       agp.ic_qui,";        
        $sql.="       agp.ic_sex,";        
        $sql.="       agp.ic_sab,";          
        /*$sql.="       date_format(aca.dt_inicio_pausa,'%d/%m/%Y') dt_ferias,";          
        $sql.="       date_format(cf.dt_escala,'%d/%m/%Y') dt_falta,";    */      
        $sql.="       date_format(che.dt_escala,'%d/%m/%Y') dt_hora_extra,";               
        $sql.="       concat(che.hr_extra_ini+' / '+che.hr_extra_fim)hr_extra,";          
        $sql.="       pt.ds_imagem ds_imagem_saida,"; 
        $sql.="       psl.ds_imagem ds_imagem_sistema";
        $sql.="  FROM leads l";
        $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
        $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
        $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
        $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
        $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";
        $sql.="       INNER JOIN produtos_servicos ps ON ci.produtos_servicos_pk = ps.pk";        
        $sql.="       INNER JOIN ponto pt ON col.pk = pt.colaborador_pk";
        //$sql.="       left JOIN agenda_colaborador_pausa aca ON aca.colaboradores_pk = pt.colaborador_pk";
        //$sql.="       left join colaboradores_faltas cf on pt.colaborador_pk = cf.colaborador_pk";
        $sql.="       left join colaboradores_hora_extra che on pt.colaborador_pk = che.colaborador_pk";
        $sql.="       left join ponto_solicitacao_liberacao_app psl on col.pk = psl.colaborador_pk";
        
        $sql.=" where 1=1 ";
 
        //$sql.=" and pt.dt_hora_ponto between '2021-06-21 00:00:00' and '2021-06-21 23:59:59'";
        $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
        
        if($leads_pk != ""){
            $sql.=" and l.pk = ".$leads_pk;
        }
        
        if($colaborador_pk != ""){
            $sql.=" and col.pk  = ".$colaborador_pk;
        }
        /*if($ic_inverter_folga==""){
            if($diasemana_numero==0){
                $sql.=" and agp.ic_dom =1";
            }
            if($diasemana_numero==1){
                $sql.=" and agp.ic_seg =1";
            }
            if($diasemana_numero==2){
                $sql.=" and agp.ic_ter =1";
            }
            if($diasemana_numero==3){
                $sql.=" and agp.ic_qua =1";
            }
            if($diasemana_numero==4){
                $sql.=" and agp.ic_qui =1";
            }
            if($diasemana_numero==5){
                $sql.=" and agp.ic_sex =1";
            }
            if($diasemana_numero==6){
                $sql.=" and agp.ic_sab =1";
            }
        }*/
        //$sql.=" and agp.dt_cancelamento is null";
        
        $sql.=" group by DATE_FORMAT(pt.dt_hora_ponto, '%H:%i:%s'),pt.tipo_ponto_pk ";
        $sql.=" order by col.pk, date_format(pt.dt_hora_ponto,'%H:%i:%s') asc ";
        
        
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    
    public function relatorioFalta($leads_pk,$colaborador_pk,$dt_base){

        $sql ="";
        $sql.="SELECT count(0)registros ";       
        $sql.="  FROM leads l";
        $sql.="       INNER JOIN processos p ON l.pk = p.leads_pk";
        $sql.="       INNER JOIN processos_etapas pe ON p.pk = pe.processos_pk";
        $sql.="       INNER JOIN contratos c ON pe.pk = c.processos_etapas_pk";
        $sql.="       INNER JOIN contratos_itens ci ON c.pk = ci.contratos_pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON ci.pk = agp.contratos_itens_pk";
        $sql.="       INNER JOIN colaboradores col ON agp.colaboradores_pk = col.pk";
        $sql.="       INNER JOIN produtos_servicos ps ON ci.produtos_servicos_pk = ps.pk";        
        $sql.="       LEFT JOIN ponto pt ON col.pk = pt.colaborador_pk AND pt.tipo_ponto_pk = 1";
        
        $sql.=" where 1=1 ";
 
        $sql.=" and pt.dt_hora_ponto between '".DataYMD($dt_base)." 00:00:00' and '".DataYMD($dt_base)." 23:59:59'";
        
        if($leads_pk != ""){
            $sql.=" and l.pk = ".$leads_pk;
        }
        
        if($colaborador_pk != ""){
            $sql.=" and col.pk  = ".$colaborador_pk;
        }
        
        $sql.=" order by l.ds_lead asc ";
        
        $query = $this->db->execQuery($sql);
        return $query;

    }    
    

    public function listar_por_ds_pin($ds_pin){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk ";

        $sql.="  from ponto ";
        $sql.=" where 1=1 ";
        if($ds_pin != ""){
            $sql.=" and ds_ponto like '%".$ds_pin."%' ";
        }
        $sql.=" order by ds_pin asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function carregarColaborador($colaborador_pk,$dt_ini,$dt_fim,$leads_pk){

        $sql ="";
        $sql.="select p.pk, p.dt_cadastro, p.usuario_cadastro_pk, p.dt_ult_atualizacao, p.usuario_ult_atualizacao_pk ";
        $sql.="       ,p.ds_pin ";
        $sql.="       ,p.colaborador_pk ";
        $sql.="       ,p.tipo_ponto_pk ";
        $sql.="       ,p.dt_hora_ponto ";
        $sql.="       ,p.ds_localizacao ";
        $sql.="       ,p.ds_imagem ";
        $sql.="       ,p.ponto_origem_pk ";
        $sql.="       ,agp.ic_folga_inverter ";
        $sql.="       ,pro.leads_pk";
        $sql.="       ,date_format(p.dt_hora_ponto,'%d/%m/%Y') dt_ponto";

        $sql.="  from ponto p";
        $sql.="       inner join colaboradores c on p.colaborador_pk = c.pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON p.colaborador_pk = agp.colaboradores_pk";
        $sql.="       INNER JOIN processos_etapas pe ON agp.processos_etapas_pk = pe.pk";
        $sql.="       INNER JOIN processos pro ON pe.processos_pk = pro.pk";
        
        $sql.=" where 1=1 ";
        $sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
        //$sql.=" and p.dt_hora_ponto between '2021-06-21 00:00:00' and '2021-06-21 23:59:59'";        
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and pro.leads_pk  =".$leads_pk;
        }
        $sql.=" and agp.dt_cancelamento is null";
        if($colaborador_pk!=""){
            $sql.=" group by pro.leads_pk, date_format(p.dt_hora_ponto,'%d/%m/%Y')";
            $sql.=" ORDER BY c.ds_colaborador";
        }
        else{
            $sql.=" group by c.pk,pro.leads_pk,date_format(p.dt_hora_ponto,'%d/%m/%Y')";
            $sql.=" ORDER BY c.ds_colaborador,p.dt_hora_ponto";
        }
        //echo $sql."<br>";
        
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function carregarColaboradorSalvarRegistroPontoFolha($colaborador_pk,$dt_ini,$dt_fim,$leads_pk){

        $sql ="";
        $sql.="select p.pk, p.dt_cadastro, p.usuario_cadastro_pk, p.dt_ult_atualizacao, p.usuario_ult_atualizacao_pk ";
        $sql.="       ,p.ds_pin ";
        $sql.="       ,p.colaborador_pk ";
        $sql.="       ,p.tipo_ponto_pk ";
        $sql.="       ,p.dt_hora_ponto ";
        $sql.="       ,p.ds_localizacao ";
        $sql.="       ,p.ds_imagem ";
        $sql.="       ,p.ponto_origem_pk ";
        $sql.="       ,agp.ic_folga_inverter ";
        $sql.="       ,pro.leads_pk";
        $sql.="       ,date_format(p.dt_hora_ponto,'%d/%m/%Y') dt_ponto";

        $sql.="  from ponto p";
        $sql.="       inner join colaboradores c on p.colaborador_pk = c.pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON p.colaborador_pk = agp.colaboradores_pk";
        $sql.="       INNER JOIN processos_etapas pe ON agp.processos_etapas_pk = pe.pk";
        $sql.="       INNER JOIN processos pro ON pe.processos_pk = pro.pk";
        
        $sql.=" where 1=1 ";
        $sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
                
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and pro.leads_pk  =".$leads_pk;
        }
        //$sql.=" and agp.dt_cancelamento is null";
        //$sql.=" and c.ic_status =1";
       
        //$sql.=" group by pro.leads_pk";
        $sql.=" ORDER BY c.ds_colaborador";
        //echo $sql."<br>";
        
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function carregarColaboradoresSEMLiberacao($colaborador_pk){

        $sql ="";
        $sql.="select count(0)qtde";

        $sql.="  from ponto_solicitacao_liberacao_app p";
        
        $sql.=" where 1=1 ";
       
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        $sql.=" and p.ic_status = 1";
        
        
        
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function carregarQuantidadePostoTrabalhoColavorador($colaborador_pk,$dt_ini,$dt_fim){

        $sql ="";
        $sql.="SELECT ";
        $sql.="            *";
        $sql.="        FROM";
        $sql.="            ponto p";
        $sql.="                INNER JOIN";
        $sql.="            colaboradores c ON p.colaborador_pk = c.pk";
        $sql.="                INNER JOIN";
        $sql.="            agenda_colaborador_padrao agp ON p.colaborador_pk = agp.colaboradores_pk";
        $sql.="                INNER JOIN";
        $sql.="            processos_etapas pe ON agp.processos_etapas_pk = pe.pk";
        $sql.="                INNER JOIN";
        $sql.="            processos pro ON pe.processos_pk = pro.pk";
        $sql.="        WHERE 1 = 1";
        
        $sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
                
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        $sql.=" and agp.dt_cancelamento is null";
        $sql.=" and c.ic_status =1";
        $sql.=" group by pro.leads_pk";
        $sql.=" ORDER BY c.ds_colaborador";
        
        
        
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function carregarQuantidadePostoTrabalhoColaboradorPontoSistema($colaborador_pk,$dt_ini,$dt_fim){

        $sql ="";
        $sql.="SELECT ";
        $sql.="            *";
        $sql.="        FROM";
        $sql.="            ponto p";
        $sql.="                INNER JOIN";
        $sql.="            colaboradores c ON p.colaborador_pk = c.pk";
        $sql.="                INNER JOIN";
        $sql.="            agenda_colaborador_padrao agp ON p.colaborador_pk = agp.colaboradores_pk";
        $sql.="                INNER JOIN";
        $sql.="            processos_etapas pe ON agp.processos_etapas_pk = pe.pk";
        $sql.="                INNER JOIN";
        $sql.="            processos pro ON pe.processos_pk = pro.pk";
        $sql.="        WHERE 1 = 1";
        
        $sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
                
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        $sql.=" and agp.dt_cancelamento is null";
        $sql.=" and c.ic_status =1";
        $sql.=" group by pro.leads_pk";
        $sql.=" ORDER BY c.ds_colaborador";
        
        
        
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }

    public function listarTodos(){

        $sql ="";
        $sql.="select pk, dt_cadastro, usuario_cadastro_pk, dt_ult_atualizacao, usuario_ult_atualizacao_pk ";
        $sql.="       ,ds_pin ";
        $sql.="       ,colaborador_pk ";
        $sql.="       ,tipo_ponto_pk ";
        $sql.="       ,dt_hora_ponto ";
        $sql.="       ,ds_localizacao ";
        $sql.="       ,ds_imagem ";
        $sql.="       ,ponto_origem_pk ";

        $sql.="  from ponto ";
        $sql.=" where 1=1 ";
        $sql.=" order by ds_pin asc ";

        $query = $this->db->execQuery($sql);
        return $query;

    }
    
    public function carregarColaboradorPonto($colaborador_pk,$dt_ini,$dt_fim,$leads_pk){

        $sql ="";
        $sql.="select p.pk, p.dt_cadastro, p.usuario_cadastro_pk, p.dt_ult_atualizacao, p.usuario_ult_atualizacao_pk ";
        $sql.="       ,p.ds_pin ";
        $sql.="       ,p.colaborador_pk ";
        $sql.="       ,p.tipo_ponto_pk ";
        $sql.="       ,p.dt_hora_ponto ";
        $sql.="       ,p.ds_localizacao ";
        $sql.="       ,p.ds_imagem ";
        $sql.="       ,p.ponto_origem_pk ";
        $sql.="       ,agp.ic_folga_inverter ";
        $sql.="       ,pro.leads_pk";
        $sql.="       ,date_format(p.dt_hora_ponto,'%d/%m/%Y') dt_ponto";

        $sql.="  from ponto p";
        $sql.="       inner join colaboradores c on p.colaborador_pk = c.pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON p.colaborador_pk = agp.colaboradores_pk";
        $sql.="       INNER JOIN processos_etapas pe ON agp.processos_etapas_pk = pe.pk";
        $sql.="       INNER JOIN processos pro ON pe.processos_pk = pro.pk";
        
        $sql.=" where 1=1 ";
        $sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
                
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and pro.leads_pk  =".$leads_pk;
        }
        $sql.=" and agp.dt_cancelamento is null";
        $sql.=" and c.ic_status =1";
        if($colaborador_pk!=""){
            $sql.=" group by pro.leads_pk";
            $sql.=" ORDER BY c.ds_colaborador";
        }
        else{
            $sql.=" group by c.pk,pro.leads_pk";
            $sql.=" ORDER BY c.ds_colaborador,p.dt_hora_ponto";
        }
        
        //echo $sql."<br>";
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }
    public function listarColaboradorPontoSistema($colaborador_pk,$dt_ini,$dt_fim,$leads_pk){

        $sql ="";
        $sql.="select p.pk, p.dt_cadastro, p.usuario_cadastro_pk, p.dt_ult_atualizacao, p.usuario_ult_atualizacao_pk ";
        $sql.="       ,p.ds_pin ";
        $sql.="       ,p.colaborador_pk ";
        $sql.="       ,p.tipo_ponto_pk ";
        $sql.="       ,p.dt_hora_ponto ";
        $sql.="       ,p.ds_localizacao ";
        $sql.="       ,p.ds_imagem ";
        $sql.="       ,p.ponto_origem_pk ";
        $sql.="       ,agp.ic_folga_inverter ";
        $sql.="       ,pro.leads_pk";
        $sql.="       ,date_format(p.dt_hora_ponto,'%d/%m/%Y') dt_ponto";

        $sql.="  from ponto p";
        $sql.="       inner join colaboradores c on p.colaborador_pk = c.pk";
        $sql.="       INNER JOIN agenda_colaborador_padrao agp ON p.colaborador_pk = agp.colaboradores_pk";
        $sql.="       INNER JOIN processos_etapas pe ON agp.processos_etapas_pk = pe.pk";
        $sql.="       INNER JOIN processos pro ON pe.processos_pk = pro.pk";
        
        $sql.=" where 1=1 ";
        $sql.=" and p.dt_hora_ponto between '".DataYMD($dt_ini)." 00:00:00' and '".DataYMD($dt_fim)." 23:59:59'";
                
        if($colaborador_pk != ""){
            $sql.=" and p.colaborador_pk  =".$colaborador_pk;
        }
        if($leads_pk != ""){
            $sql.=" and pro.leads_pk  =".$leads_pk;
        }
        $sql.=" and agp.dt_cancelamento is null";
        $sql.=" and c.ic_status =1";
        if($colaborador_pk!=""){
            $sql.=" group by pro.leads_pk";
            $sql.=" ORDER BY c.ds_colaborador";
        }
        else{
            $sql.=" group by c.pk,pro.leads_pk";
            $sql.=" ORDER BY c.ds_colaborador,p.dt_hora_ponto";
        }
        
        //echo $sql."<br>";
       
       
        
		
        $query = $this->db->execQuery($sql);
        return $query;

    }

}

?>
