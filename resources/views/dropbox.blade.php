<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Upload Berkas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
  <body>
     @if(session('success'))
     <div class="alert alert-success"><center>{{session('success')}}</center></div>
     @endif
     <div class="container"><div class="row"><div class="col-sm-12 mx-auto">
      	<h1 class="mt-5 text-monospace"><center>Upload Image</center></h1>
        <div class="card my-5">
          <div class="card-body">
            <form method="post" action="{{route('dropbox.store')}}" enctype="multipart/form-data">
             @csrf
               <div class="form-group">
		   <label>File</label>
		   <input name="picture" type="file" class="form-control @error('picture') is-invalid @enderror" required autofocus>
		   @error('picture')
		   <div class="invalid-feedback">
			<strong>{{ $message }}</strong>
		   </div>
		   @enderror
               </div>
               <button class="mt-3 btn btn-primary btn-block " type="submit">Upload</button>
            </form>
          </div>
        </div>
        <div class="card card-signin my-5">
          <div class="card-body bg-light">
              <table class="table">
	         <thead class="thead-dark">
		    <tr>
		      <th scope="col">Name</th>
		      <th scope="col">Actions</th>
		    </tr>
		 </thead>
		 <tbody>
		    @forelse($pictures as $picture)
		    <tr>
		      <th>{{$picture->name}}</th>
  	          <td>
				<a target="_blank" href="{{route('dropbox.view', $picture->name)}}" class="btn btn-icon btn-info"><i class="fas fa-eye"></i></a>
				{{-- <a href="{{route('dropbox.download', $picture->name)}}" class="btn btn-icon btn-success"><i class="fas fa-download"></i></a>
				<a href="{{route('dropbox.delete', $picture->id)}}" class="btn btn-icon btn-danger" onclick="return confirm('Are You shue?')"><i class="far fa-trash-alt"></i></a> --}}
		      </td>
		    </tr>
		    @empty
                <p>No pictures yet...</p>
            @endforelse
		</tbody>
	      </table>
          </div>
        </div>
      </div></div></div>
   </body>
</html>