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
</style>
@endpush
@section('content')

<!-- Page Content -->
<div class="container singlepost">
    <div class="row">
        <article class="col-md-8">
            <h1 class="page-header sidebar-title">{{$post->cp_title}}</h1>
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
            <p>{!!$post->cp_content!!}</p>

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


        </aside>
    </div>
</div>

@endsection