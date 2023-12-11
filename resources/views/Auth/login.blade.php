<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  </head>
  <body>
     <div class="container my-3 p-3">
          <div class="row">
               <div class="col-6 m-auto">
                    <h3 class="bg-danger text-light p-3 rounded text-center">TanTanMyanMyan</h3>
               </div>
               @if(session('error'))
               <div class="alert alert-danger">
                   {{ session('error') }}
               </div>
               @endif
          </div>
          <form action="/login" method="post">
          @csrf
     <x-input name="username" />
     <x-input type="password" name="password" />
     <div class="row">
          <div class="col-6 m-auto">
               <div class="">
                    <button type="submit" class=" btn btn-primary float-end">Login</button>
               </div>
        
          </div>
       
     </div>
     </form>
   
     </div>
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>