@section('sidebar')
    <nav class="dk-sidebar-nav">
        <ul class="section-nav sidebar-nav">
            @foreach($categories as $category)
                <li class="toc-entry toc-h2"><a href="#">{{$category->title}}</a></li>
            @endforeach
        </ul>
    </nav>
@show
