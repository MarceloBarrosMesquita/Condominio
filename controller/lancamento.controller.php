<?

require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/lancamento.dao.php";
require_once "../model/lancamento.class.php";

require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";



$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$dt_vencimento = $arrRequest['dt_vencimento'];
$ds_lancamento = $arrRequest['ds_lancamento'];
$vl_lancamento = $arrRequest['vl_lancamento'];
$operacao_pk = $arrRequest['operacao_pk'];
$tipo_grupo_pk = $arrRequest['tipo_grupo_pk'];
$grupo_leancamento_pk = $arrRequest['grupo_leancamento_pk'];
$ic_status_pagamento = $arrRequest['ic_status_pagamento'];
$obs_lancamento = $arrRequest['obs_lancamento'];
$dt_competencia = $arrRequest['dt_competencia'];
$n_documento = $arrRequest['n_documento'];
$contas_bancarias_pk = $arrRequest['contas_bancarias_pk'];
$tipos_operacao_pk = $arrRequest['tipos_operacao_pk'];
$metodos_pagamento_pk = $arrRequest['metodos_pagamento_pk'];
$dt_pagamento = $arrRequest['dt_pagamento'];
$empresas_pk = $arrRequest['empresas_pk'];
$ds_ocorrencia = $arrRequest['ds_ocorrencia'];
$grupo_lancamento_centro_custo_pk = $arrRequest['grupo_lancamento_centro_custo_pk'];
$tipo_grupo_centro_custo_pk = $arrRequest['tipo_grupo_centro_custo_pk'];
$contratos_pk = $arrRequest['contratos_pk'];
$dt_faturamento = $arrRequest['dt_faturamento'];


