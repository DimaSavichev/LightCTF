@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">№</th>
            <th scope="col">Name</th>
            <th scope="col">Score</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = count($leaders)-1; $i >= 0; $i--)
                <tr>
                    <th scope="row">{{ count($leaders)-$i }}</th>
                    <td>{{ array_keys($leaders)[$i] }}</td>
                    <td>{{ array_values($leaders)[$i] }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>
@endsection