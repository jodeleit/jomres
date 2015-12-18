<?php
/**
 * Core file
 *
 * @author Vince Wooll <sales@jomres.net>
 * @version Jomres 8
 * @package Jomres
 * @copyright	2005-2015 Vince Wooll
 * Jomres (tm) PHP, CSS & Javascript files are released under both MIT and GPL2 licenses. This means that you can choose the license that best suits your project, and use it accordingly.
 **/

// ################################################################
defined( '_JOMRES_INITCHECK' ) or die( '' );
// ################################################################

class j06000show_property_calendar
	{
	function __construct( $componentArgs = null )
		{
		// Must be in all minicomponents. Minicomponents with templates that can contain editable text should run $this->template_touch() else just return
		$MiniComponents = jomres_singleton_abstract::getInstance( 'mcHandler' );
		if ( $MiniComponents->template_touch ){$this->template_touchable = false;return;}

		$property_uid = (int) jomresGetParam( $_REQUEST, 'property_uid', '' );
		if (isset($componentArgs ['property_uid']))
			{
			$property_uid = (int)$componentArgs ['property_uid'];
			}
		
		$mrConfig     = getPropertySpecificSettings( $property_uid );

		if (!user_can_view_this_property($property_uid))
			return;
		
		if ( $mrConfig[ 'is_real_estate_listing' ] == 0 )
			{
			if ( $mrConfig[ 'singleRoomProperty' ] == 1 )
				{
				$MiniComponents->specificEvent( '06000', 'srp_calendar', array('output_now'=>true, 'property_uid'=>$property_uid , 'months_to_show' => 24 , 'show_just_month' => false) );
				}
			else
				{
				$MiniComponents->specificEvent( '06000', 'mrp_calendar', array('output_now'=>true, 'property_uid'=>$property_uid , 'months_to_show' => 24 , 'show_just_month' => false) );
				}
			}
		}



	function getRetVals()
		{
		return $this->retVals;
		}
		
	}

?>