<?php
include('./connection.php');

$sql = "SELECT d.name as doctor, CONCAT(p.fname, ' ', p.lname) as patient, p.age, p.phone, u.email, p.appointment_date, p.created_at as createdDateTime
FROM patient p
JOIN doctor d ON d.id = p.doc_id
JOIN users u ON u.id = p.user_id
ORDER BY p.created_at desc";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>

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
<h2>Appointment List</h2>
<br>
<div class="table-container">
    <table class="table" border="1">
        <thead>
        <tr>
            <th>Appointment Date</th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Age</th>
            <th>Phone</th>
            <th>eMail</th>
            <th>Created At</th>
        </tr>
        </thead>

        <tbody>
        <?php while ($data = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $data['appointment_date'] ?></td>
                <td><?= $data['doctor'] ?></td>
                <td><?= $data['patient'] ?></td>
                <td><?= $data['age'] ?></td>
                <td><?= $data['phone'] ?></td>
                <td><?= $data['email'] ?></td>
                <td><?= $data['createdDateTime'] ?></td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
</div>

</body>
</html>