<?php

/**
 * QueryLibrary | result class
 */

namespace jarne\querylibrary\utils;

class Result
{
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

    public function __construct()
    {
        $this->status = false;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * @param string $ip
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    /**
     * @return int
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @param int $port
     */
    public function setPort(int $port): void
    {
        $this->port = $port;
    }

    /**
     * @return string
     */
    public function getGameType(): string
    {
        return $this->gameType;
    }

    /**
     * @param string $gameType
     */
    public function setGameType(string $gameType): void
    {
        $this->gameType = $gameType;
    }

    /**
     * @return string
     */
    public function getGameId(): string
    {
        return $this->gameId;
    }

    /**
     * @param string $gameId
     */
    public function setGameId(string $gameId): void
    {
        $this->gameId = $gameId;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     */
    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getServerEngine(): string
    {
        return $this->serverEngine;
    }

    /**
     * @param string $serverEngine
     */
    public function setServerEngine(string $serverEngine): void
    {
        $this->serverEngine = $serverEngine;
    }

    /**
     * @return string
     */
    public function getMotd(): string
    {
        return $this->motd;
    }

    /**
     * @param string $motd
     */
    public function setMotd(string $motd): void
    {
        $this->motd = $motd;
    }

    /**
     * @return bool
     */
    public function isWhitelist(): bool
    {
        return $this->whitelist;
    }

    /**
     * @param bool $whitelist
     */
    public function setWhitelist(bool $whitelist): void
    {
        $this->whitelist = $whitelist;
    }

    /**
     * @return int
     */
    public function getOnlinePlayers(): int
    {
        return $this->onlinePlayers;
    }

    /**
     * @param int $onlinePlayers
     */
    public function setOnlinePlayers(int $onlinePlayers): void
    {
        $this->onlinePlayers = $onlinePlayers;
    }

    /**
     * @return int
     */
    public function getMaxPlayers(): int
    {
        return $this->maxPlayers;
    }

    /**
     * @param int $maxPlayers
     */
    public function setMaxPlayers(int $maxPlayers): void
    {
        $this->maxPlayers = $maxPlayers;
    }

    /**
     * @return string
     */
    public function getDefaultLevelName(): string
    {
        return $this->defaultLevelName;
    }

    /**
     * @param string $defaultLevelName
     */
    public function setDefaultLevelName(string $defaultLevelName): void
    {
        $this->defaultLevelName = $defaultLevelName;
    }

    /**
     * @return string
     */
    public function getPlugins(): string
    {
        return $this->plugins;
    }

    /**
     * @param string $plugins
     */
    public function setPlugins(string $plugins): void
    {
        $this->plugins = $plugins;
    }

    /**
     * @return array
     */
    public function getPlayerNames(): array
    {
        return $this->playerNames;
    }

    /**
     * @param array $playerNames
     */
    public function setPlayerNames(array $playerNames): void
    {
        $this->playerNames = $playerNames;
    }
}
