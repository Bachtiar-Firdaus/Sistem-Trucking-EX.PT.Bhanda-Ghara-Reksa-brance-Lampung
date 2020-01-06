       
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css
">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<div class="container" style="border: 1px solid #cccccc; background-color: #F5F5F5; " >
  
  <section class="content-header">
    <h2 class="text-center" style="font-size: 3vw;"><b>DATA PRICIPAL</b></h2><br>
  </section>
  

  <section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">
    <div class="dropdown">

<!--         <button class="btn btn-success" id="btnn" onclick="add_pricipal()"><i class="glyphicon glyphicon-plus"></i> TAMBAH</button> -->
        <button class="btn btn-default" id="btnn2" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> REFRESH</button>



       





        
</div>

        <br />
        <br />

        <table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0" width="100%">

            <thead>
                <tr>
                    <th>NO STO / BL</th>
                    <th>pricipal</th>
                    <th>PARTY</th>
                    <th>SATUAN</th>
                    <th>KAPAL</th>
                    <th>JENIS PUPUK</th>
                    <th>TANGGAL</th>
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
    $('.modal-title').text('TAMBAH pricipal'); // Set Title to Bootstrap modal title
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

            $('[name="pricipal"]').val(data.pricipal);
            $('[name="party"]').val(data.party);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('pricipal FORM'); // Set title to Bootstrap modal title////////datepicker

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

</script>

<form method="post" accept-charset="utf-8" action="<?php echo base_url()?>c_pricipal/cetak">
        <div class="form-group"><br>

            
                    <div class="col-md-6">       <button type="submit" id="btncetak" class="btn btn-primary" style="margin-left: -1em;">Cetak</button> </div>
        
            
        </div>
 
        </form>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">pricipal FORM</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 

                        
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">pricipal</label>
                            <div class="col-md-7">
                                <input required name="pricipal" placeholder="pricipal" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">party</label>
                            <div class="col-md-7">
                                <input required name="party" placeholder="party" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->    



        

  </section>


</div>


  
  