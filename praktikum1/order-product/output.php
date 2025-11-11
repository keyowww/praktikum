<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A Web Page - Hasil Pemesanan Barang</title>
    <link rel="stylesheet" href="output.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Halaman order</h1>
            <div class="nav-links">
                <a href="#">Home</a>
                <a href="#">Registrasi</a>
                <a href="#">Policy</a>
                <a href="#">Tentang</a>
            </div>
        </div>
        
        <div class="content">
            <?php
            // Fungsi untuk membersihkan input
            function clean_input($data) {
                if (!empty($data)) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                }
                return $data;
            }

            // Cek apakah form telah disubmit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];
                
                // Ambil dan bersihkan data dari form
                $title = clean_input($_POST["title"]);
                $description = clean_input($_POST["description"]);
                $account_number = clean_input($_POST["account_number"]);
                $book = clean_input($_POST["book"]);
                $account_holder = clean_input($_POST["account_holder"]);
                $transaction_count = clean_input($_POST["transaction_count"]);
                $mobile_phones = clean_input($_POST["mobile_phones"]);
                $emails = clean_input($_POST["emails"]);
                
                // Validasi required fields
                if (empty($title)) {
                    $errors[] = "Title is required";
                }
                
                if (empty($account_number)) {
                    $errors[] = "Account number is required";
                }
                
                if (empty($account_holder)) {
                    $errors[] = "Account holder is required";
                }
                
                if (empty($transaction_count)) {
                    $errors[] = "Transaction count is required";
                }
                
                // Jika ada errors, tampilkan
                if (!empty($errors)) {
                    echo '<div class="error">';
                    echo '<h2>Error:</h2>';
                    echo '<ul>';
                    foreach ($errors as $error) {
                        echo "<li>$error</li>";
                    }
                    echo '</ul>';
                    echo '</div>';
                    
                    echo '<div class="back-link">';
                    echo '<a href="index.html">← Back to Order Form</a>';
                    echo '</div>';
                } else {
                    // Jika tidak ada errors, tampilkan hasil
                    echo '<div class="success-message">';
                    echo '<h2>Order Processed Successfully!</h2>';
                    echo '<p>Your order has been received and is being processed.</p>';
                    echo '</div>';
                    
                    echo '<div class="info-section">';
                    echo '<h3>Product Information</h3>';
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Title Here</div>';
                    echo '<div class="info-value">' . $title . '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Description</div>';
                    echo '<div class="info-value">' . (!empty($description) ? $description : 'No description provided') . '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-section">';
                    echo '<h3>Payment Details</h3>';
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Total Harga</div>';
                    echo '<div class="info-value">Rp100.000</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Nomor Akun Bank</div>';
                    echo '<div class="info-value">' . $account_number . '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Jenis Pembayaran</div>';
                    echo '<div class="info-value">Non Tunai</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Pemilik Akun</div>';
                    echo '<div class="info-value">' . $account_holder . '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Nomor Akun Bank</div>';
                    echo '<div class="info-value">' . $account_number . '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Bank</div>';
                    echo '<div class="info-value">' . (!empty($book) ? $book : 'Not specified') . '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-section">';
                    echo '<h3>Informasi Pesanan</h3>';
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Jumlah Pesanan</div>';
                    echo '<div class="info-value">' . $transaction_count . ' person(s)</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Alamat Telpon</div>';
                    echo '<div class="info-value">' . (!empty($mobile_phones) ? $mobile_phones : 'No mobile numbers provided') . '</div>';
                    echo '</div>';
                    
                    echo '<div class="info-row">';
                    echo '<div class="info-label">Alamat Gmail</div>';
                    echo '<div class="info-value">' . (!empty($emails) ? $emails : 'No emails provided') . '</div>';
                    echo '</div>';
                    echo '</div>';
                    
                    echo '<div class="back-link">';
                    echo '<a href="index.html">← Pesan yang lain</a>';
                    echo '</div>';
                }
            } else {
                echo '<div class="error">';
                echo '<p>Error: Form was not submitted properly.</p>';
                echo '</div>';
                
                echo '<div class="back-link">';
                echo '<a href="index.html">← Pesan yang lain</a>';
                echo '</div>';
            }
            ?>
            
            <div class="footer">
                <p>📦Terimakasih Telah Memesan🍕</p>
            </div>
        </div>
    </div>
</body>
</html>