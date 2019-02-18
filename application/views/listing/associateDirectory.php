<div class="container-fluid fellow-profile">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center header">
            <h1>Associates</h1>
            <h4>of the Indian Academy of Sciences</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 fellow">
            <p>Choose from the below to retrieve corresponding list of profiles of Associates, or use the search form below to retrieve profiles from list of present Associates. Search may be performed by name or part of name of Fellow, place of work, and year of election.</p>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="card col-md-2 fellow">
            <div class="card-body">
                <h5 class="card-title text-center">View by Type</h5>
                <p class="card-text">
                    <a href="<?=BASE_URL?>listing/a?associate.type=current"><span class="section green">Present Associates</span></a><br />
                    <a href="<?=BASE_URL?>listing/a?associate.type=current&profile.sex=F"><span class="section green">Women Associates</span></a><br />
                    <a href="<?=BASE_URL?>listing/a?associate.type=former"><span class="section green">Former Associates</span></a><br />
                </p>
            </div>
        </div>
        <div class="card col-md-3 fellow">
            <div class="card-body">
                <h5 class="card-title text-center">View by Year</h5>
                <p class="card-text year">
                    <?php foreach ($data['year'] as $year) { ?>
                        <a href="<?=BASE_URL?>listing/a?associate.yearelected=<?=$year?>"><span class="section green"><?=$year?></span></a>&nbsp;&nbsp;
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="card col-md-3 fellow">
            <div class="card-body mainform">
                <h5 class="card-title text-center">Search</h5>
                <form class="mt-5" action="<?=BASE_URL?>listing/a" method="get">
                    <div class="form-label-group">
                        <input type="text" name="profile.name.display" id="profile.name.display" class="form-control" placeholder="Name">
                        <label for="profile.name.display">Name</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="contact.city" id="contact.city" class="form-control" placeholder="Place">
                        <label for="contact.city">Place</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="associate.yearelected" id="associate.yearelected" class="form-control" placeholder="Year Elected">
                        <label for="associate.yearelected">Year Elected</label>
                    </div>
                    <input type="hidden" id="regexAll" name="regexAll">
                    <input type="submit" id="submit" class="form-control search" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>
