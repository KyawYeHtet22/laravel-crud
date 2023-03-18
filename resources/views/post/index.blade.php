<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            padding: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5>Posts List</h5>
                <a href="{{ url('/posts/create') }}">
                    <button class="btn btn-primary btn-sm float-end mb-2">
                        <i class='fa fa-plus-circle'></i> Add New
                    </button>
                </a>
                @if(Session('successAlert'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <strong>{{ Session('successAlert') }}</strong>
                        <button class='btn-close' data-bs-dismiss='alert'></button>
                    </div>
                @endif
                <table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                <form action="{{ url('posts/'.$post->id) }}" method='POST'>
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('/posts/'.$post->id.'/edit') }}">
                                    <button type='button' class='btn btn-success btn-sm'>
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                                </a>
                                <button type='submit' class='btn btn-danger btn-sm' onclick="return confirm('Do you really want to delete?')">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>