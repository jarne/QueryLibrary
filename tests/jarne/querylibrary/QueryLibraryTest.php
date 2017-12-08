<?php
/**
 * Created by PhpStorm.
 * User: jarne
 * Date: 07.12.17
 * Time: 17:59
 */

namespace jarne\querylibrary;

use jarne\querylibrary\utils\Result;
use PHPUnit\Framework\TestCase;

class QueryLibraryTest extends TestCase {
    /**
     * Test if the fetching in general is working
     */
    public function testFetchingGeneral() {
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
     */
    public function testIp(Result $fetchedData) {
        $this->assertEquals("0.0.0.0", $fetchedData->getIp());
    }

    /**
     * Test if the port value is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testPort(Result $fetchedData) {
        $this->assertEquals(19132, $fetchedData->getPort());
    }

    /**
     * Check the game type
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testGameType(Result $fetchedData) {
        $this->assertEquals("SMP", $fetchedData->getGameType());
    }

    /**
     * Check if the game ID is the right one
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testGameId(Result $fetchedData) {
        $this->assertEquals("MINECRAFTPE", $fetchedData->getGameId());
    }

    /**
     * Check if the version string contains a v for version
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testVersion(Result $fetchedData) {
        $this->assertContains("v", $fetchedData->getVersion());
    }

    /**
     * Test if the server engine string contains the name of the server software
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testServerEngine(Result $fetchedData) {
        $this->assertContains("PocketMine-MP", $fetchedData->getServerEngine());
    }

    /**
     * Test if the MOTD is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testWorld(Result $fetchedData) {
        $this->assertEquals("PocketMine-MP Server", $fetchedData->getMotd());
    }

    /**
     * Check if the whitelist is false (disabled by default)
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testWhitelist(Result $fetchedData) {
        $this->assertFalse($fetchedData->isWhitelist());
    }

    /**
     * Check the count of online players (should be 0)
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testOnlinePlayers(Result $fetchedData) {
        $this->assertEquals(0, $fetchedData->getOnlinePlayers());
    }

    /**
     * Test if the max players count is correct
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testMaxPlayers(Result $fetchedData) {
        $this->assertEquals(20, $fetchedData->getMaxPlayers());
    }

    /**
     * Check if the default level name is correct (always world)
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testDefaultLevelName(Result $fetchedData) {
        $this->assertEquals("world", $fetchedData->getDefaultLevelName());
    }

    /**
     * Check if the plugins string contains the name of the server software
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testPlugins(Result $fetchedData) {
        $this->assertContains("PocketMine-MP", $fetchedData->getPlugins());
    }

    /**
     * Test if the player names list is empty because no player should be online
     *
     * @param Result $fetchedData
     *
     * @depends testFetchingGeneral
     */
    public function testPlayerNames(Result $fetchedData) {
        $this->assertEquals(0, count($fetchedData->getPlayerNames()));
    }
}