<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

<body>
        @include('comp/navbar')
        <br><br><br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 border text-center p-md-3 bg-light">
                <h2 class="text-center text-primary">Login Account</h2>
                <br><br>
                    <form action="/api/login/submit" class="text-center" enctype="multipart/form-data" method="POST">
                        {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="lblEmail" class="col-sm-2 font-weight-bold text-primary">Email</label>
                              <div class="col-sm-10">                                    
                                    <input type="text" id="lblEmail" class="form-control" name="email" autocomplete="off">                                    
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="lblPass" class="col-sm-2 font-weight-bold text-primary">Password</label>
                              <div class="col-sm-10">
                                    <input type="password" id="lblPass" class="form-control" name="password" minlength="6" autocomplete="off">
                              </div>
                            </div>
                            @include('comp/errormsg')
                            <br>
                            <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                    <br>
                    <a href="{{ url('register') }}">
                        Don't have an account? Register here
                    </a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>