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
    <div class="w-full h-full">
        <?php
        @include('template/navbar.php');
        ?>
        <div class="p-20">
            <a href="/grancy/src/roomsearch.php" class="text-xl" style="font-family: Lexend;">Back</a>
            <h3 class="bg-grey w-full text-center text-2xl p-2">Summary</h3>
            <div class="w-full h-full grid grid-cols-3 grid-flow-col">
                <div class="pr-10 pt-10 w-fit h-fit col-span-1">
                    <img src="https://plus.unsplash.com/premium_photo-1675615667752-2ccda7042e7e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-md">
                </div>
                <div class="pt-10 text-xl col-span-2 leading-loose relative ">
                    <div class="flex w-fit gap-x-4">
                        <h3>Date:</h3>
                        <h4>Monday, 15 may 2024</h4>
                        <h4>-</h4>
                        <h4>Tuesday, 16 may 2024</h4>
                    </div>
                    <div class="flex w-fit gap-x-4">
                        <h3>Rooms & Guest:</h3>
                        <h4>1 Rooms</h4>
                        <h4>,</h4>
                        <h4>1 Guests</h4>
                    </div>
                    <div class="flex w-fit gap-x-4">
                        <h3>Room Type:</h3>
                        <h4>Standard</h4>
                    </div>
                    <div class="flex w-full gap-x-4">
                        <h3>Room Floor:</h3>
                        <select class="select w-fit bg-grey text-lg drop-shadow-3xl">
                            <option disabled selected class="text-xl">0</option>
                            <option class="text-xl">1</option>
                            <option class="text-xl">2</option>
                            <option class="text-xl">3</option>
                            <option class="text-xl">4</option>
                            <option class="text-xl">5</option>
                            <option class="text-xl">6</option>
                            <option class="text-xl">7</option>
                            <option class="text-xl">8</option>
                            <option class="text-xl">9</option>
                        </select>
                    </div>

                    <svg class="w-full absolute bottom-0 right-0" height="1" viewBox="0 0 1000 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="0.5" x2="1000" y2="0.5" stroke="black" stroke-opacity="0.3" />
                    </svg>

                </div>
            </div>
            <div class="grid grid-cols-3 p-10 w-full">
                <div class="flex justify-center items-center">
                </div>
                <div class="text-xl flex justify-start items-center gap-x-4 -ml-3">
                    <h3>Total Charges:</h3>
                    <h4>IDR 1.643.500</h4>
                </div>
                <div class="flex justify-end items-center gap-x-1 text-xl">
                    <a href="" class="bg-blues px-7 py-3 text-white rounded-lg">Book Now</a>
                </div>
            </div>


        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>
</body>