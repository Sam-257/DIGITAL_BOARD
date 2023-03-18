<!DOCTYPE html>
<html lang="en">

<?php include "head_section.php"; ?>

<body>

  <?php include "nav.php"; ?>
  <div class="container">
    <div class="row">
      <div class="box">
        <div class="col-md-6">
          <div class='hd' style='text-align:center;font-size:40px;'>CAMPUS UPDATES</div>
          <div class="cupdates">
            <p>
              <span class='update'>
                <?php
                include_once 'connect.php';
                $q = "select `news`,`date` from `news` order by date desc";
                $q1 = mysqli_query($conn, $q);
                while ($row = mysqli_fetch_assoc($q1)) {
                  echo "<small>";
                  echo "Added on :";
                  echo   $row['date'];
                  echo "<br>";
                  echo "</small>";
                  echo $row['news'];

                  echo "<small>";
                  echo "<br>";

                  echo " </small>";
                  echo "<br>";
                }
                ?>
                <!-- update Status -->
                <?php
                $upd_status = "UPDATE dept SET dept_status=now(),reload_status=0 where dept_id={$_GET['dept']}";
                $result = mysqli_query($conn, $upd_status);
                ?>
              </span>
              <span class='update'>9 students shortlisted for Semi-finals of Master Orator Championship. <small>Added on: 21-August-2019</small></span>
            </p>
          </div>

        </div>

        <div class="col-md-6">
          <div class='hd' style='text-align:center;font-size:30px;'>EVENTS / HAPPENINGS</div>
          <p>
            <form class='login'>
              <div id="owl-demo2" class="owl-carousel">
                <div class="item"><img src='img/gallery/1.jpg' width='100%' height='300'>
                  <div class='img_text'>December 2019</div>
                </div>
                <div class="item"><img src='img/gallery/2.jpg' width='100%' height='300'>
                  <div class='img_text'>Registrations Open - Contact Technology Centre</div>

                </div>
                <div class="item"><img src='img/gallery/3.jpg' width='100%' height='300'></div>
                <div class="item"><img src='img/gallery/4.jpg' width='100%' height='300'></div>
                <div class="item"><img src='img/gallery/5.jpg' width='100%' height='300'></div>
              </div>
            </form>
          </p>
          <div class="clearfix"></div>
        </div>

        <div class="row">
          <div class="box">
            <div class="col-md-12">

              <p align='justify'>
                <div class='hd' style='text-align:center;font-size:30px;'>FLASH NEWS</div>
                <div class="marquee">
                  <p><?php
                      $q = "select `flash` from `flash` where flash_id=1";
                      $q1 = mysqli_query($conn, $q);
                      $row = mysqli_fetch_array($q1);
                      echo $row[0];
                      ?></p>
                </div>
              </p>

            </div>
          </div>
        </div>
        <div id='neterr' style="color:red;font-size:10px;text-align:center"> </div>

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
        $.ajax({
          type: 'POST',
          url: "check_status.php",
          dataType: 'text',
          data: {
            dept_id: "<?php echo $_GET['dept']; ?>",
            check: ''
          },
          success: function(data) {
            if (data == '1') {
              location.reload();
            }
          },
          failure: function() {
            $("#neterr").remove();
            $("#neterr").append('Please Check Internet Connection');
          },
        });
      }, 1000);

      setInterval(function() {

        today_time = startTime();
        $.ajax({
          type: 'POST',
          url: "check_status.php",
          dataType: 'text',
          data: {
            dept_id: "<?php echo $_GET['dept']; ?>",
            time: today_time,
            dept_flash: ''
          },
          success: function(data) {
            if (data != '0') {
              console.log(data >= today_time);
              console.log(data + ">=" + today_time);
              if (data >= today_time + ':00') {
                window.location = 'dept_flash.php?dept_id=<?php echo $_GET['dept']; ?>';
              }
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