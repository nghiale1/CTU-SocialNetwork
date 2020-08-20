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
</style>
@endpush
@section('content')

<!-- Page Content -->
<div class="container singlepost">
    <div class="row">
        <article class="col-md-8">
            <h1 class="page-header sidebar-title">{{$post->p_title}}</h1>
            {{-- <img src="{{asset('client/images/unsplash1.jpg')}}" class="img-responsive" alt="photo" /> --}}
            {{-- <hr> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="entry-meta">
                        <span><i class="fa fa-calendar-o"></i> {{$day}}</span>
                        <span><i class="fa fa-user"></i> Bởi <a href="#">{{$post->stu_name}}</a></span>
                        <div class="pull-right">
                            <span><i class="fa fa-eye"></i> 184</span>
                            <span> <i class="fa fa-thumbs-up" aria-hidden="true"></i>20</a></span>
                            <span> <i class="fa fa-thumbs-down" aria-hidden="true"></i> 2</a></span>
                            <span><i class="fa fa-comment"></i> 4</span>
                        </div>
                    </div>
                </div>
            </div>
            <p>{!!$post->p_content!!}</p>
            @include('client.pages.forum.report')

            {{-- <div class="mysharing">
                <!-- Twitter -->
                <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank"
                    class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                <!-- Facebook -->
                <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank"
                    class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                <!-- Google+ -->
                <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank"
                    class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
                <!-- LinkedIn -->
                <a href="http://www.linkedin.com/shareArticle?mini=true" title="Share on LinkedIn" target="_blank"
                    class="btn btn-linkedin"><i class="fa fa-linkedin"></i> LinkedIn</a>
            </div> --}}

            <!-- Blog Comments -->
            <div class="comments1">
                <div class="well">
                    <h4>Bình luận:</h4>
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="st_id" value="{{ Auth::guard('student')->id()}}">
                        <input type="hidden" name="p_id" value="{{$post->p_id}}">
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
                @if ($val->com_idrep == null && $val->p_id == $post->p_id)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('client/images/').$val->stu_avatar}}"
                            alt="{{$val->username}}">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$val->com_content}}
                            <small class="pull-right"> {{date('d-m-Y H:m', strtotime($val->com_created))}}</small>
                        </h4>
                        {{$val->stu_name}}

                        <div class="row cm_icon">
                            <div class="col-md-6">
                                <div class="_cm_left">

                                    <a class="click_like" data-com_id="{!! $val->com_id!!}" title="Thích"><i
                                            class="fa fa-thumbs-up icon{!! $val->com_id!!} @if ($myself[$val->com_id]==1) icon-color @endif "
                                            aria-hidden="true"></i></a>


                                    {{-- <a class="click_like" data-com_id="{!! $val->com_id!!}" title="Thích" ><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                        @endif --}}
                                    <span id="show_count{!! $val->com_id!!}">
                                        {{$count_like[$val->com_id]==0 ? '' : $count_like[$val->com_id]}}</span>


                                    <a title="Bình luận" class="showform" data-id="{!! $val->com_id!!}"><i
                                            class="fa fa-comments" aria-hidden="true"></i></a>
                                    <input type="hidden" class="get_stu{!! $val->com_id!!}" value="{!! $val->stu_id!!}">
                                    <a href="#" title="Báo cáo" data-toggle="modal" data-target="#report"
                                        data-modal="{!! $val->com_id!!}" class="clickModal"><i
                                            class="fa fa-flag"></i></a>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="_cm_right">
                                    @if ($val->stu_id == Auth::guard('student')->id())
                                    <a class="pull-right" title="Xóa bình luận"><i class="fa fa-trash "
                                            data-toggle="modal" data-target="#delete"></i></a>
                                    {{-- thông báo xóa bình luận --}}
                                    <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có thất sự muốn xóa?
                                                </div>
                                                <div class="modal-footer">

                                                    <form action="{{ route('comment.destroy') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="com_id" value="{!! $val->com_id!!}">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Đóng</button>
                                                        <button type="submit" class="btn btn-primary">Xóa</button>
                                                    </form>

                                                </div>
                                            </div>
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
                                <img class="media-object" src="{{asset('client/images/').$val1->stu_avatar}}"
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
                                            {{-- <a title="Bình luận" class="showform" data-id="{!! $val->com_id!!}" ><i class="fa fa-comments" aria-hidden="true"></i></a> --}}
                                            <a href="#" title="Báo cáo" data-toggle="modal" data-target="#report"
                                                data-modal="{{$val1->com_id}}" class="clickModal"><i
                                                    class="fa fa-flag"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="_cm_right">
                                            @if ($val1->stu_id == Auth::guard('student')->id())
                                            <a href="" class="pull-right" title="Xóa bình luận"><i
                                                    class="fa fa-trash "></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        <div class="form-comment showrep" id="showrep{!! $val->com_id!!}">
                            <form action="{{ route('repcomment.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="com_id" value="{!! $val->com_id!!}">
                                    <input type="hidden" name="st_id" value="{{ Auth::guard('student')->id()}}">
                                    <input type="hidden" name="p_id" value="{{$post->p_id}}">
                                    <textarea class="form-control rep_com" rows="1" name="com_repcontent"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif


                @endforeach

            </div>
        </article>
        <!-- Blog Sidebar Column -->
        <aside class="col-md-4 sidebar-padding">
            <div class="blog-sidebar">
                <div class="input-group searchbar">
                    <input type="text" class="form-control searchbar" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
                    </span>
                </div><!-- /input-group -->
            </div>
            <!-- Blog Categories -->
            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Categories</h4>
                <hr>
                <ul class="sidebar-list">
                    <li><a href="#">Applications</a></li>
                    <li><a href="#">Photography</a></li>
                    <li><a href="#">Art Design</a></li>
                    <li><a href="#">Graphic Design</a></li>
                    <li><a href="#">Category Name</a></li>
                </ul>
            </div>
            <!-- Recent Posts -->
            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Recent Posts</h4>
                <hr style="margin-bottom: 5px;">

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="{{asset('client/images/blog1.jpg')}}"
                            alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 1</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
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
</div>
@endsection
@section('scrpit')
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


        //thích
          $('.click_like').click(function () { 
            //   console.log("ok");
            var com_id = $(this).attr('data-com_id');
            
            // console.log(com_id);
            var stu_id_cmt = $(".get_stu"+com_id).val();
            // console.log(stu_id_cmt);
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('comment.like') }}",
                data: {com_id:com_id, stu_id_cmt:stu_id_cmt},
                dataType: "json",
                success: function (response) {
                    // jQuery(this).children("i").css('color','rgb(51, 111, 172)!important;');
                    // console.log(response.data);
                    // console.log(com_id);
                    
                    $("#show_count"+com_id).html(response.data);
                    $(".show_count"+com_id).append("ok");
                    // document.getElementsByClassName("#show_count"+com_id).innerHTML("ok");


                    if(response.data  ==1)
                    {
                       
                        $( ".icon"+com_id).toggleClass( "icon-color");
                       
                        // console.log("ok");
                    }else{
                        $( ".icon"+com_id).toggleClass( "icon-color");
                        // console.log("ok");
                     
                        
                    }
                   
                }
            });
           
            

          });

      });
</script>

@endsection