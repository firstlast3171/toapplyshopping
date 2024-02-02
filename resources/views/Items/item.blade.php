@extends('layout.main')

@section('title','Item')

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="col-12 my-2">
            <a href="/admin/additem" class="btn btn-sm btn-primary">Add Item</a>
        </div>
        @if (count($newData) === 0)
            <h1 class="text-warning">No Data Here</h1>
        @endif
        @foreach ($newData as $item)
        <div class="col-lg-4 col-md-6 col-12" id="box{{$item->id}}">
            <div class="border rounded p-2">
                <h5>{{$item->name}} <span class="rounded-circle bg-success text-light px-2">{{$item->amount}}</span><span style="font-size: 13px">{{$item->user_name}}</span></h5>
                <div class="text-center">
                   @if (count($item->image) === 1)
                   <img src="{{url('/images/'.$item->image[0])}}" alt="Item Image" width="200" height="200">
                   @else
                   @foreach ($item->image as $image)
                   <img src="{{url('/images/'.$image)}}" alt="Item Image" width="80" height="80">
                   @endforeach
               
                   @endif
                   

                </div>
                <div class="">
                    <p style="text-align: justify">{{ Str::substr($item->description, 0, 150) }}.........</p>
                </div>
                <p class="text-danger">Category - {{$item->category->name}}</p>
                <span class="text-success border px-2 my-2">{{$item->price}} - Kyats</span>
                <div class="row mt-3">
                    <div class="col-6"><a href="/admin/items/edit/{{$item->id}}" class="btn btn-sm btn-primary">Edit</a></div>
                    <div class="col-6">
                        <form action="{{route('items.delete',["id"=>$item->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
         
            </div>
        </div>
        @endforeach
     
    </div>
@endsection