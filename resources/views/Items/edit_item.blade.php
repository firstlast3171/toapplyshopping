@extends('layout.main')

@section('title', 'Edit Shop Item')

@section('content')
    <div class="row">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-12">
            <form action="{{ route('items.edit',['id'=>$item->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <x-input name="name" value='{{$item->name}}' />
                    <div>
                         <div class="col-md-6 offset-md-3 p-3">
                              <p class="">Curent Images</p>
                            
                              @foreach ($item->image as $image)
                                  <img src="{{url('/images/'.$image)}}" width="50" height="50" />
                              @endforeach
                         </div>
                     
                         <x-input name="images[]" type="file" m="true" />
                    </div>
        
               
                <div class="row">
                    <div class="col-6 m-auto p-3 mb-2 border">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description">{{old('description') ?? $item->description ?? ""}}</textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                    </div>
                    
                </div>
                <x-input name="price" value="{{$item->price}}" />
                <div class="row">
                    <div class="col-6 m-auto p-3 mb-2 border">
                        <label for="category">Select Category (Current - @foreach ($data as $d)
                            @if ($d->id === $item->category_id)
                                <span>{{$d->name}}</span>
                            @endif
                        @endforeach )</label>
                        <select id="category" name="category" class="form-select form-select-sm">
                            <option value="" selected>Open this select menu</option>
                            @foreach ($data as $d)
                                <option value="{{$d->id}}">{{ $d->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                              <p class="text-danger">{{$message}}</p>
                         @enderror
                    </div>
                    
                </div>
               
                <x-input name="amount" type="number" value="{{$item->amount}}"  />
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
