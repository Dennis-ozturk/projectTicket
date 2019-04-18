<?php
if (empty($rows)) { } else { ?>
    <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <?php
                // Slideshow that gets img from database ref
                foreach ($rows as $row) {
                    if ($slideshowIndex == 0) {
                        break;
                    } elseif ($slideshowIndex == 4) { ?>
                        <div class="carousel-item active">
                            <img src="../assets/img/events/<?php echo $row['img']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php
                        $slideshowIndex--;
                    } else { ?>
                        <div class="carousel-item">
                            <img src="../assets/img/events/<?php echo $row['img']; ?>" class="d-block w-100" alt="...">
                        </div>
                        <?php
                        $slideshowIndex--;
                    }
                } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
<?php
}
?>