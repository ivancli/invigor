<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 8/06/2016
 * Time: 10:16 PM
 */
?>
@extends('layout.basic')
@section('title')
    Product - Create Page
@stop

@section('link')
@stop

@section('content')
    {{-- create product form --}}
    <div class="row padding-top-bottom-10">
        <div class="col-sm-12 text-right">
            {{ Form::open(array('url' => 'product/create', 'method'=>'post')) }}

            {{ Form::close() }}
        </div>
    </div>
@stop

@section('script')

@stop