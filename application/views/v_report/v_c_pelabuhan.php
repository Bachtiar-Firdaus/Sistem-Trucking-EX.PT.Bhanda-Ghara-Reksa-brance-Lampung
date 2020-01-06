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
<h3 style="text-align: center; "><b>LAPORAN PELABUHAN</b></h3>

<table class="table1">
<tr>
    <td>NAMA KAPAL </td>
    <td> : </td>
    <td> <?php 

    if(count($pelabuhan>0)){
    foreach($pelabuhan as $v1) {echo $v1->kapal;}}?></td> 
</tr>
<tr>
    <td>NO STO / BL </td>
    <td> : </td>
    <td> <?php 
    if(count($pelabuhan>0)){
        foreach($pelabuhan as $v2){echo $v2->nobongkar;}} ?></td> 
</tr>
<tr>
    <td  >PRICIPAL </td>
    <td> : </td>
    <td><?php 
    if(count($pelabuhan>0)){
        foreach($pelabuhan as $v3){echo $v3->pricipal;}}?></td> 
</tr>
<tr>
    <td>PARTY</td>
    <td> : </td>
    <td><?php 
    if(count($pelabuhan>0)){foreach($pelabuhan as $v4){echo number_format($v4->party,'0',',','.');}}?></td> 
</tr>             
<tr>
    <td>PERIODE</td>
    <td>:</td>
    <td><?php  if(($this->input->post('tanggal') != null ) AND ($this->input->post('tanggal1') != null )){
                     echo $this->input->post('tanggal')," S/D ",$this->input->post('tanggal1');
                }elseif(($this->input->post('tanggal') == null ) AND ($this->input->post('tanggal1') == null )){
                    if(count($min>0)){foreach($min as $min){ echo $min->min;}}   
                   echo " S/D ";
                    if(count($max>0)){foreach($max as $max){ echo $max->max;}}                      
                }


         ?></td>
</tr>
</table>
<table class="table2">
    <tr>
    <td style="text-align: right;">KG</td> 
    </tr>
</table>

<table >
     <tr>
        <th>NO URUT</th>
        <th>NO SURAT JALAN</th>
        <th>NO POLISI</th>
        <th>TUJUAN GUDANG</th>
        <th>TANGGAL</th>
        <th>BERANGKAT</th>
    </tr>
     <?php 
    if(count($pelabuhanbgr)>0){
     foreach($pelabuhanbgr as $r1){?>
    <tr>
        <td><?php echo $r1->nourut; ?></td>
        <td><?php echo $r1->nosuratjalan; ?></td>
        <td><?php echo $r1->nopolisi; ?></td>
        <td><?php echo $r1->tujuangudang; ?></td>
        <td><?php echo $r1->tanggal; ?></td>
        <td><?php echo $r1->brangkat; ?></td>
    </tr>

    <?php 
    }   
    }
    ?>


    <?php 
    if(count($pelabuhanisab)>0){
     foreach($pelabuhanisab as $r2){?>
    <tr>
        <td><?php echo $r2->nourut; ?></td>
        <td><?php echo $r2->nosuratjalan; ?></td>
        <td><?php echo $r2->nopolisi; ?></td>
        <td><?php echo $r2->tujuangudang; ?></td>
        <td><?php echo $r2->tanggal; ?></td>
        <td><?php echo $r2->brangkat; ?></td>
    </tr>

    <?php 
    }   
    }
    ?>    



    <?php 
    if(count($pelabuhantatum)>0){
     foreach($pelabuhantatum as $r3){?>
    <tr>
        <td><?php echo $r3->nourut; ?></td>
        <td><?php echo $r3->nosuratjalan; ?></td>
        <td><?php echo $r3->nopolisi; ?></td>
        <td><?php echo $r3->tujuangudang; ?></td>
        <td><?php echo $r3->tanggal; ?></td>
        <td><?php echo $r3->brangkat; ?></td>
    </tr>

    <?php 
    }   
    }
    ?>


    <?php 
    if(count($pelabuhanpundi)>0){
     foreach($pelabuhanpundi as $r4){?>
    <tr>
        <td><?php echo $r4->nourut; ?></td>
        <td><?php echo $r4->nosuratjalan; ?></td>
        <td><?php echo $r4->nopolisi; ?></td>
        <td><?php echo $r4->tujuangudang; ?></td>
        <td><?php echo $r4->tanggal; ?></td>
        <td><?php echo $r4->brangkat; ?></td>
    </tr>

    <?php 
    }   
    }
    ?>

    <?php 
    if(count($pelabuhanwaterindex)>0){
     foreach($pelabuhanwaterindex as $r5){?>
    <tr>
        <td><?php echo $r5->nourut; ?></td>
        <td><?php echo $r5->nosuratjalan; ?></td>
        <td><?php echo $r5->nopolisi; ?></td>
        <td><?php echo $r5->tujuangudang; ?></td>
        <td><?php echo $r5->tanggal; ?></td>
        <td><?php echo $r5->brangkat; ?></td>
    </tr>

    <?php 
    }   
    }
    ?>

    <?php 
    if(count($pelabuhanyapindex)>0){
     foreach($pelabuhanyapindex as $r6){?>
    <tr>
        <td><?php echo $r6->nourut; ?></td>
        <td><?php echo $r6->nosuratjalan; ?></td>
        <td><?php echo $r6->nopolisi; ?></td>
        <td><?php echo $r6->tujuangudang; ?></td>
        <td><?php echo $r6->tanggal; ?></td>
        <td><?php echo $r6->brangkat; ?></td>
    </tr>

    <?php 
    }   
    }
    ?>



