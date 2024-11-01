<?php
require 'core/Dbconn.php';
$db = new Conn();

if (isset($_POST['input'])) {
    $input = $_POST['input'];


    $query = "
        (SELECT id, name FROM `product` WHERE name LIKE :input)
    ";
    $result = $db->query($query, ['input' => $input . '%']);


    if (is_array($result) && count($result) > 0) {
        foreach ($result as $row) {
            echo "<div class='text-start m-3' ><a href='<?=$row->id' style='text-decoration: none; color: #0b0b0b' >" . htmlspecialchars($row->name) . "</a></div>";
        }
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
    }
}


///////// (SELECT id, name FROM `product` WHERE name LIKE :input)
//        UNION
//        (SELECT id, name FROM `another_table` WHERE name LIKE :input)
//    "