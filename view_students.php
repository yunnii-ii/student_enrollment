<?php
include 'db.php';

$sql = "SELECT students.name, students.email, enrollments.course_name, enrollments.enroll_date 
        FROM students 
        JOIN enrollments ON students.id = enrollments.student_id 
        ORDER BY enrollments.enroll_date DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Enrolled Students List</title>
</head>
<body class="container mt-5">
    <h2 class="mb-4">Enrolled Students List</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Enrolled Course</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['course_name']; ?></td>
                <td><?php echo $row['enroll_date']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php" class="btn btn-secondary">Back to Enrollment</a>
</body>
</html>