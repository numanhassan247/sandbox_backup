<?php

class ctwitter_stream {

    private $m_username;
    private $m_password;

    public function __construct() {
        //
        // set a time limit to unlimited
        //
        set_time_limit(0);
    }

    //
    // set the login details
    //
    public function login($_username, $_password) {
        $this->m_username = $_username;
        $this->m_password = $_password;
    }

    //
    // process a tweet object from the stream
    //
    private function process_tweet(array $_data) {
        print_r($_data);

        return true;
    }

    //
    // the main stream manager
    //
    public function start(array $_keywords) {
        while (1) {
            $fp = fsockopen("ssl://stream.twitter.com", 443, $errno, $errstr, 30);
            if (!$fp) {
                echo "ERROR: Twitter Stream Error: failed to open socket";
            } else {
                //
                // build the request
                //
                $request = "GET /1/statuses/filter.json?track=";
                $request .= urlencode(implode($_keywords, ',')) . " HTTP/1.1\r\n";
                $request .= "Host: stream.twitter.com\r\n";
                $request .= "Authorization: Basic ";
                $request .= base64_encode($this->m_username . ':' . $this->m_password);
                $request .= "\r\n\r\n";

                //
                // write the request
                //
                fwrite($fp, $request);

                //
                // set it to non-blocking
                //
                stream_set_blocking($fp, 0);

                while (!feof($fp)) {
                    $read = array($fp);
                    $write = null;
                    $except = null;

                    //
                    // select, waiting up to 10 minutes for a tweet; if we don't get one, then
                    // then reconnect, because it's possible something went wrong.
                    //
                    $res = stream_select($read, $write, $except, 600, 0);
                    if (($res == false) || ($res == 0)) {
                        break;
                    }

                    //
                    // read the JSON object from the socket
                    //
                    $json = fgets($fp);
                    if (($json !== false) && (strlen($json) > 0)) {
                        //
                        // decode the socket to a PHP array
                        //
                        $data = json_decode($json, true);
                        if ($data) {
                            //
                            // process it
                            //
                            $this->process_tweet($data);
                        }
                    }
                }
            }

            fclose($fp);
            sleep(10);
        }

        return;
    }

}

;
?>
