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
    <h4 class="text-center text-primary p-3">Update page</h4>

    <?php
    $id = $_GET['s_id'];
    $sql = "SELECT * FROM students WHERE s_id='$id'";
    $result = mysqli_query($conn, $sql);
    ?>

    <form action="" method='POST'>

        <?php
        if (mysqli_num_rows($result) > 0) {

            while ($students = mysqli_fetch_assoc($result)) {

        ?>

                <table class="m-auto ">
                    <tr>
                        <td>Name</td>
                        <td class="p-3"><input type="text" name='s_name' value='<?php echo $students['s_name']; ?>' require></td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td class="p-3"><input type="text" name='s_lastname' value='<?php echo $students['s_lastname']; ?>' require></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td class="p-3"><input type="text" name='s_age' value='<?php echo $students['s_age']; ?>' require></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="p-3"><button type="submit" name='s_update'>Update</td>
                    </tr>
                </table>

        <?php
            } #while ends here
        } else {
            echo '0 result found';
        } #if else ends here
        ?>

    </form>

    <?php

    if (isset($_POST['s_update'])) {

        $s_name = $_POST['s_name'];
        $s_lastname = $_POST['s_lastname'];
        $s_age = $_POST['s_age'];
        $sql = "UPDATE students SET s_name='$s_name' , s_lastname='$s_lastname', s_age='$s_age' WHERE s_id='$id'";

        if (mysqli_query($conn, $sql)) {
            // echo "<script>alert('Student updated successfully!'); </script>";
            header('Location: students.php');
        } else {
            echo "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>
    <p class="text-center"><a href="students.php">Go Back</a></p>
    <?php include 'footer.php' ?>
</body>

</html>