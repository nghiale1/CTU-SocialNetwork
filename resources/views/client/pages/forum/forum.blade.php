@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Hỏi đáp
@endsection

@section('content')
<!-- Page Content -->
<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
        <h1 class="page-header sidebar-title">
            Hỏi đáp
            <span style="float: right"><button class="btn btn-ctu"
                    onclick="window.location.href='{{route('question.create')}}'"> Thêm câu hỏi</button> </span>
        </h1>
        <!--
                        First Blog Post -->
        <div class="row blogu">
            <div class="col-sm-12 col-md-12">
                @foreach ($blog as $item) <h2 class="blog-title">
                    <a href="{{route('forum.show',$item->p_slug)}}">{{$item->p_title}}</a>
                </h2>
                <p>
                    <i class="fa fa-thumbs-o-up" aria-hidden="true">{{$item->count_like($item->p_id)}}</i>
                    <span class="comments-padding"></span>
                    <i class="fa fa-comment">{{count($item->comments)}}</i>
                    <span class="comments-padding"></span>
                    <i class="fa fa-eye" aria-hidden="true">{{$item->p_view_count}}</i>
                    <span class="comments-padding"></span>
                    <i class="fa fa-calendar-o"></i> {{$day[$item->p_id]}}
                </p>

                <hr>
                @endforeach
                {!!$blog->links()!!}
            </div>
        </div>



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
        {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
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

        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-comments"></i> Recent Comments</h4>
            <hr style="margin-bottom: 5px;">
            <ul class="sidebar-list">
                <li>
                    <h5 class="blog-title">Author Name</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore</p>
                </li>
                <li>
                    <h5 class="blog-title">Author Name</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore</p>
                </li>
                <li>
                    <h5 class="blog-title">Author Name</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore</p>
                </li>
            </ul>
        </div>

    </aside>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function(){

            //lấy lượt like
            // var l=$('#like'+i).attr('data-p');
            // $.ajax({
            //     type: "get",
            //     url: "{{route('getLike')}}",
            //     data: "l:l",
            //     dataType: "json",
            //     success: function (response) {
            //         $('#like').html(response);
            //     },

            // });

            //lấy lượt comment
            // var c=$('#comment').attr('data-p');
            // $.ajax({
            //     type: "get",
            //     url: "{{route('getComment')}}",
            //     data: "c:c",
            //     dataType: "json",
            //     success: function (response) {
            //         $('#comment').html(response);
            //     },

            // });



        
    });
</script>
@endpush