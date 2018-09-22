<div class="content-wrapper">
   <section class="content-header">
      <h1>
        Hak Akses
        <small><?php echo $button ?> Hak Akses</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li ><a href="<?php echo base_url('admin/userlevel') ?>">Hak Akses</a></li>
        <li class="active"><?php echo $button ?></li>
    </ol>
</section> 
    <section class="content">
        <div class="box box-primary ">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $button ?> Data Hak Akses</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered'>        

	    <tr>
            <td width='200'>Nama Level <?php echo form_error('nama_level') ?></td>
            <td  <?php echo (form_error('nama_level')) ? 'class="has-error"' : "" ?>><input type="text" class="form-control" name="nama_level" id="nama_level" placeholder="Nama Level" value="<?php echo $nama_level; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_user_level" value="<?php echo $id_user_level; ?>" /> 
	    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url($this->config->item("dashboardUrl").'userlevel') ?>" class="btn btn-default"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</section>
</div>