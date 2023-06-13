@extends('master')

@section('header-intro')
    <h2>{{ $post->title }}</h2>
    <p>Autor: {{ $post->user->fullName }} - {{ $post->comments->count() }} Comentários</p>
@endsection

@section('main')
    <div id="content-post">
        <p>{{ $post->content }}</p>
    </div>

    <hr>

    @if (auth()->check())

    @if (session()->has('error_create_comment'))
        <span>{{ session()->get('error_create_comment') }}</span>
    @endif
        <div class="text-center">
            {{ $errors->first('comment') }}
            <form action="{{ route('comment', $post->id) }}" method="post">
                @csrf
                {{-- <input type="hidden" name="post_id" value="{{ $post->id }}"> --}}
                <textarea name="comment" id="" cols="30" rows="10"></textarea> <br />
                <button type="submit">Comentar</button>
            </form>
        </div>
    @endif

    <ul id="comments">
        @forelse ($post->comments as $comment)
            <li>{{ $comment->comment }} - Autor: {{ $comment->user->fullName }} |
                <!-- Se meu id de sessão, for igual ao id do autor do comentário, aparece a opção de deletar -->
                @if (auth()->check() && auth()->user()->id === $comment->user->id)
                    <a href="{{ route('comment.destroy', $comment->id) }}">Deletar</a>
            </li>
        @endif

    @empty
        <li>Nenhum comentário disponivel.</li>
        @endforelse
    </ul>
@endsection
