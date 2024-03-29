<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
</head>
<body>
    @include('comp/navbar')
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="postadd/submit" method="POST">
            {{ csrf_field() }}
                <input type="text" name="title" placeholder="Input Title" autocomplete="off">
                <br>
                <textarea name="ckeditor"></textarea>
            <br>
            <div class="text-center">
                <input class="btn btn-primary" type="submit" value="Post">
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
    
    {{-- <script>
        CKEDITOR.replace('ckeditor');
    </script> --}}
</body>
<script src=" {{ asset('js/test.js') }} "></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>