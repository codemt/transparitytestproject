<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Admin Dashboard</title>
</head>
<body style="background-image: url(https://www.elsa-belgium.org/wp-content/uploads/2016/09/header-background.jpg)">

    
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('/') }}" >Hello Admin  </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarColor03">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                      </li>
              </ul>
            </div>
          </nav>
          <div class="container" style="background-color:#FFF">
    
            <table class="table table-stripped">


                    <thead>
    
                                <tr> 
                                       <th> Users  </th>  
                                       <th> Status  </th>  
                                       <th> Approve  </th>     
                                </tr>
    
                    </thead>
    
                    <tbody>
                        @forelse($users as $user)
                            <tr>
    
                                    <td>{{ $user->firstname }}  </td> 
                                    <td> <label for="approved"  name="approved"> <?php  if($user->approved == 1 ) { echo "Approved";}   else { echo "Not Approved"; } ?> </label> </td>
                                    <td>
                                        
                                            <form action="{{url('/approve-user')}}" method="POST">
                                                {{ csrf_field() }} 
                                            <input type="checkbox" <?php  if($user->approved == 1 ) { echo "Checked";} ?> name="approved">
                                            <input type="hidden" name="commentId" value="{{  $user->id }}">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                    </form>
                                    
                                    
                                    
                                    
                                    
                                    </td>
                            </tr>
                        @empty
                        <h4> No data </h4>
                        @endforelse
                    </tbody>
    
    
    
    
        </table>
    
    
    
          </div>
    
         

          

</body>
</html>