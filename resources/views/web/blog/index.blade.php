@extends('web.layout')

@section('content')
    <x-web.blog.posts :posts="$posts">
       
            <h1>Posts post</h1>
        
    </x-web.blog.posts>
@endsection
