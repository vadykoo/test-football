@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('clubs.index')}}" class="btn btn-primary"> <-BACK</a>Clubs</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('clubs.update',$club->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$club->name}}" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-outline">Add club</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
