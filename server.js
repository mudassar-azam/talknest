// server.js in Laravel project


const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const axios = require('axios'); // Import the axios module

const app = express();
const server = http.createServer(app);
const io = socketIo(server);

const PORT = process.env.PORT || 3000;

io.on('connection', (socket) => {
    console.log('A client connected');

    socket.on('message', async (data) => { // Mark the callback function as async
        console.log('Message received from client:', data);
        axios.post('https://talknest.canvasolutions.co.uk/api/sendMessage', data)
            .then(response => {

                console.log(response.data);
                io.emit('message', response.data); // Broadcasting the message to all clients including the sender
            })
            .catch(error => {
                console.error(error);
            });
    });
    socket.on('fetch-messages', () => {
        console.log('Fetching messages...');
        axios.get('https://talknest.canvasolutions.co.uk/api/getallchat')
            .then(response => {
                console.log('Messages fetched:', response.data);
                io.emit('fetched-messages', response.data); // Emit the messages back to the client
            })
            .catch(error => {
                console.error('Error fetching messages:', error);
            });
    });

    socket.on('twoUsersFetchMessages', async (data) => {
        try {
            // Extract from_id and to_id from the received data
            const { from_id, to_id } = data;
            // Make a GET request to fetch messages between the two users
            const response = await axios.get(`https://talknest.canvasolutions.co.uk/api/chats/${from_id}/${to_id}`);
            const messages = response.data;
            // Emit the fetched messages back to the client
            socket.emit('messagestwoUsers', messages);
        } catch (error) {
            console.error('Error fetching messages between two users:', error);
        }
    });
    socket.on('room_messages', async (data) => {
        try {
            // Extract id from the received data
            const {id} = data;
            // Make a GET request to fetch messages between the two users
            const response = await axios.get(`https://talknest.canvasolutions.co.uk/api/room_messages/${id}`);
            const messages = response.data;
            // Emit the fetched messages back to the client
            socket.emit('room_messages', messages);
        } catch (error) {
            console.error('Error fetching messages of group', error);
        }
    });
    socket.on('disconnect', () => {
        console.log('A client disconnected');
    });
});

server.listen(PORT, () => {
    console.log(`Socket.IO server running on port ${PORT}`);
});





