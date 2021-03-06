<?php
use Carbon\Carbon;
$ordenes=departamento\orden::all();
$areas=departamento\Area::all();
$talleres=departamento\taller::all();
$tp=0;
$tc=0;
$te=0;
?>

@foreach($ordenes as $orden)
@if($orden->estado=="Activa")
<?php
$fecha=explode("-",$orden->fecha);
 ?>
@if($fecha[0]==Carbon::now()->year)
@if($orden->correctivo==="si")
<?php $tc++; ?>
@endif

@if($orden->preventivo==="si")
<?php $tp++; ?>
@endif

@if($orden->enllantamiento==="si")
<?php $te++; ?>
@endif
@endif
@endif
@endforeach

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
  var pieChartCanvas = $("#grafica_ts").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{$tc}},
      color: "#f56954",
      highlight: "#df331a",
      label: "Correctivo"
    },
    {
      value: {{$tp}},
      color: "#00a65a",
      highlight: "#047843",
      label: "Preventivo"
    },
    {
      value: {{$te}},
      color: "#3c8dbc",
      highlight: "#08537e",
      label: "Enllantado"
    }
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
