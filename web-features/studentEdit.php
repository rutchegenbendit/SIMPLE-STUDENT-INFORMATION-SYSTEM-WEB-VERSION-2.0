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

        <?php 
            $id = $_GET['id'];
            
            $query = "SELECT * FROM student WHERE id = $id";
            $result = mysqli_query($db, $query);

            $row = mysqli_fetch_assoc($result);
        ?>

        <form method="post" action="" enctype="multipart/form-data">
            <a href="javascript:history.back()" class="back-btn">Back</a>
            <button type="submit" name="editStudent" class="submit-btn">Save</button>

            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

            <div class="row">
                <div class="col-img">
                    <div class="img-container">
                        <img src="images/<?php echo $row['studentImg'] ?>" class="student-img">

                        <label class="file-upload">
                            <input type="file" name="file" id="file-upload" />
                            <i class="bi bi-file-image"></i>
                            <span id="file-selected">Update</span>
                        </label>
                    </div>
                </div>

                <div class="col-center">
                    <label for="">Name</label>
                    <input type="text" name="firstName" placeholder="First Name" value="<?php echo $row['firstName'] ?>">

                    <input type="text" name="lastName" placeholder="Last Name"  value="<?php echo $row['lastName'] ?>">

                    <label for="course">Course</label>
                    <select name="course">
                        <?php
                        $selectedCourse = $row['course'];

                        $queryCourse = "SELECT * FROM course";
                        $result = mysqli_query($db, $queryCourse);

                        while ($rowCourse = mysqli_fetch_assoc($result)) {
                            $course = $rowCourse['courseCode'];
                            
                            $selector = "null";
                            if ($course == $selectedCourse) {
                                $selector = "selected";
                            }

                            echo "<option value='$course' $selector>$course</option>";
                        }
                        ?>
                    </select>

                    <label for="college">College</label>
                    <select name="college">
                        <?php
                        $selectedCollege = $row['college'];

                        $queryCollege = "SELECT * FROM college";
                        $result = mysqli_query($db, $queryCollege);

                        while ($rowCollege = mysqli_fetch_assoc($result)) {
                            $college = $rowCollege['collegeName'];

                            $selector = "null";
                            if ($college == $selectedCollege) {
                                $selector = "selected";
                            }

                            echo "<option value='$college' $selector>$college</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="col-right">
                    <label for="year">Year</label>
                    <select name="year">
                    <?php
                        $selectedYear = $row['year'];

                        $queryYear = "SELECT * FROM year";
                        $result = mysqli_query($db, $queryYear);

                        while ($rowYear = mysqli_fetch_assoc($result)) {
                            $year = $rowYear['year'];

                            $selector = "null";
                            if ($year == $selectedYear) {
                                $selector = "selected";
                            }

                            echo "<option value='$year' $selector>$year</option>";
                        }
                        ?>
                    </select>

                    <label for="gender">Gender</label>

                    <div class="radio-btns">
                        <input type="radio" name="gender" id="male" value="Male" <?php if($row['gender'] == "Male") {echo "checked";} ?>>
                        <label for="male">Male</label>

                        <input type="radio" name="gender" id="female" value="Female"<?php if($row['gender'] == "Female") {echo "checked";} ?>>
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