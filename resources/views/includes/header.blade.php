<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <header>
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                    <a class="navbar-brand" href="/">Ask </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home </a>
                            </li>
                            <li class="navbar-nav mr-auto">
                                <a class="nav-link" href="{{url('/questions')}}">
                                    Questions
                                </a>
                            </li>
                        </ul>
                        <a href="{{url('/login')}}">login</a>
                        <a href="{{url('/register')}}">register</a>
                        <form class="form-inline mt-2 mt-md-0">

                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
            </header>
        </div>
    </div>

</div>

