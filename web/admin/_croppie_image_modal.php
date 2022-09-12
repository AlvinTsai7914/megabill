<div class="modal fade" id="croppie_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">圖片編輯</h5>
            </div>
            <div class="modal-body">
                <input type="file" id="croppie_hidden_file_input" accept="image/*">
                <input type="hidden" class="form-control" id="croppie_file_input"value="" readonly="">
                <div class="row">
                    <div class="col-12 margin">
                        <div id="croppie_modal_img"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-brand mr-auto" id="croppie_file_btn">選擇檔案</button>
                <button type="button" class="btn btn-warning pull-left"  id ="croppie_clear_btn" >清除</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" id="croppie_confirm_btn">確定</button>
            </div>
        </div>
    </div>
</div>