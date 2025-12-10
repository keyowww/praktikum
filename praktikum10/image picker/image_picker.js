// image_picker.js

/**
 * Fungsi untuk menampilkan gambar dan memunculkan alert.
 * Dipanggil ketika nilai dropdown berubah (onchange).
 */
function displayImage() {
    const dropdown = document.getElementById('imageDropdown');
    const imageElement = document.getElementById('selectedImage');
    
    // Ambil nama file gambar (value dari option yang dipilih)
    const fileName = dropdown.value;

    if (fileName) {
        // 1. Tampilkan Gambar
        // Atur sumber gambar ke nama file yang dipilih
        imageElement.src = fileName; 
        imageElement.style.display = 'block'; // Tampilkan elemen gambar
        
        // 2. Tampilkan Alert dengan Nama File Gambar
        alert("Ini gambar " + fileName);
        
    } else {
        // Jika opsi "Pilih Gambar Hewan" yang dipilih (value="")
        imageElement.src = "";
        imageElement.style.display = 'none'; // Sembunyikan elemen gambar
    }
}