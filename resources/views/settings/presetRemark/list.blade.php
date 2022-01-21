@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List of Preset Remarks</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <section class="content">
        <div class="card">
            <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-info alert-dismissible">{{ $message }} <button type="button"
                            class="close" data-dismiss="alert">×</button></div>
                @endif
                <table id="location" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Preset Remarks</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $i =0; @endphp
                        @foreach ($remarks as $remark)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $remark->preset_remark_type }}</td>
                                <td>{{ isset($remark->created_by)?$remark->created_by :'N/A' }}</td>
                                <td>{{ isset($remark->updated_by)?$remark->updated_by :'N/A' }}</td>
                                <td>
                                    <form action="{{ route('preset-remarks.destroy', $remark->id) }}" method="POST">
                                        @CSRF
                                        @method('DELETE')
                                        <a href="{{ route('preset-remarks.edit', $remark->id) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure to delete?')"><i
                                                class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $("#location").DataTable();
        });
    </script>

@endsection
