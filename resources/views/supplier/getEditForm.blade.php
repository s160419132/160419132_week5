  
   <h2>Supplier</h2>
  <form method="POST" action="{{url('suppliers/'.$data->id)}}">
      @csrf
      @method("PUT")
    <div class="form-group">
      <label for="name">Nama:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$data->name}}">
    </div>
    <button type="submit" class="btn btn-default">Send</button>
  </form>

