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
  <title>Instructor Dashboard</title>
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
  <div class="header d-lg-flex p-0 collapse show" id="headerMenuCollapse">
    <div class="container">
      <div class="row align-items-center d-md-none">

        <div class="col-lg order-lg-first">
          <ul class="nav nav-tabs border-0 flex-column flex-lg-row">

            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#courseModal"><i class="fe fe-check-square"></i>Create a new course</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#testModal"><i class="fe fe-check-square"></i> Create a new Test</a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#assignmentModal"><i class="fe fe-check-square"></i>Create a new Assignment</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="container">

    <br>
    <h4> Your Courses </h4>
    <div class="row" id="courses">
      <div class="col-sm">
        <div class="card" style="width: 100%;">
          <img class="card-img-top" src="../assets/images/coursecap.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Computer Systems</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">View</a>
            <a href="#" class="btn btn-primary">Edit</a>
            <a href="#" class="btn btn-danger">Remove</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for tests -->
    <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="testModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Create a new Test</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <label for="cmbCourseTest">Course:</label>
            <select class="form-control" id="cmbCourseTest">

            </select>
            <br>
            <label for="txtTestName">Test Name:</label>
            <input type="text" id="txtTestName" class="form-control" placeholder="Test Name">
            <br>
            <label for="txtTestDesc">Test Description:</label>
            <textarea type="text" id="txtTestDesc" class="form-control" placeholder="Test Description"></textarea>
            <br>
            <label for="txtTestDeadline">Test Deadline:</label>
            <input type="date" id="txtTestDeadline" class="form-control" placeholder="Test Description" />
            <br>
            <label for="txtTestDuration">Test Duration (in Minutes):</label>
            <input type="number" id="txtTestDuration" class="form-control" placeholder="Test Duration"><br>
            <label for="txtAnsPerQuestion">Answers per Question:</label>
            <input type="number" id="txtAnsPerQuestion" class="form-control" placeholder="Number of Answers to a Question"><br>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button id="btnAddTest" type="button" class="btn btn-primary" onclick="addTest()">Next</button>
          </div>
        </div>
      </div>
    </div>

    <!-- modal for create a course-->
    <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="courseModal">Create a new Course</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="txtCourseName">Course Name:</label>
            <input type="text" id="txtCourseName" class="form-control" placeholder="Course Name">
            <br>
            <label for="txtCourseDesc">Course Description:</label>
            <textarea type="text" id="txtCourseDesc" class="form-control" placeholder="Course Description"></textarea>
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addCourse()">Create</button>
          </div>
        </div>
      </div>
    </div>


    <!-- modal for assignments -->
    <div class="modal fade" id="assignmentModal" tabindex="-1" role="dialog" aria-labelledby="assignmentModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="courseModal">Create a new Assignment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label for="cmbCourseAssignment">Course:</label>
            <select class="form-control" id="cmbCourseAssignment">

            </select>
            <br>
            <label for="txtAssignmentName">Assignment Name:</label>
            <input type="text" id="txtAssignmentName" class="form-control" placeholder="Assignment Name">
            <br>
            <label for="txtAssignmentDesc">Assignment Description:</label>
            <textarea type="text" id="txtAssignmentDesc" class="form-control" placeholder="Assignment Description"></textarea>
            <br>
            <label for="txtAssignmentDeadline">Assignment Deadline:</label>
            <input type="date" id="txtAssignmentDeadline" class="form-control" placeholder="Assignment Description" />
            <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="addAssignment()">Add Asignment</button>
          </div>
        </div>
      </div>
    </div>
    <hr>

  </div>
  </div>
  </div>

  <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="../js/common.js"></script>

  <script>
    $(document).ready(() => {
      setUser();
      getCourses();
    });

    const getCourses = () => {
      $("#courses").hide();
      request(`/instructor/${user.id}/course`, "GET").then((res) => {
        appendToCourses(res.res_data);
        fillcmbCourseTest(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const addTest = () => {
      let testName = $("#txtTestName").val();
      let testDuration = $("#txtTestDuration").val();
      let ansPerQuestion = $("#txtAnsPerQuestion").val();
      let courseId = $("#cmbCourseTest").find('option:selected').val();
      let testDesc = $("#txtTestDesc").val();
      let testDeadline = $("#txtTestDeadline").val();
      window.location = `createTest.php?testName=${testName}&testDuration=${testDuration}&ansPerQuestion=${ansPerQuestion}&courseId=${courseId}&testDesc=${testDesc}&deadline=${testDeadline}`;
    };

    const appendToCourses = (courses) => {
      $("#courses").empty();
      courses.forEach((course, index) => {
        $("#courses").append(`
        <div class="col-sm-6">
            <div class="card" style="width: 100%;">
              <img class="card-img-top" src="../assets/images/coursecap.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">${course.course_name}</h5>
                <p class="card-text">${course.description}</p>
                <a href="viewCourse.php?id=${course.id}" class="btn btn-primary">View</a>
                <a href="editCourse.php?id=${course.id}" class="btn btn-primary">Edit</a>
                <a href="#" onclick="removeCourse('${course.id}')" class="btn btn-danger">Remove</a>
              </div>
            </div>
          </div>`);
      })
      $("#courses").fadeIn();
    }

    const fillcmbCourseTest = (courses) => {
      $("#cmbCourseTest, #cmbCourseAssignment").empty();
      courses.forEach(course => {
        $("#cmbCourseTest, #cmbCourseAssignment").append(`
          <option value="${course.id}">${course.course_name}</option>
      `);
      });
    }

    const addCourse = () => {
      let courseName = $("#txtCourseName").val();
      let courseDesc = $("#txtCourseDesc").val();

      let data = {
        course_name: courseName,
        description: courseDesc,
        instructor_id: user.id
      }

      request(`/course`, "POST", data).then((res) => {
        getCourses();
        $("#courseModal").modal("hide");
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const removeCourse = (course_id) => {
      request(`/course/${course_id}`, "DELETE").then((res) => {
        getCourses();
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const addAssignment = () => {
      let testName = $("#txtAssignmentName").val();
      let courseId = $("#cmbCourseAssignment").find('option:selected').val();
      let testDesc = $("#txtAssignmentDesc").val();
      let testDeadline = $("#txtAssignmentDeadline").val();
      let testtypeId = 2;

      let data = {
        "test_name": testName,
        "course_id": courseId,
        "description": testDesc,
        "deadline": testDeadline,
        "testtype_id": testtypeId
      };

      request("/assignment", "POST", data).then((res) => {
        alert("Your Assignment has been added!");
      }).catch(res => {
        alert(getResponseMsg(res.error_code));
      });
    };
  </script>
</body>

</html>