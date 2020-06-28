<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('forum')}}"><img src="{{asset('client/images/logo-ctu.png')}}"
                    alt="company logo" /></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right custom-menu">
                <li @if (Request::segment(1)=='hoc-tap' ) class='active' @endif>
                    <a href="{{route('forum')}}">Học tập</a></li>
                <li @if (Request::segment(1)=='chia-se' ) class='active' @endif>
                    <a href="{{route('share')}}">Chia sẻ</a></li>
                <li @if (Request::segment(1)=='cau-lac-bo' ) class='active' @endif>
                    <a href="{{route('club')}}">Câu lạc bộ</a></li>
                <li @if (Request::segment(1)=='doan-hoi' ) class='active' @endif>
                    <a href="{{route('union')}}">Đoàn, Hội</a></li>
                <li class="nav-item dropdown @if (Request::segment(1)=='tai-khoan') active @endif">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tài khoản
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Tài liệu</a><br>
                        <a class="dropdown-item" href="#">Lượt đánh giá</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>