<?php
// dia do mes
$dayMoth = date("m");
//conexao
$link = mysqli_connect("127.0.0.1", "root", "", "ControleFinanceiro", "3306");
//Queries para popular os selects
$resultCategoria            = mysqli_query($link, "SELECT `id_categoria`, `categoria`                       FROM `categorias`               WHERE `active` = 'Y' AND`tipo_despesas` = 'V';");
$resultEstabelecimento      = mysqli_query($link, "SELECT `id_estabelecimento`, `estabelecimento`           FROM `estabelecimentos`         WHERE `active` = 'Y';");
$resultTipoEstabelecimento  = mysqli_query($link, "SELECT `id_tipo_estabelecimento`, `tipo_estabelecimento` FROM `tipo_estabelecimentos`    WHERE `active` = 'Y';");
$resultFormaPagamento       = mysqli_query($link, "SELECT `id_forma_pagamento`, `forma_pagamento`           FROM `formas_pagamento`         WHERE `active` = 'Y';");
$resultCartao               = mysqli_query($link, "SELECT `id_cartao`, `descricao`                          FROM `cartoes`                  WHERE `active` = 'Y';");
//Queries para popular os meses no select
$resultMesCorrente          = mysqli_query($link, "SELECT `mes`                                             FROM `meses` WHERE `id_mes` = " . $dayMoth);
$resultMes                  = mysqli_query($link, "SELECT `id_mes`, `mes`                                   FROM `meses`;");

            ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro de Despesas Variaveis</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

     <!-- Custom styles for this page -->
     <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">REGISTRAR MINHAS DESPESAS VARIAVEIS</h6>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- DataTales Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary">Preencha todos os campos (*) do formulário</h6>
                                            </div>
                                            <div class="card-body">
                                                <form class="row" name="frmLogin" id="frmLogin" method="post" action="?Controller=Despesas_Variaveis&Action=salvar">     
                                                    <input type="hidden" id="slcStatus" name="slcStatus" value="A pagar" />
                                                    <div class="offset-md-2 col-md-2">
                                                        <label class="label form-label" for="txtDataUtilizada" id="lblDataUtilizada">Data Utilizada:</label>
                                                        <input class="form-control" id="txtDataUtilizada" name="txtDataUtilizada" type="date" value="<?=date('Y-m-d')?>" required />
                                                    </div>
                                                    <!-- depois dos testes deixar hidden -->
                                                    <!--<div class="col-md-1">
                                                        <label class="label form-label" for="slcMes" id="lblMes">Mês:</label>
                                                        <select class="form-control" id="slcMes" name="slcMes" required>
                                                            <?php
                                                                $rsMesCorrente = mysqli_fetch_object($resultMesCorrente);
                                                                echo"<option value='".$dayMoth."'>".$rsMesCorrente->mes."</option>";
                                                                while($rsMes = mysqli_fetch_object($resultMes)){
                                                                    echo"<option value='".$rsMes->id_mes."'>".$rsMes->mes."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <label class="label form-label" for="txtAno" id="lblAno">Ano:</label>
                                                        <input class="form-control" id="txtAno" name="txtAno" type="number" value="<?=date('Y')?>" min="2020" max="2030"  required />
                                                    </div>-->
                                                    <div class="col-md-4">
                                                        <label class="label form-label" for="slcCategoria" id="lblCategoria">Categoria:</label>
                                                        <select class="form-control" id="slcCategoria" name="slcCategoria" required>
                                                            <option value="">--Selecione uma categoria--</option>
                                                            <?php
                                                                while($rsCategoria = mysqli_fetch_object($resultCategoria)){
                                                                    echo"<option value='".$rsCategoria->id_categoria."'>".$rsCategoria->categoria."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <label class="label form-label" for="txtValor" id="lblValor">Valor:</label>
                                                        <input class="form-control" id="txtValor" name="txtValor" type="number" min="1" max="99999" step="any" value="100.00" required/>    
                                                    </div>    
                                                    <div class="offset-md-2 col-md-2">
                                                        <label class="label form-label" for="slcTipoEstabelecimento" id="lblTipoEstabelecimento">Tipo Estabelecimento:</label>
                                                        <select class="form-control" id="slcTipoEstabelecimento" name="slcTipoEstabelecimento" required>
                                                            <option value="">--Selecione um Tipo de Estabelecimento--</option>
                                                            <?php
                                                                while($rsTipoEstabelecimento = mysqli_fetch_object($resultTipoEstabelecimento)){
                                                                    echo"<option value='".$rsTipoEstabelecimento->id_tipo_estabelecimento."'>".$rsTipoEstabelecimento->tipo_estabelecimento."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="label form-label" for="slcEstabelecimento" id="lblEstabelecimento">Estabelecimento:</label>
                                                        <select class="form-control" id="slcEstabelecimento" name="slcEstabelecimento" required>
                                                            <option value="">--Selecione um estabelecimento--</option>
                                                            <?php
                                                                while($rsEstabelecimento = mysqli_fetch_object($resultEstabelecimento)){
                                                                    echo"<option value='".$rsEstabelecimento->id_estabelecimento."'>".$rsEstabelecimento->estabelecimento."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="offset-md-3 col-md-4">
                                                        <label class="label form-label" for="slcFormaPagamento" id="lblFormaPagamento">Forma de Pagamento:</label>
                                                        <select class="form-control" id="slcFormaPagamento" name="slcFormaPagamento" required>
                                                            <option value="">--Selecione uma Forma de Pagamento--</option>
                                                            <?php
                                                                while($rsFormaPagamento = mysqli_fetch_object($resultFormaPagamento)){
                                                                    echo"<option value='".$rsFormaPagamento->id_forma_pagamento."'>".$rsFormaPagamento->forma_pagamento."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="label form-label" for="slcCartao" id="lblCartao">Cartao:</label>
                                                        <select class="form-control" id="slcCartao" name="slcCartao" required>
                                                            <option value="">--Selecione um Cartao--</option>
                                                            <?php
                                                                while($rsCartao = mysqli_fetch_object($resultCartao)){
                                                                    echo"<option value='".$rsCartao->id_cartao."'>".$rsCartao->descricao."</option>";
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="label form-label" for="txtDescricao" id="lblDescricao">Descrição Opcional:</label>
                                                        <input class="form-control" id="txtDescricao" name="txtDescricao" placeholder="Descreva a despesa fixa..." required />
                                                    </div>
                                                    <br />
                                                    <div class="container text-center mt-4">
                                                        <button class="btn btn-success" type="submit" id="btnSalvarDespesaVariavel" name="btnSalvarDespesaVariavel">Salvar Despesa Variável</button>
                                                    </div>
                                                </form>
                                                <br />
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>

                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Despesas Variáveis Cadastradas</h6>
                                </div>367
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Selecionar</th>
                                                <th>Descrição</th>
                                                <th>Categoria</th>
                                                <th>Vencimento</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Usuario</th>
                                                <th>Última Atualização</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Selecionar</th>
                                                <th>Descrição</th>
                                                <th>Categoria</th>
                                                <th>Vencimento</th>
                                                <th>Valor</th>
                                                <th>Status</th>
                                                <th>Usuario</th>
                                                <th>Última Atualização</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            //$return = $_SESSION["data"];
                                           // foreach($return as $value){
                                            ?>
                                            <!--<tr>
                                                <td><input class='btn-check' autocomplete='off' type='checkbox' id='chbDespesasFixas<?=$value[0]?>' value='<?=$value[0]?>' /><label class='btn btn-outline-primary' for='chbDespesasFixas<?=$value[0]?>'><?=$value[0]?></label></td>
                                                <td><?=$value[1]?></td>
                                                <td><?=$value[2]?></td>
                                                <td><?=$value[3]?></td>
                                                <td><?=$value[4]?></td>
                                                <td><?=$value[5]?></td>
                                                <td><?=$value[6]?></td>
                                                <td><?=$value[7]?></td>
                                            </tr>-->
                                            <?php
                                            //}
                                            ?>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; caionolasco.com 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

     <!-- Page level plugins -->
     <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>                                                            

    <script>
        var triggerTabList = [].slice.call(document.querySelectorAll('#nav-tab'))
            triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>

</body>

</html>