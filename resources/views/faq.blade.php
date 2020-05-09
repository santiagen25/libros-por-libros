@extends('template')
@php
    if(session_status() == PHP_SESSION_NONE) session_start();
@endphp
@if(isset($_SESSION["email"]))
    @include('navUser')
@endif


@section('title')
    FAQ
@endsection

@section('header')

@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div class="enmarcarCuadrado container">
            <div class="enmarcarNoticia row py-3">
                
            </div>
        </div>
    </div>
@endsection