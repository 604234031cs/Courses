<?php if (session()->getFlashdata('msg')) : ?>
    <script>
        let msg = {
            'status': '<?php echo session()->getFlashdata('msg')['status']; ?>',
            'text': '<?php echo session()->getFlashdata('msg')['text']; ?>',
            'msg': '<?php echo session()->getFlashdata('msg')['msg']; ?>'
        };
        swal(msg['msg'], msg['text'], msg['status']);
    </script>
<?php endif; ?>