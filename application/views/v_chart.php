<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('asset/css/animate.css')?>" rel="stylesheet">

<div class="container" style="border: 1px solid #cccccc; background-color: white; "><br>
    
    <div class="row">
        <div class="col-md-6" style="  padding-left: 70px; padding-top: 80px;" >

            <table class="table table-bordered">
                <?php 
                if(count($graph1)>0){
                foreach($graph1 as $s )
            {

                $a = $s->party ;
                $c = $s->kapal ;
                $d = $s->jenispupuk ;
                
            }
            }else{
                $a = "0";
                $c = "0";
                $d = "0";
            }

            if(count($graph10)>0){
                foreach($graph10 as $a10 )
            {

                $a11 = $a10->bgr ;
                
            }
            }else{
                $a11 = "0";
            }           
             if(count($graph10)>0){
                foreach($graphbag11 as $a100 )
            {

                $a111 = $a100->mob_bgr ;
                
            }
            }else{
                $a111 = "0";
            }


            if(count($graph20)>0){
                foreach($graph20 as $a20 )
            {

                $a21 = $a20->isab ;
                
            }
            }else{
                $a21 = "0";
            }
        
             if(count($graph20)>0){
                foreach($graphbag21 as $a200 )
            {

                $a222 = $a200->mob_isab ;
                
            }
            }else{
                $a222 = "0";
            }


            if(count($graph30)>0){
                foreach($graph30 as $a30 )
            {

                $a31 = $a30->pundi ;
                
            }
            }else{
                $a31 = "0";
            }

        
             if(count($graph30)>0){
                foreach($graphbag31 as $a300 )
            {

                $a333 = $a300->mob_pundi ;
                
            }
            }else{
                $a333 = "0";
            }


            if(count($graph40)>0){
                foreach($graph40 as $a40 )
            {

                $a41 = $a40->tatum ;
                
            }
            }else{
                $a41 = "0";
            }

             if(count($graph40)>0){
                foreach($graphbag41 as $a400 )
            {

                $a444 = $a400->mob_tatum ;
                
            }
            }else{
                $a444 = "0";
            }


            if(count($graph50)>0){
                foreach($graph50 as $a50 )
            {

                $a51 = $a50->waterindex ;
                
            }
            }else{
                $a51 = "0";
            }


             if(count($graph50)>0){
                foreach($graphbag51 as $a500 )
            {

                $a555 = $a500->mob_waterindex ;
                
            }
            }else{
                $a555 = "0";
            }

            if(count($graph60)>0){
                foreach($graph60 as $a60 )
            {

                $a61 = $a60->yapindex ;
                
            }
            }else{
                $a61 = "0";
            }

             if(count($graph60)>0){
                foreach($graphbag61 as $a600 )
            {

                $a666 = $a600->mob_yapindex ;
                
            }
            }else{
                $a666 = "0";
            }
           
            ?>
            <?php 
            if(count($graph1)>0){
            foreach($graph2 as $u)
            {

                $b = $u->value_sum;
                
            }
            }else{
                $b = "0";
            }


            if(count($graph1)>0){
            foreach($gra2ph2 as $uu)
            {

                $bb = $uu->value_sum;
                
            }
            }else{
                $bb = "0";
            }

            if(count($graph1)>0){
            foreach($gra2ph222 as $uuuu)
            {

                $bc = $uuuu->mob_value_sum;
                
            }
            }else{
                $bc = "0";
            }
             
            if(count($graph1)>0){
                foreach($gra2ph22 as $uuu )
            {

                $bbb = $uuu->mob_value_sum ;
                
            }
            }else{
                $bbb = "0";
            }
            ?>




                <tr>
                    <td><b class="animated fadeIn">Nama kapal</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td colspan="2"><b class="animated fadeIn"><?php echo $c;  ?></b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">Jenis pupuk</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td colspan="2"><b class="animated fadeIn"><?php echo $d;  ?></b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">Jumlah party</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td colspan="2"><b class="animated fadeIn"><?php echo number_format($a,'0',',','.')," " ;  ?>KG</b></td>
                </tr>



                        
                <tr>
                        <td><b class="animated fadeIn">BGR SRENGSEM</b></td> 
                        <td><b class="animated fadeIn">:</b></td>
                        <td><b class="animated fadeIn"><?php echo number_format($a11,'0',',','.')," " ;  ?>KG</b></td>
                        <td><b class="animated fadeIn"><?php echo $a111;  ?> MOBIL</b></td>
                </tr>                        
                <tr>
                        <td><b class="animated fadeIn">ISAB</b></td> 
                        <td><b class="animated fadeIn">:</b></td>
                        <td><b class="animated fadeIn"><?php echo number_format($a21,'0',',','.')," " ;  ?>KG</b></td>
                        <td><b class="animated fadeIn"><?php echo $a222;  ?> MOBIL</b></td>
                </tr>                          
                <tr>
                        <td><b class="animated fadeIn">PUNDI</b></td> 
                        <td><b class="animated fadeIn">:</b></td>
                        <td><b class="animated fadeIn"><?php echo number_format($a31,'0',',','.')," " ;  ?>KG</b></td>
                        <td><b class="animated fadeIn"><?php echo $a333;  ?> MOBIL</b></td>
                </tr>                          
                <tr>
                        <td><b class="animated fadeIn">TATUM</b></td> 
                        <td><b class="animated fadeIn">:</b></td>
                        <td><b class="animated fadeIn"><?php echo number_format($a41,'0',',','.')," " ;  ?>KG</b></td>
                        <td><b class="animated fadeIn"><?php echo $a444;  ?> MOBIL</b></td>
                </tr>                          
                <tr>
                        <td><b class="animated fadeIn">WATERINDEX</b></td> 
                        <td><b class="animated fadeIn">:</b></td>
                        <td><b class="animated fadeIn"><?php echo number_format($a51,'0',',','.')," " ;  ?>KG</b></td>
                        <td><b class="animated fadeIn"><?php echo $a555;  ?> MOBIL</b></td>
                </tr>                          
                <tr>
                        <td><b class="animated fadeIn">YAPINDEX</b></td> 
                        <td><b class="animated fadeIn">:</b></td>
                        <td><b class="animated fadeIn"><?php echo number_format($a61,'0',',','.')," " ;  ?>KG</b></td>
                        <td><b class="animated fadeIn"><?php echo $a666;  ?> MOBIL</b></td>
                </tr>  

                <tr>
                    <td><b class="animated fadeIn">ON PROGRESS</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo number_format($bb,'0',',','.')," " ; ?>KG</b></td>
                    <td><b class="animated fadeIn"><?php echo $bbb;  ?> MOBIL</b></td>
                </tr>



                <tr>
                    <td><b class="animated fadeIn">Jumlah telah ditimbang</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo number_format($b,'0',',','.')," " ; ?>KG</b></td>
                    <td><b class="animated fadeIn"><?php echo $bc;  ?> MOBIL</b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">BALANCE</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td colspan="2"><b class="animated fadeIn"><?php echo number_format(($a-$b),'0',',','.')," " ;  ?>KG</b></td>
                </tr>
            </table>

            <?php 

            if(count($graph1)>0){

            foreach($graph1 as $s )
            {

                $a = $s->party ;
                $c = $s->kapal ;
                $d = $s->jenispupuk ;
                
            }
        }
            ?>
            <?php 
            if(count($graph1)>0){
            foreach($graph2 as $u)
            {

                $b = $u->value_sum;
                
            }
        }
            ?>



        </div>

        
        <div class="col-md-6" style="padding-left: -10px;">
            <div id="container"></div><br>
        </div>
    </div>

    
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'DASBORD PROJEK BERJALAN'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Progress Berjalan',
            data: [
                    <?php 
                    $g =$a-$b;

                    //1 BAG 1
                    if($a11 == null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//2
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//3
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//4
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//5
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//6                       
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//7
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//8                       
                    }elseif($a11 == null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//9                       
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//10                       
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//11                       
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//12                       
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//13                       
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//14                       
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//15
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//16                   
                    }elseif($a11 == null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//17
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//18
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//19                       
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//20
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//21
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//22
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//23
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//24
                    }elseif($a11 == null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//25
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//26
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//27
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//28
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//29
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//30
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//31
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//32
                    }elseif($a11 == null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";









//1 BAG 2
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//2
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//3
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//4
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//5
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//6                       
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//7
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//8                       
                    }elseif($a11 != null AND $a21 == null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//9                       
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//10                       
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//11                       
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//12                       
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//13                       
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//14                       
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//15
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//16                   
                    }elseif($a11 != null AND $a21 == null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//17
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//18
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//19                       
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//20
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//21
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//22
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//23
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//24
                    }elseif($a11 != null AND $a21 != null AND $a31 == null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//25
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//26
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//27
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//28
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 == null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//29
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//30
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 == null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//31
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 == null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
//32
                    }elseif($a11 != null AND $a21 != null AND $a31 != null AND $a41 != null AND $a51 != null AND $a61 != null){
                       echo "['" ."BGR SRENGSEM" ,"  ",number_format($a11,'0',',','.'). "'," . $a11 ."],\n";
                       echo "['" ."ISAB" ,"  ",number_format($a21,'0',',','.'). "'," . $a21 ."],\n";
                       echo "['" ."PUNDI" ,"  ",number_format($a31,'0',',','.'). "'," . $a31 ."],\n";
                       echo "['" ."TATUM" ,"  ",number_format($a41,'0',',','.'). "'," . $a41 ."],\n";
                       echo "['" ."WATERINDEX" ,"  ",number_format($a51,'0',',','.'). "'," . $a51 ."],\n";
                       echo "['" ."YAPINDEX" ,"  ",number_format($a61,'0',',','.'). "'," . $a61 ."],\n";
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
                   }else{
                       echo "['" ."BELUM DIBONGKAR" ,"  ",number_format($g,'0',',','.'). "'," . $g ."],\n";
                   }


                    ?>
            ]
        }]
    });
});
</script>