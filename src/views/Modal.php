<?php

/**
 * @Author: Wang Chunsheng 2192138785@qq.com
 * @Date:   2020-03-30 18:36:52
 * @Last Modified by:   Wang Chunsheng 2192138785@qq.com
 * @Last Modified time: 2020-03-30 18:46:46
 */


use richardfan\widget\JSRegister;
use yii\bootstrap\Modal;

Modal::begin([
    'header' => '<h5>选择图标</h5>',
    'toggleButton' => false,
    'size' => 'SIZE_LARGE',
    'id' => $modalClass,
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">Close</a>',
]);

Modal::end();

?>
<style>
    .modal-body {
        padding: 0px !important;
        height: 400px;
        overflow: hidden;
        overflow-y: auto;
        ;
    }

    .SIZE_LARGE {
        width: 80%;
    }
</style>
<?php JSRegister::begin([
    'id' => 'icons'
]);
?>
<script>
    var ids = "<?= $modalClass ?>"
    var inputClass = "<?= $inputClass ?>"
    var url = '<?= $modalUrl  ?>?inputClass=' + inputClass + '&modalClass=' + ids;
    $(function() {
        $("#" + ids)
            .find(".modal-body")
            .load(url);
    })
</script>
<?= JSRegister::end(); ?>