var handleAlerts = function(container,place,type,message,close,reset,focus,closeInSeconds,icon) {
    Metronic.alert({
                container: container, // alerts parent container(by default placed after the page breadcrumbs)
                place: place, // append or prepent in container 
                type: type,  // alert's type
                message: message,  // alert's message
                close: close, // make alert closable
                reset: reset, // close all previouse alerts first
                focus: focus, // auto scroll to the alert after shown
                closeInSeconds: closeInSeconds, // auto close after defined seconds
                icon: icon // put icon before the message
            }); 
}