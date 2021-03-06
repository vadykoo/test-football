@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('players.index')}}" class="btn btn-primary"> <-BACK</a>Player</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <div class="card-body">
                        <div class="panel-heading container-fluid">
                            <div class="container">
                                    <div class="col">
                                    <div class="row">
                                        <div class="form-group">
                                            <div>Name:</div>
                                            {{ $player->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div >Photo</div>
                                            <img src="{{$player->getFirstMediaUrl()}}" height="400px">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div >Group</div>
                                            {{$player->group->name}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