<tr>
    <td class="daus" colspan="2"><br></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td colspan="2"></td>
    <td colspan="1"></td>
    <td class="daus" colspan="3"></td>
</tr>







<tr>
    <td colspan="2" style="text-align: left;">TOTAL MOBIL BGR SRENGSENG</td>
    <td colspan="1" style="text-align: left;">     
     <?php 
    if(count($pelabuhanbgr1)>0){
     foreach($pelabuhanbgr1 as $r11){ echo $r11->mob_bgr;
    }   
    }
    ?>
    </td>
    <td class="daus" colspan="3"></td>
</tr>


<tr>
    <td colspan="2" style="text-align: left;">TOTAL MOBIL ISAB</td>
    <td colspan="1" style="text-align: left;">     
    <?php 
    if(count($pelabuhanisab1)>0){
     foreach($pelabuhanisab1 as $r22){ echo $r22->mob_isab; 
    }
    }
    ?>
    </td>
    <td class="daus" colspan="3"></td>
</tr>



<tr>
    <td colspan="2" style="text-align: left;">TOTAL MOBIL TATUM</td>
    <td colspan="1" style="text-align: left;">     
     <?php 
    if(count($pelabuhantatum1)>0){
     foreach($pelabuhantatum1 as $r33){echo $r33->mob_tatum; 
    }   
    }
    ?>
    </td>
    <td class="daus" colspan="3"></td>
</tr>

<tr>
    <td colspan="2" style="text-align: left;">TOTAL MOBIL PUNDI</td>
    <td colspan="1" style="text-align: left;">     
     <?php 
    if(count($pelabuhanpundi1)>0){
     foreach($pelabuhanpundi1 as $r44){echo $r44->mob_pundi;
    }   
    }
    ?>
    </td>
    <td class="daus" colspan="3"></td>
</tr>


<tr>
    <td colspan="2" style="text-align: left;">TOTAL MOBIL WATERINDEX</td>
    <td colspan="1" style="text-align: left;">      
    <?php 
    if(count($pelabuhanwaterindex1)>0){
     foreach($pelabuhanwaterindex1 as $r55){echo $r55->mob_waterindex; 
    }   
    }
    ?>
    </td>
    <td class="daus" colspan="3"></td>
</tr>

<tr>
    <td colspan="2" style="text-align: left;">TOTAL MOBIL YAPINDEX</td>
    <td colspan="1" style="text-align: left;">      
     <?php 
    if(count($pelabuhanyapindex1)>0){
     foreach($pelabuhanyapindex1 as $r66){echo $r66->mob_yapindex; 
    }   
    }?>    </td>
    <td class="daus" colspan="3"></td>
</tr>


<tr>
    <td colspan="2" style="text-align: left;">GRAND TOTAL MOBIL</td>
    <td colspan="1" style="text-align: left;">      
    <?php
    if(count($grandtotal)>0){
     foreach($grandtotal as $gt){echo $gt->gt;
    }   
    }?>  </td>
    <td class="daus" colspan="3"></td>
</tr>

<tr>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2">Bandar Lampung, <?php 
        date_default_timezone_set("Asia/Jakarta"); 
        echo date("d-m-Y");?><br>Petugas Pelabuhan<br><br><br><br><br></td>
</tr>


<tr>
    <td class="daus" colspan="2"><br></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"><hr style="background-color: black; width: 120px;"></td>
</tr>   
</table>





</body>
</html>