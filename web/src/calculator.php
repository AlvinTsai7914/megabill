<?php
require_once '_head.php';
?>
<div class="wrapper">
    <?php require_once '_header.php'; ?>
    <div class="pg_banner black_cover">
        <h1 class="text-white">試算器</h1>
        <picture>
            <source media="(min-width: 768px)" srcset="<?= BASE_PATH ?>/src/img/banner/business_1440x300.png">
            <img src="<?= BASE_PATH ?>/src/img/banner/business_414x160.png" alt="業務簡介" loading="eager">
        </picture>
    </div>
    <div class="breadcrumb">
        <div class="breadcrumb__wrapper">
            <li><a href="<?= BASE_PATH ?>/">首頁</a></li>
            <li>業務簡介</li>
            <li class="current"><?= $g_page_c_name ?></li>
        </div>
    </div>
    <main class="pg calculator">
        <div class="container">
            <div class="select_box d-lg-none">
                <select class="location_select" data-target="calculator">
                    <option value="0">初級市場發行試算器</option>
                    <option value="1">次級票券買入試算器</option>
                    <option value="2">債券RP買入試算器</option>
                </select>
            </div>
            <div class="d-flex">
                <div class="mr-4 d-none d-lg-block ">
                    <div class="tab_list vertical" data-target="calculator">
                        <div class="tab_list__wrapper">
                            <div class="tab" data-val="0">
                                <div class="hover_box">
                                    <div>初級市場發行試算器</div>
                                </div>
                            </div>
                            <div class="tab" data-val="1">
                                <div class="hover_box">
                                    <div>次級票券買入試算器</div>
                                </div>
                            </div>
                            <div class="tab" data-val="2">
                                <div class="hover_box">
                                    <div>債券RP買入試算器</div>
                                </div>
                            </div>
                            <div class="shift_box"></div>
                        </div>
                    </div>
                </div>
                <div class="tab_list__target" data-name="calculator">
                    <div data-val="0" class="d-show">
                        <h2 class="pg_sub_title">初級市場發行試算器</h2>
                        <div class="container w-100">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <form class="form_group _left" id="c1">
                                        <label class="input_title release" for="c1_startdate">發行日</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control date-picker validate[required] startdate" id="c1_startdate" data-pair="#c1_enddate" placeholder="請選擇日期" autocomplete="off" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <label class="input_title expiry" for="c1_enddate">到期日</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control date-picker validate[required] enddate" id="c1_enddate" data-pair="#c1_startdate" placeholder="請選擇日期" autocomplete="off" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <label class="input_title paper" for="c1_amount">發行金額</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c1_amount" placeholder="請輸入發行金額" autocomplete="off" min="0" step="1" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title percentage" for="c1_rate1">保證費率</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c1_rate1" placeholder="請輸入保證費率" autocomplete="off" min="0" step="0.001" value="0.000">
                                            <div class="input-group-append">
                                                <span class="input-group-text">％</span>
                                            </div>
                                        </div>
                                        <label class="input_title percentage" for="c1_rate2">承銷費率</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c1_rate2" placeholder="請輸入承銷費率" autocomplete="off" min="0" step="0.001" value="0.000">
                                            <div class="input-group-append">
                                                <span class="input-group-text">％</span>
                                            </div>
                                        </div>
                                        <label class="input_title percentage" for="c1_rate3">貼現率</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c1_rate3" placeholder="請輸入貼現率" autocomplete="off" min="0" step="0.001" value="0.000">
                                            <div class="input-group-append">
                                                <span class="input-group-text">％</span>
                                            </div>
                                        </div>
                                        <label class="input_title percentage" for="c1_rate4">集保交割服務費率</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c1_rate4" placeholder="請輸入集保交割服務費率" autocomplete="off" min="0" step="0.001" value="0.038">
                                            <div class="input-group-append">
                                                <span class="input-group-text">％</span>
                                            </div>
                                        </div>
                                        <button class="linear_btn" type="button" id="c1_calculator_btn"><p>計算</p></button>
                                    </form>
                                </div>
                                <div class="col-sm-6" id="c1_result">
                                    <div class="form_group _right">
                                        <label class="input_title release" for="c1_days">發行天數</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_days" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">天</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_per_million_price">每萬元價格</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_per_million_price" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_discounted_interest">貼現息</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_discounted_interest" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_guarantee_fee">保證費</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_guarantee_fee" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_underwriting_fee">承銷費</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_underwriting_fee" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_service_charge">集保交割服務費</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_service_charge" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_total_cost">總費用（含代收集保交割服務費）</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_total_cost" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c1_actual_amount">實撥金額</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c1_actual_amount" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="contact_info">以上業務聯絡資訊請至<a href="<?= BASE_PATH ?>/location">服務據點</a>查詢</p>
                        </div>
                    </div>
                    <div data-val="1">
                        <h2 class="pg_sub_title">次級票券買入試算器</h2>
                        <div class="container w-100">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <form class="form_group _left" id="c2">
                                        <label class="input_title release" for="c2_startdate">發行日</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control date-picker validate[required] startdate" id="c2_startdate" data-pair="#c2_enddate" placeholder="請選擇日期" autocomplete="off" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <label class="input_title expiry" for="c2_enddate">到期日</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control date-picker validate[required] enddate" id="c2_enddate" data-pair="#c2_startdate" placeholder="請選擇日期" autocomplete="off" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <label class="input_title paper" for="c2_amount">承作本金</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c2_amount" placeholder="請輸入承作本金" autocomplete="off" min="0" step="1" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title percentage" for="c2_rate1">交易利率</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c2_rate1" placeholder="請輸入交易利率" autocomplete="off" min="0" step="0.001" value="0.000">
                                            <div class="input-group-append">
                                                <span class="input-group-text">％</span>
                                            </div>
                                        </div>
                                        <button class="linear_btn" type="button" id="c2_calculator_btn"><p>計算</p></button>
                                    </form>
                                </div>
                                <div class="col-sm-6" id="c2_result">
                                    <div class="form_group _right">
                                        <label class="input_title release" for="c2_days">交易天數</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c2_days" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">天</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c2_interest">交易利息</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c2_interest" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c2_tax">扣繳稅款</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c2_tax" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c2_actual_amount">到期實得金額</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c2_actual_amount" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="contact_info">以上業務聯絡資訊請至<a href="<?= BASE_PATH ?>/location">服務據點</a>查詢</p>
                        </div>
                    </div>
                    <div data-val="2">
                        <h2 class="pg_sub_title">債券RP買入試算器</h2>
                        <div class="container w-100">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <form class="form_group _left" id="c3">
                                        <label class="input_title release" for="c3_startdate">發行日</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control date-picker validate[required] startdate" id="c3_startdate" data-pair="#c3_enddate" placeholder="請選擇日期" autocomplete="off" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <label class="input_title expiry" for="c3_enddate">到期日</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control date-picker validate[required] enddate" id="c3_enddate" data-pair="#c3_startdate" placeholder="請選擇日期" autocomplete="off" value="">
                                            <div class="input-group-append">
                                                <span class="input-group-text"></span>
                                            </div>
                                        </div>
                                        <label class="input_title paper" for="issue_amount">承作本金</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c3_amount" placeholder="請輸入承作本金" autocomplete="off" min="0" step="1" value="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title percentage" for="c3_rate1">交易利率</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control validate[required] mask" id="c3_rate1" placeholder="請輸入交易利率" autocomplete="off" min="0" step="0.001" value="0.000">
                                            <div class="input-group-append">
                                                <span class="input-group-text">％</span>
                                            </div>
                                        </div>
                                        <button class="linear_btn" type="button" id="c3_calculator_btn"><p>計算</p></button>
                                    </form>
                                </div>
                                <div class="col-sm-6" id="c3_result">
                                    <div class="form_group _right">
                                        <label class="input_title release" for="c3_days">交易天數</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c3_days" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">天</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c3_interest">交易利息</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c3_interest" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c3_tax">扣繳稅款</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c3_tax" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                        <label class="input_title coin" for="c3_actual_amount">到期實得金額</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="c3_actual_amount" value="" disabled="disabled">
                                            <div class="input-group-append">
                                                <span class="input-group-text">元</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="contact_info">以上業務聯絡資訊請至<a href="<?= BASE_PATH ?>/location">服務據點</a>查詢</p>
                        </div>
                    </div>
                    <!-- 債券RP買入試算器 END -->
                </div>
                <!-- 頁籤內容 END -->
            </div>
        </div>
    </main>
    <?php require_once '_footer.php'; ?>
