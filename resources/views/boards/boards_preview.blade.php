<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf8">
        <title>掲示板 Sample</title>
    </head>

    <body>
        <div style="text-align:center">
            <h1>掲示板</h1>
            <a href="boards_index.blade.php">一覧(新規投稿)</a>❘
                <a href="">ワード検索</a>❘
                <a href="">使い方</a>❘
                <a href="">携帯へURLを送る</a>❘
                <a href="">管理</a>
            <form method="POST" action="{{ route('boards.complete') }}" enctype="multipart/form-data">
                @csrf
                <table border="0" frame="box" rulues="none" border="black" width="600" align="center">
                    <tr>
                        <td nowrap>名前</td>
                        <td>{{ $boards['name'] }}</td>
                        <input type="hidden" name="name" value="{{ $boards['name'] }}">
                    </tr>
                    <tr>
                        <td nowrap>件名</td>
                        <td>{{ $boards['subject'] }}</td>
                        <input type="hidden" name="subject" value="{{ $boards['subject'] }}">                </tr>
                    <tr>
                        <td nowrap>メッセージ</td>
                        <td>
                        <td>{{!! nl2br($boards['message']) !!}}</td>
                        <input type="hidden" name="message" value="{{ $boards['message'] }}">
                    </tr>
                    <tr>
                        <td nowrap>画像</td>
                        <td>{{ $boards['image_path'] }}</td>
                        @isset($image_path)
                        <img src="{{ Storage::url($image_path) }}" alt="" height="250" weight="100"> 
                        <div>画像をアップロードできます。</div>
                        @else
                        <div>画像は選択されていません。</div>
                        <input type="hidden" name="image_path" value="{{ $image_path }}">
                        @endisset
                    </tr>
                    <tr>
                        <td nowrap>メールアドレス</td>
                        <td>{{ $boards['email'] }}</td>
                        <input type="hidden" name="email" value="{{ $boards['email'] }}">
                    </tr>
                    <tr>
                        <td nowrap>URL</td>
                        <td>{{ $boards['name'] }}</td>
                        <input type="hidden" name="url" value="{{ $boards['url'] }}">
                    </tr>
                    <tr>
                        <td nowrap>編集/削除キー</td>
                        <td>{{ $boards['delete_key'] }}</td>
                        <input type="hidden" name="delete_key" value="{{ $boards['delete_key'] }}">
                    </tr>
                    <tr>
                        <td>
                            <button type="button" onclick=history.back()>戻って修正する</button>
                            <input class="button" onclick="location.href='./com.php'" type="submit" value="このまま投稿する">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>