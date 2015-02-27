<?php
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
class appProdProjectContainer extends Container
{
    private $parameters;
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->set('service_container', $this);
        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
        $this->methodMap = array(
            'annotation_reader' => 'getAnnotationReaderService',
            'applaction_user_mailer' => 'getApplactionUserMailerService',
            'application_knp_paginator_logic' => 'getApplicationKnpPaginatorLogicService',
            'application_sonata_admin_date_range_form' => 'getApplicationSonataAdminDateRangeFormService',
            'application_sonata_admin_extra_blocks_logic' => 'getApplicationSonataAdminExtraBlocksLogicService',
            'application_sonata_user.listener.login' => 'getApplicationSonataUser_Listener_LoginService',
            'application_sonata_user.listener.redirect' => 'getApplicationSonataUser_Listener_RedirectService',
            'application_user.profile.form.type' => 'getApplicationUser_Profile_Form_TypeService',
            'application_user.registration.form.type' => 'getApplicationUser_Registration_Form_TypeService',
            'application_user.validator.unique.your_validator_name' => 'getApplicationUser_Validator_Unique_YourValidatorNameService',
            'application_user_auth_logic' => 'getApplicationUserAuthLogicService',
            'application_user_contragent_admin' => 'getApplicationUserContragentAdminService',
            'application_user_contragent_admin_email_form' => 'getApplicationUserContragentAdminEmailFormService',
            'application_user_contragent_admin_kpp_form' => 'getApplicationUserContragentAdminKppFormService',
            'application_user_contragent_admin_onec_form' => 'getApplicationUserContragentAdminOnecFormService',
            'application_user_contragent_admin_subclass_form' => 'getApplicationUserContragentAdminSubclassFormService',
            'application_user_contragent_balance_history' => 'getApplicationUserContragentBalanceHistoryService',
            'application_user_contragent_indi_form_type' => 'getApplicationUserContragentIndiFormTypeService',
            'application_user_contragent_legal' => 'getApplicationUserContragentLegalService',
            'application_user_indi_contact_admin' => 'getApplicationUserIndiContactAdminService',
            'application_user_indi_contact_form_type' => 'getApplicationUserIndiContactFormTypeService',
            'application_user_legal_contact_admin' => 'getApplicationUserLegalContactAdminService',
            'application_user_legal_contact_form_type' => 'getApplicationUserLegalContactFormTypeService',
            'application_user_logic' => 'getApplicationUserLogicService',
            'application_user_notification_twig_extension' => 'getApplicationUserNotificationTwigExtensionService',
            'assetic.asset_factory' => 'getAssetic_AssetFactoryService',
            'assetic.asset_manager' => 'getAssetic_AssetManagerService',
            'assetic.filter.cssrewrite' => 'getAssetic_Filter_CssrewriteService',
            'assetic.filter.yui_css' => 'getAssetic_Filter_YuiCssService',
            'assetic.filter.yui_js' => 'getAssetic_Filter_YuiJsService',
            'assetic.filter_manager' => 'getAssetic_FilterManagerService',
            'basic_data_logic' => 'getBasicDataLogicService',
            'beryllium_cache' => 'getBerylliumCacheService',
            'beryllium_cache.client' => 'getBerylliumCache_ClientService',
            'beryllium_cache.client.memcache' => 'getBerylliumCache_Client_MemcacheService',
            'cache_clearer' => 'getCacheClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'captcha.type' => 'getCaptcha_TypeService',
            'checked_modification.twig.extension' => 'getCheckedModification_Twig_ExtensionService',
            'checked_union.twig.extension' => 'getCheckedUnion_Twig_ExtensionService',
            'cmf_tree_browser.route_loader' => 'getCmfTreeBrowser_RouteLoaderService',
            'controller_name_converter' => 'getControllerNameConverterService',
            'core_admin_form_type_color' => 'getCoreAdminFormTypeColorService',
            'core_admin_trouble_ticket' => 'getCoreAdminTroubleTicketService',
            'core_admin_trouble_ticket_file_listener' => 'getCoreAdminTroubleTicketFileListenerService',
            'core_admin_trouble_ticket_full_text_form' => 'getCoreAdminTroubleTicketFullTextFormService',
            'core_admin_trouble_ticket_log' => 'getCoreAdminTroubleTicketLogService',
            'core_admin_trouble_ticket_message' => 'getCoreAdminTroubleTicketMessageService',
            'core_admin_trouble_ticket_message_form' => 'getCoreAdminTroubleTicketMessageFormService',
            'core_admin_trouble_ticket_priority' => 'getCoreAdminTroubleTicketPriorityService',
            'core_admin_trouble_ticket_status' => 'getCoreAdminTroubleTicketStatusService',
            'core_audit_logic' => 'getCoreAuditLogicService',
            'core_category_subscriber' => 'getCoreCategorySubscriberService',
            'core_category_virtual_product_admin' => 'getCoreCategoryVirtualProductAdminService',
            'core_city_admin' => 'getCoreCityAdminService',
            'core_color_admin' => 'getCoreColorAdminService',
            'core_color_colorpicker' => 'getCoreColorColorpickerService',
            'core_color_logic' => 'getCoreColorLogicService',
            'core_color_pallete_admin' => 'getCoreColorPalleteAdminService',
            'core_common_ajax_entity_logic' => 'getCoreCommonAjaxEntityLogicService',
            'core_common_ajax_entity_type' => 'getCoreCommonAjaxEntityTypeService',
            'core_common_decline_of_number_twig_extension' => 'getCoreCommonDeclineOfNumberTwigExtensionService',
            'core_common_encoding' => 'getCoreCommonEncodingService',
            'core_common_eval_twig_extension' => 'getCoreCommonEvalTwigExtensionService',
            'core_common_fast_edit_twig_extension' => 'getCoreCommonFastEditTwigExtensionService',
            'core_common_fragments' => 'getCoreCommonFragmentsService',
            'core_common_hidden_entity_form_type' => 'getCoreCommonHiddenEntityFormTypeService',
            'core_common_money_twig_extension' => 'getCoreCommonMoneyTwigExtensionService',
            'core_common_process' => 'getCoreCommonProcessService',
            'core_common_sitemap_listener' => 'getCoreCommonSitemapListenerService',
            'core_common_tree_select_form_type' => 'getCoreCommonTreeSelectFormTypeService',
            'core_common_twig_extension' => 'getCoreCommonTwigExtensionService',
            'core_common_twig_time_ago' => 'getCoreCommonTwigTimeAgoService',
            'core_composite_product_logic' => 'getCoreCompositeProductLogicService',
            'core_config_admin' => 'getCoreConfigAdminService',
            'core_config_data_form_type' => 'getCoreConfigDataFormTypeService',
            'core_config_group_admin' => 'getCoreConfigGroupAdminService',
            'core_config_logic' => 'getCoreConfigLogicService',
            'core_country_admin' => 'getCoreCountryAdminService',
            'core_currency_admin' => 'getCoreCurrencyAdminService',
            'core_dashboard_statistics_logic' => 'getCoreDashboardStatisticsLogicService',
            'core_delivery' => 'getCoreDeliveryService',
            'core_delivery.cdek' => 'getCoreDelivery_CdekService',
            'core_delivery.dellin' => 'getCoreDelivery_DellinService',
            'core_delivery.dpd' => 'getCoreDelivery_DpdService',
            'core_delivery.ems' => 'getCoreDelivery_EmsService',
            'core_delivery.energy' => 'getCoreDelivery_EnergyService',
            'core_delivery.internal_codes_validator' => 'getCoreDelivery_InternalCodesValidatorService',
            'core_delivery.jeldor' => 'getCoreDelivery_JeldorService',
            'core_delivery.pek' => 'getCoreDelivery_PekService',
            'core_delivery.postru' => 'getCoreDelivery_PostruService',
            'core_delivery_adress_admin' => 'getCoreDeliveryAdressAdminService',
            'core_delivery_company_admin' => 'getCoreDeliveryCompanyAdminService',
            'core_delivery_mailer' => 'getCoreDeliveryMailerService',
            'core_delivery_services_admin' => 'getCoreDeliveryServicesAdminService',
            'core_delivery_services_type_admin' => 'getCoreDeliveryServicesTypeAdminService',
            'core_directory_filter_capitals_type' => 'getCoreDirectoryFilterCapitalsTypeService',
            'core_directory_filter_name_type' => 'getCoreDirectoryFilterNameTypeService',
            'core_directory_product_tags' => 'getCoreDirectoryProductTagsService',
            'core_directory_product_tags_admin' => 'getCoreDirectoryProductTagsAdminService',
            'core_directory_product_tags_logic' => 'getCoreDirectoryProductTagsLogicService',
            'core_directory_remote_video_type' => 'getCoreDirectoryRemoteVideoTypeService',
            'core_directory_remote_video_type_frontend' => 'getCoreDirectoryRemoteVideoTypeFrontendService',
            'core_directory_unit_of_measure_admin' => 'getCoreDirectoryUnitOfMeasureAdminService',
            'core_directory_unit_of_measure_group_admin' => 'getCoreDirectoryUnitOfMeasureGroupAdminService',
            'core_discounts_contragent_manufacturer_admin' => 'getCoreDiscountsContragentManufacturerAdminService',
            'core_discounts_contragent_manufacturer_step_values_admin' => 'getCoreDiscountsContragentManufacturerStepValuesAdminService',
            'core_discounts_logic' => 'getCoreDiscountsLogicService',
            'core_discounts_manufacturer_admin' => 'getCoreDiscountsManufacturerAdminService',
            'core_discounts_manufacturer_step_values_admin' => 'getCoreDiscountsManufacturerStepValuesAdminService',
            'core_file.twig.file_filter_extension' => 'getCoreFile_Twig_FileFilterExtensionService',
            'core_file.twig.file_function_extension' => 'getCoreFile_Twig_FileFunctionExtensionService',
            'core_file_document_admin' => 'getCoreFileDocumentAdminService',
            'core_file_form_multiupload_document' => 'getCoreFileFormMultiuploadDocumentService',
            'core_file_form_multiupload_file_fronend' => 'getCoreFileFormMultiuploadFileFronendService',
            'core_file_form_multiupload_image' => 'getCoreFileFormMultiuploadImageService',
            'core_file_image_admin' => 'getCoreFileImageAdminService',
            'core_file_logic' => 'getCoreFileLogicService',
            'core_file_subscriber' => 'getCoreFileSubscriberService',
            'core_geo_city_admin' => 'getCoreGeoCityAdminService',
            'core_holiday_admin' => 'getCoreHolidayAdminService',
            'core_holiday_logic' => 'getCoreHolidayLogicService',
            'core_holiday_twig_function_extension' => 'getCoreHolidayTwigFunctionExtensionService',
            'core_legal_form_admin' => 'getCoreLegalFormAdminService',
            'core_logistics_additional_costs_of_supply_admin' => 'getCoreLogisticsAdditionalCostsOfSupplyAdminService',
            'core_logistics_additional_costs_of_supply_type_admin' => 'getCoreLogisticsAdditionalCostsOfSupplyTypeAdminService',
            'core_logistics_bank_admin' => 'getCoreLogisticsBankAdminService',
            'core_logistics_logic' => 'getCoreLogisticsLogicService',
            'core_logistics_product_in_supply_admin' => 'getCoreLogisticsProductInSupplyAdminService',
            'core_logistics_products_in_transit_type' => 'getCoreLogisticsProductsInTransitTypeService',
            'core_logistics_region_city_admin' => 'getCoreLogisticsRegionCityAdminService',
            'core_logistics_seller_admin' => 'getCoreLogisticsSellerAdminService',
            'core_logistics_stock_admin' => 'getCoreLogisticsStockAdminService',
            'core_logistics_supplier_admin' => 'getCoreLogisticsSupplierAdminService',
            'core_logistics_supplier_price_analysis_logic' => 'getCoreLogisticsSupplierPriceAnalysisLogicService',
            'core_logistics_supply_admin' => 'getCoreLogisticsSupplyAdminService',
            'core_logistics_supply_status_admin' => 'getCoreLogisticsSupplyStatusAdminService',
            'core_logistics_transit_admin' => 'getCoreLogisticsTransitAdminService',
            'core_logistics_transit_status_admin' => 'getCoreLogisticsTransitStatusAdminService',
            'core_logistics_unit_in_stock_admin' => 'getCoreLogisticsUnitInStockAdminService',
            'core_logistics_unit_in_stock_defect_transit_admin' => 'getCoreLogisticsUnitInStockDefectTransitAdminService',
            'core_logistics_unit_in_stock_defect_type' => 'getCoreLogisticsUnitInStockDefectTypeService',
            'core_logistics_unit_in_transit_admin' => 'getCoreLogisticsUnitInTransitAdminService',
            'core_logistics_unit_serial_admin' => 'getCoreLogisticsUnitSerialAdminService',
            'core_manufacturer_admin' => 'getCoreManufacturerAdminService',
            'core_manufacturer_brand_admin' => 'getCoreManufacturerBrandAdminService',
            'core_manufacturer_certificate_admin' => 'getCoreManufacturerCertificateAdminService',
            'core_manufacturer_price_analysis_admin' => 'getCoreManufacturerPriceAnalysisAdminService',
            'core_manufacturer_price_analysis_settings_admin' => 'getCoreManufacturerPriceAnalysisSettingsAdminService',
            'core_manufacturer_series_admin' => 'getCoreManufacturerSeriesAdminService',
            'core_order_admin' => 'getCoreOrderAdminService',
            'core_order_boxes_and_waybills_type' => 'getCoreOrderBoxesAndWaybillsTypeService',
            'core_order_boxes_type' => 'getCoreOrderBoxesTypeService',
            'core_order_buyer_recipient_info_form' => 'getCoreOrderBuyerRecipientInfoFormService',
            'core_order_canceled_reason_admin' => 'getCoreOrderCanceledReasonAdminService',
            'core_order_canceled_reason_type' => 'getCoreOrderCanceledReasonTypeService',
            'core_order_check_composition_validator' => 'getCoreOrderCheckCompositionValidatorService',
            'core_order_composition_admin' => 'getCoreOrderCompositionAdminService',
            'core_order_extra_status_admin' => 'getCoreOrderExtraStatusAdminService',
            'core_order_extra_status_type' => 'getCoreOrderExtraStatusTypeService',
            'core_order_logic' => 'getCoreOrderLogicService',
            'core_order_mailer_logic' => 'getCoreOrderMailerLogicService',
            'core_order_order_extra_validator' => 'getCoreOrderOrderExtraValidatorService',
            'core_order_products_in_order_type' => 'getCoreOrderProductsInOrderTypeService',
            'core_order_recipient_with_extra_data_form' => 'getCoreOrderRecipientWithExtraDataFormService',
            'core_order_sizes_of_box_admin' => 'getCoreOrderSizesOfBoxAdminService',
            'core_order_subscriber' => 'getCoreOrderSubscriberService',
            'core_order_unit_serial_number_type' => 'getCoreOrderUnitSerialNumberTypeService',
            'core_order_waybills_admin' => 'getCoreOrderWaybillsAdminService',
            'core_order_waybills_type' => 'getCoreOrderWaybillsTypeService',
            'core_payment_admin' => 'getCorePaymentAdminService',
            'core_payment_admin_payment_system_common' => 'getCorePaymentAdminPaymentSystemCommonService',
            'core_payment_admin_robokassa_system' => 'getCorePaymentAdminRobokassaSystemService',
            'core_payment_form_type_payment_system' => 'getCorePaymentFormTypePaymentSystemService',
            'core_payment_logic' => 'getCorePaymentLogicService',
            'core_payment_logic_banktransfer' => 'getCorePaymentLogicBanktransferService',
            'core_payment_logic_paymentondelivery' => 'getCorePaymentLogicPaymentondeliveryService',
            'core_payment_logic_paypal' => 'getCorePaymentLogicPaypalService',
            'core_payment_logic_plasticcard' => 'getCorePaymentLogicPlasticcardService',
            'core_payment_logic_plasticcardterminal' => 'getCorePaymentLogicPlasticcardterminalService',
            'core_payment_logic_robokassa' => 'getCorePaymentLogicRobokassaService',
            'core_payment_logic_yandexmoney' => 'getCorePaymentLogicYandexmoneyService',
            'core_payment_subscriber' => 'getCorePaymentSubscriberService',
            'core_payment_system_logic' => 'getCorePaymentSystemLogicService',
            'core_payment_twig_extension' => 'getCorePaymentTwigExtensionService',
            'core_pre_order_admin' => 'getCorePreOrderAdminService',
            'core_pre_order_composition_form' => 'getCorePreOrderCompositionFormService',
            'core_pre_order_compositions_admin' => 'getCorePreOrderCompositionsAdminService',
            'core_pre_order_form' => 'getCorePreOrderFormService',
            'core_pre_order_logic' => 'getCorePreOrderLogicService',
            'core_pre_order_status_admin' => 'getCorePreOrderStatusAdminService',
            'core_product_format_twig_extension' => 'getCoreProductFormatTwigExtensionService',
            'core_product_logic' => 'getCoreProductLogicService',
            'core_product_modification_logic' => 'getCoreProductModificationLogicService',
            'core_product_statistics_logic' => 'getCoreProductStatisticsLogicService',
            'core_product_subscriber' => 'getCoreProductSubscriberService',
            'core_product_twig_extension' => 'getCoreProductTwigExtensionService',
            'core_property_filter_logic' => 'getCorePropertyFilterLogicService',
            'core_region_admin' => 'getCoreRegionAdminService',
            'core_review_admin_review' => 'getCoreReviewAdminReviewService',
            'core_review_logic' => 'getCoreReviewLogicService',
            'core_review_star_rating' => 'getCoreReviewStarRatingService',
            'core_review_subscriber' => 'getCoreReviewSubscriberService',
            'core_review_twig_extension' => 'getCoreReviewTwigExtensionService',
            'core_shop_category_admin_faq' => 'getCoreShopCategoryAdminFaqService',
            'core_shop_category_admin_product' => 'getCoreShopCategoryAdminProductService',
            'core_shop_category_admin_trouble_ticket' => 'getCoreShopCategoryAdminTroubleTicketService',
            'core_shop_category_form_type' => 'getCoreShopCategoryFormTypeService',
            'core_shop_category_logic' => 'getCoreShopCategoryLogicService',
            'core_shop_category_main_form_type' => 'getCoreShopCategoryMainFormTypeService',
            'core_shop_manufacturer_main_form_type' => 'getCoreShopManufacturerMainFormTypeService',
            'core_shop_modification_form_type' => 'getCoreShopModificationFormTypeService',
            'core_shop_product_admin' => 'getCoreShopProductAdminService',
            'core_shop_property_admin' => 'getCoreShopPropertyAdminService',
            'core_shop_property_category_form_type' => 'getCoreShopPropertyCategoryFormTypeService',
            'core_shop_property_data_admin' => 'getCoreShopPropertyDataAdminService',
            'core_shop_property_data_product_admin' => 'getCoreShopPropertyDataProductAdminService',
            'core_shop_property_form_type' => 'getCoreShopPropertyFormTypeService',
            'core_shop_property_logic' => 'getCoreShopPropertyLogicService',
            'core_shop_property_settings_category_admin' => 'getCoreShopPropertySettingsCategoryAdminService',
            'core_slug_history_form' => 'getCoreSlugHistoryFormService',
            'core_slug_history_logic' => 'getCoreSlugHistoryLogicService',
            'core_slug_history_subscriber' => 'getCoreSlugHistorySubscriberService',
            'core_statistics_admin' => 'getCoreStatisticsAdminService',
            'core_statistics_deficit_product_logic' => 'getCoreStatisticsDeficitProductLogicService',
            'core_statistics_inventory_logic' => 'getCoreStatisticsInventoryLogicService',
            'core_statistics_not_finished_order_admin' => 'getCoreStatisticsNotFinishedOrderAdminService',
            'core_statistics_not_finished_order_listener' => 'getCoreStatisticsNotFinishedOrderListenerService',
            'core_statistics_not_finished_order_logic' => 'getCoreStatisticsNotFinishedOrderLogicService',
            'core_statistics_stock_logic' => 'getCoreStatisticsStockLogicService',
            'core_statistics_virtual_units_logic' => 'getCoreStatisticsVirtualUnitsLogicService',
            'core_stock_subscriber' => 'getCoreStockSubscriberService',
            'core_supplier_price_analysis_subscriber' => 'getCoreSupplierPriceAnalysisSubscriberService',
            'core_supply_logic' => 'getCoreSupplyLogicService',
            'core_supply_subscriber' => 'getCoreSupplySubscriberService',
            'core_trouble_ticket_log_mailer' => 'getCoreTroubleTicketLogMailerService',
            'core_union_composite_product_subscriber' => 'getCoreUnionCompositeProductSubscriberService',
            'core_union_form_type' => 'getCoreUnionFormTypeService',
            'core_union_logic' => 'getCoreUnionLogicService',
            'core_union_product_composition' => 'getCoreUnionProductCompositionService',
            'core_union_product_quantity_alternative' => 'getCoreUnionProductQuantityAlternativeService',
            'core_union_subscriber' => 'getCoreUnionSubscriberService',
            'core_unit_in_stock_subscriber' => 'getCoreUnitInStockSubscriberService',
            'core_video_admin' => 'getCoreVideoAdminService',
            'core_video_hosting_admin' => 'getCoreVideoHostingAdminService',
            'core_yandex_api_logic' => 'getCoreYandexApiLogicService',
            'data_collector.ladybug_data_collector' => 'getDataCollector_LadybugDataCollectorService',
            'debug.emergency_logger_listener' => 'getDebug_EmergencyLoggerListenerService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.dbal.force_master_connection' => 'getDoctrine_Dbal_ForceMasterConnectionService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.default_memcache_instance' => 'getDoctrine_Orm_DefaultMemcacheInstanceService',
            'doctrine.orm.force_master_entity_manager' => 'getDoctrine_Orm_ForceMasterEntityManagerService',
            'doctrine.orm.force_master_manager_configurator' => 'getDoctrine_Orm_ForceMasterManagerConfiguratorService',
            'doctrine.orm.force_master_memcache_instance' => 'getDoctrine_Orm_ForceMasterMemcacheInstanceService',
            'doctrine.orm.naming_strategy.default' => 'getDoctrine_Orm_NamingStrategy_DefaultService',
            'doctrine.orm.validator.unique' => 'getDoctrine_Orm_Validator_UniqueService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'elfinder_loader' => 'getElfinderLoaderService',
            'event_dispatcher' => 'getEventDispatcherService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'form.csrf_provider' => 'getForm_CsrfProviderService',
            'form.factory' => 'getForm_FactoryService',
            'form.registry' => 'getForm_RegistryService',
            'form.resolved_type_factory' => 'getForm_ResolvedTypeFactoryService',
            'form.type.birthday' => 'getForm_Type_BirthdayService',
            'form.type.button' => 'getForm_Type_ButtonService',
            'form.type.checkbox' => 'getForm_Type_CheckboxService',
            'form.type.choice' => 'getForm_Type_ChoiceService',
            'form.type.collection' => 'getForm_Type_CollectionService',
            'form.type.country' => 'getForm_Type_CountryService',
            'form.type.currency' => 'getForm_Type_CurrencyService',
            'form.type.date' => 'getForm_Type_DateService',
            'form.type.datetime' => 'getForm_Type_DatetimeService',
            'form.type.email' => 'getForm_Type_EmailService',
            'form.type.entity' => 'getForm_Type_EntityService',
            'form.type.file' => 'getForm_Type_FileService',
            'form.type.form' => 'getForm_Type_FormService',
            'form.type.hidden' => 'getForm_Type_HiddenService',
            'form.type.integer' => 'getForm_Type_IntegerService',
            'form.type.language' => 'getForm_Type_LanguageService',
            'form.type.locale' => 'getForm_Type_LocaleService',
            'form.type.money' => 'getForm_Type_MoneyService',
            'form.type.number' => 'getForm_Type_NumberService',
            'form.type.password' => 'getForm_Type_PasswordService',
            'form.type.percent' => 'getForm_Type_PercentService',
            'form.type.radio' => 'getForm_Type_RadioService',
            'form.type.repeated' => 'getForm_Type_RepeatedService',
            'form.type.reset' => 'getForm_Type_ResetService',
            'form.type.search' => 'getForm_Type_SearchService',
            'form.type.submit' => 'getForm_Type_SubmitService',
            'form.type.text' => 'getForm_Type_TextService',
            'form.type.textarea' => 'getForm_Type_TextareaService',
            'form.type.time' => 'getForm_Type_TimeService',
            'form.type.timezone' => 'getForm_Type_TimezoneService',
            'form.type.url' => 'getForm_Type_UrlService',
            'form.type_extension.csrf' => 'getForm_TypeExtension_CsrfService',
            'form.type_extension.form.http_foundation' => 'getForm_TypeExtension_Form_HttpFoundationService',
            'form.type_extension.form.validator' => 'getForm_TypeExtension_Form_ValidatorService',
            'form.type_extension.repeated.validator' => 'getForm_TypeExtension_Repeated_ValidatorService',
            'form.type_extension.submit.validator' => 'getForm_TypeExtension_Submit_ValidatorService',
            'form.type_guesser.doctrine' => 'getForm_TypeGuesser_DoctrineService',
            'form.type_guesser.validator' => 'getForm_TypeGuesser_ValidatorService',
            'fos_user.change_password.form' => 'getFosUser_ChangePassword_FormService',
            'fos_user.change_password.form.handler.default' => 'getFosUser_ChangePassword_Form_Handler_DefaultService',
            'fos_user.change_password.form.type' => 'getFosUser_ChangePassword_Form_TypeService',
            'fos_user.mailer' => 'getFosUser_MailerService',
            'fos_user.profile.form' => 'getFosUser_Profile_FormService',
            'fos_user.profile.form.handler' => 'getFosUser_Profile_Form_HandlerService',
            'fos_user.profile.form.type' => 'getFosUser_Profile_Form_TypeService',
            'fos_user.registration.form' => 'getFosUser_Registration_FormService',
            'fos_user.registration.form.handler' => 'getFosUser_Registration_Form_HandlerService',
            'fos_user.registration.form.type' => 'getFosUser_Registration_Form_TypeService',
            'fos_user.resetting.form' => 'getFosUser_Resetting_FormService',
            'fos_user.resetting.form.handler' => 'getFosUser_Resetting_Form_HandlerService',
            'fos_user.resetting.form.type' => 'getFosUser_Resetting_Form_TypeService',
            'fos_user.security.interactive_login_listener' => 'getFosUser_Security_InteractiveLoginListenerService',
            'fos_user.security.login_manager' => 'getFosUser_Security_LoginManagerService',
            'fos_user.user_listener' => 'getFosUser_UserListenerService',
            'fos_user.user_manager' => 'getFosUser_UserManagerService',
            'fos_user.user_provider.username_email' => 'getFosUser_UserProvider_UsernameEmailService',
            'fos_user.username_form_type' => 'getFosUser_UsernameFormTypeService',
            'fos_user.util.email_canonicalizer' => 'getFosUser_Util_EmailCanonicalizerService',
            'fos_user.util.token_generator' => 'getFosUser_Util_TokenGeneratorService',
            'fos_user.util.user_manipulator' => 'getFosUser_Util_UserManipulatorService',
            'fragment.handler' => 'getFragment_HandlerService',
            'fragment.renderer.esi' => 'getFragment_Renderer_EsiService',
            'fragment.renderer.hinclude' => 'getFragment_Renderer_HincludeService',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService',
            'gedmo.listener.softdeleteable' => 'getGedmo_Listener_SoftdeleteableService',
            'gregwar_captcha.captcha_builder' => 'getGregwarCaptcha_CaptchaBuilderService',
            'gregwar_captcha.generator' => 'getGregwarCaptcha_GeneratorService',
            'gregwar_captcha.image_file_handler' => 'getGregwarCaptcha_ImageFileHandlerService',
            'gregwar_captcha.phrase_builder' => 'getGregwarCaptcha_PhraseBuilderService',
            'http_kernel' => 'getHttpKernelService',
            'ivory_ck_editor.config_manager' => 'getIvoryCkEditor_ConfigManagerService',
            'ivory_ck_editor.form.type' => 'getIvoryCkEditor_Form_TypeService',
            'ivory_ck_editor.plugin_manager' => 'getIvoryCkEditor_PluginManagerService',
            'ivory_ck_editor.styles_set_manager' => 'getIvoryCkEditor_StylesSetManagerService',
            'ivory_ck_editor.template_manager' => 'getIvoryCkEditor_TemplateManagerService',
            'ivory_ck_editor.templating.helper' => 'getIvoryCkEditor_Templating_HelperService',
            'ivory_ck_editor.twig_extension' => 'getIvoryCkEditor_TwigExtensionService',
            'jms_aop.interceptor_loader' => 'getJmsAop_InterceptorLoaderService',
            'jms_aop.pointcut_container' => 'getJmsAop_PointcutContainerService',
            'jms_di_extra.controller_resolver' => 'getJmsDiExtra_ControllerResolverService',
            'jms_di_extra.metadata.converter' => 'getJmsDiExtra_Metadata_ConverterService',
            'jms_di_extra.metadata.metadata_factory' => 'getJmsDiExtra_Metadata_MetadataFactoryService',
            'jms_di_extra.metadata_driver' => 'getJmsDiExtra_MetadataDriverService',
            'jms_i18n_routing.loader' => 'getJmsI18nRouting_LoaderService',
            'kernel' => 'getKernelService',
            'knp_menu.factory' => 'getKnpMenu_FactoryService',
            'knp_menu.listener.voters' => 'getKnpMenu_Listener_VotersService',
            'knp_menu.matcher' => 'getKnpMenu_MatcherService',
            'knp_menu.menu_provider' => 'getKnpMenu_MenuProviderService',
            'knp_menu.renderer.list' => 'getKnpMenu_Renderer_ListService',
            'knp_menu.renderer.twig' => 'getKnpMenu_Renderer_TwigService',
            'knp_menu.renderer_provider' => 'getKnpMenu_RendererProviderService',
            'knp_menu.voter.router' => 'getKnpMenu_Voter_RouterService',
            'knp_paginator' => 'getKnpPaginatorService',
            'knp_paginator.helper.processor' => 'getKnpPaginator_Helper_ProcessorService',
            'knp_paginator.subscriber.filtration' => 'getKnpPaginator_Subscriber_FiltrationService',
            'knp_paginator.subscriber.paginate' => 'getKnpPaginator_Subscriber_PaginateService',
            'knp_paginator.subscriber.sliding_pagination' => 'getKnpPaginator_Subscriber_SlidingPaginationService',
            'knp_paginator.subscriber.sortable' => 'getKnpPaginator_Subscriber_SortableService',
            'knp_paginator.templating.helper.pagination' => 'getKnpPaginator_Templating_Helper_PaginationService',
            'knp_paginator.twig.extension.pagination' => 'getKnpPaginator_Twig_Extension_PaginationService',
            'ladybug.dumper' => 'getLadybug_DumperService',
            'ladybug.event_listener.ladybug_config_listener' => 'getLadybug_EventListener_LadybugConfigListenerService',
            'language_switcher_extension' => 'getLanguageSwitcherExtensionService',
            'language_switcher_logic' => 'getLanguageSwitcherLogicService',
            'language_text_case_form' => 'getLanguageTextCaseFormService',
            'liip_monitor.health_controller' => 'getLiipMonitor_HealthControllerService',
            'liip_monitor.helper' => 'getLiipMonitor_HelperService',
            'liip_monitor.runner' => 'getLiipMonitor_RunnerService',
            'locale_listener' => 'getLocaleListenerService',
            'logger' => 'getLoggerService',
            'markdown.parser' => 'getMarkdown_ParserService',
            'monolog.handler.applog' => 'getMonolog_Handler_ApplogService',
            'monolog.handler.file' => 'getMonolog_Handler_FileService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.handler.syslog' => 'getMonolog_Handler_SyslogService',
            'monolog.logger.assetic' => 'getMonolog_Logger_AsseticService',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService',
            'monolog.logger.emergency' => 'getMonolog_Logger_EmergencyService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.router' => 'getMonolog_Logger_RouterService',
            'monolog.logger.security' => 'getMonolog_Logger_SecurityService',
            'office_work_time_admin' => 'getOfficeWorkTimeAdminService',
            'office_work_time_logic' => 'getOfficeWorkTimeLogicService',
            'phpexcel' => 'getPhpexcelService',
            'presta_sitemap.dumper' => 'getPrestaSitemap_DumperService',
            'presta_sitemap.eventlistener.route_annotation' => 'getPrestaSitemap_Eventlistener_RouteAnnotationService',
            'presta_sitemap.generator' => 'getPrestaSitemap_GeneratorService',
            'property_accessor' => 'getPropertyAccessorService',
            'request' => 'getRequestService',
            'request_stack' => 'getRequestStackService',
            'response_listener' => 'getResponseListenerService',
            'router' => 'getRouterService',
            'router.request_context' => 'getRouter_RequestContextService',
            'router_listener' => 'getRouterListenerService',
            'routing.loader' => 'getRouting_LoaderService',
            'security.access.decision_manager' => 'getSecurity_Access_DecisionManagerService',
            'security.access.method_interceptor' => 'getSecurity_Access_MethodInterceptorService',
            'security.access.pointcut' => 'getSecurity_Access_PointcutService',
            'security.access_listener' => 'getSecurity_AccessListenerService',
            'security.access_map' => 'getSecurity_AccessMapService',
            'security.authentication.manager' => 'getSecurity_Authentication_ManagerService',
            'security.authentication.session_strategy' => 'getSecurity_Authentication_SessionStrategyService',
            'security.authentication.trust_resolver' => 'getSecurity_Authentication_TrustResolverService',
            'security.channel_listener' => 'getSecurity_ChannelListenerService',
            'security.context' => 'getSecurity_ContextService',
            'security.context_listener.0' => 'getSecurity_ContextListener_0Service',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService',
            'security.encoder_factory' => 'getSecurity_EncoderFactoryService',
            'security.extra.metadata_driver' => 'getSecurity_Extra_MetadataDriverService',
            'security.extra.metadata_factory' => 'getSecurity_Extra_MetadataFactoryService',
            'security.firewall' => 'getSecurity_FirewallService',
            'security.firewall.map.context.admin' => 'getSecurity_Firewall_Map_Context_AdminService',
            'security.firewall.map.context.main' => 'getSecurity_Firewall_Map_Context_MainService',
            'security.http_utils' => 'getSecurity_HttpUtilsService',
            'security.rememberme.response_listener' => 'getSecurity_Rememberme_ResponseListenerService',
            'security.role_hierarchy' => 'getSecurity_RoleHierarchyService',
            'security.secure_random' => 'getSecurity_SecureRandomService',
            'security.user_checker' => 'getSecurity_UserCheckerService',
            'security.validator.user_password' => 'getSecurity_Validator_UserPasswordService',
            'sensio_framework_extra.cache.listener' => 'getSensioFrameworkExtra_Cache_ListenerService',
            'sensio_framework_extra.controller.listener' => 'getSensioFrameworkExtra_Controller_ListenerService',
            'sensio_framework_extra.converter.datetime' => 'getSensioFrameworkExtra_Converter_DatetimeService',
            'sensio_framework_extra.converter.doctrine.orm' => 'getSensioFrameworkExtra_Converter_Doctrine_OrmService',
            'sensio_framework_extra.converter.listener' => 'getSensioFrameworkExtra_Converter_ListenerService',
            'sensio_framework_extra.converter.manager' => 'getSensioFrameworkExtra_Converter_ManagerService',
            'sensio_framework_extra.view.guesser' => 'getSensioFrameworkExtra_View_GuesserService',
            'sensio_framework_extra.view.listener' => 'getSensioFrameworkExtra_View_ListenerService',
            'service_container' => 'getServiceContainerService',
            'session' => 'getSessionService',
            'session.storage.filesystem' => 'getSession_Storage_FilesystemService',
            'session.storage.metadata_bag' => 'getSession_Storage_MetadataBagService',
            'session.storage.native' => 'getSession_Storage_NativeService',
            'session.storage.php_bridge' => 'getSession_Storage_PhpBridgeService',
            'session_listener' => 'getSessionListenerService',
            'shtumi.useful.orm.filter.type.ajax_autocomplete' => 'getShtumi_Useful_Orm_Filter_Type_AjaxAutocompleteService',
            'shtumi.useful.type.ajax_autocomplete' => 'getShtumi_Useful_Type_AjaxAutocompleteService',
            'shtumi.useful.type.ajax_file' => 'getShtumi_Useful_Type_AjaxFileService',
            'shtumi.useful.type.daterange' => 'getShtumi_Useful_Type_DaterangeService',
            'shtumi.useful.type.dependent_filtered_entity' => 'getShtumi_Useful_Type_DependentFilteredEntityService',
            'shtumi.useful.type.dependent_filtered_select2' => 'getShtumi_Useful_Type_DependentFilteredSelect2Service',
            'shtumi.useful.type.select2_entity' => 'getShtumi_Useful_Type_Select2EntityService',
            'shtumi_daterange' => 'getShtumiDaterangeService',
            'simplethings_entityaudit.config' => 'getSimplethingsEntityaudit_ConfigService',
            'simplethings_entityaudit.create_schema_listener' => 'getSimplethingsEntityaudit_CreateSchemaListenerService',
            'simplethings_entityaudit.log_revisions_listener' => 'getSimplethingsEntityaudit_LogRevisionsListenerService',
            'simplethings_entityaudit.manager' => 'getSimplethingsEntityaudit_ManagerService',
            'simplethings_entityaudit.reader' => 'getSimplethingsEntityaudit_ReaderService',
            'simplethings_entityaudit.request.current_user_listener' => 'getSimplethingsEntityaudit_Request_CurrentUserListenerService',
            'sonata.admin.audit.manager' => 'getSonata_Admin_Audit_ManagerService',
            'sonata.admin.audit.orm.reader' => 'getSonata_Admin_Audit_Orm_ReaderService',
            'sonata.admin.block.admin_list' => 'getSonata_Admin_Block_AdminListService',
            'sonata.admin.block.search_result' => 'getSonata_Admin_Block_SearchResultService',
            'sonata.admin.builder.filter.factory' => 'getSonata_Admin_Builder_Filter_FactoryService',
            'sonata.admin.builder.orm_datagrid' => 'getSonata_Admin_Builder_OrmDatagridService',
            'sonata.admin.builder.orm_form' => 'getSonata_Admin_Builder_OrmFormService',
            'sonata.admin.builder.orm_list' => 'getSonata_Admin_Builder_OrmListService',
            'sonata.admin.builder.orm_show' => 'getSonata_Admin_Builder_OrmShowService',
            'sonata.admin.controller.admin' => 'getSonata_Admin_Controller_AdminService',
            'sonata.admin.event.extension' => 'getSonata_Admin_Event_ExtensionService',
            'sonata.admin.exporter' => 'getSonata_Admin_ExporterService',
            'sonata.admin.faq.article' => 'getSonata_Admin_Faq_ArticleService',
            'sonata.admin.form.extension.field' => 'getSonata_Admin_Form_Extension_FieldService',
            'sonata.admin.form.filter.type.choice' => 'getSonata_Admin_Form_Filter_Type_ChoiceService',
            'sonata.admin.form.filter.type.date' => 'getSonata_Admin_Form_Filter_Type_DateService',
            'sonata.admin.form.filter.type.daterange' => 'getSonata_Admin_Form_Filter_Type_DaterangeService',
            'sonata.admin.form.filter.type.datetime' => 'getSonata_Admin_Form_Filter_Type_DatetimeService',
            'sonata.admin.form.filter.type.datetime_range' => 'getSonata_Admin_Form_Filter_Type_DatetimeRangeService',
            'sonata.admin.form.filter.type.default' => 'getSonata_Admin_Form_Filter_Type_DefaultService',
            'sonata.admin.form.filter.type.number' => 'getSonata_Admin_Form_Filter_Type_NumberService',
            'sonata.admin.form.type.admin' => 'getSonata_Admin_Form_Type_AdminService',
            'sonata.admin.form.type.model_choice' => 'getSonata_Admin_Form_Type_ModelChoiceService',
            'sonata.admin.form.type.model_hidden' => 'getSonata_Admin_Form_Type_ModelHiddenService',
            'sonata.admin.form.type.model_list' => 'getSonata_Admin_Form_Type_ModelListService',
            'sonata.admin.form.type.model_reference' => 'getSonata_Admin_Form_Type_ModelReferenceService',
            'sonata.admin.guesser.orm_datagrid' => 'getSonata_Admin_Guesser_OrmDatagridService',
            'sonata.admin.guesser.orm_datagrid_chain' => 'getSonata_Admin_Guesser_OrmDatagridChainService',
            'sonata.admin.guesser.orm_list' => 'getSonata_Admin_Guesser_OrmListService',
            'sonata.admin.guesser.orm_list_chain' => 'getSonata_Admin_Guesser_OrmListChainService',
            'sonata.admin.guesser.orm_show' => 'getSonata_Admin_Guesser_OrmShowService',
            'sonata.admin.guesser.orm_show_chain' => 'getSonata_Admin_Guesser_OrmShowChainService',
            'sonata.admin.helper' => 'getSonata_Admin_HelperService',
            'sonata.admin.label.strategy.bc' => 'getSonata_Admin_Label_Strategy_BcService',
            'sonata.admin.label.strategy.form_component' => 'getSonata_Admin_Label_Strategy_FormComponentService',
            'sonata.admin.label.strategy.native' => 'getSonata_Admin_Label_Strategy_NativeService',
            'sonata.admin.label.strategy.noop' => 'getSonata_Admin_Label_Strategy_NoopService',
            'sonata.admin.label.strategy.underscore' => 'getSonata_Admin_Label_Strategy_UnderscoreService',
            'sonata.admin.manager.orm' => 'getSonata_Admin_Manager_OrmService',
            'sonata.admin.manipulator.acl.admin' => 'getSonata_Admin_Manipulator_Acl_AdminService',
            'sonata.admin.manipulator.acl.object.orm' => 'getSonata_Admin_Manipulator_Acl_Object_OrmService',
            'sonata.admin.object.manipulator.acl.admin' => 'getSonata_Admin_Object_Manipulator_Acl_AdminService',
            'sonata.admin.orm.filter.type.boolean' => 'getSonata_Admin_Orm_Filter_Type_BooleanService',
            'sonata.admin.orm.filter.type.callback' => 'getSonata_Admin_Orm_Filter_Type_CallbackService',
            'sonata.admin.orm.filter.type.choice' => 'getSonata_Admin_Orm_Filter_Type_ChoiceService',
            'sonata.admin.orm.filter.type.class' => 'getSonata_Admin_Orm_Filter_Type_ClassService',
            'sonata.admin.orm.filter.type.date' => 'getSonata_Admin_Orm_Filter_Type_DateService',
            'sonata.admin.orm.filter.type.date_range' => 'getSonata_Admin_Orm_Filter_Type_DateRangeService',
            'sonata.admin.orm.filter.type.datetime' => 'getSonata_Admin_Orm_Filter_Type_DatetimeService',
            'sonata.admin.orm.filter.type.datetime_range' => 'getSonata_Admin_Orm_Filter_Type_DatetimeRangeService',
            'sonata.admin.orm.filter.type.model' => 'getSonata_Admin_Orm_Filter_Type_ModelService',
            'sonata.admin.orm.filter.type.number' => 'getSonata_Admin_Orm_Filter_Type_NumberService',
            'sonata.admin.orm.filter.type.string' => 'getSonata_Admin_Orm_Filter_Type_StringService',
            'sonata.admin.orm.filter.type.time' => 'getSonata_Admin_Orm_Filter_Type_TimeService',
            'sonata.admin.pool' => 'getSonata_Admin_PoolService',
            'sonata.admin.route.default_generator' => 'getSonata_Admin_Route_DefaultGeneratorService',
            'sonata.admin.route.path_info' => 'getSonata_Admin_Route_PathInfoService',
            'sonata.admin.route.query_string' => 'getSonata_Admin_Route_QueryStringService',
            'sonata.admin.route_loader' => 'getSonata_Admin_RouteLoaderService',
            'sonata.admin.search.handler' => 'getSonata_Admin_Search_HandlerService',
            'sonata.admin.security.handler' => 'getSonata_Admin_Security_HandlerService',
            'sonata.admin.twig.extension' => 'getSonata_Admin_Twig_ExtensionService',
            'sonata.admin.validator.inline' => 'getSonata_Admin_Validator_InlineService',
            'sonata.admin_doctrine_orm.block.audit' => 'getSonata_AdminDoctrineOrm_Block_AuditService',
            'sonata.block.cache.handler.default' => 'getSonata_Block_Cache_Handler_DefaultService',
            'sonata.block.cache.handler.noop' => 'getSonata_Block_Cache_Handler_NoopService',
            'sonata.block.context_manager.default' => 'getSonata_Block_ContextManager_DefaultService',
            'sonata.block.exception.filter.debug_only' => 'getSonata_Block_Exception_Filter_DebugOnlyService',
            'sonata.block.exception.filter.ignore_block_exception' => 'getSonata_Block_Exception_Filter_IgnoreBlockExceptionService',
            'sonata.block.exception.filter.keep_all' => 'getSonata_Block_Exception_Filter_KeepAllService',
            'sonata.block.exception.filter.keep_none' => 'getSonata_Block_Exception_Filter_KeepNoneService',
            'sonata.block.exception.renderer.inline' => 'getSonata_Block_Exception_Renderer_InlineService',
            'sonata.block.exception.renderer.inline_debug' => 'getSonata_Block_Exception_Renderer_InlineDebugService',
            'sonata.block.exception.renderer.throw' => 'getSonata_Block_Exception_Renderer_ThrowService',
            'sonata.block.exception.strategy.manager' => 'getSonata_Block_Exception_Strategy_ManagerService',
            'sonata.block.form.type.block' => 'getSonata_Block_Form_Type_BlockService',
            'sonata.block.form.type.container_template' => 'getSonata_Block_Form_Type_ContainerTemplateService',
            'sonata.block.loader.chain' => 'getSonata_Block_Loader_ChainService',
            'sonata.block.loader.service' => 'getSonata_Block_Loader_ServiceService',
            'sonata.block.manager' => 'getSonata_Block_ManagerService',
            'sonata.block.renderer.default' => 'getSonata_Block_Renderer_DefaultService',
            'sonata.block.service.container' => 'getSonata_Block_Service_ContainerService',
            'sonata.block.service.empty' => 'getSonata_Block_Service_EmptyService',
            'sonata.block.service.menu' => 'getSonata_Block_Service_MenuService',
            'sonata.block.service.rss' => 'getSonata_Block_Service_RssService',
            'sonata.block.service.statistics' => 'getSonata_Block_Service_StatisticsService',
            'sonata.block.service.template' => 'getSonata_Block_Service_TemplateService',
            'sonata.block.service.text' => 'getSonata_Block_Service_TextService',
            'sonata.block.templating.helper' => 'getSonata_Block_Templating_HelperService',
            'sonata.block.twig.global' => 'getSonata_Block_Twig_GlobalService',
            'sonata.core.date.moment_format_converter' => 'getSonata_Core_Date_MomentFormatConverterService',
            'sonata.core.flashmessage.manager' => 'getSonata_Core_Flashmessage_ManagerService',
            'sonata.core.flashmessage.twig.extension' => 'getSonata_Core_Flashmessage_Twig_ExtensionService',
            'sonata.core.form.type.array' => 'getSonata_Core_Form_Type_ArrayService',
            'sonata.core.form.type.boolean' => 'getSonata_Core_Form_Type_BooleanService',
            'sonata.core.form.type.collection' => 'getSonata_Core_Form_Type_CollectionService',
            'sonata.core.form.type.date_picker' => 'getSonata_Core_Form_Type_DatePickerService',
            'sonata.core.form.type.date_range' => 'getSonata_Core_Form_Type_DateRangeService',
            'sonata.core.form.type.datetime_picker' => 'getSonata_Core_Form_Type_DatetimePickerService',
            'sonata.core.form.type.datetime_range' => 'getSonata_Core_Form_Type_DatetimeRangeService',
            'sonata.core.form.type.equal' => 'getSonata_Core_Form_Type_EqualService',
            'sonata.core.form.type.translatable_choice' => 'getSonata_Core_Form_Type_TranslatableChoiceService',
            'sonata.core.model.adapter.chain' => 'getSonata_Core_Model_Adapter_ChainService',
            'sonata.core.twig.extension.text' => 'getSonata_Core_Twig_Extension_TextService',
            'sonata.core.twig.status_extension' => 'getSonata_Core_Twig_StatusExtensionService',
            'sonata.core.twig.template_extension' => 'getSonata_Core_Twig_TemplateExtensionService',
            'sonata.easy_extends.doctrine.mapper' => 'getSonata_EasyExtends_Doctrine_MapperService',
            'sonata.easy_extends.generator.bundle' => 'getSonata_EasyExtends_Generator_BundleService',
            'sonata.easy_extends.generator.odm' => 'getSonata_EasyExtends_Generator_OdmService',
            'sonata.easy_extends.generator.orm' => 'getSonata_EasyExtends_Generator_OrmService',
            'sonata.easy_extends.generator.phpcr' => 'getSonata_EasyExtends_Generator_PhpcrService',
            'sonata.easy_extends.generator.serializer' => 'getSonata_EasyExtends_Generator_SerializerService',
            'sonata.formatter.block.formatter' => 'getSonata_Formatter_Block_FormatterService',
            'sonata.formatter.form.type.selector' => 'getSonata_Formatter_Form_Type_SelectorService',
            'sonata.formatter.pool' => 'getSonata_Formatter_PoolService',
            'sonata.formatter.text.markdown' => 'getSonata_Formatter_Text_MarkdownService',
            'sonata.formatter.text.raw' => 'getSonata_Formatter_Text_RawService',
            'sonata.formatter.text.text' => 'getSonata_Formatter_Text_TextService',
            'sonata.formatter.text.twigengine' => 'getSonata_Formatter_Text_TwigengineService',
            'sonata.formatter.twig.control_flow' => 'getSonata_Formatter_Twig_ControlFlowService',
            'sonata.formatter.twig.env.markdown' => 'getSonata_Formatter_Twig_Env_MarkdownService',
            'sonata.formatter.twig.env.rawhtml' => 'getSonata_Formatter_Twig_Env_RawhtmlService',
            'sonata.formatter.twig.env.richhtml' => 'getSonata_Formatter_Twig_Env_RichhtmlService',
            'sonata.formatter.twig.env.text' => 'getSonata_Formatter_Twig_Env_TextService',
            'sonata.formatter.twig.gist' => 'getSonata_Formatter_Twig_GistService',
            'sonata.intl.locale_detector.request' => 'getSonata_Intl_LocaleDetector_RequestService',
            'sonata.intl.templating.helper.datetime' => 'getSonata_Intl_Templating_Helper_DatetimeService',
            'sonata.intl.templating.helper.locale' => 'getSonata_Intl_Templating_Helper_LocaleService',
            'sonata.intl.templating.helper.number' => 'getSonata_Intl_Templating_Helper_NumberService',
            'sonata.intl.timezone_detector.chain' => 'getSonata_Intl_TimezoneDetector_ChainService',
            'sonata.intl.timezone_detector.locale' => 'getSonata_Intl_TimezoneDetector_LocaleService',
            'sonata.intl.timezone_detector.user' => 'getSonata_Intl_TimezoneDetector_UserService',
            'sonata.user.admin.group' => 'getSonata_User_Admin_GroupService',
            'sonata.user.admin.user' => 'getSonata_User_Admin_UserService',
            'sonata.user.block.account' => 'getSonata_User_Block_AccountService',
            'sonata.user.block.menu' => 'getSonata_User_Block_MenuService',
            'sonata.user.editable_role_builder' => 'getSonata_User_EditableRoleBuilderService',
            'sonata.user.form.gender_list' => 'getSonata_User_Form_GenderListService',
            'sonata.user.form.type.security_roles' => 'getSonata_User_Form_Type_SecurityRolesService',
            'sonata.user.profile.form' => 'getSonata_User_Profile_FormService',
            'sonata.user.profile.form.handler' => 'getSonata_User_Profile_Form_HandlerService',
            'sonata.user.profile.form.type' => 'getSonata_User_Profile_Form_TypeService',
            'sonata.user.profile.menu_builder' => 'getSonata_User_Profile_MenuBuilderService',
            'sonata.user.twig.global' => 'getSonata_User_Twig_GlobalService',
            'stof_doctrine_extensions.event_listener.blame' => 'getStofDoctrineExtensions_EventListener_BlameService',
            'stof_doctrine_extensions.event_listener.locale' => 'getStofDoctrineExtensions_EventListener_LocaleService',
            'stof_doctrine_extensions.event_listener.logger' => 'getStofDoctrineExtensions_EventListener_LoggerService',
            'stof_doctrine_extensions.listener.blameable' => 'getStofDoctrineExtensions_Listener_BlameableService',
            'stof_doctrine_extensions.listener.loggable' => 'getStofDoctrineExtensions_Listener_LoggableService',
            'stof_doctrine_extensions.listener.translatable' => 'getStofDoctrineExtensions_Listener_TranslatableService',
            'stof_doctrine_extensions.uploadable.manager' => 'getStofDoctrineExtensions_Uploadable_ManagerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'swiftmailer.email_sender.listener' => 'getSwiftmailer_EmailSender_ListenerService',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService',
            'swiftmailer.mailer.default.spool' => 'getSwiftmailer_Mailer_Default_SpoolService',
            'swiftmailer.mailer.default.transport' => 'getSwiftmailer_Mailer_Default_TransportService',
            'swiftmailer.mailer.default.transport.eventdispatcher' => 'getSwiftmailer_Mailer_Default_Transport_EventdispatcherService',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService',
            'templating' => 'getTemplatingService',
            'templating.asset.package_factory' => 'getTemplating_Asset_PackageFactoryService',
            'templating.engine.php' => 'getTemplating_Engine_PhpService',
            'templating.filename_parser' => 'getTemplating_FilenameParserService',
            'templating.globals' => 'getTemplating_GlobalsService',
            'templating.helper.actions' => 'getTemplating_Helper_ActionsService',
            'templating.helper.assets' => 'getTemplating_Helper_AssetsService',
            'templating.helper.code' => 'getTemplating_Helper_CodeService',
            'templating.helper.form' => 'getTemplating_Helper_FormService',
            'templating.helper.logout_url' => 'getTemplating_Helper_LogoutUrlService',
            'templating.helper.request' => 'getTemplating_Helper_RequestService',
            'templating.helper.router' => 'getTemplating_Helper_RouterService',
            'templating.helper.security' => 'getTemplating_Helper_SecurityService',
            'templating.helper.session' => 'getTemplating_Helper_SessionService',
            'templating.helper.slots' => 'getTemplating_Helper_SlotsService',
            'templating.helper.stopwatch' => 'getTemplating_Helper_StopwatchService',
            'templating.helper.translator' => 'getTemplating_Helper_TranslatorService',
            'templating.loader' => 'getTemplating_LoaderService',
            'templating.locator' => 'getTemplating_LocatorService',
            'templating.name_parser' => 'getTemplating_NameParserService',
            'tfox.mpdfport' => 'getTfox_MpdfportService',
            'translation.dumper.csv' => 'getTranslation_Dumper_CsvService',
            'translation.dumper.ini' => 'getTranslation_Dumper_IniService',
            'translation.dumper.json' => 'getTranslation_Dumper_JsonService',
            'translation.dumper.mo' => 'getTranslation_Dumper_MoService',
            'translation.dumper.php' => 'getTranslation_Dumper_PhpService',
            'translation.dumper.po' => 'getTranslation_Dumper_PoService',
            'translation.dumper.qt' => 'getTranslation_Dumper_QtService',
            'translation.dumper.res' => 'getTranslation_Dumper_ResService',
            'translation.dumper.xliff' => 'getTranslation_Dumper_XliffService',
            'translation.dumper.yml' => 'getTranslation_Dumper_YmlService',
            'translation.extractor' => 'getTranslation_ExtractorService',
            'translation.extractor.php' => 'getTranslation_Extractor_PhpService',
            'translation.loader' => 'getTranslation_LoaderService',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService',
            'translation.loader.dat' => 'getTranslation_Loader_DatService',
            'translation.loader.ini' => 'getTranslation_Loader_IniService',
            'translation.loader.json' => 'getTranslation_Loader_JsonService',
            'translation.loader.mo' => 'getTranslation_Loader_MoService',
            'translation.loader.php' => 'getTranslation_Loader_PhpService',
            'translation.loader.po' => 'getTranslation_Loader_PoService',
            'translation.loader.qt' => 'getTranslation_Loader_QtService',
            'translation.loader.res' => 'getTranslation_Loader_ResService',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService',
            'translation.writer' => 'getTranslation_WriterService',
            'translator.default' => 'getTranslator_DefaultService',
            'twig' => 'getTwigService',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService',
            'twig.exception_listener' => 'getTwig_ExceptionListenerService',
            'twig.extension.fm_tinymce_init' => 'getTwig_Extension_FmTinymceInitService',
            'twig.loader' => 'getTwig_LoaderService',
            'twig.translation.extractor' => 'getTwig_Translation_ExtractorService',
            'twig_extension.intl' => 'getTwigExtension_IntlService',
            'uri_signer' => 'getUriSignerService',
            'validator' => 'getValidatorService',
            'validator.builder' => 'getValidator_BuilderService',
            'validator.email' => 'getValidator_EmailService',
            'validator.expression' => 'getValidator_ExpressionService',
            'validator.validator_factory' => 'getValidator_ValidatorFactoryService',
        );
        $this->aliases = array(
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'fos_user.change_password.form.handler' => 'fos_user.change_password.form.handler.default',
            'fos_user.util.username_canonicalizer' => 'fos_user.util.email_canonicalizer',
            'ladybug' => 'data_collector.ladybug_data_collector',
            'mailer' => 'swiftmailer.mailer.default',
            'session.storage' => 'session.storage.native',
            'sonata.block.cache.handler' => 'sonata.block.cache.handler.default',
            'sonata.block.context_manager' => 'sonata.block.context_manager.default',
            'sonata.block.renderer' => 'sonata.block.renderer.default',
            'sonata.intl.locale_detector' => 'sonata.intl.locale_detector.request',
            'sonata.intl.timezone_detector' => 'sonata.intl.timezone_detector.chain',
            'sonata.user.authentication.form' => 'fos_user.profile.form',
            'sonata.user.authentication.form_handler' => 'fos_user.profile.form.handler',
            'swiftmailer.mailer' => 'swiftmailer.mailer.default',
            'swiftmailer.spool' => 'swiftmailer.mailer.default.spool',
            'swiftmailer.transport' => 'swiftmailer.mailer.default.transport',
            'swiftmailer.transport.real' => 'swiftmailer.mailer.default.transport.real',
            'translator' => 'translator.default',
        );
    }
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\FileCacheReader(new \Doctrine\Common\Annotations\AnnotationReader(), '/home/olikids/public_html.sam/app/cache/prod/annotations', false);
    }
    public function getApplactionUserMailerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['applaction_user_mailer'] = new ApplicationSonataUserBundleMailerMailer_0000000001a1ebe800007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getApplactionUserMailerService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Application\Sonata\UserBundle\Mailer\Mailer($this->get('swiftmailer.mailer.default'), $this->get('router'), $this->get('templating'), $this->get('translator.default'), array('fromEmail' => 'saintrain@mail.ru'));
    }
    protected function getApplicationKnpPaginatorLogicService()
    {
        return $this->services['application_knp_paginator_logic'] = new \Application\Knp\PaginatorBundle\Logic\PaginatorLogic($this);
    }
    protected function getApplicationSonataAdminDateRangeFormService()
    {
        return $this->services['application_sonata_admin_date_range_form'] = new \Application\Sonata\AdminBundle\Admin\Form\Type\DateRangeType($this->get('translator.default'));
    }
    protected function getApplicationSonataAdminExtraBlocksLogicService()
    {
        return $this->services['application_sonata_admin_extra_blocks_logic'] = new \Application\Sonata\AdminBundle\Logic\ExtraBlocksLogic('www.olikids-sam.ru.vm', 'saintrain@mail.ru', $this->get('doctrine'), $this->get('security.context'), $this->get('templating'), $this->get('swiftmailer.mailer.default'));
    }
    protected function getApplicationSonataUser_Listener_LoginService()
    {
        return $this->services['application_sonata_user.listener.login'] = new \Application\Sonata\UserBundle\EventListener\SecurityListener($this->get('router'), $this->get('security.context'), $this->get('event_dispatcher'), $this->get('session'));
    }
    protected function getApplicationSonataUser_Listener_RedirectService()
    {
        return $this->services['application_sonata_user.listener.redirect'] = new \Application\Sonata\UserBundle\EventListener\LoggedInUserListener($this->get('router'), $this->get('security.context'), $this->get('session'), $this);
    }
    protected function getApplicationUser_Profile_Form_TypeService()
    {
        return $this->services['application_user.profile.form.type'] = new \Application\Sonata\UserBundle\Form\Type\ProfileFormType('Application\\Sonata\\UserBundle\\Entity\\User', $this->get('security.context'));
    }
    protected function getApplicationUser_Registration_Form_TypeService()
    {
        return $this->services['application_user.registration.form.type'] = new \Application\Sonata\UserBundle\Form\Type\RegistrationFormType('Application\\Sonata\\UserBundle\\Entity\\User');
    }
    protected function getApplicationUser_Validator_Unique_YourValidatorNameService()
    {
        return $this->services['application_user.validator.unique.your_validator_name'] = new \Application\Sonata\UserBundle\Validator\Constraints\SameDataValidator($this->get('security.context'), $this->get('security.encoder_factory'));
    }
    protected function getApplicationUserAuthLogicService()
    {
        return $this->services['application_user_auth_logic'] = new \Application\Sonata\UserBundle\Logic\AuthenticationLogic($this->get('router'), $this->get('translator.default'), $this->get('security.context'), $this->get('session'), $this->get('application_user_logic'), $this->get('doctrine.orm.default_entity_manager'), array('secret' => 'b4e7a4ba6de9c87f227a93857e26b0856d0f4af1', 'fos_user.firewall_name' => 'main', 'domain_ru' => 'www.olikids-sam.ru.vm'));
    }
    protected function getApplicationUserContragentAdminService()
    {
        $instance = new \Application\Sonata\UserBundle\Admin\ContragentAdmin('application_user_contragent_admin', 'Application\\Sonata\\UserBundle\\Entity\\CommonContragent', 'SonataAdminBundle:CRUD');
        $instance->setSubClasses(array('LegalContragent' => 'Application\\Sonata\\UserBundle\\Entity\\LegalContragent', 'IndiContragent' => 'Application\\Sonata\\UserBundle\\Entity\\IndiContragent'));
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Контрагенты');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getApplicationUserContragentAdminEmailFormService()
    {
        return $this->services['application_user_contragent_admin_email_form'] = new \Application\Sonata\UserBundle\Admin\Form\Type\EmailType($this->get('translator.default'));
    }
    protected function getApplicationUserContragentAdminKppFormService()
    {
        return $this->services['application_user_contragent_admin_kpp_form'] = new \Application\Sonata\UserBundle\Admin\Form\Type\KppType($this->get('translator.default'));
    }
    protected function getApplicationUserContragentAdminOnecFormService()
    {
        return $this->services['application_user_contragent_admin_onec_form'] = new \Application\Sonata\UserBundle\Admin\Form\Type\OnecType($this->get('translator.default'));
    }
    protected function getApplicationUserContragentAdminSubclassFormService()
    {
        return $this->services['application_user_contragent_admin_subclass_form'] = new \Application\Sonata\UserBundle\Admin\Form\Type\SubClassType($this->get('translator.default'));
    }
    protected function getApplicationUserContragentBalanceHistoryService()
    {
        return $this->services['application_user_contragent_balance_history'] = new \Application\Sonata\UserBundle\Admin\Form\Type\BalanceHistoryType($this->get('core_payment_logic'));
    }
    protected function getApplicationUserContragentIndiFormTypeService()
    {
        return $this->services['application_user_contragent_indi_form_type'] = new \Application\Sonata\UserBundle\Form\Type\IndiFormType($this->get('translator.default'));
    }
    protected function getApplicationUserContragentLegalService()
    {
        return $this->services['application_user_contragent_legal'] = new \Application\Sonata\UserBundle\Form\Type\LegalFormType($this->get('translator.default'));
    }
    protected function getApplicationUserIndiContactAdminService()
    {
        $instance = new \Application\Sonata\UserBundle\Admin\IndiContactAdmin('application_user_indi_contact_admin', 'Application\\Sonata\\UserBundle\\Entity\\IndiContact', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Адресаты физ-e');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getApplicationUserIndiContactFormTypeService()
    {
        return $this->services['application_user_indi_contact_form_type'] = new \Application\Sonata\UserBundle\Form\Type\IndiContactFormType();
    }
    protected function getApplicationUserLegalContactAdminService()
    {
        $instance = new \Application\Sonata\UserBundle\Admin\LegalContactAdmin('application_user_legal_contact_admin', 'Application\\Sonata\\UserBundle\\Entity\\LegalContact', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Адресаты юр-e');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getApplicationUserLegalContactFormTypeService()
    {
        return $this->services['application_user_legal_contact_form_type'] = new \Application\Sonata\UserBundle\Form\Type\LegalContactFormType();
    }
    protected function getApplicationUserLogicService()
    {
        return $this->services['application_user_logic'] = new \Application\Sonata\UserBundle\Logic\UserLogic($this->get('doctrine.orm.default_entity_manager'), $this);
    }
    protected function getApplicationUserNotificationTwigExtensionService()
    {
        return $this->services['application_user_notification_twig_extension'] = new \Application\Sonata\UserBundle\Twig\Extension\NotificationExtension($this->get('doctrine'), $this->get('security.context'), $this->get('session'));
    }
    protected function getAssetic_AssetManagerService()
    {
        $a = $this->get('templating.loader');
        $this->services['assetic.asset_manager'] = $instance = new \Assetic\Factory\LazyAssetManager($this->get('assetic.asset_factory'), array('twig' => new \Assetic\Factory\Loader\CachedFormulaLoader(new \Assetic\Extension\Twig\TwigFormulaLoader($this->get('twig'), $this->get('monolog.logger.assetic', ContainerInterface::NULL_ON_INVALID_REFERENCE)), new \Assetic\Cache\ConfigCache('/home/olikids/public_html.sam/app/cache/prod/assetic/config'), false)));
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreTroubleTicketBundle', '/home/olikids/public_html.sam/app/Resources/CoreTroubleTicketBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreTroubleTicketBundle', '/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreFileBundle', '/home/olikids/public_html.sam/app/Resources/CoreFileBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreFileBundle', '/home/olikids/public_html.sam/src/Core/FileBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreCommonBundle', '/home/olikids/public_html.sam/app/Resources/CoreCommonBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreCommonBundle', '/home/olikids/public_html.sam/src/Core/CommonBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreProductBundle', '/home/olikids/public_html.sam/app/Resources/CoreProductBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreProductBundle', '/home/olikids/public_html.sam/src/Core/ProductBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreOrderBundle', '/home/olikids/public_html.sam/app/Resources/CoreOrderBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'CoreOrderBundle', '/home/olikids/public_html.sam/src/Core/OrderBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'ApplicationSonataUserBundle', '/home/olikids/public_html.sam/app/Resources/ApplicationSonataUserBundle/views', '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'ApplicationSonataUserBundle', '/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/views', '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, '', '/home/olikids/public_html.sam/app/Resources/views', '/\\.[^.]+\\.twig$/'), 'twig');
        return $instance;
    }
    protected function getAssetic_Filter_CssrewriteService()
    {
        return $this->services['assetic.filter.cssrewrite'] = new \Assetic\Filter\CssRewriteFilter();
    }
    protected function getAssetic_Filter_YuiCssService()
    {
        $this->services['assetic.filter.yui_css'] = $instance = new \Assetic\Filter\Yui\CssCompressorFilter('/home/olikids/public_html.sam/app/Resources/java/yuicompressor.jar', '/usr/bin/java');
        $instance->setCharset('UTF-8');
        $instance->setTimeout(NULL);
        $instance->setStackSize(NULL);
        $instance->setLineBreak(NULL);
        return $instance;
    }
    protected function getAssetic_Filter_YuiJsService()
    {
        $this->services['assetic.filter.yui_js'] = $instance = new \Assetic\Filter\Yui\JsCompressorFilter('/home/olikids/public_html.sam/app/Resources/java/yuicompressor.jar', '/usr/bin/java');
        $instance->setCharset('UTF-8');
        $instance->setTimeout(NULL);
        $instance->setStackSize(NULL);
        $instance->setNomunge(NULL);
        $instance->setPreserveSemi(NULL);
        $instance->setDisableOptimizations(NULL);
        $instance->setLineBreak(NULL);
        return $instance;
    }
    protected function getAssetic_FilterManagerService()
    {
        return $this->services['assetic.filter_manager'] = new \Symfony\Bundle\AsseticBundle\FilterManager($this, array('cssrewrite' => 'assetic.filter.cssrewrite', 'yui_css' => 'assetic.filter.yui_css', 'yui_js' => 'assetic.filter.yui_js'));
    }
    public function getBasicDataLogicService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['basic_data_logic'] = new CoreOfficeWorkTimeBundleLogicBasicDataLogic_0000000001a1f9d200007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getBasicDataLogicService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\OfficeWorkTimeBundle\Logic\BasicDataLogic(array('uri' => 'http://basicdata.ru/api/json/calend/', 'timezone' => 'Europe/Moscow', 'options' => array('basic_data' => array('uri' => 'http://basicdata.ru/api/json/calend/'))), $this->get('translator.default'), $this->get('request_stack'));
    }
    protected function getBerylliumCacheService()
    {
        $this->services['beryllium_cache'] = $instance = new \Beryllium\CacheBundle\Cache();
        $instance->setContainer($this);
        $instance->setClient($this->get('beryllium_cache.client'));
        $instance->setTtl(300);
        return $instance;
    }
    protected function getBerylliumCache_ClientService()
    {
        $this->services['beryllium_cache.client'] = $instance = new \Beryllium\CacheBundle\Client\MemcacheClient($this->get('beryllium_cache.client.memcache'));
        $instance->addServers(array('127.0.0.1' => 11211));
        $instance->setPrefix('');
        return $instance;
    }
    protected function getBerylliumCache_Client_MemcacheService()
    {
        return $this->services['beryllium_cache.client.memcache'] = new \Memcache();
    }
    protected function getCacheClearerService()
    {
        return $this->services['cache_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(array());
    }
    protected function getCacheWarmerService()
    {
        $a = $this->get('kernel');
        $b = $this->get('templating.filename_parser');
        $c = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplateFinder($a, $b, '/home/olikids/public_html.sam/app/Resources');
        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplatePathsCacheWarmer($c, $this->get('templating.locator')), 1 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetManagerCacheWarmer($this), 2 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer($this->get('router')), 3 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheCacheWarmer($this, $c), 4 => new \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer($this->get('doctrine')), 5 => new \JMS\DiExtraBundle\HttpKernel\ControllerInjectorsWarmer($a, $this->get('jms_di_extra.controller_resolver'), array())));
    }
    protected function getCaptcha_TypeService()
    {
        return $this->services['captcha.type'] = new \Gregwar\CaptchaBundle\Type\CaptchaType($this->get('session'), $this->get('gregwar_captcha.generator'), $this->get('translator.default'), array('as_url' => true, 'reload' => true, 'width' => 99, 'height' => 40, 'length' => 5, 'background_color' => array(0 => 255, 1 => 255, 2 => 255), 'interpolation' => NULL, 'distortion' => NULL, 'quality' => 70, 'gc_freq' => 10, 'max_front_lines' => 0, 'max_behind_lines' => 0, 'font' => '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/DependencyInjection/../Generator/Font/captcha.ttf', 'keep_value' => false, 'charset' => 'abcdefhjkmnprstuvwxyz23456789', 'as_file' => false, 'image_folder' => 'captcha', 'web_path' => '/home/olikids/public_html.sam/app/../web', 'expiration' => 60, 'invalid_message' => 'Bad code value', 'bypass_code' => NULL, 'whitelist_key' => 'captcha_whitelist_key', 'humanity' => 0, 'text_color' => array(), 'disabled' => false));
    }
    protected function getCheckedModification_Twig_ExtensionService()
    {
        return $this->services['checked_modification.twig.extension'] = new \Core\ProductBundle\Twig\CheckedModificationRowExtension($this);
    }
    protected function getCheckedUnion_Twig_ExtensionService()
    {
        return $this->services['checked_union.twig.extension'] = new \Core\UnionBundle\Twig\CheckedUnionRowExtension($this);
    }
    protected function getCmfTreeBrowser_RouteLoaderService()
    {
        return $this->services['cmf_tree_browser.route_loader'] = new \Symfony\Cmf\Bundle\TreeBrowserBundle\Route\TreeControllerRoutesLoader(array());
    }
    protected function getCoreAdminFormTypeColorService()
    {
        return $this->services['core_admin_form_type_color'] = new \Core\ColorBundle\Admin\Form\Type\ColorType($this->get('core_color_logic'), $this->get('doctrine'));
    }
    protected function getCoreAdminTroubleTicketService()
    {
        $instance = new \Core\TroubleTicketBundle\Admin\TroubleTicketAdmin('core_admin_trouble_ticket', 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket', 'CoreTroubleTicketBundle:Admin\\TroubleTicketAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Траблтикеты');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreAdminTroubleTicketFileListenerService()
    {
        return $this->services['core_admin_trouble_ticket_file_listener'] = new \Core\TroubleTicketBundle\EventListener\FileListener($this->get('doctrine.orm.default_entity_manager'), $this->get('security.context'), $this->get('session'));
    }
    protected function getCoreAdminTroubleTicketFullTextFormService()
    {
        return $this->services['core_admin_trouble_ticket_full_text_form'] = new \Core\TroubleTicketBundle\Admin\Form\Type\FullTextType();
    }
    protected function getCoreAdminTroubleTicketLogService()
    {
        $instance = new \Core\TroubleTicketBundle\Admin\LogAdmin('core_admin_trouble_ticket_log', 'Core\\TroubleTicketBundle\\Entity\\Log', 'CoreTroubleTicketBundle:Admin\\LogAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Логи');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreAdminTroubleTicketMessageService()
    {
        $instance = new \Core\TroubleTicketBundle\Admin\MessageAdmin('core_admin_trouble_ticket_message', 'Core\\TroubleTicketBundle\\Entity\\Message', 'CoreTroubleTicketBundle:Admin\\MessageAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Ответы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreAdminTroubleTicketMessageFormService()
    {
        return $this->services['core_admin_trouble_ticket_message_form'] = new \Core\TroubleTicketBundle\Admin\Form\Type\MessageType($this->get('security.context'));
    }
    protected function getCoreAdminTroubleTicketPriorityService()
    {
        $instance = new \Core\TroubleTicketBundle\Admin\PriorityAdmin('core_admin_trouble_ticket_priority', 'Core\\TroubleTicketBundle\\Entity\\Priority', 'CoreTroubleTicketBundle:Admin\\PriorityAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Приоритеты траблтикетов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreAdminTroubleTicketStatusService()
    {
        $instance = new \Core\TroubleTicketBundle\Admin\StatusAdmin('core_admin_trouble_ticket_status', 'Core\\TroubleTicketBundle\\Entity\\Status', 'CoreTroubleTicketBundle:Admin\\StatusAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Статусы траблтикетов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreAuditLogicService()
    {
        return $this->services['core_audit_logic'] = new \Core\StatisticsBundle\Logic\AuditLogic('Europe/Moscow', $this->get('doctrine'), $this->get('simplethings_entityaudit.reader'), $this->get('simplethings_entityaudit.config'));
    }
    protected function getCoreCategorySubscriberService()
    {
        return $this->services['core_category_subscriber'] = new \Core\CategoryBundle\EventListener\CategorySubscriber($this);
    }
    protected function getCoreCategoryVirtualProductAdminService()
    {
        $instance = new \Core\CategoryBundle\Admin\ProductVirtualCategoryAdmin('core_category_virtual_product_admin', 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Виртульные категории');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreCityAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\CityAdmin('core_city_admin', 'Core\\DirectoryBundle\\Entity\\City', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Города');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreColorAdminService()
    {
        $instance = new \Core\ColorBundle\Admin\ColorAdmin('core_color_admin', 'Core\\ColorBundle\\Entity\\Color', 'CoreColorBundle:Admin\\ColorAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Цвета');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreColorColorpickerService()
    {
        return $this->services['core_color_colorpicker'] = new \Core\ColorBundle\Form\Type\ColorpickerType($this->get('core_color_logic'), $this->get('doctrine'));
    }
    protected function getCoreColorLogicService()
    {
        return $this->services['core_color_logic'] = new \Core\ColorBundle\Logic\ColorLogic($this->get('translator.default'), $this->get('doctrine'), $this->get('session'));
    }
    protected function getCoreColorPalleteAdminService()
    {
        $instance = new \Core\ColorBundle\Admin\ColorPaletteAdmin('core_color_pallete_admin', 'Core\\ColorBundle\\Entity\\ColorPalette', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreCommonAjaxEntityLogicService()
    {
        return $this->services['core_common_ajax_entity_logic'] = new \Core\CommonBundle\Logic\AjaxEntityLogic($this->get('doctrine'), $this->get('core_file_logic'), $this->get('core_common_encoding'), $this->get('application_knp_paginator_logic'), array('default_timezone' => 'Europe/Moscow'));
    }
    protected function getCoreCommonAjaxEntityTypeService()
    {
        return $this->services['core_common_ajax_entity_type'] = new \Core\CommonBundle\Form\Type\AjaxEntityType($this->get('doctrine'), $this->get('core_common_ajax_entity_logic'), $this->get('templating'), $this->get('core_common_encoding'), $this);
    }
    protected function getCoreCommonDeclineOfNumberTwigExtensionService()
    {
        return $this->services['core_common_decline_of_number_twig_extension'] = new \Core\CommonBundle\Twig\Extension\DeclineOfNumberExtension();
    }
    protected function getCoreCommonEncodingService()
    {
        return $this->services['core_common_encoding'] = new \Core\CommonBundle\Logic\EncodingLogic('b4e7a4ba6de9c87f227a93857e26b0856d0f4af1');
    }
    protected function getCoreCommonEvalTwigExtensionService()
    {
        return $this->services['core_common_eval_twig_extension'] = new \Core\CommonBundle\Twig\Extension\EvalExtension($this->get('twig'));
    }
    protected function getCoreCommonFastEditTwigExtensionService()
    {
        return $this->services['core_common_fast_edit_twig_extension'] = new \Core\CommonBundle\Twig\Extension\FastEditExtension($this);
    }
    protected function getCoreCommonFragmentsService()
    {
        return $this->services['core_common_fragments'] = new \Core\CommonBundle\Logic\Fragments($this);
    }
    protected function getCoreCommonHiddenEntityFormTypeService()
    {
        return $this->services['core_common_hidden_entity_form_type'] = new \Core\CommonBundle\Form\Type\HiddenEntityType($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreCommonMoneyTwigExtensionService()
    {
        return $this->services['core_common_money_twig_extension'] = new \Core\CommonBundle\Twig\Extension\MoneyExtension('RUB', 'ru', $this->get('core_common_decline_of_number_twig_extension'));
    }
    protected function getCoreCommonProcessService()
    {
        return $this->services['core_common_process'] = new \Core\CommonBundle\Logic\ProcessLogic($this->get('kernel'));
    }
    protected function getCoreCommonSitemapListenerService()
    {
        return $this->services['core_common_sitemap_listener'] = new \Core\CommonBundle\EventListener\SitemapListener($this);
    }
    protected function getCoreCommonTreeSelectFormTypeService()
    {
        return $this->services['core_common_tree_select_form_type'] = new \Core\CommonBundle\Form\Type\TreeSelectType($this->get('doctrine.orm.default_entity_manager'), $this->get('translator.default'));
    }
    protected function getCoreCommonTwigExtensionService()
    {
        return $this->services['core_common_twig_extension'] = new \Core\CommonBundle\Twig\Extension\CommonExtension($this->get('doctrine'), $this->get('router'));
    }
    protected function getCoreCommonTwigTimeAgoService()
    {
        return $this->services['core_common_twig_time_ago'] = new \Core\CommonBundle\Twig\Extension\TimeAgoExtension($this->get('translator.default'));
    }
    protected function getCoreCompositeProductLogicService()
    {
        return $this->services['core_composite_product_logic'] = new \Core\ProductBundle\Logic\CompositeProductLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreConfigAdminService()
    {
        $instance = new \Core\ConfigBundle\Admin\ConfigAdmin('core_config_admin', 'Core\\ConfigBundle\\Entity\\Config', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Настройки');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreConfigDataFormTypeService()
    {
        return $this->services['core_config_data_form_type'] = new \Core\ConfigBundle\Admin\Form\Type\ConfigDataType($this->get('core_config_logic'));
    }
    protected function getCoreConfigGroupAdminService()
    {
        $instance = new \Core\ConfigBundle\Admin\GroupAdmin('core_config_group_admin', 'Core\\ConfigBundle\\Entity\\Group', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Группы для настроек');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreConfigLogicService()
    {
        return $this->services['core_config_logic'] = new \Core\ConfigBundle\Logic\ConfigLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreCountryAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\CountryAdmin('core_country_admin', 'Core\\DirectoryBundle\\Entity\\Country', 'CoreDirectoryBundle:Admin\\CountryAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Страны');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreCurrencyAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\CurrencyAdmin('core_currency_admin', 'Core\\DirectoryBundle\\Entity\\Currency', 'CoreDirectoryBundle:Admin\\CurrencyAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Валюты');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDashboardStatisticsLogicService()
    {
        return $this->services['core_dashboard_statistics_logic'] = new \Core\StatisticsBundle\Logic\DashboardStatisticsLogic('Europe/Moscow', $this->get('doctrine.orm.default_entity_manager'), $this->get('session'), $this->get('simplethings_entityaudit.reader'), $this->get('liip_monitor.runner'));
    }
    protected function getCoreDeliveryService()
    {
        $this->services['core_delivery'] = $instance = new \Core\DeliveryBundle\Logic\DeliveryContext($this->get('session'), $this->get('doctrine.orm.default_entity_manager'), $this->get('core_order_logic'), 'saintrain@mail.ru', '/home/olikids/public_html.sam/app', $this->get('core_order_mailer_logic'));
        $instance->create(array('cdek' => $this->get('core_delivery.cdek'), 'dpd' => $this->get('core_delivery.dpd'), 'pek' => $this->get('core_delivery.pek'), 'dellin' => $this->get('core_delivery.dellin'), 'post_ru' => $this->get('core_delivery.postru'), 'ems' => $this->get('core_delivery.ems'), 'energy' => $this->get('core_delivery.energy'), 'jel_dor' => $this->get('core_delivery.jeldor')));
        return $instance;
    }
    public function getCoreDelivery_CdekService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.cdek'] = new CoreDeliveryBundleLogicCdek_0000000001a1e85500007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_CdekService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\Cdek(array('operation' => array('getCities' => array('uri' => 'http://gw.edostavka.ru:11443/pvzlist.php'), 'getAffiliates' => array('uri' => 'http://gw.edostavka.ru:11443/pvzlist.php'), 'calculate' => array('uri' => 'http://api.edostavka.ru/calculator/calculate_price_by_json_request.php'), 'trackPackage' => array('uri' => 'http://gw.edostavka.ru:11443/status_report_h.php'), 'getInvoice' => array('uri' => 'http://gw.edostavka.ru:11443/orders_print.php'), 'createOrder' => array('uri' => 'http://gw.edostavka.ru:11443/new_orders.php'), 'cancelOrder' => array('uri' => 'http://gw.edostavka.ru:11443/delete_orders.php')), 'internalCodes' => array('express_light_door_door' => array('id' => '1', 'name' => 'Экспресс лайт дверь-дверь', 'isActive' => true, 'modeId' => 1), 'express_light_terminal_terminal' => array('id' => '10', 'name' => 'Экспресс лайт склад-склад', 'isActive' => true, 'modeId' => 4), 'express_light_terminal_door' => array('id' => '11', 'name' => 'Экспресс лайт склад-дверь', 'isActive' => true, 'modeId' => 3), 'express_light_door_terminal' => array('id' => '12', 'name' => 'Экспресс лайт дверь-склад', 'isActive' => true, 'modeId' => 2), 'package_terminal_terminal' => array('id' => '136', 'name' => 'Посылка склад-склад', 'isActive' => true, 'modeId' => 4), 'package_terminal_door' => array('id' => '137', 'name' => 'Посылка склад-дверь', 'isActive' => true, 'modeId' => 3), 'package_door_terminal' => array('id' => '138', 'name' => 'Посылка дверь-склад', 'isActive' => true, 'modeId' => 2), 'econom_express_teminal_terminal' => array('id' => '5', 'name' => 'Экономичный экспресс склад-склад', 'isActive' => true, 'modeId' => 4), 'magistral_express_teminal_terminal' => array('id' => '62', 'name' => 'Магистральный экспресс склад-склад', 'isActive' => true, 'modeId' => 4))));
    }
    public function getCoreDelivery_DellinService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.dellin'] = new CoreDeliveryBundleLogicDellin_0000000001a1e85000007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_DellinService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\Dellin(array('operation' => array('getCities' => array('uri' => 'http://public.services.dellin.ru/calculatorService2/index.html?request=xmlForm'), 'calculate' => array('uri' => 'http://public.services.dellin.ru/calculatorService2/index.html?request=xmlResult'), 'trackPackage' => array('uri' => 'http://public.services.dellin.ru/tracker/XML/'))));
    }
    public function getCoreDelivery_DpdService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.dpd'] = new CoreDeliveryBundleLogicDpd_0000000001a1e85200007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_DpdService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\Dpd(array('operation' => array('getCities' => array('uri' => 'http://ws.dpd.ru/services/geography?wsdl', 'method' => 'getCitiesCashPay'), 'getAffiliates' => array('uri' => 'http://ws.dpd.ru/services/geography?wsdl', 'method' => 'getTerminalsSelfDelivery2'), 'calculate' => array('uri' => 'http://ws.dpd.ru/services/calculator2?wsdl', 'method' => 'getServiceCost'), 'trackPackage' => array('uri' => 'http://ws.dpd.ru/services/tracing1-1?wsdl', 'method' => 'getStatesByDPDOrder'), 'getSticker' => array('uri' => 'http://ws.dpd.ru/services/label-print?wsdl', 'method' => 'createLabelFile'), 'getInvoice' => array('uri' => 'http://wstest.dpd.ru/services/order2?wsdl', 'method' => 'getInvoiceFile'), 'createOrder' => array('uri' => 'http://wstest.dpd.ru/services/order2?wsdl', 'method' => 'createOrder'), 'cancelOrder' => array('uri' => 'http://wstest.dpd.ru/services/order2?wsdl', 'method' => 'cancelOrder'), 'getOrderStatus' => array('uri' => 'http://wstest.dpd.ru/services/order2?wsdl', 'method' => 'getOrderStatus')), 'internalCodes' => array('dpd_ten' => array('id' => 'TEN', 'name' => 'DPD 10:00', 'isActive' => false), 'dpd_dpt' => array('id' => 'DPT', 'name' => 'DPD 13:00', 'isActive' => false), 'dpd_bzp' => array('id' => 'BZP', 'name' => 'DPD 18:00', 'isActive' => false), 'dpd_express' => array('id' => 'CUR', 'name' => 'DPD CLASSIC domestic', 'isActive' => true), 'dpd_economy' => array('id' => 'ECN', 'name' => 'DPD ECONOMY', 'isActive' => true), 'dpd_consumer' => array('id' => 'CSM', 'name' => 'DPD Consumer', 'isActive' => true), 'dpd_classic_parcel' => array('id' => 'PCL', 'name' => 'DPD CLASSIC Parcel', 'isActive' => true))));
    }
    public function getCoreDelivery_EmsService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.ems'] = new CoreDeliveryBundleLogicEms_0000000001a1e85e00007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_EmsService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\Ems(array('operation' => array('getCities' => array('uri' => 'http://emspost.ru/api/rest/?method=ems.get.locations'), 'calculate' => array('uri' => 'http://emspost.ru/api/rest/?method=ems.calculate'))));
    }
    public function getCoreDelivery_EnergyService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.energy'] = new CoreDeliveryBundleLogicEnergy_0000000001a1e85c00007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_EnergyService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\Energy(array('operation' => array('getCities' => array('uri' => 'http://api.nrg-tk.ru/api/rest/?method=nrg.get.locations'), 'calculate' => array('uri' => 'http://api.nrg-tk.ru/api/rest/?method=nrg.calculate'), 'trackPackage' => array('uri' => 'http://api.nrg-tk.ru/api/rest/?method=nrg.get_sending_state'))));
    }
    protected function getCoreDelivery_InternalCodesValidatorService()
    {
        return $this->services['core_delivery.internal_codes_validator'] = new \Core\DeliveryBundle\Validator\Constraints\InternalCodeValidator(array('dpd' => array('dpd_ten' => array('id' => 'TEN', 'name' => 'DPD 10:00', 'isActive' => false), 'dpd_dpt' => array('id' => 'DPT', 'name' => 'DPD 13:00', 'isActive' => false), 'dpd_bzp' => array('id' => 'BZP', 'name' => 'DPD 18:00', 'isActive' => false), 'dpd_express' => array('id' => 'CUR', 'name' => 'DPD CLASSIC domestic', 'isActive' => true), 'dpd_economy' => array('id' => 'ECN', 'name' => 'DPD ECONOMY', 'isActive' => true), 'dpd_consumer' => array('id' => 'CSM', 'name' => 'DPD Consumer', 'isActive' => true), 'dpd_classic_parcel' => array('id' => 'PCL', 'name' => 'DPD CLASSIC Parcel', 'isActive' => true)), 'cdek' => array('express_light_door_door' => array('id' => '1', 'name' => 'Экспресс лайт дверь-дверь', 'isActive' => true, 'modeId' => 1), 'express_light_terminal_terminal' => array('id' => '10', 'name' => 'Экспресс лайт склад-склад', 'isActive' => true, 'modeId' => 4), 'express_light_terminal_door' => array('id' => '11', 'name' => 'Экспресс лайт склад-дверь', 'isActive' => true, 'modeId' => 3), 'express_light_door_terminal' => array('id' => '12', 'name' => 'Экспресс лайт дверь-склад', 'isActive' => true, 'modeId' => 2), 'package_terminal_terminal' => array('id' => '136', 'name' => 'Посылка склад-склад', 'isActive' => true, 'modeId' => 4), 'package_terminal_door' => array('id' => '137', 'name' => 'Посылка склад-дверь', 'isActive' => true, 'modeId' => 3), 'package_door_terminal' => array('id' => '138', 'name' => 'Посылка дверь-склад', 'isActive' => true, 'modeId' => 2), 'econom_express_teminal_terminal' => array('id' => '5', 'name' => 'Экономичный экспресс склад-склад', 'isActive' => true, 'modeId' => 4), 'magistral_express_teminal_terminal' => array('id' => '62', 'name' => 'Магистральный экспресс склад-склад', 'isActive' => true, 'modeId' => 4))));
    }
    public function getCoreDelivery_JeldorService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.jeldor'] = new CoreDeliveryBundleLogicJelDor_0000000001a1e85f00007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_JeldorService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\JelDor(array('operation' => array('getCities' => array('uri' => 'http://www.jde.ru/branch'), 'calculate' => array('uri' => 'http://www.jde.ru/form/calc/simple'), 'trackPackage' => array('uri' => 'http://cabinet.jde.ru/'))));
    }
    public function getCoreDelivery_PekService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.pek'] = new CoreDeliveryBundleLogicPek_0000000001a1e85300007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_PekService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\Pek(array('operation' => array('getCities' => array('uri' => 'http://pecom.ru/ru/calc/towns.php', 'api' => false), 'calculate' => array('uri' => 'http://pecom.ru/bitrix/components/pecom/calc/ajax.php', 'api' => false), 'trackPackage' => array('uri' => 'https://kabinet.pecom.ru/api/v1/cargos/basicstatus/', 'api' => true))));
    }
    public function getCoreDelivery_PostruService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['core_delivery.postru'] = new CoreDeliveryBundleLogicPostRu_0000000001a1e85100007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getCoreDelivery_PostruService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\DeliveryBundle\Logic\PostRu(array('operation' => array('getCities' => array('uri' => 'http://pecom.ru/ru/calc/towns.php', 'soap' => false, 'method' => false), 'calculate' => array('uri' => 'http://api.postcalc.ru/', 'soap' => false, 'method' => false), 'trackPackage' => array('uri' => 'http://voh.russianpost.ru:8080/niips-operationhistory-web/OperationHistory?wsdl', 'soap' => true, 'method' => 'GetOperationHistory'))));
    }
    protected function getCoreDeliveryAdressAdminService()
    {
        $instance = new \Core\DeliveryBundle\Admin\AddressAdmin('core_delivery_adress_admin', 'Core\\DeliveryBundle\\Entity\\Address', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Пункты выдачи');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDeliveryCompanyAdminService()
    {
        $instance = new \Core\DeliveryBundle\Admin\CompanyAdmin('core_delivery_company_admin', 'Core\\DeliveryBundle\\Entity\\Company', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Компании');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDeliveryMailerService()
    {
        return $this->services['core_delivery_mailer'] = new \Core\DeliveryBundle\Logic\Mailer($this->get('swiftmailer.mailer.default'), $this->get('router'), $this->get('templating'), $this->get('translator.default'), array('fromEmail' => 'saintrain@mail.ru'));
    }
    protected function getCoreDeliveryServicesAdminService()
    {
        $instance = new \Core\DeliveryBundle\Admin\ServiceAdmin('core_delivery_services_admin', 'Core\\DeliveryBundle\\Entity\\Service', 'CoreDeliveryBundle:Admin\\ServiceAdmin');
        $instance->setSubClasses(array('Service' => 'Core\\DeliveryBundle\\Entity\\Service', 'ServiceWithAddress' => 'Core\\DeliveryBundle\\Entity\\ServiceWithAddress', 'ServiceInCity' => 'Core\\DeliveryBundle\\Entity\\ServiceInCity'));
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Способы доставки');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDeliveryServicesTypeAdminService()
    {
        $instance = new \Core\DeliveryBundle\Admin\ServiceTypeAdmin('core_delivery_services_type_admin', 'Core\\DeliveryBundle\\Entity\\ServiceType', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Типы доставок');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDirectoryFilterCapitalsTypeService()
    {
        return $this->services['core_directory_filter_capitals_type'] = new \Core\DirectoryBundle\Admin\Form\Type\CapitalsType($this->get('translator.default'));
    }
    protected function getCoreDirectoryFilterNameTypeService()
    {
        return $this->services['core_directory_filter_name_type'] = new \Core\DirectoryBundle\Admin\Form\Type\FilterNameType($this->get('translator.default'));
    }
    protected function getCoreDirectoryProductTagsService()
    {
        return $this->services['core_directory_product_tags'] = new \Core\DirectoryBundle\Admin\Form\Type\ProductTagsType($this->get('core_directory_product_tags_logic'));
    }
    protected function getCoreDirectoryProductTagsAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\ProductTagsAdmin('core_directory_product_tags_admin', 'Core\\DirectoryBundle\\Entity\\ProductTags', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Теги продуктов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDirectoryProductTagsLogicService()
    {
        return $this->services['core_directory_product_tags_logic'] = new \Core\DirectoryBundle\Logic\ProductTagsLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreDirectoryRemoteVideoTypeService()
    {
        return $this->services['core_directory_remote_video_type'] = new \Core\DirectoryBundle\Form\Type\RemoteVideoFormType($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreDirectoryRemoteVideoTypeFrontendService()
    {
        return $this->services['core_directory_remote_video_type_frontend'] = new \Core\DirectoryBundle\Form\Type\RemoteVideoFormTypeFrontend($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreDirectoryUnitOfMeasureAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\UnitOfMeasureAdmin('core_directory_unit_of_measure_admin', 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Единицы измерения');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDirectoryUnitOfMeasureGroupAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\UnitOfMeasureGroupAdmin('core_directory_unit_of_measure_group_admin', 'Core\\DirectoryBundle\\Entity\\UnitOfMeasureGroup', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Группы для единиц измерения');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDiscountsContragentManufacturerAdminService()
    {
        $instance = new \Core\DiscountsBundle\Admin\ContragentManufacturerDiscountAdmin('core_discounts_contragent_manufacturer_admin', 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerDiscount', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Индивидуальные cкидки по брендам');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDiscountsContragentManufacturerStepValuesAdminService()
    {
        $instance = new \Core\DiscountsBundle\Admin\ContragentManufacturerStepValuesAdmin('core_discounts_contragent_manufacturer_step_values_admin', 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerStepValues', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Значения скидок по брендам');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDiscountsLogicService()
    {
        return $this->services['core_discounts_logic'] = new \Core\DiscountsBundle\Logic\DiscountsLogic($this->get('doctrine.orm.default_entity_manager'), $this);
    }
    protected function getCoreDiscountsManufacturerAdminService()
    {
        $instance = new \Core\DiscountsBundle\Admin\ManufacturerDiscountAdmin('core_discounts_manufacturer_admin', 'Core\\DiscountsBundle\\Entity\\ManufacturerDiscount', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Скидки по брендам');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreDiscountsManufacturerStepValuesAdminService()
    {
        $instance = new \Core\DiscountsBundle\Admin\ManufacturerStepValuesAdmin('core_discounts_manufacturer_step_values_admin', 'Core\\DiscountsBundle\\Entity\\ManufacturerStepValues', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Значения скидок по брендам');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreFile_Twig_FileFilterExtensionService()
    {
        return $this->services['core_file.twig.file_filter_extension'] = new \Core\FileBundle\Twig\FileFilterExtension(array('root_dir' => '/home/olikids/public_html.sam/app', 'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file', 'web_dir' => 'web', 'upload_dir' => 'uploads', 'no_image_src' => 'images/image_not_found/no-image.jpg', 'detect_dominant_color' => true, 'thumbnail_crop' => false, 'thumbnail_backgrond_color' => '#fff', 'image' => array('Core\\ProductBundle\\Entity\\CommonProduct' => array('images' => array('dir' => 'product', 'file_size' => 10, 'max_count_files' => 30, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'watermark' => array('enable' => true, 'url' => '/images/watertmark.png', 'top' => 50, 'left' => 50), 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('64x64_' => array('size' => array('w' => 64, 'h' => 64)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)), '222x222_' => array('size' => array('w' => 222, 'h' => 222)), '140x140_' => array('size' => array('w' => 140, 'h' => 140)), '400x400_' => array('size' => array('w' => 400, 'h' => 400)))))), 'Core\\ManufacturerBundle\\Entity\\Brand' => array('logo' => array('dir' => 'brand', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*')), 'substrate' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '178x60_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('178x60_' => array('size' => array('w' => 178, 'h' => 60)), '712x240_' => array('size' => array('w' => 712, 'h' => 240)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array('logo' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('logo' => array('dir' => 'certificate', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '300x300_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x300_' => array('size' => array('w' => 300, 'h' => 300)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\LogisticsBundle\\Entity\\Seller' => array('imageSign' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignOfAccountant' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small2', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small2' => array('size' => array('w' => 150, 'h' => 150)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignAndStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small3', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small3' => array('size' => array('w' => 190, 'h' => 190)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('photos' => array('dir' => 'reviews', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'watermark' => array('watermark_' => array('size' => array('w' => 1280, 'h' => 720))), 'preview' => array('35x35_' => array('size' => array('w' => 35, 'h' => 35)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)))))), 'Core\\HolidayBundle\\Entity\\Holiday' => array('logo' => array('dir' => 'logos', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => 'holiday_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('holiday_' => array('size' => array('w' => 240, 'h' => 104)))), 'mime_types' => array(0 => 'image/*')))), 'document' => array('Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array('priceFile' => array('dir' => 'price_analysis', 'file_size' => 10, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/vnd.ms-excel'))), 'Core\\OrderBundle\\Entity\\Order' => array('documentScans' => array('dir' => 'document_scans', 'file_size' => 2, 'max_count_files' => 4, 'mime_types' => array(0 => 'application/pdf', 1 => 'image/jpeg', 2 => 'image/png', 3 => 'application/msword'))), 'Core\\ProductBundle\\Entity\\CommonProduct' => array('instruction' => array('dir' => 'product', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'text/*'))), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array('file' => array('dir' => 'trouble_ticket', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('document' => array('dir' => 'certificate', 'file_size' => 50, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('videos' => array('dir' => 'reviews', 'file_size' => 50, 'max_count_files' => 5, 'mime_types' => array(0 => 'video/*', 1 => 'image/*'))))), $this->get('core_file_logic'));
    }
    protected function getCoreFile_Twig_FileFunctionExtensionService()
    {
        return $this->services['core_file.twig.file_function_extension'] = new \Core\FileBundle\Twig\FileFunctionExtension();
    }
    protected function getCoreFileDocumentAdminService()
    {
        $instance = new \Core\FileBundle\Admin\CommonAdminFile('core_file_document_admin', 'Core\\FileBundle\\Entity\\DocumentFile', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreFileFormMultiuploadDocumentService()
    {
        return $this->services['core_file_form_multiupload_document'] = new \Core\FileBundle\Admin\Form\Type\MultiuploadDocumentType(array('root_dir' => '/home/olikids/public_html.sam/app', 'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file', 'web_dir' => 'web', 'upload_dir' => 'uploads', 'no_image_src' => 'images/image_not_found/no-image.jpg', 'detect_dominant_color' => true, 'thumbnail_crop' => false, 'thumbnail_backgrond_color' => '#fff', 'image' => array('Core\\ProductBundle\\Entity\\CommonProduct' => array('images' => array('dir' => 'product', 'file_size' => 10, 'max_count_files' => 30, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'watermark' => array('enable' => true, 'url' => '/images/watertmark.png', 'top' => 50, 'left' => 50), 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('64x64_' => array('size' => array('w' => 64, 'h' => 64)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)), '222x222_' => array('size' => array('w' => 222, 'h' => 222)), '140x140_' => array('size' => array('w' => 140, 'h' => 140)), '400x400_' => array('size' => array('w' => 400, 'h' => 400)))))), 'Core\\ManufacturerBundle\\Entity\\Brand' => array('logo' => array('dir' => 'brand', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*')), 'substrate' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '178x60_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('178x60_' => array('size' => array('w' => 178, 'h' => 60)), '712x240_' => array('size' => array('w' => 712, 'h' => 240)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array('logo' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('logo' => array('dir' => 'certificate', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '300x300_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x300_' => array('size' => array('w' => 300, 'h' => 300)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\LogisticsBundle\\Entity\\Seller' => array('imageSign' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignOfAccountant' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small2', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small2' => array('size' => array('w' => 150, 'h' => 150)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignAndStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small3', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small3' => array('size' => array('w' => 190, 'h' => 190)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('photos' => array('dir' => 'reviews', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'watermark' => array('watermark_' => array('size' => array('w' => 1280, 'h' => 720))), 'preview' => array('35x35_' => array('size' => array('w' => 35, 'h' => 35)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)))))), 'Core\\HolidayBundle\\Entity\\Holiday' => array('logo' => array('dir' => 'logos', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => 'holiday_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('holiday_' => array('size' => array('w' => 240, 'h' => 104)))), 'mime_types' => array(0 => 'image/*')))), 'document' => array('Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array('priceFile' => array('dir' => 'price_analysis', 'file_size' => 10, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/vnd.ms-excel'))), 'Core\\OrderBundle\\Entity\\Order' => array('documentScans' => array('dir' => 'document_scans', 'file_size' => 2, 'max_count_files' => 4, 'mime_types' => array(0 => 'application/pdf', 1 => 'image/jpeg', 2 => 'image/png', 3 => 'application/msword'))), 'Core\\ProductBundle\\Entity\\CommonProduct' => array('instruction' => array('dir' => 'product', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'text/*'))), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array('file' => array('dir' => 'trouble_ticket', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('document' => array('dir' => 'certificate', 'file_size' => 50, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('videos' => array('dir' => 'reviews', 'file_size' => 50, 'max_count_files' => 5, 'mime_types' => array(0 => 'video/*', 1 => 'image/*'))))), $this->get('core_file_logic'));
    }
    protected function getCoreFileFormMultiuploadFileFronendService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('core_file_form_multiupload_file_fronend', 'request');
        }
        return $this->services['core_file_form_multiupload_file_fronend'] = $this->scopedServices['request']['core_file_form_multiupload_file_fronend'] = new \Core\FileBundle\Form\Type\MultiuploadFileFrontendType(array('root_dir' => '/home/olikids/public_html.sam/app', 'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file', 'web_dir' => 'web', 'upload_dir' => 'uploads', 'no_image_src' => 'images/image_not_found/no-image.jpg', 'detect_dominant_color' => true, 'thumbnail_crop' => false, 'thumbnail_backgrond_color' => '#fff', 'image' => array('Core\\ProductBundle\\Entity\\CommonProduct' => array('images' => array('dir' => 'product', 'file_size' => 10, 'max_count_files' => 30, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'watermark' => array('enable' => true, 'url' => '/images/watertmark.png', 'top' => 50, 'left' => 50), 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('64x64_' => array('size' => array('w' => 64, 'h' => 64)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)), '222x222_' => array('size' => array('w' => 222, 'h' => 222)), '140x140_' => array('size' => array('w' => 140, 'h' => 140)), '400x400_' => array('size' => array('w' => 400, 'h' => 400)))))), 'Core\\ManufacturerBundle\\Entity\\Brand' => array('logo' => array('dir' => 'brand', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*')), 'substrate' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '178x60_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('178x60_' => array('size' => array('w' => 178, 'h' => 60)), '712x240_' => array('size' => array('w' => 712, 'h' => 240)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array('logo' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('logo' => array('dir' => 'certificate', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '300x300_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x300_' => array('size' => array('w' => 300, 'h' => 300)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\LogisticsBundle\\Entity\\Seller' => array('imageSign' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignOfAccountant' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small2', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small2' => array('size' => array('w' => 150, 'h' => 150)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignAndStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small3', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small3' => array('size' => array('w' => 190, 'h' => 190)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('photos' => array('dir' => 'reviews', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'watermark' => array('watermark_' => array('size' => array('w' => 1280, 'h' => 720))), 'preview' => array('35x35_' => array('size' => array('w' => 35, 'h' => 35)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)))))), 'Core\\HolidayBundle\\Entity\\Holiday' => array('logo' => array('dir' => 'logos', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => 'holiday_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('holiday_' => array('size' => array('w' => 240, 'h' => 104)))), 'mime_types' => array(0 => 'image/*')))), 'document' => array('Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array('priceFile' => array('dir' => 'price_analysis', 'file_size' => 10, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/vnd.ms-excel'))), 'Core\\OrderBundle\\Entity\\Order' => array('documentScans' => array('dir' => 'document_scans', 'file_size' => 2, 'max_count_files' => 4, 'mime_types' => array(0 => 'application/pdf', 1 => 'image/jpeg', 2 => 'image/png', 3 => 'application/msword'))), 'Core\\ProductBundle\\Entity\\CommonProduct' => array('instruction' => array('dir' => 'product', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'text/*'))), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array('file' => array('dir' => 'trouble_ticket', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('document' => array('dir' => 'certificate', 'file_size' => 50, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('videos' => array('dir' => 'reviews', 'file_size' => 50, 'max_count_files' => 5, 'mime_types' => array(0 => 'video/*', 1 => 'image/*'))))), $this->get('core_file_logic'), $this->get('request'), $this->get('session'));
    }
    protected function getCoreFileFormMultiuploadImageService()
    {
        return $this->services['core_file_form_multiupload_image'] = new \Core\FileBundle\Admin\Form\Type\MultiuploadImageType(array('root_dir' => '/home/olikids/public_html.sam/app', 'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file', 'web_dir' => 'web', 'upload_dir' => 'uploads', 'no_image_src' => 'images/image_not_found/no-image.jpg', 'detect_dominant_color' => true, 'thumbnail_crop' => false, 'thumbnail_backgrond_color' => '#fff', 'image' => array('Core\\ProductBundle\\Entity\\CommonProduct' => array('images' => array('dir' => 'product', 'file_size' => 10, 'max_count_files' => 30, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'watermark' => array('enable' => true, 'url' => '/images/watertmark.png', 'top' => 50, 'left' => 50), 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('64x64_' => array('size' => array('w' => 64, 'h' => 64)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)), '222x222_' => array('size' => array('w' => 222, 'h' => 222)), '140x140_' => array('size' => array('w' => 140, 'h' => 140)), '400x400_' => array('size' => array('w' => 400, 'h' => 400)))))), 'Core\\ManufacturerBundle\\Entity\\Brand' => array('logo' => array('dir' => 'brand', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*')), 'substrate' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '178x60_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('178x60_' => array('size' => array('w' => 178, 'h' => 60)), '712x240_' => array('size' => array('w' => 712, 'h' => 240)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array('logo' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('logo' => array('dir' => 'certificate', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '300x300_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x300_' => array('size' => array('w' => 300, 'h' => 300)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\LogisticsBundle\\Entity\\Seller' => array('imageSign' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignOfAccountant' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small2', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small2' => array('size' => array('w' => 150, 'h' => 150)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignAndStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small3', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small3' => array('size' => array('w' => 190, 'h' => 190)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('photos' => array('dir' => 'reviews', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'watermark' => array('watermark_' => array('size' => array('w' => 1280, 'h' => 720))), 'preview' => array('35x35_' => array('size' => array('w' => 35, 'h' => 35)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)))))), 'Core\\HolidayBundle\\Entity\\Holiday' => array('logo' => array('dir' => 'logos', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => 'holiday_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('holiday_' => array('size' => array('w' => 240, 'h' => 104)))), 'mime_types' => array(0 => 'image/*')))), 'document' => array('Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array('priceFile' => array('dir' => 'price_analysis', 'file_size' => 10, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/vnd.ms-excel'))), 'Core\\OrderBundle\\Entity\\Order' => array('documentScans' => array('dir' => 'document_scans', 'file_size' => 2, 'max_count_files' => 4, 'mime_types' => array(0 => 'application/pdf', 1 => 'image/jpeg', 2 => 'image/png', 3 => 'application/msword'))), 'Core\\ProductBundle\\Entity\\CommonProduct' => array('instruction' => array('dir' => 'product', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'text/*'))), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array('file' => array('dir' => 'trouble_ticket', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('document' => array('dir' => 'certificate', 'file_size' => 50, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('videos' => array('dir' => 'reviews', 'file_size' => 50, 'max_count_files' => 5, 'mime_types' => array(0 => 'video/*', 1 => 'image/*'))))), $this->get('core_file_logic'));
    }
    protected function getCoreFileImageAdminService()
    {
        $instance = new \Core\FileBundle\Admin\CommonAdminFile('core_file_image_admin', 'Core\\FileBundle\\Entity\\ImageFile', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreFileLogicService()
    {
        return $this->services['core_file_logic'] = new \Core\FileBundle\Logic\FileLogic(array('root_dir' => '/home/olikids/public_html.sam/app', 'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file', 'web_dir' => 'web', 'upload_dir' => 'uploads', 'no_image_src' => 'images/image_not_found/no-image.jpg', 'detect_dominant_color' => true, 'thumbnail_crop' => false, 'thumbnail_backgrond_color' => '#fff', 'image' => array('Core\\ProductBundle\\Entity\\CommonProduct' => array('images' => array('dir' => 'product', 'file_size' => 10, 'max_count_files' => 30, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'watermark' => array('enable' => true, 'url' => '/images/watertmark.png', 'top' => 50, 'left' => 50), 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('64x64_' => array('size' => array('w' => 64, 'h' => 64)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)), '222x222_' => array('size' => array('w' => 222, 'h' => 222)), '140x140_' => array('size' => array('w' => 140, 'h' => 140)), '400x400_' => array('size' => array('w' => 400, 'h' => 400)))))), 'Core\\ManufacturerBundle\\Entity\\Brand' => array('logo' => array('dir' => 'brand', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*')), 'substrate' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '178x60_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('178x60_' => array('size' => array('w' => 178, 'h' => 60)), '712x240_' => array('size' => array('w' => 712, 'h' => 240)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array('logo' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('logo' => array('dir' => 'certificate', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '300x300_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x300_' => array('size' => array('w' => 300, 'h' => 300)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\LogisticsBundle\\Entity\\Seller' => array('imageSign' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignOfAccountant' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small2', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small2' => array('size' => array('w' => 150, 'h' => 150)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignAndStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small3', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small3' => array('size' => array('w' => 190, 'h' => 190)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('photos' => array('dir' => 'reviews', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'watermark' => array('watermark_' => array('size' => array('w' => 1280, 'h' => 720))), 'preview' => array('35x35_' => array('size' => array('w' => 35, 'h' => 35)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)))))), 'Core\\HolidayBundle\\Entity\\Holiday' => array('logo' => array('dir' => 'logos', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => 'holiday_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('holiday_' => array('size' => array('w' => 240, 'h' => 104)))), 'mime_types' => array(0 => 'image/*')))), 'document' => array('Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array('priceFile' => array('dir' => 'price_analysis', 'file_size' => 10, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/vnd.ms-excel'))), 'Core\\OrderBundle\\Entity\\Order' => array('documentScans' => array('dir' => 'document_scans', 'file_size' => 2, 'max_count_files' => 4, 'mime_types' => array(0 => 'application/pdf', 1 => 'image/jpeg', 2 => 'image/png', 3 => 'application/msword'))), 'Core\\ProductBundle\\Entity\\CommonProduct' => array('instruction' => array('dir' => 'product', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'text/*'))), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array('file' => array('dir' => 'trouble_ticket', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('document' => array('dir' => 'certificate', 'file_size' => 50, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('videos' => array('dir' => 'reviews', 'file_size' => 50, 'max_count_files' => 5, 'mime_types' => array(0 => 'video/*', 1 => 'image/*'))))), $this->get('translator.default'), $this->get('doctrine'), $this->get('session'), $this->get('core_color_logic'), $this);
    }
    protected function getCoreFileSubscriberService()
    {
        return $this->services['core_file_subscriber'] = new \Core\FileBundle\EventListener\Subscriber(array('root_dir' => '/home/olikids/public_html.sam/app', 'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file', 'web_dir' => 'web', 'upload_dir' => 'uploads', 'no_image_src' => 'images/image_not_found/no-image.jpg', 'detect_dominant_color' => true, 'thumbnail_crop' => false, 'thumbnail_backgrond_color' => '#fff', 'image' => array('Core\\ProductBundle\\Entity\\CommonProduct' => array('images' => array('dir' => 'product', 'file_size' => 10, 'max_count_files' => 30, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'watermark' => array('enable' => true, 'url' => '/images/watertmark.png', 'top' => 50, 'left' => 50), 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('64x64_' => array('size' => array('w' => 64, 'h' => 64)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)), '222x222_' => array('size' => array('w' => 222, 'h' => 222)), '140x140_' => array('size' => array('w' => 140, 'h' => 140)), '400x400_' => array('size' => array('w' => 400, 'h' => 400)))))), 'Core\\ManufacturerBundle\\Entity\\Brand' => array('logo' => array('dir' => 'brand', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*')), 'substrate' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '178x60_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('178x60_' => array('size' => array('w' => 178, 'h' => 60)), '712x240_' => array('size' => array('w' => 712, 'h' => 240)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array('logo' => array('dir' => 'manufacturer', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '148x70_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x150_' => array('size' => array('w' => 300, 'h' => 150)), '148x70_' => array('size' => array('w' => 148, 'h' => 70)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('logo' => array('dir' => 'certificate', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => '300x300_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('300x300_' => array('size' => array('w' => 300, 'h' => 300)))), 'mime_types' => array(0 => 'image/*'))), 'Core\\LogisticsBundle\\Entity\\Seller' => array('imageSign' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignOfAccountant' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small' => array('size' => array('w' => 80, 'h' => 80)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small2', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small2' => array('size' => array('w' => 150, 'h' => 150)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*')), 'imageSignAndStamp' => array('dir' => 'seller', 'prefix_preview_in_admin' => 'small3', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('small3' => array('size' => array('w' => 190, 'h' => 190)))), 'file_size' => 50, 'max_count_files' => 100, 'mime_types' => array(0 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('photos' => array('dir' => 'reviews', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'image/*'), 'prefix_preview_in_admin' => '100x100_', 'options' => array('original' => array('uploaded_file_' => array('size' => array('w' => NULL, 'h' => NULL))), 'watermark' => array('watermark_' => array('size' => array('w' => 1280, 'h' => 720))), 'preview' => array('35x35_' => array('size' => array('w' => 35, 'h' => 35)), '100x100_' => array('size' => array('w' => 100, 'h' => 100)))))), 'Core\\HolidayBundle\\Entity\\Holiday' => array('logo' => array('dir' => 'logos', 'file_size' => 5, 'max_count_files' => 1, 'prefix_preview_in_admin' => 'holiday_', 'options' => array('original' => array('original_' => array('size' => array('w' => NULL, 'h' => NULL))), 'preview' => array('holiday_' => array('size' => array('w' => 240, 'h' => 104)))), 'mime_types' => array(0 => 'image/*')))), 'document' => array('Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array('priceFile' => array('dir' => 'price_analysis', 'file_size' => 10, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/vnd.ms-excel'))), 'Core\\OrderBundle\\Entity\\Order' => array('documentScans' => array('dir' => 'document_scans', 'file_size' => 2, 'max_count_files' => 4, 'mime_types' => array(0 => 'application/pdf', 1 => 'image/jpeg', 2 => 'image/png', 3 => 'application/msword'))), 'Core\\ProductBundle\\Entity\\CommonProduct' => array('instruction' => array('dir' => 'product', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'text/*'))), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array('file' => array('dir' => 'trouble_ticket', 'file_size' => 5, 'max_count_files' => 10, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array('document' => array('dir' => 'certificate', 'file_size' => 50, 'max_count_files' => 1, 'mime_types' => array(0 => 'application/*', 1 => 'image/*'))), 'Core\\ReviewBundle\\Entity\\Review' => array('videos' => array('dir' => 'reviews', 'file_size' => 50, 'max_count_files' => 5, 'mime_types' => array(0 => 'video/*', 1 => 'image/*'))))), $this->get('core_file_logic'));
    }
    protected function getCoreGeoCityAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\GeoCityAdmin('core_geo_city_admin', 'Core\\DirectoryBundle\\Entity\\GeoCity', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Гео Названия Городов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreHolidayAdminService()
    {
        $instance = new \Core\HolidayBundle\Admin\HolidayAdmin('core_holiday_admin', 'Core\\HolidayBundle\\Entity\\Holiday', 'CoreHolidayBundle:Admin\\HolidayAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Праздники');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreHolidayLogicService()
    {
        return $this->services['core_holiday_logic'] = new \Core\HolidayBundle\Logic\HolidayLogic($this);
    }
    protected function getCoreHolidayTwigFunctionExtensionService()
    {
        return $this->services['core_holiday_twig_function_extension'] = new \Core\HolidayBundle\Twig\HolidayFunctionExtension($this);
    }
    protected function getCoreLegalFormAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\LegalFormAdmin('core_legal_form_admin', 'Core\\DirectoryBundle\\Entity\\LegalForm', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Правовые формы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsAdditionalCostsOfSupplyAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\AdditionalCostsOfSupplyAdmin('core_logistics_additional_costs_of_supply_admin', 'Core\\LogisticsBundle\\Entity\\AdditionalCostsOfSupply', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Расходы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsAdditionalCostsOfSupplyTypeAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\AdditionalCostsTypeOfSupplyAdmin('core_logistics_additional_costs_of_supply_type_admin', 'Core\\LogisticsBundle\\Entity\\AdditionalCostsTypeOfSupply', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Типы расходов поставки');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsBankAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\BankAdmin('core_logistics_bank_admin', 'Core\\LogisticsBundle\\Entity\\Bank', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Справочник банков');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsLogicService()
    {
        return $this->services['core_logistics_logic'] = new \Core\LogisticsBundle\Logic\LogisticsLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreLogisticsProductInSupplyAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\ProductInSupplyAdmin('core_logistics_product_in_supply_admin', 'Core\\LogisticsBundle\\Entity\\ProductInSupply', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsProductsInTransitTypeService()
    {
        return $this->services['core_logistics_products_in_transit_type'] = new \Core\LogisticsBundle\Admin\Form\Type\ProductsInTransit();
    }
    protected function getCoreLogisticsRegionCityAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\RegionCityAdmin('core_logistics_region_city_admin', 'Core\\LogisticsBundle\\Entity\\RegionCity', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsSellerAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\SellerAdmin('core_logistics_seller_admin', 'Core\\LogisticsBundle\\Entity\\Seller', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Продавцы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsStockAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\StockAdmin('core_logistics_stock_admin', 'Core\\LogisticsBundle\\Entity\\Stock', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Склады');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsSupplierAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\SupplierAdmin('core_logistics_supplier_admin', 'Core\\LogisticsBundle\\Entity\\Supplier', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Поставщики');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsSupplierPriceAnalysisLogicService()
    {
        return $this->services['core_logistics_supplier_price_analysis_logic'] = new \Core\LogisticsBundle\Logic\SupplierPriceAnalysisLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('phpexcel'), $this->get('core_file_logic'));
    }
    protected function getCoreLogisticsSupplyAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\SupplyAdmin('core_logistics_supply_admin', 'Core\\LogisticsBundle\\Entity\\Supply', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Поставки');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsSupplyStatusAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\SupplyStatusAdmin('core_logistics_supply_status_admin', 'Core\\LogisticsBundle\\Entity\\SupplyStatus', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Статусы поставок');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsTransitAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\TransitAdmin('core_logistics_transit_admin', 'Core\\LogisticsBundle\\Entity\\Transit', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Транзиты');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsTransitStatusAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\TransitStatusAdmin('core_logistics_transit_status_admin', 'Core\\LogisticsBundle\\Entity\\TransitStatus', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Статусы транзитов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsUnitInStockAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\UnitInStockAdmin('core_logistics_unit_in_stock_admin', 'Core\\LogisticsBundle\\Entity\\UnitInStock', 'CoreLogisticsBundle:Admin\\UnitInStockAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Товар со всех складов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsUnitInStockDefectTransitAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\UnitInStockDefectReasonAdmin('core_logistics_unit_in_stock_defect_transit_admin', 'Core\\LogisticsBundle\\Entity\\UnitInStockDefectReason', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Причины списания');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsUnitInStockDefectTypeService()
    {
        return $this->services['core_logistics_unit_in_stock_defect_type'] = new \Core\LogisticsBundle\Admin\Form\Type\UnitInStockDefectType($this->get('doctrine.orm.default_entity_manager'), $this);
    }
    protected function getCoreLogisticsUnitInTransitAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\ProductInTransitAdmin('core_logistics_unit_in_transit_admin', 'Core\\LogisticsBundle\\Entity\\ProductInTransit', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Товары в транзите');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreLogisticsUnitSerialAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\UnitSerialsAdmin('core_logistics_unit_serial_admin', 'Core\\LogisticsBundle\\Entity\\UnitSerials', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreManufacturerAdminService()
    {
        $instance = new \Core\ManufacturerBundle\Admin\ManufacturerAdmin('core_manufacturer_admin', 'Core\\ManufacturerBundle\\Entity\\Manufacturer', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Производители');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreManufacturerBrandAdminService()
    {
        $instance = new \Core\ManufacturerBundle\Admin\BrandAdmin('core_manufacturer_brand_admin', 'Core\\ManufacturerBundle\\Entity\\Brand', 'CoreManufacturerBundle:Admin\\BrandAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Бренды');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreManufacturerCertificateAdminService()
    {
        $instance = new \Core\ManufacturerBundle\Admin\CertificateAdmin('core_manufacturer_certificate_admin', 'Core\\ManufacturerBundle\\Entity\\Certificate', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Сертификаты производителей');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreManufacturerPriceAnalysisAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\SupplierPriceAnalysisAdmin('core_manufacturer_price_analysis_admin', 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis', 'CoreLogisticsBundle:Admin\\SupplierPriceAnalysisAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Анализ прайсов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreManufacturerPriceAnalysisSettingsAdminService()
    {
        $instance = new \Core\LogisticsBundle\Admin\SupplierPriceAnalysisSettingsAdmin('core_manufacturer_price_analysis_settings_admin', 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisSettings', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreManufacturerSeriesAdminService()
    {
        $instance = new \Core\ManufacturerBundle\Admin\SeriesAdmin('core_manufacturer_series_admin', 'Core\\ManufacturerBundle\\Entity\\Series', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\OrderAdmin('core_order_admin', 'Core\\OrderBundle\\Entity\\Order', 'CoreOrderBundle:Admin\\OrderAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Заказы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderBoxesAndWaybillsTypeService()
    {
        return $this->services['core_order_boxes_and_waybills_type'] = new \Core\OrderBundle\Admin\Form\Type\BoxesAndWaybillsType();
    }
    protected function getCoreOrderBoxesTypeService()
    {
        return $this->services['core_order_boxes_type'] = new \Core\OrderBundle\Admin\Form\Type\BoxType();
    }
    protected function getCoreOrderBuyerRecipientInfoFormService()
    {
        return $this->services['core_order_buyer_recipient_info_form'] = new \Core\OrderBundle\Form\Type\BuyerInfoFormType($this->get('security.context'), $this->get('request_stack'), $this->get('fos_user.user_manager'), $this->get('doctrine.orm.default_entity_manager'), $this->get('validator'), $this->get('session'));
    }
    protected function getCoreOrderCanceledReasonAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\CanceledReasonAdmin('core_order_canceled_reason_admin', 'Core\\OrderBundle\\Entity\\CanceledReason', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Причины отмены заказов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderCanceledReasonTypeService()
    {
        return $this->services['core_order_canceled_reason_type'] = new \Core\OrderBundle\Admin\Form\Type\CanceledStatusType($this->get('core_order_logic'), $this->get('doctrine.orm.default_entity_manager'), $this);
    }
    protected function getCoreOrderCheckCompositionValidatorService()
    {
        return $this->services['core_order_check_composition_validator'] = new \Core\OrderBundle\Validator\Constraints\CheckCompositionValidator($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreOrderCompositionAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\CompositionAdmin('core_order_composition_admin', 'Core\\OrderBundle\\Entity\\Composition', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Продукты в заказе');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderExtraStatusAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\ExtraStatusAdmin('core_order_extra_status_admin', 'Core\\OrderBundle\\Entity\\ExtraStatus', 'SonataAdminBundle:CRUD', $this->get('security.context'));
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Доп. статусы заказов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderExtraStatusTypeService()
    {
        return $this->services['core_order_extra_status_type'] = new \Core\OrderBundle\Admin\Form\Type\ExtraStatusType($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreOrderLogicService()
    {
        return $this->services['core_order_logic'] = new \Core\OrderBundle\Logic\OrderLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('core_logistics_logic'), $this->get('core_discounts_logic'), $this->get('tfox.mpdfport'), $this->get('templating'), $this->get('session'), $this, $this->get('swiftmailer.mailer.default'), $this->get('security.context'), array('default_currency' => 'RUB'), $this->get('validator'), $this->get('router'));
    }
    protected function getCoreOrderMailerLogicService()
    {
        return $this->services['core_order_mailer_logic'] = new \Core\OrderBundle\Logic\OrderMailerLogic($this->get('swiftmailer.mailer.default'), $this->get('router'), $this->get('templating'), $this->get('translator.default'), $this->get('core_config_logic'), $this->get('core_common_twig_extension'), $this->get('twig'), array('default_email_sender_name' => 'saintrain@mail.ru', 'default_email' => 'saintrain@mail.ru', 'default_timezone' => 'Europe/Moscow'), $this->get('core_order_logic'));
    }
    protected function getCoreOrderOrderExtraValidatorService()
    {
        return $this->services['core_order_order_extra_validator'] = new \Core\OrderBundle\Validator\Constraints\OrderExtraValidator($this->get('core_order_logic'), $this->get('validator'), $this, $this->get('router'));
    }
    protected function getCoreOrderProductsInOrderTypeService()
    {
        return $this->services['core_order_products_in_order_type'] = new \Core\OrderBundle\Admin\Form\Type\ProductsInOrderType($this->get('core_order_logic'), $this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreOrderRecipientWithExtraDataFormService()
    {
        return $this->services['core_order_recipient_with_extra_data_form'] = new \Core\OrderBundle\Form\Type\RecipientFormType($this->get('security.context'));
    }
    protected function getCoreOrderSizesOfBoxAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\SizesOfBoxAdmin('core_order_sizes_of_box_admin', 'Core\\OrderBundle\\Entity\\SizesOfBox', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Габариты упаковок');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderSubscriberService()
    {
        return $this->services['core_order_subscriber'] = new \Core\OrderBundle\EventListener\OrderSubscriber($this);
    }
    protected function getCoreOrderUnitSerialNumberTypeService()
    {
        return $this->services['core_order_unit_serial_number_type'] = new \Core\OrderBundle\Admin\Form\Type\UnitSerialNumberType($this->get('core_order_logic'), $this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreOrderWaybillsAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\WaybillsAdmin('core_order_waybills_admin', 'Core\\OrderBundle\\Entity\\Waybills', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Транспортные накладные');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreOrderWaybillsTypeService()
    {
        return $this->services['core_order_waybills_type'] = new \Core\OrderBundle\Admin\Form\Type\WaybillsType();
    }
    protected function getCorePaymentAdminService()
    {
        $instance = new \Core\PaymentBundle\Admin\PaymentAdmin('core_payment_admin', 'Core\\PaymentBundle\\Entity\\Payment', 'CorePaymentBundle:Admin\\PaymentAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Платежи');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCorePaymentAdminPaymentSystemCommonService()
    {
        $instance = new \Core\PaymentBundle\Admin\CommonPaymentSystemAdmin('core_payment_admin_payment_system_common', 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem', 'SonataAdminBundle:CRUD');
        $instance->setSubClasses(array('WebMoney' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\WebMoney', 'Robokassa' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\Robokassa', 'Qiwi' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\Qiwi', 'YandexMoney' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\YandexMoney', 'PlasticCard' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\PlasticCard', 'PlasticCardTerminal' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\PlasticCardTerminal', 'BankTransfer' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\BankTransfer', 'PaymentOnDelivery' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\PaymentOnDelivery', 'PayPal' => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\PayPal'));
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Платежные системы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCorePaymentAdminRobokassaSystemService()
    {
        $instance = new \Core\PaymentBundle\Admin\RobokassaSubsystemAdmin('core_payment_admin_robokassa_system', 'Core\\PaymentBundle\\Entity\\PaymentSystem\\RobokassaSubsystem', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCorePaymentFormTypePaymentSystemService()
    {
        return $this->services['core_payment_form_type_payment_system'] = new \Core\PaymentBundle\Form\Type\PaymentSystem\PaymentSystemType($this);
    }
    protected function getCorePaymentLogicService()
    {
        return $this->services['core_payment_logic'] = new \Core\PaymentBundle\Logic\PaymentLogic($this, $this->get('doctrine'), $this->get('session'), $this->get('translator.default'), $this->get('core_order_logic'), $this->get('router'));
    }
    protected function getCorePaymentLogicBanktransferService()
    {
        return $this->services['core_payment_logic_banktransfer'] = new \Core\PaymentBundle\Logic\PaymentSystem\BankTransferLogic($this);
    }
    protected function getCorePaymentLogicPaymentondeliveryService()
    {
        return $this->services['core_payment_logic_paymentondelivery'] = new \Core\PaymentBundle\Logic\PaymentSystem\PaymentOnDeliveryLogic($this);
    }
    protected function getCorePaymentLogicPaypalService()
    {
        return $this->services['core_payment_logic_paypal'] = new \Core\PaymentBundle\Logic\PaymentSystem\PayPalLogic($this);
    }
    protected function getCorePaymentLogicPlasticcardService()
    {
        return $this->services['core_payment_logic_plasticcard'] = new \Core\PaymentBundle\Logic\PaymentSystem\PlasticCardLogic($this);
    }
    protected function getCorePaymentLogicPlasticcardterminalService()
    {
        return $this->services['core_payment_logic_plasticcardterminal'] = new \Core\PaymentBundle\Logic\PaymentSystem\PlasticCardTerminalLogic($this);
    }
    protected function getCorePaymentLogicRobokassaService()
    {
        return $this->services['core_payment_logic_robokassa'] = new \Core\PaymentBundle\Logic\PaymentSystem\RobokassaLogic($this);
    }
    protected function getCorePaymentLogicYandexmoneyService()
    {
        return $this->services['core_payment_logic_yandexmoney'] = new \Core\PaymentBundle\Logic\PaymentSystem\YandexMoneyLogic($this);
    }
    protected function getCorePaymentSubscriberService()
    {
        return $this->services['core_payment_subscriber'] = new \Core\PaymentBundle\EventListener\Subscriber($this);
    }
    protected function getCorePaymentSystemLogicService()
    {
        return $this->services['core_payment_system_logic'] = new \Core\PaymentBundle\Logic\PaymentSystem\PaymentSystemLogic($this);
    }
    protected function getCorePaymentTwigExtensionService()
    {
        return $this->services['core_payment_twig_extension'] = new \Core\PaymentBundle\Twig\Extension\PaymentExtension($this);
    }
    protected function getCorePreOrderAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\PreOrderAdmin('core_pre_order_admin', 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrder', 'CoreOrderBundle:Admin\\PreOrderAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Предзаказы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCorePreOrderCompositionFormService()
    {
        return $this->services['core_pre_order_composition_form'] = new \Core\OrderBundle\Form\Type\PreOrderCompostionFormType();
    }
    protected function getCorePreOrderCompositionsAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\PreOrderCompositionAdmin('core_pre_order_compositions_admin', 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrderComposition', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCorePreOrderFormService()
    {
        return $this->services['core_pre_order_form'] = new \Core\OrderBundle\Form\Type\PreOrderFormType();
    }
    protected function getCorePreOrderLogicService()
    {
        return $this->services['core_pre_order_logic'] = new \Core\OrderBundle\Logic\PreOrderLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('fos_user.user_manager'), $this->get('validator'), $this->get('core_order_logic'), $this->get('core_supply_logic'), $this->get('translator.default'), $this->get('session'), $this->get('core_common_money_twig_extension'), $this->get('security.context'), $this->get('templating'), $this->get('router'), array('default_email' => 'saintrain@mail.ru'), $this->get('swiftmailer.mailer.default'), $this->get('form.factory'));
    }
    protected function getCorePreOrderStatusAdminService()
    {
        $instance = new \Core\OrderBundle\Admin\PreOrderStatusAdmin('core_pre_order_status_admin', 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrderStatus', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Статусы Предзаказов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreProductFormatTwigExtensionService()
    {
        return $this->services['core_product_format_twig_extension'] = new \Core\ProductBundle\Twig\FormatExtension('ru', $this);
    }
    protected function getCoreProductLogicService()
    {
        return $this->services['core_product_logic'] = new \Core\ProductBundle\Logic\ProductLogic($this->get('templating'), 'ru', $this->get('session'), $this->get('router'), $this->get('translator.default'), $this, $this->get('swiftmailer.mailer.default'), array('default_email_sender_name' => 'saintrain@mail.ru', 'default_email' => 'saintrain@mail.ru', 'default_timezone' => 'Europe/Moscow'));
    }
    protected function getCoreProductModificationLogicService()
    {
        return $this->services['core_product_modification_logic'] = new \Core\ProductBundle\Logic\ProductModificationLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('validator'), $this->get('templating'), $this->get('core_file_logic'));
    }
    protected function getCoreProductStatisticsLogicService()
    {
        return $this->services['core_product_statistics_logic'] = new \Core\StatisticsBundle\Logic\ProductStatisticsLogic('Europe/Moscow', $this->get('doctrine'), $this->get('session'), $this->get('simplethings_entityaudit.reader'));
    }
    protected function getCoreProductSubscriberService()
    {
        return $this->services['core_product_subscriber'] = new \Core\ProductBundle\EventListener\ProductSubscriber($this);
    }
    protected function getCoreProductTwigExtensionService()
    {
        return $this->services['core_product_twig_extension'] = new \Core\ProductBundle\Twig\ProductExtension($this);
    }
    protected function getCorePropertyFilterLogicService()
    {
        return $this->services['core_property_filter_logic'] = new \Core\PropertyBundle\Logic\FilterLogic('ru', 'RUB', $this->get('doctrine'), $this->get('templating'), $this->get('translator.default'), $this);
    }
    protected function getCoreRegionAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\RegionAdmin('core_region_admin', 'Core\\DirectoryBundle\\Entity\\Region', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Регионы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreReviewAdminReviewService()
    {
        $instance = new \Core\ReviewBundle\Admin\ReviewAdmin('core_review_admin_review', 'Core\\ReviewBundle\\Entity\\Review', 'CoreReviewBundle:Admin\\ReviewAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Отзывы о товарах');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreReviewLogicService()
    {
        return $this->services['core_review_logic'] = new \Core\ReviewBundle\Logic\ReviewLogic($this);
    }
    protected function getCoreReviewStarRatingService()
    {
        return $this->services['core_review_star_rating'] = new \Core\ReviewBundle\Form\Type\StarRatingType();
    }
    protected function getCoreReviewSubscriberService()
    {
        return $this->services['core_review_subscriber'] = new \Core\ReviewBundle\EventListener\Subscriber($this->get('core_review_logic'));
    }
    protected function getCoreReviewTwigExtensionService()
    {
        return $this->services['core_review_twig_extension'] = new \Core\ReviewBundle\Twig\Extension\ReviewExtension($this);
    }
    protected function getCoreShopCategoryAdminFaqService()
    {
        $instance = new \Core\CategoryBundle\Admin\CommonAdminCategory('core_shop_category_admin_faq', 'Core\\CategoryBundle\\Entity\\FaqCategory', 'CoreCategoryBundle:Admin\\CommonAdminCategory');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Категории');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopCategoryAdminProductService()
    {
        $instance = new \Core\CategoryBundle\Admin\CommonAdminCategory('core_shop_category_admin_product', 'Core\\CategoryBundle\\Entity\\ProductCategory', 'CoreCategoryBundle:Admin\\CommonAdminCategory');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Категории продукции');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopCategoryAdminTroubleTicketService()
    {
        $instance = new \Core\CategoryBundle\Admin\CommonAdminCategory('core_shop_category_admin_trouble_ticket', 'Core\\CategoryBundle\\Entity\\TroubleTicketCategory', 'CoreCategoryBundle:Admin\\CommonAdminCategory');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Категории траблтикетов');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopCategoryFormTypeService()
    {
        return $this->services['core_shop_category_form_type'] = new \Core\CategoryBundle\Admin\Form\Type\CategoryType($this->get('core_shop_category_logic'));
    }
    protected function getCoreShopCategoryLogicService()
    {
        return $this->services['core_shop_category_logic'] = new \Core\CategoryBundle\Logic\CategoryLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('router'), $this);
    }
    protected function getCoreShopCategoryMainFormTypeService()
    {
        return $this->services['core_shop_category_main_form_type'] = new \Core\ProductBundle\Admin\Form\Type\CategoryMainType();
    }
    protected function getCoreShopManufacturerMainFormTypeService()
    {
        return $this->services['core_shop_manufacturer_main_form_type'] = new \Core\ProductBundle\Admin\Form\Type\ManufacturerMainType();
    }
    protected function getCoreShopModificationFormTypeService()
    {
        return $this->services['core_shop_modification_form_type'] = new \Core\ProductBundle\Admin\Form\Type\ProductModificationsType($this->get('core_product_modification_logic'));
    }
    protected function getCoreShopProductAdminService()
    {
        $instance = new \Core\ProductBundle\Admin\ProductAdmin('core_shop_product_admin', 'Core\\ProductBundle\\Entity\\CommonProduct', 'CoreProductBundle:Admin\\AdminProduct');
        $instance->setSubClasses(array('Физический продукт' => 'Core\\ProductBundle\\Entity\\Product', 'Цифровой продукт' => 'Core\\ProductBundle\\Entity\\DigitalProduct', 'Составной продукт' => 'Core\\ProductBundle\\Entity\\CompositeProduct', 'Услуга' => 'Core\\ProductBundle\\Entity\\ServiceProduct'));
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Продукция');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopPropertyAdminService()
    {
        $instance = new \Core\PropertyBundle\Admin\PropertyAdmin('core_shop_property_admin', 'Core\\PropertyBundle\\Entity\\Property', 'CorePropertyBundle:Admin\\PropertyAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Характеристики');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopPropertyCategoryFormTypeService()
    {
        return $this->services['core_shop_property_category_form_type'] = new \Core\PropertyBundle\Admin\Form\Type\PropertyCategoryType($this->get('core_shop_category_logic'));
    }
    protected function getCoreShopPropertyDataAdminService()
    {
        $instance = new \Core\PropertyBundle\Admin\DataPropertyAdmin('core_shop_property_data_admin', 'Core\\PropertyBundle\\Entity\\DataProperty', 'CorePropertyBundle:Admin\\PropertyAdmin', NULL);
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopPropertyDataProductAdminService()
    {
        $instance = new \Core\PropertyBundle\Admin\ProductDataPropertyAdmin('core_shop_property_data_product_admin', 'Core\\PropertyBundle\\Entity\\ProductDataProperty', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreShopPropertyFormTypeService()
    {
        return $this->services['core_shop_property_form_type'] = new \Core\PropertyBundle\Admin\Form\Type\PropertyType($this->get('core_shop_property_logic'));
    }
    protected function getCoreShopPropertyLogicService()
    {
        return $this->services['core_shop_property_logic'] = new \Core\PropertyBundle\Logic\PropertyLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreShopPropertySettingsCategoryAdminService()
    {
        $instance = new \Core\PropertyBundle\Admin\SettingsCategoryPropertyAdmin('core_shop_property_settings_category_admin', 'Core\\PropertyBundle\\Entity\\SettingsCategoryProperty', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Настройки для категории');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreSlugHistoryFormService()
    {
        return $this->services['core_slug_history_form'] = new \Core\SlugHistoryBundle\Admin\Form\Type\SlugHistoryType($this);
    }
    protected function getCoreSlugHistoryLogicService()
    {
        return $this->services['core_slug_history_logic'] = new \Core\SlugHistoryBundle\Logic\SlugHistoryLogic($this);
    }
    protected function getCoreSlugHistorySubscriberService()
    {
        return $this->services['core_slug_history_subscriber'] = new \Core\SlugHistoryBundle\EventListener\Subscriber($this->get('core_slug_history_logic'));
    }
    protected function getCoreStatisticsAdminService()
    {
        $instance = new \Core\StatisticsBundle\Admin\StatisticsAdmin('core_statistics_admin', 'Core\\StatisticsBundle\\Entity\\Statistics', 'CoreStatisticsBundle:Admin\\StatisticsAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Статистика по продуктам');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreStatisticsDeficitProductLogicService()
    {
        return $this->services['core_statistics_deficit_product_logic'] = new \Core\StatisticsBundle\Logic\DeficitProductStatisticsLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreStatisticsInventoryLogicService()
    {
        return $this->services['core_statistics_inventory_logic'] = new \Core\StatisticsBundle\Logic\InventoryStatisticsLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('templating'), $this->get('tfox.mpdfport'));
    }
    protected function getCoreStatisticsNotFinishedOrderAdminService()
    {
        $instance = new \Core\StatisticsBundle\Admin\NotFinishedOrderAdmin('core_statistics_not_finished_order_admin', 'Core\\StatisticsBundle\\Entity\\NotFinishedOrder', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Незавершенные заказы');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreStatisticsNotFinishedOrderListenerService()
    {
        return $this->services['core_statistics_not_finished_order_listener'] = new \Core\StatisticsBundle\EventListener\NotFinishedOrderListener($this->get('core_statistics_not_finished_order_logic'));
    }
    protected function getCoreStatisticsNotFinishedOrderLogicService()
    {
        return $this->services['core_statistics_not_finished_order_logic'] = new \Core\StatisticsBundle\Logic\NotFinishedOrderLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('session'), $this->get('security.context'));
    }
    protected function getCoreStatisticsStockLogicService()
    {
        return $this->services['core_statistics_stock_logic'] = new \Core\StatisticsBundle\Logic\StockStatisticsLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreStatisticsVirtualUnitsLogicService()
    {
        return $this->services['core_statistics_virtual_units_logic'] = new \Core\StatisticsBundle\Logic\VirtualUnitsStatisticsLogic($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getCoreStockSubscriberService()
    {
        return $this->services['core_stock_subscriber'] = new \Core\LogisticsBundle\EventListener\StockSubscriber($this);
    }
    protected function getCoreSupplierPriceAnalysisSubscriberService()
    {
        return $this->services['core_supplier_price_analysis_subscriber'] = new \Core\LogisticsBundle\EventListener\SupplierPriceAnalysisSubscriber($this->get('core_file_logic'), $this->get('phpexcel'));
    }
    protected function getCoreSupplyLogicService()
    {
        return $this->services['core_supply_logic'] = new \Core\LogisticsBundle\Logic\SupplyLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('core_logistics_logic'));
    }
    protected function getCoreSupplySubscriberService()
    {
        return $this->services['core_supply_subscriber'] = new \Core\LogisticsBundle\EventListener\SupplySubscriber($this);
    }
    protected function getCoreTroubleTicketLogMailerService()
    {
        return $this->services['core_trouble_ticket_log_mailer'] = new \Core\TroubleTicketBundle\Mailer\LogMailer($this->get('swiftmailer.mailer.default'), $this->get('router'), $this->get('templating'), $this->get('translator.default'), $this->get('core_config_logic'), array('fromEmail' => 'saintrain@mail.ru'));
    }
    protected function getCoreUnionCompositeProductSubscriberService()
    {
        return $this->services['core_union_composite_product_subscriber'] = new \Core\UnionBundle\EventListener\CompositeProductUnionSubscriber($this);
    }
    protected function getCoreUnionFormTypeService()
    {
        return $this->services['core_union_form_type'] = new \Core\UnionBundle\Admin\Form\Type\UnionType($this->get('core_union_logic'));
    }
    protected function getCoreUnionLogicService()
    {
        return $this->services['core_union_logic'] = new \Core\UnionBundle\Logic\UnionLogic($this->get('doctrine.orm.default_entity_manager'), $this->get('validator'), $this->get('templating'), $this->get('core_file_logic'));
    }
    protected function getCoreUnionProductCompositionService()
    {
        $instance = new \Core\UnionBundle\Admin\ProductCompositionsUnionAdmin('core_union_product_composition', 'Core\\UnionBundle\\Entity\\ProductCompositionsUnion', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreUnionProductQuantityAlternativeService()
    {
        $instance = new \Core\UnionBundle\Admin\ProductQuantityAlternativeUnionAdmin('core_union_product_quantity_alternative', 'Core\\UnionBundle\\Entity\\ProductQuantityAlternativeUnion', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('-');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreUnionSubscriberService()
    {
        return $this->services['core_union_subscriber'] = new \Core\UnionBundle\EventListener\UnionSubscriber($this);
    }
    protected function getCoreUnitInStockSubscriberService()
    {
        return $this->services['core_unit_in_stock_subscriber'] = new \Core\LogisticsBundle\EventListener\UnitInStockSubscriber($this);
    }
    protected function getCoreVideoAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\VideoAdmin('core_video_admin', 'Core\\DirectoryBundle\\Entity\\RemoteVideo', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Видео');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreVideoHostingAdminService()
    {
        $instance = new \Core\DirectoryBundle\Admin\VideoHostingAdmin('core_video_hosting_admin', 'Core\\DirectoryBundle\\Entity\\VideoHosting', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Видео-Хостинги');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getCoreYandexApiLogicService()
    {
        return $this->services['core_yandex_api_logic'] = new \Core\ProductBundle\Logic\YandexAPILogic($this->get('templating'), $this->get('doctrine.orm.default_entity_manager'), $this->get('core_config_logic'), array('domain_ru' => 'www.olikids-sam.ru.vm'));
    }
    protected function getDataCollector_LadybugDataCollectorService()
    {
        return $this->services['data_collector.ladybug_data_collector'] = new \RaulFraile\Bundle\LadybugBundle\DataCollector\LadybugDataCollector($this->get('ladybug.dumper'));
    }
    protected function getDebug_EmergencyLoggerListenerService()
    {
        return $this->services['debug.emergency_logger_listener'] = new \Symfony\Component\HttpKernel\EventListener\ErrorsLoggerListener('emergency', $this->get('monolog.logger.emergency', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, array('default' => 'doctrine.dbal.default_connection', 'force_master' => 'doctrine.dbal.force_master_connection'), array('default' => 'doctrine.orm.default_entity_manager', 'force_master' => 'doctrine.orm.force_master_entity_manager'), 'default', 'default');
    }
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory(array('json' => array('class' => 'Sonata\\Doctrine\\Types\\JsonType', 'commented' => true), 'datetime' => array('class' => 'Core\\CommonBundle\\DoctrineExtensions\\DBAL\\Types\\UTCDateTimeType', 'commented' => true)));
    }
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = $this->get('annotation_reader');
        $b = new \Gedmo\Sluggable\SluggableListener();
        $b->setAnnotationReader($a);
        $c = new \Gedmo\Timestampable\TimestampableListener();
        $c->setAnnotationReader($a);
        $d = new \Gedmo\Tree\TreeListener();
        $d->setAnnotationReader($a);
        $e = new \Gedmo\Sortable\SortableListener();
        $e->setAnnotationReader($a);
        $f = new \Gedmo\SoftDeleteable\SoftDeleteableListener();
        $f->setAnnotationReader($a);
        $g = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $g->addEventSubscriber($this->get('stof_doctrine_extensions.listener.blameable'));
        $g->addEventSubscriber($this->get('simplethings_entityaudit.log_revisions_listener'));
        $g->addEventSubscriber($this->get('core_category_subscriber'));
        $g->addEventSubscriber($this->get('core_supplier_price_analysis_subscriber'));
        $g->addEventSubscriber($this->get('core_union_subscriber'));
        $g->addEventSubscriber($this->get('core_product_subscriber'));
        $g->addEventSubscriber($this->get('core_union_composite_product_subscriber'));
        $g->addEventSubscriber($b);
        $g->addEventSubscriber($this->get('core_order_subscriber'));
        $g->addEventSubscriber($this->get('simplethings_entityaudit.create_schema_listener'));
        $g->addEventSubscriber($this->get('core_stock_subscriber'));
        $g->addEventSubscriber($this->get('fos_user.user_listener'));
        $g->addEventSubscriber($this->get('core_supply_subscriber'));
        $g->addEventSubscriber($c);
        $g->addEventSubscriber($this->get('core_unit_in_stock_subscriber'));
        $g->addEventSubscriber($d);
        $g->addEventSubscriber($this->get('sonata.easy_extends.doctrine.mapper'));
        $g->addEventSubscriber($e);
        $g->addEventSubscriber($this->get('stof_doctrine_extensions.listener.loggable'));
        $g->addEventSubscriber($f);
        $g->addEventSubscriber($this->get('core_file_subscriber'));
        $g->addEventSubscriber($this->get('core_payment_subscriber'));
        $g->addEventSubscriber($this->get('core_review_subscriber'));
        $g->addEventSubscriber($this->get('core_slug_history_subscriber'));
        $g->addEventSubscriber($this->get('stof_doctrine_extensions.listener.translatable'));
        return $this->services['doctrine.dbal.default_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('driver' => 'pdo_mysql', 'slaves' => array('slave1' => array('host' => '127.0.0.1', 'port' => 3306, 'dbname' => 'olikids', 'user' => 'root', 'password' => 'root')), 'driverOptions' => array(1002 => 'SET NAMES utf8'), 'master' => array('host' => '127.0.0.1', 'port' => 3306, 'dbname' => 'olikids', 'user' => 'root', 'password' => 'root', 'charset' => 'UTF8'), 'wrapperClass' => 'Doctrine\\DBAL\\Connections\\MasterSlaveConnection'), new \Doctrine\DBAL\Configuration(), $g, array());
    }
    protected function getDoctrine_Dbal_ForceMasterConnectionService()
    {
        $a = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $a->addEventSubscriber($this->get('core_review_subscriber'));
        $a->addEventSubscriber($this->get('fos_user.user_listener'));
        $a->addEventSubscriber($this->get('core_product_subscriber'));
        $a->addEventSubscriber($this->get('core_unit_in_stock_subscriber'));
        $a->addEventSubscriber($this->get('core_category_subscriber'));
        $a->addEventSubscriber($this->get('core_file_subscriber'));
        $a->addEventSubscriber($this->get('core_union_subscriber'));
        $a->addEventSubscriber($this->get('gedmo.listener.softdeleteable'));
        $a->addEventSubscriber($this->get('core_union_composite_product_subscriber'));
        $a->addEventSubscriber($this->get('core_supplier_price_analysis_subscriber'));
        $a->addEventSubscriber($this->get('core_order_subscriber'));
        $a->addEventSubscriber($this->get('sonata.easy_extends.doctrine.mapper'));
        $a->addEventSubscriber($this->get('core_stock_subscriber'));
        $a->addEventSubscriber($this->get('core_payment_subscriber'));
        $a->addEventSubscriber($this->get('core_supply_subscriber'));
        $a->addEventSubscriber($this->get('core_slug_history_subscriber'));
        return $this->services['doctrine.dbal.force_master_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('driver' => 'pdo_mysql', 'host' => '127.0.0.1', 'port' => 3306, 'dbname' => 'olikids', 'user' => 'root', 'password' => 'root', 'charset' => 'UTF8', 'driverOptions' => array(1002 => 'SET NAMES utf8')), new \Doctrine\DBAL\Configuration(), $a, array());
    }
    protected function getDoctrine_Orm_DefaultEntityManagerService()
    {
        $a = $this->get('annotation_reader');
        $b = new \Doctrine\Common\Cache\ApcCache();
        $b->setNamespace('sf2orm_default_90f70a2bb46a3f757f6dadc980315836d22c38bfa9b83d71c2ca8e55dcc3d30a');
        $c = new \Doctrine\Common\Cache\ApcCache();
        $c->setNamespace('sf2orm_default_90f70a2bb46a3f757f6dadc980315836d22c38bfa9b83d71c2ca8e55dcc3d30a');
        $d = new \Doctrine\Common\Cache\MemcacheCache();
        $d->setMemcache($this->get('doctrine.orm.default_memcache_instance'));
        $d->setNamespace('sf2orm_default_90f70a2bb46a3f757f6dadc980315836d22c38bfa9b83d71c2ca8e55dcc3d30a');
        $e = new \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver(array('/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/config/doctrine' => 'Application\\Sonata\\UserBundle\\Entity', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/config/doctrine' => 'FOS\\UserBundle\\Entity', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/config/doctrine' => 'Sonata\\UserBundle\\Entity'));
        $e->setGlobalBasename('mapping');
        $f = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($a, array(0 => '/home/olikids/public_html.sam/src/Core/DirectoryBundle/Entity', 1 => '/home/olikids/public_html.sam/src/Core/FileBundle/Entity', 2 => '/home/olikids/public_html.sam/src/Core/ManufacturerBundle/Entity', 3 => '/home/olikids/public_html.sam/src/Core/CategoryBundle/Entity', 4 => '/home/olikids/public_html.sam/src/Core/OrderBundle/Entity', 5 => '/home/olikids/public_html.sam/src/Core/ProductBundle/Entity', 6 => '/home/olikids/public_html.sam/src/Core/PropertyBundle/Entity', 7 => '/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Entity', 8 => '/home/olikids/public_html.sam/src/Core/PaymentBundle/Entity', 9 => '/home/olikids/public_html.sam/src/Core/FaqBundle/Entity', 10 => '/home/olikids/public_html.sam/src/Core/UnionBundle/Entity', 11 => '/home/olikids/public_html.sam/src/Core/ColorBundle/Entity', 12 => '/home/olikids/public_html.sam/src/Core/LogisticsBundle/Entity', 13 => '/home/olikids/public_html.sam/src/Core/DeliveryBundle/Entity', 14 => '/home/olikids/public_html.sam/src/Core/DiscountsBundle/Entity', 15 => '/home/olikids/public_html.sam/src/Core/ReviewBundle/Entity', 16 => '/home/olikids/public_html.sam/src/Core/ConfigBundle/Entity', 17 => '/home/olikids/public_html.sam/src/Core/StatisticsBundle/Entity', 18 => '/home/olikids/public_html.sam/src/Core/SlugHistoryBundle/Entity', 19 => '/home/olikids/public_html.sam/src/Core/HolidayBundle/Entity', 20 => '/home/olikids/public_html.sam/src/Core/OfficeWorkTimeBundle/Entity', 21 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Translatable/Entity', 22 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Translator/Entity', 23 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Loggable/Entity', 24 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Tree/Entity'));
        $g = new \Doctrine\ORM\Mapping\Driver\DriverChain();
        $g->addDriver($e, 'Application\\Sonata\\UserBundle\\Entity');
        $g->addDriver($e, 'FOS\\UserBundle\\Entity');
        $g->addDriver($e, 'Sonata\\UserBundle\\Entity');
        $g->addDriver($f, 'Core\\DirectoryBundle\\Entity');
        $g->addDriver($f, 'Core\\FileBundle\\Entity');
        $g->addDriver($f, 'Core\\ManufacturerBundle\\Entity');
        $g->addDriver($f, 'Core\\CategoryBundle\\Entity');
        $g->addDriver($f, 'Core\\OrderBundle\\Entity');
        $g->addDriver($f, 'Core\\ProductBundle\\Entity');
        $g->addDriver($f, 'Core\\PropertyBundle\\Entity');
        $g->addDriver($f, 'Core\\TroubleTicketBundle\\Entity');
        $g->addDriver($f, 'Core\\PaymentBundle\\Entity');
        $g->addDriver($f, 'Core\\FaqBundle\\Entity');
        $g->addDriver($f, 'Core\\UnionBundle\\Entity');
        $g->addDriver($f, 'Core\\ColorBundle\\Entity');
        $g->addDriver($f, 'Core\\LogisticsBundle\\Entity');
        $g->addDriver($f, 'Core\\DeliveryBundle\\Entity');
        $g->addDriver($f, 'Core\\DiscountsBundle\\Entity');
        $g->addDriver($f, 'Core\\ReviewBundle\\Entity');
        $g->addDriver($f, 'Core\\ConfigBundle\\Entity');
        $g->addDriver($f, 'Core\\StatisticsBundle\\Entity');
        $g->addDriver($f, 'Core\\SlugHistoryBundle\\Entity');
        $g->addDriver($f, 'Core\\HolidayBundle\\Entity');
        $g->addDriver($f, 'Core\\OfficeWorkTimeBundle\\Entity');
        $g->addDriver($f, 'Gedmo\\Translatable\\Entity');
        $g->addDriver($f, 'Gedmo\\Translator\\Entity');
        $g->addDriver($f, 'Gedmo\\Loggable\\Entity');
        $g->addDriver($f, 'Gedmo\\Tree\\Entity');
        $h = new \Doctrine\ORM\Configuration();
        $h->setEntityNamespaces(array('ApplicationSonataUserBundle' => 'Application\\Sonata\\UserBundle\\Entity', 'CoreDirectoryBundle' => 'Core\\DirectoryBundle\\Entity', 'CoreFileBundle' => 'Core\\FileBundle\\Entity', 'CoreManufacturerBundle' => 'Core\\ManufacturerBundle\\Entity', 'CoreCategoryBundle' => 'Core\\CategoryBundle\\Entity', 'CoreOrderBundle' => 'Core\\OrderBundle\\Entity', 'CoreProductBundle' => 'Core\\ProductBundle\\Entity', 'CorePropertyBundle' => 'Core\\PropertyBundle\\Entity', 'CoreTroubleTicketBundle' => 'Core\\TroubleTicketBundle\\Entity', 'CorePaymentBundle' => 'Core\\PaymentBundle\\Entity', 'CoreFaqBundle' => 'Core\\FaqBundle\\Entity', 'FOSUserBundle' => 'FOS\\UserBundle\\Entity', 'CoreUnionBundle' => 'Core\\UnionBundle\\Entity', 'CoreColorBundle' => 'Core\\ColorBundle\\Entity', 'CoreLogisticsBundle' => 'Core\\LogisticsBundle\\Entity', 'CoreDeliveryBundle' => 'Core\\DeliveryBundle\\Entity', 'CoreDiscountsBundle' => 'Core\\DiscountsBundle\\Entity', 'CoreReviewBundle' => 'Core\\ReviewBundle\\Entity', 'CoreConfigBundle' => 'Core\\ConfigBundle\\Entity', 'CoreStatisticsBundle' => 'Core\\StatisticsBundle\\Entity', 'CoreSlugHistoryBundle' => 'Core\\SlugHistoryBundle\\Entity', 'CoreHolidayBundle' => 'Core\\HolidayBundle\\Entity', 'CoreOfficeWorkTimeBundle' => 'Core\\OfficeWorkTimeBundle\\Entity', 'SonataUserBundle' => 'Sonata\\UserBundle\\Entity', 'GedmoTranslatable' => 'Gedmo\\Translatable\\Entity', 'GedmoTranslator' => 'Gedmo\\Translator\\Entity', 'GedmoLoggable' => 'Gedmo\\Loggable\\Entity', 'GedmoTree' => 'Gedmo\\Tree\\Entity'));
        $h->setMetadataCacheImpl($b);
        $h->setQueryCacheImpl($c);
        $h->setResultCacheImpl($d);
        $h->setMetadataDriverImpl($g);
        $h->setProxyDir('/home/olikids/public_html.sam/app/cache/prod/doctrine/orm/Proxies');
        $h->setProxyNamespace('Proxies');
        $h->setAutoGenerateProxyClasses(false);
        $h->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $h->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $h->setNamingStrategy($this->get('doctrine.orm.naming_strategy.default'));
        $h->addFilter('softdeleteable', 'Gedmo\\SoftDeleteable\\Filter\\SoftDeleteableFilter');
        $this->services['doctrine.orm.default_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create($this->get('doctrine.dbal.default_connection'), $h);
        $this->get('doctrine.orm.default_manager_configurator')->configure($instance);
        return $instance;
    }
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(0 => 'softdeleteable'), array());
    }
    protected function getDoctrine_Orm_DefaultMemcacheInstanceService()
    {
        $this->services['doctrine.orm.default_memcache_instance'] = $instance = new \Memcache();
        $instance->connect('localhost', 11211);
        return $instance;
    }
    protected function getDoctrine_Orm_ForceMasterEntityManagerService()
    {
        $a = $this->get('annotation_reader');
        $b = new \Doctrine\Common\Cache\ApcCache();
        $b->setNamespace('sf2orm_force_master_90f70a2bb46a3f757f6dadc980315836d22c38bfa9b83d71c2ca8e55dcc3d30a');
        $c = new \Doctrine\Common\Cache\ApcCache();
        $c->setNamespace('sf2orm_force_master_90f70a2bb46a3f757f6dadc980315836d22c38bfa9b83d71c2ca8e55dcc3d30a');
        $d = new \Doctrine\Common\Cache\MemcacheCache();
        $d->setMemcache($this->get('doctrine.orm.force_master_memcache_instance'));
        $d->setNamespace('sf2orm_force_master_90f70a2bb46a3f757f6dadc980315836d22c38bfa9b83d71c2ca8e55dcc3d30a');
        $e = new \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver(array('/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/config/doctrine' => 'Application\\Sonata\\UserBundle\\Entity', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/config/doctrine' => 'FOS\\UserBundle\\Entity', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/config/doctrine' => 'Sonata\\UserBundle\\Entity'));
        $e->setGlobalBasename('mapping');
        $f = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($a, array(0 => '/home/olikids/public_html.sam/src/Core/DirectoryBundle/Entity', 1 => '/home/olikids/public_html.sam/src/Core/FileBundle/Entity', 2 => '/home/olikids/public_html.sam/src/Core/ManufacturerBundle/Entity', 3 => '/home/olikids/public_html.sam/src/Core/CategoryBundle/Entity', 4 => '/home/olikids/public_html.sam/src/Core/OrderBundle/Entity', 5 => '/home/olikids/public_html.sam/src/Core/ProductBundle/Entity', 6 => '/home/olikids/public_html.sam/src/Core/PropertyBundle/Entity', 7 => '/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Entity', 8 => '/home/olikids/public_html.sam/src/Core/PaymentBundle/Entity', 9 => '/home/olikids/public_html.sam/src/Core/FaqBundle/Entity', 10 => '/home/olikids/public_html.sam/src/Core/UnionBundle/Entity', 11 => '/home/olikids/public_html.sam/src/Core/ColorBundle/Entity', 12 => '/home/olikids/public_html.sam/src/Core/LogisticsBundle/Entity', 13 => '/home/olikids/public_html.sam/src/Core/DeliveryBundle/Entity', 14 => '/home/olikids/public_html.sam/src/Core/DiscountsBundle/Entity', 15 => '/home/olikids/public_html.sam/src/Core/ReviewBundle/Entity', 16 => '/home/olikids/public_html.sam/src/Core/ConfigBundle/Entity', 17 => '/home/olikids/public_html.sam/src/Core/StatisticsBundle/Entity', 18 => '/home/olikids/public_html.sam/src/Core/SlugHistoryBundle/Entity', 19 => '/home/olikids/public_html.sam/src/Core/HolidayBundle/Entity', 20 => '/home/olikids/public_html.sam/src/Core/OfficeWorkTimeBundle/Entity', 21 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Translatable/Entity', 22 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Translator/Entity', 23 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Loggable/Entity', 24 => '/home/olikids/public_html.sam/vendor/gedmo/doctrine-extensions/lib/Gedmo/Tree/Entity'));
        $g = new \Doctrine\ORM\Mapping\Driver\DriverChain();
        $g->addDriver($e, 'Application\\Sonata\\UserBundle\\Entity');
        $g->addDriver($e, 'FOS\\UserBundle\\Entity');
        $g->addDriver($e, 'Sonata\\UserBundle\\Entity');
        $g->addDriver($f, 'Core\\DirectoryBundle\\Entity');
        $g->addDriver($f, 'Core\\FileBundle\\Entity');
        $g->addDriver($f, 'Core\\ManufacturerBundle\\Entity');
        $g->addDriver($f, 'Core\\CategoryBundle\\Entity');
        $g->addDriver($f, 'Core\\OrderBundle\\Entity');
        $g->addDriver($f, 'Core\\ProductBundle\\Entity');
        $g->addDriver($f, 'Core\\PropertyBundle\\Entity');
        $g->addDriver($f, 'Core\\TroubleTicketBundle\\Entity');
        $g->addDriver($f, 'Core\\PaymentBundle\\Entity');
        $g->addDriver($f, 'Core\\FaqBundle\\Entity');
        $g->addDriver($f, 'Core\\UnionBundle\\Entity');
        $g->addDriver($f, 'Core\\ColorBundle\\Entity');
        $g->addDriver($f, 'Core\\LogisticsBundle\\Entity');
        $g->addDriver($f, 'Core\\DeliveryBundle\\Entity');
        $g->addDriver($f, 'Core\\DiscountsBundle\\Entity');
        $g->addDriver($f, 'Core\\ReviewBundle\\Entity');
        $g->addDriver($f, 'Core\\ConfigBundle\\Entity');
        $g->addDriver($f, 'Core\\StatisticsBundle\\Entity');
        $g->addDriver($f, 'Core\\SlugHistoryBundle\\Entity');
        $g->addDriver($f, 'Core\\HolidayBundle\\Entity');
        $g->addDriver($f, 'Core\\OfficeWorkTimeBundle\\Entity');
        $g->addDriver($f, 'Gedmo\\Translatable\\Entity');
        $g->addDriver($f, 'Gedmo\\Translator\\Entity');
        $g->addDriver($f, 'Gedmo\\Loggable\\Entity');
        $g->addDriver($f, 'Gedmo\\Tree\\Entity');
        $h = new \Doctrine\ORM\Configuration();
        $h->setEntityNamespaces(array('ApplicationSonataUserBundle' => 'Application\\Sonata\\UserBundle\\Entity', 'CoreDirectoryBundle' => 'Core\\DirectoryBundle\\Entity', 'CoreFileBundle' => 'Core\\FileBundle\\Entity', 'CoreManufacturerBundle' => 'Core\\ManufacturerBundle\\Entity', 'CoreCategoryBundle' => 'Core\\CategoryBundle\\Entity', 'CoreOrderBundle' => 'Core\\OrderBundle\\Entity', 'CoreProductBundle' => 'Core\\ProductBundle\\Entity', 'CorePropertyBundle' => 'Core\\PropertyBundle\\Entity', 'CoreTroubleTicketBundle' => 'Core\\TroubleTicketBundle\\Entity', 'CorePaymentBundle' => 'Core\\PaymentBundle\\Entity', 'CoreFaqBundle' => 'Core\\FaqBundle\\Entity', 'FOSUserBundle' => 'FOS\\UserBundle\\Entity', 'CoreUnionBundle' => 'Core\\UnionBundle\\Entity', 'CoreColorBundle' => 'Core\\ColorBundle\\Entity', 'CoreLogisticsBundle' => 'Core\\LogisticsBundle\\Entity', 'CoreDeliveryBundle' => 'Core\\DeliveryBundle\\Entity', 'CoreDiscountsBundle' => 'Core\\DiscountsBundle\\Entity', 'CoreReviewBundle' => 'Core\\ReviewBundle\\Entity', 'CoreConfigBundle' => 'Core\\ConfigBundle\\Entity', 'CoreStatisticsBundle' => 'Core\\StatisticsBundle\\Entity', 'CoreSlugHistoryBundle' => 'Core\\SlugHistoryBundle\\Entity', 'CoreHolidayBundle' => 'Core\\HolidayBundle\\Entity', 'CoreOfficeWorkTimeBundle' => 'Core\\OfficeWorkTimeBundle\\Entity', 'SonataUserBundle' => 'Sonata\\UserBundle\\Entity', 'GedmoTranslatable' => 'Gedmo\\Translatable\\Entity', 'GedmoTranslator' => 'Gedmo\\Translator\\Entity', 'GedmoLoggable' => 'Gedmo\\Loggable\\Entity', 'GedmoTree' => 'Gedmo\\Tree\\Entity'));
        $h->setMetadataCacheImpl($b);
        $h->setQueryCacheImpl($c);
        $h->setResultCacheImpl($d);
        $h->setMetadataDriverImpl($g);
        $h->setProxyDir('/home/olikids/public_html.sam/app/cache/prod/doctrine/orm/Proxies');
        $h->setProxyNamespace('Proxies');
        $h->setAutoGenerateProxyClasses(false);
        $h->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $h->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $h->setNamingStrategy($this->get('doctrine.orm.naming_strategy.default'));
        $h->addFilter('softdeleteable', 'Gedmo\\SoftDeleteable\\Filter\\SoftDeleteableFilter');
        $this->services['doctrine.orm.force_master_entity_manager'] = $instance = \Doctrine\ORM\EntityManager::create($this->get('doctrine.dbal.force_master_connection'), $h);
        $this->get('doctrine.orm.force_master_manager_configurator')->configure($instance);
        return $instance;
    }
    protected function getDoctrine_Orm_ForceMasterManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.force_master_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(0 => 'softdeleteable'), array());
    }
    protected function getDoctrine_Orm_ForceMasterMemcacheInstanceService()
    {
        $this->services['doctrine.orm.force_master_memcache_instance'] = $instance = new \Memcache();
        $instance->connect('localhost', 11211);
        return $instance;
    }
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->services['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator($this->get('doctrine'));
    }
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer($this->get('doctrine'));
    }
    protected function getElfinderLoaderService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('elfinder_loader', 'request');
        }
        return $this->services['elfinder_loader'] = $this->scopedServices['request']['elfinder_loader'] = new \FM\ElfinderBundle\Loader\FMElfinderLoader(array('locale' => 'ru', 'editor' => 'ckeditor', 'fullscreen' => true, 'include_assets' => true, 'compression' => false, 'connector' => array('debug' => false, 'roots' => array('uploads' => array('driver' => 'LocalFileSystem', 'path' => 'uploads/files', 'upload_allow' => array(0 => 'image/png', 1 => 'image/jpg', 2 => 'image/jpeg', 3 => 'text/xml', 4 => 'text/plain', 5 => 'application/msword', 6 => 'video/mpeg', 7 => 'video/mp4', 8 => 'video/ogg', 9 => 'video/quicktime', 10 => 'video/webm', 11 => 'video/x-ms-wmv', 12 => 'video/x-flv'), 'upload_deny' => array(0 => 'all'), 'upload_max_size' => '100M', 'showhidden' => false, 'relative_url' => false))), 'tinymce_popup_path' => ''), $this->get('request'));
    }
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.paginate', 1 => 'before'), 0);
        $instance->addListenerService('knp_pager.pagination', array(0 => 'knp_paginator.subscriber.paginate', 1 => 'pagination'), 0);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.sortable', 1 => 'before'), 1);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.filtration', 1 => 'before'), 1);
        $instance->addListenerService('knp_pager.pagination', array(0 => 'knp_paginator.subscriber.sliding_pagination', 1 => 'pagination'), 1);
        $instance->addListenerService('presta_sitemap.populate', array(0 => 'core_common_sitemap_listener', 1 => 'populateSitemap'));
        $instance->addListenerService('presta_sitemap.populate', array(0 => 'presta_sitemap.eventlistener.route_annotation', 1 => 'populateSitemap'));
        $instance->addListenerService('security.interactive_login', array(0 => 'application_sonata_user.listener.login', 1 => 'onSecurityInteractiveLogin'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'application_sonata_user.listener.redirect', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_product_format_twig_extension', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_product_logic', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_property_filter_logic', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('core_file_image.file_upload', array(0 => 'core_admin_trouble_ticket_file_listener', 1 => 'onFileUpload'), 255);
        $instance->addListenerService('core_file_image.file_delete', array(0 => 'core_admin_trouble_ticket_file_listener', 1 => 'onFileDelete'), 255);
        $instance->addListenerService('security.interactive_login', array(0 => 'fos_user.security.interactive_login_listener', 1 => 'onSecurityInteractiveLogin'), 0);
        $instance->addListenerService('kernel.response', array(0 => 'sonata.block.cache.handler.default', 1 => 'onKernelResponse'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'knp_menu.listener.voters', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'simplethings_entityaudit.request.current_user_listener', 1 => 'handle'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'knp_paginator.subscriber.sliding_pagination', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_common_money_twig_extension', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_common_twig_extension', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('core_file_image.not_finished_order_create_update', array(0 => 'core_statistics_not_finished_order_listener', 1 => 'onNotFinishedOrderCreateUpdate'), 255);
        $instance->addListenerService('core_statistics.not_finished_order_delete', array(0 => 'core_statistics_not_finished_order_listener', 1 => 'onNotFinishedOrderDelete'), 255);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_robokassa', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_yandexmoney', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_plasticcard', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_plasticcardterminal', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_banktransfer', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_paymentondelivery', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_payment_logic_paypal', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'ladybug.event_listener.ladybug_config_listener', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_review_logic', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'core_review_twig_extension', 1 => 'onKernelRequest'), 0);
        $instance->addListenerService('kernel.response', array(0 => 'core_slug_history_logic', 1 => 'onKernelResponse'), 0);
        $instance->addSubscriberService('response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener');
        $instance->addSubscriberService('streamed_response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener');
        $instance->addSubscriberService('locale_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener');
        $instance->addSubscriberService('debug.emergency_logger_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorsLoggerListener');
        $instance->addSubscriberService('session_listener', 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('security.firewall', 'Symfony\\Component\\Security\\Http\\Firewall');
        $instance->addSubscriberService('security.rememberme.response_listener', 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener');
        $instance->addSubscriberService('twig.exception_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener');
        $instance->addSubscriberService('swiftmailer.email_sender.listener', 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener');
        $instance->addSubscriberService('sensio_framework_extra.controller.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener');
        $instance->addSubscriberService('sensio_framework_extra.converter.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener');
        $instance->addSubscriberService('sensio_framework_extra.view.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener');
        $instance->addSubscriberService('sensio_framework_extra.cache.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\CacheListener');
        $instance->addSubscriberService('stof_doctrine_extensions.event_listener.locale', 'Stof\\DoctrineExtensionsBundle\\EventListener\\LocaleListener');
        $instance->addSubscriberService('stof_doctrine_extensions.event_listener.logger', 'Stof\\DoctrineExtensionsBundle\\EventListener\\LoggerListener');
        $instance->addSubscriberService('stof_doctrine_extensions.event_listener.blame', 'Stof\\DoctrineExtensionsBundle\\EventListener\\BlameListener');
        return $instance;
    }
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), '/home/olikids/public_html.sam/app/Resources');
    }
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }
    protected function getForm_CsrfProviderService()
    {
        return $this->services['form.csrf_provider'] = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfTokenManagerAdapter($this->get('security.csrf.token_manager'));
    }
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory($this->get('form.registry'), $this->get('form.resolved_type_factory'));
    }
    protected function getForm_RegistryService()
    {
        return $this->services['form.registry'] = new \Symfony\Component\Form\FormRegistry(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension($this, array('application_user_registration' => 'application_user.registration.form.type', 'application_user_profile' => 'application_user.profile.form.type', 'kpp_type' => 'application_user_contragent_admin_kpp_form', 'onec_type' => 'application_user_contragent_admin_onec_form', 'contragent_email_type' => 'application_user_contragent_admin_email_form', 'subclasses_type' => 'application_user_contragent_admin_subclass_form', 'balance_history' => 'application_user_contragent_balance_history', 'indi_contact_form' => 'application_user_indi_contact_form_type', 'legal_contact_form' => 'application_user_legal_contact_form_type', 'legal_contragent_form' => 'application_user_contragent_legal', 'indi_contragent_form' => 'application_user_contragent_indi_form_type', 'admin_date_range' => 'application_sonata_admin_date_range_form', 'product_modifications' => 'core_shop_modification_form_type', 'category_main' => 'core_shop_category_main_form_type', 'manufacturer_main' => 'core_shop_manufacturer_main_form_type', 'category' => 'core_shop_category_form_type', 'property' => 'core_shop_property_form_type', 'property_category' => 'core_shop_property_category_form_type', 'filter_name_type' => 'core_directory_filter_name_type', 'filter_capitals_type' => 'core_directory_filter_capitals_type', 'product_tags_type' => 'core_directory_product_tags', 'remote_video_form' => 'core_directory_remote_video_type', 'remote_video_form_frontend' => 'core_directory_remote_video_type_frontend', 'trouble_ticket_message' => 'core_admin_trouble_ticket_message_form', 'full_text' => 'core_admin_trouble_ticket_full_text_form', 'union' => 'core_union_form_type', 'products_in_order' => 'core_order_products_in_order_type', 'unit_serial_number' => 'core_order_unit_serial_number_type', 'boxes_and_waybills_type' => 'core_order_boxes_and_waybills_type', 'waybills_in_order' => 'core_order_waybills_type', 'boxes_in_order' => 'core_order_boxes_type', 'canceled_status' => 'core_order_canceled_reason_type', 'extra_status' => 'core_order_extra_status_type', 'cart_buyer_recipient' => 'core_order_buyer_recipient_info_form', 'cart_recipient_with_extra_data' => 'core_order_recipient_with_extra_data_form', 'pre_order_form' => 'core_pre_order_form', 'pre_order_composition_form' => 'core_pre_order_composition_form', 'products_in_transit' => 'core_logistics_products_in_transit_type', 'unit_in_stock_defect' => 'core_logistics_unit_in_stock_defect_type', 'config_data' => 'core_config_data_form_type', 'form' => 'form.type.form', 'birthday' => 'form.type.birthday', 'checkbox' => 'form.type.checkbox', 'choice' => 'form.type.choice', 'collection' => 'form.type.collection', 'country' => 'form.type.country', 'date' => 'form.type.date', 'datetime' => 'form.type.datetime', 'email' => 'form.type.email', 'file' => 'form.type.file', 'hidden' => 'form.type.hidden', 'integer' => 'form.type.integer', 'language' => 'form.type.language', 'locale' => 'form.type.locale', 'money' => 'form.type.money', 'number' => 'form.type.number', 'password' => 'form.type.password', 'percent' => 'form.type.percent', 'radio' => 'form.type.radio', 'repeated' => 'form.type.repeated', 'search' => 'form.type.search', 'textarea' => 'form.type.textarea', 'text' => 'form.type.text', 'time' => 'form.type.time', 'timezone' => 'form.type.timezone', 'url' => 'form.type.url', 'button' => 'form.type.button', 'submit' => 'form.type.submit', 'reset' => 'form.type.reset', 'currency' => 'form.type.currency', 'entity' => 'form.type.entity', 'fos_user_username' => 'fos_user.username_form_type', 'fos_user_profile' => 'fos_user.profile.form.type', 'fos_user_registration' => 'fos_user.registration.form.type', 'fos_user_change_password' => 'fos_user.change_password.form.type', 'fos_user_resetting' => 'fos_user.resetting.form.type', 'sonata_type_admin' => 'sonata.admin.form.type.admin', 'sonata_type_model' => 'sonata.admin.form.type.model_choice', 'sonata_type_model_list' => 'sonata.admin.form.type.model_list', 'sonata_type_model_reference' => 'sonata.admin.form.type.model_reference', 'sonata_type_model_hidden' => 'sonata.admin.form.type.model_hidden', 'sonata_type_filter_number' => 'sonata.admin.form.filter.type.number', 'sonata_type_filter_choice' => 'sonata.admin.form.filter.type.choice', 'sonata_type_filter_default' => 'sonata.admin.form.filter.type.default', 'sonata_type_filter_date' => 'sonata.admin.form.filter.type.date', 'sonata_type_filter_date_range' => 'sonata.admin.form.filter.type.daterange', 'sonata_type_filter_datetime' => 'sonata.admin.form.filter.type.datetime', 'sonata_type_filter_datetime_range' => 'sonata.admin.form.filter.type.datetime_range', 'sonata_type_immutable_array' => 'sonata.core.form.type.array', 'sonata_type_boolean' => 'sonata.core.form.type.boolean', 'sonata_type_collection' => 'sonata.core.form.type.collection', 'sonata_type_translatable_choice' => 'sonata.core.form.type.translatable_choice', 'sonata_type_date_range' => 'sonata.core.form.type.date_range', 'sonata_type_datetime_range' => 'sonata.core.form.type.datetime_range', 'sonata_type_date_picker' => 'sonata.core.form.type.date_picker', 'sonata_type_datetime_picker' => 'sonata.core.form.type.datetime_picker', 'sonata_type_equal' => 'sonata.core.form.type.equal', 'sonata_block_service_choice' => 'sonata.block.form.type.block', 'sonata_type_container_template_choice' => 'sonata.block.form.type.container_template', 'sonata_formatter_type' => 'sonata.formatter.form.type.selector', 'ckeditor' => 'ivory_ck_editor.form.type', 'sonata_security_roles' => 'sonata.user.form.type.security_roles', 'sonata_user_profile' => 'sonata.user.profile.form.type', 'sonata_user_gender' => 'sonata.user.form.gender_list', 'ajax_entity' => 'core_common_ajax_entity_type', 'tree_select' => 'core_common_tree_select_form_type', 'hidden_entity_form' => 'core_common_hidden_entity_form_type', 'multiupload_image' => 'core_file_form_multiupload_image', 'multiupload_document' => 'core_file_form_multiupload_document', 'multiupload_file_frontend' => 'core_file_form_multiupload_file_fronend', 'textCase' => 'language_text_case_form', 'admin_form_type_color' => 'core_admin_form_type_color', 'colorpicker' => 'core_color_colorpicker', 'captcha' => 'captcha.type', 'core_payment_type_payment_system' => 'core_payment_form_type_payment_system', 'star_rating' => 'core_review_star_rating', 'shtumi_ajax_autocomplete' => 'shtumi.useful.type.ajax_autocomplete', 'shtumi_select2_entity' => 'shtumi.useful.type.select2_entity', 'shtumi_dependent_filtered_entity' => 'shtumi.useful.type.dependent_filtered_entity', 'shtumi_dependent_filtered_select2' => 'shtumi.useful.type.dependent_filtered_select2', 'shtumi_ajaxfile' => 'shtumi.useful.type.ajax_file', 'shtumi_daterange' => 'shtumi.useful.type.daterange', 'slug_history' => 'core_slug_history_form'), array('form' => array(0 => 'form.type_extension.form.http_foundation', 1 => 'form.type_extension.form.validator', 2 => 'form.type_extension.csrf', 3 => 'sonata.admin.form.extension.field'), 'repeated' => array(0 => 'form.type_extension.repeated.validator'), 'submit' => array(0 => 'form.type_extension.submit.validator')), array(0 => 'form.type_guesser.validator', 1 => 'form.type_guesser.doctrine'))), $this->get('form.resolved_type_factory'));
    }
    protected function getForm_ResolvedTypeFactoryService()
    {
        return $this->services['form.resolved_type_factory'] = new \Symfony\Component\Form\ResolvedFormTypeFactory();
    }
    protected function getForm_Type_BirthdayService()
    {
        return $this->services['form.type.birthday'] = new \Symfony\Component\Form\Extension\Core\Type\BirthdayType();
    }
    protected function getForm_Type_ButtonService()
    {
        return $this->services['form.type.button'] = new \Symfony\Component\Form\Extension\Core\Type\ButtonType();
    }
    protected function getForm_Type_CheckboxService()
    {
        return $this->services['form.type.checkbox'] = new \Symfony\Component\Form\Extension\Core\Type\CheckboxType();
    }
    protected function getForm_Type_ChoiceService()
    {
        return $this->services['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType();
    }
    protected function getForm_Type_CollectionService()
    {
        return $this->services['form.type.collection'] = new \Symfony\Component\Form\Extension\Core\Type\CollectionType();
    }
    protected function getForm_Type_CountryService()
    {
        return $this->services['form.type.country'] = new \Symfony\Component\Form\Extension\Core\Type\CountryType();
    }
    protected function getForm_Type_CurrencyService()
    {
        return $this->services['form.type.currency'] = new \Symfony\Component\Form\Extension\Core\Type\CurrencyType();
    }
    protected function getForm_Type_DateService()
    {
        return $this->services['form.type.date'] = new \Symfony\Component\Form\Extension\Core\Type\DateType();
    }
    protected function getForm_Type_DatetimeService()
    {
        return $this->services['form.type.datetime'] = new \Symfony\Component\Form\Extension\Core\Type\DateTimeType();
    }
    protected function getForm_Type_EmailService()
    {
        return $this->services['form.type.email'] = new \Symfony\Component\Form\Extension\Core\Type\EmailType();
    }
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType($this->get('doctrine'));
    }
    protected function getForm_Type_FileService()
    {
        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType();
    }
    protected function getForm_Type_FormService()
    {
        return $this->services['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType($this->get('property_accessor'));
    }
    protected function getForm_Type_HiddenService()
    {
        return $this->services['form.type.hidden'] = new \Symfony\Component\Form\Extension\Core\Type\HiddenType();
    }
    protected function getForm_Type_IntegerService()
    {
        return $this->services['form.type.integer'] = new \Symfony\Component\Form\Extension\Core\Type\IntegerType();
    }
    protected function getForm_Type_LanguageService()
    {
        return $this->services['form.type.language'] = new \Symfony\Component\Form\Extension\Core\Type\LanguageType();
    }
    protected function getForm_Type_LocaleService()
    {
        return $this->services['form.type.locale'] = new \Symfony\Component\Form\Extension\Core\Type\LocaleType();
    }
    protected function getForm_Type_MoneyService()
    {
        return $this->services['form.type.money'] = new \Core\CommonBundle\Form\Type\MoneyType('RUB', 'ru');
    }
    protected function getForm_Type_NumberService()
    {
        return $this->services['form.type.number'] = new \Symfony\Component\Form\Extension\Core\Type\NumberType();
    }
    protected function getForm_Type_PasswordService()
    {
        return $this->services['form.type.password'] = new \Symfony\Component\Form\Extension\Core\Type\PasswordType();
    }
    protected function getForm_Type_PercentService()
    {
        return $this->services['form.type.percent'] = new \Symfony\Component\Form\Extension\Core\Type\PercentType();
    }
    protected function getForm_Type_RadioService()
    {
        return $this->services['form.type.radio'] = new \Symfony\Component\Form\Extension\Core\Type\RadioType();
    }
    protected function getForm_Type_RepeatedService()
    {
        return $this->services['form.type.repeated'] = new \Symfony\Component\Form\Extension\Core\Type\RepeatedType();
    }
    protected function getForm_Type_ResetService()
    {
        return $this->services['form.type.reset'] = new \Symfony\Component\Form\Extension\Core\Type\ResetType();
    }
    protected function getForm_Type_SearchService()
    {
        return $this->services['form.type.search'] = new \Symfony\Component\Form\Extension\Core\Type\SearchType();
    }
    protected function getForm_Type_SubmitService()
    {
        return $this->services['form.type.submit'] = new \Symfony\Component\Form\Extension\Core\Type\SubmitType();
    }
    protected function getForm_Type_TextService()
    {
        return $this->services['form.type.text'] = new \Symfony\Component\Form\Extension\Core\Type\TextType();
    }
    protected function getForm_Type_TextareaService()
    {
        return $this->services['form.type.textarea'] = new \Symfony\Component\Form\Extension\Core\Type\TextareaType();
    }
    protected function getForm_Type_TimeService()
    {
        return $this->services['form.type.time'] = new \Symfony\Component\Form\Extension\Core\Type\TimeType();
    }
    protected function getForm_Type_TimezoneService()
    {
        return $this->services['form.type.timezone'] = new \Symfony\Component\Form\Extension\Core\Type\TimezoneType();
    }
    protected function getForm_Type_UrlService()
    {
        return $this->services['form.type.url'] = new \Symfony\Component\Form\Extension\Core\Type\UrlType();
    }
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->services['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension($this->get('form.csrf_provider'), true, '_token', $this->get('translator.default'), 'validators');
    }
    protected function getForm_TypeExtension_Form_HttpFoundationService()
    {
        return $this->services['form.type_extension.form.http_foundation'] = new \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension(new \Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler());
    }
    protected function getForm_TypeExtension_Form_ValidatorService()
    {
        return $this->services['form.type_extension.form.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension($this->get('validator'));
    }
    protected function getForm_TypeExtension_Repeated_ValidatorService()
    {
        return $this->services['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension();
    }
    protected function getForm_TypeExtension_Submit_ValidatorService()
    {
        return $this->services['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension();
    }
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser($this->get('doctrine'));
    }
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser($this->get('validator'));
    }
    protected function getFosUser_ChangePassword_FormService()
    {
        return $this->services['fos_user.change_password.form'] = $this->get('form.factory')->createNamed('fos_user_change_password_form', 'fos_user_change_password', NULL, array('validation_groups' => array(0 => 'ApplicationChangePassword', 1 => 'Default')));
    }
    protected function getFosUser_ChangePassword_Form_Handler_DefaultService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.change_password.form.handler.default', 'request');
        }
        return $this->services['fos_user.change_password.form.handler.default'] = $this->scopedServices['request']['fos_user.change_password.form.handler.default'] = new \FOS\UserBundle\Form\Handler\ChangePasswordFormHandler($this->get('fos_user.change_password.form'), $this->get('request'), $this->get('fos_user.user_manager'));
    }
    protected function getFosUser_ChangePassword_Form_TypeService()
    {
        return $this->services['fos_user.change_password.form.type'] = new \FOS\UserBundle\Form\Type\ChangePasswordFormType();
    }
    protected function getFosUser_MailerService()
    {
        return $this->services['fos_user.mailer'] = new \FOS\UserBundle\Mailer\Mailer($this->get('swiftmailer.mailer.default'), $this->get('router'), $this->get('templating'), array('confirmation.template' => 'FOSUserBundle:Registration:email.txt.twig', 'resetting.template' => 'FOSUserBundle:Resetting:email.txt.twig', 'from_email' => array('confirmation' => array('saintrain@mail.ru' => 'saintrain@mail.ru'), 'resetting' => array('saintrain@mail.ru' => 'saintrain@mail.ru'))));
    }
    protected function getFosUser_Profile_FormService()
    {
        return $this->services['fos_user.profile.form'] = $this->get('form.factory')->createNamed('fos_user_profile_form', 'application_user_profile', NULL, array('validation_groups' => array(0 => 'ApplicationProfile', 1 => 'Default')));
    }
    protected function getFosUser_Profile_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.profile.form.handler', 'request');
        }
        $this->services['fos_user.profile.form.handler'] = $this->scopedServices['request']['fos_user.profile.form.handler'] = $instance = new \Application\Sonata\UserBundle\Form\Handler\ProfileFormHandler($this->get('fos_user.profile.form'), $this->get('request'), $this->get('fos_user.user_manager'));
        $instance->setMailer($this->get('applaction_user_mailer'));
        $instance->setSession($this->get('session'));
        return $instance;
    }
    protected function getFosUser_Profile_Form_TypeService()
    {
        return $this->services['fos_user.profile.form.type'] = new \FOS\UserBundle\Form\Type\ProfileFormType('Application\\Sonata\\UserBundle\\Entity\\User');
    }
    protected function getFosUser_Registration_FormService()
    {
        return $this->services['fos_user.registration.form'] = $this->get('form.factory')->createNamed('fos_user_registration_form', 'application_user_registration', NULL, array('validation_groups' => array(0 => 'ApplicationRegistration', 1 => 'Default')));
    }
    protected function getFosUser_Registration_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.registration.form.handler', 'request');
        }
        return $this->services['fos_user.registration.form.handler'] = $this->scopedServices['request']['fos_user.registration.form.handler'] = new \Application\Sonata\UserBundle\Form\Handler\RegistrationFormHandler($this->get('fos_user.registration.form'), $this->get('request'), $this->get('fos_user.user_manager'), $this->get('fos_user.mailer'), $this->get('fos_user.util.token_generator'));
    }
    protected function getFosUser_Registration_Form_TypeService()
    {
        return $this->services['fos_user.registration.form.type'] = new \FOS\UserBundle\Form\Type\RegistrationFormType('Application\\Sonata\\UserBundle\\Entity\\User');
    }
    protected function getFosUser_Resetting_FormService()
    {
        return $this->services['fos_user.resetting.form'] = $this->get('form.factory')->createNamed('fos_user_resetting_form', 'fos_user_resetting', NULL, array('validation_groups' => array(0 => 'ApplicationResetPassword', 1 => 'Default')));
    }
    protected function getFosUser_Resetting_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('fos_user.resetting.form.handler', 'request');
        }
        return $this->services['fos_user.resetting.form.handler'] = $this->scopedServices['request']['fos_user.resetting.form.handler'] = new \Application\Sonata\UserBundle\Form\Handler\ResettingFormHandler($this->get('fos_user.resetting.form'), $this->get('request'), $this->get('fos_user.user_manager'));
    }
    protected function getFosUser_Resetting_Form_TypeService()
    {
        return $this->services['fos_user.resetting.form.type'] = new \FOS\UserBundle\Form\Type\ResettingFormType();
    }
    protected function getFosUser_Security_InteractiveLoginListenerService()
    {
        return $this->services['fos_user.security.interactive_login_listener'] = new \FOS\UserBundle\Security\InteractiveLoginListener($this->get('fos_user.user_manager'));
    }
    protected function getFosUser_Security_LoginManagerService()
    {
        return $this->services['fos_user.security.login_manager'] = new \FOS\UserBundle\Security\LoginManager($this->get('security.context'), $this->get('security.user_checker'), $this->get('security.authentication.session_strategy'), $this);
    }
    protected function getFosUser_UserManagerService()
    {
        $a = $this->get('fos_user.util.email_canonicalizer');
        return $this->services['fos_user.user_manager'] = new \FOS\UserBundle\Doctrine\UserManager($this->get('security.encoder_factory'), $a, $a, $this->get('doctrine')->getManager(NULL), 'Application\\Sonata\\UserBundle\\Entity\\User');
    }
    protected function getFosUser_UsernameFormTypeService()
    {
        return $this->services['fos_user.username_form_type'] = new \FOS\UserBundle\Form\Type\UsernameFormType(new \FOS\UserBundle\Form\DataTransformer\UserToUsernameTransformer($this->get('fos_user.user_manager')));
    }
    protected function getFosUser_Util_EmailCanonicalizerService()
    {
        return $this->services['fos_user.util.email_canonicalizer'] = new \FOS\UserBundle\Util\Canonicalizer();
    }
    protected function getFosUser_Util_TokenGeneratorService()
    {
        return $this->services['fos_user.util.token_generator'] = new \FOS\UserBundle\Util\TokenGenerator($this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getFosUser_Util_UserManipulatorService()
    {
        return $this->services['fos_user.util.user_manipulator'] = new \FOS\UserBundle\Util\UserManipulator($this->get('fos_user.user_manager'));
    }
    protected function getFragment_HandlerService()
    {
        $this->services['fragment.handler'] = $instance = new \Symfony\Component\HttpKernel\Fragment\FragmentHandler(array(), false, $this->get('request_stack'));
        $instance->addRenderer($this->get('fragment.renderer.inline'));
        $instance->addRenderer($this->get('fragment.renderer.hinclude'));
        $instance->addRenderer($this->get('fragment.renderer.esi'));
        return $instance;
    }
    protected function getFragment_Renderer_EsiService()
    {
        $this->services['fragment.renderer.esi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getFragment_Renderer_HincludeService()
    {
        $this->services['fragment.renderer.hinclude'] = $instance = new \Symfony\Bundle\FrameworkBundle\Fragment\ContainerAwareHIncludeFragmentRenderer($this, $this->get('uri_signer'), NULL);
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getFragment_Renderer_InlineService()
    {
        $this->services['fragment.renderer.inline'] = $instance = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer($this->get('http_kernel'), $this->get('event_dispatcher'));
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getGedmo_Listener_SoftdeleteableService()
    {
        $this->services['gedmo.listener.softdeleteable'] = $instance = new \Gedmo\SoftDeleteable\SoftDeleteableListener();
        $instance->setAnnotationReader($this->get('annotation_reader'));
        return $instance;
    }
    protected function getGregwarCaptcha_CaptchaBuilderService()
    {
        return $this->services['gregwar_captcha.captcha_builder'] = new \Gregwar\Captcha\CaptchaBuilder();
    }
    protected function getGregwarCaptcha_GeneratorService()
    {
        return $this->services['gregwar_captcha.generator'] = new \Gregwar\CaptchaBundle\Generator\CaptchaGenerator($this->get('router'), $this->get('gregwar_captcha.captcha_builder'), $this->get('gregwar_captcha.phrase_builder'), $this->get('gregwar_captcha.image_file_handler'));
    }
    protected function getGregwarCaptcha_ImageFileHandlerService()
    {
        return $this->services['gregwar_captcha.image_file_handler'] = new \Gregwar\CaptchaBundle\Generator\ImageFileHandler('captcha', '/home/olikids/public_html.sam/app/../web', 10, 60);
    }
    protected function getGregwarCaptcha_PhraseBuilderService()
    {
        return $this->services['gregwar_captcha.phrase_builder'] = new \Gregwar\Captcha\PhraseBuilder();
    }
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel($this->get('event_dispatcher'), $this, $this->get('jms_di_extra.controller_resolver'), $this->get('request_stack'));
    }
    protected function getIvoryCkEditor_ConfigManagerService()
    {
        $this->services['ivory_ck_editor.config_manager'] = $instance = new \Ivory\CKEditorBundle\Model\ConfigManager();
        $instance->setConfig('default', array('filebrowserBrowseRoute' => 'elfinder', 'language' => 'ru'));
        $instance->setConfig('trouble_ticket', array('language' => 'ru', 'toolbar' => array(0 => array(0 => 'Cut', 1 => 'Copy', 2 => 'Paste', 3 => 'PasteText', 4 => 'PasteFromWord', 5 => '-', 6 => 'Undo', 7 => 'Redo'), 1 => array(0 => 'Find', 1 => 'Replace', 2 => '-', 3 => 'SelectAll', 4 => '-', 5 => 'SpellChecker', 6 => 'Scayt', 7 => 'Print'), 2 => array(0 => 'Link', 1 => 'Unlink', 2 => 'Anchor'), 3 => array(0 => 'Bold', 1 => 'Italic', 2 => 'Underline', 3 => 'Strike', 4 => 'Subscript', 5 => 'Superscript', 6 => '-', 7 => 'RemoveFormat'), 4 => array(0 => 'NumberedList', 1 => 'BulletedList', 2 => '-', 3 => '-', 4 => 'Blockquote', 5 => 'CreateDiv', 6 => '-', 7 => 'JustifyLeft', 8 => 'JustifyCenter', 9 => 'JustifyRight', 10 => 'JustifyBlock', 11 => '-'), 5 => array(0 => 'Styles', 1 => 'Format', 2 => 'Font', 3 => 'FontSize'), 6 => array(0 => 'Maximize', 1 => 'Smiley'))));
        $instance->setDefaultConfig('default');
        return $instance;
    }
    protected function getIvoryCkEditor_Form_TypeService()
    {
        return $this->services['ivory_ck_editor.form.type'] = new \Ivory\CKEditorBundle\Form\Type\CKEditorType(true, true, 'bundles/ivoryckeditor/', 'bundles/ivoryckeditor/ckeditor.js', $this->get('ivory_ck_editor.config_manager'), $this->get('ivory_ck_editor.plugin_manager'), $this->get('ivory_ck_editor.styles_set_manager'), $this->get('ivory_ck_editor.template_manager'));
    }
    protected function getIvoryCkEditor_PluginManagerService()
    {
        $this->services['ivory_ck_editor.plugin_manager'] = $instance = new \Ivory\CKEditorBundle\Model\PluginManager();
        $instance->setPlugin('jqueryspellchecker', array('path' => 'bundles/applicationivoryckeditor/jquery-spellchecker-demo-master/js/lib/ckeditor/plugins/jqueryspellchecker/', 'filename' => 'plugin.js'));
        return $instance;
    }
    protected function getIvoryCkEditor_StylesSetManagerService()
    {
        return $this->services['ivory_ck_editor.styles_set_manager'] = new \Ivory\CKEditorBundle\Model\StylesSetManager();
    }
    protected function getIvoryCkEditor_TemplateManagerService()
    {
        return $this->services['ivory_ck_editor.template_manager'] = new \Ivory\CKEditorBundle\Model\TemplateManager();
    }
    protected function getIvoryCkEditor_Templating_HelperService()
    {
        return $this->services['ivory_ck_editor.templating.helper'] = new \Ivory\CKEditorBundle\Templating\CKEditorHelper($this);
    }
    protected function getIvoryCkEditor_TwigExtensionService()
    {
        return $this->services['ivory_ck_editor.twig_extension'] = new \Ivory\CKEditorBundle\Twig\CKEditorExtension($this->get('ivory_ck_editor.templating.helper'));
    }
    protected function getJmsAop_InterceptorLoaderService()
    {
        return $this->services['jms_aop.interceptor_loader'] = new \JMS\AopBundle\Aop\InterceptorLoader($this, array());
    }
    protected function getJmsAop_PointcutContainerService()
    {
        return $this->services['jms_aop.pointcut_container'] = new \JMS\AopBundle\Aop\PointcutContainer(array('security.access.method_interceptor' => $this->get('security.access.pointcut')));
    }
    protected function getJmsDiExtra_Metadata_ConverterService()
    {
        return $this->services['jms_di_extra.metadata.converter'] = new \JMS\DiExtraBundle\Metadata\MetadataConverter();
    }
    protected function getJmsDiExtra_Metadata_MetadataFactoryService()
    {
        $this->services['jms_di_extra.metadata.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'jms_di_extra.metadata_driver'), 'Metadata\\ClassHierarchyMetadata', false);
        $instance->setCache(new \Metadata\Cache\FileCache('/home/olikids/public_html.sam/app/cache/prod/jms_diextra/metadata'));
        return $instance;
    }
    protected function getJmsDiExtra_MetadataDriverService()
    {
        return $this->services['jms_di_extra.metadata_driver'] = new \JMS\DiExtraBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader'));
    }
    protected function getJmsI18nRouting_LoaderService()
    {
        return $this->services['jms_i18n_routing.loader'] = new \JMS\I18nRoutingBundle\Router\I18nLoader(new \JMS\I18nRoutingBundle\Router\DefaultRouteExclusionStrategy(), new \JMS\I18nRoutingBundle\Router\DefaultPatternGenerationStrategy('custom', $this->get('translator.default'), array(0 => 'ru'), '/home/olikids/public_html.sam/app/cache/prod', 'routes', 'ru'));
    }
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }
    protected function getKnpMenu_FactoryService()
    {
        $this->services['knp_menu.factory'] = $instance = new \Knp\Menu\MenuFactory();
        $instance->addExtension(new \Knp\Menu\Integration\Symfony\RoutingExtension($this->get('router')), 0);
        return $instance;
    }
    protected function getKnpMenu_Listener_VotersService()
    {
        $this->services['knp_menu.listener.voters'] = $instance = new \Knp\Bundle\MenuBundle\EventListener\VoterInitializerListener();
        $instance->addVoter($this->get('knp_menu.voter.router'));
        return $instance;
    }
    protected function getKnpMenu_MatcherService()
    {
        $this->services['knp_menu.matcher'] = $instance = new \Knp\Menu\Matcher\Matcher();
        $instance->addVoter($this->get('knp_menu.voter.router'));
        return $instance;
    }
    protected function getKnpMenu_MenuProviderService()
    {
        return $this->services['knp_menu.menu_provider'] = new \Knp\Menu\Provider\ChainProvider(array(0 => new \Knp\Bundle\MenuBundle\Provider\ContainerAwareProvider($this, array()), 1 => new \Knp\Bundle\MenuBundle\Provider\BuilderAliasProvider($this->get('kernel'), $this, $this->get('knp_menu.factory'))));
    }
    protected function getKnpMenu_Renderer_ListService()
    {
        return $this->services['knp_menu.renderer.list'] = new \Knp\Menu\Renderer\ListRenderer($this->get('knp_menu.matcher'), array(), 'UTF-8');
    }
    protected function getKnpMenu_Renderer_TwigService()
    {
        return $this->services['knp_menu.renderer.twig'] = new \Knp\Menu\Renderer\TwigRenderer($this->get('twig'), 'knp_menu.html.twig', $this->get('knp_menu.matcher'), array());
    }
    protected function getKnpMenu_RendererProviderService()
    {
        return $this->services['knp_menu.renderer_provider'] = new \Knp\Bundle\MenuBundle\Renderer\ContainerAwareProvider($this, 'twig', array('list' => 'knp_menu.renderer.list', 'twig' => 'knp_menu.renderer.twig'));
    }
    protected function getKnpMenu_Voter_RouterService()
    {
        return $this->services['knp_menu.voter.router'] = new \Knp\Menu\Matcher\Voter\RouteVoter();
    }
    protected function getKnpPaginatorService()
    {
        return $this->services['knp_paginator'] = new \Application\Knp\PaginatorBundle\Logic\Paginator($this->get('event_dispatcher'));
    }
    protected function getKnpPaginator_Helper_ProcessorService()
    {
        return $this->services['knp_paginator.helper.processor'] = new \Knp\Bundle\PaginatorBundle\Helper\Processor($this->get('templating.helper.router'), $this->get('translator.default'));
    }
    protected function getKnpPaginator_Subscriber_FiltrationService()
    {
        return $this->services['knp_paginator.subscriber.filtration'] = new \Knp\Component\Pager\Event\Subscriber\Filtration\FiltrationSubscriber();
    }
    protected function getKnpPaginator_Subscriber_PaginateService()
    {
        return $this->services['knp_paginator.subscriber.paginate'] = new \Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber();
    }
    protected function getKnpPaginator_Subscriber_SlidingPaginationService()
    {
        return $this->services['knp_paginator.subscriber.sliding_pagination'] = new \Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber(array('defaultPaginationTemplate' => 'KnpPaginatorBundle:Pagination:sliding.html.twig', 'defaultSortableTemplate' => 'KnpPaginatorBundle:Pagination:sortable_link.html.twig', 'defaultFiltrationTemplate' => 'KnpPaginatorBundle:Pagination:filtration.html.twig', 'defaultPageRange' => 5));
    }
    protected function getKnpPaginator_Subscriber_SortableService()
    {
        return $this->services['knp_paginator.subscriber.sortable'] = new \Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber();
    }
    protected function getKnpPaginator_Templating_Helper_PaginationService()
    {
        return $this->services['knp_paginator.templating.helper.pagination'] = new \Knp\Bundle\PaginatorBundle\Templating\PaginationHelper($this->get('knp_paginator.helper.processor'), $this->get('templating.engine.php'));
    }
    protected function getKnpPaginator_Twig_Extension_PaginationService()
    {
        return $this->services['knp_paginator.twig.extension.pagination'] = new \Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension($this->get('knp_paginator.helper.processor'));
    }
    protected function getLadybug_DumperService()
    {
        $this->services['ladybug.dumper'] = $instance = new \Ladybug\Dumper();
        $instance->setOptions(array('extra_helpers' => array(0 => 'RaulFraile\\Bundle\\LadybugBundle\\DataCollector\\LadybugDataCollector:log'), 'theme' => 'modern', 'expanded' => true, 'silenced' => false, 'array_max_nesting_level' => 9, 'object_max_nesting_level' => 3));
        return $instance;
    }
    protected function getLadybug_EventListener_LadybugConfigListenerService()
    {
        return $this->services['ladybug.event_listener.ladybug_config_listener'] = new \RaulFraile\Bundle\LadybugBundle\EventListener\LadybugConfigListener(array('extra_helpers' => array(0 => 'RaulFraile\\Bundle\\LadybugBundle\\DataCollector\\LadybugDataCollector:log'), 'theme' => 'modern', 'expanded' => true, 'silenced' => false, 'array_max_nesting_level' => 9, 'object_max_nesting_level' => 3));
    }
    protected function getLanguageSwitcherExtensionService()
    {
        return $this->services['language_switcher_extension'] = new \Core\LanguageBundle\Twig\LanguageSwitcherExtension(array('cases' => array('Ru' => array('genitive' => array('caption' => 'Родительный', 'help' => 'Кого? Чего?'), 'dative' => array('caption' => 'Дательный', 'help' => 'Кому? Чему?'), 'accusative' => array('caption' => 'Винительный', 'help' => 'Кого? Что?'), 'ablative' => array('caption' => 'Творительный', 'help' => 'Кем? Чем?'), 'prepositional' => array('caption' => 'Предложный', 'help' => 'О ком? О чём? В ком? В чём? Где?'))), 'languages' => array('Ru' => array('caption' => 'Русский')), 'default' => 'Ru', 'classId' => 'translatedField', 'active' => 'Ru'), $this->get('session'), $this->get('language_switcher_logic'));
    }
    protected function getLanguageSwitcherLogicService()
    {
        return $this->services['language_switcher_logic'] = new \Core\LanguageBundle\Logic\LanguageLogic(array('cases' => array('Ru' => array('genitive' => array('caption' => 'Родительный', 'help' => 'Кого? Чего?'), 'dative' => array('caption' => 'Дательный', 'help' => 'Кому? Чему?'), 'accusative' => array('caption' => 'Винительный', 'help' => 'Кого? Что?'), 'ablative' => array('caption' => 'Творительный', 'help' => 'Кем? Чем?'), 'prepositional' => array('caption' => 'Предложный', 'help' => 'О ком? О чём? В ком? В чём? Где?'))), 'languages' => array('Ru' => array('caption' => 'Русский')), 'default' => 'Ru', 'classId' => 'translatedField', 'active' => 'Ru'), $this->get('session'));
    }
    protected function getLanguageTextCaseFormService()
    {
        return $this->services['language_text_case_form'] = new \Core\LanguageBundle\Form\Type\TextCaseType(array('cases' => array('Ru' => array('genitive' => array('caption' => 'Родительный', 'help' => 'Кого? Чего?'), 'dative' => array('caption' => 'Дательный', 'help' => 'Кому? Чему?'), 'accusative' => array('caption' => 'Винительный', 'help' => 'Кого? Что?'), 'ablative' => array('caption' => 'Творительный', 'help' => 'Кем? Чем?'), 'prepositional' => array('caption' => 'Предложный', 'help' => 'О ком? О чём? В ком? В чём? Где?'))), 'languages' => array('Ru' => array('caption' => 'Русский')), 'default' => 'Ru', 'classId' => 'translatedField', 'active' => 'Ru'));
    }
    protected function getLiipMonitor_HealthControllerService()
    {
        return $this->services['liip_monitor.health_controller'] = new \Liip\MonitorBundle\Controller\HealthCheckController($this->get('liip_monitor.runner'), $this->get('liip_monitor.helper'));
    }
    protected function getLiipMonitor_HelperService()
    {
        return $this->services['liip_monitor.helper'] = new \Liip\MonitorBundle\Helper\PathHelper($this);
    }
    protected function getLiipMonitor_RunnerService()
    {
        $this->services['liip_monitor.runner'] = $instance = new \Liip\MonitorBundle\Runner();
        $instance->addCheck(new \ZendDiagnostics\Check\ExtensionLoaded(array(0 => 'apc', 1 => 'memcache')), 'php_extensions');
        $instance->addCheck(new \ZendDiagnostics\Check\DiskUsage(70, 90, '/home/olikids/public_html.sam/app/cache/prod'), 'disk_usage');
        $instance->addCheck(new \Liip\MonitorBundle\Check\SymfonyRequirements('/home/olikids/public_html.sam/app/SymfonyRequirements.php'), 'symfony_requirements');
        $instance->addCheck(new \ZendDiagnostics\Check\ApcMemory(70, 90), 'apc_memory');
        $instance->addCheck(new \ZendDiagnostics\Check\ApcFragmentation(70, 90), 'apc_fragmentation');
        $instance->addCheck(new \Liip\MonitorBundle\Check\CustomErrorPages(array(0 => 404, 1 => 504), '/home/olikids/public_html.sam/app', 'twig.controller.exception:showAction'), 'custom_error_pages');
        $instance->addCheck(new \ZendDiagnostics\Check\SecurityAdvisory('/home/olikids/public_html.sam/app/../composer.lock'), 'security_advisory');
        $instance->addChecks(new \Liip\MonitorBundle\Check\PhpVersionCollection(array('5.4.4' => '>=')));
        $instance->addChecks(new \Liip\MonitorBundle\Check\DoctrineDbalCollection($this->get('doctrine'), array(0 => 'default', 1 => 'force_master')));
        $instance->addChecks(new \Liip\MonitorBundle\Check\MemcacheCollection(array('name' => array('host' => 'localhost', 'port' => 11211))));
        $instance->addChecks(new \Liip\MonitorBundle\Check\HttpServiceCollection(array('name' => array('host' => 'localhost', 'port' => 80, 'path' => '/', 'status_code' => 200, 'content' => NULL))));
        return $instance;
    }
    protected function getLocaleListenerService()
    {
        return $this->services['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener('ru', $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('request_stack'));
    }
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getMarkdown_ParserService()
    {
        return $this->services['markdown.parser'] = new \Knp\Bundle\MarkdownBundle\Parser\Preset\Max();
    }
    protected function getMonolog_Handler_ApplogService()
    {
        return $this->services['monolog.handler.applog'] = new \Monolog\Handler\StreamHandler('/home/olikids/public_html.sam/app/logs/prod.log', 100, true);
    }
    protected function getMonolog_Handler_FileService()
    {
        return $this->services['monolog.handler.file'] = new \Monolog\Handler\StreamHandler('/home/olikids/public_html.sam/app/logs/prod.log', 100, true);
    }
    protected function getMonolog_Handler_MainService()
    {
        return $this->services['monolog.handler.main'] = new \Monolog\Handler\FingersCrossedHandler($this->get('monolog.handler.file'), 100, 0, true, true, NULL);
    }
    protected function getMonolog_Handler_SyslogService()
    {
        return $this->services['monolog.handler.syslog'] = new \Monolog\Handler\SyslogHandler(false, 'user', 100, true, 1);
    }
    protected function getMonolog_Logger_AsseticService()
    {
        $this->services['monolog.logger.assetic'] = $instance = new \Symfony\Bridge\Monolog\Logger('assetic');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getMonolog_Logger_EmergencyService()
    {
        $this->services['monolog.logger.emergency'] = $instance = new \Symfony\Bridge\Monolog\Logger('emergency');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bridge\Monolog\Logger('router');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');
        $instance->pushHandler($this->get('monolog.handler.syslog'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.applog'));
        return $instance;
    }
    protected function getOfficeWorkTimeAdminService()
    {
        $instance = new \Core\OfficeWorkTimeBundle\Admin\ScheduleAdmin('office_work_time_admin', 'Core\\OfficeWorkTimeBundle\\Entity\\Schedule', 'SonataAdminBundle:CRUD');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Производственный календарь');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    public function getOfficeWorkTimeLogicService($lazyLoad = true)
    {
        if ($lazyLoad) {
            $container = $this;
            return $this->services['office_work_time_logic'] = new CoreOfficeWorkTimeBundleLogicOfficeWorkTimeLogic_0000000001a1f9d100007f34c1e23dae(
                function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) use ($container) {
                    $wrappedInstance = $container->getOfficeWorkTimeLogicService(false);
                    $proxy->setProxyInitializer(null);
                    return true;
                }
            );
        }
        return new \Core\OfficeWorkTimeBundle\Logic\OfficeWorkTimeLogic(array('uri' => 'http://basicdata.ru/api/json/calend/', 'timezone' => 'Europe/Moscow', 'options' => array('basic_data' => array('uri' => 'http://basicdata.ru/api/json/calend/'))), array('basic_data' => $this->get('basic_data_logic')), $this->get('doctrine.orm.default_entity_manager'), $this->get('core_config_logic'));
    }
    protected function getPhpexcelService()
    {
        return $this->services['phpexcel'] = new \Liuggio\ExcelBundle\Factory();
    }
    protected function getPrestaSitemap_DumperService()
    {
        return $this->services['presta_sitemap.dumper'] = new \Presta\SitemapBundle\Service\Dumper($this->get('event_dispatcher'), $this->get('filesystem'), 'sitemap');
    }
    protected function getPrestaSitemap_Eventlistener_RouteAnnotationService()
    {
        return $this->services['presta_sitemap.eventlistener.route_annotation'] = new \Presta\SitemapBundle\EventListener\RouteAnnotationEventListener($this->get('router'));
    }
    protected function getPrestaSitemap_GeneratorService()
    {
        return $this->services['presta_sitemap.generator'] = new \Presta\SitemapBundle\Service\Generator($this->get('event_dispatcher'), $this->get('router'), NULL, 3600);
    }
    protected function getPropertyAccessorService()
    {
        return $this->services['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor();
    }
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }
        throw new RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }
    protected function getRouterService()
    {
        $this->services['router'] = $instance = new \JMS\I18nRoutingBundle\Router\I18nRouter($this, '/home/olikids/public_html.sam/app/config/routing.yml', array('cache_dir' => '/home/olikids/public_html.sam/app/cache/prod', 'debug' => false, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appProdUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appProdUrlMatcher', 'strict_requirements' => NULL), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $instance->setLocaleResolver(new \JMS\I18nRoutingBundle\Router\DefaultLocaleResolver('hl', array('www.olikids-sam.ru.vm' => 'ru')));
        $instance->setI18nLoaderId('jms_i18n_routing.loader');
        $instance->setDefaultLocale('ru');
        $instance->setRedirectToHost(true);
        $instance->setHostMap(array('ru' => 'www.olikids-sam.ru.vm'));
        return $instance;
    }
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router'), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('request_stack'));
    }
    protected function getRouting_LoaderService()
    {
        $a = $this->get('file_locator');
        $b = $this->get('annotation_reader');
        $c = new \Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader($b);
        $d = new \Symfony\Component\Config\Loader\LoaderResolver();
        $d->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($a, $c));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($a, $c));
        $d->addLoader($c);
        $d->addLoader($this->get('sonata.admin.route_loader'));
        $d->addLoader($this->get('cmf_tree_browser.route_loader'));
        return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($this->get('controller_name_converter'), $this->get('monolog.logger.router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $d);
    }
    protected function getSecurity_Access_DecisionManagerService()
    {
        $a = $this->get('security.role_hierarchy');
        $b = $this->get('security.authentication.trust_resolver');
        return $this->services['security.access.decision_manager'] = new \JMS\SecurityExtraBundle\Security\Authorization\RememberingAccessDecisionManager(new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(array(0 => new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter($a), 1 => new \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter(new \Symfony\Component\Security\Core\Authorization\ExpressionLanguage(), $b, $a), 2 => new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter($b)), 'affirmative', false, true));
    }
    protected function getSecurity_Access_MethodInterceptorService()
    {
        return $this->services['security.access.method_interceptor'] = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor($this->get('security.context'), $this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), new \JMS\SecurityExtraBundle\Security\Authorization\AfterInvocation\AfterInvocationManager(array()), new \JMS\SecurityExtraBundle\Security\Authorization\RunAsManager('RunAsToken', 'ROLE_'), $this->get('security.extra.metadata_factory'), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_Access_PointcutService()
    {
        $this->services['security.access.pointcut'] = $instance = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\SecurityPointcut($this->get('security.extra.metadata_factory'), false, array());
        $instance->setSecuredClasses(array());
        return $instance;
    }
    protected function getSecurity_ContextService()
    {
        return $this->services['security.context'] = new \Symfony\Component\Security\Core\SecurityContext($this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), false);
    }
    protected function getSecurity_Csrf_TokenManagerService()
    {
        return $this->services['security.csrf.token_manager'] = new \Symfony\Component\Security\Csrf\CsrfTokenManager(new \Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator($this->get('security.secure_random')), new \Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage($this->get('session')));
    }
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('FOS\\UserBundle\\Model\\UserInterface' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => true, 2 => 5000))));
    }
    protected function getSecurity_Extra_MetadataDriverService()
    {
        return $this->services['security.extra.metadata_driver'] = new \Metadata\Driver\DriverChain(array(0 => new \JMS\SecurityExtraBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader'))));
    }
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Component\Security\Http\Firewall(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap($this, array('security.firewall.map.context.admin' => new \Symfony\Component\HttpFoundation\RequestMatcher('/admin(.*)'), 'security.firewall.map.context.main' => new \Symfony\Component\HttpFoundation\RequestMatcher('.*'))), $this->get('event_dispatcher'));
    }
    protected function getSecurity_Firewall_Map_Context_AdminService()
    {
        $a = $this->get('security.context');
        $b = $this->get('security.http_utils');
        $c = $this->get('http_kernel');
        $d = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $e = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler($b, array('login_path' => '/login.html', 'always_use_default_target_path' => false, 'default_target_path' => '/', 'target_path_parameter' => '_target_path', 'use_referer' => false));
        $e->setProviderKey('admin');
        return $this->services['security.firewall.map.context.admin'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => $this->get('security.context_listener.0'), 2 => new \Symfony\Component\Security\Http\Firewall\LogoutListener($a, $b, $this->get('application_user_auth_logic'), array('csrf_parameter' => '_csrf_token', 'intention' => 'logout', 'logout_path' => '/logout.html')), 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($a, $this->get('security.authentication.manager'), $this->get('security.authentication.session_strategy'), $b, 'admin', $e, new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($c, $b, array('login_path' => '/login.html', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path'), $d), array('use_forward' => false, 'check_path' => '/admin/login_check.html', 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'intention' => 'authenticate', 'post_only' => true), $d, $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE), NULL), 4 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($a, '54744c1559e58', $d), 5 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($a, $this->get('security.authentication.trust_resolver'), $b, 'admin', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($c, $b, '/login.html', false), NULL, NULL, $d));
    }
    protected function getSecurity_Firewall_Map_Context_MainService()
    {
        $a = $this->get('fos_user.user_provider.username_email');
        $b = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $c = $this->get('security.context');
        $d = $this->get('security.http_utils');
        $e = $this->get('application_user_auth_logic');
        $f = $this->get('security.authentication.manager');
        $g = $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $h = new \Symfony\Component\Security\Http\RememberMe\TokenBasedRememberMeServices(array(0 => $a), 'b4e7a4ba6de9c87f227a93857e26b0856d0f4af1', 'main', array('lifetime' => 31536000, 'path' => '/', 'domain' => NULL, 'name' => 'REMEMBERME', 'secure' => false, 'httponly' => true, 'always_remember_me' => false, 'remember_me_parameter' => '_remember_me'), $b);
        $i = new \Symfony\Component\Security\Http\Firewall\LogoutListener($c, $d, $e, array('csrf_parameter' => '_csrf_token', 'intention' => 'logout', 'logout_path' => '/logout.html'));
        $i->addHandler($h);
        $j = new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($c, $f, $this->get('security.authentication.session_strategy'), $d, 'main', $e, $e, array('use_forward' => false, 'check_path' => '/login_check.html', 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_parameter' => '_csrf_token', 'intention' => 'authenticate', 'post_only' => true), $b, $g, NULL);
        $j->setRememberMeServices($h);
        return $this->services['security.firewall.map.context.main'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => $this->get('security.channel_listener'), 1 => $this->get('security.context_listener.0'), 2 => $i, 3 => $j, 4 => new \Symfony\Component\Security\Http\Firewall\RememberMeListener($c, $h, $f, $b, $g), 5 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($c, '54744c1559e58', $b), 6 => $this->get('security.access_listener')), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($c, $this->get('security.authentication.trust_resolver'), $d, 'main', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($this->get('http_kernel'), $d, '/login.html', false), NULL, NULL, $b));
    }
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener();
    }
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy(array('ROLE_ADMIN' => array(0 => 'ROLE_USER', 1 => 'ROLE_SONATA_ADMIN'), 'ROLE_SUPER_ADMIN' => array(0 => 'ROLE_ALLOWED_TO_SWITCH', 1 => 'ROLE_ADMIN', 2 => 'ROLE_CORE_ORDER_EXTRA_STATUS_ADMIN_UPDATE_NAME', 3 => 'ROLE_CORE_LOGISTICS_SUPPLY_STATUS_ADMIN_UPDATE_NAME', 4 => 'ROLE_CORE_ORDER_CANCELED_REASON_ADMIN_UPDATE_NAME', 5 => 'ROLE_CORE_LOGISTICS_UNIT_IN_STOCK_DEFECT_TRANSIT_ADMIN_UPDATE_NAME', 6 => 'ROLE_CORE_LOGISTICS_TRANSIT_STATUS_ADMIN_UPDATE_NAME', 7 => 'CAN_FASTEDIT')));
    }
    protected function getSecurity_SecureRandomService()
    {
        return $this->services['security.secure_random'] = new \Symfony\Component\Security\Core\Util\SecureRandom('/home/olikids/public_html.sam/app/cache/prod/secure_random.seed', $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_Validator_UserPasswordService()
    {
        return $this->services['security.validator.user_password'] = new \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator($this->get('security.context'), $this->get('security.encoder_factory'));
    }
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\CacheListener();
    }
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener($this->get('annotation_reader'));
    }
    protected function getSensioFrameworkExtra_Converter_DatetimeService()
    {
        return $this->services['sensio_framework_extra.converter.datetime'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter();
    }
    protected function getSensioFrameworkExtra_Converter_Doctrine_OrmService()
    {
        return $this->services['sensio_framework_extra.converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter($this->get('doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($this->get('sensio_framework_extra.converter.manager'));
    }
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();
        $instance->add($this->get('sensio_framework_extra.converter.doctrine.orm'), 0, 'doctrine.orm');
        $instance->add($this->get('sensio_framework_extra.converter.datetime'), 0, 'datetime');
        return $instance;
    }
    protected function getSensioFrameworkExtra_View_GuesserService()
    {
        return $this->services['sensio_framework_extra.view.guesser'] = new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser($this->get('kernel'));
    }
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this);
    }
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session\Session($this->get('session.storage.native'), new \Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag(), new \Symfony\Component\HttpFoundation\Session\Flash\FlashBag());
    }
    protected function getSession_Storage_FilesystemService()
    {
        return $this->services['session.storage.filesystem'] = new \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage('/home/olikids/public_html.sam/app/cache/prod/sessions', 'MOCKSESSID', $this->get('session.storage.metadata_bag'));
    }
    protected function getSession_Storage_NativeService()
    {
        return $this->services['session.storage.native'] = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage(array('gc_probability' => 1), NULL, $this->get('session.storage.metadata_bag'));
    }
    protected function getSession_Storage_PhpBridgeService()
    {
        return $this->services['session.storage.php_bridge'] = new \Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage(NULL, $this->get('session.storage.metadata_bag'));
    }
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener($this);
    }
    protected function getShtumi_Useful_Orm_Filter_Type_AjaxAutocompleteService()
    {
        return new \Shtumi\UsefulBundle\Filter\AjaxAutocompleteFilter($this);
    }
    protected function getShtumi_Useful_Type_AjaxAutocompleteService()
    {
        return $this->services['shtumi.useful.type.ajax_autocomplete'] = new \Shtumi\UsefulBundle\Form\Type\AjaxAutocompleteType($this);
    }
    protected function getShtumi_Useful_Type_AjaxFileService()
    {
        return $this->services['shtumi.useful.type.ajax_file'] = new \Shtumi\UsefulBundle\Form\Type\AjaxFileType($this);
    }
    protected function getShtumi_Useful_Type_DaterangeService()
    {
        return $this->services['shtumi.useful.type.daterange'] = new \Shtumi\UsefulBundle\Form\Type\DateRangeType($this, array('date_format' => 'd/m/Y', 'default_interval' => 'P30D'));
    }
    protected function getShtumi_Useful_Type_DependentFilteredEntityService()
    {
        return $this->services['shtumi.useful.type.dependent_filtered_entity'] = new \Shtumi\UsefulBundle\Form\Type\DependentFilteredEntityType($this);
    }
    protected function getShtumi_Useful_Type_DependentFilteredSelect2Service()
    {
        return $this->services['shtumi.useful.type.dependent_filtered_select2'] = new \Shtumi\UsefulBundle\Form\Type\DependentFilteredSelect2Type($this);
    }
    protected function getShtumi_Useful_Type_Select2EntityService()
    {
        return $this->services['shtumi.useful.type.select2_entity'] = new \Shtumi\UsefulBundle\Form\Type\Select2EntityType($this);
    }
    protected function getShtumiDaterangeService()
    {
        return $this->services['shtumi_daterange'] = new \Shtumi\UsefulBundle\Service\DateRangeManager(array('date_format' => 'd/m/Y', 'default_interval' => 'P30D'));
    }
    protected function getSimplethingsEntityaudit_ConfigService()
    {
        $this->services['simplethings_entityaudit.config'] = $instance = new \SimpleThings\EntityAudit\AuditConfiguration();
        $instance->setAuditedEntityClasses(array(0 => 'Core\\ProductBundle\\Entity\\CommonProduct', 1 => 'Core\\ProductBundle\\Entity\\Product', 2 => 'Core\\ProductBundle\\Entity\\DigitalProduct', 3 => 'Core\\ProductBundle\\Entity\\ServiceProduct', 4 => 'Core\\ProductBundle\\Entity\\CompositeProduct', 5 => 'Application\\Sonata\\UserBundle\\Entity\\LegalContragent', 6 => 'Application\\Sonata\\UserBundle\\Entity\\IndiContragent', 7 => 'Core\\FileBundle\\Entity\\CommonFile', 8 => 'Core\\FileBundle\\Entity\\ImageFile', 9 => 'Core\\FileBundle\\Entity\\DocumentFile', 10 => 'Core\\UnionBundle\\Entity\\ProductSimilarsUnion', 11 => 'Core\\UnionBundle\\Entity\\ProductAccessoriesUnion', 12 => 'Core\\UnionBundle\\Entity\\ProductAlternativeUnion', 13 => 'Core\\UnionBundle\\Entity\\ProductServicesUnion', 14 => 'Core\\DirectoryBundle\\Entity\\RemoteVideo', 15 => 'Core\\LogisticsBundle\\Entity\\ProductAvailability', 16 => 'Core\\ProductBundle\\Entity\\CommonProductModification', 17 => 'Application\\Sonata\\UserBundle\\Entity\\CommonContragent', 18 => 'Application\\Sonata\\UserBundle\\Entity\\User', 19 => 'Application\\Sonata\\UserBundle\\Entity\\Group', 21 => 'Core\\CategoryBundle\\Entity\\ProductCategory', 22 => 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory', 23 => 'Core\\PropertyBundle\\Entity\\DataProperty', 24 => 'Core\\PropertyBundle\\Entity\\ProductDataProperty', 25 => 'Core\\DirectoryBundle\\Entity\\Country', 26 => 'Core\\DirectoryBundle\\Entity\\Region', 27 => 'Core\\DirectoryBundle\\Entity\\City', 28 => 'Core\\DirectoryBundle\\Entity\\GeoCity', 30 => 'Core\\DirectoryBundle\\Entity\\VideoHosting', 31 => 'Core\\DirectoryBundle\\Entity\\ProductTags', 32 => 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure', 33 => 'Core\\DirectoryBundle\\Entity\\UnitOfMeasureGroup', 34 => 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket', 35 => 'Core\\UnionBundle\\Entity\\ProductQuantityAlternativeUnion', 36 => 'Core\\OrderBundle\\Entity\\Order', 37 => 'Core\\OrderBundle\\Entity\\Waybills', 38 => 'Core\\OrderBundle\\Entity\\SizesOfBox', 39 => 'Core\\OrderBundle\\Entity\\Composition', 40 => 'Core\\OrderBundle\\Entity\\ExtraStatus', 41 => 'Core\\OrderBundle\\Entity\\CanceledReason', 42 => 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrder', 43 => 'Core\\DiscountsBundle\\Entity\\ManufacturerDiscount', 44 => 'Core\\DiscountsBundle\\Entity\\ManufacturerStepValues', 45 => 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerDiscount', 46 => 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerStepValues', 47 => 'Core\\LogisticsBundle\\Entity\\Bank', 48 => 'Core\\LogisticsBundle\\Entity\\Seller', 49 => 'Core\\LogisticsBundle\\Entity\\Supplier', 50 => 'Core\\LogisticsBundle\\Entity\\Supply', 51 => 'Core\\LogisticsBundle\\Entity\\ProductInSupply', 52 => 'Core\\LogisticsBundle\\Entity\\UnitInStock', 53 => 'Core\\LogisticsBundle\\Entity\\Transit', 54 => 'Core\\LogisticsBundle\\Entity\\TransitStatus', 55 => 'Core\\LogisticsBundle\\Entity\\SupplyStatus', 56 => 'Core\\LogisticsBundle\\Entity\\Stock', 57 => 'Core\\LogisticsBundle\\Entity\\ProductInTransit', 58 => 'Core\\LogisticsBundle\\Entity\\UnitSerials', 59 => 'Core\\LogisticsBundle\\Entity\\UnitInStockDefectReason', 60 => 'Core\\LogisticsBundle\\Entity\\AdditionalCostsOfSupply', 61 => 'Core\\DeliveryBundle\\Entity\\Company', 62 => 'Core\\DeliveryBundle\\Entity\\Service', 63 => 'Core\\DeliveryBundle\\Entity\\Address', 64 => 'Core\\DeliveryBundle\\Entity\\ServiceType', 65 => 'Core\\ManufacturerBundle\\Entity\\Manufacturer', 66 => 'Core\\ManufacturerBundle\\Entity\\Series', 67 => 'Core\\ManufacturerBundle\\Entity\\Brand', 70 => 'Core\\ColorBundle\\Entity\\Color', 71 => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem', 72 => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\RobokassaSubsystem', 73 => 'Core\\PaymentBundle\\Entity\\Payment', 74 => 'Core\\ReviewBundle\\Entity\\Review', 75 => 'Core\\HolidayBundle\\Entity\\Holiday'));
        $instance->setTablePrefix('');
        $instance->setTableSuffix('_audit');
        $instance->setRevisionFieldName('rev');
        $instance->setRevisionTypeFieldName('revtype');
        $instance->setRevisionTableName('revisions');
        $instance->setRevisionIdFieldType('integer');
        return $instance;
    }
    protected function getSimplethingsEntityaudit_CreateSchemaListenerService()
    {
        return $this->services['simplethings_entityaudit.create_schema_listener'] = new \Application\SimpleThings\EntityAudit\EventListener\ApplicationCreateSchemaListener($this->get('simplethings_entityaudit.manager'));
    }
    protected function getSimplethingsEntityaudit_LogRevisionsListenerService()
    {
        return $this->services['simplethings_entityaudit.log_revisions_listener'] = new \Application\SimpleThings\EntityAudit\EventListener\ApplicationLogRevisionsListener($this->get('simplethings_entityaudit.manager'));
    }
    protected function getSimplethingsEntityaudit_ManagerService()
    {
        return $this->services['simplethings_entityaudit.manager'] = new \SimpleThings\EntityAudit\AuditManager($this->get('simplethings_entityaudit.config'));
    }
    protected function getSimplethingsEntityaudit_ReaderService()
    {
        return $this->services['simplethings_entityaudit.reader'] = $this->get('simplethings_entityaudit.manager')->createAuditReader($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getSimplethingsEntityaudit_Request_CurrentUserListenerService()
    {
        return $this->services['simplethings_entityaudit.request.current_user_listener'] = new \SimpleThings\EntityAudit\Request\CurrentUserListener($this->get('simplethings_entityaudit.config'), $this->get('security.context'));
    }
    protected function getSonata_Admin_Audit_ManagerService()
    {
        $this->services['sonata.admin.audit.manager'] = $instance = new \Sonata\AdminBundle\Model\AuditManager($this);
        $instance->setReader('sonata.admin.audit.orm.reader', array(0 => 'Core\\ProductBundle\\Entity\\CommonProduct', 1 => 'Core\\ProductBundle\\Entity\\Product', 2 => 'Core\\ProductBundle\\Entity\\DigitalProduct', 3 => 'Core\\ProductBundle\\Entity\\ServiceProduct', 4 => 'Core\\ProductBundle\\Entity\\CompositeProduct', 5 => 'Application\\Sonata\\UserBundle\\Entity\\LegalContragent', 6 => 'Application\\Sonata\\UserBundle\\Entity\\IndiContragent', 7 => 'Core\\FileBundle\\Entity\\CommonFile', 8 => 'Core\\FileBundle\\Entity\\ImageFile', 9 => 'Core\\FileBundle\\Entity\\DocumentFile', 10 => 'Core\\UnionBundle\\Entity\\ProductSimilarsUnion', 11 => 'Core\\UnionBundle\\Entity\\ProductAccessoriesUnion', 12 => 'Core\\UnionBundle\\Entity\\ProductAlternativeUnion', 13 => 'Core\\UnionBundle\\Entity\\ProductServicesUnion', 14 => 'Core\\DirectoryBundle\\Entity\\RemoteVideo', 15 => 'Core\\LogisticsBundle\\Entity\\ProductAvailability', 16 => 'Core\\ProductBundle\\Entity\\CommonProductModification', 17 => 'Application\\Sonata\\UserBundle\\Entity\\CommonContragent', 18 => 'Application\\Sonata\\UserBundle\\Entity\\User', 19 => 'Application\\Sonata\\UserBundle\\Entity\\Group', 21 => 'Core\\CategoryBundle\\Entity\\ProductCategory', 22 => 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory', 23 => 'Core\\PropertyBundle\\Entity\\DataProperty', 24 => 'Core\\PropertyBundle\\Entity\\ProductDataProperty', 25 => 'Core\\DirectoryBundle\\Entity\\Country', 26 => 'Core\\DirectoryBundle\\Entity\\Region', 27 => 'Core\\DirectoryBundle\\Entity\\City', 28 => 'Core\\DirectoryBundle\\Entity\\GeoCity', 30 => 'Core\\DirectoryBundle\\Entity\\VideoHosting', 31 => 'Core\\DirectoryBundle\\Entity\\ProductTags', 32 => 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure', 33 => 'Core\\DirectoryBundle\\Entity\\UnitOfMeasureGroup', 34 => 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket', 35 => 'Core\\UnionBundle\\Entity\\ProductQuantityAlternativeUnion', 36 => 'Core\\OrderBundle\\Entity\\Order', 37 => 'Core\\OrderBundle\\Entity\\Waybills', 38 => 'Core\\OrderBundle\\Entity\\SizesOfBox', 39 => 'Core\\OrderBundle\\Entity\\Composition', 40 => 'Core\\OrderBundle\\Entity\\ExtraStatus', 41 => 'Core\\OrderBundle\\Entity\\CanceledReason', 42 => 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrder', 43 => 'Core\\DiscountsBundle\\Entity\\ManufacturerDiscount', 44 => 'Core\\DiscountsBundle\\Entity\\ManufacturerStepValues', 45 => 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerDiscount', 46 => 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerStepValues', 47 => 'Core\\LogisticsBundle\\Entity\\Bank', 48 => 'Core\\LogisticsBundle\\Entity\\Seller', 49 => 'Core\\LogisticsBundle\\Entity\\Supplier', 50 => 'Core\\LogisticsBundle\\Entity\\Supply', 51 => 'Core\\LogisticsBundle\\Entity\\ProductInSupply', 52 => 'Core\\LogisticsBundle\\Entity\\UnitInStock', 53 => 'Core\\LogisticsBundle\\Entity\\Transit', 54 => 'Core\\LogisticsBundle\\Entity\\TransitStatus', 55 => 'Core\\LogisticsBundle\\Entity\\SupplyStatus', 56 => 'Core\\LogisticsBundle\\Entity\\Stock', 57 => 'Core\\LogisticsBundle\\Entity\\ProductInTransit', 58 => 'Core\\LogisticsBundle\\Entity\\UnitSerials', 59 => 'Core\\LogisticsBundle\\Entity\\UnitInStockDefectReason', 60 => 'Core\\LogisticsBundle\\Entity\\AdditionalCostsOfSupply', 61 => 'Core\\DeliveryBundle\\Entity\\Company', 62 => 'Core\\DeliveryBundle\\Entity\\Service', 63 => 'Core\\DeliveryBundle\\Entity\\Address', 64 => 'Core\\DeliveryBundle\\Entity\\ServiceType', 65 => 'Core\\ManufacturerBundle\\Entity\\Manufacturer', 66 => 'Core\\ManufacturerBundle\\Entity\\Series', 67 => 'Core\\ManufacturerBundle\\Entity\\Brand', 70 => 'Core\\ColorBundle\\Entity\\Color', 71 => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem', 72 => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\RobokassaSubsystem', 73 => 'Core\\PaymentBundle\\Entity\\Payment', 74 => 'Core\\ReviewBundle\\Entity\\Review', 75 => 'Core\\HolidayBundle\\Entity\\Holiday'));
        return $instance;
    }
    protected function getSonata_Admin_Audit_Orm_ReaderService()
    {
        return $this->services['sonata.admin.audit.orm.reader'] = new \Sonata\DoctrineORMAdminBundle\Model\AuditReader($this->get('simplethings_entityaudit.reader', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSonata_Admin_Block_AdminListService()
    {
        return $this->services['sonata.admin.block.admin_list'] = new \Sonata\AdminBundle\Block\AdminListBlockService('sonata.admin.block.admin_list', $this->get('templating'), $this->get('sonata.admin.pool'));
    }
    protected function getSonata_Admin_Block_SearchResultService()
    {
        return $this->services['sonata.admin.block.search_result'] = new \Sonata\AdminBundle\Block\AdminSearchBlockService('sonata.admin.block.search_result', $this->get('templating'), $this->get('sonata.admin.pool'), $this->get('sonata.admin.search.handler'));
    }
    protected function getSonata_Admin_Builder_Filter_FactoryService()
    {
        return $this->services['sonata.admin.builder.filter.factory'] = new \Sonata\AdminBundle\Filter\FilterFactory($this, array('doctrine_orm_boolean' => 'sonata.admin.orm.filter.type.boolean', 'doctrine_orm_callback' => 'sonata.admin.orm.filter.type.callback', 'doctrine_orm_choice' => 'sonata.admin.orm.filter.type.choice', 'doctrine_orm_model' => 'sonata.admin.orm.filter.type.model', 'doctrine_orm_string' => 'sonata.admin.orm.filter.type.string', 'doctrine_orm_number' => 'sonata.admin.orm.filter.type.number', 'doctrine_orm_date' => 'sonata.admin.orm.filter.type.date', 'doctrine_orm_date_range' => 'sonata.admin.orm.filter.type.date_range', 'doctrine_orm_datetime' => 'sonata.admin.orm.filter.type.datetime', 'doctrine_orm_time' => 'sonata.admin.orm.filter.type.time', 'doctrine_orm_datetime_range' => 'sonata.admin.orm.filter.type.datetime_range', 'doctrine_orm_class' => 'sonata.admin.orm.filter.type.class', 'shtumi_ajax_autocomplete' => 'shtumi.useful.orm.filter.type.ajax_autocomplete'));
    }
    protected function getSonata_Admin_Builder_OrmDatagridService()
    {
        return $this->services['sonata.admin.builder.orm_datagrid'] = new \Sonata\DoctrineORMAdminBundle\Builder\DatagridBuilder($this->get('form.factory'), $this->get('sonata.admin.builder.filter.factory'), $this->get('sonata.admin.guesser.orm_datagrid_chain'), true);
    }
    protected function getSonata_Admin_Builder_OrmFormService()
    {
        return $this->services['sonata.admin.builder.orm_form'] = new \Sonata\DoctrineORMAdminBundle\Builder\FormContractor($this->get('form.factory'));
    }
    protected function getSonata_Admin_Builder_OrmListService()
    {
        return $this->services['sonata.admin.builder.orm_list'] = new \Sonata\DoctrineORMAdminBundle\Builder\ListBuilder($this->get('sonata.admin.guesser.orm_list_chain'), array('array' => 'SonataAdminBundle:CRUD:list_array.html.twig', 'boolean' => 'SonataAdminBundle:CRUD:list_boolean.html.twig', 'date' => 'SonataAdminBundle:CRUD:list_date.html.twig', 'time' => 'SonataAdminBundle:CRUD:list_time.html.twig', 'datetime' => 'SonataAdminBundle:CRUD:list_datetime.html.twig', 'text' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'textarea' => 'SonataAdminBundle:CRUD:list_string.html.twig', 'email' => 'SonataAdminBundle:CRUD:list_string.html.twig', 'trans' => 'SonataAdminBundle:CRUD:list_trans.html.twig', 'string' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'smallint' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'bigint' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'integer' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'decimal' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'identifier' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'currency' => 'SonataIntlBundle:CRUD:list_currency.html.twig', 'percent' => 'SonataIntlBundle:CRUD:list_percent.html.twig', 'choice' => 'SonataAdminBundle:CRUD:list_choice.html.twig', 'url' => 'SonataAdminBundle:CRUD:list_url.html.twig'));
    }
    protected function getSonata_Admin_Builder_OrmShowService()
    {
        return $this->services['sonata.admin.builder.orm_show'] = new \Sonata\DoctrineORMAdminBundle\Builder\ShowBuilder($this->get('sonata.admin.guesser.orm_show_chain'), array('array' => 'SonataAdminBundle:CRUD:show_array.html.twig', 'boolean' => 'SonataAdminBundle:CRUD:show_boolean.html.twig', 'date' => 'SonataAdminBundle:CRUD:show_date.html.twig', 'time' => 'SonataAdminBundle:CRUD:show_time.html.twig', 'datetime' => 'SonataAdminBundle:CRUD:show_datetime.html.twig', 'text' => 'SonataAdminBundle:CRUD:base_show_field.html.twig', 'trans' => 'SonataAdminBundle:CRUD:show_trans.html.twig', 'string' => 'SonataAdminBundle:CRUD:base_show_field.html.twig', 'smallint' => 'SonataAdminBundle:CRUD:base_show_field.html.twig', 'bigint' => 'SonataAdminBundle:CRUD:base_show_field.html.twig', 'integer' => 'SonataAdminBundle:CRUD:base_show_field.html.twig', 'decimal' => 'SonataAdminBundle:CRUD:base_show_field.html.twig', 'currency' => 'SonataIntlBundle:CRUD:show_currency.html.twig', 'percent' => 'SonataIntlBundle:CRUD:show_percent.html.twig', 'choice' => 'SonataAdminBundle:CRUD:show_choice.html.twig', 'url' => 'SonataAdminBundle:CRUD:show_url.html.twig'));
    }
    protected function getSonata_Admin_Controller_AdminService()
    {
        return $this->services['sonata.admin.controller.admin'] = new \Sonata\AdminBundle\Controller\HelperController($this->get('twig'), $this->get('sonata.admin.pool'), $this->get('sonata.admin.helper'), $this->get('validator'));
    }
    protected function getSonata_Admin_Event_ExtensionService()
    {
        return $this->services['sonata.admin.event.extension'] = new \Sonata\AdminBundle\Event\AdminEventExtension($this->get('event_dispatcher'));
    }
    protected function getSonata_Admin_ExporterService()
    {
        return $this->services['sonata.admin.exporter'] = new \Sonata\AdminBundle\Export\Exporter();
    }
    protected function getSonata_Admin_Faq_ArticleService()
    {
        $instance = new \Core\FaqBundle\Admin\ArticleAdmin('sonata.admin.faq.article', 'Core\\FaqBundle\\Entity\\Article', 'CoreFaqBundle:Admin\\FaqAdmin');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('Статьи');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getSonata_Admin_Form_Extension_FieldService()
    {
        return $this->services['sonata.admin.form.extension.field'] = new \Sonata\AdminBundle\Form\Extension\Field\Type\FormTypeFieldExtension(array('email' => 'span5', 'textarea' => 'span5', 'text' => 'span5', 'choice' => 'span5', 'integer' => 'span5', 'datetime' => 'sonata-medium-date', 'date' => 'sonata-medium-date'));
    }
    protected function getSonata_Admin_Form_Filter_Type_ChoiceService()
    {
        return $this->services['sonata.admin.form.filter.type.choice'] = new \Sonata\AdminBundle\Form\Type\Filter\ChoiceType($this->get('translator.default'));
    }
    protected function getSonata_Admin_Form_Filter_Type_DateService()
    {
        return $this->services['sonata.admin.form.filter.type.date'] = new \Sonata\AdminBundle\Form\Type\Filter\DateType($this->get('translator.default'));
    }
    protected function getSonata_Admin_Form_Filter_Type_DaterangeService()
    {
        return $this->services['sonata.admin.form.filter.type.daterange'] = new \Sonata\AdminBundle\Form\Type\Filter\DateRangeType($this->get('translator.default'));
    }
    protected function getSonata_Admin_Form_Filter_Type_DatetimeService()
    {
        return $this->services['sonata.admin.form.filter.type.datetime'] = new \Sonata\AdminBundle\Form\Type\Filter\DateTimeType($this->get('translator.default'));
    }
    protected function getSonata_Admin_Form_Filter_Type_DatetimeRangeService()
    {
        return $this->services['sonata.admin.form.filter.type.datetime_range'] = new \Sonata\AdminBundle\Form\Type\Filter\DateTimeRangeType($this->get('translator.default'));
    }
    protected function getSonata_Admin_Form_Filter_Type_DefaultService()
    {
        return $this->services['sonata.admin.form.filter.type.default'] = new \Sonata\AdminBundle\Form\Type\Filter\DefaultType();
    }
    protected function getSonata_Admin_Form_Filter_Type_NumberService()
    {
        return $this->services['sonata.admin.form.filter.type.number'] = new \Sonata\AdminBundle\Form\Type\Filter\NumberType($this->get('translator.default'));
    }
    protected function getSonata_Admin_Form_Type_AdminService()
    {
        return $this->services['sonata.admin.form.type.admin'] = new \Sonata\AdminBundle\Form\Type\AdminType();
    }
    protected function getSonata_Admin_Form_Type_ModelChoiceService()
    {
        return $this->services['sonata.admin.form.type.model_choice'] = new \Sonata\AdminBundle\Form\Type\ModelType();
    }
    protected function getSonata_Admin_Form_Type_ModelHiddenService()
    {
        return $this->services['sonata.admin.form.type.model_hidden'] = new \Sonata\AdminBundle\Form\Type\ModelHiddenType();
    }
    protected function getSonata_Admin_Form_Type_ModelListService()
    {
        return $this->services['sonata.admin.form.type.model_list'] = new \Sonata\AdminBundle\Form\Type\ModelTypeList();
    }
    protected function getSonata_Admin_Form_Type_ModelReferenceService()
    {
        return $this->services['sonata.admin.form.type.model_reference'] = new \Sonata\AdminBundle\Form\Type\ModelReferenceType();
    }
    protected function getSonata_Admin_Guesser_OrmDatagridService()
    {
        return $this->services['sonata.admin.guesser.orm_datagrid'] = new \Sonata\DoctrineORMAdminBundle\Guesser\FilterTypeGuesser();
    }
    protected function getSonata_Admin_Guesser_OrmDatagridChainService()
    {
        return $this->services['sonata.admin.guesser.orm_datagrid_chain'] = new \Sonata\AdminBundle\Guesser\TypeGuesserChain(array(0 => $this->get('sonata.admin.guesser.orm_datagrid')));
    }
    protected function getSonata_Admin_Guesser_OrmListService()
    {
        return $this->services['sonata.admin.guesser.orm_list'] = new \Sonata\DoctrineORMAdminBundle\Guesser\TypeGuesser();
    }
    protected function getSonata_Admin_Guesser_OrmListChainService()
    {
        return $this->services['sonata.admin.guesser.orm_list_chain'] = new \Sonata\AdminBundle\Guesser\TypeGuesserChain(array(0 => $this->get('sonata.admin.guesser.orm_list')));
    }
    protected function getSonata_Admin_Guesser_OrmShowService()
    {
        return $this->services['sonata.admin.guesser.orm_show'] = new \Sonata\DoctrineORMAdminBundle\Guesser\TypeGuesser();
    }
    protected function getSonata_Admin_Guesser_OrmShowChainService()
    {
        return $this->services['sonata.admin.guesser.orm_show_chain'] = new \Sonata\AdminBundle\Guesser\TypeGuesserChain(array(0 => $this->get('sonata.admin.guesser.orm_show')));
    }
    protected function getSonata_Admin_HelperService()
    {
        return $this->services['sonata.admin.helper'] = new \Sonata\AdminBundle\Admin\AdminHelper($this->get('sonata.admin.pool'));
    }
    protected function getSonata_Admin_Label_Strategy_BcService()
    {
        return $this->services['sonata.admin.label.strategy.bc'] = new \Sonata\AdminBundle\Translator\BCLabelTranslatorStrategy();
    }
    protected function getSonata_Admin_Label_Strategy_FormComponentService()
    {
        return $this->services['sonata.admin.label.strategy.form_component'] = new \Sonata\AdminBundle\Translator\FormLabelTranslatorStrategy();
    }
    protected function getSonata_Admin_Label_Strategy_NativeService()
    {
        return $this->services['sonata.admin.label.strategy.native'] = new \Sonata\AdminBundle\Translator\NativeLabelTranslatorStrategy();
    }
    protected function getSonata_Admin_Label_Strategy_NoopService()
    {
        return $this->services['sonata.admin.label.strategy.noop'] = new \Sonata\AdminBundle\Translator\NoopLabelTranslatorStrategy();
    }
    protected function getSonata_Admin_Label_Strategy_UnderscoreService()
    {
        return $this->services['sonata.admin.label.strategy.underscore'] = new \Sonata\AdminBundle\Translator\UnderscoreLabelTranslatorStrategy();
    }
    protected function getSonata_Admin_Manager_OrmService()
    {
        return $this->services['sonata.admin.manager.orm'] = new \Sonata\DoctrineORMAdminBundle\Model\ModelManager($this->get('doctrine'));
    }
    protected function getSonata_Admin_Manipulator_Acl_AdminService()
    {
        return $this->services['sonata.admin.manipulator.acl.admin'] = new \Sonata\AdminBundle\Util\AdminAclManipulator('Sonata\\AdminBundle\\Security\\Acl\\Permission\\MaskBuilder');
    }
    protected function getSonata_Admin_Manipulator_Acl_Object_OrmService()
    {
        return $this->services['sonata.admin.manipulator.acl.object.orm'] = new \Sonata\DoctrineORMAdminBundle\Util\ObjectAclManipulator();
    }
    protected function getSonata_Admin_Object_Manipulator_Acl_AdminService()
    {
        return $this->services['sonata.admin.object.manipulator.acl.admin'] = new \Sonata\AdminBundle\Util\AdminObjectAclManipulator($this->get('form.factory'), 'Sonata\\AdminBundle\\Security\\Acl\\Permission\\MaskBuilder');
    }
    protected function getSonata_Admin_Orm_Filter_Type_BooleanService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\BooleanFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_CallbackService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\CallbackFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_ChoiceService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\ChoiceFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_ClassService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\ClassFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_DateService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\DateFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_DateRangeService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\DateRangeFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_DatetimeService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\DateTimeFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_DatetimeRangeService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\DateTimeRangeFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_ModelService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\ModelFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_NumberService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\NumberFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_StringService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\StringFilter();
    }
    protected function getSonata_Admin_Orm_Filter_Type_TimeService()
    {
        return new \Sonata\DoctrineORMAdminBundle\Filter\TimeFilter();
    }
    protected function getSonata_Admin_PoolService()
    {
        $this->services['sonata.admin.pool'] = $instance = new \Sonata\AdminBundle\Admin\Pool($this, 'Olikids', 'bundles/applicationsonataadmin/img/logo_olikids.png', array('use_select2' => true, 'confirm_exit' => false, 'html5_validate' => true, 'pager_links' => NULL));
        $instance->setTemplates(array('history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig'));
        $instance->setAdminServiceIds(array(0 => 'application_user_contragent_admin', 1 => 'application_user_indi_contact_admin', 2 => 'application_user_legal_contact_admin', 3 => 'sonata.user.admin.user', 4 => 'sonata.user.admin.group', 5 => 'core_shop_product_admin', 6 => 'core_shop_category_admin_product', 7 => 'core_shop_category_admin_trouble_ticket', 8 => 'core_shop_category_admin_faq', 9 => 'core_category_virtual_product_admin', 10 => 'core_shop_property_admin', 11 => 'core_shop_property_data_admin', 12 => 'core_shop_property_data_product_admin', 13 => 'core_shop_property_settings_category_admin', 14 => 'core_country_admin', 15 => 'core_region_admin', 16 => 'core_city_admin', 17 => 'core_geo_city_admin', 18 => 'core_video_admin', 19 => 'core_video_hosting_admin', 20 => 'core_currency_admin', 21 => 'core_legal_form_admin', 22 => 'core_directory_product_tags_admin', 23 => 'core_directory_unit_of_measure_admin', 24 => 'core_directory_unit_of_measure_group_admin', 25 => 'core_admin_trouble_ticket', 26 => 'core_admin_trouble_ticket_status', 27 => 'core_admin_trouble_ticket_priority', 28 => 'core_admin_trouble_ticket_message', 29 => 'core_admin_trouble_ticket_log', 30 => 'core_union_product_composition', 31 => 'core_union_product_quantity_alternative', 32 => 'sonata.admin.faq.article', 33 => 'core_order_admin', 34 => 'core_order_waybills_admin', 35 => 'core_order_sizes_of_box_admin', 36 => 'core_order_composition_admin', 37 => 'core_order_extra_status_admin', 38 => 'core_order_canceled_reason_admin', 39 => 'core_pre_order_status_admin', 40 => 'core_pre_order_compositions_admin', 41 => 'core_pre_order_admin', 42 => 'core_discounts_manufacturer_admin', 43 => 'core_discounts_manufacturer_step_values_admin', 44 => 'core_discounts_contragent_manufacturer_admin', 45 => 'core_discounts_contragent_manufacturer_step_values_admin', 46 => 'core_logistics_bank_admin', 47 => 'core_logistics_seller_admin', 48 => 'core_logistics_region_city_admin', 49 => 'core_logistics_supplier_admin', 50 => 'core_logistics_supply_admin', 51 => 'core_logistics_product_in_supply_admin', 52 => 'core_logistics_unit_in_stock_admin', 53 => 'core_logistics_transit_admin', 54 => 'core_logistics_transit_status_admin', 55 => 'core_logistics_supply_status_admin', 56 => 'core_logistics_stock_admin', 57 => 'core_logistics_unit_in_transit_admin', 58 => 'core_logistics_unit_serial_admin', 59 => 'core_logistics_unit_in_stock_defect_transit_admin', 60 => 'core_logistics_additional_costs_of_supply_type_admin', 61 => 'core_logistics_additional_costs_of_supply_admin', 62 => 'core_manufacturer_price_analysis_admin', 63 => 'core_manufacturer_price_analysis_settings_admin', 64 => 'core_delivery_company_admin', 65 => 'core_delivery_services_admin', 66 => 'core_delivery_adress_admin', 67 => 'core_delivery_services_type_admin', 68 => 'core_config_admin', 69 => 'core_config_group_admin', 70 => 'core_manufacturer_admin', 71 => 'core_manufacturer_certificate_admin', 72 => 'core_manufacturer_series_admin', 73 => 'core_manufacturer_brand_admin', 74 => 'core_file_image_admin', 75 => 'core_file_document_admin', 76 => 'core_color_admin', 77 => 'core_color_pallete_admin', 78 => 'core_statistics_admin', 79 => 'core_statistics_not_finished_order_admin', 80 => 'core_payment_admin_payment_system_common', 81 => 'core_payment_admin_robokassa_system', 82 => 'core_payment_admin', 83 => 'core_review_admin_review', 84 => 'core_holiday_admin', 85 => 'office_work_time_admin'));
        $instance->setAdminGroups(array('Пользователи' => array('label' => 'Пользователи', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'application_user_contragent_admin', 1 => 'sonata.user.admin.user', 2 => 'sonata.user.admin.group', 3 => 'core_admin_trouble_ticket', 4 => 'core_review_admin_review')), 'Продукция' => array('label' => 'Продукция', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_shop_product_admin', 1 => 'core_shop_category_admin_product', 2 => 'core_category_virtual_product_admin', 3 => 'core_shop_property_admin', 4 => 'core_manufacturer_admin', 5 => 'core_manufacturer_brand_admin')), 'default' => array('label' => 'default', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_shop_category_admin_trouble_ticket', 1 => 'core_admin_trouble_ticket_status', 2 => 'core_admin_trouble_ticket_priority', 3 => 'core_order_canceled_reason_admin', 4 => 'core_manufacturer_certificate_admin')), 'FAQ' => array('label' => 'FAQ', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_shop_category_admin_faq', 1 => 'sonata.admin.faq.article')), 'Системное' => array('label' => 'Системное', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_country_admin', 1 => 'core_region_admin', 2 => 'core_city_admin', 3 => 'core_video_hosting_admin', 4 => 'core_currency_admin', 5 => 'core_legal_form_admin', 6 => 'core_directory_unit_of_measure_admin', 7 => 'core_directory_unit_of_measure_group_admin', 8 => 'core_config_admin', 9 => 'core_config_group_admin', 10 => 'core_color_admin', 11 => 'core_holiday_admin', 12 => 'office_work_time_admin')), 'Бухгалтерия' => array('label' => 'Бухгалтерия', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_order_admin', 1 => 'core_order_extra_status_admin', 2 => 'core_pre_order_status_admin', 3 => 'core_pre_order_admin', 4 => 'core_logistics_bank_admin', 5 => 'core_logistics_seller_admin', 6 => 'core_logistics_supplier_admin', 7 => 'core_logistics_supply_admin', 8 => 'core_logistics_unit_in_stock_admin', 9 => 'core_logistics_transit_admin', 10 => 'core_logistics_transit_status_admin', 11 => 'core_logistics_supply_status_admin', 12 => 'core_logistics_stock_admin', 13 => 'core_logistics_unit_in_stock_defect_transit_admin', 14 => 'core_logistics_additional_costs_of_supply_type_admin', 15 => 'core_statistics_not_finished_order_admin', 16 => 'core_payment_admin_payment_system_common', 17 => 'core_payment_admin')), 'Скидки' => array('label' => 'Скидки', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_discounts_manufacturer_admin', 1 => 'core_discounts_contragent_manufacturer_admin')), 'Статистика' => array('label' => 'Статистика', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_manufacturer_price_analysis_admin', 1 => 'core_statistics_admin')), 'Доставка' => array('label' => 'Доставка', 'label_catalogue' => 'SonataAdminBundle', 'roles' => array(), 'items' => array(0 => 'core_delivery_company_admin', 1 => 'core_delivery_services_admin', 2 => 'core_delivery_adress_admin', 3 => 'core_delivery_services_type_admin'))));
        $instance->setAdminClasses(array('Application\\Sonata\\UserBundle\\Entity\\CommonContragent' => array(0 => 'application_user_contragent_admin'), 'Application\\Sonata\\UserBundle\\Entity\\IndiContact' => array(0 => 'application_user_indi_contact_admin'), 'Application\\Sonata\\UserBundle\\Entity\\LegalContact' => array(0 => 'application_user_legal_contact_admin'), 'Application\\Sonata\\UserBundle\\Entity\\User' => array(0 => 'sonata.user.admin.user'), 'Application\\Sonata\\UserBundle\\Entity\\Group' => array(0 => 'sonata.user.admin.group'), 'Core\\ProductBundle\\Entity\\CommonProduct' => array(0 => 'core_shop_product_admin'), 'Core\\CategoryBundle\\Entity\\ProductCategory' => array(0 => 'core_shop_category_admin_product'), 'Core\\CategoryBundle\\Entity\\TroubleTicketCategory' => array(0 => 'core_shop_category_admin_trouble_ticket'), 'Core\\CategoryBundle\\Entity\\FaqCategory' => array(0 => 'core_shop_category_admin_faq'), 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory' => array(0 => 'core_category_virtual_product_admin'), 'Core\\PropertyBundle\\Entity\\Property' => array(0 => 'core_shop_property_admin'), 'Core\\PropertyBundle\\Entity\\DataProperty' => array(0 => 'core_shop_property_data_admin'), 'Core\\PropertyBundle\\Entity\\ProductDataProperty' => array(0 => 'core_shop_property_data_product_admin'), 'Core\\PropertyBundle\\Entity\\SettingsCategoryProperty' => array(0 => 'core_shop_property_settings_category_admin'), 'Core\\DirectoryBundle\\Entity\\Country' => array(0 => 'core_country_admin'), 'Core\\DirectoryBundle\\Entity\\Region' => array(0 => 'core_region_admin'), 'Core\\DirectoryBundle\\Entity\\City' => array(0 => 'core_city_admin'), 'Core\\DirectoryBundle\\Entity\\GeoCity' => array(0 => 'core_geo_city_admin'), 'Core\\DirectoryBundle\\Entity\\RemoteVideo' => array(0 => 'core_video_admin'), 'Core\\DirectoryBundle\\Entity\\VideoHosting' => array(0 => 'core_video_hosting_admin'), 'Core\\DirectoryBundle\\Entity\\Currency' => array(0 => 'core_currency_admin'), 'Core\\DirectoryBundle\\Entity\\LegalForm' => array(0 => 'core_legal_form_admin'), 'Core\\DirectoryBundle\\Entity\\ProductTags' => array(0 => 'core_directory_product_tags_admin'), 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure' => array(0 => 'core_directory_unit_of_measure_admin'), 'Core\\DirectoryBundle\\Entity\\UnitOfMeasureGroup' => array(0 => 'core_directory_unit_of_measure_group_admin'), 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array(0 => 'core_admin_trouble_ticket'), 'Core\\TroubleTicketBundle\\Entity\\Status' => array(0 => 'core_admin_trouble_ticket_status'), 'Core\\TroubleTicketBundle\\Entity\\Priority' => array(0 => 'core_admin_trouble_ticket_priority'), 'Core\\TroubleTicketBundle\\Entity\\Message' => array(0 => 'core_admin_trouble_ticket_message'), 'Core\\TroubleTicketBundle\\Entity\\Log' => array(0 => 'core_admin_trouble_ticket_log'), 'Core\\UnionBundle\\Entity\\ProductCompositionsUnion' => array(0 => 'core_union_product_composition'), 'Core\\UnionBundle\\Entity\\ProductQuantityAlternativeUnion' => array(0 => 'core_union_product_quantity_alternative'), 'Core\\FaqBundle\\Entity\\Article' => array(0 => 'sonata.admin.faq.article'), 'Core\\OrderBundle\\Entity\\Order' => array(0 => 'core_order_admin'), 'Core\\OrderBundle\\Entity\\Waybills' => array(0 => 'core_order_waybills_admin'), 'Core\\OrderBundle\\Entity\\SizesOfBox' => array(0 => 'core_order_sizes_of_box_admin'), 'Core\\OrderBundle\\Entity\\Composition' => array(0 => 'core_order_composition_admin'), 'Core\\OrderBundle\\Entity\\ExtraStatus' => array(0 => 'core_order_extra_status_admin'), 'Core\\OrderBundle\\Entity\\CanceledReason' => array(0 => 'core_order_canceled_reason_admin'), 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrderStatus' => array(0 => 'core_pre_order_status_admin'), 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrderComposition' => array(0 => 'core_pre_order_compositions_admin'), 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrder' => array(0 => 'core_pre_order_admin'), 'Core\\DiscountsBundle\\Entity\\ManufacturerDiscount' => array(0 => 'core_discounts_manufacturer_admin'), 'Core\\DiscountsBundle\\Entity\\ManufacturerStepValues' => array(0 => 'core_discounts_manufacturer_step_values_admin'), 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerDiscount' => array(0 => 'core_discounts_contragent_manufacturer_admin'), 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerStepValues' => array(0 => 'core_discounts_contragent_manufacturer_step_values_admin'), 'Core\\LogisticsBundle\\Entity\\Bank' => array(0 => 'core_logistics_bank_admin'), 'Core\\LogisticsBundle\\Entity\\Seller' => array(0 => 'core_logistics_seller_admin'), 'Core\\LogisticsBundle\\Entity\\RegionCity' => array(0 => 'core_logistics_region_city_admin'), 'Core\\LogisticsBundle\\Entity\\Supplier' => array(0 => 'core_logistics_supplier_admin'), 'Core\\LogisticsBundle\\Entity\\Supply' => array(0 => 'core_logistics_supply_admin'), 'Core\\LogisticsBundle\\Entity\\ProductInSupply' => array(0 => 'core_logistics_product_in_supply_admin'), 'Core\\LogisticsBundle\\Entity\\UnitInStock' => array(0 => 'core_logistics_unit_in_stock_admin'), 'Core\\LogisticsBundle\\Entity\\Transit' => array(0 => 'core_logistics_transit_admin'), 'Core\\LogisticsBundle\\Entity\\TransitStatus' => array(0 => 'core_logistics_transit_status_admin'), 'Core\\LogisticsBundle\\Entity\\SupplyStatus' => array(0 => 'core_logistics_supply_status_admin'), 'Core\\LogisticsBundle\\Entity\\Stock' => array(0 => 'core_logistics_stock_admin'), 'Core\\LogisticsBundle\\Entity\\ProductInTransit' => array(0 => 'core_logistics_unit_in_transit_admin'), 'Core\\LogisticsBundle\\Entity\\UnitSerials' => array(0 => 'core_logistics_unit_serial_admin'), 'Core\\LogisticsBundle\\Entity\\UnitInStockDefectReason' => array(0 => 'core_logistics_unit_in_stock_defect_transit_admin'), 'Core\\LogisticsBundle\\Entity\\AdditionalCostsTypeOfSupply' => array(0 => 'core_logistics_additional_costs_of_supply_type_admin'), 'Core\\LogisticsBundle\\Entity\\AdditionalCostsOfSupply' => array(0 => 'core_logistics_additional_costs_of_supply_admin'), 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array(0 => 'core_manufacturer_price_analysis_admin'), 'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysisSettings' => array(0 => 'core_manufacturer_price_analysis_settings_admin'), 'Core\\DeliveryBundle\\Entity\\Company' => array(0 => 'core_delivery_company_admin'), 'Core\\DeliveryBundle\\Entity\\Service' => array(0 => 'core_delivery_services_admin'), 'Core\\DeliveryBundle\\Entity\\Address' => array(0 => 'core_delivery_adress_admin'), 'Core\\DeliveryBundle\\Entity\\ServiceType' => array(0 => 'core_delivery_services_type_admin'), 'Core\\ConfigBundle\\Entity\\Config' => array(0 => 'core_config_admin'), 'Core\\ConfigBundle\\Entity\\Group' => array(0 => 'core_config_group_admin'), 'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array(0 => 'core_manufacturer_admin'), 'Core\\ManufacturerBundle\\Entity\\Certificate' => array(0 => 'core_manufacturer_certificate_admin'), 'Core\\ManufacturerBundle\\Entity\\Series' => array(0 => 'core_manufacturer_series_admin'), 'Core\\ManufacturerBundle\\Entity\\Brand' => array(0 => 'core_manufacturer_brand_admin'), 'Core\\FileBundle\\Entity\\ImageFile' => array(0 => 'core_file_image_admin'), 'Core\\FileBundle\\Entity\\DocumentFile' => array(0 => 'core_file_document_admin'), 'Core\\ColorBundle\\Entity\\Color' => array(0 => 'core_color_admin'), 'Core\\ColorBundle\\Entity\\ColorPalette' => array(0 => 'core_color_pallete_admin'), 'Core\\StatisticsBundle\\Entity\\Statistics' => array(0 => 'core_statistics_admin'), 'Core\\StatisticsBundle\\Entity\\NotFinishedOrder' => array(0 => 'core_statistics_not_finished_order_admin'), 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem' => array(0 => 'core_payment_admin_payment_system_common'), 'Core\\PaymentBundle\\Entity\\PaymentSystem\\RobokassaSubsystem' => array(0 => 'core_payment_admin_robokassa_system'), 'Core\\PaymentBundle\\Entity\\Payment' => array(0 => 'core_payment_admin'), 'Core\\ReviewBundle\\Entity\\Review' => array(0 => 'core_review_admin_review'), 'Core\\HolidayBundle\\Entity\\Holiday' => array(0 => 'core_holiday_admin'), 'Core\\OfficeWorkTimeBundle\\Entity\\Schedule' => array(0 => 'office_work_time_admin')));
        return $instance;
    }
    protected function getSonata_Admin_Route_DefaultGeneratorService()
    {
        return $this->services['sonata.admin.route.default_generator'] = new \Sonata\AdminBundle\Route\DefaultRouteGenerator($this->get('router'));
    }
    protected function getSonata_Admin_Route_PathInfoService()
    {
        return $this->services['sonata.admin.route.path_info'] = new \Sonata\AdminBundle\Route\PathInfoBuilder($this->get('sonata.admin.audit.manager'));
    }
    protected function getSonata_Admin_Route_QueryStringService()
    {
        return $this->services['sonata.admin.route.query_string'] = new \Sonata\AdminBundle\Route\QueryStringBuilder($this->get('sonata.admin.audit.manager'));
    }
    protected function getSonata_Admin_RouteLoaderService()
    {
        return $this->services['sonata.admin.route_loader'] = new \Sonata\AdminBundle\Route\AdminPoolLoader($this->get('sonata.admin.pool'), array(0 => 'application_user_contragent_admin', 1 => 'application_user_indi_contact_admin', 2 => 'application_user_legal_contact_admin', 3 => 'sonata.user.admin.user', 4 => 'sonata.user.admin.group', 5 => 'core_shop_product_admin', 6 => 'core_shop_category_admin_product', 7 => 'core_shop_category_admin_trouble_ticket', 8 => 'core_shop_category_admin_faq', 9 => 'core_category_virtual_product_admin', 10 => 'core_shop_property_admin', 11 => 'core_shop_property_data_admin', 12 => 'core_shop_property_data_product_admin', 13 => 'core_shop_property_settings_category_admin', 14 => 'core_country_admin', 15 => 'core_region_admin', 16 => 'core_city_admin', 17 => 'core_geo_city_admin', 18 => 'core_video_admin', 19 => 'core_video_hosting_admin', 20 => 'core_currency_admin', 21 => 'core_legal_form_admin', 22 => 'core_directory_product_tags_admin', 23 => 'core_directory_unit_of_measure_admin', 24 => 'core_directory_unit_of_measure_group_admin', 25 => 'core_admin_trouble_ticket', 26 => 'core_admin_trouble_ticket_status', 27 => 'core_admin_trouble_ticket_priority', 28 => 'core_admin_trouble_ticket_message', 29 => 'core_admin_trouble_ticket_log', 30 => 'core_union_product_composition', 31 => 'core_union_product_quantity_alternative', 32 => 'sonata.admin.faq.article', 33 => 'core_order_admin', 34 => 'core_order_waybills_admin', 35 => 'core_order_sizes_of_box_admin', 36 => 'core_order_composition_admin', 37 => 'core_order_extra_status_admin', 38 => 'core_order_canceled_reason_admin', 39 => 'core_pre_order_status_admin', 40 => 'core_pre_order_compositions_admin', 41 => 'core_pre_order_admin', 42 => 'core_discounts_manufacturer_admin', 43 => 'core_discounts_manufacturer_step_values_admin', 44 => 'core_discounts_contragent_manufacturer_admin', 45 => 'core_discounts_contragent_manufacturer_step_values_admin', 46 => 'core_logistics_bank_admin', 47 => 'core_logistics_seller_admin', 48 => 'core_logistics_region_city_admin', 49 => 'core_logistics_supplier_admin', 50 => 'core_logistics_supply_admin', 51 => 'core_logistics_product_in_supply_admin', 52 => 'core_logistics_unit_in_stock_admin', 53 => 'core_logistics_transit_admin', 54 => 'core_logistics_transit_status_admin', 55 => 'core_logistics_supply_status_admin', 56 => 'core_logistics_stock_admin', 57 => 'core_logistics_unit_in_transit_admin', 58 => 'core_logistics_unit_serial_admin', 59 => 'core_logistics_unit_in_stock_defect_transit_admin', 60 => 'core_logistics_additional_costs_of_supply_type_admin', 61 => 'core_logistics_additional_costs_of_supply_admin', 62 => 'core_manufacturer_price_analysis_admin', 63 => 'core_manufacturer_price_analysis_settings_admin', 64 => 'core_delivery_company_admin', 65 => 'core_delivery_services_admin', 66 => 'core_delivery_adress_admin', 67 => 'core_delivery_services_type_admin', 68 => 'core_config_admin', 69 => 'core_config_group_admin', 70 => 'core_manufacturer_admin', 71 => 'core_manufacturer_certificate_admin', 72 => 'core_manufacturer_series_admin', 73 => 'core_manufacturer_brand_admin', 74 => 'core_file_image_admin', 75 => 'core_file_document_admin', 76 => 'core_color_admin', 77 => 'core_color_pallete_admin', 78 => 'core_statistics_admin', 79 => 'core_statistics_not_finished_order_admin', 80 => 'core_payment_admin_payment_system_common', 81 => 'core_payment_admin_robokassa_system', 82 => 'core_payment_admin', 83 => 'core_review_admin_review', 84 => 'core_holiday_admin', 85 => 'office_work_time_admin'), $this);
    }
    protected function getSonata_Admin_Search_HandlerService()
    {
        return $this->services['sonata.admin.search.handler'] = new \Sonata\AdminBundle\Search\SearchHandler($this->get('sonata.admin.pool'));
    }
    protected function getSonata_Admin_Security_HandlerService()
    {
        return $this->services['sonata.admin.security.handler'] = new \Sonata\AdminBundle\Security\Handler\RoleSecurityHandler($this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE), array(0 => 'ROLE_SUPER_ADMIN'));
    }
    protected function getSonata_Admin_Twig_ExtensionService()
    {
        return $this->services['sonata.admin.twig.extension'] = new \Sonata\AdminBundle\Twig\Extension\SonataAdminExtension($this->get('sonata.admin.pool'));
    }
    protected function getSonata_Admin_Validator_InlineService()
    {
        return $this->services['sonata.admin.validator.inline'] = new \Sonata\AdminBundle\Validator\InlineValidator($this, $this->get('validator.validator_factory'));
    }
    protected function getSonata_AdminDoctrineOrm_Block_AuditService()
    {
        return $this->services['sonata.admin_doctrine_orm.block.audit'] = new \Sonata\DoctrineORMAdminBundle\Block\AuditBlockService('sonata.admin_doctrine_orm.block.audit', $this->get('templating'), $this->get('simplethings_entityaudit.reader', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSonata_Block_Cache_Handler_DefaultService()
    {
        return $this->services['sonata.block.cache.handler.default'] = new \Sonata\BlockBundle\Cache\HttpCacheHandler();
    }
    protected function getSonata_Block_Cache_Handler_NoopService()
    {
        return $this->services['sonata.block.cache.handler.noop'] = new \Sonata\BlockBundle\Cache\NoopHttpCacheHandler();
    }
    protected function getSonata_Block_ContextManager_DefaultService()
    {
        return $this->services['sonata.block.context_manager.default'] = new \Sonata\BlockBundle\Block\BlockContextManager($this->get('sonata.block.loader.chain'), $this->get('sonata.block.manager'), array('by_type' => array('sonata.admin.block.admin_list' => 'sonata.cache.noop', 'sonata.admin_doctrine_orm.block.audit' => 'sonata.cache.noop', 'sonata.block.service.text' => 'sonata.cache.noop', 'sonata.block.service.action' => 'sonata.cache.noop', 'sonata.block.service.rss' => 'sonata.cache.noop', 'sonata.block.service.statistics' => 'sonata.cache.noop')), $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSonata_Block_Exception_Filter_DebugOnlyService()
    {
        return $this->services['sonata.block.exception.filter.debug_only'] = new \Sonata\BlockBundle\Exception\Filter\DebugOnlyFilter(false);
    }
    protected function getSonata_Block_Exception_Filter_IgnoreBlockExceptionService()
    {
        return $this->services['sonata.block.exception.filter.ignore_block_exception'] = new \Sonata\BlockBundle\Exception\Filter\IgnoreClassFilter('Sonata\\BlockBundle\\Exception\\BlockExceptionInterface');
    }
    protected function getSonata_Block_Exception_Filter_KeepAllService()
    {
        return $this->services['sonata.block.exception.filter.keep_all'] = new \Sonata\BlockBundle\Exception\Filter\KeepAllFilter();
    }
    protected function getSonata_Block_Exception_Filter_KeepNoneService()
    {
        return $this->services['sonata.block.exception.filter.keep_none'] = new \Sonata\BlockBundle\Exception\Filter\KeepNoneFilter();
    }
    protected function getSonata_Block_Exception_Renderer_InlineService()
    {
        return $this->services['sonata.block.exception.renderer.inline'] = new \Sonata\BlockBundle\Exception\Renderer\InlineRenderer($this->get('templating'), 'SonataBlockBundle:Block:block_exception.html.twig');
    }
    protected function getSonata_Block_Exception_Renderer_InlineDebugService()
    {
        return $this->services['sonata.block.exception.renderer.inline_debug'] = new \Sonata\BlockBundle\Exception\Renderer\InlineDebugRenderer($this->get('templating'), 'SonataBlockBundle:Block:block_exception_debug.html.twig', false, true);
    }
    protected function getSonata_Block_Exception_Renderer_ThrowService()
    {
        return $this->services['sonata.block.exception.renderer.throw'] = new \Sonata\BlockBundle\Exception\Renderer\MonkeyThrowRenderer();
    }
    protected function getSonata_Block_Exception_Strategy_ManagerService()
    {
        $this->services['sonata.block.exception.strategy.manager'] = $instance = new \Sonata\BlockBundle\Exception\Strategy\StrategyManager($this, array('debug_only' => 'sonata.block.exception.filter.debug_only', 'ignore_block_exception' => 'sonata.block.exception.filter.ignore_block_exception', 'keep_all' => 'sonata.block.exception.filter.keep_all', 'keep_none' => 'sonata.block.exception.filter.keep_none'), array('inline' => 'sonata.block.exception.renderer.inline', 'inline_debug' => 'sonata.block.exception.renderer.inline_debug', 'throw' => 'sonata.block.exception.renderer.throw'), array(), array());
        $instance->setDefaultFilter('debug_only');
        $instance->setDefaultRenderer('throw');
        return $instance;
    }
    protected function getSonata_Block_Form_Type_BlockService()
    {
        return $this->services['sonata.block.form.type.block'] = new \Sonata\BlockBundle\Form\Type\ServiceListType($this->get('sonata.block.manager'));
    }
    protected function getSonata_Block_Form_Type_ContainerTemplateService()
    {
        return $this->services['sonata.block.form.type.container_template'] = new \Sonata\BlockBundle\Form\Type\ContainerTemplateType(array('SonataBlockBundle:Block:block_container.html.twig' => 'SonataBlockBundle default template'));
    }
    protected function getSonata_Block_Loader_ChainService()
    {
        return $this->services['sonata.block.loader.chain'] = new \Sonata\BlockBundle\Block\BlockLoaderChain(array(0 => $this->get('sonata.block.loader.service')));
    }
    protected function getSonata_Block_Loader_ServiceService()
    {
        return $this->services['sonata.block.loader.service'] = new \Sonata\BlockBundle\Block\Loader\ServiceLoader(array(0 => 'sonata.admin.block.admin_list', 1 => 'sonata.admin_doctrine_orm.block.audit', 2 => 'sonata.block.service.text', 3 => 'sonata.block.service.action', 4 => 'sonata.block.service.rss', 5 => 'sonata.block.service.statistics'));
    }
    protected function getSonata_Block_Renderer_DefaultService()
    {
        return $this->services['sonata.block.renderer.default'] = new \Sonata\BlockBundle\Block\BlockRenderer($this->get('sonata.block.manager'), $this->get('sonata.block.exception.strategy.manager'), $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE), false);
    }
    protected function getSonata_Block_Service_ContainerService()
    {
        return $this->services['sonata.block.service.container'] = new \Sonata\BlockBundle\Block\Service\ContainerBlockService('sonata.block.container', $this->get('templating'));
    }
    protected function getSonata_Block_Service_EmptyService()
    {
        return $this->services['sonata.block.service.empty'] = new \Sonata\BlockBundle\Block\Service\EmptyBlockService('sonata.block.empty', $this->get('templating'));
    }
    protected function getSonata_Block_Service_MenuService()
    {
        return $this->services['sonata.block.service.menu'] = new \Sonata\BlockBundle\Block\Service\MenuBlockService('sonata.block.menu', $this->get('templating'), $this->get('knp_menu.menu_provider'), array());
    }
    protected function getSonata_Block_Service_RssService()
    {
        return $this->services['sonata.block.service.rss'] = new \Sonata\BlockBundle\Block\Service\RssBlockService('sonata.block.rss', $this->get('templating'));
    }
    protected function getSonata_Block_Service_StatisticsService()
    {
        return $this->services['sonata.block.service.statistics'] = new \Application\Sonata\BlockBundle\Block\Service\StatisticsBlockService('sonata.block.statistics', $this->get('templating'), $this->get('core_dashboard_statistics_logic'));
    }
    protected function getSonata_Block_Service_TemplateService()
    {
        return $this->services['sonata.block.service.template'] = new \Sonata\BlockBundle\Block\Service\TemplateBlockService('sonata.block.template', $this->get('templating'));
    }
    protected function getSonata_Block_Service_TextService()
    {
        return $this->services['sonata.block.service.text'] = new \Sonata\BlockBundle\Block\Service\TextBlockService('sonata.block.text', $this->get('templating'));
    }
    protected function getSonata_Block_Templating_HelperService()
    {
        return $this->services['sonata.block.templating.helper'] = new \Sonata\BlockBundle\Templating\Helper\BlockHelper($this->get('sonata.block.manager'), array('by_type' => array('sonata.admin.block.admin_list' => 'sonata.cache.noop', 'sonata.admin_doctrine_orm.block.audit' => 'sonata.cache.noop', 'sonata.block.service.text' => 'sonata.cache.noop', 'sonata.block.service.action' => 'sonata.cache.noop', 'sonata.block.service.rss' => 'sonata.cache.noop', 'sonata.block.service.statistics' => 'sonata.cache.noop')), $this->get('sonata.block.renderer.default'), $this->get('sonata.block.context_manager.default'), $this->get('event_dispatcher'), NULL, $this->get('sonata.block.cache.handler.default', ContainerInterface::NULL_ON_INVALID_REFERENCE), NULL);
    }
    protected function getSonata_Block_Twig_GlobalService()
    {
        return $this->services['sonata.block.twig.global'] = new \Sonata\BlockBundle\Twig\GlobalVariables(array('block_base' => 'SonataBlockBundle:Block:block_base.html.twig', 'block_container' => 'SonataBlockBundle:Block:block_container.html.twig'));
    }
    protected function getSonata_Core_Date_MomentFormatConverterService()
    {
        return $this->services['sonata.core.date.moment_format_converter'] = new \Sonata\CoreBundle\Date\MomentFormatConverter();
    }
    protected function getSonata_Core_Flashmessage_ManagerService()
    {
        return $this->services['sonata.core.flashmessage.manager'] = new \Sonata\CoreBundle\FlashMessage\FlashManager($this->get('session'), $this->get('translator.default'), array('success' => array('success' => array('domain' => 'SonataCoreBundle'), 'sonata_flash_success' => array('domain' => 'SonataAdminBundle'), 'sonata_user_success' => array('domain' => 'SonataUserBundle'), 'fos_user_success' => array('domain' => 'FOSUserBundle')), 'warning' => array('warning' => array('domain' => 'SonataCoreBundle'), 'sonata_flash_info' => array('domain' => 'SonataAdminBundle')), 'danger' => array('error' => array('domain' => 'SonataCoreBundle'), 'sonata_flash_error' => array('domain' => 'SonataAdminBundle'), 'sonata_user_error' => array('domain' => 'SonataUserBundle'))), array('success' => 'success', 'warning' => 'warning', 'danger' => 'danger'));
    }
    protected function getSonata_Core_Flashmessage_Twig_ExtensionService()
    {
        return $this->services['sonata.core.flashmessage.twig.extension'] = new \Sonata\CoreBundle\Twig\Extension\FlashMessageExtension($this->get('sonata.core.flashmessage.manager'));
    }
    protected function getSonata_Core_Form_Type_ArrayService()
    {
        return $this->services['sonata.core.form.type.array'] = new \Sonata\CoreBundle\Form\Type\ImmutableArrayType();
    }
    protected function getSonata_Core_Form_Type_BooleanService()
    {
        return $this->services['sonata.core.form.type.boolean'] = new \Sonata\CoreBundle\Form\Type\BooleanType();
    }
    protected function getSonata_Core_Form_Type_CollectionService()
    {
        return $this->services['sonata.core.form.type.collection'] = new \Sonata\CoreBundle\Form\Type\CollectionType();
    }
    protected function getSonata_Core_Form_Type_DatePickerService()
    {
        return $this->services['sonata.core.form.type.date_picker'] = new \Sonata\CoreBundle\Form\Type\DatePickerType($this->get('sonata.core.date.moment_format_converter'));
    }
    protected function getSonata_Core_Form_Type_DateRangeService()
    {
        return $this->services['sonata.core.form.type.date_range'] = new \Sonata\CoreBundle\Form\Type\DateRangeType($this->get('translator.default'));
    }
    protected function getSonata_Core_Form_Type_DatetimePickerService()
    {
        return $this->services['sonata.core.form.type.datetime_picker'] = new \Sonata\CoreBundle\Form\Type\DateTimePickerType($this->get('sonata.core.date.moment_format_converter'));
    }
    protected function getSonata_Core_Form_Type_DatetimeRangeService()
    {
        return $this->services['sonata.core.form.type.datetime_range'] = new \Sonata\CoreBundle\Form\Type\DateTimeRangeType($this->get('translator.default'));
    }
    protected function getSonata_Core_Form_Type_EqualService()
    {
        return $this->services['sonata.core.form.type.equal'] = new \Sonata\CoreBundle\Form\Type\EqualType($this->get('translator.default'));
    }
    protected function getSonata_Core_Form_Type_TranslatableChoiceService()
    {
        return $this->services['sonata.core.form.type.translatable_choice'] = new \Sonata\CoreBundle\Form\Type\TranslatableChoiceType($this->get('translator.default'));
    }
    protected function getSonata_Core_Model_Adapter_ChainService()
    {
        $this->services['sonata.core.model.adapter.chain'] = $instance = new \Sonata\CoreBundle\Model\Adapter\AdapterChain();
        $instance->addAdapter(new \Sonata\CoreBundle\Model\Adapter\DoctrineORMAdapter($this->get('doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        return $instance;
    }
    protected function getSonata_Core_Twig_Extension_TextService()
    {
        return $this->services['sonata.core.twig.extension.text'] = new \Twig_Extensions_Extension_Text();
    }
    protected function getSonata_Core_Twig_StatusExtensionService()
    {
        $this->services['sonata.core.twig.status_extension'] = $instance = new \Sonata\CoreBundle\Twig\Extension\StatusExtension();
        $instance->addStatusService($this->get('sonata.core.flashmessage.manager'));
        return $instance;
    }
    protected function getSonata_Core_Twig_TemplateExtensionService()
    {
        return $this->services['sonata.core.twig.template_extension'] = new \Sonata\CoreBundle\Twig\Extension\TemplateExtension(false, $this->get('translator.default'), $this->get('sonata.core.model.adapter.chain'));
    }
    protected function getSonata_EasyExtends_Doctrine_MapperService()
    {
        $this->services['sonata.easy_extends.doctrine.mapper'] = $instance = new \Sonata\EasyExtendsBundle\Mapper\DoctrineORMMapper($this->get('doctrine'), array());
        $instance->addAssociation('Application\\Sonata\\UserBundle\\Entity\\User', 'mapManyToMany', array(0 => array('fieldName' => 'groups', 'targetEntity' => 'Application\\Sonata\\UserBundle\\Entity\\Group', 'cascade' => array(), 'joinTable' => array('name' => 'fos_user_user_group', 'joinColumns' => array(0 => array('name' => 'user_id', 'referencedColumnName' => 'id', 'onDelete' => 'CASCADE')), 'inverseJoinColumns' => array(0 => array('name' => 'group_id', 'referencedColumnName' => 'id', 'onDelete' => 'CASCADE'))))));
        return $instance;
    }
    protected function getSonata_EasyExtends_Generator_BundleService()
    {
        return $this->services['sonata.easy_extends.generator.bundle'] = new \Sonata\EasyExtendsBundle\Generator\BundleGenerator();
    }
    protected function getSonata_EasyExtends_Generator_OdmService()
    {
        return $this->services['sonata.easy_extends.generator.odm'] = new \Sonata\EasyExtendsBundle\Generator\OdmGenerator();
    }
    protected function getSonata_EasyExtends_Generator_OrmService()
    {
        return $this->services['sonata.easy_extends.generator.orm'] = new \Sonata\EasyExtendsBundle\Generator\OrmGenerator();
    }
    protected function getSonata_EasyExtends_Generator_PhpcrService()
    {
        return $this->services['sonata.easy_extends.generator.phpcr'] = new \Sonata\EasyExtendsBundle\Generator\PHPCRGenerator();
    }
    protected function getSonata_EasyExtends_Generator_SerializerService()
    {
        return $this->services['sonata.easy_extends.generator.serializer'] = new \Sonata\EasyExtendsBundle\Generator\SerializerGenerator();
    }
    protected function getSonata_Formatter_Block_FormatterService()
    {
        return $this->services['sonata.formatter.block.formatter'] = new \Sonata\FormatterBundle\Block\FormatterBlockService('sonata.block.empty', $this->get('templating'));
    }
    protected function getSonata_Formatter_Form_Type_SelectorService()
    {
        return $this->services['sonata.formatter.form.type.selector'] = new \Sonata\FormatterBundle\Form\Type\FormatterType($this->get('sonata.formatter.pool'), $this->get('translator.default'), $this->get('ivory_ck_editor.config_manager'));
    }
    protected function getSonata_Formatter_PoolService()
    {
        $a = $this->get('sonata.formatter.text.raw');
        $this->services['sonata.formatter.pool'] = $instance = new \Sonata\FormatterBundle\Formatter\Pool($this->get('logger'));
        $instance->add('markdown', $this->get('sonata.formatter.text.markdown'), $this->get('sonata.formatter.twig.env.markdown'));
        $instance->add('text', $this->get('sonata.formatter.text.text'), $this->get('sonata.formatter.twig.env.text'));
        $instance->add('rawhtml', $a, $this->get('sonata.formatter.twig.env.rawhtml'));
        $instance->add('richhtml', $a, $this->get('sonata.formatter.twig.env.richhtml'));
        $instance->add('twig', $this->get('sonata.formatter.text.twigengine'), NULL);
        return $instance;
    }
    protected function getSonata_Formatter_Text_MarkdownService()
    {
        return $this->services['sonata.formatter.text.markdown'] = new \Sonata\FormatterBundle\Formatter\MarkdownFormatter($this->get('markdown.parser'));
    }
    protected function getSonata_Formatter_Text_RawService()
    {
        return $this->services['sonata.formatter.text.raw'] = new \Sonata\FormatterBundle\Formatter\RawFormatter();
    }
    protected function getSonata_Formatter_Text_TextService()
    {
        return $this->services['sonata.formatter.text.text'] = new \Sonata\FormatterBundle\Formatter\TextFormatter();
    }
    protected function getSonata_Formatter_Text_TwigengineService()
    {
        return $this->services['sonata.formatter.text.twigengine'] = new \Sonata\FormatterBundle\Formatter\TwigFormatter($this->get('twig'));
    }
    protected function getSonata_Formatter_Twig_ControlFlowService()
    {
        return $this->services['sonata.formatter.twig.control_flow'] = new \Sonata\FormatterBundle\Extension\ControlFlowExtension();
    }
    protected function getSonata_Formatter_Twig_GistService()
    {
        return $this->services['sonata.formatter.twig.gist'] = new \Sonata\FormatterBundle\Extension\GistExtension();
    }
    protected function getSonata_Intl_LocaleDetector_RequestService()
    {
        return $this->services['sonata.intl.locale_detector.request'] = new \Sonata\IntlBundle\Locale\RequestDetector($this, 'ru');
    }
    protected function getSonata_Intl_Templating_Helper_DatetimeService()
    {
        return $this->services['sonata.intl.templating.helper.datetime'] = new \Sonata\IntlBundle\Templating\Helper\DateTimeHelper($this->get('sonata.intl.timezone_detector.chain'), 'UTF-8', $this->get('sonata.intl.locale_detector.request'));
    }
    protected function getSonata_Intl_Templating_Helper_LocaleService()
    {
        return $this->services['sonata.intl.templating.helper.locale'] = new \Sonata\IntlBundle\Templating\Helper\LocaleHelper('UTF-8', $this->get('sonata.intl.locale_detector.request'));
    }
    protected function getSonata_Intl_Templating_Helper_NumberService()
    {
        return $this->services['sonata.intl.templating.helper.number'] = new \Sonata\IntlBundle\Templating\Helper\NumberHelper('UTF-8', $this->get('sonata.intl.locale_detector.request'));
    }
    protected function getSonata_Intl_TimezoneDetector_ChainService()
    {
        $this->services['sonata.intl.timezone_detector.chain'] = $instance = new \Sonata\IntlBundle\Timezone\ChainTimezoneDetector('GMT');
        $instance->addDetector($this->get('sonata.intl.timezone_detector.user'));
        $instance->addDetector($this->get('sonata.intl.timezone_detector.locale'));
        return $instance;
    }
    protected function getSonata_Intl_TimezoneDetector_LocaleService()
    {
        return $this->services['sonata.intl.timezone_detector.locale'] = new \Sonata\IntlBundle\Timezone\LocaleBasedTimezoneDetector($this->get('sonata.intl.locale_detector.request'), array());
    }
    protected function getSonata_Intl_TimezoneDetector_UserService()
    {
        return $this->services['sonata.intl.timezone_detector.user'] = new \Sonata\IntlBundle\Timezone\UserBasedTimezoneDetector($this->get('security.context'), '');
    }
    protected function getSonata_User_Admin_GroupService()
    {
        $instance = new \Application\Sonata\UserBundle\Admin\GroupAdmin('sonata.user.admin.group', 'Application\\Sonata\\UserBundle\\Entity\\Group', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SonataUserBundle');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('groups');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getSonata_User_Admin_UserService()
    {
        $instance = new \Application\Sonata\UserBundle\Admin\UserAdmin('sonata.user.admin.user', 'Application\\Sonata\\UserBundle\\Entity\\User', 'SonataAdminBundle:CRUD');
        $instance->setUserManager($this->get('fos_user.user_manager'));
        $instance->setTranslationDomain('SonataUserBundle');
        $instance->setLabelTranslatorStrategy($this->get('sonata.admin.label.strategy.underscore'));
        $instance->setManagerType('orm');
        $instance->setModelManager($this->get('sonata.admin.manager.orm'));
        $instance->setFormContractor($this->get('sonata.admin.builder.orm_form'));
        $instance->setShowBuilder($this->get('sonata.admin.builder.orm_show'));
        $instance->setListBuilder($this->get('sonata.admin.builder.orm_list'));
        $instance->setDatagridBuilder($this->get('sonata.admin.builder.orm_datagrid'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setConfigurationPool($this->get('sonata.admin.pool'));
        $instance->setRouteGenerator($this->get('sonata.admin.route.default_generator'));
        $instance->setValidator($this->get('validator'));
        $instance->setSecurityHandler($this->get('sonata.admin.security.handler'));
        $instance->setMenuFactory($this->get('knp_menu.factory'));
        $instance->setRouteBuilder($this->get('sonata.admin.route.path_info'));
        $instance->setLabel('users');
        $instance->setPersistFilters(false);
        $instance->setTemplates(array('user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig', 'layout' => 'ApplicationSonataAdminBundle::layout.html.twig', 'ajax' => 'SonataAdminBundle::ajax_layout.html.twig', 'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig', 'list' => 'SonataAdminBundle:CRUD:list.html.twig', 'show' => 'SonataAdminBundle:CRUD:show.html.twig', 'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig', 'history' => 'SonataAdminBundle:CRUD:history.html.twig', 'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig', 'acl' => 'SonataAdminBundle:CRUD:acl.html.twig', 'action' => 'SonataAdminBundle:CRUD:action.html.twig', 'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig', 'preview' => 'SonataAdminBundle:CRUD:preview.html.twig', 'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig', 'delete' => 'SonataAdminBundle:CRUD:delete.html.twig', 'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig', 'select' => 'SonataAdminBundle:CRUD:list__select.html.twig', 'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig', 'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig', 'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig', 'pager_links' => 'SonataAdminBundle:Pager:links.html.twig', 'pager_results' => 'SonataAdminBundle:Pager:results.html.twig', 'search' => 'SonataAdminBundle:Core:search.html.twig', 'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig'));
        $instance->setSecurityInformation(array('EDIT' => array(0 => 'EDIT'), 'LIST' => array(0 => 'LIST'), 'CREATE' => array(0 => 'CREATE'), 'VIEW' => array(0 => 'VIEW'), 'DELETE' => array(0 => 'DELETE'), 'EXPORT' => array(0 => 'EXPORT'), 'OPERATOR' => array(0 => 'OPERATOR'), 'MASTER' => array(0 => 'MASTER')));
        $instance->initialize();
        $instance->setFormTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        $instance->setFilterTheme(array(0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig'));
        return $instance;
    }
    protected function getSonata_User_Block_AccountService()
    {
        return $this->services['sonata.user.block.account'] = new \Sonata\UserBundle\Block\AccountBlockService('sonata.user.block.account', $this->get('templating'), $this->get('security.context'));
    }
    protected function getSonata_User_Block_MenuService()
    {
        return $this->services['sonata.user.block.menu'] = new \Sonata\UserBundle\Block\ProfileMenuBlockService('sonata.user.block.menu', $this->get('templating'), $this->get('knp_menu.menu_provider'), $this->get('sonata.user.profile.menu_builder'));
    }
    protected function getSonata_User_EditableRoleBuilderService()
    {
        return $this->services['sonata.user.editable_role_builder'] = new \Sonata\UserBundle\Security\EditableRolesBuilder($this->get('security.context'), $this->get('sonata.admin.pool'), array('ROLE_ADMIN' => array(0 => 'ROLE_USER', 1 => 'ROLE_SONATA_ADMIN'), 'ROLE_SUPER_ADMIN' => array(0 => 'ROLE_ALLOWED_TO_SWITCH', 1 => 'ROLE_ADMIN', 2 => 'ROLE_CORE_ORDER_EXTRA_STATUS_ADMIN_UPDATE_NAME', 3 => 'ROLE_CORE_LOGISTICS_SUPPLY_STATUS_ADMIN_UPDATE_NAME', 4 => 'ROLE_CORE_ORDER_CANCELED_REASON_ADMIN_UPDATE_NAME', 5 => 'ROLE_CORE_LOGISTICS_UNIT_IN_STOCK_DEFECT_TRANSIT_ADMIN_UPDATE_NAME', 6 => 'ROLE_CORE_LOGISTICS_TRANSIT_STATUS_ADMIN_UPDATE_NAME', 7 => 'CAN_FASTEDIT')));
    }
    protected function getSonata_User_Form_GenderListService()
    {
        return $this->services['sonata.user.form.gender_list'] = new \Sonata\CoreBundle\Form\Type\StatusType('Application\\Sonata\\UserBundle\\Entity\\User', 'getGenderList', 'sonata_user_gender');
    }
    protected function getSonata_User_Form_Type_SecurityRolesService()
    {
        return $this->services['sonata.user.form.type.security_roles'] = new \Sonata\UserBundle\Form\Type\SecurityRolesType($this->get('sonata.user.editable_role_builder'));
    }
    protected function getSonata_User_Profile_FormService()
    {
        return $this->services['sonata.user.profile.form'] = $this->get('form.factory')->createNamed('sonata_user_profile_form', 'sonata_user_profile', NULL, array('validation_groups' => array(0 => 'Profile', 1 => 'Default'), 'translation_domain' => 'SonataUserBundle'));
    }
    protected function getSonata_User_Profile_Form_HandlerService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('sonata.user.profile.form.handler', 'request');
        }
        return $this->services['sonata.user.profile.form.handler'] = $this->scopedServices['request']['sonata.user.profile.form.handler'] = new \Sonata\UserBundle\Form\Handler\ProfileFormHandler($this->get('sonata.user.profile.form'), $this->get('request'), $this->get('fos_user.user_manager'));
    }
    protected function getSonata_User_Profile_Form_TypeService()
    {
        return $this->services['sonata.user.profile.form.type'] = new \Sonata\UserBundle\Form\Type\ProfileType('Application\\Sonata\\UserBundle\\Entity\\User');
    }
    protected function getSonata_User_Profile_MenuBuilderService()
    {
        return $this->services['sonata.user.profile.menu_builder'] = new \Sonata\UserBundle\Menu\ProfileMenuBuilder($this->get('knp_menu.factory'), $this->get('translator.default'), array(0 => array('route' => 'sonata_user_profile_edit', 'label' => 'link_edit_profile', 'domain' => 'SonataUserBundle', 'route_parameters' => array()), 1 => array('route' => 'sonata_user_profile_edit_authentication', 'label' => 'link_edit_authentication', 'domain' => 'SonataUserBundle', 'route_parameters' => array())), $this->get('event_dispatcher'));
    }
    protected function getSonata_User_Twig_GlobalService()
    {
        return $this->services['sonata.user.twig.global'] = new \Sonata\UserBundle\Twig\GlobalVariables($this);
    }
    protected function getStofDoctrineExtensions_EventListener_BlameService()
    {
        return $this->services['stof_doctrine_extensions.event_listener.blame'] = new \Stof\DoctrineExtensionsBundle\EventListener\BlameListener($this->get('stof_doctrine_extensions.listener.blameable'), $this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getStofDoctrineExtensions_EventListener_LocaleService()
    {
        return $this->services['stof_doctrine_extensions.event_listener.locale'] = new \Stof\DoctrineExtensionsBundle\EventListener\LocaleListener($this->get('stof_doctrine_extensions.listener.translatable'));
    }
    protected function getStofDoctrineExtensions_EventListener_LoggerService()
    {
        return $this->services['stof_doctrine_extensions.event_listener.logger'] = new \Stof\DoctrineExtensionsBundle\EventListener\LoggerListener($this->get('stof_doctrine_extensions.listener.loggable'), $this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getStofDoctrineExtensions_Uploadable_ManagerService()
    {
        $a = new \Gedmo\Uploadable\UploadableListener(new \Stof\DoctrineExtensionsBundle\Uploadable\MimeTypeGuesserAdapter());
        $a->setAnnotationReader($this->get('annotation_reader'));
        $a->setDefaultFileInfoClass('Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo');
        $a->setDefaultPath('/home/olikids/public_html.sam/app/../web/uploads');
        return $this->services['stof_doctrine_extensions.uploadable.manager'] = new \Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager($a, 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo');
    }
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }
    protected function getSwiftmailer_EmailSender_ListenerService()
    {
        return $this->services['swiftmailer.email_sender.listener'] = new \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener($this);
    }
    protected function getSwiftmailer_Mailer_DefaultService()
    {
        return $this->services['swiftmailer.mailer.default'] = new \Swift_Mailer($this->get('swiftmailer.mailer.default.transport'));
    }
    protected function getSwiftmailer_Mailer_Default_SpoolService()
    {
        return $this->services['swiftmailer.mailer.default.spool'] = new \Swift_MemorySpool();
    }
    protected function getSwiftmailer_Mailer_Default_TransportService()
    {
        return $this->services['swiftmailer.mailer.default.transport'] = new \Swift_Transport_SpoolTransport($this->get('swiftmailer.mailer.default.transport.eventdispatcher'), $this->get('swiftmailer.mailer.default.spool'));
    }
    protected function getSwiftmailer_Mailer_Default_Transport_RealService()
    {
        $a = new \Swift_Transport_Esmtp_AuthHandler(array(0 => new \Swift_Transport_Esmtp_Auth_CramMd5Authenticator(), 1 => new \Swift_Transport_Esmtp_Auth_LoginAuthenticator(), 2 => new \Swift_Transport_Esmtp_Auth_PlainAuthenticator()));
        $a->setUsername('saintrain@mail.ru');
        $a->setPassword('tel76924WM');
        $a->setAuthMode(NULL);
        $this->services['swiftmailer.mailer.default.transport.real'] = $instance = new \Swift_Transport_EsmtpTransport(new \Swift_Transport_StreamBuffer(new \Swift_StreamFilters_StringReplacementFilterFactory()), array(0 => $a), $this->get('swiftmailer.mailer.default.transport.eventdispatcher'));
        $instance->setHost('smtp.mail.ru');
        $instance->setPort(465);
        $instance->setEncryption('ssl');
        $instance->setTimeout(30);
        $instance->setSourceIp(NULL);
        return $instance;
    }
    protected function getTemplatingService()
    {
        $this->services['templating'] = $instance = new \Symfony\Bundle\TwigBundle\TwigEngine($this->get('twig'), $this->get('templating.name_parser'), $this->get('templating.locator'));
        $instance->setDefaultEscapingStrategy(array(0 => $instance, 1 => 'guessDefaultEscapingStrategy'));
        return $instance;
    }
    protected function getTemplating_Asset_PackageFactoryService()
    {
        return $this->services['templating.asset.package_factory'] = new \Symfony\Bundle\FrameworkBundle\Templating\Asset\PackageFactory($this);
    }
    protected function getTemplating_FilenameParserService()
    {
        return $this->services['templating.filename_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser();
    }
    protected function getTemplating_GlobalsService()
    {
        return $this->services['templating.globals'] = new \Symfony\Bundle\FrameworkBundle\Templating\GlobalVariables($this);
    }
    protected function getTemplating_Helper_ActionsService()
    {
        return $this->services['templating.helper.actions'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\ActionsHelper($this->get('fragment.handler'));
    }
    protected function getTemplating_Helper_AssetsService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('templating.helper.assets', 'request');
        }
        return $this->services['templating.helper.assets'] = $this->scopedServices['request']['templating.helper.assets'] = new \Symfony\Component\Templating\Helper\CoreAssetsHelper(new \Symfony\Bundle\FrameworkBundle\Templating\Asset\PathPackage($this->get('request'), NULL, '%s?%s'), array());
    }
    protected function getTemplating_Helper_CodeService()
    {
        return $this->services['templating.helper.code'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\CodeHelper(NULL, '/home/olikids/public_html.sam/app', 'UTF-8');
    }
    protected function getTemplating_Helper_FormService()
    {
        return $this->services['templating.helper.form'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\FormHelper(new \Symfony\Component\Form\FormRenderer(new \Symfony\Component\Form\Extension\Templating\TemplatingRendererEngine($this->get('templating.engine.php'), array(0 => 'FrameworkBundle:Form')), $this->get('form.csrf_provider', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
    }
    protected function getTemplating_Helper_LogoutUrlService()
    {
        $this->services['templating.helper.logout_url'] = $instance = new \Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper($this, $this->get('router'));
        $instance->registerListener('admin', '/logout.html', 'logout', '_csrf_token', NULL);
        $instance->registerListener('main', '/logout.html', 'logout', '_csrf_token', NULL);
        return $instance;
    }
    protected function getTemplating_Helper_RequestService()
    {
        return $this->services['templating.helper.request'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RequestHelper($this->get('request_stack'));
    }
    protected function getTemplating_Helper_RouterService()
    {
        return $this->services['templating.helper.router'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper($this->get('router'));
    }
    protected function getTemplating_Helper_SecurityService()
    {
        return $this->services['templating.helper.security'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper($this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getTemplating_Helper_SessionService()
    {
        return $this->services['templating.helper.session'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\SessionHelper($this->get('request_stack'));
    }
    protected function getTemplating_Helper_SlotsService()
    {
        return $this->services['templating.helper.slots'] = new \Symfony\Component\Templating\Helper\SlotsHelper();
    }
    protected function getTemplating_Helper_StopwatchService()
    {
        return $this->services['templating.helper.stopwatch'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\StopwatchHelper(NULL);
    }
    protected function getTemplating_Helper_TranslatorService()
    {
        return $this->services['templating.helper.translator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\TranslatorHelper($this->get('translator.default'));
    }
    protected function getTemplating_LoaderService()
    {
        return $this->services['templating.loader'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader($this->get('templating.locator'));
    }
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser($this->get('kernel'));
    }
    protected function getTfox_MpdfportService()
    {
        return $this->services['tfox.mpdfport'] = new \TFox\MpdfPortBundle\Service\MpdfService();
    }
    protected function getTranslation_Dumper_CsvService()
    {
        return $this->services['translation.dumper.csv'] = new \Symfony\Component\Translation\Dumper\CsvFileDumper();
    }
    protected function getTranslation_Dumper_IniService()
    {
        return $this->services['translation.dumper.ini'] = new \Symfony\Component\Translation\Dumper\IniFileDumper();
    }
    protected function getTranslation_Dumper_JsonService()
    {
        return $this->services['translation.dumper.json'] = new \Symfony\Component\Translation\Dumper\JsonFileDumper();
    }
    protected function getTranslation_Dumper_MoService()
    {
        return $this->services['translation.dumper.mo'] = new \Symfony\Component\Translation\Dumper\MoFileDumper();
    }
    protected function getTranslation_Dumper_PhpService()
    {
        return $this->services['translation.dumper.php'] = new \Symfony\Component\Translation\Dumper\PhpFileDumper();
    }
    protected function getTranslation_Dumper_PoService()
    {
        return $this->services['translation.dumper.po'] = new \Symfony\Component\Translation\Dumper\PoFileDumper();
    }
    protected function getTranslation_Dumper_QtService()
    {
        return $this->services['translation.dumper.qt'] = new \Symfony\Component\Translation\Dumper\QtFileDumper();
    }
    protected function getTranslation_Dumper_ResService()
    {
        return $this->services['translation.dumper.res'] = new \Symfony\Component\Translation\Dumper\IcuResFileDumper();
    }
    protected function getTranslation_Dumper_XliffService()
    {
        return $this->services['translation.dumper.xliff'] = new \Symfony\Component\Translation\Dumper\XliffFileDumper();
    }
    protected function getTranslation_Dumper_YmlService()
    {
        return $this->services['translation.dumper.yml'] = new \Symfony\Component\Translation\Dumper\YamlFileDumper();
    }
    protected function getTranslation_ExtractorService()
    {
        $this->services['translation.extractor'] = $instance = new \Symfony\Component\Translation\Extractor\ChainExtractor();
        $instance->addExtractor('php', $this->get('translation.extractor.php'));
        $instance->addExtractor('twig', $this->get('twig.translation.extractor'));
        return $instance;
    }
    protected function getTranslation_Extractor_PhpService()
    {
        return $this->services['translation.extractor.php'] = new \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor();
    }
    protected function getTranslation_LoaderService()
    {
        $a = $this->get('translation.loader.xliff');
        $this->services['translation.loader'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader();
        $instance->addLoader('php', $this->get('translation.loader.php'));
        $instance->addLoader('yml', $this->get('translation.loader.yml'));
        $instance->addLoader('xlf', $a);
        $instance->addLoader('xliff', $a);
        $instance->addLoader('po', $this->get('translation.loader.po'));
        $instance->addLoader('mo', $this->get('translation.loader.mo'));
        $instance->addLoader('ts', $this->get('translation.loader.qt'));
        $instance->addLoader('csv', $this->get('translation.loader.csv'));
        $instance->addLoader('res', $this->get('translation.loader.res'));
        $instance->addLoader('dat', $this->get('translation.loader.dat'));
        $instance->addLoader('ini', $this->get('translation.loader.ini'));
        $instance->addLoader('json', $this->get('translation.loader.json'));
        return $instance;
    }
    protected function getTranslation_Loader_CsvService()
    {
        return $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }
    protected function getTranslation_Loader_DatService()
    {
        return $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader();
    }
    protected function getTranslation_Loader_IniService()
    {
        return $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }
    protected function getTranslation_Loader_JsonService()
    {
        return $this->services['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader();
    }
    protected function getTranslation_Loader_MoService()
    {
        return $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }
    protected function getTranslation_Loader_PoService()
    {
        return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }
    protected function getTranslation_Loader_QtService()
    {
        return $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }
    protected function getTranslation_Loader_ResService()
    {
        return $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }
    protected function getTranslation_WriterService()
    {
        $this->services['translation.writer'] = $instance = new \Symfony\Component\Translation\Writer\TranslationWriter();
        $instance->addDumper('php', $this->get('translation.dumper.php'));
        $instance->addDumper('xlf', $this->get('translation.dumper.xliff'));
        $instance->addDumper('po', $this->get('translation.dumper.po'));
        $instance->addDumper('mo', $this->get('translation.dumper.mo'));
        $instance->addDumper('yml', $this->get('translation.dumper.yml'));
        $instance->addDumper('ts', $this->get('translation.dumper.qt'));
        $instance->addDumper('csv', $this->get('translation.dumper.csv'));
        $instance->addDumper('ini', $this->get('translation.dumper.ini'));
        $instance->addDumper('json', $this->get('translation.dumper.json'));
        $instance->addDumper('res', $this->get('translation.dumper.res'));
        return $instance;
    }
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, new \Symfony\Component\Translation\MessageSelector(), array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini'), 'translation.loader.json' => array(0 => 'json')), array('cache_dir' => '/home/olikids/public_html.sam/app/cache/prod/translations', 'debug' => false));
        $instance->setFallbackLocales(array(0 => 'ru'));
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lt.xlf', 'lt', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bg.xlf', 'bg', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nb.xlf', 'nb', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hy.xlf', 'hy', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Latn.xlf', 'sr_Latn', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.gl.xlf', 'gl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nl.xlf', 'nl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.es.xlf', 'es', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.vi.xlf', 'vi', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.et.xlf', 'et', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.uk.xlf', 'uk', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.en.xlf', 'en', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lb.xlf', 'lb', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fr.xlf', 'fr', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_TW.xlf', 'zh_TW', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.af.xlf', 'af', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ro.xlf', 'ro', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ca.xlf', 'ca', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pl.xlf', 'pl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ja.xlf', 'ja', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sk.xlf', 'sk', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt.xlf', 'pt', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.mn.xlf', 'mn', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Cyrl.xlf', 'sr_Cyrl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_CN.xlf', 'zh_CN', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hr.xlf', 'hr', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hu.xlf', 'hu', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sq.xlf', 'sq', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt_BR.xlf', 'pt_BR', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.de.xlf', 'de', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.el.xlf', 'el', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.da.xlf', 'da', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ru.xlf', 'ru', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.id.xlf', 'id', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.th.xlf', 'th', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sl.xlf', 'sl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cy.xlf', 'cy', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.it.xlf', 'it', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cs.xlf', 'cs', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tr.xlf', 'tr', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fa.xlf', 'fa', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.no.xlf', 'no', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ar.xlf', 'ar', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fi.xlf', 'fi', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.he.xlf', 'he', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sv.xlf', 'sv', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.eu.xlf', 'eu', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lt.xlf', 'lt', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bg.xlf', 'bg', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nb.xlf', 'nb', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hy.xlf', 'hy', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Latn.xlf', 'sr_Latn', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.gl.xlf', 'gl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nl.xlf', 'nl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.es.xlf', 'es', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.et.xlf', 'et', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.uk.xlf', 'uk', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.en.xlf', 'en', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lb.xlf', 'lb', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fr.xlf', 'fr', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ro.xlf', 'ro', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ca.xlf', 'ca', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pl.xlf', 'pl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ja.xlf', 'ja', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sk.xlf', 'sk', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt.xlf', 'pt', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.mn.xlf', 'mn', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Cyrl.xlf', 'sr_Cyrl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_CN.xlf', 'zh_CN', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hr.xlf', 'hr', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hu.xlf', 'hu', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt_BR.xlf', 'pt_BR', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.de.xlf', 'de', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.el.xlf', 'el', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.da.xlf', 'da', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ru.xlf', 'ru', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.id.xlf', 'id', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sl.xlf', 'sl', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.it.xlf', 'it', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.cs.xlf', 'cs', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fa.xlf', 'fa', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ar.xlf', 'ar', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lv.xlf', 'lv', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fi.xlf', 'fi', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.he.xlf', 'he', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sv.xlf', 'sv', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.eu.xlf', 'eu', 'validators');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pt_BR.xlf', 'pt_BR', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.gl.xlf', 'gl', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ua.xlf', 'ua', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.en.xlf', 'en', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sl.xlf', 'sl', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.cs.xlf', 'cs', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.el.xlf', 'el', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sr_Cyrl.xlf', 'sr_Cyrl', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ro.xlf', 'ro', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.it.xlf', 'it', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sv.xlf', 'sv', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sr_Latn.xlf', 'sr_Latn', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.hu.xlf', 'hu', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.no.xlf', 'no', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.de.xlf', 'de', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.da.xlf', 'da', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ca.xlf', 'ca', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.fr.xlf', 'fr', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sk.xlf', 'sk', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.es.xlf', 'es', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pt_PT.xlf', 'pt_PT', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.lb.xlf', 'lb', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.nl.xlf', 'nl', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.fa.xlf', 'fa', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pl.xlf', 'pl', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ar.xlf', 'ar', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.tr.xlf', 'tr', 'security');
        $instance->addResource('xlf', '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ru.xlf', 'ru', 'security');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.hu.yml', 'hu', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.cs.yml', 'cs', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.pl.yml', 'pl', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.tr.yml', 'tr', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.it.yml', 'it', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.en.yml', 'en', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.tr.yml', 'tr', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.de.yml', 'de', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.sk.yml', 'sk', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.hr.yml', 'hr', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.es.yml', 'es', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.fr.yml', 'fr', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.sl.yml', 'sl', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.nl.yml', 'nl', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.cs.yml', 'cs', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.en.yml', 'en', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.bg.yml', 'bg', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.lt.yml', 'lt', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.da.yml', 'da', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.lv.yml', 'lv', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.sk.yml', 'sk', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.fi.yml', 'fi', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.es.yml', 'es', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.sv.yml', 'sv', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.hu.yml', 'hu', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.de.yml', 'de', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.pl.yml', 'pl', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.it.yml', 'it', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.pt.yml', 'pt', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.pt_PT.yml', 'pt_PT', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.zh_CN.yml', 'zh_CN', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.fi.yml', 'fi', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.pt_BR.yml', 'pt_BR', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.fa.yml', 'fa', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.sl.yml', 'sl', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.bg.yml', 'bg', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.hr.yml', 'hr', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.sv.yml', 'sv', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.ja.yml', 'ja', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.ru.yml', 'ru', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.sr_Latn.yml', 'sr_Latn', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.ja.yml', 'ja', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.uk.yml', 'uk', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.fr.yml', 'fr', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.nl.yml', 'nl', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.ca.yml', 'ca', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.ro.yml', 'ro', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.lv.yml', 'lv', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.sr_Latn.yml', 'sr_Latn', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.pt_BR.yml', 'pt_BR', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.uk.yml', 'uk', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.lb.yml', 'lb', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.et.yml', 'et', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/FOSUserBundle.da.yml', 'da', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.zh_CN.yml', 'zh_CN', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.fa.yml', 'fa', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/translations/validators.lt.yml', 'lt', 'validators');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.pt_BR.xliff', 'pt_BR', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.hr.xliff', 'hr', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.zh_CN.xliff', 'zh_CN', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.en.xliff', 'en', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.lb.xliff', 'lb', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.fa.xliff', 'fa', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.lt.xliff', 'lt', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.cs.xliff', 'cs', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.ja.xliff', 'ja', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.sk.xliff', 'sk', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.hu.xliff', 'hu', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.nl.xliff', 'nl', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.ca.xliff', 'ca', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.eu.xliff', 'eu', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.es.xliff', 'es', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.pl.xliff', 'pl', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.fr.xliff', 'fr', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.pt.xliff', 'pt', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.uk.xliff', 'uk', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.sl.xliff', 'sl', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.ru.xliff', 'ru', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.bg.xliff', 'bg', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.ro.xliff', 'ro', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.it.xliff', 'it', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/translations/SonataAdminBundle.de.xliff', 'de', 'SonataAdminBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.lt.xliff', 'lt', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.cs.xliff', 'cs', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.pt_BR.xliff', 'pt_BR', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.sk.xliff', 'sk', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.ro.xliff', 'ro', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.nl.xliff', 'nl', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.ru.xliff', 'ru', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.uk.xliff', 'uk', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.en.xliff', 'en', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.de.xliff', 'de', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.es.xliff', 'es', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.pl.xliff', 'pl', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.lb.xliff', 'lb', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.zh_CN.xliff', 'zh_CN', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.sl.xliff', 'sl', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.it.xliff', 'it', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.ca.xliff', 'ca', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.eu.xliff', 'eu', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.pt.xliff', 'pt', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.fr.xliff', 'fr', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.bg.xliff', 'bg', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.ja.xliff', 'ja', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.hu.xliff', 'hu', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.hr.xliff', 'hr', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/translations/SonataCoreBundle.fa.xliff', 'fa', 'SonataCoreBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.ru.xliff', 'ru', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.pl.xliff', 'pl', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.en.xliff', 'en', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.sk.xliff', 'sk', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.de.xliff', 'de', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.sl.xliff', 'sl', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.cs.xliff', 'cs', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/translations/SonataFormatterBundle.fr.xliff', 'fr', 'SonataFormatterBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.pl.xliff', 'pl', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.fa.xliff', 'fa', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.it.xliff', 'it', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.ru.xliff', 'ru', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.sk.xliff', 'sk', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.en.xliff', 'en', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.ca.xliff', 'ca', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.fr.xliff', 'fr', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.pt_BR.xliff', 'pt_BR', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.sl.xliff', 'sl', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.de.xliff', 'de', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.es.xliff', 'es', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.pt.xliff', 'pt', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.bg.xliff', 'bg', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.lt.xliff', 'lt', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.zh_TW.xliff', 'zh_TW', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.nl.xliff', 'nl', 'SonataUserBundle');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/translations/SonataUserBundle.cs.xliff', 'cs', 'SonataUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/translations/ApplicationSonataUserBundle.ru.yml', 'ru', 'ApplicationSonataUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/translations/FOSUserBundle.ru.yml', 'ru', 'FOSUserBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Application/Sonata/AdminBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('xliff', '/home/olikids/public_html.sam/src/Application/Sonata/AdminBundle/Resources/translations/SonataAdminBundle.ru.xliff', 'ru', 'SonataAdminBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/CategoryBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/CategoryBundle/Resources/translations/CoreCategoryBundle.ru.yml', 'ru', 'CoreCategoryBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/CommonBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/CommonBundle/Resources/translations/AjaxEntity.ru.yml', 'ru', 'AjaxEntity');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ProductBundle/Resources/translations/CoreProductBundle.ru.yml', 'ru', 'CoreProductBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ProductBundle/Resources/translations/frontend.ru.yml', 'ru', 'frontend');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ManufacturerBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/OrderBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/OrderBundle/Resources/translations/CoreOrderBundle.ru.yml', 'ru', 'CoreOrderBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/OrderBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/OrderBundle/Resources/translations/frontend.ru.yml', 'ru', 'frontend');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/PropertyBundle/Resources/translations/CorePropertyBundle.ru.yml', 'ru', 'CorePropertyBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/PropertyBundle/Resources/translations/frontend.ru.yml', 'ru', 'frontend');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/DirectoryBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/DirectoryBundle/Resources/translations/CoreDirectoryBundle.ru.yml', 'ru', 'CoreDirectoryBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Resources/translations/CoreTroubleTicketBundle.ru.yml', 'ru', 'CoreTroubleTicketBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/LogisticsBundle/Resources/translations/CoreLogisticsBundle.ru.yml', 'ru', 'CoreLogisticsBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/FaqBundle/Resources/translations/CoreFaqBundle.ru.yml', 'ru', 'CoreFaqBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/FileBundle/Resources/translations/CoreFileBundle.ru.yml', 'ru', 'CoreFileBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/LanguageBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/UnionBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ColorBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.de.yml', 'de', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.es.yml', 'es', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.es.yml', 'es', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.nl.yml', 'nl', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.cs.yml', 'cs', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.en.yml', 'en', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.pl.yml', 'pl', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.ru.yml', 'ru', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.ro.yml', 'ro', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.cs.yml', 'cs', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.pt_BR.yml', 'pt_BR', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.pl.yml', 'pl', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.en.yml', 'en', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.it.yml', 'it', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.ru.yml', 'ru', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.fr.yml', 'fr', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.zh_CN.yml', 'zh_CN', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.nl.yml', 'nl', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.ro.yml', 'ro', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.de.yml', 'de', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.fr.yml', 'fr', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.pt_BR.yml', 'pt_BR', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/gregwar_captcha.it.yml', 'it', 'gregwar_captcha');
        $instance->addResource('yml', '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/translations/validators.zh_CN.yml', 'zh_CN', 'validators');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/StatisticsBundle/Resources/translations/CoreStatisticsBundle.ru.yml', 'ru', 'CoreStatisticsBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/DeliveryBundle/Resources/translations/CoreDeliveryBundle.ru.yml', 'ru', 'CoreDeliveryBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/PaymentBundle/Resources/translations/CorePaymentBundle.ru.yml', 'ru', 'CorePaymentBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/PaymentBundle/Resources/translations/frontend.ru.yml', 'ru', 'frontend');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/DiscountsBundle/Resources/translations/CoreDiscountsBundle.ru.yml', 'ru', 'CoreDiscountsBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ReviewBundle/Resources/translations/CoreReviewBundle.ru.yml', 'ru', 'CoreReviewBundle');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ReviewBundle/Resources/translations/frontend.ru.yml', 'ru', 'frontend');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/ConfigBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/HolidayBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/OfficeWorkTimeBundle/Resources/translations/messages.ru.yml', 'ru', 'messages');
        $instance->addResource('yml', '/home/olikids/public_html.sam/src/Core/OfficeWorkTimeBundle/Resources/translations/CoreOfficeWorkTimeBundle.ru.yml', 'ru', 'CoreOfficeWorkTimeBundle');
        return $instance;
    }
    protected function getTwigService()
    {
        $a = $this->get('markdown.parser');
        $b = new \Knp\Bundle\MarkdownBundle\Helper\MarkdownHelper($a);
        $b->addParser(new \Knp\Bundle\MarkdownBundle\Parser\Preset\Min(), 'min');
        $b->addParser(new \Knp\Bundle\MarkdownBundle\Parser\Preset\Light(), 'light');
        $b->addParser(new \Knp\Bundle\MarkdownBundle\Parser\Preset\Medium(), 'medium');
        $b->addParser($a, 'default');
        $b->addParser(new \Knp\Bundle\MarkdownBundle\Parser\Preset\Flavored(), 'flavored');
        $this->services['twig'] = $instance = new \Twig_Environment($this->get('twig.loader'), array('debug' => false, 'strict_variables' => false, 'exception_controller' => 'twig.controller.exception:showAction', 'autoescape_service' => NULL, 'autoescape_service_method' => NULL, 'cache' => '/home/olikids/public_html.sam/app/cache/prod/twig', 'charset' => 'UTF-8', 'paths' => array()));
        $instance->addExtension($this->get('application_user_notification_twig_extension'));
        $instance->addExtension($this->get('checked_modification.twig.extension'));
        $instance->addExtension($this->get('core_product_format_twig_extension'));
        $instance->addExtension($this->get('core_product_twig_extension'));
        $instance->addExtension($this->get('checked_union.twig.extension'));
        $instance->addExtension($this->get('core_common_twig_time_ago'));
        $instance->addExtension($this->get('twig_extension.intl'));
        $instance->addExtension(new \Symfony\Bundle\SecurityBundle\Twig\Extension\LogoutUrlExtension($this->get('templating.helper.logout_url')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension($this->get('security.context', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($this->get('translator.default')));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\AssetsExtension($this, $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE)));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\ActionsExtension($this));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(NULL, '/home/olikids/public_html.sam/app', 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($this->get('router')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension(NULL));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension($this->get('fragment.handler')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(new \Symfony\Bridge\Twig\Form\TwigRenderer(new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array(0 => 'GregwarCaptchaBundle::captcha.html.twig', 1 => 'IvoryCKEditorBundle:Form:ckeditor_widget.html.twig', 2 => 'form_div_layout.html.twig', 3 => 'SonataFormatterBundle:Form:formatter.html.twig', 4 => 'CoreFileBundle:Admin\\Form:multiupload_image_widget.html.twig', 5 => 'CoreFileBundle:Admin\\Form:multiupload_document_widget.html.twig', 6 => 'CoreFileBundle:Form:multiupload_file_frontend_widget.html.twig', 7 => 'CoreColorBundle:Admin\\Form:admin_form_type_color_widget.html.twig', 8 => 'CoreColorBundle:Form:colorpicker_widget.html.twig', 9 => 'CoreReviewBundle:Form:star_rating_widget.html.twig', 10 => 'CoreCommonBundle:Form:ajax_entity_widget.html.twig', 11 => 'CoreCategoryBundle:Admin\\Form:caregory_widget.html.twig', 12 => 'CorePropertyBundle:Admin\\Form:property_widget.html.twig', 13 => 'CorePropertyBundle:Admin\\Form:property_caregory_widget.html.twig', 14 => 'ApplicationSonataAdminBundle:Admin\\Form:admin_date_range.html.twig', 15 => 'CoreUnionBundle:Admin\\Form:union_widget.html.twig', 16 => 'CoreProductBundle:Admin\\Form\\modifications_widget:product_modifications_widget.html.twig', 17 => 'CoreProductBundle:Admin\\Form\\category_main_widget:category_main_widget.html.twig', 18 => 'CoreProductBundle:Admin\\Form\\manufacturer_main_widget:manufacturer_main_widget.html.twig', 19 => 'CoreCommonBundle:Form:row.html.twig', 20 => 'CoreCommonBundle:Form:errors.html.twig', 21 => 'ApplicationSonataUserBundle:Admin\\Form:kpp_type_widget.html.twig', 22 => 'ApplicationSonataUserBundle:Admin\\Form:onec_type_widget.html.twig', 23 => 'ApplicationSonataUserBundle:Admin\\Form:contragent_email_type_widget.html.twig', 24 => 'ApplicationSonataUserBundle:Admin\\Form:balance_history_widget.html.twig', 25 => 'CoreOrderBundle:Admin\\Form\\Order\\type:products_in_order_widget.html.twig', 26 => 'CoreOrderBundle:Admin\\Form\\Order\\type:unit_serial_number.html.twig', 27 => 'CoreOrderBundle:Admin\\Form\\Order\\type:boxes_and_waybills_type_widget.html.twig', 28 => 'CoreOrderBundle:Admin\\Form\\Order\\type:waybills_in_order_widget.html.twig', 29 => 'CoreOrderBundle:Admin\\Form\\Order\\type:canceled_status_widget.html.twig', 30 => 'CoreOrderBundle:Admin\\Form\\ExtraStatus\\type:extra_status_widget.html.twig', 31 => 'CoreLogisticsBundle:Admin\\Transit\\type:products_in_transit_widget.html.twig', 32 => 'CoreLogisticsBundle:Admin\\UnitInStock\\type:unit_in_stock_defect_widget.html.twig', 33 => 'CoreDirectoryBundle:Admin\\Form\\Type:filter_name_widget.html.twig', 34 => 'CoreDirectoryBundle:Admin\\Form\\Type:filter_capitals_widget.html.twig', 35 => 'CoreDirectoryBundle:Admin\\Form\\Type:remote_video_widget.html.twig', 36 => 'CoreConfigBundle:Admin\\Form\\Type:config_data_widget.html.twig', 37 => 'CoreLanguageBundle:Form\\Type:text_case_widget.html.twig', 38 => 'ShtumiUsefulBundle::fields.html.twig', 39 => 'CoreCommonBundle:Form:tree_select_widget.html.twig', 40 => 'ApplicationShtumiUsefulBundle::fields.html.twig', 41 => 'CoreSlugHistoryBundle:Admin\\Form:slug_history_widget.html.twig', 42 => 'SonataUserBundle:Form:form_admin_fields.html.twig')), $this->get('form.csrf_provider', ContainerInterface::NULL_ON_INVALID_REFERENCE))));
        $instance->addExtension(new \Symfony\Bundle\AsseticBundle\Twig\AsseticExtension($this->get('assetic.asset_factory'), $this->get('templating.name_parser'), false, array(), array(0 => 'CoreTroubleTicketBundle', 1 => 'CoreFileBundle', 2 => 'CoreCommonBundle', 3 => 'CoreProductBundle', 4 => 'CoreOrderBundle', 5 => 'ApplicationSonataUserBundle'), new \Symfony\Bundle\AsseticBundle\DefaultValueSupplier($this)));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension($this->get('sonata.admin.twig.extension'));
        $instance->addExtension($this->get('sonata.core.flashmessage.twig.extension'));
        $instance->addExtension($this->get('sonata.core.twig.extension.text'));
        $instance->addExtension($this->get('sonata.core.twig.status_extension'));
        $instance->addExtension($this->get('sonata.core.twig.template_extension'));
        $instance->addExtension(new \Sonata\BlockBundle\Twig\Extension\BlockExtension($this->get('sonata.block.templating.helper')));
        $instance->addExtension(new \Sonata\FormatterBundle\Twig\Extension\TextFormatterExtension($this->get('sonata.formatter.pool')));
        $instance->addExtension($this->get('ivory_ck_editor.twig_extension'));
        $instance->addExtension($this->get('twig.extension.fm_tinymce_init'));
        $instance->addExtension(new \Knp\Bundle\MarkdownBundle\Twig\Extension\MarkdownTwigExtension($b));
        $instance->addExtension(new \Knp\Menu\Twig\MenuExtension(new \Knp\Menu\Twig\Helper($this->get('knp_menu.renderer_provider'), $this->get('knp_menu.menu_provider'))));
        $instance->addExtension($this->get('knp_paginator.twig.extension.pagination'));
        $instance->addExtension($this->get('core_common_money_twig_extension'));
        $instance->addExtension($this->get('core_common_twig_extension'));
        $instance->addExtension($this->get('core_common_decline_of_number_twig_extension'));
        $instance->addExtension($this->get('core_common_fast_edit_twig_extension'));
        $instance->addExtension($this->get('core_common_eval_twig_extension'));
        $instance->addExtension($this->get('core_file.twig.file_function_extension'));
        $instance->addExtension($this->get('core_file.twig.file_filter_extension'));
        $instance->addExtension($this->get('language_switcher_extension'));
        $instance->addExtension(new \Sonata\IntlBundle\Twig\Extension\LocaleExtension($this->get('sonata.intl.templating.helper.locale')));
        $instance->addExtension(new \Sonata\IntlBundle\Twig\Extension\NumberExtension($this->get('sonata.intl.templating.helper.number')));
        $instance->addExtension(new \Sonata\IntlBundle\Twig\Extension\DateTimeExtension($this->get('sonata.intl.templating.helper.datetime')));
        $instance->addExtension($this->get('core_payment_twig_extension'));
        $instance->addExtension(new \RaulFraile\Bundle\LadybugBundle\Twig\Extension\LadybugExtension($this->get('ladybug.dumper')));
        $instance->addExtension($this->get('core_review_twig_extension'));
        $instance->addExtension($this->get('core_holiday_twig_function_extension'));
        $instance->addGlobal('app', $this->get('templating.globals'));
        $instance->addGlobal('ServiceContainer', $this);
        $instance->addGlobal('base_url', 'www.olikids-sam.ru.vm');
        $instance->addGlobal('default_timezone', 'Europe/Moscow');
        $instance->addGlobal('default_email', 'saintrain@mail.ru');
        $instance->addGlobal('domain_ru', 'www.olikids-sam.ru.vm');
        $instance->addGlobal('root_web_path', '/home/olikids/public_html.sam/app/../web');
        $instance->addGlobal('sonata_block', $this->get('sonata.block.twig.global'));
        $instance->addGlobal('sonata_user', $this->get('sonata.user.twig.global'));
        return $instance;
    }
    protected function getTwig_Controller_ExceptionService()
    {
        return $this->services['twig.controller.exception'] = new \Symfony\Bundle\TwigBundle\Controller\ExceptionController($this->get('twig'), false);
    }
    protected function getTwig_ExceptionListenerService()
    {
        return $this->services['twig.exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ExceptionListener('twig.controller.exception:showAction', $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getTwig_Extension_FmTinymceInitService()
    {
        return $this->services['twig.extension.fm_tinymce_init'] = new \FM\ElfinderBundle\Twig\Extension\FMElfinderTinymceExtension($this->get('twig'));
    }
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader($this->get('templating.locator'), $this->get('templating.name_parser'));
        $instance->addPath('/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views', 'Framework');
        $instance->addPath('/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views', 'Security');
        $instance->addPath('/home/olikids/public_html.sam/app/Resources/TwigBundle/views', 'Twig');
        $instance->addPath('/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views', 'Twig');
        $instance->addPath('/home/olikids/public_html.sam/vendor/symfony/swiftmailer-bundle/Symfony/Bundle/SwiftmailerBundle/Resources/views', 'Swiftmailer');
        $instance->addPath('/home/olikids/public_html.sam/app/Resources/DoctrineBundle/views', 'Doctrine');
        $instance->addPath('/home/olikids/public_html.sam/vendor/doctrine/doctrine-bundle/Doctrine/Bundle/DoctrineBundle/Resources/views', 'Doctrine');
        $instance->addPath('/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/views', 'FOSUser');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/admin-bundle/Resources/views', 'SonataAdmin');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/core-bundle/Resources/views', 'SonataCore');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/block-bundle/Resources/views', 'SonataBlock');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/doctrine-orm-admin-bundle/Resources/views', 'SonataDoctrineORMAdmin');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/formatter-bundle/Resources/views', 'SonataFormatter');
        $instance->addPath('/home/olikids/public_html.sam/vendor/egeloen/ckeditor-bundle/Resources/views', 'IvoryCKEditor');
        $instance->addPath('/home/olikids/public_html.sam/vendor/helios-ag/fm-elfinder-bundle/FM/ElfinderBundle/Resources/views', 'FMElfinder');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/user-bundle/Sonata/UserBundle/Resources/views', 'SonataUser');
        $instance->addPath('/home/olikids/public_html.sam/vendor/simplethings/entity-audit-bundle/src/SimpleThings/EntityAudit/Resources/views', 'SimpleThingsEntityAudit');
        $instance->addPath('/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/views', 'ApplicationSonataUser');
        $instance->addPath('/home/olikids/public_html.sam/src/Application/Sonata/AdminBundle/Resources/views', 'ApplicationSonataAdmin');
        $instance->addPath('/home/olikids/public_html.sam/vendor/knplabs/knp-paginator-bundle/Knp/Bundle/PaginatorBundle/Resources/views', 'KnpPaginator');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/CategoryBundle/Resources/views', 'CoreCategory');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/CommonBundle/Resources/views', 'CoreCommon');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/ProductBundle/Resources/views', 'CoreProduct');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/ManufacturerBundle/Resources/views', 'CoreManufacturer');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/OrderBundle/Resources/views', 'CoreOrder');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/PropertyBundle/Resources/views', 'CoreProperty');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/DirectoryBundle/Resources/views', 'CoreDirectory');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/TroubleTicketBundle/Resources/views', 'CoreTroubleTicket');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/LogisticsBundle/Resources/views', 'CoreLogistics');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/FaqBundle/Resources/views', 'CoreFaq');
        $instance->addPath('/home/olikids/public_html.sam/src/Application/ElfinderBundle/Resources/views', 'ApplicationFMElfinder');
        $instance->addPath('/home/olikids/public_html.sam/vendor/symfony-cmf/tree-browser-bundle/Symfony/Cmf/Bundle/TreeBrowserBundle/Resources/views', 'CmfTreeBrowser');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/FileBundle/Resources/views', 'CoreFile');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/LanguageBundle/Resources/views', 'CoreLanguage');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/UnionBundle/Resources/views', 'CoreUnion');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/ColorBundle/Resources/views', 'CoreColor');
        $instance->addPath('/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/Resources/views', 'GregwarCaptcha');
        $instance->addPath('/home/olikids/public_html.sam/vendor/sonata-project/intl-bundle/Resources/views', 'SonataIntl');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/StatisticsBundle/Resources/views', 'CoreStatistics');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/DeliveryBundle/Resources/views', 'CoreDelivery');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/PaymentBundle/Resources/views', 'CorePayment');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/DiscountsBundle/Resources/views', 'CoreDiscounts');
        $instance->addPath('/home/olikids/public_html.sam/src/Application/Sonata/BlockBundle/Resources/views', 'ApplicationSonataBlock');
        $instance->addPath('/home/olikids/public_html.sam/vendor/raulfraile/ladybug-bundle/RaulFraile/Bundle/LadybugBundle/Resources/views', 'RaulFraileLadybug');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/ReviewBundle/Resources/views', 'CoreReview');
        $instance->addPath('/home/olikids/public_html.sam/vendor/shtumi/useful-bundle/Shtumi/UsefulBundle/Resources/views', 'ShtumiUseful');
        $instance->addPath('/home/olikids/public_html.sam/src/Application/Shtumi/UsefulBundle/Resources/views', 'ApplicationShtumiUseful');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/ConfigBundle/Resources/views', 'CoreConfig');
        $instance->addPath('/home/olikids/public_html.sam/vendor/liip/monitor-bundle/Liip/MonitorBundle/Resources/views', 'LiipMonitor');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/SlugHistoryBundle/Resources/views', 'CoreSlugHistory');
        $instance->addPath('/home/olikids/public_html.sam/src/Core/HolidayBundle/Resources/views', 'CoreHoliday');
        $instance->addPath('/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form');
        $instance->addPath('/home/olikids/public_html.sam/vendor/knplabs/knp-menu/src/Knp/Menu/Resources/views');
        return $instance;
    }
    protected function getTwig_Translation_ExtractorService()
    {
        return $this->services['twig.translation.extractor'] = new \Symfony\Bridge\Twig\Translation\TwigExtractor($this->get('twig'));
    }
    protected function getTwigExtension_IntlService()
    {
        return $this->services['twig_extension.intl'] = new \Twig_Extensions_Extension_Intl();
    }
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('b4e7a4ba6de9c87f227a93857e26b0856d0f4af1');
    }
    protected function getValidatorService()
    {
        return $this->services['validator'] = $this->get('validator.builder')->getValidator();
    }
    protected function getValidator_BuilderService()
    {
        $this->services['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();
        $instance->setConstraintValidatorFactory($this->get('validator.validator_factory'));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings(array(0 => '/home/olikids/public_html.sam/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml', 1 => '/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/Resources/config/validation.xml', 2 => '/home/olikids/public_html.sam/src/Application/Sonata/UserBundle/Resources/config/validation.xml'));
        $instance->enableAnnotationMapping($this->get('annotation_reader'));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->setApiVersion(3);
        $instance->addObjectInitializers(array(0 => $this->get('doctrine.orm.validator_initializer'), 1 => new \FOS\UserBundle\Validator\Initializer($this->get('fos_user.user_manager'))));
        $instance->addXmlMapping('/home/olikids/public_html.sam/vendor/friendsofsymfony/user-bundle/FOS/UserBundle/DependencyInjection/Compiler/../../Resources/config/validation/orm.xml');
        return $instance;
    }
    protected function getValidator_EmailService()
    {
        return $this->services['validator.email'] = new \Symfony\Component\Validator\Constraints\EmailValidator(false);
    }
    protected function getValidator_ExpressionService()
    {
        return $this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator($this->get('property_accessor'));
    }
    protected function getAssetic_AssetFactoryService()
    {
        return $this->services['assetic.asset_factory'] = new \Symfony\Bundle\AsseticBundle\Factory\AssetFactory($this->get('kernel'), $this, $this->getParameterBag(), '/home/olikids/public_html.sam/app/../web', false);
    }
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel'));
    }
    protected function getDoctrine_Orm_NamingStrategy_DefaultService()
    {
        return $this->services['doctrine.orm.naming_strategy.default'] = new \Doctrine\ORM\Mapping\DefaultNamingStrategy();
    }
    protected function getFosUser_UserListenerService()
    {
        return $this->services['fos_user.user_listener'] = new \FOS\UserBundle\Entity\UserListener($this);
    }
    protected function getFosUser_UserProvider_UsernameEmailService()
    {
        return $this->services['fos_user.user_provider.username_email'] = new \FOS\UserBundle\Security\EmailUserProvider($this->get('fos_user.user_manager'));
    }
    protected function getJmsDiExtra_ControllerResolverService()
    {
        return $this->services['jms_di_extra.controller_resolver'] = new \JMS\DiExtraBundle\HttpKernel\ControllerResolver($this, $this->get('controller_name_converter'), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getRouter_RequestContextService()
    {
        return $this->services['router.request_context'] = new \Symfony\Component\Routing\RequestContext('/app_dev.php', 'GET', 'www.olikids-sam.ru.vm', 'http', 80, 443);
    }
    protected function getSecurity_AccessListenerService()
    {
        return $this->services['security.access_listener'] = new \Symfony\Component\Security\Http\Firewall\AccessListener($this->get('security.context'), $this->get('security.access.decision_manager'), $this->get('security.access_map'), $this->get('security.authentication.manager'));
    }
    protected function getSecurity_AccessMapService()
    {
        $this->services['security.access_map'] = $instance = new \Symfony\Component\Security\Http\AccessMap();
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/_wdt'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/_profiler'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/login$'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin/login$'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin/logout$'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin/login-check$'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/register'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/resetting'), array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin'), array(0 => 'ROLE_ADMIN', 1 => 'ROLE_SONATA_ADMIN', 2 => 'IS_AUTHENTICATED_ANONYMOUSLY'), 'https');
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/profile.*'), array(0 => 'ROLE_USER'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/efconnect'), array(0 => 'ROLE_USER'), NULL);
        $instance->add(new \Symfony\Component\HttpFoundation\RequestMatcher('^/elfinder'), array(0 => 'ROLE_USER'), NULL);
        return $instance;
    }
    protected function getSecurity_Authentication_ManagerService()
    {
        $a = $this->get('fos_user.user_provider.username_email');
        $b = $this->get('security.user_checker');
        $c = $this->get('security.encoder_factory');
        $this->services['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(array(0 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($a, $b, 'admin', $c, true), 1 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('54744c1559e58'), 2 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($a, $b, 'main', $c, true), 3 => new \Symfony\Component\Security\Core\Authentication\Provider\RememberMeAuthenticationProvider($b, 'b4e7a4ba6de9c87f227a93857e26b0856d0f4af1', 'main'), 4 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('54744c1559e58')), true);
        $instance->setEventDispatcher($this->get('event_dispatcher'));
        return $instance;
    }
    protected function getSecurity_Authentication_SessionStrategyService()
    {
        return $this->services['security.authentication.session_strategy'] = new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate');
    }
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }
    protected function getSecurity_ChannelListenerService()
    {
        return $this->services['security.channel_listener'] = new \Symfony\Component\Security\Http\Firewall\ChannelListener($this->get('security.access_map'), new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(80, 443), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_ContextListener_0Service()
    {
        return $this->services['security.context_listener.0'] = new \Symfony\Component\Security\Http\Firewall\ContextListener($this->get('security.context'), array(0 => $this->get('fos_user.user_provider.username_email')), 'user', $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_Extra_MetadataFactoryService()
    {
        $this->services['security.extra.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'security.extra.metadata_driver'), new \Metadata\Cache\FileCache('/home/olikids/public_html.sam/app/cache/prod/jms_security', false));
        $instance->setIncludeInterfaces(true);
        return $instance;
    }
    protected function getSecurity_HttpUtilsService()
    {
        $a = $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        return $this->services['security.http_utils'] = new \Symfony\Component\Security\Http\HttpUtils($a, $a);
    }
    protected function getSecurity_UserCheckerService()
    {
        return $this->services['security.user_checker'] = new \Symfony\Component\Security\Core\User\UserChecker();
    }
    protected function getSession_Storage_MetadataBagService()
    {
        return $this->services['session.storage.metadata_bag'] = new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', '0');
    }
    protected function getSonata_Block_ManagerService()
    {
        $this->services['sonata.block.manager'] = $instance = new \Sonata\BlockBundle\Block\BlockServiceManager($this, false, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $instance->add('sonata.block.service.statistics', 'sonata.block.service.statistics', array(0 => 'cms'));
        $instance->add('sonata.admin.block.admin_list', 'sonata.admin.block.admin_list', array(0 => 'admin'));
        $instance->add('sonata.admin.block.search_result', 'sonata.admin.block.search_result', array());
        $instance->add('sonata.block.service.container', 'sonata.block.service.container', array());
        $instance->add('sonata.block.service.empty', 'sonata.block.service.empty', array());
        $instance->add('sonata.block.service.text', 'sonata.block.service.text', array(0 => 'cms'));
        $instance->add('sonata.block.service.rss', 'sonata.block.service.rss', array(0 => 'cms'));
        $instance->add('sonata.block.service.menu', 'sonata.block.service.menu', array());
        $instance->add('sonata.block.service.template', 'sonata.block.service.template', array());
        $instance->add('sonata.admin_doctrine_orm.block.audit', 'sonata.admin_doctrine_orm.block.audit', array(0 => 'admin'));
        $instance->add('sonata.formatter.block.formatter', 'sonata.formatter.block.formatter', array());
        $instance->add('sonata.user.block.menu', 'sonata.user.block.menu', array());
        $instance->add('sonata.user.block.account', 'sonata.user.block.account', array());
        return $instance;
    }
    protected function getSonata_Formatter_Twig_Env_MarkdownService()
    {
        $this->services['sonata.formatter.twig.env.markdown'] = $instance = new \Twig_Environment(new \Sonata\FormatterBundle\Twig\Loader\LoaderSelector(new \Twig_Loader_String(), $this->get('twig.loader')), array('debug' => false, 'strict_variables' => false, 'charset' => 'UTF-8'));
        $instance->addExtension(new \Twig_Extension_Sandbox(new \Sonata\FormatterBundle\Twig\SecurityPolicyContenairAware($this, array(0 => 'sonata.formatter.twig.control_flow', 1 => 'sonata.formatter.twig.gist')), true));
        $instance->addExtension($this->get('sonata.formatter.twig.control_flow'));
        $instance->addExtension($this->get('sonata.formatter.twig.gist'));
        $instance->setLexer(new \Twig_Lexer($instance, array('tag_comment' => array(0 => '<#', 1 => '#>'), 'tag_block' => array(0 => '<%', 1 => '%>'), 'tag_variable' => array(0 => '<%=', 1 => '%>'))));
        return $instance;
    }
    protected function getSonata_Formatter_Twig_Env_RawhtmlService()
    {
        $this->services['sonata.formatter.twig.env.rawhtml'] = $instance = new \Twig_Environment(new \Sonata\FormatterBundle\Twig\Loader\LoaderSelector(new \Twig_Loader_String(), $this->get('twig.loader')), array('debug' => false, 'strict_variables' => false, 'charset' => 'UTF-8'));
        $instance->addExtension(new \Twig_Extension_Sandbox(new \Sonata\FormatterBundle\Twig\SecurityPolicyContenairAware($this, array(0 => 'sonata.formatter.twig.control_flow', 1 => 'sonata.formatter.twig.gist')), true));
        $instance->addExtension($this->get('sonata.formatter.twig.control_flow'));
        $instance->addExtension($this->get('sonata.formatter.twig.gist'));
        $instance->setLexer(new \Twig_Lexer($instance, array('tag_comment' => array(0 => '<#', 1 => '#>'), 'tag_block' => array(0 => '<%', 1 => '%>'), 'tag_variable' => array(0 => '<%=', 1 => '%>'))));
        return $instance;
    }
    protected function getSonata_Formatter_Twig_Env_RichhtmlService()
    {
        $this->services['sonata.formatter.twig.env.richhtml'] = $instance = new \Twig_Environment(new \Sonata\FormatterBundle\Twig\Loader\LoaderSelector(new \Twig_Loader_String(), $this->get('twig.loader')), array('debug' => false, 'strict_variables' => false, 'charset' => 'UTF-8'));
        $instance->addExtension(new \Twig_Extension_Sandbox(new \Sonata\FormatterBundle\Twig\SecurityPolicyContenairAware($this, array(0 => 'sonata.formatter.twig.control_flow', 1 => 'sonata.formatter.twig.gist')), true));
        $instance->addExtension($this->get('sonata.formatter.twig.control_flow'));
        $instance->addExtension($this->get('sonata.formatter.twig.gist'));
        $instance->setLexer(new \Twig_Lexer($instance, array('tag_comment' => array(0 => '<#', 1 => '#>'), 'tag_block' => array(0 => '<%', 1 => '%>'), 'tag_variable' => array(0 => '<%=', 1 => '%>'))));
        return $instance;
    }
    protected function getSonata_Formatter_Twig_Env_TextService()
    {
        $this->services['sonata.formatter.twig.env.text'] = $instance = new \Twig_Environment(new \Sonata\FormatterBundle\Twig\Loader\LoaderSelector(new \Twig_Loader_String(), $this->get('twig.loader')), array('debug' => false, 'strict_variables' => false, 'charset' => 'UTF-8'));
        $instance->addExtension(new \Twig_Extension_Sandbox(new \Sonata\FormatterBundle\Twig\SecurityPolicyContenairAware($this, array(0 => 'sonata.formatter.twig.control_flow', 1 => 'sonata.formatter.twig.gist')), true));
        $instance->addExtension($this->get('sonata.formatter.twig.control_flow'));
        $instance->addExtension($this->get('sonata.formatter.twig.gist'));
        $instance->setLexer(new \Twig_Lexer($instance, array('tag_comment' => array(0 => '<#', 1 => '#>'), 'tag_block' => array(0 => '<%', 1 => '%>'), 'tag_variable' => array(0 => '<%=', 1 => '%>'))));
        return $instance;
    }
    protected function getStofDoctrineExtensions_Listener_BlameableService()
    {
        $this->services['stof_doctrine_extensions.listener.blameable'] = $instance = new \Gedmo\Blameable\BlameableListener();
        $instance->setAnnotationReader($this->get('annotation_reader'));
        return $instance;
    }
    protected function getStofDoctrineExtensions_Listener_LoggableService()
    {
        $this->services['stof_doctrine_extensions.listener.loggable'] = $instance = new \Gedmo\Loggable\LoggableListener();
        $instance->setAnnotationReader($this->get('annotation_reader'));
        return $instance;
    }
    protected function getStofDoctrineExtensions_Listener_TranslatableService()
    {
        $this->services['stof_doctrine_extensions.listener.translatable'] = $instance = new \Gedmo\Translatable\TranslatableListener();
        $instance->setAnnotationReader($this->get('annotation_reader'));
        $instance->setDefaultLocale('ru');
        $instance->setTranslatableLocale('ru');
        $instance->setTranslationFallback(false);
        $instance->setPersistDefaultLocaleTranslation(false);
        $instance->setSkipOnLoad(false);
        return $instance;
    }
    protected function getSwiftmailer_Mailer_Default_Transport_EventdispatcherService()
    {
        return $this->services['swiftmailer.mailer.default.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher();
    }
    protected function getTemplating_Engine_PhpService()
    {
        $this->services['templating.engine.php'] = $instance = new \Symfony\Bundle\FrameworkBundle\Templating\PhpEngine($this->get('templating.name_parser'), $this, $this->get('templating.loader'), $this->get('templating.globals'));
        $instance->setCharset('UTF-8');
        $instance->setHelpers(array('slots' => 'templating.helper.slots', 'assets' => 'templating.helper.assets', 'request' => 'templating.helper.request', 'session' => 'templating.helper.session', 'router' => 'templating.helper.router', 'actions' => 'templating.helper.actions', 'code' => 'templating.helper.code', 'translator' => 'templating.helper.translator', 'form' => 'templating.helper.form', 'stopwatch' => 'templating.helper.stopwatch', 'logout_url' => 'templating.helper.logout_url', 'security' => 'templating.helper.security', 'assetic' => 'assetic.helper.static', 'sonata_block' => 'sonata.block.templating.helper', 'ivory_ckeditor' => 'ivory_ck_editor.templating.helper', 'markdown' => 'templating.helper.markdown', 'knp_pagination' => 'knp_paginator.templating.helper.pagination', 'locale' => 'sonata.intl.templating.helper.locale', 'number' => 'sonata.intl.templating.helper.number', 'datetime' => 'sonata.intl.templating.helper.datetime'));
        return $instance;
    }
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator($this->get('file_locator'), '/home/olikids/public_html.sam/app/cache/prod');
    }
    protected function getValidator_ValidatorFactoryService()
    {
        return $this->services['validator.validator_factory'] = new \Symfony\Bundle\FrameworkBundle\Validator\ConstraintValidatorFactory($this, array('application_user_same_data' => 'application_user.validator.unique.your_validator_name', 'core_order_order_extra' => 'core_order_order_extra_validator', 'core_order_check_composition' => 'core_order_check_composition_validator', 'core_delivery_internal_code' => 'core_delivery.internal_codes_validator', 'validator.expression' => 'validator.expression', 'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => 'validator.email', 'security.validator.user_password' => 'security.validator.user_password', 'doctrine.orm.validator.unique' => 'doctrine.orm.validator.unique', 'sonata.admin.validator.inline' => 'sonata.admin.validator.inline'));
    }
    public function getParameter($name)
    {
        $name = strtolower($name);
        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        return $this->parameters[$name];
    }
    public function hasParameter($name)
    {
        $name = strtolower($name);
        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }
        return $this->parameterBag;
    }
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => '/home/olikids/public_html.sam/app',
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.name' => 'app',
            'kernel.cache_dir' => '/home/olikids/public_html.sam/app/cache/prod',
            'kernel.logs_dir' => '/home/olikids/public_html.sam/app/logs',
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'FOSUserBundle' => 'FOS\\UserBundle\\FOSUserBundle',
                'SonatajQueryBundle' => 'Sonata\\jQueryBundle\\SonatajQueryBundle',
                'SonataAdminBundle' => 'Sonata\\AdminBundle\\SonataAdminBundle',
                'SonataCoreBundle' => 'Sonata\\CoreBundle\\SonataCoreBundle',
                'SonataBlockBundle' => 'Sonata\\BlockBundle\\SonataBlockBundle',
                'SonataDoctrineORMAdminBundle' => 'Sonata\\DoctrineORMAdminBundle\\SonataDoctrineORMAdminBundle',
                'SonataMarkItUpBundle' => 'Sonata\\MarkItUpBundle\\SonataMarkItUpBundle',
                'SonataFormatterBundle' => 'Sonata\\FormatterBundle\\SonataFormatterBundle',
                'IvoryCKEditorBundle' => 'Ivory\\CKEditorBundle\\IvoryCKEditorBundle',
                'FMElfinderBundle' => 'FM\\ElfinderBundle\\FMElfinderBundle',
                'KnpMarkdownBundle' => 'Knp\\Bundle\\MarkdownBundle\\KnpMarkdownBundle',
                'KnpMenuBundle' => 'Knp\\Bundle\\MenuBundle\\KnpMenuBundle',
                'SonataUserBundle' => 'Sonata\\UserBundle\\SonataUserBundle',
                'SonataEasyExtendsBundle' => 'Sonata\\EasyExtendsBundle\\SonataEasyExtendsBundle',
                'SimpleThingsEntityAuditBundle' => 'SimpleThings\\EntityAudit\\SimpleThingsEntityAuditBundle',
                'ApplicationSimpleThingsEntityAuditBundle' => 'Application\\SimpleThings\\EntityAudit\\ApplicationSimpleThingsEntityAuditBundle',
                'ApplicationSonataUserBundle' => 'Application\\Sonata\\UserBundle\\ApplicationSonataUserBundle',
                'ApplicationSonataAdminBundle' => 'Application\\Sonata\\AdminBundle\\ApplicationSonataAdminBundle',
                'DoctrineMigrationsBundle' => 'Doctrine\\Bundle\\MigrationsBundle\\DoctrineMigrationsBundle',
                'StofDoctrineExtensionsBundle' => 'Stof\\DoctrineExtensionsBundle\\StofDoctrineExtensionsBundle',
                'KnpPaginatorBundle' => 'Knp\\Bundle\\PaginatorBundle\\KnpPaginatorBundle',
                'ApplicationKnpPaginatorBundle' => 'Application\\Knp\\PaginatorBundle\\ApplicationKnpPaginatorBundle',
                'JMSAopBundle' => 'JMS\\AopBundle\\JMSAopBundle',
                'JMSSecurityExtraBundle' => 'JMS\\SecurityExtraBundle\\JMSSecurityExtraBundle',
                'JMSDiExtraBundle' => 'JMS\\DiExtraBundle\\JMSDiExtraBundle',
                'JMSI18nRoutingBundle' => 'JMS\\I18nRoutingBundle\\JMSI18nRoutingBundle',
                'CoreCategoryBundle' => 'Core\\CategoryBundle\\CoreCategoryBundle',
                'CoreCommonBundle' => 'Core\\CommonBundle\\CoreCommonBundle',
                'CoreProductBundle' => 'Core\\ProductBundle\\CoreProductBundle',
                'CoreManufacturerBundle' => 'Core\\ManufacturerBundle\\CoreManufacturerBundle',
                'CoreOrderBundle' => 'Core\\OrderBundle\\CoreOrderBundle',
                'CorePropertyBundle' => 'Core\\PropertyBundle\\CorePropertyBundle',
                'CoreDirectoryBundle' => 'Core\\DirectoryBundle\\CoreDirectoryBundle',
                'CoreTroubleTicketBundle' => 'Core\\TroubleTicketBundle\\CoreTroubleTicketBundle',
                'CoreLogisticsBundle' => 'Core\\LogisticsBundle\\CoreLogisticsBundle',
                'CoreFaqBundle' => 'Core\\FaqBundle\\CoreFaqBundle',
                'ApplicationFMElfinderBundle' => 'Application\\ElfinderBundle\\ApplicationFMElfinderBundle',
                'CmfTreeBrowserBundle' => 'Symfony\\Cmf\\Bundle\\TreeBrowserBundle\\CmfTreeBrowserBundle',
                'CoreFileBundle' => 'Core\\FileBundle\\CoreFileBundle',
                'CoreLanguageBundle' => 'Core\\LanguageBundle\\CoreLanguageBundle',
                'CoreUnionBundle' => 'Core\\UnionBundle\\CoreUnionBundle',
                'CoreColorBundle' => 'Core\\ColorBundle\\CoreColorBundle',
                'GregwarCaptchaBundle' => 'Gregwar\\CaptchaBundle\\GregwarCaptchaBundle',
                'SonataIntlBundle' => 'Sonata\\IntlBundle\\SonataIntlBundle',
                'CoreStatisticsBundle' => 'Core\\StatisticsBundle\\CoreStatisticsBundle',
                'CoreDeliveryBundle' => 'Core\\DeliveryBundle\\CoreDeliveryBundle',
                'CorePaymentBundle' => 'Core\\PaymentBundle\\CorePaymentBundle',
                'CoreDiscountsBundle' => 'Core\\DiscountsBundle\\CoreDiscountsBundle',
                'TFoxMpdfPortBundle' => 'TFox\\MpdfPortBundle\\TFoxMpdfPortBundle',
                'ApplicationSonataBlockBundle' => 'Application\\Sonata\\BlockBundle\\ApplicationSonataBlockBundle',
                'BerylliumCacheBundle' => 'Beryllium\\CacheBundle\\BerylliumCacheBundle',
                'RaulFraileLadybugBundle' => 'RaulFraile\\Bundle\\LadybugBundle\\RaulFraileLadybugBundle',
                'CoreReviewBundle' => 'Core\\ReviewBundle\\CoreReviewBundle',
                'ShtumiUsefulBundle' => 'Shtumi\\UsefulBundle\\ShtumiUsefulBundle',
                'ApplicationShtumiUsefulBundle' => 'Application\\Shtumi\\UsefulBundle\\ApplicationShtumiUsefulBundle',
                'CoreConfigBundle' => 'Core\\ConfigBundle\\CoreConfigBundle',
                'LiipMonitorBundle' => 'Liip\\MonitorBundle\\LiipMonitorBundle',
                'OrnicarApcBundle' => 'Ornicar\\ApcBundle\\OrnicarApcBundle',
                'ApplicationIvoryCKEditorBundle' => 'Application\\IvoryCKEditorBundle\\ApplicationIvoryCKEditorBundle',
                'PrestaSitemapBundle' => 'Presta\\SitemapBundle\\PrestaSitemapBundle',
                'LiuggioExcelBundle' => 'Liuggio\\ExcelBundle\\LiuggioExcelBundle',
                'CoreSlugHistoryBundle' => 'Core\\SlugHistoryBundle\\CoreSlugHistoryBundle',
                'CoreHolidayBundle' => 'Core\\HolidayBundle\\CoreHolidayBundle',
                'CoreOfficeWorkTimeBundle' => 'Core\\OfficeWorkTimeBundle\\CoreOfficeWorkTimeBundle',
                'FOSHttpCacheBundle' => 'FOS\\HttpCacheBundle\\FOSHttpCacheBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appProdProjectContainer',
            'database_driver' => 'pdo_mysql',
            'database_host' => '127.0.0.1',
            'database_port' => 3306,
            'database_name' => 'olikids',
            'database_user' => 'root',
            'database_password' => 'root',
            'mailer_encryption' => 'ssl',
            'mailer_transport' => 'smtp',
            'mailer_host' => 'smtp.mail.ru',
            'mailer_user' => 'saintrain@mail.ru',
            'mailer_password' => 'tel76924WM',
            'locale' => 'ru',
            'domain_ru' => 'www.olikids-sam.ru.vm',
            'secret' => 'b4e7a4ba6de9c87f227a93857e26b0856d0f4af1',
            'filebrowserbrowseroute' => 'elfinder',
            'default_timezone' => 'Europe/Moscow',
            'default_currency' => 'RUB',
            'default_email' => 'saintrain@mail.ru',
            'default_email_sender_name' => 'saintrain@mail.ru',
            'java_path' => '/usr/bin/java',
            'router.request_context.host' => 'www.olikids-sam.ru.vm',
            'router.request_context.base_url' => '/app_dev.php',
            'sonata.user.admin.groupname' => 'sonata_user',
            'core_delivery.companieswithkeys' => array(
                0 => 'cdek',
                1 => 'dellin',
                2 => 'ems',
                3 => 'dpd',
            ),
            'core_delivery.companyemail' => 'saintrain@mail.ru',
            'sonata.block.service.statistics.class' => 'Application\\Sonata\\BlockBundle\\Block\\Service\\StatisticsBlockService',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'controller_name_converter.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
            'response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener',
            'streamed_response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener',
            'locale_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener',
            'event_dispatcher.class' => 'Symfony\\Component\\EventDispatcher\\ContainerAwareEventDispatcher',
            'http_kernel.class' => 'Symfony\\Component\\HttpKernel\\DependencyInjection\\ContainerAwareHttpKernel',
            'filesystem.class' => 'Symfony\\Component\\Filesystem\\Filesystem',
            'cache_warmer.class' => 'Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerAggregate',
            'cache_clearer.class' => 'Symfony\\Component\\HttpKernel\\CacheClearer\\ChainCacheClearer',
            'file_locator.class' => 'Symfony\\Component\\HttpKernel\\Config\\FileLocator',
            'uri_signer.class' => 'Symfony\\Component\\HttpKernel\\UriSigner',
            'request_stack.class' => 'Symfony\\Component\\HttpFoundation\\RequestStack',
            'fragment.handler.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\FragmentHandler',
            'fragment.renderer.inline.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\InlineFragmentRenderer',
            'fragment.renderer.hinclude.class' => 'Symfony\\Bundle\\FrameworkBundle\\Fragment\\ContainerAwareHIncludeFragmentRenderer',
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.renderer.esi.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\EsiFragmentRenderer',
            'fragment.path' => '/_fragment',
            'translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\Translator',
            'translator.identity.class' => 'Symfony\\Component\\Translation\\IdentityTranslator',
            'translator.selector.class' => 'Symfony\\Component\\Translation\\MessageSelector',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'translation.loader.po.class' => 'Symfony\\Component\\Translation\\Loader\\PoFileLoader',
            'translation.loader.mo.class' => 'Symfony\\Component\\Translation\\Loader\\MoFileLoader',
            'translation.loader.qt.class' => 'Symfony\\Component\\Translation\\Loader\\QtFileLoader',
            'translation.loader.csv.class' => 'Symfony\\Component\\Translation\\Loader\\CsvFileLoader',
            'translation.loader.res.class' => 'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader',
            'translation.loader.dat.class' => 'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader',
            'translation.loader.ini.class' => 'Symfony\\Component\\Translation\\Loader\\IniFileLoader',
            'translation.loader.json.class' => 'Symfony\\Component\\Translation\\Loader\\JsonFileLoader',
            'translation.dumper.php.class' => 'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper',
            'translation.dumper.xliff.class' => 'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper',
            'translation.dumper.po.class' => 'Symfony\\Component\\Translation\\Dumper\\PoFileDumper',
            'translation.dumper.mo.class' => 'Symfony\\Component\\Translation\\Dumper\\MoFileDumper',
            'translation.dumper.yml.class' => 'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper',
            'translation.dumper.qt.class' => 'Symfony\\Component\\Translation\\Dumper\\QtFileDumper',
            'translation.dumper.csv.class' => 'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper',
            'translation.dumper.ini.class' => 'Symfony\\Component\\Translation\\Dumper\\IniFileDumper',
            'translation.dumper.json.class' => 'Symfony\\Component\\Translation\\Dumper\\JsonFileDumper',
            'translation.dumper.res.class' => 'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper',
            'translation.extractor.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\PhpExtractor',
            'translation.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\TranslationLoader',
            'translation.extractor.class' => 'Symfony\\Component\\Translation\\Extractor\\ChainExtractor',
            'translation.writer.class' => 'Symfony\\Component\\Translation\\Writer\\TranslationWriter',
            'property_accessor.class' => 'Symfony\\Component\\PropertyAccess\\PropertyAccessor',
            'debug.errors_logger_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ErrorsLoggerListener',
            'kernel.secret' => 'b4e7a4ba6de9c87f227a93857e26b0856d0f4af1',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(
            ),
            'kernel.trusted_proxies' => array(
                0 => '192.0.0.1',
                1 => '10.0.0.0/8',
            ),
            'kernel.default_locale' => 'ru',
            'session.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Session',
            'session.flashbag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag',
            'session.attribute_bag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag',
            'session.storage.metadata_bag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MetadataBag',
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.native.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage',
            'session.storage.php_bridge.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage',
            'session.storage.mock_file.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage',
            'session.handler.native_file.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler',
            'session.handler.write_check.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\WriteCheckSessionHandler',
            'session_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener',
            'session.storage.options' => array(
                'gc_probability' => 1,
            ),
            'session.save_path' => '/home/olikids/public_html.sam/app/cache/prod/sessions',
            'session.metadata.update_threshold' => '0',
            'security.secure_random.class' => 'Symfony\\Component\\Security\\Core\\Util\\SecureRandom',
            'form.resolved_type_factory.class' => 'Symfony\\Component\\Form\\ResolvedFormTypeFactory',
            'form.registry.class' => 'Symfony\\Component\\Form\\FormRegistry',
            'form.factory.class' => 'Symfony\\Component\\Form\\FormFactory',
            'form.extension.class' => 'Symfony\\Component\\Form\\Extension\\DependencyInjection\\DependencyInjectionExtension',
            'form.type_guesser.validator.class' => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser',
            'form.type_extension.form.request_handler.class' => 'Symfony\\Component\\Form\\Extension\\HttpFoundation\\HttpFoundationRequestHandler',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'security.csrf.token_generator.class' => 'Symfony\\Component\\Security\\Csrf\\TokenGenerator\\UriSafeTokenGenerator',
            'security.csrf.token_storage.class' => 'Symfony\\Component\\Security\\Csrf\\TokenStorage\\SessionTokenStorage',
            'security.csrf.token_manager.class' => 'Symfony\\Component\\Security\\Csrf\\CsrfTokenManager',
            'templating.engine.delegating.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\DelegatingEngine',
            'templating.name_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateNameParser',
            'templating.filename_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateFilenameParser',
            'templating.cache_warmer.template_paths.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplatePathsCacheWarmer',
            'templating.locator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateLocator',
            'templating.loader.filesystem.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Component\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Component\\Templating\\Loader\\ChainLoader',
            'templating.finder.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplateFinder',
            'templating.engine.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\PhpEngine',
            'templating.helper.slots.class' => 'Symfony\\Component\\Templating\\Helper\\SlotsHelper',
            'templating.helper.assets.class' => 'Symfony\\Component\\Templating\\Helper\\CoreAssetsHelper',
            'templating.helper.actions.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\ActionsHelper',
            'templating.helper.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper',
            'templating.helper.request.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RequestHelper',
            'templating.helper.session.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\SessionHelper',
            'templating.helper.code.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\CodeHelper',
            'templating.helper.translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\TranslatorHelper',
            'templating.helper.form.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\FormHelper',
            'templating.helper.stopwatch.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\StopwatchHelper',
            'templating.form.engine.class' => 'Symfony\\Component\\Form\\Extension\\Templating\\TemplatingRendererEngine',
            'templating.form.renderer.class' => 'Symfony\\Component\\Form\\FormRenderer',
            'templating.globals.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\GlobalVariables',
            'templating.asset.path_package.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Asset\\PathPackage',
            'templating.asset.url_package.class' => 'Symfony\\Component\\Templating\\Asset\\UrlPackage',
            'templating.asset.package_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Asset\\PackageFactory',
            'templating.helper.code.file_link_format' => NULL,
            'templating.helper.form.resources' => array(
                0 => 'FrameworkBundle:Form',
            ),
            'templating.loader.cache.path' => NULL,
            'templating.engines' => array(
                0 => 'twig',
            ),
            'validator.class' => 'Symfony\\Component\\Validator\\ValidatorInterface',
            'validator.builder.class' => 'Symfony\\Component\\Validator\\ValidatorBuilderInterface',
            'validator.builder.factory.class' => 'Symfony\\Component\\Validator\\Validation',
            'validator.mapping.cache.apc.class' => 'Symfony\\Component\\Validator\\Mapping\\Cache\\ApcCache',
            'validator.mapping.cache.prefix' => '',
            'validator.validator_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Validator\\ConstraintValidatorFactory',
            'validator.expression.class' => 'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator',
            'validator.email.class' => 'Symfony\\Component\\Validator\\Constraints\\EmailValidator',
            'validator.translation_domain' => 'validators',
            'validator.api' => 3,
            'data_collector.templates' => array(
            ),
            'router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\Router',
            'router.request_context.class' => 'Symfony\\Component\\Routing\\RequestContext',
            'routing.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\DelegatingLoader',
            'routing.resolver.class' => 'Symfony\\Component\\Config\\Loader\\LoaderResolver',
            'routing.loader.xml.class' => 'Symfony\\Component\\Routing\\Loader\\XmlFileLoader',
            'routing.loader.yml.class' => 'Symfony\\Component\\Routing\\Loader\\YamlFileLoader',
            'routing.loader.php.class' => 'Symfony\\Component\\Routing\\Loader\\PhpFileLoader',
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.cache_warmer.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\RouterCacheWarmer',
            'router.options.matcher.cache_class' => 'appProdUrlMatcher',
            'router.options.generator.cache_class' => 'appProdUrlGenerator',
            'router_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener',
            'router.request_context.scheme' => 'http',
            'router.resource' => '/home/olikids/public_html.sam/app/config/routing.yml',
            'router.cache_class_prefix' => 'appProd',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'annotations.reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'annotations.cached_reader.class' => 'Doctrine\\Common\\Annotations\\CachedReader',
            'annotations.file_cache_reader.class' => 'Doctrine\\Common\\Annotations\\FileCacheReader',
            'security.context.class' => 'Symfony\\Component\\Security\\Core\\SecurityContext',
            'security.user_checker.class' => 'Symfony\\Component\\Security\\Core\\User\\UserChecker',
            'security.encoder_factory.generic.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\EncoderFactory',
            'security.encoder.digest.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder',
            'security.encoder.plain.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder',
            'security.encoder.pbkdf2.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\Pbkdf2PasswordEncoder',
            'security.encoder.bcrypt.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\BCryptPasswordEncoder',
            'security.user.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\User\\InMemoryUserProvider',
            'security.user.provider.in_memory.user.class' => 'Symfony\\Component\\Security\\Core\\User\\User',
            'security.user.provider.chain.class' => 'Symfony\\Component\\Security\\Core\\User\\ChainUserProvider',
            'security.authentication.trust_resolver.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationTrustResolver',
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.authentication.manager.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationProviderManager',
            'security.authentication.session_strategy.class' => 'Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategy',
            'security.access.decision_manager.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManager',
            'security.access.simple_role_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleVoter',
            'security.access.authenticated_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AuthenticatedVoter',
            'security.access.role_hierarchy_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleHierarchyVoter',
            'security.access.expression_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\ExpressionVoter',
            'security.firewall.class' => 'Symfony\\Component\\Security\\Http\\Firewall',
            'security.firewall.map.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallMap',
            'security.firewall.context.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallContext',
            'security.matcher.class' => 'Symfony\\Component\\HttpFoundation\\RequestMatcher',
            'security.expression_matcher.class' => 'Symfony\\Component\\HttpFoundation\\ExpressionRequestMatcher',
            'security.role_hierarchy.class' => 'Symfony\\Component\\Security\\Core\\Role\\RoleHierarchy',
            'security.http_utils.class' => 'Symfony\\Component\\Security\\Http\\HttpUtils',
            'security.validator.user_password.class' => 'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator',
            'security.expression_language.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\ExpressionLanguage',
            'security.authentication.retry_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\RetryAuthenticationEntryPoint',
            'security.channel_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ChannelListener',
            'security.authentication.form_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\FormAuthenticationEntryPoint',
            'security.authentication.listener.form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\UsernamePasswordFormAuthenticationListener',
            'security.authentication.listener.simple_form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SimpleFormAuthenticationListener',
            'security.authentication.listener.simple_preauth.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SimplePreAuthenticationListener',
            'security.authentication.listener.basic.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\BasicAuthenticationListener',
            'security.authentication.basic_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\BasicAuthenticationEntryPoint',
            'security.authentication.listener.digest.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\DigestAuthenticationListener',
            'security.authentication.digest_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\DigestAuthenticationEntryPoint',
            'security.authentication.listener.x509.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\X509AuthenticationListener',
            'security.authentication.listener.anonymous.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AnonymousAuthenticationListener',
            'security.authentication.switchuser_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SwitchUserListener',
            'security.logout_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\LogoutListener',
            'security.logout.handler.session.class' => 'Symfony\\Component\\Security\\Http\\Logout\\SessionLogoutHandler',
            'security.logout.handler.cookie_clearing.class' => 'Symfony\\Component\\Security\\Http\\Logout\\CookieClearingLogoutHandler',
            'security.logout.success_handler.class' => 'Symfony\\Component\\Security\\Http\\Logout\\DefaultLogoutSuccessHandler',
            'security.access_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AccessListener',
            'security.access_map.class' => 'Symfony\\Component\\Security\\Http\\AccessMap',
            'security.exception_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ExceptionListener',
            'security.context_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ContextListener',
            'security.authentication.provider.dao.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\DaoAuthenticationProvider',
            'security.authentication.provider.simple.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\SimpleAuthenticationProvider',
            'security.authentication.provider.pre_authenticated.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\PreAuthenticatedAuthenticationProvider',
            'security.authentication.provider.anonymous.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\AnonymousAuthenticationProvider',
            'security.authentication.success_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\DefaultAuthenticationSuccessHandler',
            'security.authentication.failure_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\DefaultAuthenticationFailureHandler',
            'security.authentication.simple_success_failure_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\SimpleAuthenticationHandler',
            'security.authentication.provider.rememberme.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\RememberMeAuthenticationProvider',
            'security.authentication.listener.rememberme.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\RememberMeListener',
            'security.rememberme.token.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\RememberMe\\InMemoryTokenProvider',
            'security.authentication.rememberme.services.persistent.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\PersistentTokenBasedRememberMeServices',
            'security.authentication.rememberme.services.simplehash.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\TokenBasedRememberMeServices',
            'security.rememberme.response_listener.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener',
            'templating.helper.logout_url.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\LogoutUrlHelper',
            'templating.helper.security.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\SecurityHelper',
            'twig.extension.logout_url.class' => 'Symfony\\Bundle\\SecurityBundle\\Twig\\Extension\\LogoutUrlExtension',
            'twig.extension.security.class' => 'Symfony\\Bridge\\Twig\\Extension\\SecurityExtension',
            'data_collector.security.class' => 'Symfony\\Bundle\\SecurityBundle\\DataCollector\\SecurityDataCollector',
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'security.role_hierarchy.roles' => array(
                'ROLE_ADMIN' => array(
                    0 => 'ROLE_USER',
                    1 => 'ROLE_SONATA_ADMIN',
                ),
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_ALLOWED_TO_SWITCH',
                    1 => 'ROLE_ADMIN',
                    2 => 'ROLE_CORE_ORDER_EXTRA_STATUS_ADMIN_UPDATE_NAME',
                    3 => 'ROLE_CORE_LOGISTICS_SUPPLY_STATUS_ADMIN_UPDATE_NAME',
                    4 => 'ROLE_CORE_ORDER_CANCELED_REASON_ADMIN_UPDATE_NAME',
                    5 => 'ROLE_CORE_LOGISTICS_UNIT_IN_STOCK_DEFECT_TRANSIT_ADMIN_UPDATE_NAME',
                    6 => 'ROLE_CORE_LOGISTICS_TRANSIT_STATUS_ADMIN_UPDATE_NAME',
                    7 => 'CAN_FASTEDIT',
                ),
            ),
            'twig.class' => 'Twig_Environment',
            'twig.loader.filesystem.class' => 'Symfony\\Bundle\\TwigBundle\\Loader\\FilesystemLoader',
            'twig.loader.chain.class' => 'Twig_Loader_Chain',
            'templating.engine.twig.class' => 'Symfony\\Bundle\\TwigBundle\\TwigEngine',
            'twig.cache_warmer.class' => 'Symfony\\Bundle\\TwigBundle\\CacheWarmer\\TemplateCacheCacheWarmer',
            'twig.extension.trans.class' => 'Symfony\\Bridge\\Twig\\Extension\\TranslationExtension',
            'twig.extension.assets.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\AssetsExtension',
            'twig.extension.actions.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\ActionsExtension',
            'twig.extension.code.class' => 'Symfony\\Bridge\\Twig\\Extension\\CodeExtension',
            'twig.extension.routing.class' => 'Symfony\\Bridge\\Twig\\Extension\\RoutingExtension',
            'twig.extension.yaml.class' => 'Symfony\\Bridge\\Twig\\Extension\\YamlExtension',
            'twig.extension.form.class' => 'Symfony\\Bridge\\Twig\\Extension\\FormExtension',
            'twig.extension.httpkernel.class' => 'Symfony\\Bridge\\Twig\\Extension\\HttpKernelExtension',
            'twig.extension.debug.stopwatch.class' => 'Symfony\\Bridge\\Twig\\Extension\\StopwatchExtension',
            'twig.extension.expression.class' => 'Symfony\\Bridge\\Twig\\Extension\\ExpressionExtension',
            'twig.form.engine.class' => 'Symfony\\Bridge\\Twig\\Form\\TwigRendererEngine',
            'twig.form.renderer.class' => 'Symfony\\Bridge\\Twig\\Form\\TwigRenderer',
            'twig.translation.extractor.class' => 'Symfony\\Bridge\\Twig\\Translation\\TwigExtractor',
            'twig.exception_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener',
            'twig.controller.exception.class' => 'Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController',
            'twig.exception_listener.controller' => 'twig.controller.exception:showAction',
            'twig.form.resources' => array(
                0 => 'GregwarCaptchaBundle::captcha.html.twig',
                1 => 'IvoryCKEditorBundle:Form:ckeditor_widget.html.twig',
                2 => 'form_div_layout.html.twig',
                3 => 'SonataFormatterBundle:Form:formatter.html.twig',
                4 => 'CoreFileBundle:Admin\\Form:multiupload_image_widget.html.twig',
                5 => 'CoreFileBundle:Admin\\Form:multiupload_document_widget.html.twig',
                6 => 'CoreFileBundle:Form:multiupload_file_frontend_widget.html.twig',
                7 => 'CoreColorBundle:Admin\\Form:admin_form_type_color_widget.html.twig',
                8 => 'CoreColorBundle:Form:colorpicker_widget.html.twig',
                9 => 'CoreReviewBundle:Form:star_rating_widget.html.twig',
                10 => 'CoreCommonBundle:Form:ajax_entity_widget.html.twig',
                11 => 'CoreCategoryBundle:Admin\\Form:caregory_widget.html.twig',
                12 => 'CorePropertyBundle:Admin\\Form:property_widget.html.twig',
                13 => 'CorePropertyBundle:Admin\\Form:property_caregory_widget.html.twig',
                14 => 'ApplicationSonataAdminBundle:Admin\\Form:admin_date_range.html.twig',
                15 => 'CoreUnionBundle:Admin\\Form:union_widget.html.twig',
                16 => 'CoreProductBundle:Admin\\Form\\modifications_widget:product_modifications_widget.html.twig',
                17 => 'CoreProductBundle:Admin\\Form\\category_main_widget:category_main_widget.html.twig',
                18 => 'CoreProductBundle:Admin\\Form\\manufacturer_main_widget:manufacturer_main_widget.html.twig',
                19 => 'CoreCommonBundle:Form:row.html.twig',
                20 => 'CoreCommonBundle:Form:errors.html.twig',
                21 => 'ApplicationSonataUserBundle:Admin\\Form:kpp_type_widget.html.twig',
                22 => 'ApplicationSonataUserBundle:Admin\\Form:onec_type_widget.html.twig',
                23 => 'ApplicationSonataUserBundle:Admin\\Form:contragent_email_type_widget.html.twig',
                24 => 'ApplicationSonataUserBundle:Admin\\Form:balance_history_widget.html.twig',
                25 => 'CoreOrderBundle:Admin\\Form\\Order\\type:products_in_order_widget.html.twig',
                26 => 'CoreOrderBundle:Admin\\Form\\Order\\type:unit_serial_number.html.twig',
                27 => 'CoreOrderBundle:Admin\\Form\\Order\\type:boxes_and_waybills_type_widget.html.twig',
                28 => 'CoreOrderBundle:Admin\\Form\\Order\\type:waybills_in_order_widget.html.twig',
                29 => 'CoreOrderBundle:Admin\\Form\\Order\\type:canceled_status_widget.html.twig',
                30 => 'CoreOrderBundle:Admin\\Form\\ExtraStatus\\type:extra_status_widget.html.twig',
                31 => 'CoreLogisticsBundle:Admin\\Transit\\type:products_in_transit_widget.html.twig',
                32 => 'CoreLogisticsBundle:Admin\\UnitInStock\\type:unit_in_stock_defect_widget.html.twig',
                33 => 'CoreDirectoryBundle:Admin\\Form\\Type:filter_name_widget.html.twig',
                34 => 'CoreDirectoryBundle:Admin\\Form\\Type:filter_capitals_widget.html.twig',
                35 => 'CoreDirectoryBundle:Admin\\Form\\Type:remote_video_widget.html.twig',
                36 => 'CoreConfigBundle:Admin\\Form\\Type:config_data_widget.html.twig',
                37 => 'CoreLanguageBundle:Form\\Type:text_case_widget.html.twig',
                38 => 'ShtumiUsefulBundle::fields.html.twig',
                39 => 'CoreCommonBundle:Form:tree_select_widget.html.twig',
                40 => 'ApplicationShtumiUsefulBundle::fields.html.twig',
                41 => 'CoreSlugHistoryBundle:Admin\\Form:slug_history_widget.html.twig',
                42 => 'SonataUserBundle:Form:form_admin_fields.html.twig',
            ),
            'twig.options' => array(
                'debug' => false,
                'strict_variables' => false,
                'exception_controller' => 'twig.controller.exception:showAction',
                'autoescape_service' => NULL,
                'autoescape_service_method' => NULL,
                'cache' => '/home/olikids/public_html.sam/app/cache/prod/twig',
                'charset' => 'UTF-8',
                'paths' => array(
                ),
            ),
            'monolog.logger.class' => 'Symfony\\Bridge\\Monolog\\Logger',
            'monolog.gelf.publisher.class' => 'Gelf\\MessagePublisher',
            'monolog.gelfphp.publisher.class' => 'Gelf\\Publisher',
            'monolog.handler.stream.class' => 'Monolog\\Handler\\StreamHandler',
            'monolog.handler.console.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ConsoleHandler',
            'monolog.handler.group.class' => 'Monolog\\Handler\\GroupHandler',
            'monolog.handler.buffer.class' => 'Monolog\\Handler\\BufferHandler',
            'monolog.handler.rotating_file.class' => 'Monolog\\Handler\\RotatingFileHandler',
            'monolog.handler.syslog.class' => 'Monolog\\Handler\\SyslogHandler',
            'monolog.handler.syslogudp.class' => 'Monolog\\Handler\\SyslogUdpHandler',
            'monolog.handler.null.class' => 'Monolog\\Handler\\NullHandler',
            'monolog.handler.test.class' => 'Monolog\\Handler\\TestHandler',
            'monolog.handler.gelf.class' => 'Monolog\\Handler\\GelfHandler',
            'monolog.handler.rollbar.class' => 'Monolog\\Handler\\RollbarHandler',
            'monolog.handler.flowdock.class' => 'Monolog\\Handler\\FlowdockHandler',
            'monolog.handler.browser_console.class' => 'Monolog\\Handler\\BrowserConsoleHandler',
            'monolog.handler.firephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\FirePHPHandler',
            'monolog.handler.chromephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ChromePhpHandler',
            'monolog.handler.debug.class' => 'Symfony\\Bridge\\Monolog\\Handler\\DebugHandler',
            'monolog.handler.swift_mailer.class' => 'Symfony\\Bridge\\Monolog\\Handler\\SwiftMailerHandler',
            'monolog.handler.native_mailer.class' => 'Monolog\\Handler\\NativeMailerHandler',
            'monolog.handler.socket.class' => 'Monolog\\Handler\\SocketHandler',
            'monolog.handler.pushover.class' => 'Monolog\\Handler\\PushoverHandler',
            'monolog.handler.raven.class' => 'Monolog\\Handler\\RavenHandler',
            'monolog.handler.newrelic.class' => 'Monolog\\Handler\\NewRelicHandler',
            'monolog.handler.hipchat.class' => 'Monolog\\Handler\\HipChatHandler',
            'monolog.handler.cube.class' => 'Monolog\\Handler\\CubeHandler',
            'monolog.handler.amqp.class' => 'Monolog\\Handler\\AmqpHandler',
            'monolog.handler.error_log.class' => 'Monolog\\Handler\\ErrorLogHandler',
            'monolog.handler.loggly.class' => 'Monolog\\Handler\\LogglyHandler',
            'monolog.handler.logentries.class' => 'Monolog\\Handler\\LogEntriesHandler',
            'monolog.activation_strategy.not_found.class' => 'Symfony\\Bundle\\MonologBundle\\NotFoundActivationStrategy',
            'monolog.handler.fingers_crossed.class' => 'Monolog\\Handler\\FingersCrossedHandler',
            'monolog.handler.fingers_crossed.error_level_activation_strategy.class' => 'Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy',
            'monolog.handler.filter.class' => 'Monolog\\Handler\\FilterHandler',
            'monolog.handler.mongo.class' => 'Monolog\\Handler\\MongoDBHandler',
            'monolog.mongo.client.class' => 'MongoClient',
            'monolog.swift_mailer.handlers' => array(
            ),
            'monolog.handlers_to_channels' => array(
                'monolog.handler.syslog' => NULL,
                'monolog.handler.main' => NULL,
                'monolog.handler.applog' => NULL,
            ),
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.impersonate.class' => 'Swift_Plugins_ImpersonatePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Swift_Plugins_MessageLogger',
            'swiftmailer.plugin.antiflood.class' => 'Swift_Plugins_AntiFloodPlugin',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.spool.file.class' => 'Swift_FileSpool',
            'swiftmailer.spool.memory.class' => 'Swift_MemorySpool',
            'swiftmailer.email_sender.listener.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener',
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.mailer.default.transport.name' => 'smtp',
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.mailer.default.transport.smtp.encryption' => 'ssl',
            'swiftmailer.mailer.default.transport.smtp.port' => 465,
            'swiftmailer.mailer.default.transport.smtp.host' => 'smtp.mail.ru',
            'swiftmailer.mailer.default.transport.smtp.username' => 'saintrain@mail.ru',
            'swiftmailer.mailer.default.transport.smtp.password' => 'tel76924WM',
            'swiftmailer.mailer.default.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.default.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.default.transport.smtp.source_ip' => NULL,
            'swiftmailer.spool.default.memory.path' => '/home/olikids/public_html.sam/app/cache/prod/swiftmailer/spool/default',
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => array(
                'default' => 'swiftmailer.mailer.default',
            ),
            'swiftmailer.default_mailer' => 'default',
            'assetic.asset_factory.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\AssetFactory',
            'assetic.asset_manager.class' => 'Assetic\\Factory\\LazyAssetManager',
            'assetic.asset_manager_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetManagerCacheWarmer',
            'assetic.cached_formula_loader.class' => 'Assetic\\Factory\\Loader\\CachedFormulaLoader',
            'assetic.config_cache.class' => 'Assetic\\Cache\\ConfigCache',
            'assetic.config_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\ConfigurationLoader',
            'assetic.config_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\ConfigurationResource',
            'assetic.coalescing_directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\CoalescingDirectoryResource',
            'assetic.directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\DirectoryResource',
            'assetic.filter_manager.class' => 'Symfony\\Bundle\\AsseticBundle\\FilterManager',
            'assetic.worker.ensure_filter.class' => 'Assetic\\Factory\\Worker\\EnsureFilterWorker',
            'assetic.worker.cache_busting.class' => 'Assetic\\Factory\\Worker\\CacheBustingWorker',
            'assetic.value_supplier.class' => 'Symfony\\Bundle\\AsseticBundle\\DefaultValueSupplier',
            'assetic.node.paths' => array(
            ),
            'assetic.cache_dir' => '/home/olikids/public_html.sam/app/cache/prod/assetic',
            'assetic.bundles' => array(
                0 => 'CoreTroubleTicketBundle',
                1 => 'CoreFileBundle',
                2 => 'CoreCommonBundle',
                3 => 'CoreProductBundle',
                4 => 'CoreOrderBundle',
                5 => 'ApplicationSonataUserBundle',
            ),
            'assetic.twig_extension.class' => 'Symfony\\Bundle\\AsseticBundle\\Twig\\AsseticExtension',
            'assetic.twig_formula_loader.class' => 'Assetic\\Extension\\Twig\\TwigFormulaLoader',
            'assetic.helper.dynamic.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\DynamicAsseticHelper',
            'assetic.helper.static.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\StaticAsseticHelper',
            'assetic.php_formula_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\AsseticHelperFormulaLoader',
            'assetic.debug' => false,
            'assetic.use_controller' => false,
            'assetic.enable_profiler' => false,
            'assetic.read_from' => '/home/olikids/public_html.sam/app/../web',
            'assetic.write_to' => '/home/olikids/public_html.sam/app/../web',
            'assetic.variables' => array(
            ),
            'assetic.java.bin' => '/usr/bin/java',
            'assetic.node.bin' => '/usr/bin/node',
            'assetic.ruby.bin' => '/usr/bin/ruby',
            'assetic.sass.bin' => '/usr/bin/sass',
            'assetic.filter.cssrewrite.class' => 'Assetic\\Filter\\CssRewriteFilter',
            'assetic.filter.yui_css.class' => 'Assetic\\Filter\\Yui\\CssCompressorFilter',
            'assetic.filter.yui_css.java' => '/usr/bin/java',
            'assetic.filter.yui_css.jar' => '/home/olikids/public_html.sam/app/Resources/java/yuicompressor.jar',
            'assetic.filter.yui_css.charset' => 'UTF-8',
            'assetic.filter.yui_css.stacksize' => NULL,
            'assetic.filter.yui_css.timeout' => NULL,
            'assetic.filter.yui_css.linebreak' => NULL,
            'assetic.filter.yui_js.class' => 'Assetic\\Filter\\Yui\\JsCompressorFilter',
            'assetic.filter.yui_js.java' => '/usr/bin/java',
            'assetic.filter.yui_js.jar' => '/home/olikids/public_html.sam/app/Resources/java/yuicompressor.jar',
            'assetic.filter.yui_js.charset' => 'UTF-8',
            'assetic.filter.yui_js.stacksize' => NULL,
            'assetic.filter.yui_js.timeout' => NULL,
            'assetic.filter.yui_js.nomunge' => NULL,
            'assetic.filter.yui_js.preserve_semi' => NULL,
            'assetic.filter.yui_js.disable_optimizations' => NULL,
            'assetic.filter.yui_js.linebreak' => NULL,
            'assetic.twig_extension.functions' => array(
            ),
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
                'force_master' => 'doctrine.orm.force_master_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => array(
                'json' => array(
                    'class' => 'Sonata\\Doctrine\\Types\\JsonType',
                    'commented' => true,
                ),
                'datetime' => array(
                    'class' => 'Core\\CommonBundle\\DoctrineExtensions\\DBAL\\Types\\UTCDateTimeType',
                    'commented' => true,
                ),
            ),
            'doctrine.connections' => array(
                'default' => 'doctrine.dbal.default_connection',
                'force_master' => 'doctrine.dbal.force_master_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\ORM\\Mapping\\Driver\\DriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.auto_generate_proxy_classes' => false,
            'doctrine.orm.proxy_dir' => '/home/olikids/public_html.sam/app/cache/prod/doctrine/orm/Proxies',
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'sensio_framework_extra.view.guesser.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Templating\\TemplateGuesser',
            'sensio_framework_extra.controller.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener',
            'sensio_framework_extra.routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'sensio_framework_extra.routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'sensio_framework_extra.routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'sensio_framework_extra.converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener',
            'sensio_framework_extra.converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'sensio_framework_extra.converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'sensio_framework_extra.converter.datetime.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DateTimeParamConverter',
            'sensio_framework_extra.view.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener',
            'fos_user.validator.password.class' => 'FOS\\UserBundle\\Validator\\PasswordValidator',
            'fos_user.validator.unique.class' => 'FOS\\UserBundle\\Validator\\UniqueValidator',
            'fos_user.security.interactive_login_listener.class' => 'FOS\\UserBundle\\Security\\InteractiveLoginListener',
            'fos_user.security.login_manager.class' => 'FOS\\UserBundle\\Security\\LoginManager',
            'fos_user.resetting.email.template' => 'FOSUserBundle:Resetting:email.txt.twig',
            'fos_user.registration.confirmation.template' => 'FOSUserBundle:Registration:email.txt.twig',
            'fos_user.storage' => 'orm',
            'fos_user.firewall_name' => 'main',
            'fos_user.model_manager_name' => NULL,
            'fos_user.model.user.class' => 'Application\\Sonata\\UserBundle\\Entity\\User',
            'fos_user.template.engine' => 'twig',
            'fos_user.profile.form.type' => 'application_user_profile',
            'fos_user.profile.form.validation_groups' => array(
                0 => 'ApplicationProfile',
                1 => 'Default',
            ),
            'fos_user.profile.form.name' => 'fos_user_profile_form',
            'fos_user.registration.confirmation.from_email' => array(
                'saintrain@mail.ru' => 'saintrain@mail.ru',
            ),
            'fos_user.registration.confirmation.enabled' => true,
            'fos_user.registration.form.type' => 'application_user_registration',
            'fos_user.registration.form.validation_groups' => array(
                0 => 'ApplicationRegistration',
                1 => 'Default',
            ),
            'fos_user.registration.form.name' => 'fos_user_registration_form',
            'fos_user.change_password.form.validation_groups' => array(
                0 => 'ApplicationChangePassword',
                1 => 'Default',
            ),
            'fos_user.change_password.form.type' => 'fos_user_change_password',
            'fos_user.change_password.form.name' => 'fos_user_change_password_form',
            'fos_user.resetting.email.from_email' => array(
                'saintrain@mail.ru' => 'saintrain@mail.ru',
            ),
            'fos_user.resetting.token_ttl' => 86400,
            'fos_user.resetting.form.validation_groups' => array(
                0 => 'ApplicationResetPassword',
                1 => 'Default',
            ),
            'fos_user.resetting.form.type' => 'fos_user_resetting',
            'fos_user.resetting.form.name' => 'fos_user_resetting_form',
            'sonata.admin.configuration.templates' => array(
                'history_revision_timestamp' => 'SonataIntlBundle:CRUD:history_revision_timestamp.html.twig',
                'user_block' => 'ApplicationSonataAdminBundle:Core:user_block.html.twig',
                'layout' => 'ApplicationSonataAdminBundle::layout.html.twig',
                'ajax' => 'SonataAdminBundle::ajax_layout.html.twig',
                'dashboard' => 'ApplicationSonataAdminBundle:Admin/Core:dashboard.html.twig',
                'list' => 'SonataAdminBundle:CRUD:list.html.twig',
                'show' => 'SonataAdminBundle:CRUD:show.html.twig',
                'edit' => 'ApplicationSonataAdminBundle:CRUD:edit.html.twig',
                'search' => 'SonataAdminBundle:Core:search.html.twig',
                'preview' => 'SonataAdminBundle:CRUD:preview.html.twig',
                'history' => 'SonataAdminBundle:CRUD:history.html.twig',
                'acl' => 'SonataAdminBundle:CRUD:acl.html.twig',
                'action' => 'SonataAdminBundle:CRUD:action.html.twig',
                'select' => 'SonataAdminBundle:CRUD:list__select.html.twig',
                'list_block' => 'SonataAdminBundle:Block:block_admin_list.html.twig',
                'search_result_block' => 'SonataAdminBundle:Block:block_search_result.html.twig',
                'short_object_description' => 'SonataAdminBundle:Helper:short-object-description.html.twig',
                'delete' => 'SonataAdminBundle:CRUD:delete.html.twig',
                'batch' => 'SonataAdminBundle:CRUD:list__batch.html.twig',
                'batch_confirmation' => 'SonataAdminBundle:CRUD:batch_confirmation.html.twig',
                'inner_list_row' => 'SonataAdminBundle:CRUD:list_inner_row.html.twig',
                'base_list_field' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                'pager_links' => 'SonataAdminBundle:Pager:links.html.twig',
                'pager_results' => 'SonataAdminBundle:Pager:results.html.twig',
            ),
            'sonata.admin.configuration.admin_services' => array(
            ),
            'sonata.admin.configuration.dashboard_groups' => array(
            ),
            'sonata.admin.configuration.dashboard_blocks' => array(
                0 => array(
                    'position' => 'left',
                    'type' => 'sonata.block.service.statistics',
                    'settings' => array(
                    ),
                ),
            ),
            'sonata.admin.security.acl_user_manager' => 'fos_user.user_manager',
            'sonata.admin.configuration.security.information' => array(
                'EDIT' => array(
                    0 => 'EDIT',
                ),
                'LIST' => array(
                    0 => 'LIST',
                ),
                'CREATE' => array(
                    0 => 'CREATE',
                ),
                'VIEW' => array(
                    0 => 'VIEW',
                ),
                'DELETE' => array(
                    0 => 'DELETE',
                ),
                'EXPORT' => array(
                    0 => 'EXPORT',
                ),
                'OPERATOR' => array(
                    0 => 'OPERATOR',
                ),
                'MASTER' => array(
                    0 => 'MASTER',
                ),
            ),
            'sonata.admin.configuration.security.admin_permissions' => array(
                0 => 'CREATE',
                1 => 'LIST',
                2 => 'DELETE',
                3 => 'UNDELETE',
                4 => 'EXPORT',
                5 => 'OPERATOR',
                6 => 'MASTER',
            ),
            'sonata.admin.configuration.security.object_permissions' => array(
                0 => 'VIEW',
                1 => 'EDIT',
                2 => 'DELETE',
                3 => 'UNDELETE',
                4 => 'OPERATOR',
                5 => 'MASTER',
                6 => 'OWNER',
            ),
            'sonata.admin.security.handler.noop.class' => 'Sonata\\AdminBundle\\Security\\Handler\\NoopSecurityHandler',
            'sonata.admin.security.handler.role.class' => 'Sonata\\AdminBundle\\Security\\Handler\\RoleSecurityHandler',
            'sonata.admin.security.handler.acl.class' => 'Sonata\\AdminBundle\\Security\\Handler\\AclSecurityHandler',
            'sonata.admin.security.mask.builder.class' => 'Sonata\\AdminBundle\\Security\\Acl\\Permission\\MaskBuilder',
            'sonata.admin.manipulator.acl.admin.class' => 'Sonata\\AdminBundle\\Util\\AdminAclManipulator',
            'sonata.admin.object.manipulator.acl.admin.class' => 'Sonata\\AdminBundle\\Util\\AdminObjectAclManipulator',
            'sonata.admin.extension.map' => array(
                'admins' => array(
                ),
                'excludes' => array(
                ),
                'implements' => array(
                ),
                'extends' => array(
                ),
                'instanceof' => array(
                ),
            ),
            'sonata.admin.configuration.filters.persist' => false,
            'sonata.core.flashmessage.manager.class' => 'Sonata\\CoreBundle\\FlashMessage\\FlashManager',
            'sonata.core.twig.extension.flashmessage.class' => 'Sonata\\CoreBundle\\Twig\\Extension\\FlashMessageExtension',
            'sonata.block.service.container.class' => 'Sonata\\BlockBundle\\Block\\Service\\ContainerBlockService',
            'sonata.block.service.empty.class' => 'Sonata\\BlockBundle\\Block\\Service\\EmptyBlockService',
            'sonata.block.service.text.class' => 'Sonata\\BlockBundle\\Block\\Service\\TextBlockService',
            'sonata.block.service.rss.class' => 'Sonata\\BlockBundle\\Block\\Service\\RssBlockService',
            'sonata.block.service.menu.class' => 'Sonata\\BlockBundle\\Block\\Service\\MenuBlockService',
            'sonata.block.service.template.class' => 'Sonata\\BlockBundle\\Block\\Service\\TemplateBlockService',
            'sonata.block.exception.strategy.manager.class' => 'Sonata\\BlockBundle\\Exception\\Strategy\\StrategyManager',
            'sonata.block.container.types' => array(
                0 => 'sonata.block.service.container',
                1 => 'sonata.page.block.container',
                2 => 'cmf.block.container',
                3 => 'cmf.block.slideshow',
            ),
            'sonata_block.blocks' => array(
                'sonata.admin.block.admin_list' => array(
                    'contexts' => array(
                        0 => 'admin',
                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(
                    ),
                ),
                'sonata.admin_doctrine_orm.block.audit' => array(
                    'contexts' => array(
                        0 => 'admin',
                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(
                    ),
                ),
                'sonata.block.service.text' => array(
                    'contexts' => array(
                        0 => 'cms',
                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(
                    ),
                ),
                'sonata.block.service.action' => array(
                    'contexts' => array(
                        0 => 'cms',
                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(
                    ),
                ),
                'sonata.block.service.rss' => array(
                    'contexts' => array(
                        0 => 'cms',
                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(
                    ),
                ),
                'sonata.block.service.statistics' => array(
                    'contexts' => array(
                        0 => 'cms',
                    ),
                    'cache' => 'sonata.cache.noop',
                    'settings' => array(
                    ),
                ),
            ),
            'sonata_block.blocks_by_class' => array(
            ),
            'sonata_block.cache_blocks' => array(
                'by_type' => array(
                    'sonata.admin.block.admin_list' => 'sonata.cache.noop',
                    'sonata.admin_doctrine_orm.block.audit' => 'sonata.cache.noop',
                    'sonata.block.service.text' => 'sonata.cache.noop',
                    'sonata.block.service.action' => 'sonata.cache.noop',
                    'sonata.block.service.rss' => 'sonata.cache.noop',
                    'sonata.block.service.statistics' => 'sonata.cache.noop',
                ),
            ),
            'sonata.admin.manipulator.acl.object.orm.class' => 'Sonata\\DoctrineORMAdminBundle\\Util\\ObjectAclManipulator',
            'sonata_doctrine_orm_admin.entity_manager' => NULL,
            'sonata_doctrine_orm_admin.templates' => array(
                'types' => array(
                    'list' => array(
                        'array' => 'SonataAdminBundle:CRUD:list_array.html.twig',
                        'boolean' => 'SonataAdminBundle:CRUD:list_boolean.html.twig',
                        'date' => 'SonataAdminBundle:CRUD:list_date.html.twig',
                        'time' => 'SonataAdminBundle:CRUD:list_time.html.twig',
                        'datetime' => 'SonataAdminBundle:CRUD:list_datetime.html.twig',
                        'text' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'textarea' => 'SonataAdminBundle:CRUD:list_string.html.twig',
                        'email' => 'SonataAdminBundle:CRUD:list_string.html.twig',
                        'trans' => 'SonataAdminBundle:CRUD:list_trans.html.twig',
                        'string' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'smallint' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'bigint' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'integer' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'decimal' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'identifier' => 'SonataAdminBundle:CRUD:base_list_field.html.twig',
                        'currency' => 'SonataIntlBundle:CRUD:list_currency.html.twig',
                        'percent' => 'SonataIntlBundle:CRUD:list_percent.html.twig',
                        'choice' => 'SonataAdminBundle:CRUD:list_choice.html.twig',
                        'url' => 'SonataAdminBundle:CRUD:list_url.html.twig',
                    ),
                    'show' => array(
                        'array' => 'SonataAdminBundle:CRUD:show_array.html.twig',
                        'boolean' => 'SonataAdminBundle:CRUD:show_boolean.html.twig',
                        'date' => 'SonataAdminBundle:CRUD:show_date.html.twig',
                        'time' => 'SonataAdminBundle:CRUD:show_time.html.twig',
                        'datetime' => 'SonataAdminBundle:CRUD:show_datetime.html.twig',
                        'text' => 'SonataAdminBundle:CRUD:base_show_field.html.twig',
                        'trans' => 'SonataAdminBundle:CRUD:show_trans.html.twig',
                        'string' => 'SonataAdminBundle:CRUD:base_show_field.html.twig',
                        'smallint' => 'SonataAdminBundle:CRUD:base_show_field.html.twig',
                        'bigint' => 'SonataAdminBundle:CRUD:base_show_field.html.twig',
                        'integer' => 'SonataAdminBundle:CRUD:base_show_field.html.twig',
                        'decimal' => 'SonataAdminBundle:CRUD:base_show_field.html.twig',
                        'currency' => 'SonataIntlBundle:CRUD:show_currency.html.twig',
                        'percent' => 'SonataIntlBundle:CRUD:show_percent.html.twig',
                        'choice' => 'SonataAdminBundle:CRUD:show_choice.html.twig',
                        'url' => 'SonataAdminBundle:CRUD:show_url.html.twig',
                    ),
                ),
                'form' => array(
                    0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig',
                ),
                'filter' => array(
                    0 => 'SonataDoctrineORMAdminBundle:Form:form_admin_fields.html.twig',
                ),
            ),
            'sonata.formatter.text.markdown.class' => 'Sonata\\FormatterBundle\\Formatter\\MarkdownFormatter',
            'sonata.formatter.text.text.class' => 'Sonata\\FormatterBundle\\Formatter\\TextFormatter',
            'sonata.formatter.text.raw.class' => 'Sonata\\FormatterBundle\\Formatter\\RawFormatter',
            'sonata.formatter.text.twigengine.class' => 'Sonata\\FormatterBundle\\Formatter\\TwigFormatter',
            'sonata.formatter.block.formatter.class' => 'Sonata\\FormatterBundle\\Block\\FormatterBlockService',
            'sonata.formatter.ckeditor.configuration.templates' => array(
                'browser' => 'SonataFormatterBundle:Ckeditor:browser.html.twig',
                'upload' => 'SonataFormatterBundle:Ckeditor:upload.html.twig',
            ),
            'ivory_ck_editor.form.type.class' => 'Ivory\\CKEditorBundle\\Form\\Type\\CKEditorType',
            'ivory_ck_editor.config_manager.class' => 'Ivory\\CKEditorBundle\\Model\\ConfigManager',
            'ivory_ck_editor.plugin_manager.class' => 'Ivory\\CKEditorBundle\\Model\\PluginManager',
            'ivory_ck_editor.styles_set_manager.class' => 'Ivory\\CKEditorBundle\\Model\\StylesSetManager',
            'ivory_ck_editor.template_manager.class' => 'Ivory\\CKEditorBundle\\Model\\TemplateManager',
            'ivory_ck_editor.templating.helper.class' => 'Ivory\\CKEditorBundle\\Templating\\CKEditorHelper',
            'ivory_ck_editor.twig_extension.class' => 'Ivory\\CKEditorBundle\\Twig\\CKEditorExtension',
            'ivory_ck_editor.form.type.enable' => true,
            'ivory_ck_editor.form.type.autoload' => true,
            'ivory_ck_editor.form.type.base_path' => 'bundles/ivoryckeditor/',
            'ivory_ck_editor.form.type.js_path' => 'bundles/ivoryckeditor/ckeditor.js',
            'elfinder.loader' => 'FM\\ElfinderBundle\\Loader\\FMElfinderLoader',
            'fm_elfinder' => array(
                'locale' => 'ru',
                'editor' => 'ckeditor',
                'fullscreen' => true,
                'include_assets' => true,
                'compression' => false,
                'connector' => array(
                    'debug' => false,
                    'roots' => array(
                        'uploads' => array(
                            'driver' => 'LocalFileSystem',
                            'path' => 'uploads/files',
                            'upload_allow' => array(
                                0 => 'image/png',
                                1 => 'image/jpg',
                                2 => 'image/jpeg',
                                3 => 'text/xml',
                                4 => 'text/plain',
                                5 => 'application/msword',
                                6 => 'video/mpeg',
                                7 => 'video/mp4',
                                8 => 'video/ogg',
                                9 => 'video/quicktime',
                                10 => 'video/webm',
                                11 => 'video/x-ms-wmv',
                                12 => 'video/x-flv',
                            ),
                            'upload_deny' => array(
                                0 => 'all',
                            ),
                            'upload_max_size' => '100M',
                            'showhidden' => false,
                            'relative_url' => false,
                        ),
                    ),
                ),
                'tinymce_popup_path' => '',
            ),
            'templating.helper.markdown.class' => 'Knp\\Bundle\\MarkdownBundle\\Helper\\MarkdownHelper',
            'knp_menu.factory.class' => 'Knp\\Menu\\MenuFactory',
            'knp_menu.factory_extension.routing.class' => 'Knp\\Menu\\Integration\\Symfony\\RoutingExtension',
            'knp_menu.helper.class' => 'Knp\\Menu\\Twig\\Helper',
            'knp_menu.matcher.class' => 'Knp\\Menu\\Matcher\\Matcher',
            'knp_menu.menu_provider.chain.class' => 'Knp\\Menu\\Provider\\ChainProvider',
            'knp_menu.menu_provider.container_aware.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\ContainerAwareProvider',
            'knp_menu.menu_provider.builder_alias.class' => 'Knp\\Bundle\\MenuBundle\\Provider\\BuilderAliasProvider',
            'knp_menu.renderer_provider.class' => 'Knp\\Bundle\\MenuBundle\\Renderer\\ContainerAwareProvider',
            'knp_menu.renderer.list.class' => 'Knp\\Menu\\Renderer\\ListRenderer',
            'knp_menu.renderer.list.options' => array(
            ),
            'knp_menu.listener.voters.class' => 'Knp\\Bundle\\MenuBundle\\EventListener\\VoterInitializerListener',
            'knp_menu.voter.router.class' => 'Knp\\Menu\\Matcher\\Voter\\RouteVoter',
            'knp_menu.twig.extension.class' => 'Knp\\Menu\\Twig\\MenuExtension',
            'knp_menu.renderer.twig.class' => 'Knp\\Menu\\Renderer\\TwigRenderer',
            'knp_menu.renderer.twig.options' => array(
            ),
            'knp_menu.renderer.twig.template' => 'knp_menu.html.twig',
            'knp_menu.default_renderer' => 'twig',
            'sonata.user.admin.user.class' => 'Application\\Sonata\\UserBundle\\Admin\\UserAdmin',
            'sonata.user.admin.group.class' => 'Application\\Sonata\\UserBundle\\Admin\\GroupAdmin',
            'sonata.user.admin.user.entity' => 'Application\\Sonata\\UserBundle\\Entity\\User',
            'sonata.user.admin.group.entity' => 'Application\\Sonata\\UserBundle\\Entity\\Group',
            'sonata.user.admin.user.translation_domain' => 'SonataUserBundle',
            'sonata.user.admin.group.translation_domain' => 'SonataUserBundle',
            'sonata.user.admin.user.controller' => 'SonataAdminBundle:CRUD',
            'sonata.user.admin.group.controller' => 'SonataAdminBundle:CRUD',
            'sonata.user.impersonating' => false,
            'sonata.user.google.authenticator.enabled' => false,
            'sonata.user.profile.form.type' => 'sonata_user_profile',
            'sonata.user.profile.form.name' => 'sonata_user_profile_form',
            'sonata.user.profile.form.validation_groups' => array(
                0 => 'Profile',
                1 => 'Default',
            ),
            'sonata.user.register.confirm.redirect_route' => 'sonata_user_profile_show',
            'sonata.user.register.confirm.redirect_route_params' => array(
            ),
            'sonata.user.configuration.profile_blocks' => array(
                0 => array(
                    'position' => 'left',
                    'settings' => array(
                        'content' => '<h2>Welcome!</h2> This is a sample user profile dashboard, feel free to override it in the configuration!',
                    ),
                    'type' => 'sonata.block.service.text',
                ),
            ),
            'simplethings.entityaudit.audited_entities' => array(
                0 => 'Core\\ProductBundle\\Entity\\CommonProduct',
                1 => 'Core\\ProductBundle\\Entity\\Product',
                2 => 'Core\\ProductBundle\\Entity\\DigitalProduct',
                3 => 'Core\\ProductBundle\\Entity\\ServiceProduct',
                4 => 'Core\\ProductBundle\\Entity\\CompositeProduct',
                5 => 'Application\\Sonata\\UserBundle\\Entity\\LegalContragent',
                6 => 'Application\\Sonata\\UserBundle\\Entity\\IndiContragent',
                7 => 'Core\\FileBundle\\Entity\\CommonFile',
                8 => 'Core\\FileBundle\\Entity\\ImageFile',
                9 => 'Core\\FileBundle\\Entity\\DocumentFile',
                10 => 'Core\\UnionBundle\\Entity\\ProductSimilarsUnion',
                11 => 'Core\\UnionBundle\\Entity\\ProductAccessoriesUnion',
                12 => 'Core\\UnionBundle\\Entity\\ProductAlternativeUnion',
                13 => 'Core\\UnionBundle\\Entity\\ProductServicesUnion',
                14 => 'Core\\DirectoryBundle\\Entity\\RemoteVideo',
                15 => 'Core\\LogisticsBundle\\Entity\\ProductAvailability',
                16 => 'Core\\ProductBundle\\Entity\\CommonProductModification',
                17 => 'Application\\Sonata\\UserBundle\\Entity\\CommonContragent',
                18 => 'Application\\Sonata\\UserBundle\\Entity\\User',
                19 => 'Application\\Sonata\\UserBundle\\Entity\\Group',
                21 => 'Core\\CategoryBundle\\Entity\\ProductCategory',
                22 => 'Core\\CategoryBundle\\Entity\\ProductVirtualCategory',
                23 => 'Core\\PropertyBundle\\Entity\\DataProperty',
                24 => 'Core\\PropertyBundle\\Entity\\ProductDataProperty',
                25 => 'Core\\DirectoryBundle\\Entity\\Country',
                26 => 'Core\\DirectoryBundle\\Entity\\Region',
                27 => 'Core\\DirectoryBundle\\Entity\\City',
                28 => 'Core\\DirectoryBundle\\Entity\\GeoCity',
                30 => 'Core\\DirectoryBundle\\Entity\\VideoHosting',
                31 => 'Core\\DirectoryBundle\\Entity\\ProductTags',
                32 => 'Core\\DirectoryBundle\\Entity\\UnitOfMeasure',
                33 => 'Core\\DirectoryBundle\\Entity\\UnitOfMeasureGroup',
                34 => 'Core\\TroubleTicketBundle\\Entity\\TroubleTicket',
                35 => 'Core\\UnionBundle\\Entity\\ProductQuantityAlternativeUnion',
                36 => 'Core\\OrderBundle\\Entity\\Order',
                37 => 'Core\\OrderBundle\\Entity\\Waybills',
                38 => 'Core\\OrderBundle\\Entity\\SizesOfBox',
                39 => 'Core\\OrderBundle\\Entity\\Composition',
                40 => 'Core\\OrderBundle\\Entity\\ExtraStatus',
                41 => 'Core\\OrderBundle\\Entity\\CanceledReason',
                42 => 'Core\\OrderBundle\\Entity\\PreOrder\\PreOrder',
                43 => 'Core\\DiscountsBundle\\Entity\\ManufacturerDiscount',
                44 => 'Core\\DiscountsBundle\\Entity\\ManufacturerStepValues',
                45 => 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerDiscount',
                46 => 'Core\\DiscountsBundle\\Entity\\ContragentManufacturerStepValues',
                47 => 'Core\\LogisticsBundle\\Entity\\Bank',
                48 => 'Core\\LogisticsBundle\\Entity\\Seller',
                49 => 'Core\\LogisticsBundle\\Entity\\Supplier',
                50 => 'Core\\LogisticsBundle\\Entity\\Supply',
                51 => 'Core\\LogisticsBundle\\Entity\\ProductInSupply',
                52 => 'Core\\LogisticsBundle\\Entity\\UnitInStock',
                53 => 'Core\\LogisticsBundle\\Entity\\Transit',
                54 => 'Core\\LogisticsBundle\\Entity\\TransitStatus',
                55 => 'Core\\LogisticsBundle\\Entity\\SupplyStatus',
                56 => 'Core\\LogisticsBundle\\Entity\\Stock',
                57 => 'Core\\LogisticsBundle\\Entity\\ProductInTransit',
                58 => 'Core\\LogisticsBundle\\Entity\\UnitSerials',
                59 => 'Core\\LogisticsBundle\\Entity\\UnitInStockDefectReason',
                60 => 'Core\\LogisticsBundle\\Entity\\AdditionalCostsOfSupply',
                61 => 'Core\\DeliveryBundle\\Entity\\Company',
                62 => 'Core\\DeliveryBundle\\Entity\\Service',
                63 => 'Core\\DeliveryBundle\\Entity\\Address',
                64 => 'Core\\DeliveryBundle\\Entity\\ServiceType',
                65 => 'Core\\ManufacturerBundle\\Entity\\Manufacturer',
                66 => 'Core\\ManufacturerBundle\\Entity\\Series',
                67 => 'Core\\ManufacturerBundle\\Entity\\Brand',
                70 => 'Core\\ColorBundle\\Entity\\Color',
                71 => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\CommonPaymentSystem',
                72 => 'Core\\PaymentBundle\\Entity\\PaymentSystem\\RobokassaSubsystem',
                73 => 'Core\\PaymentBundle\\Entity\\Payment',
                74 => 'Core\\ReviewBundle\\Entity\\Review',
                75 => 'Core\\HolidayBundle\\Entity\\Holiday',
            ),
            'simplethings.entityaudit.table_prefix' => '',
            'simplethings.entityaudit.table_suffix' => '_audit',
            'simplethings.entityaudit.revision_field_name' => 'rev',
            'simplethings.entityaudit.revision_type_field_name' => 'revtype',
            'simplethings.entityaudit.revision_table_name' => 'revisions',
            'simplethings.entityaudit.revision_id_field_type' => 'integer',
            'doctrine_migrations.dir_name' => '/home/olikids/public_html.sam/app/DoctrineMigrations',
            'doctrine_migrations.namespace' => 'Application\\Migrations',
            'doctrine_migrations.table_name' => 'migration_versions',
            'doctrine_migrations.name' => 'Application Migrations',
            'stof_doctrine_extensions.event_listener.locale.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\LocaleListener',
            'stof_doctrine_extensions.event_listener.logger.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\LoggerListener',
            'stof_doctrine_extensions.event_listener.blame.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\BlameListener',
            'stof_doctrine_extensions.uploadable.manager.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadableManager',
            'stof_doctrine_extensions.uploadable.mime_type_guesser.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\MimeTypeGuesserAdapter',
            'stof_doctrine_extensions.uploadable.default_file_info.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo',
            'stof_doctrine_extensions.default_locale' => 'ru',
            'stof_doctrine_extensions.default_file_path' => '/home/olikids/public_html.sam/app/../web/uploads',
            'stof_doctrine_extensions.translation_fallback' => false,
            'stof_doctrine_extensions.persist_default_translation' => false,
            'stof_doctrine_extensions.skip_translation_on_load' => false,
            'stof_doctrine_extensions.uploadable.validate_writable_directory' => true,
            'stof_doctrine_extensions.listener.translatable.class' => 'Gedmo\\Translatable\\TranslatableListener',
            'stof_doctrine_extensions.listener.timestampable.class' => 'Gedmo\\Timestampable\\TimestampableListener',
            'stof_doctrine_extensions.listener.blameable.class' => 'Gedmo\\Blameable\\BlameableListener',
            'stof_doctrine_extensions.listener.sluggable.class' => 'Gedmo\\Sluggable\\SluggableListener',
            'stof_doctrine_extensions.listener.tree.class' => 'Gedmo\\Tree\\TreeListener',
            'stof_doctrine_extensions.listener.loggable.class' => 'Gedmo\\Loggable\\LoggableListener',
            'stof_doctrine_extensions.listener.sortable.class' => 'Gedmo\\Sortable\\SortableListener',
            'stof_doctrine_extensions.listener.softdeleteable.class' => 'Gedmo\\SoftDeleteable\\SoftDeleteableListener',
            'stof_doctrine_extensions.listener.uploadable.class' => 'Gedmo\\Uploadable\\UploadableListener',
            'stof_doctrine_extensions.listener.reference_integrity.class' => 'Gedmo\\ReferenceIntegrity\\ReferenceIntegrityListener',
            'knp_paginator.class' => 'Knp\\Component\\Pager\\Paginator',
            'knp_paginator.templating.helper.pagination.class' => 'Knp\\Bundle\\PaginatorBundle\\Templating\\PaginationHelper',
            'knp_paginator.helper.processor.class' => 'Knp\\Bundle\\PaginatorBundle\\Helper\\Processor',
            'knp_paginator.template.pagination' => 'KnpPaginatorBundle:Pagination:sliding.html.twig',
            'knp_paginator.template.filtration' => 'KnpPaginatorBundle:Pagination:filtration.html.twig',
            'knp_paginator.template.sortable' => 'KnpPaginatorBundle:Pagination:sortable_link.html.twig',
            'knp_paginator.page_range' => 5,
            'jms_aop.cache_dir' => '/home/olikids/public_html.sam/app/cache/prod/jms_aop',
            'jms_aop.interceptor_loader.class' => 'JMS\\AopBundle\\Aop\\InterceptorLoader',
            'security.secured_services' => array(
            ),
            'security.access.method_interceptor.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Interception\\MethodSecurityInterceptor',
            'security.access.method_access_control' => array(
            ),
            'security.access.remembering_access_decision_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RememberingAccessDecisionManager',
            'security.access.run_as_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RunAsManager',
            'security.authentication.provider.run_as.class' => 'JMS\\SecurityExtraBundle\\Security\\Authentication\\Provider\\RunAsAuthenticationProvider',
            'security.run_as.key' => 'RunAsToken',
            'security.run_as.role_prefix' => 'ROLE_',
            'security.access.after_invocation_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AfterInvocationManager',
            'security.access.after_invocation.acl_provider.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AclAfterInvocationProvider',
            'security.access.iddqd_voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Voter\\IddqdVoter',
            'security.extra.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'security.extra.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'security.extra.driver_chain.class' => 'Metadata\\Driver\\DriverChain',
            'security.extra.annotation_driver.class' => 'JMS\\SecurityExtraBundle\\Metadata\\Driver\\AnnotationDriver',
            'security.extra.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'security.access.secure_all_services' => false,
            'security.extra.cache_dir' => '/home/olikids/public_html.sam/app/cache/prod/jms_security',
            'security.authenticated_voter.disabled' => false,
            'security.role_voter.disabled' => false,
            'security.acl_voter.disabled' => false,
            'security.extra.iddqd_ignore_roles' => array(
                0 => 'ROLE_PREVIOUS_ADMIN',
            ),
            'security.iddqd_aliases' => array(
            ),
            'jms_di_extra.metadata.driver.annotation_driver.class' => 'JMS\\DiExtraBundle\\Metadata\\Driver\\AnnotationDriver',
            'jms_di_extra.metadata.driver.configured_controller_injections.class' => 'JMS\\DiExtraBundle\\Metadata\\Driver\\ConfiguredControllerInjectionsDriver',
            'jms_di_extra.metadata.driver.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'jms_di_extra.metadata.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'jms_di_extra.metadata.cache.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'jms_di_extra.metadata.converter.class' => 'JMS\\DiExtraBundle\\Metadata\\MetadataConverter',
            'jms_di_extra.controller_resolver.class' => 'JMS\\DiExtraBundle\\HttpKernel\\ControllerResolver',
            'jms_di_extra.controller_injectors_warmer.class' => 'JMS\\DiExtraBundle\\HttpKernel\\ControllerInjectorsWarmer',
            'jms_di_extra.all_bundles' => false,
            'jms_di_extra.bundles' => array(
            ),
            'jms_di_extra.directories' => array(
            ),
            'jms_di_extra.cache_dir' => '/home/olikids/public_html.sam/app/cache/prod/jms_diextra',
            'jms_di_extra.disable_grep' => true,
            'jms_di_extra.doctrine_integration' => false,
            'jms_di_extra.cache_warmer.controller_file_blacklist' => array(
            ),
            'jms_i18n_routing.router.class' => 'JMS\\I18nRoutingBundle\\Router\\I18nRouter',
            'jms_i18n_routing.locale_resolver.class' => 'JMS\\I18nRoutingBundle\\Router\\DefaultLocaleResolver',
            'jms_i18n_routing.loader.class' => 'JMS\\I18nRoutingBundle\\Router\\I18nLoader',
            'jms_i18n_routing.route_exclusion_strategy.class' => 'JMS\\I18nRoutingBundle\\Router\\DefaultRouteExclusionStrategy',
            'jms_i18n_routing.pattern_generation_strategy.class' => 'JMS\\I18nRoutingBundle\\Router\\DefaultPatternGenerationStrategy',
            'jms_i18n_routing.locale_choosing_listener.class' => 'JMS\\I18nRoutingBundle\\EventListener\\LocaleChoosingListener',
            'jms_i18n_routing.cookie_setting_listener.class' => 'JMS\\I18nRoutingBundle\\EventListener\\CookieSettingListener',
            'jms_i18n_routing.route_translation_extractor.class' => 'JMS\\I18nRoutingBundle\\Translation\\RouteTranslationExtractor',
            'jms_i18n_routing.default_locale' => 'ru',
            'jms_i18n_routing.locales' => array(
                0 => 'ru',
            ),
            'jms_i18n_routing.catalogue' => 'routes',
            'jms_i18n_routing.strategy' => 'custom',
            'jms_i18n_routing.redirect_to_host' => true,
            'jms_i18n_routing.cookie.name' => 'hl',
            'jms_i18n_routing.hostmap' => array(
                'ru' => 'www.olikids-sam.ru.vm',
            ),
            'core_file' => array(
                'root_dir' => '/home/olikids/public_html.sam/app',
                'temp_dir' => '/home/olikids/public_html.sam/app/cache/prod/core_file',
                'web_dir' => 'web',
                'upload_dir' => 'uploads',
                'no_image_src' => 'images/image_not_found/no-image.jpg',
                'detect_dominant_color' => true,
                'thumbnail_crop' => false,
                'thumbnail_backgrond_color' => '#fff',
                'image' => array(
                    'Core\\ProductBundle\\Entity\\CommonProduct' => array(
                        'images' => array(
                            'dir' => 'product',
                            'file_size' => 10,
                            'max_count_files' => 30,
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                            'prefix_preview_in_admin' => '100x100_',
                            'watermark' => array(
                                'enable' => true,
                                'url' => '/images/watertmark.png',
                                'top' => 50,
                                'left' => 50,
                            ),
                            'options' => array(
                                'original' => array(
                                    'uploaded_file_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    '64x64_' => array(
                                        'size' => array(
                                            'w' => 64,
                                            'h' => 64,
                                        ),
                                    ),
                                    '100x100_' => array(
                                        'size' => array(
                                            'w' => 100,
                                            'h' => 100,
                                        ),
                                    ),
                                    '222x222_' => array(
                                        'size' => array(
                                            'w' => 222,
                                            'h' => 222,
                                        ),
                                    ),
                                    '140x140_' => array(
                                        'size' => array(
                                            'w' => 140,
                                            'h' => 140,
                                        ),
                                    ),
                                    '400x400_' => array(
                                        'size' => array(
                                            'w' => 400,
                                            'h' => 400,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'Core\\ManufacturerBundle\\Entity\\Brand' => array(
                        'logo' => array(
                            'dir' => 'brand',
                            'file_size' => 5,
                            'max_count_files' => 1,
                            'prefix_preview_in_admin' => '148x70_',
                            'options' => array(
                                'original' => array(
                                    'original_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    '300x150_' => array(
                                        'size' => array(
                                            'w' => 300,
                                            'h' => 150,
                                        ),
                                    ),
                                    '148x70_' => array(
                                        'size' => array(
                                            'w' => 148,
                                            'h' => 70,
                                        ),
                                    ),
                                ),
                            ),
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                        'substrate' => array(
                            'dir' => 'manufacturer',
                            'file_size' => 5,
                            'max_count_files' => 1,
                            'prefix_preview_in_admin' => '178x60_',
                            'options' => array(
                                'original' => array(
                                    'original_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    '178x60_' => array(
                                        'size' => array(
                                            'w' => 178,
                                            'h' => 60,
                                        ),
                                    ),
                                    '712x240_' => array(
                                        'size' => array(
                                            'w' => 712,
                                            'h' => 240,
                                        ),
                                    ),
                                ),
                            ),
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                    ),
                    'Core\\ManufacturerBundle\\Entity\\Manufacturer' => array(
                        'logo' => array(
                            'dir' => 'manufacturer',
                            'file_size' => 5,
                            'max_count_files' => 1,
                            'prefix_preview_in_admin' => '148x70_',
                            'options' => array(
                                'original' => array(
                                    'original_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    '300x150_' => array(
                                        'size' => array(
                                            'w' => 300,
                                            'h' => 150,
                                        ),
                                    ),
                                    '148x70_' => array(
                                        'size' => array(
                                            'w' => 148,
                                            'h' => 70,
                                        ),
                                    ),
                                ),
                            ),
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                    ),
                    'Core\\ManufacturerBundle\\Entity\\Certificate' => array(
                        'logo' => array(
                            'dir' => 'certificate',
                            'file_size' => 5,
                            'max_count_files' => 1,
                            'prefix_preview_in_admin' => '300x300_',
                            'options' => array(
                                'original' => array(
                                    'original_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    '300x300_' => array(
                                        'size' => array(
                                            'w' => 300,
                                            'h' => 300,
                                        ),
                                    ),
                                ),
                            ),
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                    ),
                    'Core\\LogisticsBundle\\Entity\\Seller' => array(
                        'imageSign' => array(
                            'dir' => 'seller',
                            'prefix_preview_in_admin' => 'small',
                            'options' => array(
                                'original' => array(
                                    'uploaded_file_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    'small' => array(
                                        'size' => array(
                                            'w' => 80,
                                            'h' => 80,
                                        ),
                                    ),
                                ),
                            ),
                            'file_size' => 50,
                            'max_count_files' => 100,
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                        'imageSignOfAccountant' => array(
                            'dir' => 'seller',
                            'prefix_preview_in_admin' => 'small',
                            'options' => array(
                                'original' => array(
                                    'uploaded_file_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    'small' => array(
                                        'size' => array(
                                            'w' => 80,
                                            'h' => 80,
                                        ),
                                    ),
                                ),
                            ),
                            'file_size' => 50,
                            'max_count_files' => 100,
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                        'imageStamp' => array(
                            'dir' => 'seller',
                            'prefix_preview_in_admin' => 'small2',
                            'options' => array(
                                'original' => array(
                                    'uploaded_file_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    'small2' => array(
                                        'size' => array(
                                            'w' => 150,
                                            'h' => 150,
                                        ),
                                    ),
                                ),
                            ),
                            'file_size' => 50,
                            'max_count_files' => 100,
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                        'imageSignAndStamp' => array(
                            'dir' => 'seller',
                            'prefix_preview_in_admin' => 'small3',
                            'options' => array(
                                'original' => array(
                                    'uploaded_file_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    'small3' => array(
                                        'size' => array(
                                            'w' => 190,
                                            'h' => 190,
                                        ),
                                    ),
                                ),
                            ),
                            'file_size' => 50,
                            'max_count_files' => 100,
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                    ),
                    'Core\\ReviewBundle\\Entity\\Review' => array(
                        'photos' => array(
                            'dir' => 'reviews',
                            'file_size' => 5,
                            'max_count_files' => 10,
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                            'prefix_preview_in_admin' => '100x100_',
                            'options' => array(
                                'original' => array(
                                    'uploaded_file_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'watermark' => array(
                                    'watermark_' => array(
                                        'size' => array(
                                            'w' => 1280,
                                            'h' => 720,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    '35x35_' => array(
                                        'size' => array(
                                            'w' => 35,
                                            'h' => 35,
                                        ),
                                    ),
                                    '100x100_' => array(
                                        'size' => array(
                                            'w' => 100,
                                            'h' => 100,
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'Core\\HolidayBundle\\Entity\\Holiday' => array(
                        'logo' => array(
                            'dir' => 'logos',
                            'file_size' => 5,
                            'max_count_files' => 1,
                            'prefix_preview_in_admin' => 'holiday_',
                            'options' => array(
                                'original' => array(
                                    'original_' => array(
                                        'size' => array(
                                            'w' => NULL,
                                            'h' => NULL,
                                        ),
                                    ),
                                ),
                                'preview' => array(
                                    'holiday_' => array(
                                        'size' => array(
                                            'w' => 240,
                                            'h' => 104,
                                        ),
                                    ),
                                ),
                            ),
                            'mime_types' => array(
                                0 => 'image/*',
                            ),
                        ),
                    ),
                ),
                'document' => array(
                    'Core\\LogisticsBundle\\Entity\\SupplierPriceAnalysis' => array(
                        'priceFile' => array(
                            'dir' => 'price_analysis',
                            'file_size' => 10,
                            'max_count_files' => 1,
                            'mime_types' => array(
                                0 => 'application/vnd.ms-excel',
                            ),
                        ),
                    ),
                    'Core\\OrderBundle\\Entity\\Order' => array(
                        'documentScans' => array(
                            'dir' => 'document_scans',
                            'file_size' => 2,
                            'max_count_files' => 4,
                            'mime_types' => array(
                                0 => 'application/pdf',
                                1 => 'image/jpeg',
                                2 => 'image/png',
                                3 => 'application/msword',
                            ),
                        ),
                    ),
                    'Core\\ProductBundle\\Entity\\CommonProduct' => array(
                        'instruction' => array(
                            'dir' => 'product',
                            'file_size' => 5,
                            'max_count_files' => 10,
                            'mime_types' => array(
                                0 => 'application/*',
                                1 => 'text/*',
                            ),
                        ),
                    ),
                    'Core\\TroubleTicketBundle\\Entity\\TroubleTicket' => array(
                        'file' => array(
                            'dir' => 'trouble_ticket',
                            'file_size' => 5,
                            'max_count_files' => 10,
                            'mime_types' => array(
                                0 => 'application/*',
                                1 => 'image/*',
                            ),
                        ),
                    ),
                    'Core\\ManufacturerBundle\\Entity\\Certificate' => array(
                        'document' => array(
                            'dir' => 'certificate',
                            'file_size' => 50,
                            'max_count_files' => 1,
                            'mime_types' => array(
                                0 => 'application/*',
                                1 => 'image/*',
                            ),
                        ),
                    ),
                    'Core\\ReviewBundle\\Entity\\Review' => array(
                        'videos' => array(
                            'dir' => 'reviews',
                            'file_size' => 50,
                            'max_count_files' => 5,
                            'mime_types' => array(
                                0 => 'video/*',
                                1 => 'image/*',
                            ),
                        ),
                    ),
                ),
            ),
            'core_language' => array(
                'cases' => array(
                    'Ru' => array(
                        'genitive' => array(
                            'caption' => 'Родительный',
                            'help' => 'Кого? Чего?',
                        ),
                        'dative' => array(
                            'caption' => 'Дательный',
                            'help' => 'Кому? Чему?',
                        ),
                        'accusative' => array(
                            'caption' => 'Винительный',
                            'help' => 'Кого? Что?',
                        ),
                        'ablative' => array(
                            'caption' => 'Творительный',
                            'help' => 'Кем? Чем?',
                        ),
                        'prepositional' => array(
                            'caption' => 'Предложный',
                            'help' => 'О ком? О чём? В ком? В чём? Где?',
                        ),
                    ),
                ),
                'languages' => array(
                    'Ru' => array(
                        'caption' => 'Русский',
                    ),
                ),
                'default' => 'Ru',
                'classId' => 'translatedField',
                'active' => 'Ru',
            ),
            'gregwar_captcha.captcha_type.class' => 'Gregwar\\CaptchaBundle\\Type\\CaptchaType',
            'gregwar_captcha.captcha_generator.class' => 'Gregwar\\CaptchaBundle\\Generator\\CaptchaGenerator',
            'gregwar_captcha.image_file_handler.class' => 'Gregwar\\CaptchaBundle\\Generator\\ImageFileHandler',
            'gregwar_captcha.captcha_builder.class' => 'Gregwar\\Captcha\\CaptchaBuilder',
            'gregwar_captcha.phrase_builder.class' => 'Gregwar\\Captcha\\PhraseBuilder',
            'gregwar_captcha.config' => array(
                'as_url' => true,
                'reload' => true,
                'width' => 99,
                'height' => 40,
                'length' => 5,
                'background_color' => array(
                    0 => 255,
                    1 => 255,
                    2 => 255,
                ),
                'interpolation' => NULL,
                'distortion' => NULL,
                'quality' => 70,
                'gc_freq' => 10,
                'max_front_lines' => 0,
                'max_behind_lines' => 0,
                'font' => '/home/olikids/public_html.sam/vendor/gregwar/captcha-bundle/Gregwar/CaptchaBundle/DependencyInjection/../Generator/Font/captcha.ttf',
                'keep_value' => false,
                'charset' => 'abcdefhjkmnprstuvwxyz23456789',
                'as_file' => false,
                'image_folder' => 'captcha',
                'web_path' => '/home/olikids/public_html.sam/app/../web',
                'expiration' => 60,
                'invalid_message' => 'Bad code value',
                'bypass_code' => NULL,
                'whitelist_key' => 'captcha_whitelist_key',
                'humanity' => 0,
                'text_color' => array(
                ),
                'disabled' => false,
            ),
            'gregwar_captcha.config.image_folder' => 'captcha',
            'gregwar_captcha.config.web_path' => '/home/olikids/public_html.sam/app/../web',
            'gregwar_captcha.config.gc_freq' => 10,
            'gregwar_captcha.config.expiration' => 60,
            'gregwar_captcha.config.whitelist_key' => 'captcha_whitelist_key',
            'sonata.intl.locale_detector.request.class' => 'Sonata\\IntlBundle\\Locale\\RequestDetector',
            'sonata.intl.locale_detector.session.class' => 'Sonata\\IntlBundle\\Locale\\SessionDetector',
            'sonata.intl.templating.helper.locale.class' => 'Sonata\\IntlBundle\\Templating\\Helper\\LocaleHelper',
            'sonata.intl.templating.helper.number.class' => 'Sonata\\IntlBundle\\Templating\\Helper\\NumberHelper',
            'sonata.intl.templating.helper.datetime.class' => 'Sonata\\IntlBundle\\Templating\\Helper\\DateTimeHelper',
            'sonata.intl.timezone_detector.chain.class' => 'Sonata\\IntlBundle\\Timezone\\ChainTimezoneDetector',
            'sonata.intl.timezone_detector.user.class' => 'Sonata\\IntlBundle\\Timezone\\UserBasedTimezoneDetector',
            'sonata.intl.timezone_detector.locale.class' => 'Sonata\\IntlBundle\\Timezone\\LocaleBasedTimezoneDetector',
            'sonata.intl.twig.helper.locale.class' => 'Sonata\\IntlBundle\\Twig\\Extension\\LocaleExtension',
            'sonata.intl.twig.helper.number.class' => 'Sonata\\IntlBundle\\Twig\\Extension\\NumberExtension',
            'sonata.intl.twig.helper.datetime.class' => 'Sonata\\IntlBundle\\Twig\\Extension\\DateTimeExtension',
            'sonata_intl.timezone.detectors' => array(
                0 => 'sonata.intl.timezone_detector.user',
                1 => 'sonata.intl.timezone_detector.locale',
            ),
            'core_delivery.cdek.options' => array(
                'getCities' => array(
                    'uri' => 'http://gw.edostavka.ru:11443/pvzlist.php',
                ),
                'getAffiliates' => array(
                    'uri' => 'http://gw.edostavka.ru:11443/pvzlist.php',
                ),
                'calculate' => array(
                    'uri' => 'http://api.edostavka.ru/calculator/calculate_price_by_json_request.php',
                ),
                'trackPackage' => array(
                    'uri' => 'http://gw.edostavka.ru:11443/status_report_h.php',
                ),
                'getInvoice' => array(
                    'uri' => 'http://gw.edostavka.ru:11443/orders_print.php',
                ),
                'createOrder' => array(
                    'uri' => 'http://gw.edostavka.ru:11443/new_orders.php',
                ),
                'cancelOrder' => array(
                    'uri' => 'http://gw.edostavka.ru:11443/delete_orders.php',
                ),
            ),
            'core_delivery.cdek.extraservices' => array(
                'fitting_home' => array(
                    'id' => '30',
                    'name' => 'Примерка на дому',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'npp' => array(
                    'id' => 'НПП',
                    'name' => 'Наложенный платеж',
                    'cost' => '1',
                    'isActive' => false,
                ),
                'partial_delivery' => array(
                    'id' => '36',
                    'name' => 'Частичная доставка',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'delivery_day_off' => array(
                    'id' => '3',
                    'name' => 'Доставка в выходной день',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'fence_in_the_sender' => array(
                    'id' => '16',
                    'name' => 'Забор в городе отправителя',
                    'cost' => '0',
                    'isActive' => false,
                ),
                'delivery_in_recipient' => array(
                    'id' => '17',
                    'name' => 'Доставка в городе получателя',
                    'cost' => '0',
                    'isActive' => false,
                ),
                'inspection_attachments' => array(
                    'id' => '37',
                    'name' => 'Осмотр вложения',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'insurance' => array(
                    'id' => '2',
                    'name' => 'Страхование',
                    'cost' => '0',
                    'isActive' => false,
                ),
            ),
            'core_delivery.cdek.internalcodes' => array(
                'express_light_door_door' => array(
                    'id' => '1',
                    'name' => 'Экспресс лайт дверь-дверь',
                    'isActive' => true,
                    'modeId' => 1,
                ),
                'express_light_terminal_terminal' => array(
                    'id' => '10',
                    'name' => 'Экспресс лайт склад-склад',
                    'isActive' => true,
                    'modeId' => 4,
                ),
                'express_light_terminal_door' => array(
                    'id' => '11',
                    'name' => 'Экспресс лайт склад-дверь',
                    'isActive' => true,
                    'modeId' => 3,
                ),
                'express_light_door_terminal' => array(
                    'id' => '12',
                    'name' => 'Экспресс лайт дверь-склад',
                    'isActive' => true,
                    'modeId' => 2,
                ),
                'package_terminal_terminal' => array(
                    'id' => '136',
                    'name' => 'Посылка склад-склад',
                    'isActive' => true,
                    'modeId' => 4,
                ),
                'package_terminal_door' => array(
                    'id' => '137',
                    'name' => 'Посылка склад-дверь',
                    'isActive' => true,
                    'modeId' => 3,
                ),
                'package_door_terminal' => array(
                    'id' => '138',
                    'name' => 'Посылка дверь-склад',
                    'isActive' => true,
                    'modeId' => 2,
                ),
                'econom_express_teminal_terminal' => array(
                    'id' => '5',
                    'name' => 'Экономичный экспресс склад-склад',
                    'isActive' => true,
                    'modeId' => 4,
                ),
                'magistral_express_teminal_terminal' => array(
                    'id' => '62',
                    'name' => 'Магистральный экспресс склад-склад',
                    'isActive' => true,
                    'modeId' => 4,
                ),
            ),
            'core_delivery.dpd.options' => array(
                'getCities' => array(
                    'uri' => 'http://ws.dpd.ru/services/geography?wsdl',
                    'method' => 'getCitiesCashPay',
                ),
                'getAffiliates' => array(
                    'uri' => 'http://ws.dpd.ru/services/geography?wsdl',
                    'method' => 'getTerminalsSelfDelivery2',
                ),
                'calculate' => array(
                    'uri' => 'http://ws.dpd.ru/services/calculator2?wsdl',
                    'method' => 'getServiceCost',
                ),
                'trackPackage' => array(
                    'uri' => 'http://ws.dpd.ru/services/tracing1-1?wsdl',
                    'method' => 'getStatesByDPDOrder',
                ),
                'getSticker' => array(
                    'uri' => 'http://ws.dpd.ru/services/label-print?wsdl',
                    'method' => 'createLabelFile',
                ),
                'getInvoice' => array(
                    'uri' => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method' => 'getInvoiceFile',
                ),
                'createOrder' => array(
                    'uri' => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method' => 'createOrder',
                ),
                'cancelOrder' => array(
                    'uri' => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method' => 'cancelOrder',
                ),
                'getOrderStatus' => array(
                    'uri' => 'http://wstest.dpd.ru/services/order2?wsdl',
                    'method' => 'getOrderStatus',
                ),
            ),
            'core_delivery.dpd.extraservices' => array(
                'sms' => array(
                    'id' => 'SMS',
                    'name' => 'SMS уведомление получателя',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'eml' => array(
                    'id' => 'EML',
                    'name' => 'E-mail уведомление получателя',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'esd' => array(
                    'id' => 'ЭСД',
                    'name' => 'Электронное сообщение о доставке груза получателю',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'esz' => array(
                    'id' => 'ЭСЗ',
                    'name' => 'Электронное сообщение о приёме заказа',
                    'cost' => '0',
                    'isActive' => true,
                ),
                'vdo' => array(
                    'id' => 'ВДО',
                    'name' => 'Возврат документов отправителю.',
                    'cost' => '1',
                    'isActive' => false,
                ),
                'dvd' => array(
                    'id' => 'ДВД',
                    'name' => 'Доставка в выходные дни',
                    'cost' => '1',
                    'isActive' => true,
                ),
                'npp' => array(
                    'id' => 'НПП',
                    'name' => 'Наложенный платеж',
                    'cost' => '1',
                    'isActive' => false,
                ),
                'pod' => array(
                    'id' => 'ПОД',
                    'name' => 'Подтверждение о доставке',
                    'cost' => '1',
                    'isActive' => true,
                ),
                'pdp' => array(
                    'id' => 'ПРД',
                    'name' => 'Погрузо-разгрузочные работы при доставке.',
                    'cost' => '1',
                    'isActive' => true,
                ),
                'oc' => array(
                    'id' => 'ОЦ',
                    'name' => 'Объявленная ценность отправки',
                    'cost' => '1',
                    'isActive' => false,
                ),
                'trm' => array(
                    'id' => 'ТРМ',
                    'name' => 'Температурный режим',
                    'cost' => '1',
                    'isActive' => true,
                ),
                'ojd' => array(
                    'id' => 'ОЖД',
                    'name' => 'Ожидание на адресе',
                    'cost' => '1',
                    'isActive' => false,
                ),
            ),
            'core_delivery.dpd.internalcodes' => array(
                'dpd_ten' => array(
                    'id' => 'TEN',
                    'name' => 'DPD 10:00',
                    'isActive' => false,
                ),
                'dpd_dpt' => array(
                    'id' => 'DPT',
                    'name' => 'DPD 13:00',
                    'isActive' => false,
                ),
                'dpd_bzp' => array(
                    'id' => 'BZP',
                    'name' => 'DPD 18:00',
                    'isActive' => false,
                ),
                'dpd_express' => array(
                    'id' => 'CUR',
                    'name' => 'DPD CLASSIC domestic',
                    'isActive' => true,
                ),
                'dpd_economy' => array(
                    'id' => 'ECN',
                    'name' => 'DPD ECONOMY',
                    'isActive' => true,
                ),
                'dpd_consumer' => array(
                    'id' => 'CSM',
                    'name' => 'DPD Consumer',
                    'isActive' => true,
                ),
                'dpd_classic_parcel' => array(
                    'id' => 'PCL',
                    'name' => 'DPD CLASSIC Parcel',
                    'isActive' => true,
                ),
            ),
            'core_delivery.pek.options' => array(
                'getCities' => array(
                    'uri' => 'http://pecom.ru/ru/calc/towns.php',
                    'api' => false,
                ),
                'calculate' => array(
                    'uri' => 'http://pecom.ru/bitrix/components/pecom/calc/ajax.php',
                    'api' => false,
                ),
                'trackPackage' => array(
                    'uri' => 'https://kabinet.pecom.ru/api/v1/cargos/basicstatus/',
                    'api' => true,
                ),
            ),
            'core_delivery.pek.deliveryinfo' => array(
                'pek_default' => array(
                    'name' => 'ПЭК',
                ),
            ),
            'core_delivery.dellin.options' => array(
                'getCities' => array(
                    'uri' => 'http://public.services.dellin.ru/calculatorService2/index.html?request=xmlForm',
                ),
                'calculate' => array(
                    'uri' => 'http://public.services.dellin.ru/calculatorService2/index.html?request=xmlResult',
                ),
                'trackPackage' => array(
                    'uri' => 'http://public.services.dellin.ru/tracker/XML/',
                ),
            ),
            'core_delivery.dellin.deliveryinfo' => array(
                'dellin_default' => array(
                    'name' => 'Деловые линии',
                ),
            ),
            'core_delivery.postru.options' => array(
                'getCities' => array(
                    'uri' => 'http://pecom.ru/ru/calc/towns.php',
                    'soap' => false,
                    'method' => false,
                ),
                'calculate' => array(
                    'uri' => 'http://api.postcalc.ru/',
                    'soap' => false,
                    'method' => false,
                ),
                'trackPackage' => array(
                    'uri' => 'http://voh.russianpost.ru:8080/niips-operationhistory-web/OperationHistory?wsdl',
                    'soap' => true,
                    'method' => 'GetOperationHistory',
                ),
            ),
            'core_delivery.postru.deliveryinfo' => array(
                'post_ru_default' => array(
                    'name' => 'Почта России',
                ),
            ),
            'core_delivery.ems.options' => array(
                'getCities' => array(
                    'uri' => 'http://emspost.ru/api/rest/?method=ems.get.locations',
                ),
                'calculate' => array(
                    'uri' => 'http://emspost.ru/api/rest/?method=ems.calculate',
                ),
            ),
            'core_delivery.ems.deliveryinfo' => array(
                'ems_default' => array(
                    'name' => 'EMS Почта России',
                ),
            ),
            'core_delivery.energy.options' => array(
                'getCities' => array(
                    'uri' => 'http://api.nrg-tk.ru/api/rest/?method=nrg.get.locations',
                ),
                'calculate' => array(
                    'uri' => 'http://api.nrg-tk.ru/api/rest/?method=nrg.calculate',
                ),
                'trackPackage' => array(
                    'uri' => 'http://api.nrg-tk.ru/api/rest/?method=nrg.get_sending_state',
                ),
            ),
            'core_delivery.energy.deliveryinfo' => array(
                'energy_default' => array(
                    'name' => 'Энергия',
                ),
            ),
            'core_delivery.jeldor.options' => array(
                'getCities' => array(
                    'uri' => 'http://www.jde.ru/branch',
                ),
                'calculate' => array(
                    'uri' => 'http://www.jde.ru/form/calc/simple',
                ),
                'trackPackage' => array(
                    'uri' => 'http://cabinet.jde.ru/',
                ),
            ),
            'beryllium_cache.class' => 'Beryllium\\CacheBundle\\Cache',
            'beryllium_cache.client.class' => 'Beryllium\\CacheBundle\\Client\\MemcacheClient',
            'beryllium_cache.client.memcache.class' => 'Memcache',
            'beryllium_cache.client.servers' => array(
                '127.0.0.1' => 11211,
            ),
            'beryllium_cache.client.prefix' => '',
            'beryllium_cache.default_ttl' => 300,
            'ladybug.options' => array(
                'extra_helpers' => array(
                    0 => 'RaulFraile\\Bundle\\LadybugBundle\\DataCollector\\LadybugDataCollector:log',
                ),
                'theme' => 'modern',
                'expanded' => true,
                'silenced' => false,
                'array_max_nesting_level' => 9,
                'object_max_nesting_level' => 3,
            ),
            'shtumi.autocomplete_entities' => array(
            ),
            'shtumi.dependent_filtered_entities' => array(
                'series_by_brand' => array(
                    'class' => 'CoreManufacturerBundle:Series',
                    'parent_property' => 'brand',
                    'property' => 'captionRu',
                    'role' => 'ROLE_USER',
                    'no_result_msg' => 'Для бренда нет серий...',
                    'order_property' => 'indexPosition',
                    'order_direction' => 'ASC',
                    'property_complicated' => false,
                    'case_insensitive' => true,
                    'search' => 'begins_with',
                    'callback' => NULL,
                ),
                'brands_by_manufacturer' => array(
                    'class' => 'CoreManufacturerBundle:Brand',
                    'parent_property' => 'manufacturer',
                    'property' => 'captionRu',
                    'role' => 'ROLE_USER',
                    'no_result_msg' => 'Для производителя нет брендов...',
                    'order_property' => 'indexPosition',
                    'order_direction' => 'ASC',
                    'property_complicated' => false,
                    'case_insensitive' => true,
                    'search' => 'begins_with',
                    'callback' => NULL,
                ),
                'contragents_by_user' => array(
                    'class' => 'ApplicationSonataUserBundle:CommonContragent',
                    'parent_property' => 'user',
                    'property' => 'listName',
                    'role' => 'ROLE_USER',
                    'no_result_msg' => 'У пользователя нет контрагентов...',
                    'order_direction' => 'ASC',
                    'order_property' => 'id',
                    'property_complicated' => false,
                    'case_insensitive' => true,
                    'search' => 'begins_with',
                    'callback' => NULL,
                ),
            ),
            'shtumi.date_range' => array(
                'date_format' => 'd/m/Y',
                'default_interval' => 'P30D',
            ),
            'shtumi_dependent_filtered_entity_controller_route' => 'ShtumiUsefulBundle:DependentFilteredEntity:getOptions',
            'liip_monitor.runner.class' => 'Liip\\MonitorBundle\\Runner',
            'liip_monitor.health_controller.class' => 'Liip\\MonitorBundle\\Controller\\HealthCheckController',
            'liip_monitor.helper.class' => 'Liip\\MonitorBundle\\Helper\\PathHelper',
            'liip_monitor.check.php_extensions.class' => 'ZendDiagnostics\\Check\\ExtensionLoaded',
            'liip_monitor.check.php_extensions' => array(
                0 => 'apc',
                1 => 'memcache',
            ),
            'liip_monitor.check.php_extensions.0' => 'apc',
            'liip_monitor.check.php_extensions.1' => 'memcache',
            'liip_monitor.check.php_version.class' => 'Liip\\MonitorBundle\\Check\\PhpVersionCollection',
            'liip_monitor.check.php_version' => array(
                '5.4.4' => '>=',
            ),
            'liip_monitor.check.php_version.5.4.4' => '>=',
            'liip_monitor.check.disk_usage.class' => 'ZendDiagnostics\\Check\\DiskUsage',
            'liip_monitor.check.disk_usage.warning' => 70,
            'liip_monitor.check.disk_usage.critical' => 90,
            'liip_monitor.check.disk_usage.path' => '/home/olikids/public_html.sam/app/cache/prod',
            'liip_monitor.check.symfony_requirements.class' => 'Liip\\MonitorBundle\\Check\\SymfonyRequirements',
            'liip_monitor.check.symfony_requirements.file' => '/home/olikids/public_html.sam/app/SymfonyRequirements.php',
            'liip_monitor.check.apc_memory.class' => 'ZendDiagnostics\\Check\\ApcMemory',
            'liip_monitor.check.apc_memory.warning' => 70,
            'liip_monitor.check.apc_memory.critical' => 90,
            'liip_monitor.check.apc_fragmentation.class' => 'ZendDiagnostics\\Check\\ApcFragmentation',
            'liip_monitor.check.apc_fragmentation.warning' => 70,
            'liip_monitor.check.apc_fragmentation.critical' => 90,
            'liip_monitor.check.doctrine_dbal.class' => 'Liip\\MonitorBundle\\Check\\DoctrineDbalCollection',
            'liip_monitor.check.doctrine_dbal' => array(
                0 => 'default',
                1 => 'force_master',
            ),
            'liip_monitor.check.doctrine_dbal.0' => 'default',
            'liip_monitor.check.doctrine_dbal.1' => 'force_master',
            'liip_monitor.check.memcache.class' => 'Liip\\MonitorBundle\\Check\\MemcacheCollection',
            'liip_monitor.check.memcache' => array(
                'name' => array(
                    'host' => 'localhost',
                    'port' => 11211,
                ),
            ),
            'liip_monitor.check.memcache.name' => array(
                'host' => 'localhost',
                'port' => 11211,
            ),
            'liip_monitor.check.http_service.class' => 'Liip\\MonitorBundle\\Check\\HttpServiceCollection',
            'liip_monitor.check.http_service' => array(
                'name' => array(
                    'host' => 'localhost',
                    'port' => 80,
                    'path' => '/',
                    'status_code' => 200,
                    'content' => NULL,
                ),
            ),
            'liip_monitor.check.http_service.name' => array(
                'host' => 'localhost',
                'port' => 80,
                'path' => '/',
                'status_code' => 200,
                'content' => NULL,
            ),
            'liip_monitor.check.custom_error_pages.class' => 'Liip\\MonitorBundle\\Check\\CustomErrorPages',
            'liip_monitor.check.custom_error_pages.error_codes' => array(
                0 => 404,
                1 => 504,
            ),
            'liip_monitor.check.custom_error_pages.path' => '/home/olikids/public_html.sam/app',
            'liip_monitor.check.custom_error_pages.controller' => 'twig.controller.exception:showAction',
            'liip_monitor.check.security_advisory.class' => 'ZendDiagnostics\\Check\\SecurityAdvisory',
            'liip_monitor.check.security_advisory.lock_file' => '/home/olikids/public_html.sam/app/../composer.lock',
            'ornicar_apc.host' => 'http://www.olikids-sam.ru.vm',
            'ornicar_apc.web_dir' => '/home/olikids/public_html.sam/app/../web',
            'ornicar_apc.mode' => 'fopen',
            'presta_sitemap.generator.class' => 'Presta\\SitemapBundle\\Service\\Generator',
            'presta_sitemap.dumper.class' => 'Presta\\SitemapBundle\\Service\\Dumper',
            'presta_sitemap.routing_loader.class' => 'Presta\\SitemapBundle\\Routing\\SitemapRoutingLoader',
            'presta_sitemap.timetolive' => 3600,
            'presta_sitemap.sitemap_file_prefix' => 'sitemap',
            'presta_sitemap.dumper_base_url' => 'http://www.olikids-sam.ru.vm',
            'presta_sitemap.eventlistener.route_annotation.class' => 'Presta\\SitemapBundle\\EventListener\\RouteAnnotationEventListener',
            'phpexcel.class' => 'Liuggio\\ExcelBundle\\Factory',
            'core_slug_history' => array(
                'namespaces' => array(
                    'Core\\ProductBundle\\Entity\\CommonProduct' => array(
                        'route' => 'core_product',
                        'parameters' => array(
                            'slug' => 'slug',
                        ),
                    ),
                    'Core\\CategoryBundle\\Entity\\ProductCategory' => array(
                        'route' => 'core_shop_product_catalog_first_page',
                        'parameters' => array(
                            'slug' => 'slug',
                        ),
                    ),
                    'Core\\ManufacturerBundle\\Entity\\Brand' => array(
                        'route' => 'core_shop_product_brand_first_page',
                        'parameters' => array(
                            'slug' => 'slug',
                        ),
                        'childrensEntity' => array(
                            'seriesList' => 'Core\\ManufacturerBundle\\Entity\\Series',
                        ),
                    ),
                    'Core\\ManufacturerBundle\\Entity\\Series' => array(
                        'route' => 'core_shop_product_brand_series_first_page',
                        'parameters' => array(
                            'slug' => 'brand.slug',
                            'slugSeries' => 'slug',
                        ),
                    ),
                    'Core\\FaqBundle\\Entity\\Article' => array(
                        'route' => 'core_faq_article',
                        'parameters' => array(
                            'categorySlug' => 'category.slug',
                            'articleSlug' => 'slug',
                        ),
                    ),
                    'Core\\CategoryBundle\\Entity\\FaqCategory' => array(
                        'route' => 'core_faq_category',
                        'parameters' => array(
                            'categorySlug' => 'slug',
                        ),
                        'childrensEntity' => array(
                            'articles' => 'Core\\FaqBundle\\Entity\\Article',
                        ),
                    ),
                ),
            ),
            'core_office_work_time' => array(
                'uri' => 'http://basicdata.ru/api/json/calend/',
                'timezone' => 'Europe/Moscow',
                'options' => array(
                    'basic_data' => array(
                        'uri' => 'http://basicdata.ru/api/json/calend/',
                    ),
                ),
            ),
            'console.command.ids' => array(
            ),
            'cmf_tree_browser.tree_controllers' => array(
            ),
        );
    }
}
class ApplicationSonataUserBundleMailerMailer_0000000001a1ebe800007f34c1e23dae extends \Application\Sonata\UserBundle\Mailer\Mailer implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c18f362f052422748 = null;
    private $initializer54744c18f3690500927352 = null;
    private static $publicProperties54744c18f3448582015625 = array(
        
    );
    public function sendEmailChangedMessage(\FOS\UserBundle\Model\UserInterface $user)
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, 'sendEmailChangedMessage', array('user' => $user), $this->initializer54744c18f3690500927352);
        return $this->valueHolder54744c18f362f052422748->sendEmailChangedMessage($user);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c18f3690500927352 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, '__get', array('name' => $name), $this->initializer54744c18f3690500927352);
        if (isset(self::$publicProperties54744c18f3448582015625[$name])) {
            return $this->valueHolder54744c18f362f052422748->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c18f362f052422748;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c18f362f052422748;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c18f3690500927352);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c18f362f052422748;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c18f362f052422748;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, '__isset', array('name' => $name), $this->initializer54744c18f3690500927352);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c18f362f052422748;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c18f362f052422748;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, '__unset', array('name' => $name), $this->initializer54744c18f3690500927352);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c18f362f052422748;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c18f362f052422748;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, '__clone', array(), $this->initializer54744c18f3690500927352);
        $this->valueHolder54744c18f362f052422748 = clone $this->valueHolder54744c18f362f052422748;
    }
    public function __sleep()
    {
        $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, '__sleep', array(), $this->initializer54744c18f3690500927352);
        return array('valueHolder54744c18f362f052422748');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c18f3690500927352 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c18f3690500927352;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c18f3690500927352 && $this->initializer54744c18f3690500927352->__invoke($this->valueHolder54744c18f362f052422748, $this, 'initializeProxy', array(), $this->initializer54744c18f3690500927352);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c18f362f052422748;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c18f362f052422748;
    }
}
class CoreDeliveryBundleLogicCdek_0000000001a1e85500007f34c1e23dae extends \Core\DeliveryBundle\Logic\Cdek implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c190060b834105638 = null;
    private $initializer54744c190061e368594513 = null;
    private static $publicProperties54744c19005d6063633039 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'getCities', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->getCities($options);
    }
    public function getAffiliates($options = null)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'getAffiliates', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->getAffiliates($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'calculate', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'trackPackage', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->trackPackage($options);
    }
    public function getInvoice($options)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'getInvoice', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->getInvoice($options);
    }
    public function createOrder($options)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'createOrder', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->createOrder($options);
    }
    public function cancelOrder($options)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'cancelOrder', array('options' => $options), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->cancelOrder($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c190061e368594513);
        return $this->valueHolder54744c190060b834105638->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c190061e368594513 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, '__get', array('name' => $name), $this->initializer54744c190061e368594513);
        if (isset(self::$publicProperties54744c19005d6063633039[$name])) {
            return $this->valueHolder54744c190060b834105638->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c190060b834105638;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c190060b834105638;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c190061e368594513);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c190060b834105638;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c190060b834105638;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, '__isset', array('name' => $name), $this->initializer54744c190061e368594513);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c190060b834105638;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c190060b834105638;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, '__unset', array('name' => $name), $this->initializer54744c190061e368594513);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c190060b834105638;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c190060b834105638;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, '__clone', array(), $this->initializer54744c190061e368594513);
        $this->valueHolder54744c190060b834105638 = clone $this->valueHolder54744c190060b834105638;
    }
    public function __sleep()
    {
        $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, '__sleep', array(), $this->initializer54744c190061e368594513);
        return array('valueHolder54744c190060b834105638');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c190061e368594513 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c190061e368594513;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c190061e368594513 && $this->initializer54744c190061e368594513->__invoke($this->valueHolder54744c190060b834105638, $this, 'initializeProxy', array(), $this->initializer54744c190061e368594513);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c190060b834105638;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c190060b834105638;
    }
}
class CoreDeliveryBundleLogicDpd_0000000001a1e85200007f34c1e23dae extends \Core\DeliveryBundle\Logic\Dpd implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c1908168341681330 = null;
    private $initializer54744c190817b400867926 = null;
    private static $publicProperties54744c1908130228479352 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'getCities', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->getCities($options);
    }
    public function getAffiliates($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'getAffiliates', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->getAffiliates($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'calculate', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'trackPackage', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->trackPackage($options);
    }
    public function getSticker($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'getSticker', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->getSticker($options);
    }
    public function getInvoice($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'getInvoice', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->getInvoice($options);
    }
    public function createOrder($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'createOrder', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->createOrder($options);
    }
    public function cancelOrder($options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'cancelOrder', array('options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->cancelOrder($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->sendRequest($data, $params);
    }
    public function setExtraServices($extraServices, $options)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'setExtraServices', array('extraServices' => $extraServices, 'options' => $options), $this->initializer54744c190817b400867926);
        return $this->valueHolder54744c1908168341681330->setExtraServices($extraServices, $options);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c190817b400867926 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, '__get', array('name' => $name), $this->initializer54744c190817b400867926);
        if (isset(self::$publicProperties54744c1908130228479352[$name])) {
            return $this->valueHolder54744c1908168341681330->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1908168341681330;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c1908168341681330;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c190817b400867926);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1908168341681330;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c1908168341681330;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, '__isset', array('name' => $name), $this->initializer54744c190817b400867926);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1908168341681330;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c1908168341681330;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, '__unset', array('name' => $name), $this->initializer54744c190817b400867926);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1908168341681330;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c1908168341681330;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, '__clone', array(), $this->initializer54744c190817b400867926);
        $this->valueHolder54744c1908168341681330 = clone $this->valueHolder54744c1908168341681330;
    }
    public function __sleep()
    {
        $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, '__sleep', array(), $this->initializer54744c190817b400867926);
        return array('valueHolder54744c1908168341681330');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c190817b400867926 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c190817b400867926;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c190817b400867926 && $this->initializer54744c190817b400867926->__invoke($this->valueHolder54744c1908168341681330, $this, 'initializeProxy', array(), $this->initializer54744c190817b400867926);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c1908168341681330;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c1908168341681330;
    }
}
class CoreDeliveryBundleLogicPek_0000000001a1e85300007f34c1e23dae extends \Core\DeliveryBundle\Logic\Pek implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c19103bf998660501 = null;
    private $initializer54744c19103d1673888524 = null;
    private static $publicProperties54744c1910389247479370 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, 'getCities', array('options' => $options), $this->initializer54744c19103d1673888524);
        return $this->valueHolder54744c19103bf998660501->getCities($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, 'calculate', array('options' => $options), $this->initializer54744c19103d1673888524);
        return $this->valueHolder54744c19103bf998660501->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, 'trackPackage', array('options' => $options), $this->initializer54744c19103d1673888524);
        return $this->valueHolder54744c19103bf998660501->trackPackage($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c19103d1673888524);
        return $this->valueHolder54744c19103bf998660501->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c19103d1673888524 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, '__get', array('name' => $name), $this->initializer54744c19103d1673888524);
        if (isset(self::$publicProperties54744c1910389247479370[$name])) {
            return $this->valueHolder54744c19103bf998660501->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19103bf998660501;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c19103bf998660501;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c19103d1673888524);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19103bf998660501;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c19103bf998660501;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, '__isset', array('name' => $name), $this->initializer54744c19103d1673888524);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19103bf998660501;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c19103bf998660501;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, '__unset', array('name' => $name), $this->initializer54744c19103d1673888524);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19103bf998660501;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c19103bf998660501;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, '__clone', array(), $this->initializer54744c19103d1673888524);
        $this->valueHolder54744c19103bf998660501 = clone $this->valueHolder54744c19103bf998660501;
    }
    public function __sleep()
    {
        $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, '__sleep', array(), $this->initializer54744c19103d1673888524);
        return array('valueHolder54744c19103bf998660501');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c19103d1673888524 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c19103d1673888524;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c19103d1673888524 && $this->initializer54744c19103d1673888524->__invoke($this->valueHolder54744c19103bf998660501, $this, 'initializeProxy', array(), $this->initializer54744c19103d1673888524);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c19103bf998660501;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c19103bf998660501;
    }
}
class CoreDeliveryBundleLogicDellin_0000000001a1e85000007f34c1e23dae extends \Core\DeliveryBundle\Logic\Dellin implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c191247b626793942 = null;
    private $initializer54744c1912493531359074 = null;
    private static $publicProperties54744c1912433138230960 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, 'getCities', array('options' => $options), $this->initializer54744c1912493531359074);
        return $this->valueHolder54744c191247b626793942->getCities($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, 'calculate', array('options' => $options), $this->initializer54744c1912493531359074);
        return $this->valueHolder54744c191247b626793942->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, 'trackPackage', array('options' => $options), $this->initializer54744c1912493531359074);
        return $this->valueHolder54744c191247b626793942->trackPackage($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c1912493531359074);
        return $this->valueHolder54744c191247b626793942->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c1912493531359074 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, '__get', array('name' => $name), $this->initializer54744c1912493531359074);
        if (isset(self::$publicProperties54744c1912433138230960[$name])) {
            return $this->valueHolder54744c191247b626793942->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191247b626793942;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c191247b626793942;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c1912493531359074);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191247b626793942;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c191247b626793942;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, '__isset', array('name' => $name), $this->initializer54744c1912493531359074);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191247b626793942;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191247b626793942;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, '__unset', array('name' => $name), $this->initializer54744c1912493531359074);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191247b626793942;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191247b626793942;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, '__clone', array(), $this->initializer54744c1912493531359074);
        $this->valueHolder54744c191247b626793942 = clone $this->valueHolder54744c191247b626793942;
    }
    public function __sleep()
    {
        $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, '__sleep', array(), $this->initializer54744c1912493531359074);
        return array('valueHolder54744c191247b626793942');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c1912493531359074 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c1912493531359074;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c1912493531359074 && $this->initializer54744c1912493531359074->__invoke($this->valueHolder54744c191247b626793942, $this, 'initializeProxy', array(), $this->initializer54744c1912493531359074);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c191247b626793942;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c191247b626793942;
    }
}
class CoreDeliveryBundleLogicPostRu_0000000001a1e85100007f34c1e23dae extends \Core\DeliveryBundle\Logic\PostRu implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c19149e9440290676 = null;
    private $initializer54744c19149fa655842949 = null;
    private static $publicProperties54744c19149b7029886146 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, 'getCities', array('options' => $options), $this->initializer54744c19149fa655842949);
        return $this->valueHolder54744c19149e9440290676->getCities($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, 'calculate', array('options' => $options), $this->initializer54744c19149fa655842949);
        return $this->valueHolder54744c19149e9440290676->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, 'trackPackage', array('options' => $options), $this->initializer54744c19149fa655842949);
        return $this->valueHolder54744c19149e9440290676->trackPackage($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c19149fa655842949);
        return $this->valueHolder54744c19149e9440290676->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c19149fa655842949 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, '__get', array('name' => $name), $this->initializer54744c19149fa655842949);
        if (isset(self::$publicProperties54744c19149b7029886146[$name])) {
            return $this->valueHolder54744c19149e9440290676->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19149e9440290676;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c19149e9440290676;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c19149fa655842949);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19149e9440290676;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c19149e9440290676;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, '__isset', array('name' => $name), $this->initializer54744c19149fa655842949);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19149e9440290676;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c19149e9440290676;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, '__unset', array('name' => $name), $this->initializer54744c19149fa655842949);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c19149e9440290676;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c19149e9440290676;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, '__clone', array(), $this->initializer54744c19149fa655842949);
        $this->valueHolder54744c19149e9440290676 = clone $this->valueHolder54744c19149e9440290676;
    }
    public function __sleep()
    {
        $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, '__sleep', array(), $this->initializer54744c19149fa655842949);
        return array('valueHolder54744c19149e9440290676');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c19149fa655842949 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c19149fa655842949;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c19149fa655842949 && $this->initializer54744c19149fa655842949->__invoke($this->valueHolder54744c19149e9440290676, $this, 'initializeProxy', array(), $this->initializer54744c19149fa655842949);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c19149e9440290676;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c19149e9440290676;
    }
}
class CoreDeliveryBundleLogicEms_0000000001a1e85e00007f34c1e23dae extends \Core\DeliveryBundle\Logic\Ems implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c1917aef368513205 = null;
    private $initializer54744c1917b01259808376 = null;
    private static $publicProperties54744c1917ab9303803052 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, 'getCities', array('options' => $options), $this->initializer54744c1917b01259808376);
        return $this->valueHolder54744c1917aef368513205->getCities($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, 'calculate', array('options' => $options), $this->initializer54744c1917b01259808376);
        return $this->valueHolder54744c1917aef368513205->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, 'trackPackage', array('options' => $options), $this->initializer54744c1917b01259808376);
        return $this->valueHolder54744c1917aef368513205->trackPackage($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c1917b01259808376);
        return $this->valueHolder54744c1917aef368513205->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c1917b01259808376 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, '__get', array('name' => $name), $this->initializer54744c1917b01259808376);
        if (isset(self::$publicProperties54744c1917ab9303803052[$name])) {
            return $this->valueHolder54744c1917aef368513205->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1917aef368513205;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c1917aef368513205;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c1917b01259808376);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1917aef368513205;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c1917aef368513205;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, '__isset', array('name' => $name), $this->initializer54744c1917b01259808376);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1917aef368513205;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c1917aef368513205;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, '__unset', array('name' => $name), $this->initializer54744c1917b01259808376);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1917aef368513205;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c1917aef368513205;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, '__clone', array(), $this->initializer54744c1917b01259808376);
        $this->valueHolder54744c1917aef368513205 = clone $this->valueHolder54744c1917aef368513205;
    }
    public function __sleep()
    {
        $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, '__sleep', array(), $this->initializer54744c1917b01259808376);
        return array('valueHolder54744c1917aef368513205');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c1917b01259808376 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c1917b01259808376;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c1917b01259808376 && $this->initializer54744c1917b01259808376->__invoke($this->valueHolder54744c1917aef368513205, $this, 'initializeProxy', array(), $this->initializer54744c1917b01259808376);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c1917aef368513205;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c1917aef368513205;
    }
}
class CoreDeliveryBundleLogicJelDor_0000000001a1e85f00007f34c1e23dae extends \Core\DeliveryBundle\Logic\JelDor implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c1919a5c928295560 = null;
    private $initializer54744c1919a73286699013 = null;
    private static $publicProperties54744c1919a17274525372 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, 'getCities', array('options' => $options), $this->initializer54744c1919a73286699013);
        return $this->valueHolder54744c1919a5c928295560->getCities($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, 'calculate', array('options' => $options), $this->initializer54744c1919a73286699013);
        return $this->valueHolder54744c1919a5c928295560->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, 'trackPackage', array('options' => $options), $this->initializer54744c1919a73286699013);
        return $this->valueHolder54744c1919a5c928295560->trackPackage($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c1919a73286699013);
        return $this->valueHolder54744c1919a5c928295560->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c1919a73286699013 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, '__get', array('name' => $name), $this->initializer54744c1919a73286699013);
        if (isset(self::$publicProperties54744c1919a17274525372[$name])) {
            return $this->valueHolder54744c1919a5c928295560->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1919a5c928295560;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c1919a5c928295560;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c1919a73286699013);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1919a5c928295560;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c1919a5c928295560;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, '__isset', array('name' => $name), $this->initializer54744c1919a73286699013);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1919a5c928295560;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c1919a5c928295560;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, '__unset', array('name' => $name), $this->initializer54744c1919a73286699013);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c1919a5c928295560;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c1919a5c928295560;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, '__clone', array(), $this->initializer54744c1919a73286699013);
        $this->valueHolder54744c1919a5c928295560 = clone $this->valueHolder54744c1919a5c928295560;
    }
    public function __sleep()
    {
        $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, '__sleep', array(), $this->initializer54744c1919a73286699013);
        return array('valueHolder54744c1919a5c928295560');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c1919a73286699013 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c1919a73286699013;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c1919a73286699013 && $this->initializer54744c1919a73286699013->__invoke($this->valueHolder54744c1919a5c928295560, $this, 'initializeProxy', array(), $this->initializer54744c1919a73286699013);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c1919a5c928295560;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c1919a5c928295560;
    }
}
class CoreDeliveryBundleLogicEnergy_0000000001a1e85c00007f34c1e23dae extends \Core\DeliveryBundle\Logic\Energy implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c191c03e042592629 = null;
    private $initializer54744c191c04f535258847 = null;
    private static $publicProperties54744c191c00d198162452 = array(
        
    );
    public function getCities($options = null)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, 'getCities', array('options' => $options), $this->initializer54744c191c04f535258847);
        return $this->valueHolder54744c191c03e042592629->getCities($options);
    }
    public function calculate($options)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, 'calculate', array('options' => $options), $this->initializer54744c191c04f535258847);
        return $this->valueHolder54744c191c03e042592629->calculate($options);
    }
    public function trackPackage($options)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, 'trackPackage', array('options' => $options), $this->initializer54744c191c04f535258847);
        return $this->valueHolder54744c191c03e042592629->trackPackage($options);
    }
    public function sendRequest($data, $params = null)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, 'sendRequest', array('data' => $data, 'params' => $params), $this->initializer54744c191c04f535258847);
        return $this->valueHolder54744c191c03e042592629->sendRequest($data, $params);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c191c04f535258847 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, '__get', array('name' => $name), $this->initializer54744c191c04f535258847);
        if (isset(self::$publicProperties54744c191c00d198162452[$name])) {
            return $this->valueHolder54744c191c03e042592629->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191c03e042592629;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c191c03e042592629;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c191c04f535258847);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191c03e042592629;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c191c03e042592629;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, '__isset', array('name' => $name), $this->initializer54744c191c04f535258847);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191c03e042592629;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191c03e042592629;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, '__unset', array('name' => $name), $this->initializer54744c191c04f535258847);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191c03e042592629;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191c03e042592629;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, '__clone', array(), $this->initializer54744c191c04f535258847);
        $this->valueHolder54744c191c03e042592629 = clone $this->valueHolder54744c191c03e042592629;
    }
    public function __sleep()
    {
        $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, '__sleep', array(), $this->initializer54744c191c04f535258847);
        return array('valueHolder54744c191c03e042592629');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c191c04f535258847 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c191c04f535258847;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c191c04f535258847 && $this->initializer54744c191c04f535258847->__invoke($this->valueHolder54744c191c03e042592629, $this, 'initializeProxy', array(), $this->initializer54744c191c04f535258847);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c191c03e042592629;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c191c03e042592629;
    }
}
class CoreOfficeWorkTimeBundleLogicBasicDataLogic_0000000001a1f9d200007f34c1e23dae extends \Core\OfficeWorkTimeBundle\Logic\BasicDataLogic implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c191dfb1149076902 = null;
    private $initializer54744c191dfc3656931959 = null;
    private static $publicProperties54744c191df82965940645 = array(
        
    );
    public function getSchedule()
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, 'getSchedule', array(), $this->initializer54744c191dfc3656931959);
        return $this->valueHolder54744c191dfb1149076902->getSchedule();
    }
    public function sendRequest(array $data)
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, 'sendRequest', array('data' => $data), $this->initializer54744c191dfc3656931959);
        return $this->valueHolder54744c191dfb1149076902->sendRequest($data);
    }
    public function __construct($initializer)
    {
        $this->initializer54744c191dfc3656931959 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, '__get', array('name' => $name), $this->initializer54744c191dfc3656931959);
        if (isset(self::$publicProperties54744c191df82965940645[$name])) {
            return $this->valueHolder54744c191dfb1149076902->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191dfb1149076902;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c191dfb1149076902;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c191dfc3656931959);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191dfb1149076902;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c191dfb1149076902;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, '__isset', array('name' => $name), $this->initializer54744c191dfc3656931959);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191dfb1149076902;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191dfb1149076902;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, '__unset', array('name' => $name), $this->initializer54744c191dfc3656931959);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191dfb1149076902;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191dfb1149076902;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, '__clone', array(), $this->initializer54744c191dfc3656931959);
        $this->valueHolder54744c191dfb1149076902 = clone $this->valueHolder54744c191dfb1149076902;
    }
    public function __sleep()
    {
        $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, '__sleep', array(), $this->initializer54744c191dfc3656931959);
        return array('valueHolder54744c191dfb1149076902');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c191dfc3656931959 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c191dfc3656931959;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c191dfc3656931959 && $this->initializer54744c191dfc3656931959->__invoke($this->valueHolder54744c191dfb1149076902, $this, 'initializeProxy', array(), $this->initializer54744c191dfc3656931959);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c191dfb1149076902;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c191dfb1149076902;
    }
}
class CoreOfficeWorkTimeBundleLogicOfficeWorkTimeLogic_0000000001a1f9d100007f34c1e23dae extends \Core\OfficeWorkTimeBundle\Logic\OfficeWorkTimeLogic implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolder54744c191f26f736681598 = null;
    private $initializer54744c191f291808729674 = null;
    private static $publicProperties54744c191f209407081139 = array(
        
    );
    public function getSchedule()
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, 'getSchedule', array(), $this->initializer54744c191f291808729674);
        return $this->valueHolder54744c191f26f736681598->getSchedule();
    }
    public function getState()
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, 'getState', array(), $this->initializer54744c191f291808729674);
        return $this->valueHolder54744c191f26f736681598->getState();
    }
    public function __construct($initializer)
    {
        $this->initializer54744c191f291808729674 = $initializer;
    }
    public function & __get($name)
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, '__get', array('name' => $name), $this->initializer54744c191f291808729674);
        if (isset(self::$publicProperties54744c191f209407081139[$name])) {
            return $this->valueHolder54744c191f26f736681598->$name;
        }
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191f26f736681598;
            $backtrace = debug_backtrace(false);
            trigger_error('Undefined property: ' . get_parent_class($this) . '::$' . $name . ' in ' . $backtrace[0]['file'] . ' on line ' . $backtrace[0]['line'], \E_USER_NOTICE);
            return $targetObject->$name;;
            return;
        }
        $targetObject = $this->valueHolder54744c191f26f736681598;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer54744c191f291808729674);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191f26f736681598;
            return $targetObject->$name = $value;;
            return;
        }
        $targetObject = $this->valueHolder54744c191f26f736681598;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, '__isset', array('name' => $name), $this->initializer54744c191f291808729674);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191f26f736681598;
            return isset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191f26f736681598;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, '__unset', array('name' => $name), $this->initializer54744c191f291808729674);
        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder54744c191f26f736681598;
            unset($targetObject->$name);;
            return;
        }
        $targetObject = $this->valueHolder54744c191f26f736681598;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
            $backtrace = debug_backtrace(true);
            $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \stdClass();
            $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __clone()
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, '__clone', array(), $this->initializer54744c191f291808729674);
        $this->valueHolder54744c191f26f736681598 = clone $this->valueHolder54744c191f26f736681598;
    }
    public function __sleep()
    {
        $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, '__sleep', array(), $this->initializer54744c191f291808729674);
        return array('valueHolder54744c191f26f736681598');
    }
    public function __wakeup()
    {
    }
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer54744c191f291808729674 = $initializer;
    }
    public function getProxyInitializer()
    {
        return $this->initializer54744c191f291808729674;
    }
    public function initializeProxy()
    {
        return $this->initializer54744c191f291808729674 && $this->initializer54744c191f291808729674->__invoke($this->valueHolder54744c191f26f736681598, $this, 'initializeProxy', array(), $this->initializer54744c191f291808729674);
    }
    public function isProxyInitialized()
    {
        return null !== $this->valueHolder54744c191f26f736681598;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder54744c191f26f736681598;
    }
}
