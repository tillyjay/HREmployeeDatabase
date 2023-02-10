
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

// get employee number via POST
    $empNo = $_POST['empNo'];
?>

<!-- verify user wants to delete employee record form -->
    <form id="deleteForm" action="delete.php" method="post">
        <label for="empNo">Do you want to delete employee number: </label>
            <input type="text" id="empNo" name="empNo"
            value="<?php echo $empNo; ?>">
        </label><br><br>

        <input type="submit" id="submit" name="submit" value="Yes">
    </form>

<?php
    mysqli_close($conn);
?>

</body>
</html>
