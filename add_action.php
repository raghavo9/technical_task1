<?php

$con = mysqli_connect("localhost","task","Task_Lin@pwd1") or die("cann't connect to database server");
mysqli_select_db($con,"task") or die("database not found");

//INSERT INTO `category` (`id`, `name`, `descp`, `status`, `created`, `updated`) VALUES (NULL, 'new category', 'description of new description', 'A', '2020-12-17 21:27:41', '2020-12-17 21:27:41'); 

$name=$_POST["name"];
$descp=$_POST["descp"];
$status=$_POST["status"];
$created=$_POST["created"];
$updated=$_POST["updated"];
$sql6="INSERT INTO `category` (`id`, `name`, `descp`, `status`, `created`, `updated`) VALUES (NULL, '$name', '$descp', '$status', '$created', '$updated')";

$res= mysqli_query($con,$sql6);


?>



<?php require_once('includes/header.php');?>
<a href="logout.php"> logout </a>
<?php require_once('includes/navigation.php');?>
<div class="row">


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
<fieldset>
  <legend>add Category details</legend>
  
  <form action="add_action.php" method="post" >
  
    <tr>
      <td> Name : </td>
      <td><input type="text" name="name" value="<?php echo $category['name'];?>" /></td>
    </tr>
    <tr>
      <td> Desc : </td>
      <td><input type="text" name="descp" value="<?php echo $category['descp'];?>" /></td>
    </tr>
    <tr>
      <td> Status </td>
      <td>
          <input 
                type="radio"
                name="status"
                value="A"
               />Show
        <input 
                type="radio"
                name="status"
                value="I"
                />Hide      
            
       
       </td>
    </tr>
    <tr>
      <td> created : </td>
      <td><input type="date" name="created" value="" /></td>
    </tr>
    <tr>
      <td> updated : </td>
      <td><input type="date" name="updated" value="" /></td>
    </tr>
    <tr>
      <td> &nbsp;</td>
      <td><input type="submit" name="sub" value=" add category "/></td>
    </tr>
  </table>   
  </form>
  </fieldset>




</body>

</html>
  <div class="column side">
  <?php require_once('includes/sidebar.php');?>
  </div>
  <div class="column middle">Column</div>
  <div class="column side">Column</div>
</div>
<?php require_once('includes/footer.php');?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>




</body