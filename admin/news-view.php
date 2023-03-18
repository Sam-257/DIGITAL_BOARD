<?php
session_start(); {
    if (!isset($_SESSION['user'])) {
        header('Location: index.php');
    }
}
?>
<!doctype html>
<html class="fixed">

<head>
    <?php
    include_once 'includes/head.php';
    ?>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.css">
    <link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
    <link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="vendor/morris/morris.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>

</head>

<body>
    <?php include_once 'includes/header.php'; ?>
    <section class="body">

        <!-- start: header -->
        <!-- <?php include_once 'includes/header.php'; ?> -->
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navigation
                    </div>
                    <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <?php include 'includes/nav-bar.php'; ?>

            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>News</h2>
                </header>

                <!-- start: page -->
                <div class="row">
                    <div class="col">
                        <section class="card">
                            <header class="card-header">
                                <h2 class="card-title">View News</h2>
                            </header>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table" width='100%'>
                                                <tbody>
                                                    <tr style="color:black;">
                                                    <tr>
                                                        <th>
                                                            <h5><b>Date(M/D/Y)</b></h5>


                                                        </th>
                                                        <th>
                                                            <!-- <col width ='10'> -->

                                                            <h5><b>News</b></h5>

                                                        </th>
                                                        <th>

                                                            <h5><b>update</b></h5>

                                                        </th>
                                                        <th>

                                                            <h5><b>Delete</b></h5>

                                                        </th>





                                                        <?php include_once '../connect.php';
                                                        $q = "select `sno`,`news`,`date` from `news` order by date asc";
                                                        $q1 = mysqli_query($conn, $q);
                                                        while ($row = mysqli_fetch_assoc($q1)) {
                                                            echo " <tr>";
                                                            echo "<td>";
                                                            ?>
                                                            <form action=viewsnews.php method="POST">
                                                                <input type='date' class='form-control' value="<?php echo $row['date'] ?>" name='date' id='date' required>
                                                                <?php
                                                                    echo "</td>";

                                                                    echo " <td>";

                                                                    ?>
                                                                <textarea type='text' class='form-control' value="" name='news' id='news' required><?php echo $row['news'] ?></textarea>
                                                                <?php
                                                                    echo "</td>";
                                                                    echo "<td>";
                                                                    ?>

                                                                <input type='hidden' class='form-control' value="<?php echo $row['sno'] ?>" name='sno' id='sno' required style='width:40px;'>

                                                                <button class='btn btn-primary' name='update' id='update'>UPDATE</button>
                                                            </form>
                                                            <?php
                                                                echo "</td>";
                                                                echo " <td>";
                                                                ?>
                                                            <form action=del.php method=POST>
                                                                <input type='hidden' class='form-control' value="<?php echo $row['sno'] ?>" name='sno' id='sno'>
                                                                <button class='btn btn-primary' name='delete' id='delete'>Delete</button>
                                                                <!--      -->
                                                            </form>
                                                        <?php
                                                            echo "</td>";
                                                            echo " </tr>";
                                                        }
                                                        ?>



                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- end: page -->
            </section>
        </div>
    </section>

    <!-- Vendor -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="vendor/popper/umd/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="vendor/common/common.js"></script>
    <script src="vendor/nanoscroller/nanoscroller.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
    <script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

    <!-- Specific Page Vendor -->
    <script src="vendor/jquery-ui/jquery-ui.js"></script>
    <script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
    <script src="vendor/jquery-appear/jquery-appear.js"></script>
    <script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="vendor/flot/jquery.flot.js"></script>
    <script src="vendor/flot.tooltip/flot.tooltip.js"></script>
    <script src="vendor/flot/jquery.flot.pie.js"></script>
    <script src="vendor/flot/jquery.flot.categories.js"></script>
    <script src="vendor/flot/jquery.flot.resize.js"></script>
    <script src="vendor/jquery-sparkline/jquery-sparkline.js"></script>
    <script src="vendor/raphael/raphael.js"></script>
    <script src="vendor/morris/morris.js"></script>
    <script src="vendor/gauge/gauge.js"></script>
    <script src="vendor/snap.svg/snap.svg.js"></script>
    <script src="vendor/liquid-meter/liquid.meter.js"></script>
    <script src="vendor/jqvmap/jquery.vmap.js"></script>
    <script src="vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="js/theme.js"></script>

    <!-- Theme Custom -->
    <script src="js/custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="js/theme.init.js"></script>

    <!-- Examples -->
    <script src="js/examples/examples.dashboard.js"></script>
</body>

</html>