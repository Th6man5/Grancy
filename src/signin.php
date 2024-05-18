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
    <title>Sign In</title>
</head>

<body>
    <div class="w-full">
        <?php
        @include('template/navbar.php');
        ?>
    </div>
    <img src="https://images.unsplash.com/photo-1455587734955-081b22074882?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="absolute h-screen w-full bg-contain">
    <div class="absolute flex items-center justify-center place-content-center bg-black opacity-25 h-screen w-full">
    </div>
    <div class="absolute flex items-start justify-center place-content-center rounded-lg bg-white h-7/8 w-11/12 mt-12 ml-12">
        <div class="items-start h-max w-3/5 mt-5">
            <h1 class="items-start flex justify-center text-4xl">Sign In To Your Account</h1>
            <form>
                <p class="ml-20 mt-10">Username</p>
                <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                    <input type="text" class="grow" placeholder="username" />
                </label>
                <p class="ml-20 mt-3">Password</p>
                <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                    <input type="password" class="grow" placeholder="******" />
                </label>
                <div class="flex mt-10 justify-between  rounded-lg bg-transparent h-fit w-3/4 ml-20">
                    <button href="" class="  rounded-lg bg-blues text-white hover:bg-black hover:drop-shadow-3xl hover:border-none w-1/4">Sign In</button>
                    <div class="text-center">
                        <h6 class=" text-black">Don't have an account?</h6>
                        <button href="signup.php" class="text-blues">Sign Up</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card inline items-center justify-end place-content-center w-2/5">
            <img src="https://images.unsplash.com/photo-1563911302283-d2bc129e7570?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-fit w-full object-contain rounded-r-lg">
        </div>
    </div>

    </div>


</body>

</html>