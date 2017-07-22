<div>
    <p><?php echo $this->lang->account_creation_successful ?></p>
    <p><?php echo $this->lang->form_validation_file_required ?></p>
    <form method="post" action="<?php echo site_url('index/configLang')?>">
        <input type="submit" name="en" value="en">
<!--        <input type="submit" name="vi" value="vi">-->
    </form>
    <a href="<?php echo site_url('home')?>">Home</a>
</div>
