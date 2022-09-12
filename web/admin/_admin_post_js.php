<!--jQuery-->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/jquery/jquery.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/jquery-ui/jquery-ui.min.js'></script>
<!-- Bootstrap 4 -->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/bootstrap/js/bootstrap.bundle.min.js'></script>
<!--jQuery Validation Engine -->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/jQuery-Validation-Engine-3.1.0/js/jquery.validationEngine.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/jQuery-Validation-Engine-3.1.0/js/languages/jquery.validationEngine-zh_TW.js'></script>
<!--DataTables -->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-bs4/js/dataTables.bootstrap4.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-responsive/js/dataTables.responsive.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-responsive/js/responsive.bootstrap4.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-buttons/js/dataTables.buttons.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-buttons/js/buttons.bootstrap4.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-buttons/js/buttons.html5.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-buttons/js/buttons.print.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-buttons/js/buttons.colVis.min.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/datatables/datatables-rowreorder/js/dataTables.rowReorder.min.js'></script>
<!--Select2-->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/select2/js/select2.full.min.js'></script>
<!--Sweetalert-->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/sweetalert2/sweetalert2.min.js'></script>
<!--DateRangePicker-->
<script type='text/javascript' src="<?= BASE_PATH ?>/plugins/moment/moment.min.js"></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/daterangepicker/daterangepicker.js'></script>
<!-- CKEditor -->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/ckeditor/ckeditor.js'></script>
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/ckeditor/lang/zh.js'></script>
<script>CKEDITOR.config.language = "zh";</script>
<!--Croppie-->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/croppie-2.6.5/croppie.min.js'></script>
<!--AdminLTE-->
<script type='text/javascript' src='<?= BASE_PATH ?>/plugins/adminlte-3.1.0/js/adminlte.min.js'></script>
<!-- 共同自訂 -->
<script type='text/javascript' src='js/all.min.js'></script>
<script type='text/javascript' src='js/croppie_image_dialog.min.js'></script>
<script type='text/javascript' src='js/ckeditor_template_ex.js'></script>

<!-- 頁面自訂 -->
<?php
switch ($current_page_name) {
    case "staff_edit":
        echo '<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>';
        echo '<script src="js/ksdnft_abi.js"></script>';
        echo '<script src="js/ksdnft_contract.js"></script>';
        break;
    case "staff_mint":
        echo '<script type="text/javascript" src="' . BASE_PATH . '/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>';
        echo '<script src="https://cdn.jsdelivr.net/npm/web3@latest/dist/web3.min.js"></script>';
        echo '<script src="js/ksdnft_abi.js"></script>';
        echo '<script src="js/ksdnft_contract.js"></script>';
        break;
    default :
        break;
}
?>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
