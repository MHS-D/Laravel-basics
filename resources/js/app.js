require('./bootstrap');
window.Echo.channel("now")
    .listen('realtime', (e) => {
        alert(e.message)
    })