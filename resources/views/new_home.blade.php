<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
</head>
<body>
    @include('comp/navbar1')
    <div class="container-fluid justify-content-center row">
            <img class="img-fluid" src="https://a1.vaping360.com/wp-content/uploads/2019/06/zlide-tank-01-356x220.jpg?auto=compress,format" alt="">
            <div class="btn-group-vertical">
                    <img class="img-fluid" src="https://a1.vaping360.com/wp-content/uploads/2019/06/zlide-tank-01-356x220.jpg?auto=compress,format" alt="">
                    <img class="img-fluid" src="https://a1.vaping360.com/wp-content/uploads/2019/06/zlide-tank-01-356x220.jpg?auto=compress,format" alt="">
            </div>
            <div class="btn-group-vertical">
                    <img class="img-fluid" src="https://a1.vaping360.com/wp-content/uploads/2019/06/zlide-tank-01-356x220.jpg?auto=compress,format" alt="">
                    <img class="img-fluid" src="https://a1.vaping360.com/wp-content/uploads/2019/06/zlide-tank-01-356x220.jpg?auto=compress,format" alt="">
            </div>
    </div>
    <div class="container-fluid border">
        <h1 class="text-center m-3">
            Head Line News
        </h1>
    </div>
    <div class="row">
        <div class="col-md-4">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item border">
                        <h5 class="m-2">Recommend Post</h5>
                    </li>
    
                    <li class="nav-item border">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item border">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item border">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <div class="card border">
                        <img src="https://a1.vaping360.com/wp-content/uploads/2019/06/v-folk-800x533-25-of-25-356x220.jpg?auto=compress,format" alt="">
                </div>
        </div>

        <div class="col-md-4">
                @include('comp/post-home')
        </div>
        <div class="col-md-4">
                <div class="card border">
                        @if (session()->has('hasLogin'))
                            <div class="text-center m-3">
                                    <a href=" {{ url('profile') }} ">
                                        <img src="{{ session()->get('member')->img }}" height=50px width=50px alt="profile-picture" class="rounded-circle">
                                        <h5 class="text-primary"><strong> {{ session()->get('member')->name }} </strong></h5>
                                    </a>  
                                    <h5 class="text-muted"> {{ session()->get('member')->role }} </h5>
                                    <a href=" {{url('logout')}} ">
                                        <button class="btn btn-primary btn-md">Logout</button>
                                    </a>
                            </div>
                        @else
                            <div class="text-center m-3">
                                <a href=" {{url('login')}} ">
                                    <button class="btn btn-primary btn-lg">Login</button>                                
                                </a>
                                <h5>Or</h5>
                                <a href=" {{url('register')}} ">
                                    <button class="btn btn-primary btn-lg">Register</button>
                                </a>
                            </div>
                        @endif
                </div>
                <div class="card border">
                        <img src="https://a1.vaping360.com/wp-content/uploads/2019/06/v-folk-800x533-25-of-25-356x220.jpg?auto=compress,format" alt="">
                </div>
        </div>
    </div>
    
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>