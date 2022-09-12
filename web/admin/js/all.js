//各項初始化****************************************************************************************************
$('.select2').select2({
    minimumResultsForSearch: Infinity,
});

$('.select2-hide-dropdown').on('select2:opening', function (e) {
    return false;
});

if (window.daterangepicker !== undefined) {
    $('.yearmonth-picker').datepicker({
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months",
        language: "zh-TW",
        autoclose: true,
    });

    $('.yearmonth-picker').datepicker().on('show.bs.modal', function (event) {
        event.stopPropagation();
    });

    $('.date-picker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: false,
        //autoApply:true,
        autoUpdateInput: false,
        locale: {
            format: "YYYY/MM/DD",
            applyLabel: "確定",
            cancelLabel: "取消",
            fromLabel: "開始日期",
            toLabel: "結束日期",
            customRangeLabel: "自訂日期區間",
            daysOfWeek: ["日", "一", "二", "三", "四", "五", "六"],
            monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
            firstDay: 0
        }
    });

    $('.date-picker').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD'));
    });

    $('.date-picker').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });

    $('.datetime-picker').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerSeconds: true,
        //autoApply:true,
        autoUpdateInput: false,
        locale: {
            format: "YYYY/MM/DD",
            applyLabel: "確定",
            cancelLabel: "取消",
            fromLabel: "開始日期",
            toLabel: "結束日期",
            customRangeLabel: "自訂日期區間",
            daysOfWeek: ["日", "一", "二", "三", "四", "五", "六"],
            monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
            firstDay: 0
        }
    });

    $('.datetime-picker').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD HH:mm:ss'));
    });

    $('.datetime-picker').on('cancel.daterangepicker', function (ev, picker) {
        $(this).val('');
    });

    $('.daterange-picker').daterangepicker({
        locale: {
            format: "YYYY/MM/DD",
            applyLabel: "確定",
            cancelLabel: "取消",
            fromLabel: "開始日期",
            toLabel: "結束日期",
            customRangeLabel: "自訂日期區間",
            daysOfWeek: ["日", "一", "二", "三", "四", "五", "六"],
            monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
            firstDay: 0
        }
    });

}

$(".upper").keyup(function () {
    $(this).val($(this).val().toUpperCase());
});
 
$(".lower").keyup(function (evt) {
    $(this).val($(this).val().toLowerCase());
});

//datetime****************************************************************************************************
function GetDateString(date)
{
    if (date == null || date == "")
        return "";
    var d = new formatTimeZone(date, 8);
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();

    if (isNaN(curr_year) || isNaN(curr_month) || isNaN(curr_year))
        return "";

    return padLeft(curr_year, "4") + "/" + padLeft(curr_month, "2") + "/" + padLeft(curr_date, "2");
}

function GetDateTimeString(date)
{
    if (date == null || date == "")
        return "";
    var d = new formatTimeZone(date, 8);
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();
    var curr_hour = d.getHours();
    var curr_minute = d.getMinutes();
    var curr_second = d.getSeconds();

    if (isNaN(curr_year) || isNaN(curr_month) || isNaN(curr_year) || isNaN(curr_hour) || isNaN(curr_minute) || isNaN(curr_second))
        return "";

    return padLeft(curr_year, "4") + "/" + padLeft(curr_month, "2") + "/" + padLeft(curr_date, "2") + " " + padLeft(curr_hour, "2") + ":" + padLeft(curr_minute, "2") + ":" + padLeft(curr_second, "2");
}

function GetDateTimeString2(date)
{
    if (date == null || date == "")
        return "";
    var d = new formatTimeZone(date, 8);
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();
    var curr_hour = d.getHours();
    var curr_minute = d.getMinutes();

    if (isNaN(curr_year) || isNaN(curr_month) || isNaN(curr_year) || isNaN(curr_hour) || isNaN(curr_minute))
        return "";

    return padLeft(curr_year, "4") + "/" + padLeft(curr_month, "2") + "/" + padLeft(curr_date, "2") + " " + padLeft(curr_hour, "2") + ":" + padLeft(curr_minute, "2");
}

function padLeft(str, length) {
    if (str.toString().length >= length)
        return str;
    else
        return padLeft("0" + str.toString(), length);
}

function formatTimeZone(time, offset) {
    var d = new Date(time);
    var localTime = d.getTime();
    var localOffset = d.getTimezoneOffset() * 60000;
    var utc = localTime + localOffset;
    var wishTime = utc + (3600000 * offset);
    return new Date(wishTime);
}

