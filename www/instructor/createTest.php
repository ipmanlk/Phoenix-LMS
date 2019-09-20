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
  <title>Create Test</title>
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
  <div class="container">
    <br>
    <center>
      <h3> Add Questions
    </center>
    <br>
    <div class="container">

      <div id="questions">

      </div>
      <button class="btn btn-primary text-center btn-block" onclick="addQuestion()">Add Question</button>

      <button id="btnSaveTest" class="btn btn-success btn-block text-center mb-4" onclick="saveTest()">Save Test</button>

      <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
      <script src="../js/common.js"></script>

      <script>
        let docData = {};

        $(document).ready(() => {
          setUser();
          docData["testName"] = getQueryVariable("testName");
          docData["testDuration"] = getQueryVariable("testDuration");
          docData["ansPerQuestion"] = getQueryVariable("ansPerQuestion");
          docData["courseId"] = getQueryVariable("courseId");
          docData["testDesc"] = getQueryVariable("testDesc");
          docData["testDeadline"] = getQueryVariable("deadline");

          addQuestion();
        });

        let qNumber = 1;
        const addQuestion = () => {

          let answers = "";
          for (let i = 1; i <= docData.ansPerQuestion; i++) {
            answers += `
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <input name="q${qNumber}_ans" class="check" type="radio">
                </div>
              </div>
              <input type="text" class="form-control ans" placeholder="Answer">
            </div>`;
          }

          $("#questions").append(`
          <div class="card questionCard">
          <div class="card-header">
            Question ${qNumber}
          </div>
          <div class="card-body">
            <input type="text" class="form-control mb-2 ques" placeholder="Enter Question">
            ${answers}
          </div>
          <div class="card-footer">
            <button class="btn btn-danger float-right btn-sm" onclick="removeQuestion(this)">Delete</button>
          </div>
        </div>
          `);

          qNumber++;
        }

        const removeQuestion = (element) => {
          $(element).parent().parent().remove();

        }

        const getQuestions = () => {
          let questions = {};
          let questionCards = $(".questionCard");
          for (q of questionCards) {
            let question = $(q).find(".ques").val();
            if (question == "") continue;
            let answerInputs = $(q).find(".ans");
            let answerChecks = $(q).find(".check");

            let answers = [];

            // incrementer for checkboxes
            let i = 0;

            // loop through answers
            for (a of answerInputs) {
              let answer = $(a).val();
              let isCorrect = $(answerChecks[i]).prop('checked');
              answers.push({
                "answer": answer,
                "correct": isCorrect
              });
              i++;
            }

            questions[question] = answers;
          }
          return questions;
        }

        const saveTest = () => {
          $("#btnSaveTest").prop("disabled", true);
          let questions = getQuestions();
          let data = {
            instructor_id: user.id,
            course_id: docData["courseId"],
            test_name: docData["testName"],
            duration: docData["testDuration"],
            description: docData["testDesc"],
            deadline: docData["testDeadline"],
            questions: questions,
            testtype_id: 1
          }

          request("/test", "POST", data).then((res) => {
            alert("Your Test has been added!");
            window.history.back();
          }).catch(res => {
            alert(getResponseMsg(res.error_code));
          });
        }
      </script>
</body>

</html>