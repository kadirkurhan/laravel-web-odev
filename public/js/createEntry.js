jQuery(document).ready(function () {
    const topicId = window.location.pathname.split("/")[2].toString();
    jQuery("#createEntrySubmit").click(function () {
        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        const entry = jQuery("#entry").val();

        jQuery.ajax({
            type: "POST",
            headers: {
                Authorization: "Bearer " + localStorage.getItem("AUTH_TOKEN"),
            },
            url: "http://localhost:8000/api/entries",
            dataType: "json",
            data: {
                topicid: topicId,
                entry,
                userid: JSON.parse(localStorage.getItem("USER")).id,
            },
            success: function (data) {
                if (data) {
                    window.location.reload();
                }
            },
            error: function (error) {
                console.log(error.responseJSON);
            },
        });
    });
});
