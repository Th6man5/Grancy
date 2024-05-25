<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../css/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    <h1>Users</h1>
                    <a href="/grancy/src/admin/adminusers_create.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Add User</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr class="bg-blues2">
                                <th>No</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Number phone</th>
                                <th>User Type <br> (admin/user)</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../database/database.php');

                            $sql = "SELECT * FROM users";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    if ($row['user_id'] == 0) {
                                        continue;
                                    }
                                    echo '<tr>
                                <th>' . $row['user_id'] . '</th>
                                <td>' . $row['fullname'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['phone_numb'] . '</td>
                                <td>' . $row['user_type'] . '</td>
                                 <td class="flex gap-x-4 justify-center">
                                    <a href="/grancy/src/admin/adminusers_edit.php?id=' . $row['user_id'] . '" class="btn bg-yellow hover:shadow-md hover:bg-yellow group">
                                        <i class="bi bi-pencil-square  transition-all"></i>
                                    </a>
                                    <a onclick="return confirm(\'Are you sure you want to delete this user?\');" href="/grancy/src/admin/adminusers_delete.php?id=' . $row['user_id'] . '" class="btn bg-red hover:shadow-md hover:bg-red group">
                                        <i class="bi bi-trash-fill  transition-all"></i>
                                    </a>
                                </td>
                            </tr>';
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