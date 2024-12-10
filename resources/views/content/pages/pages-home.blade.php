@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    <h4>Home Page</h4>
    @if (Helper::getProfileById()->rs_name == 'Super Admin')
        <p>{{ Helper::getProfileById()->rs_name }}</p>
    @else
        <p>{{ Helper::getProfileById()->rs_name }}/{{ Helper::getProfileById()->ra_name }}/{{ Helper::getProfileById()->role_name }}
        </p>
    @endif

    <p>For more layout options refer <a
            href="{{ config('variables.documentation') ? config('variables.documentation') . '/laravel-introduction.html' : '#' }}"
            target="_blank" rel="noopener noreferrer">documentation</a>.</p>
@endsection
