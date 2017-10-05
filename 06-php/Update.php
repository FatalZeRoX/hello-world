<!DOCTYPE html>
<html>
<head>
    <title>Lab 3</title>
    <style>
        table, th, td {border: 1px red solid;}
    </style>
</head>
<body>
<table>
    <h2>Step 3.1: Update an Actor </h2>
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>

    <?php
    include("dbconne.php");
    $conn = getDbConnection();
    $result = mysqli_query($conn, "SELECT actor_id, first_name, last_name FROM actor ORDER BY actor_id DESC LIMIT 10");

    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr><td>". $row['actor_id']. "</td><td>". $row['first_name'] . "</td><td>". $row['last_name'] . "</td></tr>";

    }


    ?>
    </thead>
</table>
<form action="Update2.php" method="post">
    <p>
        <label>ID to Update</label>
        <input type="text" name="Id" id="Id"  />
    </p>

    <input type="submit" value="Update" />
</form>

</body>
</html>