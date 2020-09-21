<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body>

<form action="/bebek" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="file" name="file"/>
    <button type="submit">submit</submit>
</form>

    <script>

    </script>
</body>

</html>
