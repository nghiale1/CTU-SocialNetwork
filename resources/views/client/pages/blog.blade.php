@extends('client.client')
@section('content')
<!-- Page Content -->
<section class="container blog">
    <div class="row">

        <!-- Blog Column -->
        <div class="col-md-8">
            <h1 class="page-header sidebar-title">
                Hỏi đáp
            </h1>
            <!-- First Blog Post -->
            <div class="row blogu">
                <div class="col-sm-4 col-md-4 ">
                    <div class="blog-thumb">
                        <a href="single-post.html">
                            <img class="img-responsive" src="{{asset('client/images/blog-photo1.jpg')}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="single-post.html">BI thi gì vậy mấy bạn?</a>
                    </h2>
                    <p>
                        <i class="fa fa-thumbs-o-up" aria-hidden="true">5 likes</i>
                        <span class="comments-padding"></span>
                        <i class="fa fa-comment"></i> 0 comments
                        <span class="comments-padding"></span>
                        <i class="fa fa-thumbs-o-down" aria-hidden="true">5 dislikes</i>
                        <span class="comments-padding"></span>
                        <i class="fa fa-calendar-o"></i> August 28, 2013
                    </p>
                    <p>Mọi người cho mình hỏi môn BI thầy nghe thi đề gì vậy</p>
                </div>
            </div>
            <hr>
            <!-- Second Blog Post -->
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="blog-thumb">
                        <a href="single-post.html">
                            <img class="img-responsive" src="{{asset('client/images/blog-photo2.jpg')}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="single-post.html">Có ai báo cáo tmdt chưa?</a>
                    </h2>
                    <p>
                        <i class="fa fa-thumbs-o-up" aria-hidden="true">5 likes</i>
                        <span class="comments-padding"></span>
                        <i class="fa fa-comment"></i> 0 comments
                        <span class="comments-padding"></span>
                        <i class="fa fa-thumbs-o-down" aria-hidden="true">5 dislikes</i>
                        <span class="comments-padding"></span>
                        <i class="fa fa-calendar-o"></i> August 28, 2013
                    </p>
                    <p>Cho hỏi tmdt nào báo cáo dạ</p>
                </div>
            </div>
            <hr>
            <!-- Third Blog Post -->
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="blog-thumb">
                        <a href="single-post.html">
                            <img class="img-responsive" src="{{asset('client/images/blog-photo3.jpg')}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="single-post.html">Post title 3</a>
                    </h2>
                    <p><i class="fa fa-calendar-o"></i> August 28, 2013
                        <span class="comments-padding"></span>
                        <i class="fa fa-comment"></i> 1 comment
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora,
                        necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi
                        corrupti debitis ipsum officiis rerum.</p>
                </div>
            </div>
            <hr>
            <!-- Fourth Blog Post -->
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="blog-thumb">
                        <a href="single-post.html">
                            <img class="img-responsive" src="{{asset('client/images/blog-photo1.jpg')}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="single-post.html">Post title 4</a>
                    </h2>
                    <p><i class="fa fa-calendar-o"></i> August 28, 2013
                        <span class="comments-padding"></span>
                        <i class="fa fa-comment"></i> 3 comments
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora,
                        necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi
                        corrupti debitis ipsum officiis rerum.</p>
                </div>
            </div>

            <hr>
            <!-- Fifth Blog Post -->
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="blog-thumb">
                        <a href="single-post.html">
                            <img class="img-responsive" src="{{asset('client/images/blog-photo2.jpg')}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="single-post.html">Post title 5</a>
                    </h2>
                    <p><i class="fa fa-calendar-o"></i> August 28, 2013
                        <span class="comments-padding"></span>
                        <i class="fa fa-comment"></i> 3 comments
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora,
                        necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi
                        corrupti debitis ipsum officiis rerum.</p>
                </div>
            </div>

            <hr>
            <!-- Six Blog Post -->
            <div class="row">
                <div class="col-sm-4 col-md-4">
                    <div class="blog-thumb">
                        <a href="single-post.html">
                            <img class="img-responsive" src="{{asset('client/images/blog-photo3.jpg')}}" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="single-post.html">Post title 6</a>
                    </h2>
                    <p><i class="fa fa-calendar-o"></i> August 28, 2013
                        <span class="comments-padding"></span>
                        <i class="fa fa-comment"></i> 3 comments
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora,
                        necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi
                        corrupti debitis ipsum officiis rerum.</p>
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
</section>
@endsection