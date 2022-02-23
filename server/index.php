<?php
session_start();
require("./functions.php");
$conn = connectToDB();
printHeader();
if (isset($_SESSION['userType'])) {
  $userType = $_SESSION['userType'];
  if ($userType == "student") {
    redirectToURL("/studentHome.php", 0);
  } else if ($userType == "instructor") {
    redirectToURL("/instructorHome.php", 0);
  } else if ($userType == "lecturer") {
    redirectToURL("/lecturerHome.php", 0);
  } else if ($userType == "supervisor") {
    redirectToURL("/supervisorHome.php", 0);
  }
} else {
?>
  <!-- IMPORTANT -->
  <!-- Security wasnt considered when making this site 🤣 This site could be vulnerable to many types of attacks -->

  <body>
    <?php
    printNavbar();
    ?>
    <center>
      <h3>Welcome to Internship Allocation - Computer Engineering - University of Peradeniya</h3>
    </center>
    <main class="login-form">
      <div class="cotainer">
        <div class="row justify-content-center">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">Login</div>
              <div class="card-body">
                <form action="/login.php" method="post">
                  <div class="form-group row">
                    <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                    <div class="col-md-8">
                      <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                    </div>
                  </div>
                  <br>

                  <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                    <div class="col-md-8">
                      <input type="password" id="password" class="form-control" name="password" required>
                    </div>
                  </div>

                  <br>
                  <div class="col-md-6 offset-md-5">
                    <button type="submit" class="btn btn-primary">
                      Login
                    </button>
                  </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </main>

    <div class="container">
      <center> default password is your e number <br>
        Student: username - e18098@eng.pdn.ac.lk <br>
        password - e18098 <br><br>
        Supervisor: username - supervisor@compnay1.com<br>
        password - password123</center>
    </div>

    <?php printFooter(); ?>
  </body>

  </html>
<?php } ?>