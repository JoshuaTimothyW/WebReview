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
    <script src="https://cdn.ckeditor.com/4.11.4/basic/ckeditor.js"></script>
</head>
<body class="bg-light">
    @include('comp/navbar')
    <div class="container-fluid justify-content-center row mb-2">
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
{{--     
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="https://a1.vaping360.com/wp-content/uploads/2019/06/usonicig-zip-800x533-8-of-11.jpg?auto=compress,format" height="500px" width="200px" alt="First slide">
                <div class="carousel-caption d-none d-md-block bg-dark">
                    <div class="card-body">
                        <h5 class="bg-transparent ">Usonicig Zip Review</h5>
                        <p class="bg-transparent">Vapor from Ultrasonic Vibration</p>
                    </div>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://a1.vaping360.com/wp-content/uploads/2019/06/logic-pro-1-of-1.jpg?auto=compress,format" height="500px" width="200px" alt="Second slide">
                <div class="carousel-caption d-none d-md-block bg-dark">
                        <h5 class="bg-transparent">Logic Pro Review</h5>
                        <p class="bg-transparent">The Logic Pro is a button-operated lightweight vape pen. Its cartridges come pre-filled with 1.5 mL of e-liquid and are available in 6, 12, and 18 mg nicotine strengths.</p>
                </div>
            </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="https://a1.vaping360.com/wp-content/uploads/2019/06/cbd-fx-800x533-11-of-11.jpg?auto=compress,format" height="500px" width="200px" alt="Third slide">
                <div class="carousel-caption d-none d-md-block bg-dark">
                    <h5 class="bg-transparent">Logic Pro Review</h5>
                    <p class="bg-transparent">The Logic Pro is a button-operated lightweight vape pen. Its cartridges come pre-filled with 1.5 mL of e-liquid and are available in 6, 12, and 18 mg nicotine strengths.</p>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
    </div> --}}

    <div class="row mt-2">
        <div class="col-md-4">
                <ul class="nav nav-tabs flex-column bg-white mb-2">
                    <li class="nav-item border">
                        <h5 class="m-2 text-center"><strong>Recommend Post</strong></h5>
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
            <button class="btn bg-light container-fluid" data-toggle="modal" data-target="#exampleModalCenter">
                <div class="alert alert-info text-center">
                        Create Post Here       
                </div>             
            </button>
                            
                <div class="modal" id="exampleModalCenter">
                    <div class="modal-dialog">                            
                        <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary text-center mb-2">
                                        <strong>New Post</strong>
                                    </h5>  
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="postadd/submit" method="POST">    
                                    {{ csrf_field() }}                            
                                    <div class="modal-body">                                                      
                                        <input type="text" class="mb-2 container-fluid" autocomplete="off" name="title" placeholder="Title">
                                        <textarea name="ckeditor"></textarea>
                                
                                    </div>
                                    <button type="submit" class="btn btn-primary container-fluid">Submit</button>
                                </form>
                        </div>
                    </div>
                </div>
            
                @include('comp/post-home')
        </div>
        <div class="col-md-4">
                <div class="card border mb-2">
                    {{-- @if ($token)
                        <div class="text-center m-3">
                                <a href=" {{ url($member->name) }} ">
                                    <img src="{{ $member->img }}" height=50px width=50px alt="profile-picture" class="rounded-circle">
                                    <h5 class="text-primary"><strong> {{ $member->name }} </strong></h5>
                                </a>  
                                <h5 class="text-muted"> {{ $member->role }} </h5>
                                <br><br>
                                <a href=" {{url('logout')}} ">
                                    <button class="btn btn-primary btn-md">Logout</button>
                                </a>
                        </div>
                    @else
                       
                    @endif --}}
                    <div class="text-center m-3">
                        <div class="border container-fluid p-2">
                                <a href=" {{url('login')}} ">
                                    <button class="btn btn-lg btn-primary">Login</button>                                
                                </a>
                        </div>
                        <h5>Or</h5>
                        <div class="border container-fluid p-2">
                            <a href=" {{url('register')}} ">
                                <button class="btn btn-primary btn-lg">Register</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card border">
                        <img src="https://a1.vaping360.com/wp-content/uploads/2019/06/v-folk-800x533-25-of-25-356x220.jpg?auto=compress,format" alt="">
                </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('ckeditor');
    </script>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src=" {{ asset('js/test.js') }} "></script>

</html>