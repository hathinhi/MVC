<!-----------------# footer-------------------->
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