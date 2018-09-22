<div class="content-wrapper">
       <section class="content-header">
      <h1>
        Hak Akses
        <small>List Hak Akses</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li> <a href="<?php echo base_url('admin/userlevel') ?>">Hak Akses</a></li>
        <li class="active">Akses</li>
    </ol>
</section>
  
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php echo alert('alert-info', 'Perhatian', 'Silahkan Cheklist Pada Menu Yang Akan Diberikan Akses') ?>
                <div class="box box-primary box-solid">

                    <div class="box-header">
                        <h3 class="box-title">KELOLA HAK AKSES UNTUK LEVEL :  <b><?php echo $level['nama_level'] ?></b></h3>
                    </div>

                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <table class="table table-bordered table-striped" id="tableDT">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Nama Modul</th>
                                        <th width="100px">Beri Akses</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($menu as $m) {
                                        echo "<tr>
                        <td>$no</td>
                        <td>$m->title</td>
                        <td align='center'><input type='checkbox' ".  checked_akses($this->uri->segment(4), $m->id_menu)." onClick='kasi_akses($m->id_menu)'></td>
                        </tr>";
                                        $no++;
                                    }
                                    ?>
                                </thead>
                                <!--<tr><td></td><td colspan="2">
                                        <button type="submit" class="btn btn-danger btn-sm">Simpan Perubahan</button>
                                    </td></tr>-->

                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

<script type="text/javascript">
    function kasi_akses(id_menu){
        var id_menu = id_menu;
        var level = '<?php echo $this->uri->segment(4); ?>';
        $.ajax({
            url:"<?php echo base_url($this->config->item("dashboardUrl")."/userlevel/kasi_akses_ajax")?>",
            data:"id_menu=" + id_menu + "&level="+ level ,
            success: function(html)
            { 
                swal({
  type: 'success',
  title: 'Saved',
  showConfirmButton: false,
  timer: 1500
})
            }
        });
    }    
</script>