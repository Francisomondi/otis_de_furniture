@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                <div><h1> Admin Dashboard</h1></div>

                
           
        </div>
       
    </div>
    <div class="list-group " id="admin">
            
            <a href="/"  class="list-group-item list-group-item-primary">HOME</a>
            <a href="/barstools/create"  class="list-group-item list-group-item-secondary">ADD BAR STOOL</a>
            <a href="/dinnings/create"  class="list-group-item list-group-item-success">ADD DINNING</a>
            <a href="/bedrooms/create" class="list-group-item list-group-item-danger">ADD BEDROOM</a>
            <a href="/leathersofas/create"  class="list-group-item list-group-item-warning">ADD LEATHER SOFA</a>
            <a href="fabricsofas/create"  class="list-group-item list-group-item-info">ADD FABRIC SOFA</a>
            <a href="/carbinets/create"  class="list-group-item list-group-item-light">ADD TV CARBINET</a>
            <a href="/furnituregallery/create" class="list-group-item list-group-item-danger">Create a gallery</a>
            <a href="/inquiry" class="list-group-item list-group-item-danger">view inquiries</a>
            
          </div>
</div>
@endsection
