@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('groups.index')}}" class="btn btn-primary"> <-BACK</a>Groups</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('groups.update',$group->id)}}">
                        @csrf
                        @method('PATCH')
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$group->name}}" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="team_id">Team</label>
                                <select name="team_id" id="team" class="form-control">
                                    @foreach(\App\Team::all() as $id => $team)
                                        <option value="{{ $team->id }}" @if($team->id === $group->team_id) selected @endif>
                                            {{$team->name}} ({{\App\Club::find($team->id)->name}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-outline">Add group</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
