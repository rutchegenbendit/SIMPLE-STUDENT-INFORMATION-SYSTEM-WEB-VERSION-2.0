<?php
session_start();

$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'studentinfo') or die($db);

//login
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (count($errors) == 0) {
        $get_id = "SELECT adminId FROM admins WHERE username='$username'";
        $res_id = $db->query($get_id);
        $adminId = $res_id->fetch_array()[0] ?? '';

        $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1) {

            $_SESSION['logged_in'] = true;
            $_SESSION['adminId'] = $adminId;

            header("location: index.php");
        } else {
            array_push($errors, "Invalid Username or Password");
        }
    }
}

//logout
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['logged_in']);
    header("location: login.php");
}

//student - create
if (isset($_POST['addStudent'])) {

    $queryLastRow = "SELECT id FROM student ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($db, $queryLastRow);

    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];

    $currentId = $id + 1;
    $yearId = date("Y");

    $displayId = $yearId . '-' . $currentId;

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $course = $_POST['course'];
    $college = $_POST['college'];
    $year = $_POST['year'];
    $gender = $_POST['gender'];

    $pname = rand(1000, 10000) . "-" . $_FILES["file"]["name"];
    $tname = $_FILES["file"]["tmp_name"];
    $uploads_dir = 'images';
    move_uploaded_file($tname, $uploads_dir . '/' . $pname);

    $insert = "INSERT INTO student(displayId, firstName, lastName, course, college, year, gender, studentImg) VALUES('$displayId', '$firstName', '$lastName', '$course', '$college', '$year', '$gender', '$pname')";
    $result = mysqli_query($db, $insert);

    echo "<script>alert('Student Added'); location.href='index.php'</script>";
}

//student - create
if (isset($_POST['editStudent'])) {
    $id = $_POST['id'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $course = $_POST['course'];
    $college = $_POST['college'];
    $year = $_POST['year'];
    $gender = $_POST['gender'];

    $pname = rand(1000, 10000) . "-file-" . $_FILES["file"]["name"];

    // if there is no file selected
    if ($_FILES["file"]["name"] == "") {
        $update = "UPDATE student SET firstName = '$firstName', lastName = '$lastName', course = '$course', college = '$college', year = '$year', gender = '$gender' WHERE id = '$id'";
        $result = mysqli_query($db, $update);
    }

    else {
        $tname = $_FILES["file"]["tmp_name"];

        $uploads_dir = 'images';
        move_uploaded_file($tname, $uploads_dir . '/' . $pname);
    
        $update = "UPDATE student SET firstName = '$firstName', lastName = '$lastName', course = '$course', college = '$college', year = '$year', gender = '$gender', studentImg = '$pname'  WHERE id = '$id'";
        $result = mysqli_query($db, $update);
    }

    echo "<script>alert('Student Updated'); location.href='index.php'</script>";
}
