<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/styles.css" type="text/css">
  
  <title>Phoenix: Login</title>
</head>

<body class="bodybg">

  <div class="container margintop">
    <br>
    <center>
      <h2 class="txtwhite"> Login </h2>
      <div class="card bg-light mb-3 cardpadding paddingtop opacity50" style="width: 22rem; height: 300px;">
        <p> Please fill your credentials to login </p>

        <div class="input-group mb-3">
          <div class="input-group">
            <input id="txtEmail" name="txtEmail" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Email">

          </div>
        </div>
        <div class="input-group mb-3">
          <div class="input-group">
            <input id="txtPassword" name="txtPassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Password">
          </div>
        </div>
        <center>
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login As
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a id="btnStudentLogin" class="dropdown-item" href="#">Student</a>
              <a id="btnInstructorLogin" class="dropdown-item" href="#">Instructor</a>
            </div>
          </div>
        </center>
      </div>
    </center>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="./js/common.js"></script>

  <script>
    API = "./api";
    $(document).ready(() => {
      $("#btnStudentLogin").click(() => {
        login(1);
      });

      $("#btnInstructorLogin").click(() => {
        login(2);
      });

      const login = (type) => {
        let data = {
          "email": $("#txtEmail").val(),
          "password": $("#txtPassword").val(),
          "type": type
        }
        request("/login", "POST", data).then((res) => {
          if (type == 1) window.location = "./student/dash.php";
          if (type == 2) window.location = "./instructor/dash.php";
        }).catch(res => {
          alert(getResponseMsg(res.error_code));
        });
      }
    });
  </script>

</body>

</html>