<?php 
include "config.php ";
include "response.php ";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Document</title>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>
<body>
<?php 
if(!isset($_GET['eid'])){ ?>
<form role="form" method="post">
   name <input type="text" name="name" required/></br>

   country <select name="country" id ="country" required>
    <option value =""> select country</option>
    <?php
    $qry = "select * from country";
    $result = mysqli_query($conn,$qry);
    while($row=mysqli_fetch_array($result)) {?>

    <option value ="<?php echo $row['country_id'] ?>"> <?php echo $row['country_name'] ?></option>
    <?php } ?>
   </select></br>

   state <select  name="state" id="state" required>
   <option value =""> select state</option>
     </select></br>

   city <select  name="city" id = "city" >
   <option value =""> select city</option>
     </select></br>

   phone <input type="tel" name="pincode" required/></br>

    <button type="submit" name="submit">submit</button>
</form>
 <?php } ?>

<?php
if(isset($_POST['submit'])){
$name = $_POST['name'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$qry =" INSERT INTO crudphp( name,country,state,city,pincode) VALUES ('$name','$country','$state','$city','$pincode')";
$result = mysqli_query($conn,$qry);
if($result)
{
    echo "sucess";
}else{
    echo"error";
}}
error_reporting(E_ALL ^ E_WARNING); ?>
<table>
        <thead>
    <tr>
        <td>name</td>
        <td>country</td>
        <td>state</td>
        <td>city</td>
        <td>phone</td>
        <td>delete</td>
        <td>edit</td>
    </tr>
</thead>
<tbody>
<?php
include"config.php";
$qry="select * from crudphp inner join country on crudphp.country=country.country_id  inner join state on crudphp.state=state.state_id inner join city on crudphp.city=city.city_id";
$result =mysqli_query($conn,$qry);
while($row = mysqli_fetch_array($result)){ ?>
   <tr>
    <td><?php echo $row['name'] ?></td>
    <td> <?php echo $row['country_name']?></td>
    <td> <?php echo $row['state_name']?></td>
     <td> <?php echo $row['city_name']?></td>
    <td> <?php echo $row['pincode']?></td>
 <td> <a href= "create.php?eid=<?php echo $row['id']?>">edit</a> </td>
 <td><a href="create.php?did=<?php echo $row['id']?>">delete</a></td>
    </tr>
    <?php }?>
    <?php
if(isset($_GET['did'])){
$id1=$_GET['did'];
    $qry1="delete from crudphp where id=$id1 ";
    $result1 =mysqli_query($conn,$qry1);
if($result1){
    echo"sucess";
}
else{
    echo"error";
}
}
 ?>
 <?php
 if(isset($_GET['eid'])){
    $ide=$_GET['eid'];
    $qry2=" select * from crudphp inner join country on crudphp.country=country.country_id  inner join state on crudphp.state = state.state_id inner join city on crudphp.city = city.city_id where id =$ide";
    $result2 = mysqli_query($conn, $qry2); 
    while($row1= mysqli_fetch_array($result2)){ 
     $country = $row1['country_name'];
     ?>

    <form method = post>
         <input type = "text" required name="name" value ="<?php  echo $row1['name']  ?>" /></br>
         
         country <select name="country" id ="country">
    <option value ="<?php  echo $row1['country']  ?>"> <?php  echo $row1['country_name']  ?></option>
    <?php
    $qry = "select * from country where country_name != '$country'";
    $result = mysqli_query($conn,$qry);
    while($row=mysqli_fetch_array($result)) {?>
    <option value ="<?php echo $row['country_id'] ?>"> <?php echo $row['country_name'] ?></option>
    <?php } ?>
   </select></br>

   state <select name="state" required id = "state">
   <option value ="<?php  echo $row1['state']  ?>"> <?php  echo $row1['state_name']?></option>
     </select></br>

   city <select name="city" required id = "city">
   <option value ="<?php  echo $row1['city']  ?>"> <?php  echo $row1['city_name']?></option>
     </select></br>

         <input type = "tel" required name="pincode" value ="<?php  echo $row1['pincode']?>" /></br>
         <button type= "submit" name = "update" >update</button>         </form>
    <?php }} ?>
    <?php
    if(isset($_POST['update'])){
$name = $_POST['name'];
$country = $_POST['country'];
$state = $_POST['state'];
$city = $_POST['city'];
$pincode = $_POST['pincode'];
$ide = $_GET['eid'];
$qry =" update crudphp set name ='$name' , country = '$country' , state= '$state', city = '$city' , pincode = '$pincode' where id=$ide";
$result = mysqli_query($conn,$qry);
if($result)
{
header("location:create.php");
}else{
    echo"error";
}}
?>
</tbody>
</table>
<script>
        $(document).ready(function() {
            $("#country").on('change', function() {
                var countryid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        id: countryid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#state").html(data);
                        $("#city").html('<option value="">Select city</option');
                    }
                });
            });
            $("#state").on('change', function() {
                var stateid = $(this).val();
                $.ajax({
                    method: "POST",
                    url: "response.php",
                    data: {
                        sid: stateid
                    },
                    datatype: "html",
                    success: function(data) {
                        $("#city").html(data);

                    }
                    
                });
            });
        });
    </script>   
</body>
</html>
<!-- 
    if(isset($_POST['filsub'])){
        $info = $_FILES['upload']['name'];
        $path = "file/".$info;
        move_uploaded_file($_FILES['upload']['tmp_name'], $path);
    }
<form role="form" method="post" enctype="multipart/form-data">
    <input type="file" name="upload" accept=".pdf, .jpg">
    <button type="submit" name="filsub">submit</button>
    </form> 
$ext = pathinfo($info, PATHINFO_EXTENSION); (get only the extension)
-->
