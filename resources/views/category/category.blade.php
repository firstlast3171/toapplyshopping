@extends('layout.main')

@section('title','Category')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="col-12">
        <a href="/admin/addcategory" class="btn btn-primary">Add Category</a>
    </div>
    
    <div class="col-12">
        @if (count($items) === 0)
        <h1 class="text-warning">No Data Here</h1>
    @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" class="d-none d-md-table-cell">Description</th>
                    <th scope="col" class="border text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    @if ($item->role !== "admin")
                        <tr>
                            <td class="">{{ $item->name }}</td>
                            <td class="d-none d-md-table-cell">{{ Str::substr($item->description, 0, 50) }}.........</td>
                            <td class="border">
                                <div class="row">
                                    {{-- <div class="col-6">
                                        <a href="/admin/users/{{ $item->id }}">Edit</a>
                                    </div> --}}
                                    <div class="col-12 text-center">
                                         <form action="{{route("category.delete",["id"=>$item->id])}}" method="post">
                                              @method("DELETE")
                                              @csrf
                                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                         </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection