<?php

namespace App\Enums;

enum CategoryType: string
{
    case PROGRAMMING = 'programming';
    case DESIGN = 'design';
    case MARKETING = 'marketing';
    case DATA_SCIENCE = 'data_science';
    case CYBERSECURITY = 'cybersecurity';
    case NETWORKS_AND_SYSTEMS = 'networks_and_systems';
    case ARTIFICIAL_INTELLIGENCE = 'artificial_intelligence';
    case WEB_DEVELOPMENT = 'web_development';
    case MOBILE_DEVELOPMENT = 'mobile_development';
    case GAME_DEVELOPMENT = 'game_development';
    case BUSINESS_ADMINISTRATION = 'business_administration';
    case ACCOUNTING_AND_FINANCE = 'accounting_and_finance';
    case PROJECT_MANAGEMENT = 'project_management';
    case HUMAN_RESOURCES = 'human_resources';
    case LANGUAGES = 'languages';
    case PHOTOGRAPHY_AND_EDITING = 'photography_and_editing';
    case AUDIOVISUAL_PRODUCTION = 'audiovisual_production';
    case DIGITAL_MARKETING = 'digital_marketing';
    case SEO_AND_SEM = 'seo_and_sem';
    case ECOMMERCE_AND_SALES = 'ecommerce_and_sales';
    case PSYCHOLOGY_AND_COACHING = 'psychology_and_coaching';
    case HEALTH_AND_WELLNESS = 'health_and_wellness';
    case EDUCATION_AND_PEDAGOGY = 'education_and_pedagogy';
}
