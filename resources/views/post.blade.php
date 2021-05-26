@extends('rapidez::layouts.app')

@section('title', $post->meta_title ?: $post->name)
@section('description', $post->meta_description)

@section('content')
    <div class="container mx-auto mb-5">
        <img src="{{ config('rapidez.media_url') }}/mageplaza/blog/post/{{ $post->image }}" alt="">

        <div class="my-5 prose prose-green max-w-none">
            {!! $post->post_content !!}
        </div>

        <div class="text-sm text-gray-400">
            @lang('Published at :date', [
                'date' => $post->publish_date->format(Rapidez::config('blog/general/date_type', 'F j, Y'))
            ])
        </div>
    </div>
@endsection
