<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::check() && Auth::user()->usertype == 'admin')
            {{ __('Admin Dashboard')}}
            @else
            {{ __('User Dashboard')}}
            @endif
        </h2>
    </x-slot>
    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="text-align: centern;boarder: 1px solid blue">
                    <!-- display single post -->
                    

                    <!-- single post -->
                    <form action="{{route('admin.postupdate', $post->id)}}" method ="post"
                        enctype="multipart/form-data">
                        @csrf
                   <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                      Post Title
                    </label>
                    <input type="text" name="title" value="{{ $post->title }}"placeholder="Enter post title"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" require > </div>                        
                <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Post Description</label>
            <textarea name="description" rows="6" placeholder="Write your post content here..."class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"required>{{ $post->description }}</textarea></div>
                        <img src="{{asset('img/' .$post->image)}}" style="width:100px; height:100px; margin-left: 450px; margin-bottom:10px;" alt="{{$post->image}}">
                        <input type="file" name="image"> <br><br><br>
                        <input style="border: 1px solid blue; text-align: center; padding: 10px" type="submit" name="submit" value="update post">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
