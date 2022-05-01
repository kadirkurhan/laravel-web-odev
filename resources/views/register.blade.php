<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-header />
    <title>Register</title>
    <script>
        jQuery(document).ready(function () {
        jQuery("#registerSubmit").click(function (e) {
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
                        console.log(data)
                        alert(data); // show response from the php script.
                    },
                    error: function (error) {
                        // alert(JSON.stringify(error));
                    },
                });
    });
});

    </script>


</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div
            class="bg-gray-50 flex flex-col items-center justify-center shadow-md py-12 px-24 w-1/2 rounded-md">
            <p class="text-indigo-500 font-semibold text-lg">turnusol</p>
            <form class="min-w-full">
                <div class="min-w-full">
                    <label class="text-sm">İsim Soyisim</label>
                    <input type="text" placeholder="İsim Soyisim"
                        class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 focus:outline-none w-full mt-2"
                        id="name">
                </div>
                <div class="min-w-full mt-2">
                    <label class="text-sm">Email</label>
                    <input type="email" placeholder="Email"
                        class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 focus:outline-none w-full mt-2"
                        id="email">
                </div>
                <div class="min-w-full mt-2">
                    <label class="text-sm">Şifre</label>
                    <input type="password" placeholder="Şifre"
                        class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 focus:outline-none w-full mt-2"
                        id="password">
                </div>
                <input id="registerSubmit" type="button"
                    class="block border-none text-white text-sm bg-indigo-500 py-3 px-4 w-100 rounded-md focus:outline-none w-full mt-8"
                    value="Kayıt ol">
            </form>
        </div>
    </div>
</body>

</html>