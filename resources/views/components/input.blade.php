<div class="row my-1">
 <div class="col-6 m-auto  border p-3">
  <label for="{{$name ?? ""}}" class="pb-3">{{$name ? ucfirst($name) : ""}}</label>
  <input type="{{$type ?? "text"}}" class="form-control" placeholder="{{$name ?? ""}}" name="{{$name ?? ""}}" value="{{old($name) ?? $value ?? ""}}" autocomplete="off" {{$m='true' ? 'multiple' : ''}}>
  @if ($name == 'images[]')
      @error('images')
      <p class="text-danger">{{$message}}</p>
      @enderror

 
        
    @else
    @error($name)
    <p class="text-danger">{{$message}}</p>
@enderror  
 
  @endif

 </div>
</div>
