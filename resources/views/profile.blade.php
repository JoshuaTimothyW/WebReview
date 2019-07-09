<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>

<link rel="stylesheet" href="./css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

<body>
    @include('comp/navbar')
    
    <div class="container-fluid">
            <div class="card">
                <div class="card-body m-3 text-center">
                        <div class="btn-group-vertical">
                            <img class="border mb-5" src="{{ $member->img }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                            <div class="text-primary text-center h1">{{ $member->name }}</div>
                            {{--                         
                                <a href="/profile/reset" class="ml-5">Reset</a>                          
                        </div> 
                            <div class="btn-group-vertical">
                                <h2 class="text-primary">{{ $member->name }}'s Profile</h2>
                                
                                <label>Update Profile Image</label>
                                <form enctype="multipart/form-data" action="/profile/submit" method="POST">
                                    <input type="file" name="avatar">                        
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="pull-right btn btn-sm btn-primary">Update Profile</button>
                                </form>
                            </div> --}}
                            
                        </div>
                </div>                       
            </div>
            <br>
            @if( $member->role != 'Admin')
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            
                    </div>                
                </div>
            @endif
           
            <h4 class="text-center text-primary mt-3">
                <strong>
                    {{ $member->role }}
                </strong>
            </h4>
    </div>

    @include('comp/errormsg')
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>