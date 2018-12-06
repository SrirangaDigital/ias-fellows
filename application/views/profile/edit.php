<?php
    $rand = rand();

    if(file_exists(PHY_AVATAR_URL . $data['id'] . '.jpg'))
        $avatar = AVATAR_URL . $data['id'] . '.jpg?v=' . $rand;
    else
        $avatar = STOCK_AVATAR_URL;
?>
<div class="container fellow-profile">
    <div class="row">
        <div class="col-md-9 main">
            <h1>Edit profile</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 main mainform">
            <form action="<?=BASE_URL?>profile/update" method="post" id="editForm">
                <fieldset class="form-control">
                    <legend>Profile</legend>
                    <div class="form-group field">
                        <div class="row subField">
                            <label for="profile-name-salutation" class="col-md-2 col-form-label">Avatar</label>
                            <div class="col-md-10">
                                <img id="avatar" class="img-thumbnail" src="<?=$avatar?>" alt="Profile image" /><br />
                                <input type="file" accept="image/*" onchange="updateAvatar(this);"  name="profile-avatar" id="profile-avatar-button" />
                            </div>
                        </div><br />
                        <label class="col-form-label">*Name</label>
                        <div class="row subField">
                            <label for="profile-name-salutation" class="col-md-2 col-form-label">Salutation</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="profile-name-salutation" id="profile-name-salutation" value="<?=isset($data['profile']['name']['salutation']) ? $data['profile']['name']['salutation'] : ''?>"/>
                                <small id="profile-name-salutation-help" class="form-text text-muted">Name is mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="profile-name-first" class="col-md-2 col-form-label">First name</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="profile-name-first" id="profile-name-first" value="<?=isset($data['profile']['name']['first']) ? $data['profile']['name']['first'] : ''?>"/>
                                <small id="profile-name-first-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="profile-name-last" class="col-md-2 col-form-label">Last name</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="profile-name-last" id="profile-name-last" value="<?=isset($data['profile']['name']['last']) ? $data['profile']['name']['last'] : ''?>"/>
                                <small id="profile-name-last-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label class="col-md-2 col-form-label">Gender</label>
                            <div class="col-md-10">
                                <label for="profile-sex-male" class="col-form-label">Male</label>
                                <input class="form-check-input ml-2" type="radio" name="profile-sex-male" id="profile-sex-male" <?php if(isset($data['profile']['sex']) && $data['profile']['sex'] == 'M') { ?> checked="checked" <?php } ?> />
                                <label for="profile-sex-female" class="col-form-label">Female</label>
                                <input class="form-check-input ml-2" type="radio" name="profile-sex-female" id="profile-sex-female" <?php if(isset($data['profile']['sex']) && $data['profile']['sex'] == 'F') { ?> checked="checked" <?php } ?> />
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="profile-birthDate" class="col-md-2 col-form-label">Date of Birth</label>
                            <div class="col-md-10">
                                <input required pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])" placeholder="yyyy-mm-dd" class="form-control datePicker" type="text" name="profile-birthDate" id="profile-birthDate" value="<?=isset($data['profile']['birthDate']) ? $data['profile']['birthDate']:''?>" />
                                <small id="profile-birthDate-help" class="form-text text-muted">Date of birth is mandatory</small>
                            </div>
                        </div>
                        <?php if($data['isAdmin']) { ?>
                        <div class="row subField">
                            <label for="profile-deathDate" class="col-md-2 col-form-label">Date of Death</label>
                            <div class="col-md-10">
                                <input pattern="\d{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])" placeholder="yyyy-mm-dd" class="form-control datePicker" type="text" name="profile-deathDate" id="profile-deathDate" value="<?=isset($data['profile']['deathDate']) ? $data['profile']['deathDate']:''?>" />
                                <!-- <small id="profile-deathDate-help" class="form-text text-muted">Date of death</small> -->
                            </div>
                        </div>
                        <?php } else { ?>
                        <input class="form-control" type="hidden" name="profile-deathDate" id="profile-deathDate" value="<?=isset($data['profile']['deathDate']) ? $data['profile']['deathDate']:''?>" />
                        <?php } ?>
                        <div class="row subField">
                            <label for="profile-degree" class="col-md-2 col-form-label">Degree</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="profile-degree" id="profile-degree" value="<?=isset($data['profile']['degree']) ? $data['profile']['degree'] : ''?>" />
                                <small id="profile-degree-help" class="form-text text-muted">Degree is required</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="profile-honours" class="col-md-2 col-form-label">Honours</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="profile-honours" id="profile-honours" value="<?=isset($data['profile']['honours']) ? $data['profile']['honours'] : ''?>" />
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="profile-specialization" class="col-md-2 col-form-label">Specialization</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="profile-specialization" id="profile-specialization" value="<?=isset($data['profile']['specialization']) ? $data['profile']['specialization'] : ''?>" />
                                <small id="profile-degree-help" class="form-text text-muted">Degree is required</small>
                            </div>
                        </div>
                    </div>
                </fieldset>
