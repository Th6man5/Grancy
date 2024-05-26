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

    <?php
    @include('template/navbar.php');
    ?>

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('database/database.php');

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                if ($row['user_type'] == 'admin') {
                    $_SESSION['user_name'] = $row['fullname'];
                    $_SESSION['admin'] = $row['user_type'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header('Location: admin/admindashboard.php');
                    exit();
                } elseif ($row['user_type'] == 'user') {
                    $_SESSION['user_name'] = $row['fullname'];
                    $_SESSION['user'] = $row['user_type'];
                    $_SESSION['user_id'] = $row['user_id'];
                    header('Location: homepage.php');
                    exit();
                } else {
                    $error[] = 'User type is not recognized.';
                }
            } else {
                $error[] = 'Incorrect email or password!';
            }
        } else {
            $error[] = 'Incorrect email or password!';
        }

        $stmt->close();
    }
    ?>



    <div class="w-full ">
        <div class="relative flex items-center justify-center">
            <div class="bg-black w-full">
                <img src="https://images.unsplash.com/photo-1455587734955-081b22074882?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-screen w-full bg-contain opacity-50 pointer-events-none">
            </div>

            <div class="absolute top-0 bottom-0 left-0 right-0 flex rounded-lg bg-white w-11/12 mt-12 ml-12 mb-10">
                <div class="items-start h-max w-3/5 mt-10">
                    <h1 class="items-start flex justify-center text-4xl">Sign In To Your Account</h1>

                    <?php
                    if (!empty($error)) {
                        foreach ($error as $err) {
                            echo "<p class='text-red text-sm text-center mt-10'>$err</p>";
                        }
                    }
                    ?>

                    <form method="POST" action="signin.php">
                        <p class="ml-20 mt-10">Email</p>
                        <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                            <input type="email" name="email" class="grow" placeholder="email" required />
                        </label>
                        <p class="ml-20 mt-3">Password</p>
                        <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-20">
                            <input type="password" name="password" class="grow" placeholder="******" required />
                        </label>
                        <div class="flex mt-10 justify-between  rounded-lg bg-transparent h-fit w-3/4 ml-20">
                            <input value="Sign In" name="submit" type="submit" class="rounded-lg bg-blues text-white hover:bg-black transition-all hover:drop-shadow-3xl hover:border-none w-1/4"></input>
                            <div class="text-center">
                                <h6 class=" text-black">Don't have an account?</h6>
                                <a href="signup.php" class="text-blues">Sign Up</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card inline items-center justify-end place-content-center w-2/5 h-full ">
                    <img src="https://images.unsplash.com/photo-1563911302283-d2bc129e7570?q=80&w=1935&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-full w-full object-cover rounded-r-lg">
                </div>

            </div>
        </div>

        <?php
        @include('template/footer.php');
        ?>
    </div>




</body>

</html>