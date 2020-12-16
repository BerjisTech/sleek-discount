<script type="text/javascript">
    jQuery(document).ready(function($) {
        var $table4 = jQuery("#table-4");
        $table4.DataTable({
            'aLengthMenu': [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            'order': [
                [0, 'desc']
            ],
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5',
                'print'
            ]
        });
        $table4.closest('.dataTables_wrapper').find('select').select2({
            minimumResultsForSearch: -1
        });
    });
</script>
<table class="datatable table table-responsive" id="table-4">
    <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user as $key => $fetch) : ?>
            <tr>
                <td><?php echo $fetch['shop_id']; ?></td>
                <td>
                    <?php echo $fetch['shop_owner'] . '<br />'; ?>
                    <?php echo $fetch['plan_display_name'] . ' (' . $fetch['plan_name'] . ')<br />'; ?>
                    <strong>First Install</strong> <?php echo date('d M, Y - h:m:a', $fetch['date']) . '<br />'; ?>
                    <strong>Current Install</strong> <?php echo date('d M, Y - h:m:a', $fetch['date']) . '<br />'; ?>
                </td>
                <td>
                    <?php echo $fetch['customer_email'] . '<br />'; ?>
                    <?php echo '<a href="https://' . $fetch['domain'] . '" target="_BLANK">' . $fetch['domain'] . '</a><br />'; ?>
                </td>
                <td>
                    <strong><?php echo $this->db->where('shop', $fetch['shop'])->get('offers')->num_rows(); ?> Offers<br /></strong>
                    <a href="https://<?php echo $shop ?>.myshopify.com/admin/apps/sleek-upsell/sombo/<?php echo $fetch['shop'] ?>/<?php echo $fetch['token'] ?>?<?php echo $_SERVER['QUERY_STRING']; ?>" target="_BLANK">Dashboard</a><br />
                    <a href="https://partners.shopify.com/1569813/stores/<?php echo $fetch['partner']; ?>" target="_BLANK">Partner Link (<?php echo $fetch['partner']; ?>)</a><br />
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<style>
    .dataTables_wrapper {
        background: #ffffff !important;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css" id="style-resource-1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2-bootstrap.css" id="style-resource-2">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2.css" id="style-resource-3">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/daterangepicker/daterangepicker-bs3.css" id="style-resource-4">
<script src="<?php echo base_url(); ?>assets/js/datatables/datatables.js" id="script-resource-8"></script>
<script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js" id="script-resource-9"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" id="script-resource-12"></script>