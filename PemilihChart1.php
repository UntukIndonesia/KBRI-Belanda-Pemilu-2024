<?php
include "koneksipemilu.php";

//DATA GRAFIK
//$get_data_realtime = mysqli_query($sambung, "SELECT tinggi,time_at FROM tb_ketinggian WHERE date_at=CURDATE() ORDER BY time_at DESC LIMIT 2");
$get_data_realtime = mysqli_query($sambung, "(SELECT 'Pantarlih' as Sumber , COUNT(DISTINCT noPaspor) AS Jumlah FROM pantarlih) UNION (SELECT 'Update Sidalih' as Sumber , COUNT(DISTINCT noPaspor) AS Jumlah FROM updateSidalih)");
//$get_data_realtime = mysqli_query($sambung, "SELECT * FROM totalPemilih");
while($show = mysqli_fetch_array($get_data_realtime))
{
    $tinggiValue[]= $show['Jumlah'];
    $time_at[]= $show['Sumber'];
    
    //$tinggiValue[]= $show['tinggi'];
    //$time_at[]= $show['time_at'];
}

?>
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */
    // Get context with jQuery - using jQuery's .get() method.

    var areaChartData = {
      labels  : <?php echo json_encode($time_at);?>,
      datasets: [
        {
           //label               : 'Ketinggian (cm)',
          backgroundColor     : 'rgba(139,0,0,0.9)',
          borderColor         : 'rgba(139,0,0,0.8)',
          pointRadius          : 3,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($tinggiValue);?>
        }
        
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          },
          ticks: {
                beginAtZero: true
        }
        }]
      }
    }

  
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas = $('#tinggiChart').get(0).getContext('2d')
    var lineChartOptions = $.extend(true, {}, areaChartOptions)
    var lineChartData = $.extend(true, {}, areaChartData)
    lineChartData.datasets[0].fill = false;
    lineChartOptions.datasetFill = false;
    lineChartOptions.animation = false
    

    var lineChart = new Chart(lineChartCanvas, {
      type: 'bar',
      data: lineChartData,
      options: lineChartOptions
    })
  })
</script>
