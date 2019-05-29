<!DOCTYPE html>
<html>

<head>
    <title>Image Gallery</title>
    <style>
        body{
            background-color: #e8e8e8 !important;
        }
        #url{
            width: 100%;
            margin-bottom: 20px;
            font-size: 12pt;
        }
        #desc{
            width: 100%;
            height: 200px;
            font-size: 14pt;
            resize: none;
            overflow: auto;
        }
        #submit{
            position: absolute;
            left: 40%;
            width: 100px;
            height: 40px;
            font-size: 12pt;
            margin-top: 20px;
        }
        #content{
            position: absolute;
            height: 400px;
            width: 500px;
            margin: -200px 0 0 -300px;
            top: 50%;
            left: 50%;
            box-shadow: 2px 2px 15px black;
        }
        #title{
            width: 100%;
            height: 50px;
            background-color: #a0a0a0;
            color: black;
            font-family: "Courier New";
            font-weight: bold;
            font-size: 22pt;
            border-bottom: 3px rgba(0, 0, 0, 0.61) solid;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    @include('navbar')

    <div id="content">
        <div id="title" >&nbsp;Dashboard</div>
        <form style="margin: 20px" action="/upload" method="post" enctype="multipart/form-data">
            <input id="url" name="url" type="file" value="Choose Image">
            <textarea name="desc" id="desc" placeholder="Image Description"></textarea>
            <br>
            <input class="btn btn-primary" id="submit" type="submit" value="Submit">
            {{ csrf_field() }}
        </form>
    </div>

</body>
</html>