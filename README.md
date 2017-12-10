# QueryLibrary
A library to fetch the query information of Minecraft: Bedrock Edition servers

[![CircleCI](https://circleci.com/gh/jarne/QueryLibrary.svg?style=svg)](https://circleci.com/gh/jarne/QueryLibrary)

## Install
You can easily install it with `composer require jarne/querylibrary`. If you don't have Composer, you can also clone the respository and use it.

## Usage
There is only one function called `fetch` to get the query information of a server. You must enter the IP of the server. If you don't specify the port or the timeout, it'll use the default port 19132 and a timeout of 5 seconds. The data is returned in a `Result`-object which has functions to get each value.

```php
/**
 * Fetch query information of a server
 *
 * @param string $ip
 * @param int $port
 * @param int $timeoutSeconds
 * @return Result|false
 */
public function fetch(string $ip, int $port = 19132, int $timeoutSeconds = 5) {
```

For a list of all available get-value-functions, take a look into the `src/jarne/querylibrary/utils/Result.php`-file.

## Examples
In this example, we're going to fetch the default level name of a PocketMine-MP server running on the local machine.

```php
$queryLibrary = new QueryLibrary();
$result = $queryLibrary->fetch("127.0.0.1");

echo "The default level name is " . $result->getDefaultLevelName();
```

## License & Credits
[![Creative Commons License](https://i.creativecommons.org/l/by-sa/4.0/88x31.png)](http://creativecommons.org/licenses/by-sa/4.0/)

[QueryLibrary](https://github.com/jarne/QueryLibrary) by [jarne](https://github.com/jarne) is licensed under a [Creative Commons Attribution-ShareAlike 4.0 International License](http://creativecommons.org/licenses/by-sa/4.0/). Permissions beyond the scope of this license may be available on request.
