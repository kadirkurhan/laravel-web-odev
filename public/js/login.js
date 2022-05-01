jQuery(document).ready(function () {
    if (localStorage.getItem("AUTH_TOKEN")) return (window.location.href = "/");
    jQuery("#loginSubmit").click(function () {
        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        const email = jQuery("#email").val();
        const password = jQuery("#password").val();

        jQuery.ajax({
            type: "POST",
            url: "http://localhost:8000/api/login",
            dataType: "json",
            data: {
                email,
                password,
            },
            success: function (data) {
                if (data.token) {
                    localStorage.setItem("AUTH_TOKEN", data.token);
                    window.location.href = "/";
                }
            },
            error: function (error) {
                console.log(error.responseJSON);
            },
        });
    });
});
