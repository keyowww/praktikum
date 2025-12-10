// form_validation.js

/**
 * Fungsi helper untuk menampilkan pesan error dan menandai field dengan warna merah.
 */
function displayError(inputElement, errorId, message) {
    document.getElementById(errorId).textContent = message;
    inputElement.classList.add('error-field');
}

/**
 * Fungsi utama untuk menjalankan semua validasi.
 * Dipanggil oleh event onsubmit pada form.
 */
function validateForm(event) {
    event.preventDefault(); // Mencegah form melakukan submit default
    let isValid = true;
    
    // 1. Reset semua status error dari tampilan sebelumnya
    document.querySelectorAll('.error-message').forEach(el => el.textContent = '');
    document.querySelectorAll('.error-field').forEach(el => el.classList.remove('error-field'));
    document.getElementById('resultDisplay').style.display = 'none';

    // --- 1. Validasi Nama Pelanggan (Required, Max 30 karakter) ---
    const namaInput = document.getElementById('nama');
    const nama = namaInput.value.trim();
    if (nama === "") {
        displayError(namaInput, 'error-nama', 'Nama wajib diisi.');
        isValid = false;
    } else if (nama.length > 30) {
        displayError(namaInput, 'error-nama', 'Maksimum 30 karakter.');
        isValid = false;
    }

    // --- 2. Validasi Email (Required, Format Email) ---
    const emailInput = document.getElementById('email');
    const email = emailInput.value.trim();
    // Regex sederhana untuk format email: string@string.string
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    if (email === "") {
        displayError(emailInput, 'error-email', 'Email wajib diisi.');
        isValid = false;
    } else if (!emailRegex.test(email)) {
        displayError(emailInput, 'error-email', 'Format email tidak valid.');
        isValid = false;
    }

    // --- 3. Validasi Jam Keberangkatan (Required, Format HH.MM 00.00-23.59) ---
    const jamInput = document.getElementById('jam');
    const jam = jamInput.value.trim();
    // Regex untuk format HH.MM (dua digit jam, titik, dua digit menit)
    const jamRegex = /^(?:[01]\d|2[0-3])\.(?:[0-5]\d)$/; 
    if (jam === "") {
        displayError(jamInput, 'error-jam', 'Jam wajib diisi.');
        isValid = false;
    } else if (!jamRegex.test(jam)) {
        displayError(jamInput, 'error-jam', 'Format harus HH.MM (00.00 - 23.59).');
        isValid = false;
    }

    // --- 4. Validasi Tujuan Keberangkatan (Required) ---
    const tujuanInput = document.getElementById('tujuan');
    const tujuan = tujuanInput.value;
    if (tujuan === "") {
        displayError(tujuanInput, 'error-tujuan', 'Tujuan wajib dipilih.');
        isValid = false;
    }

    // --- 5. Validasi Jumlah Tiket (Required, Bilangan bulat 1-10) ---
    const tiketInput = document.getElementById('tiket');
    const tiket = parseInt(tiketInput.value);
    const tiketValue = tiketInput.value.trim();
    
    if (tiketValue === "") {
        displayError(tiketInput, 'error-tiket', 'Jumlah tiket wajib diisi.');
        isValid = false;
    } else if (!Number.isInteger(tiket) || tiket < 1 || tiket > 10) {
        displayError(tiketInput, 'error-tiket', 'Tiket harus bilangan bulat antara 1-10.');
        isValid = false;
    }

    // === TAMPILKAN HASIL JIKA VALID ===
    if (isValid) {
        // Tampilkan semua data di area output
        document.getElementById('out-nama').textContent = nama;
        document.getElementById('out-email').textContent = email;
        document.getElementById('out-jam').textContent = jam;
        document.getElementById('out-tujuan').textContent = tujuan;
        document.getElementById('out-tiket').textContent = tiket;
        
        document.getElementById('resultDisplay').style.display = 'block';
    }
    
    return false; // Mencegah form refresh halaman
}