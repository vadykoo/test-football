@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('players.index')}}" class="btn btn-primary"> <-BACK</a>Players</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('players.update',$player->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{$player->name}}" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="group_id">Group</label>
                                <select name="group_id" id="froup" class="form-control">
                                    @foreach($groups as $id => $group)
                                        <option value="{{ $group->id }} @if($group->id === $player->group_id) selected @endif">
                                            {{$group->name}} ({{\App\Club::find($group->club_id)->name}})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-outline">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
