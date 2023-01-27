@extends ('layouts.app');

@section('content')
 <div class="container">
    <div class="row justify-content-center">
       <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Add Item
                    </div>
                    <h5 class="card-header">
                        <a href="{{ route('todo.index') }}" class="btn btn-sm btn-outline-primary"></a>
                    </h5>
                    <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as error)
                                            <li> {{ $error }} </li>
                                        @foreach
                                    </ul>
                                </div>
                            @endif

                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert"> x </button>
                                    {{ session->get('success')}}
                                </div>
                            @endif

                        <form action="POST" action="{{ route('todo.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="title" type="title" class="col-form-label text-md-right"> Title </label>
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('email') }}" required autocomplete="title" autofocus>
                                @error for="title"
                                    <span class="invalid-callback" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-form-label text-md-right"> Decription </label>
                                <textarea name="decription" id="description" cols="30" rows="10" class="form-control @error ('password') is-invalid @enderror" autocomplete="description" value="{{ old('description') }}"></textarea>
                                @error
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="completed" value=" {{ old('completed')}}">
                                    <label class="form-check-label" for="completed"> Completed? </label>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="button" class="btn btn-primary">
                                        Sumbit
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
