<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
        <Table class="table table-bordered">
            <thead>
                <th>Nama pengadu</th>
                <th>Kategori</th>
                <th>Subkategori</th>
                <th>Status</th>
            </thead>
            <tbody>
                <?php foreach($pengaduan as $p):?>
                <tr>
                    <td><?=$p['nama']?></td>
                    <td><?=$p['kategori']?></td>
                    <td><?=$p['subkategori']?></td>
                    <td><?=$p['status']?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </Table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>