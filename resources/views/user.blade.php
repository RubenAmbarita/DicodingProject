@extends('layouts.master')

@section('judul')
Master User
@endsection

@section('content')
    <div class="container-fluid">
            <div class="card-header">
                <a class="btn btn-primary" onClick="add()" href="javascript:void(0)"> Create User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableUser" class="table table-bordered table-hover">
                    <thead class="text-white " style="vertical-align: middle;">
                        <tr style="color: #444444">
                            <th style="width: 10%;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
    </div>

    <!-- boostrap company model -->
    <div class="modal fade" id="user-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="UserModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="UserForm" name="UserForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id_user" name="id_user">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama User" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Input Email User" maxlength="50" required="">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="password" name="password" placeholder="Input Password User" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected disabled>Select Role</option>
                                <option value="0"> User </option>
                                <option value="1"> Admin </option>
                            </select>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-success" onClick="save()" href="javascript:void(0)"> Save </a>
                            <!-- <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save </button> -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('')}}assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        function add() {
                $('#btn-save').val("create-post");
                $('#UserForm').trigger("reset");
                $('#UserModal').html("Add User");
                $('#user-modal').modal('show');
                $('#id').val('');
                $('#id_user').val('');
            }
        
        $(function() {
           $('#tableUser').DataTable({
                "lengthChange": true
                , "autoWidth": true
                , "scrollX": true
                , processing: true
                , serverSide: true
                , ajax: 'user',
                 "columnDefs": [{
                        "targets": [0, 3], // your case first column
                        "className": "text-center"
                        , "width": "5%"
                    }
                    , {
                        "className": "dt-center"
                        , "targets": "_all"
                    }

                ]
                , ajax: 'user'
                , columns: [{
                        data: 'DT_RowIndex'
                        , name: 'DT_RowIndex'
                        , orderable: false
                        , searchable: false
                    }
                    , {
                        data: 'nama'
                    }
                    , {
                        data: 'email'
                    }, 
                    {
                        data: 'password'
                    },
                    {
                        data: 'role',
                        render: function(data, type, full, meta) {
                            if (data == 0) {
                                return "User"
                            } else {
                                return "Admin"
                            }
                        }
                    },
                    {
                      data: 'action',
                      name: 'action'
                    }
                ],
                success: function(settings, json) {
                            var oTable = $('#tableUser').dataTable();
                            oTable.fnDraw(false);
                        }
            });
        });

        function save(){
            let nama = $("input[name=nama]").val();
            let email = $("input[name=email]").val();
            let password = $("input[name=password]").val();
            let role = $("select[name=role]").val();

            var sendUser = {
                    'nama': nama, 
                    'email': email,
                    'password': password,
                    'role': role
                };

            
            $.ajax({
                type: 'POST',
                url: "{{ url('store-user')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: sendUser,
                dataType: 'json',
                success: (data) => {
                    $("#user-modal").modal('hide');
                    var oTable = $('#tableUser').dataTable();
                    oTable.fnDraw(false);
                }
                , error: function(data) {
                    console.log('Error POST');
                }
            });
        }

        function editFunc(id) {
            var id = id;
            
            $.ajax({
                type: "POST"
                , url: "{{ url('edit-user') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id_user: id
                }
                , dataType: 'json'
                , success: function(res) {
                    $('#UserModal').html("Edit User");
                    $('#user-modal').modal('show');
                    $('#id_user').val(res.id_department);
                    $('#nama').val(res.nama);
                    $('#email').val(res.email);
                    $('#password').val(res.password);
                    $("#role option[value="+res.role+"]").prop("selected", "selected");
                }
            });
        }
</script>