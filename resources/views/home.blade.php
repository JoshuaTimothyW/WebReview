@extends('master')
@extends('post')


@section('title','Ini title')

@section('content')
    
@endsection

@section('nav-tabs')
    <div class="container-fluid">
        <form action="#" class="bd-search d-flex align-items-center">
            <input type="search" class="form-control" id="search-input" placeholder="Search..." autocomplete="off">
            <button class="btn btn-link" data-target="#bd-nav"><i class="fa fa-bars"></i></button>
        </form>
    </div>
    <nav class="collapse bd-links" id="bd-docs-nav">
        <ul class="nav bd-sidenav">
            <li>
                <a href="#">
                    Intro
                </a>
            </li>
            <li>
                <a href="#">
                    Download
                </a>
            </li>
        </ul>
    </nav>
@endsection