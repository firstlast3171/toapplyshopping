<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body>
     <div class="container my-3 p-3">
          <div class="row">
               <div class="col-4 border">
                    {{-- header --}}
                    <div class="p-3" style="font-family: 'Times New Roman', Times, serif">
                         <div class="d-none d-lg-inline">
                              <h3 class="bg-danger text-light p-3 rounded text-center">TanTanMyanMyan</h3>
                         </div>
                         <div class="d-inline d-lg-none">
                              <p class="text-center text-danger shadow py-3 rounded">TanTanMyanMyan</p>
                         </div>
                    </div>
                    {{-- header --}}

                    {{-- pages --}}
                    <div class="p-3 border">
                         <p class="text-muted">Pages</p>
                         <div>
                      
                              <ul style="list-style: none">
                                   @if (Auth::user()->role === "admin" || Auth::user()->role === "co-admin")
                                   <li class="my-3"><a href="/admin" class="text-dark fs-5" style="text-decoration: none"><i class="fas fa-tachometer-alt pe-3"></i><span class="d-md-inline d-none">Dashboard</span></a></li>
                                   @endif
                                   @if (Auth::user()->role === "admin" || Auth::user()->role === "co-admin" || Auth::user()->role === "orderreceiver")
                                   <li class="my-3"><a href="/admin/orders" class="text-dark fs-5" style="text-decoration: none"><i class="fas fa-shopping-cart pe-3"></i><span class="d-md-inline d-none">Orders <span class="rounded-circle bg-danger text-light px-2">5</span></span></a></li>
                                   @endif
                                   @if (Auth::user()->role === "admin" || Auth::user()->role === "co-admin" || Auth::user()->role === "poster")
                                   <li class="my-3"><a href="/admin/items" class="text-dark fs-5" style="text-decoration: none"><i class="fas fa-file-alt pe-3"></i><span class="d-md-inline d-none">Items</span></a></li>
                                   <li class="my-3"><a href="/admin/categories" class="text-dark fs-5" style="text-decoration: none"><i class="fas fa-list pe-3"></i><span class="d-md-inline d-none">Categories</span></a></li>
                                   @endif
                                   @if (Auth::user()->role === "admin")
                                   <li class="my-3"><a href="/admin/users" class="text-dark fs-5" style="text-decoration: none"><i class="fas fa-user pe-3"></i><span class="d-md-inline d-none">Users</span></a></li>
                                   @endif
                                  
                              </ul>
                         </div>
                    </div>
                    {{-- pages --}}
                    <div class="row p-3">
                         <div class="col-6 text-center">
                              <a href="/admin/profile" class="btn btn-dark"><i class="fas fa-user"></i><span class="d-none d-lg-inline">Profile</span></a>
                         </div>
                         <div class="col-6 text-center">
                              <form action="/logout" method="post">
                              @csrf
                              <button type="submit" class="btn btn-danger">Logout</button>
                          </form>
                          </div>
            
                    </div>
               </div>
               <div class="col-8 border p-3">
                    <div class="row">
                         @if(Auth::check())
                         <div class="col-12">
                        <p>Welcome, <b>{{ Auth::user()->username }}({{Auth::user()->role}})</b></p>
                         </div>
                         @endif
                    </div>
                    @yield('content')
               </div>
          </div>
   
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>