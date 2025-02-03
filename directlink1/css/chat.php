<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Support</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Chat Support</h1>
    <div id="chat-container">
        <div id="chat-box">
            <!-- Chat messages will be displayed here -->
        </div>
        <input type="text" id="chat-input" placeholder="Type your message...">
        <button id="send-button">Send</button>
    </div>

    <script>
        // Simple chat functionality (you can enhance this with WebSocket or AJAX)
        document.getElementById('send-button').onclick = function() {
            const input = document.getElementById('chat-input');
            const message = input.value;
            if (message) {
                const chatBox = document.getElementById('chat-box');
                chatBox.innerHTML += `<div>User: ${message}</div>`;
                input.value = '';
                // Here you can add code to send the message to the server
            }
        };
    </script>
</body>
</html>