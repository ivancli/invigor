<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 8/06/2016
 * Time: 11:46 PM
 */
?>
@extends('layout.basic')
@section('title')
    Product - Detail Page
@stop

@section('link')
@stop

@section('content')
    {{-- create product form --}}
    <div class="row padding-top-bottom-10">
        <div class="col-sm-6 col-sm-offset-3">
            <img src="data:image/jpeg;base64,{!! $product->picture !!}" width="100%" alt="">

            <table class="table table-bordered table-hover table-striped table-condensed">
                <tbody>
                <tr>
                    <th>Product name</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>Product price</th>
                    <td>${{$product->price}}</td>
                </tr>
                <tr>
                    <th>Product description</th>
                    <td>{{$product->description}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 text-center">
            <a href="{{url('/')}}" class="btn btn-primary">Show List</a>
            <a href="{{url('product/'. $product->id . '/edit')}}" class="btn btn-primary">Edit</a>
            {{ Form::open(array('route' => array('product.destroy', $product['id']), 'method' => 'delete', 'class'=>'inline-block')) }}
            {!! Form::submit('Delete', ["class"=>"btn btn-danger", "href"=>"#"]) !!}
            {{ Form::close() }}
        </div>
    </div>
@stop

@section('script')

@stop
