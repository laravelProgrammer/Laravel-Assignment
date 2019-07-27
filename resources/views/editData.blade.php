@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Record</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('info.update',$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('put')}}

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{$data->name}}" required>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type </label>

                            <div class="col-md-6">
                               

                                <select name="type"  class="form-control" value="{{ $data->type}}" required>
                                    <option value="{{ $data->type}}" selected="">{{ $data->type}}</option>
                                    <option value="1">Thumbnail</option>
                                    <option value="0">Slider</option>
                                </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control" name="image" value="{{$data->image}}" required >

                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Detail</label>

                            <div class="col-md-6">
                            <textarea class="form-control" name="description" required="">{{$data->description}}</textarea>

                            </div>
                        </div>
                         <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
