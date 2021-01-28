<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
   <section  style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header"> 
                            All Student   <a href="add-student " class="btn btn-info">add student </a>

                        </div>
                        <div class="card-body">
                           <table class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>Name</th>
                                       <th>profile image</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($students as $student)
                                   <tr>
                                       <td>{{$student->name}}</td>
                                       <td><img src="{{asset('images')}}/{{$student->image}}" style="max-width: 60px; " alt=""></td>
                                       <td>
                                           <a href="edit-student/{{$student->id}}" class="btn btn-info">edit </a>
                                           <a href="delete-student/{{$student->id}}" class="btn btn-info" style="color: red;">Delete </a>

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

   </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

 

</body>

</html>