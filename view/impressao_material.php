<?
require_once "../inc/php/header.php";
?>
<script src="impressao_material.js?<?php echo time(); ?>" type="text/javascript" charset="utf-8"></script>
<style>
    @media print{
   #noprint{
       display:none;
   }
}

</style>
    <div class="container col-sm-12">
        <div class='row'>
            <div class='col-md-12' align='center'>
                <h4>FICHA DE CONTROLE E ENTREGA DE EPI</h4>
            </div>
        </div>
        <br>
        <div id="exibir_colaborador">
            <div class='row' >
                <div class='col-md-1'>
                    &nbsp;
                </div>
                <div class='col-md-1'>
                    <label for='generos_pk'><b>Nome:</b>&nbsp;&nbsp;&nbsp;</label>
                </div>
                <div class='col-md-3'>
                    <div class="ds_colaborador_impr"></div>
                </div>
                <div class='col-md-1'>
                    <label for='generos_pk'><b>Registro:</b>&nbsp;&nbsp;&nbsp;</label>
                </div>
                <div class='col-md-3'>
                    <div class="ds_re_impr"></div>
                </div>
                <div class='col-md-1'>
                    <label for='generos_pk'><b>Data Admissão:</b>&nbsp;&nbsp;&nbsp;</label>
                </div>
                <div class='col-md-2'>
                    <div class="dt_admissao_impr"></div>
                </div>

            </div>
            <div class='row'>
                <div class='col-md-1'>
                    &nbsp;
                </div>
                <div class='col-md-1'>
                    <label for='generos_pk'><b>Função:</b>&nbsp;</label>
                </div>
                <div class='col-md-3'>
                    <div id="ds_produto_servico_impr"></div>
                </div>

                <div class='col-md-1'>
                    <label for='ds_cel'><b>Seção:</b> &nbsp;</label>
                </div>
                <div class='col-md-3'>
                    <div class="ds_secao_impr"></div>
                </div>
                <div class='col-md-1'>
                    <label for='ds_cel'><b>Data Demissão:</b> &nbsp;</label>
                </div>
                <div class='col-md-2'>
                    <div class="dt_demissao_imp"></div>
                </div>

            </div>
        </div>
        <br>
        <br>
        <div class='container col-sm-10 border border-dark' >
        <div class='row '>
            <div class='col-md-10'>
                <h6>Pelo presente, declaro ter recebido gratuitamente os EPIs abaixo descritos, em suas respectivas datas, bem como o treinamento sobre o uso correto do mesmo, mantendo em meu poder para uso obrigatório e exclusivo de minhas atividades, sendo responsável pelo uso correto e sua conservação, conforme determinado na NR01 em seu item 1.4.2. e na NR06 em seu item 6.7.1 da Portaria 3.214/78.<p>
                    De acordo com os termos do Parágrafo 1, do Art. 462 da CLT, responsabilizo-me pela reposição de EPI’s, em casos de dolo, culpa (negligência, imperícia e imprudência) ou extravio, e que os valores envolvidos serão descontados do meu salário a título de indenização. Comprometo-me na entrega de meus EPI’s em caso de desligamento da empresa.<p>
                    Fica proibido de dar ou emprestar o equipamento que estiver sobre minha responsabilidade, só podendo fazer se receber ordem por escrito da pessoa autorizada para tal fim.<p>
                    Em caso de dano, inutilização e extravio do equipamento deverei comunicar ao setor competente.<p>
                    Fico ciente que não utilizando o equipamento em serviço estarei sujeito as sanções disciplinares cabíveis que irão desde simples advertência até dispensa por justa causa nos termos do Art. 482 da CLT.</h6><p>
                <h6>Declaro ciente que terei que devolvê-los caso ocorra meu desligamento da empresa.</h6><br>

            </div>
        </div>
        <div class='row '>
            <div class='col-md-5'>
                <h6>DATA:_______/________/________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h6><p>
            </div>
            <div class='col-md-7'>
                <h6>ASSINATURA DO FUNCIONÁRIO:____________________________________________</h6><p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-10'>

            </div>
        </div>
        </div>
        <br>
        <div class="container col-md-10">
            <div class='row'>
                <div class='col-md-12'>
                    <table class='table table-striped table-bordered nowrap' style='width:100%' id="tblMaterialImpressao">
                        <thead>
                            <tr>
                                <th>DATA RETI.</th>
                                <th>DATA DEVOL.</th>
                                <th>UNID.</th>
                                <th>DESCRIÇÃO EQUIPAMENTO</th>
                                <th>ASSINATURA</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row" id="noprint">
            <div class="col-md-12" align="center" >
                <button type="button" class="btn btn-secondary" id="cmdVoltar" data-dismiss="modal">Voltar</button>
                &nbsp;
                <button type="button" class="btn btn-primary" id="cmdImprimirModal"  name="cmdImprimirModal">Imprimir</button>

            </div>
        </div>