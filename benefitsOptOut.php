
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

    $empNo = $_POST['empNo'];
?>

<!-- opt-in opt-out of employee benefits form -->
<div id="optOut">
    <h3>Do you want to opt out of Health Benefits for employee : <?php echo $empNo; ?></h3>

<form action="benefits.php" method="post">
    <input type="hidden" name="empNo" value="<?php echo $empNo; ?>">

    <input type="radio" id="yes" name="check" value="No">
    <label for="yes">Yes</label>

    <input type="radio" id="no" name="check" value="Yes">
    <label for="no">No</label><br><br>

    <input type="submit" id="submit" name="submit" value="Submit">
</form>
</div>

<?php
    mysqli_close($conn);
?>

</body>
</html>

