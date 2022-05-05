<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/functions.php';


?>
 
<div class="home">
    <?php if(isset($_POST['send'])){
    $name=$_POST['name'];
    $insert="INSERT INTO `categories` VALUES (Null , '$name')";
    $i=mysqli_query($conn,$insert);
    testMessage($i,"Insert Category");
}

     $name='';
$update=false;
if(isset($_GET['edit'])){
    $update=true;
$id=$_GET['edit'];
$select="SELECT * FROM `categories`WHERE id=$id";
$ss=mysqli_query($conn,$select);
$data=mysqli_fetch_assoc($ss);
$name=$data['name'];

if(isset($_POST['update'])){
    $name=$_POST['name'];

$update="UPDATE `categories` SET `name`='$name' WHERE id =$id";
$u=mysqli_query($conn,$update);
header("location:/Hospital/category/list.php");
}



}
?>


<?php if($update): ?>
                    
    <h1>Update Page</h1>           
           <?php else :?>
           <h1>Add Page</h1>
           <?php endif; ?>

<div class="container col-md-6 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for=""> Name</label>
                    <input class="form-control" value="<?php echo $name ?>" name="name" placeholder="your name" type="text">
</div>
<?php if($update): ?>
                    
                    <button name="update" class="btn btn-primary btn-block w-50 mx-auto">Update Data</button>
           
           <?php else:?>
           <button name="send" class="btn btn-info btn-block w-50 mx-auto">Send Data</button>
           <?php endif; ?>
                </form>
        
    </div>
</div>
    </div>


    <?php include '../shared/script.php';?>