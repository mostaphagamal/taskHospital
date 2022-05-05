<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/functions.php';
$select="SELECT * FROM `doctors`";
$s=mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id= $_GET['delete'];
    $delete="DELETE FROM `doctors` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
   header("location:/Hospital/doctors/list.php");  }


?>
 
<div class="home">
    
<h1>list Page</h1>
<div class="container col-md-8 text-center">
    <div class="card">
        <div class="card-body">
            <table class="table table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CATEGORY ID</th>
                    <th>ACTION</th>
                </tr>
                <?php
foreach($s as $data){
                ?>
                <tr>
                    <td> <?php echo $data['id']?></td>
                    <td> <?php echo $data['name']?></td>
                    <td> <?php echo $data['email']?></td>
                    <td> <?php echo $data['catgory_id']?></td>

                    <td><a class="btn btn-info" href="/Hospital/doctors/add.php?edit=<?php echo $data['id']?>">Edit</a></td>
                    <td><a onclick="return confirm('Are You Sure?')" class="btn btn-danger" href="/Hospital/doctors/list.php?delete=<?php echo $data['id']?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
         
        
    </div>
</div>
    </div>


    <?php include '../shared/script.php';?>