//alert****************************************************************************************************
function brand_alert(title, text, icon = "question", url = "") {
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        allowOutsideClick: false,
        heightAuto: false,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-primary',
        },
    }).then((result) => {
        if (url != "")
            location.href = url;
    })
}

function success_brand_alert(title, text, url = "") {
    brand_alert(title, text, "success", url);
}

function error_brand_alert(title, text, url = "") {
    brand_alert(title, text, "error", "", url);
}

function warning_brand_alert(title, text, url = "") {
    brand_alert(title, text, "warning", url);
}

function info_brand_alert(title, text, url = "") {
    brand_alert(title, text, "info", url);
}

function question_brand_alert(title, text, url = "") {
    brand_alert(title, text, "question", url);
}

function delete_alert(title, id, name, url) {
    var text = "確定要刪除 (" + id + ")" + name + "?";
    var id = id.toString().replace(/-/g, "");
    Swal.fire({
        title: "刪除" + title,
        text: text,
        icon: "warning",
        allowOutsideClick: false,
        //heightAuto:false,
        showConfirmButton: true,
        confirmButtonText: "確定!",
        showCancelButton: true,
        cancelButtonText: "取消",
        reverseButtons: true,
        buttonsStyling: false,
        customClass: {
            confirmButton: 'btn btn-danger',
            cancelButton: 'btn btn-secondary mr-5'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "_admin_del_ajax.php",
                type: "POST",
                data: "delete_url=" + url + "/" + id,
                dataType: "json",
                success: function (json) {
                    if (json.result == true) {
                        var text = "(" + id + ")" + name + "-已刪除";
                        success_brand_alert("刪除成功", text, location);
                    } else
                        error_brand_alert("刪除失敗", json.msg);
                },
                error: function () {
                    error_brand_alert("刪除資料發生錯誤", "請再試一次");
                },
            });
        }
    })
}


//toast****************************************************************************************************
function brand_toast(title, icon = "question") {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        icon: icon,
        title: title,
    })
}

function success_brand_toast(title) {
    brand_toast(title, "success");
}

function error_brand_toast(title) {
    brand_toast(title, "error", "");
}

function warning_brand_toast(title) {
    brand_toast(title, "warning");
}

function info_brand_toast(title) {
    brand_toast(title, "info");
}

function question_brand_toast(title) {
    brand_toast(title, "question");
}

//Color and String****************************************************************************************************
function GetStatusColorString(status, object)
{
    switch (status) {
        case "0":
            object.color = "success";
            object.string = "啟用";
            break;
        case "1":
            object.color = "danger";
            object.string = "停用";
            break;
        default:
            object.color = "warning";
            object.string = "未知";
            break;
    }
}

function GetBlankColorString(status, object)
{
    switch (status) {
        case "0":
            object.color = "danger";
            object.string = "否";
            break;
        case "1":
            object.color = "success";
            object.string = "是";
            break;
        default:
            object.color = "warning";
            object.string = "未知";
            break;
    }
}

function GetHomepageShowColorString(status, object)
{
    switch (status) {
        case "0":
            object.color = "danger";
            object.string = "否";
            break;
        case "1":
            object.color = "success";
            object.string = "是";
            break;
        default:
            object.color = "warning";
            object.string = "未知";
            break;
    }
}

function GetMemberStatusColorString(status, object)
{
    switch (status) {
        case "0":
            object.color = "success";
            object.string = "啟用";
            break;
        case "1":
            object.color = "warning";
            object.string = "尚未驗證";
            break;
        case "2":
            object.color = "danger";
            object.string = "停用";
            break;
        default:
            object.color = "warning";
            object.string = "未知";
            break;
    }
}

function GetContactStatusColorString(status, object)
{
    switch (status) {
        case "0":
            object.color = "danger";
            object.string = "尚未處理";
            break;
        case "1":
            object.color = "warning";
            object.string = "處理中";
            break;
        case "2":
            object.color = "success";
            object.string = "已處理";
            break;
        default:
            object.color = "gray";
            object.string = "未知";
            break;
    }
}

function GetLoginTypeColorString(status, object)
{
    switch (status) {
        case "0":
            object.color = "success";
            object.string = "系統驗證";
            break;
        case "1":
            object.color = "danger";
            object.string = "LDAP驗證";
            break;
        default:
            object.color = "gray";
            object.string = "未知";
            break;
    }
}
//query form****************************************************************************************************
function form_submit(selector) {
    if (typeof (CKEDITOR) !== "undefined") {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    }

    $(selector).removeClass('validating');
    if ($(selector).validationEngine('validate') === true)
    {
        $(selector).submit();
    }
}

