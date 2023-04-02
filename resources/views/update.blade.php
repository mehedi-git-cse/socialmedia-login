
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

    <title>Update Profile</title>
</head>

<body>
    <div class="container">
    @foreach ($users as $user)
    <div class="row">
            <div class="container  col-4">
                <form class="form mt-5" action="{{url('upload')}}" enctype="multipart/form-data" method="post">
                    {{ csrf_field() }}
                    <div class="m-2">
                        <label for="image">Add Image</label><br>
                        <input class="form-control" type="file" name="image" placeholder="image">
                    </div>
                    <div class="m-2">
                        <label for="bio">Biodata</label><br>
                        <input class="form-control" type="text" name="bio" value="{{$user->bio}}">
                    </div>
                    <div class="m-2">
                        <label for="location">Location</label><br>
                        <input class="form-control" type="text" name="location"  value="{{$user->location}}">
                    </div>
                    <div class="m-2">
                        <label for="school">School</label><br>
                        <input class="form-control" type="text" name="school"  value="{{$user->school}}">
                    </div>
                    <div class="m-2">
                        <label for="college">College</label><br>
                        <input class="form-control" type="text" name="college"  value="{{$user->college}}">
                    </div>
                    <div class="m-2">
                        <label for="university">University</label><br>
                        <input class="form-control" type="text" name="university"  value="{{$user->university}}">
                    </div>
                    <div class="m-2">
                        <label for="experience">Experience</label><br>
                        <input class="form-control" type="text" name="experience"  value="{{$user->experience}}">
                    </div>
                    <div class="m-2 d-flex justify-content-center">
                        <input type="submit" class="btn btn-primary" value="Update" name="Update">
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>

@endsection



