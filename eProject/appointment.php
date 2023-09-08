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
    <title>Appointment</title>
</head>

<body>
    <div class="bg-light rounded h-100 p-4 mt-5">
        <h6 class="mb-3">Appointment</h6>
        <?php

        $user = $_SESSION['Parent'];

        foreach ($user as $value) {
            $parentID = $value['parentID'];
            $query = $pdo->prepare("SELECT * FROM children_details WHERE parentID = :parentID");
            $query->bindParam(':parentID', $parentID);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $child) {
                if ($child['appointmentStatus'] == 'approved') {
                    // echo '<script>alert("hello")</script>';
                    ?>
                    <spen>
                        <b>
                        <?php echo $child['childName'] . ' ' . $value['parentName'] . ', you are appointed for ' . $child['vaccinationDate'] . '.' ?>
                        </b>
                    </spen>
                    <?php
                } 
                else if($child['appointmentStatus'] == 'rejected'){
                    ?>
                    <h6 class="h6">We are sorry, your appointment is rejected for some reason.</h6>
                    <?php
                }
                else {
                    ?>
                    <h6 class="h6">your appointment is on pending.</h6>
                    <?php
                }
          
        ?>
        <?php
        $hospitalID = $child['hospitalID'];
        // echo '<script>alert("'.$hospitalID.'")</script>';
        $query = $pdo->prepare('select * from hospital_login where hospitalID = :h_ID');
        $query->bindParam('h_ID', $hospitalID);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
            $hospitalName = $value['hospitalName'];
            // echo '<script>alert("'.$hospitalName.'")</script>';
        
        }
        ?>
        <?php
        $vaccineID = $child['vaccineID'];
        // echo '<script>alert("'.$vaccineID.'")</script>';
        $query = $pdo->prepare('select * from vaccine_details where vaccineID = :v_ID');
        $query->bindParam('v_ID', $vaccineID);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $value) {
            $vaccineName = $value['vaccineName'];
            // echo '<script>alert("'.$hospitalName.'")</script>';
        
        }
        ?>
          <?php
                $user = $_SESSION['Parent'];
                foreach ($user as $value) {
                    $parentID = $value['parentID'];

                    $query = $pdo->prepare("SELECT * FROM children_details where parentID = :parentID AND appointmentStatus = 'approved'");
                    $query->bindParam('parentID', $parentID, );
                    $query->execute();
                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        ?>
        <div class="container p-5 row mt-3">
            <div class='col-md-6'>

                <h6>Patient Name</h6>
                <h6>Gender</h6>
                <h6>Age</h6>
                <h6>vaccination Date</h6>
                <h6>Hospital</h6>
                <h6>Vaccine</h6>
                <h6>contact</h6>
            </div>

            <div class='col-md-6'>
              
                        <h6>
                            <?php echo $row['childName'] . ' ' . $value['parentName'] ?>
                        </h6>
                        <h6>
                            <?php echo $row['childGender'] ?>
                        </h6>
                        <h6>
                            <?php echo $row['childAge'] ?>
                        </h6>

                        <h6>
                            <?php echo $row['vaccinationDate'] ?>
                        </h6>
                        <h6>
                            <?php echo $hospitalName ?>
                        </h6>
                        <h6>
                            <?php echo $vaccineName ?>
                        </h6>
                        <h6>
                            <?php echo $row['contact'] ?>
                        </h6>

                        <?php
                    }
                }
                ;  }
            }

                ?>
            </div>
        </div>
    </div>
</body>

</html>