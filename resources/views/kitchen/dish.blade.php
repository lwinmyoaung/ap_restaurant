@extends('layouts.master')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kitchen Panel</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dishes</h3>
                <a href="dish/create" class="btn btn-success" style="float: right;">Create</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">
                  {{ session('message') }}
                </div>
                @endif
                
                <table id="dishes" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Dish Name</th>
                    <th>Category Name</th>
                    <th>Created</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($dishes as $dish)
                  <tr>
                    <td>{{ $dish->name }}</td>
                    <td>{{ $dish->category->name }}</td>
                    <td>{{ $dish->created_at }}</td>
                    <td>
                      <div class="form-row">
                        <a style="height: 40px; margin-right: 10px; " href="dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
                        <form action="/dish/{{ $dish->id }}" method='POST'>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this dish?');">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <form action="logout" method="POST">
        @csrf
        <button class="btn btn-primary">Logout</button>
      </form>
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<script>
  $(function () {
    $('#dishes').DataTable({
      "paging": true,
      "pagelength": 10,
      "lengthChange": false,
      "ordering": true,
      "info": true,
    });
  });
</script>