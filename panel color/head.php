<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
<meta name="author" content="Bdtask">
<title><?php echo $settings_info->title; ?></title>
<?php
$font_one = (@$dynamic_color->font_one ? @$dynamic_color->font_one : 'Alegreya+Sans');
$font_two = (@$dynamic_color->font_two ? @$dynamic_color->font_two : 'Libre+Franklin');
?>
<!-- App favicon -->
<link rel="shortcut icon" href="<?php echo base_url($settings_info->favicon); ?>">
<!--Global Styles(used by all pages)-->
<link href="<?php echo base_url() ?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/fontawesome/css/all.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/typicons/src/typicons.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/themify-icons/themify-icons.min.css" rel="stylesheet">
<!--Third party Styles(used by this page)-->
<link href="<?php echo base_url() ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!--Start Your Custom Style Now-->
<link href="<?php echo base_url() ?>/assets/dist/css/style.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/select2-bootstrap4/dist/select2-bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>/assets/plugins/toastr/toastr.css" rel="stylesheet">

<?php
if (!empty($dynamic_color) && $dynamic_color->active_status == 1) {
    echo view('template/style.php');
}
?>
<style>
    .btn-top{
        margin-bottom: 35px;
    }
</style>
<script src="<?php echo base_url() ?>/assets/plugins/jQuery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/dist/js/pages/jquery-ui.js"></script>