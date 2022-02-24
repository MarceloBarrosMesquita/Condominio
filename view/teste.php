<?php
//LISTA A PARTE DE FOLHA PONTO AGRUPADO .....
$sql.=" select pf.pk,  pf.usuario_cadastro_pk, pf.dt_ult_atualizacao, pf.usuario_ult_atualizacao_pk ";
$sql.="                ,pf.colaborador_pk ";
$sql.="                ,date_format(pf.dt_periodo_ini,'%d/%m/%Y')dt_periodo_ini";
$sql.="                ,date_format(pf.dt_periodo_fim,'%d/%m/%Y')dt_periodo_fim";
$sql.="                ,date_format(pf.dt_cadastro,'%d/%m/%Y')dt_cadastro";
$sql.="                ,pf.obs ";
$sql.="                ,pf.leads_pk";
$sql.="                ,l.ds_lead";
$sql.="                ,c.ds_colaborador";
$sql.="                ,c.pk colaborador_pk";

$sql.="           from ponto_folha pf";
$sql.="                inner join leads l on pf.leads_pk = l.pk";
$sql.="                inner join colaboradores c on pf.colaborador_pk = c.pk";
$sql.="                LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
$sql.="                left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
$sql.="         where 1=1 ";
     
$sql.="           group by pf.dt_periodo_ini,l.pk";
        
        
$sql.="         order by pf.colaborador_pk asc ";
$queryP = $this->db->execQuery($sql);


