<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Despesas Fixas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
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
                                    <h2 class="m-0 font-weight-bold text-primary">Minhas Despesas Fixas</h2>
                                </div>

                                <div class="card-header py-3">
                                    
                                    <h6 class="m-0 font-weight-bold text-primary">
                                        &nbsp;&nbsp;&nbsp;&nbsp;Selecione o ano: 
                                        <select class="btn-primary" onchange="selectYear('Despesas_Fixas', 'listar', <?=$_SESSION['mes_id']?>, this.value);">
                                            <option value="<?=$_GET['ano']?>"><?=$_GET['ano']?></option>
                                            <?php
                                            for($i=2020;$i<=2030;$i++){
                                                echo"<option value='$i'>$i</option>";
                                            }
                                            ?>
                                        </select>
                                    </h6>

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=1&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 1  ? "active" : ""; ?>" id="nav-Janeiro-tab"    data-bs-toggle="tab" data-bs-target="#nav-Janeiro"      type="button" role="tab" aria-controls="nav-Janeiro"    aria-selected="false" onclick="carregar_tabela(1, 1);">    Janeiro        </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=2&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 2  ? "active" : ""; ?>" id="nav-Fevereiro-tab"  data-bs-toggle="tab" data-bs-target="#nav-Fevereiro"    type="button" role="tab" aria-controls="nav-Fevereiro"  aria-selected="false" onclick="carregar_tabela(1, 2);">    Fevereiro       </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=3&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 3  ? "active" : ""; ?>" id="nav-Marco-tab"      data-bs-toggle="tab" data-bs-target="#nav-Marco"        type="button" role="tab" aria-controls="nav-Marco"      aria-selected="false" onclick="carregar_tabela(1, 3);">    Março           </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=4&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 4  ? "active" : ""; ?>" id="nav-Abril-tab"      data-bs-toggle="tab" data-bs-target="#nav-Abril"        type="button" role="tab" aria-controls="nav-Abril"      aria-selected="false" onclick="carregar_tabela(1, 4);">    Abril           </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=5&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 5  ? "active" : ""; ?>" id="nav-Maio-tab"       data-bs-toggle="tab" data-bs-target="#nav-Maio"         type="button" role="tab" aria-controls="nav-Maio"       aria-selected="true"  onclick="carregar_tabela(1, 5);">    Maio            </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=6&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 6  ? "active" : ""; ?>" id="nav-Junho-tab"      data-bs-toggle="tab" data-bs-target="#nav-Junho"        type="button" role="tab" aria-controls="nav-Junho"      aria-selected="false" onclick="carregar_tabela(1, 6);">    Junho           </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=7&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 7  ? "active" : ""; ?>" id="nav-Julho-tab"      data-bs-toggle="tab" data-bs-target="#nav-Julho"        type="button" role="tab" aria-controls="nav-Julho"      aria-selected="false" onclick="carregar_tabela(1, 7);">    Julho           </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=8&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 8  ? "active" : ""; ?>" id="nav-Agosto-tab"     data-bs-toggle="tab" data-bs-target="#nav-Agosto"       type="button" role="tab" aria-controls="nav-Agosto"     aria-selected="false" onclick="carregar_tabela(1, 8);">    Agosto          </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=9&ano= <?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 9  ? "active" : ""; ?>" id="nav-Setembro-tab"   data-bs-toggle="tab" data-bs-target="#nav-Setembro"     type="button" role="tab" aria-controls="nav-Setembro"   aria-selected="false" onclick="carregar_tabela(1, 9);">    Setembro        </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=10&ano=<?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 10 ? "active" : ""; ?>" id="nav-Outubro-tab"    data-bs-toggle="tab" data-bs-target="#nav-Outubro"      type="button" role="tab" aria-controls="nav-Outubro"    aria-selected="false" onclick="carregar_tabela(1, 10);">   Outubro         </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=11&ano=<?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 11 ? "active" : ""; ?>" id="nav-Novembro-tab"   data-bs-toggle="tab" data-bs-target="#nav-Novembro"     type="button" role="tab" aria-controls="nav-Novembro"   aria-selected="false" onclick="carregar_tabela(1, 11);">   Novembro        </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=listar&mes_id=12&ano=<?=$_GET['ano']?>"><button class="nav-link  <?php echo $_GET['mes_id'] == 12 ? "active" : ""; ?>" id="nav-Dezembro-tab"   data-bs-toggle="tab" data-bs-target="#nav-Dezembro"     type="button" role="tab" aria-controls="nav-Dezembro"   aria-selected="false" onclick="carregar_tabela(1, 12);">   Dezembro        </button></a>
                                            <a href="?Controller=<?=$_SESSION['page']?>&Action=novo"><button class="btn btn-primary" id="btnNovaDespesa">Nova Despesa</button></a>
                                        </div>
                                    </nav>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Selecionar</th>
                                                    <th>Descrição</th>
                                                    <th>Categoria</th>
                                                    <th>Dia Vencimento</th>
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
                                                $return = $_SESSION["data_depesas_fixas"];
                                                foreach($return as $value){
                                                ?>
                                                <tr>
                                                    <td><input class='btn-check' autocomplete='off' type='checkbox' id='chbDespesasFixas<?=$value[0]?>' value='<?=$value[0]?>' /><label class='btn btn-outline-primary' for='chbDespesasFixas<?=$value[0]?>'><?=$value[0]?></label></td>
                                                    <td><?=$value[1]?></td>
                                                    <td><?=$value[2]?></td>
                                                    <td><?=$value[3]?></td>
                                                    <td><?=$value[4]?></td>
                                                    <td><?=$value[5]?></td>
                                                    <td><?=$value[6]?></td>
                                                    <td><?=$value[7]?></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>    
                                    </div>        
                                </div>
                                <hr />
                                <div class="card-body">
                                    <a href="?Controller=Despesas_Fixas&Action=novo"><button class="btn btn-primary" id="btnNovaDespesa">Nova Despesa</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
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
        function selectYear(controller, action, month, year){
            
            let prt = window.location.protocol
            let hst = window.location.host
            let pth = window.location.pathname
            let act = "?Controller="+controller+"&Action="+action+"&mes="+month+"&ano="+year
            let nUrl = (prt + "//" + hst + pth + act)
            window.location.href = nUrl
        }
    </script>
</body>

</html>