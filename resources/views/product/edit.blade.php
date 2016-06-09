<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 9/06/2016
 * Time: 12:39 AM
 */
?>
@extends('layout.basic')
@section('title')
    Product - Edit Page
@stop

@section('link')
@stop

@section('content')
    {{-- create product form --}}
    <div class="row padding-top-bottom-10">
        <div class="col-sm-4 col-sm-offset-4">
            <img src="data:image/jpeg;base64,{!! $product->picture !!}" width="100%" alt="">
        </div>
    </div>
    <div class="row padding-top-bottom-10">
        <div class="col-sm-12">
            {{ Form::model($product, array('route' => array('product.update', $product->id), 'method' => 'patch', 'class'=>'form-horizontal', 'files' => true)) }}
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <ul class="error-message text-danger well">
                            @foreach ($errors->all() as $error)
                                <li>
                                    <i class="glyphicon glyphicon-remove-sign"></i>&nbsp;{{ $error }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            @include('product.partial_form.product')

            <div class="row">
                <div class="col-sm-12 text-center">
                    {!! Form::submit('Edit Product', ["class"=>"btn btn-success", "href"=>"#"]) !!}
                    <a href="{{url('/')}}" class="btn btn-warning">Cancel</a>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('script')

@stop
