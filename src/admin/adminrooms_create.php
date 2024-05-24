<?php
if (isset($_POST['submit'])) {
    include('../database/database.php');
    $room_number = $_POST['room_number'];
    $type_id = $_POST['type_id'];
    $floor = $_POST['floor'];
    $user_id = $_POST['user_id'];

    if ($user_id == 'none' || $user_id == '0') {
        $user_id = 0;
        $status = 'Available';
    } else {
        $status = 'Booked';
    }

    do {
        if (empty($room_number) || empty($type_id) || empty($floor)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        } else {
            $sql = "INSERT INTO rooms (room_number, type_id, floor, user_id, status) VALUES ('$room_number', '$type_id', '$floor', '$user_id', '$status')";
            if (mysqli_query($conn, $sql)) {
                $successMessage = 'Room has been created successfully';
            } else {
                echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
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
                    <h1>Create Rooms</h1>
                    <a href="/grancy/src/admin/adminrooms.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
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
                                <span class="label-text text-xl">Room Number</span>
                            </div>
                            <input type="text" name="room_number" placeholder="Type here" class="input input-bordered w-full " required />
                        </label>
                        <label class="form-control w-full">
                            <div class="label">
                                <span class="label-text text-xl">Room Type</span>
                            </div>
                            <select name="type_id" class="select select-bordered w-full">
                                <?php
                                include('../database/database.php');
                                $sql = "SELECT * FROM room_type";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . $row['type_id'] . '">' . $row['type_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </label>
                        <div class="w-full flex gap-x-4">
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text text-xl">Floor</span>
                                </div>
                                <select name="floor" class="select select-bordered w-full">
                                    <option value="1">Floor 1</option>
                                    <option value="2">Floor 2</option>
                                    <option value="3">Floor 3</option>
                                    <option value="4">Floor 4</option>
                                    <option value="5">Floor 5</option>
                                    <option value="6">Floor 6</option>
                                </select>
                            </label>
                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text text-xl">Booking</span>
                                </div>
                                <select name="user_id" class="select select-bordered w-full">
                                    <option value="none">None</option>
                                    <?php
                                    include('../database/database.php');
                                    $sql = "SELECT * FROM users";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['user_id'] . '">' . $row['fullname'] . '</option>';
                                        }
                                    }
                                    ?>
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