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
</head>

<body>
    <section class="w3l-form-36">
        <div class="form-36-mian section-gap">
            <div class="wrapper">
                <div class="form-inner-cont">
                    <h3>Đăng nhập</h3>
                    <form action="#" method="post" class="signin-form">
                        <div class="form-input">
                            <span class="fa fa-envelope-o" aria-hidden="true"></span> <input type="email" name="email"
                                placeholder="MSSV" required />
                        </div>
                        <div class="form-input">
                            <span class="fa fa-key" aria-hidden="true"></span> <input type="password" name="password"
                                placeholder="Mật khẩu" required />
                        </div>
                        <div class="login-remember d-grid">
                            <label class="check-remaind">
                                <input type="checkbox">
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