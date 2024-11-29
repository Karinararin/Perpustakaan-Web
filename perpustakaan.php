<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background: url(https://id.pngtree.com/free-png-vectors/perpustakaan );
        background-size: cover;
        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h2 {
        text-align: center;
        color: #f9a;
    }

    form {
        width: 50%;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-top: 10px;
        color: #333;
    }

    input,
    select {
        width: calc(100% - 22px);
        padding: 10px;
        margin-top: 5px;
        margin-bottom: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        background-color: #E9967A;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #cea2fd;
    }

    .container {
     
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 45%;
    }

    .output-container {
        margin: 50px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 20%;
    }

    table {
        width: 100%;
    }

    table td {
        padding: 8px;
    }
</style>
</head>

<body>
<div class="container">
    <h1 style="color: white;">KARINA PUSPITA PRAMESWARI - 22SA21A082</h1>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <h2>Perpustakaan </h2>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="tanggalPeminjaman">Tanggal Peminjaman (Hari):</label>
            <input type="number" name="tanggalPeminjaman" id="tanggalPeminjaman" required>

            <label for="jenisBuku">Jenis Buku:</label>
            <select name="jenisBuku" id="jenisBuku" required>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Fiksi">Fiksi</option>
            </select>

            <label for="judulBuku">Judul Buku:</label>
            <input type="text" name="judulBuku" id="judulBuku" required>


            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" required>

            <label for="noHp">Nomor HP:</label>
            <input type="text" name="noHp" id="noHp" required>

            <input type="submit" value="Submit">
        </form>
        </div>
    <div class="output-container">
        <?php
            class perpustakaan {

                private $tanggalPeminjaman;
                private $nama;
                private $jenisBuku;
                private $judulBuku;
                private $alamat;
                private $noHp;

                public function getInput() {
                    echo "Durasi Per Hari : Rp.1.000,00<br>";
                    if (isset($_POST["durasi"])) {
                        $this->tanggalPeminjaman = $_POST["tanggalPeminjaman"];
                        $this->nama = ($_POST["nama"]);
                        $this->jenisBuku = ($_POST["jenisBuku"]);
                        $this->judulBuku = ($_POST["judulBuku"]);
                        $this->alamat = ($_POST["alamat"]);
                        $this->noHp = ($_POST["noHp"]);
                    }
                }

                public function displayData() {
                    $totalCost = $this->calculateCost();
                    echo "<div style='margin: 10px; padding: 20px; border: 1px solid #ccc; background-color: white'>";
                    echo "<h2>Detail Peminjaman Buku</h2>";
                    echo "<table>";
                    echo "<tr><td>Nama</td><td>:" . $this->nama . "</td></tr>";
                    echo "<tr><td>Jenis Buku</td><td>:" . $this->jenisBuku . "</td></tr>";
                    echo "<tr><td>Judul Buku</td><td>:" . $this->judulBuku . "</td></tr>";
                    echo "<tr><td>Alamat</td><td>:" . $this->alamat . "</td></tr>";
                    echo "<tr><td>Nomor HP</td><td>:" . $this->noHp . "</td></tr>";
                    echo "<tr><td>Tanggal Peminjaman</td><td>:" . $this->tanggalPeminjaman . " Hari</td></tr><br>";
                    echo "<tr><td>Total Pembayaran</td><td>: Rp." . number_format($totalCost, 2) . "</td></tr>";
                    echo "</table>";
                    echo "</div>";
                }

                private function calculateCost() {
                    $daylyRate = 1000;
                    $tanggalPeminjamanFloat = floatval($this->tanggalPeminjaman);
                    
                    $totalCost = $tanggalPeminjamanFloat * $daylyRate;
                    if ($tanggalPeminjamanFloat == 7) {
                        $totalCost = $halfHourlyRate;
                    }
                
                    return $totalCost;
                }
            }

            $form = new Perpustakaan();
            $form->getInput();
            $form->displayData();
        ?>
    </div>

</body>
</html>
