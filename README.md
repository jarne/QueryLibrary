<h1 align="center">QueryLibrary</h1>
<p align="center">A library to fetch the query information of Minecraft: Bedrock Edition servers</p>

<br>

<p align="center">
    <a href="https://packagist.org/packages/jarne/querylibrary">
        <img src="https://img.shields.io/packagist/v/jarne/querylibrary.svg" alt="Packagist version">
    </a>
    <a href="https://php.net">
        <img src="https://img.shields.io/packagist/php-v/jarne/querylibrary.svg" alt="PHP version">
    </a>
    <a href="https://circleci.com/gh/jarne/QueryLibrary">
    <img src="https://img.shields.io/circleci/project/github/jarne/QueryLibrary.svg" alt="CircleCI">
    </a>
    <a href="https://github.com/jarne/QueryLibrary/blob/master/LICENSE">
        <img src="https://img.shields.io/badge/license-CC--BY--SA--4.0-orange.svg" alt="License">
    </a>
    <a href="https://gitter.im/jarne/QueryLibrary">
        <img src="https://img.shields.io/gitter/room/jarne/QueryLibrary.svg" alt="Gitter">
    </a>
</p>

##

[• Install](#-install)  
[• Usage](#-usage)  
[• Examples](#%EF%B8%8F-examples)  
[• Contribution](#-contribution)  
[• License](#%EF%B8%8F-license)

## 📦 Install
The library requires PHP 7.2 or newer in order to work correctly. You can install it with:

```
$ composer require jarne/querylibrary
```

If you don't like Composer, you can also clone the repository with:

```
$ git clone https://github.com/jarne/QueryLibrary
```

## 👨‍💻 Usage
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

For a list of all available get-value-functions, take a look into the [Result.php](https://github.com/jarne/QueryLibrary/blob/master/src/jarne/querylibrary/utils/Result.php)-file.

## ⌨️ Examples
As an example, we're going to fetch the default level name of a PocketMine-MP server running on the local machine.

```php
$queryLibrary = new QueryLibrary();
$result = $queryLibrary->fetch("127.0.0.1");

echo "The default level name is " . $result->getDefaultLevelName();
```

## 🙋‍ Contribution
Contributions are always very welcome! It's completly equally if you're a beginner or a more experienced developer.

Please read our **[Contribution Guidelines](CONTRIBUTING.md)** before creating an issue or submitting a pull request.

Thanks for your intrest 🎉👍!

## 👨‍⚖️ License
[![Creative Commons License](https://i.creativecommons.org/l/by-sa/4.0/88x31.png)](http://creativecommons.org/licenses/by-sa/4.0/)

[QueryLibrary](https://github.com/jarne/QueryLibrary) by [jarne](https://github.com/jarne) is licensed under a [Creative Commons Attribution-ShareAlike 4.0 International License](http://creativecommons.org/licenses/by-sa/4.0/). Permissions beyond the scope of this license may be available on request.
