<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            display: flex;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.2);
            max-width: 900px;
            width: 100%;
        }
        .left-panel {
            flex: 1;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            padding: 40px;
        }
        .left-panel h2 {
            font-size: 2rem;
            font-weight: bold;
        }
        .right-panel {
            flex: 1;
            padding: 50px;
        }
        .right-panel h3 {
            font-weight: bold;
            color: #333;
        }
        .btn-login {
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 8px;
            padding: 10px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background: linear-gradient(90deg, #764ba2, #667eea);
        }
        .error-msg {
            color: red;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Left Panel -->
    <div class="left-panel">
        <div>
            <h2>Hello! Good Morning 🌅</h2>
            <p>Login to your account to get the full experience.</p>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
        <h3>Login your account</h3>

        <!-- Error Message -->
        @if(session('error'))
            <p class="error-msg">{{ session('error') }}</p>
        @endif

<form action="{{ route('login.action') }}" method="POST">
    @csrf
    <div class="mb-3">
 <label class="form-label">Username / Email / Phone</label>
<input type="text" name="login" class="form-control" required>

    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-login w-100">Login</button>
</form>


        <div class="mt-3 text-center">
            <a href="/newuser" class="text-muted">Create Account</a>
        </div>
    </div>
</div>

</body>
</html>
 {{-- <div class="mb-3 text-end">
          
 <p class="mb-1">👉 Username: <b>admin</b></p>
                            <p class="mb-0">👉 Password: <b>admin123456</b></p>
            </div> --}}
