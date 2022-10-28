@extends('Page::main')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>{{ trans('Page::pages.title') . ' test' }}</strong>
        </div>

        <div class="card-body">
            <ul>
                @foreach ($pages as $page)
                    <li>
                        {{$page->title}}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="card-footer">
        </div>
    </div>

@endsection
