<?php
    require('isLoggedIn.php');
    checkIfLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>HR Employee Database</title>
    <link rel="stylesheet" href="Styles/styles.css">
    <script src="javaScript/formValidation.js" type="text/javascript"></script>
</head>

<body>

<h2>HR Employee Database</h2>

<div class="searchDiv">
<form action="Req3Search.php" method="post">
    <label for="name">Search first or last name</label>
    <input type="search" id="name" name="name">
    <button id="searchB">Search</button>
</form>

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
        <th>Edit</th>
        <th>Delete</th>
        <th>Opt Out</th>
    </thead>
<tbody>

<?php
        require_once("dbConn.php");
        $conn = getDbConnection();

// alter table create benefits column req 9
    $sqlAddStatement = "ALTER TABLE employees ADD benefits varchar(20) DEFAULT 'Yes' AFTER 'hire_date'";
    $addResult = mysqli_query ($conn, $sqlAddStatement);

// get current page number/set default page to 1
        if (isset($_GET['page_num']))
        {
            $page_num = $_GET['page_num'];
        }
        else
        {
            $page_num = 1;
        }

// number of records per page/pagination formula
        $records_per_page = 25;
        $offset = ($page_num - 1) * $records_per_page;

// calculate total number of pages
        $pages_statement = "SELECT COUNT(*) FROM employees";
        $page_result = mysqli_query($conn,$pages_statement);
        $total_rows = mysqli_fetch_array($page_result)[0];
        $total_pages = ceil($total_rows / $records_per_page);

// sql statement with page first result limited to records per page
        $sql_statement = "SELECT * FROM employees LIMIT $offset, $records_per_page";

// retrieve data, if no result display error message
        $result = mysqli_query ($conn, $sql_statement);
        if(!$result)
        {
            die("Could not retrieve records from database: " . mysqli_error($conn));
        }

// loop through available data and display in table
        while($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td><?php echo $row['emp_no'] ?></td>
                <td><?php echo $row['birth_date'] ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['gender'] ?></td>
                <td><?php echo $row['hire_date'] ?></td>
                <td><?php echo $row['benefits'] ?></td>
                <td>
                    <form class="icon" action="Req5Update.php" method="post">
                        <input type="hidden" name="empNo" value="<?php echo $row['emp_no']; ?>">
                        <button id="updateButton" type="submit">
                            <img src="IMGs/edit.png" >
                        </button>
                    </form>
                </td>
                <td>
                    <form class="icon" action="Req7Delete.php" method="post">
                        <input type="hidden" name="empNo" value="<?php echo $row['emp_no']; ?>">
                        <button id="deleteButton" type="submit">
                            <img src="IMGs/delete.png">
                        </button>
                    </form>
                </td>

                <td>
                    <form class="icon" action="Req9.php" method="post">
                        <input type="hidden" name="empNo" value="<?php echo $row['emp_no']; ?>">
                        <button id="benefitsButton" type="submit">
                            <img src="IMGs/health.png">
                        </button>
                    </form>
                </td>
            </tr>

    <?php
        endwhile;
        mysqli_close($conn);
    ?>

    </tbody>
</table>

<!-- display pagination buttons (first, previous, next, last) -->
<div id="pages">
    <button>
        <a href="?page_num=1">First</a>
    </button>

    <button >
        <a href="<?php if($page_num <= 1)
        {echo '#'; }
        else { echo "?page_num=".($page_num - 1); } ?>
         ">Prev</a>
    </button>

    <button>
        <a href="<?php if($page_num >= $total_pages)
        { echo '#'; }
        else { echo "?page_num=".($page_num + 1); } ?>
        ">Next</a>
    </button>

    <button>
        <a href="?page_num=<?php echo $total_pages; ?>">Last</a>
    </button>
</div>

<!-- Add employee form -->
<div id="addDiv">
<h2>Add New Employee</h2>
<form id="insertForm" name="insertForm" action="Req4Add.php" method="post" onsubmit="return validateForm()">

    <div class="label">
    <label for="birthD">Birth Date:
        <input type="text" id="birthD" name="birthD" placeholder="YYYY-MM-DD"
               onBlur="birthDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="fName">First name:
        <input type="text" id="fName" name="fName"
               onblur="fNameDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="lName">Last name:
        <input type="text" id="lName" name="lName"
               onblur="lNameDisplayError()">
    </label><br><br>
    </div>

    <div class="label">
    <label for="gender">Gender:
        <input type="text" id="gender" name="gender"
               onblur="genderDisplayError()">
    </label><br><br>
    </div>

     <div class="label">
    <label for="hireD">Hire Date:
        <input type="text" id="hireD" name="hireD" placeholder="YYYY-MM-DD"
               onblur="hireDisplayError()">
    </label><br><br>
     </div>

    <input type="submit" value="Submit">
</form>
</div>

</body>
</html>



<!-- Sources-->
<!-- https://bobbyhadz.com/blog/javascript-validate-date-yyyy-mm-dd#:~:text=The%20toISOString()%20method%20returns,as%20YYYY-MM-DD%20.-->
<!-- https://codepen.io/creotip/pen/BaogwB-->
<!-- https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html-->
<!-- https://freeicons.io/-->
