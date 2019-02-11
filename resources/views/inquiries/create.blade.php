@extends('layouts.app')
@section('content')
<div class="container">
    <h2>create inquiry</h2>
    {!! Form::open(['action'=>'inquiryController@store','method'=>'POST','enctype'=> 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{Form::label('name','fullname')}}
                {{Form::Text('fullname' ,'',['class'=>'form-control','placeholder'=>'inquiry name'])}}
            </div>            
           
            <div class="form-group">
                    {{Form::label('phone', 'phone')}}
                    {{Form::number('phone', '', ['class'=>'form-control', 'placeholder'=>'phone number'])}}
            </div>
            <div class="form-group">
                    {{Form::label('email', 'email')}}
                    {{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'email adress'])}}
            </div>
            <div class="form-group">
                    {{Form::label('inquiry', 'inquiry')}}
                    {{Form::textArea('inquiry','', ['class'=>'form-control', 'placeholder'=>'inquiry'])}}
                </div>
           
            
            <div class="form-group">
                {{Form::label('image', 'image')}}
                {{Form::file('image')}}
            </div>
           
            
            
            
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    {{Form::submit('Create inquiry', ['class'=>'btn btn-primary'])}}
                    <a class="btn btn-primary" href="/inquirys" role="button">Back
                        &raquo;</a>
                </div>
            </div>
            {!! Form::close() !!}

</div>
@endsection