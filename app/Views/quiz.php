<section>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion " id="sidenavAccordion" style="background-color:turquoise;">
                <div class="sb-sidenav-menu">
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="container-fluid">
                <div class="container">
                    <h3 class="mt-3 ml-3">
                        แบบทดสอบ
                    </h3>
                    <?php $i = 1; ?>
                    <?php foreach ($quiz as $get) : ?>
                        <div class="card mt-3">
                            <div class="card-header">
                                <?= $i . '. ' . $get['question']; ?>
                            </div>
                            <div class="card-body">
                                <?php count($get['title']); ?>
                                <?php $j = 0; ?>
                                <?php foreach ($get['title'] as $show) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="quetion<?= $i ?>" id="exampleRadios1" value="<?= $get['option'][$j]; ?>">
                                        <label class="form-check-label" for="exampleRadios1">
                                            <?= $show ?>
                                        </label>
                                    </div>

                                    <?php $j++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>

    </div>

</section>