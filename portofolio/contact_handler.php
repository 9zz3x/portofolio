<?php
/**
 * contact_handler.php
 * Memproses pesan dari form kontak.
 * Secara default pesan disimpan ke file messages.txt
 * (Bisa diganti agar mengirim email menggunakan mail() jika hosting mendukung)
 */

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validasi sederhana
    $errors = [];
    if ($name === '') {
        $errors[] = 'Nama wajib diisi.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email tidak valid.';
    }
    if ($message === '') {
        $errors[] = 'Pesan tidak boleh kosong.';
    }

    if (empty($errors)) {
        $entry = sprintf(
            "[%s] %s <%s>\n%s\n%s\n\n",
            date('Y-m-d H:i:s'),
            $name,
            $email,
            $message,
            str_repeat('-', 40)
        );

        // Simpan ke file log pesan (pastikan folder bisa ditulis / writable)
        file_put_contents(__DIR__ . '/messages.txt', $entry, FILE_APPEND);

        // Jika ingin kirim email langsung, aktifkan baris di bawah ini
        // dan sesuaikan alamat tujuan + pastikan server mendukung mail()
        /*
        $to      = 'emailkamu@example.com';
        $subject = 'Pesan baru dari Portofolio - ' . $name;
        $body    = "Nama: $name\nEmail: $email\n\nPesan:\n$message";
        $headers = "From: $email";
        mail($to, $subject, $body, $headers);
        */

        $_SESSION['contact_status'] = 'success';
    } else {
        $_SESSION['contact_status'] = 'error';
        $_SESSION['contact_errors'] = $errors;
    }
}

header('Location: index.php#contact');
exit;
