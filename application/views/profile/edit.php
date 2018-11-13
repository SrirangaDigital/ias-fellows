<div class="container fellow-profile">
    <div class="row">
        <div class="col-md-9 main mainform">
            <fieldset class="form-control">
                <legend>Profile</legend>
                <div class="form-group field">
                    <label class="col-form-label">*Name</label><br />
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
                            <small id="profile-name-first-help" class="form-text text-muted">Name is mandatory</small>
                        </div>
                    </div>
                    <div class="row subField">
                        <label for="profile-name-last" class="col-md-2 col-form-label">Last name</label>
                        <div class="col-md-10">
                            <input required class="form-control" type="text" name="profile-name-last" id="profile-name-last" value="<?=isset($data['profile']['name']['last']) ? $data['profile']['name']['last'] : ''?>"/>
                            <small id="profile-name-last-help" class="form-text text-muted">Name is mandatory</small>
                        </div>
                    </div>
                </div>
                <div class="form-group field">
                    <input class="form-check-input" type="radio" name="profile-sex" id="profile-sex" />
                    <label for="profile-sex" class="col-form-label">Male</label>
                    <input class="form-check-input ml-4" type="radio" name="profile-sex" id="profile-sex" />
                    <label for="profile-sex" class="col-form-label">Female</label>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3 sidebar">
<?php require_once('application/views/generalSidebar.php');?>
        </div>
    </div>
</div>
