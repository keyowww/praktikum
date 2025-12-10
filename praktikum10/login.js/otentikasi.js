// otentikasi.js
// Pastikan file ini ditempatkan di folder yang sama dengan login.html

(function () {
    // kredensial yang ditentukan pada soal
    const VALID_USERNAME = "ahmad2017";
    const VALID_PASSWORD = "integrity";

    const form = document.getElementById("formLogin");
    const inputUser = document.getElementById("username");
    const inputPass = document.getElementById("password");

    form.addEventListener("submit", function (ev) {
        ev.preventDefault(); // cegah page reload

        const username = inputUser.value.trim();
        const password = inputPass.value;

        // pengecekan sederhana
        if (username === VALID_USERNAME && password === VALID_PASSWORD) {
            alert("Login sukses");
            // arahkan ke halaman baru yang menampilkan <h1>Login Sukses</h1>
            window.location.href = "home.html";
        } else {
            alert("Login gagal: username atau password salah");
            // tetap di halaman login (tidak perlu tindakan lain)
            // optional: bersihkan password field
            inputPass.value = "";
            inputPass.focus();
        }
    });
})();