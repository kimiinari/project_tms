@extends('layouts.master')

@section('title', __('main.all_categories'))

@section('content')

    @foreach($categories as $category)
        <div class="panel">
            <div class="container">
                <a href="{{ route('category', $category->code) }}">
                    <img src="{{ asset('images/categories/' . $category->code . '.jpg') }}">
                    <h2>{{ $category->__('name') }}</h2>
                </a>
                <p>
                    {{ $category->__('description') }}
                </p>
            </div>
        </div>
    @endforeach
@endsection
