<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link rel="stylesheet" href="assets/styles.css" type="text/css">


</head>

<body class="bodybg">

  <div class="container margintop">
    <br>
    <center>
      <h2 class="txtwhite"> Register </h2>
    </center>
    <div class="card cardpadding">

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">First Name</span>
        </div>
        <input id="txtFname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Last Name</span>
        </div>
        <input id="txtLname" name="txtLname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Email</span>
        </div>
        <input type="text" id="txtEmail" name="txtEmail" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">NIC</span>
        </div>
        <input id="txtNic" name="txtNic" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Date of Birth</span>
        </div>
        <input id="txtDob" name="txtDob" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Password</span>
        </div>
        <input id="txtPassword" name="txtPassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text">Confirm Password</span>
        </div>
        <input id="txtCPassword" name="txtCPassword" type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
      <center>
        <div class="dropdown">
          <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Register As
          </a>

          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" onclick="checkInputs('1')">Student</a>
            <a class="dropdown-item" onclick="checkInputs('2')">Instructer</a>

          </div>
        </div>
      </center>


    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./assets/js/vendors/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="./js/common.js"></script>

  <script>
    API = "./api";
    const checkInputs = (userType) => {
      let pass = $("#txtPassword").val();
      let cPass = $("#txtCPassword").val()
      if (pass !== cPass) {
        alert("passwords doesnt match!");
      } else {
        register(userType);
      }
    }

    const register = (userType) => {
      let path = (userType == 1) ? "/student" : "/instructor";
      let data = {
        "fname": $("#txtFname").val(),
        "lname": $("#txtLname").val(),
        "email": $("#txtEmail").val(),
        "dob": $("#txtDob").val(),
        "nic": $("#txtNic").val(),
        "password": $("#txtPassword").val()
      };

      request(path, "POST", data).then((res) => {
        alert("You have been registered!");
        window.location = "login.php";
      }).catch(res => {
        console.log(res);
      });
    }
  </script>
</body>

</html>