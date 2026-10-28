<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--画面遷移-->
    <a href="{{url('/quiz6')}}">クイズ6の画面にurl関数で移動する</a>
    <br><br>
    <a href="{{route('quiz6_test')}}">クイズ6の画面にroute関数で移動する</a>
    <br><br>
    <a href="{{url('/quiz9', ['id' => $quiz->id])}}">クイズ9の画面にurl関数で移動する</a>
    <br><br>
    <a href="{{route('quiz9', $quiz->id)}}">クイズ9の画面にroute関数で移動する</a>
    <br><br>
    <form action="{{url('/quiz9', $quiz->id)}}" method="post">
        @csrf
        <input type="text" name="id">
        <button type="submit">送信ボタン</button>
    </form>
</body>

</html>