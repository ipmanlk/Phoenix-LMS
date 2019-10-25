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
  <title>Student Dashboard</title>
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
  <div class="header d-lg-flex p-0 collapse show  d-md-none" id="headerMenuCollapse">
    <div class="container">
      <div class="row align-items-center">

        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#courseEnrollModal"><i class="fe fe-check-square"></i> Enroll to a Course</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <br>
        <h4> Enrolled Courses </h4>

        <div class="row" id="courses">

        </div>

      </div>
      <div class="col-md-4">
        <br>
        <h4> Assisgnments and Tests </h4>
        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Assignments</h2>
          </div>
          <table class="table card-table">
            <tbody id="assignmentList">


            </tbody>
          </table>
        </div>

        <div class="card">
          <div class="card-header">
            <h2 class="card-title">Tests</h2>
          </div>
          <table class="table card-table">
            <tbody id="testList">

            </tbody>
          </table>
        </div>

      </div>
    </div>



    <!-- Modal for submit assignments -->
    <div class="modal fade" id="assignmentModal" tabindex="-1" role="dialog" aria-labelledby="assignmentModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="assignmentModal">Submit an Assignment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <p><b>Assignment Name:</b> <span id="modalAssignmentName"></span></p>
            <p><b>Assignment Deadline:</b> <span id="modalAssignmentDeadline"></span></p>
            <span><b>Assignment Description: </b></span>
            <p id="modalAssignmentDescription"> </p>

            <input type="file" name="modalAssignmentFile" id="modalAssignmentFile" class="btn btn-primary">

            <div class="progress mt-3" style="display:none;">
              <div id="modalAssignmentProgressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div id="modalAssignmentProgressStatus" style="display:none" class="text-center"></div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submitAssignment()">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <!-- modal for enroll to a course-->
    <div class="modal fade" id="courseEnrollModal" tabindex="-1" role="dialog" aria-labelledby="courseEnrollModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="courseModal">Enroll to a Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="text" id="txtInviteCode" class="form-control" placeholder="Course Code">
            <br>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="enrollCourse()">Enroll</button>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <h4> Your Progress </h4>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Tests</h4> <a class="btn btn-sm btn-outline-primary margin5px txtw "> Generate Report </a>
            </div>
            <table class="table card-table">
              <tbody>
                <tr>

                  <td>Python Test</td>
                  <td class="text-right"><span class="text-muted">23%</span></td>
                </tr>
                <tr>

                  <td>C Test</td>
                  <td class="text-right"><span class="text-muted">50%</span></td>
                </tr>

              </tbody>
            </table>


          </div>
        </div>
        <div class="col-sm">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Assignments </h4> <a class="btn btn-sm btn-outline-primary margin5px txtw"> Generate Report </a>
            </div>
            <table class="table card-table">
              <tbody>
                <tr>

                  <td>Python Test</td>
                  <td class="text-right"><span class="text-muted">23%</span></td>
                </tr>
                <tr>

                  <td>C Test</td>
                  <td class="text-right"><span class="text-muted">50%</span></td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- api logic -->
  <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="../js/common.js"></script>

  <script>
    // store data relevent to this page (for handling requests)
    let docData = {};

    $(document).ready(() => {
      setUser();
      getCourses();
      getAssignments();
      getTests();
    });

    const getCourses = () => {
      $("#courses").hide();
      $("#courses").empty();
      request(`/student/${user.id}/course`, "GET").then((res) => {
        appendToCourses(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const getAssignments = () => {
      $("#assignmentList").hide();
      $("#assignmentList").empty();
      request(`/student/${user.id}/assignment`, "GET").then((res) => {
        appendToAssignmentList(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const getTests = () => {
      $("#testList").hide();
      $("#testList").empty();
      request(`/student/${user.id}/test`, "GET").then((res) => {
        appendToTestList(res.res_data)
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const appendToTestList = (tests) => {
      tests.forEach(test => {
        let status, badge, button;
        if (test.is_submitted) {
          status = "Submitted";
          badge = "success";
          button = "display:none;";
        } else {
          status = "Pending";
          badge = "warning";
          button = "";
        }
        $("#testList").append(`
        <tr>
            <td>${test.test_name}</td>
            <td class="text-right">
            <span class="badge badge-${badge}">${status}</span> <a style="${button}" onclick="showTestSubmitPage('${test.id}')" class="btn btn-sm btn-outline-primary margin5px txtw"> Attempt </a>
            </td>
        </tr>
        `);
      });
      $("#testList").fadeIn();
    }

    const appendToAssignmentList = (assignments) => {
      docData["assignment"] = {};
      assignments.forEach(assignment => {
        let status, badge, button;
        if (assignment.is_submitted) {
          status = "Submitted";
          badge = "success";
          button = "display:none;";
        } else {
          status = "Pending";
          badge = "warning";
          button = "";
        }
        $("#assignmentList").append(`
        <tr>
            <td>${assignment.test_name}</td>
            <td class="text-right">
            <span class="badge badge-${badge}">${status}</span> <a style="${button}" onclick="showAssignmentSubmitModal(${assignment.id})" class="btn btn-sm btn-outline-primary margin5px txtw"> Submit </a>
            </td>
        </tr>
        `);

        // add to document data for later use
        docData["assignment"][assignment.id] = {
          id: assignment.id,
          test_name: assignment.test_name,
          description: assignment.description,
          deadline: assignment.deadline
        };
      });

      $("#assignmentList").fadeIn();
    }

    const appendToCourses = (courses) => {
      courses.forEach((course, index) => {
        $("#courses").append(`
        <div class="col-sm-6">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="../assets/images/coursecap.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${course.course_name}</h5>
                <p class="card-text">${course.description}</p>
                <a href="#" class="btn btn-primary" onclick="viewCourse('${course.id}')">View Course</a>
                <a href="#" class="btn btn-danger" onclick="unenrollCourse('${course.id}')">Unenroll</a>
              </div>
            </div>
          </div>`);
      })
      $("#courses").fadeIn();
    }

    const showAssignmentSubmitModal = (id) => {
      $("#modalAssignmentName").text(docData.assignment[id].test_name);
      $("#modalAssignmentDeadline").text(docData.assignment[id].deadline);
      $("#modalAssignmentDescription").text(docData.assignment[id].description);
      docData.selectedAssignmentId = id;
      $("#assignmentModal").modal('show');
    }

    const enrollCourse = () => {
      let data = {
        "student_id": user.id,
        "invite_code": $("#txtInviteCode").val()
      }

      request(`/student/course`, "POST", data).then((res) => {
        getCourses();
        getAssignments();
        getTests();
        alert("You have been enrolled!");
        $("#courseEnrollModal").modal('hide');
      }).catch(res => {
        alert("Invalid invite!");
      });
    }

    const unenrollCourse = (courseId) => {
      request(`/student/${user.id}/course/${courseId}`, "DELETE").then((res) => {
        getCourses();
        getAssignments();
        getTests();
        alert("You have been unenrolled!");
        $("#courseEnrollModal").modal('hide');
      }).catch(res => {
        alert("Unable to unenroll from that course!");
      });

    }

    const submitAssignment = () => {
      // make a form data object
      const fd = new FormData();
      fd.append('student_id', user.id);
      fd.append('test_id', docData.selectedAssignmentId);
      fd.append('file',
        document.querySelector('#modalAssignmentFile').files[0]);

      uploadRequest("/student/assignment", fd, "#modalAssignmentProgressBar", "#modalAssignmentProgressStatus").then(res => {
        $("#assignmentModal").modal("hide");
        getAssignments();
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      })
    }

    const showTestSubmitPage = (testId) => {
      window.location = `quizViewer.php?testId=${testId}`;
    }

    const viewCourse = (course_id) => {
      window.location = `viewCourse.php?id=${course_id}`;
    }
  </script>

</body>

</html>