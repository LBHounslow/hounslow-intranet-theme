<div class="row">
    <div class="col">
        <h4 class="mt-2">Events</h4>
    </div>
</div>
<div class="row outer">
    <div class="inner">
        <?php if (class_exists('EM_Calendar')) {
            echo EM_Calendar::output(array('full' => 0, 'long_events' => 1));
        } ?>
    </div>

</div>
<div class="row">
    <?php if (class_exists('EM_Events')) {
        $EM_Events = EM_Events::get(array('limit' => 4, 'scope' => 'future'));

        foreach ($EM_Events as $EM_Event) {
            echo $EM_Event->output(
                '    <div class="col-lg-12 outer">

            <div class="inner event ">
                <div class="blog-img" style="background:url(#_EVENTIMAGEURL);height:200px;background-size:cover;">
                        </div>
                <div class="">

                    <h5>#_EVENTNAME</h5>
    <h6>#_EVENTDATES|#_12HSTARTTIME</h6>
    <div>
    <a style="color:white;"href="#_EVENTURL"><button class="btn btn-dark">Read More</button></a>
        </div>
                </div>
                </div>
                </div>

            '
            );
        }
    } ?>
</div>
<div class="row outer">
    <div class="col inner-feature shadow">
        <a class="btn btn-dark float-right" style="color:white;" href="/events">View all Events</a>
    </div>
</div>