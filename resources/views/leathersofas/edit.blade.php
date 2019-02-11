@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit leathersofa</h2>
    {!! Form::open(['action'=>['leathersofasController@update',$leathersofas->id],'method'=>'POST','enctype'=> 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{Form::label('name','BarStool name')}}
                {{Form::Text('name' ,$leathersofas->name,['class'=>'form-control','placeholder'=>'leathersofa name'])}}
            </div>            
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textArea('description',$leathersofas->description, ['class'=>'form-control', 'placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{Form::number('price', $leathersofas->price, ['class'=>'form-control', 'placeholder'=>'Price in kshs'])}}
            </div>
            <div class="form-group">
                    {{Form::label('details', 'Details')}}
                    {{Form::textArea('details',$leathersofas->details, ['class'=>'form-control', 'placeholder'=>'Details'])}}
            </div>
            <div class="form-group">
                    {{Form::label('dimentions','Dimentions')}}
                    {{Form::Text('dimentions' ,$leathersofas->dimentions,['class'=>'form-control','placeholder'=>'Dimentions'])}}
            </div>  
                
            <div class="form-group">
                    {{Form::label('Condition','Condition')}}
                    {{Form::Text('condition' ,$leathersofas->condition,['class'=>'form-control','placeholder'=>'Condition'])}}
             </div>
           
           
           
            <div class="form-group">
                {{Form::label('category', 'category')}}
                {{Form::select('category',['Bar Stool' => 'Bar Stool', 'Bedroom' => 'Bedroom','Tv Carbinet' => 'Tv Carbinet', 'leathersofa' => 'leathersofa','Fabric Sofas' => 'Fabric Sofas', 'Leather Sofas' => 'Leather Sofas'],'Choose Category')}}
            </div>
            
            <div class="form-group">
                {{Form::label('image', 'image')}}
                {{Form::file('image')}}
            </div>
           
            {{Form::hidden('_method','PUT')}}
            
            
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {{Form::submit('Create Bar Stool', ['class'=>'btn btn-primary'])}}
                    <a class="btn btn-primary" href="/leathersofas" role="button">Back
                        &raquo;</a>
                </div>
            </div>
            {!! Form::close() !!}

</div>
@endsection