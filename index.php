<?php
// Cek apakah form sudah bisa di akses
if (isset($_POST["submit"])) {
    // form telah di submit proses data

    // ambil nilai form
    $username = htmlentities(strip_tags(trim($_POST["username"])));
    $password = htmlentities(strip_tags(trim($_POST["password"])));

    // siapkan untuk menampung pesan error
    $pesan_error = "";

    // Cek apakah username sudah di isi atau tidak
    if (empty($username)) {
        $pesan_error = "Username belum diisi <br>";
    }

    // cek apakah password sudah di isi atau tidak
    if (empty($password)) {
        $pesan_error = "Password belum di isi <br>";
    }
    // username harus admin dan password harus rahasia
    if ($username != "admin" or $password != "rahasia") {
        $pesan_error = "Password dan Username harus sesuai <br>";
    }
    // jika lolos validasi cookie
    if ($pesan_error === "") {
        setcookie("username", "admin");
        setcookie("nama", "andika");
        header("Location: data_siswa.php");
    }
} else {
    // form belum di submit dan halaman ini tampil untuk pertama kali
    // berikan nilai awal untuk isian form
    $pesan_error = "";
    $username = "";
    $password = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cookie</title>
    <style>
        body {
            background-color: #F8F8F8;
        }

        div.container {
            width: 380px;
            padding: 10px 50px 80px;
            background-color: white;
            margin: 20px auto;
            box-shadow: 1px 0px 10px, -1px 0px 10px;
        }

        h1,
        h3 {
            text-align: center;
            font-family: Cambria, "Times New Roman", serif;
        }

        p {
            margin: 0;
        }

        fieldset {
            padding: 20px;
            margin: auto;
            width: 240px;
        }

        input {
            margin-bottom: 10px;
        }

        input[type=submit] {
            float: right;
        }

        label {
            width: 80px;
            float: left;
            margin-right: 10px;
        }

        .error {
            background-color: #FFECEC;
            padding: 10px 15px;
            margin: 0 0 20px 0;
            border: 1px solid red;
            box-shadow: 1px 0px 3px red;

        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Selamat Datang</h1>
        <h3>Website Sekolah SDN Kamal 03 Pagi</h3>
        <?php
        // Tampilkan error jika ada
        if ($pesan_error !== "") {
            echo "<div class =\"error\">$pesan_error</div>";
        }

        ?>

        <form action="index.php" method="POST">
            <fieldset>
                <legend>Login</legend>
                <p>
                    <label for="username">Username :</label>
                    <input type="text" name="username" id="username" value="<?php echo $username ?>">
                </p>
                <p>
                    <label for="password">Password :</label>
                    <input type="password" name="password" id="password" value="<?php $password ?>">
                </p>
                <input type="submit" name="submit" value="Masuk">
            </fieldset>


        </form>
    </div>

</body>

</html>