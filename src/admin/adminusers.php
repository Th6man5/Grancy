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
                <h1>Users</h1>

                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr class="bg-blues2">
                                <th>No</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Number phone</th>
                                <th>User Type <br> (admin/user)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr>
                                <th>1</th>
                                <td>Selvi Riska</td>
                                <td>selviriskanisa@gmail.com</td>
                                <td>085784152004</td>
                                <td>user</td>
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