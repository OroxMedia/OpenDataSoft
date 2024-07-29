<?php

namespace OroxMedia\OpenDataSoft\Builder;

class OpenDataSoftQuery
{
    protected array $select = [];

    protected array $where = [];

    protected array $orderBy = [];

    protected int $limit = 100;

    protected int $offset = 0;

    public function __construct(
        protected string $dataset
    ) {}

    public function dataset(string $dataset): OpenDataSoftQuery
    {
        $this->dataset = $dataset;

        return $this;
    }

    public function select(array|string $select): OpenDataSoftQuery
    {
        if (is_string($select)) {
            $select = [$select];
        }
        $this->select = array_merge($this->select, $select);

        return $this;
    }

    public function where(array|string $where): OpenDataSoftQuery
    {
        if (is_string($where)) {
            $where = [$where];
        }
        $this->where = array_merge($this->where, $where);

        return $this;
    }

    public function orderBy(array|string $orderBy): OpenDataSoftQuery
    {
        if (is_string($orderBy)) {
            $orderBy = [$orderBy];
        }
        $this->orderBy = array_merge($this->orderBy, $orderBy);

        return $this;
    }

    public function limit(int $limit): OpenDataSoftQuery
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset(int $offset): OpenDataSoftQuery
    {
        $this->offset = $offset;

        return $this;
    }

    public function get(): array
    {
        $base_url = config('opendatasoft.base_url');
        if ($base_url === null) {
            throw new \Exception('No base_url set in config/opendatasoft.php');
        }
        if ($this->dataset === null) {
            throw new \Exception('No dataset set');
        }
        $url = $base_url."/{$this->dataset}/records";
        $url .= '?select='.implode('%2C%20', $this->select);
        $url .= '&where='.implode('%20AND%20', $this->where);
        $url .= '&order_by='.implode('%2C%20', $this->orderBy);
        $url .= "&limit={$this->limit}";
        $url .= "&offset={$this->offset}";
        //        $url = urlencode($url);
        dd($url);

        $client = new \GuzzleHttp\Client;
        $response = $client->request('GET', urlencode($url));

        return json_decode($response->getBody()->getContents(), true);
    }

    public static function query(string $dataset): OpenDataSoftQuery
    {
        return new OpenDataSoftQuery($dataset);
    }
}
