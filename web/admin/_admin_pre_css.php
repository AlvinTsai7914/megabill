<!--jQuery Validation Engine -->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/jQuery-Validation-Engine-3.1.0/css/validationEngine.jquery.css'>
<!--FontAwesome-->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/fontawesome-free-5.15.2/css/all.min.css'>
<!--DataTables -->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css'>
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/datatables/datatables-responsive/css/responsive.bootstrap4.min.css'>
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/datatables/datatables-bs4/css/dataTables.bootstrap4.min.css'>
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/datatables/datatables-rowreorder/css/rowReorder.bootstrap4.min.css'>
<!-- Select2 -->
<link type='text/css' rel="stylesheet" href="<?= BASE_PATH ?>/plugins/select2/css/select2.min.css">
<link type='text/css' rel="stylesheet" href="<?= BASE_PATH ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!--Sweetalert-->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'>
<!--DateRangePicker-->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/daterangepicker/daterangepicker.css'>
<!--iCheck-->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css'>
<!--Croppie-->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/croppie-2.6.5/croppie.css'>

<!--AdminLTE-->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/plugins/adminlte-3.1.0/css/adminlte.min.css'>
<!-- 共同自訂 -->
<link type='text/css' rel='stylesheet' href='<?= BASE_PATH ?>/admin/css/all.css'>

<!-- 頁面自訂 -->
<?php
switch ($current_page_name) {
    case "staff_mint":
        echo '<link type="text/css" rel="stylesheet" href="' . BASE_PATH . '/plugins/ekko-lightbox/ekko-lightbox.css">';
        break;
    default:
        break;
}
?>

