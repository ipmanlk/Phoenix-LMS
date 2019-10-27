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
      max-height: 500px !important;
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
                <small class="text-muted d-block mt-1">Instructor</small>
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
          <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#courseModal">
            New Course
          </a>
        </div>
        <div class="nav-item d-none d-md-flex">
          <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#testModal">
            Add Test
          </a>
        </div>
        <div class="nav-item d-none d-md-flex">
          <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#assignmentModal">
            Add Assignment
          </a>
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
        <div class="col-md-12 mt-2">

          <h4>Student Submissions</h4>
          <div class="card scroll_short mt-2">
            <div class="card-header">
              <h4 class="card-title">Assignments</h4>
            </div>
            <table class="table card-table">
              <tbody id="assignmentList">
                <tr>
                  <td>OOP Concepts</td>
                  <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>
                <td>UI/UX Designing</td>
                <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>
                <td>UI/UX Designing</td>
                <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>
                <td>UI/UX Designing</td>
                <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>

              </tbody>
            </table>
          </div>

          <div class="card scroll_short">
            <div class="card-header">
              <h4 class="card-title">Tests</h4>
            </div>
            <table class="table card-table">
              <tbody id="testList">
                <tr>

                  <td>Quiz 1</td>
                  <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>
                <td>UI/UX Designing</td>
                <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>
                <td>UI/UX Designing</td>
                <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>
                <td>UI/UX Designing</td>
                <td class="text-right txtwhite"><a class="btn btn-primary">View Result </a></td>
                </tr>

              </tbody>
            </table>
          </div>
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
      docData["course_id"] = getQueryVariable("id");
      getAssignments(docData["course_id"]);
      getTests(docData["course_id"]);
    });

    const getAssignments = (course_id) => {
      request(`/course/${course_id}/assignment`, "GET").then((res) => {
        appendToAssignmentList(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const appendToAssignmentList = (assignments) => {
      docData["assignment"] = {};
      $("#assignmentList").empty();
      assignments.forEach(assignment => {
        docData["assignment"][assignment.id] = assignment;
        $("#assignmentList").append(
          ` <tr>
            <td>${assignment.test_name}</td>
            <td class="text-right txtwhite">
              <a onclick="showSubmissions('${assignment.id}', '2')" class="btn btn-primary txtwhite">View Submissions</a>
            </td>
          </tr>`
        );
      });
    }

    const getTests = (course_id) => {
      request(`/course/${course_id}/test`, "GET").then((res) => {
        appendToTestList(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const appendToTestList = (tests) => {
      docData["test"] = {};
      $("#testList").empty();
      tests.forEach(test => {
        docData["test"][test.id] = test;
        $("#testList").append(
          ` <tr>
            <td>${test.test_name}</td>
            <td class="text-right txtwhite">
              <a onclick="showSubmissions('${test.id}', '1')" class="btn btn-primary txtwhite">View Results</a>
            </td>
          </tr>`
        );
      });
    }

    const showSubmissions = (testId, testtypeId) => {
      let testName;
      if (testtypeId == 1) {
        testName = docData.test[testId].test_name;
      } else {
        testName = docData.assignment[testId].test_name;
      }
      window.location = `submissions.php?test_id=${testId}&testtype_id=${testtypeId}&test_name=${testName}`;
    }
  </script>

</body>

</html>