<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Applicants</title>
</head>

<body>
    <?php

    // database details

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "jobs";

    // creating  a connection
    $conn = mysqli_connect($host, $username, $password, $dbname);

    //check connection
    if ($conn === false) {
        die("ERROR: Could not connect." . mysqli_connect_error());
    }

    $sql = "SELECT * FROM jobfield";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Gender</th><th>Birthday</th><th>Phone Number</th><th>Job Field</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["birthday"] . "</td>";
            echo "<td>" . $row["phonenumber"] . "</td>";
            echo "<td>" . $row["jobfield"] . "</td>";
            echo "<td>";
            // echo "<a href='update_record.php?id=" . $row["id"] . "'>Update</a> | ";
            // echo "<a href='delete_record.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    mysqli_close($conn);
    ?>


</body>

</html>