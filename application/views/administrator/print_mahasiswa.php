<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nim</th>
            <th>Tanggal lahir</th>
            <th>Jurusan</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No Telpon</th>
        </tr>
        <?php
        $no = 1;
        foreach ($mahasiswa as $row) :
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $row->nim ?></td>
                <td><?php echo $row->tgl_lahir ?></td>
                <td><?php echo $row->jurusan ?></td>
                <td><?php echo $row->alamat ?></td>
                <td><?php echo $row->email ?></td>
                <td><?php echo $row->no_telp ?></td>

            </tr>
        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>