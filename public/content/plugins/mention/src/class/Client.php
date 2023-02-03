<?php

namespace Mention\Plugin;

class Client
{

    public const API_URL = 'https://api.mention.net/api';

    private $token;
    private $account;

    public function __construct(string $account, string $token)
    {
        $this->token = $token;
        $this->account = $account;
    }


    public function createAlert(
        $name,
        array $includedKeywords = [],
        array $requiredKeywords = [],
        array $excludedKeywords = [],
        array $sources = ["web"],
        array $languages = ["en"],
    ): Alert {
        foreach ($includedKeywords as &$keyword) {
            $keyword = trim($keyword);
        }

        $data = [
            "name" => $name,
            "query" => [
                "type" => "basic",
                "included_keywords" => $includedKeywords,
                "required_keywords" => $requiredKeywords,
                "excluded_keywords" => $excludedKeywords,
            ],
            "languages" => $languages,
            "sources" => $sources,
        ];
        $json = $this->query(
            sprintf('%s/accounts/%s/alerts', static::API_URL, $this->account),
            'POST',
            json_encode($data),
            [
                'Authorization' => sprintf('Bearer %s', $this->token),
                'Content-type' => 'application/json',
                'Accept-Version' => '1.19',
            ]
        );

        $data = json_decode($json, true);

        $alert = Alert::fromObject($data['alert']);
        return $alert;
    }

    public function updateAlert(
        $alertId,
        $name,
        array $includedKeywords = [],
        array $requiredKeywords = [],
        array $excludedKeywords = [],
        array $sources = ["web"],
        array $languages = ["en"],
    ): Alert {
        foreach ($includedKeywords as &$keyword) {
            $keyword = trim($keyword);
        }

        $data = [
            "name" => $name,
            "query" => [
                "type" => "basic",
                "included_keywords" => $includedKeywords,
                "required_keywords" => $requiredKeywords,
                "excluded_keywords" => $excludedKeywords,
            ],
            "languages" => $languages,
            "sources" => $sources,
        ];
        $json = $this->query(
            sprintf('%s/accounts/%s/alerts/%s', static::API_URL, $this->account, $alertId),
            'PUT',
            json_encode($data),
            [
                'Authorization' => sprintf('Bearer %s', $this->token),
                'Content-type' => 'application/json',
                'Accept-Version' => '1.19',
            ]
        );

        $data = json_decode($json, true);

        $alert = Alert::fromObject($data['alert']);
        return $alert;
    }

    /**
     * @param string $alertId
     * @return Mention[]
     */
    public function getMentions(string $alertId): array
    {
        $json = $this->query(
            sprintf('%s/accounts/%s/alerts/%s/mentions', static::API_URL, $this->account, $alertId),
            'GET',
            [],
            [
                'Authorization' => sprintf('Bearer %s', $this->token),
            ]
        );

        $data = json_decode($json, true);

        $mentions = [];
        foreach ($data['mentions'] as $mentionData) {
            $mention = Mention::fromObject($mentionData);
            $mentions[] = $mention;
        }

        return $mentions;
    }

    public function deleteShares($alertId)
    {

        // curl -ig 'https://api.mention.net/api/accounts/{id}/alerts/{alert_id}/shares/{share_id}' \
        // -X DELETE \
        // -H 'Authorization: Bearer YOUR_ACCESS_TOKEN' \
        // -H 'Accept-Version: 1.19'

        $alert = $this->getAlert($alertId);

        foreach ($alert->shares as $share) {

            $json = $this->query(
                sprintf(
                    '%s/accounts/%s/alerts/%s/shares/%s',
                    static::API_URL,
                    $this->account,
                    $alertId,
                    $share['id'],
                ),
                'DELETE',
                [],
                [
                    'Authorization' => sprintf('Bearer %s', $this->token),
                    'Accept-Version' => '1.19',
                ]
            );
        }

        // echo __FILE__.':'.__LINE__; exit();
    }


    public function getAlert(string $alertId): Alert
    {
        $json = $this->query(
            sprintf('%s/accounts/%s/alerts/%s', static::API_URL, $this->account, $alertId),
            'GET',
            [],
            [
                'Authorization' => sprintf('Bearer %s', $this->token),
            ]
        );

        $data = json_decode($json, true);
        $alert = Alert::fromObject($data['alert']);
        return $alert;
    }

    /**
     * @param string $alertId
     * @return Alert[]
     */
    public function getAlerts(): array
    {
        $json = $this->query(
            sprintf('%s/accounts/%s/alerts', static::API_URL, $this->account),
            'GET',
            [],
            [
                'Authorization' => sprintf('Bearer %s', $this->token),
            ]
        );

        $data = json_decode($json, true);
        $alerts = [];
        foreach ($data['alerts'] as $alertData) {
            $alert = Alert::fromObject($alertData);
            $alerts[] = $alert;
        }

        return $alerts;
    }


    public function query($url, $method='get', $data = array(), $headers = array())
    {
        $method=strtoupper($method);

        $headerString = '';
        $contentTypeHeader = false;

        foreach ($headers as $name => $value) {
            if($name === 'Content-type') {
                $contentTypeHeader = true;
            }
            $headerString .= $name.': '.$value."\r\n";
        }

        if(!$contentTypeHeader && $method === 'POST') {
            $headerString = 'Content-type: application/x-www-form-urlencoded'."\r\n".$headerString;
        }

        if(is_array($data)) {
            $raw = http_build_query($data);
        }
        else {
            $raw = $data;
        }

        $options = array(
            'http' => array(
                'header'  => $headerString."Content-Length: ".strlen($raw)."\r\n",
                'method'  => $method,
                'content' => $raw,
                'request_fulluri' => true
            ),
        );
        $context  = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}
