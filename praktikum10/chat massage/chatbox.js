// chatbox.js

document.addEventListener('DOMContentLoaded', () => {
    // Ambil referensi ke elemen-elemen DOM
    const inputField = document.getElementById('messageInput');
    const sendButton = document.getElementById('sendButton');
    const displayArea = document.getElementById('messageDisplay');

    /**
     * Fungsi untuk menambahkan pesan ke area tampilan.
     * @param {string} text - Teks pesan yang akan ditampilkan.
     * @param {string} type - 'sent' (dikirim pengguna) atau 'received' (balasan/pesan lain).
     */
    function addMessage(text, type) {
        // 1. Buat elemen div baru untuk pesan
        const messageDiv = document.createElement('div');
        
        // 2. Tambahkan class dasar dan class tipe pesan ('sent' atau 'received')
        messageDiv.classList.add('message', type);
        
        // 3. Masukkan teks pesan
        messageDiv.textContent = text;
        
        // 4. Masukkan div pesan ke dalam area tampilan
        displayArea.appendChild(messageDiv);

        // 5. Otomatis scroll ke pesan terbaru
        displayArea.scrollTop = displayArea.scrollHeight;
    }

    /**
     * Fungsi utama yang dijalankan saat tombol 'Kirim' diklik atau Enter ditekan.
     */
    function sendMessage() {
        const messageText = inputField.value.trim();

        // Pastikan input tidak kosong
        if (messageText === "") {
            return;
        }

        // 1. Tambahkan pesan pengguna ke chatbox sebagai 'sent'
        addMessage(messageText, 'sent');
        
        // 2. Kosongkan input field
        inputField.value = '';
        
        // Simulasi Balasan Otomatis (Opsional)
        // Anda dapat menghapus bagian ini jika tidak diperlukan,
        // tetapi ini membuat chatbox terlihat lebih interaktif
        setTimeout(() => {
            const reply = "Pesan Anda (" + messageText + ") telah diterima!";
            addMessage(reply, 'received');
        }, 1000); // Balas setelah 1 detik
    }

    // Event listener untuk tombol 'Kirim'
    sendButton.addEventListener('click', sendMessage);

    // Event listener untuk tombol 'Enter' pada input field
    inputField.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
    
    // Inisialisasi: memastikan scroll berada di bawah saat halaman dimuat
    displayArea.scrollTop = displayArea.scrollHeight;
});