<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-header />
    <title>Register</title>
    <script>
        jQuery(document).ready(function(){
        jQuery('#test').click(function(e){
        alert('test');
        console.log('test');
        });

        });
    </script>
</head>

<body id="test" class="bg-gray-200">
    Hello world
</body>

</html>