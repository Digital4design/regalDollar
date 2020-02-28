@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection
