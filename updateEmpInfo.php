
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

// employee number via POST and SELECT statement
    $empNo = $_POST["empNo"];
    $sqlStatement = "SELECT * FROM employees WHERE emp_no = '$empNo'";

// display result or error message
    $result = mysqli_query($conn, $sqlStatement);
    if(!$result)
    {
        die("Could not retrieve records from database: " . mysqli_error($conn));
    }

    while($row = mysqli_fetch_assoc($result)):
?>

<!-- pre populated update form -->
<div id="updateDiv">
<h2 id="updateInfo">Update Employee Information</h2>
<form id="updateForm" name="updateForm" action="update.php" method="post" onsubmit="return valForm()">
    <div class="label">
    <label for="empNo">Employee Number:
    <input type="text" id="empNo" name="empNo"
           value="<?php echo $row['emp_no'] ?>"
           onBlur="empDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="birthD">Birth Date:
    <input type="text" id="birthD" name="birthD"
           value="<?php echo $row['birth_date'] ?>"
           onBlur="birthDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="fName">First name:
        <input type="text" id="fName" name="fName"
           value="<?php echo $row['first_name'] ?>"
           onblur="fNameDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="lName">Last name:
    <input type="text" id="lName" name="lName"
           value="<?php echo $row['last_name'] ?>"
           onblur="lNameDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="gender">Gender:
    <input type="text" id="gender" name="gender"
           value="<?php echo $row['gender'] ?>"
           onblur="genderDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="hireD">Hire date:
    <input type="text" id="hireD" name="hireD"
           value="<?php echo $row['hire_date'] ?>"
        onblur="hireDisplayError()">
    </label><br><br>
    </div>

    <input type="submit" name="submit" value="Submit">
</form>
</div>

<?php
    endwhile;
    mysqli_close($conn);
?>

</body>
</html>
