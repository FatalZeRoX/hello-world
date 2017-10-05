<?php

function getDbConnection()
{
    $conn = mysqli_connect("localhost", "root", "inet2005", "sakila");
    if(!$conn)
    {
        die("Could not connect: " . mysqli_connect_error($conn));
    }


    return $conn;
}