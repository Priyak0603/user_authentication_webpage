<?php
$con1=mysqli_connect("localhost","root","Hellokitty@24#","mysql");
if(!$con1){
    die("connection failed");
}

if(isset($_POST['login'])){
    $uname=$_POST['facul_name'];
    $upass=$_POST['upass'];
    $sql="select case when exists(select * from kfac_desc where password=?)then 'true' else 'false' end as result";
    $stmt = $con1->prepare($sql);
    $stmt->bind_param("s", $upass);
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    if($result=='true'){
        header("Location:facultydashboard.php");
        exit();
    }
    else{
        echo "invalid password and username!!!";
    }
}
?>