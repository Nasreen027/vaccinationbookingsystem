<?php
include_once('header.php');
if (!isset($_SESSION['Parent'])) {
    redirectWindow('signin.php');
}
;
?>

<div class="bg-light rounded h-100 p-4 mt-5">
    <h6 class="mb-4">Child Details</h6>
    <form action="" method="post">
        <div class="row mb-3">

            <?php
            $user = $_SESSION['Parent'];
            foreach ($user as $value) {
                ?>
                <div class="col-sm-10">
                    <input type="hidden" name="parentID" value="<?php echo $value['parentID'] ?>" class="form-control">
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Child Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="inputEmail3" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Guardian Name</label>
            <div class="col-sm-10">
                <input type="text" name="parent-name" class="form-control" id="inputPassword3" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="number" name="phone" class="form-control" id="inputPassword3" required>
            </div>
        </div>

        <div class="row my-4">
            <!-- <form action="" method='post'> -->
            <label class="col-md-3 col-form-label">Gender</label>
            <div class="col-md-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="other" value="other" required>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
            <!-- <button type='submit'>submit</button>
        </form> -->
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="birthdate">Enter your age:</label>
                <input class="form-control" type="number" name="dob" required>
                <!-- 
                <input class="form-control" type="date" name="dob" id="birthdate" required>
                <div id="result" class="mb-3 mt-2"></div> -->
            </div>

            <div class="col-md-6">
                <label for="birthdate">Prefer Appointment Date:</label>
                <input type="date" class="form-control" name="appointment" id="appointment" required>
                <div id="result2" class="mb-3"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="hospitalID">
                        <option selected>Choose Hospital</option>
                        <?php
                        $query = $pdo->query('SELECT * FROM hospital_login');
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($result as $value) {
                            ?>
                            <option value="<?php echo $value['hospitalID'] ?>"><?php echo $value['hospitalName'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label for="floatingSelect">Select hospital</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" name="vaccineID">
                        <option selected>Choose Vaccine</option>
                        <?php



                        $query = $pdo->query('SELECT * FROM vaccine_details');
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($result as $value) {
                            ?>
                            <option value="<?php echo $value['vaccineID'] ?>"><?php echo $value['vaccineName'] ?></option>
                            <?php
                        }

                        ?>

                    </select>
                    <label for="floatingSelect">Select vaccine</label>
                </div>
            </div>
        </div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

  
</div>

<!-- Footer Start -->
<?php
include('footer.php')
    ?>

<!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="js/app.js"></script>
</body>

</html>