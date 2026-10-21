<?php

$conn = mysqli_connect("localhost", "root", "", "indomaret_rpl4");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}