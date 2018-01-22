@extends('app.layout')

@section('title', 'Profile')

@push('styles')

@endpush

@section('content')
    <div id="app"></div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endpush