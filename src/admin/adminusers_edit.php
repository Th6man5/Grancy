<?php
include('../database/database.php');

$fullname = '';
$email = '';
$phone_numb = '';
$password = '';
$user_type = '';

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['id'])) {
        header('Location: /grancy/src/admin/adminusers.php');
        exit;
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header('Location: /grancy/src/admin/adminusers.php');
        exit;
    }

    $fullname = $row['fullname'];
    $email = $row['email'];
    $phone_numb = $row['phone_numb'];
    $password = $row['password'];
    $user_type = $row['user_type'];
} else {
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone_numb = $_POST['phone_numb'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];
    do {
        if (empty($fullname) || empty($email) || empty($phone_numb) || empty($password) || empty($user_type)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        }

        $sql = "UPDATE users SET fullname = '$fullname', email = '$email',  phone_numb = '$phone_numb', password = '$password', user_type = '$user_type',  WHERE user_id = $id";

        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "<script>alert('Failed to update user')</script>";
        }

        $successMessage = 'User has been updated!';
    } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../css/output.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        h1 {
            font-family: Lexend;
            font-weight: 500;
            font-size: 60px;
        }

        h6 {
            font-family: Lexend;
            font-weight: 200;
            font-size: 14px;
        }

        p {
            font-family: Lexend, sans-serif;
            font-weight: 100;
            font-size: 16px;
        }
    </style>
</head>

<?php
ini_set('display_errors', 0);
session_start();
if ($_SESSION['admin']) {

?>

    <body>
        <?php
        include('./admintemplate/sidebar.php');
        ?>

        <div class="p-4 sm:ml-64">
            <div class="p-4 mt-14">
                <div class="flex items-center justify-between">
                    <h1>Create Users</h1>
                    <a href="/grancy/src/admin/adminusers.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
                </div>
                <?php
                if (!empty($successMessage)) {
                    echo '
                <div>
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>' . $successMessage . '</span>
                    </div>
                </div>
                ';
                }
                ?>
                <form method="POST">
                    <div class="p-10">
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Fullname</span>
                            </div>
                            <input type="text" name="fullname" placeholder="Type here" class="input input-bordered w-full " required value="<?php echo "$fullname" ?>" />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Email</span>
                            </div>
                            <input type="email" name="email" placeholder="Type here" class="input input-bordered w-full " required value="<?php echo "$email" ?>" />
                        </label>
                        <div class="w-full flex gap-x-4">
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text text-xl">Phone Number</span>
                                </div>
                                <input type="number" name="phone_numb" placeholder="Type here" class="input input-bordered w-full " required value="<?php echo "$phone_numb" ?>" />
                            </label>

                            <?php
                            include('../database/database.php');
                            $sql = "SELECT * FROM users WHERE user_id = $id";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $user_type = $row['user_type'];

                            if ($user_type == 'admin') {
                                echo '  <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text text-xl">Password</span>
                                </div>
                                <input type="text" name="password" placeholder="Type here" class="input input-bordered w-full " required value="' . $password . '" />
                            </label>';
                            } else {
                            }
                            ?>
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text text-xl">User Type</span>
                                </div>
                                <select name="user_type" class="select select-bordered w-full">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </label>
                        </div>
                        <div class="mt-4">
                            <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </body>
<?php
} else {
    include('template/notfound.php');
}
?>

</html>