<?php
require 'proses/session.php';
require 'proses/persebaran.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BKSDA Jogja</title>
    <!-- TEST -->
    <!-- <link href="assets/asset/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- <link href="assets/asset/css/bootstrap.css" rel="stylesheet"> -->
    <!-- <link href="assets/asset/css/carousel.css" rel="stylesheet"> -->
    <!-- <link href="assets/asset/css/echartsHome.css" rel="stylesheet"> -->

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <!-- Flatpickr js -->
    <link href="assets/flatpickr.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/sweetalert/sweetalert.css">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/mycss.css">

    <!-- TEST -->
    <!-- <script src="assets/www/js/echarts.js"></script>
    <script src="assets/asset/js/codemirror.js"></script>
    <script src="assets/asset/js/javascript.js"></script>

    <link href="assets/asset/css/codemirror.css" rel="stylesheet">
    <link href="assets/asset/css/monokai.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="assets/sweetalert/sweetalert.js"></script>

    <style type="text/css">
        #wrapper {
            height: 100%;
          }
          /* Optional: Makes the sample page fill the window. */
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
          #map {
            height: 260px;
            /*max-height: 50%;*/
          }
          div.calendar {
        max-width: 240px;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
    <script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,
    	theme: "light2",
    	title: {
    		text: "Data Persebaran Fauna"
    	},
    	axisX: {
    		valueFormatString: "MMM"
    	},
    	axisY: {
    		prefix: "$",
    		labelFormatter: addSymbols
    	},
    	toolTip: {
    		shared: true
    	},
    	legend: {
    		cursor: "pointer",
    		itemclick: toggleDataSeries
    	},
    	data: [
    	{
    		type: "column",
    		name: "Penambahan",
    		showInLegend: true,
    		xValueFormatString: "MMMM YYYY",
    		yValueFormatString: "# ekor",
    		dataPoints: [
                <?=penambahan();?>
    		]
    	},
    	// {
    	// 	type: "line",
    	// 	name: "Expected Sales",
    	// 	showInLegend: true,
    	// 	yValueFormatString: "$#,##0",
    	// 	dataPoints: [
    	// 		{ x: new Date(2016, 0), y: 40000 },
    	// 		{ x: new Date(2016, 1), y: 42000 },
    	// 		{ x: new Date(2016, 2), y: 45000 },
    	// 		{ x: new Date(2016, 3), y: 45000 },
    	// 		{ x: new Date(2016, 4), y: 47000 },
    	// 		{ x: new Date(2016, 5), y: 43000 },
    	// 		{ x: new Date(2016, 6), y: 42000 },
    	// 		{ x: new Date(2016, 7), y: 43000 },
    	// 		{ x: new Date(2016, 8), y: 41000 },
    	// 		{ x: new Date(2016, 9), y: 45000 },
    	// 		{ x: new Date(2016, 10), y: 42000 },
    	// 		{ x: new Date(2016, 11), y: 50000 }
    	// 	]
    	// },
    	{
    		type: "area",
    		name: "Kematian",
    		markerBorderColor: "white",
    		markerBorderThickness: 2,
    		showInLegend: true,
    		yValueFormatString: "# ekor",
    		dataPoints: [
    		    <?=kematian();?>
    			// { x: new Date(2016, 0), y: 5000 },
    			// { x: new Date(2016, 1), y: 7000 },
    			// { x: new Date(2016, 2), y: 6000},
    			// { x: new Date(2016, 3), y: 30000 },
    			// { x: new Date(2016, 4), y: 20000 },
    			// { x: new Date(2016, 5), y: 15000 },
    			// { x: new Date(2016, 6), y: 13000 },
    			// { x: new Date(2016, 7), y: 20000 },
    			// { x: new Date(2016, 8), y: 15000 },
    			// { x: new Date(2016, 9), y:  10000},
    			// { x: new Date(2016, 10), y: 19000 },
    			// { x: new Date(2016, 11), y: 22000 }
    		]
    	}]
    });
    chart.render();

    function addSymbols(e) {
    	var suffixes = ["", "K", "M", "B"];
    	var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

    	if(order > suffixes.length - 1)
    		order = suffixes.length - 1;

    	var suffix = suffixes[order];
    	return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
    }

    function toggleDataSeries(e) {
    	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
    		e.dataSeries.visible = false;
    	} else {
    		e.dataSeries.visible = true;
    	}
    	e.chart.render();
    }

    }
    </script>
</head>

<body>

    <div id="wrapper">

        <?php
        	include 'section/nav.php';

        	if (isset($_GET['page'])) {
        		include 'pages/' . $_GET['page'] . '.php';
        	}
        	else{
        		include 'pages/index.php';
        	}
         ?>
    </div>

    <script>
    $(document).ready(function() {

    });
    </script>
    <!-- <script src="assets/asset/js/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="assets/asset/js/echartsHome.js"></script> -->
    <!-- <script src="assets/asset/js/bootstrap.min.js"></script> -->
    <!-- <script src="assets/asset/js/echartsExample.js"></script> -->
    <script src="assets/canvasjs.min.js"></script>
</body>

</html>
