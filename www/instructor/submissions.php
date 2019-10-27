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
    <title>Submissions</title>
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
        <div class="card">
            <div class="card-body p-3 text-center">
                <div class="text-right text-green">
                    6%
                    <i class="fe fe-chevron-up"></i>
                </div>
                <div class="h1 m-0" id="lblSubmissionCount">43</div>
                <div class="text-muted mb-4">Number of Submission</div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Test: <span id="lblTestName"></span></h3>
            </div>
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap">
                    <thead>
                        <tr>
                            <th class="w-1">Student ID</th>
                            <th>NIC</th>
                            <th>Name</th>
                            <th>Date Time</th>
                            <th><span id="lblMarks">Marks</span></th>
                            <th><span id="lblStatus">Status</span></th>
                            <th id="btnEvaluate"></th>
                        </tr>
                    </thead>
                    <tbody id="submissionList">

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="evaluateModal" tabindex="-1" role="dialog" aria-labelledby="evaluateModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Submission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <a id="assignmentDownLink" href="#">
                        <p> Download </p>
                    </a>
                    <input type="text" name="" id="txtAssignmentMarks" placeholder="Marks" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="evaluateTest()"> Evaluate</button>
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
            docData["testId"] = getQueryVariable("test_id");
            docData["testtypeId"] = getQueryVariable("testtype_id");
            docData["testName"] = getQueryVariable("test_name");
            getSubmissions(docData["testId"], docData["testtypeId"]);
        });

        const getSubmissions = (testId, testtypeId) => {
            if (testtypeId == 1) {
                path = `/test/${testId}/result`;
            } else {
                path = `/assignment/${testId}/result`;
            }

            request(path, "GET").then((res) => {
                fillData(res.res_data.info);
                appendToSubmissionList(res.res_data.submissions, testtypeId);
            }).catch(res => {
                console.log(getResponseMsg(res.error_code));
            });
        }

        const appendToSubmissionList = (submissions, testtypeId) => {
            $("#submissionList").empty();

            submissions.forEach(student => {
                let marksCol, timeCol, statusCol, btnCol;
                if (testtypeId == 1) {
                    marksCol = `<td>${student.result.marks}</td>`;
                    timeCol = `<td>${student.result.end_time}</td>`;
                    statusCol = `<td>checked</td>`;
                    btnCol = `<td></td>`;
                } else {
                    btnCol = `<td class="text-right">
                     <a class="btn btn-secondary btn-sm" onclick="showEvaluateModal('${student.id}', '${student.assignment.path}')">Evaluate</a>
                    </td>`;
                    marksCol = `<td>${student.assignment.marks}</td>`;
                    timeCol = `<td>${student.assignment.submit_date}</td>`
                    if (student.assignment.marks == 0) {
                        statusCol = `<td>Pending</td>`;
                    } else {
                        statusCol = `<td>Checked</td>`;
                    }
                }
                $("#submissionList").append(`
                <tr>
                     <td>
                        ${student.id}
                     </td>
                     <td>
                         ${student.nic}
                     </td>
                     <td>
                         ${student.fname} ${student.lname}
                    </td>
                    ${timeCol}
                    ${marksCol}
                    ${statusCol}
                    ${btnCol}   
                </tr>
                `);
            });
        }

        const fillData = (info) => {
            $("#lblTestName").text(docData["testName"]);
            $("#lblSubmissionCount").text(info.count);
        }

        const showEvaluateModal = (studentId, filePath) => {
            $("#evaluateModal").modal("show");
            $("#assignmentDownLink").attr("href", `../uploads/${filePath}`);
            docData["selectedStudentId"] = studentId;
        }

        const evaluateTest = () => {
            let studentId = docData["selectedStudentId"];
            let testId = docData["testId"];
            let marks = $("#txtAssignmentMarks").val();
            let data = {
                "test_id": testId,
                "student_id": studentId,
                "marks": marks
            }
            request(`/assignment/result`, "PUT", data).then((res) => {
                alert("Test updated!");
                getSubmissions(docData["testId"], docData["testtypeId"]);
                $("#evaluateModal").modal("hide");
            }).catch(res => {
                console.log(getResponseMsg(res.error_code));
            });
        }
    </script>

</body>

</html>