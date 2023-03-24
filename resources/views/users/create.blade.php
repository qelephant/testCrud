@extends('layouts.app')

@section('content')
<h1>Create User</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
               </ul>
                <div class="card-body">
                    <form action="/users" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="surname">Surname</label>
                            <input type="text" name="surname" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="patronymic">Patronymic</label>
                            <input type="text" name="patronymic" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="b_date">Birthday date</label>
                            <input type="text" name="b_date" class="form-control" placeholder="yyyy-mm-dd">
                        </div>

                        <div>
                            <label for="city_id">City</label>
                            <select name="city_id" id="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="work_id">Work</label>
                            <select name="work_id" id="work_id">
                                @foreach ($works as $work)
                                    <option value="{{ $work->id }}">{{ $work->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
