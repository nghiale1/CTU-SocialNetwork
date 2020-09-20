@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Hỏi đáp
@endsection
@push('css')
<style>
    .delete-blog {
        float: right;
    }
</style>
@endpush
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
            <div class="col-sm-12 col-md-12" id="content">
                {{-- {{dd($blog)}} --}}
                @foreach ($blog as $item)
                <h2 class="blog-title">
                    <a href="{{route('forum.show',$item->p_slug)}}">{{$item->p_title}}</a>
                </h2>
                <p>
                    <i class="fa fa-thumbs-o-up" aria-hidden="true">{{$item->likes}}</i>
                    <span class="comments-padding"></span>
                    <i class="fa fa-comment">{{$item->comments}}</i>
                    <span class="comments-padding"></span>
                    <i class="fa fa-eye" aria-hidden="true">{{$item->p_view_count}}</i>
                    <span class="comments-padding"></span>
                    <i class="fa fa-calendar-o"></i> {{$item->day}}
                    {{-- <div class="delete-blog"> --}}
                        <span class="comments-padding"></span>
                        @if($item->stu_id==Auth::id())
                        <a href="{{ route('question.delete', ['id'=>$item->p_id]) }}" id="deleteblog" class="delete-blog" title="Xóa"><i class="fa fa-trash"></i></a>
                        @endif
                    {{-- </div> --}}
                </p>
               

                <hr>
                @endforeach
                {{-- {!!$blog->links()!!} --}}
            </div>
        </div>



        <div class="text-center">
            {{ $blog->links() }}
        </div>
    </div>

    <!-- Blog Sidebar Column -->
    <aside class="col-md-4 sidebar-padding">
        <div id="app">
            <chat-layout></chat-layout>
        </div>
        {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script> --}}
        @include('client.pages.forum.search')
        <!-- Blog Categories -->
        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Học phần đang học</h4>
            <hr>
            <ul class="sidebar-list">
                @foreach ($getSubPopular as $item)
                <li><a href="{{ route('subject.detail', ['idCode'=>$item->sub_code]) }}">{{ $item->sub_name }}</a></li>
                @endforeach
            </ul>
        </div>
        <!-- Recent Posts -->
        <div class="blog-sidebar">
            <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Bài viết đã xem</h4>
            <hr style="margin-bottom: 5px;">
            @if ($baivietdaxem)
            @foreach ($baivietdaxem as $item)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="img-responsive media-object" src="{{asset('client/images/blog-photo1.jpg')}}"
                        alt="Media Object">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="{{route('forum.show',$item->p_slug)}}">{{ $item->p_title }}</a>
                    </h4>
                    <span><a href="#">{{ $item->stu_name }}</a></span>
                </div>
            </div>
            @endforeach
            @endif

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