@extends('common.main')
@section('content')
    <h1>クイズ更新画面</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('quiz12/update/' . $quiz->id) }}" method="post">
        @csrf
        <p><input type="text" name="name" value="{{ $quiz->name }}"></p>
        <p><input type="text" name="type" value="{{ $quiz->type }}"></p>
        <p><button type="submit">更新ボタン</button></p>
    </form>
@endsection