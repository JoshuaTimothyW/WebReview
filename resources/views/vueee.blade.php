<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

{{-- Laravel secara default panggil css dan js di folder public --}}
{{-- <script src="/js/test.js"></script> ==> ini dari folder public --}}

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

{{-- Kalo mau pakai folder resources --}}
{{-- <script src="{{URL::asset('/js/app.js')}}"></script> --}}

{{-- Perbedaannya kalo public, asset yang dipakai dapat diliat secara public --}}
{{-- Resource itu kebalikannya --}}

<body>
    <img src="{{ \Illuminate\Support\Facades\Storage::url($user->img) }}" alt="image">
    <div id="app">
        <example-component></example-component>
    </div>
</body>
<script src="/js/test.js"></script>
{{-- <script src="{{URL::asset('/js/app.js')}}"></script> --}}
</html>