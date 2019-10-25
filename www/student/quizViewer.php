<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/styles.css" type="text/css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>Quiz</title>
</head>

<body>

  <h5>Test: <span id="lblTestName"></span></h5>
  <h5>Description: <span id="lblTestDesc"></span></h5>
  <h5>Duration: <span id="lblTestDuration"></span></h5>
  <h5>Deadline: <span id="lblTestDeadline"></span></h5>

  <div class="tab" id="tabs">


  </div>

  <div id="tabcontent">

  </div>


  <div class="text-right">
    <button onclick="submitTest()" class="btn btn-primary mt-2 mb-4 btn-lg">Submit Test</button>
  </div>

  <script src="../assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="../js/common.js"></script>

  <script>
    let docData = {};
    $(document).ready(() => {
      setUser();
      docData["testId"] = getQueryVariable("testId");
      startTest(docData["testId"]);
      $(".defaultOpen").click();
    });

    // start test and record start time 
    // get questions relevent to this test at the same time
    const startTest = (testId) => {
      let data = {
        student_id: user.id,
        test_id: testId
      }

      // lord test
      getTest(docData["testId"]);

      // save start time
      request(`/student/test`, "POST", data).then((res) => {
        console.log(res);
      }).catch(res => {
        console.log(res);
      });

      if (getCookie("testId")) {
        if (getCookie("testId") !== docData["testId"]) {
          eraseCookie("answers");
          eraseCookie("testId");
        }
      }

      setCookie("testId", docData["testId"], 1);
    }

    // get test questions from backend
    const getTest = (testId) => {
      request(`/test/${testId}`, "GET").then((res) => {
        setPageData(res.res_data.test);
        appendQuestions(res.res_data.questions);
        checkSelectedAnswers();
      }).catch(res => {
        console.log(res);
      });
    };

    // set values for top labels
    const setPageData = (test) => {
      $("#lblTestName").text(test.test_name);
      $("#lblTestDesc").text(test.description);
      $("#lblTestDeadline").text(test.deadline);

      // start timeer
      if (parseInt(test.duration) !== 0) {
        startTimer(parseInt(test.duration) * 60, "#lblTestDuration");
      } else {
        $("#lblTestDuration").text("∞");
      }
      
    }
    
    // append questions on relavnt tabs
    const appendQuestions = (questions) => {
      questions.forEach((data, index) => {
        let defaultOpen;
        if (index == 0) {
          defaultOpen = "defaultOpen active";
        } else {
          defaultOpen = "";
        }

        $("#tabs").append(`
            <button id="qt${data.question.id}" class="tablinks ${defaultOpen}" onclick="switchTab(event, 'q${data.question.id}')">Question ${index + 1}</button>
        `);

        let answersHtml = "";

        data.answers.forEach(ans => {
          answersHtml += `<div class="answer"> <input type="radio" class="radio" id="qa${ans.id}" name="qa${data.question.id}" onclick="selectAnswer('${data.question.id}','${ans.id}')">${ans.answer}</div>`;
        });

        let nextQuestionId = parseInt(data.question.id) + 1;
        $("#tabcontent").append(`
          <div id="q${data.question.id}" class="tabcontent">
            <h2>${data.question.question}?</h2>
            ${answersHtml}
          </div>`);
      });

      $(".defaultOpen").click();
      $(".defaultOpen").addClass("active");

    }

    const switchTab = (evt, ques) => {
      $(".tabcontent").hide();
      $(".tablinks").removeClass("active");
      $(`#${ques}`).fadeIn();
      $(evt.currentTarget).addClass("active");
    }


    const selectAnswer = (question_id, answer_id) => {
      eraseCookie("answers");
      if (!docData["answers"]) docData["answers"] = {};
      docData["answers"][question_id] = answer_id;
      setCookie("answers", JSON.stringify(docData["answers"]), 1);
    }

    // check selected answers from cookies and fill them
    const checkSelectedAnswers = () => {
      if (getCookie("answers")) {
        let answers = JSON.parse(getCookie("answers"));
        docData["answers"] = answers;
        for (let question in answers) {
          let answer = answers[question];
          $(`#qa${answer}`).prop("checked", true);
        }
      }
    }

    // submit marked test to the backend
    const submitTest = () => {
      let data = {
        student_id: user.id,
        test_id: docData["testId"],
        answers: docData["answers"]
      }

      request(`/student/test`, "PUT", data).then((res) => {
        alert(`Your marks: ${res.res_data.marks}`)
        window.location = "dash.php";
      }).catch(res => {
        console.log(res);
      });
    }

    // timer for test duration countdown
    const startTimer = (duration, selector) => {
      let timer = duration,
        minutes, seconds;
      const countdown = setInterval(() => {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        $(selector).text(minutes + ":" + seconds);

        if (--timer < 0) {
          clearInterval(countdown);
          alert("Sorry!. Duration has been expired. This quiz will now be submitted automatically.");
          submitTest();
        }
      }, 1000);
    }
  </script>
</body>

</html>