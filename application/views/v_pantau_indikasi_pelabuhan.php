<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css
">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

<div class="container" style="border: 1px solid #cccccc; background-color: #F5F5F5; " ><br><br>
    <section class="content-header">
        <h2 class="text-center" style="font-size: 3vw;"><b>INDIKASI BERMASALAH PELABUHAN -> TIMBANGAN</b></h2><br><br>
    </section>
  
    <section class="container-fluid" style="overflow-y: auto; overflow-x: scroll;">

        <div class="container">

<!--             <div style="width: 115px; float: left;">
                <button class="btn btn-success" id="btnn" style="width: 110px; margin: 5px;" onclick="add_pantau_indikasi_pelabuhan()"><i class="glyphicon glyphicon-plus"></i> TAMBAH</button>
            </div> -->

            <div style="width: 115px; float: left; padding: 5px;">
                <button class="btn btn-default" id="btnn2" onclick="reload_table()"><i class="glyphicon glyphicon-refresh" style="width: 12px;"></i> REFRESH</button>
            </div>

        </div><br>

<div class="container">
    <table id="table" class="table table-striped table-bordered display nowrap" cellspacing="0" width="200%">
        <thead>
            <tr>
                <th >NO URUT</th>
                <th>NO STO / BL</th>
                <th>NO SURAT JALAN</th>
                <th>NO POLISI</th>
                <th>NAMA SUPIR</th>
                <th>TUJUAN GUDANG</th>
                <th>PRICIPAL</th>
                <th>PARTY</th>
                <th>SATUAN</th>
                <th>JENIS PUPUK</th>
                <th>TANGGAL</th>
                <th>BERANGKAT</th>
            </tr>
        </thead>
        <tbody>
        <?php 
                if(count($indikasi)>0){
                foreach($indikasi as $s )
            {?>
            <tr>
                <th><?php echo $s->nourut ; ?></th>
                <th><?php echo $s->nobongkar; ?></th>
                <th><?php echo $s->nosuratjalan; ?></th>
                <th><?php echo $s->nopolisi; ?></th>
                <th><?php echo $s->namasupir; ?></th>
                <th><?php echo $s->tujuangudang; ?></th>
                <th><?php echo $s->pricipal; ?></th>
                <th><?php echo $s->party; ?></th>
                <th><?php echo "KG"; ?></th>
                <th><?php echo $s->jenispupuk; ?></th>
                <th><?php echo $s->tanggal; ?></th>
                <th><?php echo $s->brangkat; ?></th>
            </tr>
                
           <?php }
            }
            ?>

            


        </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>





<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">pantau_indikasi_pelabuhan FORM</h3>
            </div>
            <div class="modal-body form">

                <form action="#" id="form" class="form-
                horizontal">
                    <input type="hidden" value="" name="id"/> 

                        
                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">No Urut</label>
                            <div class="col-md-7">
                                <input required name="nourut" placeholder="masukan no urut" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div><br>


                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">NO STO / BL</label>
                            <div class="col-md-7">
                                <select name = "nobongkar" class="form-control" style="width: 160px;">
                                <option>Pilih NO STO / BL</option>
                                <?php foreach($projek as $r){?>
                                <option><?php echo $r->nobongkar; ?></option>
                                                    <?php }?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div><br>


                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">No Surat jalan</label>
                            <div class="col-md-7">
                                <input required name="nosuratjalan" placeholder="masukan no surat jalan" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">No Polisi</label>
                            <div class="col-md-7">
                                <input required name="nopolisi" placeholder="masukan no polisi" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div><br>

                        <div class="form-group">
                            <label class="control-label col-md-4" style="text-align: left;">Nama Supir</label>
                            <div class="col-md-7">
                                <input required name="namasupir" placeholder="masukan nama supir" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div><br>

                        <div class="form-group">
                        <label class="control-label col-md-4" style="text-align: left;">Tujuan Gudang</label>             
                         <div class="col-md-7">
                              <select name="tujuangudang" class="form-control">
                              <option value="BGR SERENGSEM">BGR SERENGSEM</option>
                              <option value="YAPINDEX">YAPINDEX</option>
                              <option value="WATERINDEX">WATERINDEX</option>
                              <option value="TATUM">TATUM</option>
                              <option value="ISAB">ISAB</option>
                              <option value="PUNDI">PUNDI</option>
                              </select><span class="help-block"></span>
                         </div>
                        </div> <br>

                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary" style="width: 100px; background-color: #F5613B">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="width: 100px; background-color: #058C97">Cancel</button>

                    </div>
                </form>
            </div>
           
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->    
</div>
</section>



  
  