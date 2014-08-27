@extends('layouts.logged')
@section('content')
Здравей, потребител {{Auth::user()->username}}!<br />
Тук ще видите всички коментари
<br />
<br />
<?php
//print_r($n1['title']);
?>
<table><tr>
        <th>Заглавие на коментара</th>
        <th>Съдържание на коментара</th>
        <th>Номер на потребителя</th>
        <th>Номер на категорията</th>
    </tr>
    <?php
    for ($index = 1; $index <= $count; $index++) {
        $name = 'n' . $index;
        $test = $$name;
        ?>

        <?php
        foreach ($test as $comment) {
            ?>

            <tr>
                <td><?= $comment['title' . $index]; ?></td>
                <td><?= $comment['text' . $index]; ?></td>
                <td><?= $comment['user_id' . $index]; ?></td>
                <td><?= $comment['category_name' . $index]; ?></td>
            </tr>

        <?php }
        ?>
        <?php
//    print_r($test[$name]['title'.$index]);
//    echo '<br >';
    }
    ?>
</table>
@stop