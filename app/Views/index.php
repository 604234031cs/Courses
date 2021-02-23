<?php $i = 1; ?>
<section>
    <div class="container  mt-5">
        <table class="table" id="users-list">
            <thead style="background-color: turquoise;color:white">
                <tr>
                    <th>
                        #
                    </th>
                    <th>
                        คอร์สเรียน
                    </th>
                    <th class="text-center">
                        COMPLETE
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $get) : ?>
                    <tr>
                        <td>
                            <?php echo $i; ?>
                        </td>
                        <td>
                            <?php echo $get->name; ?>
                        </td>
                        <td>
                            <?php
                            if ($get->score != null) {
                                echo $get->score . '%';
                                $score = $get->score;
                            } else {
                                echo '0.00%';
                                $score = 0;
                            }
                            ?>
                            <meter id="disk_d" min="0" low="49" max="100" value=<?= $score ?>></meter>
                            <!-- <meter low=".25" optimum=".2" high=".75" value=".8"></meter> -->
                        </td>
                        <td>
                            <a href="/courses/<?php echo $get->id; ?>" class="btn btn-success"><i class="far fa-eye"></i></a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>