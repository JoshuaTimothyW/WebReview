<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href=" {{url('home')}} ">IndoVapers.net</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-tabs">
                <li class="nav-item active col-md-3">
                    <a class="nav-link" href=" {{url('home')}} "><strong>Home</strong><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active col-md-3">
                    <a class="nav-link" href="#"><strong>Terbaik</strong></a>
                </li>
                <li class="nav-item active dropdown col-md-3">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" href="#"><strong>Diskusi</strong></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Review</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Pod</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">E Liquid</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Mod</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Atomizer</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Vape Terbaik</a>
                    </div>
                </li>
                <li class="nav-item active col-md-3">
                    <a class="nav-link" href="#"><strong>Tutorial</strong></a>
                </li>                    
        </ul>
        <div class="justify-content-end">
                <form class="form-inline my-2 my-lg-0">
                        <div class="input-group mb-3">
                            <input type="search" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">Search</button>
                            </div>
                        </div>
                    {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
                </form>
        </div>
    </div>    
</nav>
