<?php
session_start();
$user_id = $_SESSION['user_id'];
//SIMPEN DATA SEARCsd ROOM
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET['checkin']) || !isset($_GET['checkout']) || !isset($_GET['guest']) || !isset($_GET['type_id'])) {
        header('Location: /grancy/src/homepage.php');
        exit;
    }
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $guest = $_GET['guest'];
    $type_id = $_GET['type_id'];
}

//Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['booking'])) {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guest = $_POST['guest'];
    $type_id = $_POST['type_id'];
    $floor = $_POST['floor'];

    include('./database/database.php');

    // Fetch a random available room on the selected floor
    $sql = "SELECT * FROM rooms WHERE type_id = ? AND floor = ? AND status = 'available' ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $type_id, $floor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $room = $result->fetch_assoc();
        $room_id = $room['room_id'];

        // Insert booking details into the bookings table
        $sql = "INSERT INTO bookings (user_id, room_id, checkin, checkout, guest) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iissi', $user_id, $room_id, $checkin, $checkout, $guest);
        if ($stmt->execute()) {
            $booking_id = $conn->insert_id;

            // Update room status to booked and assign user_id to the room
            $sql = "UPDATE rooms SET status = 'booked', user_id = ? WHERE room_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $user_id, $room_id);
            $stmt->execute();

            // Redirect to the checkout page with the booking_id
            header('Location: /grancy/src/checkout.php?booking_id=' . $booking_id);
            exit();
        } else {
            // Handle booking failure (e.g., show an error message)
            echo "Failed to book the room. Please try again.";
        }
    } else {
        // Handle no available room on the selected floor
        echo "No available rooms on the selected floor.";
    }
} else {
    echo "Invalid request.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        h2 {
            font-family: Krona One;
        }

        h1 {
            font-family: League Spartan;
        }

        p {
            font-family: League Spartan, sans-serif;
            font-weight: 300;
        }

        h3 {
            font-family: Lexend;
        }

        h4 {
            font-family: Lexend;
            font-weight: 300;
        }
    </style>
    <title>Homepage</title>
</head>

<body>
    <div class="w-full h-full">
        <?php
        @include('template/navbar.php');
        ?>
        <div class="p-20">
            <a href="javascript:history.back()" class="text-xl" style="font-family: Lexend;">Back</a>
            <h3 class="bg-grey w-full text-center text-2xl p-2">Summary</h3>
            <div class="w-full h-full grid grid-cols-3 grid-flow-col">
                <div class="pr-10 pt-10 w-fit h-fit col-span-1">
                    <img src="https://plus.unsplash.com/premium_photo-1675615667752-2ccda7042e7e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-md">
                </div>
                <div class="pt-10 text-xl col-span-2 leading-loose relative ">
                    <div class="flex w-fit gap-x-4">
                        <h3>Date:</h3>
                        <h4><?php echo $checkin; ?></h4>
                        <h4>-</h4>
                        <h4><?php echo $checkout; ?></h4>
                    </div>
                    <div class="flex w-fit gap-x-4">
                        <h3>Guest:</h3>
                        <h4><?php echo $guest; ?></h4>
                    </div>
                    <div class="flex w-fit gap-x-4">
                        <h3>Room Type:</h3>
                        <h4>
                            <?php
                            include('./database/database.php');
                            $sql = "SELECT * FROM room_type where type_id = $type_id";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo $row['type_name'];
                            }
                            ?>
                        </h4>
                    </div>
                    <form method="POST" action="/grancy/src/reservation.php">
                        <input type="hidden" name="checkin" value="<?php echo htmlspecialchars($checkin); ?>">
                        <input type="hidden" name="checkout" value="<?php echo htmlspecialchars($checkout); ?>">
                        <input type="hidden" name="guest" value="<?php echo htmlspecialchars($guest); ?>">
                        <input type="hidden" name="type_id" value="<?php echo htmlspecialchars($type_id); ?>">
                        <div class="flex w-full gap-x-4">
                            <h3>Room Floor:</h3>
                            <select name="floor" class="select w-fit bg-grey text-lg drop-shadow-3xl">
                                <?php
                                include('./database/database.php');
                                $sql = "SELECT DISTINCT floor FROM rooms WHERE type_id = $type_id AND status = 'available'";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="' . htmlspecialchars($row['floor'])  . '" class="text-xl">' . htmlspecialchars($row['floor']) . '</option>';
                                    }
                                } else {
                                    echo '<option class="text-xl" disabled>No available floors</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <svg class="w-full absolute bottom-0 right-0" height="1" viewBox="0 0 1000 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line y1="0.5" x2="1000" y2="0.5" stroke="black" stroke-opacity="0.3" />
                        </svg>

                </div>
            </div>
            <div class="grid grid-cols-3 p-10 w-full">
                <div class="flex justify-center items-center">
                </div>
                <div class="text-xl flex justify-start items-center gap-x-4 -ml-3">
                    <h3>Total Charges:</h3>
                    <h4>
                        <?php
                        include('./database/database.php');

                        // Calculate the number of nights
                        $checkinDate = new DateTime($checkin);
                        $checkoutDate = new DateTime($checkout);
                        $nights = $checkoutDate->diff($checkinDate)->days;

                        $sql = "SELECT * FROM room_type where type_id = $type_id";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            $price_total = $row['price'] * $nights;
                            echo 'IDR ' . number_format($price_total);
                        }
                        ?>
                    </h4>
                </div>
                <div class="flex justify-end items-center gap-x-1 text-xl">
                    <button type="submit" name="booking" class="bg-blues px-7 py-3 text-white rounded-lg">Book Now</button>
                </div>
            </div>
            </form>


        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>
</body>