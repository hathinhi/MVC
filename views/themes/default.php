<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script type="text/javascript" src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
    <title><?= (isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <?php
    if (isset($this->css)) {
        foreach ($this->css as $css) {
            echo '<link rel="stylesheet" type="text/css" href="' . base_url($css) . '">';
        }
    }
    ?>
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            $js = explode(',', $js);
            if (!isset($js[1])) {
                echo '<script type="text/javascript" src="' . base_url($js[0]) . '"></script>';
            }
        }
    }
    ?>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <h1>Demo</h1><br/>
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
if (isset($this->js)) {
    foreach ($this->js as $js) {
        $js = explode(',', $js);
        if (isset($js[1]) && $js[1]) {
            echo '<script type="text/javascript" src="' . base_url($js[0]) . '"></script>';
        }
    }
}
?>
</body>
</html>