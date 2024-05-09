<form action='{{route('store.book')}}' method='POST'>
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Book Title</label>
        <input type="text" class="form-control" id="title" name='title'>
      </div>
      <div class="mb-3">
        <label for="briefDescription" class="form-label">Brief Description </label>
        <input type="text" class="form-control" id="briefDescription" name='briefDescription'>
      </div>
    <div class="mb-3">
        <label for="author_name" class="form-label">Author Name</label>
        <input type="text" class="form-control" id="author_name" name='author_name'>
      </div>
      <div class="mb-3">
        <label for="biography" class="form-label">Author Biography</label>
        <input type="text" class="form-control" id="catid" name='biography'>
      </div>
    <div class="mb-3">
      <label for="category_name" class="form-label">Category Name</label>
      <input type="text" class="form-control" id="category_name" name='category_name'>
    </div>
    <div class="mb-3">
        <label for="subcategory_name" class="form-label">SUB Category name</label>
        <input type="text" class="form-control" id="subcategory_name" name='subcategory_name'>
      </div>
      <div class="mb-3">
        <label for="favorite" class="form-label">Add it to favorite</label>
        <input type="checkbox" class="form-control" id="favorite" name='favorite'>
      </div>
      <div class="mb-3">
        <label for="publicationDate" class="form-label">Publication Date </label>
        <input type="date" class="form-control" id="publicationDate" name='publicationDate'>
      </div>
      <div class="mb-3">
        <label for="src" class="form-label">Book Image Path </label>
        <input type="text" class="form-control" id="src" name='src'>
      </div>
      
    <button type="submit" class="btn btn-primary">Submit</button>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </form>