<?php
include_once('header_admin.php');
if (!isset($_SESSION['Admin'])) {
    redirectWindow('signin.php');
}
;
?>

<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>My Profile</h4>
                    </div>
                    <div class="p-3 ">
                        <table>
                           
                            <tbody>
                                <?php
                                 $user = $_SESSION['Admin'];

               
                        foreach($user as $row){

                        ?>
                        
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" readonly value="<?php echo $value['adminName'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">

    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" readonly value="<?php echo $value['adminEmail'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" readonly class="form-control" value="<?php echo $value['adminPassword'] ?>" id="exampleInputPassword1">
  </div>
  
  <button class="btn btn-light edit-btn " data-bs-toggle="modal"
                                            data-bs-target="#update-admin-modal<?php echo $row['adminID']  ?>">
                                           Update
                                        </button>
                           
                                        <!-------------------------------------------------
                                        |                                                 |
                                        | modal for update hospital information           | 
                                        | [start]                                         |
                                        |                                                 |      
                                        -------------------------------------------------->
                                <div class="modal" id="update-admin-modal<?php echo $row['adminID'] ?>">
                                    <div class="modal-dialog modal-xl bg-light ">
                                        <div class="modal-content bg-light">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Information</h4>
                                                <button type="button" class="btn-close  bg-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form method="post" action="" enctype="multipart/form-data">

                                                <input value="<?php echo $row['adminID'] ?>"
                                                                name="model-admin-ID"
                                                                class="form-control" type="hidden">
                                                   
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['adminName'] ?>"
                                                                id="modal-category-name" name="model-admin-name"
                                                                class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['adminEmail'] ?>"
                                                                 name="modal-admin-email"
                                                                class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-sm-2 col-form-label">Password</label>
                                                        <div class="col-sm-10">
                                                            <input value="<?php echo $row['adminPassword'] ?>"
                                                              name="modal-admin-password"
                                                                class="form-control" type="text">
                                                        </div>
                                                    </div>




                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-dark text-white"
                                                            name="update_admin_info">
                                                            Update</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                        <!-------------------------------------------------
                                        |                                                 |
                                        | modal for update hospital information           | 
                                        | [end]                                           |
                                        |                                                 |      
                                        -------------------------------------------------->
                                      
                                <?php
                        };

                                       ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include('footer.php')
?>