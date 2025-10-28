<html>
    <head>
    <title></title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    </head>
<body>
<div class="card-body">
  @if(session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
  @endif
        <!-- ./row -->
        <div class="row">
          <div class="col-12">
            <h4>Order List</h4>
          </div>
        </div>
        <!-- ./row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <form action="{{ route('order.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            @foreach($dishes as $dish)
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{url('/images/'.$dish->image)}}" alt="" width="125" height="100"><br>
                                        <label for="">{{ $dish->name }}</label><br>
                                        <input type="number" value="" name="{{ $dish->id }}"><br>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                          <select name="table" id="">
                          @foreach($tables as $table)
                          <option class="form-control" value="{{$table->id}}">{{ $table->number }}</option>
                          @endforeach
                          </select>
                        </div>
                        <input type="submit" class="btn btn-success" value="submit">
                     </form>    
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <table id="dishes" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>Table Number</th>
                        <th>Dish Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($orders as $order)
                      <tr>
                        <td>{{ $order->table_id }}</td>
                        <td>{{ $order->dish->name }}</td>
                        <td>{{ $status[$order->status] }}</td>
                        <td>
                          <div>
                            <a href="/order/{{$order->id}}/serve" class="btn btn-warning">Serve</a>
                          </div>
                        </td>
                      </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>

</div>


<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="//dist/js/adminlte.min.js"></script>
<!-- DataTables  & /plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

</body>
</html>