<?php
include('./connection.php');

$sql = "SELECT id, name from doctor";
$result = mysqli_query($conn, $sql);

if (isset($_POST['doctorAppointmentSubmission'])) {
    try {
        $sql1 = "INSERT INTO `users` (`fname`, `lname`, `phone`, `email`, `pass`, `address_id`)
VALUES (
        '".mysqli_real_escape_string($conn, $_POST['fname'])."',
        '".mysqli_real_escape_string($conn, $_POST['lname'])."',
        '".mysqli_real_escape_string($conn, $_POST['phone'])."',
        '".mysqli_real_escape_string($conn, $_POST['email'])."',
        '1234',
        NULL)";

        mysqli_query($conn, $sql1);

        $userId = mysqli_insert_id($conn);

        $sql2 = "INSERT INTO `patient` (`fname`, `lname`, `age`, `phone`, `appointment_date`, `user_id`, `doc_id`)
VALUES (
        '".mysqli_real_escape_string($conn, $_POST['fname'])."',
        '".mysqli_real_escape_string($conn, $_POST['lname'])."',
        '".mysqli_real_escape_string($conn, $_POST['age'])."',
        '".mysqli_real_escape_string($conn, $_POST['phone'])."',
        '".mysqli_real_escape_string($conn, $_POST['appointment_date'])."',
         $userId,
         '".mysqli_real_escape_string($conn, $_POST['doctor'])."')";
        mysqli_query($conn, $sql2);

        $sql3 = "INSERT INTO `appointment` (`user_id`, `doctor_id`)
VALUES (
        $userId, '".mysqli_real_escape_string($conn, $_POST['doctor'])."')";
        mysqli_query($conn, $sql3);

        mysqli_close($conn);
    } catch (exception $e) {
        echo $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Appointments</title>

    <!-- font: Playfair Display, Semi-bold 600 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/shop.css">

    <!-- w3 School: Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
<div class="nav">
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>

        <label class="logo">easyMED</label>
        <ul>
            <li><a class="active" href="../../index.html">Home</a></li>
            <li><a href="">Doctor</a></li>
            <li><a href="#">Medicine</a></li>
            <li><a href="">Blood</a></li>
            <li><a href="">Ambulance</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </nav>
</div>
<br>
<div>
    <form method="post">
        <label for="doctor">Doctor</label>
        <select name="doctor" id="doctor">
            <option>Select</option>
            <?php while ($data = mysqli_fetch_assoc($result)): ?>
            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <label>First Name</label>
        <input type="text" name="fname"><br><br>
        <label>Last Name</label>
        <input type="text" name="lname"><br><br>
        <label>Age</label>
        <input type="number" name="age"><br><br>
        <label>Phone</label>
        <input type="text" name="phone"><br><br>
        <label>eMail</label>
        <input type="email" name="email"><br><br>
        <label>Appointment Date</label>
        <input type="date" name="appointment_date"><br><br>
        <input type="submit" name="doctorAppointmentSubmission" value="Submit">
    </form>
</div>

</body>
</html>