function getUser() {
    const rawUser = localStorage.getItem("USER");
    if (!rawUser) window.location.href = "/dashboard/login";
    jQuery("#root").show();
    return JSON.parse(rawUser);
}

jQuery(document).ready(function () {
    jQuery("#root").hide();
    const user = getUser();
    jQuery("#logout").click(function () {
        localStorage.removeItem("USER");
        localStorage.removeItem("AUTH_TOKEN");
        window.location.href = "/dashboard/login";
    });
    jQuery("#name").html(user.name);
});
