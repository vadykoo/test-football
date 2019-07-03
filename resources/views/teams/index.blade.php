@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teams</div>
                <a href="{{ route('teams.create')}}" class="btn btn-primary">Create</a>

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
                            <div class="row">
                                <table class="table table-bordered table-responsive table-striped table-hover ">
                                    <thead>
                                        <th width="20%">ID</th>
                                        <th width="50%">Name</th>
                                        <th width="15%">Actions</th>
                                        <th width="15%"></th>
                                    </thead>
                                    @foreach($teams as $team)
                                        <tr class="table-row" style="cursor: pointer">
                                            <td>
                                                {{$team->id}}
                                            </td>
                                            <td>
                                                {{$team->name}}
                                            </td>
                                            <td>
                                                <a href="{{ route('teams.edit',$team->id)}}" class="btn btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('teams.destroy', $team->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
