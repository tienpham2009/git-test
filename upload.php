<?php
$fileError = [];
$target_dir = "Images/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

if ($_FILES["fileToUpload"]["size"] > 5000000){
    $fileError["fileUpload"] = "Chỉ được upload file dưới 5MB";
}

$file_type = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);


$file_type_allow = ["jpg","png","jpeg","gif"];

if (!in_array(strtolower($file_type), $file_type_allow)){
    $fileError["fileUpload"] = "Chỉ được upload file ảnh";
}

if (file_exists($target_file)){
    $fileError["fileUpload"] = "File đã tồn tại trên hệ thống";
}

if (empty($fileError)){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
        echo "ok";
    }else{
        echo "fail";
    }
}

unlink("Images/Screenshot from 2021-05-18 10-24-27.png");