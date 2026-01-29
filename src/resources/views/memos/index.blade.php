<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>メモ一覧</title>
</head>
<body>

    <h2>新しいメモ</h2>

    <input type="text" id="memo-input">
    <button id="add-btn">追加</button>

    <ul id="memo-list">
        @foreach ($memos as $memo)
            <li>{{ $memo->content }}</li>
        @endforeach
    </ul>

</body>
</html>

<script>
    document.getElementById('add-btn').addEventListener('click', () => {
        const content = document.getElementById('memo-input').value;

        fetch('/memos', {   //非同期通信、/memo(URL)にmethodとheadersをサーバにHTTPリクエスト
            method: 'POST',
            headers: {  //封筒、HTTPリクエストヘッダー、どういう形式で送るか設定してる、MWが処理・分岐
                'Content-Type': 'application/json', //JSON形式の宣言$request->json();と$request->input('content');がLaravel側で使える
                'X-CSRF-TOKEN': '{{ csrf_token() }}'    //証明書、ないと419エラー、SPA / fetch / axios では必須
            },
            body: JSON.stringify({ content })   //手紙の本文、文字列に変換（シリアライズ）
        })
        .then(res => res.json())    //結果を受け取る、レスポンス本文をJSONとしてパース

        //dataはAPIレスポンスの中身（JSON）、Laravelの response()->json() と対になっている
        //API成功時のUI反映処理
        .then(data => {
            const li = document.createElement('li');    //HTMLの <li> タグを新しく作る、DOMノードの作成
            li.textContent = data.content;  //<li> の中にメモ内容を書く、HTMLとして解釈されない、XSS対策的に安全
            document.getElementById('memo-list').appendChild(li);   //<ul id="memo-list"> の最後(appendChild)に追加する
            document.getElementById('memo-input').value = '';   //フォーム状態のクリア
        });

    });
</script>
