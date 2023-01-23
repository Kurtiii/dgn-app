$("#username_easteregg").keyup(function () {
    if ($(this).val() == "creeper") {
        // show the easter egg modal
        $("#eastereggModal").modal("show");

        // set cookie creeper to true
        document.cookie = "creeper=true";

    }
});