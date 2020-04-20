<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Slider</h2>

        <div class="card-body col-md-6">

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
            @endif
            <form  class="form-group-inline" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="title_english">English title</label>
                    <input class="form-control" type="text" name="title_english" value="{{ old('title_english') }}"  required />
                    <span class="text-danger">{{ $errors->first('title_english') }}</span>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="title_german">German title</label>
                    <input class="form-control" type="text" name="title_german" value="{{ old('title_german') }}"  required />
                    <span class="text-danger">{{ $errors->first('title_german') }}</span>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="title_color">Title color</label>
                    <input class="form-control" type="color" name="title_color" value="{{ old('title_color') }}"  required />
                    <span class="text-danger">{{ $errors->first('title_color') }}</span>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="title_size">Title size</label>
                    <input class="form-control" type="number" name="title_size" value="{{ old('title_size') }}"  required />
                    <span class="text-danger">{{ $errors->first('title_size') }}</span>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="image_path">Image</label>
                    <input type="file" name="image_path" required />
                    <span class="text-danger">{{ $errors->first('image_path') }}</span>
                </div>

                <div class="form-group">  
                    <label class="small mb-1" for="content_english">English_text</label>
                    <textarea class="form-control" rows="7" type="text" name="content_english" >{{ old('content_english') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content_english') }}</span>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="content_german">German text</label>
                    <textarea class="form-control" rows="7" type="text" name="content_german" >{{ old('content_german') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content_german') }}</span>
                </div>

                <!-- <div class="form-group">
                    <label class="small mb-1" for="redirect_url">Redirect_url</label>
                    <textarea class="form-control" rows="3" type="text" name="redirect_url" >{{ old('content_german') }}</textarea>
                    <span class="text-danger">{{ $errors->first('content_german') }}</span>
                </div> -->

                <div class="form-group">
                   <label class="small mb-1" for="name">Select For Redirect On Latest Artical</label>
                   <select name="redirect_url" class="select2 form-control" required>

                    @if(!empty($latest))
                    @foreach($latest as $key => $item)
                    <option value="{{ $item['id'] }}">{{ $item['title_english'] }}</option>
                    @endforeach
                    @endif

                </select>
            </div>

            <div class="form-group">
                <label class="small mb-1" for="is_active">Active</label>
                <input type="checkbox" name="is_active"  checked  />
            </div>
            <div class="form-group">
                <label class="small mb-1" for="is_slide">Is_slide</label>
                <input type="checkbox" name="is_slide"   />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
            </div>

        </form>