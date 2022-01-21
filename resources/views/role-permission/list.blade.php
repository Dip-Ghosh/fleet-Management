@extends('layouts.admin.master')
@section('dashboard')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User wise Module Permission</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<style>
    #permission-area {
display: contents !important;
}
#display-modules{
padding-left: 50px;
padding-top: 25px;
}
</style>
    <section class="content">
        <form id="form" method="GET" action="{{ route('permissionModule-show') }}">
            <div class="card">
                <div class="card-header">
                    <div class="card text-white" style="background-color: #183757;">
                        @if ($errors->any())
                            <div class="alert alert-dismissible fade show" style="color: black; background-color: #d4edda"
                                role="alert">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role_name">Role </label>
                                        <select name="role_name" id="role_name" class="form-control"
                                            onchange="getUsers(this.value)">
                                            <option value="" class="select">select an Option</option>
                                            @foreach ($roles as $role)
                                                @if (!in_array($role['name'], ['Passenger', 'Driver']))
                                                    <option value="{{ $role['name'] }}">
                                                        {{ $role['name'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role_name">User </label>
                                        <select name="user_id" id="user_id" class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4" style="margin-top: 31px;">
                                    <button type="button" id="form-submit" class="form-group form-control btn btn-info"
                                        onclick="loadTable()">
                                        Load
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('role-permission.add_permission') }}">
            <div class="row" id="display-modules" style="display: none;">
                @csrf
                <input type="hidden" name="role_name" id="role">
                <input type="hidden" name="user_id" id="user">
                <div id="permission-area" class="card-body col-sm-12">

                </div>
                <div class="input-field col s12">
                    <button class="form-group form-control btn btn-success" type="submit" name="action">Submit
                    </button>
                </div>
        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script>
        function getUsers(role) {

            let routeName = "{{ route('role-permission.role_wise_user') }}";

            $.ajax({
                type: "GET",
                url: routeName,
                data: {
                    role: role
                },
                success: function(data) {
                    console.log(data.users.data.length);
                    $('select[name="user_id"]').empty();
                    if (data.users.data.length != 0) {
                        $.each(data.users.data, function(k, item) {
                            $('select[name="user_id"]').append('<option value="' + item.user_code +
                                '">' +
                                item.user_code + ' - '+ item.name + ' - '+ item.mobile+ '</option>');
                        });
                    } else {
                        $('select[name="user_id"]').append('<option value="">No user found</option>');
                        $('#display-modules').hide();
                    }
                }
            });
        }

        $(document).on('change', '#user_id', function() {
            $('#display-modules').hide();
        });

        function loadTable() {
            var user_id = $('#user_id').val();
            var role_name = $('#role_name').val();

            if (role_name.length == 0 && user_id == null) {
                alert('Please select role');
                return false;
            }

            if (role_name.length != 0 && user_id.length == 0) {
                alert('Please select user');
                return false;
            }


            $('#display-modules').show();
            fetchPermissionModulesByUser();
        }

        function fetchPermissionModulesByUser() {
            var user_id = $('#user_id').val();
            var role_name = $('#role_name').val();
            $('#role').val(role_name);
            $('#user').val(user_id);

            $.get("{{ route('permissionModule-show') }}", {
                user_id: user_id,
                role_name: role_name
            }).done((data) => {
                var content = '';
                content += `<div class="col-md-4">
                                <label for="checkAll">Select All:</label>
                                <input type="checkbox" id="checkAll" />
                            </div>`

                Object.values(data).forEach(function(value) {
                    content += `<div class="custom-control custom-checkbox  col-md-4">
                                        <input type="checkbox" name="permissions[]" aria-label="Checkbox for following text input"
                                        id="${value.replaceAll('.','-')}" value="${value}">

                                 
                                        <label for="${value.replaceAll('.','-')}">${value}</label>
                                    </div>`;
                });

                $('#permission-area').html(content);

                $("#checkAll").click(function() {
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });


            }).then(() => {
                checkedPermissionModulesByUser(user_id, role_name);
            });
        }

        function checkedPermissionModulesByUser() {
            var user_id = $('#user_id').val();
            var role_name = $('#role_name').val();
            $('#role').val(role_name);
            $('#user').val(user_id);

            $.ajax({
                url: "{{ route('permissionModule-set') }}",
                type: "GET",
                data: {
                    user_id: user_id,
                    role_name: role_name
                },
                success: function(data) {
                    data.forEach(function(value) {
                        let route = value.replaceAll('.', '-');
                        $('#' + route).attr('checked', true);
                        $('#display-modules').show();
                    });
                }
            });
        }
    </script>
@endsection
