<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
    <style>
        /* Bordered form */
        form {
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=email], input[type=password], input[type=text] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<form action="/login" method="post">
    @csrf
    <div class="imgcontainer">
        <img src="{{ asset('img_avatar2.png') }}" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required autofocus>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="">password?</a></span>
    </div>
</form>


<form action="/register" method="post">
    @csrf
    <!-- Container chứa hình ảnh đại diện -->
    <div class="imgcontainer">
        <img src="{{ asset('img_avatar2.png') }}" alt="Avatar" class="avatar">
    </div>

    <!-- Container chính chứa các field đăng ký -->
    <div class="container">
        <!-- Field nhập tên -->
        <label for="name"><b>Name</b></label>
        <input type="text" placeholder="Enter Name" name="name" required autofocus>

        <!-- Field nhập email -->
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <!-- Field nhập mật khẩu -->
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <!-- Field xác nhận mật khẩu -->
        <label for="password_confirmation"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="password_confirmation" required>

        <!-- Nút submit chuyển đổi thành "Register" -->
        <button type="submit">Register</button>
    </div>

    <!-- Container phụ chứa các thao tác khác -->
    <div class="container" style="background-color:#f1f1f1">
        <!-- Nút hủy bỏ -->
        <button type="button" class="cancelbtn">Cancel</button>
    </div>
</form>

</body>
</html>