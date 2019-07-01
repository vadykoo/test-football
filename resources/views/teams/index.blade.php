@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Teams</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                {{--<div class="card-body">--}}
                    {{--@if ($success)--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ $success }}--}}
                        {{--</div>--}}
                    {{--@endif--}}
                {{--</div>--}}

                <div class="card-body">
                    <div class="panel-heading container-fluid">
                        <div class="container">
                            <div class="row">
                                <table class="table table-bordered table-responsive table-striped table-hover ">
                                    <tr>
                                        <th width="20%">ID</th>
                                        <th width="80%">Name</th>
                                    </tr>
                                    @foreach($teams as $team)
                                        <tr class="table-row" style="cursor: pointer">
                                            <td>
                                                {{$team->id}}
                                            </td>
                                            <td>
                                                {{$team->name}}
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
