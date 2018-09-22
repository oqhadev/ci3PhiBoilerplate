<div class="content-wrapper">
<section class="content-header">
      <h1>
        Menu
        <small><?php echo $button ?> Menu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li ><a href="<?php echo base_url('admin/menu') ?>">Menu</a></li>
        <li class="active"><?php echo $button ?></li>
    </ol>
</section>
    <section class="content">
        <div class="box box-primary ">
            <div class="box-header with-border">
                <h3 class="box-title"><?php echo $button ?> Data Menu</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

                <table class='table table-bordered'>       

                 <tr>
                    <td width='200'>Title <?php echo form_error('title') ?></td>
                    <td  <?php echo (form_error('title')) ? 'class="has-error"' : "" ?>><input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" /></td>
                </tr>
                 <tr>
                    <td width='200'>Url <?php echo form_error('url') ?></td>
                    <td <?php echo (form_error('url')) ? 'class="has-error"' : "" ?>><input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" /></td>
                </tr>
                 <tr>
                    <td width='200'>Icon <?php echo form_error('icon') ?></td>
                    <td <?php echo (form_error('icon')) ? 'class="has-error"' : "" ?>><input type="text" class="form-control" name="icon" id="icon" placeholder="Icon" value="<?php echo $icon; ?>" /></td></tr>
                 <tr>
                    <td width='200' >Is Main Menu <?php echo form_error('is_main_menu') ?></td>
                    <td>                            <select name="is_main_menu" class="form-control">
                    <option value="0">MAIN MENU</option>
                    <?php
                    $menu = $this->db->get('tbl_menu')->result();
                    foreach ($menu as $m){
                        echo "<option value='$m->id_menu' ";
                        echo $m->id_menu==$is_main_menu?'selected':'';
                        echo ">".  strtoupper($m->title)."</option>";
                    }
                    ?>
                </select></td>
            </tr>
                <tr>
                    <td width='200'>Urutan <?php echo form_error('urutan') ?></td>
                    <td <?php echo (form_error('urutan')) ? 'class="has-error"' : "" ?>><input type="text" class="form-control" name="urutan" id="urutan" placeholder="Urutan" value="<?php echo $urutan; ?>" /></td>
                </tr>
                <tr>
                    <td width='200' >Is Aktif <?php echo form_error('is_aktif') ?></td>
                    <td <?php echo (form_error('is_aktif')) ? 'class="has-error"' : "" ?>><?php echo form_dropdown('is_aktif',array('y'=>'AKTIF','n'=>'TIDAK'),$is_aktif,array('class'=>'form-control'))?></td></tr>
                <tr>
                    <td></td>
                    <td><input type="hidden" name="id_menu" value="<?php echo $id_menu; ?>" /> 
                 <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
                 <a href="<?php echo site_url($this->config->item("dashboardUrl").'menu') ?>" class="btn btn-default"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
             </table></form>        </div>
         </section>
     </div>