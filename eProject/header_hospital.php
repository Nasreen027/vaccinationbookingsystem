<?php
include('php/query.php');
if (!isset($_SESSION['Hospital'])) {
    redirectWindow('signin.php');
}
// Check if 'Parent' session variable is set
 
$user = $_SESSION['Hospital'];

foreach($user as  $value){
  $U_ID =   $value['hospitalID'];
$query = $pdo->prepare("SELECT * FROM hospital_login WHERE hospitalID = :hospitalID AND hospitalStatus = 'approved'");
$query->bindParam(':hospitalID',  $U_ID);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if (empty($result)) {
ECHO "<script>alert('Your approval is pending .Please wait...')
location.assign('signin.php');
</script>";    

}     
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Vaccination Booking System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h6 class="text-primary"><i class="fa fa-hashtag me-2"></i>VaccinationBookingSystem</h6>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <?php
                        $user = $_SESSION['Hospital'];
                        foreach ($user as $value) {
                            $hospitalID = $value['hospitalID'];
                            $hospitalName = $value['hospitalName'];
                            // echo '<script>alert("' . $hospitalID . '")</script>'
                        ?>
                            <?php
                            $query = $pdo->prepare("Select hospitalName from hospital_login where hospitalID = :getHospitalID");
                            $query->bindParam("getHospitalID", $hospitalID);
                            $query->execute();
                            $result = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                            ?>
                                <h6 class="mb-0"><?php echo ucfirst($row['hospitalName']) ?></h6>

                                <span>Hospital</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="vaccineData.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Vaccines</a>
                    <a href="patients.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Patients</a>
                    <a href="signin.php" class="dropdown-item">Sign In</a>
                    <a href="signup.php" class="dropdown-item">Sign Up</a>
                    <a href="logout.php" class="dropdown-item" name='logout'>Logout</a>

                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notifications</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <?php
                                $query = $pdo->prepare("SELECT *
                        FROM children_details
                        INNER JOIN parent_login ON children_details.parentID = parent_login.parentID
                        INNER JOIN vaccine_details ON children_details.vaccineID = vaccine_details.vaccineID
                        INNER JOIN hospital_login ON children_details.hospitalID  = hospital_login.hospitalID
                         where appointmentStatus = 'approved' AND hospitalName = :getHospitalName");
                                $query->bindParam("getHospitalName", $hospitalName);
                                $query->execute();
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                // echo '<script>alert("' . $hospitalID . '")</script>';

                                foreach ($result as $row) {
                            ?>
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0"> <?php echo ucfirst($row['childName']) ?> has an appointment of' <?php echo ucfirst($row['vaccineName']) ?>' on <?php echo $row['vaccinationDate'] ?></h6>
                                    <!-- <small>15 minutes ago</small> -->
                                </a>
                            <?php
                                };
                            ?>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"><?php echo ucfirst($row['hospitalName']) ?></span>
                            <?php
                            // echo '<script>alert("' . $hospitalID . '")</script>';
                            ?>
                    <?php
                            }
                        }
                    ?>
                        </a>
                        <!-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="hospitalMyProfile.php" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="logout.php" class="dropdown-item">Log Out</a>
                        </div> -->
                    </div>
                </div>
            </nav>