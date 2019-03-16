<?php
use Carbon\Carbon;
$pagos=departamento\OrdenPago::all();
  //obtengo areas
  $areas=[];
  $areas_total=[];
  $i=0;
  foreach ($pagos as $pago) {
    if ($pago->estado=="Activa") {
      $año=explode("-",$pago->fecha);
      if ($año[0]==Carbon::now()->year) {
        $areas[$i]= $pago->area;
        $i++;
      }
    }
  }
  $areas=array_unique($areas);//elimino repetidas
  
  
  foreach ($areas as $area) {
    foreach ($pagos as $pago) {
      if ($pago->estado=="Activa") {
        $año=explode("-",$pago->fecha);
        if ($año[0]==Carbon::now()->year) {
          if ($area==$pago->area) {
            $areas_total[]+=$pago->total;
          }
        }
      }
    }
  }
  $total_areas=0;
  foreach ($areas_total as $total) {
    $total_areas+=$total;
  }
  $numero=count($areas);
 ?>

 <!-- jQuery 2.1.4 -->
 <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
 <!-- Bootstrap 3.3.5 -->
 <script src="../../plugins/chartjs/Chart.min.js"></script>
 <script>
 $(function () {
   //-------------
   //- PIE CHART -
   //-------------
   // Get context with jQuery - using jQuery's .get() method.
   var pieChartCanvas = $("#grafica_importe_area").get(0).getContext("2d");
   var pieChart = new Chart(pieChartCanvas);
   var PieData = [
     <?php
     for ($i=0; $i <$numero ; $i++) {
       $num1=rand(0,255);
       $num2=rand(0,255);
       $num3=rand(0,255);
       ?>
       {
         value: {{$areas_total[$i]}},
         color: "rgb( {{$num1}}, {{$num2}}, {{$num3}})", <?php $num2=$num2+30; ?>
         highlight: "rgb( {{$num1}}, {{$num2}}, {{$num3}})",
         label: "{{$areas[$i]}}"
       },
       <?php
     }
      ?>
   ];
   var pieOptions = {
     //Boolean - Whether we should show a stroke on each segment
     segmentShowStroke: true,
     //String - The colour of each segment stroke
     segmentStrokeColor: "#fff",
     //Number - The width of each segment stroke
     segmentStrokeWidth: 2,
     //Number - The percentage of the chart that we cut out of the middle
     percentageInnerCutout: 50, // This is 0 for Pie charts
     //Number - Amount of animation steps
     animationSteps: 100,
     //String - Animation easing effect
     animationEasing: "easeOutBounce",
     //Boolean - Whether we animate the rotation of the Doughnut
     animateRotate: true,
     //Boolean - Whether we animate scaling the Doughnut from the centre
     animateScale: false,
     //Boolean - whether to make the chart responsive to window resizing
     responsive: true,
     // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
     maintainAspectRatio: true,
     //String - A legend template
     legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
   };
   //Create pie or douhnut chart
   // You can switch between pie and douhnut using the method below.
   pieChart.Doughnut(PieData, pieOptions);
 });
 </script>
