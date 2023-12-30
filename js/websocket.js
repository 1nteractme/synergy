const WebSocket = require('ws');

const server = new WebSocket.Server({ port: 5500 });

server.on('connection', (socket) => {
    console.log('WebSocket connected');

    socket.on('message', (message) => {
        console.log(`Received message: ${message}`);

        socket.send(`Server received: ${message}`);
    });
    
    socket.on('close', () => {
        console.log('WebSocket disconnected');
    });
});
