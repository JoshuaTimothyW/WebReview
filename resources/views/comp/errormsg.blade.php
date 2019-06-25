@if ($errors->any())
    <div class="alert alert-danger justify-content-end">
        <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
@endif