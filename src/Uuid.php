<?php

namespace Mux\Uuid;

use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

class Uuid {

	public function __construct() {
	}

	public function v4() {
		$uuid4 = \Rhumsaa\Uuid\Uuid::uuid4();
		return $uuid4->toString();
	}

	public function isValid($uuid) {
		$pattern = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i';
		if (!preg_match($pattern, $uuid)) {
			return false;
		}
		return true;
	}

	public static function removeDashes($uuid) {
		return str_replace("-", "", $uuid);
	}

	public static function addDashes($uuid) {
		return substr($uuid, 0, 8).'-'
			.substr($uuid, 8, 4).'-'
			.substr($uuid,12, 4).'-'
			.substr($uuid,16, 4).'-'
			.substr($uuid,20,12);
	}

	public static function hash16to62($hash) {
		return gmp_strval(gmp_init($hash, 16), 62);
	}

	public static function hash62to16($hash) {
		return gmp_strval(gmp_init($hash, 62), 16);
	}


}
