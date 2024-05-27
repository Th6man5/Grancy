<?php
include('./database/database.php');

if (isset($_POST['submit'])) {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $guest = $_POST['guest'];
    $type_id = $_POST['type_id'];

    header('Location: /grancy/src/roomsearch.php?checkin=' . $checkin . '&checkout=' . $checkout . '&guest=' . $guest . '&type_id=' . $type_id);
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

        label {
            font-family: Lexend;
            font-weight: 300;
        }

        input {
            font-family: Lexend;
            font-weight: 300;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkinInput = document.getElementById('checkin');
            const checkoutInput = document.getElementById('checkout');
            const nightsDisplay = document.getElementById('nights');

            function calculateNights() {
                const checkinDate = new Date(checkinInput.value);
                const checkoutDate = new Date(checkoutInput.value);

                if (checkinDate && checkoutDate && checkinDate < checkoutDate) {
                    const timeDifference = checkoutDate - checkinDate;
                    const nights = timeDifference / (1000 * 3600 * 24);
                    nightsDisplay.textContent = `${nights} Night${nights !== 1 ? 's' : ''}`;
                } else {
                    nightsDisplay.textContent = '1 Night';
                }
            }

            checkinInput.addEventListener('change', calculateNights);
            checkoutInput.addEventListener('change', calculateNights);
        });
    </script>
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
                <form method="POST">
                    <div class="flex w-fit bg-white mt-10 h-28 gap-x-2 p-8 shadow-lg  mx-auto justify-center">
                        <div class="flex-none join shadow-lg">
                            <!-- checkin -->
                            <div class="flex input w-48 items-center justify-center bg-white join-item">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2">
                                    <path d="M0.5 21.75C0.5 23.875 2.125 25.5 4.25 25.5H21.75C23.875 25.5 25.5 23.875 25.5 21.75V11.75H0.5V21.75ZM21.75 3H19.25V1.75C19.25 1 18.75 0.5 18 0.5C17.25 0.5 16.75 1 16.75 1.75V3H9.25V1.75C9.25 1 8.75 0.5 8 0.5C7.25 0.5 6.75 1 6.75 1.75V3H4.25C2.125 3 0.5 4.625 0.5 6.75V9.25H25.5V6.75C25.5 4.625 23.875 3 21.75 3Z" fill="black" fill-opacity="0.65" />
                                </svg>
                                <input type="date" id="checkin" name="checkin" class="flex-none text-sm">
                            </div>
                            <!-- malam -->
                            <div class="flex join-item relative w-16 items-center justify-center bg-white">
                                <div class="flex-none z-0 absolute">
                                    <svg width="3" height="48" viewBox="0 0 1 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="0.5" y1="70.0071" x2="0.5" y2="-6.10352e-05" stroke="black" stroke-opacity="0.37" />
                                    </svg>
                                </div>
                                <div class="flex-none z-10 absolute">
                                    <div id="nights" class="px-1 py-1 shadow-lg rounded-lg bg-grey text-xs">1 Night</div>
                                </div>
                            </div>
                            <!-- checkout -->
                            <div class="flex input w-48 items-center justify-center bg-white join-item">
                                <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2">
                                    <path d="M0.5 21.75C0.5 23.875 2.125 25.5 4.25 25.5H21.75C23.875 25.5 25.5 23.875 25.5 21.75V11.75H0.5V21.75ZM21.75 3H19.25V1.75C19.25 1 18.75 0.5 18 0.5C17.25 0.5 16.75 1 16.75 1.75V3H9.25V1.75C9.25 1 8.75 0.5 8 0.5C7.25 0.5 6.75 1 6.75 1.75V3H4.25C2.125 3 0.5 4.625 0.5 6.75V9.25H25.5V6.75C25.5 4.625 23.875 3 21.75 3Z" fill="black" fill-opacity="0.65" />
                                </svg>
                                <input type="date" id="checkout" name="checkout" class="flex-none text-sm">
                            </div>
                        </div>
                        <!-- guest -->
                        <div class="flex-none join shadow-lg">
                            <div class="flex input w-44 items-center justify-center bg-white join-item rounded-md ">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2">
                                    <path d="M15 12.5C17.7614 12.5 20 10.2614 20 7.5C20 4.73858 17.7614 2.5 15 2.5C12.2386 2.5 10 4.73858 10 7.5C10 10.2614 12.2386 12.5 15 12.5Z" fill="black" fill-opacity="0.65" />
                                    <path d="M25 21.875C25 24.9812 25 27.5 15 27.5C5 27.5 5 24.9812 5 21.875C5 18.7688 9.4775 16.25 15 16.25C20.5225 16.25 25 18.7688 25 21.875Z" fill="black" fill-opacity="0.65" />
                                </svg>
                                <input type="number" min="0" name="guest" id="guests" placeholder="0" class="flex w-full text-sm text-center items-center justify-center bg-white join-item">
                                <span class="opacity-80">Guest</span>
                            </div>
                        </div>
                        <!-- pilih tipe room -->
                        <select name="type_id" class="flex select w-56 shadow-lg items-center justify-center bg-white">
                            <?php
                            include('./database/database.php');
                            $sql = "SELECT * FROM room_type";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                                <option class="text-sm" value="<?php echo $row['type_id'] ?>"><?php echo $row['type_name'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                        <!-- Search buttom -->
                        <button type="submit" name="submit">
                            <div class="flex w-12 h-12 shadow-lg rounded-lg items-center justify-center bg-blues">
                                <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M32.2917 29.1667H30.6458L30.0625 28.6042C32.1747 26.1542 33.3356 23.0265 33.3333 19.7917C33.3333 17.1134 32.5391 14.4952 31.0512 12.2683C29.5632 10.0414 27.4483 8.30574 24.9738 7.2808C22.4994 6.25587 19.7766 5.9877 17.1498 6.51021C14.523 7.03271 12.1101 8.32243 10.2163 10.2163C8.32243 12.1101 7.03271 14.523 6.51021 17.1498C5.9877 19.7766 6.25587 22.4994 7.2808 24.9738C8.30574 27.4483 10.0414 29.5632 12.2683 31.0512C14.4952 32.5391 17.1134 33.3333 19.7917 33.3333C23.1458 33.3333 26.2292 32.1042 28.6042 30.0625L29.1667 30.6458V32.2917L39.5833 42.6875L42.6875 39.5833L32.2917 29.1667ZM19.7917 29.1667C14.6042 29.1667 10.4167 24.9792 10.4167 19.7917C10.4167 14.6042 14.6042 10.4167 19.7917 10.4167C24.9792 10.4167 29.1667 14.6042 29.1667 19.7917C29.1667 24.9792 24.9792 29.1667 19.7917 29.1667Z" fill="white" />
                                </svg>
                            </div>
                        </button>
                    </div>
                </form>

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
        <div class="w-full h-full">
            <div class="w-full h-full p-20">
                <div class="flex items-center justify-center w-full join">
                    <a href="#standard" class="join-item btn btn-md" aria-label="Standard" checked>
                        <h3 class="">Standard</h3>
                    </a>
                    <a href="#superior" class="join-item btn btn-md" aria-label="Superior">
                        <h3 class="">Superior</h3>
                    </a>
                    <a href="#single" class="join-item btn btn-md" aria-label="Single">
                        <h3 class="">Single</h3>
                    </a>
                    <a href="#twin" class="join-item btn btn-md" aria-label="Twin">
                        <h3 class="">Twin</h3>
                    </a>
                </div>

                <div class="carousel items-start">
                    <!-- standard room -->
                    <div id="standard" class="carousel-item hero">
                        <div class="hero-content w-full flex-col">
                            <div class="flex w-full h-full">
                                <div class="carousel shadow-xl rounded-lg w-full">
                                    <div id="slide1" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/C/A/D/%7BCADE906A-281F-4256-BE36-3C3BECA440D0%7DISL_RM_Deluxe_Peak_View_Room_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide2" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/6/0/3/%7B603C49ED-02A9-4887-90EF-18F447F46A41%7DISL_RM_Deluxe_Peak_View_Room_Bath_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide3" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/5/2/E/%7B52EACDD2-CC9B-48FA-86C6-9A948DF5D84D%7DISL_RM_Deluxe_Peak_View_Room_Twin_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-1/4 ml-5">
                                    <h3 class="text-5xl">Standard Room</h3>
                                    <h4 class="text-sm text-neutral-500">40 - 45 sqm / 431 - 484 sqf</h4>
                                    <h4 class="text-md py-5">Grancy Hotel's Standard Room offer exquisite comfort with an elegant, Asian-accented décor. Full-size windows command spectacular views of Surabaya cityscape.</h4>
                                    <div class="flex absolute bottom-0 right-0">
                                        <h4 class="flex-none text-sm">IDR 1,643,500</h4>
                                        <h3 class="flex-none text-sm text-blues2">/night</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="w-full">
                                <h3 class="bg-grey w-full text-left text-3xl p-2">Features</h3>
                                <div class="w-full h-full mt-5">
                                    <h4 class="text-left text-lg">
                                        <ul class="list-disc ml-10">
                                            <li>Full-size window with sweeping views of the Surabaya cityscape</li>
                                            <li>An indulgent bed with duvet</li>
                                            <li>Marble bathroom with separate shower</li>
                                        </ul>
                                    </h4>
                                </div>
                                <h3 class="bg-grey w-full text-left text-3xl mt-5 p-2">Amenities</h3>
                                <div class="grid grid-cols-2 grid-rows-2 gap-x-10 w-full h-full mt-5">
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Bath & Personal Care</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Pillow menu</li>
                                                <li>Duvet</li>
                                                <li>Grancy Hotel amenities</li>
                                                <li>Iron and ironing board</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Media & Entertaiment</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Wireless Internet access</li>
                                                <li>LCD television</li>
                                                <li>Closed-circuit TV channels</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Office Equipment & Stationery</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Full size executive writing desk</li>
                                                <li>International Direct Dial telephone</li>
                                                <li>Independent fax line</li>
                                                <li>Voice mail</li>
                                                <li>Electronic safe</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Refreshments</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Coffee / tea-making facilities</li>
                                                <li>24-hour room service</li>
                                            </ul>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- superior room -->
                    <div id="superior" class="carousel-item hero">
                        <div class="hero-content w-full flex-col">
                            <div class="flex w-full h-full">
                                <div class="carousel shadow-xl rounded-lg w-full">
                                    <div id="slide1" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/6/6/C/%7B66C1D5C6-C18D-45EB-94DC-E42B246E6B15%7DISL_RM_Executive_Suite_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide2" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/9/B/E/%7B9BE9E939-BE9F-466A-9010-F730D43446F9%7DISL_RM_Executive_Suite_Living_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide3" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/D/E/E/%7BDEE637FF-DE34-4118-96E5-6C10DBD73BBE%7DISL_RM_Cityview_Suite_Bath_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide4" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide4" class="carousel-item relative w-full items-center">
                                        <img src="https://sitecore-cd.shangri-la.com/-/media/Shangri-La/hongkong_islandshangrila/dining/restaurants/overview/ISL-dining-overview-banner-image-lobbylounge-1920x500.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-1/4 ml-5">
                                    <h3 class="text-5xl">Superior Room</h3>
                                    <h4 class="text-sm text-neutral-500">82 sqm / 883 sqf</h4>
                                    <h4 class="text-md py-5">Whether travelling for business or leisure, Grancy Club guests can enjoy Grancy Hotel’s signature warm Asian hospitality in a luxurious setting. The Grancy Club Lounge is open from 7am to 9pm daily.</h4>
                                    <div class="flex absolute bottom-0 right-0">
                                        <h4 class="flex-none text-sm">IDR 2,832,000</h4>
                                        <h3 class="flex-none text-sm text-blues2">/night</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="w-full">
                                <h3 class="bg-grey w-full text-left text-3xl p-2">Features</h3>
                                <div class="w-full h-full mt-5">
                                    <h4 class="text-left text-lg">
                                        <ul class="list-disc ml-10">
                                            <li>Full-size window with sweeping views of the Surabaya cityscape</li>
                                            <li>Luxury 1 bedroom suite with Grancy Club lounge access</li>
                                            <li>Access to the Grancy Club lounge with benefits including : daily breakfast dan evening cocktails</li>
                                            <li>Marble bathroom with separate shower</li>
                                        </ul>
                                    </h4>
                                </div>
                                <h3 class="bg-grey w-full text-left text-3xl mt-5 p-2">Amenities</h3>
                                <div class="grid grid-cols-2 grid-rows-2 gap-x-10 w-full h-full mt-5">
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Bath & Personal Care</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Pillow menu</li>
                                                <li>Duvet</li>
                                                <li>Soaking tub</li>
                                                <li>Grancy Hotel amenities</li>
                                                <li>Iron and ironing board</li>
                                                <li>Twice daily housekeeping service</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Media & Entertaiment</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Wireless Internet access</li>
                                                <li>LCD television in bedroom, living room, and bathroom</li>
                                                <li>Closed-circuit TV channels</li>
                                                <li>Audio home theatre system</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Office Equipment & Stationery</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Bedside lighting and curtain controls</li>
                                                <li>In-room locker</li>
                                                <li>Executive writing desk with built-in multi-plug sockets</li>
                                                <li>International Direct Dial telephone</li>
                                                <li>Independent fax line</li>
                                                <li>Voice mail</li>
                                                <li>Electronic safe</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Refreshments</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Coffee / tea-making facilities</li>
                                                <li>Nespresso coffee machine with capsules</li>
                                                <li>24-hour room service</li>
                                            </ul>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- single room -->
                    <div id="single" class="carousel-item hero">
                        <div class="hero-content w-full flex-col">
                            <div class="flex w-full h-full">
                                <div class="carousel shadow-xl rounded-lg w-full">
                                    <div id="slide1" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/A/D/9/%7BAD973CE5-628C-4DF2-9913-6411E0C7EDB9%7DISL_RM_Horizon_Club_Peak_View_Room_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide2" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/5/0/E/%7B50E92FB8-74B3-4CDE-91D2-0144075B0AC0%7DISL_RM_Horizon_Club_Peak_View_Room_Bed_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide3" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/1/2/6/%7B12637E92-C555-410A-98F8-F2A9E9D50F33%7DISL_RM_Grand_Premier_Peak_View_Room_Bath_1920x940_001.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-1/4 ml-5">
                                    <h3 class="text-5xl">Single Room</h3>
                                    <h4 class="text-sm text-neutral-500">40 - 45 sqm / 431 - 484 sqf</h4>
                                    <h4 class="text-md py-5">Modern rooms with enhanced facilities</h4>
                                    <h4 class="text-md pt-1">The brand new Grancy Hotel's Single Rooms offer a contemporary living space that blend modern conveniences with Asian aesthetics.</h4>
                                    <div class="flex absolute bottom-0 right-0">
                                        <h4 class="flex-none text-sm">IDR 1,852,000</h4>
                                        <h3 class="flex-none text-sm text-blues2">/night</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="w-full">
                                <h3 class="bg-grey w-full text-left text-3xl p-2">Features</h3>
                                <div class="w-full h-full mt-5">
                                    <h4 class="text-left text-lg">
                                        <ul class="list-disc ml-10">
                                            <li>Full-size window with sweeping views of the Surabaya cityscape</li>
                                            <li>An indulgent bed with duvet</li>
                                            <li>Spacious walk-through closet</li>
                                            <li>Marble bathroom with separate shower</li>
                                        </ul>
                                    </h4>
                                </div>
                                <h3 class="bg-grey w-full text-left text-3xl mt-5 p-2">Amenities</h3>
                                <div class="grid grid-cols-2 grid-rows-2 gap-x-10 w-full h-full mt-5">
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Bath & Personal Care</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Pillow menu</li>
                                                <li>Duvet</li>
                                                <li>Grancy Hotel amenities</li>
                                                <li>Iron and ironing board</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Media & Entertaiment</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Wireless Internet access</li>
                                                <li>LCD television</li>
                                                <li>Closed-circuit TV channels</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Office Equipment & Stationery</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Bedside lighting, curtain controls, and wireless charging device</li>
                                                <li>Full size executive writing desk</li>
                                                <li>International Direct Dial telephone</li>
                                                <li>Independent fax line</li>
                                                <li>Voice mail</li>
                                                <li>Electronic safe</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Refreshments</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Coffee / tea-making facilities</li>
                                                <li>24-hour room service</li>
                                            </ul>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- twin room -->
                    <div id="twin" class="carousel-item hero">
                        <div class="hero-content w-full flex-col">
                            <div class="flex w-full h-full">
                                <div class="carousel shadow-xl rounded-lg w-full">
                                    <div id="slide1" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/D/F/D/%7BDFD9A097-E043-4EA4-B650-CCA9CAAB55E8%7DISL_RM_Horizon_Club_Peak_View_Room_Twin_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide2" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/F/E/9/%7BFE9E2367-AEF2-484A-85F0-ADF70EE1FE1E%7DISL_RM_Grand_Premier_City_View_Bed_1920x940.jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide3" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                    <div id="slide3" class="carousel-item relative w-full">
                                        <img src="https://sitecore-cd-imgr.shangri-la.com/MediaFiles/9/5/7/%7B957DD4E7-0179-4F76-B12B-9947B4D19C81%7D2024_ISL_1BK_Bathroom_WhatTheFox-0001%20(1)%20(1).jpg">
                                        <div class="absolute flex justify-between transform -translate-y-1/2 left-8 right-8 top-1/2">
                                            <a href="#slide2" class="btn btn-circle border-0 text-xl bg-nav">❮</a>
                                            <a href="#slide1" class="btn btn-circle border-0 text-xl bg-nav">❯</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-1/4 ml-5">
                                    <h3 class="text-5xl">Twin Room</h3>
                                    <h4 class="text-sm text-neutral-500">40 - 45 sqm / 431 - 484 sqf</h4>
                                    <h4 class="text-md py-5">Modern rooms with enhanced facilities</h4>
                                    <h4 class="text-md pt-1">The brand new Grancy Hotel's Single Rooms offer a contemporary living space that blend modern conveniences with Asian aesthetics.</h4>
                                    <div class="flex absolute bottom-0 right-0">
                                        <h4 class="flex-none text-sm">IDR 1,944,000</h4>
                                        <h3 class="flex-none text-sm text-blues2">/night</h3>
                                    </div>
                                </div>
                            </div>


                            <div class="w-full">
                                <h3 class="bg-grey w-full text-left text-3xl p-2">Features</h3>
                                <div class="w-full h-full mt-5">
                                    <h4 class="text-left text-lg">
                                        <ul class="list-disc ml-10">
                                            <li>Full-size window with sweeping views of the Surabaya cityscape</li>
                                            <li>An indulgent bed with duvet</li>
                                            <li>Spacious walk-through closet</li>
                                            <li>Marble bathroom with separate shower</li>
                                        </ul>
                                    </h4>
                                </div>
                                <h3 class="bg-grey w-full text-left text-3xl mt-5 p-2">Amenities</h3>
                                <div class="grid grid-cols-2 grid-rows-2 gap-x-10 w-full h-full mt-5">
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Bath & Personal Care</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Pillow menu</li>
                                                <li>Duvet</li>
                                                <li>Grancy Hotel amenities</li>
                                                <li>Iron and ironing board</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Media & Entertaiment</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Wireless Internet access</li>
                                                <li>LCD television</li>
                                                <li>Closed-circuit TV channels</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Office Equipment & Stationery</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Bedside lighting, curtain controls, and wireless charging device</li>
                                                <li>Full size executive writing desk</li>
                                                <li>International Direct Dial telephone</li>
                                                <li>Independent fax line</li>
                                                <li>Voice mail</li>
                                                <li>Electronic safe</li>
                                            </ul>
                                        </h4>
                                    </div>
                                    <div class="w-full h-full">
                                        <h3 class="text-left text-xl">Refreshments</h3>
                                        <h4 class="text-left text-lg">
                                            <ul class="list-disc ml-10">
                                                <li>Coffee / tea-making facilities</li>
                                                <li>24-hour room service</li>
                                            </ul>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- hero selesai -->
                </div>
            </div>
        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>


</body>

</html>