 <?php  
include '../include/Connection.php';
$in=new connection();

$mscat=mysqli_real_escape_string($in->mysqli,$_POST['mscat']);
$subcate=mysqli_real_escape_string($in->mysqli,$_POST['subcate']);
$subdes=mysqli_real_escape_string($in->mysqli,$_POST['subdes']);
$subdate=mysqli_real_escape_string($in->mysqli,date("Y-m-d"));

$ssql="SELECT * FROM `subcategory` s INNER JOIN `category` c ON s.mscat=c.sid WHERE `mscat`='$mscat' && `subcate`='$subcate'";
// $srun=mysqli_query($conn,$ssql);
// if(mysqli_num_rows($srun)>0){
    echo 0;
// }else{
    $d=$in->insert("subcategory",array(
        "mscat"=>$mscat,
        "subcate"=>$subcate,
        "subdes"=>$subdes,
        "subdate"=>$subdate
    ));
// $sql="INSERT INTO `subcategory`(`mscat`,`subcate`,`subdes`,`subdate`) VALUES ('$mscat','$subcate','$subdes','$subdate')";
// $run=mysqli_query($conn,$sql);
if($d=="inserted"){
    echo 1;
}else{
    echo 2;
}
// }

?>