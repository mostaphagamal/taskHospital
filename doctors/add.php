<?php
include '../shared/head.php';
include '../shared/nav.php';
include '../genral/env.php';
include '../genral/functions.php';

?>
 
<div class="home">
    <?php
    $select="SELECT * FROM `doctors`";
    $cat=mysqli_query($conn,$select);
    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
       $catId=$_POST['catId'];
        $insert="INSERT INTO `doctors` VALUES (NULL , '$name' , '$email' , $catId) ";
        $i=mysqli_query($conn,$insert);
        testMessage ($i,"Insert Doctor");
    }
    
    $name='';
    $email='';
    $category='';
    $update=false;
    if(isset($_GET['edit'])){
        $update=true;
    $id=$_GET['edit'];
    $select="SELECT * FROM `doctors`WHERE id=$id";
    $ss=mysqli_query($conn,$select);
    $data=mysqli_fetch_assoc($ss);
    $name=$data['name'];
    $name=$data['email'];
    $category=$data['catgory_id'];
    if(isset($_POST['update'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $catId=$_POST['catId'];
    
    $update="UPDATE `doctors` SET `name`='$name' , email='$email' ,catgory_id=$catId WHERE id =$id";
    $u=mysqli_query($conn,$update);
    header("location:/Hospital/doctors/list.php");
    }
    
    
    
    }
    
    ?>

<?php if($update): ?>
    <h1>update Page</h1>
<?php else : ?>
    <h1>Add Page</h1>
    <?php endif ?>
<div class="container col-md-6 text-center">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for=""> Name</label>
                    <input class="form-control" name="name" placeholder="your name" type="text" value="<?php echo $name ?>">
</div>
<div class="form-group">
                    <label for=""> E-mail</label>
                    <input value="<?php echo $email ?> " class="form-control" name= "email" placeholder="your E-mail" type="text">
                    </div>

                
<div class="form-group">
                    <label for=""> Category ID :<?php echo $category ?></label>
                    <select  class="form-control" name="catId">
                        <?php foreach($cat as $data){ ?>
                        <option value="<?php echo $data['id']; ?>">  <?php echo $data['name']; ?> </option>
                        <?php } ?>
                    </select>
                
                    </div>
                    <?php if($update): ?>
                    <button name="update" class="btn btn-primary btn-block w-50 mx-auto">Update Data</button>
<?php else : ?>
                    <button name="send" class="btn btn-info btn-block w-50 mx-auto">Send Data</button>
<?php endif ?>
            </form>
        
    </div>
</div>
    </div>


    <?php include '../shared/script.php';?>