@extends('layouts.master')

@section('judul')
Master User
@endsection

@section('content')
    <div class="container-fluid">
            <div class="card-header">
                <a class="btn btn-primary btn-sm" onClick="add()" href="javascript:void(0)"> Create User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableUser" class="table table-bordered table-hover">
                    <thead class="text-white " style="background-color: #f2f2f2; vertical-align: middle;">
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
                            <select name="id_employee" id="id_employee" class="form-control">
                                <option value="" selected disabled>Select Role</option>
                                <option value="0"> User </option>
                                <option value="1"> Admin </option>
                            </select>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save </button>
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

        $('#UserForm').submit(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            console.log("addd");
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
                
            });
</script>