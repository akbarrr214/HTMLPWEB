<?php
// Memasukkan file konfigurasi
require_once 'config.php';

// Memeriksa apakah form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $submitDate = date('Y-m-d H:i:s');

    // Validasi data sederhana
    if (empty($fullName) || empty($email) || empty($message)) {
        echo json_encode(["success" => false, "message" => "Semua field harus diisi!"]);
        exit;
    }

    // Menyiapkan query SQL untuk menyimpan data
    $sql = "INSERT INTO contacts (full_name, email, phone, message, submit_date) 
            VALUES ('$fullName', '$email', '$phone', '$message', '$submitDate')";

    // Menjalankan query
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["success" => true, "message" => "Pesan berhasil dikirim! Terima kasih atas kontak Anda."]);
    } else {
        echo json_encode(["success" => false, "message" => "Gagal menyimpan pesan: " . mysqli_error($conn)]);
    }

    // Menutup koneksi
    mysqli_close($conn);
    exit;
}
?>
