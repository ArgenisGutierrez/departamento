<?php
use Carbon\Carbon;
$ordenes=departamento\orden::all();
$talleres=departamento\taller::all();
$total=0;
$totales[]=[];
$nombres[]=[];
$i=0;

foreach ($talleres as $taller) {
  foreach ($ordenes as $orden) {
    if ($orden->estado=="Activa") {
      $fecha=explode("-",$orden->fecha);
      if ($fecha[0]==Carbon::now()->year) {
        if ($taller->nombre===$orden->taller->nombre) {
          if ($orden->factura==null) {
          }
          else {
            $total=$total+$orden->factura->importe;
          }
        }
      }
    }
  }
  $totales[$i]=$total;
  $nombres[$i]=$taller->nombre;
  $i++;
  $total=0;
}
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
   var pieChartCanvas = $("#grafica_importe_taller").get(0).getContext("2d");
   var pieChart = new Chart(pieChartCanvas);
   var PieData = [
     <?php
     for ($j=0; $j <$i ; $j++) {
       $num1=rand(0,255);
       $num2=rand(0,255);
       $num3=rand(0,255);
       ?>
       {
         value: {{$totales[$j]}},
         color: "rgb( {{$num1}}, {{$num2}}, {{$num3}})", <?php $num2=$num2+30; ?>
         highlight: "rgb( {{$num1}}, {{$num2}}, {{$num3}})",
         label: "{{$nombres[$j]}}"
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
