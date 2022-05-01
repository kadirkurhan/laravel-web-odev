<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<x-header />

	<title>Ana sayfa</title>
	<script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/createEntry.js') }}"></script>

</head>

<body class="bg-gray-100">
	<x-navbar />
	<div class="flex justify-center w-full mt-12">
		<div class="flex justify-between px-4 lg:px-32 xl:px-48 min-w-full">
			<x-sidebar />
			<div class="px-8 py-2 w-full">
				<div id="entries">
				</div>
				<div class="min-w-full mt-16">
					<h6 class="text-xl font-semibold mb-4">Yorum bırakın!</h6>
					<label class="text-sm">Yorumunuz</label>
					<textarea type="text" placeholder="Yorumunuz" rows="8	"
						class="block border-none placeholder:text-gray-300 text-sm ring-gray-300 focus:ring-blue-300 ring-1 ring-inset rounded-md bg-white py-3 px-4 w-full focus:outline-none mt-2"
						id="entry" required></textarea>

				</div>
				<input id="createEntrySubmit" type="button"
					class="block border-none text-white text-sm bg-indigo-500 py-3 px-4 rounded-md focus:outline-none w-32 mt-8 cursor-pointer mb-32"
					value="Yorum bırak">
			</div>
			<x-ads />
		</div>
	</div>
</body>

</html>