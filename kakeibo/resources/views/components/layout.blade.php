<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>家計簿</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <h1>家計簿</h1>
    <nav>
        <a href="{{ route('transactions.index') }}">一覧</a>
        <a href="{{ route('transactions.create') }}">取引を追加</a>
        @if (session('message'))
            <p class="message">{{ session('message') }}</p>
        @endif
    </nav>

    {{ $slot }}
</body>
</html>
