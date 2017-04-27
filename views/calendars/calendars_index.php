<h3><?= __("Calendars") ?></h3>
<ul class="list-group">
    <?php foreach ($calendars as $calendar): ?>
        <li class="list-group-item">
            <a href="calendars/<?= $calendar['calendar_id'] ?>/<?= $calendar['calendar_name'] ?>"><?= $calendar['calendar_name'] ?></a>
        </li>
    <?php endforeach ?>
</ul