if(count($queryP)>0){
    for($p=0;$p<count($queryP);$p++){
        //LISTAR OS COLABORADORES VINCULADOS AO PONTO FOLHA 
        
        
        $sql="";
        $sql.="select pf.pk,  pf.usuario_cadastro_pk, pf.dt_ult_atualizacao, pf.usuario_ult_atualizacao_pk ";
        $sql.="       ,pf.colaborador_pk ";
        $sql.="       ,date_format(pf.dt_periodo_ini,'%d/%m/%Y')dt_periodo_ini";
        $sql.="       ,date_format(pf.dt_periodo_fim,'%d/%m/%Y')dt_periodo_fim";
        $sql.="       ,date_format(pf.dt_cadastro,'%d/%m/%Y')dt_cadastro";
        $sql.="       ,pf.obs ";
        $sql.="       ,pf.leads_pk";
        $sql.="       ,l.ds_lead";
        $sql.="       ,c.ds_colaborador";
        $sql.="       ,c.pk colaborador_pk";

        $sql.="  from ponto_folha pf";
        $sql.="       inner join leads l on pf.leads_pk = l.pk";
        $sql.="       inner join colaboradores c on pf.colaborador_pk = c.pk";
        $sql.="       LEFT JOIN ponto_solicitacao_liberacao_app psl ON c.pk = psl.colaborador_pk";
        $sql.="       left join colaboradores_produtos_servicos cps  on c.pk = cps.colaboradores_pk";
        $sql.=" where 1=1 ";
        
        $sql.=" and l.pk=".$queryP[$i]['leads_pk'];
        
        
        $sql.=" and pf.dt_periodo_ini ='".DataYMD($queryP[$i]['dt_periodo_ini'])."'";
        
        
        $sql.=" and pf.dt_periodo_fim ='".DataYMD($queryP[$i]['dt_periodo_fim'])."'";
        
       
        $sql.=" group by c.pk";
       
        
        $sql.=" order by pf.colaborador_pk asc ";
        
        
        $query1 = $this->db->execQuery($sql);
        if(count($query1)>0){
            //SALVAR PONTO NOVO 
            
            $ponto_folha = $ponto_folhadao->carregarPorPk(0);
        
            $ponto_folha->setdt_periodo_ini($queryP[$p]['dt_periodo_ini']);
            $ponto_folha->setdt_periodo_fim($queryP[$p]['dt_periodo_fim']);
            $ponto_folha->setleads_pk($queryP[$p]['leads_pk']);


            $novo_ponto_folhapk = $ponto_folhadao->salvar($ponto_folha);
           
            //LISTA OS COLABORADORES DE ACORDO COM O PONTO FOLHA ANTIGO
            for($j=0;$j<count($query1);$j++){
                
                //SALVA OS REGISTROS NA TABELA PONTO_FOLHA_COLABORADOR
                $colaborador_ponto_folha_pk = $ponto_folhadao->salvarColaborador($novo_ponto_folhapk,$query1[$j]['colaborador_pk']);
                
                
                //APOS SALVAR, FAZ TODA A VERIFICAÇÃO DE REGISTRO DE PONTO PARA SALVAR A NA NOVA TABELA PONTO_FOLHA_REGISTRO 
                
                //SALVA OS REGISTROS DE PONTO NA FOLHA 
                $query0 = $pontodao->carregarColaboradorSalvarRegistroPontoFolha($query1[$j]['colaborador_pk'],$queryP[$p]['dt_periodo_ini'],$queryP[$p]['dt_periodo_fim'],$queryP[$p]['leads_pk']);

                $ds_legenda[] = "";
                if(count($query0)>0){
                    for($j = 0; $j < count($query0); $j++){

                        //PEGA TODA A REGRA DE VISUALIZAÇÃO DOS HORARIOS DE PONTO
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

                                $tipo_ponto_pk = "";
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
                                        $dt_hora_ponto_entrada = $query[$i]['dt_hora_ponto_registro_folha'];          
                                        $hr_entrada = $query[$i]['hr_entrada'];
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Inicio Expediente";
                                        $tipo_ponto_pk = 1;
                                    }
                                    if($query[$i]['tipo_ponto_pk']==2){
                                        $ponto_pk_saida = $query[$i]['ponto_pk'];
                                        $dt_rh_saida= $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_saida = $query[$i]['dt_hora_ponto_registro_folha'];   
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $hr_saida = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Fim Expediente";
                                        $tipo_ponto_pk = 2;
                                    }
                                    if($query[$i]['tipo_ponto_pk']==3){
                                        $ponto_pk_saida_intervalo = $query[$i]['ponto_pk'];
                                        $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto_registro_folha']; 
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Saída p/ Intervalo";
                                        $tipo_ponto_pk = 3;

                                    }
                                    if($query[$i]['tipo_ponto_pk']==4){
                                        $ponto_pk_volta_intervalo= $query[$i]['ponto_pk'];
                                        $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto_registro_folha'];  

                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";
                                        $tipo_ponto_pk = 4;

                                    }
                                }
                                else{
                                    if($query[$i]['tipo_ponto_pk']==1){
                                        $ponto_pk_entratada = $query[$i]['ponto_pk'];
                                        $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto_registro_folha'];  

                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";
                                        $tipo_ponto_pk = 4;
                                    }
                                    if($query[$i]['tipo_ponto_pk']==2){
                                        $hr_diferenca_ponto = calculaTempo($query[0]['hr_entrada'],$query[$i]['hr_entrada']);
                                        $segundos_ponto = converterHoraPMinuto($hr_diferenca_ponto);

                                        if($segundos_ponto<="25200"){

                                            if(($i+1)==count($query)){
                                                $ponto_pk_saida = $query[$i]['ponto_pk'];
                                                $dt_rh_saida= $query[$i]['hr_entrada'];
                                                $dt_hora_ponto_saida = $query[$i]['dt_hora_ponto_registro_folha'];   
                                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                                $hr_saida = $query[$i]['hr_entrada'];
                                                $ds_legenda[$i] = "Fim Expediente";
                                                $tipo_ponto_pk = 2;
                                            }
                                            else{
                                                $ponto_pk_saida_intervalo = $query[$i]['ponto_pk'];
                                                $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                                $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto_registro_folha']; 
                                                $ds_registro_ponto = $query[$i]['hr_entrada'];
                                                $ds_legenda[$i] = "Saída p/ Intervalo";
                                                $tipo_ponto_pk = 3;
                                            }



                                        }
                                        else if($segundos_ponto > "25200"){
                                            $ponto_pk_saida = $query[$i]['ponto_pk'];
                                            $dt_rh_saida= $query[$i]['hr_entrada'];
                                            $dt_hora_ponto_saida = $query[$i]['dt_hora_ponto_registro_folha'];   
                                            $ds_registro_ponto = $query[$i]['hr_entrada'];
                                            $hr_saida = $query[$i]['hr_entrada'];
                                            $ds_legenda[$i] = "Fim Expediente";
                                            $tipo_ponto_pk = 2;
                                        }


                                    }
                                    if($query[$i]['tipo_ponto_pk']==3){
                                        $ponto_pk_saida_intervalo = $query[$i]['ponto_pk'];
                                        $dt_rh_saida_intervalo = $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_saida_intervalo = $query[$i]['dt_hora_ponto_registro_folha']; 
                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Saída p/ Intervalo";
                                        $tipo_ponto_pk = 3;

                                    }
                                    if($query[$i]['tipo_ponto_pk']==4){
                                        $ponto_pk_volta_intervalo= $query[$i]['ponto_pk'];
                                        $dt_rh_entratada_retorno = $query[$i]['hr_entrada'];
                                        $dt_hora_ponto_entrada_retorno = $query[$i]['dt_hora_ponto_registro_folha'];  

                                        $ds_registro_ponto = $query[$i]['hr_entrada'];
                                        $ds_legenda[$i] = "Retorno do Intervalo";
                                        $tipo_ponto_pk = 4;

                                    }
                                }


                                //Salva os pontos na tabela de registro de folha ponto    
                                $ponto_folha_registro = $ponto_folha_registrodao->carregarPorPk(0);
                                $ponto_folha_registro->setponto_pk($query[$i]['ponto_pk']);
                                $ponto_folha_registro->settipo_ponto_pk($tipo_ponto_pk);

                                if($tipo_ponto_pk==1){
                                    $ponto_folha_registro->setdt_hora_ponto($dt_hora_ponto_entrada);
                                }
                                else if($tipo_ponto_pk==2){
                                    $ponto_folha_registro->setdt_hora_ponto($dt_hora_ponto_saida);
                                }
                                else if($tipo_ponto_pk==3){
                                    $ponto_folha_registro->setdt_hora_ponto($dt_hora_ponto_saida_intervalo);
                                }
                                else if($tipo_ponto_pk==4){
                                    $ponto_folha_registro->setdt_hora_ponto($dt_hora_ponto_entrada_retorno);
                                }

                                $ponto_folha_registro->settipo_registr_folha($tipo_registr_folha);
                                $ponto_folha_registro->setponto_folha_pk($pk);


                                $pk_registro = $ponto_folha_registrodao->salvar($ponto_folha_registro);

                            }
                        }
                    }
                }
                
            }
        }
         
    }
}
//APOS TODA A INSERÇÃO EXCLUIR O PONTO FOLHA ANTIGO 


//DELETE FROM PONTO_FOLHA WHERE COLABORADOR_PK IS NOT NULL;