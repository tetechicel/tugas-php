<?php

include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM siswa");

$siswa = [];

while ($row = mysqli_fetch_assoc($query)) {
    $siswa[] = $row;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #222;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .header {
            background: #1f2937;
            color: white;
            padding: 30px;
            border-radius: 12px 12px 0 0;
        }

        .header h1 {
            margin-bottom: 8px;
        }

        .header p {
            color: #d1d5db;
        }

        .table-wrapper {
            background: white;
            padding: 25px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f3f4f6;
            text-align: left;
            padding: 14px;
            font-size: 14px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
        }

        tr:hover {
            background: #f9fafb;
        }

        .badge {
            background: #e0f2fe;
            color: #0369a1;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 13px;
        }

        .empty {
            text-align: center;
            color: #777;
            padding: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Data Siswa</h1>
            <p>Daftar siswa dari database sekolah</p>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($siswa) > 0): ?>
                        <!-- perulangan -->
                        <?php foreach ($siswa as $index => $data): ?>

                            <tr>
                                <td>
                                    <?= $index + 1 ?>
                                </td>

                                <td>
                                    <?= $data["nis"] ?>
                                </td>

                                <td>
                                    <?= $data["nama"] ?>
                                </td>

                                <td>
                                    <?= $data["kelas"] ?>
                                </td>

                                <td>
                                    <span class="badge">
                                        <?= $data["jurusan"] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada data siswa.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>