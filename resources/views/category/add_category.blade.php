@extends('layout.main')

@section('title','Add Category')

@section('content')
    <div class="row">
     @if(session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
     @endif
     <div class="col-12">
          <form action="{{ route('category.add') }}" method="post">
               @csrf
          <x-input name="name" />
        
          <x-input name="description" />
          <p>Description box can be nullable</p> 
          <div class="row">
               <div class="col-6 m-auto">
                    <div class="">
                         <button type="submit" class=" btn btn-primary float-end">Add</button>
                    </div>
             
               </div>
            
          </div>
          </form>
     </div>
    </div>
@endsection