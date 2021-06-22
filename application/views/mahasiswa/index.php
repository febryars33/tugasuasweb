<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 1; $i <= 10; $i++) : ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $faker->name() ?></td>
                <td>x</td>
                <td>x</td>
                <td>x</td>
            </tr>
        <?php endfor ?>
    </tbody>
</table>