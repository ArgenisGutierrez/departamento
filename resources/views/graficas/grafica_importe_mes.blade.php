<?php
use Carbon\Carbon;
$facturas=departamento\factura::all();
$enero=0;
$febrero=0;
$marzo=0;
$abril=0;
$mayo=0;
$junio=0;
$julio=0;
$agosto=0;
$septiembre=0;
$octubre=0;
$noviembre=0;
$diciembre=0;
foreach ($facturas as $factura) {
  $mes=explode("-",$factura->fecha);
  if ($mes[0]==Carbon::now()->year) {
    if ($mes[1]==1) {
      $enero=$enero+$factura->importe;
    }

    if ($mes[1]==2) {
      $febrero=$febrero+$factura->importe;
    }

    if ($mes[1]==3) {
      $marzo=$marzo+$factura->importe;
    }

    if ($mes[1]==4) {
      $abril=$abril+$factura->importe;
    }

    if ($mes[1]==5) {
      $mayo=$mayo+$factura->importe;
    }

    if ($mes[1]==6) {
      $junio=$junio+$factura->importe;
    }

    if ($mes[1]==7) {
      $julio=$julio+$factura->importe;
    }

    if ($mes[1]==8) {
      $agosto=$agosto+$factura->importe;
    }

    if ($mes[1]==9) {
      $septiembre=$septiembre+$factura->importe;
    }

    if ($mes[1]==10) {
      $octubre=$octubre+$factura->importe;
    }

    if ($mes[1]==11) {
      $noviembre=$noviembre+$factura->importe;
    }

    if ($mes[1]==12) {
      $diciembre=$diciembre+$factura->importe;
    }
  }
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
  var pieChartCanvas = $("#grafica_importe_mes").get(0).getContext("2d");
  var pieChart = new Chart(pieChartCanvas);
  var PieData = [
    {
      value: {{$enero}},
      color: "#f56954",
      highlight: "#cb311a",
      label: "Enero"
    },
    {
      value: {{$febrero}},
      color: "#00a65a",
      highlight: "#01703d",
      label: "Febrero"
    },
    {
      value: {{$marzo}},
      color: "#3c8dbc",
      highlight: "#084c73",
      label: "Marzo"
    },
    {
      value: {{$abril}},
      color: "#d2c019",
      highlight: "#ac9c09",
      label: "Abril"
    },
    {
      value: {{$mayo}},
      color: "rgb(120, 34, 175)",
      highlight: "rgb(83, 5, 134)",
      label: "Mayo"
    },
    {
      value: {{$junio}},
      color: "#cf0903",
      highlight: "#8c0804",
      label: "Junio"
    },
    {
      value: {{$julio}},
      color: "#11badf",
      highlight: "#00819d",
      label: "Julio"
    },
    {
      value: {{$agosto}},
      color: "rgb(21, 33, 193)",
      highlight: "rgb(4, 14, 139)",
      label: "Agosto"
    },
    {
      value: {{$septiembre}},
      color: "#10c617",
      highlight: "#078b0c",
      label: "Septiembre"
    },
    {
      value: {{$octubre}},
      color: "rgb(20, 2, 110)",
      highlight: "rgb(39, 12, 172)",
      label: "Octubre"
    },
    {
      value: {{$noviembre}},
      color: "rgb(219, 119, 14)",
      highlight: "rgb(168, 90, 8)",
      label: "Noviembre"
    },
    {
      value: {{$diciembre}},
      color: "rgb(200, 15, 115)",
      highlight: "rgb(128, 6, 72)",
      label: "Diciembre"
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
