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

        h1 {
            font-family: Lexend;
        }

        h6 {
            font-family: Lexend;
            font-weight: 400;
            font-size: 14px;
        }

        p {
            font-family: Lexend, sans-serif;
            font-weight: 400;
        }
    </style>
    <title>Sign Up</title>
</head>

<body>
    <div class="w-full">
        <?php
        @include('template/navbar.php');
        ?>
    </div>
    <img src="https://images.unsplash.com/photo-1488330890490-c291ecf62571?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="absolute h-screen w-full bg-contain">
    <div class="absolute flex items-center justify-center place-content-center bg-black opacity-25 h-screen w-full">
    </div>
    <div class="absolute flex items-start justify-center place-content-center rounded-lg bg-white h-7/8 w-11/12 mt-12 ml-12">
        <div class="items-start h-max w-3/5 mt-5">
            <h1 class="items-start flex justify-center text-4xl">Make An Account</h1>
            <form>
                <p class="ml-20 mt-10">Fullname</p>
                <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                    <input type="text" class="grow" placeholder="John Doe" />
                </label>
                <p class="ml-20 mt-3">Username</p>
                <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                    <input type="text" class="grow" placeholder="username" />
                </label>
                <p class="ml-20 mt-3">Email</p>
                <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                    <input type="text" class="grow" placeholder="email@gmail.com" />
                </label>
                <p class="ml-20 mt-3">Password</p>
                <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                    <input type="password" class="grow" placeholder="" />
                </label>
                <div class="flex mt-10 justify-between  rounded-lg bg-transparent h-fit w-3/4 ml-20">
                    <button href="" class="  rounded-lg bg-blues text-white hover:bg-black hover:drop-shadow-3xl hover:border-none w-1/4">Sign Up</button>
                    <div class="text-center">
                        <h6 class=" text-black">Already have an account?</h6>
                        <button href="signin.php" class="text-blues">Sign In</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card inline items-center justify-end place-content-center w-2/5">
            <img src="https://images.unsplash.com/photo-1578329619724-7b15defabbfd?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDU2fHxob3RlbHxlbnwwfHwwfHx8MA%3D%3D" class="h-fit w-full object-contain rounded-r-lg">
        </div>
    </div>

    </div>


</body>

</html>