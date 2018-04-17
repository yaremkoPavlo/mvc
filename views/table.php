<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/master.css">
</head>
<body>
<h3>Selected information</h3>
<table>
    <!-- render head of table -->
    <tr>
        <?php foreach ($result[0] as $key => $value):?>
        <th>
            <?php echo $key;?>
        </th>
        <?php endforeach;?>
    </tr>

    <!-- render table body -->
    <?php foreach ($result as $value):?>
        <tr>
            <?php foreach ($value as $key => $item):?>
                <td>
                    <?php echo $item;?>
                </td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
</table>

<script type="text/javascript" src=""></script>
</body>
</html>