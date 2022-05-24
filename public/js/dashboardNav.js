function getUser() {
    const rawUser = localStorage.getItem("USER");
    if (!rawUser) {
        window.location.href = "/dashboard/login";
    }
    const user = JSON.parse(rawUser);
    console.log(user.id !== 0);
    if (user.id !== 0) {
        window.location.href = "/dashboard/login";
    }
    jQuery("#root").show();
    return user;
}

jQuery(document).ready(function () {
    jQuery("#root").hide();
    getUser();

    jQuery("#logout").click(function () {
        localStorage.removeItem("USER");
        localStorage.removeItem("AUTH_TOKEN");
        window.location.href = "/dashboard/login";
    });
});
