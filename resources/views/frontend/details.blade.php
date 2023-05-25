@extends('frontend.master')
@section('title','Home page')
@section('stylesheet')
@endsection
@section('content')
<div class="container">
    <h2>{{ $news->news_title }}</h2>
    <i>Dikirim: {{ date('d/m/Y h:i', strtotime($news->created_at)) }}</i>
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php $medias = explode('|', $news->news_medias) ?>
        @if(isset($medias[0]))
            @foreach($medias as $i => $media)
            @php
                $m = \App\Models\Media::findOrFail($media);
            @endphp
            <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
            @endforeach
        @endif
        </ol>

        <!-- Slides -->
        <div class="carousel-inner">
        <?php $medias = explode('|', $news->news_medias) ?>
        @if(isset($medias[0]))
            @foreach($medias as $i => $media)
            @php
                $m = \App\Models\Media::findOrFail($media);
            @endphp
            <div class="item {{ $i == 0 ? 'active' : '' }}">
                <img src="{{ Storage::url($m->media_url) }}" alt="Image 1">
            </div>
            @endforeach
        @endif
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>

    <div>{!! $news->news_description !!}</div>
    {{-- @include('frontend.sidebar',['something']) --}}
</div>
@endsection

@section('scripts')
@endsection
