@extends('bureaux.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Office</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('bureaux.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
        There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gérant:</strong>
                    <input type="text" name="gérant" value="{{ $bureaux->gérant }}" class="form-control" placeholder="Gérant">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <textarea class="form-control" style="height:150px" name="email" placeholder="Email">{{ $bureaux->email }}</textarea>
                </div>
            </div>
            <div
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Service:</strong>
                    <input type="text" name="gérant" value="{{ $bureaux->service }}" class="form-control" placeholder="Service">
                </div>
            </div>
            </div> class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection