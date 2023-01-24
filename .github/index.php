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

    <!-- Datatables-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
    <main>
        <a href="addStudent.php" class="add-btn">Add Student</a>

        <div class="table-container">
            <table id="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>College</th>
                        <th>Year</th>
                        <th>Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM student";
                    $result = mysqli_query($db, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];

                        $claim_status_color = "none";
                        echo "  <tr>
                                <td>{$row['displayId']}</td>
                                <td>{$row['firstName']} {$row['lastName']}</td>
                                <td>{$row['course']}</td>
                                <td>{$row['college']}</td>
                                <td>{$row['year']}</td>
                                <td>{$row['gender']}</td> 
                                
                                <td>
                                    <a href='studentView.php?id=$id' class='view-btn'>View</a>
                                    <a href='studentRemove.php?id=$id' class='trash-btn'>Remove</a>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <a href="server.php?logout=1" class="logout-btn">Log out</a>
    </main>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>

</html>