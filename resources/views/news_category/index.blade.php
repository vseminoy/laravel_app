@php
    use App\Models\News;use App\Models\NewsCategory;

    /**
     * @var NewsCategory[] $categories
     * @var News[] $news
     */
@endphp

@extends('layouts.app')

@section('title', 'Категории')

@section('sidebar')
    @parent

    @php $current=1; @endphp
    @foreach ($categories as $category)
        @for ($i = $current; $i < $category->depth; $i++)
            <ul>
        @endfor
        @for ($i = $category->depth; $i < $current; $i++)
            </ul>
        @endfor
        @php $current=$category->depth; @endphp
        <li class="nav-item">
            <a href="{{ route('news_categories.show',[$category->id]) }}" class="nav-link">{{ $category->name }} ({{$category->user->name}}) </a>
        </li>
    @endforeach
    @for ($i = 1; $i < $current; $i++)
        </ul>
    @endfor
@endsection

@section('content')
    @isset($news)
        <ul class="list-group">
        @foreach ($news as $oneNews)
            <li class="list-group-item"  >
                <a href="{{route('news.show',[$oneNews->id])}}" class="nav-link">{{$oneNews->name}} ({{$oneNews->user->name}})</a>
            </li>
        @endforeach
        </ul>
    @endif
@endsection
