<?php

namespace MPHB\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * This facade must contain all methods for working with rooms and
 * accommodation types that are called from outside the core (from
 * templates, shortcodes, Gutenberg blocks, Ajax commands, REST API
 * controllers, other plugins and themes).
 */
class RoomsCoreAPIFacade extends AbstractCoreAPIFacade {

	protected function getHookNamesForClearAllCache(): array {
		return array(
			'save_post_' . MPHB()->postTypes()->room()->getPostType(),
			'save_post_' . MPHB()->postTypes()->roomType()->getPostType(),
		);
	}


	/**
	 * @return int[] ids of all room types on main language
	 */
	public function getAllRoomTypeOriginalIds() {

		$cacheDataId = 'getAllRoomTypeOriginalIds';
		$result      = $this->getCachedData( $cacheDataId );

		if ( static::CACHED_DATA_NOT_FOUND === $result ) {

			$result = MPHB()->getRoomTypePersistence()->getPosts(
				array(
					'mphb_language' => 'original',
				)
			);

			$this->setCachedData( $cacheDataId, '', $result );
		}

		return $result;
	}

	/**
	 * @return \MPHB\Entities\RoomType or null if nothing is found
	 */
	public function getRoomTypeById( int $roomTypeId ) {
		// we already have entities cache by id in repository!
		return MPHB()->getRoomTypeRepository()->findById( $roomTypeId );
	}

	/**
	 * @return int
	 */
	public function getActiveRoomsCountForRoomType( int $roomTypeOriginalId ) {

		$cacheDataId = 'getActiveRoomsCountForRoomType' . $roomTypeOriginalId;
		$result      = $this->getCachedData( $cacheDataId );

		if ( static::CACHED_DATA_NOT_FOUND === $result ) {

			$result = RoomAvailabilityHelper::getActiveRoomsCountForRoomType( $roomTypeOriginalId );

			$this->setCachedData( $cacheDataId, '', $result );
		}

		return $result;
	}
}
