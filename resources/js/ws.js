let socket = null;

function initWebSocket() {
    socket = new WebSocket('ws://localhost:3000');

    socket.onopen = () => {
        console.log('WebSocket connected');
    };

    socket.onerror = error => {
        console.error('WebSocket error:', error);
    };

    let reconnectInterval = 1000; // Интервал в миллисекундах для попыток переподключения

    socket.onclose = event => {
        console.log('WebSocket connection closed:', event.reason);
        // Попытайтесь переподключиться через некоторое время
        setTimeout(() => {
            initWebSocket(); // Пересоздать соединение
        }, reconnectInterval);
    };
}

function getWebSocket() {
    if (!socket) {
        initWebSocket(); // Инициализировать соединение, если оно еще не создано
    }
    return socket;
}

export default getWebSocket;
