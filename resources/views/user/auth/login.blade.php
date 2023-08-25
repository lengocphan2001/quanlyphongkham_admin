<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="Login">
        <div class="container">
            <div class="container_center">
                <div class="logo">
                    <img src="../asset/images/Login-image.png" alt="Công ty Cổ phần Đầu tư K&G Việt Nam">
                </div>
                <div class="box">
                    <h1 class="form-title">Đăng nhập</h1>
                    <form action="{{ route('user.postLogin') }}" method="POST" class="form-login">
                        @csrf
                        <div class="form-group">
                            <label for="UserName" class="form-label">Email</label>
                            <div class="group-icon">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" class="group-input" autocomplete="off" placeholder="Tên đăng nhập" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="form-label">Mật khẩu</label>
                            <div class="group-icon">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" class="group-input" autocomplete="off" placeholder="Mật khẩu" name="password">
                            </div>
                        </div>
                        <div class="form-actions d-flex justify-content-end">
                            <button id="btSubmit" type="submit" class="form-btn">
                                Đăng nhập <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="Login-An">
            Copy Phần mềm Công ty cổ phần phần mềm OOS (Phần mềm quản lý nhân sự 25/06/2023)
        </div>
    </div>
</body>
</html>