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