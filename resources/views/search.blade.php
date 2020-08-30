@extends('layouts.base')
@section('content')
    <h1>{{ $title }}</h1>
        @foreach ($response['results'] as $filme)
            <div class="media p-3">
                <img src="{{ $img_load.$filme['poster_path'] }}" class="mr-3" alt="{{ $filme['title'] }}">
                <div class="media-body">
                    <h5 class="mt-0"><a href="{{ url('show/'.$filme['id']) }}">{{ $filme['title'] }}</a></h5>
                    <div class="p-3">
                        {{ $filme['overview'] }}
                        <div class="row">
                            <div class="col p-3">
                                Data de lançamento:
                                @if (isset($filme['release_date']))
                                    {{ date("d/m/Y", strtotime($filme['release_date'])) }}
                                @else
                                    --/--/----
                                @endif
                            </div>
                            <div class="col p-3">
                                Gêneros:
                                <ul>
                                    @foreach ($filme['genre_ids'] as $genreId)
                                    <li>{{ $genres[$genreId] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                   <br>
                </div>
            </div>
        @endforeach

@endsection
