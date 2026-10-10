<?php

include "koneksi.php";

if (isset($_POST["submit"])) {
    $nis = $_POST["nis"];
    $nama = $_POST["nama"];
    $kelas = $_POST["kelas"];
    $jurusan = $_POST["jurusan"];

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES ('$nis', '$nama', '$kelas', '$jurusan')"
    );

    if ($query) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menyimpan data siswa";
    }
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 px-4 py-8 font-sans text-slate-800 sm:px-6 sm:py-12">
    <main class="mx-auto max-w-3xl">
        <header class="rounded-t-2xl bg-slate-900 px-6 py-8 text-white sm:px-8">
            <p class="mb-2 text-sm font-semibold uppercase tracking-[0.18em] text-sky-300">Administrasi sekolah</p>
            <h1 class="text-3xl font-bold tracking-tight">Tambah Data Siswa</h1>
            <p class="mt-2 text-slate-300">Masukkan informasi siswa baru.</p>
        </header>

        <section class="rounded-b-2xl bg-white p-6 shadow-lg shadow-slate-900/5 sm:p-8">
            <form action="" method="post" class="space-y-5">
                <div>
                    <label for="nis" class="mb-2 block text-sm font-semibold text-slate-700">NIS</label>
                    <input type="text" id="nis" name="nis" required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <div>
                    <label for="nama" class="mb-2 block text-sm font-semibold text-slate-700">Nama</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <div>
                    <label for="kelas" class="mb-2 block text-sm font-semibold text-slate-700">Kelas</label>
                    <input type="text" id="kelas" name="kelas" required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <div>
                    <label for="jurusan" class="mb-2 block text-sm font-semibold text-slate-700">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" required
                        class="w-full rounded-lg border border-slate-300 px-4 py-3 text-sm text-slate-900 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                    <a href="index.php" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Kembali
                    </a>
                    <button type="submit" name="submit" class="inline-flex items-center justify-center rounded-lg bg-sky-500 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-400">
                        Simpan Data
                    </button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
