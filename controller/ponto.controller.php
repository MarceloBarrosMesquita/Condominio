<?
ini_set('max_execution_time', '36000');
require_once "../inc/php/public.php";
require_once "../inc/classes/bestflow/DataBase.php";
require_once "../model/ponto.dao.php";
require_once "../model/ponto.class.php";
require_once "../model/log_exclusao.dao.php";
require_once "../model/log_exclusao.class.php";


$arrRequest = tratar_request();

$job = $arrRequest['job'];
$token = $arrRequest['token'];
$pk = $arrRequest['pk'];
$ds_pin = $arrRequest['ds_pin'];
$colaborador_pk = $arrRequest['colaborador_pk'];
$tipo_ponto_pk = $arrRequest['tipo_ponto_pk'];
$dt_hora_ponto = $arrRequest['dt_hora_ponto'];
$ds_localizacao = $arrRequest['ds_localizacao'];
$ds_imagem = $arrRequest['ds_imagem'];
$ponto_origem_pk = $arrRequest['ponto_origem_pk'];
$hr_ponto = $arrRequest['hr_ponto'];
$ic_dispositivo = $arrRequest['ic_dispositivo'];
$usuario_conferencia_pk = $arrRequest['usuario_conferencia_pk'];
$dt_conferencia = $arrRequest['dt_conferencia'];
$ic_status_conferencia = $arrRequest['ic_status_conferencia'];
$obs_conferencia = $arrRequest['obs_conferencia'];
$ds_total_horas_trabalhadas = $arrRequest['ds_total_horas_trabalhadas'];

//parametro de pesquisa App
$dt_ini = $arrRequest['dt_ini'];
$dt_fim = $arrRequest['dt_fim'];

$pontodao = new pontodao();
$pontodao->setToken($token); 

$log_exclusaodao = new log_exclusaodao();
$log_exclusaodao->setToken($token);

