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
        </h1>
        <!--
                        First Blog Post -->
        <div class="row blogu">
            <div id="content">

                @forelse ($blog as $item)
                <div class="col-md-12 club-frame">

                    <div class="col-md-4 ">
                        <div class="blog-thumb">
                            <a href="{{route('club.show',$item->cp_slug)}}">
                                <img class="" src="{{asset($item->cp_avatar)}}" alt="photo"
                                    style="width:400px; height:200px">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">


                        <h2 class="blog-title">
                            <a href="{{route('club.show',$item->cp_slug)}}">{{$item->cp_title}}</a>
                        </h2>
                        <p>

                            <i class="fa fa-calendar-o"></i> {{$item->day}}
                            <span class="comments-padding"></span>
                            <i class="fa fa-eye" aria-hidden="true"></i> {{$item->cp_view_count}}</i>
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
    @include('client.pages.club.sidebar')
</div>

@endsection
@push('script')
@endpush