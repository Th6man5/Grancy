<?php
session_start();
$user_id = $_SESSION['user_id'];

include_once('./database/database.php');

// Validate and retrieve the booking_id from the URL
if (isset($_GET['booking_id']) && is_numeric($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    // Fetch the booking details for the specified booking_id
    $sql = "
        SELECT b.checkin, b.checkout, b.guest, b.room_id, rt.type_name, rt.price, r.floor
        FROM bookings b
        JOIN rooms r ON b.room_id = r.room_id
        JOIN room_type rt ON r.type_id = rt.type_id
        WHERE b.user_id = ? AND b.booking_id = ?
        LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $user_id, $booking_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $booking = $result->fetch_assoc();

    if ($booking) {
        $checkin = $booking['checkin'];
        $checkout = $booking['checkout'];
        $guest = $booking['guest'];
        $room_id = $booking['room_id'];
        $type_name = $booking['type_name'];
        $pricePerNight = $booking['price'];
        $floor = $booking['floor'];

        // Calculate the number of nights
        $checkinDate = new DateTime($checkin);
        $checkoutDate = new DateTime($checkout);
        $nights = $checkoutDate->diff($checkinDate)->days;

        // Calculate the total price
        $totalPrice = $pricePerNight * $nights;
    } else {
        // Handle the case where no booking is found for the specified booking_id
        echo "No booking found for this user with the specified booking ID.";
        exit();
    }
} else {
    // Handle invalid or missing booking_id
    echo "Invalid booking ID.";
    exit();
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
            <h3 class="bg-grey w-full text-center text-2xl p-2">Checkout</h3>
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
                        <h4><?php echo $type_name; ?></h4>
                    </div>
                    <div class="flex w-fit gap-x-4">
                        <h3>Room Floor:</h3>
                        <h4><?php echo $floor; ?></h4>
                    </div>
                    <div class="flex gap-x-4 absolute bottom-0 right-0 mb-2">
                        <h3>Total Charges:</h3>
                        <h4><?php echo 'IDR ' . number_format($totalPrice); ?></h4>
                    </div>
                    <svg class="w-full absolute bottom-0 right-0" height="1" viewBox="0 0 1000 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.5" x2="1000" y2="0.5" stroke="black" stroke-opacity="0.3" />
                    </svg>

                </div>
            </div>
            <div class="p-10 w-full">
                <div class="flex gap-x-1 text-xl justify-center">
                    <h3>Pay Within: </h3>
                    <span id="countdown" class="countdown font-mono text-2xl text-red">
                        <span id="minutes" style="--value:20;"></span>:
                        <span id="seconds" style="--value:0;"></span>
                    </span>
                </div>
                <div class="flex gap-x-1 text-xl justify-center">
                    <button href="" class="bg-blues px-7 py-3 text-white rounded-lg mt-5">Checkout</button>
                </div>
            </div>
            <form id="cancel-form" action="cancel_booking.php" method="post" style="display: none;">
                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
            </form>


        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>
    <script>
        // Set initial countdown values
        let countdownMinutes = 20;
        let countdownSeconds = 0;

        // Get the countdown elements
        const minutesElement = document.getElementById('minutes');
        const secondsElement = document.getElementById('seconds');

        // Update the countdown timer display
        function updateCountdownDisplay() {
            minutesElement.innerText = String(countdownMinutes).padStart(2, '0');
            secondsElement.innerText = String(countdownSeconds).padStart(2, '0');
        }

        // Function to handle the countdown logic
        function startCountdown() {
            const countdownInterval = setInterval(() => {
                if (countdownSeconds === 0) {
                    if (countdownMinutes === 0) {
                        clearInterval(countdownInterval);
                        cancelBooking();
                    } else {
                        countdownMinutes--;
                        countdownSeconds = 59;
                    }
                } else {
                    countdownSeconds--;
                }
                updateCountdownDisplay();
            }, 1000);
        }

        // Function to cancel the booking
        function cancelBooking() {
            const cancelForm = document.getElementById('cancel-form');
            cancelForm.submit();
        }

        // Start the countdown timer
        startCountdown();
    </script>
</body>