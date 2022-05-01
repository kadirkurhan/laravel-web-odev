jQuery(document).ready(function () {
    if (localStorage.getItem("AUTH_TOKEN")) return (window.location.href = "/");
    jQuery("#registerSubmit").click(function () {
        jQuery.ajaxSetup({
            headers: {
                "X-CSRF-Token": jQuery('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
        });

        const name = jQuery("#name").val();
        const email = jQuery("#email").val();
        const password = jQuery("#password").val();

        jQuery.ajax({
            type: "POST",
            url: "http://localhost:8000/api/register",
            dataType: "json",
            data: {
                name,
                email,
                password,
                password_confirmation: password,
            },
            success: function (data) {
                if (data.token && data.user) {
                    localStorage.setItem("AUTH_TOKEN", data.token);
                    localStorage.setItem("USER", data.user);
                    window.location.href = "/";
                }
            },
            error: function (error) {
                console.log(error.responseJSON);
            },
        });
    });
});
