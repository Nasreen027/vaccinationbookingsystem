<?php
include_once('header_admin.php');
if (!isset($_SESSION['Admin'])) {
    redirectWindow('signin.php');
};
?>

<!---------------------------
|
|ALL details of child page
|
---------------------------->
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4> Details of child</h4>

                        <form method="post">
                            <button class="btn bg-white text-black mb-2" name="sort-by-vaccination-date">Sort by
                                vaccination date</button>
                        </form>
                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>Child Name</td>
                                    <td>Gender</td>
                                    <td>Age</td>
                                    <td>Hospital Booked </td>
                                    <td>Vaccine </td>
                                    <td>Parent Name </td>
                                    <td>Date of Vaccination </td>
                                    <td>Appointment </td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                     function getSortedData($pdo)
{
    $query = $pdo->query("SELECT * FROM children_details 
                          INNER JOIN parent_login ON children_details.parentID = parent_login.parentID 
                          INNER JOIN vaccine_details ON children_details.vaccineID = vaccine_details.vaccineID 
                          INNER JOIN hospital_login ON children_details.hospitalID = hospital_login.hospitalID 
                          ORDER BY vaccinationDate ASC");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// Check if the "Sort by vaccination date" button is clicked
if (isset($_POST['sort-by-vaccination-date'])) {
    $result = getSortedData($pdo);
} else {
    // By default, get data without sorting
    $query = $pdo->query("SELECT *
    FROM children_details
    INNER JOIN parent_login ON children_details.parentID = parent_login.parentID
    INNER JOIN vaccine_details ON children_details.vaccineID = vaccine_details.vaccineID
    INNER JOIN hospital_login ON children_details.hospitalID = hospital_login.hospitalID
    ORDER BY children_details.childID ASC");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                    <th scope="row">
                                        <?php echo $row['childID'] ?>
                                    </th>

                                    <td>
                                        <?php echo $row['childName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['childGender'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['childAge'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['hospitalName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['vaccineName'] ?>
                                    </td>

                                    <td>
                                        <?php echo $row['parentName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['vaccinationDate'] ?>
                                    </td>
                                    

                                     <td class="d-flex">
      <?php echo $row['appointmentStatus'] ?>
      <div class="mx-auto">
        <i class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false"></i>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <form action="" method="post">
            <input type="hidden" name="childID" value="<?php echo $row['childID'] ?>">
            <button class="dropdown-item" name="childAppointmentApprove">Approve</button>
            <button class="dropdown-item" name="childAppointmentReject" >Reject</button>
          </form>
        </div>
      </div>
    </td>

                                </tr>


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
<script src="js/script.js"></script>

<?php
include('footer.php')
?>