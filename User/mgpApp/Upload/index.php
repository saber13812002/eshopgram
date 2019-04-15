<?php
//echo '111111111111111111';
$info = ($_POST['info']);
$jsoninfo =  json_decode($info,true);
//print_r($jsoninfo);


$info = pathinfo($_FILES['avatar']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "newname".rand().".".$ext; 

$target = 'image/'.$newname;
move_uploaded_file( $_FILES['avatar']['tmp_name'], $target);

$servername = "localhost";
$username = "eshopgram_user";
$password = "mohsenz?3=JFirFD.^";
$dbname = "eshopgram_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "Delete from PostParts where supplier_id=:supplier_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':supplier_id'=> $jsoninfo['productid']));
    
    $sql = "INSERT INTO PostParts (name,price,stock,supplier_id,imagename,media_url,xloc,yloc)
    VALUES (:name,:price,:stock,:supplier_id,:imagename,:media_url,:xloc,:yloc)";
    $stmt = $conn->prepare($sql);
    // use exec() because no results are returned
//    $stmt->bindParam(':name', 'گلدان');
//    $stmt->bindParam(':price', $jsoninfo['price']);
//    $stmt->bindParam(':stock', $jsoninfo['stock']);
//    $stmt->bindParam(':supplier_id', $jsoninfo['productid']);
//    $stmt->bindParam(':media_url', $jsoninfo['imageurl']);
//    $stmt->bindParam(':xloc', $jsoninfo['xloc']);
//    $stmt->bindParam(':yloc', $jsoninfo['yloc']);
    
    
    $stmt->execute(array(':name'=>$jsoninfo['title'],                
                      ':price'=> $jsoninfo['price'] ,
                      ':stock'=> $jsoninfo['stock'],
                      ':supplier_id'=> $jsoninfo['productid'],
                      ':imagename'=>$newname,
                      ':media_url'=> $jsoninfo['imageurl'],
                      ':xloc'=> $jsoninfo['xloc'],
                      ':yloc'=> $jsoninfo['yloc']
        
        ));
   // echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

    echo 'http://eshopgram.com/mgpApp/Upload/image/'.$newname;
    
$conn = null;
