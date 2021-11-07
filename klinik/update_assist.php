<?php 
session_start();
if(!$_SESSION['posisi'] == "klinik"){
    header("location:../pages/login.php?pesan=belum_login");
    exit();
}

include "../koneksi/koneksi.php";
if($_POST == null){
    echo "error";
}
else{

    //tembakau
    echo $p2_tembakau = $_POST['p2_tembakau'];
    echo $p3_tembakau = $_POST['p3_tembakau'];
    echo $p4_tembakau = $_POST['p4_tembakau'];
    echo $p5_tembakau = $_POST['p5_tembakau'];
    echo $p6_tembakau = $_POST['p6_tembakau'];
    echo $p7_tembakau = $_POST['p7_tembakau'];
    $hasil_tembakau = $p2_tembakau + $p3_tembakau + $p4_tembakau + $p5_tembakau + $p6_tembakau + $p7_tembakau;


    // // alkohol
    echo $p2_alkohol = $_POST['p2_alkohol'];
    echo $p3_alkohol = $_POST['p3_alkohol'];
    echo $p4_alkohol = $_POST['p4_alkohol'];
    echo $p5_alkohol = $_POST['p5_alkohol'];
    echo $p6_alkohol = $_POST['p6_alkohol'];
    echo $p7_alkohol = $_POST['p7_alkohol'];
    $hasil_alkohol = $p2_alkohol + $p3_alkohol + $p4_alkohol + $p5_alkohol + $p6_alkohol + $p7_alkohol;

    // //kanabis
    echo $p2_kanabis = $_POST['p2_kanabis'];
    echo $p3_kanabis = $_POST['p3_kanabis'];
    echo $p4_kanabis = $_POST['p4_kanabis'];
    echo $p5_kanabis = $_POST['p5_kanabis'];
    echo $p6_kanabis = $_POST['p6_kanabis'];
    echo $p7_kanabis = $_POST['p7_kanabis'];
    $hasil_kanabis = $p2_kanabis + $p3_kanabis + $p4_kanabis + $p5_kanabis + $p6_kanabis + $p7_kanabis;

    // //kokain
    echo $p2_kokain = $_POST['p2_kokain'];
    echo $p3_kokain = $_POST['p3_kokain'];
    echo $p4_kokain = $_POST['p4_kokain'];
    echo $p5_kokain = $_POST['p5_kokain'];
    echo $p6_kokain = $_POST['p6_kokain'];
    echo $p7_kokain = $_POST['p7_kokain'];
    $hasil_kokain = $p2_kokain + $p3_kokain + $p4_kokain + $p5_kokain + $p6_kokain + $p7_kokain;

    // //amfetamine
    echo $p2_amfetamine = $_POST['p2_amfetamine'];
    echo $p3_amfetamine = $_POST['p3_amfetamine'];
    echo $p4_amfetamine = $_POST['p4_amfetamine'];
    echo $p5_amfetamine = $_POST['p5_amfetamine'];
    echo $p6_amfetamine = $_POST['p6_amfetamine'];
    echo $p7_amfetamine = $_POST['p7_amfetamine'];
    $hasil_amfetamine = $p2_amfetamine + $p3_amfetamine + $p4_amfetamine + $p5_amfetamine + $p6_amfetamine + $p7_amfetamine;

    // //inhalansia
    echo $p2_inhalansia = $_POST['p2_inhalansia'];
    echo $p3_inhalansia = $_POST['p3_inhalansia'];
    echo $p4_inhalansia = $_POST['p4_inhalansia'];
    echo $p5_inhalansia = $_POST['p5_inhalansia'];
    echo $p6_inhalansia = $_POST['p6_inhalansia'];
    echo $p7_inhalansia = $_POST['p7_inhalansia'];
    $hasil_inhalansia = $p2_inhalansia + $p3_inhalansia + $p4_inhalansia + $p5_inhalansia + $p6_inhalansia + $p7_inhalansia;

    // //sedativa
    echo $p2_sedativa = $_POST['p2_sedativa'];
    echo $p3_sedativa = $_POST['p3_sedativa'];
    echo $p4_sedativa = $_POST['p4_sedativa'];
    echo $p5_sedativa = $_POST['p5_sedativa'];
    echo $p6_sedativa = $_POST['p6_sedativa'];
    echo $p7_sedativa = $_POST['p7_sedativa'];
    $hasil_sedativa = $p2_sedativa + $p3_sedativa + $p4_sedativa + $p5_sedativa + $p6_sedativa + $p7_sedativa;

    // //halusinogen
    echo $p2_halusinogen = $_POST['p2_halusinogen'];
    echo $p3_halusinogen = $_POST['p3_halusinogen'];
    echo $p4_halusinogen = $_POST['p4_halusinogen'];
    echo $p5_halusinogen = $_POST['p5_halusinogen'];
    echo $p6_halusinogen = $_POST['p6_halusinogen'];
    echo $p7_halusinogen = $_POST['p7_halusinogen'];
    $hasil_halusinogen = $p2_halusinogen + $p3_halusinogen + $p4_halusinogen + $p5_halusinogen + $p6_halusinogen + $p7_halusinogen;

    // //opioid
    echo $p2_opioid = $_POST['p2_opioid'];
    echo $p3_opioid = $_POST['p3_opioid'];
    echo $p4_opioid = $_POST['p4_opioid'];
    echo $p5_opioid = $_POST['p5_opioid'];
    echo $p6_opioid = $_POST['p6_opioid'];
    echo $p7_opioid = $_POST['p7_opioid'];
    $hasil_opioid = $p2_opioid + $p3_opioid + $p4_opioid + $p5_opioid + $p6_opioid + $p7_opioid;

    // //lainnya
    echo $p2_lainnya = $_POST['p2_lainnya'];
    echo $p3_lainnya = $_POST['p3_lainnya'];
    echo $p4_lainnya = $_POST['p4_lainnya'];
    echo $p5_lainnya = $_POST['p5_lainnya'];
    echo $p6_lainnya = $_POST['p6_lainnya'];
    echo $p7_lainnya = $_POST['p7_lainnya'];
    $hasil_lainnya = $p2_lainnya + $p3_lainnya + $p4_lainnya + $p5_lainnya + $p6_lainnya + $p7_lainnya;

    // //p8
    echo $p8 = $_POST['p8'];

    // echo "<br>";
    // echo "<br>";
    echo $id_pengguna = $_POST['id_pengguna'];
    // echo "<br>";
    echo $id_user = $_SESSION['id_user'];
    $posisi = $_SESSION['posisi'];

    
    // insert tabel kecil
    
    
    $queryCek = mysqli_query($koneksi,"SELECT t_skrining.id_pengguna FROM t_pengguna,t_skrining WHERE t_skrining.id_pengguna = t_pengguna.id_pengguna AND t_skrining.id_pengguna = '$id_pengguna' ");
    $cek = mysqli_num_rows($queryCek);

    if($cek > 0){

    //     //edit skrining
        $query = mysqli_query($koneksi,"SELECT `id_skrining` FROM `t_skrining` WHERE `id_pengguna` = '$id_pengguna'");
        while($data = mysqli_fetch_array($query)){
            $id_skrining = $data['id_skrining'];
        }
        $querySkrining = mysqli_query($koneksi,
        "UPDATE `t_skrining` SET `p8` = '$p8', `assist_tembakau` = '$hasil_tembakau', `assist_alkohol` = '$hasil_alkohol', `assist_kanabis` = '$hasil_kanabis', `assist_kokain` = '$hasil_kokain', `assist_amfetamin` = '$hasil_amfetamine', `assist_inhalansia` = '$hasil_inhalansia', `assist_sedativa` = '$hasil_sedativa', `assist_halusinogen` = '$hasil_halusinogen', `assist_opioid` = '$hasil_opioid', `assist_lainnya` = '$hasil_lainnya' WHERE `t_skrining`.`id_skrining` = $id_skrining; ");

    //     //edit tembakau
        $queryIdTembakau = mysqli_query($koneksi,"SELECT id FROM t_tembakau WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdTembakau);
        $idTembakau = $dataId['id'];
        $queryTembakau = mysqli_query($koneksi,"UPDATE `t_tembakau` SET `p2_tembakau` = '$p2_tembakau', `p3_tembakau` = '$p3_tembakau', `p4_tembakau` = '$p4_tembakau', `p5_tembakau` = '$p5_tembakau', `p6_tembakau` = '$p6_tembakau', `p7_tembakau` = '$p7_tembakau' WHERE `t_tembakau`.`id` = '$idTembakau'; ");
        
    //     //edit alkohol
        $queryIdAlkohol = mysqli_query($koneksi,"SELECT id FROM t_alkohol WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdAlkohol);
        $idAlkohol = $dataId['id'];
        $queryAlkohol = mysqli_query($koneksi,"UPDATE `t_alkohol` SET `p2_alkohol` = '$p2_alkohol', `p3_alkohol` = '$p3_alkohol', `p4_alkohol` = '$p4_alkohol', `p5_alkohol` = '$p5_alkohol', `p6_alkohol` = '$p6_alkohol', `p7_alkohol` = '$p7_alkohol' WHERE `t_alkohol`.`id` = '$idAlkohol'; ");
        
    //     //edit kanabis
        $queryIdKanabis = mysqli_query($koneksi,"SELECT id FROM t_kanabis WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdKanabis);
        $idKanabis = $dataId['id'];
        $queryKanabis = mysqli_query($koneksi,"UPDATE `t_kanabis` SET `p2_kanabis` = '$p2_kanabis', `p3_kanabis` = '$p3_kanabis', `p4_kanabis` = '$p4_kanabis', `p5_kanabis` = '$p5_kanabis', `p6_kanabis` = '$p6_kanabis', `p7_kanabis` = '$p7_kanabis' WHERE `t_kanabis`.`id` = '$idKanabis'; ");
        
    //     //edit kokain
        $queryIdKokain = mysqli_query($koneksi,"SELECT id FROM t_kokain WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdKokain);
        $idKokain = $dataId['id'];
        $queryKokain = mysqli_query($koneksi,"UPDATE `t_kokain` SET `p2_kokain` = '$p2_kokain', `p3_kokain` = '$p3_kokain', `p4_kokain` = '$p4_kokain', `p5_kokain` = '$p5_kokain', `p6_kokain` = '$p6_kokain', `p7_kokain` = '$p7_kokain' WHERE `t_kokain`.`id` = '$idKokain'; ");
        
    //     //edit amfetamine
        $queryIdAmfetamine = mysqli_query($koneksi,"SELECT id FROM t_amfetamine WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdAmfetamine);
        $idAmfetamine = $dataId['id'];
        $queryAmfetamine = mysqli_query($koneksi,"UPDATE `t_amfetamine` SET `p2_amfetamine` = '$p2_amfetamine', `p3_amfetamine` = '$p3_amfetamine', `p4_amfetamine` = '$p4_amfetamine', `p5_amfetamine` = '$p5_amfetamine', `p6_amfetamine` = '$p6_amfetamine', `p7_amfetamine` = '$p7_amfetamine' WHERE `t_amfetamine`.`id` = '$idAmfetamine'; ");
        
    //     //edit inhalansia
        $queryIdInhalansia = mysqli_query($koneksi,"SELECT id FROM t_inhalansia WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdInhalansia);
        $idInhalansia = $dataId['id'];
        $queryInhalansia = mysqli_query($koneksi,"UPDATE `t_inhalansia` SET `p2_inhalansia` = '$p2_inhalansia', `p3_inhalansia` = '$p3_inhalansia', `p4_inhalansia` = '$p4_inhalansia', `p5_inhalansia` = '$p5_inhalansia', `p6_inhalansia` = '$p6_inhalansia', `p7_inhalansia` = '$p7_inhalansia' WHERE `t_inhalansia`.`id` = '$idInhalansia'; ");
        
    //     //edit sedativa
        $queryIdSedativa = mysqli_query($koneksi,"SELECT id FROM t_sedativa WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdSedativa);
        $idSedativa = $dataId['id'];
        $querySedativa = mysqli_query($koneksi,"UPDATE `t_sedativa` SET `p2_sedativa` = '$p2_sedativa', `p3_sedativa` = '$p3_sedativa', `p4_sedativa` = '$p4_sedativa', `p5_sedativa` = '$p5_sedativa', `p6_sedativa` = '$p6_sedativa', `p7_sedativa` = '$p7_sedativa' WHERE `t_sedativa`.`id` = '$idSedativa'; ");
        
    //     //edit halusinogen
        $queryIdHalusinogen = mysqli_query($koneksi,"SELECT id FROM t_halusinogen WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdHalusinogen);
        $idHalusinogen = $dataId['id'];
        $queryHalusinogen = mysqli_query($koneksi,"UPDATE `t_halusinogen` SET `p2_halusinogen` = '$p2_halusinogen', `p3_halusinogen` = '$p3_halusinogen', `p4_halusinogen` = '$p4_halusinogen', `p5_halusinogen` = '$p5_halusinogen', `p6_halusinogen` = '$p6_halusinogen', `p7_halusinogen` = '$p7_halusinogen' WHERE `t_halusinogen`.`id` = '$idHalusinogen'; ");
        
    //     //edit opioid
        $queryIdOpioid = mysqli_query($koneksi,"SELECT id FROM t_opioid WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdOpioid);
        $idOpioid = $dataId['id'];
        $queryOpioid = mysqli_query($koneksi,"UPDATE `t_opioid` SET `p2_opioid` = '$p2_opioid', `p3_opioid` = '$p3_opioid', `p4_opioid` = '$p4_opioid', `p5_opioid` = '$p5_opioid', `p6_opioid` = '$p6_opioid', `p7_opioid` = '$p7_opioid' WHERE `t_opioid`.`id` = '$idOpioid'; ");
        
    //     //edit lainnya
        $queryIdLainnya = mysqli_query($koneksi,"SELECT id FROM t_lainnya WHERE id_skrining = '$id_skrining'");
        $dataId = mysqli_fetch_array($queryIdLainnya);
        $idLainnya = $dataId['id'];
        $queryLainnya = mysqli_query($koneksi,"UPDATE `t_lainnya` SET `p2_lainnya` = '$p2_lainnya', `p3_lainnya` = '$p3_lainnya', `p4_lainnya` = '$p4_lainnya', `p5_lainnya` = '$p5_lainnya', `p6_lainnya` = '$p6_lainnya', `p7_lainnya` = '$p7_lainnya' WHERE `t_lainnya`.`id` = '$idLainnya'; ");
    
    }
    else{
        
        $querySkrining = mysqli_query($koneksi,"INSERT INTO `t_skrining` (`id_user`, `id_pengguna`, `id_skrining`, `p8`, `assist_tembakau`, `assist_alkohol`, `assist_kanabis`, `assist_kokain`, `assist_amfetamin`, `assist_inhalansia`, `assist_sedativa`, `assist_halusinogen`, `assist_opioid`, `assist_lainnya`) 
        VALUES ('$id_user', '$id_pengguna', NULL, '$p8', $hasil_tembakau, $hasil_alkohol, $hasil_kanabis, $hasil_kokain, $hasil_amfetamine, $hasil_inhalansia, $hasil_sedativa, $hasil_halusinogen, $hasil_opioid, $hasil_lainnya);");
        
        $query = mysqli_query($koneksi,"SELECT `id_skrining` FROM `t_skrining` WHERE `id_pengguna` = '$id_pengguna'");
        while($data = mysqli_fetch_array($query)){
            $id_skrining = $data['id_skrining'];
        }

    //     //tambah tembakau
        $queryTembakau = mysqli_query($koneksi,"INSERT INTO `t_tembakau` (`id`, `id_skrining`, `pengisi`, `p2_tembakau`, `p3_tembakau`, `p4_tembakau`, `p5_tembakau`, `p6_tembakau`, `p7_tembakau`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_tembakau', '$p3_tembakau', '$p4_tembakau', '$p5_tembakau', '$p6_tembakau', '$p7_tembakau');");
        
    //     //tambah alkohol
        $queryAlkohol = mysqli_query($koneksi,"INSERT INTO `t_alkohol` (`id`, `id_skrining`, `pengisi`, `p2_alkohol`, `p3_alkohol`, `p4_alkohol`, `p5_alkohol`, `p6_alkohol`, `p7_alkohol`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_alkohol', '$p3_alkohol', '$p4_alkohol', '$p5_alkohol', '$p6_alkohol', '$p7_alkohol');"); 
        
    //     //tambah kanabis
        $queryKanabis = mysqli_query($koneksi,"INSERT INTO `t_kanabis` (`id`, `id_skrining`, `pengisi`, `p2_kanabis`, `p3_kanabis`, `p4_kanabis`, `p5_kanabis`, `p6_kanabis`, `p7_kanabis`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_kanabis', '$p3_kanabis', '$p4_kanabis', '$p5_kanabis', '$p6_kanabis', '$p7_kanabis');"); 
        
    //     //tambah kokain 
        $queryKokain = mysqli_query($koneksi,"INSERT INTO `t_kokain` (`id`, `id_skrining`, `pengisi`, `p2_kokain`, `p3_kokain`, `p4_kokain`, `p5_kokain`, `p6_kokain`, `p7_kokain`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_kokain', '$p3_kokain', '$p4_kokain', '$p5_kokain', '$p6_kokain', '$p7_kokain');");  
        
    //     //tambah amfetamine
        $queryAmfetamine = mysqli_query($koneksi,"INSERT INTO `t_amfetamine` (`id`, `id_skrining`, `pengisi`, `p2_amfetamine`, `p3_amfetamine`, `p4_amfetamine`, `p5_amfetamine`, `p6_amfetamine`, `p7_amfetamine`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_amfetamine', '$p3_amfetamine', '$p4_amfetamine', '$p5_amfetamine', '$p6_amfetamine', '$p7_amfetamine');");
        
    //     //tambah inhalansia 
        $queryInhalansia = mysqli_query($koneksi,"INSERT INTO `t_inhalansia` (`id`, `id_skrining`, `pengisi`, `p2_inhalansia`, `p3_inhalansia`, `p4_inhalansia`, `p5_inhalansia`, `p6_inhalansia`, `p7_inhalansia`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_inhalansia', '$p3_inhalansia', '$p4_inhalansia', '$p5_inhalansia', '$p6_inhalansia', '$p7_inhalansia');");
        
    //     //tambah sedativa
        $querySedativa = mysqli_query($koneksi,"INSERT INTO `t_sedativa` (`id`, `id_skrining`, `pengisi`, `p2_sedativa`, `p3_sedativa`, `p4_sedativa`, `p5_sedativa`, `p6_sedativa`, `p7_sedativa`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_sedativa', '$p3_sedativa', '$p4_sedativa', '$p5_sedativa', '$p6_sedativa', '$p7_sedativa');");
        
    //     //tambah halusinogen
        $queryHalusinogen = mysqli_query($koneksi,"INSERT INTO `t_halusinogen` (`id`, `id_skrining`, `pengisi`, `p2_halusinogen`, `p3_halusinogen`, `p4_halusinogen`, `p5_halusinogen`, `p6_halusinogen`, `p7_halusinogen`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_halusinogen', '$p3_halusinogen', '$p4_halusinogen', '$p5_halusinogen', '$p6_halusinogen', '$p7_halusinogen');");
        
    //     //tambah opioid
        $queryOpioid = mysqli_query($koneksi,"INSERT INTO `t_opioid` (`id`, `id_skrining`, `pengisi`, `p2_opioid`, `p3_opioid`, `p4_opioid`, `p5_opioid`, `p6_opioid`, `p7_opioid`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_opioid', '$p3_opioid', '$p4_opioid', '$p5_opioid', '$p6_opioid', '$p7_opioid');");
        
    //     //tambah lainnya
        $queryLainnya = mysqli_query($koneksi,"INSERT INTO `t_lainnya` (`id`, `id_skrining`, `pengisi`, `p2_lainnya`, `p3_lainnya`, `p4_lainnya`, `p5_lainnya`, `p6_lainnya`, `p7_lainnya`) VALUES (NULL, '$id_skrining', '$posisi', '$p2_lainnya', '$p3_lainnya', '$p4_lainnya', '$p5_lainnya', '$p6_lainnya', '$p7_lainnya');");

    }

    header("location:testassist.php");
    exit();
}
?>