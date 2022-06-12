@extends('layout.conquer2')
@section('title')
  Daftar medicine
@endsection
@section('content')
 
 <h2>Supplier</h2>
 <a href="#modalCreate" data-toggle="modal" class="btn btn-info">+ Supplier Baru (modal)</a>
 <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
            
            <div class="modal-dialog">
              <div class="modal-content" >
                <div class="modal-header">
                  <button type="button" class="close" 
                    data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title">Add New Supplier</h4>
                </div>
                <div class="modal-body">
                <form method="POST" action="{{route('suppliers.store')}}">
                    @csrf
                    <div class="form-group">
                      <label for="name">Nama:</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" >
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Send</button> -->
                </div>
                <div class="modal-footer">
                   <div class="form-actions">
                      <button type="submit" class="btn btn-info" data-dissmiss="modal">Submit</button>
                      <a href="{{url('suppliers')}}" class="btn btn-default" data-dissmiss="modal">cancel</a>
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
 <div>  
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-success">
            {{session('error')}}
        </div>
    @endif
 </div> 

  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Logo</th>
        <th></th>        
      </tr>
    </thead>
    <tbody>
        @foreach($datas as $li)
      <tr>
        <td >{{$li->id}}</td>
        <td  class='editable' id='td_name_{{$li->id}}'>{{$li->name}}</td>
        <td>
          <img height='50px' src="{{asset('/img/'.$li->logo)}}" />
          <div class="modal fade" id="modalChange_{{$li->id}}" tabIndex="-1" role="basic" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content" >
                
                <form role ="form" method="POST" action="{{route('suppliers.store')}}" enctype='multipart/form-data'>
                    @csrf
                    <div class="modal-header">
                      <button type="button" class=close data-dismiss="modal" aria-hidden="true"></button>
                      <h4 class="modal-title">Change logo</h4>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="name">Logo</label>
                      <input type="file" class="form-control" id="logo"  name="logo" >
                      <input type="hidden" id="id" value="{{$li->id}}">
                    </div>
                    </div>
                    <!-- <button type="submit" class="btn btn-default">Send</button> -->
              
                <div class="modal-footer">
                   <div class="form-actions">
                      <button type="submit" class="btn btn-info" data-dissmiss="modal">Submit</button>
                      <a href="{{url('suppliers')}}" class="btn btn-default" data-dissmiss="modal">cancel</a>
                    </div>
                </div>
                </form>
              </div>
            </div>
            </div>
            <br>
            <a href='#modalChange_{{$li->id}}' data-toggle='modal' class='btn btn-xs btn-default'>Change</a>
        </td>
        <td>
          <a href="{{route('suppliers.edit',$li->id)}}" class='btn btn-xs btn-info'>edit</a>
          <a href="#modalEdit" data-toggle='modal' class='btn btn-warning btn-xs' onclick="getEditForm({{$li->id}})">+ Edit A</a>
          <a href="#modalEdit" data-toggle='modal' class='btn btn-warning btn-xs' onclick="getEditForm2({{$li->id}})">+ Edit B</a> 

      </td>
      <td>
        @can('delete-permission',$li)
          <form method='POST' action="{{url('suppliers/'.$li->id)}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="delete" class="btn btn-danger btn-xs" onclick="if(!confirm('are you sure to delete this record ?'))return false;">
          </form>
        @endcan
      </td>
      </tr>
      @endforeach
    </tbody>
  </table> 
  <div class ="modal fade"  id ="modalEdit" tabIndex="-1" role="basic" aria-hidden="true">
    <div class ="modal-dialog">
      <div class ="modal-content" id='modalContent'>
    </div>
  </div>
@endsection
@section('javascript')
<script>
  $('.editable').editable({
    closeOnEnter : true,
    callback:function(data){
      if(data.content){
        var s_id=data.$el[0].id
        var fname=s_id.split('_')[1]
        var id=s_id.split('_')[2]
       
        $.ajax({
          type:'POST',
          url:'{{route("supplier.saveDataField")}}',
          data:{'_token':'<?php echo csrf_token()?>',
          'id':id,
          'fname':fname,
          'value':data.content},
          success:function(data){
            alert(data.msg)
          }
        });
      }
    }
  });
  function getEditForm(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("supplier.getEditForm")}}',
      data:{'_token':'<?php echo csrf_token()?>',
        'id':id     
      },
      success: function(data){
        
        $('#modalContent').html(data.msg)
      }
    });
  }
  function getEditForm2(id)
  {
    $.ajax({
      type:'POST',
      url:'{{route("supplier.getEditForm2")}}',
      data:{'_token':'<?php echo csrf_token()?>',
        'id':id     
      },
      success: function(data){
        
        $('#modalContent').html(data.msg)
      }
    });
  }

  
</script>
@endsection