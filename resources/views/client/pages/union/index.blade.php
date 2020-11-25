@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Chi Hội
@endsection
@push('css')
<style>
    .delete-blog {
        float: right;
    }

    .btn {
        padding: 6px 10px;
    }
</style>
@endpush
@section('content')

<div class="row">
    <!-- Blog Column -->
    <div class="col-md-8">
        <h1 class="page-header sidebar-title">
            Đoàn hội
            <span style="float: right"><button class="btn btn-ctu"
                    onclick="window.location.href='{{route('union.create')}}'"> Thêm bài viết</button> </span>
            <marquee scrolldelay="1" scrollamount="5">
                <span class="gioithiu">
                    Đây là nơi kết nối các bạn cùng quê với nhau, Tổ chức các buổi hoạt động ngoại khóa, Giúp đỡ và hộ
                    trợ các bạn trong quá trình học tập cũng như trong cuộc sống.
                </span>
            </marquee>
        </h1>
        <!--
                        First Blog Post -->
        <div class="row blogu">
            {{-- {{dd($blog)}} --}}
            @forelse ($blog as $item)
            <div class="col-md-12">

                <div class="col-sm-4 col-md-4 ">
                    <div class="blog-thumb">
                        <a href="{{route('union.show',$item->up_slug)}}">
                            <img class="img-responsive" src="{{asset($item->up_avatar)}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">


                    <h2 class="blog-title">
                        <a href="{{route('union.show',$item->up_slug)}}">{{$item->up_title}}</a>
                        <span class="comments-padding"></span>
                        @if($item->stu_id==Auth::id())
                        <a href="{{ route('union.delete', ['id'=>$item->up_id]) }}" id="deleteblog" class="delete-blog"
                            title="Xóa"><i class="fa fa-trash"></i></a>
                        @endif
                    </h2>
                    <p>

                        <i class="fa fa-calendar-o"></i> {{$item->ngaydang}}
                        <span class="comments-padding"></span>
                        <i class="fa fa-eye" aria-hidden="true"></i> {{$item->up_view_count}}</i>
                        <span class="comments-padding"></span>
                        <i class="fa fa-user" aria-hidden="true"></i>Đăng bởi: {{$item->stu_name}}</i>
                    </p>
                </div>
            </div>
            <div class="col-md-12">&nbsp;</div>
            @empty
            <h2 class="blog-title">Bạn chưa tham gia chi hội nào
            </h2>

            @endforelse
            @if ($blog!=[])

            {!!$blog->links()!!}
            @endif
        </div>
        <hr>



       
    </div>
    <!-- Blog Sidebar Column -->
    <aside class="col-md-4 sidebar-padding">
        <div id="app">
            <chat-layout></chat-layout>
        </div>
        <div class="blog-sidebar">
            <div class="input-group searchbar">
                <input type="text" class="form-control searchbar" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Tìm kiếm</button>
                </span>
            </div><!-- /input-group -->
        </div>
        <!-- Blog Categories -->
        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> {{$ub_branch->ub_name}} </h4>
            <hr>
            <ul class="sidebar-list">
                <li><a href="#">
                    @foreach ($chihoi as $val)
                        @if ($val->sub_role == 'LCHT')
                        Chi hội trưởng: &nbsp; {{$val->stu_name}}
                            
                        @endif
                    @endforeach
                </a></li>
                <li><a href="#">
                    @foreach ($chihoi as $val)
                        @if ($val->sub_role == 'LCHP')
                        Chi hội Phó: &nbsp; {{$val->stu_name}}
                            
                        @endif
                    @endforeach
                </a></li>
                <li><a href="#">
                    @foreach ($chihoi as $val)
                        @if ($val->sub_role == 'UV')
                        Ủy viên: &nbsp; {{$val->stu_name}}
                            
                        @endif
                    @endforeach
                </a></li>
                <li><a href="#">
                    Số lương hội viên: {{count($chihoi)}}
                </a></li>
            </ul>
        </div>
        <!-- Recent Posts -->
        {{-- <div class="blog-sidebar">
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
         --}}


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