<?php
require_once "../tasks/authChecker.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en" />
  <meta name="msapplication-TileColor" content="#2d89ef">
  <meta name="theme-color" content="#4188c9">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <link rel="icon" href="./favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
  <!-- Generated: 2018-04-16 09:29:05 +0200 -->
  <title>Instructor Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
  <script src="../assets/js/require.min.js"></script>
  <script>
    requirejs.config({
      baseUrl: '../'
    });
  </script>
  <link rel="stylesheet" href="../assets/styles.css" type="text/css">
  <!-- Dashboard Core -->
  <link href="../assets/css/dashboard.css" rel="stylesheet" />
  <script src="../assets/js/dashboard.js"></script>
  <!-- c3.js Charts Plugin -->
  <link href="../assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
  <script src="../assets/plugins/charts-c3/plugin.js"></script>
  <!-- Google Maps Plugin -->
  <link href="../assets/plugins/maps-google/plugin.css" rel="stylesheet" />
  <script src="../assets/plugins/maps-google/plugin.js"></script>
  <!-- Input Mask Plugin -->
  <script src="../assets/plugins/input-mask/plugin.js"></script>
</head>

<body>
  <div class="header py-4">
    <div class="container">
      <div class="d-flex">
        <a class="header-brand" href="./dash.php">
          Phoenix
        </a>
        <div class="d-flex order-lg-2 ml-auto">


          <div class="dropdown">
            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
              <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
              <span class="ml-2 d-none d-lg-block">
                <span class="text-default">Username</span>
                <small class="text-muted d-block mt-1">Instructor</small>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-user"></i> Profile
              </a>

              <a class="dropdown-item" href="#">
                <span class="float-right"><span class="badge badge-primary">6</span></span>
                <i class="dropdown-icon fe fe-mail"></i> Inbox
              </a>
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-send"></i> Message
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-help-circle"></i> Need help?
              </a>
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-log-out"></i> Sign out
              </a>
            </div>
          </div>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
          <span class="header-toggler-icon"></span>
        </a>
      </div>
    </div>
  </div>


  <div class="container">
    <br>
    <h4> Profile</h4>
    <hr>
    <div class="container">
      <div class="row">


        <div class="col-md-6">
          <div class="jumbotron">
            <p class="lead">Personal Details</p>
            <hr class="my-4">
            <div class="form-group">
              <label for="txtFName">First Name</label>
              <input type="text" class="form-control" id="txtFName" placeholder="">
            </div>

            <div class="form-group">
              <label for="txtLName">Last Name</label>
              <input type="text" class="form-control" id="txtLName" placeholder="">
            </div>

            <div class="form-group">
              <label for="txtEmail">Email</label>
              <input type="text" class="form-control" id="txtEmail" placeholder="">
            </div>

            <div class="form-group">
              <label for="txtDob">Date of Birth</label>
              <input type="text" class="form-control" id="txtDob" placeholder="">
            </div>

            <div class="form-group">
              <label for="txtNic">NIC</label>
              <input type="text" class="form-control" id="txtNic" placeholder="">
            </div>

          </div>
        </div>

        <div class="col-md-6">
          <div class="jumbotron">

            <p class="lead">Change Password</p>
            <hr class="my-4">

            <div class="form-group">
              <label for="exampleFormControlInput1">Old Password</label>
              <input type="password" class="form-control" id="txtOldPass" placeholder=" ">
            </div>

            <div class="form-group">
              <label for="exampleFormControlInput1">New Password</label>
              <input type="password" class="form-control" id="txtNewPass" placeholder=" ">
            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">Confirm New Password</label>
              <input type="password" class="form-control" id="textNewPassConfirm" placeholder="">
            </div>

          </div>
        </div>
      </div>
      <button class="btn btn-success btn-block mb-4">Save Changes</button>

    </div>

  </div>

  <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="../js/common.js"></script>

  <script>
    let docData = {};
    $(document).ready(() => {
      setUser();
      docData["id"] = getQueryVariable("id");
      getDetails(docData["id"]);
    });

    const getDetails = (instructor_id) => {
      request(`/instructor/${instructor_id}`, "GET").then((res) => {
        console.log(res.res_data);
        fillData(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const fillData = (data) => {
      $("#txtFName").val(data.fname);
      $("#txtLName").val(data.lname);
      $("#txtEmail").val(data.email);
      $("#txtDob").val(data.dob);
      $("#txtNic").val(data.nic);
    }
  </script>
</body>

</html>