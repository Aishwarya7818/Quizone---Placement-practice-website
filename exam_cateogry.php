<?php
include('../Project/validations.php');
if (!isAdmin()) {                                 //function to check if the user is admin or not
  $_SESSION['msg'] = "You must log in first";
  header('location: ../Project/index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo/logo1.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
Apsit - Admin Dashboard  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../Project/user_dashboard/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

    <style>
  .logo_text
{
  font-family: 'Roboto Slab', serif;
  font-size: 36px;
  font-weight: 700;
  line-height: 0.75;
  color: #fff;
  vertical-align: middle;
  margin-left: 7px;
  -webkit-transition: all 200ms ease;
  -moz-transition: all 200ms ease;
  -ms-transition: all 200ms ease;
  -o-transition: all 200ms ease;
  transition: all 200ms ease;
}
.logo_text span
{
  color: #ffba00;
}
.logo .user .photo {
    width: 34px;
    height: 34px;
    overflow: hidden;
    border-radius: 50%;
    float: left;
    margin-right: 11px;
    margin-left: 50px;
    z-index: 5;
    border: 2px solid rgba(255,255,255,.3);}
    .logo .user .photo img{
      width: 100%;
      vertical-align: middle;
      border: 0;
    }
    .logo .user a {
    color:#fff;
    padding: 8px 14px;
    display: block;
    white-space: nowrap;
    font-weight: bold;}
    .logo .user .info>a>span {
    opacity: 1;
    line-height: 20px;
    display: block;
    font-size: 18px;
    position: relative;}

.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="brown" data-background-color="white" data-image="../Project/admin_dashboard/assets/img/sidebar-3.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
     <div class="logo" style="background-image:url(../Project/user_dashboard/assets/banner.jpg)">
      <a href="#" class="simple-text logo-normal">
        <div class="logo_text">Quiz<span>one</span></div><br>
        <!---<div style="font-size: 20px; text-align: center;color: white;font-weight: bold;">Welcome!<a>Maria Josh</a></div>-->
      </a>     

    
      <div class="user">
          <div class="info">
            <div class="photo">
 <div class="img" style="background-size:cover;" >
              <?php
            $con = mysqli_connect("localhost","root","","wdl");     //making connection(not needed)
             $q = mysqli_query($con,"SELECT Profile_image from user WHERE username = '".$_SESSION['user']['username']."'");     //selecting Profile image of session user from database and storing in $q
            while($row = mysqli_fetch_assoc($q)){                                                                                //checking if user has set any profile image or not
                    if($_SESSION['user']['Profile_image']==""){                                     //if the user haven't uploaded any proile image
                      echo "<img src='assets/faces/default.png' alt='Profile Pic'>";                   //echo the default image
                    }
                    else{
                         echo "<img src='assets/faces/".$_SESSION['user']['Profile_image']."' alt='Profile Pic'>";                   //echo the profile image

                    }
                  }

        ?></div>            </div>
            <a class="collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false">
            <?php if (isset($_SESSION['success'])) : ?>
      
    <?php endif ?>

              <span style="color:white;"> 
              <?php  if (isset($_SESSION['user'])) : ?>
          <strong><?php echo $_SESSION['user']['username']; ?></strong>

          <small>
            <i  style="color: #fff;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
            <br>
          
          </small>

        <?php endif ?>
          </span> 
            </a>
          </div>
        </div>
        <div class="error success" >
        <h3>
          <?php 
          //  echo $_SESSION['success']; 
          //  unset($_SESSION['success']);
          ?>
        </h3>
      </div>
        
    </div>
      <div class="sidebar-wrapper">
       <ul class="nav">
          <li class="nav-item   ">
            <a class="nav-link" href="../Project/admindashboard.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Project/admin_user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Project/student_list.php">
              <i class="material-icons">content_paste</i>
              <p>Students List</p>
            </a>
          </li>
          <!--
          <li class="nav-item ">
            <a class="nav-link" href="../Project/companies.html">
              <i class="material-icons">card_travel</i>
              <p>Companies</p>
            </a>
          </li>-->
          <li class="nav-item ">
            <a class="nav-link" href="../Project/add_quiz.php">
              <i class="material-icons">school</i>
              <p>Add Quiz</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Project/admin_results.php">
              <i class="material-icons">emoji_events</i>
              <p>Results</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="../Project/admin_settings.php">
              <i class="material-icons">settings</i>
              <p>Settings</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;" style="font-family: Roboto Slab; font-size: 26px">Settings</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            
            <ul class="navbar-nav">
              
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="../Project/admin_user.php">Profile</a>
                  <a class="dropdown-item" href="../Project/admin_settings.php">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../Project/logout.php">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add exam</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form name="form1" action="" method="POST">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Exam Cateogry</label>
                          <input type="text" class="form-control" name="cateogry">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="bmd-label-floating">Exam Time in minutes</label>
                          <input type="text" class="form-control" name="time">
                        </div>
                      </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary pull-right" name="submit">Add Exam</button>
                  
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Exam Cateogries</h4>
                  <p class="card-category">Exam Cteogry</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <th style="font-weight:bold">
                          Test ID
                        </th>
                        <th style="font-weight:bold">
                          Test Name
                        </th>
                        <th style="font-weight:bold">
                          Company Name
                        </th>
                        <th style="font-weight:bold">
                          No. of Students
                        </th>
                        <th style="font-weight:bold">
                          View List
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Test 1
                          </td>
                          <td>
                            Infosys
                          </td>
                          <td>
                            30
                          </td>
                          <td class="text-primary">
              <button class="btn" style="background:#ffc107;"><a href="list.html" style="color:black;">View List</a></button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Test 2
                          </td>
                          <td>
                            LTI
                          </td>
                          <td>
                            30
                          </td>
                          <td class="text-primary">
              <button class="btn" style="background:#ffc107;"><a href="list.html" style="color:black;">View List</a></button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            Test 3
                          </td>
                          <td>
                            Capgemini
                          </td>
                          <td>
                            30
                          </td>
                          <td class="text-primary">
              <button class="btn" style="background:#ffc107;"><a href="list.html" style="color:black;">View List</a></button>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved </div>
        </div>
      </footer>
    </div>
  </div>


  <?php
if(isset($_POST["submit"])){
  echo "testing ok";
}

  ?>
  <!--   Core JS Files   -->
   <script src="../Project/admin_dashboard/assets/js/core/jquery.min.js"></script>
  <script src="../Project/admin_dashboard/assets/js/core/popper.min.js"></script>
  <script src="../Project/admin_dashboard/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../Project/admin_dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../Project/admin_dashboard/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../Project/admin_dashboard/assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../Project/admin_dashboard/assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../Project/admin_dashboard/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../Project/admin_dashboard/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../Project/admin_dashboard/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../Project/admin_dashboard/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../Project/admin_dashboard/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../Project/admin_dashboard/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../Project/admin_dashboard/assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../Project/admin_dashboard/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../Project/admin_dashboard/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../Project/admin_dashboard/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../Project/admin_dashboard/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../Project/admin_dashboard/assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../Project/admin_dashboard/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  
<!-- add avatar -->
var btnCust = '<button type="button" class="btn btn-secondary" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="/samples/default-avatar-male.png" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});
  </script>
</body>

</html>