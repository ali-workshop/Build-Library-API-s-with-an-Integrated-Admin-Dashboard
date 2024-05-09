<form action='{{route('store.sub.category')}}' method='POST'>
    @csrf
    <div class="mb-3">
      <label for="cat" class="form-label">SUB Category Name</label>
      <input type="text" class="form-control" id="cat" name='catName'>
    </div>
    <div class="mb-3">
        <label for="catid" class="form-label">Category ID</label>
        <input type="integer" class="form-control" id="catid" name='category_id'>
      </div>
  
    <button type="submit" class="btn btn-primary">Submit</button>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </form>