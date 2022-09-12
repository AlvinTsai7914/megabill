CKEDITOR.loadTemplates(CKEDITOR.config.templates_files, '');
function CreateCKEditor(instances) {
    DestroyCKEditor(instances);
    CKEDITOR.replace(instances, {
        on: {
            instanceReady: function (ev) {
                create_template_button('default', instances);
            },
            contentDom: function (ev) {
                var editor = CKEDITOR.instances[instances];
                var editable = editor.editable();
                editable.attachListener(editable, 'click', function (event) {
                    var target = event.data.getTarget();
                    if (target.hasClass('fa-times-circle')) {
                        var parents = target.getParents();
                        var section = null;
                        for (let item of  parents.slice().reverse()) {
                            if (item.hasClass("container") || item.hasClass("container-fluid"))
                            {
                                section = item;
                                break;
                            }
                        }
                        if (section)
                            section.remove();
                    }
                    if (target.hasClass('fa-chevron-circle-up')) {
                        var parents = target.getParents();
                        var section = null;
                        for (let item of  parents.slice().reverse()) {
                            if (item.hasClass("container") || item.hasClass("container-fluid"))
                            {
                                section = item;
                                break;
                            }
                        }
                        if (section.hasPrevious())
                        {
                            var pre_section = section.getPrevious();
                            section.insertBefore(pre_section);
                            section.scrollIntoView();
                        }
                    }
                    if (target.hasClass('fa-chevron-circle-down')) {
                        var parents = target.getParents();
                        var section = null;
                        for (let item of  parents.slice().reverse()) {
                            if (item.hasClass("container") || item.hasClass("container-fluid"))
                            {
                                section = item;
                                break;
                            }
                        }
                        if (section.hasNext())
                        {
                            var next_section = section.getNext();
                            section.insertAfter(next_section);
                            section.scrollIntoView();
                        }
                    }
                });
            },
        }
    });
}

function DestroyCKEditor(instances) {
    if (CKEDITOR.instances[instances])
    {
        CKEDITOR.instances[instances].destroy();
        delete_template_button(instances);
    }
}

CKEDITOR.on('instanceReady', function (ev) {
    ev.editor.document.on('drop', function (ev) {
        ev.data.preventDefault(true);
    });
});

function create_template_button(templateName, instances) {
    if (CKEDITOR)
    {
        var obj = CKEDITOR.getTemplates(templateName);
        var html = "";
        obj.templates.forEach(function (template) {
            html += "<a class='dropdown-item template_btn' style='cursor:pointer;' data-instances='" + instances + "' data-html='" + template.html + "'>";
            html += "<img style='width:100;height:auto;max-width:100px;margin-left:10px' src='" + obj.imagesPath + template.image + "'>";
            html += template.title;
            html += "</a>";
        });
        $("#" + instances).closest(".row").find(".template_menu").append(html);
    }
}

function delete_template_button(instances) {
    if (CKEDITOR)
    {
        $("#" + instances).closest(".row").find(".template_menu").empty();
    }
}

$(document).on("click", ".template_btn", function (e) {
    var target = $(this).data("instances");
    var editor = CKEDITOR.instances[target];
    var html = editor.getData() + $(this).data("html");
    editor.setData(html);

    //移動到最後一個section
    var section = null;
    var elements = editor.document.getElementsByTag("row").toArray();
    for (let item of elements.slice().reverse()) {
        if (item.hasClass("row"))
        {
            item.scrollIntoView();
            break;
        }
    }

})

$(document).on("click", ".clear_template_btn", function (e) {
    var target = $(this).data("target");
    for (instance in CKEDITOR.instances) {
        if (CKEDITOR.instances[instance].name.match(target) !== null)
            CKEDITOR.instances[instance].setData("");
    }
})

