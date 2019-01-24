<?php
use Carbon\Carbon;
$ordenes=departamento\orden::all();
$areas=departamento\Area::all();
$talleres=departamento\taller::all();
$tpm=0;
$tcm=0;
$tem=0;
$tpp=0;
$tcp=0;
$tep=0;
$tps=0;
$tcs=0;
$tes=0;
$tpc=0;
$tcc=0;
$tec=0;
?>

@foreach($ordenes as $orden)
@if($orden->estado=="Activa")
<?php
$fecha=explode("-",$orden->fecha);
 ?>
@if($fecha[0]==Carbon::now()->year)
@if($orden->correctivo==="si")
  @if($orden->unidad->familia==="Motocicleta")
  <?php $tcm++ ?>
  @endif

  @if($orden->unidad->familia==="Camion")
  <?php $tcc++ ?>
  @endif

  @if($orden->unidad->familia==="Sedan")
  <?php $tcs++ ?>
  @endif

  @if($orden->unidad->familia==="Pickup")
  <?php $tcp++ ?>
  @endif

@endif

@if($orden->preventivo==="si")
@if($orden->unidad->familia==="Motocicleta")
<?php $tpm++ ?>
@endif

@if($orden->unidad->familia==="Camion")
<?php $tpc++ ?>
@endif

@if($orden->unidad->familia==="Sedan")
<?php $tps++ ?>
@endif

@if($orden->unidad->familia==="Pickup")
<?php $tpp++ ?>
@endif
@endif

@if($orden->enllantamiento==="si")
@if($orden->unidad->familia==="Motocicleta")
<?php $tem++ ?>
@endif

@if($orden->unidad->familia==="Camion")
<?php $tec++ ?>
@endif

@if($orden->unidad->familia==="Sedan")
<?php $tes++ ?>
@endif

@if($orden->unidad->familia==="Pickup")
<?php $tep++ ?>
@endif
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
  var pieChartCanvas = $("#grafica_ts_motocicleta").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{$tcm}},
      color: "#f56954",
      highlight: "#df331a",
      label: "Correctivo"
    },
    {
      value: {{$tpm}},
      color: "#00a65a",
      highlight: "#047843",
      label: "Preventivo"
    },
    {
      value: {{$tem}},
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


<script>
$(function () {
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#grafica_ts_sedan").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{$tcs}},
      color: "#f56954",
      highlight: "#df331a",
      label: "Correctivo"
    },
    {
      value: {{$tps}},
      color: "#00a65a",
      highlight: "#047843",
      label: "Preventivo"
    },
    {
      value: {{$tes}},
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

<script>
$(function () {
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#grafica_ts_pickup").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{$tcp}},
      color: "#f56954",
      highlight: "#df331a",
      label: "Correctivo"
    },
    {
      value: {{$tpp}},
      color: "#00a65a",
      highlight: "#047843",
      label: "Preventivo"
    },
    {
      value: {{$tep}},
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


<script>
$(function () {
  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $("#grafica_ts_camion").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{$tcc}},
      color: "#f56954",
      highlight: "#df331a",
      label: "Correctivo"
    },
    {
      value: {{$tpc}},
      color: "#00a65a",
      highlight: "#047843",
      label: "Preventivo"
    },
    {
      value: {{$tec}},
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
