<?php
include_once("config.php");

if (!empty($_POST["id"])) {
    $id = $_POST['id'];
    $query = "select * from state where country_id=$id";
    $result = mysqli_query($conn, $query);
    if ($result) { ?>
        <option value="">Select State</option>
       <?php while ($row = mysqli_fetch_array($result)) { ?>
            <option value="<?php $row['state'] ?>"> <?php $row['state'] ?> </option>
       <?php }
    }
} elseif (!empty($_POST['sid'])) {
    $id = $_POST['sid'];
    $query1 = "select * from city where state_id=$id";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) { ?>
    <option value="">Select city</option>
       <?php while ($row1 = mysqli_fetch_array($result1)) { ?>
            <option value="<?php $row1['city'] ?>"> <?php $row1['city']?> </option>
       <?php }
    }
}
?>




// Validate image file size
if (($_FILES["file-input"]["size"] > 2000000)) {
    $msg = "Image File Size is Greater than 2MB.";
    header("Location: ../product.php?error=$msg");
    exit();
}  


//file upload
const oFile = document.getElementById("fileUpload").files[0]; // <input type="file" id="fileUpload" accept=".jpg,.png,.gif,.jpeg"/>

if (oFile.size > 2097152) // 2 MiB for bytes.
{
  alert("File size must under 2MiB!");
  return;
}


<!-- $info = $_FILES['upload']['name'];  (get the location of the file)

	$ext = pathinfo($info, PATHINFO_EXTENSION); (get only the extension)

	$path = '../images/'.$name.'.'.$ext; (give the path where the file needs to be stored)

	move_uploaded_file($_FILES['upload']['tmp_name'], $path); (Moved the uploaded file to the given path)
 -->