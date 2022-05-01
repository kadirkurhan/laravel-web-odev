jQuery(document).ready(function () {
    jQuery("#createTopicSubmit").click(function () {
        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        const topic = jQuery("#topic").val();

        jQuery.ajax({
            type: "POST",
            headers: {
                Authorization: "Bearer " + localStorage.getItem("AUTH_TOKEN"),
            },
            url: "http://localhost:8000/api/topics",
            dataType: "json",
            data: {
                topicname: topic,
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
