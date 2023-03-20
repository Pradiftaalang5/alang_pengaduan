<!-- Bootstrap core JavaScript-->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {

        $('#kategori').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url() ?>C_alangUser/get_sub_kategori",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value=' + data[i].subkategori_id + '>' + data[i]
                            .sub_kategori + '</option>';
                    }
                    $('#subkategori').html(html);
                    // console.dir(data);
                    // console.log();

                }
            });
            return false;

        });

    });
</script>

<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Pradifta Alang 2023</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>/assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>/assets/js/datatables-simple-demo.js"></script>
</body>

</html>