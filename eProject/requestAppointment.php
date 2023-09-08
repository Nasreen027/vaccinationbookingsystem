<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Appointement Requests</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">

                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT *
                        FROM children_details
                        INNER JOIN parent_login ON children_details.parentID = parent_login.parentID
                        INNER JOIN vaccine_details ON children_details.vaccineID = vaccine_details.vaccineID
                        INNER JOIN hospital_login ON children_details.hospitalID = hospital_login.hospitalID
                         where appointmentStatus = 'pending'");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">

                                    <td class="d-flex justify-content-around">
                                        <span class="flex-grow-1">
                                            <a href="childDetails.php" class="link-secondary">

                                                <?php echo ucfirst($row['parentName'])?> has requested to book  ' <?php echo ucfirst($row['vaccineName'])?>' at '<?php echo ucfirst($row['hospitalName'])?>' on <?php echo $row['vaccinationDate']?>

                                            </a>
                                        </span>
                                        <form method="post">
                                            <input type="hidden" name="child-appointment-id"
                                                value="<?php echo $row['childID']?>">
                                            <button class="approve-btn btn btn-secondary"
                                                name='child-appointment-approve-btn'
                                                onclick="animateRow(this)">Approve</button>
                                            <button class="reject-btn btn btn-light"
                                                name='child-appointment-reject-btn'
                                                onclick="rejectRow(this)">Reject</button>
                                        </form>

                                    </td>


                                </tr>


                                <?php
                        };

                                       if(empty($result)){
                            ?>
                                <tr>

                                    <td class="d-flex justify-content-center p-5">
                                    
                                            <p>
                                                No appointment requests

                                            </p>
                                       
                                    </td>
                                </tr>
                                <?php
                        }

                                       ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>