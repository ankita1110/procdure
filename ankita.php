<?php
include('con.php');
include('storep_insert.php');
$id=$_REQUEST['up'];

$sq="select name,city from std where id=".$id;
$sel=mysqli_query($conn,$sq);
$se=mysqli_fetch_array($sel);
$n=$_REQUEST['fname'];
$c=$_REQUEST['city'];
//echo $se['name']."<br>";
//echo $se['city'];

?>



<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class=" container col-sm-4 card border border-primary"">

<form method="post" action="#">
full name
    <input type="text" name="fname" value="<?php echo $se['name'];?>">
    <br>



 city
        <input type="text" name="city" value="<?php echo $se['city'];?>">
        <br>

   <input type="submit" name="submit" value="submit">
      <input type="submit" name="update" value="update">


</form>

</div>

<?php

 include('disply.php');
?>


</body>
</html>
<?php
     if(isset($_REQUEST['update']))
     {
        $s="update std set name='$n',city='$c' where id=".$id;
        echo $s;
        $es=mysqli_query($conn,$s);
        header('location:ankita.php');
     }
     if(isset($_REQUEST['submit']))
     {
         $result=insertstd($n,$c,"0");
      		if($result==1)
      		{
      			header('location:ankita.php');
      		}
        //include('insert.php');
     }


?>

