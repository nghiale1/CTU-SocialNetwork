@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Chi tiết bài viết
@endsection

@section('content')

<!-- Page Content -->
<div class="container blog singlepost">
    <div class="row">
        <article class="col-md-8">
            <h1 class="page-header sidebar-title">{{$post->p_title}}</h1>
            <img src="{{asset('client/images/unsplash1.jpg')}}" class="img-responsive" alt="photo" />
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="entry-meta">
                        <span><i class="fa fa-calendar-o"></i> {{$post->p_created}}</span>
                        <span><i class="fa fa-user"></i> Bởi <a href="#">{{$post->stu_name}}</a></span>
                        <span> <i class="fa fa-tag"></i> <a href="#" rel="tag">Audio</a></span>
                        <div class="pull-right"><span><i class="fa fa-eye"></i> 184</span> <span><i
                                    class="fa fa-comment"></i> 4</span></div>
                    </div>
                </div>
            </div>
            <p>{!!$post->p_content!!}</p>

            <div class="mysharing">
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
            </div>

            <!-- Blog Comments -->
            <div class="comments1">
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <hr>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('client/images/avatar1.png')}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Author Name
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                        nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{asset('client/images/avatar1.png')}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Author Name
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                        commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum
                        nunc ac nisi vulputate fringilla.
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="{{asset('client/images/avatar1.png')}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Author Name
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis
                                in faucibus.
                            </div>
                        </div>
                    </div>
                </div>
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