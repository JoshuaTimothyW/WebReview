@if ($post=='No Post')
    <div class="alert alert-info text-center">
       <h3> {{$post}} </h3>
    </div>
@else
    @foreach ($post as $item)
            <div class="card mt-1">
                        <div class="card-title border bg-white">
                                <a href="{{ url('api/'.$item->members->name) }}">
                                    <img class="rounded-circle m-2" src=" {{ $item->members->img }} " alt="pp" height="50px" width="50px">
                                </a>
                                <div class="btn-group-vertical">
                                    <a href="{{ url('api/'.$item->members->name) }}">
                                        <strong class="text-primary">
                                            {{ $item->members->name }}
                                        </strong>
                                    </a> 
                                    {{ $item->create_at }}
                                </div>
                        </div>                        
                        <div class="card-body" data-toggle="modal" data-target=" {{'#postmodal'.$item->id}} ">
                                {{ $item->id }}
                        </div>               
                        {{-- <input type="hidden" name="id" value="{{ $item->id }}"> --}}
                        <div class="btn-group">
                                <a href="" class="btn bg-light border">
                                    <button data-toggle="popover" data-placement="bottom" data-content="Like">
                                        <i class="far fa-thumbs-up"></i>
                                    </button>
                                </a>
                                <a class="btn bg-light border" data-toggle="modal" data-target=" {{'#postmodal'.$item->id}} ">
                                    <button data-toggle="popover" data-placement="bottom" data-content="Comment">
                                        <i class="far fa-comment"></i>
                                    </button>
                                </a>
                        </div>
            </div>
            <div class="modal" id="{{'postmodal'.$item->id}}">
                    <div class="modal-dialog">                            
                        <div class="modal-content">
                                <div class="modal-header">
                                        <img class="rounded-circle m-2" src=" {{ $item->members->img }} " alt="pp" height="50px" width="50px">
                                        <div class="btn-group-vertical">
                                            <a href="{{ url($item->members->name) }}">
                                                <strong class="text-primary">
                                                    {{ $item->members->name }}
                                                </strong>
                                            </a> 
                                            {{ $item->create_at }}
                                            <h5 class="bold text-primary">{{$item->category}}</h5>
                                        </div>  
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>                                                            
                                <div class="modal-body">
                                    <h5 class="modal-title container-fluid"> {{ $item->title }} </h5>                                                      
                                    <div class="container-fluid">
                                        <p>
                                            {{ $item->content }}
                                        </p>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title text-center text-primary h5">
                                                Comment
                                            </div>
                                            <form action="comment/submit" method="POST">    
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <input type="text" class="mb-2 container-fluid" autocomplete="false" name="title" placeholder="Title">
                                                    <textarea name="ckeditor" class="container-fluid"></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-primary container-fluid">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($item['comment'] as $comment)
                                    <div class="modal-footer">
                                            <div class="card container-fluid">
                                                <div class="card-header">
                                                        <img class="rounded-circle m-2" src=" {{ $comment->members->img }} " alt="pp" height="50px" width="50px">
                                                    <div class="btn-group-vertical">                                                    
                                                        <a href="{{ url($comment->members->name) }}">
                                                            <strong class="text-primary">
                                                                {{ $comment->members->name }}
                                                            </strong>
                                                        </a> 
                                                        {{ $comment->created_at }}
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <p>
                                                        {{ $comment->content }}
                                                    </p>
                                                </div>
                                            </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>
                </div>
    @endforeach
@endif 