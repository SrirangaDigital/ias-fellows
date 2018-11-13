<div class="container-fluid fellow-profile">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center header">
            <h1>Fellows</h1>
            <h4><?=$data['listTitle']?></h4>
        </div>
    </div>
    <div class="row justify-content-center">
<?php foreach ($data['data'] as $row) { ?>
        <div class="card col-md-2 fellow">
            <a target="blank" href="<?=BASE_URL?>profile/v/<?=$row['id']?>">
                <img src="<?=PUBLIC_URL?>images/stock/avatar.svg" class="card-img-top" alt="Profile image" />
            </a>
            <div class="card-body">
                <a target="blank" href="<?=BASE_URL?>profile/v/<?=$row['id']?>">
                    <h5 class="card-title"><?=$viewHelper->printFellowName($row)?></h5>
                </a>
                <p class="card-text">
                    <?php if(preg_match('/honorary/', $row['fellowship']['type'])) { ?>
                        <a href="<?=BASE_URL?>listing/f?fellowship.type=honorary"><span class="section gold">Honorary</span></a>
                    <?php } ?>
                    <?php if(isset($row['fellowship']['section'])) { ?>
                        <a href="<?=BASE_URL?>listing/f?fellowship.section=<?=$row['fellowship']['section']?>"><span class="section green"><?=$row['fellowship']['section']?></span></a>
                    <?php } ?>
                </p>
            </div>
            <a href="<?=BASE_URL?>listing/f?fellowship.yearelected=<?=$row['fellowship']['yearelected']?>" title="Year elected: <?=$row['fellowship']['yearelected']?>">
                <span class="year blue"><?=$row['fellowship']['yearelected']?></span>
            </a>
            <?php if(preg_match('/deceased/', $row['fellowship']['type'])) { ?>
                <span class="deceased red">Deceased</span>
            <?php } ?>
        </div>
<?php } ?>
    </div>
</div>
