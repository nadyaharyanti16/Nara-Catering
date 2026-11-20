
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | NARA CATERING</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: #f8f3ed;
            font-family: 'DM Sans', sans-serif;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(80, 50, 30, 0.09);
        }

        .brand {
            text-align: center;
            margin-bottom: 30px;
        }

        .brand img {
            width: 110px;
            height: 110px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .brand h1 {
            font-family: 'Playfair Display', serif;
            color: #75452f;
            font-size: 28px;
        }

        .brand p {
            color: #927d6e;
            font-size: 13px;
            margin-top: 5px;
        }

        .login-title {
            margin-bottom: 22px;
        }

        .login-title h2 {
            color: #493326;
            font-size: 21px;
            margin-bottom: 6px;
        }

        .login-title p {
            color: #92847a;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #574337;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #e5dcd3;
            border-radius: 9px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #a66b4c;
        }

        .login-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #87563d;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 8px;
        }

        .login-button:hover {
            background: #70432e;
        }

        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 7px;
        }

        .success {
            padding: 11px;
            background: #eaf6ec;
            color: #28743a;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            color: #a39488;
            font-size: 12px;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 28px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <div class="brand">
            <img src="{{ asset('views/publik/images/logo.png') }}" alt="Logo NARA CATERING">
            <h1>NARA CATERING</h1>
            <p>Rasa Lezat, Penuh Cerita.</p>
        </div>

        <div class="login-title">
            <h2>Login Admin</h2>
            <p>Silakan masuk untuk mengelola website NARA CATERING.</p>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email admin"
                    required
                >

                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="login-button">
                Masuk
            </button>
        </form>

        <div class="footer">
            © {{ date('Y') }} NARA CATERING
        </div>

    </div>

</body>
</html>
