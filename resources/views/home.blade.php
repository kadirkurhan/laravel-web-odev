<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<x-header />
	<title>Ana sayfa</title>
	<script type="text/javascript" src="{{ URL::asset('js/home.js') }}"></script>
</head>

<body class="bg-gray-100">
	<x-navbar />


	<div class="flex justify-center w-full mt-12">
		<div class="flex justify-between px-4 lg:px-32 xl:px-48 min-w-full">
			<x-sidebar />
			<div id="entries" class="px-8 py-2"></div>
			<x-ads />
		</div>
	</div>
</body>

</html>