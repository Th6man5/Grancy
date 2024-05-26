<?php
session_start();
if (!isset($_SESSION['user_id']) || isset($_SESSION['admin'])) {
  header('Location: database/logout.php');
  exit();
}
include_once('./database/database.php');
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $fullname = $_POST['fullname'];
  $phone_numb = $_POST['phone_numb'];
  $password = $_POST['password'];

  $sql_update = "UPDATE users SET email=?, fullname=?, phone_numb=?, password=? WHERE user_id=?";
  $stmt_update = $conn->prepare($sql_update);
  $stmt_update->bind_param('ssssi', $email, $fullname, $phone_numb, $password, $user_id);
  $stmt_update->execute();
  $stmt_update->close();
  header('Location: ' . $_SERVER['PHP_SELF']);
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

    h1 {
      font-family: Lexend;
    }

    h2 {
      font-family: Lexend;
      font-weight: 400;
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

  <div class="w-full ">
    <div class="relative flex items-center justify-center">
      <div class="bg-black w-full h-screen">
        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="h-screen w-full bg-contain opacity-65 pointer-events-none">
      </div>

      <div class="absolute top-0 bottom-0 left-0 right-0 flex rounded-2xl bg-blues2 w-3/4 mt-10 ml-44 mb-10 drop-shadow-2xl ">
        <div class="items-start h-full w-5/12 mt-10">
          <h1 class="items-start flex justify-center text-3xl">Your Profile</h1>


          <form method="POST">
            <p class="ml-12 mt-10">Email</p>
            <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-12">
              <input type="email" name="email" class="grow" placeholder="email" required value="<?php echo $user['email']  ?>" />
            </label>
            <p class="ml-12 mt-3">Fullname</p>
            <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-12">
              <input type="text" class="grow" placeholder="John Doe" name="fullname" value="<?php echo $user['fullname']  ?>" required />
            </label>
            <p class="ml-12 mt-3">Phone Number</p>
            <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-12">
              <input type="number" class="grow" placeholder="phone Number" name="phone_numb" value="<?php echo $user['phone_numb']  ?>" required />
            </label>
            <p class="ml-12 mt-3">Password</p>
            <label class="input drop-shadow-3xl bg-grey flex items-center gap-2 mt-1 w-3/4 ml-12">
              <input type="password" name="password" class="grow" value="<?php echo $user['password']  ?>" placeholder="******" required />
            </label>
            <div class="flex mt-10 justify-between  rounded-lg bg-transparent h-fit w-3/4 ml-12">
              <a class="text-center btn rounded-lg bg-blues border-none text-white hover:bg-black transition-all hover:drop-shadow-3xl hover:border-none w-1/4">Back</a>
              <button name="submit" type="submit" class="rounded-lg bg-blues text-white hover:bg-black transition-all hover:drop-shadow-3xl hover:border-none w-1/4">Update</button>
            </div>
          </form>
        </div>
        <div class="card inline place-content-start w-7/12 h-full  bg-white">
          <div class="grid grid-cols-1 justify-start h-max mt-10 ml-10 mr-10">
            <h2 class="flex justify-center text-3xl bg-blues2 rounded-md">Transaction History</h2>
            <div class="overflow-x-auto mt-10">
              <table class="table">
                <!-- head -->
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>Payment Method</th>
                    <th>Payment Total</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT t.transaction_id, t.transac_date, t.payment_method, t.payment_total 
                  FROM transactions t
                  JOIN bookings b ON t.booking_id = b.booking_id
                  WHERE b.user_id = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param('i', $user_id);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  $i = 1;
                  while ($transaction = $result->fetch_assoc()) {
                  ?>
                    <tr>
                      <th><?php echo $i; ?></th>
                      <td><?php echo htmlspecialchars($transaction['transac_date']); ?></td>
                      <td><?php echo htmlspecialchars($transaction['payment_method']); ?></td>
                      <td><?php echo 'IDR ' . number_format($transaction['payment_total']); ?></td>
                      <td><a href="transaction.php?transaction_id=<?php echo $transaction['transaction_id']; ?>" class="text-center btn rounded-lg bg-blues border-none text-white hover:bg-black transition-all hover:drop-shadow-3xl hover:border-none">Detail</a></td>
                    </tr>
                  <?php
                    $i++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>


        </div>

      </div>
    </div>

    <?php
    @include('template/footer.php');
    ?>
  </div>




</body>

</html>