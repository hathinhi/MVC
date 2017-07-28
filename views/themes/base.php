<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= (isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <?php
    if (isset($this->_arrcss)) {
        foreach ($this->_arrcss as $css) {
            echo '<link rel="stylesheet" type="text/css" href="' . base_url($css) . '">';
        }
    }
    ?>
    <?php
    if (isset($this->_arrjs)) {
        foreach ($this->_arrjs as $js) {
            $js = explode(',', $js);
            if (!isset($js[1])) {
                echo '<script type="text/javascript" src="' . base_url($js[0]) . '"></script>';
            }
        }
    }
    ?>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("bower_components/bootstrap/dist/css/bootstrap.css"); ?>"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url("bower_components/font-awesome/css/font-awesome.css"); ?>"/>
    <!-- NProgress -->
    <link href="<?php echo base_url("bower_components/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url("bower_components/iCheck/skins/flat/green.css"); ?>" rel="stylesheet">
    <!-- Datatables -->
    <link href="<?php echo base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>"
          rel="stylesheet">
    <link href="<?php echo base_url("bower_components/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"); ?>"
          rel="stylesheet">
    <link href="<?php echo base_url("bower_components/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"); ?> rel="
          stylesheet
    ">
    <link href="<?php echo base_url("bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"); ?>"
          rel="stylesheet">
    <link href="<?php echo base_url("bower_components/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"); ?>"
          rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("public/base/build/css/custom.min.css") ?>" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?php echo site_url('') ?>" class="site_title"><i class="fa fa-free-code-camp"></i> <span>Manager</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?php echo base_url('public/images/avatar.jpg') ?>" alt="..."
                             class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Admin</span>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="index.html">Dashboard</a></li>
                                    <li><a href="index2.html">Dashboard2</a></li>
                                    <li><a href="index3.html">Dashboard3</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="form.html">General Form</a></li>
                                    <li><a href="form_advanced.html">Advanced Components</a></li>
                                    <li><a href="form_validation.html">Form Validation</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-desktop"></i> UI Elements <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="general_elements.html">General Elements</a></li>
                                    <li><a href="media_gallery.html">Media Gallery</a></li>
                                    <li><a href="typography.html">Typography</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="tables.html">Tables</a></li>
                                    <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                            class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="chartjs.html">Chart JS</a></li>
                                    <li><a href="chartjs2.html">Chart JS2</a></li>
                                    <li><a href="morisjs.html">Moris JS</a></li>
                                    <li><a href="echarts.html">ECharts</a></li>
                                    <li><a href="other_charts.html">Other Charts</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                    <li><a href="fixed_footer.html">Fixed Footer</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?php echo base_url('public/images/avatar.jpg') ?>" alt="">Admin
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;"> Profile</a></li>
                                <li><a href="<?php echo site_url("logout") ?>"><i class="fa fa-sign-out pull-right"></i>
                                        Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="clearfix"></div>
                <?php echo $this->content ?>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url("bower_components/jquery/dist/jquery.min.js") ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url("bower_components/bootstrap/dist/js/bootstrap.min.js") ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url("bower_components/fastclick/lib/fastclick.js") ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url("bower_components/nprogress/nprogress.js") ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url("bower_components/iCheck/icheck.min.js") ?>"></script>
<!-- Datatables -->
<script src="<?php echo base_url("bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-buttons/js/dataTables.buttons.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-buttons-bs/js/buttons.bootstrap.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-buttons/js/buttons.flash.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-buttons/js/buttons.html5.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-buttons/js/buttons.print.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-keytable/js/dataTables.keyTable.min.js"); ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-responsive/js/dataTables.responsive.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js") ?>"></script>
<script src="<?php echo base_url("bower_components/datatables.net-scroller/js/dataTables.scroller.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/jszip/dist/jszip.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/pdfmake/build/pdfmake.min.js") ?>"></script>
<script src="<?php echo base_url("bower_components/pdfmake/build/vfs_fonts.js") ?>"></script>

<!--<!-- Custom Theme Scripts -->
<script src="<?php echo base_url("public/base/build/js/custom.min.js") ?>"></script>
<?php
if (isset($this->_arrjs)) {
    foreach ($this->_arrjs as $js) {
        $js = explode(',', $js);
        if (isset($js[1]) && $js[1]) {
            echo '<script type="text/javascript" src="' . base_url($js[0]) . '"></script>';
        }
    }
}
?>
</body>
</html>