<form action="{{ route('subCategory.filer.update') }}" method="post">
    @csrf
    <div class="form">
      <label>Sub Category Filter</label>
      <input type="text" class="form-control" id="subcat" name="subcat" placeholder="Enter SUB category filter">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>