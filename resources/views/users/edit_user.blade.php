@extends('layout.main')

@section('title','Edit User')

@section('content')
    <div class="row">
     <div class="col-12">
          <form action="{{ route('users.edit', ['id' => $item->id]) }}" method="post">
               @csrf
          <x-input name="username" value="{{$item->username}}" />
          <x-input type="email" name="email" value="{{$item->email}}" />
          <x-input name="phone" value="{{$item->phone}}" />
          <div class="row">
               <div class="col-6 m-auto p-3 mb-2 border">
                    <label for="role">Role ({{$item->role}})</label>
                    <select id="role" name="role" class="form-select form-select-sm">
                         <option selected>Open this select menu</option>
                         <option value="co-admin">Co-admin</option>
                         <option value="poster">Poster</option>
                         <option value="orderreceiver">OrderReceiver</option>
                    </select>
               </div>
          </div>
             
          <div class="row">
               <div class="col-6 m-auto">
                    <div class="">
                         <button type="submit" class=" btn btn-primary float-end">Update</button>
                    </div>
             
               </div>
            
          </div>
          </form>
     </div>
    </div>
@endsection