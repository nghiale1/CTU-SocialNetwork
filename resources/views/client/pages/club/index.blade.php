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
    .delete-blog {
        float: right;
    }
    </style>
@endpush
@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
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

                    <div class="col-md-4 ">
                        <div class="blog-thumb">
                            <a href="{{route('club.show',$item->cp_slug)}}">
                                <img class="" src="{{asset($item->cp_avatar)}}" alt="photo" style="width:400px; height:200px" >
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">


                        <h2 class="blog-title">
                            <a href="{{route('club.show',$item->cp_slug)}}">{{$item->cp_title}}</a>
                            <span class="comments-padding"></span>
                            @if($item->stu_id==Auth::id())
                            <a href="{{ route('club.delete', ['id'=>$item->cp_id]) }}" id="deleteblog" class="delete-blog" title="Xóa"><i class="fa fa-trash"></i></a>
                            @endif
                        </h2>
                        <p>

                            <i class="fa fa-calendar-o"></i> {{$item->day}}
                            <span class="comments-padding"></span>
                            <i class="fa fa-eye" aria-hidden="true"></i> {{$item->cp_view_count}}</i>
                            <span class="comments-padding"></span>
                            <i class="fa fa-user" aria-hidden="true"></i> Đăng bởi: {{$item->stu_name}}</i>
                            <h4>{{$item->c_name}}</h4>
                        </p>
                    </div>
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <hr>
                @empty
                <h2 class="blog-title">Chưa có bài viết nào!
                </h2>
                @endforelse
                {!!$blog->links()!!}
            </div>
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
        @include('client.pages.club.search')
        <!-- Blog Categories -->
        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Câu lạc bộ tham gia</h4>
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