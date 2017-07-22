<form id="randomInsert" action="<?php echo site_url('home/xhrInsert/'); ?>" method="post">
    <input type="text" name="username"/>
    <input type="submit"/>
</form>
<p><?php echo $this->lang->account_creation_successful ?></p>
<br/>

<div id="listInserts">

</div>