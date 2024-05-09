<?php
$con=mysqli_connect("localhost","root","Hellokitty@24#","mysql");
if(!$con){
    die("connection failed");
}

if(isset($_POST['sign_in'])){
    $fid=$_POST['fid'];
    $fname=$_POST['facul_name'];
    $fpass=$_POST['upass'];
    $fdesig=$_POST['fac_desig'];
    $expert=$_POST['area'];
    $exper=$_POST['experi'];
    $sql="insert into Kfac_desc values('$fname','$fpass','$fid','$fdesig','$expert','$exper')";
    mysqli_query($con,$sql);
    echo"record saved successfully";
}

?>