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
                <li><a href="{{ route('chon-hoc-ky') }}">Tài liệu cá nhân</a></li>
                <?php if(\Auth::check()):?>
                <li @if (Request::segment(1)=='hoc-tap' ) class='active' @endif>
                    <a href="{{route('forum')}}">Học tập</a></li>
                <li @if (Request::segment(1)=='chia-se' ) class='active' @endif>
                    <a href="{{route('share')}}">Chia sẻ</a></li>
                <li @if (Request::segment(1)=='cau-lac-bo' ) class='active' @endif>
                    <a href="{{route('club')}}">Câu lạc bộ</a></li>
                <li @if (Request::segment(1)=='doan-hoi' ) class='active' @endif>
                    <a href="{{route('union')}}">Đoàn, Hội</a></li>
                <li class="nav-item dropdown @if (Request::segment(1)=='tai-khoan') active @endif">
                    <!-- Button to Open the Modal -->
                    <a href="{{ route('Info',Auth::guard('student')->user()->stu_code.'.'.Str::slug(Auth::guard('student')->user()->stu_name, '-')) }}"
                        class="nav-link">
                        Chào,
                        {{ Auth::guard('student')->user()->stu_name }}
                    </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" style="color: red;">Đăng xuất</a>
        </li>
        <?php elseif(Auth::guard('admin')->check()):?>
        {{-- <li @if (Request::segment(1)=='hoc-tap' ) class='active' @endif>
            <a href="{{route('forum')}}">Học tập</a></li> --}}
        {{-- <li @if (Request::segment(1)=='chia-se' ) class='active' @endif>
            <a href="{{route('share')}}">Chia sẻ</a></li> --}}
        <li @if (Request::segment(1)=='cau-lac-bo' ) class='active' @endif>
            <a href="{{route('club.admin')}}">Câu lạc bộ</a></li>
        <?php endif?> </ul>
    </div>
    </div>
</nav>
