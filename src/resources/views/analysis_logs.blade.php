@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">画像パス</th>
                <th scope="col">success</th>
                <th scope="col">message</th>
                <th scope="col">class</th>
                <th scope="col">confidence</th>
                <th scope="col">request</th>
                <th scope="col">response</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($analysis_logs as $analysis_log)
                <tr>
                    <td>{{ $analysis_log->id }}</td>
                    <td>{{ $analysis_log->image_path }}</td>
                    <td>{{ $analysis_log->success }}</td>
                    <td>{{ $analysis_log->message }}</td>
                    <td>{{ $analysis_log->class }}</td>
                    <td>{{ $analysis_log->confidence }}</td>
                    <td>{{ $analysis_log->request_timestamp }}</td>
                    <td>{{ $analysis_log->response_timestamp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
