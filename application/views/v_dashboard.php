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
            ?>
                <tr>
                    <td><b class="animated fadeIn">Nama kapal</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo $c;  ?></b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">Jenis pupuk</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo $d;  ?></b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">Jumlah party</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo number_format($a,'0',',','.')," " ;  ?>KG</b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">Jumlah belum dibongkar dibongkar</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo number_format(($a-$b),'0',',','.')," " ;  ?>KG</b></td>
                </tr>
                <tr>
                    <td><b class="animated fadeIn">Jumlah telah dibongkar</b></td>
                    <td><b class="animated fadeIn">:</b></td>
                    <td><b class="animated fadeIn"><?php echo number_format($b,'0',',','.')," " ; ?>KG</b></td>
                </tr>
            </table>

            <?php foreach($graph1 as $s )
            {

                $a = $s->party ;
                $c = $s->kapal ;
                $d = $s->jenispupuk ;
                
            }
            ?>
            <?php foreach($graph2 as $u)
            {

                $b = $u->value_sum;
                
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
                    // data yang diambil dari database
                    if(count($graph)>0)
                    {
                       foreach ($graph as $data) {
                       echo "['" .$data->tujuangudang . "'," . $data->beratbersih ."],\n";
                       }
                    }
                    ?>
            ]
        }]
    });
});
</script>
