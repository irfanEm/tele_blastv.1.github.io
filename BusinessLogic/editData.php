<?php

function editData($data)
{
    global $konek;
    switch ($data['table']) {
        case("group_tele"):
            $stmt = "UPDATE group_tele set nama = '$data[nama_group]', id_group = '$data[id_group]', username_group = '$data[username_group]' WHERE id = $data[id]";
            break;

        case("bc_pesan"):
            $stmt = "UPDATE bc_pesan set id_pesan = '$data[id_pesan]', id_group = '$data[id_group]', tanggal = '$data[tanggal]', waktu = '$data[waktu]' WHERE id = $data[id]";
            break;

        case("template_pesan"):
            $stmt = "UPDATE template_pesan set judul_pesan = '$data[judul_pesan]', isi_pesan = '$data[isi_pesan]' WHERE id = $data[id]";
            break;

        default:
        return false;
    }
    $exec = mysqli_query($konek, $stmt);
    $error = mysqli_error($konek);
    return $error;
}