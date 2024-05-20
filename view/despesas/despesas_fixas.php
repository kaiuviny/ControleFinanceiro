<!DOCTYPE html>
<html lang="en">

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

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Minhas Despesas Fixas</h1>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Selecione o Mês de 2024</h6>
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=1"><button class="nav-link"        id="nav-Janeiro-tab"    data-bs-toggle="tab" data-bs-target="#nav-Janeiro"      type="button" role="tab" aria-controls="nav-Janeiro"    aria-selected="false" onclick="carregar_tabela(1, 1);">    Janeiros        </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=2"><button class="nav-link"        id="nav-Fevereiro-tab"  data-bs-toggle="tab" data-bs-target="#nav-Fevereiro"    type="button" role="tab" aria-controls="nav-Fevereiro"  aria-selected="false" onclick="carregar_tabela(1, 2);">    Fevereiro       </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=3"><button class="nav-link"        id="nav-Marco-tab"      data-bs-toggle="tab" data-bs-target="#nav-Marco"        type="button" role="tab" aria-controls="nav-Marco"      aria-selected="false" onclick="carregar_tabela(1, 3);">    Março           </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=4"><button class="nav-link"        id="nav-Abril-tab"      data-bs-toggle="tab" data-bs-target="#nav-Abril"        type="button" role="tab" aria-controls="nav-abril"      aria-selected="false" onclick="carregar_tabela(1, 4);">    Abril           </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=5"><button class="nav-link"        id="nav-Maio-tab"       data-bs-toggle="tab" data-bs-target="#nav-Maio"         type="button" role="tab" aria-controls="nav-maio"       aria-selected="true"  onclick="carregar_tabela(1, 5);">    Maio            </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=6"><button class="nav-link"        id="nav-Junho-tab"      data-bs-toggle="tab" data-bs-target="#nav-Junho"        type="button" role="tab" aria-controls="nav-junho"      aria-selected="false" onclick="carregar_tabela(1, 6);">    Junho           </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=7"><button class="nav-link"        id="nav-Julho-tab"      data-bs-toggle="tab" data-bs-target="#nav-Julho"        type="button" role="tab" aria-controls="nav-julho"      aria-selected="false" onclick="carregar_tabela(1, 7);">    Julho           </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=8"><button class="nav-link"        id="nav-Agosto-tab"     data-bs-toggle="tab" data-bs-target="#nav-Agosto"       type="button" role="tab" aria-controls="nav-agosto"     aria-selected="false" onclick="carregar_tabela(1, 8);">    Agosto          </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=9"><button class="nav-link"        id="nav-Setembro-tab"   data-bs-toggle="tab" data-bs-target="#nav-Setembro"     type="button" role="tab" aria-controls="nav-setembro"   aria-selected="false" onclick="carregar_tabela(1, 9);">    Setembro        </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=10"><button class="nav-link"       id="nav-Outubro-tab"    data-bs-toggle="tab" data-bs-target="#nav-Outubro"      type="button" role="tab" aria-controls="nav-outubro"    aria-selected="false" onclick="carregar_tabela(1, 10);">   Outubro         </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=11"><button class="nav-link"       id="nav-Novembro-tab"   data-bs-toggle="tab" data-bs-target="#nav-Novembro"     type="button" role="tab" aria-controls="nav-novembro"   aria-selected="false" onclick="carregar_tabela(1, 11);">   Novembro        </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=listar&mes=12"><button class="nav-link"       id="nav-Dezembro-tab"   data-bs-toggle="tab" data-bs-target="#nav-Dezembro"     type="button" role="tab" aria-controls="nav-dezembro"   aria-selected="false" onclick="carregar_tabela(1, 12);">   Dezembro        </button></a>
                                            <a href="?Controller=Despesas_Fixas&Action=novo">         <button class="nav-link"       id="nav-novo-tab"       data-bs-toggle="tab" data-bs-target="#nav-novo"         type="button" role="tab" aria-controls="nav-novo"       aria-selected="false" onclick="">                          Nova Despesa    </button></a>
                                        </div>
                                    </nav>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade"              id="nav-Janeiro"    role="tabpanel" aria-labelledby="nav-Janeiro-tab"> Janeiro Janeiro Janeiro Janeiro </div>
                                        <div class="tab-pane fade"              id="nav-Fevereiro"  role="tabpanel" aria-labelledby="nav-Fevereiro-tab"> Fevereiro Fevereiro Fevereiro Fevereiro Fevereiro </div>
                                        <div class="tab-pane fade"              id="nav-Marco"      role="tabpanel" aria-labelledby="nav-Marco-tab"> Março Março Março Março Março Março</div>
                                        <div class="tab-pane fade"              id="nav-Abril"      role="tabpanel" aria-labelledby="nav-Abril-tab"> Abril Abril Abril Abril</div>
                                        <div class="tab-pane fade"              id="nav-Maio"       role="tabpanel" aria-labelledby="nav-Maio-tab"> Maio Maio Maio Maio Maio Maio Maio Maio</div>
                                        <div class="tab-pane fade"              id="nav-Junho"      role="tabpanel" aria-labelledby="nav-Junho-tab"> Junho junho Junho Junho junho </div>
                                        <div class="tab-pane fade"              id="nav-Julho"      role="tabpanel" aria-labelledby="nav-Julho-tab"> Julho Julho Julho Julho Julho Julho </div>
                                        <div class="tab-pane fade"              id="nav-Agosto"     role="tabpanel" aria-labelledby="nav-Agosto-tab"> Agosto Agosto Agosto Agosto Agosto</div>
                                        <div class="tab-pane fade"              id="nav-Setembro"   role="tabpanel" aria-labelledby="nav-Setembro-tab"> Setembro Setembro Setembro Setembro Setembro</div>
                                        <div class="tab-pane fade"              id="nav-Outubro"    role="tabpanel" aria-labelledby="nav-Outubro-tab"> Outubro Outubro Outubro Outubro </div>
                                        <div class="tab-pane fade"              id="nav-Novembro"   role="tabpanel" aria-labelledby="nav-Novembro-tab"> Novembro Novembro Novembro Novembro Novembro</div>
                                        <div class="tab-pane fade"              id="nav-Dezembro"   role="tabpanel" aria-labelledby="nav-Dezembro-tab"> Dezembro Dezembro Dezembro Dezembro</div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Despesas Fixas Mes de Maio</h6>
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
                                        $return = $_SESSION["data"];
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
                    </div>

                </div>
                <!-- /.container-fluid -->

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

</body>

</html>