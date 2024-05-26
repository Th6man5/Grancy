<?php
session_start();
include_once('./database/database.php');

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['transaction_id'])) {
    $transaction_id = $_GET['transaction_id'];

    // Fetch the transaction details
    $sql = "
        SELECT t.transac_date, t.payment_total, t.payment_method, b.checkin, b.checkout, b.guest, rt.type_name, rt.price, r.floor
        FROM transactions t
        JOIN bookings b ON t.booking_id = b.booking_id
        JOIN rooms r ON b.room_id = r.room_id
        JOIN room_type rt ON r.type_id = rt.type_id
        WHERE t.transaction_id = ? AND b.user_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $transaction_id, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $transaction = $result->fetch_assoc();

    if (!$transaction) {
        echo "Transaction not found.";
        exit();
    }

    $transac_date = $transaction['transac_date'];
    $payment_total = $transaction['payment_total'];
    $payment_method = $transaction['payment_method'];
    $checkin = $transaction['checkin'];
    $checkout = $transaction['checkout'];
    $guest = $transaction['guest'];
    $type_name = $transaction['type_name'];
    $pricePerNight = $transaction['price'];
    $floor = $transaction['floor'];
} else {
    echo "Invalid request.";
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
                        <h4><?php echo 'IDR ' . number_format($payment_total); ?></h4>
                    </div>
                    <svg class="w-full absolute bottom-0 right-0" height="1" viewBox="0 0 1000 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.5" x2="1000" y2="0.5" stroke="black" stroke-opacity="0.3" />
                    </svg>

                </div>
            </div>
            <div class="p-10 w-full">
                <div class="flex justify-center">
                    <h3 class="text-green">Payment successfull</h3>
                </div>
                <div class="flex gap-x-1 text-xl justify-center">
                    <a href="transaction.php<?php echo '?transaction_id=' . $transaction_id . '"'; ?> class=" bg-blues px-7 py-3 text-white rounded-lg mt-5">See Reciept</a>
                    <a href="homepage.php" class="bg-blues px-7 py-3 text-white rounded-lg mt-5">Home</a>
                </div>
            </div>
        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>
</body>