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
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <div class="card-header">
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

                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('all.blog')}}">All InFo</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="card-body">
                    <form class="row g-3" action="{{route('update.blog')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="blog_id" class="form-control"  value="{{$blog->id}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Blog Title</label>
                            <input type="text" name="blog_title" class="form-control"  value="{{$blog->blog_title}}">
                        </div>

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Author Name</label>
                            <input type="text" name="author" class="form-control" value="{{$blog->author}}">
                        </div>

                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Category</label>
                            <input type="text" name="category" class="form-control" value="{{$blog->category}}">
                        </div>

                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Description</label>
                            <textarea name="description" class="form-control" id="" cols="12" rows="4">{{$blog->description}}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label for="inputCity" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" id="inputCity">
                            <img src="{{asset($blog->image)}}" alt="" width="80px" height="80px">
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary form-control">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

