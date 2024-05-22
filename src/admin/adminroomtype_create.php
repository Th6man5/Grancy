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
                <div class="grid grid-cols-2 w-full h-full gap-4 p-10">
                    <div class="col-span-1">
                        <form action="grancy/src/admin/adminroomtype_create.php" method="POST">
                            <input type="file" id="imageUpload" class="file-input file-input-bordered rounded-none w-full file-input-primary" />
                            <img id="imagePreview" src="#" class="w-full h-fit object-cover" alt="Image Preview" style="display: none;" />
                    </div>
                    <div class="col-span-1 w-full h-full">
                        <div class="grid grid-cols-1 gap-y-4 px-4">
                            <div class="grid grid-cols-2 gap-y-4">
                                <label for="roomtype" class="label text-xl">Room Type</label>
                                <input type="text" name="type_name" placeholder="Standard" class="input input-bordered w-full " />
                                <label for="roomtype" class="label text-xl">Square Meter</label>
                                <label class="input input-bordered flex items-center gap-2">
                                    <input type="text" class="grow" placeholder="40 - 45" />
                                    <span>sqm</span>
                                </label>
                                <label for="roomtype" class="label text-xl">Square Foot</label>
                                <label class="input input-bordered flex items-center gap-2">
                                    <input type="text" class="grow" placeholder="431 - 484" />
                                    <span>sqf</span>
                                </label>
                                <label for="roomtype" class="label text-xl">Price</label>
                                <label class="input input-bordered flex items-center gap-2">
                                    <span>IDR</span>
                                    <input type="text" class="grow" placeholder="1200000" />
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
                        </form>
                    </div>
                </div>
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