<?php 
    include 'vendor/fusioncharts/integrations/php/samples/includes/fusioncharts.php';
    $hostdb = "localhost";
    $userdb = "root";
    $passdb = "";
    $namedb = "uplant";

    $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
    if ($dbhandle->connect_error) {
    exit("There was an error with your connection: " . $dbhandle->connect_error);
    }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplant - FusionCharts</title>
    <link rel="stylesheet" href="./assets/app/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script src=" https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>


    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</head>
<body>
    <div>
        <nav class="navbar navbar-expand-md navbar-danger py-1" style="background-color: #4c6b20; position: fixed;">
            <div class="container-fluid">
                <div class="btn btn-default" id="btn-slider" type="button"></div>
                <ul class="nav ">
                    <li class="nav-item dropstart">
                        <a class="nav-link text-dark ps-3 pe-1 " href="index.php" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown">
                            <img src="img/user.jpeg" alt="user" class="img-user">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="slider" id="sliders">
            <div class="slider-head">
                <div class="d-block pt-4 pb-3 px-3">
                    <img src="img/user.jpeg" alt="user" class="slider-img-user mb-2">
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column">
                    <a class="nav-link px-3 active" href="index.php">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Home
                    </a>
                    <a class="nav-link px-3" href="fusion.php">
                        <i class="fa fa-id-card fa-lg box-icon" aria-hidden="true"></i>Fusion Charts
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="logout.php">
                        <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>LogOut
                    </a>

                </nav>
            </div>
        </div>

        <div class="main-pages">
            <div class="container-fluid">
                <div class="row g-2 mb-3">
                    <div class="col-12">
                        <div class="d-block bg-white rounded shadow p-3">
                        <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Fusion Charts</h2>
                        <br>
                    </div>
                    <br>
                    <br>
                    <?php
                        $hostdb = "localhost";
                        $userdb = "root";
                        $passdb = "";
                        $namedb = "uplant";

                        $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
                        if ($dbhandle->connect_error) {
                            exit("There was an error with your connection: " . $dbhandle->connect_error);
                        }

                        $strQuery = "SELECT *, COUNT(id) AS jml_event FROM acara GROUP BY(tanggal_acara) ORDER BY tanggal_acara ASC";

                        $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

                        if ($result) {
                            $arrData = array(
                                "chart" => array(
                                    "caption" => "Jumlah Acara Berdasarkan Tanggal",
                                    "showValues" => "0",
                                    "theme" => "fusion"
                                )
                            );

                            $arrData["data"] = array();

                            while ($row = mysqli_fetch_array($result)) {
                                array_push(
                                    $arrData["data"],
                                    array(
                                        "label" => date('D, d-m-Y', strtotime($row["tanggal_acara"])),
                                        "value" => $row["jml_event"]
                                    )
                                );
                            }

                            $jsonEncodedData = json_encode($arrData);

                            $columnChart = new FusionCharts("column2D", "myFirstChart", 700, 400, "chart-1", "json", $jsonEncodedData);

                            $columnChart->render();
                            $dbhandle->close();
                        }
                        ?>
                        <br>

                        <div class="col-lg-8 offset-lg-2">
                            <div id="chart-1"></div>
                        </div>
                </div>
            </div>
        </div>
    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-background" id="sliders-background"></div>
    <script src="./dist/js/jquery.js"></script>
    <script src="./assets/app/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./dist/js/index.js"></script>
</body>
</html>