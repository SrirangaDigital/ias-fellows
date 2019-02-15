<div class="container-fluid fellow-profile">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center header">
            <h1>Associates</h1>
            <h4><?=$data['listTitle']?></h4>
        </div>
    </div>
    <div class="row justify-content-center">
<?php foreach ($data['data'] as $row) { ?>
        <div class="card col-md-2 fellow">
            <div class="avatar-holder">
                <a target="blank" href="<?=BASE_URL?>profile/va/<?=$row['id']?>">
                    <?=$viewHelper->printAvatar($row)?>
                </a>
                <a href="<?=BASE_URL?>listing/a?associate.yearelected=<?=$row['associate']['yearelected']?>" title="Year elected: <?=$row['associate']['yearelected']?>">
                    <span class="year blue"><?=$row['associate']['yearelected']?></span>
                </a>
                <?php if(preg_match('/former/', $row['associate']['type'])) { ?>
                    <span class="deceased red">Former</span>
                <?php } ?>
            </div>
            <div class="card-body">
                <a target="blank" href="<?=BASE_URL?>profile/va/<?=$row['id']?>">
                    <h5 class="card-title"><?=$viewHelper->printFellowName($row)?></h5>
                </a>
            </div>
        </div>
<?php } ?>
    </div>
</div>
