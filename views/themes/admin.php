<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!--    <script type="text/javascript" src="--><?php //echo base_url('public/js/jquery.js'); ?><!--"></script>-->
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
    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url("bower_components/bootstrap/dist/css/bootstrap.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("bower_components/bootstrap/dist/css/bootstrap-theme.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("bower_components/font-awesome/css/font-awesome.css"); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url("bower_components/select2/dist/css/select2.css"); ?>"/>
    <link href="<?php echo base_url("bower_components/datatables.net-bs/css/dataTables.bootstrap.css"); ?>"
          rel="stylesheet">
    <link href="<?php echo base_url("bower_components/datatables.net-responsive-bs/css/responsive.bootstrap.css"); ?>"
          rel="stylesheet">
    <script src="<?php echo base_url("bower_components/jquery/dist/jquery.js"); ?>"></script>

    <script src="<?php echo base_url("bower_components/bootstrap/dist/js/bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("bower_components/jquery-ui/jquery-ui.js"); ?>"></script>
    <script src="<?php echo base_url("bower_components/jquery-form/jquery.form.js"); ?>"></script>
    <script src="<?php echo base_url("bower_components/jGrowl/jquery.jgrowl.js"); ?>"></script>
    <script src="<?php echo base_url("bower_components/select2/dist/js/select2.js"); ?>"></script>
    <script src="<?php echo base_url("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js") ?>"></script>
    <script src="<?php echo base_url("bower_components/datatables.net-responsive/js/dataTables.responsive.min.js") ?>"></script>
    <script src="<?php echo base_url("bower_components/datatables.net-responsive-bs/js/responsive.bootstrap.js") ?>"></script>
    <script src="<?php echo base_url("bower_components/datatables.net/js/jquery.dataTables.min.js") ?>"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <h1>HEADER</h1><br/>
        <br>
        <a href="<?php echo site_url('help') ?>">Help</a>
        <a href="<?php echo site_url('index') ?>">Index</a>
        <a href="<?php echo site_url('login') ?>">Login</a>
    </div>
    <?php echo $this->content ?>
    <div id="footer">
        <a href="logout">Logout</a>
        <h1>FOOTER</h1>
    </div>
</div>

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