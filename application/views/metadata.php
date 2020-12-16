<?php $tables = $this->db->list_tables();
foreach ($tables as $t_key => $table) :
    // echo '<h3>'.$table . '</h3><br />';
    // print_r($this->db->get($table)->result_array());
    // echo '<br /><br /><hr />';
    $data[$table] = $this->db->get($table)->result_array();
?>
    <br />
    <hr />
    <h1><?php echo $table; ?></h1>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            var $table<?php echo $t_key; ?> = jQuery("#table-<?php echo $t_key; ?>");
            $table<?php echo $t_key; ?>.DataTable({
                //'aLengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                    'print'
                ]
            });
            $table<?php echo $t_key; ?>.closest('.dataTables_wrapper').find('select').select2({
                minimumResultsForSearch: -1
            });
        });
    </script>
    <table class="datatable table table-striped table-hover table-sm table-dark" id="table-<?php echo $t_key; ?>">
        <thead class="thead-dark">
            <?php $fields = $this->db->field_data($table); ?>
            <tr>
                <?php foreach ($fields as $field) : ?>
                    <th>
                        <?php echo $field->name;
                        // echo '<br/>';
                        // echo '<br/>';
                        // echo '<small>';
                        // echo $field->type;
                        // echo '<br/>';
                        // echo $field->max_length;
                        // echo '<br/>';
                        // echo $field->primary_key;
                        // echo '</small>';
                        ?>
                    </th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data[$table] as $k => $f) : ?>
                <tr scope="row">
                    <?php foreach ($fields as $field) : ?>
                        <td>
                            <?php echo $f[$field->name]; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>
<?php endforeach; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css" id="style-resource-1">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2-bootstrap.css" id="style-resource-2">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/select2/select2.css" id="style-resource-3">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/daterangepicker/daterangepicker-bs3.css" id="style-resource-4">
<script src="<?php echo base_url(); ?>assets/js/datatables/datatables.js" id="script-resource-8"></script>
<script src="<?php echo base_url(); ?>assets/js/select2/select2.min.js" id="script-resource-9"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js" id="script-resource-12"></script>