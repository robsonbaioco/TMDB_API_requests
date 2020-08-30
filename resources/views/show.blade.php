@extends('layouts.base')
@section('content')
    <h1>{{ $title }}</h1>
    <h3>Título Original: {{ $filme['original_title'] }}</h3>
    <div class="media p-3">
        <img src="{{ $img_load.$filme['poster_path'] }}" class="mr-3" alt="{{ $filme['title'] }}">
        <div class="media-body">
            <h5 class="mt-0"><a href="{{ url('show/'.$filme['id']) }}">{{ $filme['title'] }}</a></h5>
            <div class="p-3">
                {{ $filme['overview'] }}
                <div class="row">
                    <div class="col p-2">
                        Data de lançamento:
                        {{ date("d/m/Y", strtotime($filme['release_date'])) }}
                    </div>
                    <div class="col p-2">
                        Gêneros:
                        <ul>
                            @foreach ($filme['genres'] as $genre)
                            <li>{{ $genre['name'] }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col p-3">
                        Produtoras Envolvidas:

                            @foreach ($filme['production_companies'] as $company)
                            <div class="media">
                                @if (is_null($company['logo_path']))
                                    <h5 class="mt-0">{{ $company['name'] }}</h5>
                                @else
                                    <img src="{{ $img_load.$company['logo_path'] }}" class="mr-3" alt="{{ $company['name'] }}">
                                @endif
                              </div>
                            @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col">

                    </div>
                </div>
            </div>
           <br>
        </div>
    </div>
@endsection
