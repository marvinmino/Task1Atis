<?php
$pdo = require '../core/connection.php';
require '../core/functions.php';

if (isset($_GET['page_no']) && !empty($_GET['page_no'])) {
  $page_no = $_GET['page_no'];
} else {
  $page_no = 1;
}

//find the total number of pages 
$total_records_per_page = 6;
$offset = ($page_no - 1) * $total_records_per_page;
$total_no_of_pages = findTotal($total_records_per_page, $pdo);

//see if the user has decided to check a user
$id = isset($_POST['check']) ? $_POST['check'] : NULL;
checkGuest($pdo, $id);


//see if the user has entered smth in the page
if (isset($_POST['sel'])) {
  $select = $_POST['sel'];
}
if (isset($_POST['searchIn'])) {
  $search = $_POST['searchIn'];
}
if (isset($_GET['sel'])) {
  $select = $_GET['sel'];
}
if (isset($_GET['searchIn'])) {
  $search = $_GET['searchIn'];
}

//find the query based on user inputs
if (isset($search) or isset($select)) {
  $result = findQuery($pdo, $search, $select, $offset, $total_records_per_page);
} else
  $result = findQuery($pdo, NULL, NULL, $offset, $total_records_per_page);



require '../view/index.view.php';
