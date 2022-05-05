<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/functions.php';
$select="SELECT * FROM `categories`";
$s=mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $delete="DELETE FROM `categories` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
   header("location:/Hospital/category/list.php");  }


?>
 
<div class="home">
    
<h1>list Page</h1>
<div class="container col-md-6 text-center">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>ACTION</th>
                </tr>
                <?php
foreach($s as $data){
                ?>
                <tr>
                    <td> <?php echo $data['id']?></td>
                    <td> <?php echo $data['name']?></td>
                    <td><a class="btn btn-info" href="/Hospital/category/add.php?edit=<?php echo $data['id']?>">Edit</a></td>
                    <td><a onclick="return confirm('Are You Sure?')" class="btn btn-danger" href="/Hospital/category/list.php?delete=<?php echo $data['id']?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
         
        
    </div>
</div>
    </div>


    <?php include '../shared/script.php';?>