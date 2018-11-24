<div class="container-fluid fellow-profile">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center header">
            <h1>Fellows</h1>
            <h4>of the Indian Academy of Sciences</h4>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 fellow">
            <p>Choose from the below to retrieve corresponding list of profiles of Fellows, or use the search form below to retrieve profiles from list of present Fellows. Search may be performed by name or part of name of Fellow, place of work, section in which elected, and year of election, with an option to include past Fellows.</p>
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
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Animal Sciences"><span class="section green">Animal Sciences</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Chemistry"><span class="section green">Chemistry</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Earth &amp; Planetary Sciences"><span class="section green">Earth &amp; Planetary Sciences</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Engineering & Technology"><span class="section green">Engineering & Technology</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Engineering &amp; Technology"><span class="section green">Engineering &amp; Technology</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=General Biology"><span class="section green">General Biology</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Mathematical Sciences"><span class="section green">Mathematical Sciences</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Medicine"><span class="section green">Medicine</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Physics"><span class="section green">Physics</span></a><br />
                    <a href="<?=BASE_URL?>listing/f?fellowship.section=Plant Sciences"><span class="section green">Plant Sciences</span></a><br />
                </p>
            </div>
        </div>
    </div>
</div>
