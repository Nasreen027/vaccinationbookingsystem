<?php
include_once('header.php');
if (!isset($_SESSION['Parent'])) {
    redirectWindow('signin.php');
}
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        
        .profile img {
            width: 13rem;
            height: 12rem;
            border-radius: 50%;
            margin-left: 3rem;
        }
        .w{
            width: 20rem;
            margin-left: 3rem;
        }
        .button{
            width: 20rem;
            margin-left: 3rem;
        }
    </style>
</head>
<body>
    <?php
    $user = $_SESSION['Parent'];
    foreach($user as $value){
        $p_ID = $value['parentID'];
        $name = $value['parentName'];
        $email = $value['parentEmail'];  
              
}
?>

    <div class="container h-100 bg-light rounded">
    <form action="" method="post" enctype="multipart/form-data">
    <div class="profile p-5">
        <img src="img/<?php echo $value['image'] ?>" class="img-fluid" alt="">
    </div>
  
<input type="hidden" name="id" value='<?php echo $p_ID ?>'>
        <div class="form-group w">
    <label for="" class='text-dark'>Update Username</label>
    <input type="text" name="name" value="<?php echo $name?>" class='form-control' >
    </div>

    <div class="form-group w mt-4">
    <label for="" class='text-dark'>Update Profile Picture</label>
    <input type="file" name="image" class='form-control' >
    </div>

    <div class="form-group w mt-4">
    <label for="" class='text-dark'>Update Email</label>
    <input type="email" name="email" value="<?php echo $email?>" class='form-control' >
    </div>
<button type='submit' name="edit" class='btn btn-primary button my-4'>Edit</button>
    </form>
    </div>
</body>
</html>