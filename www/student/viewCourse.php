<?php
require_once "../tasks/authChecker.php";
?>
<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    .scroll_long {
      max-height: 500px !important;
      overflow: auto !important;
      display: inline-block !important;
    }

    .scroll_short {
      max-height: 200px !important;
      overflow: auto !important;
      display: inline-block !important;
    }
  </style>
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
  <title>View Course</title>
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
              <span class="avatar" style="background-image: url(../assets/images/profile.png)"></span>
              <span class="ml-2 d-none d-lg-block">
                <span class="text-default"><?php echo $_SESSION["user_email"] ?></span>
                <small class="text-muted d-block mt-1">Student</small>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a class="dropdown-item" href="./profile.php">
                <i class="dropdown-icon fe fe-user"></i> Profile
              </a>
              <a class="dropdown-item" href="../tasks/logout.php">
                <i class="dropdown-icon fe fe-log-out"></i> Sign out
              </a>
            </div>


          </div>


        </div>

        <div class="nav-item d-none d-md-flex">
          <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#courseEnrollModal">Enroll to a Course</a>
        </div>
        <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0  d-md-none" data-toggle="collapse" data-target="#headerMenuCollapse">
          <span class="header-toggler-icon"></span>
        </a>
      </div>
    </div>
  </div>

  <div class="container">
    <br>
    <h4> View Course </h4>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h4> Software Engneering </h4>

          <br>

          <div class="card scroll_long">
            <div class="card-header">
              <h4 class="card-title">Course Materials</h4>
            </div>
            <table class="table card-table">
              <tbody id="resourceList">

              </tbody>
            </table>
          </div>
        </div>
        <div class="col-sm">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-red mr-3">
                <i class="fe fe-users"></i>
              </span>
              <div>
                <h4 class="m-0"><a href="javascript:void(0)">1,352 <small>Members</small></a></h4>
                <small class="text-muted">163 registered today</small>
              </div>
            </div>
          </div>

          <h4> Submission </h4>
          <div class="card scroll_short">
            <div class="card-header">
              <h4 class="card-title">Assignments</h4>
            </div>
            <table class="table card-table">
              <tbody id="assignmentList">

              </tbody>
            </table>
          </div>

          <div class="card scroll_short">
            <div class="card-header">
              <h4 class="card-title">Tests</h4>
            </div>
            <table class="table card-table">
              <tbody id="testList">

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="assignmentModal">Results</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <h3>Your Marks: <span id="lblModalResult"></span></h3>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="../js/common.js"></script>

  <script>
    let docData = {};
    $(document).ready(() => {
      setUser();
      docData["courseId"] = getQueryVariable("id");
      getCourseResult(docData["courseId"]);
      getResources(docData["courseId"]);
    });

    const getCourseResult = (courseId) => {
      request(`/student/${user.id}/course/${courseId}/result`, "GET").then((res) => {
        appendToAssignmentList(res.res_data.assignment);
        appendToTestList(res.res_data.test);
      }).catch(res => {
        console.log(res);
      });
    }

    const appendToTestList = (tests) => {
      $("#testList").empty();
      tests.forEach(data => {
        $("#testList").append(`
        <tr>
          <td>${data.test.test_name}</td>
          <td class="text-right txtwhite"><a class="btn btn-primary" onclick="viewResult('${data.marks}')">View Result </a></td>
        </tr>
        `);
      });
    }

    const appendToAssignmentList = (assignments) => {
      $("#assignmentList").empty();
      assignments.forEach(data => {
        $("#assignmentList").append(`
        <tr>
          <td>${data.test.test_name}</td>
          <td class="text-right txtwhite"><a class="btn btn-primary" onclick="viewResult('${data.marks}')">View Result </a></td>
        </tr>
        `);
      });
    }

    const viewResult = (marks) => {
      $("#lblModalResult").text(marks);
      $("#resultModal").modal("show");
    }

    const getResources = (courseId) => {
      request(`/course/${courseId}/resource`, "GET").then((res) => {
        appendToResourceList(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const appendToResourceList = (resources) => {
      resources.forEach(resource => {
        $("#resourceList").append(`
        <tr>
            <td>${resource.resource_name}</td>
            <td class="text-right">
              <a href="../uploads/${resource.path}" class="btn btn-success txtwhite">View </a>
            </td>
        </tr>
        `);
      });
    }
  </script>
</body>

</html>