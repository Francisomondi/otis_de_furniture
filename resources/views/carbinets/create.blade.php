@extends('layouts.app')
@section('content')
<div class="container">
    <h2>create carbinet</h2>
    {!! Form::open(['action'=>'carbinetsController@store','method'=>'POST','enctype'=> 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{Form::label('name','carbinet name')}}
                {{Form::Text('name' ,'',['class'=>'form-control','placeholder'=>'carbinet name'])}}
            </div>            
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textArea('description','', ['class'=>'form-control', 'placeholder'=>'Description'])}}
            </div>
            <div class="form-group">
                    {{Form::label('price', 'Price')}}
                    {{Form::number('price', '', ['class'=>'form-control', 'placeholder'=>'Price in kshs'])}}
            </div>
            <div class="form-group">
                    {{Form::label('details', 'Details')}}
                    {{Form::textArea('details','', ['class'=>'form-control', 'placeholder'=>'Details'])}}
            </div>
            <div class="form-group">
                    {{Form::label('dimentions','Dimentions')}}
                    {{Form::Text('dimentions' ,'',['class'=>'form-control','placeholder'=>'Dimentions'])}}
            </div>  
                
            <div class="form-group">
                    {{Form::label('Condition','Condition')}}
                    {{Form::Text('condition' ,'',['class'=>'form-control','placeholder'=>'Condition'])}}
             </div>
           
           
           
            <div class="form-group">
                {{Form::label('category', 'category')}}
                {{Form::select('category',['Bar Stool' => 'Bar Stool', 'Bedroom' => 'Bedroom','Tv Carbinet' => 'Tv Carbinet', 'carbinet' => 'carbinet','Fabric Sofas' => 'Fabric Sofas', 'Leather Sofas' => 'Leather Sofas'],'Choose Category')}}
            </div>
            
            <div class="form-group">
                {{Form::label('image', 'image')}}
                {{Form::file('image')}}
            </div>
           
            
            
            
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {{Form::submit('Create carbinet', ['class'=>'btn btn-primary'])}}
                    <a class="btn btn-primary" href="/carbinets" role="button">Back
                        &raquo;</a>
                </div>
            </div>
            {!! Form::close() !!}

</div>
@endsection