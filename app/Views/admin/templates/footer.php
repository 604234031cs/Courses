</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


<script src="<?php echo site_url('theme/dist/js/scripts.js'); ?>"></script>
<script src="<?= site_url('asset/js/courses.js'); ?>"></script>
<script src="<?= site_url('asset/js/lectures.js'); ?>"></script>
<script src="<?= site_url('asset/js/video-list.js'); ?>"></script>
<script src="<?= site_url('asset/js/subcourses.js'); ?>"></script>

<script>
    $(document).ready(function() {
        $("#courses-list").DataTable();
    });
</script>
</body>

</html>