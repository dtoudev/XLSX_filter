<?php
include_once 'SimpleXLSX.php';

$xlsx = new SimpleXLSX('xxxx.xlsx');

// Abrir un nuevo archivo CSV para escritura
$csv = fopen('new_file.csv', 'w');

foreach ($xlsx->rows() as $fields) {
    // Dividir el contenido de la cuarta celda por el primer dígito hasta el final
    $split_data = preg_split('/(\d+)/', $fields[3], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

    // Reemplazar el contenido de la cuarta celda con los datos divididos
    $fields[3] = $split_data;

    // Escribir los datos de la fila en el archivo CSV
    fputcsv($csv, $fields);
}

// Cerrar el archivo CSV
fclose($csv);
