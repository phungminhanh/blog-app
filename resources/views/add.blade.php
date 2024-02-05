@extends('layouts.master')
@section('content')

    
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Add Post</h5>
            <div class="card-body">
            @if($errors->any())
        <div class="popup alert alert-danger" id="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        // Display pop-up on page load
        $(document).ready(function(){
            $("#error-message, #success-message").fadeIn().delay(3000).fadeOut();
        });
    </script>
                <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Teaser</label>
                        <input type="text" name="teaser" class="form-control" id="">
                    </div>
                    <div class="mb-3">
             
                       <label class="block">
                                <span class="text-gray-700">Description</span>
                                <textarea id="editor" class="block w-full mt-1 rounded-md" name="content"
                                    rows="3"></textarea>
                            </label>
                    </div>
                    <div class="mb-3">
                    <label for="image">Thumbnail</label>
                  <input type="file" name="image" id="image">
          </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
   

<script>
    
        ClassicEditor
            .create(document.getElementById('editor'), {
                
                ckfinder: {
                    uploadUrl: "{{ route('image.upload') }}?_token={{ csrf_token() }}"
                },
            })
            .catch(error => {
                console.error(error);
            }); 
</script>

@endsection