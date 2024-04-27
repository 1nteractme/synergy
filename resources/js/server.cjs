const express = require('express');
const http = require('http');
const WebSocket = require('ws');
const fs = require('fs');

const app = express();
const server = http.createServer(app);
const wss = new WebSocket.Server({ server });

const bladeFilesDirectory = '/Applications/MAMP/htdocs/synergy/resources/views/';

function scanBladeFiles(directory) {
    return new Promise((resolve, reject) => {
        fs.readdir(directory, (err, files) => {
            if (err) {
                reject(err);
            } else {
                resolve(files.filter(file => file.endsWith('.blade.php')));
            }
        });
    });
}

wss.on('connection', ws => {
    console.log('WebSocket connected');

    scanBladeFiles(bladeFilesDirectory)
        .then(files => {
            ws.send(JSON.stringify(files));
        })
        .catch(err => {
            console.error('Error scanning blade files:', err);
        });
});

server.listen(3000, () => {
    console.log('Server started on port 3000');
});
