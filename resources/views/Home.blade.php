
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#">Main</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">News</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">library</a>
    </li>
</ul>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        @foreach($news as $new)
            @php($idte =$new->status)
            @if($idte == 1)
            @php($a=1)
            @php($a+=1)
        <li data-target="#carouselExampleIndicators" data-slide-to="{{$a}}"></li>
            @endif
        @endforeach



    </ol>
    <div class="carousel-inner">

        @foreach($news as $new)
        @endforeach
            <div id="carouselExampleSlidesOnly"class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" height="600" src="{{$new->src}}" alt="{{$new->name}}">
                        <div class="carousel-caption">
                            <h5>{{$new->name}}</h5>
                            <p>{{$new->content}}</p>
                        </div>
                    </div>

                    @foreach($news as $new)
                        @php($idte =$new->status)
                        @if($idte == 1)
                    <div class="carousel-item">
                        <img class="d-block w-100" height="600" src="{{$new->src}}" alt="{{$new->name}}">
                        <div class="carousel-caption">
                            <h5>{{$new->name}}</h5>
                            <p>{{$new->content}}</p>
                        </div>
                    </div>
                        @endif
                    @endforeach
                </div>
            </div>
            </div>



</div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>
<h1 class="text-center alert alert-warning">جميع مسلسلاتك</h1>
<div class="container">

    <div class="row">

        @foreach($news as $new)

        <div class="col-4"><br>

        <div class="card" style="width: 18rem;">
            <img class="card-img-top" height="200" src="{{$new->src}}" alt="Card image cap">
            <div class="card-body float-right">
                @if($new->status==true)

                        <a class="text-success float-right" href="{{route('status2',['id'=>$new->id])}}"><i class="far fa-eye"></i> تمت العرض</a>

                @endif

                @if($new->status ==false)

                        <a class="text-danger float-right" href="{{route('status',['id'=>$new->id])}}"><i class="fas fa-eye-slash"></i>  شاهد</a>

                @endif
                    <br>
                <h5 class="card-title float-right">{{$new->name}}</h5>
                    <br><hr>
                <p class="card-text float-right">{{$new->content}}</p>
                    <br><hr>
                <a href="{{$new->url}}" target="_blank" class="btn btn-outline-info float-right">شاهد الحلقة</a>

            </div>
        </div>
    </div>
        @endforeach

    </div>

</div>
</body>
</html>