<?php

/**
 * QueryLibrary | library tests
 */

namespace jarne\querylibrary;

use jarne\querylibrary\utils\Result;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \jarne\querylibrary\QueryLibrary
 */
class QueryLibraryTest extends TestCase
{
    /**
     * Test if the fetching in general is working
     *
     * @covers ::fetch
     */
    public function testFetchingGeneral(): Result
    {
        $queryLibrary = new QueryLibrary();
        $fetchedData = $queryLibrary->fetch("127.0.0.1");

        $this->assertTrue($fetchedData->isStatus());

        return $fetchedData;
    }

    /**
     * Test if the IP value is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getIp
     */
    public function testIp(Result $fetchedData): void
    {
        $this->assertEquals("0.0.0.0", $fetchedData->getIp());
    }

    /**
     * Test if the port value is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getPort
     */
    public function testPort(Result $fetchedData): void
    {
        $this->assertEquals(19132, $fetchedData->getPort());
    }

    /**
     * Check the game type
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getGameType
     */
    public function testGameType(Result $fetchedData): void
    {
        $this->assertEquals("SMP", $fetchedData->getGameType());
    }

    /**
     * Check if the game ID is the right one
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getGameId
     */
    public function testGameId(Result $fetchedData): void
    {
        $this->assertEquals("MINECRAFTPE", $fetchedData->getGameId());
    }

    /**
     * Check if the version string contains a v for version
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getVersion
     */
    public function testVersion(Result $fetchedData): void
    {
        $this->assertStringContainsString("v", $fetchedData->getVersion());
    }

    /**
     * Test if the server engine string contains the name of the server software
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getServerEngine
     */
    public function testServerEngine(Result $fetchedData): void
    {
        $this->assertStringContainsString("PocketMine-MP", $fetchedData->getServerEngine());
    }

    /**
     * Test if the MOTD is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getMotd
     */
    public function testWorld(Result $fetchedData): void
    {
        $this->assertEquals("PocketMine-MP Server", $fetchedData->getMotd());
    }

    /**
     * Check if the whitelist is false (disabled by default)
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::isWhitelist
     */
    public function testWhitelist(Result $fetchedData): void
    {
        $this->assertFalse($fetchedData->isWhitelist());
    }

    /**
     * Check the count of online players (should be 0)
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getOnlinePlayers
     */
    public function testOnlinePlayers(Result $fetchedData): void
    {
        $this->assertEquals(0, $fetchedData->getOnlinePlayers());
    }

    /**
     * Test if the max players count is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getMaxPlayers
     */
    public function testMaxPlayers(Result $fetchedData): void
    {
        $this->assertEquals(20, $fetchedData->getMaxPlayers());
    }

    /**
     * Check if the default level name is correct (always world)
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getDefaultLevelName
     */
    public function testDefaultLevelName(Result $fetchedData): void
    {
        $this->assertTrue(
            ($fetchedData->getDefaultLevelName() === "world")
            or ($fetchedData->getDefaultLevelName() === "unknown")
        );
    }

    /**
     * Check if the plugins string contains the name of the server software
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getPlugins
     */
    public function testPlugins(Result $fetchedData): void
    {
        $this->assertStringContainsString("PocketMine-MP", $fetchedData->getPlugins());
    }

    /**
     * Test if the player names list is empty because no player should be online
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     * @covers \jarne\querylibrary\utils\Result::getPlayerNames
     */
    public function testPlayerNames(Result $fetchedData): void
    {
        $this->assertCount(0, $fetchedData->getPlayerNames());
    }
}
