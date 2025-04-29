<html>
  <body>
    <?php
    if(isset($_FILES["file"]))
        {if((($_FILES["file"]["type"]=="image/gif")||($_FILES["file"]["type"]=="image/jpeg")||
        ($_FILES["file"]["type"]=="image/png"))&&($_FILES["file"]["size"]<2*1024*1024*1024))
        {
            if($_FILES["file"]["error"]>0)
            {
                echo "Return Code:" .$_FILES["file"]["error"]."<br/>";
            }
            else{
                echo "upload:".$_FILES["file"]["name"]."<br/>";
                echo "Type :".$_FILES["file"]["type"]."<br/>";
                echo "Size : ".$_FILES["file"]["size"]."<br/>";
                echo "Temp file :" . $_FILES["file"]["tmp_name"]."<br/>";
                if(file_exists("upload/".$_FILES["file"]["name"]))
                {
                    echo " File" . $_FILES["file"]["name"] ."already Exists";
                }
                else{
                    move_uploaded_file($_FILES["file"]["name"],"upload/" .$_FILES["file"]["name"]);
                    echo "stored in : "  ."upload/" .$_FILES["file"]["name"];
                }
            }
        }
        else{
            echo "Invalid File";
        }
    }
    else{
        echo "no file  Uploaded .";
    }
     ?>
 </body>
</html>