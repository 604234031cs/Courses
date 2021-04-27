</main>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>


<script src="<?= base_url('public/theme/dist/js/scripts.js'); ?>"></script>
<script src="<?= base_url('public/asset/js/courses.js'); ?>"></script>
<script src="<?= base_url('public/asset/js/lectures.js'); ?>"></script>
<script src="<?= base_url('public/asset/js/video-list.js'); ?>"></script>
<script src="<?= base_url('public/asset/js/subcourses.js'); ?>"></script>
<script src="<?= base_url('public/asset/js/category.js'); ?>"></script>
<script src="<?= base_url('public/asset/js/question.js') ?>"></script>
<script src="<?= base_url('public/asset/js/youtube.js') ?>"></script>

<script>
    $(document).ready(function() {
        $("#courses-list").DataTable({
            "language": {
                "lengthMenu": "แสดง _MENU_ หน้า",
                "search": "ค้นหา ",
                "infoEmpty": "ไม่พบข้อมูล",
                "info": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",
                "InfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
                "paginate": {
                    "previous": "ย้อนกลับ",
                    "next": "ถัดไป"
                }
            }
        });
    });
</script>
</body>

</html>