<?php
session_start();
include 'database.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$username'");
    if (mysqli_num_rows($check) > 0) {
        $row = mysqli_fetch_assoc($check);
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;

            echo "<script>
                alert('Login successful!');
                window.location.href = 'dashboard.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Incorrect password.');</script>";
        }
    } else {
        echo "<script>alert('Username not found.');</script>";
    }
}

if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./src/output.css?v=<?php echo time(); ?>" rel="stylesheet">
    <title>Log In Account</title>
</head>
<body>
    <div class="w-screen h-screen flex items-center justify-center bg-gray-800">
        <form action="login.php" method="post" class="w-[600px] h-[350px] bg-gray-900 p-6 rounded-lg py-[40px] px-[40px] relative" autocomplete="off">
            <h1 class="text-blue-500 text-3xl font-bold text-center pb-[60px]">LOG IN ACCOUNT</h1>
            <div class="flex flex-col gap-4 items-center ">
                <div>
                    <label for="username" class="text-blue-300 text-2xl m-[17px]">Username: </label>
                    <input type="text" name="username" required class="w-[280px] py-[7px] rounded-[5px] bg-transparent border-[1px] border-blue-600 text-white truncate" ><br>
                </div>
                <div>
                    <label for="password" class="text-blue-300 text-2xl m-[20px]">Password: </label>
                <input type="password" name="password" required class="w-[280px] py-[7px] rounded-[5px] bg-transparent border-[1px] border-blue-600 text-white truncate" ><br>
                </div>
                <a href="index.php" class="text-blue-400 hover:text-blue-600 absolute bottom-[60px] left-[100px] text-[15px]">Don't have account? Create Account</a>
                
                <div>
                    <input type="submit" name="login" value="Login Account" class="absolute bottom-[60px] right-[80px] mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 cursor-pointer">
                </div>
            </div>      
        </form>
    </div>


</body>
</html>