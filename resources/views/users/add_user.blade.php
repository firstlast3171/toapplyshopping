@extends('layout.main')

@section('title','Add User')

@section('content')
    <div class="row">
     @if(session('error'))
     <div class="alert alert-danger">
         {{ session('error') }}
     </div>
     @endif
     <div class="col-12">
          <form action="{{ route('users.add') }}" method="post">
               @csrf
          <x-input name="username" />
          <x-input type="email" name="email" />
          <x-input name="phone" />
          <x-input name="password" />
          {{-- <x-input name="confirm_password" /> --}}
          <div class="row">
               <div class="col-6 m-auto p-3 mb-2 border">
                    <label for="role">Role (Default is Poster)</label>
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
                         <button type="submit" class=" btn btn-primary float-end">Add</button>
                    </div>
             
               </div>
            
          </div>
          </form>
     </div>
    </div>
@endsection