<?php
include_once('header_admin.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Vaccine Details  </h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>Vaccine Name</td>
                                    <td>Vaccine Stock</td>
                                 
                                    

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * FROM vaccine_details  ");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                    <th scope="row">
                                        <?php echo $row['vaccineID'] ?>
                                    </th>

                                    <td>
                                        <?php echo $row['vaccineName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['vaccineStock'] ?>
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
