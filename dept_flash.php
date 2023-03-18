<!DOCTYPE html>
<html lang="en">

<?php include "head_section.php"; ?>

<body>

    <?php include "nav.php"; ?>
    <?php
    include "connect.php";
    $dept_name = "SELECT dept_name from dept where dept_id={$_GET['dept_id']}";
    $dept_name = mysqli_query($conn, $dept_name);
    $dept_name = mysqli_fetch_assoc($dept_name);
    $dept_flash = "SELECT flash_news,time from dept_flash where dept_id={$_GET['dept_id']}";
    $dept_flash = mysqli_query($conn, $dept_flash);
    $dept_flash = mysqli_fetch_assoc($dept_flash);
    ?>
    <div class="container">
        <div class="row">
            <div class="box" style="width:100%;background-color:#EA2828;font-family:osfold;color:#ffffff ">
                <div style="text-align:center;font-size:40px;color:#DFEA28;text-transform:uppercase">
                    <b>FLASH NEWS Of <?php echo $dept_name['dept_name']; ?></b>
                </div>
                <div style="text-align:center;align:justify;font-size:50px">
                    <?php echo $dept_flash['flash_news']; ?>
                </div>
                <br><br><br><br><br><br><br><br>
            </div>
            <!-- /.container -->

        </div>
    </div>
    <?php include "footer.php"; ?>

    <script src="custom.js"></script>


    <script>
        $(document).ready(function() {

            var owl = $("#owl-demo");

            owl.owlCarousel({

                margin: 10,
                loop: true,
                autoWidth: true,
                items: 1, //10 items above 1000px browser width
                itemsDesktop: [600, 4], //5 items between 1000px and 901px
                itemsDesktopSmall: [600, 3], // 3 items betweem 900px and 601px
                itemsTablet: [500, 2], //2 items between 600 and 0;
                itemsMobile: [500, 1],
                autoPlay: true,
                itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option

            });
            // Custom Navigation Events
            $(".next").click(function() {
                owl.trigger('owl.next');
            })
            $(".prev").click(function() {
                owl.trigger('owl.prev');
            })



            var owl2 = $("#owl-demo2");

            owl2.owlCarousel({

                margin: 10,
                loop: true,
                autoWidth: true,
                items: 1, //10 items above 1000px browser width
                itemsDesktop: [600, 1], //5 items between 1000px and 901px
                itemsDesktopSmall: [600, 1], // 3 items betweem 900px and 601px
                itemsTablet: [500, 1], //2 items between 600 and 0;
                itemsMobile: [500, 1],
                autoPlay: true,
                itemsMobile: false // itemsMobile disabled - inherit from itemsTablet option

            });


        });
    </script>


    <!-- Offline Management Code -->
    <script>
        $(document).ready(function() {
            setInterval(function() {
                var today_time = startTime();
                $.ajax({
                    type: 'POST',
                    url: "check_status.php",
                    dataType: 'text',
                    data: {
                        dept_id: "<?php echo $_GET['dept_id']; ?>",
                        status: '0',
                        dept_flash_status: ''
                    },
                    success: function(data) {
                        var data=JSON.parse(data);
                        if (data[0] <= today_time) {
                            console.log(data[0]);
                            window.location = "index.php?dept=<?php echo $_GET['dept_id']; ?>"
                        }
                    },
                    failure: function() {
                        $("#neterr").remove();
                        $("#neterr").append('Please Check Internet Connection');
                    },
                });
            }, 1000);

        });
    </script>
</body>

</html>