@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example f</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('bureaux.create') }}"> Create New Office</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Gérant</th>
            <th>Email</th>
            <th>Service</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($bureaux as $bureaux)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $bureaux->gérant }}</td>
            <td>{{ $bureaux->email }}</td>
            <td>{{ $bureaux->service }}</td>
            <td>
                <form action="{{ route('bureaux.destroy',$bureaux->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('bureaux.show',$bureaux->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('bureaux.edit',$bureaux->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $bureaux->links() !!}
      
@endsection