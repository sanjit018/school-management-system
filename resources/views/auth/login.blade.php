<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Glass Login</title>

<style>
*{
    box-sizing:border-box;
    font-family: "Segoe UI", sans-serif;
}

body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:
        linear-gradient(rgba(0,0,0,.3), rgba(0,0,0,.3)),
        url("/mnt/data/SL_100820_36440_08.jpg") center/cover no-repeat;
}

/* Login Card */
.login-card{
    width:90%;
    max-width:380px;
    background:rgba(255,255,255,0.18);
    backdrop-filter:blur(12px);
    border-radius:16px;
    border:2px solid rgba(255,255,255,.4);
    padding:60px 25px 30px;
    position:relative;
}

/* User Icon */
.user-icon{
    width:90px;
    height:90px;
    background:#1f2f0f;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    position:absolute;
    top:-45px;
    left:50%;
    transform:translateX(-50%);
}

.user-icon svg{
    width:45px;
    fill:#fff;
}

/* Input Group */
.input-group{
    display:flex;
    align-items:center;
    background:#ddd;
    border-radius:4px;
    margin-bottom:15px;
    padding:10px;
}

.input-group svg{
    width:18px;
    fill:#555;
    margin-right:10px;
}

.input-group input{
    border:none;
    outline:none;
    width:100%;
    background:transparent;
    font-size:15px;
}

/* Options */
.options{
    display:flex;
    justify-content:space-between;
    align-items:center;
    font-size:13px;
    color:#eaeaea;
    margin:15px 0 25px;
}

.options a{
    color:#eaeaea;
    text-decoration:none;
    opacity:.8;
}

/* Button */
.login-btn{
    width:100%;
    padding:14px;
    border:none;
    background:#1f2f0f;
    color:#fff;
    font-size:16px;
    font-weight:600;
    border-radius:4px;
    cursor:pointer;
    letter-spacing:1px;
}

.login-btn:hover{
    background:#243a12;
}

/* Responsive */
@media(max-width:480px){
    .login-card{
        padding:55px 20px 25px;
    }
}
</style>
</head>

<body>

<div class="login-card">

    <div class="user-icon">
        <svg viewBox="0 0 24 24">
            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8V22h19.2v-2.8c0-3.2-6.4-4.8-9.6-4.8z"/>
        </svg>
    </div>
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="input-group">
        <svg viewBox="0 0 24 24">
            <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12z"/>
        </svg>
        <input type="text" placeholder="Email ID" name="username">
    </div>

    <div class="input-group">
        <svg viewBox="0 0 24 24">
            <path d="M17 8h-1V6a4 4 0 00-8 0v2H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V10a2 2 0 00-2-2zm-6 0V6a2 2 0 114 0v2h-4z"/>
        </svg>
        <input type="password" placeholder="Password" name="password">
    </div>

    <div class="options">
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
        <a href="#">Forgot Password?</a>
    </div>

    <button class="login-btn">LOGIN</button>
</form>

</div>

</body>
</html>
