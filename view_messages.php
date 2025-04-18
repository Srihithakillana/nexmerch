<?php
include 'components/connect.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location:login.php');
   exit;
}

// Fetch user messages
$select_messages = $conn->prepare("SELECT * FROM `messages` WHERE user_id = ?");
$select_messages->execute([$user_id]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Your Messages</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css"> <!-- Using admin style for same look -->
</head>
<body>

<?php include 'components/user_header.php'; ?>

<section class="contacts">
   <h1 class="heading">Your Messages</h1>

   <div class="box-container">
      <?php
         if ($select_messages->rowCount() > 0) {
            while ($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="box">
         <p>User ID: <span><?= $fetch_message['user_id']; ?></span></p>
         <p>Name: <span><?= $fetch_message['name']; ?></span></p>
         <p>Email: <span><?= $fetch_message['email']; ?></span></p>
         <p>Number: <span><?= $fetch_message['number']; ?></span></p>
         <p>Message: <span><?= $fetch_message['message']; ?></span></p>
         
         <?php if ($fetch_message['reply']) { ?>
            <p>Admin Reply: <span><?= $fetch_message['reply']; ?></span></p>
         <?php } else { ?>
            <p>Status: <span>Waiting for admin reply...</span></p>
         <?php } ?>
      </div>
      <?php
            }
         } else {
            echo '<p class="empty">You have not sent any messages yet.</p>';
         }
      ?>
   </div>
</section>

<script src="js/script.js"></script>

</body>
</html>
