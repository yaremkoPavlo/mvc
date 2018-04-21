<h3>Selected information</h3>
<table>
    <?php foreach ($result as $key => $value):?>
    <tr>
        <th><?php echo $key;?></th>
        <th><?php echo $param[$key];?></th>
    </tr>
    <?php endforeach;?>
</table>