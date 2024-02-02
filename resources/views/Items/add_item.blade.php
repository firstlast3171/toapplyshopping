@extends('layout.main')

@section('title', 'Add New Shop Item')

@section('content')
    <div class="row">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-12">
            <form action="{{ route('items.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-input name="name" />
                <x-input name="images[]" type="file" m="true" />
               
                <div class="row">
                    <div class="col-6 m-auto p-3 mb-2 border">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Description">{{old('description') ?? ""}}</textarea>
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                    </div>
                    
                </div>
                <x-input name="price" />
                <div class="row">
                    <div class="col-6 m-auto p-3 mb-2 border">
                        <label for="category">Select Category</label>
                        <select id="category" name="category" class="form-select form-select-sm">
                            <option value="" selected>Open this select menu</option>
                            @foreach ($data as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                              <p class="text-danger">{{$message}}</p>
                         @enderror
                    </div>
                    
                </div>
                <x-input name="amount" type="number" />
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
