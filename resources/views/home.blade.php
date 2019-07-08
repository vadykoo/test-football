@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div><a href="{{ route('teams.index')}}" >Teams</a></div>
                        <div><a href="{{ route('groups.index')}}" >Groups</a></div>
                        <div><a href="{{ route('players.index')}}" >Players</a></div>
                        @can('accessSuperAdmin')
                            <div><a href="{{ route('clubs.index')}}" >Clubs</a></div>
                            <div><a href="{{ route('users.index')}}" >Users</a></div>
                        <div class="row">
                            <h2>Activity                           (clubs, users, players)
                            </h2>
                            <table class="table table-bordered table-responsive table-striped table-hover ">
                                <thead>
                                <th width="10%">ID</th>
                                <th >Action</th>
                                <th >created at</th>
                                </thead>
                                @foreach($activities as $activity)
                                    <tr class="table-row">
                                        <td>
                                            {{$activity->id}}
                                        </td>
                                        <td>
                                            {{$activity->description}}
                                        </td>
                                        <td>
                                            {{$activity->created_at}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
