<!-- IMPORTANT -->
<!-- Security wasnt considered when making this site 🤣 This site could be vulnerable to many types of attacks -->
<html>
<?php
require("./functions.php");

$conn = connectToDB();
printHeader();
?>

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
              <form action="/login.php" method="get">
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

  <?php printFooter(); ?>
</body>

</html>