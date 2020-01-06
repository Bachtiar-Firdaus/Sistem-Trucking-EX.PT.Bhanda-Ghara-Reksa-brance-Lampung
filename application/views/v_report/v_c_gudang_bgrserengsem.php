<!DOCTYPE html>
<html>
<head>
  <title><?=$title?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
   <style>

        table{
            border-collapse: collapse;
            width: 100%;
            'margin: 0 auto;
            padding-top: 1px;
            padding-bottom: 1px;
        }        
        .table1{
            border-collapse: collapse;
            width: 35%;
            'margin: 0 auto;
            padding-top: 1px;
            padding-bottom: 1px;
        }        
        .table2{
            border-collapse: collapse;
            width: 100%;
            'margin: 0 auto;
            padding-top: 1px;
            padding-bottom: 1px;
        }
        .table2 td{
            border: 1px solid white; background-color: white;
            text-align: right;
        }      
        .table1 td{
            border: 1px solid white; background-color: white;
            text-align: left;
        }
        .daus{
            border: 1px solid white; background-color: white;

        }
        h2{
            text-align: center;
        }
        h1{
            text-align: center;
        }
        table th{
            border:1px solid #000;
            padding: 1px;
            font-weight: bold;
            text-align: center;
        }
        table td{
            border:1px solid #000;
            padding: 1px;
            text-align: center;
        }

        #judul{
            font-size: 20px;
            font-weight: bold;
        }

        #tebal2{
            font-weight: bold;
        }

        #tebal{
            border:1px solid #000;
            padding: 3px;
            font-weight: normal;
            text-align: center;
        }

        #garis{
            width: 40%;
            border: 1px solid #000000;
        }
        #nis{
            text-align: left;
        }
        th {
            font-size: 11px;
        }
        td{
            font-size: 11px;
        }
        p{
            font-size: 12px;
        }

    </style>
    
    
</head>
<body >

<table>
<tr>
    <td class="daus" align="left" colspan="3"><img src="file:///C:/xampp/htdocs/daus/assets6/bgr.jpeg"></td>
    <td class="daus" colspan="5"></td>
    <td class="daus" align="right" colspan="3"><img src="file:///C:/xampp/htdocs/daus/assets6/ukas.jpeg"></td>
</tr>
</table>
<h3 style="text-align: center; "><b>LAPORAN GUDANG BGR SERENGSEM</b></h3>
<h3 style="text-align: center; "></h3>

<table class="table1">
<tr>
    <td>NAMA KAPAL </td>
    <td> : </td>
    <td> <?php 

    if(count($daus>0)){
    foreach($daus as $v1) {echo $v1->kapal;}}?></td> 
</tr>
<tr>
    <td>NO STO / BL </td>
    <td> : </td>
    <td> <?php 
    if(count($daus>0)){
        foreach($daus as $v2){echo $v2->nobongkar;}}?></td> 
</tr>
<tr>
    <td  >PRICIPAL </td>
    <td> : </td>
    <td><?php 
    if(count($daus>0)){
        foreach($daus as $v3){echo $v3->pricipal;}}?></td> 
</tr>
<tr>
    <td>PARTY</td>
    <td> : </td>
    <td><?php 
    if(count($daus>0)){foreach($daus as $v4){echo number_format($v4->party,'0',',','.');}}?></td> 
</tr>            
<tr>
    <td>PERIODE</td>
    <td>:</td>
    <td><?php  
                if(($this->input->post('tanggal') != null ) AND ($this->input->post('tanggal1') != null )){
                     echo $this->input->post('tanggal')," S/D ",$this->input->post('tanggal1');
                }elseif(($this->input->post('tanggal') == null ) AND ($this->input->post('tanggal1') == null )){
                    if(count($min>0)){foreach($min as $min){ echo $min->min;}}   
                   echo " S/D ";
                    if(count($max>0)){foreach($max as $max){ echo $max->max;}}                      
                }


         ?>
         </td>
</tr>
</table>

<table class="table2">
    <tr>
    <td style="text-align: right;">KG</td> 
    </tr>
</table>

<table>
     <tr>
        <th>NO URUT</th>
        <th>NO SURAT JALAN</th>
        <th>NO POLISI</th>
        <th>TIMBANG ISI</th>
        <th>TIMBANG KOSONG</th>
        <th>BERAT BERSIH</th>
        <th>TANGGAL</th>
        <th>BERANGKAT</th>
        <th>TIBA</th>
        <th>GUDANG</th>
        <th>KETERANGAN</th>
    </tr>

     <?php foreach($gudang_bgrserengsem as $r){?>
    <tr>
        <td><?php echo $r->nourut; ?></td>
        <td><?php echo $r->nosuratjalan ?></td>
        <td><?php echo $r->nopolisi; ?></td>
        <td><?php echo number_format($r->timbangisi,'0',',','.'); ?></td>
        <td><?php echo number_format($r->timbangkosong,'0',',','.'); ?></td>
        <td><?php echo number_format($r->beratbersih,'0',',','.'); ?></td>
        <td><?php echo $r->tanggal; ?></td>
        <td><?php echo $r->brangkat; ?></td>
        <td><?php echo $r->tiba; ?></td>
        <td><?php echo $r->subgudang; ?></td>
        <td><?php echo $r->keterangan; ?></td>

    </tr>
    <?php }?>

    <tr>
        
        <td colspan="3">JUMLAH</td>
        <td>
            <?php 

            if(count($isibgr)>0){
            foreach($isibgr as $s1)
            {
                echo number_format($s1->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($kosongbgr)>0){    
            foreach($kosongbgr as $t1)
            {
                echo number_format($t1->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($totalbgr)>0){
            foreach($totalbgr as $u1)
            {
                echo number_format($u1->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="5"></td>
        </tr>




             <?php 
            if(count($timbanganbgr1)>0){
         foreach($timbanganbgr1 as $r11){?>
        <tr>
            <td colspan="8"></td>
            <td colspan="2">JUMLAH MOBIL</td>
            <td><?php echo $r11->mob_bgr; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>




    
<tr>
    <td class="daus" colspan="5"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td class="daus" colspan="3"><br>Petugas EMKL BGR<br><br><br><br><br></td>
    <td class="daus" colspan="5"></td>
    <td class="daus" colspan="3">Bandar Lampung, <?php 
        date_default_timezone_set("Asia/Jakarta"); 
        echo date("d-m-Y");?><br>Kepala Gudang<br><br><br><br><br></td>
</tr>


<tr>
    <td class="daus" colspan="5"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td class="daus" colspan="3"><hr style="background-color: black; width: 120px;"></td>
    <td class="daus" colspan="5"></td>
    <td class="daus" colspan="3"><hr style="background-color: black; width: 120px;"></td>
</tr>
</table>





</body>
</html>