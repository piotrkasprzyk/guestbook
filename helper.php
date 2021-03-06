<?php
require_once "config.php";
require_once "bad_words.php";

function get_hash($s) {
    global $secret_string;
    return sha1($s . $secret_string);
};

function base64_url_encode($input) {
    return strtr(base64_encode($input), '+/=', '-_.');
};

function base64_url_decode($input) {
    return base64_decode(strtr($input, '-_.', '+/='));
};

function pack_params($params) {
    $params['_ts'] = time();
    $params['_h'] = get_hash(http_build_query($params));
    return base64_url_encode(gzcompress(http_build_query($params)));
};

function unpack_params($s) {
    $param_string = gzuncompress(base64_url_decode($s));

    parse_str($param_string, $params);

    if (!isset($params['_h'])) {
        return null;
    }
    $hash = $params['_h'];
    unset($params['_h']);

    if (!isset($params['_ts'])) {
        // wtf?
        return null;
    }

    if ($hash !== get_hash(http_build_query($params))) {
        return null;
    }

    // TODO: this can be used to expire links
    unset($params['_ts']);

    return $params;
};

function startswith($word, $prefix) {
    return substr($word, 0, strlen($prefix)) === $prefix;
}

function is_inappropriate($text) {
    global $bad_prefixes;
    $words = explode(' ', $text);
    foreach($words as $word) {
        $normalized_word = strtolower($word);
        foreach ($bad_prefixes as $banned) {
            if (startswith($normalized_word, $banned)) {
                return true;
            }
        }
    }
    return false;
}

?>