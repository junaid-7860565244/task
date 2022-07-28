 <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



<table id="showBooksIn" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>NUMBER</th>
                    <th>IMAGE</th>
                    <th>Action</th>
                   
                    
                </tr>
            </thead>

            @foreach($Employee as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['name']}}</td>
                <td>{{$row['email']}}</td>
                <td>{{$row['number']}}</td>
              <!--    <td><img src="$row->image" width=50 height=50></td> -->

           <td><img src="{{url('images/', $row->image )}}" alt="img" width="50px" height="50px"></td>
            <td><a href="{{ url('employee', $row->id) }}">edit<a>
            <td>
                   


                    <form method="POST" action="{{ route('deleteuser', $row->id) }}">
                            @csrf
                            <input name="_method" type="hidden" name="Id">

                       <button onclick="deleteuser()"class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
         <script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }

            
          });
      });
  
</script>
  

                         </td>
           </td>
            </tr>
            @endforeach
 </table>

        <td>
            <a href="{{url('/employee/add')}}"><button type="button" class="btn btn-primary">BACK TO INSERT RECORD</button> </a>






       

                           