<html>
<head>

</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Deskripsi singkat</th>
        <th>link</th>
        <th>1080p</th>
        <th>720p</th>
        <th>480p</th>
    </tr>
<?php
if($anime->num_rows() > 0)
{
    $data = $anime->result_array();
    foreach($data as $anime_item)
    {
        $desc= explode(".", $anime_item['description'], 3);
?>
    <tr>
        <td><?php echo $anime_item['id']; ?></td>
        <td><?php echo $anime_item['title']; ?></td>
        <td><?php echo $desc[0].'.'.$desc[1].'.'; ?></td>
        <td></td>
        <td><?php echo $anime_item['r_1080']; ?></td>
        <td><?php echo $anime_item['r_720']; ?></td>
        <td><?php echo $anime_item['r_480']; ?></td>
    </tr>
<?php
    }
} else
{
?>
    <tr><td colspan="7" style="text-align: center;">Tidak Ada Data</td> </tr>
<?php
}
?>
</table>
</body>
</html>