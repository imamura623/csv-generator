<?php
// 追加したいメンバーのID
$member_id = array(
        1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        );

// csvファイル作成
foreach ($member_id as $value) {

    // 書き込みたい内容(改行コードはCR+LF)
    $write_data = "member_id"."\r\n".$value."\r\n";

    // 作成するファイル名の指定
    $file_name = "member_id_".$value.".csv";

    // ファイルの存在確認
    if( !file_exists($file_name) ){
        // ファイル作成
        touch( $file_name );
    }else{
        // すでにファイルが存在する為エラーとする
        echo('Warning - ファイルが存在しています。 file name:['.$file_name.']'."\n");
        exit();
    }

    // ファイルのパーティションの変更
    chmod( $file_name, 0666 );

    // delete_memberの書き込み
    $fp = fopen($file_name, "w");
    @fwrite($fp, $write_data, strlen($write_data));
    fclose($fp);
    echo('Info - ファイル作成完了。 file name:['.$file_name.']'."\n");
}

?>
