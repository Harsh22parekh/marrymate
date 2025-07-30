@extends('admin.main') 
@section('main-section')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h2>About Us Content</h2>
        <a href="{{ route('admin.about.edit') }}" class="btn btn-primary">Edit About Content</a>
    </div>

    <div class="card mt-3 p-4 shadow">
        <table class="table table-bordered">
            <tr>
                <th>Main Title</th>
                <td>{{ $about->main_title }}</td>
            </tr>
            <tr>
                <th>Main Description</th>
                <td>{{ $about->main_description }}</td>
            </tr>
            <tr>
                <th>Mission Title</th>
                <td>{{ $about->mission_title }}</td>
            </tr>
            <tr>
                <th>Mission Content 1</th>
                <td>{{ $about->mission_content_1 }}</td>
            </tr>
            <tr>
                <th>Mission Content 2</th>
                <td>{{ $about->mission_content_2 }}</td>
            </tr>
            <tr>
                <th>Main Image</th>
                <td><img src="{{ asset('uploads/about/' . $about->main_image) }}" width="150"></td>
            </tr>
            <tr>
                <th>Mission Image</th>
                <td><img src="{{ asset('uploads/about/' . $about->mission_image) }}" width="150"></td>
            </tr>
            <tr>
                <th>Mission BG Image</th>
                <td><img src="{{ asset('uploads/about/' . $about->mission_bg_image) }}" width="150"></td>
            </tr>
            <tr>
                <th>Features</th>
                <td>
                    <ul>
                        @foreach($features as $feature)
                            <li>{{ $feature['icon'] }} - {{ $feature['text'] }}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</div>

@endsection
