function getUser() {
    const rawUser = localStorage.getItem("USER");
    if (!rawUser) window.location.href = "/login";
    return JSON.parse(rawUser);
}

jQuery(document).ready(function () {
    const user = getUser();
    jQuery("#logout").click(function () {
        localStorage.removeItem("USER");
        localStorage.removeItem("AUTH_TOKEN");
        window.location.href = "/login";
    });
    jQuery("#name").html(user.name);
});
