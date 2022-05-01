<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<x-header />
	<title>Giriş</title>
	<script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
</head>

<body class="bg-gray-100">
	<div class="flex items-center justify-center h-screen">
		<div
			class="bg-gray-50 flex flex-col items-center justify-center shadow-md px-8 py-12 md:px-24 w-full mx-8 md:mx-0 md:w-1/2 md:max-w-xl rounded-xl">
			<p class="text-indigo-500 font-bold text-2xl mb-6">turnusol</p>
			<p class="text-gray-800 font-semibold text-xl mb-6">Giriş yap</p>
			<form class="min-w-full">
				<div class="min-w-full">
					<label class="text-sm">Email</label>
					<input type="email" placeholder="Email"
						class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 focus:outline-none w-full mt-2"
						id="email" required>
				</div>
				<div class="min-w-full mt-2">
					<label class="text-sm">Şifre</label>
					<input type="password" placeholder="Şifre"
						class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 focus:outline-none w-full mt-2"
						id="password" required>
				</div>
				<input id="loginSubmit" type="button"
					class="block border-none text-white text-sm bg-indigo-500 py-3 px-4 w-100 rounded-md focus:outline-none w-full mt-8"
					value="Giriş yap">
				<a href="/register"
					class="text-center block border-none text-indigo-500 text-sm py-3 px-4 w-100 rounded-md focus:outline-none w-full mt-4">veya
					kayıt olun</a>
			</form>
		</div>
	</div>
</body>

</html>