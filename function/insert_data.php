<?php

function insert($data)
{
    global $konek;
    switch ($data['table']) {
        case("group_tele"):
            $stmt = "INSERT INTO $data[table] VALUES (null, '$data[nama_group]', '$data[id_group]', '$data[username_group]')";
            var_dump($stmt);
            break;

        case("bc_pesan"):
            $stmt = "INSERT INTO $data[table] VALUES (null, '$data[id_pesan]', '$data[id_group]', '$data[tanggal]', '$data[waktu]')";
            break;

        case("template_pesan"):
            $stmt = "INSERT INTO template_pesan VALUES (null, '$data[judul_pesan]', '$data[isi_pesan]')";
            break;

        default:
        return false;
    }
    $exec = mysqli_query($konek, $stmt);
    $error = mysqli_error($konek);
    return $error;
    // echo $stmt;
}