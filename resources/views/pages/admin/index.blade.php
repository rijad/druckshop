@extends('pages/admin/layouts.master')


@section('content')
@include('partials/admin/_card')
@stop 
 
@section('table')
@include('partials/admin/_homeorders')  
@stop  