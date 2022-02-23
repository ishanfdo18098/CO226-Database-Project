<?php
require('functions.php');
if (isset($_GET['test'])) {
    goBack(2000);
?>

    <body>
        <h1>hi</h1>
        <p>this is justa test page</p>
    </body>
<?php
} else {
?>
    <p>if get is not set</p>
<?php
}
?>