@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Câu lạc bộ
@endsection
@push('css')
<style>
    .col-md-12.club-frame {
        /* border: 1px solid #fff2f2; */
        margin: 10px 0;
    }

    .btn {
        padding: 6px 10px;
    }
    div#multiCollapseExample1 {
    /* border: 1px solid; */
    background: white;
    padding: 16px;
    margin-left: 18px;
}
</style>
@endpush
@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8 ben-trai">
        <h1 class="page-header sidebar-title">
            Câu lạc bộ
            <span style="float: right"><button class="btn btn-ctu"
                    onclick="window.location.href='{{route('club.create')}}'"> Thêm bài viết</button> </span>
            <marquee scrolldelay="1" scrollamount="5">
                <span class="gioithiu">
                    Đây là nơi giao lưu học hỏi, chia sẻ các kĩ năng với nhau như: Guitar, Sáo, Đờn ca tài tử,...
                </span>
            </marquee>
        </h1>
        <!--
                        First Blog Post -->
        <div class="row blogu">
            <div id="content">
                {{-- {{dd($blog)}} --}}
                @forelse ($blog as $item)
                <div class="col-md-12 club-frame">
                    <div class="col-md-3 ">
                        <div class="blog-thumb">
                            <a href="{{route('club.show',$item->cp_slug)}}">
                                <img class="" src="{{asset($item->cp_avatar)}}" alt="photo"
                                    style="width:400px; height:100px">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-9">


                        <h2 class="blog-title">
                            <a href="{{route('club.show',$item->cp_slug)}}">{{$item->cp_title}}</a>
                            <span class="comments-padding"></span>
                            @if($item->stu_id==Auth::id())
                            <a href="{{ route('club.delete', ['id'=>$item->cp_id]) }}" id="deleteblog"
                                class="delete-blog" title="Xóa" style="float: right"><i class="fa fa-trash"></i></a>
                            @endif
                        </h2>
                        <p>

                            <i class="fa fa-calendar-o"></i> {{$item->day}}
                            <span class="comments-padding"></span>
                            <i class="fa fa-eye" aria-hidden="true"></i> {{$item->cp_view_count}}</i>
                            <span class="comments-padding"></span>
                            <i class="fa fa-user"></i> Đăng bởi: <a href="{{ route('Info',$item->stu_code.'.'.Str::slug($item->stu_name, '-')) }}">
                                {{$item->stu_name}}</a>
                        </p>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <hr>
                @empty
                <h2 class="blog-title">Chưa có bài viết nào!
                </h2>
                @endforelse
                @if ($blog!=null)
                  <div class="text-center">
                      {{$blog->links()}}
                    </div>  
                @endif
            </div>
        </div>
        <hr>




    </div>
    <div class="col-md-1 clear-center"></div>
    <!-- Blog Sidebar Column -->
    {{-- @include('client.pages.club.sidebar') --}}
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
                {{-- {{dd($clubNotJoin)}} --}}
                @foreach ($joined as $item)
                @if ($item->cs_role!='YC'&&$item->cs_role!='TV')
                <li class="btn-group">
                    {{-- <a class=" dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">{{$item->c_name}}
                    </a>
                    
                    <div class="dropdown-menu" style="padding: 15px">
                        <a class="dropdown-item" href="{{route('club.clubPostSlug',$item->c_slug)}}">Xem bài viết</a><br>
                        <a class="dropdown-item" href="{{route('club.listMember',$item->c_slug)}}">Danh sách thành
                            viên</a><br>
                        <a class="dropdown-item" href="{{route('club.listRequest',$item->c_slug)}}">Danh sách yêu
                            cầu</a><br>
                    </div> --}}
                    <a data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">{{$item->c_name}}</a>
                    
                </li>
                {{-- <div class="container"> --}}
                    <div class="row">
                        <div class="col">
                          <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card card-body" >
            
                                <a class="dropdown-item" href="{{route('club.clubPostSlug',$item->c_slug)}}">Xem bài viết</a><br>
                                <a class="dropdown-item" href="{{route('club.listMember',$item->c_slug)}}">Danh sách thành
                                    viên</a><br>
                                <a class="dropdown-item" href="{{route('club.listRequest',$item->c_slug)}}">Danh sách yêu
                                    cầu</a>
                             </div>
                            </div>
                          </div>
                        </div>
                    </div>
                {{-- </div> --}}
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
            {{-- @foreach ($viewed as $item)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="img-responsive media-object" src="{{asset($item->cp_avatar)}}" alt="Media Object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="{{route('club.show',$item->cp_slug)}}">{{$item->cp_title}}</a></h4>
                </div>
                @endforeach --}}
            </div>


        </div>


    </aside>

</div>

@endsection
@push('script')
<script>
    $('#deleteblog').click(function () {

        if(confirm('Bạn có muốn xóa ?')){
            return true;
        }
        else{
            return false;
        }
    });
</script>
@endpush
