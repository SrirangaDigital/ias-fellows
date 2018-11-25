<div class="container-fluid fellow-profile">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center header">
            <h1>Fellows</h1>
            <h4>of the Indian Academy of Sciences</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 fellow">
            <p>Choose from the below to retrieve corresponding list of profiles of Fellows, or use the search form below to retrieve profiles from list of present Fellows. Search may be performed by name or part of name of Fellow, place of work, section in which elected, and year of election.</p>
        </div>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="card col-md-3 fellow">
            <div class="card-body">
                <h5 class="card-title text-center">View by Type</h5>
                <p class="card-text">
                    <a href="<?=BASE_URL?>listing/f?fellowship.type=current"><span class="section green">Present Fellows</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.type=current&profile.sex=F"><span class="section green">Present Women Fellows</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.type=deceased"><span class="section green">Deceased Fellows</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.type=deceased&profile.sex=F"><span class="section green">Deceased Women Fellows</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.type=honorary"><span class="section green">Honorary Fellows</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.type=deceased,honorary"><span class="section green">Deceased Honorary Fellows</span></a><br />
                </p>
            </div>
        </div>
        <div class="card col-md-3 fellow">
            <div class="card-body">
                <h5 class="card-title text-center">View by Section</h5>
                <p class="card-text">
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Animal Sciences')?>"><span class="section green">Animal Sciences</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Chemistry')?>"><span class="section green">Chemistry</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Earth &amp; Planetary Sciences')?>"><span class="section green">Earth &amp; Planetary Sciences</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Engineering & Technology')?>"><span class="section green">Engineering & Technology</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Engineering &amp; Technology')?>"><span class="section green">Engineering &amp; Technology</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('General Biology')?>"><span class="section green">General Biology</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Mathematical Sciences')?>"><span class="section green">Mathematical Sciences</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Medicine')?>"><span class="section green">Medicine</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Physics')?>"><span class="section green">Physics</span></a><br />
                    <a href="<?=BASE_URL . 'listing/f?fellowship.section=' . urlencode('Plant Sciences')?>"><span class="section green">Plant Sciences</span></a><br />
                </p>
            </div>
        </div>
        <div class="card col-md-3 fellow">
            <div class="card-body mainform">
                <h5 class="card-title text-center">Search</h5>
                <form class="mt-5" action="<?=BASE_URL?>listing/f" method="get">
                    <div class="form-label-group">
                        <input type="text" name="profile.name.display" id="profile.name.display" class="form-control" placeholder="Name">
                        <label for="profile.name.display">Name</label>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="contact.city" id="contact.city" class="form-control" placeholder="Place">
                        <label for="contact.city">Place</label>
                    </div>
                    <div class="form-label-group">
                        <input list="sections" type="text" name="fellowship.section" id="fellowship.section" class="form-control" placeholder="Section">
                        <label for="fellowship.section">Section</label>
                        <datalist id="sections">
                            <option value="Animal Sciences">
                            <option value="Chemistry">
                            <option value="Earth &amp; Planetary Sciences">
                            <option value="Engineering & Technology">
                            <option value="Engineering &amp; Technology">
                            <option value="General Biology">
                            <option value="Mathematical Sciences">
                            <option value="Medicine">
                            <option value="Physics">
                            <option value="Plant Sciences">
                        </datalist>
                    </div>
                    <div class="form-label-group">
                        <input type="text" name="fellowship.yearelected" id="fellowship.yearelected" class="form-control" placeholder="Year Elected">
                        <label for="fellowship.yearelected">Year Elected</label>
                    </div>
                    <input type="hidden" id="regexAll" name="regexAll">
                    <input type="submit" id="submit" class="form-control search" value="Search">
                </form>
            </div>
        </div>
    </div>
</div>
