<!DOCTYPE html>
<html lang="en">

<head>
    <title>CTU - Mạng xã hội sinh viên trường ĐHCT</title>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- logo ctu --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/images/logo-ctu.png')}}" />
    <!-- //Meta tags -->
    <link rel="stylesheet" href="{{asset('login/css/style.css')}}" type="text/css" media="all" /><!-- Style-CSS -->
    <link href="{{asset('login/css/font-awesome.css')}}" rel="stylesheet"><!-- font-awesome-icons -->
    <style>
        .alert {
            color: red;
        }
    </style>
</head>

<body>

    <section class="w3l-form-36">
        <div class="form-36-mian section-gap">
            <div class="wrapper">
                <div class="form-inner-cont">
                    <h3>Đăng nhập</h3>
                    <form action="{{route('login')}}" method="post" class="signin-form">
                        @csrf
                        <div class="form-input">
                            <span class="fa fa-envelope-o" aria-hidden="true"></span>
                            <input type="text" name="code" placeholder="MSSV" required />
                        </div>
                        <div class="form-input">
                            <span class="fa fa-key" aria-hidden="true"></span> <input type="password" name="password"
                                placeholder="Mật khẩu" required />
                        </div>
                        @if($message = Session::get('error'))
                        <br>
                        <div class="alert alert-warning" role="alert">
                            <p>{{$message}}</p>
                            <p class="mb-0"></p>
                        </div>
                        @endif

                        <div class="login-remember d-grid">
                            <label class="check-remaind">
                                <input type="checkbox" name="remember">
                                <span class="checkmark"></span>
                                <p class="remember">Ghi nhớ đăng nhập</p>
                            </label>
                            <button class="btn theme-button">Đăng nhập</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>