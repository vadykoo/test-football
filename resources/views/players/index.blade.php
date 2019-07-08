@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Players</div>
                <a href="{{ route('players.create')}}" class="btn btn-primary">Create</a>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
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
                            <form method="get" action="{{ route('players.index')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" id="search"
                                                   value="{{ request('search') }}"
                                                   placeholder="Search name" name="search"
                                                   type="text" id="search"/>
                                            <div class="input-group-btn">
                                                <button type="submit" class="btn btn-warning"
                                                >
                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{request('field')}}" name="field"/>
                                </div>
                            </form>

                            <div class="row">
                                <table class="table table-bordered table-responsive table-striped table-hover ">
                                    <thead>
                                        <th>Photo</th>
                                        <th width="20%">ID</th>
                                        <th width="50%">Name</th>
                                        <th width="15%">Actions</th>
                                        <th width="15%"></th>
                                    </thead>
                                    @foreach($players as $player)
                                        <tr class="table-row" style="cursor: pointer" onclick="window.location='{{route('players.show', $player->id)}}';">
                                            <td>
                                            @if($player->getFirstMediaUrl())
                                                <img src="{{$player->getFirstMediaUrl()}}" width="50px" height="50px">
                                            @endif
                                            </td>
                                            <td>
                                                {{$player->id}}
                                            </td>
                                            <td>
                                                {{$player->name}}
                                            </td>
                                            <td>
                                                <a href="{{ route('players.edit',$player->id)}}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                @can('accessSuperAdmin')
                                                <form action="{{ route('players.destroy', $player->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ $players->links() }}
        </div>
    </div>
</div>
@endsection
