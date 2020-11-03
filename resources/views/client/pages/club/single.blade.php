@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Chi tiết bài viết
@endsection
@push('css')
<style>
    .page-header {
        border-bottom: 0px solid #eee;
    }

    /* comment */
    .row.cm_icon {
        /* border: 1px solid; */
        margin-top: 14px;
    }

    .row.cm_icon ._cm_left a {
        margin: 0px 22px;
        font-size: 16px;
        display: inline-block;
        /* border: 1px solid; */
        width: 19px;
        padding: 0 10px;
        /* margin-left: -3px; */
    }

    ._cm_right>a {
        margin-right: 10px;
    }

    .form-comment {
        width: 100%;
        /* border: 1px solid; */
        margin-top: 10px;
    }

    .icon-color {
        color: #3571ad;

    }

    #dropdown-menu1 {
        position: relative;
    }

    div#dropdown-menu2 {
        position: absolute;
        top: -32px;
        left: 165px;
        padding: 5px;
        text-align: center;
    }

    div#dropdown-menu3 {
        position: relative;
    }

    div#dropdown-menu4 {
        position: absolute;
        top: -32px;
        left: 124px;
        text-align: center;
    }
</style>
@endpush
@section('content')

<!-- Page Content -->
<div class="container singlepost">
    {{-- {{dd($post)}} --}}
    <div class="row">
        <article class="col-md-8 ben-trai">
            <h1 class="page-header sidebar-title">{{ $post->cp_title}}</h1>
            {{-- <img src="{{asset('client/images/unsplash1.jpg')}}" class="img-responsive" alt="photo" /> --}}
            {{-- <hr> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="entry-meta">
                        <span><i class="fa fa-calendar-o"></i> {{$day}}</span>
                        <span><i class="fa fa-user"></i> Bởi {{$post->cs_role}} -<a href="#">
                                {{$post->stu_name}}</a></span>
                        <div class="pull-right">
                            <span><i class="fa fa-eye"></i> {{$post->cp_view_count}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>{!!$post->cp_content!!}</p>
                </div>
                <div class="col-md-12">
                    <img src="{{asset($post->cp_avatar)}}" alt="" width="100%;">
                </div>
                <div class="col-md-12">
                    <div class="comments1">
                        <div class="well">
                            <h4>Bình luận:</h4>
                            <form action="{{ route('club.comment.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="st_id" value="{{ Auth::guard('student')->id()}}">
                                <input type="hidden" name="cp_id" value="{{$post->cp_id}}">
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="com_content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                        {{-- Bình luận --}}
                        {{-- {{dd($comment)}} --}}
                        {{-- {{dd($like)}} --}}
                        @foreach ($comment as $val)
                        @if ($val->com_idrep == null && $val->cp_id == $post->cp_id)
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{asset($val->stu_avatar)}}" alt="{{$val->username}}">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$val->com_content}}
                                    <small class="pull-right">
                                        {{date('d-m-Y H:m', strtotime($val->com_created))}}</small>
                                </h4>
                                {{$val->stu_name}}

                                <div class="row cm_icon">
                                    <div class="col-md-6">
                                        <div class="_cm_left">

                                            <a class="click_like" data-com_id="{!! $val->com_id!!}" title="Thích"><i
                                                    class="fa fa-thumbs-up icon" aria-hidden="true"></i></a>



                                            <a title="Bình luận" class="showform" data-id="{!! $val->cp_id!!}"><i
                                                    class="fa fa-comments" aria-hidden="true"></i></a>
                                            <input type="hidden" class="get_stu{!! $val->com_id!!}"
                                                value="{!! $val->stu_id!!}">
                                            <a href="#" title="Báo cáo" data-toggle="modal" data-target="#report"
                                                data-modal="{!! $val->com_id!!}" class="clickModal"><i
                                                    class="fa fa-flag"></i></a>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="_cm_right">
                                            @if ($val->stu_id == Auth::guard('student')->id())
                                            <div class="dropdown" id="dropdown-menu1">

                                                <a class="pull-right" id="dropdownMenuButton" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">...</a>

                                                {{-- thông báo xóa bình luận --}}
                                                <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Thông báo
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có thất sự muốn xóa?
                                                            </div>
                                                            <div class="modal-footer">

                                                                <form action="{{ route('share.comment.destroy') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="com_id"
                                                                        value="{!! $val->com_id!!}">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Xóa</button>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                    id="dropdown-menu2">
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#delete">Xóa bình luận</a>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @foreach ($comment as $val1)
                                @if ($val->com_id ==$val1->com_idrep)
                                <div class="media" style="border-bottom:none;">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" src="{{asset($val1->stu_avatar)}}"
                                            alt="{{$val1->username}}">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$val1->com_content}}
                                            <small class="pull-right">
                                                {{date('d-m-Y H:m', strtotime($val1->com_created))}}</small>
                                        </h4>
                                        {{$val1->stu_name}}
                                        {{$val1->com_content}}
                                        <div class="row cm_icon">
                                            <div class="col-md-6">
                                                <div class="_cm_left">
                                                    <a href="#" title="Thích"><i class="fa fa-thumbs-up"
                                                            aria-hidden="true"></i></a>
                                                    {{-- <a title="Bình luận" class="showform" data-id="{!! $val->cp_id!!}" ><i class="fa fa-comments" aria-hidden="true"></i></a> --}}
                                                    <a href="#" title="Báo cáo" data-toggle="modal"
                                                        data-target="#report" data-modal="{{$val1->com_id}}"
                                                        class="clickModal"><i class="fa fa-flag"></i></a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="_cm_right" id="dropdown-menu3">
                                                    @if ($val1->stu_id == Auth::guard('student')->id())
                                                    {{-- <a href="" class="pull-right" title="Xóa bình luận"><i
                                                                class="fa fa-trash "></i></a> --}}
                                                    <a class="pull-right" id="dropdownMenuButton1"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">...</a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                                        id="dropdown-menu4">
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#delete1">Xóa bình luận</a>
                                                    </div>
                                                    <div class="modal fade" id="delete1" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Thông
                                                                        báo</h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Bạn có thất sự muốn xóa?
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{ route('comment.destroy') }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <input type="hidden" name="com_id"
                                                                            value="{!! $val1->com_id!!}">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Đóng</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Xóa</button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                <div class="form-comment showrep" id="showrep{!!$val->cp_id!!}">
                                    <form action="{{ route('club.comment.rep') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="com_id" value="{!! $val->com_id!!}">
                                            <input type="hidden" name="st_id" value="{{ Auth::guard('student')->id()}}">
                                            <input type="hidden" name="cp_id" value="{{$post->cp_id}}">
                                            <textarea class="form-control rep_com" rows="1"
                                                name="com_repcontent"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Gửi</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>

        </article>
        <div class="col-md-1 clear-center"></div>
        @include('client.pages.club.sidebar')
    </div>
</div>

@endsection
@push('script')
<script>
    $(document).ready(function () {


        //bình luận nè
        $(".showrep").hide();
          $('.showform').click(function () {
            //   console.log("ok");
            var id = $(this).attr('data-id');
            //   console.log(id);
            $("#showrep"+id).toggle();

          });

      });
</script>
@endpush