<?php if($data['isAdmin']) { ?>
                <fieldset class="form-control">
                    <legend>Fellowship Details</legend>
                    <div class="form-group field">
                        <div class="row subField">
                            <label for="fellowship-type" class="col-md-2 col-form-label">Type</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="fellowship-type" id="fellowship-type" value="<?=isset($data['fellowship']['type']) ? $data['fellowship']['type'] : ''?>"/>
                                <small id="fellowship-type-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="fellowship-section" class="col-md-2 col-form-label">Section</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="fellowship-section" id="fellowship-section" value="<?=isset($data['fellowship']['section']) ? $data['fellowship']['section'] : ''?>"/>
                                <small id="fellowship-section-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="fellowship-yearelected" class="col-md-2 col-form-label">Year Elected</label>
                            <div class="col-md-10">
                                <input required pattern="\d{4}" class="form-control" type="text" name="fellowship-yearelected" id="fellowship-yearelected" value="<?=isset($data['fellowship']['yearelected']) ? $data['fellowship']['yearelected'] : ''?>"/>
                                <!-- <small id="fellowship-yearelected-help" class="form-text text-muted">Mandatory</small> -->
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="fellowship-councilservice" class="col-md-2 col-form-label">Council Service</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="fellowship-councilservice" id="fellowship-councilservice" value="<?=isset($data['fellowship']['councilservice']) ? $data['fellowship']['councilservice'] : ''?>"/>
                                <!-- <small id="fellowship-councilservice-help" class="form-text text-muted">Mandatory</small> -->
                            </div>
                        </div>
                    </div>
                </fieldset>
<?php }
    else {
        if(isset($data['fellowship'])){
            foreach ($data['fellowship'] as $key => $value) {
?>
                <input class="form-control" type="hidden" name="fellowship-<?=$key?>" id="fellowship-<?=$key?>" value="<?=$value?>" />
<?php } } }?>

                <fieldset class="form-control">
                    <legend>Contact Details</legend>
                    <div class="form-group field">
                        <div class="row subField">
                            <label for="contact-address" class="col-md-2 col-form-label">Address</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="contact-address" id="contact-address" value="<?=isset($data['contact']['address']) ? $data['contact']['address'] : ''?>"/>
                                <small id="contact-address-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="contact-city" class="col-md-2 col-form-label">City</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="contact-city" id="contact-city" value="<?=isset($data['contact']['city']) ? $data['contact']['city'] : ''?>"/>
                                <small id="contact-city-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="contact-state" class="col-md-2 col-form-label">State</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="contact-state" id="contact-state" value="<?=isset($data['contact']['state']) ? $data['contact']['state'] : ''?>"/>
                                <small id="contact-state-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <legend><small>Telephone</small></legend>
                        <div class="row subField">
                            <label for="contact-telephone-office" class="col-md-2 col-form-label">Office</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact-telephone-office" id="contact-telephone-office" value="<?=isset($data['contact']['telephone']['office']) ? $data['contact']['telephone']['office'] : ''?>"/>
                                <small id="contact-telephone-office-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="contact-telephone-residence" class="col-md-2 col-form-label">Residence</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact-telephone-residence" id="contact-telephone-residence" value="<?=isset($data['contact']['telephone']['residence']) ? $data['contact']['telephone']['residence'] : ''?>"/>
                                <!-- <small id="contact-telephone-residence-help" class="form-text text-muted">Mandatory</small> -->
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="contact-telephone-mobile" class="col-md-2 col-form-label">Mobile</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="text" name="contact-telephone-mobile" id="contact-telephone-mobile" value="<?=isset($data['contact']['telephone']['mobile']) ? $data['contact']['telephone']['mobile'] : ''?>"/>
                                <small id="contact-telephone-mobile-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="contact-telephone-fax" class="col-md-2 col-form-label">Fax</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact-telephone-fax" id="contact-telephone-fax" value="<?=isset($data['contact']['telephone']['fax']) ? $data['contact']['telephone']['fax'] : ''?>"/>
                                <!-- <small id="contact-telephone-fax-help" class="form-text text-muted">Mandatory</small> -->
                            </div>
                        </div>
                        <legend><small>Email</small></legend>
                        <div class="row subField">
                            <label for="contact-email-personal" class="col-md-2 col-form-label">Personal</label>
                            <div class="col-md-10">
                                <input required class="form-control" type="email" name="contact-email-personal" id="contact-email-personal" value="<?=isset($data['contact']['email']['personal']) ? $data['contact']['email']['personal'] : ''?>"/>
                                <small id="contact-email-personal-help" class="form-text text-muted">Mandatory</small>
                            </div>
                        </div>
                        <div class="row subField">
                            <label for="contact-email-official" class="col-md-2 col-form-label">Official</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact-email-official" id="contact-email-official" value="<?=isset($data['contact']['email']['official']) ? $data['contact']['email']['official'] : ''?>"/>
                                <!-- <small id="contact-email-official-help" class="form-text text-muted">Mandatory</small> -->
                                <input class="form-control" type="hidden" name="id" id="id" value="<?=$data['id']?>" />
                            </div>
                        </div>
