@extends('common.main')
@section('content')
    <p>ID: {{ $quiz->id }}</p>
    <p>名前: {{ $quiz->name }}</p>
    <p>種別ID: {{ $quiz->type }}</p>
    <p>作成日: {{ $quiz->created_at }}</p>
    <p>更新日: {{ $quiz->updated_at }}</p>
@endsection