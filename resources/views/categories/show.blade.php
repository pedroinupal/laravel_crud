<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <header class="bg-info py-3 text-center">
                    <h1 class ="mb-0 text-white">Category ID: {{$categories -> id}}</h1>
                </header>
            </div>
        </div>
    
        
 
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-6">
                <table class="table mb-4">
                    <tbody>
                        <tr>
                            <td><b>Created at: </b>{{$categories->created_at->diffforHumans()}}</td>
                            <td><b>Updated at: </b>{{$categories->updated_at->diffforHumans()}}</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center" style="white-space: pre-wrap; font-size: larger; font-weight: bold;">Category : {{$categories->category_name}}</p>

                <table class="table">
       
                    <thead>
                        <tr>
                            <th>Note id</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notes as $note)  
                            <tr>
                                <td>{{$note -> id}}</td>
                                <td>{{$note -> title}}</td>
                                <td>{{$note -> content}}</td>
                                <td>{{$note -> category_name}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="4">There are no notes with this category</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table> 

                <div class="text-end">
                    <a href="{{ route('categories.edit',$categories->id)}}" class = "btn btn-warning">Edit category</a>

                    <form action="{{ route('categories.destroy', $categories->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <input type="submit" value="Delete category" class="btn btn-danger" onclick="return confirm('¿Are you sure you want to delete this category?')">
                    </form>    
                </div>
            </div>
        </div>

    </div>
</body>
</html>