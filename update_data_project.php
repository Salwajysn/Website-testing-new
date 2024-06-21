<?php
// update_data_project.php

// Include db_connect.php to connect to database
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProjects = $_POST['idMateri'];
    $newContent = $_POST['newContent'];
    $actionType = $_POST['action'];

    switch ($actionType) {
        case 'editTitle':
            $query = "UPDATE projects SET title = ? WHERE Id_Kelas = ?";
            break;
        case 'editDescription':
            $query = "UPDATE projects SET description = ? WHERE Id_Kelas = ?";
            break;
        case 'editOverview':
            $query = "UPDATE projects SET overview = ? WHERE Id_Kelas = ?";
            break;
        case 'editResult':
            $query = "UPDATE projects SET results = ? WHERE Id_Kelas = ?";
            break;
        default:
            echo "Invalid action type.";
            exit();
    }
    
    // Prepare statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $newContent, $idMateri);
    
    // Execute statement
    if ($stmt->execute()) {
        echo "Konten berhasil diperbarui.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
    
} else {
    echo "Metode permintaan tidak valid.";
}
?>
