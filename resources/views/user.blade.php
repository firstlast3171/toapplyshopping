@extends('layout.main')

@section('title', 'User')

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
            <a href="/admin/adduser" class="btn btn-primary">Add User</a>
        </div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col" class="d-none d-md-table-cell">Email</th>
                        <th scope="col" class="d-none d-md-table-cell">Phone</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="border text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        @if ($item->role !== "admin")
                            <tr>
                                <td>{{ $item->username }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->email }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->phone }}</td>
                                <td>{{ $item->role }}</td>
                                <td class="border">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="/admin/users/{{ $item->id }}">Edit</a>
                                        </div>
                                        <div class="col-6">
                                             <form action="{{route("users.delete",["id"=>$item->id])}}" method="post">
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
