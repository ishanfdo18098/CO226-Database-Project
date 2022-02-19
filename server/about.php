<html>
<?php
require("./functions.php");

$conn = connectToDB();
printHeader();
?>

<body>
    <?php printNavbar(); ?>

    <div class="container">

        <h3>About us</h3> <br>
        <h5>INTERNSHIP ALLOCATION FOR DEPARTMENT OF COMPUTER ENGINEERING</h5><br>

        <h5>DESCRIPTION :</h5>
        <p>A Database to manage the allocation of internships in Companies for Students of the department of Computer Engineering under the supervision of the Staff through Student profiling, Company profiling and creating an interface between Students, Staff and Companies.</p>

        <h5>Team</h5>
        <ul>
            <li><a href="https://people.ce.pdn.ac.lk/students/e18/098/">Fernando K.A.I. - E/18/098</a> </li>
            <li><a href="https://people.ce.pdn.ac.lk/students/e18/100/">Fernando K.N.A. - E/18/100</a> </li>
            <li><a href="https://people.ce.pdn.ac.lk/students/e18/155/">Jayasundara J.W.K.R.B. - E/18/155</a> </li>
        </ul>

        <p><a href="https://github.com/ishanfdo18098/CO226-Database-Project">Click here to go to the GitHub repo</a></p>

    </div>
    <?php printFooter(); ?>
</body>

</html>