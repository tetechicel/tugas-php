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
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 px-4 py-8 font-sans text-slate-800 sm:px-6 sm:py-12">
    <main class="mx-auto max-w-6xl">
        <header class="rounded-t-2xl bg-slate-900 px-6 py-8 text-white sm:px-8 sm:py-10">
            <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="mb-2 text-sm font-semibold uppercase tracking-[0.18em] text-sky-300">Administrasi sekolah</p>
                    <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">Data Siswa</h1>
                    <p class="mt-2 text-slate-300">Daftar siswa dari database sekolah</p>
                </div>
                <nav class="flex flex-col gap-3 sm:flex-row" aria-label="Aksi data siswa">
                    <a href="tambahSiswa.php" class="inline-flex items-center justify-center rounded-lg bg-sky-500 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-300 focus:ring-offset-2 focus:ring-offset-slate-900">
                        + Tambah Siswa
                    </a>
                </nav>
            </div>
        </header>

        <section id="daftar-siswa" class="rounded-b-2xl bg-white p-4 shadow-lg shadow-slate-900/5 sm:p-8" aria-label="Daftar siswa">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] border-collapse text-left text-sm">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                            <th scope="col" class="px-4 py-4 font-semibold">No</th>
                            <th scope="col" class="px-4 py-4 font-semibold">NIS</th>
                            <th scope="col" class="px-4 py-4 font-semibold">Nama</th>
                            <th scope="col" class="px-4 py-4 font-semibold">Kelas</th>
                            <th scope="col" class="px-4 py-4 font-semibold">Jurusan</th>
                            <th scope="col" class="px-4 py-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                    <?php if (count($siswa) > 0): ?>
                        <?php foreach ($siswa as $index => $data): ?>
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-4 py-4 font-medium text-slate-500"><?= $index + 1 ?></td>
                                <td class="px-4 py-4 font-medium text-slate-700"><?= $data["nis"] ?></td>
                                <td class="px-4 py-4 font-semibold text-slate-900"><?= $data["nama"] ?></td>
                                <td class="px-4 py-4 text-slate-600"><?= $data["kelas"] ?></td>
                                <td class="px-4 py-4">
                                    <span class="inline-flex rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">
                                        <?= $data["jurusan"] ?>
                                    </span>
                                </td>
                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="editSiswa.php?id=<?= (int) $data["ID"] ?>" class="rounded-md px-2.5 py-1.5 text-xs font-semibold text-sky-700 transition hover:bg-sky-50 hover:text-sky-900" aria-label="Edit data siswa">
                                            Edit
                                        </a>
                                        <a href="hapus.php?id=<?= (int) $data["ID"] ?>" class="rounded-md px-2.5 py-1.5 text-xs font-semibold text-rose-600 transition hover:bg-rose-50 hover:text-rose-800" aria-label="Hapus data siswa">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="px-4 py-12 text-center text-slate-500">
                                Belum ada data siswa.
                            </td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>