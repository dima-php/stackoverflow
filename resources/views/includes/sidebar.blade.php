@section('sidebar')
    <nav class="dk-sidebar-nav">
        <ul class="section-nav sidebar-nav">
            @foreach($categories as $category)
                <li class="toc-entry toc-h2"><a href="{{ route('categories.show', $category->id) }}">{{$category->title}}</a></li>
            @endforeach
        </ul>
    </nav>
@show
