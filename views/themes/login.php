<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
    <title><?= (isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <script src="<?php echo base_url("bower_components/jquery/dist/jquery.js"); ?>"></script>
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
</head>
<body>
<div>
    <?php echo $this->content ?>
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