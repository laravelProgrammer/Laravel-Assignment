@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
    <div class="col-md-10">
    </div>
    <div class="col-md-1">
        <a  href="{{ route('info.index') }}" class="btn btn-sm btn-success" 
                style="float: right;color:white;font-weight: 600;">
            All Records </a>
    </div>
    <div class="col-md-1">
        <a  href="{{ route('info.create') }}" class="btn btn-sm btn-success" 
        style="float: right;color:white;font-weight: 600;">
    Add new +</a>
</div>
</div><br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">User Profile</div>
            <div style="padding:20px;">
                
                <p><strong>ID : </strong>{{Auth::user()->id}}</p>
                <p><strong>Name : </strong>{{Auth::user()->name}}</p>
                <p><strong>Email : </strong>{{Auth::user()->email}}</p>
                <p><strong>Time : </strong>{{Auth::user()->created_at->diffForHumans()}}</p>
            </div>      

                

        </div>
    </div>
</div>
</div>
@endsection
