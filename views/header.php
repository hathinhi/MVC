<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="<?php echo URL ?>public/css/default.css">
    <script type="text/javascript" src="<?php echo URL; ?>public/js/jquery.js"></script>
    <title><?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <?php
    if (isset($this->js)) {
        foreach ($this->js as $js) {
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
        }
    }
    ?>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <h1>HEADER</h1><br/>
        <br>
        <a href="<?php echo URL ?>help">Help</a>
        <a href="<?php echo URL ?>index">Index</a>
        <a href="<?php echo URL ?>login">Login</a>
    </div>