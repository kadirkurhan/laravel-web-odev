async function deleteItem(id, target) {
    const alertMessage = "Bu veriyi silmek istediğinizden emin misiniz?";
    if (confirm(alertMessage) == false) {
        return;
    }

    await jQuery.ajax({
        type: "DELETE",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("AUTH_TOKEN"),
        },
        url: "http://localhost:8000/api/" + target + "/" + id,
        dataType: "json",
        success: function (data) {
            if (data) {
                window.location.reload();
            }
        },
        error: function (error) {
            console.log(error.responseJSON);
        },
    });
}

async function deleteUser(id) {
    const alertMessage = "Bu veriyi silmek istediğinizden emin misiniz?";
    if (confirm(alertMessage) == false) {
        return;
    }

    await jQuery.ajax({
        type: "POST",
        headers: {
            Authorization: "Bearer " + localStorage.getItem("AUTH_TOKEN"),
        },
        url: "http://localhost:8000/api/users/" + id,
        data: {
            status: -1,
        },
        dataType: "json",
        success: function (data) {
            if (data) {
                window.location.reload();
            }
        },
        error: function (error) {
            console.log(error.responseJSON);
        },
    });
}
