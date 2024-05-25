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
                <div class="flex w-fit bg-white mt-10 h-28 gap-x-2 p-8 shadow-lg  mx-auto justify-center">
                    <div class="flex-none join shadow-lg">
                        <div class="flex input w-48 items-center justify-center bg-white join-item">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2 ">
                                <path d="M0.5 21.75C0.5 23.875 2.125 25.5 4.25 25.5H21.75C23.875 25.5 25.5 23.875 25.5 21.75V11.75H0.5V21.75ZM21.75 3H19.25V1.75C19.25 1 18.75 0.5 18 0.5C17.25 0.5 16.75 1 16.75 1.75V3H9.25V1.75C9.25 1 8.75 0.5 8 0.5C7.25 0.5 6.75 1 6.75 1.75V3H4.25C2.125 3 0.5 4.625 0.5 6.75V9.25H25.5V6.75C25.5 4.625 23.875 3 21.75 3Z" fill="black" fill-opacity="0.65" />
                            </svg>
                            <input type="date" id="checkin" name="checkin" class="flex-none text-sm">
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
                            <input type="date" id="checkout" name="checkout" class="flex-none text-sm">
                        </div>
                    </div>
                    <div class="flex-none join shadow-lg">
                        <div class="flex input w-36 items-center justify-center bg-white join-item">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg" class="flex-none mr-2">
                                <path d="M15 12.5C17.7614 12.5 20 10.2614 20 7.5C20 4.73858 17.7614 2.5 15 2.5C12.2386 2.5 10 4.73858 10 7.5C10 10.2614 12.2386 12.5 15 12.5Z" fill="black" fill-opacity="0.65" />
                                <path d="M25 21.875C25 24.9812 25 27.5 15 27.5C5 27.5 5 24.9812 5 21.875C5 18.7688 9.4775 16.25 15 16.25C20.5225 16.25 25 18.7688 25 21.875Z" fill="black" fill-opacity="0.65" />
                            </svg>
                            <!-- <input type="number" min="0" name="guests" id="guests" placeholder="0 ROOM" class="flex w-24 text-sm text-center items-center justify-center bg-white join-item"> -->
                            <select class="flex-none text-sm">
                                <option selected class="text-sm">1 ROOM</option>
                                <option class="text-sm">2 ROOMS</option>
                                <option class="text-sm">3 ROOMS</option>
                                <option class="text-sm">4 ROOMS</option>
                                <option class="text-sm">5 ROOMS</option>
                                <option class="text-sm">6 ROOMS</option>
                                <option class="text-sm">7 ROOMS</option>
                                <option class="text-sm">8 ROOMS</option>
                                <option class="text-sm">9 ROOMS</option>
                            </select>
                        </div>
                        <div class="flex join-item">
                            <div class="flex-none z-0">
                                <svg width="3" height="48" viewBox="0 0 1 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="0.5" y1="70.0071" x2="0.5" y2="-6.10352e-05" stroke="black" stroke-opacity="0.37" />
                                </svg>
                            </div>
                        </div>
                        <!-- <input type="number" min="0" name="guests" id="guests" placeholder="0 GUESTS" class="flex w-28 pl-3 text-sm text-center items-center justify-center bg-white join-item"> -->
                        <select class="flex w-28 p-3
                         text-sm items-center justify-center bg-white join-item">
                                <option selected class="text-sm">1 GUEST</option>
                                <option class="text-sm">1 GUESTS</option>
                                <option class="text-sm">2 GUESTS</option>
                                <option class="text-sm">3 GUESTS</option>
                                <option class="text-sm">4 GUESTS</option>
                                <option class="text-sm">5 GUESTS</option>
                            </select>
                    </div>
                    <select class="flex select w-56 shadow-lg items-center justify-center bg-white">
                        <option selected class="text-sm">STANDARD</option>
                        <option class="text-sm">SUPERIOR</option>
                        <option class="text-sm">SINGLE</option>
                        <option class="text-sm">TWIN</option>
                    </select>
                    <div class="flex w-12 h-12 shadow-lg rounded-lg items-center justify-center bg-blues">
                        <svg width="36" height="36" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.2917 29.1667H30.6458L30.0625 28.6042C32.1747 26.1542 33.3356 23.0265 33.3333 19.7917C33.3333 17.1134 32.5391 14.4952 31.0512 12.2683C29.5632 10.0414 27.4483 8.30574 24.9738 7.2808C22.4994 6.25587 19.7766 5.9877 17.1498 6.51021C14.523 7.03271 12.1101 8.32243 10.2163 10.2163C8.32243 12.1101 7.03271 14.523 6.51021 17.1498C5.9877 19.7766 6.25587 22.4994 7.2808 24.9738C8.30574 27.4483 10.0414 29.5632 12.2683 31.0512C14.4952 32.5391 17.1134 33.3333 19.7917 33.3333C23.1458 33.3333 26.2292 32.1042 28.6042 30.0625L29.1667 30.6458V32.2917L39.5833 42.6875L42.6875 39.5833L32.2917 29.1667ZM19.7917 29.1667C14.6042 29.1667 10.4167 24.9792 10.4167 19.7917C10.4167 14.6042 14.6042 10.4167 19.7917 10.4167C24.9792 10.4167 29.1667 14.6042 29.1667 19.7917C29.1667 24.9792 24.9792 29.1667 19.7917 29.1667Z" fill="white" />
                        </svg>
                    </div>
                </div>
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