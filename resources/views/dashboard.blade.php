<x-app-layout title="Dashboard">

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('dashboard') }}">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('dashboard/history') }}">
                            <span data-feather="rotate-ccw"></span>
                            History
                        </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="mail"></span>
                            Inbox
                        </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Profile</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">
                            <span data-feather="log-out"></span>
                            Logout
                            </a>
                        </li>
                    </ul>


                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a class="btn btn-sm btn-outline-primary" href="{{ url('new-tracking') }}">
                                <span data-feather="plus-square"></span>
                                Add New
                            </a>
                            <a class="btn btn-sm btn-outline-danger" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <span data-feather="download-cloud"></span>
                                Export
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-sm" style="cursor: pointer;">
                        <thead>
                            <tr>
                                <th scope="col">Control Number</th>
                                <th scope="col">Asset Identification</th>
                                <th scope="col">Item Description</th>
                                <th scope="col">Station Number/Location</th>
                                <th scope="col">Date</th>
                                <th scope="col">Facilitated by</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr data-bs-toggle="collapse" data-bs-target="#target_id_{{ $record->control_id }}" class="accordion-toggle">
                                    <td scope="row">#{{ $record->control_id }}</td>
                                    <td>{{ $record->asset_identification_number }}</td>
                                    <td>{{ $record->item_description }}</td>
                                    <td>{{ $record->station }}</td>
                                    <td>{{ $record->date }}</td>
                                    <td>{{ $record->facilitate }}</td>
                                </tr>
                                {{-- Target --}}
                                <tr>
                                    <td colspan="6" class="hiddenRow">
                                        <div id="target_id_{{ $record->control_id }}" class="accordion-body accordion-collapse collapse">
                                            <div class="container mb-4 mt-4">
                                                <div class="row">
                                                    <div class="col-md-6 fs-6">
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Date: </label></span>
                                                            <span><label for="">{{ $record->date }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Control Number: </label></span>
                                                            <span><label for="">{{ $record->control_id }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Asset Identification Number: </label></span>
                                                            <span><label for="">{{ $record->asset_identification_number }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Item Description: </label></span>
                                                            <span><label for="">{{ $record->item_description }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Serial Number: </label></span>
                                                            <span><label for="">{{ $record->serial_number }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Facilitated By: </label></span>
                                                            <span><label for="">{{ $record->facilitate }}</label></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 fs-6">
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Quantity: </label></span>
                                                            <span><label for="">{{ $record->quantity }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Remarks: </label></span>
                                                            <span><label for="">{{ $record->remarks }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">User: </label></span>
                                                            <span><label for="">{{ $record->user }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Account: </label></span>
                                                            <span><label for="">{{ $record->account }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Station Number/Location: </label></span>
                                                            <span><label for="">{{ $record->station }}</label></span>
                                                        </div>
                                                        <div class="flex-column mb-3">
                                                            <span class="fw-bold"><label for="ControlNum">Status: </label></span>
                                                            <span class="badge bg-success"><label for="">Fulfilled</label></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>



                {{-- Modal --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Export</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            ...
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                        </div>
                    </div>


            </main>

        </div>
    </div>
    <script>
        $(document).ready(function(){

              function fetch_customer_data(query = ''){
                    $.ajax({
                          url:"{{ route('search') }}",
                          method: 'GET',
                          data:{query:query},
                          dataType:'json',
                          success:function(data){
                                $('tbody').html(data.table_data);
                          }
                    })
              }

              $(document).on('keyup', '#search', function(){
                    var query = $(this).val();
                    fetch_customer_data(query);
              });
        });
  </script>
    @vite(['resources/js/app.js'])
</x-app-layout>