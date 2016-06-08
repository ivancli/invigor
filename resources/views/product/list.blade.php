<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 8/06/2016
 * Time: 9:13 PM
 */
?>
@extends('layout.basic')
@section('title')
    Product - List Page
@stop

@section('link')
@stop

@section('content')
    {{-- create product link --}}
    <div class="row padding-top-bottom-10">
        <div class="col-sm-12 text-right">
            <a href="{{url('/product/create')}}" class="btn btn-primary">Create a new product</a>
        </div>
    </div>
    {{-- product list --}}
    <div class="row padding-top-bottom-10">
        <div class="col-sm-12">
            <table class="table table-bordered table-hover table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Product picture</th>
                        <th>Product name</th>
                        <th>Product price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(is_array($products) && count($products) > 0)
                        @foreach($products as $product)
                            <tr>
                                <td>picture here</td>
                                <td>{{$product->name}}</td>
                                <td>{{money_format('%.2n', $product->price)}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">No products in the list</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
@stop

@section('script')
@stop