</div>
<?php require_once '_post_js.php'; ?>
<script>
    $(function () {
        let tabTarget;
        let selectInput = $('.location_select').select2({width: "100%", minimumResultsForSearch: Infinity});
        $(`.tab_list__target [data-val=0]`).fadeIn(700);

        $(".tab_list.vertical").on("click", ".tab", function (e) {
            let tabNum = $(this).attr("data-val");
            $(selectInput).val(`${tabNum}`).trigger("change");
        });

        $(selectInput).on("change", function (e) {
            $(`.location_select option:selected`).each(function () {
                tabTarget = $(this).parent("select").attr("data-target");
                let tabNum = $(this).val();
                let tabsLength = $(".tab_list.vertical .tab_list__wrapper").children(".tab").length;
                $(`.tab_list.vertical .shift_box`).css("top", `${tabNum * (100 / tabsLength)}%`);
                $(`[data-name=${tabTarget}]`).children().hide();
                $(`[data-name=${tabTarget}]`).children(`div[data-val=${tabNum}]`).fadeIn(700);
            });
        });

        $("#c1,#c2,#c3").validationEngine({
            promptPosition: 'bottomLeft',
            maxErrorsPerField: 1,
            showOneMessage: true,
            addFailureCssClassToField: "formError-border_red",
            autoHidePrompt: true,
            autoHideDelay: 3000,
            validateNonVisibleFields: false,
            focusFirstField: false,
            scroll: false,
        });

        $('.date-picker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            timePicker: false,
            autoApply: true,
            autoUpdateInput: false,
            opens: 'right',
            parentEl: '.wrapper',
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
            if (picker)
                $(this).val(picker.startDate.format('YYYY/MM/DD'));
            var date = $(this).val();
            var day = new Date(Date.parse(date.replace(/-/g, '/')));
            var today = new Array('星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六');
            var week = today[day.getDay()];
            $(this).next(".input-group-append").find(".input-group-text").html(week);
        });

        $('.date-picker').on('cancel.daterangepicker', function (ev, picker) {
            $(this).val('');
        });

        $(".date-picker").trigger("apply.daterangepicker");
    });

    $("#c1_calculator_btn").click(function () {
        $("#c1_result input").val("");
        if (!$("#c1").validationEngine('validate'))
            return;
        var s = $("#c1_startdate").val();
        var e = $("#c1_enddate").val();
        var amount = parseInt($("#c1_amount").val());
        var rate1 = parseFloat($("#c1_rate1").val() / 100);
        var rate2 = parseFloat($("#c1_rate2").val() / 100);
        var rate3 = parseFloat($("#c1_rate3").val() / 100);
        var rate4 = parseFloat($("#c1_rate4").val() / 100);

        var days = Math.abs(parseInt(DateDifference(s, e)));
        $("#c1_days").val(days);

        var per_million_price = Math.round((1 - rate3 * days / 365) * 10000 * 100) / 100;
        $("#c1_per_million_price").val(formatprice(per_million_price));

        var discounted_interest = amount - Math.round((amount / 10000) * per_million_price);
        $("#c1_discounted_interest").val(formatprice(discounted_interest));

        var guarantee_fee = Math.floor(amount * rate1 * days / 365);
        $("#c1_guarantee_fee").val(formatprice(guarantee_fee));

        var underwriting_fee = Math.floor(amount * rate2 * days / 365);
        $("#c1_underwriting_fee").val(formatprice(underwriting_fee));

        var service_charge = Math.round(amount * rate4 * days / 365);
        $("#c1_service_charge").val(formatprice(service_charge));

        var total_cost = discounted_interest + guarantee_fee + underwriting_fee + service_charge;
        $("#c1_total_cost").val(formatprice(total_cost));

        var actual_amount = amount - total_cost;
        $("#c1_actual_amount").val(formatprice(actual_amount));
    });

    $("#c2_calculator_btn").click(function () {
        $("#c2_result input").val("");
        if (!$("#c2").validationEngine('validate'))
            return;

        var s = $("#c2_startdate").val();
        var e = $("#c2_enddate").val();
        var amount = parseInt($("#c2_amount").val());
        var rate1 = parseFloat($("#c2_rate1").val() / 100);

        var days = Math.abs(parseInt(DateDifference(s, e)));
        $("#c2_days").val(days);

        var interest = Math.round(amount * rate1 * days / 365);
        $("#c2_interest").val(formatprice(interest));

        var tax = Math.floor(interest * 0.1);
        $("#c2_tax").val(formatprice(tax));

        var actual_amount = amount + interest - tax;
        $("#c2_actual_amount").val(formatprice(actual_amount));
    });

    $("#c3_calculator_btn").click(function () {
        $("#c3_result input").val("");
        if (!$("#c3").validationEngine('validate'))
            return;

        var s = $("#c3_startdate").val();
        var e = $("#c3_enddate").val();
        var amount = parseInt($("#c3_amount").val());
        var rate1 = parseFloat($("#c3_rate1").val() / 100);

        var days = Math.abs(parseInt(DateDifference(s, e)));
        $("#c3_days").val(days);

        var interest = Math.round(amount * rate1 * days / 365);
        $("#c3_interest").val(formatprice(interest));

        var tax = Math.floor(interest * 0.1);
        $("#c3_tax").val(formatprice(tax));

        var actual_amount = amount + interest - tax;
        $("#c3_actual_amount").val(formatprice(actual_amount));
    });

    function DateDifference(StartDate, EndDate) {
        var s = new Date(Date.parse(StartDate.replace(/-/g, '/')));
        var e = new Date(Date.parse(EndDate.replace(/-/g, '/')));
        return (s - e) / 86400000;
    }

    function formatprice(price) {
        return String(price).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    $("input.mask").each((i, ele) => {
        let clone = $(ele).clone(false)
        clone.attr("type", "text")
        let ele1 = $(ele)
        clone.val(Number(ele1.val()).toLocaleString("en"))
        $(ele).after(clone)
        $(ele).hide()
        clone.mouseenter(() => {
            ele1.show()
            clone.hide()
        })
        setInterval(() => {
            let newv = Number(ele1.val()).toLocaleString("en")
            if (clone.val() != newv) {
                clone.val(newv)
            }
        }, 10)
        $(ele).mouseleave(() => {
            $(clone).show()
            $(ele1).hide()
        })
    })

    $(".startdate").on('apply.daterangepicker', function (ev, picker) {
        if (picker) {
            var date = picker.startDate.format('YYYY/MM/DD');
            var target = $(this).data("pair");
            if (target)
                $(target).data('daterangepicker').setMinDate(date);
        }
    });

    $(".enddate").on('apply.daterangepicker', function (ev, picker) {
        if (picker) {
            var date = picker.startDate.format('YYYY/MM/DD');
            var target = $(this).data("pair");
            if (target)
                $(target).data('daterangepicker').setMaxDate(date);
        }
    });
</script>
<?php require_once '_foot.php'; ?>