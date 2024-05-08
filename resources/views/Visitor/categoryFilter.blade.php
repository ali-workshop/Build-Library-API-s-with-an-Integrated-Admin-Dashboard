<form action="{{ route('Category.filer.update') }}" method="post">
    @csrf
    <div class="form">
        <label>Category Filter</label>
        <input type="text" class="form-control" name="cat" placeholder="Enter category filter">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  