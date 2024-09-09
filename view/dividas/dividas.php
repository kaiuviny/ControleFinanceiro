<?php
$link = mysqli_connect("127.0.0.1", "root", "", "ControleFinanceiro", "33306");
$resultMesID = mysqli_query($link, "SELECT mes FROM controlefinanceiro.meses WHERE id_mes = ".$_SESSION['mes_id']);
$rsMesID = mysqli_fetch_object($resultMesID);
$resultMeses = mysqli_query($link, "SELECT * FROM controlefinanceiro.meses");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listagem de Dividas</title>

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

                            <!-- Page Content -->
                            <div class="card shadow mb-4">

                                <!-- Page Heading -->
                                <div class="card-header py-3">
                                    <h2 class="m-0 font-weight-bold text-primary">Dívidas Cadastradas</h2>
                                </div>

                                <div class="card_header py-3">
                                    
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        &nbsp;&nbsp;&nbsp;&nbsp;Selecione o ano:
                                        <select class="btn-primary" onchange="selectYear('Dividas', 'listar', <?=$_SESSION['mes_id']?>, this.value);">
                                            <option value="<?=$_SESSION['ano']?>"><?=$_SESSION['ano']?></option>
                                            <?php
                                            for($i=2020;$i<=2030;$i++){
                                                echo"<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </h6>

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a href="?Controller=Dividas&Action=listar&mes=1&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 1  ? "active" : ""; ?>" id="nav-Janeiro-tab"     data-bs-toogle="tab" data-bs-target="#nav-Janeiro"      type="button" role="tab" aria-controls="nav-Janeiro"    aria-selected="false" onclick="carregar_tabela(1, 1);" >    Janeiro     </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=2&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 2  ? "active" : ""; ?>" id="nav-Feveiro-tab"     data-bs-toogle="tab" data-bs-target="#nav-Fevereiro"    type="button" role="tab" aria-controls="nav-Feveiro"    aria-selected="false" onclick="carregar_tabela(1, 2);" >    Fevereiro   </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=3&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 3  ? "active" : ""; ?>" id="nav-Marco-tab"       data-bs-toogle="tab" data-bs-target="#nav-Marco"        type="button" role="tab" aria-controls="nav-Marco"      aria-selected="false" onclick="carregar_tabela(1, 3);" >    Março       </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=4&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 4  ? "active" : ""; ?>" id="nav-Abril-tab"       data-bs-toogle="tab" data-bs-target="#nav-Abril"        type="button" role="tab" aria-controls="nav-Abril"      aria-selected="false" onclick="carregar_tabela(1, 4);" >    Abril       </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=5&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 5  ? "active" : ""; ?>" id="nav-Maio-tab"        data-bs-toogle="tab" data-bs-target="#nav-Maio"         type="button" role="tab" aria-controls="nav-Maio"       aria-selected="false" onclick="carregar_tabela(1, 5);" >    Maio        </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=6&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 6  ? "active" : ""; ?>" id="nav-Junho-tab"       data-bs-toogle="tab" data-bs-target="#nav-Junho"        type="button" role="tab" aria-controls="nav-Junho"      aria-selected="false" onclick="carregar_tabela(1, 6);" >    Junho       </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=7&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 7  ? "active" : ""; ?>" id="nav-Julho-tab"       data-bs-toogle="tab" data-bs-target="#nav-Julho"        type="button" role="tab" aria-controls="nav-Julho"      aria-selected="false" onclick="carregar_tabela(1, 7);" >    Julho       </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=8&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 8  ? "active" : ""; ?>" id="nav-Agosto-tab"      data-bs-toogle="tab" data-bs-target="#nav-Agosto"       type="button" role="tab" aria-controls="nav-Agosto"     aria-selected="false" onclick="carregar_tabela(1, 8);" >    Agosto      </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=9&ano=<?=$_SESSION['ano']?>"><button class="nav-link  <?php echo $_SESSION['mes_id'] == 9  ? "active" : ""; ?>" id="nav-Setembro-tab"    data-bs-toogle="tab" data-bs-target="#nav-Setembro"     type="button" role="tab" aria-controls="nav-Setembro"   aria-selected="false" onclick="carregar_tabela(1, 9);" >    Setembro    </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=10&ano=<?=$_SESSION['ano']?>"><button class="nav-link <?php echo $_SESSION['mes_id'] == 10 ? "active" : ""; ?>" id="nav-Outubro-tab"     data-bs-toogle="tab" data-bs-target="#nav-Outubro"      type="button" role="tab" aria-controls="nav-Outubro"    aria-selected="false" onclick="carregar_tabela(1, 10);" >   Outubro     </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=11&ano=<?=$_SESSION['ano']?>"><button class="nav-link <?php echo $_SESSION['mes_id'] == 11 ? "active" : ""; ?>" id="nav-Novembro-tab"    data-bs-toogle="tab" data-bs-target="#nav-Novembro"     type="button" role="tab" aria-controls="nav-Novembro"   aria-selected="false" onclick="carregar_tabela(1, 11);" >   Novembro    </button></a>
                                            <a href="?Controller=Dividas&Action=listar&mes=12&ano=<?=$_SESSION['ano']?>"><button class="nav-link <?php echo $_SESSION['mes_id'] == 12 ? "active" : ""; ?>" id="nav-Dezembro-tab"    data-bs-toogle="tab" data-bs-target="#nav-Dezembro"     type="button" role="tab" aria-controls="nav-Dezembro"   aria-selected="false" onclick="carregar_tabela(1, 12);" >   Dezembro    </button></a>
                                        </div>
                                    </nav>

                                </div>
                                
                                <!-- Begin Page Content -->
                                <div class="card-body">
                                    <a href="?Controller=Dividas&Action=novo"><button class="btn btn-primary" id="btnNovaDespesa">Cadastrar Nova Divida</button></a>
                                    <hr />
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                            <tr>
                                                <th>Selecionar</th>
                                                <th>Tipo da Dívida</th>
                                                <th>Cartão</th>
                                                <th>Descrição da Dívida</th>
                                                <th>Orgão devedor</th>
                                                <th>Site do Orgão</th>
                                                <th>Valor da Parcela</th>
                                                <th>Número de Parcelas</th>
                                                <th>Valor Total</th>
                                                <th>Data Inicial</th>
                                                <th>Dia do Vencimento</th>
                                                <th>Multa de Atraso</th>
                                                <th>Juros p/ Dia</th>
                                                <th>Desconto p/ Dia (pgto adiantado)</th>
                                                <th>Data Criação</th>
                                                <th>Usuário</th>
                                                <th>Ultima Atualização</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Selecionar</th>
                                                <th>Tipo da Dívida</th>
                                                <th>Cartão</th>
                                                <th>Descrição da Dívida</th>
                                                <th>Orgão devedor</th>
                                                <th>Site do Orgão</th>
                                                <th>Valor da Parcela</th>
                                                <th>Parcelas Pagas</th>
                                                <th>Valor Total</th>
                                                <th>Data Inicial</th>
                                                <th>Dia do Vencimento</th>
                                                <th>Multa de Atraso</th>
                                                <th>Juros p/ Dia</th>
                                                <th>Desconto p/ Dia (pgto adiantado)</th>
                                                <th>Data Criação</th>
                                                <th>Usuário</th>
                                                <th>Ultima Atualização</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            $return = $_SESSION["data_dividas"];
                                            foreach($return as $value){
                                            ?>
                                            <tr style="<?=$value[18]?>">
                                                <td><input class='btn-check' autocomplete='off' type='checkbox' id='chbDespesasFixas<?=$value[0]?>' value='<?=$value[0]?>' /><label class='btn btn-outline-primary' for='chbDespesasFixas<?=$value[0]?>'><?=$value[0]?></label></td>
                                                <td><?=$value[1]?></td>
                                                <td><?=$value[2]?></td>
                                                <td><?=$value[3]?></td>
                                                <td><?=$value[4]?></td>
                                                <td><?=$value[5]?></td>
                                                <td><?=$value[6]?></td>
                                                <td><?=$value[20]?>/<?=$value[7]?></td>
                                                <td><?=$value[8]?></td>
                                                <td><?=$value[9]?></td>
                                                <td><?=$value[10]?></td>
                                                <td><?=$value[11]?></td>
                                                <td><?=$value[12]?></td>
                                                <td><?=$value[13]?></td>
                                                <td><?=$value[14]?></td>
                                                <td><?=$value[15]?></td>
                                                <td><?=$value[16]?></td>
                                                <td><?php if($value[19] == "Pagar"){ ?><button type="button" class="btn btn-Light" data-toggle="modal" data-target="#mdlPagarDivida" data-minha_divida_id="<?=$value[0]?>" data-descricao_divida="<?=$value[3]?>" data-mes_id="<?=$_SESSION['mes_id']?>" data-ano="<?=$_SESSION['ano']?>" data-numero_parcelas="<?=$value[7]?>" data-parcelas_pagas="<?=$value[20]?>" ><?=$value[17]?> <?php } else { echo "<button class='btn btn-Light'>".$value[17]; } ?></button></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        </table>
                                        <hr />
                                        <a href="?Controller=Dividas&Action=novo"><button class="btn btn-primary" id="btnNovaDespesa">Cadastrar Nova Divida</button></a>
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

    <!-- Modal Pagar Divida
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlPagarDivida" data-minha_divida_id="1">Pagar</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlPagarDivida" data-minha_divida_id="2">Open modal for @fat</button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mdlPagarDivida" data-minha_divida_id="3">Open modal for @getbootstrap</button>
    -->
        <div class="modal fade" id="mdlPagarDivida" name="mdlPagarDivida" tabindex="-1" role="dialog" aria-labelledby="mdlPagarDividaLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mdlPagarDividaLabel">Minha dívida nº </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="txtMinhaDividaID" class="col-form-label" id="lblMinhaDividaID">Minha Divida ID:</label>
                                <input type="number" class="form-control" id="txtMinhaDividaID" name="txtMinhaDividaID">
                            </div>
                            <div class="form-group">
                                <label for="slcFormaPagamento" class="col-form-label" id="lblFormaPagamento">Forma de Pagamento</label>
                                <select class="form-control" id="slcFormaPagamento" name="slcFormaPagamento">
                                    <option value="1">Boleto</option>
                                    <option value="2">PIX</option>
                                    <option value="3">Cartao</option>
                                    <option value="4">CriptoMoeda</option>
                                    <option value="5">Dinheiro</option>
                                    <option value="6">Cheque</option>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label for="slcCartao" class="col-form-label" id="lblCartao">Cartão</label>
                                <select class="form-control" id="slcCartao" name="slcCartao">
                                    <option value="0">Sem Cartão</option>
                                    <option value="1">Nubank Zelly</option>
                                    <option value="2">Carrefour Zelly</option>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label for="slcMes" class="col-form-label" id="lblMes">Mês</label>
                                <select class="form-control" id="slcMes" name="slcMes">
                                    <option value="<?=$_SESSION['mes_id']?>"><?=$rsMesID->mes?></option>
                                    <?php
                                    while($rsMeses = mysqli_fetch_object($resultMeses)){
                                        echo "<option value='".$rsMeses->id_mes."'>".$rsMeses->mes."</option>";
                                    }
                                    ?>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label for="slcAno" class="col-form-label" id="lblAno">Ano</label>
                                <select class="form-control" id="slcAno" name="slcAno">
                                    <?php
                                    for($i=2020;$i<=2030;$i++){
                                        echo "<option value='$i'>".$i."</option>";
                                    }
                                    ?>
                                </select>     
                            </div>
                            <div class="form-group">
                                <label for="txtNumeroParcelaPaga" class="col-form-label" id="lblNumeroParcelaPaga">Número da Parcela Paga<b id="numeroParcelaPaga"></b></label>
                                <input type="number" class="form-control" id="txtNumeroParcelaPaga" name="txtNumeroParcelaPaga"/>
                            </div>
                            <div class="form-group">
                                <label for="txtarObservacao" class="col-form-label" id="lblObservacao">Observação:</label>
                                <textarea class="form-control" id="txtarObservacao" name="txtarObservacao"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar Pagamento</button>
                        <button type="button" class="btn btn-success">Registrar Pagamento</button>
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
        function selectYear(controller, action, month, year){
            let prt = window.location.protocol
            let hst = window.location.host
            let pth = window.location.pathname
            let act = "?Controller="+controller+"&Action="+action+"&mes="+month+"&ano="+year
            let nUrl = (prt + "//" + hst + pth + act)
            window.location.href = nUrl
        }
    </script>

    <script>
        $('#mdlPagarDivida').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var minha_divida_id = button.data('minha_divida_id') // Extract info from data-* attributes
                var descricao_divida = button.data('descricao_divida')
                var ano = button.data('ano')
                var mes_id = button.data('mes_id')
                var numero_parcelas = button.data('numero_parcelas')
                var parcelas_pagas = button.data('parcelas_pagas')
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('Minha dívida nº ' + minha_divida_id + ": " + descricao_divida)
                modal.find('#txtMinhaDividaID').val(minha_divida_id)
                modal.find('#slcAno').val(ano)
                modal.find('#slcMes').val(mes_id)
                modal.find('#numeroParcelaPaga').html(" ("+parcelas_pagas + "/" + numero_parcelas + ") ")
        })
    </script>
</body>

</html>