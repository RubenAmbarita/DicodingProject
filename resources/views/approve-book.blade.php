@extends('layouts.master')

@section('judul')
Donasi Buku
@endsection

@section('content')
    <div class="container-fluid">
            <div class="card-header">
                <a class="btn btn-primary" onClick="add()" href="javascript:void(0)"> Donasi Buku</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableApprove" class="table table-bordered table-hover">
                    <thead class="text-white " style="vertical-align: middle;">
                        <tr style="color: #444444">
                            <th style="width: 10%;">No</th>
                            <th>Nama Buku</th>
                            <th>Judul</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Alamat Jemput</th>
                            <th>Konfirmasi</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
    </div>

    <!-- boostrap company model -->
    <div class="modal fade" id="approve-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ApproveModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="ApproveForm" name="ApproveForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id_approve" name="id_approve">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Nama Buku</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Input Nama Buku" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Judul</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Input Judul Buku" maxlength="50" required="">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Penerbit</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Input Penerbit Buku" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Tahun Terbit</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Input Tahun Terbit" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Alamat Jemput</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat_jemput" name="alamat_jemput" placeholder="Input Alamat Jemput" maxlength="50" required="">
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected disabled>Select Role</option>
                                <option value="0"> Approve </option>
                                <option value="1"> Admin </option>
                            </select>
                        </div> -->

                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-success" onClick="save()" href="javascript:void(0)"> Save </a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approve-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ApproveEditModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="ApproveEditForm" name="ApproveEditForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id_book" name="id_book">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Nama Buku</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama_buku_edit" name="nama_buku_edit" placeholder="Input Nama Buku" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Judul</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="judul_edit" name="judul_edit" placeholder="Input Judul Buku" maxlength="50" required="">
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Penerbit</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="penerbit_edit" name="penerbit_edit" placeholder="Input Penerbit Buku" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Tahun Terbit</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="tahun_terbit_edit" name="tahun_terbit_edit" placeholder="Input Tahun Terbit" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-3 control-label">Alamat Jemput</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="alamat_jemput_edit" name="alamat_jemput_edit" placeholder="Input Alamat Jemput" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-success" onClick="saveEdit()" href="javascript:void(0)"> Update </a>
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
                $('#ApproveForm').trigger("reset");
                $('#ApproveModal').html("Add Approve");
                $('#approve-modal').modal('show');
                $('#id').val('');
                $('#id_approve').val('');
            }
        

        $(function() {
           $('#tableApprove').DataTable({
                "lengthChange": true
                , "autoWidth": true
                , "scrollX": true
                , processing: true
                , serverSide: true
                , ajax: 'approve-book',
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
                        data: 'penerbit'
                    }, 
                    {
                        data: 'judul'
                    },
                    {
                        data: 'tahun_terbit'
                    },
                    {
                        data: 'alamat_jemput'
                    },
                    {
                        data: 'confirmed',
                        render: function(data, type, full, meta) {
                            if (data == 0) {
                                return "Pending"
                            } else {
                                return "Confirmed"
                            }
                        }
                    },
                    {
                      data: 'action',
                      name: 'action'
                    }
                ],
                success: function(settings, json) {
                            var oTable = $('#tableApprove').dataTable();
                            oTable.fnDraw(false);
                        }
            });
        });

        function save(){
            let nama_buku = $("input[name=nama_buku]").val();
            let judul = $("input[name=judul]").val();
            let penerbit = $("input[name=penerbit]").val();
            let tahun_terbit = $("input[name=tahun_terbit]").val();
            let alamat_jemput = $("input[name=alamat_jemput]").val();
            var sendApprove = {
                    'nama_buku': nama_buku, 
                    'judul': judul,
                    'penerbit': penerbit,
                    'tahun_terbit': tahun_terbit,
                    'alamat_jemput': alamat_jemput
                };
            
            
            $.ajax({
                type: 'POST',
                url: "{{ url('store-book')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: sendApprove,
                dataType: 'json',
                success: (data) => {
                    $("#approve-modal").modal('hide');
                    var oTable = $('#tableApprove').dataTable();
                    oTable.fnDraw(false);
                }
                , error: function(data) {
                    console.log('Error POST');
                }
            });
        }

        function saveEdit(){
            let nama = $("input[name=nama_buku_edit]").val();
            let judul = $("input[name=judul_edit]").val();
            let penerbit = $("input[name=penerbit_edit]").val();
            let tahun = $("input[name=tahun_terbit_edit]").val();
            let alamat = $("input[name=alamat_jemput_edit]").val();
             let id_book = $("input[name=id_book]").val();

            var sendApprove = {
                    'id_book': id_book,
                    'nama': nama, 
                    'judul': judul,
                    'penerbit': penerbit,
                    'tahun': tahun,
                    'alamat': alamat
                };

            $.ajax({
                type: 'POST',
                url: "{{ url('update-approve')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: sendApprove,
                dataType: 'json',
                success: (data) => {
                    $("#approve-edit-modal").modal('hide');
                    var oTable = $('#tableApprove').dataTable();
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
                , url: "{{ url('edit-approve') }}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    id_approve: id
                }
                , dataType: 'json'
                , success: function(res) {
                    $('#ApproveEditModal').html("Edit Approve");
                    $('#approve-edit-modal').modal('show');
                    $('#id_book').val(res.id);
                    $('#nama_buku_edit').val(res.nama);
                    $('#judul_edit').val(res.judul);
                    $('#penerbit_edit').val(res.penerbit);
                    $('#tahun_terbit_edit').val(res.tahun_terbit);
                    $('#alamat_jemput_edit').val(res.alamat_jemput);
                }
            });
        }

        function deleteFunc(id) {
            if (confirm("Delete Record?") == true) {
                var id = id;
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-approve') }}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        id_book: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#tableApprove').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        }
</script>