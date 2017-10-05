<!DOCTYPE html>
<html>
<head>
    <title>Lab 3 </title>
</head>
<body>
<h1>Step 3.1: Delete an Actor</h1>
<?php
include("dbconn.php");

$actorId = $_POST['Id'];

$conn = getDbConnection();

if(!empty($_POST['firstName']) && !empty($_POST['lastName']))
{
    //sanitize any incoming data
    $firstName = mysqli_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_escape_string($conn, $_POST['lastName']);

    //try to perform the update
    $sql = "UPDATE actor ";
    $sql .= "SET first_name = '$firstName', ";
    $sql .= "last_name = '$lastName' ";
    $sql .= "WHERE actor_id = $actorId;";

    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Could not update actor record: ". mysqli_error($conn));
    }
    else
    {
        if(mysqli_affected_rows($conn) == 1){
            echo "Actor record $actorId successfully updated!</br>";
        }else{
            echo "Could not find actor record to update </br>";
        }
            
        
        
    }

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

<a href="Update.php">Back to Actor List</a>
</body>
</html>

