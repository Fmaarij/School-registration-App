<?php require 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index page</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
</head>

<body>
    <?php include 'nav.php' ?>
    <h4 class="text-center text-primary p-3">Form To Add New Students</h4>

    <form action="" method='POST'>
        <table class="m-auto ">
            <tr>
                <td>Name</td>
                <td class="p-3"><input type="text" name='s_name' require></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td class="p-3"><input type="text" name='s_lastname' require></td>
            </tr>
            <tr>
                <td>Age</td>
                <td class="p-3"><input type="text" name='s_age' require></td>
            </tr>
            <tr>
                <td></td>
                <td class="p-3"><button type="submit" name='s_add'>Add</td>
            </tr>
        </table>
    </form>

    <?php

    if (isset($_POST['s_add'])) {

        $s_name = $_POST['s_name'];
        $s_lastname = $_POST['s_lastname'];
        $s_age = $_POST['s_age'];
        $sql = "INSERT INTO students (s_name, s_lastname, s_age) VALUES ('$s_name', '$s_lastname', '$s_age') ";

        if (mysqli_query($conn, $sql)) {

            echo "<script>alert('Student added successfully!'); </script>";
        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>

    <?php include 'footer.php' ?>
</body>

</html>