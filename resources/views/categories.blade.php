@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 bg-white">
     <ul class="">
         @foreach ($categories as $category)
             <li class="text-black rounded-lg shadow-md hover:text-blue-600 text-lg">
                 {{ $loop->iteration }}. <a href="">{{ $category->name }}</a>
             </li>
             <hr class="mt-2 mb-2">
         @endforeach
     </ul>
 </div>
 
@endsection
