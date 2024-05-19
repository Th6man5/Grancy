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
    <title>Pencarian Room</title>
</head>

<body>
    <div class="w-full h-full">
        <?php
        @include('template/navbar.php');
        ?>
        <div class="w-full h-full px-20 mt-5">
            <div class="flex w-full h-28 gap-x-2 p-8 shadow-lg bg-grey mx-auto">
                <div class="flex-none join shadow-lg">
                    <div class="flex input w-48 items-center justify-center bg-white join-item">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2 ">
                            <path d="M0.5 21.75C0.5 23.875 2.125 25.5 4.25 25.5H21.75C23.875 25.5 25.5 23.875 25.5 21.75V11.75H0.5V21.75ZM21.75 3H19.25V1.75C19.25 1 18.75 0.5 18 0.5C17.25 0.5 16.75 1 16.75 1.75V3H9.25V1.75C9.25 1 8.75 0.5 8 0.5C7.25 0.5 6.75 1 6.75 1.75V3H4.25C2.125 3 0.5 4.625 0.5 6.75V9.25H25.5V6.75C25.5 4.625 23.875 3 21.75 3Z" fill="black" fill-opacity="0.65" />
                        </svg>
                        <h4 class="flex-none text-sm">May 15, 2024</h4>
                    </div>
                    <div class="flex join-item relative w-16 items-center justify-center bg-white">
                        <div class="flex-none z-0 absolute">
                            <svg width="3" height="48" viewBox="0 0 1 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.5" y1="70.0071" x2="0.5" y2="-6.10352e-05" stroke="black" stroke-opacity="0.37" />
                            </svg>
                        </div>
                        <div class="flex-none z-10 absolute">
                            <div class="px-1 py-1 shadow-lg rounded-lg bg-grey text-xs">1 Night</div>
                        </div>
                    </div>
                    <div class="flex input w-48 items-center justify-center bg-white join-item">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2">
                            <path d="M0.5 21.75C0.5 23.875 2.125 25.5 4.25 25.5H21.75C23.875 25.5 25.5 23.875 25.5 21.75V11.75H0.5V21.75ZM21.75 3H19.25V1.75C19.25 1 18.75 0.5 18 0.5C17.25 0.5 16.75 1 16.75 1.75V3H9.25V1.75C9.25 1 8.75 0.5 8 0.5C7.25 0.5 6.75 1 6.75 1.75V3H4.25C2.125 3 0.5 4.625 0.5 6.75V9.25H25.5V6.75C25.5 4.625 23.875 3 21.75 3Z" fill="black" fill-opacity="0.65" />
                        </svg>
                        <h4 class="flex-none text-sm">May 16, 2024</h4>
                    </div>
                </div>
                <div class="flex-none join shadow-lg">
                    <div class="flex input w-36 items-center justify-center bg-white join-item">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2">
                            <path d="M15 12.5C17.7614 12.5 20 10.2614 20 7.5C20 4.73858 17.7614 2.5 15 2.5C12.2386 2.5 10 4.73858 10 7.5C10 10.2614 12.2386 12.5 15 12.5Z" fill="black" fill-opacity="0.65" />
                            <path d="M25 21.875C25 24.9812 25 27.5 15 27.5C5 27.5 5 24.9812 5 21.875C5 18.7688 9.4775 16.25 15 16.25C20.5225 16.25 25 18.7688 25 21.875Z" fill="black" fill-opacity="0.65" />
                        </svg>
                        <h4 class="flex-none text-sm">1 Room</h4>
                    </div>
                    <div class="flex join-item">
                        <div class="flex-none z-0">
                            <svg width="3" height="48" viewBox="0 0 1 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.5" y1="70.0071" x2="0.5" y2="-6.10352e-05" stroke="black" stroke-opacity="0.37" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex input w-28 items-center justify-center bg-white join-item">
                        <h4 class="flex-none text-sm">1 Guest</h4>
                    </div>
                </div>
                <div class="flex input w-56 shadow-lg items-center justify-center bg-white">
                    <h4 class="text-sm">Standard</h4>
                </div>
                <div class="flex w-12 h-12 shadow-lg rounded-lg items-center justify-center bg-blues">
                    <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M32.2917 29.1667H30.6458L30.0625 28.6042C32.1747 26.1542 33.3356 23.0265 33.3333 19.7917C33.3333 17.1134 32.5391 14.4952 31.0512 12.2683C29.5632 10.0414 27.4483 8.30574 24.9738 7.2808C22.4994 6.25587 19.7766 5.9877 17.1498 6.51021C14.523 7.03271 12.1101 8.32243 10.2163 10.2163C8.32243 12.1101 7.03271 14.523 6.51021 17.1498C5.9877 19.7766 6.25587 22.4994 7.2808 24.9738C8.30574 27.4483 10.0414 29.5632 12.2683 31.0512C14.4952 32.5391 17.1134 33.3333 19.7917 33.3333C23.1458 33.3333 26.2292 32.1042 28.6042 30.0625L29.1667 30.6458V32.2917L39.5833 42.6875L42.6875 39.5833L32.2917 29.1667ZM19.7917 29.1667C14.6042 29.1667 10.4167 24.9792 10.4167 19.7917C10.4167 14.6042 14.6042 10.4167 19.7917 10.4167C24.9792 10.4167 29.1667 14.6042 29.1667 19.7917C29.1667 24.9792 24.9792 29.1667 19.7917 29.1667Z" fill="white" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="flex relative w-full h-full p-20">
            <div class="flex-none w-80 h-fit">
                <div class="w-fit h-fit">
                    <img src="https://plus.unsplash.com/premium_photo-1675615667752-2ccda7042e7e?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="rounded-md">
                </div>
                <div class="mt-5">
                    <h3 class="text-center text-3xl">Standard Room</h3>
                    <p class="text-center text-lg">40 - 45 sqm / 431 - 484 sqf</p>
                </div>
            </div>

            <div class="flex-none w-fit h-full ml-10">
                <h3 class="bg-grey w-full text-left text-3xl p-2">Features</h3>
                <div class="w-full h-full mt-5">
                    <h4 class="text-left text-lg">
                        <ul class="list-disc ml-10">
                            <li>Full-size window with sweeping views of the Surabaya cityscape</li>
                            <li>An indugent bed with duvet</li>
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
                <div class="relative w-full h-full text-left text-3xl mt-20 p-2">
                    <div class="flex w-fit">
                        <div class="absolute right-40 text-xl">
                            <div class="flex">
                                <h4 class="flex-none">IDR 1,643,500</h4>
                                <h3 class="flex-none text-blues2">/night</h3>
                            </div>
                        </div>
                        <div class="flex-none absolute right-0 text-xl">
                            <a href="" class="bg-blues px-7 py-3 text-white rounded-lg">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        @include('template/footer.php');
        ?>

</body>

</html>