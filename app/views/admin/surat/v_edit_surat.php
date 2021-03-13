<h4 class="font-weight-bold py-3 mb-0"><?=strtoupper($this->uri->segment(2))?></h4>

<div class="card mb-4 shadow-sm">
<h6 class="card-header"><b>Edit Surat</b></h6>
<div class="card-body">
    <div class="form-group">
        <label class="form-label">Kode Surat</label>
        <input type="text" class="form-control" placeholder="Kode Surat" id="srt_kode" value="<?=$tampil->srt_kode?>">
    </div>
    <div class="form-group">
        <label class="form-label">Nama Surat</label>
        <input type="text" class="form-control" placeholder="Nama Surat" id="srt_name" value="<?=$tampil->srt_name?>">
    </div>
    <div class="form-group">
        <label class="form-label">Tanggal Surat</label>
        <input type="" class="form-control date" placeholder="Tanggal Surat" id="srt_tgl" value="<?=$tampil->srt_tgl?>">
    </div>
    <div class="form-group">
        <label class="form-label">Jenis Surat</label>
        <input type="text" class="form-control" placeholder="Jenis Surat" id="srt_jenis" value="<?=$tampil->srt_jenis?>">
    </div>
    <div class="form-group">
        <label class="form-label">Deskripsi</label>
        <input type="text" class="form-control" placeholder="Deskripsi" id="srt_desk" value="<?=$tampil->srt_desk?>">
    </div>
    <input type="hidden" value="<?=$tampil->id_surat?>" id="id_surat">
    <input type="hidden" value="<?=$tampil->srt_kode?>" id="srt_kode_old">

    <div class="float-right">
        <button type="submit" class="btn btn-danger" id="cancel">Cancel</button>
        <button type="submit" class="btn btn-primary" id="edit_data_surat">Save</button>
    </div>

</div>
</div>		  