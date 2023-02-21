
<form action="{{ route($route, $project->id) }}" method="POST" class="form-floating">
    @csrf
    @method($method)
    <div class="row mb-3">
                    {{-- Name --}}
        <div class="col-md">
            <div class="form-floating">
                <input type="text" class="form-control  @error('name') is-invalid @enderror" id="nameInput" placeholder="My Project Name" value="{{ old('name', $project->name) }}" name="name">
                <label for="nameInput">Insert the project name</label>
                <div id="nameInput" class="invalid-feedback">
                @error('name')
                    {{$message}}
                @enderror
                </div>
            </div>
        </div>
            {{-- Complexity --}}
        <div class="col-md">
            <div class="form-floating">
                <select name="complexity" id="complexitySelect" class="form-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label for="complexitySelect">Project Complexity</label>
            </div>
        </div>
    </div>
    <div class="row g-3">
                        {{-- Preview Image --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control @error('preview') is-invalid @enderror" placeholder="Image Preview" id="inputPreview" name="preview">{{  old('preview',  $project->preview) }}</textarea>
                <label for="inputPreview">Insert a Preview Image</label>
                <div id="inputPreview" class="invalid-feedback">
                    @error('preview')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
                    {{-- GitHub URL --}}
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control @error('github_url') is-invalid @enderror" placeholder="GitHub URL" id="inputGithubUrl" name="github_url">{{  old('github_url',  $project->github_url) }}</textarea>
                <label for="inputGithubUrl">Insert a GitHub reposity URL</label>
                <div id="inputGithubUrl" class="invalid-feedback">
                    @error('github_url')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        {{-- Publication Date --}}
        <div class="col-md">
            <div class="form-floating">
                <input type="date" class="form-control  @error('publication_date') is-invalid @enderror" id="dateInput" placeholder="My Project Name" value="{{ old('publication_date', $project->publication_date) }}" name="publication_date" >
                <label for="dateInput">Insert the project publication date</label>
                <div id="validationServer05Feedback" class="invalid-feedback">
                    @error('publication_date')
                        {{$message}}
                    @enderror
                </div>
            </div>
        </div>
                        {{-- Language Used --}}
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control  @error('language_used') is-invalid @enderror" id="languageInput" placeholder="My Project Name" value="{{ old('language_used', $project->language_used) }}" name="language_used">
                    <label for="languageInout">Enter the programming language used</label>
                    <div id="validationServer05Feedback" class="invalid-feedback">
                        @error('language_used')
                            {{$message}}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-primary"><i class="fa-regular fa-paper-plane"></i> Submit</button>
    </div>
</form>