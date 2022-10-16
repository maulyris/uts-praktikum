<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
 
?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplant - Beranda</title>
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
                    <form action="" method="POST" class="login-email">
                        <?php echo "<h6 class='text-white'>Welcome, " . $_SESSION['username'] ."!". "</h6>"; ?>

                    </form>
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
                        <h2 class="pull-left">Data Produk</h2>
                        
                        
                        <br>
                    </div>
                    <br>
                    <br>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM acara";
                    if($result = mysqli_query($conn, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th align=center>No</th>";
                                        echo "<th>Nama Acara</th>";
                                        echo "<th>Tanggal</th>";
                                        echo "<th>Jenis Acara</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($user_data = mysqli_fetch_array($result)) {         
                                    echo "<tr>";
                                    echo "<td>".$user_data['id']."</td>";
                                    echo "<td>".$user_data['nama_acara']."</td>";
                                    echo "<td>".$user_data['tanggal_acara']."</td>";
                                    echo "<td>".$user_data['jenis_acara']."</td>";
                                        echo "<td>";
                                        echo "<a href='edit.php?id=". $user_data['id'] ."' title='Update Record' data-toggle='tooltip' class='btn btn-success'>Ubah</a>";
                                        echo "<a href='delete.php?id=". $user_data['id'] ."' title='Delete Record' data-toggle='tooltip' class='btn btn-danger'>Hapus</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>
    </div>
                        </div>
                    </div>
                </div>

                

                <div class="row g-2">
                    <div class="col-12 col-lg-5">
                        <div class="d-block rounded shadow bg-white p-3">
                            <h4>Tambah Data Baru</h4>
                            <br>
                        <a href="create.php" class="btn btn-success pull-center">Tambah Baru</a>
                        <br>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="d-block rounded shadow bg-white p-3">
                        <?php include ("indexx.php")?>
                        <h4>Import Data Excel</h4>
                        <br>
                    <form method="POST" enctype="multipart/form-data" action="">
                        Masukan Data dari Excel: 
                        <input name="filexls" type="file" required="required" id="fomrFile"> 
                        <input name="submit" type="submit" value="Import" class="btn btn-info">
                            <br>
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