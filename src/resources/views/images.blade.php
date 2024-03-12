@extends('layouts.app')

@section('content')
    <table class="table">
        <tbody>
            @foreach ($images as $image)
                <tr>
                    <td class="text-center">
                        <img src="https://placehold.jp/100x100.png" class="img-thumbnail" alt="...">
                    </td>
                    <td>{{ $image }}</td>
                    <td>
                        <form method="POST" action="/submit">
                            @csrf
                            <input type="hidden" name="image_path" value="{{ $image }}">
                            <button type="submit" class="btn btn-primary">解析</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
