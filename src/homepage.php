<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
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
    <div class="w-full">
        <?php
        @include('template/navbar.php');
        ?>

        <div class="relative flex items-center justify-center">
            <div class="bg-black w-full">
                <img src="https://images.unsplash.com/photo-1568084680786-a84f91d1153c?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-screen w-full bg-contain opacity-50 pointer-events-none">
            </div>

            <div class="absolute top-0 bottom-0 left-0 right-0 flex flex-col items-center justify-center uppercase">
                <h2 class="text-white text-8xl">Reserve</h2>
                <h2 class="text-white text-8xl">Sleep</h2>
                <h2 class="text-white text-8xl">Happy</h2>
            </div>
        </div>

        <div class="grid grid-cols-2 h-full w-full px-32 pt-32 gap-20 place-content-center" id="about">
            <div>
                <h1 class="text-8xl mb-2" style="font-family:  League Spartan, sans-serif;">About</h1>
                <p class="text-2xl">Lorem ipsum dolor sit amet consectetur. Varius blandit cras massa adipiscing laoreet ut sagittis amet vestibulum. Lorem gravida commodo at in ultricies. Consequat aliquet imperdiet laoreet pellentesque a pharetra luctus non vitae. Faucibus montes urna etiam leo.</p>
            </div>

            <div class="h-screen w-full relative flex  justify-center">
                <img src="https://images.unsplash.com/photo-1537833633404-f02da1734a6b?q=80&w=1895&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-5/6 w-5/6 absolute z-20 ">
                <div class="bg-blues2 h-5/6 w-5/6 relative z-10 mt-5 ml-5"></div>
            </div>
        </div>


        <h1 class="text-center text-8xl" id="room">Room Types</h1>
        <div class="grid grid-cols-2 grid-rows-2 w-full px-32 pt-32 gap-x-44 gap-y-32 justify-center h-full mb-32">
            <div class="w-full h-96 relative">
                <div class="w-full h-full relative ">
                    <img src="https://images.tokopedia.net/blog-tokopedia-com/uploads/2020/02/1.-standard-room-sumber-gambar-Pixabay.jpg" class="h-backdrop w-backdrop z-20 rounded-xl shadow-md absolute bottom-0 right-0">
                    <div class="bg-blues2 h-backdrop w-backdrop relative z-10 rounded-xl "></div>
                </div>
                <p class="text-center text-5xl mt-5">Standard Room</p>
            </div>
            <div class="w-full h-full relative">
                <div class="w-full h-full relative">
                    <img src="https://images.tokopedia.net/blog-tokopedia-com/uploads/2020/02/2.-Superior-Room-sumber-gambar-Pixabay.jpg" class="h-backdrop w-backdrop z-20 rounded-xl shadow-md absolute bottom-0">
                    <div class="bg-blues2 h-backdrop w-backdrop absolute z-10 rounded-xl right-0"></div>
                </div>
                <p class="text-center text-5xl mt-5">Superior Room</p>
            </div>
            <div class="w-full h-full relative">
                <div class="w-full h-full relative">
                    <img src="https://images.tokopedia.net/blog-tokopedia-com/uploads/2020/02/1.-Single-Room-sumber-gambar-Pixabay.jpg" class="h-backdrop w-backdrop z-20 rounded-xl shadow-md absolute top-0 right-0">
                    <div class="bg-blues2 h-backdrop w-backdrop absolute z-10 rounded-xl left-0 bottom-0"></div>
                </div>
                <p class="text-center text-5xl mt-5">Single Room</p>
            </div>
            <div class="w-full h-full relative">
                <div class="w-full h-full relative">
                    <img src="https://images.tokopedia.net/blog-tokopedia-com/uploads/2020/02/2.-Twin-Room-sumber-gambar-Palmtree-Resort.jpg" class="h-backdrop w-backdrop z-30 rounded-xl absolute shadow-lg">
                    <div class="bg-blues2 h-backdrop w-backdrop absolute z-10 rounded-xl right-0 bottom-0"></div>
                </div>
                <p class="text-center text-5xl mt-5">Twin Room</p>
            </div>
        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>

</body>

</html>