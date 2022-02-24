<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/lead.dao.php";
require_once "../model/lead.class.php";
require_once "../model/contato.dao.php";
require_once "../model/contato.class.php";
require_once "../model/cargo.dao.php";
require_once "../model/cargo.class.php";
require_once "../model/movimentacao_estoque.dao.php";
require_once "../model/movimentacao_estoque.class.php";
require_once "../model/lead_imposto.dao.php";
require_once "../model/lead_imposto.class.php";
require_once "../model/lead_desconto.dao.php";
require_once "../model/lead_desconto.class.php";
require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";

require_once "../model/conjunto_material.dao.php";
require_once "../model/conjunto_material.class.php";

$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_lead = $arrRequest['ds_lead'];
$ds_endereco = $arrRequest['ds_endereco'];
$ds_numero = $arrRequest['ds_numero'];
$ds_complemento = $arrRequest['ds_complemento'];
$ds_cep = $arrRequest['ds_cep'];
$ds_bairro = $arrRequest['ds_bairro'];
$ds_cidade = $arrRequest['ds_cidade'];
$ds_uf = $arrRequest['ds_uf'];
$ic_cliente = $arrRequest['ic_cliente'];
$n_qtde_torres = $arrRequest['n_qtde_torres'];
$ds_obs = $arrRequest['ds_obs'];
$leads_pai_pk = $arrRequest['leads_pai_pk'];
$ic_tipo_lead = $arrRequest['ic_tipo_lead'];

$ds_razao_social = $arrRequest['ds_razao_social'];
$ds_cpf_cnpj = $arrRequest['ds_cpf_cnpj'];
$ds_ie = $arrRequest['ds_ie'];
$ds_tel = $arrRequest['ds_tel'];
$ds_fax = $arrRequest['ds_fax'];
$ds_site = $arrRequest['ds_site'];
$ds_email = $arrRequest['ds_email'];
$supervisores_pk = $arrRequest['supervisores_pk'];
$responsavel_pk = $arrRequest['responsavel_pk'];
$segmentos_pk = $arrRequest['segmentos_pk'];
$dt_vencimento = $arrRequest['dt_vencimento'];
$imposto_pk = $arrRequest['imposto_pk'];
$descontos_pk = $arrRequest['descontos_pk'];

$leaddao = new leaddao();
$leaddao->setToken($token);
$contatodao = new contatodao();
$contatodao->setToken($token);
$cargodao = new cargodao();
$cargodao->setToken($token);
$lead_impostodao = new lead_impostodao();
$lead_impostodao->setToken($token);
$lead_descontodao = new lead_descontodao();
$lead_descontodao->setToken($token);

$movimentacao_estoquedao = new movimentacao_estoquedao();
$movimentacao_estoquedao->setToken($token);

$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);



$conjunto_materialdao = new conjunto_materialdao();
$conjunto_materialdao->setToken($token); 

