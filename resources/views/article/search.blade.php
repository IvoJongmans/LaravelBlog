@extends('layout')

@section('content')

<h2>Search Results</h2>

@foreach ($search_results as $result)

{{$result->blog_title}}
    
@endforeach
    

    
@endsection
