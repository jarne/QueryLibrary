<?php
/**
 * Created by PhpStorm.
 * User: jarne
 * Date: 07.12.17
 * Time: 19:08
 */

namespace jarne\querylibrary\utils;

class Result {
    /* @var bool */
    private $status;

    /* @var string */
    private $ip;

    /* @var int */
    private $port;

    /* @var string */
    private $gameType;

    /* @var string */
    private $gameId;

    /* @var string */
    private $version;

    /* @var string */
    private $serverEngine;

    /* @var string */
    private $motd;

    /* @var bool */
    private $whitelist;

    /* @var int */
    private $onlinePlayers;

    /* @var int */
    private $maxPlayers;

    /* @var string */
    private $defaultLevelName;

    /* @var string */
    private $plugins;

    /* @var array */
    private $playerNames;

    public function __construct() {
        $this->status = false;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status) {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getIp(): string {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip) {
        $this->ip = $ip;
    }

    /**
     * @return int
     */
    public function getPort(): int {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort(int $port) {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getGameType(): string {
        return $this->gameType;
    }

    /**
     * @param string $gameType
     */
    public function setGameType(string $gameType) {
        $this->gameType = $gameType;
    }

    /**
     * @return string
     */
    public function getGameId(): string {
        return $this->gameId;
    }

    /**
     * @param string $gameId
     */
    public function setGameId(string $gameId) {
        $this->gameId = $gameId;
    }

    /**
     * @return string
     */
    public function getVersion(): string {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version) {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getServerEngine(): string {
        return $this->serverEngine;
    }

    /**
     * @param string $serverEngine
     */
    public function setServerEngine(string $serverEngine) {
        $this->serverEngine = $serverEngine;
    }

    /**
     * @return string
     */
    public function getMotd(): string {
        return $this->motd;
    }

    /**
     * @param string $motd
     */
    public function setMotd(string $motd) {
        $this->motd = $motd;
    }

    /**
     * @return bool
     */
    public function isWhitelist(): bool {
        return $this->whitelist;
    }

    /**
     * @param bool $whitelist
     */
    public function setWhitelist(bool $whitelist) {
        $this->whitelist = $whitelist;
    }

    /**
     * @return int
     */
    public function getOnlinePlayers(): int {
        return $this->onlinePlayers;
    }

    /**
     * @param int $onlinePlayers
     */
    public function setOnlinePlayers(int $onlinePlayers) {
        $this->onlinePlayers = $onlinePlayers;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int {
        return $this->maxPlayers;
    }

    /**
     * @param int $maxPlayers
     */
    public function setMaxPlayers(int $maxPlayers) {
        $this->maxPlayers = $maxPlayers;
    }

    /**
     * @return string
     */
    public function getDefaultLevelName(): string {
        return $this->defaultLevelName;
    }

    /**
     * @param string $defaultLevelName
     */
    public function setDefaultLevelName(string $defaultLevelName) {
        $this->defaultLevelName = $defaultLevelName;
    }

    /**
     * @return string
     */
    public function getPlugins(): string {
        return $this->plugins;
    }

    /**
     * @param string $plugins
     */
    public function setPlugins(string $plugins) {
        $this->plugins = $plugins;
    }

    /**
     * @return array
     */
    public function getPlayerNames(): array {
        return $this->playerNames;
    }

    /**
     * @param array $playerNames
     */
    public function setPlayerNames(array $playerNames) {
        $this->playerNames = $playerNames;
    }
}