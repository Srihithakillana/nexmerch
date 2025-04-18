<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
   header('location:admin_login.php');
   exit;
}

if (isset($_POST['send_reply'])) {  // Updated submit button name
    $message_id = $_POST['message_id'];
    $reply = filter_var($_POST['reply_text'], FILTER_SANITIZE_STRING); // Updated textarea name

    // Update the message with the admin's reply
    $update_message = $conn->prepare("UPDATE `messages` SET reply = ?, admin_id = ? WHERE id = ?");
    $update_message->execute([$reply, $admin_id, $message_id]);

    // Redirect to refresh the page and display updated reply
    header("Location: messages.php");
    exit;
}

if (isset($_GET['delete'])) {
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
   exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Messages</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<section class="contacts">
   <h1 class="heading">Messages</h1>

   <div class="box-container">
      <?php
         $conn->query("SET SESSION TRANSACTION ISOLATION LEVEL READ COMMITTED"); // Ensure fresh data
         $select_messages = $conn->prepare("SELECT * FROM `messages`");
         $select_messages->execute();

         if ($select_messages->rowCount() > 0) {
            while ($fetch_message = $select_messages->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <div class="box">
         <p>User ID: <span><?= $fetch_message['user_id']; ?></span></p>
         <p>Name: <span><?= $fetch_message['name']; ?></span></p>
         <p>Email: <span><?= $fetch_message['email']; ?></span></p>
         <p>Number: <span><?= $fetch_message['number']; ?></span></p>
         <p>Message: <span><?= $fetch_message['message']; ?></span></p>
         
         <!-- Admin reply -->
         <?php if ($fetch_message['reply']) { ?>
            <p>Admin Reply: <span><?= $fetch_message['reply']; ?></span></p>
         <?php } else { ?>
            <form action="messages.php" method="post">
                <textarea name="reply_text" placeholder="Write a reply..." required></textarea>
                <input type="hidden" name="message_id" value="<?= $fetch_message['id']; ?>">
                <button type="submit" name="send_reply" class="btn">Send Reply</button>
            </form>
         <?php } ?>
         
         <a href="messages.php?delete=<?= $fetch_message['id']; ?>" onclick="return confirm('Delete this message?');" class="delete-btn">Delete</a>
      </div>
      <?php
            }
         } else {
            echo '<p class="empty">You have no messages</p>';
         }
      ?>
   </div>
</section>

<script src="../js/admin_script.js"></script>
   
</body>
</html>
