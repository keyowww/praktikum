// script.js

/**
 * Objek untuk menyimpan kurs mata uang asing terhadap Rupiah.
 * Nilai diambil dari deskripsi soal.
 */
const kurs = {
    "USD": 9915,    // 1 Dollar US = 9.915 rupiah
    "SGD": 13472,   // 1 Dollar Singapore = 13.472 rupiah
    "MYR": 874,     // 1 Ringgit Malaysia = 874 rupiah
    "JPY": 120,     // 1 Yen Jepang = 120 rupiah
    "EUR": 15888,   // 1 Euro = 15.888 rupiah
    "SAR": 3592     // 1 Riyal Arab Saudi = 3.592 rupiah
};

/**
 * Fungsi utama untuk menghitung dan menampilkan konversi mata uang.
 * Dipanggil oleh event oninput dan onchange di file HTML.
 */
function hitungKonversi() {
    // 1. Ambil nilai dari input Masukan Nilai (Mata Uang Asing)
    const nilaiAsingElement = document.getElementById('nilaiAsing');
    // Gunakan parseFloat untuk mengubah string input menjadi angka desimal
    const nilaiAsing = parseFloat(nilaiAsingElement.value);

    // 2. Ambil kode valas yang dipilih dari dropdown
    const kodeValas = document.getElementById('pilihanValas').value;

    // 3. Dapatkan elemen output Nilai Rupiah
    const nilaiRupiahElement = document.getElementById('nilaiRupiah');
    
    // Cek apakah input valid atau valas belum dipilih
    if (isNaN(nilaiAsing) || nilaiAsing <= 0 || !kodeValas) {
        // Jika tidak valid, set output menjadi kosong
        nilaiRupiahElement.value = '';
        return; 
    }

    // 4. Cari nilai kurs yang sesuai
    const nilaiKurs = kurs[kodeValas];

    let hasilRupiah = 0;
    
    // Lakukan perhitungan konversi: Nilai Rupiah = Nilai Asing * Kurs
    if (nilaiKurs) {
        hasilRupiah = nilaiAsing * nilaiKurs;
    } else {
        nilaiRupiahElement.value = "Kurs tidak ditemukan";
        return;
    }

    // 5. Format hasil Rupiah ke format mata uang (misalnya: 12.345,00)
    // Menggunakan Intl.NumberFormat untuk format bahasa Indonesia (id-ID)
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'decimal', 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2 
    });

    // Tampilkan hasil yang sudah diformat di kotak Nilai Rupiah
    nilaiRupiahElement.value = formatter.format(hasilRupiah);
}