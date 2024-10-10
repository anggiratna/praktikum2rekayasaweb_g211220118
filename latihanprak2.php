<?php
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// alamat localhost untuk file getwisata.php, ambil hasil export JSON
$send = curl("http://localhost/rekayasawebanggi_g211220118/praktikum2/getwisata.php");

// mengubah JSON menjadi array
$data = json_decode($send, TRUE);

// Memulai tabel
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr>
        <th>ID WISATA</th>
        <th>KOTA</th>
        <th>LANDMARK</th>
        <th>TARIF</th>
      </tr>";

// Menampilkan data dalam bentuk tabel
foreach($data as $row){
    echo "<tr>";
    echo "<td>" . $row["id_wisata"] . "</td>";
    echo "<td>" . $row["kota"] . "</td>";
    echo "<td>" . $row["landmark"] . "</td>";
    echo "<td>" . $row["tarif"] . "</td>";
    echo "</tr>";
}

// Menutup tabel
echo "</table>";
?>