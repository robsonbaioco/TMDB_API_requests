<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class TmdbController extends Controller{

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.themoviedb.org/3/']);
    }

    public function index(){
        $data = array();

        $data['genres']     = $this->getGenres();
        $data['menuGenres'] = $this->menuGenres();

        //get trend movies
        $target           = 'movie/popular';
        $endpoint         = $target.'?api_key='.env("API_KEY").'&language=pt-BR';
        $data['response'] = getBodyResponse($this->client->get($endpoint));

        //sort alphabetically
        foreach ($data['response']['results'] as $result) {
            $filmes[$result['title']] =  $result;
        }
        ksort($filmes);
        $data['response']['results'] = $filmes;

        $data['title']    = 'Filmes Mais Populares';
        $data['img_load'] = 'https://image.tmdb.org/t/p/w300';

        return view('index', $data);
    }


    public function show($id){
        $data = array();

        $target           = 'movie/'.$id;
        $endpoint         = $target.'?api_key='.env("API_KEY").'&language=pt-BR';
        $data['filme']    = getBodyResponse($this->client->get($endpoint));
        $data['genres']   = $this->getGenres();
        $data['img_load'] = 'https://image.tmdb.org/t/p/w300';
        $data['title']    = $data['filme']['title'];

        return view('show', $data);
    }


    public function search(Request $request){

        $data             = array();
        $query            = $request->toArray()['query'];
        $target           = 'search/movie';
        $data['genres']   = $this->getGenres();
        $endpoint         = $target.'?api_key='.env("API_KEY").'&query='.$query.'&language=pt-BR';
        $data['response'] = getBodyResponse($this->client->get($endpoint));

        //sort alphabetically
        foreach ($data['response']['results'] as $result) {
            $filmes[$result['title']] =  $result;
        }
        ksort($filmes);
        $data['response']['results'] = $filmes;

        $data['title']    = 'Busca por: '.$query;
        $data['img_load'] = 'https://image.tmdb.org/t/p/w300';

        return view('search', $data);
    }


    public function genre($id){

        $data = array();

        $data['genres']     = $this->getGenres();
        $data['menuGenres'] = $this->menuGenres();
        $target             = 'discover/movie';
        $endpoint           = $target.'?api_key='.env("API_KEY").'&language=pt-BR&with_genres='.$id;
        $data['response']   = getBodyResponse($this->client->get($endpoint));

        //sort alphabetically
        foreach ($data['response']['results'] as $result) {
            $filmes[$result['title']] =  $result;
        }
        ksort($filmes);
        $data['response']['results'] = $filmes;

        $data['title']    = 'Filmes de '.$data['genres'][$id];
        $data['img_load'] = 'https://image.tmdb.org/t/p/w300';

        return view('genre', $data);
    }

    public function getGenres(){
        $target    = 'genre/movie/list';
        $endpoint  = $target.'?api_key='.env("API_KEY").'&language=pt-BR';
        $genreList = getBodyResponse($this->client->get($endpoint));
        foreach ($genreList['genres'] as  $genre) {
            $data[$genre['id']] = $genre['name'];
        }

        return $data;
    }

    public function menuGenres(){
        $target    = 'genre/movie/list';
        $endpoint  = $target.'?api_key='.env("API_KEY").'&language=pt-BR';

        return getBodyResponse($this->client->get($endpoint));
    }


}
