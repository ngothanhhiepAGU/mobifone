@extends('layouts.frontend')

@section('content')

@include('frontend.home.banner')
@include('frontend.home.danhmuc')
<!--@include('frontend.home.bestsell')-->
<!--@include('frontend.home.time')-->
@include('frontend.home.danhmucsanpham')
@include('frontend.home.trangtin')
@include('frontend.home.insta')
@include('frontend.home.reviews')

@endsection