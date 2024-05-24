<?php
include('../database/database.php');

$successMessage = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type_name = $_POST['type_name'];
    $square_meter = $_POST['square_meter'];
    $square_foot = $_POST['square_foot'];
    $price = $_POST['price'];
    $about = $_POST['about'];
    $feature = $_POST['feature'];
    $bath = $_POST['bath'];
    $intertainment = $_POST['intertainment'];
    $equipment = $_POST['equipment'];
    $refreshments = $_POST['refreshments'];
    $picture = $_FILES['picture'];

    do {
        if (empty($type_name) || empty($square_meter) || empty($square_foot) || empty($price) || empty($about) || empty($feature) || empty($bath) || empty($intertainment) || empty($equipment) || empty($refreshments)) {
            echo "<script>alert('Please fill all the fields')</script>";
            break;
        }

        // Process file upload
        $targetDir = "../database/uploads/";
        $targetFile = $targetDir . basename($picture['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = array('jpg', 'png', 'jpeg');

        $check = getimagesize($picture['tmp_name']);
        if ($check === false) {
            echo "<script>alert('File is not an image.')</script>";
            break;
        }

        // Check file size (5MB maximum)
        if ($picture['size'] > 5000000) {
            echo "<script>alert('Sorry, your file is too large. 5MB MAKS')</script>";
            break;
        }

        // perbolehkan format file tertentu
        if (!in_array($imageFileType, $allowedTypes)) {
            echo "<script>alert('Sorry, only JPG, JPEG, & PNG files are allowed.')</script>";
            break;
        }

        // Pindahkan file ke folder uploads
        if (!move_uploaded_file($picture['tmp_name'], $targetFile)) {
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
            break;
        }

        //Masuk SQL
        $sql = "INSERT INTO room_type (type_name, square_meter, square_foot, price, about, feature, bath, intertainment, equipment, refreshments, picture) VALUES ('$type_name', '$square_meter', '$square_foot', '$price', '$about', '$feature', '$bath', '$intertainment', '$equipment', '$refreshments', '$targetFile')";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            echo "<script>alert('Query tidak bisa')</script>";
            break;
        }

        //Pesan sukses
        $type_name = '';
        $square_meter = '';
        $square_foot = '';
        $price = '';
        $about = '';
        $feature = '';
        $bath = '';
        $intertainment = '';
        $equipment = '';
        $refreshments = '';

        $successMessage = 'Room Type has been created successfully';
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Krona+One&family=League+Spartan:wght@100..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap');

        h1 {
            font-family: Lexend;
            font-weight: 500;
            font-size: 60px;
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
                    <h1>Create Room Type</h1>
                    <a href="/grancy/src/admin/adminroomtype.php" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Back</a>
                </div>
                <?php
                if (!empty($successMessage)) {
                    echo '
                <div>
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Room Type Successfully Created</span>
                    </div>
                </div>
                ';
                }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="grid grid-cols-2 w-full h-full gap-4 p-10">
                        <div class="col-span-1">
                            <input type="file" id="imageUpload" name="picture" class="file-input file-input-bordered rounded-none w-full file-input-primary" />
                            <img id="imagePreview" src="#" class="w-full h-fit object-cover" alt="Image Preview" style="display: none;" />
                        </div>
                        <div class="col-span-1 w-full h-full">
                            <div class="grid grid-cols-1 gap-y-4 px-4">
                                <div class="grid grid-cols-2 gap-y-4">
                                    <label for="roomtype" class="label text-xl">Room Type</label>
                                    <input type="text" name="type_name" placeholder="Standard" class="input input-bordered w-full " />
                                    <label for="roomtype" class="label text-xl">Square Meter</label>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <input type="number" name="square_meter" class="grow" placeholder="40 - 45" />
                                        <span>sqm</span>
                                    </label>
                                    <label for="roomtype" class="label text-xl">Square Foot</label>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <input type="number" name="square_foot" class="grow" placeholder="431 - 484" />
                                        <span>sqf</span>
                                    </label>
                                    <label for="roomtype" class="label text-xl">Price</label>
                                    <label class="input input-bordered flex items-center gap-2">
                                        <span>IDR</span>
                                        <input type="number" name="price" class="grow" placeholder="1200000" />
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 ">
                            <div class="w-full">
                                <h1 class="text-4xl text-center my-4">About</h1>
                                <textarea type="text" name="about" placeholder="About" id="about"></textarea>
                            </div>
                            <div class="w-full">
                                <h1 class="text-4xl text-center my-4">Features</h1>
                                <textarea type="text" name="feature" placeholder="Features" id="feature"></textarea>
                            </div>
                        </div>
                        <div class="w-full">
                            <h1 class="text-4xl my-4">Bath & Personal Care</h1>
                            <textarea type="text" name="bath" placeholder="Bath" id="bath"></textarea>
                        </div>
                        <div class="w-full">
                            <h1 class="text-4xl my-4">Media & Entertainment</h1>
                            <textarea type="text" name="intertainment" placeholder="Intertainment" id="intertainment"></textarea>
                        </div>
                        <div class="w-full">
                            <h1 class="text-3xl my-4">Office Equipment & Stationery</h1>
                            <textarea type="text" name="equipment" placeholder="Equipment" id="equipment"></textarea>
                        </div>
                        <div class="w-full">
                            <h1 class="text-4xl my-4">Refreshments</h1>
                            <textarea type="text" name="refreshments" placeholder="Refreshments" id="refreshments"></textarea>

                        </div>
                        <div class="col-span-2 justify-self-end">
                            <button name="submit" type="submit" class="bg-blues opacity-95 text-white btn hover:bg-blues hover:opacity-100">Create</button>

                        </div>
                    </div>
                </form>
    </body>
    <script>
        ClassicEditor.create(document.querySelector('#about'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#feature'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#bath'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#intertainment'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#equipment'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).catch(error => {
            console.error(error);
        });

        ClassicEditor.create(document.querySelector('#refreshments'), {
            toolbar: ['heading', '|', 'bold', 'italic']
        }).catch(error => {
            console.error(error);
        });
    </script>

    <script>
        document.getElementById('imageUpload').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
<?php
} else {
    include('template/notfound.php');
}
?>

</html>