@if ($post=='No Post')
    <div class="alert alert-info text-center">
       <h3> {{$post}} </h3>
    </div>
@else
    @foreach ($post as $item)
        <form action="post" method="POST"> 
            {{ csrf_field() }}
            <div class="card mt-1">
                        <div class="card-title border bg-white">
                                <img class="rounded-circle m-2" src=" {{ $item->members->img }} " alt="pp" height="50px" width="50px">
                                <div class="btn-group-vertical">
                                    <a href="{{ url($item->members->name) }}">
                                        <strong class="text-primary">
                                            {{ $item->members->name }}
                                        </strong>
                                    </a> 
                                    {{ $item->create_at }}
                                </div>
                                @if ($item->img != '')
                                    <img class="card-img-top border-bottom" src=" {{ $item->img }} " alt="Image" height="200px">
                                @endif
                        </div>                        
                        <div class="card-body">
                            <h5 class="card-title"> {{ $item->title }} </h5>
                        </div>               
                        {{-- <input type="hidden" name="id" value="{{ $item->id }}"> --}}
                        <div class="btn-group">
                                <button class="btn bg-light border" data-toggle="popover" data-placement="bottom" data-content="Like">
                                    <i class="far fa-thumbs-up"></i>
                                    {{ $item->like }}
                                </button>
                                <button class="btn bg-light border" data-toggle="popover" data-target="#inputcomment" data-placement="bottom" data-content="Comment">
                                    <i class="far fa-comment"></i>
                                </button>
                        </div>
            </div>
        </form>
    @endforeach
@endif 