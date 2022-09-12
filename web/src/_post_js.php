<script src="<?= BASE_PATH ?>/plugins/jquery/jquery.min.js"></script>
<?php
switch ($g_page_name) {
    case "index":
        echo '<script src="' . BASE_PATH . '/plugins/slick-1.8.1/slick/slick.min.js"></script>';
        break;
    case "location":
    case "financial_report":
    case "annual_report":
    case "about_en":
    case "annual_report_en":
    case "financial_highlights_en":
        echo '<script src="' . BASE_PATH . '/plugins/select2/js/select2.full.min.js"></script>';
        break;
    case "calculator":
        echo '<script src="' . BASE_PATH . '/plugins/select2/js/select2.full.min.js"></script>';
        echo '<script src="' . BASE_PATH . '/plugins/moment/moment.min.js"></script>';
        echo '<script src="' . BASE_PATH . '/plugins/daterangepicker/daterangepicker_vic.js"></script>';
        echo '<script src="' . BASE_PATH . '/plugins/jQuery-Validation-Engine-3.1.0/js/jquery.validationEngine.min.js"></script>';
        echo '<script src="' . BASE_PATH . '/plugins/jQuery-Validation-Engine-3.1.0/js/languages/jquery.validationEngine-zh_TW.js"></script>';
        break;
    default :
    case "404":
    case "about":
    case "recruiting":
    case "market":
    case "news_list":
    case "news_detail":
    case "propaganda_list":
    case "propaganda_list":
    case "links":
    case "ntd_quotation":
    case "foreign_quotation":
    case "situation_research":
    case "encyclopedia":
    case "tools":
    case "bonds":
    case "promissory_note":
    case "acceptance_bill":
    case "commercial_paper":
    case "invest_foreign":
    case "governance":
    case "credit_rating":
    case "due_diligence":
    case "stakeholders":
    case "responsibility":
    case "policies_norms_list":
    case "policies_norms_detail":
    case "situation_list":
    case "situation_detail":
        break;
}
?>
<script src="<?= BASE_PATH ?>/src/js/common.js"></script>
