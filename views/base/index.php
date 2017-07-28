<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $this->title ?></h2>
                <div class="header-table">
                    <div class="btn bt-bg-add">
                        <a href="<?php echo $this->a_link_add ?>">Add</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="container container-index">
                    <div class="content-table">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap"
                               cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <?php foreach ($this->headers as $name_header) {
                                    if ($name_header['table']) { ?>
                                        <th><?php echo $name_header['label'] ?></th>
                                    <?php }
                                } ?>
                                <th class="action">Action</th>
                            </tr>
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
                                                    class="fa fa-pencil-square-o ac-bt-style"
                                                    aria-hidden="true"></i></a>
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
            </div>
        </div>
    </div>
</div>
