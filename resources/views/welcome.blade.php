@extends('layout')

@section('content')
    {{-- hero section --}}
    @include('partials._hero')
    {{-- end hero section --}}
    @include('partials._search')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach ($listings as $listing)
            <x-listing-card :listing="$listing" />
        @endforeach
    </div>
    <div class="p-5">
        {{ $listings->links() }}
    </div>
@endsection
