<?php
/**
 * Core file.
 *
 * @author Vince Wooll <sales@jomres.net>
 *
 * @version Jomres 9.23.0
 *
 * @copyright	2005-2020 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

	
	/**
	 *
	 * @package Jomres\Core\Classes
	 *
	 */

class booking_engine_adults_dropdown
{	
	/**
	 * 
	 *
	 *
	 */

	public function __construct( $bkg  )
	{
		$this->available_rooms = $bkg->available_rooms_for_selected_dates;
		$this->property_uid = $bkg->property_uid;
		$this->available_rooms = array_unique($bkg->available_rooms_for_selected_dates);
	}
	
	/**
	 * 
	 *
	 *
	 */

	public function build_adults_dropdown ( )
	{

		$basic_room_details = jomres_singleton_abstract::getInstance('basic_room_details');
		$basic_room_details->get_all_rooms($this->property_uid);

		$total_adult_slots_available_these_dates = 0;

		foreach ($this->available_rooms as $room_id ) {
			if ( isset($basic_room_details->rooms[$room_id])) {
				$total_adult_slots_available_these_dates = $total_adult_slots_available_these_dates + $basic_room_details->rooms[$room_id]['max_adults'];
			}
		}

		$guests_dropdown = jomresHTML::integerSelectList(0, $total_adult_slots_available_these_dates, 1, 'standard_guests', 'size="1" class="input-mini"  autocomplete="off" onchange="getResponse_standardguests();"', 2, '%02d', $use_bootstrap_radios = false);

		$standard_guests[] = array (
			"GUESTS_DROPDOWN" => $guests_dropdown ,
			'TEXT' => jr_gettext('JOMRES_GUEST_BOOKING_FORM_LABEL', 'JOMRES_GUEST_BOOKING_FORM_LABEL')  ,
			'INFO' => jr_gettext('JOMRES_GUEST_BOOKING_FORM_LABELINFO', 'JOMRES_GUEST_BOOKING_FORM_LABELINFO')
		);

		return $standard_guests;
	}

	
}