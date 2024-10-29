@extends('layouts.front.main')
@section('content')
<style>
    .chat-row {
        margin: 50px;
    }


     ul {
         margin: 0;
         padding: 0;
         list-style: none;
     }


     ul li {
         padding:8px;
         background: #928787;
         margin-bottom:20px;
     }


     ul li:nth-child(2n-2) {
        background: #c3c5c5;
     }


     .chat-input {
         border: 1px soild lightgray;
         border-top-right-radius: 10px;
         border-top-left-radius: 10px;
         padding: 8px 10px;
         color:#fff;
     }
</style>

<div class="container">
    <div class="row chat-row">
        <div class="chat-content">
            <ul>

            </ul>
        </div>

        <div class="chat-section">
            <div class="chat-box">
                <div class="chat-input bg-primary" id="chatInput" contenteditable="">

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js"></script>

<script>
    $(function() {
        let ip_address = '62.72.50.214';
        let socket_port = '3000';
        let socket = io(`https://${ip_address}:${socket_port}`);

        let chatInput = $('#chatInput');

        chatInput.keypress(function(e) {
            let message = $(this).html();
            let from_id = 1; // Replace with the actual from_id (user id)
            let to_id = 2; // Replace with the actual to_id (user id)
            let roomid = 1; // Replace with the actual roomid

            if (e.which === 13 && !e.shiftKey) {
                // Emit the message along with from_id, to_id, roomid, and timestamps
                socket.emit('sendChatToServer', {
                    from_id,
                    to_id,
                    roomid,
                    message,
                    created_at: new Date().toISOString(), // Add the current timestamp
                    updated_at: new Date().toISOString() // Add the current timestamp
                });

                chatInput.html('');
                return false;
            }
        });

        socket.on('sendChatToClient', (data) => {
            // Display the received message
            $('.chat-content ul').append(`<li>${data.message}</li>`);
        });
    });
</script>



@endsection
