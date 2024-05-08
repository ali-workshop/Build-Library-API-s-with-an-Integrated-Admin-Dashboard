<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Visitore page</title>


  <a href="{{route('Category.filer')}}" >Filter-Based-Category</a><br><br>
  <a href="{{route('subCategory.filer')}}" >Filter-Based-SUB-Category</a><br><br>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    th, td {
      border: 1px solid #dddddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <table>
    <tr>
      <th>Title</th>
      <th>Brief Description</th>
      <th>Publication Date</th>
      <th>Book category</th>
      <th>Book sub Category</th>
      <th>Image Book</th>
    </tr>
    @foreach ($books as $book )
    <tr>
      <td>{{$book->title}}</td>
      <td>{{$book->briefDescription}}</td>
      <td>{{$book->publicationDate}}</td>
      <td>{{$book->category->name}}</td>

      <td>
{{        $book->subcategories->name }}
          

      </td>    
    <td>
        
        <img src="{{ asset($book->src) }}" alt="Book Image" style="width: 100px; height: auto;">
    </td>

  </tr>
    @endforeach
  </table>  
</body>
</html>
