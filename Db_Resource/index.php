<?php include('sql.php');

session_start();
$sql = "select * from requests where status=2 AND environment='UAT'";
// $status_query = "select status from requests where status=2 AND environment='UAT'";
$result = mysqli_query($conn, $sql);
$checkRecord = $result->fetch_array();
$checkCount = $result->num_rows;
//  echo '<pre>';
//  print_r($checkCount);
//  die;
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['password'])) {

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Resources</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>



    </style>
  </head>

  <body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block">Resourcing</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->


      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['username']; ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?php echo $_SESSION['username']; ?></h6>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <button class="dropdown-item d-flex align-items-center" id="Model_box" class="BtnResources1" data-bs-toggle="modal" data-bs-target="#passwordModal" name="us_resource" onclick="getDb('US');" data-bs-whatever="@getbootstrap">
                  <i class="bi bi-gear"></i>
                  <span>Change Password</span>
                </button>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="logout.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav ">

        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="bi bi-grid"></i>
            <span>UAT</span>
          </a>
        </li><!-- End UAT Nav -->

        <li class="nav-item">
          <a class="nav-link" href="staging.php">
            <i class="bi bi-grid"></i>
            <span>Staging</span>
          </a>
        </li><!-- End staging Nav -->


      </ul>

    </aside>
    <main id="main" class="_main_dasboard">
      <div class="pagetitle">
        <h1>Pharmapod Resources</h1>
      </div>
      <div class="iconslist">
        <input type="hidden" onclick="AllowBtn();">
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                              // echo 'background-color:red';
                                            } ?>>
            <img id="img1" class="image-png mr-3" src="images/db-blue.png" height="60" value="1">

            <button type="button" name="us" value="US" id="Model_box" class="btn BtnResources1 btn-primary" name="us_resource" onclick="getDb('US');" data-bs-whatever="@getbootstrap"><span><b>US</b></span> Resource</button>
            <!-- <div class="_label_resourcing">US Resource</div> -->
          </div>
        </div>
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                            } ?>>
            <img id="img2" class="image-png mr-3" src="images/db-blue.png" height="60" value="2">
            <button type="button" id="Model_box" id="button" class="btn BtnResources2 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" name="grls_resource" onclick="getDb('GRLS');" data-bs-whatever="@getbootstrap"><span><b>GRLS</b></span> Resource</button>

          </div>

        </div>
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                            } ?>>
            <img id="img3" class="image-png mr-3" src="images/db-blue.png" height="60" value="3">
            <button type="button" id="Model_box" id="button" class="btn BtnResources3 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" name="uk_resource" onclick="getDb('UK');" data-bs-whatever="@getbootstrap"><span><b>UK</b></span> Resource</button>
          </div>

        </div>
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                            } ?>>
            <img id="img4" class="image-png mr-3" src="images/db-blue.png" height="60" value="4">
            <button type="button" id="Model_box" id="button" class="btn BtnResources4 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" name="ca_resource" onclick="getDb('CA');" data-bs-whatever="@getbootstrap"><span><b>CA</b></span> Resource</button>
          </div>

        </div>

      </div>
      <?php if ($checkCount !== 0) { ?>
        <div class="row">
          <div id="alert-info-db" value="3" class="alert alert-danger alert-dismissible fade show mt-3 alert-box-db" role="alert">
            <MARquee style="font-size:bold;font-size: 20px;">The <?php echo $checkRecord['environment']; ?> Environment <?php echo $checkRecord['db']; ?> Database is currently resourcing...You can resource the <?php echo $checkRecord['environment']; ?> Environment <?php echo $checkRecord['db']; ?> after the current resourcing is Completed </MARquee>
          </div>
        </div>
      <?php } ?>

      <script>
        function changeImage1(a) {
          document.getElementById("img1").src = a;
          document.getElementById
        }
      </script>
      <script>
        function changeImage2(b) {
          document.getElementById("img2").src = b;
        }
      </script>
      <script>
        function changeImage3(c) {
          document.getElementById("img3").src = c;
        }
      </script>
      <script>
        function changeImage4(d) {
          document.getElementById("img4").src = d;
        }
      </script>

      <!-- ======= table ======= -->
      <form action="datecheck.php" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <input type="hidden" id="getEnv" value="UAT" name="Environment">
                <input type="hidden" id="getDb" value="" name="Db">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- <form action="" method="POST"> -->
                <?php
                    $date = new DateTime();
                    $enddate=$date->modify("-3 days")->format('Y-m-d');
                    $datetime = date("Y-m-d\TH:i:s");
                  ?>
                <input id="party" type="datetime-local" name="partydate" value="date" class="form-control" style="width: position: relative; width: 60.5% ;" min="2022-06-15T08:30" max="<?php
                echo $enddate;
                ?>T16:30">
                <!-- <input type="submit" name="submit" value="submit"> -->
                <!-- </form> -->
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">comment:</label>
                  <textarea class="form-control" id="message-text" value="" name="comments" required></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                <input type="submit" value="submit" class="btn btn-primary closeMsg">
              </div>
            </div>
          </div>
        </div>
      </form>

      <form action="change-p.php" method="post">
        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <div class="modal-body">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error" role="alert"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <a class="dropdown-item d-flex flex-column align-items-left">
                  <label class="change-pass-label">New Password</label>
                  <input type="password" name="np" class="form-control mb-3" placeholder="New Password" class="change-pass-input">
                </a>
                <input type="hidden" name="op" placeholder="Old Password">
                <div class="mb-3">
                  <a class="dropdown-item d-flex flex-column align-items-left">
                    <label class="change-pass-label">Confirm New Password</label>
                    <input type="password" name="c_np" class="form-control" placeholder="Confirm New Password" class="change-pass-input">
                  </a>

                  <button class="btn btn-primary ml-4 mb-2 mt-4 " style="font-size: 14px;" type="submit">CHANGE</button>


                </div>

              </div>
            </div>
          </div>
        </div>
      </form>

      <div class="card mt-2">
        <div class="card-body">
          <h5 class="card-title">Resource Table</h5>

          <!-- Table with hoverable rows -->
          <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">DB</th>
                <th scope="col">Environment</th>
                <th scope="col">Initiated Date</th>
                <th scope="col">Completed Date</th>
                <th scope="col">Time Taken</th>
                <th scope="col">Initiated By</th>
                <th scope="col">Status</th>
                <th scope="col" style="width: 50px;">Comment</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM requests ORDER BY id ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  $i = 1;

                  while ($row = $result->fetch_assoc()) {
                    $UserName = ($row["requested_by"] == $_SESSION['id']) ? $_SESSION['username'] : 'no user found';
                    if ($row['status'] == 0) {
                      $status = '<P style="color:Orange">Submitted</P>';
                    } elseif ($row['status'] == 2) {
                      $status =  '<P style="color:Blue">In Progress</P>';
                    } elseif ($row['status'] == 3) {
                      $status =  '<P style="color:green">Success</P>';
                    } else {
                      $status = '<P style="color:red">Failed</P>';
                    }


                    $date1 = new DateTime($row["created_at"]);
                    $date2 = new DateTime($row["completed_at"]);
                    if ($row["completed_at"] != '') {
                      $interval = $date1->diff($date2);
                      $elapsed = $interval->format('%H:%I:%S');;
                    } else {
                      $elapsed = '';
                    }
                    $ChangeEnvironment=$row["environment"];
         if($ChangeEnvironment == 'UAT' ){
      
                   
                $tableColor = ($row["status"] == 2) ? '<tr style="background:lightblue">' : '<tr style="background:unset">';
                    $newDate = date("M d, Y h:m:s", strtotime($row["completed_at"]));
                    echo "<tr>{$tableColor}";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$i}</td>";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$row["db"]}</td>";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$ChangeEnvironment}</td>";                    
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$row["created_at"]}</td>";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$row["completed_at"]}</td>";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$elapsed}</td>";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$UserName}</td>";
                    echo " <td class='text-center text-muted' style='padding-top:35px'>{$status}</td>";
                    echo " <td id='commentsVal' class='text-center text-muted' style='padding-top:35px' title='{$row["comment"]}'>{$row["comment"]}</td>";
                    // echo "<br> id: " . $row["id"] . " - Name: " . $row["user_name"] . " " . $row["email"] . "<br>";
                    echo "</tr>";
                    $i++;
                  
                }else{
                  
                    echo "<tr style='display:none'>";
                    echo "</tr>";

                }
                }
                } else {
                  echo "<h2 class='text-center'>NO results</h2>";
                }
                ?>
            </tbody>
          </table>
          <!-- End Table with hoverable rows -->

        </div>
      </div>
    </main>

    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      function getDb(name) {
        $('#getDb').val(name);
        var simple = '<?php echo $checkCount; ?>';
        console.log(simple, 'hi');
        if (simple == 1) {
          Swal.fire({
            // title: "<i>Title</i>", 
            html: "<h4 style='color:red;margin-top:1rem'>The <?php echo $checkRecord['environment']; ?> Environment <?php echo $checkRecord['db']; ?> Database is currently resourcing. You can resource the <?php echo $checkRecord['environment']; ?> Environment <?php echo $checkRecord['db']; ?> after the current resourcing is Completed</h4>",
            confirmButtonText: "<h4 style='margin:0px !important;background:#007bff !important'>Okay</h4>",
          });
        } else {
          $("#exampleModal").modal('show');
        }

      }

      $(document).ready(function() {
        $('#example').DataTable();
      });

      function getPass() {
        $('#change-pass').click(function() {
          $('#change-pass-box').attr("style", "display:block")
          console.log('clicked');
        })
      }
      $(document).ready(function() {
        getPass();
      });

      

      var countDownDate = new Date("Jan 5, 2024 15:37:25").getTime();

      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate + now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
          minutes + "m " + seconds + "s ";

        // If the count down is over, write some text 
        if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "EXPIRED";
        }
      }, 1000);
    </script>

  </body>

  </html>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>