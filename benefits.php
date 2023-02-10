<?php
    require('isLoggedIn.php');
    checkIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>HR Employee Database</title>
    <link rel="stylesheet" href="Styles/modStyles.css">
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

    $empNo = $_POST["empNo"];
    $check = $_POST["check"];

    $sqlStatement = "UPDATE employees SET benefits = '$check'
                WHERE emp_no = '$empNo'";

    $result = mysqli_query($conn, $sqlStatement);
    $rAffected = mysqli_affected_rows($conn);

    if(!$result)
    {
        die('Could not update record from the employees Database: ' . mysqli_error($conn));
    }
    else
    {
        echo '<h2> Successfully updated ' . $rAffected  . ' benefits record(s) </h2>';
    }
    mysqli_close($conn);
?>

</body>
</html>

