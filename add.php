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
    if(!empty( $_POST["birthD"]) && !empty($_POST["fName"] &&
       !empty( $_POST["lName"]) && !empty( $_POST["gender"]) && !empty($_POST["hireD"]) ))
    {
    require_once("dbConn.php");
    $conn = getDbConnection();

// get variables via POST
    $birthD = $_POST["birthD"];
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $gender = $_POST["gender"];
    $hireD = $_POST["hireD"];

// insert into sql statement
    $sqlStatement = "INSERT INTO employees (birth_date, first_name, last_name, gender, hire_date) " .
        "VALUES ('$birthD','$fName','$lName','$gender', '$hireD')";

    $result = mysqli_query($conn, $sqlStatement);
    $rInserted = mysqli_affected_rows($conn);

// display insert message
    if (!$result)
    {
        die('Could not insert record into the HR employee Database: ' . mysqli_error($conn));
    }
    else
    {
        echo '<h2> Successfully added ' . $rInserted . ' record(s) </h2>';
    }
        mysqli_close($conn);
    }
?>

</body>
</html>