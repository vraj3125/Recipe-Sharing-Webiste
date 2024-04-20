<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    include "My_sql.php";

    $query1="DELETE FROM `rec_info` WHERE id=$id";
    $run1=mysqli_query($conn,$query1);

    $query="DELETE FROM `ratings` WHERE rec_id=$id";
    $run=mysqli_query($conn,$query);

    echo "<script>location.href='display_rec.php'</script>";
}
?>
