<?php
define ('CACHE_SIZE', 250);
define ('CACHE_CLEAR', 5);
define ('CACHE_USE', FALSE);
define ('VERSION', '1.15');
define ('DIRECTORY_CACHE', './cache');
define ('DIRECTORY_TEMP', './temp');
define ('MAX_WIDTH', 1000);
define ('MAX_HEIGHT', 1000);
$allowedSites = array (
	'flickr.com',
	'picasa.com',
	'blogger.com',
	'wordpress.com',
	'img.youtube.com',
);
if (!function_exists('imagecreatetruecolor')) {
	display_error('GD Library Error: imagecreatetruecolor does not exist - please contact your webhost and ask them to install the GD library');
}
if (function_exists ('imagefilter') && defined ('IMG_FILTER_NEGATE')) {
	$imageFilters = array (
	1 => array (IMG_FILTER_NEGATE, 0),
	2 => array (IMG_FILTER_GRAYSCALE, 0),
	3 => array (IMG_FILTER_BRIGHTNESS, 1),
	4 => array (IMG_FILTER_CONTRAST, 1),
	5 => array (IMG_FILTER_COLORIZE, 4),
	6 => array (IMG_FILTER_EDGEDETECT, 0),
	7 => array (IMG_FILTER_EMBOSS, 0),
	8 => array (IMG_FILTER_GAUSSIAN_BLUR, 0),
	9 => array (IMG_FILTER_SELECTIVE_BLUR, 0),
	10 => array (IMG_FILTER_MEAN_REMOVAL, 0),
	11 => array (IMG_FILTER_SMOOTH, 0),
	);
}
$src = get_request ('src', '');
if ($src == '' || strlen ($src) <= 3) {
	display_error ('no image specified');
}
$src = clean_source ($src);
$lastModified = filemtime ($src);
$new_width = preg_replace ("/[^0-9]+/", '', get_request('w', 0));
$new_height = preg_replace ("/[^0-9]+/", '', get_request('h', 0));
$zoom_crop = preg_replace ("/[^0-9]+/", '', get_request('zc', 1));
$quality = preg_replace ("/[^0-9]+/", '', get_request('q', 90));
$align = get_request ('a', 'c');
$filters = get_request ('f', '');
$sharpen = get_request ('s', 0);
if ($new_width == 0 && $new_height == 0) {
	$new_width = 100;
	$new_height = 100;
}
if ($new_width > MAX_WIDTH) {
	$new_width = MAX_WIDTH;
}
if ($new_height > MAX_HEIGHT) {
	$new_height = MAX_HEIGHT;
}
$mime_type = mime_type ($src);
check_cache ($mime_type);
clean_cache();
ini_set ('memory_limit', '50M');
if (!valid_src_mime_type ($mime_type)) {
	display_error ('Invalid src mime type: ' . $mime_type);
}
if (strlen ($src) && file_exists ($src)) {
	$image = open_image ($mime_type, $src);
	if ($image === false) {
		display_error ('Unable to open image : ' . $src);
	}
	$width = imagesx ($image);
	$height = imagesy ($image);

	if ($new_width && !$new_height) {
		$new_height = $height * ($new_width / $width);

	} elseif ($new_height && !$new_width) {
		$new_width = $width * ($new_height / $height);

	} elseif (!$new_width && !$new_height) {
		$new_width = $width;
		$new_height = $height;

	}
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);
	$color = imagecolorallocatealpha ($canvas, 0, 0, 0, 127);
	imagefill ($canvas, 0, 0, $color);
	imagesavealpha ($canvas, true);

	if ($zoom_crop) {
		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;
		$cmp_x = $width  / $new_width;
		$cmp_y = $height / $new_height;
		if ($cmp_x > $cmp_y) {
			$src_w = round (($width / $cmp_x * $cmp_y));
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);
		} elseif ($cmp_y > $cmp_x) {
			$src_h = round (($height / $cmp_y * $cmp_x));
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

		}
		switch ($align) {
			case 't':
			case 'tl':
			case 'lr':
			case 'tr':
			case 'rt':
				$src_y = 0;
				break;

			case 'b':
			case 'bl':
			case 'lb':
			case 'br':
			case 'rb':
				$src_y = $height - $src_h;
				break;

			case 'l':
			case 'tl':
			case 'lt':
			case 'bl':
			case 'lb':
				$src_x = 0;
				break;

			case 'r':
			case 'tr':
			case 'rt':
			case 'br':
			case 'rb':
				$src_x = $width - $new_width;
				$src_x = $width - $src_w;
				break;

			default:
				break;
		}
		imagecopyresampled ($canvas, $image, 0, 0, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);
	} else {
		imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

	}
	if ($filters != '' && function_exists ('imagefilter') && defined ('IMG_FILTER_NEGATE')) {
		$filterList = explode ('|', $filters);
		foreach ($filterList as $fl) {
			$filterSettings = explode (',', $fl);
			if (isset ($imageFilters[$filterSettings[0]])) {
				for ($i = 0; $i < 4; $i ++) {
					if (!isset ($filterSettings[$i])) {
						$filterSettings[$i] = null;
					}else{
						$filterSettings[$i] = (int) $filterSettings[$i];
					}
				}
				switch ($imageFilters[$filterSettings[0]][1]) {
					case 1:
						imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1]);
						break;
					case 2:
						imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2]);
						break;
					case 3:
						imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2], $filterSettings[3]);
						break;
					case 4:
						imagefilter ($canvas, $imageFilters[$filterSettings[0]][0], $filterSettings[1], $filterSettings[2], $filterSettings[3], $filterSettings[4]);
						break;
					default:
						imagefilter ($canvas, $imageFilters[$filterSettings[0]][0]);
						break;
				}
			}
		}
	}

	if ($sharpen > 0 && function_exists ('imageconvolution')) {
		$sharpenMatrix = array (
			array (-1,-1,-1),
			array (-1,16,-1),
			array (-1,-1,-1),
		);
		$divisor = 8;
		$offset = 0;
		imageconvolution ($canvas, $sharpenMatrix, $divisor, $offset);
	}
	show_image ($mime_type, $canvas);
	imagedestroy ($canvas);
}else{
	if (strlen ($src)) {
		display_error ('image ' . $src . ' not found');
	}else{
		display_error ('no source specified');
	}
}
function show_image ($mime_type, $image_resized) {
	global $quality;
	$is_writable = 0;
	$cache_file = get_cache_file ($mime_type);
	if (touch ($cache_file)) {
		chmod ($cache_file, 0666);
		$is_writable = 1;
	} else {
		$cache_file = NULL;
		header ('Content-type: ' . $mime_type);
	}
	if (stristr ($mime_type, 'jpeg')) {
		imagejpeg ($image_resized, $cache_file, $quality);
	} else {
		$quality = floor ($quality * 0.09);
		imagepng ($image_resized, $cache_file, $quality);
	}

	if ($is_writable) {
		show_cache_file ($mime_type);
	}

	imagedestroy ($image_resized);

	//display_error ('error showing image');

}

