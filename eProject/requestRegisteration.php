<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Registeration Requests</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">

                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * from parent_login where parentStatus = 'pending'");
                        $resultParent = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($resultParent as $row){
                        ?>
                                <tr class="tr-row">

                                    <td class="d-flex justify-content-around">
                                        <span class="flex-grow-1">
                                            <a href="parentRequest.php" class="link-secondary">

                                                <?php echo ucfirst($row['parentName'])?> has requested for registeration

                                            </a>
                                        </span>
                                        <form method="post">
                                            <input type="hidden" name="notification-parent-id"
                                                value="<?php echo $row['parentID']?>">
                                            <button class="approve-btn btn btn-secondary"
                                                name='notification-parent-approve-btn'
                                                onclick="animateRow(this)">Approve</button>
                                            <button class="reject-btn btn btn-light"
                                                name='notification-parent-reject-btn'
                                                onclick="rejectRow(this)">Reject</button>
                                        </form>

                                    </td>


                                </tr>


                                <?php
                        };

                                       ?>
                                <?php
                        $query = $pdo->query("SELECT * from hospital_login where hospitalStatus = 'pending'");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">

                                    <td class="d-flex justify-content-around">
                                        <span class="flex-grow-1">
                                            <a href="hospitalData.php" class="link-secondary">
                                                <?php echo ucfirst($row['hospitalName'])?> hospital has requested for
                                                registeration
                                            </a>
                                        </span>
                                        <form method="post">
                                            <input type="hidden" name="notification-hospital-id"
                                                value="<?php echo $row['hospitalID']?>">
                                            <button class="approve-btn btn btn-secondary"
                                                name='notification-hospital-approve-btn'
                                                onclick="approveRow(this)">Approve</button>


                                            <button class="reject-btn btn btn-light"
                                                name='notification-hospital-reject-btn'
                                                onclick="rejectRow(this)">Reject</button>
                                        </form>
                                    </td>

                                </tr>


                                <?php
                        }if(empty($result) && empty($resultParent) ){
                            ?>
                                <tr>

                                    <td class="d-flex justify-content-center p-5">
                                        
                                            <p>
                                                No registeration requests

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