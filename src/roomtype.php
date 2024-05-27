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
    <title>Room Types</title>
</head>

<body>
    <div class="w-full h-full">
        <?php
        @include('template/navbar.php');
        ?>
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

        <?php
        @include('template/footer.php');
        ?>
    </div>    
</body>

</html>