<?php
    include('../include/Connection.php');

    $in=new connection();

    @$name=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['name']));
    @$role=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['role']));
    @$admin=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['admin']));
    @$cate=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['cate']));
    @$subcate=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['subcate']));
    @$sup=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['sup']));
    @$qty=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['qty']));
    @$product=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['product']));
    @$user=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['user']));
    @$myorder=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['myorder']));
    @$pos=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['pos']));
    @$contact=strtolower(mysqli_real_escape_string($in->mysqli,$_POST['contact']));

    // if($name=="" || $role==""){
    //     echo 0;
    //     // echo "Please fill out all filled";
    // }else
    
        // $sql="INSERT INTO `role`(`name`, `role`,`admin`, `cate`, `subcate`, `sup`, `qty`, `product`, `user`, `myorder`, `pos`,`contact`) VALUES ('$name','$role','$admin','$cate','$subcate','$sup','$qty','$product','$user','$myorder','$pos','$contact')";
        // $run=mysqli_query($conn,$sql);

        $d=$in->insert("role",array(
            "name"=>$name,
            "role"=>$role,
            "admin"=>$admin,
            "cate"=>$cate,
            "subcate"=>$subcate,
            "sup"=>$sup,
            "qty"=>$qty,
            "product"=>$product,
            "user"=>$user,
            "myorder"=>$myorder,
            "pos"=>$pos,
            "contact"=>$contact
        ));
        if($d=="inserted"){
            echo 1;
            // Prduct inserted
        }else{
            echo 2;
            // Prduct not inserted
        }
    