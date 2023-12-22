<x-layouts.main>

    <x-slot:title>
       NEW POST
    </x-slot:title>


    <x-page-header>
       NEW POST
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
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="control-group mb-3">
                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Sarlavha"/>
                    @error('title')
                       <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="control-group mb-3">
                    <label>Category</label>
                    <select name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="control-group mb-3">
                    <label>Tags</label>
                    <select name="tags[]" multiple>                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- <div class="control-group">
                    <input type="file" class="form-control" id="subject" placeholder="photo"/>
                    <p class="help-block text-danger"></p>
                </div> --}}
                <div class="control-group mb-3">
                    <textarea class="form-control" rows="3" name="short_content" placeholder="short_content">{{ old('short_content') }}</textarea>
                    @error('short_content')
                    <p class="help-block text-danger">{{ $message }}</p>
                 @enderror
                </div>
                <div class="control-group mb-3">
                    <textarea class="form-control" rows="5" name="content" placeholder="content">{{ old('content') }}</textarea>
                    @error('content')
                    <p class="help-block text-danger">{{ $message }}</p>
                 @enderror
                </div>
                <div>
                    <button class="btn btn-custom" type="submit">Saqlash</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-layouts.main>