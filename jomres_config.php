<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.21.2
 *
 * @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined('_JOMRES_INITCHECK') or die('');
// ################################################################

/**
*
* Default property configuration settings.
*
* 
* 
*/
$mrConfig = array(
  'newTariffModels' => '2',
  'singlePersonSuppliment' => '0',
  'singlePersonSupplimentCost' => '10',
  'perPersonPerNight' => '0',
  'depositIsPercentage' => '1',
  'depositValue' => '20',
  'errorChecking' => '0',
  'jomresdotnet' => 'www.jomres.net',
  'visitorscanbookonline' => '1',
  'fixedPeriodBookings' => '0',
  'fixedPeriodBookingsNumberOfDays' => '7',
  'numberofFixedPeriods' => '4',
  'singleRoomProperty' => '0',
  'fixedArrivalDateYesNo' => '0',
  'fixedArrivalDay' => '0',
  'showAvailabilityCalendar' => '1',
  'avlcal_todaycolor' => '#CC0000',
  'avlcal_inmonthface' => '#000000',
  'avlcal_outmonface' => '#666666',
  'avlcal_inbgcolour' => '#6AFB92',
  'avlcal_outbgcolour' => '#FFCCFF',
  'avlcal_occupiedcolour' => '#FF0000',
  'avlcal_provisionalcolour' => '#FFFC17',
  'showRoomsListingLink' => '1',
  'cformat' => '2',
  'weekenddays' => '5,6',
  'avlcal_black' => '#BEBEBE',
  'avlcal_booking' => 'green',
  'avlcal_pastcolour' => '#BEBEBE',
  'avlcal_weekendborder' => '#BEBEBE',
  'cal_output' => 'jS M Y',
  'cal_input' => '%d/%m/%Y',
  'fixedPeriodBookingsShortYesNo' => '0',
  'fixedPeriodBookingsShortNumberOfDays' => '4',
  'showExtras' => '1',
  'limitAdvanceBookingsYesNo' => '0',
  'advanceBookingsLimit' => '90',
  'roomTaxYesNo' => '0',
  'roomTaxFixed' => '0',
  'roomTaxPercentage' => '0',
  'euroTaxYesNo' => '0',
  'euroTaxPercentage' => '0',
  'editingOn' => '0',
  'depAmount' => '0',
  'CalendarMonthsToShow' => '12',
  'encKey' => '',
  'editiconsize' => 'small',
  'showTariffsLink' => '0',
  'showdepartureinput' => '1',
  'ratemultiplier' => '1',
  'dateFormatStyle' => '1',
  'showSlideshowLink' => '0',
  'showSlideshowInline' => '1',
  'showTariffsInline' => '1',
  'inputBoxErrorBackground' => '#fce31d',
  'defaultcountry' => 'GB',
  'calstartfrombeginningofyear' => '0',
  'showGoogleCurrencyLink' => '1',
  'currencyCodes' => '',
  'showRoomsInPropertyDetails' => '1',
  'showOnlyAvailabilityCalendar' => '0',
  'minimuminterval' => '1',
  'mindaysbeforearrival' => '1',
  'defaultNumberOfFirstGuesttype' => '2',
  'registeredUsersOnlyCanBook' => '0',
  'roundupDepositYesNo' => '0',
  'chargeDepositYesNo' => '1',
  'tariffChargesStoredWeeklyYesNo' => '0',
  'fixedArrivalDatesRecurring' => '12',
  'inputBoxOktobookBackground' => '#11ff22',
  'supplimentChargeIsPercentage' => '0',
  'returnRoomsLimit' => '1',
  'tariffmode' => '0',
  'roomslistinpropertydetails' => '1',
  'verbosetariffinfo' => '0',
  'bookingform_roomlist_showroomno' => '1',
  'bookingform_roomlist_showroomname' => '0',
  'bookingform_roomlist_showtarifftitle' => '0',
  'bookingform_overlib_tariff_title_show' => '1',
  'bookingform_overlib_tariff_desc_show' => '1',
  'bookingform_overlib_tariff_rate_show' => '1',
  'bookingform_overlib_tariff_starts_show' => '0',
  'bookingform_overlib_tariff_ends_show' => '0',
  'bookingform_overlib_tariff_mindays_show' => '0',
  'bookingform_overlib_tariff_maxdays_show' => '0',
  'bookingform_overlib_tariff_minpeeps_show' => '0',
  'bookingform_overlib_tariff_maxpeeps_show' => '0',
  'bookingform_overlib_room_number_show' => '1',
  'bookingform_overlib_room_name_show' => '0',
  'bookingform_overlib_room_type_show' => '1',
  'bookingform_overlib_room_floor_show' => '0',
  'bookingform_overlib_room_maxpeople_show' => '1',
  'bookingform_overlib_room_features_show' => '1',
  'bookingform_requiredfields_name' => '1',
  'bookingform_requiredfields_surname' => '1',
  'bookingform_requiredfields_houseno' => '1',
  'bookingform_requiredfields_street' => '1',
  'bookingform_requiredfields_town' => '1',
  'bookingform_requiredfields_postcode' => '1',
  'bookingform_requiredfields_region' => '1',
  'bookingform_requiredfields_country' => '1',
  'bookingform_requiredfields_tel' => '1',
  'bookingform_requiredfields_mobile' => '1',
  'bookingform_requiredfields_email' => '1',
  'bookingform_roomlist_showdisabled' => '1',
  'bookingform_roomlist_showmaxpeople' => '1',
  'accommodation_tax_code' => '1',
  'use_variable_deposits' => '0',
  'variable_deposit_threashold' => '60',
  'is_real_estate_listing' => '0',
  'property_currencycode' => 'EUR',
  'prices_inclusive' => '1',
  'booking_form_rooms_list_style' => '2',
  'booking_form_daily_weekly_monthly' => 'D',
  'showRoomImageInBookingFormOverlib' => '2',
  'tariffsenhanceddefault' => '100',
  'tariffsenhancedyearstoshow' => '2',
  'wholeday_booking' => '0',
  'cancellation_threashold' => '14',
  'depositIsOneNight' => '0',
  'auto_detect_country_for_booking_form' => '1',
  'property_language' => 'en-GB',
  'property_vat_number' => '',
  'property_vat_number_validated' => '0',
  'vat_number_validation_response' => '',
  'requireApproval' => '0',
  'showPfeaturesCategories' => '1',
  'currency_symbol_swap' => '0',
  'facebook_page' => '',
  'bookingform_overlib_room_disabledaccess_show' => '1',
  'bookingform_overlib_room_smoking_show' => '0',
  'defaultSmokingOption' => '2',
  'showSmoking' => '0',
  'useOnlinepayment' => '0',
  'minimum_deposit_percentage' => '0',
  'externalBookingFormUrl' => '',
  'minimum_deposit_value' => 0,
  'poa_price' => '',
  'hide_local_address' => '0',
  'use_custom_invoice_numbers' => '1',
  'last_invoice_number' => '1000',
  'custom_invoice_pattern' => '{N}'
);
