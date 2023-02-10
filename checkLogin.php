<!DOCTYPE html>
<html lang="en">

<head>
    <title>HR Employee Database</title>
    <link rel="stylesheet" href="Styles/loginStyles.css">
   </head>

<body>

<h2>HR Employee Database</h2>

<div id="reroute">
    <h2>Incorrect Login. Please try again.</h2>

    <a href="mainLogin.html">
        <button>Main Login</button>
    </a>
</div>

<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "inet2005", "employees");
    if(!$conn)
    {
        die("Unable to connect: ". mysqli_connect_error());
    }

    $username = $_POST['loginUser'];
    $pwd = $_POST['loginPwd'];

    //sanitize our inputs
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM web_users WHERE user_name = '$username'";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("An error occurred in query: " . mysqli_error($conn));
    }
    mysqli_close($conn);

    $count = mysqli_num_rows($result);

    if($count == 1)
    {
    //a row was returned....
    $row = mysqli_fetch_assoc($result);
    //get the hashed value from the user_pwd
    $hash = $row['user_pwd'];

        if(password_verify($pwd, $hash))
        {
            //password matches, grant access
            $_SESSION['LoggedInUser'] = $username;
            header("location:index.php");
        }
    }

    mysqli_close($conn);
?>

</body>
</html>