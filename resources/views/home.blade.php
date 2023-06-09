@extends('master')

@section('header-intro')

  <h2>Buscar Post</h2>
   <form action="{{ route('home') }}" method="get">
    <input type="text" name="search" id="" placeholder="O que deseja buscar?" value="{{ request()->input('search') ?? ''}}">
    <button type="submit" class="btn btn-primary">Buscar</button>
   </form>

@endsection

@section('main')
    
<div class="container">
    <!--Section: Content-->
    <section class="text-center">
      @if (request()->input('search'))
      <h4 class="mb-5"><strong>Busca por: {{ request()->input('search') }} ({{ $posts->total() }}) </strong></h4>
      @else
      <h4 class="mb-5"><strong>Últimos Posts</strong></h4>
      @endif
      

      <div class="row">
        @forelse ($posts as $post)
          <div class="col-4">
            <div class="card">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{ $post->thumb }}" class="img-fluid" />
                <a href="{{ route('post', $post->slug) }}">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body">
                <h5 class="card-title"> {{$post->title}}  </h5>
                <p class="card-text">
                  {{ Str::limit($post->content, 80, '...')}}
                </p>
                <p>Autor: {{ $post->user->fullName }} - {{ $post->comments->count() }} Comentários </p>
                <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leia Mais</a>
              </div>
            </div>
          </div>              
        @empty
          <h2>Não há posts</h2>              
        @endforelse

        @if(request()->input('search'))
            {{$posts->appends(['search' => request()->input('search')])->links()}}
        @endif


    </section>   
  </div>

@endsection

