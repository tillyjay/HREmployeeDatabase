<?php
    require('isLoggedIn.php');
    checkIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>HR Employee Database</title>
    <link rel="stylesheet" href="Styles/modStyles.css">
    <script src="javaScript/formValidation.js" type="text/javascript"></script>
</head>

<body>


<div class="mods">
    <a href="index.php">
        <button>Home</button>
    </a>

    <form id="logOutForm" name="LogoutForm" action="logOut.php" method="post">
        <input type="submit" name="logoutButton" value="Log Out" />
    </form>
</div>

<?php
    require_once("dbConn.php");
    $conn = getDbConnection();

    $idDelete = $_POST["empNo"];

    $sqlStatement = "DELETE FROM employees WHERE emp_no = '$idDelete'";

    $result = mysqli_query($conn, $sqlStatement);
    $rAffected = mysqli_affected_rows($conn);

    if(!$result)
    {
        die('Could not delete record from the employees Database: ' . mysqli_error($conn));
    }
    else
    {
        echo '<h2> Successfully deleted ' . $rAffected . ' record(s).</h2>';
    }
    mysqli_close($conn);
?>

</body>
</html>

