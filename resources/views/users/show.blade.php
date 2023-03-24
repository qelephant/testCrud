@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>Surname: {{$user->surname}}</h2>
                    <h2>Name: {{$user->name}}</h2>
                    <h2>Patronymic: {{$user->patronymic}}</h2>
                    <h2>Age: {{$user->getAge()}} лет</h2>
                    <h2>City: {{$user->city->name}}</h2>
                    <h2>Work: {{$user->work->name}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
