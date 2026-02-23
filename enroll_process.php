<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name  = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);

    // Part 1: Insert Student Details
    $query1 = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    
    if (mysqli_query($conn, $query1)) {
        // Part 2: Get Student ID
        $student_id = mysqli_insert_id($conn);

        // Part 3: Create Enrollment Record
        $query2 = "INSERT INTO enrollments (student_id, course_name) VALUES ('$student_id', '$course')";
        
        if (mysqli_query($conn, $query2)) {
            echo "<script>alert('Enrollment Successful!'); window.location='index.php';</script>";
        } else {
            echo "Enrollment Error: " . mysqli_error($conn);
        }
    } else {
        echo "Registration Error: " . mysqli_error($conn);
    }
}
?>