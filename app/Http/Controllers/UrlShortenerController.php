<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\UrlShortener;
use Illuminate\Validation\Rule;

class UrlShortenerController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store()
    {
        $attributes = request()->validate([
            'url' => ['required', 'URL']
        ]);

        if($urlBind = UrlShortener::where('url', $attributes['url'])->first()){
            return view('index', [
                'url' => $urlBind
            ]);
        }

        $attributes['short_url'] = Str::random(5);

        $urlBind = UrlShortener::create($attributes);

        return view('index', [
            'url' => $urlBind,
        ]);
    }

    public function show($resolveUrl)
    {  
        if($url = UrlShortener::where('short_url', $resolveUrl)->first()){
            return redirect($url->url);
        }
        
        return redirect('/');
    }
}
