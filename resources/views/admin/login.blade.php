<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RS Madani Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #13203B 0%, #0a1528 50%, #1a0a14 100%);
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(255,53,92,0.08) 0%, transparent 70%);
            border-radius: 50%;
        }
        body::after {
            content: '';
            position: absolute;
            bottom: -40%;
            left: -20%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,53,92,0.05) 0%, transparent 70%);
            border-radius: 50%;
        }
        .login-card {
            background: rgba(255,255,255,0.98);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 2.5rem 2rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.4);
            position: relative;
            z-index: 1;
        }
        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .logo .icon {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, #FF355C, #e62e52);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 24px rgba(255,53,92,0.3);
        }
        .logo h1 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #13203B;
            letter-spacing: -0.5px;
        }
        .logo p {
            color: #6b7280;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.4rem;
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
            outline: none;
            background: #f9fafb;
        }
        .form-group input:focus {
            border-color: #FF355C;
            box-shadow: 0 0 0 4px rgba(255,53,92,0.1);
            background: #fff;
        }
        .form-group input::placeholder {
            color: #9ca3af;
        }
        .btn-submit {
            width: 100%;
            padding: 0.85rem;
            background: linear-gradient(135deg, #FF355C, #e62e52);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 0.95rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 4px 16px rgba(255,53,92,0.3);
        }
        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(255,53,92,0.4);
        }
        .btn-submit:active {
            transform: translateY(0);
        }
        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
        }
        .error-box ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .error-box ul li::before {
            content: "• ";
            color: #ef4444;
        }
        .footer-text {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.75rem;
            color: #9ca3af;
        }
        .footer-text a {
            color: #13203B;
            text-decoration: none;
            font-weight: 500;
        }
        .footer-text a:hover {
            color: #FF355C;
        }
        @media (max-width: 480px) {
            .login-card {
                padding: 2rem 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="logo">
            <div class="icon">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                </svg>
            </div>
            <h1>RS Madani</h1>
            <p>Panel Administrator</p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="error-box">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="admin@rsmadani.com" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn-submit">Masuk</button>
        </form>

        <div class="footer-text">
            <a href="{{ url('/') }}">&larr; Kembali ke Website</a>
        </div>
    </div>
</body>
</html>
