<?php
    require('isLoggedIn.php');
    checkIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Assignment 1</title>
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
if(!empty( $_POST["empNo"]) && !empty( $_POST["birthD"]) && !empty($_POST["fName"] &&
        !empty( $_POST["lName"]) && !empty( $_POST["gender"]) && !empty($_POST["hireD"]) ))
{
    require_once("dbConn.php");
    $conn = getDbConnection();

    $empNo = $_POST["empNo"];
    $birthD = $_POST["birthD"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $gender = $_POST["gender"];
    $hireD = $_POST["hireD"];


    $sqlStatement = "UPDATE employees SET  birth_date = '$birthD', first_name = '$fName', 
                     last_name = '$lName', gender = '$gender', hire_date = '$hireD' 
                    WHERE emp_no = '$empNo'";

    $result = mysqli_query($conn, $sqlStatement);

    $rAdded = mysqli_affected_rows($conn);

    if (!$result)
    {
        die('Could not insert record into the HR employee Database: ' . mysqli_error($conn));
    }
    else
    {
        echo '<h2> Successfully updated ' . $rAdded . ' record(s) </h2>';
    }
    mysqli_close($conn);
}
?>

</body>

</html>

