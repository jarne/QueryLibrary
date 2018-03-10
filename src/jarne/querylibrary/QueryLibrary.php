<?php
/**
 * Created by PhpStorm.
 * User: jarne
 * Date: 07.12.17
 * Time: 17:59
 */

namespace jarne\querylibrary;

use jarne\querylibrary\utils\Result;

class QueryLibrary {
    /**
     * Fetch query information of a server
     *
     * @param string $ip
     * @param int $port
     * @param int $timeoutSeconds
     * @return Result
     */
    public function fetch(string $ip, int $port = 19132, int $timeoutSeconds = 5): Result {
        $result = new Result();

        if($socket = fsockopen("udp://" . $ip, $port)) {
            socket_set_timeout($socket, $timeoutSeconds);

            if(fwrite($socket, "\xFE\xFD\x09\x10\x20\x30\x40")) {
                if($firstResponse = fread($socket, 1024)) {
                    $challenge = str_replace("\x09\x10\x20\x30\x40", "", $firstResponse);
                    $challengeToken = pack("N", $challenge);

                    if(fwrite($socket, "\xFE\xFD\x00\x10\x20\x30\x40" . $challengeToken . "\xFF\xFF\xFF\x01")) {
                        if($informationResponse = fread($socket, 4096)) {
                            $informationParts = explode("\0", str_replace("\x01", "", substr($informationResponse, 16)));

                            $nextIsValue = false;
                            $whatIsNext = "";

                            $playerNamesArray = array();

                            for ($i = 0; $i < count($informationParts); $i++) {
                                $currentValue = $informationParts[$i];

                                if (strlen($currentValue) > 0) {
                                    if ($nextIsValue) {
                                        switch ($whatIsNext) {
                                            case "hostname":
                                                $result->setMotd($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "gametype":
                                                $result->setGameType($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "game_id":
                                                $result->setGameId($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "version":
                                                $result->setVersion($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "server_engine":
                                                $result->setServerEngine($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "plugins":
                                                $result->setPlugins($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "map":
                                                $result->setDefaultLevelName($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "numplayers":
                                                $result->setOnlinePlayers($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "maxplayers":
                                                $result->setMaxPlayers($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "whitelist":
                                                switch ($currentValue) {
                                                    case "on":
                                                        $result->setWhitelist(true);
                                                        break;
                                                    case "off":
                                                        $result->setWhitelist(false);
                                                        break;
                                                }

                                                $nextIsValue = false;
                                                break;
                                            case "hostip":
                                                $result->setIp($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "hostport":
                                                $result->setPort($currentValue);

                                                $nextIsValue = false;
                                                break;
                                            case "player_":
                                                $playerNamesArray[] = $currentValue;
                                                break;
                                        }
                                    } else {
                                        $nextIsValue = true;
                                        $whatIsNext = $currentValue;
                                    }
                                }
                            }

                            $result->setStatus(true);
                            $result->setPlayerNames($playerNamesArray);
                        }
                    }
                }
            }
        }

        return $result;
    }
}
