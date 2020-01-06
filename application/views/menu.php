<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SISTEM MONITORING TRUCK</title>
<!-- 
    <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.js"></script>



  </head>
  <body style="background-image: url(<?php echo base_url()?>assets/img/ega.jpg); background-size: cover;">

<div class="container" style="background-image: url(<?php echo base_url()?>assets/img/bgr.jpg); background-size:100% 100%; height: 10vw;">
  </div>

    <div class="container" style="background-image: url(<?php echo base_url()?>assets/img/ega.jpg); background-size: cover;">

      <?php if($this->session->userdata('akses')=='1'):?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="pelabuhan" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Pelabuhan</b></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="chart" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a><li>
        </ul>
        

        <!-- /.navbar-collapse -->
        <!-- <li><a class="active" href="pelabuhan" style="color: white;"><b>Pelabuhan</b></a></li>




        <li ><a  href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li>
        <!--Akses Menu Untuk Pelabuhan-->

      <?php elseif($this->session->userdata('akses')=='2'):?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="timbangan" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Timbangan</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart"  style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          </li>
        </ul>
          
        
          <!--Akses Menu Untuk Timbangan-->

      <?php elseif($this->session->userdata('akses')=='3'):?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
          <a href="kantor" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Kantor</b></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          <li>
          <li>
            <a href="jt" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Argo Progress Berjalan</b></a>
          <li>
          <li>
            <a href="pantau_indikasi_pelabuhan" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>INDIKASI BERMASALAH 1</b></a>
          <li>
          <li>
            <a href="pantau_indikasi_timbangan" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>INDIKASI BERMASALAH 2</b></a>
          <li>
          <li>
            <div class="dropdown" style="margin-top: 10px; margin-left: 5px;">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Monitor
              <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="pricipal">Pricipal</a></li>
                  <li><a href="kantor_projek">Projek Berjalan</a></li>
                  <li><a href="kantor_pelabuhan">Pelabuhan</a></li>
                  <li><a href="kantor_timbangan">Timbangan</a></li>
                  <li><a href="kantor_gudang_bgrserengsem">Gudang BGR Serengsem</a></li>
                  <li><a href="kantor_gudang_isab">Gudang Isab</a></li>
                  <li><a href="kantor_gudang_pundi">Gudang Pundi</a></li>
                  <li><a href="kantor_gudang_tatum">Gudang Tatum</a></li>
                  <li><a href="kantor_gudang_waterindex">Gudang Waterindex</a></li>
                  <li><a href="kantor_gudang_yapindex">Gudang Yapindex</a></li>
                </ul>
            </div>
            <li>
        </ul>
        


 

      <?php elseif($this->session->userdata('akses')=='4'): ?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="gudang_bgrserengsem" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Gudang BGR Serengsem</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart"  style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          </li>
        </ul>



        <!-- <li><a class="active navbar-brand" href="gudang_bgrserengsem" style="color: white;"><b>Gudang BGR Serengsem</b></a></li>
        <li><a  class="" href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li> -->

      <?php elseif($this->session->userdata('akses')=='5'): ?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="gudang_isab" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Gudang Isab</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="chart" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a></li>
        </ul>





        <!-- <li><a class="active navbar-brand" href="gudang_isab" style="color: white;"><b>Gudang Isab</b></a></li>
        <li><a class="" href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li> -->

      <?php elseif($this->session->userdata('akses')=='6'): ?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="gudang_pundi" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Gudang Pundi</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart"  style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          </li>
        </ul>



        <!-- <li><a class="active navbar-brand" href="gudang_pundi" style="color: white;"><b>Gudang Pundi</b></a></li>
        <li><a  class="" href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li> -->

      <?php elseif($this->session->userdata('akses')=='7'): ?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="gudang_tatum" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Gudang Tatum</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart"  style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          </li>
        </ul>



        <!-- <li><a class="active navbar-brand" href="gudang_tatum" style="color: white;"><b>Gudang Tatum</b></a></li>
        <li><a class="" href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li> -->

      <?php elseif($this->session->userdata('akses')=='8'): ?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="gudang_waterindex" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Gudang Waterindex</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          </li>
        </ul>



        <!-- <li><a class="active navbar-brand" href="gudang_waterindex" style="color: white;"><b>Gudang Waterindex</b></a></li>
        <li><a class="" href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li> -->

      <?php elseif($this->session->userdata('akses')=='9'): ?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="gudang_yapindex" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Gudang Yapindex</b></a>
          
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          </li>
        </ul>

     <?php elseif($this->session->userdata('akses')=='10'):?>

        <div class="navbar-header">
          <button style="background-image: url(<?php echo base_url()?>asset/img/asd.png); border: solid 7px #F5F5F5; background-size: cover;" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only" >Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button> 
          <a href="pantau" class="navbar-brand" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Pantau</b></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li>
            <a href="chart" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>Progress Berjalan</b></a>
          <li>
          <li>
            <a href="pantau_indikasi_pelabuhan" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>INDIKASI BERMASALAH 1</b></a>
          <li>
          <li>
            <a href="pantau_indikasi_timbangan" style="color: #028C97; background-color: #F5F5F5; margin: 5px; border-radius: 5px;"><b>INDIKASI BERMASALAH 2</b></a>
          <li>
          <li>
            <div class="dropdown" style="margin-top: 10px; margin-left: 5px;">
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Monitor
              <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="pantau_pricipal">Pricipal</a></li>
                  <li><a href="pantau_projek">Projek Berjalan</a></li>
                  <li><a href="pantau_pelabuhan">Pelabuhan</a></li>
                  <li><a href="pantau_timbangan">Timbangan</a></li>
                  <li><a href="pantau_gudang_bgrserengsem">Gudang BGR Serengsem</a></li>
                  <li><a href="pantau_gudang_isab">Gudang Isab</a></li>
                  <li><a href="pantau_gudang_pundi">Gudang Pundi</a></li>
                  <li><a href="pantau_gudang_tatum">Gudang Tatum</a></li>
                  <li><a href="pantau_gudang_waterindex">Gudang Waterindex</a></li>
                  <li><a href="pantau_gudang_yapindex">Gudang Yapindex</a></li>
                </ul>
            </div>
            <li>
        </ul>
        
        <!-- <li><a class="active navbar-brand" href="gudang_yapindex" style="color: white;"><b>Gudang Yapindex</b></a></li>
        <li><a class="" href="<?php echo base_url().'pricipal'?>" style="color: white;">Pricipal</a></li>
 --><!--Akses Menu Untuk Dosen-->
      <?php else:
        $url=base_url();
        redirect($url);
       endif;?>
  </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url().'login/logout'?>" style="color: white;">Sign Out</a></li>
      </ul>

      </div>
    </div>


