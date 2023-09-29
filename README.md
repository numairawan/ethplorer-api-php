<p align="center">
    <img src="https://raw.githubusercontent.com/NumairAwan/ethplorer-api-php/main/art/ethplorer-api-php.png" width="600" alt="ethplorer-api-php">
    <p align="center">
        <a href="https://packagist.org/packages/numairawan/ethplorer-api-php"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/numairawan/ethplorer-api-php"></a>
        <a href="https://packagist.org/packages/numairawan/ethplorer-api-php"><img alt="Latest Version" src="https://img.shields.io/packagist/v/numairawan/ethplorer-api-php"></a>
        <a href="https://packagist.org/packages/numairawan/ethplorer-api-php"><img alt="License" src="https://img.shields.io/github/license/numairawan/ethplorer-api-php"></a>
    </p>
</p>

------

# Ethplorer API PHP Library

🚀 This PHP library allows you to interact with the Ethplorer.io API. It's designed for ease of use and offers the following features:

- 🔄 Support for multiple API keys to bypass rate limits on Ethplorer's free account API.
- 📦 Requires no external dependencies.
- ⚡ Delivers high-speed performance.
- 🔑 Offers two multi-key modes: sequential and random.

Get started quickly with Ethplorer API integration using this library.

## Installation

To install the library, you can use [Composer](https://getcomposer.org/) and run the following command:

```bash
composer require numairawan/ethplorer-api-php
```


### Usage
To interact with ethplorer.io, follow these simple steps:

```php
use NumairAwan\EthplorerApi\EthplorerApi;

// Example usage:
$apiKeys = ["YOUR_API_KEY_1", "YOUR_API_KEY_2"];

// By default it will use sequential mode with multi-keys for each request
// pass 'true' in 2nd parameter to use random api for each request. 

//           new EthplorerApi($apiKeys, true);
$ethplorer = new EthplorerApi($apiKeys);

// Fetch last block data
$lastBlockData = $ethplorer->getLastBlock();
var_dump($lastBlockData);
```

### Contributing
Contributions are welcome! Feel free to fork the repository and submit pull requests as well.

### License
This project is licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.


## Connect with Me

Feel free to reach out to me for any project-related queries or collaborations. I'm always happy to connect and discuss ideas!

[<img align="left" alt="Telegram" width="32px" src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" />](https://t.me/NumairAwan)
[<img align="left" alt="WhatsApp" width="32px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/512px-WhatsApp.svg.png?20220228223904" />](https://wa.me/+923164700904)

