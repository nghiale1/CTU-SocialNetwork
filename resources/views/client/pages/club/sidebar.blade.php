@push('css')
<style>
    .dropdown-item {
        color: gray;
    }

    .dropdown-item:hover {
        color: #E96840;
    }

    .dropdown-item::before {
        display: inline-block;
        content: '\f105';
        font-family: 'FontAwesome';
        font-size: 13px;
        color: #999999;
        margin-right: 10px;
    }
</style>
@endpush
<aside class="col-md-3 sidebar-padding ben-phai">
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
            @if ($item->cs_role!='YC'&&$item->cs_role!='TV')
            <li class="btn-group">
                <a class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">{{$item->c_name}}
                </a>
                <div class="dropdown-menu" style="padding: 15px">
                    <a class="dropdown-item" href="{{route('club.clubPostSlug',$item->c_slug)}}">Xem bài viết</a><br>
                    <a class="dropdown-item" href="{{route('club.listMember',$item->c_slug)}}">Danh sách thành
                        viên</a><br>
                    <a class="dropdown-item" href="{{route('club.listRequest',$item->c_slug)}}">Danh sách yêu
                        cầu</a><br>
                </div>
            </li>
            @else

            <li><a href="{{route('club.clubPostSlug',$item->c_slug)}}">{{$item->c_name}}</a></li>
            @endif
            @endforeach
        </ul>
    </div>
    <div class="blog-sidebar">
        <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Câu lạc bộ chưa tham gia</h4>
        <hr>
        <ul class="sidebar-list">
            @foreach ($clubNotJoin as $val)
             <li>
                 <div class="row">
                     <div class="col-md-9" style="">{{$val->c_name}}</div>
                     <div class="col-md-3"><a href=""  title="Tham gia" style="float: right" > <i class="fa fa-file-text-o" aria-hidden="true" style="color: #3471ad" ></i> </a></div>
                 </div>
             </li>
            @endforeach
        </ul>
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
