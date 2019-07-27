@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
   <div class="row">
   <div class="col-md-2">
       <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Order To Data</button>
   </div>
   <div class="col-md-8">
   </div>
   <div class="col-md-2">
    <a  href="{{ route('info.create') }}" class="btn btn-sm btn-success" 
    style="float: right;color:white;font-weight: 600;">
Add new +</a>
</div>
</div><br>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            
            @foreach($data as $yes)
            <div class="container">
                <br>
                <div class="row">
                    <div class="col-md-12">
                       @if($yes->type==0)   
                       <img class="img-responsive thumbnail" 
                       style="height:700px;width:100%;" src="{{url('/images/'.$yes->image)}}">
                       @else
                       <img class="img-responsive thumbnail" 
                       style="height:400px;width:300px;" src="{{url('/images/'.$yes->image)}}">
                       @endif
                   </div>
               </div>

               <div class="row">
                <div class="col-md-12">
                    <br>
                     <p><strong>ID : </strong>{{$yes->id}}</p>
                    <p><strong>Name :</strong> {{$yes->name}}</p>
                    <p><strong>Detail : </strong>{{$yes->description}}</p>
                    <p><strong>Time : </strong>{{$yes->created_at}}</p>
                    <a href="{{ route('info.edit',$yes->id) }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Update</a>

                    <form id="del-{{$yes->id}}" action="{{route('info.destroy',$yes->id)}}" method="POST" style="display: none;">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                  </form>

                  <a href="" class="btn btn-danger" 
                  onclick="if(confirm('Are U Sure U want To Delete')){
                      event.preventDefault();
                      document.getElementById('del-{{$yes->id}}').submit()
                  }
                  else{
                      event.preventDefault();
                  }">Delete</a>
                  <hr>
              </div>

          </div>

      </div>
      @endforeach

  </div>
</div>
</div>
</div>




  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"> 
          <h4 class="modal-title">Order The Data</h4>
        </div>
       
        <div class="modal-body">
           <form method="POST" action="{{ route('order.store') }}">
            {{csrf_field()}}
   

        <div class="form-group">
            <select name="typeValue"  class="form-control"  required>
               <option >Select Type</option>
               <option value="0">Order By Slider </option>
               <option value="1">Order By Thumbnail</option>
           </select>
       </div>

        <div class="pull-right">
          <input type="submit" class="btn btn-default " value="Send">
        </div>

   </div>

        
       
        </form>
      
    </div>
  </div>

@endsection
