<!DOCTYPE html>
<html>

<head>
    <title>Image Gallery</title>
    <style>
        body{
            background-color: #e8e8e8 !important;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    @include('navbar')

    @if(count($thumbnails)==0)
        <div style="font-family:Consolas;margin-top:100px;width: 100%;text-align: center;vertical-align: middle">
            <h1>No Images Yet ☹</h1>
            <h2>Sign up now and post your images 😉</h2>
        </div>

    @endif

    @for($i=0;$i<count($thumbnails);$i++)
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="/storage/images/{{$thumbnails[$i]->imageUrl}}" style="width:100%;height:280px">
                <div class="caption">
                    <p>{{$thumbnails[$i]->imageDesc}}</p>
                    <hr>
                    <h6>Uploaded by: {{\App\User::find($thumbnails[$i]->user_id)->name}}</h6>
                    @if(Auth::user() && Auth::user()->id == $thumbnails[$i]->user_id)
                    <div style="width:100%;height:100%;vertical-align: middle;text-align: center" >
                        <a onclick="return confirm('Are you sure you want to delete this image?')" href="delete/{{$thumbnails[$i]->id}}" class="btn btn-danger">Delete</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endfor

</body>
</html>