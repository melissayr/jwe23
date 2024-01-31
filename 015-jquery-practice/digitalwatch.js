let displayTime;

displayTime = function () {
    let d = new Date();
    let hour = d.getHours();
    let min = d.getMinutes();
    let sec = d.getSeconds();

    $("clock").innerHTML = "hour" + ":" + "min" + ":" + "sec";
};
setInterval(displayTime, 1000);
