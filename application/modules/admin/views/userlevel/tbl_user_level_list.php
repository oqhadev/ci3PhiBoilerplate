<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Hak Akses
        <small>List Hak Akses</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/home') ?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li class="active">Hak Akses</li>
    </ol>
</section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary ">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Data Level Admin</h3>

                        <div class="pull-right">
                            
        <?php echo anchor(site_url($this->config->item("dashboardUrl").'userlevel/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm"'); ?>
                          <div class="btn-group ">

                       <?php echo anchor(site_url($this->config->item("dashboardUrl").'userlevel/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
        <?php echo anchor(site_url($this->config->item("dashboardUrl").'userlevel/word'), '<i class="fa fa-file-word-o" aria-hidden="true"></i> Export Ms Word', 'class="btn btn-primary btn-sm"'); ?>
                        </div>
                        
                    </div>          
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;">
		</div>
        <table class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%"  id="tableDT">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Nama Level</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
       
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#tableDT").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#tableDT_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "userlevel/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_user_level",
                            "orderable": false
                        },{"data": "nama_level"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>