/**
 *
 */
function get_request ($property, $default = 0) {

	if (isset($_REQUEST[$property])) {

		return $_REQUEST[$property];

	} else {

		return $default;

	}

}

/**
 *
 */
function open_image ($mime_type, $src) {

	$mime_type = strtolower ($mime_type);

	if (stristr ($mime_type, 'gif')) {

		$image = imagecreatefromgif($src);

	} elseif (stristr ($mime_type, 'jpeg')) {

		@ini_set ('gd.jpeg_ignore_warning', 1);
		$image = imagecreatefromjpeg($src);

	} elseif (stristr ($mime_type, 'png')) {

		$image = imagecreatefrompng($src);

	}

	return $image;

}

/**
 * clean out old files from the cache
 * you can change the number of files to store and to delete per loop in the defines at the top of the code
 */
function clean_cache() {

	// add an escape
	// Reduces the amount of cache clearing to save some processor speed
	if (rand (1, 200) > 10) {
		return true;
	}

	$files = glob (DIRECTORY_CACHE . '/*', GLOB_BRACE);

	if (count ($files) > 0) {

		$yesterday = time () - (24 * 60 * 60);

		usort ($files, 'filemtime_compare');
		$i = 0;

		if (count($files) > CACHE_SIZE) {

			foreach ($files as $file) {

				$i ++;

				if ($i >= CACHE_CLEAR) {
					return;
				}

				if (@filemtime($file) > $yesterday) {
					return;
				}

				if (file_exists($file)) {
					unlink($file);
				}

			}

		}

	}

}


/**
 * compare the file time of two files
 */
