@extends('layout.conquer2')
@section('title')
list nama medecines, formula dan nama kategori
@endsection
@section('content')
<div class="container">
<div id='showinfo'></div>
  <h2>daftar nama medicines, formula dan nama kategori</h2>
  <p></p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Name</th>
        <th>Form</th>
        <th>Category Name</th>  
      </tr>
    </thead>
    <tbody>
        @foreach($data as $li)
      <tr>
        <td>
        <a class="btn btn-default" data-toggle="modal" href="#detail_{{$li->id}}" data-toggle="modal">{{$li->generic_name}}</a>
        <div class="modal fade" id="detail_{{$li->id}}" tabindex="-1" role="basic" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{$li->generic_name}}</h4> 
              </div>
              <div class="modal-body">
                 <img src="{{ asset('img').'/'.$li->id.'.jpeg' }}" height='200px' />
                 <p>{{$li->form}}</p>
               </div>
              <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
           </div>
        </div>  
        </td>
        <!-- <td>{{$li->generic_name}}</td> -->
        <td>{{$li->form}}</td>
        <td>{{$li->name}}</td>
      @endforeach
    </tbody>
  </table>
  <a class="btn btn-default" data-toggle="modal" href="#disclaimer">Disclaimer</a>
</div>
@endsection
@section('javascript')
<script>
  function showInfo()
  {
    $.ajax({
      type:'POST',
      url:'{{route("products.showInfo")}}',
      data:'_token=<?php echo csrf_token() ?>',
      success: function(data){
        $('#showinfo').html(data.msg)
      }
    });
  }
</script>
@endsection

