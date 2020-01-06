<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css
">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<div class="container" style="border: 1px solid #cccccc; background-color: #F5F5F5; "  ><br><br>
  
  <section class="content-header">
    <h2 class="text-center" style="font-size: 3vw;"><b>DATA PRICIPAL</b></h2><br><br>
  </section>
  

  <section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">
    


        
        
        


<div class="container">

            <div style="width: 115px; float: left; margin: 5px;">
                <button class="btn btn-success" id="btnn" onclick="add_pricipal()"><i class="glyphicon glyphicon-plus" style="width: 20px; "></i> TAMBAH</button>

               
            </div>

            <div style="width: 115px; float: left; margin: 5px;">

                <button class="btn btn-default" id="btnn2" onclick="reload_table()"><i class="glyphicon glyphicon-refresh" style="width: 12px;"></i> REFRESH</button>

            </div>

        </div><br>





        <br />

        <table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th>NO STO / BL</th>
                    <th>PRICIPAL</th>
                    <th>PARTY</th>
                    <th>SATUAN</th>
                    <th>KAPAL</th>
                    <th>JENIS PUPUK</th>
                    <th>TANGGAL</th>
                    <th>KETERANGAN</th>
                    <th style="width:125px;">Action</th>
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
            "url": "<?php echo site_url('pricipal/ajax_list')?>",
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



function add_pricipal()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('TAMBAH PRICIPAL'); // Set Title to Bootstrap modal title
}

function edit_pricipal(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('pricipal/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="nobongkar"]').val(data.nobongkar);
            $('[name="pricipal"]').val(data.pricipal);
            $('[name="party"]').val(data.party);
            $('[name="kapal"]').val(data.kapal);
            $('[name="jenispupuk"]').val(data.jenispupuk);
            $('[name="tanggal"]').val(data.tanggal);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('PRICIPAL FORM'); // Set title to Bootstrap modal title////////datepicker

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
        url = "<?php echo site_url('pricipal/ajax_add')?>";
    } else {
        url = "<?php echo site_url('pricipal/ajax_update')?>";
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

function delete_pricipal(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('pricipal/ajax_delete')?>/"+id,
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

    function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}

function cek(){
    if(form.nobongkar.value != "" && form.pricipal.value != "" && form.party.value != "" && form.kapal.value != "" && form.jenispupuk.value != "" && form.tanggal.value != ""){
        save();
    }else {
        alert('FILD TIDAK BOLEH KOSONG, SILAHKAN PERIKSA KEMBALI');
    }
    
}





</script>     <br>   
    <form method="post" accept-charset="utf-8" action="<?php echo base_url()?>c_pricipal/cetak">
        <div class="form-group">
            <div class="col-md-6" style="margin-left: 18px;">
                <button type="submit" id="btncetak" class="btn btn-primary" style="margin-left: -1em; width: 100px;">Cetak</button> 
            </div>
        </div>
 
    </form> <br><br><br><br>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"></h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 

                        
                        <div class="form-group">
                            <label class="control-label col-md-3" style="text-align: left;">NO STO / BL</label>
                            <div class="col-md-9">
                                <input required name="nobongkar" placeholder="masukan NO STO / BL" class="form-control" type="text" onkeydown="upperCaseF(this)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3" style="text-align: left;">Pricipal</label>
                            <div class="col-md-9">
                                <input required name="pricipal" placeholder="masukan nama pricipal" class="form-control" type="text" onkeydown="upperCaseF(this)">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" style="text-align: left;">Party</label>
                            <div class="col-md-6">
                                <input required name="party" placeholder="masukan party" class="form-control" type="number">
                                <span class="help-block"></span>
                            </div>
                            <label class="col-md-3" style="margin-top: 7px;">Kilogram</label>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" style="text-align: left;">Kapal</label>
                            <div class="col-md-9">
                                <input required name="kapal" placeholder="masukan kapal" class="form-control" type="text" onkeydown="upperCaseF(this)">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" style="text-align: left;">Jenis Pupuk</label>
                            <div class="col-md-9">
                                <input required name="jenispupuk" placeholder="masukan jenispupuk" class="form-control" type="text" onkeydown="upperCaseF(this)">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" style="text-align: left;">Tanggal</label>
                            <div class="col-md-9">
                                <input required name="tanggal" placeholder="masukan tanggal" type="date" class="form-control">
                                <span class="help-block"></span>
                            </div>
                        </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="cek()" class="btn btn-primary" style="width: 100px; background-color: #F5613B">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100px; background-color: #058C97">Batal</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->    



        

  </section>


</div>


  
  