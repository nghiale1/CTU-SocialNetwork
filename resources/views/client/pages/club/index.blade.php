@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Câu lạc bộ
@endsection

@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
        <h1 class="page-header sidebar-title">
            Câu lạc bộ
            <span style="float: right"><button class="btn btn-ctu"
                    onclick="window.location.href='{{route('club.create')}}'"> Thêm bài viết</button> </span>
        </h1>
        <!--
                        First Blog Post -->
        <div class="row blogu">
            @forelse ($blog as $item)
            <div class="col-sm-4 col-md-4 ">
                <div class="blog-thumb">
                    <a href="{{route('club.show',$item->cp_slug)}}">
                        <img class="img-responsive" src="{{asset($item->cp_avatar)}}" alt="photo">
                    </a>
                </div>
            </div>
            <div class="col-sm-8 col-md-8">


                <h2 class="blog-title">
                    <a href="{{route('club.show',$item->cp_slug)}}">{{$item->cp_title}}</a>
                </h2>
                <p>

                    <i class="fa fa-calendar-o"></i> {{$day[$item->cp_id]}}
                    <span class="comments-padding"></span>
                    <i class="fa fa-eye" aria-hidden="true"></i> {{$item->cp_view_count}}</i>
                </p>
            </div>
            @empty
            <h2 class="blog-title">Bạn chưa tham gia câu lạc bộ nào
            </h2>
            @endforelse
            {!!$blog->links()!!}
        </div>
        <hr>



        <div class="text-center">
            <ul class="pagination">
                <li class="active"> <a href="#">1</a> </li>
                <li> <a href="#">2</a> </li>
                <li> <a href="#">3</a> </li>
                <li> <a href="#">4</a> </li>
                <li> <a href="#">5</a> </li>
                <li> <a href="#">Next</a> </li>
            </ul>
        </div>
    </div>
    <!-- Blog Sidebar Column -->
    <aside class="col-md-4 sidebar-padding">
        <div id="app">
            <chat-layout></chat-layout>
        </div>
        <div class="blog-sidebar">
            <div class="input-group searchbar">
                <input type="text" class="form-control searchbar" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Tìm kiếm</button>
                </span>
            </div><!-- /input-group -->
        </div>
        <!-- Blog Categories -->
        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Học phần</h4>
            <hr>
            <ul class="sidebar-list">
                <li><a href="#">CT258 - Phát triển thương mại điện tử</a></li>
                <li><a href="#">CT255 - Nghiệp vụ thông minh</a></li>
                <li><a href="#">CT264 - Cơ sở dữ liệu phân tán</a></li>
                <li><a href="#">CT244 - Bảo trì phần mềm</a></li>
                <li><a href="#">CT236 - Quản trị cơ sở dữ liệu trên Windows</a></li>
            </ul>
        </div>
        <!-- Recent Posts -->
        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Bài viết đã xem</h4>
            <hr style="margin-bottom: 5px;">

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="img-responsive media-object" src="{{asset('client/images/blog-photo1.jpg')}}"
                        alt="Media Object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#">BI thi gì vậy mấy bạn?</a></h4>
                    Mọi người cho mình hỏi môn BI thầy nghe thi đề gì vậy
                </div>
            </div>

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="img-responsive media-object" src="{{asset('client/images/blog2.jpg')}}"
                        alt="Media Object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#">Post title 2</a></h4>
                    This is some sample text. This is some sample text. This is some sample text.
                </div>
            </div>

            <div class="media">
                <a class="pull-left" href="#">
                    <img class="img-responsive media-object" src="{{asset('client/images/blog3.jpg')}}"
                        alt="Media Object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#">Post title 3</a></h4>
                    This is some sample text. This is some sample text. This is some sample text.
                </div>
            </div>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="img-responsive media-object" src="{{asset('client/images/blog1.jpg')}}"
                        alt="Media Object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="#">Post title 4</a></h4>
                    This is some sample text. This is some sample text. This is some sample text.
                </div>
            </div>
        </div>


    </aside>
</div>

@endsection
@push('script')
@endpush