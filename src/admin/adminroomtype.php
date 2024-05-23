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
                    <h1>Room Types</h1>
                    <a href="/grancy/src/admin/adminroomtype_create.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Add Room Type</a>
                </div>
                <div class="grid grid-cols-2 w-full h-full gap-4 p-10">
                    <?php
                    include('../database/database.php');

                    $sql = "SELECT * FROM room_type";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="relative w-fit h-fit">
                                      <img src="';
                            if (!empty($row['picture'])) {
                                echo htmlspecialchars($row['picture'], ENT_QUOTES, 'UTF-8') . '"';
                            } else {
                                echo "https://plus.unsplash.com/premium_photo-1675615667752-2ccda7042e7e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";
                            }
                            echo  'class="rounded-t-md w-full h-1/2 object-cover">
                                      <div class="absolute top-0 left-0 bg-blues rounded-tl-sm rounded-br-md">
                                          <h1 class="text-white p-2 px-4 text-lg">' . htmlspecialchars($row['type_name']) . '</h1>
                                      </div>
                                      <div class="bg-white rounded-b-md p-5 flex justify-center gap-x-4 shadow-md">
                                          <a href="/grancy/src/admin/adminroomtype_edit.php?id=' . $row['type_id'] . '" class="btn bg-yellow hover:shadow-md hover:bg-yellow group" onclick="my_modal_4.showModal()">
                                              <i class="bi bi-pencil-square group-hover:pe-2 transition-all"></i>
                                              Edit
                                          </a>
                                          <a class="btn bg-blues2 hover:shadow-md hover:bg-blues2 group">
                                              <i class="bi bi-eye-fill group-hover:pe-2 transition-all"></i>
                                              View
                                          </a>
                                          <a onclick="return confirm(\'Are you sure you want to delete this room type?\');" href="/grancy/src/admin/adminroomtype_delete.php?id=' . $row['type_id'] . '"  class="btn bg-red hover:shadow-md hover:bg-red group">
                                              <i class="bi bi-trash-fill group-hover:pe-2 transition-all"></i>
                                              Delete
                                          </a>
                                      </div>
                                  </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>

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