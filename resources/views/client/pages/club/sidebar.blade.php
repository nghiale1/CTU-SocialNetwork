<aside class="col-md-4 sidebar-padding">
    <div id="app">
        <chat-layout></chat-layout>
    </div>
    {{-- @include('client.pages.club.search') --}}
    <!-- Blog Categories -->
    <div class="blog-sidebar">
        <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Câu lạc bộ đã tham gia</h4>
        <hr>
        <ul class="sidebar-list">
            @foreach ($joined as $item)

            <li><a href="{{route('club.clubPostSlug',$item->c_slug)}}">{{$item->c_name}}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- Recent Posts -->
    <div class="blog-sidebar">
        <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Bài viết đã xem</h4>
        <hr style="margin-bottom: 5px;">
        {{-- {{dd($joined)}} --}}
        @foreach ($viewed as $item)
        <div class="media">
            <a class="pull-left" href="#">
                <img class="img-responsive media-object" src="{{asset($item->cp_avatar)}}" alt="Media Object">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><a href="{{route('club.show',$item->cp_slug)}}">{{$item->cp_title}}</a></h4>
            </div>
            @endforeach
        </div>


    </div>


</aside>