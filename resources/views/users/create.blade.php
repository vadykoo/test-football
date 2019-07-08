@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><a href="{{ route('users.index')}}" class="btn btn-primary"> <-BACK</a>Users</div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <form method="post" action="{{ route('users.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password">password:</label>
                                <input type="text" class="form-control" name="password"/>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="role_id">Role</label>
                                <select name="role_id" id="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{ $role->id }}">
                                            {{$role->description}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                        </div>
                        {{--<div class="col">--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="group_id">Group</label>--}}
                                {{--<select name="group_id" id="group" class="form-control">--}}
                                    {{--@foreach($groups as $id => $group)--}}
                                        {{--<option value="{{ $group->id }}">--}}
                                            {{--{{$group->name}}--}}
                                        {{--</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-success">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