function query_form_submit(selector) {
    $(selector).submit();
}

function query_form_clear(selector) {
    $(selector).find("input").val("");
    $(selector).find("select").val("");
    $(selector).find(".form-control.select2").each(function (index) {
        $(this).prop('selectedIndex', 0).change();
    })
    query_form_submit(selector);
}

function validate_form_submit(selector) {
    if (typeof (CKEDITOR) !== "undefined") {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
    }

    $(selector).removeClass('validating');
    if ($(selector).validationEngine('validate') === true)
    {
        $(".submit_btn").attr('disabled', true);
        $(selector).submit();
    }
}

function validate_form_submit_result() {
    $(".submit_btn").attr('disabled', false);
}

//look_password_btn****************************************************************************************************
$(".look_password_btn").click(function () {
    var input = $(this).closest(".input-group").children("input");
    if (input)
    {
        if (input.attr("type") == "password")
        {
            input.attr("type", "text");
            $(this).empty();
            $(this).append("<i class='fas fa-eye-slash'></i>");
        } else
        {
            input.attr("type", "password");
            $(this).empty();
            $(this).append("<i class='fas fa-eye'></i>");
        }
    }
    return false;
});

//AJAX****************************************************************************************************
function AJAX(url, type, jsondata, resultdata) {
    var returnFlag = false;
    $.ajax({
        url: url,
        type: type,
        data: jsondata,
        async: false,
        success: function (result) {
            resultdata.data = result;
            returnFlag = true;
        },
        error: function (xhr, ajaxOptions, thrownError) {
            //alert(xhr.responseText);
            resultdata.data = xhr.responseText;
            returnFlag = false;
        }
    });
    return returnFlag;
}

String.format = function () {
    var s = arguments[0];
    for (var i = 0; i < arguments.length - 1; i++) {
        var reg = new RegExp("\\{" + i + "\\}", "gm");
        s = s.replace(reg, arguments[i + 1]);
    }
    return s;
}

var CSVToArray = function (strData, strDelimiter) {
    strDelimiter = (strDelimiter || ",");
    var objPattern = new RegExp(("(\\" + strDelimiter + "|\\r?\\n|\\r|^)" + "(?:\"([^\"]*(?:\"\"[^\"]*)*)\"|" + "([^\"\\" + strDelimiter + "\\r\\n]*))"), "gi");
    var arrData = [[]];
    var arrMatches = null;
    while (arrMatches = objPattern.exec(strData)) {
        var strMatchedDelimiter = arrMatches[1];
        if (strMatchedDelimiter.length && (strMatchedDelimiter != strDelimiter)) {
            arrData.push([]);
        }
        if (arrMatches[2]) {
            var strMatchedValue = arrMatches[2].replace(new RegExp("\"\"", "g"), "\"");
        } else {
            var strMatchedValue = arrMatches[3];
        }
        arrData[ arrData.length - 1 ].push(strMatchedValue);
    }
    return(arrData);
}

function redir(url)
{
    location.href = url;
}

//****************************************************************************************************
function GetYoutubeVideoID(url) {
    var ID = '';
    url = url.replace(/(>|<)/gi, '').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
    if (url[2] !== undefined) {
        ID = url[2].split(/[^0-9a-z_\-]/i);
        ID = ID[0];
    } else {
        ID = "";
    }
    return ID;
}

function GetYoutubeVideoPicture(id) {
    return "https://img.youtube.com/vi/" + id + "/maxresdefault.jpg";
}

//是否是絕對路徑
function isAbsoluteURL(url) {
    // A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
    // RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
    // by any combination of letters, digits, plus, period, or hyphen.
    return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
}

function RefreshSelect2(api, query_str, category_id, target, selectValue, emptyOption = "") {
    var newitem = "";
    if (emptyOption != "")
        newitem = "<option value=''>" + emptyOption + "</option>";
    if (category_id)
    {
        var url = "../webapi/" + api + "?query=" + encodeURIComponent(query_str);
        var result = new Object();
        if (AJAX(url, "GET", null, result) === true)
        {
            if (result.data.ResultData !== null)
            {
                var len = result.data.ResultData.length;
                var items = result.data.ResultData;
                for (i = 0; i < len; i++) {
                    newitem += "<option value=" + items[i]["id"];
                    if (items[i]["id"] === selectValue)
                        newitem += " selected='selected'";
                    newitem += ">";
                    newitem += items[i]["name"];
                    newitem += "</option>";
                }
            }
        }
    }
    $(target).select2('destroy');
    $(target).html(newitem);
    $(target).select2({
        minimumResultsForSearch: Infinity,
    });
}