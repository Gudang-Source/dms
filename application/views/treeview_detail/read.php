<?php
$role = $this->session->userdata['user']['role'];
?>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>-->
<!--<script src="https://blueimp.github.io/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>-->
<!--<script src="js/jquery.iframe-transport.js"></script>-->
<!--<script src="https://blueimp.github.io/jQuery-File-Upload/js/jquery.fileupload.js"></script>-->
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="form-group">
            <label>Perusahaan</label>
            <select id="perusahaan" class="form-control" name="perusahaan" required="">
                <option value="">-- Perusahaan --</option>
                <?php foreach ($company as $c) { ?>
                    <option value="<?php echo $c['id'] ?>" <?php echo $c['id'] == $this->input->post('role') ? 'selected' : ''; ?>><?php echo $c['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Standar</label>
            <select id="standar" class="form-control" name="perusahaan" required=""></select>
        </div>
        <div class="main-card mb-3 card">
            <div id="container" class="card-body">
                <!--TAB-->
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a data-toggle="tab" href="#tab-pemenuhan1" class="nav-link">Pemenuhan</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-pasal" class="nav-link">Pasal</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-dokumen" class="nav-link">Dokumen</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-distribusi" class="nav-link">Distribusi</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-jadwal" class="nav-link">Jadwal</a></li>
                    <li class="nav-item"><a data-toggle="tab" href="#tab-implementasi" class="nav-link">Implementasi</a></li>
                    <!--<li class="nav-item"><a data-toggle="tab" href="#tab-base" class="nav-link">Base</a></li>-->
                </ul>
                <div class="tab-content">
                    <!--PEMENUHAN-->
                    <div class="tab-pane" id="tab-pemenuhan1" role="tabpanel">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pasal</th>
                                    <th>Dokumen</th>
                                    <th>Implementasi</th>
                                </tr>
                            </thead>
                            <tbody id="table-pemenuhan"></tbody>
                        </table>
                    </div>
                    <!--PASAL-->
                    <div class="tab-pane" id="tab-pasal" role="tabpanel">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pasal</th>
                                    <th>Topik</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody id="table-pasal"></tbody>
                        </table>
                    </div>
                    <!--DOKUMEN-->
                    <div class="tab-pane" id="tab-dokumen" role="tabpanel">
                        <div class="text-right mb-2">
                            <label>Tambah Dokumen</label>
                            <button class="btn btn-outline-primary fa fa-plus" onclick="tambahDokumen()"></button>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Jenis</th>
                                    <th>detail</th>
                                </tr>
                            </thead>
                            <tbody id="table-dokumen">
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab-distribusi" role="tabpanel">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pasal</th>
                                    <th>Judul Dokumen</th>
                                    <th>Pembuat dokumen</th>
                                    <th>Distribusi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-distribusi"></tbody>
                        </table>
                    </div>
                    <!--JADWAL-->
                    <div class="tab-pane" id="tab-jadwal" role="tabpanel">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Pasal</th>
                                    <th>Judul Dokumen</th>
                                    <th>Jadwal</th>
                                    <th>Distribusi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-jadwal"></tbody>
                        </table>
                    </div>
                    <!--IMPLEMENTASI-->
                    <div class="tab-pane" id="tab-implementasi" role="tabpanel">
                        <table class="table" id="table-implementasi">
                            <thead>
                                <tr>
                                    <th>Pasal</th>
                                    <th>Judul Dokumen</th>
                                    <th>Jadwal</th>
                                    <th>Distribusi</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="tab-base" role="tabpanel">Base</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MODAL DETAIL PASAL-->
<div class="modal fade" id="modalDetailPasal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">     
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pasal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-message">
                    <div class="form-group">
                        <label for="namaModule">Topik</label>
                        <input class="form-control item-sort-desc" name="sort-desc" readonly="">
                    </div>
                    <div class="form-group">
                        <label for="namaModule">Isi</label>
                        <textarea class="form-control item-long-desc" name="long-desc" readonly=""></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--MODAL DOKUMEN-->
<div class="modal fade" id="modalDokumen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="formDokumen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-message">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Pasal</td>
                                <td>
                                    <select name="pasal" class="form-control select-pasal" required=""></select>
                                </td>
                            </tr>
                            <tr>
                                <td>Nomor</td>
                                <td>
                                    <input class="form-control input-nomor" name="nomor" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td>
                                    <input class="form-control input-judul" name="judul" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>Pembuat Dokumen</td>
                                <td>
                                    <select class="form-control select-anggota" name="creator" required=""></select>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Dokumen</td>
                                <td>
                                    <select class="form-control select-jenis" name="jenis" required="">
                                        <option value="1">Level I</option>
                                        <option value="2">Level II</option>
                                        <option value="3">Level III</option>
                                        <option value="4">Level IV</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Klasifikasi</td>
                                <td>
                                    <select class="form-control select-klasifikasi" name="klasifikasi" required="">
                                        <option value="UMUM">Umum</option>
                                        <option value="INTERNAL">Internal</option>
                                        <option value="RAHASIA">Rahasia</option>
                                        <option value="SANGAT RAHASIA">Sangat Rahasia</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>
                                    <textarea class="form-control textarea-deskripsi" name="deskripsi"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Versi Dokumen</td>
                                <td>
                                    <input class="form-control input-versi" name="versi" required="">
                                </td>
                            </tr>
                            <tr>
                                <td>Dokumen terkait</td>
                                <td>
                                    <select class="form-control" name="dokumen_terkait">
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Dokumen</td>
                                <td>
                                    <input class="radio-type-dokumen" type="radio" name="type_dokumen" value="FILE" required="">
                                    <label>File</label>
                                    <input class="radio-type-dokumen" type="radio" name="type_dokumen" value="URL">
                                    <label>Url</label>
                                    <input class="form-control input-file d-none" type="file" class="form-control" name="dokumen" required="">
                                    <input class="form-control input-url d-none" type="url" class="form-control" name="url" required="">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <button id="dokumenSubmit" type="submit" class="btn btn-primary btn-submit" name="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- MODAL DISTRIBUSI -->
<div class="modal fade" id="modalDistribusi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">     
        <form method="post" id="formDistribusi">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Distribusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-message">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Pasal</td>
                                <td>
                                    <label class="label-pasal"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Judul Dokumen</td>
                                <td>
                                    <label class="label-judul"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Jenis Dokumen</td>
                                <td>
                                    <label class="label-jenis"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Klasifikasi</td>
                                <td>
                                    <label class="label-klasifikasi"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Dokumen Terkait</td>
                                <td>
                                    <input class="input-dokumen-id d-none" name="dokumen">
                                    <label class="label-dokumen-terkait"></label>
                                </td>
                            </tr>
                            <tr>
                                <td>Distribusi</td>
                                <td>
                                    <div class="row">
                                        <select class="form-control select-anggota select-2" multiple="multiple" name="anggota[]" required="">
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-submit" name="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--MODAL JADWAL-->
<div class="modal fade" id="modalJadwal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="formJadwal">            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formJadwal">
                        <input class="input-id d-none" name="id"/>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Pasal</td>
                                    <td>
                                        <input class="form-control input-pasal" disabled=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Judul Dokumen</td>
                                    <td>
                                        <input class="form-control input-judul" disabled=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Penjadwalan</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>
                                        <input class="form-control" name="tanggal" type="date" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ulangi</td>
                                    <td>
                                        <input class="radio-ulangi-jadwal" type="radio" name="ulangi" value="YA" required="">
                                        <label>Ya</label>
                                        <input class="radio-ulangi-jadwal" type="radio" name="ulangi" value="TIDAK">
                                        <label>Tidak</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div id="group-input-hari">
                                            <div class="row group-input-hari">
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="SENIN">
                                                    <label for="vehicle1"> Senin</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="SELASA">
                                                    <label for="vehicle1"> Selasa</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="RABU">
                                                    <label for="vehicle1"> Rabu</label>
                                                </div>
                                            </div>
                                            <div class="row group-input-hari">
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="KAMIS">
                                                    <label for="vehicle1"> Kamis</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="JUMAT">
                                                    <label for="vehicle1"> Jumat</label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="SABTU">
                                                    <label for="vehicle1"> Sabtu</label>
                                                </div>
                                            </div>
                                            <div class="row group-input-hari">
                                                <div class="col-sm-4">
                                                    <input type="checkbox" name="hari[]" value="MINGGU">
                                                    <label for="vehicle1"> Minggu</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--MODAL UPLOAD BUKTI-->
<div class="modal fade" id="modalUploadBukti">
    <div class="modal-dialog" role="document">
        <form id="formUploadBukti">            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Bukti</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formUploadBukti">
                        <input class="input-id d-none" name="id"/>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Judul Dokumen</td>
                                    <td>
                                        <input class="form-control input-judul" disabled=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jadwal</td>
                                    <td>
                                        <input class="form-control input-jadwal" disabled=""/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jadwal</td>
                                    <td>
                                        <input class="form-control" name="tanggal" type="date" required="">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dokumen</td>
                                    <td>
                                        <input class="radio-type-dokumen" type="radio" name="type_dokumen" value="FILE" required="">
                                        <label>File</label>
                                        <input class="radio-type-dokumen" type="radio" name="type_dokumen" value="URL">
                                        <label>Url</label>
                                        <input class="form-control input-file d-none" type="file" class="form-control" name="dokumen" required="">
                                        <input class="form-control input-url d-none" type="url" class="form-control" name="url" required="">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#modalContainer').append($('.modal'));
        var clone = $('#modalDokumen').clone();
        clone.attr("id", "modalDokumenRead");
        clone.find('.btn-submit').remove();
        clone.find('.modal-title').text('Detail Dokumen');
        clone.find('input').attr('disabled', true);
        clone.find('select').attr('disabled', true);
        clone.find('textarea').attr('disabled', true);
        $('#modalContainer').append(clone);
        $('#tab-implementasi').addClass('active');
    });
    var idPerusahaan;
    var idStandar;
    var anggota;
    var sortData = [];
    var dokumen;
    $('#perusahaan').change(function (s) {
        if ($(this).val()) {
            $.post('<?php echo site_url($module); ?>/standard', {'id': $(this).val()}, function (data) {
                var d = JSON.parse(data);
                $('#standar').html('');
                $('#standar').append('<option value="">-- Standar --</option>');
                for (var i = 0; i < d.length; i++) {
                    $('#standar').append('<option value="' + d[i].id + '">' + d[i].name + '</option>');
                }
            });
            $.post('<?php echo site_url($module); ?>/anggota', {'perusahaan': $(this).val()}, function (data) {
                anggota = JSON.parse(data);
                $('.select-anggota').empty();
                for (var i = 0; i < anggota.length; i++) {
                    var a = anggota[i];
                    $('.select-anggota').append('<option value="' + a.id + '">' + a.fullname + '</option>');
                }
            });
//        $('.select-2').select2();
            perusahaan = $(this).val();
        }
    });
    $('#standar').change(function (s) {
        standar = $(this).val();
        if (standar) {
            $('#root span').text($('#standar option:selected').text());
            getPasal();
        }
    });
    function getPasal() {
        $.get('<?php echo site_url($module); ?>/pasal', {perusahaan: perusahaan, standar: standar}, function (data) {
            data = JSON.parse(data);
            for (var i = 0; i < data.length; i++) {
                var d = data[i];
                var element = '<div class="item-base" id="item-base' + d.id + '"><span>' + d.name + '</span><span class="index">' + i + '</span><div class="child"></div></div>';
                var parent = null;
                if (d.parent === null) {
                    $('#tab-base').append(element);
                } else {
                    $('#item-base' + d.parent).children('.child').append(element);
                }
                data[i] = d;
            }
            var element = $('.item-base').children('.index').get();
            sortData = [];
            for (var i = 0; i < element.length; i++) {
                var e = element[i];
                var index = $(e).text();
                sortData.push(data[index]);
                $(e).text(i);
            }
            for (var i = 0; i < sortData.length; i++) {
                var s = sortData[i];
                if (s.parent === null) {
                    s.parentIndex = null;
                    s.fullname = s.name;
                } else {
                    s.parentIndex = $('#item-base' + s.parent).children('.index').text();
                    s.fullname = sortData[s.parentIndex].fullname + ' - ' + s.name;
                }
                sortData[i] = s;
            }
            $('#tab-base').empty();
            $('#table-pemenuhan').empty();
            $('#table-pasal').empty();
            $('.select-pasal').empty();
            $('.select-pasal').append('<option value="">-- pilih pasal --</option>');
            for (var i = 0; i < sortData.length; i++) {
                var d = sortData[i];
                $('#table-pemenuhan').append('<tr><td>' + d.fullname + '</td><td>10%</td><td>10%</td></tr>');
                $('#table-pasal').append('<tr><td>' + d.fullname + '</td><td>' + d.sort_desc + '</td><td><span class="fa fa-info-circle text-primary" onclick="detailPasal(' + i + ')" title="Detail"></span></td></tr>');
                $('.select-pasal').append('<option value="' + d.id + '">' + d.fullname + '</option>');
            }
            getDokumen();
        });
    }
    function detailPasal(index) {
        var m = $('#modalDetailPasal');
        var d = sortData[index];
        m.modal('show');
        m.find('.modal-title').text(d.fullname);
        m.find('.item-sort-desc').val(d.sort_desc);
        m.find('.item-long-desc').text(d.long_desc);
    }
    $('#formDokumen').on("submit", function (e) {
        e.preventDefault();
        var status = 'Undefined';
        $('#modalDokumen').modal('hide');
        $('#modalNotif .modal-title').text('Uploading...');
        $('#modalNotif').modal('show');
        $.ajax({
            url: '<?php echo site_url($module . '/create_dokumen') ?>',
            type: "post",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function (data) {
                data = JSON.parse(data);
                if (data.status === 'success') {
                    status = 'Success';
                    $(this).trigger("reset");
                    getDokumen();
                } else if (data.status === 'error') {
                    status = 'Error';
                    $('#modalNotif .modal-message').html(data.message);
                }
            },
            error: function (data) {
                status = 'Error';
                $('#modalNotif .modal-message').text('Error 500');
            },
            complete: function () {
                $('#modalNotif .modal-title').text(status);
            }
        });
    });
    function getDokumen() {
        $.post('<?php echo site_url($module); ?>/get_dokumen', {'perusahaan': perusahaan, 'standar': standar}, function (data) {
            $('#table-dokumen').empty();
            dokumen = JSON.parse(data);
            for (var i = 0; i < dokumen.length; i++) {
                var d = dokumen[i];
                $('#table-dokumen').append('<tr><td>' + d.nomor + '</td><td>' + d.judul + '</td><td>Level ' + d.jenis + '</td><td><span class="fa fa-info-circle text-primary" onclick="detailDokumen(' + i + ')" title="Detail"></span></td></tr>');
            }
            getDistribusi();
        });
    }
    function tambahDokumen() {
        var m = $('#modalDokumen');
        m.find('.modal-title').text('Tambah Dokumen');
        m.find('.btn-submit').val('tambah');
//        dokumenLoadData();
//        formDokumenReset();
        m.modal('show');
    }
    $('.radio-type-dokumen').change(function () {
        var m = $('.modal');
        var type = $(this).val();
        if (type === 'FILE') {
            m.find('.input-file').val('');
            m.find('.input-file').removeClass('d-none');
            m.find('.input-file').add('required');
            m.find('.input-url').addClass('d-none');
            m.find('.input-url').removeAttr('required');
        } else if (type === 'URL') {
            m.find('.input-url').val('');
            m.find('.input-file').addClass('d-none');
            m.find('.input-file').removeAttr('required');
            m.find('.input-url').removeClass('d-none');
            m.find('.input-url').add('required');
        }
    });
    function detailDokumen(index) {
        var m = $('#modalDokumenRead');
        var d = dokumen[index];
        m.modal('show');
        m.find('.select-pasal').val(d.id_pasal);
        m.find('.input-nomor').val(d.nomor);
        m.find('.input-judul').val(d.judul);
        m.find('.select-anggota').val(d.creator);
        m.find('.select-jenis').val(d.jenis);
        m.find('.select-klasifikasi').val(d.klasifikasi);
        m.find('.textarea-deskripsi').val(d.deskripsi);
        m.find('.input-versi').val(d.versi);
        m.find('.radio-type-dokumen').filter('[value=' + d.type_doc + ']').prop('checked', true);
    }
    var listJadwal = [];
    function getDistribusi() {
        sortDokumen = [];
        $('#table-distribusi').empty();
        $('#table-jadwal').empty();
        var indexJadwal = 0;
        for (var i = 0; i < sortData.length; i++) {
            for (var j = 0; j < dokumen.length; j++) {
                for (var k = 0; k < anggota.length; k++) {
                    if (dokumen[j].id_pasal === sortData[i].id) {
                        if (dokumen[j].creator === anggota[k].id) {
                            dokumen[j].index_pasal = i;
                            sortDokumen.push(dokumen[j]);
                            var userDis = dokumen[j].user_distribusi;
                            var strUserDis = '';
                            for (var l = 0; l < userDis.length; l++) {
                                strUserDis += '<span>' + userDis[l] + '</span><br/>';
                                if (userDis[l] !== '') {
                                    var jd = new Object();
                                    jd.id = dokumen[j].distribusi[l];
                                    jd.id_pasal = i;
                                    jd.id_doc = j;
                                    jd.username = userDis[l];
                                    listJadwal.push(jd);
                                    $('#table-jadwal').append('<tr><td>' + sortData[i].fullname + '</td><td>' + dokumen[j].judul + '</td><td>' + '00:00' + '</td><td>' + userDis[l] + '</td><td><button class="btn btn-primary fa fa-edit" onclick="jadwal(' + indexJadwal + ')"></botton></td></tr>');
                                    $('#table-implementasi').append('<tr><td>' + sortData[i].fullname + '</td><td>' + dokumen[j].judul + '</td><td>' + '00:00' + '</td><td>' + userDis[l] + '</td><td><button class="btn btn-primary fa fa-upload" onclick="openModalUploadBukti(' + indexJadwal + ')"></botton></td></tr>');
                                    indexJadwal++;
                                }
                            }
                            $('#table-distribusi').append('<tr><td>' + sortData[i].fullname + '</td><td>' + dokumen[j].judul + '</td><td>' + anggota[k].fullname + '</td><td>' + strUserDis + '</td><td><button class="btn btn-primary fa fa-edit" onclick="editDistribusi(' + j + ')"></botton></td></tr>');
                        }
                    }
                }
            }
        }
    }
    function editDistribusi(index) {
        var m = $('#modalDistribusi');
        var d = dokumen[index];
        m.modal('show');
        m.find('.label-pasal').text(sortData[d.index_pasal].fullname);
        m.find('.label-judul').text(d.judul);
        m.find('.label-jenis').text('Level ' + d.jenis);
        m.find('.label-klasifikasi').text(d.klasifikasi);
        m.find('.label-klasifikasi').text(d.klasifikasi);
        m.find('.input-dokumen-id').val(d.id);
    }
    $('#formDistribusi').submit(function (e) {
        e.preventDefault();
        $.post('<?php echo site_url($module); ?>/set_distribusi', $(this).serialize(), function (data) {
            $('#modalDistribusi').modal('hide');
            $('#standar').change();
        });
    });
    function jadwal(index) {
        var l = listJadwal[index];
        var m = $('#modalJadwal');
        m.modal('show');
        m.find('.input-id').val(l.id);
        m.find('.input-pasal').val(sortData[l.id_pasal].fullname);
        m.find('.input-judul').val(dokumen[l.id_doc].judul);
    }
    $('.radio-ulangi-jadwal').change(function () {
        var ulangi = $(this).val();
        if (ulangi === 'YA') {
            $('#group-input-hari').removeClass('d-none');
        } else if (ulangi === 'TIDAK') {
            $('#group-input-hari').addClass('d-none');
        }
    });
    $('#formJadwal').submit(function (e) {
        e.preventDefault();
        console.log($(this).serialize());
        $.post('<?php echo site_url($module); ?>/set_jadwal', $(this).serialize(), function (data) {
            console.log(JSON.parse(data));
        });
    });
    function openModalUploadBukti(index) {
        var l = listJadwal[index];
        var m = $('#modalUploadBukti');
        m.modal('show');
        m.find('.input-id').val(l.id);
        m.find('.input-judul').val(dokumen[l.id_doc].judul);
    }
</script>
