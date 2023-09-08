<?php
include_once('header_admin.php')
    ?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Parents Request</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>Parent Name</td>
                                    <td>Parent Email</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("SELECT * from parent_login");
                                $result = $query->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($result as $row) {
                                    ?>
                                    <tr class="tr-row">
                                        <th scope="row" class="id-column">
                                            <?php echo $row['parentID'] ?>
                                        </th>

                                        <td>
                                            <?php echo $row['parentName'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['parentEmail'] ?>
                                        </td>
                                        <td class="d-flex">
                                            <?php echo $row['parentStatus'] ?>
                                            <div class="mx-auto">
                                                <i class="fa fa-ellipsis-v" data-bs-toggle="dropdown" aria-expanded="false"
                                                    id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false"></i>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="statusID"
                                                            value="<?php echo $row['parentID'] ?>">
                                                        <button class="dropdown-item" name="parentApprove">Approve</button>
                                                        <button class="dropdown-item" name="parentReject">Reject</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>



                                    </tr>


                                    <?php
                                }
                                ;

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