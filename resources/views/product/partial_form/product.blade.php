<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 8/06/2016
 * Time: 10:13 PM
 */
?>
<div class="form-group">
    {!! Form::label('name', 'Product name', ['class' => 'control-label col-sm-3']) !!}
    <div class="form-controls col-sm-9">
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('price', 'Product price', ['class' => 'control-label col-sm-3']) !!}
    <div class="form-controls col-sm-9">
        {!! Form::text('price', old('price'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Product description', ['class' => 'control-label col-sm-3']) !!}
    <div class="form-controls col-sm-9">
        {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('picture', 'Product picture', ['class' => 'control-label col-sm-3']) !!}
    <div class="form-controls col-sm-9">
        {!! Form::file('picture', ["accept"=>"image/*"]) !!}
    </div>
</div>