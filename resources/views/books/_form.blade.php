<div class="mb-3">
  <label for="title" class="form-label fw-semibold">Title</label>
  <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', @$book->title) }}">
  @error('title')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="mb-3">
  <label for="publisher" class="form-label fw-semibold">Publisher</label>
  <input type="text" name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror" value="{{ old('publisher', @$book->publisher) }}">
  @error('publisher')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="mb-3">
  <label for="qty" class="form-label fw-semibold">Qty</label>
  <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ old('qty', @$book->qty) }}">
  @error('qty')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="mb-3">
  <label for="category_id" class="form-label fw-semibold">Category</label>
  <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
    <option value="">Pilih Kategori</option>
    @foreach ($categories as $category)
      <option value="{{ $category->id }}" {{ old('category_id', @$book->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
    @endforeach
  </select>
  @error('category_id')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>

<div class="mb-3">
  <label for="image" class="form-label fw-semibold">
    Image
    <br>
    <span class="text-muted" style="font-size: x-small;">Only: jpeg,png,jpg &#xb7; Max: 2MB</span>
  </label>
  <input type="file" name="image" id="image" class="form-control mb-1 @error('image') is-invalid @enderror">
  @error('image')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>