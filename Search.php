<?php
    require('isLoggedIn.php');
    checkIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>HR Employee Database</title>
    <link rel="stylesheet" href="Styles/styles.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="javaScript/secretButton.js"></script>
</head>

<body>

<?php
// check if search name is first, last, or first and last
    $name = $_POST["name"];

    if($name == trim($name) && str_contains($name, ' '))
    {
        $nameArr = explode(" ", $name, 2);
    }
// assign array values to first and last name variables
    $fName = $nameArr[0];
    $lName = $nameArr[1];

?>

<div class="searchDiv"">
<form action="Req3Search.php" method="post">
    <label for="name">Search first or last name</label>
    <input type="search" id="name" name="name"
    value="<?php echo $name?>">
    <button id="searchB">Search</button>
</form>

<button id="home" onclick="window.location.href='index.php';">
    Home
</button>

<form id="logOutForm" name="LogoutForm" action="logOut.php" method="post">
    <input type="submit" name="logoutButton" value="Log Out" />
</form>

</div>

<table>
    <thead>
        <th>Employee Number</th>
        <th>Birth Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Hire Date</th>
        <th>Benefits</th>
    </thead>
<tbody>

<?php
    require_once("dbConn.php");
    $conn = getDbConnection();

// sqlStatement if first and last name are searched together
    $sql_statement1 = "SELECT * FROM employees 
                      WHERE first_name LIKE '%{$fName}%'
                         AND last_name LIKE '%{$lName}%'";

// sqlStatement if either first or last name are searched
    $sql_statement2 = "SELECT * FROM employees 
                      WHERE first_name LIKE '%{$name}%' 
                      OR last_name LIKE '%{$name}%'";

    $sql_statement = "";

 // if two names are entered into search and array is not empty
    if(!empty($nameArr))
    {
        $sql_statement = $sql_statement1;
    }
// else only a single name was entered
    else
    {
        $sql_statement = $sql_statement2;
    }

// display results depending on search values
    $result = mysqli_query($conn, $sql_statement);
    if (!$result)
    {
        die("Could not locate any records including the name " . $fName . " , " . $lName . " or " . $name . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($result)):
?>

<tr>
    <td><?php echo $row['emp_no'] ?></td>
    <td><?php echo $row['birth_date'] ?></td>
    <td><?php echo $row['first_name'] ?></td>
    <td><?php echo $row['last_name'] ?></td>
    <td><?php echo $row['gender'] ?></td>
    <td><?php echo $row['hire_date'] ?></td>
    <td><?php echo $row['benefits']?></td>
</tr>

<?php
    endwhile;
    mysqli_close($conn);
?>

    </tbody>
</table>

<?php
// easter egg feature
    $nameL = strtolower($name);
    if($nameL === "bean")
    {
?>
        <h2>No data to display here...Do you dare click the mysterious button???</h2>

        <button id="beanButton">Click me</button>
        <div id="iframeHolder"></div>
<?php
    }
?>

</body>
</html>