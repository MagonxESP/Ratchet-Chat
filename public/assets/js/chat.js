window.onload = function() {
    var socket = new WebSocket('ws://localhost:2020');

    socket.onopen = function(event) {
        console.log("Conectado!");
        socket.send("Hello, world");
    };

    socket.onmessage = function(event) {
        console.log(event.data);
    };
};
