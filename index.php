<?php
// Inisialisasi variabel
$error = "";
$tinggi = null;

// Mengecek saat form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['tinggi'] ?? '';

    // Validasi: bilangan bulat antara 1 sampai 20
    if (filter_var($input, FILTER_VALIDATE_INT) !== false && $input >= 1 && $input <= 20) {
        $tinggi = (int)$input;
    } else {
        $error = "Input tidak valid! Harap masukkan bilangan bulat antara 1 hingga 20.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pola 4 Segitiga Bintang — PHP Native</title>
    <!-- Menghubungkan ke file CSS eksternal -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <!-- Kiri: Panel Form Input -->
    <aside class="sidebar-form">
        <h1>Generator Pola Segitiga Bintang</h1>
        <p>Masukkan angka tinggi segitiga dari 1 sampai 20 untuk menampilkan 4 variasi arah secara simetris.</p>

        <form method="POST" action="">
            <label for="tinggi">Tinggi Segitiga (1 – 20)</label>
            <input 
                type="number" 
                id="tinggi" 
                name="tinggi" 
                placeholder="Ketik angka, misal: 6" 
                value="<?php echo isset($_POST['tinggi']) ? htmlspecialchars($_POST['tinggi']) : ''; ?>" 
                required
            >
            <button type="submit">Generate 4 Segitiga</button>
        </form>

        <?php if (!empty($error)): ?>
            <div class="error-box">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
    </aside>

    <!-- Kanan: Hasil 4 Segitiga -->
    <main class="main-content">
        <?php if ($tinggi === null): ?>
            <div class="empty-state">
                <h3>Belum Ada Pola Ditampilkan</h3>
                <p>Silakan masukkan bilangan bulat 1 hingga 20 pada panel di sebelah kiri, lalu klik tombol <strong>Generate 4 Segitiga</strong>.</p>
            </div>
        <?php else: ?>
            <div class="bento-grid">
                
                <!-- 1. Segitiga Ke Atas -->
                <div class="card-segitiga">
                    <div class="card-header">
                        <h2>▲ Segitiga Ke Atas</h2>
                        <span class="pill-info">Baris: <?php echo $tinggi; ?></span>
                    </div>
                    <div class="terminal-box">
                        <pre><?php
                            for ($i = 1; $i <= $tinggi; $i++) {
                                for ($spasi = $tinggi - $i; $spasi > 0; $spasi--) {
                                    echo " ";
                                }
                                for ($bintang = 1; $bintang <= (2 * $i - 1); $bintang++) {
                                    echo "*";
                                }
                                echo "\n";
                            }
                        ?></pre>
                    </div>
                </div>

                <!-- 2. Segitiga Ke Bawah -->
                <div class="card-segitiga">
                    <div class="card-header">
                        <h2>▼ Segitiga Ke Bawah</h2>
                        <span class="pill-info">Baris: <?php echo $tinggi; ?></span>
                    </div>
                    <div class="terminal-box">
                        <pre><?php
                            for ($i = $tinggi; $i >= 1; $i--) {
                                for ($spasi = $tinggi - $i; $spasi > 0; $spasi--) {
                                    echo " ";
                                }
                                for ($bintang = 1; $bintang <= (2 * $i - 1); $bintang++) {
                                    echo "*";
                                }
                                echo "\n";
                            }
                        ?></pre>
                    </div>
                </div>

                <!-- 3. Segitiga Ke Kanan -->
                <div class="card-segitiga">
                    <div class="card-header">
                        <h2>▶ Segitiga Ke Kanan</h2>
                        <span class="pill-info">Puncak: <?php echo $tinggi; ?></span>
                    </div>
                    <div class="terminal-box">
                        <pre><?php
                            for ($i = 1; $i <= $tinggi; $i++) {
                                for ($bintang = 1; $bintang <= $i; $bintang++) {
                                    echo "* ";
                                }
                                echo "\n";
                            }
                            for ($i = $tinggi - 1; $i >= 1; $i--) {
                                for ($bintang = 1; $bintang <= $i; $bintang++) {
                                    echo "* ";
                                }
                                echo "\n";
                            }
                        ?></pre>
                    </div>
                </div>

                <!-- 4. Segitiga Ke Kiri -->
                <div class="card-segitiga">
                    <div class="card-header">
                        <h2>◀ Segitiga Ke Kiri</h2>
                        <span class="pill-info">Puncak: <?php echo $tinggi; ?></span>
                    </div>
                    <div class="terminal-box">
                        <pre><?php
                            for ($i = 1; $i <= $tinggi; $i++) {
                                for ($spasi = $tinggi - $i; $spasi > 0; $spasi--) {
                                    echo "  ";
                                }
                                for ($bintang = 1; $bintang <= $i; $bintang++) {
                                    echo "* ";
                                }
                                echo "\n";
                            }
                            for ($i = $tinggi - 1; $i >= 1; $i--) {
                                for ($spasi = $tinggi - $i; $spasi > 0; $spasi--) {
                                    echo "  ";
                                }
                                for ($bintang = 1; $bintang <= $i; $bintang++) {
                                    echo "* ";
                                }
                                echo "\n";
                            }
                        ?></pre>
                    </div>
                </div>

            </div>
        <?php endif; ?>
    </main>
</div>

</body>
</html>
