<form action="{{ route($route, $project->id) }}" method="POST" class="form-control row justify-content-center d-flex needs-validation">
    @csrf
    @method($method)
    <div class="col-10">
        {{-- Name --}}
        <div class="col-12 position-relative">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $project->name) }}">
            <div class="invalid-tooltip">
                @error('name')
                    {{$message}}
                @enderror
            </div>
        </div>
        {{-- Preview Image --}}
        <div class="col-12 position-relative">
            <label for="inputPreview" class="form-label">Preview Path</label>
            <textarea id="inputPreview" rows="2" class="form-control @error('preview') is-invalid @enderror" name="preview">{{  old('preview',  $project->preview) }}</textarea>
            <div class="invalid-tooltip">
                @error('preview')
                    {{$message}}
                @enderror
            </div>
        </div>
        {{-- GitHub URL --}}
        <div class="col-12 position-relative">
            <label for="inputGithubUrl" class="form-label">GitHub Repository URL</label>
            <textarea id="inputGithubUrl" rows="2" class="form-control @error('github_url') is-invalid @enderror" name="github_url">{{  old('github_url',  $project->github_url) }}</textarea>
            <div class="invalid-tooltip">
                @error('github_url')
                    {{$message}}
                @enderror
            </div>
        </div>
    </div>
    <div class="col-5">
        {{-- Complexity --}}
        <div class="col-12 position-relative">
            <label for="inputComplexity" class="form-label @error('complexity') is-invalid @enderror">Complexity</label>
            <select name="complexity[]" id="inputComplexity" class="form-control">
                <option value="1" {{ 1 === old('complexity', $project->complexity) ? 'selected' : ''}}>1</option>
                <option value="2" {{ 2 === old('complexity', $project->complexity) ? 'selected' : ''}}>2</option>
                <option value="3" {{ 3 === old('complexity', $project->complexity) ? 'selected' : ''}}>3</option>
                <option value="4" {{ 4 === old('complexity', $project->complexity) ? 'selected' : ''}}>4</option>
                <option value="5" {{ 5 === old('complexity', $project->complexity) ? 'selected' : ''}}>5</option>
            </select>
            {{-- <input type="number" id="inputComplexity"  min="1" max="5" class="form-control @error('complexity') is-invalid @enderror" name="complexity" value="{{ old('complexity', $project->complexity) }}"> --}}
            <div class="invalid-tooltip">
                @error('complexity')
                    {{$message}}
                @enderror
            </div>
        </div>
    </div>
    <div class="col-5">
        {{-- Publication Date --}}
        <div class="col-12 position-relative">
            <label for="inputDate" class="form-label">Publication Date</label>
            <input type="date" id="inputDate" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date', $project->publication_date)}}">
            <div class="invalid-tooltip">
                @error('publication_date')
                    {{$message}}
                @enderror
            </div>
        </div>
    </div>
    <div class="col-10">
        {{-- language_used --}}
        <div class="col-12  position-relative">
            <label for="inputlanguageUsed" class="form-label">Language Used</label>
            <input type="text" id="inputlanguageUsed" class="form-control @error('language_used') is-invalid @enderror" name="language_used" value="{{ old('language_used', $project->language_used)}}">
            <div class="invalid-tooltip">
                @error('language_used')
                    {{$message}}
                @enderror
            </div>
        </div>
        <a href="{{route('admin.projects.index')}}" class="btn btn-outline-dark mt-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <button type="submit" class="btn btn-outline-secondary mt-2" ><i class="fa-solid fa-paper-plane"></i></i> Submit</button>
    </div>
</form>