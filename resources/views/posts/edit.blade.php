<x-app-layout>
    <x-slot name="header">
        <h1 class="title">編集画面</h1>
    </x-slot>
        <div class="content">
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('PUT')
                <div crass='content__title'>
                    <h2>タイトル</h2>
                    <input type='text' name='post[title]' value="{{ $post->title }}">
                </div>
                <div class='content__body'>
                    <h2>本文</h2>
                    <textarea name='post[body]'>{{ $post->body }}</textarea>
                </div>
                <input type="submit" value="保存">
            </form>
        </div>
</x-app-layout>