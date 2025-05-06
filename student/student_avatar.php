<?php
include('dbcon.php');
include('session.php');

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $fileType = $_FILES['image']['type'];

    // Allowed file types
    $allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif'];

    if (!in_array($fileType, $allowedFileTypes)) {
        echo "<script>
                alert('Invalid file type! Only JPG, PNG, and GIF are allowed.');
                window.history.back();
              </script>";
        exit();
    }

    // Set upload directory
    $uploadDir = "uploads/";
    $fileDestination = $uploadDir . basename($fileName);

    // Move the uploaded file
    if (move_uploaded_file($fileTmpPath, $fileDestination)) {
        // Update the database with the new image location
        $stmt = $conn->prepare("UPDATE student SET location = ? WHERE student_id = ?");
        $stmt->bind_param("si", $fileDestination, $session_id);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Profile picture updated successfully!');
                    window.location.href = 'dashboard_student.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error updating profile picture. Try again.');
                    window.history.back();
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('File upload failed. Try again.');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('No file uploaded or an error occurred.');
            window.history.back();
          </script>";
}

$conn->close();
?>
