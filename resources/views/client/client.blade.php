<!DOCTYPE html>
<html lang="en">

@include('client.template.head')
<body data-spy="scroll">
    <div id="app">

        @include('client.template.navbar')
        <!-- Page Content -->
        <section class="container blog">
            @include('client.template.error')
            @yield('breadcrumb')
            @yield('content')

        </section>
        {{-- @include('client.template.footer') --}}
    </div>
    <!-- The Modal -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Thông tin sinh viên</h4>
                </div>
                <div class="modal-body">
                    <h5><b>Họ tên:</b> {{ Auth::guard('student')->user()->stu_name }}</h5>
                    <h5><b>MSSV:</b> {{ Auth::guard('student')->user()->stu_code }}</h5>
                    <h5><b>Ngày sinh:</b> {{ date('d-m-Y',strtotime(Auth::guard('student')->user()->stu_birth)) }}</h5>
                    <img src="{{ asset('') }}client/images/img/avatar.jpg" alt="">
                    <h4><a class="dropdown-item"
                            href="{{ route('Info',Auth::guard('student')->user()->stu_code.'.'.Str::slug(Auth::guard('student')->user()->stu_name, '-')) }}">Thông
                            tin cá nhân</a></h4>
                    <h4><a class="dropdown-item" href="{{ route('chon-hoc-ky') }}">Tài liệu sinh viên</a></h4>
                    <h4><a class="dropdown-item" href="{{ route('chat') }}">Nhóm trò chuyện</a></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">Đóng</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        style="background-color: red; color: white; ">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
    @include('client.template.script')
    <script>
        $(document).ready(function () {
            $('#user-click').click(function (e) {
                $('#app').css("opacity", 0.5);
            });
            $('#close-modal').click(function (e) {
                e.preventDefault();
                $('#app').css("opacity", 1);
            });
        });
    </script>
</body>

</html>