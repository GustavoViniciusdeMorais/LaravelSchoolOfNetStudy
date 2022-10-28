@extends('Page::main')

@section('content')

    <div class="card">
        <div class="card-header">
            <strong>Pages</strong>
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
