<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}
$user_id = $_SESSION['user_id'];

include_once('./database/database.php');

// ambil booking id
if (isset($_GET['booking_id']) && is_numeric($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];
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

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
            $paymentMethod = $_POST['payment_method'];
            $paymentTotal = $_POST['payment_total'];
            $transactionDate = date('Y-m-d');

            // Create a transaction
            $sql = "INSERT INTO transactions (transac_date, payment_total, payment_method, booking_id) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sisi', $transactionDate, $paymentTotal, $paymentMethod, $booking_id);
            if ($stmt->execute()) {
                $transaction_id = $stmt->insert_id;
                // Redirect to a success or payment processing page
                header('Location: checkout_complete.php?transaction_id=' . $transaction_id);
                exit();
            } else {
                echo "Failed to create transaction. Please try again.";
            }
        }
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
            <form method="POST">
                <div class="p-10 w-full">
                    <div class="flex gap-x-2 text-xl justify-center items-center">
                        <h3>Payment Method:</h3>
                        <select name="payment_method" class="select select-bordered">
                            <option value="gopay">Gopay</option>
                            <option value="ovo">OVO</option>
                            <option value="dana">Dana</option>
                        </select>
                    </div>
                    <div class="flex justify-center">
                        <img src="./database/qrcode.png" alt="">
                    </div>
                    <div class="flex gap-x-1 text-xl justify-center">
                        <input type="hidden" name="booking_id" value="<?php echo $booking_id ?>">
                        <input type="hidden" name="payment_total" value="<?php echo $totalPrice ?>">
                        <button type="submit" name="checkout" class="bg-blues px-7 py-3 text-white rounded-lg mt-5">Checkout</button>


                    </div>
                </div>
            </form>
        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>
</body>