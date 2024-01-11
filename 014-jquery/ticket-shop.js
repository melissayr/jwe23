let myInterval = window.setInterval(function () {
    console.log("check");

    const ticketSaleStart = new Date("2024-01-11T20:37:00");
    const now = new Date();

    console.log(now >= ticketSaleStart);

    console.log(new Date(ticketSaleStart));

    if (now >= ticketSaleStart) {
        $("#tickets").show();
        clearInterval(myInterval);
    } else {
        $("#tickets").hide();
    }
}, 5000);
