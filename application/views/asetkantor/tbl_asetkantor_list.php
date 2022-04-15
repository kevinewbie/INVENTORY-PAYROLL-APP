<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA TBL_ASETKANTOR</h3>
                    </div>
        
        <div class="box-body table-responsive no-padding">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('asetkantor/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Kd Jenis</th>
		    <th>Kd AKantor</th>
		    <th>Nm Akantor</th>
		    <th>Merk</th>
		    <th>Asal</th>
		    <th>Tahun</th>
		    <th>Jumlah</th>
		    <th>Satuan</th>
		    <th>Ukuran</th>
		    <th>Status</th>
		    <th>Kondisi</th>
		    <th>Harga</th>
		    <th>Spek Lain</th>
		    <th>Ket</th>
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
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
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

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
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
                    ajax: {"url": "asetkantor/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_aset",
                            "orderable": false
                        },{"data": "kd_jenis"},{"data": "kd_AKantor"},{"data": "nm_Akantor"},{"data": "merk"},{"data": "asal"},{"data": "tahun"},{"data": "jumlah"},{"data": "satuan"},{"data": "ukuran"},{"data": "status"},{"data": "kondisi"},{"data": "harga"},{"data": "spek_lain"},{"data": "ket"},
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