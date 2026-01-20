<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Auth::check() && Auth::user()->usertype == 'admin')
            {{ __('Admin Dashboard') }}
            @else
            {{ __('User Dashboard') }}
            @endif
        </h2>
    </x-slot>
    @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('status'))
                    <div style ="background-color: aquamarine;" class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
                    <button style="background-color: #2196F3; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; margin-right: 5px;" type="button" class="btn-travel" data-bs-toggle="modal" data-bs-target="#addPostModal">Add New Post</button>

              <!-- Modal -->
            <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{route('admin.createpost')}}" method ="post"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" placeholder="Enter Post Title here"><br><br><br>
                       <div class="mb-3">
                                <textarea id="post-description" name="description">Write your post here...</textarea>
                                </div><br>
                        <input type="file" name="image"> <br><br><br>
                        <input style="background-color: #2196F3; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; margin-right: 5px;" type="submit" name="submit" value="add post">
                    </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Scripts for Bootstrap & TinyMCE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#post-description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'underline', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
        })
        .catch(error => {
            console.error(error);
        });
</script>

                    <!--  all post   -->
                    <h1 style="color: #333; text-align: center; margin-bottom: 30px;">Posts Management</h1>
    
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse; background-color: white; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                            <thead>
                                <tr style="background-color: #01063f; color: white;">
                                    <th style="padding: 12px 15px; text-align: left;">ID</th>
                                    <th style="padding: 12px 15px; text-align: left;">Title</th>
                                    <th style="padding: 12px 15px; text-align: left;">Description</th>
                                    <th style="padding: 12px 15px; text-align: left;">Image</th>
                                    <th style="padding: 12px 15px; text-align: left;">Actions</th>
                                    <th style="padding: 12px 15px; text-align: left;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $posts)
                                <tr style="border-bottom: 1px solid #ddd;">
                                    <td style="padding: 12px 15px;">{{$posts->id}}</td>
                                    <td style="padding: 12px 15px;">{{$posts->title}}</td>
                                    <td style="padding: 12px 15px;">{{Str::limit($posts->description,100)}}</td>
                                    <td style="padding: 12px 15px;"><img style="width: 100px; height: 100px;" src="{{asset('img/'.$posts->image)}}" alt="{{$posts->image}}">
                                    <td style="padding: 12px 15px;">
                                        <a href="{{route('admin.update', $posts->id)}}" style="background-color: #2196F3; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; margin-right: 5px;">Update</a>
                                    </td>
                                    <td style="padding: 12px 15px;">
                                        <a href="{{route('admin.deletepost', $posts->id)}}"     onclick="return confirm('Are you sure you want to delete this post?');" style="background-color: #f44336; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer;">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
    
</x-app-layout>