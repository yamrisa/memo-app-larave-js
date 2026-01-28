<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>メモ一覧</title>
</head>
<body>
    <h1>メモ一覧</h1>

    <ul>
        @foreach ($memos as $memo)
            <li>{{ $memo->content }}</li>
        @endforeach
    </ul>
</body>
</html>
