<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel-10 CRUD</title>
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row shadow">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header  bg-primary">
                    <h4 class="text-center">Laravel-10 CRUD Operation</h4>
                </div>

                <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('/')}}">Add InFo</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <h4 class="text-success text-center">{{session('message')}}</h4>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sl.</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @php $i=1 @endphp
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$blog->blog_title}}</td>
                            <td>{{$blog->author}}</td>
                            <td>{{$blog->category}}</td>
                            <td>{{$blog->description}}</td>
                            <td>
                                <img src="{{asset($blog->image)}}" alt="" width="130px" height="100px">
                            </td>

                            <td>
                                <a href="{{route('edit.blog',['id' => $blog->id])}}" class="btn btn-success btn-sm">Edit</a>
                                <form action="{{route('delete.blog',['id' => $blog->id])}}" >
                                    @csrf
                                    <input type="hidden" name="blog_id" class="form-control"  value="{{$blog->id}}">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure data deleted !!!')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
