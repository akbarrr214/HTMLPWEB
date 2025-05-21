<?php
require_once 'config/database.php';

$sql = "SELECT * FROM contacts ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kontak</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f4f4f4; }
        tr:hover { background-color: #f5f5f5; }
        .success { color: green; margin-bottom: 20px; }
    </style>
</head>
<body>
    <?php if (isset($_GET['success'])): ?>
        <div class="success">Pesan berhasil disimpan!</div>
    <?php endif; ?>

    <h2>Daftar Kontak</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tanggal</th>
        </tr>
        <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= htmlspecialchars($row['created_at']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