function filemtime_compare($a, $b) {

	$break = explode ('/', $_SERVER['SCRIPT_FILENAME']);
	$filename = $break[count($break) - 1];
	$filepath = str_replace ($filename, '', $_SERVER['SCRIPT_FILENAME']);

	$file_a = realpath ($filepath . $a);
	$file_b = realpath ($filepath . $b);

	return filemtime ($file_a) - filemtime ($file_b);

}


/**
 * determine the file mime type
 */
function mime_type ($file) {

	if (stristr (PHP_OS, 'WIN')) {
		$os = 'WIN';
	} else {
		$os = PHP_OS;
	}

	$mime_type = '';

	if (function_exists ('mime_content_type') && $os != 'WIN') {
		$mime_type = mime_content_type ($file);
	}

	// use PECL fileinfo to determine mime type
	if (!valid_src_mime_type ($mime_type)) {
		if (function_exists ('finfo_open')) {
			$finfo = @finfo_open (FILEINFO_MIME);
			if ($finfo != '') {
				$mime_type = finfo_file ($finfo, $file);
				finfo_close ($finfo);
			}
		}
	}

	// try to determine mime type by using unix file command
	// this should not be executed on windows
	if (!valid_src_mime_type ($mime_type) && $os != "WIN") {
		if (preg_match ("/FreeBSD|FREEBSD|LINUX/", $os)) {
			$mime_type = trim (@shell_exec ('file -bi ' . escapeshellarg($file)));
		}
	}

	// use file's extension to determine mime type
	if (!valid_src_mime_type ($mime_type)) {

		// set defaults
		$mime_type = 'image/png';
		// file details
		$fileDetails = pathinfo ($file);
		$ext = strtolower ($fileDetails["extension"]);
		// mime types
		$types = array (
             'jpg'  => 'image/jpeg',
             'jpeg' => 'image/jpeg',
             'png'  => 'image/png',
             'gif'  => 'image/gif'
             );

             if (strlen ($ext) && strlen ($types[$ext])) {
             	$mime_type = $types[$ext];
             }

	}

	return $mime_type;

}


/**
 *
 */
