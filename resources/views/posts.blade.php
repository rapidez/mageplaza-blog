@extends('rapidez::layouts.app')

@section('title', Rapidez::config('blog/seo/meta_title') ?: Rapidez::config('blog/general/name', 'Blog'))
@section('description', Rapidez::config('blog/seo/meta_description'))

@section('content')
    <div class="container mx-auto mb-5">
        <div class="sm:grid sm:gap-3 md:gap-5 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach($posts as $post)
                <a href="{{ route('blogpost', $post->url_key) }}" class="block border rounded p-3 m-3 sm:m-0 hover:border-green-200">
                    <img src="{{ config('rapidez.media_url') }}/mageplaza/blog/post/{{ $post->image }}" alt="" class="max-h-28 mx-auto">
                    <strong class="block">{{ $post->name }}</strong>
                    <div class="text-xs text-gray-400 mb-2">
                        @lang('Published at :date', [
                            'date' => $post->publish_date->format(Rapidez::config('blog/general/date_type', 'F j, Y'))
                        ])
                    </div>
                    <p class="text-gray-700">{{ $post->short_description }}</p>
                </a>
            @endforeach
        </div>
    </div>
@endsection