switch($job){
    case 'excluir':{
        if(!permissao("lead", "del", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultdo = "";
        
        $lead = $leaddao->carregarPorPk($pk);
        
        
        
        if($lead->getpk()>0){
            
            //QUERY PARA VERIFICAR A PK DOS CONTATOS 
            $pk_contatos = $leaddao->listarPkContato($lead->getpk());
            
            if(count($pk_contatos)>0){
                for($i=0;$i<count($pk_contatos);$i++){
                    $log_exclusaodao->salvar("contatos", $pk_contatos[$i]['pk']);
                }
            }
            
            // QUERY PARA VERIFICAR A QUERY DE MOVIMENTACAO ESTOQUE 
            $pk_movimentacao_estoque = $leaddao->listarPkMovimentacaoEstoque($lead->getpk());
            
            if(count($pk_movimentacao_estoque)>0){
                for($i=0;$i<count($pk_movimentacao_estoque);$i++){
                    $log_exclusaodao->salvar("movimentacao_estoque", $pk_movimentacao_estoque[$i]['pk']);
                }
            }
            
            
            
            //QUERY PARA VERIFICAR O IMPOSTO 
            $pk_leads_impostos = $leaddao->listarPkLeadsImpostos($lead->getpk());
            
            if(count($pk_leads_impostos)>0){
                for($i=0;$i<count($pk_leads_impostos);$i++){
                    $log_exclusaodao->salvar("leads_impostos", $pk_leads_impostos[$i]['pk']);
                }
            }
            
            //QUERY PARA VERIFICAR A PARTE DE PROCESSOS E VINCULADAS
            
            //CONTRATOS_ITENS
            $pk_contratos_itens = $leaddao->listarPkContratosItens($lead->getpk());
            
            if(count($pk_contratos_itens)>0){
                for($i=0;$i<count($pk_contratos_itens);$i++){
                    $log_exclusaodao->salvar("contratos_itens", $pk_contratos_itens[$i]['pk']);
                }
            }
            //CONTRATOS
            $pk_contratos= $leaddao->listarPkContratos($lead->getpk());
            
            if(count($pk_contratos)>0){
                for($i=0;$i<count($pk_contratos);$i++){
                    $log_exclusaodao->salvar("contratos", $pk_contratos[$i]['pk']);
                }
            }
            
            //PROPOSTAS_ITENS
            $pk_propostas_itens = $leaddao->listarPkPropostasItens($lead->getpk());
            
            if(count($pk_propostas_itens )>0){
                for($i=0;$i<count($pk_propostas_itens );$i++){
                    $log_exclusaodao->salvar("propostas_itens", $pk_propostas_itens [$i]['pk']);
                }
            }
            //PROPOSTAS
            $pk_propostas= $leaddao->listarPkPropostas($lead->getpk());
            
            if(count($pk_propostas)>0){
                for($i=0;$i<count($pk_propostas);$i++){
                    $log_exclusaodao->salvar("propostas", $pk_propostas[$i]['pk']);
                }
            }
            //AGENDA COLABORADOR PADRAO
            $pk_agenda_colaborador_padrao= $leaddao->listarPkAgendaColaboradorPadrao($lead->getpk());
            
            if(count($pk_agenda_colaborador_padrao)>0){
                for($i=0;$i<count($pk_agenda_colaborador_padrao);$i++){
                    $log_exclusaodao->salvar("agenda_colaborador_padrao", $pk_agenda_colaborador_padrao[$i]['pk']);
                }
            }
            //PROCESSOS_ETAPAS
            $pk_processos_etapas= $leaddao->listarPkProcessosEtapas($lead->getpk());
            
            if(count($pk_processos_etapas)>0){
                for($i=0;$i<count($pk_processos_etapas);$i++){
                    $log_exclusaodao->salvar("processos_etapas", $pk_processos_etapas[$i]['pk']);
                }
            }
            //PROCESSOS
            $pk_processos= $leaddao->listarPkProcessos($lead->getpk());
            
            if(count($pk_processos)>0){
                for($i=0;$i<count($pk_processos);$i++){
                    $log_exclusaodao->salvar("processos", $pk_processos[$i]['pk']);
                }
            }
            
            
            
            //QUERY PARA VERIFICAR DOCUMENTOS 
            $pk_documentos= $leaddao->listarPkDocumentos($lead->getpk());
            
            if(count($pk_documentos)>0){
                for($i=0;$i<count($pk_documentos);$i++){
                    $log_exclusaodao->salvar("documentos", $pk_documentos[$i]['pk']);
                }
            }
            
            //QUERY PARA VERIFICAR OCORRENCIA 
            $pk_ocorrencia= $leaddao->listarPkOcorrencia($lead->getpk());
            
            if(count($pk_ocorrencia)>0){
                for($i=0;$i<count($pk_ocorrencia);$i++){
                    $log_exclusaodao->salvar("ocorrencias", $pk_ocorrencia[$i]['pk']);
                }
            }
            
            //LOG_EXCLUSAO LEAD 
            $log_exclusaodao->salvar("leads",$lead->getpk());
            
            //PARTE EXCLUSAO   
            
            $contatodao->excluir($lead->getpk());
            $movimentacao_estoquedao->excluirLead($lead->getpk());
            
            
            
            
            $leaddao->excluirImposto($lead);
            $leaddao->excluirProcesso($lead);
            $leaddao->excluirDocumento($lead);
            $leaddao->excluirOcorrencia($lead);
            $leaddao->excluir($lead);
            
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'lead nao encontrado';
        }
        break;
    }
    case 'salvar':{
        //Contatos Lead
        $contatos_lead = $_REQUEST['contatos_lead'];        
        if($contatos_lead != "")
            $arrContatosLead = json_decode ($contatos_lead, true);
                
        //Materiais Lead
        /*$materiais_lead = $_REQUEST['materiais_lead'];        
        if($materiais_lead != "")
            $arrMateriaisLead = json_decode ($materiais_lead, true);*/
        
        if($imposto_pk != "")
            $arrImpostoLead = json_decode ($imposto_pk, true);
        
        if($descontos_pk != "")
            $arrDescontoLead = json_decode ($descontos_pk, true);
        
        
        $lead = $leaddao->carregarPorPk($pk);
        $lead->setds_lead($ds_lead);
        $lead->setds_endereco($ds_endereco);
        $lead->setds_numero($ds_numero);
        $lead->setds_complemento($ds_complemento);
        $lead->setds_cep($ds_cep);
        $lead->setds_bairro($ds_bairro);
        $lead->setds_cidade($ds_cidade);
        $lead->setds_uf($ds_uf);
        $lead->setic_cliente($ic_cliente);
        $lead->setn_qtde_torres($n_qtde_torres);
        $lead->setds_obs($ds_obs);        
        $lead->setds_razao_social($ds_razao_social);
        $lead->setds_cpf_cnpj($ds_cpf_cnpj);
        $lead->setds_ie($ds_ie);
        $lead->setds_tel($ds_tel);
        $lead->setds_fax($ds_fax);
        $lead->setds_site($ds_site);
        $lead->setds_email($ds_email);
        $lead->setsupervisores_pk($supervisores_pk);
        $lead->setresponsavel_pk($responsavel_pk);
        $lead->setsegmentos_pk($segmentos_pk);
        $lead->setleads_pai_pk($leads_pai_pk);
        $lead->setic_tipo_lead($ic_tipo_lead);
        if($dt_vencimento!=""){
            $lead->setdt_vencimento(DataYMD($dt_vencimento));
        }
        
        $pk = $leaddao->salvar($lead);
        
        //
        if($pk!=""){
            $leads_pk = $pk;
            if(count($arrContatosLead) > 0){
                for($i = 0; $i < count($arrContatosLead); $i++){    
                    $contato = $contatodao->carregarPorPk($arrContatosLead[$i]['contatos_pk']);                    
                    $contato->setds_contato($arrContatosLead[$i]['ds_contato']);
                    $contato->setds_cel($arrContatosLead[$i]['ds_cel']);
                    $contato->setic_whatsapp($arrContatosLead[$i]['ic_whatsapp']);
                    $contato->setds_email($arrContatosLead[$i]['ds_email']);
                    $contato->setds_tel($arrContatosLead[$i]['ds_tel_contato']);
                    $contato->setcargos_pk($arrContatosLead[$i]['cargos_pk']);
                    $contato->setleads_pk($pk);
                    $contatos_pk = $contatodao->salvar($contato);
                        
                }
            }
        }else{            
            $leads_pk = $lead->getpk();
            if(count($arrContatosLead) > 0){
                for($i = 0; $i < count($arrContatosLead); $i++){         
                    $contato = $contatodao->carregarPorPk($arrContatosLead[$i]['contatos_pk']);                                        
                    $contato->setds_contato($arrContatosLead[$i]['ds_contato']);
                    $contato->setds_cel($arrContatosLead[$i]['ds_cel']);
                    $contato->setic_whatsapp($arrContatosLead[$i]['ic_whatsapp']);
                    $contato->setds_email($arrContatosLead[$i]['ds_email']);
                    $contato->setds_tel($arrContatosLead[$i]['ds_tel_contato']);
                    $contato->setcargos_pk($arrContatosLead[$i]['cargos_pk']);
                    $contato->setleads_pk($lead->getpk());
                    $contatos_pk = $contatodao->salvar($contato);                        
                }
            }
        }   
        
        //Materiais
        /*if(count($arrMateriaisLead) > 0){            
            for($i = 0; $i < count($arrMateriaisLead); $i++){                    
                $movimentacao_estoque = $movimentacao_estoquedao->carregarPorPk($arrMateriaisLead[$i]['movimentacao_estoque_pk']);                  
                $movimentacao_estoque->setleads_pk($leads_pk);
                $movimentacao_estoque->setcolaborador_pk("");
                $movimentacao_estoque->setprodutos_itens_pk($arrMateriaisLead[$i]['produtos_itens_pk']);
                $movimentacao_estoque->setqtde("1");
                $movimentacao_estoque->setdt_entrega(DataYMD($arrMateriaisLead[$i]['dt_entrega']));
                if($arrMateriaisLead[$i]['dt_devolucao']!=""){
                    $movimentacao_estoque->setdt_devolucao(DataYMD($arrMateriaisLead[$i]['dt_devolucao']));
                }                
                $movimentacao_estoque->setobs_movimentacao($arrMateriaisLead[$i]['obs_movimentacao']);
                $movimentacao_estoque->setic_mateiral_carga($arrMateriaisLead[$i]['ic_mateiral_carga']);
                
                $movimentacao_pk = $movimentacao_estoquedao->salvar($movimentacao_estoque);
            }
        }*/
        //Imposto
        if(count($arrImpostoLead) > 0){   
            $lead_impostodao->excluirPorLead($leads_pk);
            for($i = 0; $i < count($arrImpostoLead); $i++){     
                if($arrImpostoLead[$i]['imposto_pk']!=""){
                    $lead_imposto = $lead_impostodao->carregarPorPk(0);
                    $lead_imposto->setds_percentual_imposto($arrImpostoLead[$i]['ds_percentual_imposto']);
                    $lead_imposto->setimposto_pk($arrImpostoLead[$i]['imposto_pk']);
                    $lead_imposto->setleads_pk($leads_pk);
                    $imposto_pk = $lead_impostodao->salvar($lead_imposto);
                }
                


               
            }
        }
        $lead_descontodao->excluirPorLead($leads_pk);
        //Desconto
        if(count($arrDescontoLead) > 0){   
            
            
            for($i = 0; $i < count($arrDescontoLead); $i++){     

                if($arrDescontoLead[$i]['ds_desconto']!=""){
                    $lead_desconto = $lead_descontodao->carregarPorPk(0);
                    $lead_desconto->setds_desconto($arrDescontoLead[$i]['ds_desconto']);
                    $lead_desconto->setvl_desconto($arrDescontoLead[$i]['vl_desconto']);
                    if($arrDescontoLead[$i]['dt_base_desconto']!=""){
                        $lead_desconto->setdt_base(DataYMD($arrDescontoLead[$i]['dt_base_desconto']));
                    }
                    $lead_desconto->setleads_pk($leads_pk);
                    
                    $desconto = $lead_descontodao->salvar($lead_desconto);
                }
                


               
            }
        }

        $mysql_data[] = array(
                "pk" => $leads_pk
        );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        if(!permissao("lead", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $leaddao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "n_qtde_torres"=>$query[$i]['n_qtde_torres'],
                    "ds_obs"=>$query[$i]['ds_obs'],
                    
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "ds_ie"=>$query[$i]['ds_ie'],
                    "ds_tel"=>$query[$i]['ds_tel'],
                    "ds_fax"=>$query[$i]['ds_fax'],
                    "ds_site"=>$query[$i]['ds_site'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_ic_cliente"=>$query[$i]['ds_ic_cliente'],
                    "supervisores_pk"=>$query[$i]['supervisores_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "ds_supervisor"=>$query[$i]['ds_supervisor'],
                    "ds_responsavel"=>$query[$i]['ds_responsavel'],
                    "segmentos_pk"=>$query[$i]['segmentos_pk'],
                    "dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    
                    "ic_cliente"=>$query[$i]['ic_cliente']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'salvarMovimentarEstoque':{
        
        $resultado = "";
        $query = $leaddao->listarLeadsComMovimentacao();
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                
                
                
                $query1 = $leaddao->listarDataCadastroMovimentacaoEstoquePorLeadsPk($query[$i]['pk']);
                
                
                
                if(count($query1) > 0){
                    for($j = 0; $j < count($query1); $j++){
                        
                        $conjunto_material = $conjunto_materialdao->carregarPorPk("");
                        $conjunto_material->setleads_pk($query[$i]['pk']);


                        $conjunto_material_pk = $conjunto_materialdao->salvar($conjunto_material);
                        
                        $query2 = $leaddao->listarPkMovimentacaoEstoquePorLeadsPk($query[$i]['pk'],$query1[$j]['dt_cadastro']);
                        
                        
                        
                        if(count($query2) > 0){
                            for($t = 0; $t < count($query2); $t++){
                                $movimentacao_estoque = $movimentacao_estoquedao->carregarPorPk($query2[$t]['pk']);                  
                                $movimentacao_estoque->setconjunto_material_pk($conjunto_material_pk);

                                $movimentacao_pk = $movimentacao_estoquedao->salvar($movimentacao_estoque);
                            }
                        }
                        
                        
                        
                        
                    }
                }
                
                
                
                
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarLeadPai':{
        $resultado = "";
        $query = $leaddao->listarLeadPai();
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "n_qtde_torres"=>$query[$i]['n_qtde_torres'],
                    "ds_obs"=>$query[$i]['ds_obs'],
                    
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "ds_ie"=>$query[$i]['ds_ie'],
                    "ds_tel"=>$query[$i]['ds_tel'],
                    "ds_fax"=>$query[$i]['ds_fax'],
                    "ds_site"=>$query[$i]['ds_site'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "ds_ic_cliente"=>$query[$i]['ds_ic_cliente'],
                    "supervisores_pk"=>$query[$i]['supervisores_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "ds_supervisor"=>$query[$i]['ds_supervisor'],
                    "ds_responsavel"=>$query[$i]['ds_responsavel'],
                    "segmentos_pk"=>$query[$i]['segmentos_pk'],
                    "dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    
                    "ic_cliente"=>$query[$i]['ic_cliente']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarTodos':{
        if(!permissao("lead", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $resultado = "";
        $query = $leaddao->listar_por_ds_lead($ds_lead,'','','','','');
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "n_qtde_torres"=>$query[$i]['n_qtde_torres'],
                    "ds_obs"=>$query[$i]['ds_obs'],
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "ds_ie"=>$query[$i]['ds_ie'],
                    "ds_tel"=>$query[$i]['ds_tel'],
                    "ds_fax"=>$query[$i]['ds_fax'],
                    "ds_site"=>$query[$i]['ds_site'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "supervisores_pk"=>$query[$i]['supervisores_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "ic_cliente"=>$query[$i]['ic_cliente']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'verificarCNPJ':{

        $resultado = "";
        $query = $leaddao->verificarCNPJ($ds_cpf_cnpj);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"]
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTodosAtivo':{

        $resultado = "";
        $query = $leaddao->listarTodosAtivo();
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "n_qtde_torres"=>$query[$i]['n_qtde_torres'],
                    "ds_obs"=>$query[$i]['ds_obs'],
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "ds_ie"=>$query[$i]['ds_ie'],
                    "ds_tel"=>$query[$i]['ds_tel'],
                    "ds_fax"=>$query[$i]['ds_fax'],
                    "ds_site"=>$query[$i]['ds_site'],
                    "ds_email"=>$query[$i]['ds_email'],
                    "supervisores_pk"=>$query[$i]['supervisores_pk'],
                    "responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "ic_cliente"=>$query[$i]['ic_cliente']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTodosConta':{
        $empresas_pk = $_REQUEST['empresas_pk'];
        $resultado = "";
        $query = $leaddao->listarTodosConta($empresas_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                   
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarTodosContaFatura':{
        $empresas_pk = $_REQUEST['empresas_pk'];
        $tipo_contrato_pk = $_REQUEST['tipo_contrato_pk'];
        $resultado = "";
        $query = $leaddao->listarTodosContaFatura($empresas_pk,$tipo_contrato_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                   
                );
            }
        }
        else{
            $mysql_data = [];
        }
			
        
        break;
    }
    case 'listarContatoLead':{
        if(!permissao("lead", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $leads_pk = $_REQUEST['leads_pk'];

        $resultado = "";
        if($leads_pk!=""){
            $query = $contatodao->carregarPorLeadsPk($leads_pk);
        }
        else{
            $mysql_data = [];
        }
        
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_contato"=>$query[$i]['ds_contato'],
                    "t_ds_email"=>$query[$i]['ds_email'],
                    "t_ds_cel"=>$query[$i]['ds_cel'],
                    "t_ds_whatsapp"=>$query[$i]['ds_whatsapp'],
                    "t_ic_whatsapp"=>$query[$i]['ic_whatsapp'],
                    "t_ds_tel"=>$query[$i]['ds_tel'],
                    "t_cargos_pk"=>$query[$i]['cargos_pk'],
                    "t_ds_cargos_pk"=>$query[$i]['ds_cargos_pk'],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_leads_pk"=>$query[$i]['leads_pk'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    
                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;       
        
    }
    
    case 'listarEnderecoPorLead':{
        if($_REQUEST['leads_pk']==""){
            $leads_pk = 0;
        }
        else{
            $leads_pk = $_REQUEST['leads_pk'];
        }
        $resultado = "";
        $query = $leaddao->listarEnderecoPorLeadPk($leads_pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "leads_pk"=>$query[$i]['pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'RelatorioPostoTrabalhoAnalitico':{
        
        $leads_pk = $_REQUEST['leads_pk'];
        $ds_cidade = $_REQUEST['ds_cidade'];
        $ic_tipo_lead = $_REQUEST['ic_tipo_lead'];
        $ic_cliente = $_REQUEST['ic_cliente'];
        
        $resultado = "";
        $query = $leaddao->RelatorioPostoTrabalhoAnalitico($leads_pk,$ds_cidade,$ic_tipo_lead,$ic_cliente);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_cep"=>$query[$i]['ds_cep'],
                    "ds_endereco"=>$query[$i]['ds_endereco'],
                    "ds_numero"=>$query[$i]['ds_numero'],
                    "ds_complemento"=>$query[$i]['ds_complemento'],
                    "ds_bairro"=>$query[$i]['ds_bairro'],
                    "ds_cidade"=>$query[$i]['ds_cidade'],
                    "ds_uf"=>$query[$i]['ds_uf'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ds_tipo_lead"=>$query[$i]['ds_tipo_lead'],
                    "ds_lead_pai"=>$query[$i]['ds_lead_pai'],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "ds_tel"=>$query[$i]['ds_tel'],
                    "ds_supervisor"=>$query[$i]['ds_supervisor'],
                    "ds_segmento"=>$query[$i]['ds_segmento'],
                    "dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "ds_usuario_cadastro"=>$query[$i]['ds_usuario_cadastro'],
                    "leads_pk"=>$query[$i]['pk']
                );
            }
        }
        else{
            $mysql_data = [];
        }
			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarLeadPesquisa':{
       
        $pesquisar= $_REQUEST['pesquisar'];

        $resultado = "";

        $query = $leaddao->listarLeadPesquisa($pesquisar,$token);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_responsavel_pk"=>$query[$i]['responsavel_pk'],
                    "t_ds_endereco"=>$query[$i]['ds_endereco'],
                    "t_ds_responsavel"=>$query[$i]['ds_responsavel'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }

        break;
    }
    case 'listarDataTable':{
        if(!permissao("lead", "cons", $token)){
            $result  = 'error';
            $message = 'Erro de validação';
            $mysql_data = [];

            break;
        }
        $ds_lead = $_REQUEST['ds_lead'];
        $ds_lead_grid = $_REQUEST['ds_lead_grid'];
        $ic_status = $_REQUEST['ic_status'];
        $supervisores_pk = $_REQUEST['supervisores_pk'];
        $responsavel_pk = $_REQUEST['responsavel_pk'];
        $ic_tipo_lead = $_REQUEST['ic_tipo_lead'];
        $resultado = "";
        
        $query = $leaddao->listar_por_ds_lead($ds_lead,$ic_status,$supervisores_pk,$responsavel_pk,$ds_lead_grid,$ic_tipo_lead);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_ds_endereco"=>$query[$i]['ds_endereco'],
                    "t_ds_numero"=>$query[$i]['ds_numero'],
                    "t_ds_complemento"=>$query[$i]['ds_complemento'],
                    "t_ds_cep"=>$query[$i]['ds_cep'],
                    "t_ds_bairro"=>$query[$i]['ds_bairro'],
                    "t_ds_cidade"=>$query[$i]['ds_cidade'],
                    "t_ds_uf"=>$query[$i]['ds_uf'],
                    "t_n_qtde_torres"=>$query[$i]['n_qtde_torres'],
                    "t_ic_cliente"=>$query[$i]['ic_cliente'],
                    "t_ds_obs"=>$query[$i]['ds_obs'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "t_ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "t_ds_ie"=>$query[$i]['ds_ie'],
                    "t_ds_tel"=>$query[$i]['ds_tel'],
                    "t_ds_fax"=>$query[$i]['ds_fax'],
                    "t_ds_site"=>$query[$i]['ds_site'],
                    "t_ds_email"=>$query[$i]['ds_email'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "ds_tipo_lead"=>$query[$i]['ds_tipo_lead'],

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
        break;
    }    
    default:{
        break;
    }
    
    case 'relatorioEscalaDia':{
    
        $dt_ini = $_REQUEST['dt_ini'];
        $leads_pk = $_REQUEST['leads_pk'];
        $colaborador_pk = $_REQUEST['colaborador_pk'];
       
        $resultado = "";
        $query = $leaddao->relatorioEscalaDia($leads_pk,$colaborador_pk,$dt_ini);

        $result  = 'success';
        $message = 'query success'; 
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "periodo"=>$query[$i]['periodo'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "dt_rh_entratada"=>$query[$i]['dt_rh_entratada'],
                    "dt_rh_saida"=>$query[$i]['dt_rh_saida'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "ds_imagem"=>$query[$i]['ds_imagem']
                );
            }
        }
        else{
            $mysql_data = [];
        }
        break;
    }
    case 'listarColaboradoresEscala':{
    
        $leads_pk = $_REQUEST['leads_pk'];
       
        $resultado = "";
        $query = $leaddao->listarColaboradoresEscala($leads_pk);

        $result  = 'success';
        $message = 'query success'; 
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    "colaboradores_pk"=>$query[$i]['colaboradores_pk'],
                    "ds_re"=>$query[$i]['ds_re'],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "ds_colaborador"=>$query[$i]['ds_colaborador'],
                    "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                    "periodo"=>$query[$i]['periodo'],
                    "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                    "dt_rh_entratada"=>$query[$i]['dt_rh_entratada'],
                    "dt_rh_saida"=>$query[$i]['dt_rh_saida'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "leads_pai_pk"=>$query[$i]['leads_pai_pk'],
                    "ic_tipo_lead"=>$query[$i]['ic_tipo_lead'],
                    "ds_imagem"=>$query[$i]['ds_imagem']
                );
            }
        }
        else{
            $mysql_data = [];
        }
        break;
    }
    case 'listarLeadsComProcessos':{
    
     
       
        $resultado = "";
        $query = $leaddao->listarLeadsComProcessos();

        $result  = 'success';
        $message = 'query success'; 
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead'],
                    
                );
            }
        }
        else{
            $mysql_data = [];
        }
        break;
    }
    //Pesquisa QRCODE posto de trabalho APP
    case 'validaQrcodePosto':{
       
        $lead_posto_pk = $_REQUEST['lead_posto_pk'];
        $ds_lead = $_REQUEST['ds_lead'];

        $resultado = "";

        $query = $leaddao->validaQrcodePosto($lead_posto_pk,$ds_lead);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_ds_lead"=>$query[$i]['ds_lead'],
                    "t_endereco"=>$query[$i]['ds_endereco'],
                    "t_ds_numero"=>$query[$i]['ds_numero'],
                    "t_ds_complemento"=>$query[$i]['ds_complemento'],
                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }

        break;
    }
    
    
    case 'listarPkSubMenu':{

        $resultado = "";
        $query = $leaddao->listarPkSubMenu($pk);

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead']
                );
            }
        }
        else{
            $mysql_data = [];
        }


        $result  = 'success';
        $message = 'query success';

        break;
    }
    case 'listarEmpresaLead':{

        $resultado = "";
        $query = $leaddao->listarEmpresaLead($pk);

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "ds_razao_social" => $query[$i]["ds_razao_social"],
                    "ds_cpf_cnpj"=>$query[$i]['ds_cpf_cnpj'],
                    "ds_endereco"=>$query[$i]['ds_endereco']
                );
            }
        }
        else{
            $mysql_data = [];
        }


        $result  = 'success';
        $message = 'query success';

        break;
    }
    
}

$leaddao = null;

// Prepare data
$data = array(
    "result"  => $result,
    "message" => $message,
    "data"    => $mysql_data
);

// Convert PHP array to JSON array
$json_data = html_entity_decode(json_encode($data));
echo $json_data;


?>
