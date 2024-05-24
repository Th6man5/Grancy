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
    </style>
    <title>Bukti Transaksi</title>
</head>

<body>
    <div class="w-full h-full">
        <?php
        @include('template/navbar.php');
        ?>
        <div class="w-full h-full px-20 pt-10">
            <a href="" class="text-xl" style="font-family: Lexend;">Back</a>
            <h3 class="bg-grey w-full text-center text-2xl p-2">Hotel Voucher</h3>
            <h3 class="text-lg text-left text-neutral-500">Please PRINT this voucher and bring when you CHECK IN in Grancy Hotel. Bring your credit card if your payment using credit card</h3>

            <div class="relative flex items-center my-20">
                <div class="flex-none join items-center justify-center border-neutral-500 border-2">
                    <div class="flex input w-60 items-center bg-white join-item">
                        <h3 class="flex-none text-xl">Order ID:</h3>
                        <h4 class="flex-none text-xl">#000001020</h4>
                    </div>
                    <div class="flex join-item relative items-center justify-center">
                        <div class="flex-none z-0 absolute">
                            <svg width="3" height="48" viewBox="0 0 1 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.5" y1="70.0071" x2="0.5" y2="-6.10352e-05" stroke="black" stroke-opacity="0.37" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex input w-48 items-center justify-center bg-white join-item">
                        <h3 class="flex text-xl">Date: </h3>
                        <h4 class="flex text-xl">14/05/2024</h4>
                    </div>
                </div>

                <div class="absolute flex-none w-fit h-fit right-0">
                    <h2 class="text-blues2 text-3xl text-center">VERIFIED</h2>
                    <div class="flex items-center justify-center">
                        <h3 class="flex-none text-xl">admin:</h3>
                        <h3 class="flex-none text-xl">#3123500011</h3>
                    </div>
                </div>
            </div>

            <div class="w-1/2 mb-20">
                <div class="flex w-1/2 mb-4">
                    <h3 class="flex-none w-full text-2xl">Guest Name</h3>
                    <h3 class="flex-none w-fit text-2xl">:</h3>
                    <h4 class="flex-none w-full text-2xl">John Doe</h4>
                </div>
                <div class="flex w-1/2">
                    <h3 class="flex-none w-full text-2xl">Country</h3>
                    <h3 class="flex-none w-fit text-2xl">:</h3>
                    <h4 class="flex-none w-full text-2xl">Indonesia</h4>
                </div>
            </div>

            <h3 class="bg-grey w-full text-center text-2xl p-2">Room Detail</h3>

            <div class="flex my-20">
                <div class="w-1/2">
                    <div class="flex w-1/2 mb-4">
                        <h3 class="flex-none w-full text-2xl">Check In</h3>
                        <h3 class="flex-none w-fit text-2xl">:</h3>
                        <h4 class="flex-none w-full text-2xl">Monday, 15 May</h4>
                    </div>
                    <div class="flex w-1/2 mb-4">
                        <h3 class="flex-none w-full text-2xl">Rooms & Guests</h3>
                        <h3 class="flex-none w-fit text-2xl">:</h3>
                        <h4 class="flex-none w-full text-2xl">1 Room, 1 Guest</h4>
                    </div>
                    <div class="flex w-1/2 mb-4">
                        <h3 class="flex-none w-full text-2xl">Room Type</h3>
                        <h3 class="flex-none w-fit text-2xl">:</h3>
                        <h4 class="flex-none w-full text-2xl">Standard</h4>
                    </div>
                    <div class="flex w-1/2">
                        <h3 class="flex-none w-full text-2xl">Room Floor</h3>
                        <h3 class="flex-none w-fit text-2xl">:</h3>
                        <h4 class="flex-none w-full text-2xl">6 (six)</h4>
                    </div>
                </div>
                <div class="w-1/2">
                    <div class="flex w-1/2">
                        <h3 class="flex-none w-full text-2xl">Check Out</h3>
                        <h3 class="flex-none w-fit text-2xl">:</h3>
                        <h4 class="flex-none w-full text-2xl">Tuesday, 16 May</h4>
                    </div>
                </div>
            </div>

            <h3 class="bg-grey w-full text-center text-2xl p-2">Payment Method</h3>

            <div class="w-1/2 my-20">
                <div class="flex w-1/2 mb-4">
                    <h3 class="flex-none w-full text-2xl">Payment Type</h3>
                    <h3 class="flex-none w-fit text-2xl">:</h3>
                    <h4 class="flex-none w-full text-2xl">Virtual Payment, Gopay</h4>
                </div>
                <div class="flex w-1/2 mb-4">
                    <h3 class="flex-none w-full text-2xl">Charge</h3>
                    <h3 class="flex-none w-fit text-2xl">:</h3>
                    <h4 class="flex-none w-full text-2xl">Rp1.643.500</h4>
                </div>
            </div>

            <div class="grid grid-cols-3 py-20">
                <h4 class="text-lg text-neutral-500">If you need help, reach us</h4>
                <div class="flex items-center justify-center">
                    <h3 class="flex-none text-lg">Customer Service :</h3>
                    <h4 class="flex-none text-lg">0813-0005-511</h4>
                </div>
                <div class="flex items-end justify-end">
                    <h3 class="flex-none text-lg">Email :</h3>
                    <h4 class="flex-none text-lg">cs@grancy.com</h4>
                </div>
            </div>

            <div class="flex-none text-xl mb-80">
                <a href="" class="bg-blues px-7 py-3 text-white rounded-lg">Print</a>
            </div>

        </div>
        <?php
        @include('template/footer.php');
        ?>
</body>

</html>