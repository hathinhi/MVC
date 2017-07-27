<div class="container container-index">
    <div class="header-table">
        <div class="bt-bg-add">
            <a href="<?php echo $this->a_link_add ?>"> <i class="fa fa-plus-circle ac-bt-add"
                                                          aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="content-table">
        <table class="table table-striped table-bordered">
            <thead>
            <?php foreach ($this->headers as $name_header) {
                if ($name_header['table']) { ?>
                    <th><?php echo $name_header['label'] ?></th>
                <?php }
            } ?>
            <th>Action</th>
            </thead>
            <tbody>
            <?php if ($this->users == NULL) { ?>
                <p>Data null</p>
            <?php } else foreach ($this->users as $user) { ?>
                <tr>
                    <?php
                    foreach ($this->headers as $name_header) {
                        if ($name_header['table']) { ?>
                            <td><?php echo $user[$name_header['field']] ?></td>
                        <?php }
                    } ?>
                    <td class="th-ac">
                        <a href="<?php echo $this->a_link_edit . "/" . $user['id'] ?>"><i
                                    class="fa fa-pencil-square-o ac-bt-style" aria-hidden="true"></i></a>
                        <a class="e_ajax_deleted"
                           href="<?php echo $this->a_link_delete . "/" . $user['id'] ?>"><i
                                    class="fa fa-trash ac-bt-style" aria-hidden="true"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
