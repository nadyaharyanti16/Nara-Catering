
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'NARA CATERING')</title>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #FAF7F2;
            color: #49352B;
        }

        header {
            background: #FFFDF9;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #EDE3D8;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            font-weight: 700;
            color: #75452F;
        }

        nav a {
            text-decoration: none;
            color: #49352B;
            margin-left: 25px;
            font-weight: 600;
        }

        nav a:hover {
            color: #B66D45;
        }

        .container {
            width: 86%;
            max-width: 1200px;
            margin: auto;
        }

        .btn {
            display: inline-block;
            padding: 12px 22px;
            background: #A65F3F;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn:hover {
            background: #81452F;
        }

        footer {
            margin-top: 70px;
            padding: 30px;
            text-align: center;
            background: #49352B;
            color: white;
        }

        @media(max-width: 600px) {
            header {
                padding: 16px 5%;
                flex-wrap: wrap;
                gap: 15px;
            }

            nav a {
                margin-left: 0;
                margin-right: 12px;
                font-size: 13px;
            }

            .container {
                width: 92%;
            }
        }
    </style>

    @stack('styles')
</head>
<body>

    <header>
        <div class="logo">NARA CATERING.</div>

        <nav>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('menu.index') }}">Menu</a>
        </nav>
    </header>

    @yield('content')

    <footer>
        <h3>NARA CATERING</h3>
        <p>Rasa Lezat, Penuh Cerita.</p>
        <p>&copy; {{ date('Y') }} NARA CATERING. All Rights Reserved.</p>
    </footer>

    @stack('scripts')

</body>
</html>
