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
            <table class="table table-bordered table-hover table-striped table-condensed" id="product-list">
                <thead>
                    <tr>
                        <th>Product picture</th>
                        <th>
                            <a href="{{url('product?sort=name&order=' . ($order * -1) . '&start=' . $start)}}">Product name</a>
                        </th>
                        <th>
                            <a href="{{url('product?sort=price&order=' . ($order * -1) . '&start=' . $start)}}">Product price</a>
                        </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td align="center">
                                <a href="{{url('/product/' . $product->id)}}">
                                    <img src="data:image/jpeg;base64,{!! $product->picture !!}" width="200" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{url('/product/' . $product->id)}}">
                                    {{$product->name}}
                                </a>
                            </td>
                            <td>${{number_format($product->price, 2, '.', ',')}}</td>
                            <td align="center">
                                <a class="btn btn-primary"
                                   href="{{url('/product/'. $product->id . '/edit')}}">Edit</a>
                                {{ Form::open(array('route' => array('product.destroy', $product->id), 'method' => 'delete', 'class'=>'inline-block', 'onsubmit'=>'return confirm("Do you want to delete this product?")')) }}
                                {!! Form::submit('Delete', ["class"=>"btn btn-danger", "href"=>"#"]) !!}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            @if(isset($total))
                @for($i = 0; $i < ceil($total/10); $i++)
                    <a href="{{url("product?start=" . $i * 10 . "&sort=$sort&order=$order")}}" class="btn btn-default">{{$i + 1}}</a>
                @endfor
            @endif
        </div>
    </div>
@stop

@section('script')
@stop