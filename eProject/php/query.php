<?php
session_start();
include_once('models/config.php');
include_once("models/auth.php");
?>
<!-----------------------------------------------------------------------------------------------
|   php tag start for queries to update  admin  Information                                      |
|   [start]                                                                                      |  
------------------------------------------------------------------------------------------------->
<?php

if (isset($_POST['update_admin_info'])) {
    $admin_ID = $_POST['model-admin-ID'];
    $admin_name = $_POST['model-admin-name'];
    $admin_email= $_POST['modal-admin-email'];
    $admin_password= $_POST['modal-admin-password'];
            $query= $pdo -> prepare("update admins set adminName = :name,adminEmail = :email, adminPassword = :password where adminID = :_id");
            $query -> bindParam('name', $admin_name);
            $query -> bindParam('email', $admin_email);
            $query -> bindParam('password', $admin_password);
            $query -> bindParam('_id', $admin_ID);
            $query -> execute();
            echo "<script>
        location.assign('adminProfile.php')
        </script>";
        };
     


?>
<!-----------------------------------------------------------------------------------------------
|   php tag end for queries to update  admin  Information                                       |
|   [end]                                                                                       |  
------------------------------------------------------------------------------------------------->

<!-----------------------------------------------------------------------------------------------
|   php tag start for queries to update delete and add  hospital information  by admin           |
|   [start]                                                                                      |  
------------------------------------------------------------------------------------------------->
<?php
// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for update hospital information                                      |
//               [start]                                                      |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|
if (isset($_POST['update_hospital_info'])) {
    $name = $_POST['model-name'];
    $email = $_POST['model-email'];
    $location = $_POST['model-location'];
    $id = $_POST['model-id'];
    $query= $pdo -> prepare("update hospital_login set hospitalName = :name,hospitalEmail = :email ,hospitalLocation = :location where hospitalID = :_id");
            $query -> bindParam('name', $name);
            $query -> bindParam('email', $email);
            $query -> bindParam('location', $location);
            $query -> bindParam('_id', $id);
            $query -> execute();
            echo "<script>alert('hospital updated succesfully')</script>";
            header('Location: hospitalData.php');
    exit;
}
// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  update hospital information                                     |
//               [end]                                                        |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|


// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  add hospital                                                    |
//               [start]                                                      |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|
if (isset($_POST['insert-hospital-btn'])) {
    $hospital_name = $_POST['insert-hospital-name'];
    $hospital_email = $_POST['insert-hospital-email'];
    $hospital_location = $_POST['insert-hospital-location'];
    $hospital_password = $_POST['insert-hospital-password'];

    $query= $pdo -> prepare("INSERT into hospital_login(hospitalName,hospitalEmail,hospitalLocation,hospitalPassword) values(:hospital_name,:hospital_email,:hospital_location,:hospital_password)");
    $query -> bindParam('hospital_name', $hospital_name);
    $query -> bindParam('hospital_email', $hospital_email);
    $query -> bindParam('hospital_location', $hospital_location);
    $query -> bindParam('hospital_password', $hospital_password);
    $query -> execute();

    echo "<script>alert('hospital added succesfully')</script>";
                header('Location: hospitalData.php');
                exit;
}


// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  add hospital                                                    |
//               [end]                                                        |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|

// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  delete hospital                                                 |
//               [start]                                                      |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|

if (isset($_POST['delete_hospital_info'])) {
    $hospital_id = $_POST['hospital_id_delete'];
    $query = $pdo->prepare(" DELETE FROM hospital_login WHERE hospitalID = :id;");
    $query->bindParam('id', $hospital_id);
    $query->execute();
    echo "<script>alert('hospital deleted')</script>";
    redirectWindow('hospitalData.php');
    exit;
}

// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  delete hospital                                                 |
//               [end]                                                        |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|
?>
<!-----------------------------------------------------------------------------------------------
|   php tag end for queries to update delete and add  hospital information  by admin             |
|   [end]..                                                                                      |  
------------------------------------------------------------------------------------------------->

<!-----------------------------------------------------------------------------------------------
|   query for status column of parent table      (Registeration Approval)                        |
|   [start]..                                                                                    |  
------------------------------------------------------------------------------------------------->

<?php
// set parent status = approve in database table when it is approved by admin  [start]//

