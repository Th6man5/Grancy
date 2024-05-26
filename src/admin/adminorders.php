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
                <h1>Transaction</h1>
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr class="bg-blues2">
                                <th>No</th>
                                <th>Fullname</th>
                                <th>Room</th>
                                <th>Order Date</th>
                                <th>Payment Type</th>
                                <th>Total Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../database/database.php');
                            $sql = "SELECT t.transac_date, t.payment_total, t.payment_method, b.room_id, b.user_id, r.room_number, u.fullname
                            FROM transactions t
                            JOIN bookings b ON t.booking_id = b.booking_id
                            JOIN rooms r ON b.room_id = r.room_id
                            JOIN users u ON b.user_id = u.user_id";

                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>
                                <th>' . $no . '</th>
                                <td>' . $row['fullname'] . '</td>
                                <td>' . $row['room_number'] . '</td>
                                <td>' . $row['transac_date'] . '</td>
                                <td>' . $row['payment_method'] . '</td>
                                <td>' . number_format($row['payment_total']) . '</td>
                                        </tr>';
                                    $no++;
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </body>
<?php
} else {
    include('template/notfound.php');
}
?>

</html>