<?php
$con=mysqli_connect("localhost","root","LANETTEAM1");

?>
<style>
    .ax {
        border: 0 none;
        color: black;
        background: gold;
        font-size: 20px;
        font-weight: bold;
        padding: 2px 10px;
        width: 378px;
        *width: 350px;
        *background: #58B14C;
    }

</style>
<!--    <script src="https://code.jquery.com/jquery-1.12.4.min.js">-->
<!--    </script>-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<form method="post">


        DataBase :
        <select name="s1" class="ax" id="s1">
            <option>-------select---------</option>
            <?php
                $r="show databases";
            $sel=mysqli_query($con,$r);
            if(mysqli_num_rows($sel)>0)
            {
                while($se=mysqli_fetch_array($sel))
            {
            ?>

            <option><?php echo $se['Database'];?></option>
        <?php }
        }
        ?>


        </select>

        Table :

        <select name="s2" class="ax" id="s2">

            </select>
<br>


        <ul id="s3">




<!--                one-->
<!---->
<!--                <select name="s3" id="s3">    </select>-->


        </ul>



<!---->
<!--            <input type="button" name="b1" id="b1"  value=">">-->
<!--            <input type="button" name="b2" id="b2"  value=">>">-->
<!--            <input type="button" name="b3" id="b3"  value="<">-->
<!--            <input type="button" name="b4" id="b4"  value="<<">-->
<!--            <input type="button" name="b4" id="b5"  value="up">-->
<!--            <input type="button" name="b4" id="b6"  value="Down">-->
<!---->


       <ul id="s4" style="width: 20%;border-style: solid;height: 30%">

       </ul>
<br>
<!--        <select name="s4" id="s4" multiple>-->
<!--                    </select>-->




            <input type="button" value="go" name="submit" id="go">
            <div id="s5"></div>
        </form>





<script>
    $(document).ready(function(){

        $("#s1").change(function(){

            // var s="";
            // alert("hi");
            //$s=$_REQUEST['getd'];
            var selecteddata = $("#s1").val();

             // alert(selecteddata);
              $.ajax({
                  type: "POST",
                  url: "table.php?db="+selecteddata,
                  data: { showdata : selecteddata } ,

                  success: function(data)  {

                     //alert(data);
                    $("#s2").html(data);
                 }
             });
        });

        $("#s2").change(function(){

            // var s="";
            // alert("hi");
            //$s=$_REQUEST['getd'];
            var selecteddata = $("#s1").val();
            var selecteddata1 = $("#s2").val();
           // alert(selecteddata1);

            // alert(selecteddata);
            $.ajax({
                type: "POST",
                url: "table.php?tbl="+selecteddata1+'&db1='+selecteddata,
                data: { showdata1 : selecteddata1 } ,

                success: function(data)  {

                    //alert(data);
                    $("#s3").html(data);
                }
            });
        });

        // $(function() {
        //     $( "#s3" ).draggable();
        // });

        // $('#b1').click(
        //     function() {
        //         $('#s3 > option:selected').appendTo('#s4');
        //
        //     });


        // $(function() {
        //     $( "#draggable ul li" ).draggable();
        //     $( "#droppable" ).droppable({
        //         drop: function( event, ui ) {
        //             $( this )
        //                 .addClass( "ui-state-highlight" )
        //                 .find( "ul" )
        //                 .html( "Dropped!" );
        //         }
        //     });
        // } );

        $('#b2').click(
            function() {
                $('#s3 > option').appendTo('#s4');

            });

        $('#b3').click(
            function() {
                $('#s4 > option:selected').appendTo('#s3');

            });

        $('#b4').click(
            function() {
                $('#s4 > option').appendTo('#s3');

            });


        $('#b5').click(
            function() {
                $('#s4 > option:selected').each(function (i, selected) {
                    $(this).insertBefore($(this).prev());
                });

            });

        $('#b6').click(
            function() {
                $('#s4 > option:selected').each(function (i, selected) {
                    $(this).insertAfter($(this).next());
                });

            });

        // $('#go').click(
        //     function() {
        //         var ss = $("#s4").val();
        //        // var sb+=ss;
        //         $('#s5').html(ss);
        //     });

        $("#go").click(function(){

            // var s="";
            // alert("hi");
            //$s=$_REQUEST['getd'];
            var ss1="";
            var selecteddata2 = $("#s1").val();
            var selecteddata3 = $("#s2").val();
            var se=$("#s4 li").get();
            for(var i=0;i<se.length;i++){
                if(ss1==""){
                    ss1+=se[i].innerHTML;
                }
                else
                {
                    ss1=ss1+","+se[i].innerHTML;                }

            }
           // alert(ss1);

            // alert(selecteddata);
            $.ajax({
                type: "POST",
                url: "table.php?v="+ss1+'&d='+selecteddata2+'&t='+selecteddata3,
                data: { showdata1 : ss1 } ,

                success: function(data)  {

                    //alert(data);
                    $("#s5").html(data);
                }
            });
        });

    });

</script>