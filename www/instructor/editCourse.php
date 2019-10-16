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
  <title>Edit Course</title>
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

          <!--    <a class="dropdown-item" href="#">
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
    <div class="row">
      <div class="col-md-6 mt-5">
        <h4>Course Details</h4>
        <label for="txtCourseInvite">Course Invite Code:</label>
        <input type="text" id="txtCourseInvite" class="form-control" readonly>
        <br>
        <label for="txtCourseName">Course Name:</label>
        <input type="text" id="txtCourseName" class="form-control" placeholder="Course Name">
        <br>
        <label for="txtCourseDesc">Course Description:</label>
        <textarea type="text" id="txtCourseDesc" class="form-control" placeholder="Course Description"></textarea>
      </div>
      <div class="col-md-6 mt-5">
        <h4>Course Status</h4>
        <label>Member Info:</label>
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-red mr-3">
              <i class="fe fe-users"></i>
            </span>
            <div>
              <h4 class="m-0"><a><a id="lblMemberCount"></a><small> Enrolled Students</small></a></h4>
              <small class="text-muted">(All Time)</small>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#resourceModal">Add Course Material</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Course Materials</h4>
          </div>
          <table class="table card-table">
            <tbody id="resourceList">

            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-md-12">
        <div class="card">
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

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Assignments</h4>
          </div>
          <table class="table card-table">
            <tbody id="assignmentList">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="resourceModal" tabindex="-1" role="dialog" aria-labelledby="resourceModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="resourceModal">Add Course Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">

          <label for="txtResourceName">Material Name:</label>
          <input type="text" id="txtResourceName" class="form-control" placeholder="Material Name">
          <br>

          <input type="file" name="modalResourceFile" id="modalResourceFile" class="btn btn-primary">

          <div class="progress mt-3" style="display:none;">
            <div id="modalResourceProgressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div id="modalResourceProgressStatus" style="display:none" class="text-center"></div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary" onclick="addResource()">Add Material</button>
        </div>
      </div>
    </div>
  </div>


  <!-- edit test -->
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
          <br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="updateTest()">Update</button>
        </div>
      </div>
    </div>
  </div>

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
          <button type="button" class="btn btn-primary" onclick="updateAssignment()">Update Asignment</button>
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
      getCourse(docData["course_id"]);
      getResources(docData["course_id"]);
      getAssignments(docData["course_id"]);
      getTests(docData["course_id"]);
      getCourses();
    });

    const getCourse = (course_id) => {
      request(`/course/${course_id}`, "GET").then((res) => {
        fillCourseDetails(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const getResources = (course_id) => {
      request(`/course/${course_id}/resource`, "GET").then((res) => {
        appendToResourceTable(res.res_data);
      }).catch(res => {
        $("#resourceList").empty();
        console.log(getResponseMsg(res.error_code));
      });
    }

    const appendToResourceTable = (resources) => {
      $("#resourceList").empty();
      docData["resource"] = {};
      resources.forEach((resource) => {
        docData["resource"][resource.id] = resource;
        $("#resourceList").append(`
          <tr>
            <td>${resource.resource_name}</td>
            <td class="text-right txtwhite">
              <a href="../uploads/${resource.path}" class="btn btn-success txtwhite">View </a>
              <a onclick="removeResource('${resource.id}')" class="btn btn-danger txtwhite" style="margin-left: 5px;">Delete </a>
            </td>
          </tr>
        `);
      })
    }

    const fillCourseDetails = (course) => {
      $("#txtCourseInvite").val(course.invite_code);
      $("#txtCourseName").val(course.course_name);
      $("#txtCourseDesc").val(course.description);
      $("#lblMemberCount").text(course.member_count);
    }

    const addResource = () => {
      // make a form data object
      const fd = new FormData();
      fd.append('instructor_id', user.id);
      fd.append('course_id', docData.course_id);
      fd.append('resource_name', $("#txtResourceName").val());
      fd.append('file',
        document.querySelector('#modalResourceFile').files[0]);

      uploadRequest("/course/resource", fd, "#modalResourceProgressBar", "#modalResourceProgressStatus").then(res => {
        $("#resourceModal").modal("hide");
        getResources(docData["course_id"]);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      })
    }

    const removeResource = (resourceId) => {
      request(`/course/resource/${resourceId}`, "DELETE").then((res) => {
        getResources(docData["course_id"]);
      }).catch(res => {
        alert("Unable to delete that resource");
      });
    }

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
              <a onclick="showEditAssignmentModal('${assignment.id}')" class="btn btn-success txtwhite">Edit</a>
              <a onclick="removeTest('${assignment.id}')" class="btn btn-danger txtwhite" style="margin-left: 5px;">Delete </a>
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
              <a onclick="showEditTestModal('${test.id}')" class="btn btn-success txtwhite">Edit</a>
              <a onclick="removeTest('${test.id}')" class="btn btn-danger txtwhite" style="margin-left: 5px;">Delete </a>
            </td>
          </tr>`
        );
      });
    }

    const removeTest = (testId) => {
      request(`/test/${testId}`, "DELETE").then((res) => {
        getTests(docData["course_id"]);
        getAssignments(docData["course_id"]);
      }).catch(res => {
        alert("Unable to delete that test");
      });
    }

    const getCourses = () => {
      $("#courses").hide();
      request(`/instructor/${user.id}/course`, "GET").then((res) => {
        fillcmbCourseTest(res.res_data);
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const fillcmbCourseTest = (courses) => {
      $("#cmbCourseTest, #cmbCourseAssignment").empty();
      courses.forEach(course => {
        $("#cmbCourseTest, #cmbCourseAssignment").append(`
          <option value="${course.id}">${course.course_name}</option>
      `);
      });
    }

    const showEditTestModal = (id) => {
      docData["selectedId"] = id;
      let test = docData["test"][id];
      $(`option`).removeAttr("selected");
      $("#txtTestName").val(test.test_name);
      $("#txtTestDesc").val(test.description);
      $("#txtTestDeadline").val(test.deadline);
      $("#txtTestDuration").val(test.duration);
      $(`option[value=${test.course_id}]`).attr("selected", "selected");
      $("#testModal").modal("show");
    }

    const updateTest = () => {
      let testId = docData["selectedId"];
      let testName = $("#txtTestName").val();
      let testDuration = $("#txtTestDuration").val();
      let courseId = $("#cmbCourseTest").find('option:selected').val();
      let testDesc = $("#txtTestDesc").val();
      let testDeadline = $("#txtTestDeadline").val();

      let data = {
        id: testId,
        test_name: testName,
        duration: testDuration,
        course_id: courseId,
        description: testDesc,
        deadline: testDeadline
      }

      request(`/course/test`, "PUT", data).then((res) => {
        alert("Test updated!");
        getTests(docData["course_id"]);
        $("#testModal").modal("hide");
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }

    const showEditAssignmentModal = (id) => {
      docData["selectedId"] = id;
      let assignment = docData["assignment"][id];
      $(`option`).removeAttr("selected");
      $("#txtAssignmentName").val(assignment.test_name);
      $("#txtAssignmentDesc").val(assignment.description);
      $("#txtAssignmentDeadline").val(assignment.deadline);
      $(`option[value=${assignment.course_id}]`).attr("selected", "selected");
      $("#assignmentModal").modal("show");
    }

    const updateAssignment = () => {
      let testId = docData["selectedId"];
      let testName = $("#txtAssignmentName").val();
      let courseId = $("#cmbCourseAssignment").find('option:selected').val();
      let testDesc = $("#txtAssignmentDesc").val();
      let testDeadline = $("#txtAssignmentDeadline").val();

      let data = {
        id: testId,
        test_name: testName,
        course_id: courseId,
        description: testDesc,
        deadline: testDeadline,
        duration: 1,
      }

      request(`/course/assignment`, "PUT", data).then((res) => {
        alert("Assignment updated!");
        getAssignments(docData["course_id"]);
        $("#assignmentModal").modal("hide");
      }).catch(res => {
        console.log(getResponseMsg(res.error_code));
      });
    }
  </script>
</body>

</html>