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
    <title>ControlPanel</title>
</head>
<body>


<form action="/insert"method="post" enctype="multipart/form-data">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">

            <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">add new task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="form-group card-header ">

        {{csrf_field()}}
        <label class="card-text">Move Name</label>
        <input class="form-control card-body" type="text" name="name" required>
    </div>

    <div class="form-group card-header">
        {{csrf_field()}}
        <label class="card-text">Show time</label>
      <input class="form-control card-body" type="time" name="showtime"required>
    </div>

    <div class="form-group card-header">

            <div class="custom-file">
                <input type="file" name="src" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02">Choose image</label>


        </div>

    </div>

    <div class="form-group card-header">
        <label class="card-text">Url</label>

        <input type="url" name="url" class="form-control card-body" id="inputGroupFile02">


    </div>
    <div class="form-group card-header">
        <label class="card-text">Details </label>
       <textarea class="form-control card-body" maxlength="153" name="content" required> </textarea>


    </div>

    <div>

        <div><input   class="btn btn-block btn-lg btn-light " type="submit" name="submit" value="add" ></div></div>

    </div>
    </div>
    </div>
</form>
@if((session()->has('success')))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session()->get('success')}}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    @endif
<br><br>

    <table class="table mx-auto table-bordered" style="width:1000px;">

        <tr>

            <th class="text-center font-weight-light"  scope="col">اسم المسلسل</th>
            <th class="text-center font-weight-light"  scope="col">نبذة عن المسلسل </th>
            <th class="text-center font-weight-light"  scope="col">رابط المشاهدة </th>
            <th class="text-center font-weight-light"  scope="col">مواعيد العرض </th>
            <th class="text-center font-weight-light"  scope="col">العملية</th>
            <th class="text-center font-weight-light"  scope="col">حالة المشاهدة</th>
        </tr>

            @foreach($tarama as $taramas)




 <tr class="btn-outline-dark">


 {{--<td><img class="figure-img" src="{{$taramas->src}}"></td>--}}
 <td  class="text-center font-weight-light" scope="row" >{{$taramas->name}}</td>
 <td  class="text-center font-weight-light" scope="row" class="text-center" >{{$taramas->content}}</td>
 <td  class="text-center font-weight-light " scope="row"><a href="{{$taramas->url}}" class="text-info" target="_blank"><i class="fas fa-paper-plane"></i></a></td>
 <td  class="font-weight-bold" scope="row"><input class="border-0 text-center btn-outline-warning" disabled type="time" value="{{$taramas->showtime}}"></td>
     <td  class="text-center font-weight-light" scope="row"><a data-toggle="modal" href="#"  data-target="#confrim{{$taramas->id}}"><i class="far fa-trash-alt font-weight-light text-danger"></i></a>
         <a data-toggle="modal" href="#" data-target="#update_model{{$taramas->id}}"><i class="far fa-edit text-info"></i></a></td>

         <div class="modal fade" id="confrim{{$taramas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

             <div class="modal-dialog" role="document">
                 <div class="modal-content">

                     <div class="modal-header">

                         <h5 class="modal-title" id="exampleModalLongTitle">Are you sure ?</h5>

                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>

                         </button>
                     </div>
                     <div class="form-group card-header text-center ">

                         <a class=" btn btn-outline-success"  href="{{route('delete',['id'=>$taramas->id])}}">Yes</a>
                         <a class="btn btn-outline-danger " data-dismiss="modal"  >No</a>
                     </div>

                 </div>
             </div>
         </div>

<form action="/update"method="post">
    <div class="modal fade" id="update_model{{$taramas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Update informations</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="form-group card-header ">

    {{csrf_field()}}
    <label class="card-text">Move Name</label>  {{csrf_field()}}
    <input type="text" hidden  name="id" value="{{$taramas->id}}">  {{csrf_field()}}
    <input type="text" hidden name="status" value="{{$taramas->status}}">  {{csrf_field()}}
    <input class="form-control card-body" type="text" name="name" value="{{$taramas->name}}">  {{csrf_field()}}
</div>

<div class="form-group card-header">
    {{csrf_field()}}
    <label class="card-text">Show time</label>
    <input class="form-control card-body" type="time" name="showtime" value="{{$taramas->showtime}}">
</div>



<div class="form-group card-header">
    <label class="card-text">Url</label>

    <input type="url" name="url" class="form-control card-body" id="inputGroupFile02" value="{{$taramas->url}}">


</div>
<div class="form-group card-header">
    <label class="card-text">Details </label>
    <textarea class="form-control card-body" maxlength="153" name="content">{{$taramas->content}} </textarea>


</div>

<div>

    <div><input class="btn btn-block btn-lg btn-light " type="submit" name="submit" value="update"></div></div>

            </div>
        </div>
    </div>
</form>


@if($taramas->status==true)
                        <td class="text-center">
                   <a class="text-success" href="{{route('status2',['id'=>$taramas->id])}}"><i class="far fa-eye"></i> تمت العرض</a>
           </td>
               @endif

               @if($taramas->status ==false)
                        <td class="text-center">
                   <a class="text-danger" href="{{route('status',['id'=>$taramas->id])}}"><i class="fas fa-eye-slash"></i>  شاهد</a>
                    </td>
@endif

            </tr>
        @endforeach


<tfoot><tr>
<td colspan="3" class="text-center"><a style="width:100%; " class="btn btn-outline-primary " data-toggle="modal"  data-target="#exampleModalLong">
        أضف مسلسل جديد
    </a></td>
<td  class="text-center" colspan="2"><a style="width:100%; " href="{{route('home')}}" class="btn btn-outline-info text-center">
        إذهب الى صفحة العرض
    </a></td>
    <td  class="text-center" colspan="2"><a style="width:100%; "  href="{{route('reset')}}" class="btn btn-outline-warning text-center">
  إعادة مشاهدة الجميع
    </a></td>
</tr>
</tfoot>
    </table>




</body>
</html>