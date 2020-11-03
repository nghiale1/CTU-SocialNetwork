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
                            <span class="comments-padding"></span>
                            @if($item->stu_id==Auth::id())
                            <a href="{{ route('club.delete', ['id'=>$item->cp_id]) }}" id="deleteblog"
                                class="delete-blog" title="Xóa"><i class="fa fa-trash"></i></a>
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



     
    </div>
    <div class="col-md-1 clear-center"></div>
    <!-- Blog Sidebar Column -->
    @include('client.pages.club.sidebar')
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