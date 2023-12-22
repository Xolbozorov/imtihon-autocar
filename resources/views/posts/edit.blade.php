<x-layouts.main>

    <x-slot:title>
       Postni o'zgartirish #{{ $post->id }}
    </x-slot:title>


    <x-page-header>
        Postni o'zgartirish #{{ $post->id }}
    </x-page-header>

    <div class="container">
        <div class="col-md-7">
            <div class="contact-form">
                <div id="success"></div>
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                       <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                       </ul>
                   </div>
                @endif --}}
                <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="control-group mb-3">
                        <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="Sarlavha"/>
                        @error('title')
                           <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="control-group">
                        <input type="file" class="form-control" id="subject" placeholder="photo"/>
                        <p class="help-block text-danger"></p>
                    </div> --}}
                    <div class="control-group mb-3">
                        <textarea class="form-control" rows="3" name="short_content" placeholder="short_content">{{ $post->short_content }}</textarea>
                        @error('short_content')
                        <p class="help-block text-danger">{{ $message }}</p>
                     @enderror
                    </div>
                    <div class="control-group mb-3">
                        <textarea class="form-control" rows="5" name="content" placeholder="content">{{ $post->content }}</textarea>
                        @error('content')
                        <p class="help-block text-danger">{{ $message }}</p>
                     @enderror
                    </div>
                    <div class="flex">
                        <button class="btn btn-custom" type="submit">Saqlash</button>
                        <a href="{{ route('posts.show',['post' => $post->id]) }}" class="btn btn-custom" type="submit">bekor qilish</a href="{{ route('posts.show',['post' => $post->id]) }}">
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layouts.main>