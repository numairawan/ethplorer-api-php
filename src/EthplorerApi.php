<?php

namespace NumairAwan\EthplorerApi;

/**
 * Ethplorer API class for interacting with Ethplorer.io
 */
class EthplorerApi
{

    private $apiAddress = "https://api.ethplorer.io/";
    private $apiKeys = [];
    private $randKeys = false;
    private $apiKeyIndex = 0;

    /**
     * Constructor to initialize the API with an array of API keys
     */
    public function __construct(array $apiKeys, bool $randKeys)
    {
        $this->apiKeys = $apiKeys;
        $this->randKeys = $randKeys;
    }

    /**
     * Performs a cURL request to the given JSON URL
     *
     * @param string $URL The URL to fetch JSON data from
     * @return mixed Decoded JSON response
     */
    private function curl($URL)
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_USERAGENT => 'Googlebot/2.1 (+http://www.google.com/bot.html)',
            CURLOPT_HTTPHEADER => [
                'Accept: application/json',
                'Cache-Control: max-age=0',
                'Connection: keep-alive',
                'Keep-Alive: 300',
                'Accept-Charset: UTF-8;q=0.7,*;q=0.7',
                'Accept-Language: en-US,en;q=0.5',
                'Pragma:'
            ],
            CURLOPT_ENCODING => 'gzip,deflate',
            CURLOPT_AUTOREFERER => true,
            CURLOPT_VERBOSE => 0,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    /**
     * Get a random API key from the provided array of keys
     *
     * @return string Random API key
     */
    private function getRandApi()
    {
        if (count((array) $this->apiKeys) === 0) {
            return '';
        }

        if ($this->randKeys) {
            return $this->apiKeys[array_rand($this->apiKeys)];
        }

        $index = $this->apiKeyIndex % count($this->apiKeys);
        $this->apiKeyIndex++;
        return $this->apiKeys[$index];
    }

    /**
     * Get the last block information.
     *
     * @return array Last block information
     */
    public function getLastBlock()
    {
        $url = "{$this->apiAddress}getLastBlock?apiKey={$this->getRandApi()}";
        return $this->curl($url);
    }

    /**
     * Get token information by token address.
     *
     * @param string $token The token address
     * @return array Token information
     */
    public function getTokenInfo($token)
    {
        $url = "{$this->apiAddress}getTokenInfo/{$token}?apiKey={$this->getRandApi()}";
        return $this->curl($url);
    }

    /**
     * Get address information by address.
     *
     * @param string $address The Ethereum address
     * @return array Address information
     */
    public function getAddressInfo($address)
    {
        $url = "{$this->apiAddress}getAddressInfo/{$address}?apiKey={$this->getRandApi()}";
        return $this->curl($url);
    }

    /**
     * Get transaction information by transaction hash.
     *
     * @param string $tx The transaction hash
     * @return array Transaction information
     */
    public function getTxInfo($tx)
    {
        $url = "{$this->apiAddress}getTxInfo/{$tx}?apiKey={$this->getRandApi()}";
        return $this->curl($url);
    }

    /**
     * Get token history by token address, type, and limit.
     *
     * @param string $token The token address
     * @param string $type (Optional) Type of history (default: "transfer")
     * @param int $limit (Optional) Limit the number of results (default: 10)
     * @return array Token history
     */
    public function getTokenHistory($token, $type = "transfer", $limit = 10)
    {
        $url = "{$this->apiAddress}getTokenHistory/{$token}?apiKey={$this->getRandApi()}&type={$type}&limit={$limit}";
        return $this->curl($url);
    }

    /**
     * Get address history by token address, type, and limit.
     *
     * @param string $token The token address
     * @param string $type (Optional) Type of history (default: "transfer")
     * @param int $limit (Optional) Limit the number of results (default: 10)
     * @return array Address history
     */
    public function getAddressHistory($token, $type = "transfer", $limit = 10)
    {
        $url = "{$this->apiAddress}getAddressHistory/{$token}?apiKey={$this->getRandApi()}&type={$type}&limit={$limit}";
        return $this->curl($url);
    }

    /**
     * Get address transactions by token address and limit.
     *
     * @param string $token The token address
     * @param int $limit (Optional) Limit the number of results (default: 10)
     * @return array Address transactions
     */
    public function getAddressTransactions($token, $limit = 10)
    {
        $url = "{$this->apiAddress}getAddressTransactions/{$token}?apiKey={$this->getRandApi()}&limit={$limit}";
        return $this->curl($url);
    }

    /**
     * Get top tokens based on criteria and limit.
     *
     * @param string $criteria (Optional) Criteria for sorting (default: "cap")
     * @param int $limit (Optional) Limit the number of results (default: 50)
     * @return array Top tokens
     */
    public function getTop($criteria = "cap", $limit = 50)
    {
        $url = "{$this->apiAddress}getTop?apiKey={$this->getRandApi()}&criteria={$criteria}&limit={$limit}";
        return $this->curl($url);
    }

    /**
     * Get top tokens.
     *
     * @return array Top tokens
     */
    public function getTopTokens()
    {
        $url = "{$this->apiAddress}getTopTokens/?apiKey={$this->getRandApi()}";
        return $this->curl($url);
    }

    /**
     * Get top token holders by token address and limit.
     *
     * @param string $token The token address
     * @param int $limit (Optional) Limit the number of results (default: 100)
     * @return array Top token holders
     */
    public function getTopTokenHolders($token, $limit = 100)
    {
        $url = "{$this->apiAddress}getTopTokenHolders/{$token}?apiKey={$this->getRandApi()}&limit={$limit}";
        return $this->curl($url);
    }

    /**
     * Get token history grouped by token address.
     *
     * @param string $token The token address
     * @return array Token history grouped
     */
    public function getTokenHistoryGrouped($token)
    {
        $url = "{$this->apiAddress}getTokenHistoryGrouped/{$token}?apiKey={$this->getRandApi()}";
        return $this->curl($url);
    }

    /**
     * Get token price history grouped by token address and period.
     *
     * @param string $token The token address
     * @param int $period (Optional) Price history period in days (default: 365)
     * @return array Token price history grouped
     */
    public function getTokenPriceHistoryGrouped($token, $period = 365)
    {
        $url = "{$this->apiAddress}getTokenPriceHistoryGrouped/{$token}?apiKey={$this->getRandApi()}&period={$period}";
        return $this->curl($url);
    }
}