switch($job){
    case 'excluir':{        
        $resultdo = "";
        
        $ponto = $pontodao->carregarPorPk($pk);
        if($ponto->getpk()>0){
            
            $log_exclusaodao->salvar("ponto",$ponto->getpk());
            $pontodao->excluir($ponto);
            
            $result  = 'success';
            $message = 'Registro excluído com sucesso.';

        }
        else{
            $result  = 'error';
            $message = 'ponto nao encontrado';
        }
        break;
    }
    case 'excluirColaborador':{
        
        $resultdo = "";
        $ponto = $pontodao->carregarExcluir($dt_hora_ponto,$colaborador_pk,"");
        if($ponto->getpk()>0){
            $log_exclusaodao->salvar("ponto",$ponto->getpk());
            $pontodao->excluir($ponto);
            
            
        }
        
        $result  = 'success';
        $message = 'Registro excluído com sucesso.';

        break;
    }
    case 'excluir_pontamento':{
        
        $resultdo = "";
        
        
        $pk_Apontamento = $pontodao->listarPkApontamento($dt_hora_ponto,$colaborador_pk,$pk);
            
	if(count($pk_Apontamento)>0){
            for($i=0;$i<count($pk_Apontamento);$i++){
                $log_exclusaodao->salvar("ponto", $pk_Apontamento[$i]['pk']);
            }
	}


        
        
        $ponto = $pontodao->carregarExcluirApontamentoFolha($dt_hora_ponto,$colaborador_pk,$pk);
        
        
        $result  = 'success';
        $message = 'Registro excluído com sucesso.';

        break;
    }
    
    case 'salvar':{

        $ponto = $pontodao->carregarPorPk($pk);
        $ponto->setds_pin($ds_pin);
        $ponto->setcolaborador_pk($colaborador_pk);
        $ponto->settipo_ponto_pk($tipo_ponto_pk);
        $ponto->setdt_hora_ponto(dataYMD($dt_hora_ponto)." ".$hr_ponto);
        $ponto->setds_localizacao($ds_localizacao);
        $ponto->setds_imagem($ds_imagem);
        $ponto->setponto_origem_pk($ponto_origem_pk);
        $ponto->setic_dispositivo($ic_dispositivo);       
        $ponto->setic_status_conferencia($ic_status_conferencia);
        $ponto->setds_total_horas_trabalhadas($ds_total_horas_trabalhadas);        
        
        $pk = $pontodao->salvar($ponto);
        
        $mysql_data[] = array(
                "pk" => $pk
            );
        
        $result  = 'success';
        $message = 'Registro salvo com sucesso.';        
        
        break;
    }
    case 'listarPk':{
        
        $resultado = "";
        $query = $pontodao->listarPorPk($pk);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "ponto_origem_pk"=>$query[$i]['ponto_origem_pk']
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
    case 'listarPontoColaborador':{
        $resultado = "";
        $query = $pontodao->listarPontoColaborador($colaborador_pk,$dt_hora_ponto);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                     "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "hr_ponto"=>$query[$i]['hr_ponto'],
                    "ponto_origem_pk"=>$query[$i]['ponto_origem_pk']
                    
                );
            }
        }else{
            $mysql_data = [];
        }
		
        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    case 'listarPontoColaboradorPeriodo':{
        $resultado = "";
        $dt_hora_ponto_ini = $_REQUEST['dt_hora_ponto_ini'];
        $dt_hora_ponto_fim = $_REQUEST['dt_hora_ponto_fim'];
        $query = $pontodao->listarPontoColaboradorPeriodo($colaborador_pk,$dt_hora_ponto_ini,$dt_hora_ponto_fim);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "hr_ponto"=>$query[$i]['hr_ponto'],
                    "ponto_origem_pk"=>$query[$i]['ponto_origem_pk']
                    
                );
            }
        }else{
            $mysql_data = [];
        }
		
        $result  = 'success';
        $message = 'query success';
        
        break;        
    }    
    
    case 'pesquisaLogTrabalho':{
        $resultado = "";
        $query = $pontodao->pesquisaLogTrabalho($id_cliente,$ds_pin,$colaborador_pk,$ic_dispositivo,$dt_ini,$dt_fim);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){        
                $mysql_data[] = array(                    
                    "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin'], 
                    "ponto_origem_pk"=>$query[$i]['ponto_origem_pk'],               
                    "colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "ds_total_horas_trabalhadas"=>$query[$i]['ds_total_horas_trabalhadas'],                    
                    "Status"=>$query[$i]['Status']                    
                );
            }
        }else{
            $mysql_data = [];
        }

        $result  = 'success';
        $message = 'query success';
        
        break;        
    } 
    
    case 'pesquisaLogAtual':{     
 
        $resultado = "";
        $query = $pontodao->pesquisaLogAtual($id_cliente,$ds_pin,$colaborador_pk,$ic_dispositivo,$dt_ini,$dt_fim);
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                //Verifica se tem registro de saisa
           
                $query0 = $pontodao->pesquisaLogSaisaRegistro($query[$i]["pk"]);
                              
                if(count($query0) > 0){
                
                }else{ 
                    $mysql_data[] = array(                    
                        "pk" => $query[$i]["pk"],
                        "ds_pin"=>$query[$i]['ds_pin'], 
                        "ponto_origem_pk"=>$query[$i]['ponto_origem_pk'],               
                        "colaborador_pk"=>$query[$i]['colaborador_pk'],
                        "ds_localizacao"=>$query[$i]['ds_localizacao'],
                        "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                        "dt_hora_abertura"=>$query[$i]['dt_hora_abertura'],
                        "dt_hora_fechamento"=>$query[$i]['dt_hora_fechamento'],
                        "dt_imagem"=>$query[$i]['dt_imagem'],
                        "Status"=>$query[$i]['Status']
                    );
                }
            }
        }
        else{
            $mysql_data =  array(                    
              "pk" => 0
            );
        }			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    } 
    case 'listarColaborador':{     
 
        $leads_pk = $_REQUEST['leads_pk'];
        
        $query = $pontodao->carregarColaboradorPonto($colaborador_pk,$dt_ini,$dt_fim,$leads_pk);
        
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $query1 = $pontodao->carregarQuantidadePostoTrabalhoColavorador($query[$i]["colaborador_pk"],$dt_ini,$dt_fim);
                
                
                $mysql_data[] = array(                    
                    "colaborador_pk" => $query[$i]["colaborador_pk"],
                    "leads_pk" => $query[$i]["leads_pk"],
                    "dt_ponto" => $query[$i]["dt_ponto"],
                    "ic_inverter_folga" => $query[$i]["ic_inverter_folga"],
                    "qtde_lead_colaborador" =>count($query1)
                );
            }
        }
        else{
            $mysql_data =  array(                    
              "colaborador_pk" => 0
            );
        }			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    } 
    case 'listarColaboradorPontoSistema':{     
 
        $leads_pk = $_REQUEST['leads_pk'];
        
        $query = $pontodao->listarColaboradorPontoSistema($colaborador_pk,$dt_ini,$dt_fim,$leads_pk);
        
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                
                
                $querylib = $pontodao->carregarColaboradoresSEMLiberacao($query[$i]["colaborador_pk"]);
                
                if($querylib[0]['qtde']==0){
                    $query1 = $pontodao->carregarQuantidadePostoTrabalhoColaboradorPontoSistema($query[$i]["colaborador_pk"],$dt_ini,$dt_fim);
                
                
                    $mysql_data[] = array(                    
                        "colaborador_pk" => $query[$i]["colaborador_pk"],
                        "leads_pk" => $query[$i]["leads_pk"],
                        "qtde_lead_colaborador" =>count($query1)
                    );
                }
                
                
            }
        }
        else{
            $mysql_data =  array(                    
              "colaborador_pk" => 0
            );
        }			

        $result  = 'success';
        $message = 'query success';
        
        break;        
    } 
    case 'relatorioPonto':{
        
        $result  = 'success';
        $message = 'query success';
        
        
        $dt_fim = $_REQUEST['dt_final'];
        $qtde_lead_colaborador = $_REQUEST['qtde_lead_colaborador'];
        $leads_pk = $_REQUEST['leads_pk'];
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        $dt_ponto = $_REQUEST['dt_ponto'];
        $ic_inverter_folga = $_REQUEST['ic_inverter_folga'];

        $ds_legenda[] = "";
                $hr_saida_intervalo = "";
                $hr_volta_intervalo = "";
                $diasemana_numero1 = date('w', strtotime(DataYMD($dt_ponto)));
                
                
                $resultado = "";
                $query = $pontodao->relatorioPonto($leads_pk,$colaborador_pk,$dt_ponto,$dt_ponto,$diasemana_numero1,$ic_inverter_folga,$qtde_lead_colaborador);
                
                    
                        for($i = 0; $i < count($query); $i++){
                            
                            
                            
                            
                            
                            

                            $ds_total_horas_trabalhadas = "";
                            $coordernadas_lead = "";
                            $latitude_lead = "";
                            $longitude_lead = "";
                            $latitude_ponto = "";
                            $latitude_ponto = "";
                            $distancia_entre_pontos = "";
                            $endereco_ponto = "";
                            $ds_registro_ponto = "";

                            $diasemana_numero = date('w', strtotime(DataYMD($query[$i]['dt_rh_entratada'])));

                            $horaA = "";
                            $horaB = "";
                            $horaD = "";
                            $horaE = "";
                            $hr_diferenca = "";
                            $hr_diferenca_positivo = "";
                            $diferenca_segundo_positivo = "";
                          
                            if($diasemana_numero==0){
                                //if($query[$i]['ic_dom']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_dom'].':00';
                                    $horac = $query[$i]['hr_turno_dom_saida'].':00';

                                    if($query[$i]['hr_intervalo_dom']!=""){
                                        $horaD = $query[$i]['hr_intervalo_dom'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_dom']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_dom'].':00';
                                    }


                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}

                            }
                            else if($diasemana_numero==1){
                                //if($query[$i]['ic_seg']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_seg'].':00';
                                    $horac = $query[$i]['hr_turno_seg_saida'].':00';
                                    if($query[$i]['hr_intervalo_seg']!=""){
                                        $horaD = $query[$i]['hr_intervalo_seg'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_seg']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_seg'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==2){
                                //if($query[$i]['ic_ter']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_ter'].':00';
                                    $horac = $query[$i]['hr_turno_ter_saida'].':00';

                                    if($query[$i]['hr_intervalo_ter']!=""){
                                        $horaD = $query[$i]['hr_intervalo_ter'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_ter']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_ter'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==3){
                                //if($query[$i]['ic_qua']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_qua'].':00';
                                    $horac = $query[$i]['hr_turno_qua_saida'].':00';
                                    if($query[$i]['hr_intervalo_qua']!=""){
                                        $horaD = $query[$i]['hr_intervalo_qua'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_qua']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_qua'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==4){
                                //if($query[$i]['ic_qui']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_qui'].':00';
                                    $horac = $query[$i]['hr_turno_qui_saida'].':00';
                                    if($query[$i]['hr_intervalo_qui']!=""){
                                        $horaD = $query[$i]['hr_intervalo_qui'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_qui']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_qui'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);

                                //}
                            }
                            else if($diasemana_numero==5){
                                //if($query[$i]['ic_sex']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_sex'].':00';
                                    $horac = $query[$i]['hr_turno_sex_saida'].':00';
                                    if($query[$i]['hr_intervalo_sex']!=""){
                                        $horaD = $query[$i]['hr_intervalo_sex'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_sex']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_sex'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            if($diasemana_numero==6){
                                //if($query[$i]['ic_sab']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_sab'].':00';
                                    $horac = $query[$i]['hr_turno_sab_saida'].':00';
                                    if($query[$i]['hr_intervalo_sab']!=""){
                                        $horaD = $query[$i]['hr_intervalo_sab'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_sab']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_sab'].':00';
                                    }


                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }


                            $hr_diferenca_positivo = calculaTempo($horaD, $horaE);



                            $segundos_positivo = converterHoraPMinuto($hr_diferenca_positivo);


                            $segundos = converterHoraPMinuto($hr_diferenca);

                            if($i==0){
                                if($query[$i]['tipo_ponto_pk']==1){                   
                                    $hr_entrada = $query[$i]['hr_entrada'];
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Inicio Expediente";
                                }
                                if($query[$i]['tipo_ponto_pk']==2){

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $hr_saida = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Fim Expediente";

                                }
                                if($query[$i]['tipo_ponto_pk']==3){

                                    $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Saída p/ Intervalo";

                                }
                                if($query[$i]['tipo_ponto_pk']==4){

                                    $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Retorno do Intervalo";

                                }

                            }
                            else{
                                if($query[$i]['tipo_ponto_pk']==1){
                                    $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);

                                    $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                    if($segundos_ponto<="24200"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";
                                    }
                                    else if($segundos_ponto > "24200" && $segundos_ponto < "25000"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Inicio Expediente";

                                    }
                                    else if($segundos_ponto > "25000"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";

                                    }


                                }
                                if($query[$i]['tipo_ponto_pk']==2){

                                    $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);
                                    $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                    if($segundos_ponto<="25200"){
                                        if(($i+1)==count($query)){
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $hr_saida = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Fim Expediente";
                                        }
                                        else{
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Saída p/ Intervalo";
                                        }

                                    }
                                    else if($segundos_ponto > "25200"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $hr_saida = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Fim Expediente";
                                    }

                                }
                                if($query[$i]['tipo_ponto_pk']==3){

                                    $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Saída p/ Intervalo";

                                }
                                if($query[$i]['tipo_ponto_pk']==4){

                                    $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Retorno do Intervalo";

                                }
                            }       
                            if($hr_saida!="" && $hr_entrada!=""){
                                $ds_total_horas_trabalhadas = gmdate('H:i:s', strtotime($hr_saida) - strtotime($hr_entrada));
                            }

                           if($query[$i]['ds_local_trabalho']!=""){
                               //TRANSFORMAR ENDEREÇO LEAD EM COORDENADAS
                               $coordernadas_lead = fcTransformarEnderecoEmCoordenadas($query[$i]['ds_local_trabalho']);

                               $arrCoordenadasLead = explode(',',$coordernadas_lead);
                               $latitude_lead = $arrCoordenadasLead[0];
                               $longitude_lead = $arrCoordenadasLead[1];
                           }
                           
                           if($query[$i]['ds_localizacao']!=""){
                               $arrCoordenadasPonto = explode(',',$query[$i]['ds_localizacao']);
                               $latitude_ponto = $arrCoordenadasPonto[0];
                               $longitude_ponto = $arrCoordenadasPonto[1];

                               //TRANSFORMAR COORDERNADAS PONTO EM ENDEREÇO
                               $endereco_ponto = fcTransformarCoordenadasEmEndereco($latitude_ponto,$longitude_ponto);
                              
                           }
                           if($query[$i]['ds_local_trabalho']!="" && $query[$i]['ds_localizacao']!=""){
                               //CALCULAR A DISTANCIA DO LEAD E O PONTO 
                               $distancia_entre_pontos = fcCalcularDistanciaEntrePontos($latitude_ponto, $longitude_ponto, $latitude_lead, $longitude_lead);
                           }

                           //CALCULA O ATRASO NA VOLTA DO INTERVALO
                           if($ds_legenda[$i]=="Saída p/ Intervalo"){
                               $hr_saida_intervalo = $ds_registro_ponto;
                           }
                           if($ds_legenda[$i]=="Retorno do Intervalo"){
                               $hr_volta_intervalo = $ds_registro_ponto;
                           }

                            $hr_diferenca_intervalo = calculaTempo($hr_saida_intervalo,$hr_volta_intervalo);
                            $segundos_intervalo = converterHoraPMinuto($hr_diferenca_intervalo);


                            if($segundos_positivo > 0){
                                $diferenca_segundo_positivo = $segundos_positivo - $segundos_intervalo;
                            }


                           $mysql_data[] = array(

                                "pk" => $query[$i]["pk"],
                                "ds_lead"=>$query[$i]['ds_lead'],
                                "ds_re"=>$query[$i]['ds_re'],
                                "ds_pin"=>$query[$i]['ds_pin'],
                                "ds_colaborador"=>$query[$i]['ds_colaborador'],
                                "colaborador_pk"=>$colaborador_pk,
                                "leads_pk"=>$query[$i]['leads_pk'],
                                "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                                "periodo"=>$query[$i]['periodo'],
                                "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                                "dt_rh_entratada"=>$query[$i]['dt_rh_entratada'],
                                "ds_localizacao"=>$endereco_ponto,
                                "ds_total_horas_trabalhadas"=>$ds_total_horas_trabalhadas,
                                "hr_diferenca"=>$hr_diferenca,
                                "ds_distancia_entre_pontos" =>$distancia_entre_pontos." Km",
                                "hr_escala"=>$horaB." / ".$horac,
                                "hr_escala_intervalo"=>$horaD." / ".$horaE,
                                "segundos"=>$segundos,
                                "ds_local_trabalho"=>$query[$i]['ds_local_trabalho'],
                                "ds_imagem_entrada"=>$query[$i]['ds_imagem_entrada'],
                                "ds_legenda"=>$ds_legenda[$i],
                                "ds_registro_ponto"=>$ds_registro_ponto,
                                "ds_imagem_saida"=>$query[$i]['ds_imagem_saida'],
                                "ds_imagem_sistema"=>$query[$i]['ds_imagem_sistema'],
                                "diferenca_segundo_positivo"=>$diferenca_segundo_positivo,
                                "segundos_positivo"=>$segundos_positivo,
                                "hr_diferenca_intervalo"=>$hr_diferenca_intervalo,
                                "segundos_intervalo"=>$segundos_intervalo
                            );
                           
                        }
                    
                    //}
                    //else{
                    //    $mysql_data = [];
                    //}
                    
                //}
        
         break; 
    }
    case 'relatorioPontoSintetica':{
        
        $result  = 'success';
        $message = 'query success';
        
        
        $dt_fim = $_REQUEST['dt_final'];
        $qtde_lead_colaborador = $_REQUEST['qtde_lead_colaborador'];
        $leads_pk = $_REQUEST['leads_pk'];
        $colaborador_pk = $_REQUEST['colaborador_pk'];
        $dt_ponto = $_REQUEST['dt_ponto'];
        $ic_inverter_folga = $_REQUEST['ic_inverter_folga'];

        $ds_legenda[] = "";
                $hr_saida_intervalo = "";
                $hr_volta_intervalo = "";
                $diasemana_numero1 = date('w', strtotime(DataYMD($dt_ponto)));
                
                
                $resultado = "";
                $query = $pontodao->relatorioPonto($leads_pk,$colaborador_pk,$dt_ponto,$dt_ponto,$diasemana_numero1,$ic_inverter_folga,$qtde_lead_colaborador);
                
                    
                        for($i = 0; $i < count($query); $i++){
                            
                            
                            
                            
                            
                            

                            $ds_total_horas_trabalhadas = "";
                            $coordernadas_lead = "";
                            $latitude_lead = "";
                            $longitude_lead = "";
                            $latitude_ponto = "";
                            $latitude_ponto = "";
                            $distancia_entre_pontos = "";
                            $endereco_ponto = "";
                            $ds_registro_ponto = "";

                            $diasemana_numero = date('w', strtotime(DataYMD($query[$i]['dt_rh_entratada'])));

                            $horaA = "";
                            $horaB = "";
                            $horaD = "";
                            $horaE = "";
                            $hr_diferenca = "";
                            $hr_diferenca_positivo = "";
                            $diferenca_segundo_positivo = "";
                          
                            if($diasemana_numero==0){
                                //if($query[$i]['ic_dom']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_dom'].':00';
                                    $horac = $query[$i]['hr_turno_dom_saida'].':00';

                                    if($query[$i]['hr_intervalo_dom']!=""){
                                        $horaD = $query[$i]['hr_intervalo_dom'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_dom']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_dom'].':00';
                                    }


                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}

                            }
                            else if($diasemana_numero==1){
                                //if($query[$i]['ic_seg']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_seg'].':00';
                                    $horac = $query[$i]['hr_turno_seg_saida'].':00';
                                    if($query[$i]['hr_intervalo_seg']!=""){
                                        $horaD = $query[$i]['hr_intervalo_seg'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_seg']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_seg'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==2){
                                //if($query[$i]['ic_ter']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_ter'].':00';
                                    $horac = $query[$i]['hr_turno_ter_saida'].':00';

                                    if($query[$i]['hr_intervalo_ter']!=""){
                                        $horaD = $query[$i]['hr_intervalo_ter'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_ter']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_ter'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==3){
                                //if($query[$i]['ic_qua']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_qua'].':00';
                                    $horac = $query[$i]['hr_turno_qua_saida'].':00';
                                    if($query[$i]['hr_intervalo_qua']!=""){
                                        $horaD = $query[$i]['hr_intervalo_qua'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_qua']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_qua'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==4){
                                //if($query[$i]['ic_qui']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_qui'].':00';
                                    $horac = $query[$i]['hr_turno_qui_saida'].':00';
                                    if($query[$i]['hr_intervalo_qui']!=""){
                                        $horaD = $query[$i]['hr_intervalo_qui'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_qui']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_qui'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);

                                //}
                            }
                            else if($diasemana_numero==5){
                                //if($query[$i]['ic_sex']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_sex'].':00';
                                    $horac = $query[$i]['hr_turno_sex_saida'].':00';
                                    if($query[$i]['hr_intervalo_sex']!=""){
                                        $horaD = $query[$i]['hr_intervalo_sex'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_sex']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_sex'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            if($diasemana_numero==6){
                                //if($query[$i]['ic_sab']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_sab'].':00';
                                    $horac = $query[$i]['hr_turno_sab_saida'].':00';
                                    if($query[$i]['hr_intervalo_sab']!=""){
                                        $horaD = $query[$i]['hr_intervalo_sab'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_sab']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_sab'].':00';
                                    }


                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }


                            $hr_diferenca_positivo = calculaTempo($horaD, $horaE);



                            $segundos_positivo = converterHoraPMinuto($hr_diferenca_positivo);


                            $segundos = converterHoraPMinuto($hr_diferenca);

                            if($i==0){
                                if($query[$i]['tipo_ponto_pk']==1){                   
                                    $hr_entrada = $query[$i]['hr_entrada'];
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Inicio Expediente";
                                }
                                if($query[$i]['tipo_ponto_pk']==2){

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $hr_saida = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Fim Expediente";

                                }
                                if($query[$i]['tipo_ponto_pk']==3){

                                    $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Saída p/ Intervalo";

                                }
                                if($query[$i]['tipo_ponto_pk']==4){

                                    $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Retorno do Intervalo";

                                }

                            }
                            else{
                                if($query[$i]['tipo_ponto_pk']==1){
                                    $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);

                                    $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                    if($segundos_ponto<="24200"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";
                                    }
                                    else if($segundos_ponto > "24200" && $segundos_ponto < "25000"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Inicio Expediente";

                                    }
                                    else if($segundos_ponto > "25000"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";

                                    }


                                }
                                if($query[$i]['tipo_ponto_pk']==2){

                                    $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);
                                    $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                    if($segundos_ponto<="25200"){
                                        if(($i+1)==count($query)){
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $hr_saida = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Fim Expediente";
                                        }
                                        else{
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Saída p/ Intervalo";
                                        }

                                    }
                                    else if($segundos_ponto > "25200"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $hr_saida = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Fim Expediente";
                                    }

                                }
                                if($query[$i]['tipo_ponto_pk']==3){

                                    $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Saída p/ Intervalo";

                                }
                                if($query[$i]['tipo_ponto_pk']==4){

                                    $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Retorno do Intervalo";

                                }
                            }       
                            if($hr_saida!="" && $hr_entrada!=""){
                                $ds_total_horas_trabalhadas = gmdate('H:i:s', strtotime($hr_saida) - strtotime($hr_entrada));
                            }

                           

                           //CALCULA O ATRASO NA VOLTA DO INTERVALO
                           if($ds_legenda[$i]=="Saída p/ Intervalo"){
                               $hr_saida_intervalo = $ds_registro_ponto;
                           }
                           if($ds_legenda[$i]=="Retorno do Intervalo"){
                               $hr_volta_intervalo = $ds_registro_ponto;
                           }

                            $hr_diferenca_intervalo = calculaTempo($hr_saida_intervalo,$hr_volta_intervalo);
                            $segundos_intervalo = converterHoraPMinuto($hr_diferenca_intervalo);


                            if($segundos_positivo > 0){
                                $diferenca_segundo_positivo = $segundos_positivo - $segundos_intervalo;
                            }


                           $mysql_data[] = array(

                                "pk" => $query[$i]["pk"],
                                "ds_lead"=>$query[$i]['ds_lead'],
                                "ds_re"=>$query[$i]['ds_re'],
                                "ds_pin"=>$query[$i]['ds_pin'],
                                "ds_colaborador"=>$query[$i]['ds_colaborador'],
                                "colaborador_pk"=>$colaborador_pk,
                                "leads_pk"=>$query[$i]['leads_pk'],
                                "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                                "periodo"=>$query[$i]['periodo'],
                                "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                                "dt_rh_entratada"=>$query[$i]['dt_rh_entratada'],
                                "hr_escala"=>$horaB." / ".$horac,
                                "hr_escala_intervalo"=>$horaD." / ".$horaE,
                                "segundos"=>$segundos,
                                "ds_local_trabalho"=>$query[$i]['ds_local_trabalho'],
                                "ds_imagem_entrada"=>$query[$i]['ds_imagem_entrada'],
                                "ds_legenda"=>$ds_legenda[$i],
                                "ds_registro_ponto"=>$ds_registro_ponto,
                                "ds_imagem_saida"=>$query[$i]['ds_imagem_saida'],
                                "ds_imagem_sistema"=>$query[$i]['ds_imagem_sistema'],
                                "diferenca_segundo_positivo"=>$diferenca_segundo_positivo,
                                "segundos_positivo"=>$segundos_positivo,
                                "hr_diferenca_intervalo"=>$hr_diferenca_intervalo,
                                "segundos_intervalo"=>$segundos_intervalo
                            );
                           
                        }
                    
                    //}
                    //else{
                    //    $mysql_data = [];
                    //}
                    
                //}
        
         break; 
    }
    case 'relatorioPontoSistema':{
        
        $result  = 'success';
        $message = 'query success';
        
        
        $dt_fim = $_REQUEST['dt_final'];
        $qtde_lead_colaborador = $_REQUEST['qtde_lead_colaborador'];
        $leads_pk = $_REQUEST['leads_pk'];
        
        $query0 = $pontodao->carregarColaborador($colaborador_pk,$dt_ini,$dt_fim,$leads_pk);
        
        $ds_legenda[] = "";
        if(count($query0)>0){
            for($j = 0; $j < count($query0); $j++){
                $hr_saida_intervalo = "";
                $hr_volta_intervalo = "";
                $diasemana_numero1 = date('w', strtotime(DataYMD($query0[$j]['dt_ponto'])));
                
                
                $resultado = "";
                $query = $pontodao->relatorioPonto($query0[$j]['leads_pk'],$query0[$j]['colaborador_pk'],$query0[$j]['dt_ponto'],$query0[$j]['dt_ponto'],$diasemana_numero1,$query0[$j]['ic_inverter_folga'],$qtde_lead_colaborador);
                /*if(count($query)==0){
                    $mysql_data = [];
                }
                else {*/
                    if(count($query) > 0){
                    
                        for($i = 0; $i < count($query); $i++){
                            
                            
                            
                            
                            
                            

                            $ds_total_horas_trabalhadas = "";
                            $coordernadas_lead = "";
                            $latitude_lead = "";
                            $longitude_lead = "";
                            $latitude_ponto = "";
                            $latitude_ponto = "";
                            $distancia_entre_pontos = "";
                            $endereco_ponto = "";
                            $ds_registro_ponto = "";

                            $diasemana_numero = date('w', strtotime(DataYMD($query[$i]['dt_rh_entratada'])));

                            $horaA = "";
                            $horaB = "";
                            $horaD = "";
                            $horaE = "";
                            $hr_diferenca = "";
                            $hr_diferenca_positivo = "";
                            $diferenca_segundo_positivo = "";
                          
                            if($diasemana_numero==0){
                                //if($query[$i]['ic_dom']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_dom'].':00';
                                    $horac = $query[$i]['hr_turno_dom_saida'].':00';

                                    if($query[$i]['hr_intervalo_dom']!=""){
                                        $horaD = $query[$i]['hr_intervalo_dom'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_dom']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_dom'].':00';
                                    }


                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}

                            }
                            else if($diasemana_numero==1){
                                //if($query[$i]['ic_seg']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_seg'].':00';
                                    $horac = $query[$i]['hr_turno_seg_saida'].':00';
                                    if($query[$i]['hr_intervalo_seg']!=""){
                                        $horaD = $query[$i]['hr_intervalo_seg'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_seg']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_seg'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==2){
                                //if($query[$i]['ic_ter']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_ter'].':00';
                                    $horac = $query[$i]['hr_turno_ter_saida'].':00';

                                    if($query[$i]['hr_intervalo_ter']!=""){
                                        $horaD = $query[$i]['hr_intervalo_ter'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_ter']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_ter'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==3){
                                //if($query[$i]['ic_qua']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_qua'].':00';
                                    $horac = $query[$i]['hr_turno_qua_saida'].':00';
                                    if($query[$i]['hr_intervalo_qua']!=""){
                                        $horaD = $query[$i]['hr_intervalo_qua'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_qua']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_qua'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            else if($diasemana_numero==4){
                                //if($query[$i]['ic_qui']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_qui'].':00';
                                    $horac = $query[$i]['hr_turno_qui_saida'].':00';
                                    if($query[$i]['hr_intervalo_qui']!=""){
                                        $horaD = $query[$i]['hr_intervalo_qui'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_qui']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_qui'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);

                                //}
                            }
                            else if($diasemana_numero==5){
                                //if($query[$i]['ic_sex']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_sex'].':00';
                                    $horac = $query[$i]['hr_turno_sex_saida'].':00';
                                    if($query[$i]['hr_intervalo_sex']!=""){
                                        $horaD = $query[$i]['hr_intervalo_sex'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_sex']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_sex'].':00';
                                    }

                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }
                            if($diasemana_numero==6){
                                //if($query[$i]['ic_sab']==1){
                                    $horaA = $query[$i]['hr_entrada'];
                                    $horaB = $query[$i]['hr_turno_sab'].':00';
                                    $horac = $query[$i]['hr_turno_sab_saida'].':00';
                                    if($query[$i]['hr_intervalo_sab']!=""){
                                        $horaD = $query[$i]['hr_intervalo_sab'].':00';
                                    }
                                    if($query[$i]['hr_intervalo_saida_sab']!=""){
                                        $horaE = $query[$i]['hr_intervalo_saida_sab'].':00';
                                    }


                                    $hr_diferenca = calculaTempo($horaB, $horaA);
                                //}
                            }


                            $hr_diferenca_positivo = calculaTempo($horaD, $horaE);



                            $segundos_positivo = converterHoraPMinuto($hr_diferenca_positivo);


                            $segundos = converterHoraPMinuto($hr_diferenca);

                            if($i==0){
                                if($query[$i]['tipo_ponto_pk']==1){                   
                                    $hr_entrada = $query[$i]['hr_entrada'];
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Inicio Expediente";
                                }
                                if($query[$i]['tipo_ponto_pk']==2){

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $hr_saida = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Fim Expediente";

                                }
                                if($query[$i]['tipo_ponto_pk']==3){

                                    $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Saída p/ Intervalo";

                                }
                                if($query[$i]['tipo_ponto_pk']==4){

                                    $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Retorno do Intervalo";

                                }

                            }
                            else{
                                if($query[$i]['tipo_ponto_pk']==1){
                                    $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);

                                    $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                    if($segundos_ponto<="24200"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";
                                    }
                                    else if($segundos_ponto > "24200" && $segundos_ponto < "25000"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Inicio Expediente";

                                    }
                                    else if($segundos_ponto > "25000"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";

                                    }


                                }
                                if($query[$i]['tipo_ponto_pk']==2){

                                    $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);
                                    $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                    if($segundos_ponto<="25200"){
                                        if(($i+1)==count($query)){
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $hr_saida = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Fim Expediente";
                                        }
                                        else{
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Saída p/ Intervalo";
                                        }

                                    }
                                    else if($segundos_ponto > "25200"){
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $hr_saida = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Fim Expediente";
                                    }

                                }
                                if($query[$i]['tipo_ponto_pk']==3){

                                    $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Saída p/ Intervalo";

                                }
                                if($query[$i]['tipo_ponto_pk']==4){

                                    $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Retorno do Intervalo";

                                }
                            }       
                            if($hr_saida!="" && $hr_entrada!=""){
                                $ds_total_horas_trabalhadas = gmdate('H:i:s', strtotime($hr_saida) - strtotime($hr_entrada));
                            }

                           if($query[$i]['ds_local_trabalho']!=""){
                               //TRANSFORMAR ENDEREÇO LEAD EM COORDENADAS
                               $coordernadas_lead = fcTransformarEnderecoEmCoordenadas($query[$i]['ds_local_trabalho']);

                               $arrCoordenadasLead = explode(',',$coordernadas_lead);
                               $latitude_lead = $arrCoordenadasLead[0];
                               $longitude_lead = $arrCoordenadasLead[1];
                           }
                           
                           if($query[$i]['ds_localizacao']!=""){
                               $arrCoordenadasPonto = explode(',',$query[$i]['ds_localizacao']);
                               $latitude_ponto = $arrCoordenadasPonto[0];
                               $longitude_ponto = $arrCoordenadasPonto[1];

                               //TRANSFORMAR COORDERNADAS PONTO EM ENDEREÇO
                               $endereco_ponto = fcTransformarCoordenadasEmEndereco($latitude_ponto,$longitude_ponto);
                              
                           }
                           if($query[$i]['ds_local_trabalho']!="" && $query[$i]['ds_localizacao']!=""){
                               //CALCULAR A DISTANCIA DO LEAD E O PONTO 
                               $distancia_entre_pontos = fcCalcularDistanciaEntrePontos($latitude_ponto, $longitude_ponto, $latitude_lead, $longitude_lead);
                           }

                           //CALCULA O ATRASO NA VOLTA DO INTERVALO
                           if($ds_legenda[$i]=="Saída p/ Intervalo"){
                               $hr_saida_intervalo = $ds_registro_ponto;
                           }
                           if($ds_legenda[$i]=="Retorno do Intervalo"){
                               $hr_volta_intervalo = $ds_registro_ponto;
                           }

                            $hr_diferenca_intervalo = calculaTempo($hr_saida_intervalo,$hr_volta_intervalo);
                            $segundos_intervalo = converterHoraPMinuto($hr_diferenca_intervalo);


                            if($segundos_positivo > 0){
                                $diferenca_segundo_positivo = $segundos_positivo - $segundos_intervalo;
                            }

                            //echo $query[$i]['ds_lead']."<br>";

                           //echo "latitude e longetude ponto".$latitude_ponto." / ".$longitude_ponto."<br>";


                           $mysql_data[] = array(

                                "pk" => $query[$i]["pk"],
                                "ds_lead"=>$query[$i]['ds_lead'],
                                "ds_re"=>$query[$i]['ds_re'],
                                "ds_pin"=>$query[$i]['ds_pin'],
                                "ds_colaborador"=>$query[$i]['ds_colaborador'],
                                "colaborador_pk"=>$query0[$j]['colaborador_pk'],
                                "leads_pk"=>$query[$i]['leads_pk'],
                                "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                                "periodo"=>$query[$i]['periodo'],
                                "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                                "dt_rh_entratada"=>$query[$i]['dt_rh_entratada'],
                                "ds_localizacao"=>$endereco_ponto,
                                "ds_total_horas_trabalhadas"=>$ds_total_horas_trabalhadas,
                                "hr_diferenca"=>$hr_diferenca,
                                "ds_distancia_entre_pontos" =>$distancia_entre_pontos." Km",
                                "hr_escala"=>$horaB." / ".$horac,
                                "hr_escala_intervalo"=>$horaD." / ".$horaE,
                                "segundos"=>$segundos,
                                "ds_local_trabalho"=>$query[$i]['ds_local_trabalho'],
                                "ds_imagem_entrada"=>$query[$i]['ds_imagem_entrada'],
                                "ds_legenda"=>$ds_legenda[$i],
                                "ds_registro_ponto"=>$ds_registro_ponto,
                                "ds_imagem_saida"=>$query[$i]['ds_imagem_saida'],
                                "ds_imagem_sistema"=>$query[$i]['ds_imagem_sistema'],
                                "diferenca_segundo_positivo"=>$diferenca_segundo_positivo,
                                "segundos_positivo"=>$segundos_positivo,
                                "hr_diferenca_intervalo"=>$hr_diferenca_intervalo,
                                "segundos_intervalo"=>$segundos_intervalo
                            );
                           
                        }
                    
                    }
                    else{
                        $mysql_data = [];
                    }
                    
                //}
            }
        }
        else{
            $mysql_data = [];
        }
         break; 
    }
    case 'popUpAtraso':{
        
        $result  = 'success';
        $message = 'query success';
        $dt_ini = $_REQUEST['dt_ini'];
        $dt_fim = $_REQUEST['dt_fim'];
        
        
        $diasemana_numero = date('w', strtotime(DataYMD($dt_ini)));
                
        $ds_legenda[] = "";
        $resultado = "";
        $query = $pontodao->PopUpAtraso($dt_ini,$dt_fim,$diasemana_numero,"");
        if(count($query)==0){
            $mysql_data = [];
        }
        else {
            if(count($query) >= 0){

                for($i = 0; $i < count($query); $i++){

                    $ds_total_horas_trabalhadas = "";
                    $coordernadas_lead = "";
                    $latitude_lead = "";
                    $longitude_lead = "";
                    $latitude_ponto = "";
                    $latitude_ponto = "";
                    $distancia_entre_pontos = "";
                    $endereco_ponto = "";
                    $ds_registro_ponto = "";

                    

                    $horaA = "";
                    $horaB = "";
                    $horaD = "";
                    $horaE = "";
                    $hr_diferenca = "";
                    $hr_diferenca_positivo = "";
                    $diferenca_segundo_positivo = "";

                    if($diasemana_numero==0){
                        //if($query[$i]['ic_dom']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_dom'].':00';
                            $horac = $query[$i]['hr_turno_dom_saida'].':00';

                            if($query[$i]['hr_intervalo_dom']!=""){
                                $horaD = $query[$i]['hr_intervalo_dom'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_dom']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_dom'].':00';
                            }


                            $hr_diferenca = calculaTempo($horaB, $horaA);
                        //}

                    }
                    else if($diasemana_numero==1){
                        //if($query[$i]['ic_seg']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_seg'].':00';
                            $horac = $query[$i]['hr_turno_seg_saida'].':00';
                            if($query[$i]['hr_intervalo_seg']!=""){
                                $horaD = $query[$i]['hr_intervalo_seg'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_seg']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_seg'].':00';
                            }

                            $hr_diferenca = calculaTempo($horaB, $horaA);
                        //}
                    }
                    else if($diasemana_numero==2){
                        //if($query[$i]['ic_ter']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_ter'].':00';
                            $horac = $query[$i]['hr_turno_ter_saida'].':00';

                            if($query[$i]['hr_intervalo_ter']!=""){
                                $horaD = $query[$i]['hr_intervalo_ter'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_ter']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_ter'].':00';
                            }

                            $hr_diferenca = calculaTempo($horaB, $horaA);
                        //}
                    }
                    else if($diasemana_numero==3){
                        //if($query[$i]['ic_qua']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_qua'].':00';
                            $horac = $query[$i]['hr_turno_qua_saida'].':00';
                            if($query[$i]['hr_intervalo_qua']!=""){
                                $horaD = $query[$i]['hr_intervalo_qua'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_qua']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_qua'].':00';
                            }

                            $hr_diferenca = calculaTempo($horaB, $horaA);
                        //}
                    }
                    else if($diasemana_numero==4){
                        //if($query[$i]['ic_qui']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_qui'].':00';
                            $horac = $query[$i]['hr_turno_qui_saida'].':00';
                            if($query[$i]['hr_intervalo_qui']!=""){
                                $horaD = $query[$i]['hr_intervalo_qui'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_qui']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_qui'].':00';
                            }

                            $hr_diferenca = calculaTempo($horaB, $horaA);

                        //}
                    }
                    else if($diasemana_numero==5){
                        //if($query[$i]['ic_sex']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_sex'].':00';
                            $horac = $query[$i]['hr_turno_sex_saida'].':00';
                            if($query[$i]['hr_intervalo_sex']!=""){
                                $horaD = $query[$i]['hr_intervalo_sex'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_sex']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_sex'].':00';
                            }

                            $hr_diferenca = calculaTempo($horaB, $horaA);
                        //}
                    }
                    if($diasemana_numero==6){
                        //if($query[$i]['ic_sab']==1){
                            $horaA = $query[$i]['hr_entrada'];
                            $horaB = $query[$i]['hr_turno_sab'].':00';
                            $horac = $query[$i]['hr_turno_sab_saida'].':00';
                            if($query[$i]['hr_intervalo_sab']!=""){
                                $horaD = $query[$i]['hr_intervalo_sab'].':00';
                            }
                            if($query[$i]['hr_intervalo_saida_sab']!=""){
                                $horaE = $query[$i]['hr_intervalo_saida_sab'].':00';
                            }


                            $hr_diferenca = calculaTempo($horaB, $horaA);
                        //}
                    }




                    $segundos = converterHoraPMinuto($hr_diferenca);
                    
                    $ds_legenda[$i] = "Inicio Expediente";
                          

                    //echo $query[$i]['ds_lead']."<br>";

                   //echo "latitude e longetude ponto".$latitude_ponto." / ".$longitude_ponto."<br>";


                   $mysql_data[] = array(

                        "pk" => $query[$i]["pk"],
                        "ds_lead"=>$query[$i]['ds_lead'],
                        "ds_tel"=>$query[$i]['ds_tel'],
                        "ds_cel"=>$query[$i]['ds_cel'],
                        "ds_re"=>$query[$i]['ds_re'],
                        "ds_pin"=>$query[$i]['ds_pin'],
                        "ds_colaborador"=>$query[$i]['ds_colaborador'],
                        "colaborador_pk"=>$query0[$j]['colaborador_pk'],
                        "leads_pk"=>$query[$i]['leads_pk'],
                        "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                        "periodo"=>$query[$i]['periodo'],
                        "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],
                        "dt_rh_entratada"=>$query[$i]['dt_rh_entratada'],
                        
                        "hr_diferenca"=>$hr_diferenca,
                        "hr_escala"=>$horaB." / ".$horac,
                        "segundos"=>$segundos,
                        "ds_local_trabalho"=>$query[$i]['ds_local_trabalho'],
                        "ds_imagem_entrada"=>$query[$i]['ds_imagem_entrada'],
                        "ds_legenda"=>$ds_legenda[$i],
                        "ds_registro_ponto"=>$ds_registro_ponto
                        
                    );

                }

            }
            else{
                $mysql_data = [];
            }

        }
         break; 
    }
    
    //Folha
    case 'folhaPonto':{     
        $leads_pk = $_REQUEST['leads_pk'];
        

        
        $result  = 'success';
        $message = 'query success';
        $query0 = $pontodao->carregarColaborador($colaborador_pk,$dt_ini,$dt_fim,$leads_pk);
                
        $ds_legenda[] = "";
        if(count($query0)>0){
            for($j = 0; $j < count($query0); $j++){
                
                
                $diasemana_numero = date('w', strtotime(DataYMD($query0[$j]['dt_ponto'])));
                
                $resultado = "";
                $query = $pontodao->folhaPonto($query0[$j]['leads_pk'],$query0[$j]['colaborador_pk'],$query0[$j]['dt_ponto'],$query0[$j]['dt_ponto'],$diasemana_numero,$query0[$j]['ic_inverter_folga']);

                if(count($query) >= 0){
                    for($i = 0; $i < count($query); $i++){

                        $ds_total_horas_trabalhadas = "";
                        $coordernadas_lead = "";
                        $latitude_lead = "";
                        $longitude_lead = "";
                        $distancia_entre_pontos = "";
                        $endereco_ponto = "";
                        $ds_registro_ponto = "";

                        $diasemana_numero = date('w', strtotime($data));

                        $horaA = "";
                        $horaB = "";
                        $hr_diferenca = "";
                        
                        //if($diasemana_numero==0){
                            if($query[$i]['ic_dom']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_dom'].':00';
                                $horac = $query[$i]['hr_turno_dom_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);
                            }

                        //}
                        //else if($diasemana_numero==1){
                            if($query[$i]['ic_seg']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_seg'].':00';
                                $horac = $query[$i]['hr_turno_seg_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);
                            }
                        //}
                        //else if($diasemana_numero==2){
                            if($query[$i]['ic_ter']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_ter'].':00';
                                $horac = $query[$i]['hr_turno_ter_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);
                            }
                        //}
                        //if($diasemana_numero==3){
                            if($query[$i]['ic_qua']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_qua'].':00';
                                $horac = $query[$i]['hr_turno_qua_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);
                            }
                        //}
                        //else if($diasemana_numero==4){
                            if($query[$i]['ic_qui']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_qui'].':00';
                                $horac = $query[$i]['hr_turno_qui_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);

                            }
                        //}
                        //else if($diasemana_numero==5){
                            if($query[$i]['ic_sex']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_sex'].':00';
                                $horac = $query[$i]['hr_turno_sex_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);
                            }
                        //}
                        //if($diasemana_numero==6){
                           if($query[$i]['ic_sab']==1){
                                $horaA = $query[$i]['hr_entrada'];
                                $horaB = $query[$i]['hr_turno_sab'].':00';
                                $horac = $query[$i]['hr_turno_sab_saida'].':00';

                                $hr_diferenca = calculaTempo($horaB, $horaA);
                            }
                        //}


                        
                        $segundos = converterHoraPMinuto($hr_diferenca);

                        $dt_rh_entratada = "";
                        $ponto_pk_entratada = "";
                        $dt_hora_ponto_entrada = "";
                        $dt_rh_saida = "";
                        $ponto_pk_saida = "";
                        $dt_hora_ponto_saida = "";
                        $ponto_pk_saida_intervalo = "";
                        $dt_rh_saida_intervalo = "";
                        $dt_hora_ponto_saida_intervalo = "";
                        $dt_rh_entratada_retorno = "";
                        $dt_hora_ponto_entrada_retorno = "";
                        $ponto_pk_volta_intervalo = "";
                        if($i==0){
                            if($query[$i]['tipo_ponto_pk']==1){
                                $ponto_pk_entratada = $query[$i]['ponto_pk'];
                                $dt_rh_entratada = $query[$i]['hr_entrada'];
                                $dt_hora_ponto_entrada = $query[$i]['dt_hora_ponto'];          
                                $hr_entrada = $query[$i]['hr_entrada'];
                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Inicio Expediente";
                            }
                            if($query[$i]['tipo_ponto_pk']==2){
                                $ponto_pk_saida = $query[$i]['ponto_pk'];
                                $dt_rh_saida= $query[$i]['hr_entrada'];
                                $dt_hora_ponto_saida = $query[$i]['dt_hora_ponto'];   
                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $hr_saida = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Fim Expediente";
                            }
                            if($query[$i]['tipo_ponto_pk']==3){
                                $ponto_pk_saida_intervalo = $query[$i]['ponto_pk'];
                                $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Saída p/ Intervalo";

                            }
                            if($query[$i]['tipo_ponto_pk']==4){
                                $ponto_pk_volta_intervalo= $query[$i]['ponto_pk'];
                                $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Retorno do Intervalo";

                            }
                        }
                        else{
                            if($query[$i]['tipo_ponto_pk']==1){
                                $ponto_pk_volta_intervalo = $query[$i]['ponto_pk'];
                                $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Retorno do Intervalo";
                            }
                            if($query[$i]['tipo_ponto_pk']==2){
                                $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);
                                $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);
                                
                                if($segundos_ponto<="25200"){
                                   
                                    if(($i+1)==count($query)){
                                        $ponto_pk_saida = $query[$i]['ponto_pk'];
                                        $dt_rh_saida= $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_saida = $query[$i]['dt_hora_ponto'];   
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $hr_saida = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Fim Expediente";
                                    }
                                    else{
                                        $ponto_pk_saida_intervalo = $query[$i]['ponto_pk'];
                                        $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Saída p/ Intervalo";
                                    }
                                
                                    

                                }
                                else if($segundos_ponto > "25200"){
                                    $ponto_pk_saida = $query[$i]['ponto_pk'];
                                    $dt_rh_saida= $query[$i]['hr_entrada'];
                                    $dt_hora_ponto_saida = $query[$i]['dt_hora_ponto'];   
                                    $ds_registro_ponto = $query[$i]['hr_entrada'];
                                    $hr_saida = $query[$i]['hr_entrada'];
                                    $ds_legenda[$i] = "Fim Expediente";
                                }
                                

                            }
                            if($query[$i]['tipo_ponto_pk']==3){
                                $ponto_pk_saida_intervalo = $query[$i]['ponto_pk'];
                                $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto']; 
                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Saída p/ Intervalo";

                            }
                            if($query[$i]['tipo_ponto_pk']==4){
                                $ponto_pk_volta_intervalo= $query[$i]['ponto_pk'];
                                $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto'];  

                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                $ds_legenda[$i] = "Retorno do Intervalo";

                            }
                            
                        }
                        
                        
                       
                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                       $mysql_data[] = array(
                            "pk" => $query[$i]["pk"],
                            "ponto_pk_entratada" => $ponto_pk_entratada,
                            "ponto_pk_saida" => $ponto_pk_saida,
                            "ponto_pk_saida_intervalo" => $ponto_pk_saida_intervalo,
                            "ponto_pk_volta_intervalo" => $ponto_pk_volta_intervalo,
                            
                            "dt_hora_ponto_entrada"=>$dt_hora_ponto_entrada,
                            "dt_rh_entratada"=>$dt_rh_entratada,  
                            "dt_hora_ponto_saida"=>$dt_hora_ponto_saida,
                            "dt_rh_saida"=>$dt_rh_saida, 
                           
                           
                            "dt_hora_ponto_saida_intervalo"=>$dt_hora_ponto_saida_intervalo,
                            "dt_rh_saida_intervalo"=>$dt_rh_saida_intervalo,
                           
                            "dt_hora_ponto_entrada_retorno"=>$dt_hora_ponto_entrada_retorno,
                            "dt_rh_entratada_retorno"=>$dt_rh_entratada_retorno,  
                            "ds_lead"=>$query[$i]['ds_lead'],
                            "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                            "ds_re"=>$query[$i]['ds_re'],
                            "ds_pin"=>$query[$i]['ds_pin'],
                            "ds_colaborador"=>$query[$i]['ds_colaborador'],
                            "ds_produto_servico"=>$query[$i]['ds_produto_servico'],
                            "periodo"=>$query[$i]['periodo'],
                            "n_qtde_dias_semana"=>$query[$i]['n_qtde_dias_semana'],          
                            "ds_localizacao"=>$endereco_ponto,
                            "ds_total_horas_trabalhadas"=>$ds_total_horas_trabalhadas,
                            "hr_diferenca"=>$hr_diferenca,
                            "ds_distancia_entre_pontos" =>$distancia_entre_pontos." Km",
                            "hr_escala"=>$horaB,
                            "segundos"=>$segundos,
                            "ds_local_trabalho"=>$query[$i]['ds_local_trabalho'],
                            "ds_imagem_entrada"=>$query[$i]['ds_imagem_entrada'],
                            "ds_legenda"=>$ds_legenda[$i],
                            "ds_registro_ponto"=>$ds_registro_ponto,
                            "ds_imagem_saida"=>$query[$i]['ds_imagem_saida'],
                            "ds_imagem_sistema"=>$query[$i]['ds_imagem_sistema'],
                            "dt_falta"=>$query[$i]['dt_falta'],
                            "dt_hora_extra"=>$query[$i]['dt_hora_extra'],
                            "dt_ferias"=>$query[$i]['dt_ferias'],
                            "hr_extra"=>$query[$i]['hr_extra']

                        );

                    }
                }
                else{
                    
                    $mysql_data = [];
                }
            }
        }
        else{
     
            $mysql_data = [];
        }
        
           
         break; 
    }
    
    
    
    case 'relatorioFalta':{
        
        $dt_base = $_REQUEST['dt_base'];
        $leads_pk = $_REQUEST['leads_pk'];
        
        $resultado = "";
        $query = $pontodao->relatorioFalta($leads_pk,$colaborador_pk,$dt_base);
        
        $result  = 'success';
        $message = 'query success';
        
        
        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                
                $mysql_data[] = array(
                    "registros" => $query[$i]["registros"]
                );
            }
        }
        else{
            $mysql_data = [];
        }
        break;
    }
    
    
    
    case 'listarTodos':{
        
        $resultado = "";
        $query = $pontodao->listar_por_ds_pin($ds_pin);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "ponto_origem_pk"=>$query[$i]['ponto_origem_pk']
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
        $query = $pontodao->listar_por_ds_pin($ds_pin);
        
        $result  = 'success';
        $message = 'query success';

        if(count($query) > 0){
            for($i = 0; $i < count($query); $i++){
                $mysql_data[] = array(
                    "pk" => $query[$i]["pk"],
                    "ds_pin"=>$query[$i]['ds_pin'],
                    "colaborador_pk"=>$query[$i]['colaborador_pk'],
                    "tipo_ponto_pk"=>$query[$i]['tipo_ponto_pk'],
                    "dt_hora_ponto"=>$query[$i]['dt_hora_ponto'],
                    "ds_localizacao"=>$query[$i]['ds_localizacao'],
                    "ds_imagem"=>$query[$i]['ds_imagem'],
                    "ponto_origem_pk"=>$query[$i]['ponto_origem_pk']
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
}

$pontodao = null;

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
