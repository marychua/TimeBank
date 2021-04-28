<?php

$countfiles = count($_FILES['files']['name']);
for($i=0;$i<$countfiles;$i++)
{

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    

//    $ext = end((explode(".", $filename)));
//    $valid_ext = array("png","jpeg","jpg");
//    if(in_array($ext, $valid_ext))
//    {
//        if(move_uploaded_file($_FILES['file']['tmp_name'][$i],'upload/'.$filename))
//        {
$add_to_image ="INSERT INTO `jobimage` (`imgid`, `name`, `image`, `JPID`) VALUES ('IMG$JID','$filename','$','JPID$JPID')";
mysqli_query($db,$add_to_image);
//        }
//    }
}
  echo "File upload successfully";

?>