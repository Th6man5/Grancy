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
    <?php
    include('template/navbar.php');
    ?>

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('database/database.php');

    if (isset($_POST['submit'])) {
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone_numb = mysqli_real_escape_string($conn, $_POST['phone_numb']);
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error[] = 'User already exists!';
        } else {
            $insert_stmt = $conn->prepare("INSERT INTO users (fullname, email, password, phone_numb) VALUES (?, ?, ?, ?)");
            $insert_stmt->bind_param("ssss", $fullname, $email, $hashed_password, $phone_numb);
            if ($insert_stmt->execute()) {
                header('Location: signin.php');
                exit();
            } else {
                $error[] = 'Failed to register user!';
            }
            $insert_stmt->close();
        }

        $stmt->close();
    }

    ?>


    <div class="w-full">
        <div class="relative flex items-center justify-center">
            <div class="bg-black w-full">
                <img src="https://images.unsplash.com/photo-1488330890490-c291ecf62571?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-screen w-full bg-contain opacity-50 pointer-events-none">
            </div>

            <div class="absolute top-0 bottom-0 left-0 right-0 flex rounded-lg bg-white w-11/12 mt-12 ml-12 mb-10">
                <div class="items-start h-max w-3/5 mt-10">
                    <h1 class="items-start flex justify-center text-4xl">Make An Account</h1>

                    <?php
                    if (!empty($error)) {
                        foreach ($error as $err) {
                            echo "<p class='text-red text-sm text-center mt-10'>$err</p>";
                        }
                    }
                    ?>

                    <form method="POST" action="signup.php">
                        <p class="ml-20 mt-10">Fullname</p>
                        <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                            <input type="text" class="grow" placeholder="John Doe" name="fullname" required />
                        </label>
                        <p class="ml-20 mt-3">Phone Number</p>
                        <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                            <input type="number" class="grow" placeholder="phone Number" name="phone_numb" required />
                        </label>
                        <p class="ml-20 mt-3">Email</p>
                        <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                            <input type="text" class="grow" placeholder="email@gmail.com" name="email" required />
                        </label>
                        <p class="ml-20 mt-3">Password</p>
                        <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                            <input type="password" class="grow" placeholder="" name="password" required />
                        </label>
                        <div class="flex mt-10 justify-between  rounded-lg bg-transparent h-fit w-3/4 ml-20">
                            <input type="submit" name="submit" value="Sign up" class="rounded-lg bg-blues text-white hover:bg-black hover:drop-shadow-3xl hover:border-none w-1/4"></input>
                            <div class="text-center">
                                <h6 class=" text-black">Already have an account?</h6>
                                <a href="signin.php" class="text-blues">Sign In</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card inline items-center justify-end place-content-center w-2/5 h-full">
                    <img src="https://images.unsplash.com/photo-1578329619724-7b15defabbfd?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDU2fHxob3RlbHxlbnwwfHwwfHx8MA%3D%3D" class="h-full w-full object-cover  rounded-r-lg">
                </div>
            </div>
        </div>
        <?php
        @include('template/footer.php');
        ?>
    </div>


</body>

</html>