<?php
require_once 'dbh.inc.php';
$con = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName );

$path = "uploadfiles.php"
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx', 'png', 'jpg', 'jpeg',  'gif'];

        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(idProyecto) as id from tblProyectos';
            $result = mysqli_query($con, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
              {
                $filename = '1' . '-' . $filename;
              }
            //set target directory
            $path = 'uploads/';

            $created = @date('Y-m-d H:i:s');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));

            // insert file details into database
            // $sql = "INSERT INTO tblProyectos(filename, created) VALUES('$filename', '$created')";
            $sql = "INSERT INTO tblProyectos(pdf) VALUES('".$filename."')";
            mysqli_query($con, $sql);
            header("Location: ../".$path."?st=success");
        }
        else
        {
            header("Location: ../".$path."?err=archivoNoAdmitido");
        }
    }
    else
    {
        header("Location: ../".$path."?msg=sinarchivo");
    }
}
?>
