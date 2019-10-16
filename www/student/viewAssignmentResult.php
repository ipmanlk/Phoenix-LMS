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
  <title>View Assignment Results</title>
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
        <a class="header-brand" href="./index.html">
          Phoenix
        </a>
        <div class="d-flex order-lg-2 ml-auto">

          <div class="dropdown d-none d-md-flex">
            <a class="nav-link icon" data-toggle="dropdown">
              <i class="fe fe-bell"></i>
              <span class="nav-unread"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a href="#" class="dropdown-item d-flex">
                <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/male/41.jpg)"></span>
                <div>
                  <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                  <div class="small text-muted">10 minutes ago</div>
                </div>
              </a>
              <a href="#" class="dropdown-item d-flex">
                <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/1.jpg)"></span>
                <div>
                  <strong>Alice</strong> started new task: Tabler UI design.
                  <div class="small text-muted">1 hour ago</div>
                </div>
              </a>
              <a href="#" class="dropdown-item d-flex">
                <span class="avatar mr-3 align-self-center" style="background-image: url(demo/faces/female/18.jpg)"></span>
                <div>
                  <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                  <div class="small text-muted">2 hours ago</div>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item text-center text-muted-dark">Mark all as read</a>
            </div>
          </div>
          <div class="dropdown">
            <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
              <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span>
              <span class="ml-2 d-none d-lg-block">
                <span class="text-default">Username</span>
                <small class="text-muted d-block mt-1">Instructer</small>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-user"></i> Profile
              </a>

             <!-- <a class="dropdown-item" href="#">
                <span class="float-right"><span class="badge badge-primary">6</span></span>
                <i class="dropdown-icon fe fe-mail"></i> Inbox
              </a>
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-send"></i> Message
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="dropdown-icon fe fe-help-circle"></i> Need help?
              </a> -->
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
    <h4> View Assignment Results </h4>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          Course Code: <input class="form-control" type="text" name="txtCourseID" id="txtCourseID" placeholder="Course Code" disabled value="5648465">
          <br>
          Course Name: <input class="form-control" type="text" name="txtCourseName" id="txtCourseName" placeholder="Course Name" value="Software Engineering" disabled>

          <br>
          Assignment Name: <input class="form-control" type="text" name="txtAssignmentNamr" id="txtAssignmentNamr" placeholder="Course Name" value="UI Designing" disabled>



          <br>







        </div>
        <div class="col-sm">
          <div class="card p-3">
            <div class="d-flex align-items-center">
              <span class="stamp stamp-md bg-red mr-3">
                <i class="fe fe-users"></i>
              </span>
              <div>
                <h4 class="m-0"><a href="javascript:void(0)">1,352 <small>Submissions</small></a></h4>

              </div>
            </div>
          </div>


        </div>

      </div>

      <div class="card">
        <div class="card-header">
          <h2 class="card-title">Submissions</h2>
        </div>
        <table class="table card-table">
          <tbody>
            <tr>
              <td>Student 1</td>
              <td class="text-right">
                <span class="badge badge-success">Submitted</span>
              </td>
              <td class="text-right txtwhite">
                <button class="btn btn-primary txtwhite"> View </button>
              </td>
            </tr>

            <tr>
              <td>Student 2</td>
              <td class="text-right">
                <span class="badge badge-danger">Pending</span>
              </td>
              <td class="text-right txtwhite">
                <button class="btn btn-primary txtwhite" disabled> View </button>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

    <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
    <script src="../js/common.js"></script>

    <script>
      let docData = {};
      $(document).ready(() => {
        setUser();
        docData["testId"] = getQueryVariable("testId");
        getTest(docData["testId"]);
        $(".defaultOpen").click();
      });
    </script>
</body>

</html>