<?php if($data['isAdmin']) { ?>
                        <div class="row subField">
                            <label for="contact-url" class="col-md-2 col-form-label">URL</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" name="contact-url" id="contact-url" value="<?=isset($data['contact']['url']) ? $data['contact']['url'] : ''?>"/>
                                <!-- <small id="contact-url-help" class="form-text text-muted">Mandatory</small> -->
                            </div>
                        </div>
<?php } else { ?>
                        <input class="form-control" type="hidden" name="contact-url" id="contact-url" value="<?=isset($data['contact']['url']) ? $data['contact']['url'] : ''?>"/>
<?php } ?>
                    </div>
                </fieldset>
                <fieldset class="form-control" id="submitRegion">
                    <legend>Proceed</legend>
                    <div class="form-group">
                        <input class="form-control" type="submit" name="submit" id="submit" value="Update" />
                        <small class="text-muted">This button is enabled only when all fields of the form are properly filled</small>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-md-3 sidebar">
            <?php require_once('application/views/generalSidebar.php');?>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $('.mainform .datePicker').datepicker({

            format: "yyyy-mm-dd",
            forceParse: false
        });
    });

    function updateAvatar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar')
                .attr('src', e.target.result)
                .height(225);
            };

            reader.readAsDataURL(input.files[0]);
        }

        var formData = new FormData();
        formData.append('profilePicture', $('#profile-avatar-button')[0].files[0]);
        
        var id = $('#id').val();
        
        $.ajax({
            url: "<?=BASE_URL?>profile/addPicture/" + id,
            type: "POST",
            data: formData,
            enctype: 'multipart/form-data',
            success: function (msg) {

                console.log(msg)
            },
            contentType: false,
            processData: false
        });
        
    }

    formActions();
</script>