@extends('layouts.app')
@section('content')
    <div class="w-full flex h-full">
        <div class="w-1/6 sm:hidden bg-gray-900 text-white text-center">
            <a href={{route('editor')}}>
            <div class="w-full py-8 bg-black hover:text-black hover:bg-gray-500 trans-bg">
                Editor
            </div>
            </a>
            <a href={{route('create')}}>
            <div class="w-full py-8 bg-black hover:text-black hover:bg-gray-500 trans-bg">
                Create
            </div>
            </a>
        </div>
        <div class="w-5/6 sm:w-full">
            @include('partials.editor')
        </div>
    </div>

    @push('head')
        @javascript('postEditor', route('write'))
        @javascript('chapters', route('chapterWithCourseID'))
        @javascript('pages', route('pageWithChapterID'))
        @javascript('pageSingle', route('pageSingle'))
        <script src={{ asset('js/editor.js') }} type="module"></script>
    @endpush
@endsection
