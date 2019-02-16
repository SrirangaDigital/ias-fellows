<div class="container fellow-profile">
    <div class="row">
        <div class="col-md-9 main">
            <div class="row">
                <div class="col-md-9 col-xs-12 clear-paddings align-self-top">
                    <?php if($viewHelper->isLoggedInAsAdmin()) { ?>
                    <p><a href="<?=BASE_URL . 'profile/e/' . $data['id']?>" class="text-danger">Edit profile</a></p>
                    <?php } ?>
                
                    <h1><?=$viewHelper->printFellowName($data)?></h1>
                    <p class="affiliation"><?=$viewHelper->printAffiliation($data)?></p>
                    <p class="fellowship"><?=$viewHelper->printAssociateType($data)?></p>
                    
                    <?php if(isset($data['profile']['specialization'])) { ?>
                        <p class="specialization"><strong>Specialization:</strong> <?=$data['profile']['specialization']?></p>
                    <?php } ?>
                    
                    <?php if(preg_match('/former/', $data['associate']['type'])) { ?>
                        <p class="text-danger">Former</p>
                    <?php } ?>
                </div>
                <div class="col-md-3 col-xs-12 clear-paddings text-center align-self-center">
                    <?=$viewHelper->printAvatar($data)?>
                </div>
            </div>

            <?php if(isset($data['profile']['biography'])) { ?>
                <h2>Biography</h2>
                <p class="biodata"><?=$data['profile']['biography']?></p>
            <?php } ?>

            <?php if(isset($data['contact'])) { ?>
                <h2>Contact</h2>
                <?=$viewHelper->printContact($data)?>
            <?php } ?>
        </div>
        <div class="col-md-3 sidebar">
<?php require_once('application/views/generalSidebar.php');?>
        </div>
    </div>
</div>
