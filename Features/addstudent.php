<?php
include("server.php");

if (empty($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Student Info</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />

    <!-- Core theme CSS-->
    <link href="assets/css/style.css" rel="stylesheet" />

    <!-- Jquery scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>

<body>
    <main>
        <!-- <a href="addStudent.php" class="add-btn">Add Student</a> -->

        <form method="post" action="" enctype="multipart/form-data">
            <a href="javascript:history.back()" class="back-btn">Back</a>
            <button type="submit" name="addStudent" class="submit-btn">Save</button>

            <div class="row">
                <div class="col-img">
                    <div class="img-container">
                        <img src="assets/img/favicon.png" class="student-img">

                        <label class="file-upload">
                            <input type="file" name="file" id="file-upload" />
                            <i class="bi bi-file-image"></i>
                            <span id="file-selected">Upload</span>
                        </label>
                    </div>
                </div>

                <div class="col-center">
                    <label for="">Name</label>
                    <input type="text" name="firstName" placeholder="First Name">

                    <input type="text" name="lastName" placeholder="Last Name">

                    <label for="course">Course</label>
                    <select name="course">
                        <?php
                        $query = "SELECT * FROM course";
                        $result = mysqli_query($db, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $course = $row['courseCode'];

                            echo "<option value='$course'>$course</option>";
                        }
                        ?>
                    </select>

                    <label for="college">College</label>
                    <select name="college">
                        <?php
                        $query = "SELECT * FROM college";
                        $result = mysqli_query($db, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $college = $row['collegeName'];

                            echo "<option value='$college'>$college</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-right">
                    <label for="year">Year</label>
                    <select name="year">
                        <?php
                        $query = "SELECT * FROM year";
                        $result = mysqli_query($db, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $year = $row['year'];

                            echo "<option value='$year'>$year</option>";
                        }
                        ?>
                    </select>

                    <label for="gender">Gender</label>

                    <div class="radio-btns">
                        <input type="radio" name="gender" id="male" value="Male">
                        <label for="male">Male</label>

                        <input type="radio" name="gender" id="female" value="Female">
                        <label for="female">Female</label>
                    </div>


                </div>
            </div>
        </form>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $('#file-upload').bind('change', function() {
            var fileName = '';
            fileName = $(this).val();
            $('#file-selected').html(fileName);
        });
    </script>

</body>

</html>