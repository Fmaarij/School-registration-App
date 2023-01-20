<?php require 'connection.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
</head>

<body>
    <?php include 'nav.php' ?>

    <?php
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn, $sql);
    ?>
    <div class="w-75 m-auto">
        <table class="table table-striped ">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($students = mysqli_fetch_assoc($result)) {

            ?>
                    <tr>
                        <td><?php echo $students['s_id']; ?></td>
                        <td><?php echo $students['s_name']; ?></td>
                        <td><?php echo $students['s_lastname']; ?></td>
                        <td><?php echo $students['s_age']; ?></td>
                        <td><a href="show.php?s_id=<?php echo $students['s_id']; ?>">Show</a></td>
                        <td><a href="update.php?s_id=<?php echo $students['s_id']; ?>">Edit</a></td>
                        <td><a href="delete.php?s_id=<?php echo $students['s_id'] ?>">Delete</a></td>

                    </tr>
            <?php
                }
            } else {
                echo '0 result.';
            }
            ?>
        </table>
        <p><a href="index.php">Go Back</a></p>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>