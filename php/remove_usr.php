<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    include "My_sql.php";

    $query="DELETE FROM `user_master` WHERE id=$id";
    $run=mysqli_query($conn,$query);

    $query1="DELETE FROM `rec_info` WHERE user_id=$id";
    $run1=mysqli_query($conn,$query1);

    echo "<script>location.href='display_usr.php'</script>";

}
?>
