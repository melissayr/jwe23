$(document).ready(function () {
    $("#button").click(function () {
        let toAdd = $("input[name=ListItem]").val();
        $("ul").append("<li>" + toAdd + "</li>");
    });
});
