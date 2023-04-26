<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "stc");
$columns = array('cat_name');

$query = "SELECT * FROM categories ";

if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE cat_name LIKE "%'.$_POST["search"]["value"].'%"  
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id ASC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
  $sub_array[] = '<div class="text-center" data-id="'.$row["id"].'" data-column="id">' . $row["id"] . '</div>';
 $sub_array[] = '<div contenteditable class="update text-center" data-id="'.$row["id"].'" data-column="cat_name">' . $row["cat_name"] . '</div>';
 $data[] = $sub_array;
}

function get_all_data($connect)
{
 $query = "SELECT * FROM categories";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>