$lancamentodao = new lancamentodao();
$lancamentodao->setToken($token);
$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){

    case 'excluir':{
        
        $resultdo = "";
        
        $lancamento = $lancamentodao->carregarPorPk($pk);
        if($lancamento->getpk()>0){
            
            
            $pk_documentos = $lancamentodao->listarPkDocumentos($lancamento->getpk());
            
            if(count($pk_documentos)>0){
                for($i=0;$i<count($pk_documentos);$i++){
                    $log_exclusaodao->salvar("documentos", $pk_documentos[$i]['pk']);
                }
            }


            $log_exclusaodao->salvar("lancamentos",$lancamento->getpk());
            
            $lancamentodao->excluirDocsLancamento($lancamento->getpk());
            $lancamentodao->excluir($lancamento);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'lancamento nao encontrado';
        }
        break;
    }
    case 'salvar':{
        
        $lancamento = $lancamentodao->carregarPorPk($pk);
        $lancamento->setdt_vencimento($dt_vencimento);
        $lancamento->setds_lancamento($ds_lancamento);
        $lancamento->setvl_lancamento($vl_lancamento);
        $lancamento->setoperacao_pk($operacao_pk);
        $lancamento->settipo_grupo_pk($tipo_grupo_pk);
        $lancamento->setgrupo_leancamento_pk($grupo_leancamento_pk);
        $lancamento->setic_status_pagamento($ic_status_pagamento);
        $lancamento->setobs_lancamento($obs_lancamento);
        $lancamento->setdt_competencia($dt_competencia);
        $lancamento->setn_documento($n_documento);
        $lancamento->setcontas_bancarias_pk($contas_bancarias_pk);
        $lancamento->settipos_operacao_pk($tipos_operacao_pk);
        $lancamento->setmetodos_pagamento_pk($metodos_pagamento_pk);
        $lancamento->setempresas_pk($empresas_pk);
        $lancamento->settipo_grupo_centro_custo_pk($tipo_grupo_centro_custo_pk);
        $lancamento->setgrupo_lancamento_centro_custo_pk($grupo_lancamento_centro_custo_pk);
        $lancamento->setds_ocorrencia($ds_ocorrencia);
        $lancamento->setdt_pagamento($dt_pagamento);
        $lancamento->setdt_faturamento($dt_faturamento);
        $lancamento->setcontratos_pk($contratos_pk);

        
        $pk = $lancamentodao->salvar($lancamento);
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
     
    
    case 'listarPk':{
       
        $resultado = "";
        $query = $lancamentodao->listarPorPk($pk);
       
        $result  = 'success';
        $message = 'query success';
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";                
                $ds_agencia = "";                
                $ds_conta = "";                
                $ds_digito = "";                
                $ds_banco = "";                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                    $ds_agencia = $queryLead[0]['ds_agencia'];         
                    $ds_conta = $queryLead[0]['ds_conta'];            
                    $ds_digito = $queryLead[0]['ds_digito'];             
                    $ds_banco = $queryLead[0]['ds_banco'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                    $ds_agencia = $queryLead[0]['ds_agencia'];         
                    $ds_conta = $queryLead[0]['ds_conta'];            
                    $ds_digito = $queryLead[0]['ds_digito'];             
                    $ds_banco = $queryLead[0]['ds_banco'];
                }
                                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                $ds_lancamento = "";
                $ds_lancamento = remover_acentos($query[$i]['ds_lancamento']);
                
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "ds_agencia"=>$ds_agencia,
                    "ds_conta"=>$ds_conta,
                    "ds_digito"=>$ds_digito,
                    "ds_banco"=>$ds_banco,
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>substr($ds_lancamento,0,10),
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_ds_tipo_grupo_centro_custo"=>$query[$i]['ds_tipo_grupo_centro_custo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "t_ds_dados_conta"=>$query[$i]['ds_dados_conta'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "contratos_pk"=>$query[$i]['contratos_pk'],
                    "ds_usuario"=>$query[$i]['ds_usuario'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

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
        
        
        $resultado = "";
        $query = $lancamentodao->listar_por_dt_vencimento($dt_vencimento);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){

                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>$query[$i]['vl_lancamento'],
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "contratos_pk"=>$query[$i]['contratos_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarReceita':{

        $operacao_pk = $_REQUEST['operacao_pk'];
        $dt_vencimento_ini = $_REQUEST['dt_vencimento_ini'];
        $dt_vencimento_fim = $_REQUEST['dt_vencimento_fim'];
        $contas_bancarias_pk = $_REQUEST['contas_bancarias_pk'];
        
        $resultado = "";
        $query = $lancamentodao->listarReceita($operacao_pk,$dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
        
        
        $queryReceita = $lancamentodao->listarValoresReceita($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
        $queryDespesas = $lancamentodao->listarValoresDespesas($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";
                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                }
                
                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    

    case 'listarLancamentosMes':{

        $pk = $_REQUEST['pk'];
        $operacao_pk = $_REQUEST['operacao_pk'];
        $tipo_lancamento_pk = $_REQUEST['tipo_lancamento_pk'];
        $dt_vencimento_ini = $_REQUEST['dt_vencimento_ini'];
        $dt_vencimento_fim = $_REQUEST['dt_vencimento_fim'];
        $dt_cadastro_ini = $_REQUEST['dt_cadastro_ini'];
        $dt_cadastro_fim = $_REQUEST['dt_cadastro_fim'];
        $ic_status_pagamento = $_REQUEST['ic_status_pagamento'];
        $empresas_pk = $_REQUEST['empresas_pk'];
        $tipo_grupo_pk= $_REQUEST['tipo_grupo_pk'];
        $grupo_leancamento_pk= $_REQUEST['grupo_leancamento_pk'];
        $usuario_cadastro_pk = $_REQUEST['usuario_cadastro_pk'];
        $contas_bancarias_pk = $_REQUEST['contas_bancarias_pk'];
        $dt_pagamento_ini = $_REQUEST['dt_pagamento_ini'];
        $dt_pagamento_fim = $_REQUEST['dt_pagamento_fim'];
        $dt_faturamento_ini = $_REQUEST['dt_faturamento_ini'];
        $dt_faturamento_fim = $_REQUEST['dt_faturamento_fim'];
        
        $resultado = "";
        $query = $lancamentodao->listarLancamentosMes($pk,$contas_bancarias_pk,$tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk,$dt_cadastro_ini,$dt_cadastro_fim,$dt_pagamento_ini,$dt_pagamento_fim,$dt_faturamento_ini,$dt_faturamento_fim);
        
        
        //$queryReceita = $lancamentodao->listarValoresReceita($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
       // $queryDespesas = $lancamentodao->listarValoresDespesas($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                }
                                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                $vl_total += $query[$i]['vl_lancamento'];
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "ds_usuario"=>$query[$i]['ds_usuario'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_vl_total"=>$vl_total,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'RelatorioLancamento':{

        $operacao_pk = $_REQUEST['operacao_pk'];
        $tipo_lancamento_pk = $_REQUEST['tipo_lancamento_pk'];
        $dt_vencimento_ini = $_REQUEST['dt_vencimento_ini'];
        $dt_vencimento_fim = $_REQUEST['dt_vencimento_fim'];
        $ic_status_pagamento = $_REQUEST['ic_status_pagamento'];
        $empresas_pk = $_REQUEST['empresas_pk'];
        $tipo_grupo_pk= $_REQUEST['tipo_grupo_pk'];
        $grupo_leancamento_pk= $_REQUEST['grupo_leancamento_pk'];
        $usuario_cadastro_pk = $_REQUEST['usuario_cadastro_pk'];
        
        $resultado = "";
        $query = $lancamentodao->RelatorioLancamento($tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                }
                                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                $vl_total += $query[$i]['vl_lancamento'];
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "t_ds_tipo_grupo_centro_custo"=>$query[$i]['ds_tipo_grupo_centro_custo'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "ds_usuario"=>$query[$i]['ds_usuario'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_vl_total"=>$vl_total,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'RelatorioLancamentoPago':{

        $dt_pagamento_ini = $_REQUEST['dt_pagamento_ini'];
        $dt_pagamento_fim = $_REQUEST['dt_pagamento_fim'];
        $dt_lancamento_ini = $_REQUEST['dt_lancamento_ini'];
        $dt_lancamento_fim = $_REQUEST['dt_lancamento_fim'];
        $lancamento_pk = $_REQUEST['lancamento_pk'];
        $pk_cliente = $_REQUEST['pk_cliente'];
        $cnpj_cliente = $_REQUEST['cnpj_cliente'];
        $cnpj_fornecedor = $_REQUEST['cnpj_fornecedor'];
        $tipo_lancamento_pk = $_REQUEST['tipo_lancamento_pk'];
        $grupo_leancamento = "";
        
        
        $str_cliente_sem_mascara = str_replace(".", "", $cnpj_cliente);
        $str1_cliente_sem_mascara = str_replace("/", "", $str_cliente_sem_mascara);
        $cnpj_cliente_sem_mascara = str_replace("-", "", $str1_cliente_sem_mascara);
        
        
        $str_fornecedor_sem_mascara = str_replace(".", "", $cnpj_fornecedor);
        $str1_fornecedor_sem_mascara = str_replace("/", "", $str_fornecedor_sem_mascara);
        $cnpj_fornecedor_sem_mascara = str_replace("-", "", $str1_fornecedor_sem_mascara);
        
        
        
        if($cnpj_cliente!=""){
            $queryLead = $lancamentodao->listaLeadCNPJ($cnpj_cliente,$cnpj_cliente_sem_mascara);
            if(count($queryLead) > 0){
                $grupo_leancamento.=' in(';
                for($i = 0; $i < count($queryLead); $i++){
                    $grupo_leancamento.= $queryLead[$i]['pk'].",";
                }
                $grupo_leancamento.='0)';
            }
            
        }
        
        else if($cnpj_fornecedor!=""){
            $queryLead = $lancamentodao->listaFornecedoresCNPJ($cnpj_fornecedor,$cnpj_fornecedor_sem_mascara); 
            
            if(count($queryLead) > 0){
                $grupo_leancamento .=' in(';
                for($i = 0; $i < count($queryLead); $i++){
                    $grupo_leancamento.= $queryLead[$i]['pk'].",";
                }
                $grupo_leancamento .='0)';
            } 
        }
        else if($cnpj_fornecedor!="" && $cnpj_cliente!=""){
            $queryLead1 = $lancamentodao->listaLeadCNPJ($cnpj_cliente,$cnpj_cliente_sem_mascara);
            $queryLead = $lancamentodao->listaFornecedoresCNPJ($cnpj_fornecedor,$cnpj_fornecedor_sem_mascara); 
            
            if(count($queryLead1) > 0){
                $grupo_leancamento .=' in(';
                for($i = 0; $i < count($queryLead1); $i++){
                    $grupo_leancamento .= $queryLead1[$i]['pk'].",";
                }
                for($i = 0; $i < count($queryLead); $i++){
                    $grupo_leancamento .= $queryLead[$i]['pk'].",";
                }
                
                $grupo_leancamento .='0)';
            }
        }
        
        
        
        $resultado = "";
        $query = $lancamentodao->RelatorioLancamentoPago($dt_pagamento_ini,$dt_pagamento_fim,$pk_cliente,$cnpj_cliente,$cnpj_fornecedor,$grupo_leancamento,$dt_lancamento_ini,$dt_lancamento_fim,$lancamento_pk,$tipo_lancamento_pk);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";                
                $cpf_cnpj = "";                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                    $cpf_cnpj = $queryLead[0]['ds_cpf'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                    $cpf_cnpj = $queryLead[0]['ds_cpf_cnpj'];
                }
                                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                $vl_total += $query[$i]['vl_lancamento'];
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "ds_usuario"=>$query[$i]['ds_usuario'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_vl_total"=>$vl_total,
                    "t_cpf_cnpj"=>$cpf_cnpj,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarLancamentosVencidoDia':{

        $tipo_lancamento_pk = $_REQUEST['tipo_lancamento_pk'];
        $dt_vencimento_ini = $_REQUEST['dt_vencimento_ini'];
        $dt_vencimento_fim = $_REQUEST['dt_vencimento_fim'];
        $ic_status_pagamento = $_REQUEST['ic_status_pagamento'];
        $empresas_pk = $_REQUEST['empresas_pk'];
        $tipo_grupo_pk= $_REQUEST['tipo_grupo_pk'];
        $grupo_leancamento_pk= $_REQUEST['grupo_leancamento_pk'];
        $usuario_cadastro_pk = $_REQUEST['usuario_cadastro_pk'];
        
        $dt_cadastro_ini = $_REQUEST['dt_cadastro_ini'];
        $dt_cadastro_fim = $_REQUEST['dt_cadastro_fim'];
        
        $dt_faturamento_ini = $_REQUEST['dt_faturamento_ini'];
        $dt_faturamento_fim = $_REQUEST['dt_faturamento_fim'];
        
        $resultado = "";
        $query = $lancamentodao->listarLancamentosVencidoDia($pk,$tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk,$dt_cadastro_ini,$dt_cadastro_fim,$dt_faturamento_ini,$dt_faturamento_fim);
        
        
        //$queryReceita = $lancamentodao->listarValoresReceita($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
       // $queryDespesas = $lancamentodao->listarValoresDespesas($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                }
                                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                
                $vl_total += $query[$i]['vl_lancamento'];
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "ds_usuario"=>$query[$i]['ds_usuario'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_vl_total"=>$vl_total,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    case 'listarLancamentosAtrasado':{

        $tipo_lancamento_pk = $_REQUEST['tipo_lancamento_pk'];
        $dt_vencimento_ini = $_REQUEST['dt_vencimento_ini'];
        $dt_vencimento_fim = $_REQUEST['dt_vencimento_fim'];
        $ic_status_pagamento = $_REQUEST['ic_status_pagamento'];
        $empresas_pk = $_REQUEST['empresas_pk'];
        $tipo_grupo_pk= $_REQUEST['tipo_grupo_pk'];
        $grupo_leancamento_pk= $_REQUEST['grupo_leancamento_pk'];
        $usuario_cadastro_pk = $_REQUEST['usuario_cadastro_pk'];
        $dt_cadastro_ini = $_REQUEST['dt_cadastro_ini'];
        $dt_cadastro_fim = $_REQUEST['dt_cadastro_fim'];
        $dt_faturamento_ini = $_REQUEST['dt_faturamento_ini'];
        $dt_faturamento_fim = $_REQUEST['dt_faturamento_fim'];
        
        $resultado = "";
        $query = $lancamentodao->listarLancamentosAtrasado($pk,$tipo_lancamento_pk,$dt_vencimento_ini,$dt_vencimento_fim,$ic_status_pagamento,$empresas_pk,$tipo_grupo_pk,$grupo_leancamento_pk,$usuario_cadastro_pk,$dt_cadastro_ini,$dt_cadastro_fim,$dt_faturamento_ini,$dt_faturamento_fim);
        
        
        //$queryReceita = $lancamentodao->listarValoresReceita($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
       // $queryDespesas = $lancamentodao->listarValoresDespesas($dt_vencimento_ini,$dt_vencimento_fim,$contas_bancarias_pk);
        
        $result  = 'success';
        $message = 'query success';
        
        if(count($query) > 0){
            
            for($i = 0; $i < count($query); $i++){
                $ds_recebido_de = "";
                $ds_recebido_de_centro_custo = "";                
                
                if($query[$i]['tipo_grupo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_leancamento_pk']);
                    $ds_recebido_de = $queryLead[0]['ds_fornecedor'];
                }
                                
                //CENTRO CUSTO
                if($query[$i]['tipo_grupo_centro_custo_pk']==1){
                    $queryLead = $lancamentodao->listaItensGrupoLeads($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_lead'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==2){
                    $queryLead = $lancamentodao->listaItensGrupoColaboradores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_colaborador'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==3){
                    $queryLead = $lancamentodao->listaItensGrupoFornecedores($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_fornecedor'];
                }
                else if($query[$i]['tipo_grupo_centro_custo_pk']==4){
                    $queryLead = $lancamentodao->listaItensGrupoEquipes($query[$i]['grupo_lancamento_centro_custo_pk']);
                    $ds_recebido_de_centro_custo = $queryLead[0]['ds_equipe'];
                }
                
                //echo $queryReceita[0]['vl_lancamento']." - ".$queryDespesas[0]['vl_lancamento']." + ".$query[$i]['vl_saldo_inicial']."<br>";
                
                
                $vl_total += $query[$i]['vl_lancamento'];
                
                $mysql_data[] = array(
                    "t_pk" => $query[$i]["pk"],
                    "t_dt_vencimento"=>$query[$i]['dt_vencimento'],
                    "t_dt_cadastro"=>$query[$i]['dt_cadastro'],
                    "t_vl_inicial_conta"=>$query[$i]['vl_saldo_inicial'],
                    "t_vl_saldo"=>number_format((($queryReceita[0]['vl_lancamento']-$queryDespesas[0]['vl_lancamento']) ),2,",","."),
                    "t_ds_lancamento"=>$query[$i]['ds_lancamento'],
                    "t_vl_lancamento"=>($query[$i]['vl_lancamento']),
                    "t_operacao_pk"=>$query[$i]['operacao_pk'],
                    "t_ds_operacao"=>$query[$i]['ds_operacao'],
                    "t_tipo_grupo_pk"=>$query[$i]['tipo_grupo_pk'],
                    "t_ds_tipo_grupo"=>$query[$i]['ds_tipo_grupo'],
                    "t_grupo_leancamento_pk"=>$query[$i]['grupo_leancamento_pk'],
                    "t_ic_status_pagamento"=>$query[$i]['ic_status_pagamento'],
                    "t_ds_status_pagamento"=>$query[$i]['ds_status_pagamento'],
                    "t_obs_lancamento"=>$query[$i]['obs_lancamento'],
                    "t_dt_competencia"=>$query[$i]['dt_competencia'],
                    "t_dt_pagamento"=>$query[$i]['dt_pagamento'],
                    "t_n_documento"=>$query[$i]['n_documento'],
                    "t_contas_bancarias_pk"=>$query[$i]['contas_bancarias_pk'],
                    "t_tipos_operacao_pk"=>$query[$i]['tipos_operacao_pk'],
                    "t_metodos_pagamento_pk"=>$query[$i]['metodos_pagamento_pk'],
                    "t_ds_metodo_pagamento"=>$query[$i]['ds_metodo_pagamento'],
                    "t_ds_conta_bancaria"=>$query[$i]['ds_conta_bancaria'],
                    "t_ds_tipo_operacao"=>$query[$i]['ds_tipo_operacao'],
                    "t_empresas_pk"=>$query[$i]['empresas_pk'],
                    "t_ds_razao_social"=>$query[$i]['ds_razao_social'],
                    "tipo_grupo_centro_custo_pk"=>$query[$i]['tipo_grupo_centro_custo_pk'],
                    "grupo_lancamento_centro_custo_pk"=>$query[$i]['grupo_lancamento_centro_custo_pk'],
                    "ds_ocorrencia"=>$query[$i]['ds_ocorrencia'],
                    "ds_usuario"=>$query[$i]['ds_usuario'],
                    "dt_faturamento"=>$query[$i]['dt_faturamento'],
                    "t_ds_recebido_de"=>$ds_recebido_de,
                    "t_vl_total"=>$vl_total,
                    "t_ds_recebido_de_centro_custo"=>$ds_recebido_de_centro_custo,

                    "t_functions" => ""
                );
            }
        }
        else{
            $mysql_data = [];
        }
		
        break;
    }    
    
    
     //Leads
    case 'listaItensGrupoLeads':{
                       
        $resultado = "";
        $query = $lancamentodao->listaItensGrupoLeads($tipo_grupo_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_lead"=>$query[$i]['ds_lead']
                );
            }
        }else{
            $mysql_data = [];
        }		
        break;
    }
    
    //Colaboradores
    case 'listaItensGrupoColaboradores':{
                       
        $resultado = "";
        $query = $lancamentodao->listaItensGrupoColaboradores($tipo_grupo_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_colaborador"=>$query[$i]['ds_colaborador']." - CPF ".$query[$i]['ds_cpf']
                );
            }
        }else{
            $mysql_data = [];
        }		
        break;
    }
    
    //fornecedores
    case 'listaItensGrupoFornecedores':{
                       
        $resultado = "";
        $query = $lancamentodao->listaItensGrupoFornecedores($tipo_grupo_pk);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_fornecedor"=>$query[$i]['ds_fornecedor']
                );
            }
        }else{
            $mysql_data = [];
        }		
        break;
    }
}

$lancamentodao = null;

// Prepare data
$data = array(
    "result"  => $result,
    "message" => $message,
    "data"    => $mysql_data
);

// Convert PHP array to JSON array
$json_data = json_encode($data);
echo $json_data;


?>
