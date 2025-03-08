<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doctor_name = $_POST['doctor_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $clinic_address = $_POST['clinic_address'];
    $nmr_id = $_POST['nmr_id'];

    // Handle Certificate Upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["certificate"]["name"]);
    move_uploaded_file($_FILES["certificate"]["tmp_name"], $target_file);

    // Save to Database (Example)
    $conn = new mysqli("localhost", "root", "", "healthcare_db");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "INSERT INTO doctors (doctor_name, mobile, email, clinic_address, nmr_id, certificate) 
            VALUES ('$doctor_name', '$mobile', '$email', '$clinic_address', '$nmr_id', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
    
    $conn->close();
}
?>
