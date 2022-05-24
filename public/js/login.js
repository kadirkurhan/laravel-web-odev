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
                if (data.token && data.user) {
                    localStorage.setItem("AUTH_TOKEN", data.token);
                    localStorage.setItem("USER", JSON.stringify(data.user));
                    window.location.href = "/";
                }
            },
            error: function (error) {
                if (error.responseJSON.message)
                    alert("Hata: " + error.responseJSON.message);
                console.log(error.responseJSON);
            },
        });
    });
});
