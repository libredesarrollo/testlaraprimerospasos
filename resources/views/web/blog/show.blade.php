@extends('web.layout')

@section('content')
    <x-web.blog.post.detail :post="$post"/>
@endsection
