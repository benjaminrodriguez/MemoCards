<?php 

function search()
{
  $query = $_GET['query'];
  $query = trim($query);
  $query = strip_tags($query);
  $list = searchDB($query)->fetchAll(PDO::FETCH_ASSOC);
  var_dump($list);
}
?>