<?php
session_start();

if(!empty($_SESSION['id'])){
 
}else{
  header('location:../php/signin.php');
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/admin_report.css"/>
    <link rel="stylesheet" type="text/css" href="../nav_footer/admin_nav.css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <?php
    include '../nav_footer/admin_nav.php'
    ?>
  <body>
   
    <div class="container conrep">
    <div class="d-flex flex-row-reverse"><a class="btn-warning" href="admin_dashboard.php"><i class="fa-solid fa-arrow-left"></i>RETURN</a></div>
    <div class="row">
    <div class="col-md-6 graph_col" style="margin-top: 30px;">
    <div class="graph_inner">
    <center><h1>TOTAL SALES</h1>
            <div id="chart-container" style="position: relative; width: 100%; height: 400px; margin-bottom: 5em;">
            <canvas id="salesChart" width="400" height="400"></canvas>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "espresso";

$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $monthlySql = "SELECT MONTH(order_date) as order_month, SUM(total) as total_sales FROM orders GROUP BY order_month";
    $weeklySql = "SELECT WEEK(order_date) as order_week, SUM(total) as total_sales FROM orders GROUP BY order_week";
    $dailySql = "SELECT DATE(order_date) as order_day, SUM(total) as total_sales FROM orders GROUP BY order_day";

    $monthlyResult = $conn->query($monthlySql);
    $weeklyResult = $conn->query($weeklySql);
    $dailyResult = $conn->query($dailySql);

    $months = [];
    $monthSales = [];
    $weeks = [];
    $weekSales = [];
    $days = [];
    $daySales = [];

    if ($monthlyResult->num_rows > 0) {
        while($row = $monthlyResult->fetch_assoc()) {
            $months[] = date("F", mktime(0, 0, 0, $row['order_month'], 1));
            $monthSales[] = $row['total_sales'];
        }
    }

    if ($weeklyResult->num_rows > 0) {
        while($row = $weeklyResult->fetch_assoc()) {
            $weeks[] = "Week " . $row['order_week'];
            $weekSales[] = $row['total_sales'];
        }
    }

    if ($dailyResult->num_rows > 0) {
        while($row = $dailyResult->fetch_assoc()) {
            $days[] = $row['order_day'];
            $daySales[] = $row['total_sales'];
        }
    }

    $conn->close();
    ?>

    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($months); ?>,
                datasets: [{
                    label: 'Monthly Sales',
                    data: <?php echo json_encode($monthSales); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Weekly Sales',
                    data: <?php echo json_encode($weekSales); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Daily Sales',
                    data: <?php echo json_encode($daySales); ?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.7)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Total Sales Overview'
                }
            }
        });
    </script>
    
   
    </div>
    </div>
</div>


<div class="col-md-3 graph_col" style="margin-top: 30px;">
    <div class="graph_inner">
        <h1 style="width: 160%; text-align: center;" >MOST SALE PRODUCT</h1>
        <div id="chart-container" style="position: relative; width: 160%; height: 400px; margin-bottom: 5em;">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <?php

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT product_name, SUM(quantity) AS total_quantity FROM orderitems GROUP BY product_name ORDER BY total_quantity DESC";

$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$conn->close();
?>
<script>
        var data = <?php echo json_encode($data); ?>;

        // Sort the data array by total quantity in descending order
        data.sort((a, b) => b.total_quantity - a.total_quantity);

        // Take only the top 3 entries
        var top3Data = data.slice(0, 3);

        var labels = top3Data.map(function(item) {
            return item.product_name;
        });

        var quantities = top3Data.map(function(item) {
            return item.total_quantity;
        });

        var colors = ['rgba(255, 99, 132, 0.5)', 'rgba(54, 162, 235, 0.5)', 'rgba(255, 206, 86, 0.5)'];

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Top 3 Highest Total Quantity',
                    data: quantities,
                    backgroundColor: colors,
                    borderColor: colors.map(color => color.replace('0.5', '1')),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Top 3 Highest Total Quantity Pie Chart'
                },
                plugins: {
                    datalabels: {
                        color: '#fff',
                        font: {
                            weight: 'bold'
                        },
                        formatter: (value, context) => {
                            return context.chart.data.labels[context.dataIndex] + ': ' + value;
                        }
                    }
                }
            }
        });
    </script>
    </div>
</div>
</div>



      
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>