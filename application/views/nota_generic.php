<html>
<head>
    <title>Cetak Nota <?= $id_pemesanan ?></title>
    <link href="<?= base_url() ?>assets/print.css" rel="stylesheet">
</head>
<body class="struk">
    <section class="sheet">
        <?= str_repeat("&nbsp;", 7) ?> 
        <!-- <img src="<?= base_url() ?>assets/images/logo111.png" alt="" width="40%"> -->

        <?php $judul = "WAROENG MODUS"; ?>
        <h2><?= str_repeat("&nbsp;", (15 - strlen($judul))) . $judul; ?></h2>

        <table cellpadding="0" cellspacing="0" style="width:100%">
            <tr>
                <td align="left" class="txt-left">Nota&nbsp;</td>
                <td align="left" class="txt-left">:</td>
                <td align="left" class="txt-left">&nbsp;<?= $id_pemesanan; ?></td>
            </tr>
            <tr>
                <td align="left" class="txt-left">Waktu&nbsp;</td>
                <td align="left" class="txt-left">:</td>
                <td align="left" class="txt-left">&nbsp;<?= date('d-m-Y H:i', strtotime($tanggal)); ?></td>
            </tr>
            <!-- Hapus kolom meja -->
            <!-- <tr>
                <td align="left" class="txt-left">Meja&nbsp;</td>
                <td align="left" class="txt-left">:</td>
                <td align="left" class="txt-left">&nbsp;<?= $no_meja; ?></td>
            </tr> -->
            <tr>
                <td align="left" class="txt-left">Kasir&nbsp;</td>
                <td align="left" class="txt-left">:</td>
                <td align="left" class="txt-left">&nbsp;<?= $nm_karyawan; ?></td>
            </tr>
        </table>

        <?php
        echo '<br/>';

        echo '<table cellpadding="0" cellspacing="0" style="width:100%">
            <tr>
                <td align="left" class="txt-left">'. str_repeat("=", 38) . '</td>
            </tr>';

        if (!empty($detailpesanan_data)) {
            foreach ($detailpesanan_data as $row) {
                $item = $row->nama_menu . str_repeat("&nbsp;", (38 - strlen($row->nama_menu)));
                echo '<tr>';
                    echo '<td align="left" class="txt-left">' . $item . '</td>';
                echo '</tr>';

                echo '<tr>';
                $jumlah = str_repeat("&nbsp;", 1) . $row->jumlah . 'x ';

                $harga = '@' . number_format($row->harga, 0, ',', '.');

                $subtotal = str_repeat("&nbsp;", (15 - strlen(number_format($row->subtotal, 0, ',', '.')))) . number_format($row->subtotal, 0, ',', '.');

                echo '<td class="txt-left" align="left">' . $jumlah . $harga . $subtotal . '</td>';
                
                echo '</tr>';
            }

            echo '<tr><td>' . str_repeat('-', 27) . '</td></tr>';

            // Sub Total
            $titleST = 'Total';
            $titleST = $titleST . ' ' . $jlh_menu . ' menu';
            $ST = number_format($total, 0, ',', '.');
            $ST = str_repeat("&nbsp;", (14 - strlen($ST))) . $ST;
            echo '<tr><td>' . $titleST . $ST . '</td></tr>';

            echo '<tr><td>' . str_repeat('-', 27) . '</td></tr>';

            // Bayar
            $titlePy = 'Tunai';
            $Py = number_format($tunai, 0, ',', '.');
            $Py = str_repeat("&nbsp;", (21 - strlen($Py))) . $Py;
            echo '<tr><td>' . $titlePy . $Py . '</td></tr>';

            // Kembali
            $titleK = 'Kembali';
            $Kb = number_format($tunai - $total, 0, ',', '.');
            $Kb = str_repeat("&nbsp;", (19 - strlen($Kb))) . $Kb;
            echo '<tr><td>' . $titleK . $Kb . '</td></tr>';
        }
        echo '</table>';

        $footer = 'TERIMA KASIH';
        $starSpace = (25 - strlen($footer)) / 2;
        $starFooter = str_repeat('*', (int)($starSpace + 1));
        echo '<br/>'; 
        echo ($starFooter . '&nbsp;' . $footer . '&nbsp;' . $starFooter . "<br/>");
        echo '<p>&nbsp;</p>'; 
        echo str_repeat('=', 29);
        ?>
    </section>
</body>
<script type="text/javascript">
    window.print();
</script>
</html>
