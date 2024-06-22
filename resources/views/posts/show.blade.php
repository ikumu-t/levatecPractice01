<x-app-layout>
    <x-slot name="header">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
    </x-slot>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <small>{{ $post->user->name }}</small>
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>