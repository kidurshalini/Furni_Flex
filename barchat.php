<?php
    include 'dbconnection.php'; 
 
    $dash_post_query = "SELECT * from orderdetails";
    $dash_post_query_run = mysqli_query($conn, $dash_post_query);
    $post_total = mysqli_num_rows($dash_post_query_run);

    $dash_post_query1 = "SELECT * from cuztomize";
    $dash_post_query_run1 = mysqli_query($conn, $dash_post_query1);
    $post_total1 = mysqli_num_rows($dash_post_query_run1);
    
    $dataPoints = array( 
        array("y" => $post_total , "label" => "Order Details" ),
        array("y" => $post_total1, "label" => "Customized Details" ),
    );
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Customer Order Method Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        * {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
     

        .section {
         
            height: 100%;
            background: url('images/chart2.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .section::before {
            content: "";
            position: absolute;
            top: 10;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2; /* Ensures content is above overlay */
        }

        .chart-title {
            font-size: 24px;
            font-weight: bold;
            color: #fff; /* White text for better contrast */
            text-align: center;
            margin-top: 50px;
 
        }

        #chartContainer {
            height: 300px;
            width: 70%;
            margin-bottom: 150px;
            margin-left: 150px;
            margin-bottom: 150px;
            margin-top: 50px;
        }

        .axis-label {
            font-size: 25px;
            font-weight: bold;
            color: #fff; /* White text for better contrast */
            margin-top: 10px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/canvasjs.min.js"></script>
</head>
<body class="section">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="chart-title">Customer Order Method Details</div>
            <div id="chartContainer"></div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: ""
            },
            axisY: {
                title: "Count",
                titleFontSize: 20,
                titleFontWeight: "bold",
                labelFontSize: 16,
                labelFontWeight: "bold",
                labelFontColor: "#333" /* Dark gray */
            },
            data: [{
                type: "column",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
    }
</script>
</body>
</html>
