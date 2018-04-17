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
    <?php foreach ($result as $key => $value):?>
    <tr>
        <th><?php echo $key;?></th>
        <th><?php echo $param[$key];?></th>
    </tr>
    <?php endforeach;?>
</table>

<script type="text/javascript" src=""></script>
</body>
</html>