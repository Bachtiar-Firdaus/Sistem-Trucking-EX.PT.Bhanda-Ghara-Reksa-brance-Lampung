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
<h3 style="text-align: center; "><b>LAPORAN TIMBANGAN</b></h3>
<table class="table1">
<tr>
    <td>NAMA KAPAL </td>
    <td> : </td>
    <td> <?php 

    if(count($timbangan>0)){
    foreach($timbangan as $v1) {echo $v1->kapal;}}?></td> 
</tr>
<tr>
    <td>NO STO / BL </td>
    <td> : </td>
    <td> <?php 
    if(count($timbangan>0)){
        foreach($timbangan as $v2){echo $v2->nobongkar;}}?></td> 
</tr>
<tr>
    <td  >PRICIPAL </td>
    <td> : </td>
    <td><?php 
    if(count($timbangan>0)){
        foreach($timbangan as $v3){echo $v3->pricipal;}}?></td> 
</tr>
<tr>
    <td>PARTY</td>
    <td> : </td>
    <td><?php 
    if(count($timbangan>0)){foreach($timbangan as $v4){echo number_format($v4->party,'0',',','.');}}?></td> 
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


         ?></td>
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
        <th>TUJUAN GUDANG</th>
        <th>TIMBANG ISI</th>
        <th>TIMBANG KOSONG</th>
        <th>BERAT BERSIH</th>
        <th>TANGGAL</th>
        <th>BERANGKAT</th>
    </tr>


     <?php 

     if(count($timbanganbgr)>0){
     foreach($timbanganbgr as $r1){?>
    <tr>
        <td><?php echo $r1->nourut; ?></td>
        <td><?php echo $r1->nosuratjalan; ?></td>
        <td><?php echo $r1->nopolisi; ?></td>
        <td><?php echo $r1->tujuangudang; ?></td>
        <td><?php echo number_format($r1->timbangisi,0,',','.');?></td>
        <td><?php echo number_format($r1->timbangkosong,0,',','.');?></td>
        <td><?php echo number_format($r1->beratbersih,0,',','.');?></td>
        <td><?php echo $r1->tanggal; ?></td>
        <td><?php echo $r1->brangkat; ?></td>
    </tr>
    <?php }?>


    <tr>
        
        <td colspan="4">JUMLAH</td>
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
        <td colspan="2"></td>
        </tr>




             <?php 
            if(count($timbanganbgr1)>0){
         foreach($timbanganbgr1 as $r11){?>
        <tr>
            <td colspan="7"></td>
            <td>JUMLAH MOBIL</td>
            <td><?php echo $r11->mob_bgr; ?></td>
        </tr>

        <?php 
        }   
        }
        }
        ?>







     <?php 

     if(count($timbanganisab)>0){
     foreach($timbanganisab as $r2){?>
    <tr>
        <td><?php echo $r2->nourut; ?></td>
        <td><?php echo $r2->nosuratjalan; ?></td>
        <td><?php echo $r2->nopolisi; ?></td>
        <td><?php echo $r2->tujuangudang; ?></td>
        <td><?php echo number_format($r2->timbangisi,0,',','.');?></td>
        <td><?php echo number_format($r2->timbangkosong,0,',','.');?></td>
        <td><?php echo number_format($r2->beratbersih,0,',','.');?></td>
        <td><?php echo $r2->tanggal; ?></td>
        <td><?php echo $r2->brangkat; ?></td>
    </tr>


            <?php 
            }
            
            ?>


    <tr>
        
        <td colspan="4">JUMLAH</td>
        <td>
            <?php 

            if(count($timbanganisab)>0){
            foreach($isiisab as $s2)
            {
                echo number_format($s2->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($timbanganisab)>0){    
            foreach($kosongisab as $t2)
            {
                echo number_format($t2->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($timbanganisab)>0){
            foreach($totalisab as $u2)
            {
                echo number_format($u2->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="2"></td>
        </tr>

             <?php 
         foreach($timbanganisab1 as $r22){?>
        <tr>
            <td colspan="7"></td>
            <td>JUMLAH MOBIL</td>
            <td><?php echo $r22->mob_isab; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>


















     <?php 

     if(count($timbangantatum)>0){
     foreach($timbangantatum as $r3){?>
    <tr>
        <td><?php echo $r3->nourut; ?></td>
        <td><?php echo $r3->nosuratjalan; ?></td>
        <td><?php echo $r3->nopolisi; ?></td>
        <td><?php echo $r3->tujuangudang; ?></td>
        <td><?php echo number_format($r3->timbangisi,0,',','.');?></td>
        <td><?php echo number_format($r3->timbangkosong,0,',','.');?></td>
        <td><?php echo number_format($r3->beratbersih,0,',','.');?></td>
        <td><?php echo $r3->tanggal; ?></td>
        <td><?php echo $r3->brangkat; ?></td>
    </tr>

            <?php 
            }
            
            ?>
    <tr>
        
        <td colspan="4">JUMLAH</td>
        <td>
            <?php 

            if(count($timbangantatum)>0){
            foreach($isitatum as $s3)
            {
                echo number_format($s3->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($timbangantatum)>0){    
            foreach($kosongtatum as $t3)
            {
                echo number_format($t3->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($timbangantatum)>0){
            foreach($totaltatum as $u3)
            {
                echo number_format($u3->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="2"></td>
        </tr>


             <?php 
         foreach($timbangantatum1 as $r33){?>
        <tr>
            <td colspan="7"></td>
            <td>JUMLAH MOBIL</td>
            <td><?php echo $r33->mob_tatum; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>










     <?php 

     if(count($timbanganpundi)>0){
     foreach($timbanganpundi as $r4){?>
    <tr>
        <td><?php echo $r4->nourut; ?></td>
        <td><?php echo $r4->nosuratjalan; ?></td>
        <td><?php echo $r4->nopolisi; ?></td>
        <td><?php echo $r4->tujuangudang; ?></td>
        <td><?php echo number_format($r4->timbangisi,0,',','.');?></td>
        <td><?php echo number_format($r4->timbangkosong,0,',','.');?></td>
        <td><?php echo number_format($r4->beratbersih,0,',','.');?></td>
        <td><?php echo $r4->tanggal; ?></td>
        <td><?php echo $r4->brangkat; ?></td>
    </tr>

            <?php 
            
            }
            ?>

    <tr>
        
        <td colspan="4">JUMLAH</td>
        <td>
            <?php 

            if(count($timbanganpundi)>0){
            foreach($isipundi as $s4)
            {
                echo number_format($s4->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($timbanganpundi)>0){    
            foreach($kosongpundi as $t4)
            {
                echo number_format($t4->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($timbanganpundi)>0){
            foreach($totalpundi as $u4)
            {
                echo number_format($u4->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="2"></td>
        </tr>
             <?php 
         foreach($timbanganpundi1 as $r44){?>
        <tr>
            <td colspan="7"></td>
            <td>JUMLAH MOBIL</td>
            <td><?php echo $r44->mob_pundi; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>








     <?php 

     if(count($timbanganwaterindex)>0){
     foreach($timbanganwaterindex as $r5){?>
    <tr>
        <td><?php echo $r5->nourut; ?></td>
        <td><?php echo $r5->nosuratjalan; ?></td>
        <td><?php echo $r5->nopolisi; ?></td>
        <td><?php echo $r5->tujuangudang; ?></td>
        <td><?php echo number_format($r5->timbangisi,0,',','.');?></td>
        <td><?php echo number_format($r5->timbangkosong,0,',','.');?></td>
        <td><?php echo number_format($r5->beratbersih,0,',','.');?></td>
        <td><?php echo $r5->tanggal; ?></td>
        <td><?php echo $r5->brangkat; ?></td>
    </tr>



            <?php 
            }
            
            ?>
    <tr>
        
        <td colspan="4">JUMLAH</td>
        <td>
            <?php 

            if(count($timbanganwaterindex)>0){
            foreach($isiwaterindex as $s5)
            {
                echo number_format($s5->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($timbanganwaterindex)>0){    
            foreach($kosongwaterindex as $t5)
            {
                echo number_format($t5->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($timbanganwaterindex)>0){
            foreach($totalwaterindex as $u5)
            {
                echo number_format($u5->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="2"></td>
        </tr>

             <?php 
         foreach($timbanganwaterindex1 as $r55){?>
        <tr>
            <td colspan="7"></td>
            <td>JUMLAH MOBIL</td>
            <td><?php echo $r55->mob_waterindex; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>






     <?php 

     if(count($timbanganyapindex)>0){
     foreach($timbanganyapindex as $r6){?>
    <tr>
        <td><?php echo $r6->nourut; ?></td>
        <td><?php echo $r6->nosuratjalan; ?></td>
        <td><?php echo $r6->nopolisi; ?></td>
        <td><?php echo $r6->tujuangudang; ?></td>
        <td><?php echo number_format($r6->timbangisi,0,',','.');?></td>
        <td><?php echo number_format($r6->timbangkosong,0,',','.');?></td>
        <td><?php echo number_format($r6->beratbersih,0,',','.');?></td>
        <td><?php echo $r6->tanggal; ?></td>
        <td><?php echo $r6->brangkat; ?></td>
    </tr>



            <?php 
            }
            
            ?>
    <tr>
        
        <td colspan="4">JUMLAH</td>
        <td>
            <?php 

            if(count($timbanganyapindex)>0){
            foreach($isiyapindex as $s6)
            {
                echo number_format($s6->isi,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 

            if(count($timbanganyapindex)>0){    
            foreach($kosongyapindex as $t6)
            {
                echo number_format($t6->kosong,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td>
            <?php 
            if(count($timbanganyapindex)>0){
            foreach($totalyapindex as $u6)
            {
                echo number_format($u6->bersih,0,',','.')," ";
            }
            }
            ?>
        </td>
        <td colspan="2"></td>
        </tr>

        
             <?php 
         foreach($timbanganyapindex1 as $r66){?>
        <tr>
            <td colspan="7"></td>
            <td>JUMLAH MOBIL</td>
            <td><?php echo $r66->mob_yapindex; ?></td>
        </tr>

        <?php 
        }   
        }
        ?>


<tr>
    <td class="daus" colspan="3"><br></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td colspan="3"></td>
    <td colspan="2"></td>
    <td class="daus" colspan="4"></td>
</tr>


<tr>
    <td colspan="3" style="text-align: left;">GRAND TOTAL BERAT ISI</td>
    <td colspan="2" style="text-align: left;">            
    <?php 

            if(count($grandtotalisi)>0){
            foreach($grandtotalisi as $isi)
            {
                echo " ",number_format($isi->isi,0,',','.')," ";
            }
            }
            ?> </td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td colspan="3" style="text-align: left;">GRAND TOTAL BERAT KOSONG</td>
    <td colspan="2" style="text-align: left;">          
    <?php 

            if(count($grandtotalkosong)>0){
            foreach($grandtotalkosong as $kosong)
            {
                echo " ",number_format($kosong->kosong,0,',','.')," ";
            }
            }
            ?> </td> </td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td colspan="3" style="text-align: left;">GRAND TOTAL BERAT BERSIH</td>
    <td colspan="2" style="text-align: left;">          
    <?php 

            if(count($grandtotalbersih)>0){
            foreach($grandtotalbersih as $bersih)
            {
                echo " ",number_format($bersih->bersih,0,',','.')," ";
            }
            }
            ?> </td> </td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td colspan="3" style="text-align: left;">SISA PARTY</td>

    <td colspan="2" style="text-align: left;">          
    <?php 
            if(count($grandtotalbersih)>0){
                        foreach($timbangan as $asas){
                            $ppp=$asas->party;
                        }
                        foreach($grandtotalbersih as $asas1){
                            $ppp1=$asas1->bersih;
                        }
                        $zzzzz=$ppp-$ppp1;
                echo " ",number_format($zzzzz,0,',','.')," ";
            
            }
            ?> </td> </td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td colspan="3" style="text-align: left;">GRAND TOTAL MOBIL</td>
    <td colspan="2" style="text-align: left;">          
    <?php 

            if(count($grandtotalmobil)>0){
            foreach($grandtotalmobil as $gm)
            {
                echo " ",number_format($gm->gm,0,',','.')," ";
            }
            }
            ?> </td> </td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>

<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>

<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3">Bandar Lampung, <?php 
        date_default_timezone_set("Asia/Jakarta"); 
        echo date("d-m-Y");?><br>Petugas Timbangan<br><br><br><br><br></td>
</tr>


<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
</tr>
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="3"><hr style="background-color: black; width: 120px;"></td>
</tr>
</table>





</body>
</html>