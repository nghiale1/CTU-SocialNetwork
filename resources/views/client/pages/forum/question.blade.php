@extends('client.client')

{{-- Thêm khúc này để có trang tiêu đề nha --}}
@section('title')
Đặt câu hỏi
@endsection

@section('content')
<!-- Page Content -->
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 o-giua">
            <form action="" method="post">
                @csrf
                <table class="table table-responsive borderless text-right">
                    <tr>
                        <td style="white-space: nowrap;">Môn học
                        </td>
                        <td>
                            <select name="subject" id="" class="form-control" style="color: #555;">
                                @foreach ($subject as $item)

                                <option value="{{$item->sub_id}}">{{$item->sub_name}}</option>
                                @endforeach
                            </select>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td style="white-space: nowrap;">Tiêu đề <red-star></red-star>
                        </td>
                        <td><input type="text" class="form-control" name="title">
                            <br></td>
                    </tr>
                    <br>
                    <tr>
                        <td style="white-space: nowrap;">Nội dung <red-star></red-star>
                        </td>
                        <td>
                            <textarea name="content" id="" class="tiny " cols="30" rows="20"></textarea>

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: left">
                            <button type="submit" class="btn btn-ctu">Gửi bài lên diễn đàn</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-1"></div>
        <!-- Blog Sidebar Column -->
        {{-- <aside class="col-md-3 sidebar-padding ben-phai">
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
        </aside> --}}
    </div>

@endsection
@push('script')
<script>

</script>
@endpush
