<div class="content-wrapper">
<section class="content-header">
      <h1>
        Admin
        <small><?php echo $button ?> Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li ><a href="<?php echo base_url('admin/user') ?>">User</a></li>
        <li class="active"><?php echo $button ?></li>
    </ol>
</section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data Admin</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                <table class='table table-bordered'>        

                       <tr>
                        <td width='200' >Nama Lengkap <?php echo form_error('full_name') ?></td>
                        <td <?php echo (form_error('full_name')) ? 'class="has-error"' : "" ?> ><input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" /></td>
                    </tr>
                        <tr>
                            <td width='200'>Email <?php echo form_error('email') ?></td>
                            <td <?php echo (form_error('email')) ? 'class="has-error"' : "" ?> > <input <?php echo ($this->uri->segment(3) == 'create' || $this->uri->segment(3) == 'create_action') ? "" : "disabled" ?> type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
                        </tr>

                
                        <tr><td width='200'>Password <?php echo form_error('password') ?></td><td><input type="text" class="form-control" name="password" id="password" placeholder="Password"  /></td></tr>
                       


                    <tr><td width='200'>Level User <?php echo form_error('id_user_level') ?></td><td>
                            <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level,'DESC') ?>
                            <!--<input type="text" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" />--></td></tr>
                    <tr><td width='200'>Status Aktif <?php echo form_error('is_aktif') ?></td><td>
                            <?php echo form_dropdown('is_aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $is_aktif, array('class' => 'form-control')); ?>
                            <!--<input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" />--></td></tr>
                    <tr><td width='200'>Foto Profile <?php echo form_error('images') ?></td><td> <input type="file" name="images"></td></tr>
                    <tr><td></td><td><input type="hidden" name="id_users" value="<?php echo $id_users; ?>" /> 
                            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                            <a href="<?php echo site_url($this->config->item("dashboardUrl")
.'user') ?>" class="btn btn-default"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
                </table></form>        
            </div>
</section>
</div>