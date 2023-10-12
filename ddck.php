<?Php
@$id = $_GET['id'];
//$id=2;
/// Preventing injection attack //// 
if (!is_numeric($id)) {
    echo "Data Error";
    exit;
}
/// end of checking injection attack ////
require "config/dbcon.php"; // Database connection string 

$sql = "SELECT subcat_name,subcat_id FROM exp_subcat WHERE id=:id";
$row = $dbo->prepare($sql);
$row->bindParam(':id', $id, PDO::PARAM_INT, 5);
$row->execute();
$result = $row->fetchAll(PDO::FETCH_ASSOC);

$main = array('data' => $result);
echo json_encode($main);