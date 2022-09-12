<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<?php
switch ($g_page_name) {
    case "index":
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/plugins/slick-1.8.1/slick/slick.css" />';
        break;
    case "location":
    case "financial_report":
    case "annual_report":
    case "about_en":
    case "annual_report_en":
    case "financial_highlights_en":
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/plugins/select2/css/select2.min.css" />';
        break;
    case "calculator":
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/plugins/select2/css/select2.min.css" />';
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/plugins/daterangepicker/daterangepicker.css" />';
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/plugins/jQuery-Validation-Engine-3.1.0/css/validationEngine.jquery.css" />';
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

echo '<link rel="stylesheet" href="' . BASE_PATH . '/src/css/page.css" />';
echo '<link rel="stylesheet" href="' . BASE_PATH . '/src/css/page-web.css" />';

switch ($g_page_name) {
    case "about_en":
    case "annual_report_en":
    case "financial_highlights_en":
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/src/css/style_en.css" />';
    default :
        echo '<link rel="stylesheet" href="' . BASE_PATH . '/src/css/style.css" />';
        break;
}
?>