<?php 
    include_once('./sql/dhb.php');

    $sql = "SELECT * FROM dangtuyen_form ORDER BY id_post DESC";
    $result = $conn->query($sql);
    $data = array();
    while ($row = $result->fetch_assoc())
    {
        $data[] = $row;
    }
?>