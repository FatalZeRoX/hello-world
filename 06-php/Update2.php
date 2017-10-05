<?php
include("dbconne.php");


$conn = getDbConnection();
if(!empty($_POST['Id']) )
{
    $actorId = $_POST['Id'];
}

if(!empty($_POST['firstName']) && !empty($_POST['lastName']))
{

}
else
{
    //get the actor's current data
    $sql = "SELECT * FROM actor WHERE actor_id = $actorId";
    //attempt to execute query
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Could not get actor record: ". mysqli_error($conn));
    }

    //query is successful....we have data!
    $data = mysqli_fetch_assoc($result);
    $firstName = $data['first_name'];
    $lastName = $data['last_name'];

}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Actor</title>
</head>
<body>
<h1>Update Actor</h1>
<form action="Update3.php" method="post">
    <p>
        <label>First Name:</label>
        <input type="text"
               name="firstName"
               id="firstName"
               value="<?php echo $firstName ?>"/>
    </p>
    <p>
        <label>Last Name:</label>
        <input type="text"
               name="lastName"
               id="lastName"
               value="<?php echo $lastName ?>"/>
    </p>
    <input type="submit" value="Update" />
</form>
</body>
</html>