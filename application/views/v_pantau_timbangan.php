        
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css
">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<div class="container" style="border: 1px solid #cccccc; background-color: #F5F5F5; " >
  
  <section class="content-header">
    <h2 class="text-center"><b>DATA TIMBANGAN</b></h2><br><br>
  </section>
  

  <section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">
    <div class="dropdown">

<!-- 
        <button class="btn btn-success" id="btnn" onclick="add_timbangan()"><i class="glyphicon glyphicon-plus"></i> TAMBAH</button> -->
        <button class="btn btn-default" id="btnn2" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> REFRESH</button>




        





        
</div>

        <br />
        <br />

        <table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0" width="200%">

            <thead>
                <tr>
                    <th>NO URUT</th>
                    <th>NO STO / BL</th>
                    <th>NO SURAT JALAN</th>
                    <th>NO POLISI</th>
                    <th>NAMA SUPIR</th>
                    <th>TUJUAN GUDANG</th>
                    <th>PRICIPAL</th>
                    <th>PARTY</th>
                    <th>JENIS PUPUK</th>
                    <th>TIMBANG ISI</th>
                    <th>TIMBANG KOSONG</th>
                    <th>BERAT BERSIH</th>
                    <th>SATUAN</th>
                    <th>TANGGAL</th>
                    <th>BRANGKAT</th>
                </tr>
            </thead>

            <tbody>
            </tbody>

            <tfoot>
            <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
            </tr>
            </tfoot>

        </table>

        <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('timbangan/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

});



function add_timbangan()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('TAMBAH timbangan'); // Set Title to Bootstrap modal title
}

function edit_timbangan(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('timbangan/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="nourut"]').val(data.nourut);
            $('[name="nobongkar"]').val(data.nobongkar);
            $('[name="nosuratjalan"]').val(data.nosuratjalan);
            $('[name="nopolisi"]').val(data.nopolisi);
            $('[name="namasupir"]').val(data.namasupir);
            $('[name="tujuangudang"]').val(data.tujuangudang);
            $('[name="pricipal"]').val(data.pricipal);
            $('[name="party"]').val(data.party);
            $('[name="jenispupuk"]').val(data.jenispupuk);
            $('[name="timbangisi"]').val(data.timbangisi);
            $('[name="timbangkosong"]').val(data.timbangkosong);
            $('[name="beratbersih"]').val(data.beratbersih);
            $('[name="tanggal"]').val(data.tanggal);
            $('[name="brangkat"]').val(data.brangkat);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('TIMBANGAN FORM'); // Set title to Bootstrap modal title////////datepicker

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('timbangan/ajax_add')?>";
    } else {
        url = "<?php echo site_url('timbangan/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_timbangan(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('timbangan/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>


<form method="post" accept-charset="utf-8" action="<?php echo base_url()?>c_timbangan/cetak">
    <div class="form-group">

        <div  style="width: 180px; float: left;">
            <input required name="tanggal" placeholder="tanggal" value="masukan tanggal" type="date" style="  float: left; width: 167px; margin: 5px; border-radius: 5px; height: 35px;px;">
        </div>
        <div  style="width: 180px; float: left;">
            <input required name="tanggal1" placeholder="tanggal1" value="masukan tanggal" type="date" style="  float: left; width: 167px; margin: 5px; border-radius: 5px; height: 35px;px;">
        </div>

        <div  style="width: 170px;  float: left;">
            <select name = "nobongkar" class="form-control" style="width: 160px; float: left; margin: 5px;">
                <option>Pilih NO STO / BL</option>
                    <?php foreach($pricipal as $r){?>
                <option>
                    <?php echo $r->nobongkar; ?>
                </option>
                    <?php }?>
            </select>
        </div>

        <div  style="width: 170px;  float: left; ">
            <button type="submit" style="width: 160px; margin: 5px;" id="btncetak" class="btn btn-primary">Cetak
            </button>
        </div><br><br><br>
    </div>
</form>


<form method="post" accept-charset="utf-8" action="<?php echo base_url()?>c_timbangan/cetak_full">
    <div class="form-group">
        <div  style="width: 170px;  float: left;">
            <select name = "nobongkar" class="form-control" style="width: 160px; float: left; margin: 5px;">
                <option>Pilih NO STO / BL</option>
                    <?php foreach($pricipal as $r){?>
                <option>
                    <?php echo $r->nobongkar; ?>
                </option>
                    <?php }?>
            </select>
        </div>

        <div  style="width: 170px;  float: left; ">
            <button type="submit" style="width: 160px; margin: 5px;" id="btncetak" class="btn btn-primary">Cetak
            </button>
        </div><br><br><br>
    </div>
</form>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog" >
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">TIMBANGAN FORM</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">No Urut</label>
                            <div class="col-md-7">
                                <input required name="nourut" placeholder="masukan no urut" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                            <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">NO STO / BL</label>
                            <div class="col-md-7">
                                <input required name="nobongkar" placeholder="masukan NO STO / BL" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">No Surat Jalan</label>
                            <div class="col-md-7">
                                <input required name="nosuratjalan" placeholder="masukan no surat jalan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">No Polisi</label>
                            <div class="col-md-7">
                                <input required name="nopolisi" placeholder="masukan no polisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Nama Supir</label>
                            <div class="col-md-7">
                                <input required name="namasupir" placeholder="Masukan Nama Supir" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Tujuan Gudang</label>
                            <div class="col-md-7">
                                <input required name="tujuangudang" placeholder="masukan tujuan gudang" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Party</label>
                            <div class="col-md-4">
                                <input required name="party" placeholder="masukan jumlah party" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3"><p style="padding-top: 8px;"><b>Kilogram</b></p></div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Jenis Pupuk</label>
                            <div class="col-md-7">
                                <input required name="jenispupuk" placeholder="masukan jenis pupuk" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Timbang Isi</label>
                            <div class="col-md-4">
                                <input required name="timbangisi" placeholder="masukan jumlah timbang isi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3"><p style="padding-top: 8px;"><b>Kilogram</b></p></div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Timbang Kosong</label>
                            <div class="col-md-4">
                                <input required name="timbangkosong" placeholder="masukan jumlah timbang kosong" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-md-3"><p style="padding-top: 8px;"><b>Kilogram</b></p></div>
                        </div>
                            
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Tanggal</label>
                            <div class="col-md-7">
                                <input required name="tanggal" placeholder="masukan tanggal" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Berangkat</label>
                            <div class="col-md-7">
                                <input required name="brangkat" placeholder="masukan berangkat" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Pricipal</label>
                            <div class="col-md-7">
                                <input required name="pricipal" placeholder="masukan nama pricipal" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        </div>
                    </div>
                    

                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary" style="width: 100px; background-color: #F5613B">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100px; background-color: #058C97; margin-left: 10px;">Cancel</button>
                        
                        
                    </div>


                </form>
            </div>
            <div class="modal-footer">
               
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->    



        

  </section>


</div>


  
  