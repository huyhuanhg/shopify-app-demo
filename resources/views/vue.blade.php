<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Shopify Laravue App</title></head>
<body>

<div id="root" data-shop="{{$shop}}" data-host="{{$host}}" data-api-key="{{$apiKey}}"></div>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