function valid_src_mime_type ($mime_type) {

	if (preg_match ("/jpg|jpeg|gif|png/i", $mime_type)) {
		return true;
	}

	return false;

}
function check_cache ($mime_type) {
	if (CACHE_USE) {
		if (!file_exists (DIRECTORY_CACHE)) {
			mkdir (DIRECTORY_CACHE);
			chmod (DIRECTORY_CACHE, 0777);
		}
		show_cache_file ($mime_type);
	}

}
function show_cache_file ($mime_type) {
	$cache_file = get_cache_file ($mime_type);
	if (file_exists ($cache_file)) {
		$gmdate_mod = gmdate ("D, d M Y H:i:s", filemtime($cache_file));
		if (! strstr ($gmdate_mod, "GMT")) {
			$gmdate_mod .= " GMT";
		}
		if (isset ($_SERVER["HTTP_IF_MODIFIED_SINCE"])) {
			$if_modified_since = preg_replace ("/;.*$/", "", $_SERVER["HTTP_IF_MODIFIED_SINCE"]);
			if ($if_modified_since == $gmdate_mod) {
				header ('HTTP/1.1 304 Not Modified');
				die();
			}

		}
		clearstatcache ();
		$fileSize = filesize ($cache_file);
		header ('Content-Type: ' . $mime_type);
		header ('Accept-Ranges: bytes');
		header ('Last-Modified: ' . $gmdate_mod);
		header ('Content-Length: ' . $fileSize);
		header ('Cache-Control: max-age=9999, must-revalidate');
		header ('Expires: ' . $gmdate_mod);
		if (!@readfile ($cache_file)) {
			$content = file_get_contents ($cache_file);
			if ($content != FALSE) {
				echo $content;
			} else {
				display_error ('cache file could not be loaded');
			}
		}
		die();
	}
}
function get_cache_file ($mime_type) {
	global $lastModified;
	static $cache_file;
	$file_type = '.png';
	if (stristr ($mime_type, 'jpeg')) {
		$file_type = '.jpg';
	}
	if (!$cache_file) {
		$cache_file = DIRECTORY_CACHE . '/' . md5 ($_SERVER ['QUERY_STRING'] . VERSION . $lastModified) . $file_type;
	}
	return $cache_file;
}
function valid_extension ($ext) {
	if (preg_match ("/jpg|jpeg|png|gif/i", $ext)) {
		return TRUE;
	} else {
		return FALSE;
	}
}
function check_external ($src) {
	global $allowedSites;
	if (preg_match ('/http:\/\//', $src) == true) {
		$url_info = parse_url ($src);
		$isAllowedSite = false;
		foreach ($allowedSites as $site) {
			$site = '/' . addslashes ($site) . '/';
			if (preg_match ($site, $url_info['host']) == true) {
				$isAllowedSite = true;
			}
		}
		if ($isAllowedSite) {
			$fileDetails = pathinfo ($src);
			$ext = strtolower ($fileDetails['extension']);
			$filename = md5 ($src);
			$local_filepath = DIRECTORY_TEMP . '/' . $filename . '.' . $ext;
			if (!file_exists ($local_filepath)) {
				if (function_exists ('curl_init')) {
					$fh = fopen ($local_filepath, 'w');
					$ch = curl_init ($src);
					curl_setopt ($ch, CURLOPT_URL, $src);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
					curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt ($ch, CURLOPT_HEADER, 0);
					curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.5) Gecko/20041107 Firefox/1.0');
					curl_setopt ($ch, CURLOPT_FILE, $fh);
					if (curl_exec ($ch) === FALSE) {
						if (file_exists ($local_filepath)) {
							unlink ($local_filepath);
						}
						display_error ('error reading file ' . $src . ' from remote host: ' . curl_error($ch));
					}
					curl_close ($ch);
					fclose ($fh);
				} else {
					if (!$img = file_get_contents($src)) {
						display_error('remote file for ' . $src . ' can not be accessed. It is likely that the file permissions are restricted');
					}
					if (file_put_contents ($local_filepath, $img) == FALSE) {
						display_error ('error writing temporary file');
					}
				}
				if (!file_exists($local_filepath)) { display_error('local file for ' . $src . ' can not be created'); }
			}
			$src = $local_filepath;
		} else { display_error('remote host "' . $url_info['host'] . '" not allowed'); }
	}
	return $src;
}
function clean_source ($src) {
	$host = str_replace ('www.', '', $_SERVER['HTTP_HOST']);
	$regex = "/^((ht|f)tp(s|):\/\/)(www\.|)" . $host . "/i";
	$src = preg_replace ($regex, '', $src);
	$src = strip_tags ($src);
	$src = check_external ($src);
	if (strpos ($src, '/') === 0) {
		$src = substr ($src, -(strlen ($src) - 1));
	}
	$src = preg_replace ("/\.\.+\//", "", $src);
	$src = get_document_root ($src) . '/' . $src;
	return $src;

}
function get_document_root ($src) {
	if (file_exists ($_SERVER['DOCUMENT_ROOT'] . '/' . $src)) {
		return $_SERVER['DOCUMENT_ROOT'];
	}
	$parts = array_diff (explode ('/', $_SERVER['SCRIPT_FILENAME']), explode('/', $_SERVER['DOCUMENT_ROOT']));
	$path = $_SERVER['DOCUMENT_ROOT'];
	foreach ($parts as $part) {
		$path .= '/' . $part;
		if (file_exists($path . '/' . $src)) {
			return $path;
		}
	}
	$paths = array (
        ".",
        "..",
        "../..",
        "../../..",
        "../../../..",
        "../../../../.."
        );
        foreach ($paths as $path) {
        	if (file_exists($path . '/' . $src)) {
        		return $path;
        	}
        }
        if (!isset ($_SERVER['DOCUMENT_ROOT'])) {
        	$path = str_replace ("/", "\\", $_SERVER['ORIG_PATH_INFO']);
        	$path = str_replace ($path, "", $_SERVER['SCRIPT_FILENAME']);

        	if (file_exists ($path . '/' . $src)) {
        		return $path;
        	}
        }
        display_error ('file not found ' . $src, ENT_QUOTES);
}
function display_error ($errorString = '') {
	header ('HTTP/1.1 400 Bad Request');
	echo '<pre>' . htmlentities($errorString);
	echo '<br />Query String : ' . htmlentities($_SERVER['QUERY_STRING']);
	echo '<br />TimThumb version : ' . VERSION . '</pre>';
	die();
}
?>