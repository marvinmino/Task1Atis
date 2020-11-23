<?php
$pdo = require 'connection.php';

function findTotal($total_records_per_page, $pdo)
{
    $query4 = $pdo->prepare("SELECT COUNT(*) As total_records FROM guest where checked=0");
    $query4->execute();
    $total_records = $query4->fetchAll(PDO::FETCH_OBJ);
    $total_records = $total_records[0]->total_records;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    return $total_no_of_pages;
}
function checkGuest($pdo, $id)
{
    $query1 = $pdo->prepare('update guest set checked=1 where id=' . $id);
    $query1->execute();
}
function findQuery($pdo, $search, $select, $offset, $total_records_per_page)
{
    if (isset($search))
        if (isset($select))
            $sel = "select * from guest where (name like '" . $search . "%' or surname like '" . $search . "%') and checked=0 order by " . $select . " LIMIT " . $offset . "," . $total_records_per_page;
        else
            $sel = "select * from guest where (name like '" . $search . "%' or surname like '" . $search . "%') and checked=0 LIMIT " . $offset . "," . $total_records_per_page;

    else
    if (isset($select))
        $sel = "select * from guest where checked=0 order by " . $select . " LIMIT " . $offset . "," . $total_records_per_page;
    else
        $sel = "select * from guest where checked=0 LIMIT " . $offset . "," . $total_records_per_page;
    $query2 = $pdo->prepare($sel);
    $query2->execute();
    return $query2->fetchAll(PDO::FETCH_OBJ);
}
