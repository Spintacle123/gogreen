<?php 
// Load the database configuration file 
include_once 'config.php'; 
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "orders_transactions_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ORDERS_ID', 'USER ID', 'NAME', 'EMAIL', 'PHONE', 'ADDRESS', 'PAYMENT', 'PRODUCTS', 'PROFIT', 'TOTAL AMOUNT', 'STATUS', 'DATE ORDER'); 
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $conn->query("SELECT * FROM orders WHERE status = 1 ORDER BY id ASC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Delivered':'Cancelled'; 
        $lineData = array($row['id'], $row['user_id'], $row['name'], $row['email'], $row['phone'], $row['address'], $row['pmode'], $row['products'], $row['tprofit'], $row['amount_paid'], $status, $row['date_ord']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;