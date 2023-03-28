<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
     <div class="container">
        <div class="row">
            @include('errors')

            <div class="col-lg-12 mt-5">
                <form action="{{route('dashboard')}}" method="POST" class="form-group" enctype="multipart/form-data">
                    {{@csrf_field()}}
                         {{-- name start  --}}
                          <div style="display:flex" class="mb-5">
                           <div class="col-4" >
                            <h3>Name:</h3>
                           </div>
                           <div class="col-8">
                            <input type="text" class="form-control" name="name" placeholder="name">
                           </div>
                          </div>
                         {{-- name end  --}}
                         {{-- email start   --}}
                          <div style="display:flex" class="mb-5">
                           <div class="col-4" >
                            <h3>Email:</h3>
                           </div>
                           <div class="col-8">
                            <input type="email" name="email" class="form-control" placeholder="email">

                           </div>
                          </div>
                         {{-- email end  --}}
                         {{-- image start   --}}
                          <div style="display:flex" class="mb-5">
                           <div class="col-4" >
                            <h3>image:</h3>
                           </div>
                           <div class="col-8">
                            <input type="file" name="image" class="form-control">
                           </div>
                          </div>
                         {{-- image end  --}}

                         {{-- gender start   --}}
                          <div style="display:flex" class="mb-5">
                           <div class="col-4" >
                            <h3>Gender:</h3>
                           </div>
                           <div class="col-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                                <label class="form-check-label" for="inlineRadio1">male</label>

                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input"  type="radio" name="gender" id="inlineRadio2" value="female">
                                <label class="form-check-label" for="inlineRadio2">female</label>
                              </div>
                           </div>
                          </div>
                         {{-- gender end  --}}
                         {{-- skills start   --}}
                          <div style="display:flex" class="mb-3">
                           <div class="col-4" >
                            <h3>Skills:</h3>
                           </div>
                           <div class="col-8" style="display: flex">
                            <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="skills[]" id="Laravel" value="Laravel" aria-label="...">
                            <label for="Laravel">Laravel</label><br><br>
                            <input class="form-check-input" type="checkbox" name="skills[]"  id="Ajax" value="Ajax" aria-label="...">
                            <label for="Ajax">Ajax</label><br><br>
                            <input class="form-check-input" type="checkbox" name="skills[]"  id="MySQL" value="MySQL" aria-label="...">
                            <label for="MySQL">MySQL</label>
                            </div>
                            <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="skills[]"  id="Codeigniter" value="Codeigniter" aria-label="...">
                            <label for="Codeigniter">Codeigniter</label><br><br>
                            <input class="form-check-input" type="checkbox" name="skills[]"  id="VUE_JS" value="VUE JS" aria-label="...">
                            <label for="VUE_JS">VUE JS</label><br><br>
                            <input class="form-check-input" type="checkbox" name="skills[]"  id="API" value="API" aria-label="...">
                            <label for="API">API</label>
                        </div>
                           </div>

                          </div>
                             <div style="text-align: right" class="mb-5">
                        <input  type="submit" value="submit" class="btn btn-success">

                             </div>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-dark">
                    <thead>
                        <th>#</th>
                        <th>Nama</th>
                        <th>E-mail</th>
                        <th>gender</th>
                        <th>skills</th>
                        <th>Image</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                      @forelse ( $dashboard as $key=> $dashboards)
                      <tr>
                        <td>{{ $key+1}}</td>
                        <td>{{$dashboards->name}}</td>
                        <td>{{ $dashboards->email}}</td>
                        <td>{{ $dashboards->gender}}</td>
                        <td>
                             @php
                                 $skill=json_decode($dashboards->skills)

                             @endphp
                             @foreach ($skill as $skills )
                                  {{$skills}},
                             @endforeach
                        </td>
                        <td><img src="{{asset('images/'.$dashboards->image)}}" style="height: 100px;widht:200px" alt=""></td>
                        <td>
                            <a class="btn btn-primary" href="{{route('showedit',$dashboards->id)}}">edit</a>
                            <a class="btn btn-danger" href="{{route('delete',$dashboards->id)}}">delete</a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center">no data !</td>
                    </tr>
                      @endforelse
                    </tbody>
                </table>
            </div>
        </div>
     </div>
</body>
</html>
