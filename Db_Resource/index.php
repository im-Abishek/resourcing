<?php include('sql.php');

session_start();
$sql = "select * from requests where status=1 AND environment='UAT'";
$result = mysqli_query($conn, $sql);
$checkRecord = $result->fetch_array();
$checkCount = $result->num_rows;

if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['password']) ) {

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

  #change-pass-box{
    display: none
  }
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
      
              <li >
                <a class="dropdown-item d-flex align-items-center"  id="change-pass" onclick="getPass();">
                  <i class="bi bi-gear"></i>
                  <span>Change Password</span>
                  
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              
           
              <li  
              class="" id="change-pass-box">
              <form action="change-p.php" method="post" autocomplete="off">
                 <?php if (isset($_GET['error'])) { ?>
			           	<p class="error" role="alert"><?php echo $_GET['error']; ?></p>
			           <?php } ?>
                <a class="dropdown-item d-flex flex-column align-items-left">
                  <label class="change-pass-label">New Password</label>
			            <input type="password" name="np" placeholder="New Password" class="change-pass-input">
                </a>
                
			            <input type="hidden" name="op" placeholder="Old Password">

                <a class="dropdown-item d-flex flex-column align-items-left">
                  <label class="change-pass-label">Confirm New Password</label>
			            <input type="password" name="c_np" placeholder="Confirm New Password" class="change-pass-input">
                </a>
                <button class="btn btn-primary ml-3 mb-3" style="font-size: 14px;" type="submit">CHANGE</button>
              </li>
              <li id="change-pass-box">
                <hr class="dropdown-divider">
                </form>
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

      <ul class="sidebar-nav" id="sidebar-nav nav-side-clr">

        <li class="nav-item">
          <a class="nav-link" onclick="clrChange();" href="index.php">
            <i class="bi bi-grid"></i>
            <span>UAT</span>
          </a>
        </li><!-- End UAT Nav -->

        <li class="nav-item">
          <a class="nav-link" id="nav-link-btn" href="staging.php">
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
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                              // echo 'background-color:red';
                                            } ?>>
            <img id="img1" class="image-png" src="images/disk.png" height="60" value="1">

            <button type="button" name="us" value="US" id="Model_box" <?php if ($checkCount !== 0) {
                                                                          echo 'disabled';
                                                                          // echo 'style="background-color:white"';
                                                                        } ?> class="btn BtnResources1 btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" name="us_resource" onclick="getDb('US');" data-bs-whatever="@getbootstrap"><span><b>US</b></span> Resource</button>
            <!-- <div class="_label_resourcing">US Resource</div> -->
          </div>
        </div>
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                            } ?>>
            <img id="img2" class="image-png" src="images/disk.png" height="60" value="2">
            <button type="button" id="Model_box" id="button" class="btn BtnResources2 btn-primary" <?php if ($checkCount !== 0) {
                                                                                                        echo 'disabled';
                                                                                                      } ?> data-bs-toggle="modal" data-bs-target="#exampleModal" name="grls_resource" onclick="getDb('GRLS');" data-bs-whatever="@getbootstrap"><span><b>GRLS</b></span> Resource</button>

          </div>

        </div>
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                            } ?>>
            <img id="img3" class="image-png" src="images/disk.png" height="60" value="3">
            <button type="button" id="Model_box" id="button" class="btn BtnResources3 btn-primary" <?php if ($checkCount !== 0) {
                                                                                                        echo 'disabled';
                                                                                                      } ?> data-bs-toggle="modal" data-bs-target="#exampleModal" name="uk_resource" onclick="getDb('UK');" data-bs-whatever="@getbootstrap"><span><b>UK</b></span> Resource</button>
          </div>

        </div>
        <div class="icon-root">
          <div class="icon" type="button" <?php if ($checkCount !== 0) {
                                              echo "onclick='changeImage1('images/disk.gif');'";
                                            } ?>>
            <img id="img4" class="image-png" src="images/disk.png" height="60" value="4">
            <button type="button" id="Model_box" id="button" class="btn BtnResources4 btn-primary" <?php if ($checkCount !== 0) {
                                                                                                        echo 'disabled';
                                                                                                      } ?> data-bs-toggle="modal" data-bs-target="#exampleModal" name="ca_resource" onclick="getDb('CA');" data-bs-whatever="@getbootstrap"><span><b>CA</b></span> Resource</button>
          </div>

        </div>

      </div>
      <?php if ($checkCount !== 0) { ?>
        <div class="row">
          <div id="alert-info-db" value="3" class="alert alert-danger alert-dismissible fade show mt-3 alert-box-db" role="alert">
          <MARquee>The <?php echo $checkRecord['environment']; ?> Environment <?php echo $checkRecord['db']; ?> database is currently resourcing.....</MARquee>
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
                <input type="datetime-local" class="form-control" name="date" style="width: position: relative; width: 60.5% ;">
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
                <th scope="col" style="width: 180px;">Comment</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM requests ORDER BY id DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  // output data of each row
                  $i = 1;

                  while ($row = $result->fetch_assoc()) {
                    $t = ($row["requested_by"] == $_SESSION['id']) ? $_SESSION['username'] : 'no user found';
                    if ($row['status'] == 0) {
                      $status = 'In progress';
                    } elseif ($row['status'] == 1) {
                      $status =  'Completed';
                    } else {
                      $status = 'Failed';
                    }
                    $date1 = new DateTime($row["created_at"]);
                    $date2 = new DateTime($row["completed_at"]);
                    if ($row["completed_at"] != '') {
                      $interval = $date1->diff($date2);
                      $elapsed = $interval->format('%H:%I:%S');;
                    } else {
                      $elapsed = '';
                    }




                    echo "<tr>";
                    echo " <td class='text-center text-muted'>{$i}</td>";
                    echo " <td class='text-center text-muted'>{$row["db"]}</td>";
                    echo " <td class='text-center text-muted'>{$row["environment"]}</td>";
                    echo " <td class='text-center text-muted'>{$row["created_at"]}</td>";
                    echo " <td class='text-center text-muted'>{$row["completed_at"]}</td>";
                    echo " <td class='text-center text-muted'>{$elapsed}</td>";
                    echo " <td class='text-center text-muted'>{$t}</td>";
                    echo " <td class='text-center text-muted' style='red'>{$status}</td>";
                    echo " <td id='commentsVal' class='text-center text-muted' title='{$row["comment"]}' style='overflow:hidden!important;text-overflow: ellipsis!important; white-space:nowrap !important;display: block;width: 195px !important;'>{$row["comment"]}</td>";
                    // echo "<br> id: " . $row["id"] . " - Name: " . $row["user_name"] . " " . $row["email"] . "<br>";
                    echo "</tr>";
                    $i++;
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


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
      function getDb(name) {
        $('#getDb').val(name);
      }
     
      $(document).ready(function() {
        $('#example').DataTable();
      });

      function getPass() {
        $('#change-pass').click(function(){
          $('#change-pass-box').attr("style", "display:block")
          console.log('clicked');
        })
      }
      $(document).ready(function() {
       getPass();
      });
      function clrChange() {
          document.getElementById('nav-side-clr').style.cssText = 'background-color: red; color: white; 
      }
    </script>

  </body>

  </html>
<?php
} else {
  header("Location: login.php");
  exit();
}
?>