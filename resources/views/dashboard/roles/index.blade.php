@extends('dashboard.layouts.index')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ $title }}</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('dashboard.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">{{ $title }}</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>List {{ $title }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table nowrap" id="datatable" style="width: 100%">
                            <thead>                                 
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            scrollCollapse: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            order: [[1,'asc']],
            ajax: {
                url: "{{ route('getjsonroles') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: function (d) {
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>
@endsection