if (isset($_POST['parentApprove'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'approved' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //

// set parent status = reject in database table when it is rejected by admin  [start]//

if (isset($_POST['parentReject'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'rejected' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //
?>
<!-----------------------------------------------------------------------------------------------
|   query for status column of parent table                                                      |
|   [end]..                                                                                      |  
------------------------------------------------------------------------------------------------->


<!-----------------------------------------------------------------------------------------------
|   query for status column of hospital table      (Registeration Approval)                      |
|   [start]..                                                                                    |  
------------------------------------------------------------------------------------------------->

<?php
// set hospital status = approve in database table when it is approved by admin  [start]//

if (isset($_POST['hospitalApprove'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'approved' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //

// set hospital status = reject in database table when it is rejected by admin  [start]//

if (isset($_POST['hospitalReject'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'rejected' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
//     [end]     //

?>
<!----------------------------------------------------------------------------------------------
|   query for status column of hospital table                                                  |
|   [end]..                                                                                    |  
----------------------------------------------------------------------------------------------->

<!-----------------------------------------------------------------------------------------------
|   query for appointment status column of child table      (Registeration Approval)             |
|   [start]..                                                                                    |  
------------------------------------------------------------------------------------------------->

<?php
// set appointment status = approve in database table when it is approved by admin  [start]//

if (isset($_POST['childAppointmentApprove'])) {
    $id = $_POST['childID'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'approved' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //

// set appointment status = reject in database table when it is rejected by admin  [start]//

if (isset($_POST['childAppointmentReject'])) {
    $id = $_POST['childID'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'rejected' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
//     [end]     //

?>
<!---------------------------------------------------------------------------------------------
|   query for appointment status column of child table                                         |
|   [end]..                                                                                    |  
----------------------------------------------------------------------------------------------->


<!---------------------------------------------------------------------------------------------
|   query for approve or reject registeration and appointment request in requestPage           |
|   [start]..                                                                                  |  
----------------------------------------------------------------------------------------------->
<?php

//approve parent registeration on notification page query [start]//
if (isset($_POST['notification-parent-approve-btn'])) {
    $id = $_POST['notification-parent-id'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'approved' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    redirectWindow('requestPage.php');
    exit;
}
//     [end]     //

//reject parent registeration on notification page query [start]//
if (isset($_POST['notification-parent-reject-btn'])) {
    $id = $_POST['notification-parent-id'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'rejected' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    redirectWindow('requestPage.php');
    exit;
}
//     [end]     //

//apporve hospital  registeration on notification page query [start]//
if (isset($_POST['notification-hospital-approve-btn'])) {
    $id = $_POST['notification-hospital-id'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'approved' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    redirectWindow('requestPage.php');
    exit;
}
//     [end]     //

//reject hospital registeration on notification page query [start]//
if (isset($_POST['notification-hospital-reject-btn'])) {
    $id = $_POST['notification-hospital-id'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'rejected' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    redirectWindow('requestPage.php');
    exit;
}
//     [end]     //
//apporve child  appointment on notification page query [start]//
if (isset($_POST['child-appointment-approve-btn'])) {
    $id = $_POST['child-appointment-id'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'approved' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    redirectWindow('requestPage.php');
    exit;
}
//     [end]     //

//reject child  appointment on notification page query [start]//
if (isset($_POST['child-appointment-reject-btn'])) {
    $id = $_POST['child-appointment-id'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'rejected' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    redirectWindow('requestPage.php');
    exit;
}
//     [end]     //


?>
<!---------------------------------------------------------------------------------------------
|   query for approve or reject registeration and appointment request in requestPage           |
|   [end]..                                                                                    |  
----------------------------------------------------------------------------------------------->
<?php

//parent
// redirectWindow('signup.php');

$authModel = new Auth();

if (isset($_POST['signup'])) {
    if (empty($_POST['name'])) {
        redirectWindow('signup.php?error=name is required');
    }
    if (empty($_POST['email'])) {
        redirectWindow('signup.php?error=email is required');
    }
    if (empty($_POST['password'])) {
        redirectWindow('signup.php?error=password is required');
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //checking if user already exists
    $user = $authModel->findUserWithEmailParent($email, $pdo);
    if ($user) {
        redirectWindow("signup.php?error=Email already exists");
    }

    $authModel->register($name, $email, $password, $pdo);
    $user = $authModel->findUserWithEmailParent($email, $pdo);

    if ($user) {
        $_SESSION['USER'] = $user;
        redirectWindow('signin.php');
    } else {
        redirectWindow("signup.php?error=Something went wrong");
    }
}

if (isset($_POST['signin'])) {
    if (empty($_POST['email'])) {
        redirectWindow('signin.php?error=email is required');
    }
    if (empty($_POST['password'])) {
        redirectWindow('signin.php?error=password is required');
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($_POST['role'] == 'Parent') {
        $user = $authModel->findUserWithEmailParent($email, $pdo);
        if (password_verify($password, $user[0]['parentPassword'])) {
            $_SESSION['Parent'] = $user;
            redirectWindow('ParentPage.php');
        } else {
            redirectWindow('signin.php?error=invalid credentials');
        }
    };

    if ($_POST['role'] == 'Hospital') {
        $user = $authModel->findUserWithEmailHospital($email, $pdo);
        if (password_verify($password, $user[0]['hospitalPassword'])) {
            $_SESSION['Hospital'] = $user;
            redirectWindow('vaccineData.php');
        } else {
            redirectWindow('signin.php?error=invalid credentials');
        }
    }

    if ($_POST['role'] == 'Admin') {
        $user = $authModel->findUserWithEmailAdmin($email, $pdo);
        if ($_SESSION['Admin'] = $user) {
            redirectWindow('hospitalData.php');
        } else {
            redirectWindow('signin.php?error=invalid credentials');
        };
    };
};

//signup for hospital

if (isset($_POST['signup2'])) {
    if (empty($_POST['name'])) {
        redirectWindow('signupForHospital.php?error=name is required');
    }
    if (empty($_POST['email'])) {
        redirectWindow('signupForHospital.php?error=email is required');
    }
    if (empty($_POST['password'])) {
        redirectWindow('signupForHospital.php?error=password is required');
    }
    if (empty($_POST['location'])) {
        redirectWindow('signupForHospital.php?error=location is required');
    }
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $location = $_POST['location'];

    //checking if user already exists
    $user = $authModel->findUserWithEmailHospital($email, $pdo);
    if ($user) {
        redirectWindow("signupForHospital.php?error=Email already exists");
    }

    $authModel->registerHospital($name, $email, $password, $location, $pdo);
    $user = $authModel->findUserWithEmailHospital($email, $pdo);

    if ($user) {
        $_SESSION['Hospital'] = $user;
        redirectWindow('signin.php');
    } else {
        redirectWindow("signupForHospital.php?error=Something went wrong");
    }
}

if (isset($_POST['submit'])) {
    $childName = $_POST['name'];
    // $parentName = $_POST['parent-name'];
    $phone = $_POST['phone'];
    $dateOfBirth = $_POST['dob'];
    $vaccine = $_POST['vaccineID'];
    $hospital = $_POST['hospitalID'];
    $appointment = $_POST['appointment'];
    $parentID = $_POST['parentID'];
    $Gender = $_POST["gender"];

    $user = $authModel->childFormSubmit($childName, $Gender, $dateOfBirth, $hospital, $vaccine, $appointment, $parentID, $phone, $pdo);
}

?>

<!-- //hospital// -->

<?php
if (isset($_POST['update_vaccine_info'])) {
    $vaccineName = $_POST['model-vaccine-name'];
    $vaccineStock = $_POST['model-vaccine-stock'];
    // $location = $_POST['model-location'];
    $vaccineId = $_POST['model-vaccine-id'];

    $query = $pdo->prepare("update vaccine_details set vaccineName = :name,vaccineStock = :stock where vaccineID = :_id");
    $query->bindParam('name', $vaccineName);
    $query->bindParam('stock', $vaccineStock);
    // $query -> bindParam('location', $location);
    $query->bindParam('_id', $vaccineId);
    $query->execute();
    echo "<script>alert('Vaccine updated succesfully')</script>";
    redirectWindow('vaccineData.php');
    exit;
}

if (isset($_POST['insert-vaccine-btn'])) {
    $vaccine_name = $_POST['insert-vaccine-name'];
    $vaccine_stock = $_POST['insert-vaccine-stock'];
    // $hospital_location = $_POST['insert-hospital-location'];
    // $hospital_password = $_POST['insert-hospital-password'];

    $query = $pdo->prepare("INSERT into vaccine_details(vaccineName,vaccineStock) values(:vaccine_name,:vaccine_stock)");
    $query->bindParam('vaccine_name', $vaccine_name);
    $query->bindParam('vaccine_stock', $vaccine_stock);
    $query->execute();

    echo "<script>alert('Vaccine added succesfully')</script>";
    redirectWindow('vaccineData.php');
    exit;
}

if (isset($_POST['delete_vaccine_info'])) {
    $vaccine_id = $_POST['vaccine_id_delete'];
    $query = $pdo->prepare(" DELETE FROM vaccine_details WHERE vaccineID = :id;");
    $query->bindParam('id', $vaccine_id);
    $query->execute();
    echo "<script>alert('Vaccine deleted')</script>";
    redirectWindow('vaccineData.php');
    exit;
};

;

if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $image = $_FILES['image']['name'];
    $ImgSize = $_FILES['image']['size'];
    $ImgTmpName = $_FILES['image']['tmp_name'];
    $ImgExt = pathinfo($image, PATHINFO_EXTENSION);
    $destinationOfImg = 'img/' . $image;

    if ($ImgSize <= 48000000) {
        if ($ImgExt == 'jpg' || $ImgExt == 'jpeg') {
            if (move_uploaded_file($ImgTmpName, $destinationOfImg)) {
                $query = $pdo->prepare('update parent_login set parentName = :name,
                parentEmail = :email ,image = :img where parentID = :id');
                $query->bindParam('name', $name);
                $query->bindParam('email', $email);
                $query->bindParam('img', $image);
                $query->bindParam('id', $id);
                $query->execute();
                echo '<script>alert("Profile Updated")</script>';
            } else {
                echo "<script>alert('error')</script>";
            }
        } else {
            echo "<script>alert('error')</script>";
        }
    } else {
        echo "<script>alert('error')</script>";
    }
}