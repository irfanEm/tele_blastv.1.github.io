// alert("ok");
$(function () {
  $(".tombolTambahData").on("click", function () {
    $("#exampleModalLabel1").html("Forms Tambah Group Telegram");
    $(".modal-footer button[type=submit]").html("Tambah Data");
  });

  $(".tampilModalUbah").on("click", function () {
    $("#exampleModalLabel1").html("Forms Ubah Group Telegram");
    $(".modal-footer button[type=submit]").html("Ubah Data");

    const id = $(this).data("id");
    $.ajax({
      url: "http://localhost/tele_blastv.1.github.io/Model/Group.php",
      data: { id: id },
      method: "post",
      //   dataType: "json",
      success: function (data) {
        console.log(data);
      },
    });
  });
});
