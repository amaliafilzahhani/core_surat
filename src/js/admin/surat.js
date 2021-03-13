var url_ctrl = site_url + "admin/surat/";

var tabel_surat = $('#tabel_surat').DataTable({
    "processing": true, 
    "serverSide": true, 
    // scrollY: "400px",
    scrollX: true,
    scrollCollapse: true, 
    fixedColumns: { leftColumns:1, rightColumns: 1},
    "deferRender": true,  
    "order": [], 
    "ajax": {
        "url"   : url_ctrl + "get_data_surat",
        "type": "POST",
    } ,
    "columnDefs": [{ targets: [0, 6], className: 'text-center' }],
    "ordering": false
});

$(document).on('click', '#add_btn_surat', function (e) {
    window.location = url_ctrl + 'add';
});

$(document).on('click', '#cancel', function (e) {
    window.location = url_ctrl;
});

$(document).on('click', '#save_data_surat', function (e) {
    loadingShow();  
      e.preventDefault();
      var srt_kode = $("#srt_kode").val();
      var srt_name = $("#srt_name").val();
      var srt_tgl = $("#srt_tgl").val();
      var srt_jenis = $("#srt_jenis").val();
      var srt_desk = $("#srt_desk").val();
  
      $.ajax({
          method:"POST",
          url:url_ctrl+'act_add_surat',
          cache:false,
          data: {
              srt_kode :srt_kode,
              srt_name :srt_name,
              srt_tgl :srt_tgl,
              srt_jenis :srt_jenis,
              srt_desk :srt_desk,
          }
      })
      .done(function(result) {
          var obj = jQuery.parseJSON(result);
          if(obj.status == 1){
              notifNo(obj.notif);
          }
          if(obj.status == 2){
              $("div#MyModal").modal('hide');
              notifYesAuto(obj.notif);
              window.location = url_ctrl;
          }
      })
      .fail(function(res){
          alert('Error Response !');
          console.log("responseText", res.responseText);
    });
});

$(document).on('click','#edit_btn',function(e){
    e.preventDefault();
    var id_surat = $(this).attr('data-id');
    window.location = url_ctrl + 'edit?id_surat='+id_surat;
});

$(document).on('click','#edit_data_surat',function(e){
    e.preventDefault();
    var srt_kode = $("#srt_kode").val();
    var srt_name = $("#srt_name").val();
    var srt_tgl = $("#srt_tgl").val();
    var srt_jenis = $("#srt_jenis").val();
    var srt_desk = $("#srt_desk").val();
    
    var id_surat = $("#id_surat").val();
    var srt_kode_old = $("#srt_kode_old").val();

    $.ajax({
        method:"POST",
        url:url_ctrl+'act_edit_surat',
        cache:false,
        data: {
            srt_kode :srt_kode,
            srt_name :srt_name,
            srt_tgl :srt_tgl,
            srt_jenis :srt_jenis,
            srt_desk :srt_desk,
            id_surat :id_surat,
            srt_kode_old :srt_kode_old,
        }
    })
    .done(function(result) {
        var obj = jQuery.parseJSON(result);
        if(obj.status == 1){
            notifNo(obj.notif);
        }
        if(obj.status == 2){
            $("div#MyModal").modal('hide');
            notifYesAuto(obj.notif);
            window.location = url_ctrl;
        }
    })
    .fail(function(res){
        alert('Error Response !');
        console.log("responseText", res.responseText);
    });
});

$(document).on('click','#delete_data',function(e){
    e.preventDefault();
    var id_surat = $(this).attr('data-id');
  swal({
      title: 'Apakah anda yakin',
      text: 'data akan di hapus ?',
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'Iya, hapus !',
      cancelButtonText: 'Tidal, batal !'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              method:"POST",
              url:url_ctrl+'act_del',
              cache:false,
              data: {
                  id_surat:id_surat
              }
          })
          .done(function(result) {
              var obj = jQuery.parseJSON(result);
              if(obj.status == 1){
                  notifNo(obj.notif);
              }
              if(obj.status == 2){
                  $("div#MyModal").modal('hide');
                  notifYesAuto(obj.notif);
                  window.location = url_ctrl;
              }
          })
          .fail(function(res){
              alert('Error Response !');
              console.log("responseText", res.responseText);
          });
      }
    })
});

$(".autocomplete").chosen();
$(".date").datetimepicker({
    format: 'Y-m-d',
    scrollInput: false,
    changeMonth : true,
    changeYear : true, 
    timepicker: false, 
}); 