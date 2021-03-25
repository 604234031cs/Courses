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
                    <div class="text-right">
                        <h5>คะแนนล่าสุด <?= $user_exam['score_exam'] ?>% </h5>

                    </div>
                    <form action="<?= base_url('/succesquiz') ?>" method="POST">
                        <input type="text" name="id_exam_quiz" id="" value="<?= $user_exam['ex_id']; ?>" hidden>
                        <input type="text" name="score_exam" id="" value="<?= $user_exam['score_exam']; ?>" hidden>
                        <?php $i = 1; ?>
                        <?php foreach ($quiz as $get) : ?>
                            <div class="card mt-3">
                                <div class="card-header">
                                    <span style="font-size: 1.5em;"> <?= $i . '. ' . $get['question']; ?></span>
                                    <input type="text" name="q_id<?= $i; ?>" id="" value="<?= $get['q_id'] ?>" hidden>
                                </div>
                                <div class="card-body">
                                    <?php count($get['title']); ?>
                                    <?php $j = 0; ?>
                                    <?php foreach ($get['title'] as $show) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="quetion<?= $i ?>" id="exampleRadios1" value="<?= $get['option'][$j]; ?>">
                                            <label class="form-check-label" for="exampleRadios1">
                                                <?= $get['option'][$j]; ?> <?= $show ?>
                                            </label>
                                        </div>
                                        <?php $j++; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <input type="text" value="<?= --$i ?>" name="quiz_num" hidden>
                        <input type="text" value="<?= $id_courses ?>" name="id_courses" hidden>
                        <div class="form-group text-right mt-2">
                            <button class="btn btn-success">ส่งคำตอบ</button>
                        </div>
                </div>

                </form>
            </div>

        </div>

    </div>

</section>