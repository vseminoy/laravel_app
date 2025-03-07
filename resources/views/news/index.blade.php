@php
use App\Models\News;

/**
 * @var ?News $news
 * @var ?string $error
 */
@endphp

@extends('layouts.app')

@section('title', 'Категории')

@section('sidebar')
    @parent

@endsection

@section('content')
    @if($news)
        <div class="card" style="width: 80%;">
            <div class="card-body">
                <h5 class="card-title">{{$news->newsTitle}} ({{$news->user->name}}) </h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{$news->created_at}}</h6>
                <p class="card-text">{{$news->message}}</p>
                @foreach ($news->categories as $category)
                    <a href="{{route('news_categories.show',[$category->id])}}" class="card-link">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
    @else
        Новость не найдена
    @endif
@endsection
