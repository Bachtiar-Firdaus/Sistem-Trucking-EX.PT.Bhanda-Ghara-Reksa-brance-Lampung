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
            padding-top: 35px;
        }
        h2{
            text-align: center;
        }
        h1{
            text-align: center;
        }        
        .table1{
            border-collapse: collapse;
            width: 25%;
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
        table th{
            border:1px solid #000;
            padding: 3px;
            font-weight: bold;
            text-align: center;
        }
        table td{
            border:1px solid #000;
            padding: 3px;
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
            font-size: 12px;
        }
        td{
            font-size: 12px;
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
<h3 style="text-align: center; font-size: 16px;"><b>LAPORAN PRICIPAL</b></h3>
<h3 style="text-align: center; "></h3>


<table>
     <tr>
        <th>NO STO / BL</th>
        <th>PRICIPAL</th>
        <th>PARTY</th>
        <th>SATUAN</th>
        <th>KAPAL</th>
        <th>JENIS PUPUK</th>
        <th>TANGGAL</th>
    </tr>

   <?php $no = 1; ?>
     <?php foreach($pricipal as $r){?>
    <tr>
        <td><?php echo $r->nobongkar; ?></td>
        <td><?php echo $r->pricipal ?></td>
        <td><?php echo number_format($r->party,'0',',','.'); ?></td>
        <td>KG</td>
        <td><?php echo $r->kapal; ?></td>
        <td><?php echo $r->jenispupuk; ?></td>
        <td><?php echo $r->tanggal; ?></td>
    </tr>

    <?php 
    }
    ?>
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr><tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2">Bandar Lampung, <?php 
        date_default_timezone_set("Asia/Jakarta"); 
        echo date("d-m-Y");?><br>Kepala Logistik<br><br><br><br><br></td>
</tr>


<tr>
    <td class="daus" colspan="3"><br></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"></td>
</tr>
<tr>
    <td class="daus" colspan="3"></td>
    <td class="daus" colspan="2"></td>
    <td class="daus" colspan="2"><hr style="background-color: black; width: 120px;"></td>
</tr>   
</table>





</body>
</html>