<?php
$con=mysqli_connect("localhost","root","LANETTEAM1");
?>
<style>
    #draggable { width: 150px; height: 150px; padding: 0.5em; }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js">
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <?php
    $q = $_REQUEST['db'];
    $select="show tables from $q";
    //echo $select;
    $sel=mysqli_query($con,$select);
    if(mysqli_num_rows($sel)>0)
    {
        ?>
        <option>---select---</option>
        <?php

                while($se=mysqli_fetch_row($sel))
        {
           ?>

<?php
            echo "<option value='".$se[0]."'>".$se[0]."</option>";

        }
    }
    else
    {
       // echo "not data found";
    }
?>

<?php
$q1 = $_REQUEST['tbl'];
$q2 = $_REQUEST['db1'];
$select1="show COLUMNS from $q1 from $q2";
//echo $select1;
$sel1=mysqli_query($con,$select1);
if(mysqli_num_rows($sel1)>0)
{
    ?>


    <ul id="s3" style="width: 20%;border-style: solid;height: 30%">
    <?php
    while($se1=mysqli_fetch_array($sel1))
    {
        ?>

        <li><?php echo $se1[0];?></li>

<?php
    }
    ?>
    </ul>

<?php
}
else
{
    //echo "not data found";
}

?>

<?php
$a=[];
$i=0;
$q11 = $_REQUEST['t'];
$q3 = $_REQUEST['d'];
$x=$_REQUEST['v'];
$qu="select $x from $q3.$q11 ";
//echo $select1;
$da=mysqli_query($con,$qu);
while($atr=mysqli_fetch_field($da))
{
    $a[$i]=$atr->name;
    $i++;
}
if(mysqli_num_rows($da)>0)
{
    while($s1=mysqli_fetch_array($da))
    {

 for($j=0;$j<$i;$j++)
       {
           echo $s1[$a[$j]]." ";

       }
       echo "<br>";
      // echo "<div>$s1[0]</div>";

   }

//             echo $s1[0];
//             ?>
<!--            <br>-->
<!--            --><?php
//             echo $s1[1];
//            ?>
<!--             <br>-->
<!--            --><?php
//        echo $s1[2];
//        ?>
<!--        <br>-->
<!--        --><?php
//        echo $s1[3];
//        ?>
<!--        <br>-->
<!--        --><?php
//        echo $s1[4];


}
else
{
   // echo "not data found";
}


?>
<script>
    $( function() {
        $( "#s3, #s4" ).sortable({
            connectWith: "#s3, #s4"
        }).disableSelection();
    } );

</script>
