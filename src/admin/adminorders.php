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
                <h1>Orders</h1>
                
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                        <tr class="bg-blues2">
                            <th>No</th>
                            <th>ID Order</th>
                            <th>Username</th>
                            <th>Room</th>
                            <th>Order Date</th>
                            <th>Payment Type</th>
                            <th>Total Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- row 1 -->
                        <tr>
                            <th>1</th>
                            <td>GCY101</td>
                            <td>selvirn</td>
                            <td>102</td>
                            <td>25/05/2024</td>
                            <td>gopay</td>
                            <td>Rp.500.000</td>
                        </tr>
                        <!-- row 2 -->
                        <tr>
                            <th>2</th>
                            <td>GCY102</td>
                            <td>masternim</td>
                            <td>203</td>
                            <td>25/05/2024</td>
                            <td>gopay</td>
                            <td>Rp.350.000</td>
                        </tr>
                        <!-- row 3 -->
                        <tr>
                            <th>3</th>
                            <td>GCY103</td>
                            <td>johndoe</td>
                            <td>301</td>
                            <td>25/05/2024</td>
                            <td>gopay</td>
                            <td>Rp.400.000</td>
                        </tr>
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