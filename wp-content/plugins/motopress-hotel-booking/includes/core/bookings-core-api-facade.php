<?php

namespace MPHB\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This facade must contain all methods for working with bookings that
 * are called from outside the core (from templates, shortcodes,
 * Gutenberg blocks, Ajax commands, REST API controllers,
 * other plugins and themes).
 */
class BookingsCoreAPIFacade extends AbstractCoreAPIFacade {


	protected function getHookNamesForClearAllCache(): array {
		return array(
			'mphb_booking_status_changed',
			'save_post_' . MPHB()->postTypes()->room()->getPostType(),
			'save_post_' . MPHB()->postTypes()->roomType()->getPostType(),
			// TODO: much better take into account only edit confirmed bookings
			'save_post_' . MPHB()->postTypes()->booking()->getPostType(),
			'update_option_mphb_buffer_days',
			'update_option_mphb_do_not_apply_booking_rules_for_admin',
		);
	}

	/**
	 * @return array with [
	 *      'booked' => [ 'Y-m-d' => rooms count, ... ],
	 *      'check-ins' => [ 'Y-m-d' => rooms count, ... ],
	 *      'check-outs' => [ 'Y-m-d' => rooms count, ... ],
	 * ]
	 */
	public function getBookedDaysForRoomType( int $roomTypeOriginalId ) {

		$cacheDataId = 'getBookedDaysForRoomType';
		$result      = $this->getCachedData( $cacheDataId );

		if ( static::CACHED_DATA_NOT_FOUND === $result ) {

			$result = RoomAvailabilityHelper::getBookedDays();

			$this->setCachedData( $cacheDataId, '', $result );
		}

		return isset( $result[ $roomTypeOriginalId ] ) ? $result[ $roomTypeOriginalId ] : array();
	}

	/**
	 * @param $considerCheckIn - if true then check-in date considered as booked if there is no any available room
	 * @param $considerCheckOut - if true then check-out date considered as booked if there is no any available room
	 * @return true if given date is booked (there is no any available room)
	 */
	public function isBookedDate( int $roomTypeOriginalId, \DateTime $requestedDate, $considerCheckIn = true, $considerCheckOut = false ) {

		$cacheDataId = 'isBookedDate' . $roomTypeOriginalId;
		$dataSubId   = $requestedDate->format( 'Y-m-d' ) . '_' . ( $considerCheckIn ? '1' : '0' ) . '_' . ( $considerCheckOut ? '1' : '0' );
		$result      = $this->getCachedData( $cacheDataId, $dataSubId );

		if ( static::CACHED_DATA_NOT_FOUND === $result ) {

			$result = RoomAvailabilityHelper::isBookedDate( $roomTypeOriginalId, $requestedDate, $considerCheckIn, $considerCheckOut );

			$this->setCachedData( $cacheDataId, $dataSubId, $result );
		}

		return $result;
	}
}
